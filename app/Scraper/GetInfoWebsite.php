<?php

namespace App\Scraper;

use App\Models\InfluencerWeek;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Carbon\Carbon;
use App\Models\YoutubeRank;
use App\Models\YoutubeCategory;

class GetInfoWebsite
{
    //php artisan scrape:infowebsite
    public function scrape()
    {
        try {
            $url = "https://missha.vn/ke-mat/missha-bold-effect-pen-liner-true-brown-1570.html";

            $client = new Client();
            $crawler = $client->request('GET', $url);
            $no_index = 0;

            $crawler->filter('.detailProduct')->each(
                function (Crawler $node) use (
                    &$no_index,
                ) {
                    $no_index = $no_index + 1;
                    $product_name = $node->filter('.titleDetail')->html();
                    // $product_image = $node->filter('.opt_img img')->attr("src");
                    // $product_price = $node->filter('.pdtInfo .opt_price')->text();
                    var_dump($product_name);
                    // var_dump($product_image);
                    // var_dump($product_price);
                }
            );
        } catch (\Exception $e) {
            \Log::error($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
