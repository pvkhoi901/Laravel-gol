<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Mail;

class ApiController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://shopee.vn/api/',
        ]);
    }

    public function getShopee(Request $request)
    {
        //
        $url =  $request->url ?? "";
        $page =  $request->page ?? 1;

        try {
            $result = $this->client->request('GET', $url);

            $response = json_decode($result->getBody()->getContents());

            if ($response->items != null) {
                $data['datas'] = array_map(function ($item) {
                    $show_free_shipping = 0;
                    if ($item->item_basic->show_free_shipping) {
                        $show_free_shipping = 1;
                    }

                    $price = $item->item_basic->price ?? 0;
                    $price = $price / 100000;
                    $price = number_format($price, 0, ',', '.') . "đ";
                    return [
                        'name' => $item->item_basic->name,
                        'image' => "https://cf.shopee.vn/file/" . $item->item_basic->image,
                        'link' => "https://shopee.vn/product/$item->shopid/$item->itemid",
                        'price' => $price,
                        'currency' => "đ",
                        'domain' => "shopee",
                        'brand' => $item->item_basic->brand,
                        'from_website' => "shopee",
                        'url_crawl' => "https://shopee.vn/product/$item->shopid/$item->itemid",
                        'show_free_shipping' => $show_free_shipping,
                    ];
                }, $response->items);
            } else {
                $data['datas'] = [];
            }
            $data['total_count'] = $response->total_count;
            $data['next_page'] = ($response->nomore == false) ? $page + 1 : 0;
        } catch (\Exception $e) {
            \Log::error($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 500,
                'message' => "Unexpected error. Try later",
                'data' => $data,
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => "Search Product success",
            'data' => $data,
        ]);
    }
}
