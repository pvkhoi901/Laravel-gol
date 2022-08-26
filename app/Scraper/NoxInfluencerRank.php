<?php

namespace App\Scraper;

use App\Models\InfluencerWeek;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Carbon\Carbon;
use App\Models\YoutubeRank;
use App\Models\YoutubeCategory;
use App\Models\NoxCategory;
use App\Models\YoutubeRankSubscribers;
use Illuminate\Support\Str;

use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\Log;

class NoxInfluencerRank
{

    //"C:\Program Files\PHP\v8.0\php.exe"  D:\Project\GG\Admin_Crawl_Website\artisan scrape:youtube
    //php artisan scrape:youtube
    public $log_error;
    public $log_info;
    public function __construct()
    {
        $this->log_error = Log::channel('daily_crawl_error');
        $this->log_info = Log::channel('daily_crawl');
    }

    public function scrape()
    {
        // \Log::info("Startttttttttttt scrape noxinfluencer");
        try {

            $first_month =  Carbon::now()->month;
            $first_day =  Carbon::now()->day;

            // Xóa hết dữ liệu vào ngày mùng 1 hàng tháng
            if ($first_day == 3) {
                InfluencerWeek::truncate();
                YoutubeRank::truncate();
                YoutubeRankSubscribers::truncate();
            }

            // InfluencerWeek::truncate();
            // YoutubeRank::truncate();
            // YoutubeRankSubscribers::truncate();

            $nox_categories = NoxCategory::getData();
            $now = Carbon::now();
            $start_week   = $now->startOfWeek()->format('Y-m-d');
            $end_week     = $now->endOfWeek()->format('Y-m-d');
            $week_of_year = $now->weekOfYear;

            $influencer_week = new InfluencerWeek();
            $influencer_week->year = Carbon::now()->year;
            $influencer_week->week_of_year = $week_of_year;
            $influencer_week->start_week = $start_week;
            $influencer_week->end_week = $end_week;
            $influencer_week->status = 1;
            $influencer_week->save();

            $websites = [];
            foreach ($nox_categories as $key => $nox_category) {
                $region = $nox_category['region'];
                $url =    $nox_category['url'];
                $category_id =    $nox_category['id'];
                $type =    $nox_category['type'];
                $order_by =    $nox_category['order_by'];
                //var_dump("Begin crawll website :  $url   ---- $category_id");
                // Không dùng api
                if ($type != 1) {

                    // Cao web

                    $client = new Client();
                    $crawler = $client->request('GET', $url);
                    $no_index = 0;

                    $crawler->filter('#table-body .table-line')->each(
                        function (Crawler $node) use (
                            $influencer_week,
                            $start_week,
                            $end_week,
                            $region,
                            $category_id,
                            $week_of_year,
                            $type,
                            &$no_index
                        ) {
                            $no_index = $no_index + 1;
                            $youtube_category_name = "";
                            $avatar = $node->filter('.avatar')->attr("src");
                            $name = $node->filter('.title')->text();
                            $channel = $node->filter('.rank-desc .link')->attr("href");
                            $channel_name = $node->filter('.rank-desc .title')->text();
                            if ($node->filter('.rank-category')->count() > 0) {
                                $youtube_category_name = $node->filter('.rank-category')->text();
                            }

                            $youtube_cateogry = YoutubeCategory::getYouTubeCategory($youtube_category_name, $region);

                            $subscribers = $node->filter('.rank-subs .number')->text();
                            if ($subscribers == "") {
                                $subscribers  = "─";
                            }
                            $subscribers_increase_number = "";
                            $subscribers_increase_type = "";

                            if ($node->filter('.rank-subs .change')->last()->attr('class') == "change up") {
                                $subscribers_increase_type = 'up';
                            } else if ($node->filter('.rank-subs .change')->last()->attr('class') == "change down") {
                                $subscribers_increase_type = 'down';
                            }
                            if ($node->filter('.rank-subs .change')) {
                                $subscribers_increase_number = $node->filter('.rank-subs .change')->text() ?? "";
                            }

                            $avg_views = $node->filter('.rank-avg-view .number')->text();

                            if ($avg_views == "") {
                                $avg_views  = "─";
                            }


                            $avg_views_increase_number = "";
                            $avg_views_increase_type = "";
                            if ($node->filter('.rank-avg-view .change')) {
                                $avg_views_increase_number = $node->filter('.rank-avg-view .change')->text() ?? "";
                            }

                            if ($node->filter('.rank-avg-view .change')->last()->attr('class') == "change up") {
                                $avg_views_increase_type = 'up';
                            } else if ($node->filter('.rank-avg-view .change')->last()->attr('class') == "change down") {
                                $avg_views_increase_type = 'down';
                            }


                            // Kiem tra thu hang tang hay giam
                            $index_check = $node->filter('.rank-number .number')->text();
                            $no_index_type = "";
                            $check_up = "change change-$index_check up";
                            $check_down = "change change-$index_check down";
                            if ($node->filter('.rank-number .change')->last()->attr('class') == $check_up) {
                                $no_index_type = 'up';
                            } else if ($node->filter('.rank-number .change')->last()->attr('class') == $check_down) {
                                $no_index_type = 'down';
                            }
                            $no_index_number = $node->filter('.rank-number .change')->last()->text();

                            // var_dump($name  . "_Lượt xem Subscribers   : " . $number . "  Avg.Views   : " . $avg);
                            $data = [
                                'region'                     => $region,
                                'category_id'                 => $category_id,
                                'type'                        => $type,
                                'no_index'                    => $no_index,
                                'no_index_type'               => $no_index_type,
                                'no_index_number'             => changeIndexView($no_index),
                                'influencer_id'               => $influencer_week->id,
                                'start_week'                  => $start_week,
                                'end_week'                    => $end_week,
                                'week_of_year'                => $week_of_year,
                                'avatar'                      => $avatar,
                                'video_thumb'                 => $avatar,
                                'video_description'           => '',
                                'title'                       => $name,
                                'channel'                     => "https://www.youtube.com/channel/" . str_replace('/youtube/channel/', '', $channel),
                                'channel_name'                => $channel_name,
                                'youtube_category_id'         => $youtube_cateogry['youtube_category_id'],
                                'youtube_category_name'       => $youtube_cateogry['youtube_category_name'],
                                'subscribers'                 => $subscribers,
                                'subscribers_increase_type'   => $subscribers_increase_type,
                                'subscribers_increase_number' => $subscribers_increase_number,
                                'avg_views'                   => $avg_views,
                                'avg_views_increase_type'     => $avg_views_increase_type,
                                'avg_views_increase_number'   => $avg_views_increase_number,
                            ];
                            $youtbe_rank = YoutubeRank::create($data);
                        }
                    );
                } else {

                    $this->log_info->info("GET DATA YOUTUBE $region");
                    try {

                        $data_insert = [];
                        // Call api
                        $client = new GuzzleHttpClient();
                        $app_key =   config('youtube.api_key');
                        $this->log_info->info(Carbon::now());
                        $this->log_info->info($app_key);
                        $region_upper = Str::upper($region);

                        $host =  "https://www.googleapis.com/youtube/v3/videos?part=id%2Csnippet%2CcontentDetails&chart=mostPopular&maxResults=50&regionCode=$region_upper&key=$app_key";
                        $this->log_info->info($host);
                        //var_dump($host);
                        $response = $client->request('GET', $host);
                        $datas = json_decode($response->getBody(), true); // returns an array
                        $pageToken = $datas['nextPageToken'];
                        $no_index = 1;
                        if (count($datas['items']) >  0) {
                            $this->log_info->info("Have data Youtube");
                        }
                        foreach ($datas['items'] as $key => $item) {

                            $youtube_cateogry = YoutubeCategory::getYouTubeCategoryById($item['snippet']['categoryId'], $region);

                            $video_id = $item['id'];
                            $data = [
                                'region'                     => $region,
                                'category_id'                 => $category_id,
                                'type'                        => $type,
                                'no_index'                    => $no_index,
                                'no_index_type'               => "",
                                'no_index_number'             => changeIndexView($no_index),
                                'influencer_id'               => $influencer_week->id,
                                'start_week'                  => $start_week,
                                'end_week'                    => $end_week,
                                'week_of_year'                => $week_of_year,
                                'avatar'                      => "https://i.ytimg.com/vi/$video_id/0.jpg",
                                'video_thumb'                 => "https://i.ytimg.com/vi/$video_id/0.jpg",
                                'video_description'           => $item['snippet']['description'] ?? "",
                                'title'                        => $item['snippet']['title'] ?? "",
                                'video_id'                    =>  $item['id'],
                                'video_url'                   => "https://www.youtube.com/watch?v=" . $item['id'],
                                //'name'                        => $item['snippet']['title'],
                                'channel'                     => $item['snippet']['channelId'] ?? "",
                                'channel_name'                => $item['snippet']['title'],
                                'youtube_category_id'         => $youtube_cateogry['youtube_category_id'],
                                'youtube_category_name'       => $youtube_cateogry['youtube_category_name'],
                                'subscribers'                 => "",
                                'subscribers_increase_type'   => "",
                                'subscribers_increase_number' => "",
                                'avg_views'                   => "",
                                'avg_views_increase_type'     => "",
                                'avg_views_increase_number'   => "",
                            ];

                            $youtbe_rank = YoutubeRank::create($data);
                            // $data_insert[]  = $data;
                            $no_index = $no_index + 1;
                        }
                        // Mỗi lần Youtube chỉ có thể lấy được tối đa 50 items
                        // Để có thể lấy thêm thì lấy ra biến nextPageToken
                        // Trang 2
                        $host_page2 =  "https://www.googleapis.com/youtube/v3/videos?part=id%2Csnippet%2CcontentDetails&chart=mostPopular&maxResults=50&pageToken=$pageToken&regionCode=$region&key=$app_key";
                        $this->log_info->info($host_page2);
                        $response = $client->request('GET', $host_page2);
                        $datas_page2 = json_decode($response->getBody(), true); // returns an array

                        if (count($datas_page2['items']) >  0) {
                            $this->log_info->info("Have data Youtube Page 2");
                        }

                        foreach ($datas_page2['items'] as $key => $item) {
                            $youtube_cateogry = YoutubeCategory::getYouTubeCategoryById($item['snippet']['categoryId'], $region);
                            $video_id = $item['id'];
                            $data = [
                                'region'                     => $region,
                                'category_id'                 => $category_id,
                                'type'                        => $type,
                                'no_index'                    => $no_index,
                                'no_index_type'               => "",
                                'no_index_number'             => changeIndexView($no_index),
                                'influencer_id'               => $influencer_week->id,
                                'start_week'                  => $start_week,
                                'end_week'                    => $end_week,
                                'week_of_year'                => $week_of_year,
                                'avatar'                      => "https://i.ytimg.com/vi/$video_id/0.jpg",
                                'video_thumb'                 => "https://i.ytimg.com/vi/$video_id/0.jpg",
                                'video_description'           => $item['snippet']['description'] ?? "",
                                'title'                       => $item['snippet']['title'] ?? "",
                                'video_id'                    =>  $item['id'],
                                'video_url'                   => "https://www.youtube.com/watch?v=" . $item['id'],
                                'channel'                     => $item['snippet']['channelId'] ?? "",
                                'channel_name'                => $item['snippet']['title'],
                                'youtube_category_id'         => $youtube_cateogry['youtube_category_id'],
                                'youtube_category_name'       => $youtube_cateogry['youtube_category_name'],
                                'subscribers'                 => "",
                                'subscribers_increase_type'   => "",
                                'subscribers_increase_number' => "",
                                'avg_views'                   => "",
                                'avg_views_increase_type'     => "",
                                'avg_views_increase_number'   => "",
                            ];

                            // $data_insert[]  = $data;
                            $no_index = $no_index + 1;


                            $youtbe_rank = YoutubeRank::create($data);
                        }
                        //Chuẩn bị lại dữ liệu
                        // Insert data
                        // $this->log_info->info("*****************************************************");
                        // YoutubeRank::insert($data_insert);
                        // $this->log_info->info($data_insert);
                        // $this->log_info->info("*****************************************************");
                    } catch (\Exception $e) {
                        Log::channel('daily_crawl_error')->error($e->getMessage(), [
                            'file' => $e->getFile(),
                            'line' => $e->getLine(),
                            'trace' => $e->getTraceAsString()
                        ]);
                    }
                }
            }

            $youtube_ranks = YoutubeRank::whereDate("created_at", Carbon::now())
                ->get();

            // Xóa data cũ đi
            YoutubeRankSubscribers::truncate();
            // Tối ưu hóa đoạn này không để insert DB quá nhiều

            $data_youtube_rank_subscribers = [];
            foreach ($youtube_ranks as $youtube_rank) {
                $subscribers =  $youtube_rank->subscribers;
                $avg_views =  $youtube_rank->avg_views;

                foreach (YoutubeCategory::COUNTRY as $key => $region) {

                    $new_subscribers = ChangeNumberViewByCountry($subscribers, $key);
                    $new_avg_views = ChangeNumberViewByCountry($avg_views, $key);

                    $data_youtube_rank_subscribers[] = [
                        "region"                      => $key,
                        "type"                        => $youtube_rank->type,
                        "youtube_rank_id"             => $youtube_rank->id,
                        "influencer_id"               => $youtube_rank->influencer_id,
                        "subscribers_origin"          => $subscribers,
                        "subscribers"                 => $new_subscribers,
                        "subscribers_increase_type"   => $youtube_rank->subscribers_increase_type,
                        "subscribers_increase_number" => $youtube_rank->subscribers_increase_number,

                        "avg_views_origin"            => $avg_views,
                        "avg_views"                   => $new_avg_views,
                        "avg_views_increase_type"     => $youtube_rank->avg_views_increase_type,
                        "avg_views_increase_number"   => $youtube_rank->avg_views_increase_number,

                    ];
                }
                // Phân mảnh để insert
                // Do Array quá nhiều lên để trong collect  lại phải tăng bộ nhớ
                // Vì thế cứ để 100 bản ghi insert 1 lần

                if (count($data_youtube_rank_subscribers) > 100) {
                    YoutubeRankSubscribers::insert($data_youtube_rank_subscribers);
                    $data_youtube_rank_subscribers = [];
                }
            }

            if (count($data_youtube_rank_subscribers) > 0) {
                YoutubeRankSubscribers::insert($data_youtube_rank_subscribers);
                $data_youtube_rank_subscribers = [];
            }

            // Tối ưu hóa đoạn này không để insert DB quá nhiều
            // $data_youtube_rank_subscribers = collect($data_youtube_rank_subscribers);
            // // Make a collection to use the chunk method
            // // it will chunk the dataset in smaller collections containing 500 values each. 
            // // Play with the value to get best result
            // $chunks = $data_youtube_rank_subscribers->chunk(100);
            // foreach ($chunks as $chunk) {
            //     \DB::table('youtube_rank_subscribers')->insert($chunk->toArray());
            // }

            $data_crawls = [
                [
                    "url_first" => "https://vn.noxinfluencer.com/youtube-video-rank/_first-video?country=__country&category=film&offset=0&pageSize=1&rankSize=10",
                    "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=film&offset=1&pageSize=100&rankSize=101",
                    "region" => "vn",
                    "category_id" => 1, //Phim và Hoạt ảnh
                ],
                [
                    "url_first" => "https://vn.noxinfluencer.com/youtube-video-rank/_first-video?country=__country&category=autos+%26+vehicles&offset=0&pageSize=1&rankSize=10",
                    "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=autos+%26+vehicles&offset=1&pageSize=100&rankSize=101",
                    "region" => "vn",
                    "category_id" => 2, //Ô tô và Xe cộ
                ],
                [
                    "url_first" => "https://vn.noxinfluencer.com/youtube-video-rank/_first-video?country=__country&category=music&offset=0&pageSize=1&rankSize=10",
                    "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=music&offset=1&pageSize=100&rankSize=101",
                    "region" => "vn",
                    "category_id" => 10, //Âm nhạc
                ],
                [
                    "url_first" => "https://vn.noxinfluencer.com/youtube-video-rank/_first-video?country=__country&category=pets+%26+animals&offset=0&pageSize=1&rankSize=10",
                    "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=pets+%26+animals&offset=1&pageSize=100&rankSize=101",
                    "region" => "vn",
                    "category_id" => 15, //Vật cưng và Động vật
                ],
                [
                    "url_first" => "https://vn.noxinfluencer.com/youtube-video-rank/_first-video?country=__country&category=sports&offset=0&pageSize=1&rankSize=10",
                    "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=sports&offset=1&pageSize=100&rankSize=101",
                    "region" => "vn",
                    "category_id" => 17, //Thể thao
                ],
                // [
                //     "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=music&offset=1&pageSize=100&rankSize=101",
                //     "region" => "vn",
                //     "category_id" => 19, //Du lịch và Sự kiện
                // ],
                [
                    "url_first" => "https://vn.noxinfluencer.com/youtube-video-rank/_first-video?country=__country&category=gaming&offset=0&pageSize=1&rankSize=10",
                    "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=gaming&offset=1&pageSize=100&rankSize=101",
                    "region" => "vn",
                    "category_id" => 20, //Trò chơi
                ],
                // [
                //     "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=music&offset=1&pageSize=100&rankSize=101",
                //     "region" => "vn",
                //     "category_id" => 22, //Mọi người và Blog
                // ],
                // [
                //     "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=music&offset=1&pageSize=100&rankSize=101",
                //     "region" => "vn",
                //     "category_id" => 23, //Comedy
                // ],
                [
                    "url_first" => "https://vn.noxinfluencer.com/youtube-video-rank/_first-video?country=__country&category=entertainment&offset=0&pageSize=1&rankSize=10",
                    "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=entertainment&offset=1&pageSize=100&rankSize=101",
                    "region" => "vn",
                    "category_id" => 24, //Giải trí
                ],
                // [
                //     "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=music&offset=1&pageSize=100&rankSize=101",
                //     "region" => "vn",
                //     "category_id" => 25, //Tin tức và Chính trị
                // ],
                [
                    "url_first" => "https://vn.noxinfluencer.com/youtube-video-rank/_first-video?country=__country&category=howto+%26+style&offset=0&pageSize=1&rankSize=10",
                    "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=howto+%26+style&offset=1&pageSize=100&rankSize=101",
                    "region" => "vn",
                    "category_id" => 26, //Hướng dẫn và Phong cách
                ],
                [
                    "url_first" => "https://vn.noxinfluencer.com/youtube-video-rank/_first-video?country=__country&category=education&offset=0&pageSize=1&rankSize=10",
                    "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=education&offset=1&pageSize=100&rankSize=101",
                    "region" => "vn",
                    "category_id" => 27, //Giáo dục
                ],
                [
                    "url_first" => "https://vn.noxinfluencer.com/youtube-video-rank/_first-video?country=__country&category=science+%26+technology&offset=0&pageSize=1&rankSize=10",
                    "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=science+%26+technology&offset=1&pageSize=100&rankSize=101",
                    "region" => "vn",
                    "category_id" => 28, //Khoa học và Công nghệ
                ],
                // [
                //     "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=music&offset=1&pageSize=100&rankSize=101",
                //     "region" => "vn",
                //     "category_id" => 29, //Phi lợi nhuận/Hoạt động
                // ],
                // [
                //     "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=music&offset=1&pageSize=100&rankSize=101",
                //     "region" => "vn",
                //     "category_id" => 34, //Hài kịch
                // ],
                // [
                //     "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=music&offset=1&pageSize=100&rankSize=101",
                //     "region" => "vn",
                //     "category_id" => 43, //Chương trình
                // ],
                // [
                //     "url" => "https://vn.noxinfluencer.com/youtube-video-rank/_top-videos?country=__country&category=music&offset=1&pageSize=100&rankSize=101",
                //     "region" => "vn",
                //     "category_id" => 44, //Đoạn giới thiệu
                // ],

            ];

            $countries = ["vn", "kr", "us"];
            foreach ($data_crawls as $key => $data_crawl) {
                $url_first = $data_crawl['url_first'];
                $url = $data_crawl['url'];
                foreach ($countries as $key => $region) {
                    # code...
                    $url_first_crawler = str_replace('__country', $region, $url_first);
                    $url_crawler = str_replace('__country', $region, $url);

                    $category_id = $data_crawl['category_id'];
                    $client = new Client();
                    $crawler = $client->request('GET', $url_first_crawler);
                    $no_index = 0;
                    $no_index_type = 0;
                    $type =  6;
                    $crawler->filter('.youtube-video-info')->each(
                        function (Crawler $node) use (
                            $influencer_week,
                            $start_week,
                            $end_week,
                            $region,
                            $category_id,
                            $week_of_year,
                            $type,
                            &$no_index_type,
                            &$no_index
                        ) {
                            $no_index = $no_index + 1;
                            $no_index_type = $no_index_type + 1;
                            $youtube_category_name = "";

                            $video_id = $node->filter('.youtube-video-wrapper')->attr("data-video-id");
                            $avatar = "https://i.ytimg.com/vi/$video_id/0.jpg";
                            $name = $node->filter('.video-title')->text();
                            $channel = $node->filter('.video-data .name')->attr("href");
                            $channel_name = $node->filter('.video-data .name')->text();
                            $youtube_cateogry = YoutubeCategory::getYouTubeCategoryById($category_id, $region);

                            $avg_views_increase_number = "";
                            $avg_views_increase_type = "";

                            // var_dump($name  . "_Lượt xem Subscribers   : " . $number . "  Avg.Views   : " . $avg);
                            $data = [
                                'region'                     => $region,
                                'category_id'                 => $category_id,
                                'type'                        => $type,
                                'no_index'                    => $no_index,
                                'no_index_type'               => $no_index_type,
                                'no_index_number'             => changeIndexView($no_index),
                                'influencer_id'               => $influencer_week->id,
                                'start_week'                  => $start_week,
                                'end_week'                    => $end_week,
                                'week_of_year'                => $week_of_year,
                                'avatar'                      => $avatar,
                                'video_id'                    => $video_id,
                                'video_url'                   => "https://www.youtube.com/watch?v=$video_id",
                                'video_thumb'                 => $avatar,
                                'video_description'           => '',
                                'title'                       => $name,
                                'channel'                     => "https://www.youtube.com/channel/" . str_replace('/youtube/channel/', '', $channel),
                                'channel_name'                => $channel_name,
                                'youtube_category_id'         => $youtube_cateogry['youtube_category_id'],
                                'youtube_category_name'       => $youtube_cateogry['youtube_category_name'],
                                'subscribers'                 => "",
                                'subscribers_increase_type'   => "",
                                'subscribers_increase_number' => "",
                                'avg_views'                   => "",
                                'avg_views_increase_type'     => $avg_views_increase_type,
                                'avg_views_increase_number'   => $avg_views_increase_number,
                            ];
                            $youtbe_rank = YoutubeRank::create($data);
                        }
                    );

                    $client = new Client();
                    $crawler = $client->request('GET', $url_crawler);
                    $type =  6;
                    $crawler->filter('li')->each(
                        function (Crawler $node) use (
                            $influencer_week,
                            $start_week,
                            $end_week,
                            $region,
                            $category_id,
                            $week_of_year,
                            $type,
                            &$no_index_type,
                            &$no_index
                        ) {
                            $no_index = $no_index + 1;
                            $no_index_type = $no_index_type + 1;
                            $youtube_category_name = "Âm nhạc";

                            $video_id = $node->filter('.youtube-video-wrapper')->attr("data-video-id");
                            $avatar = "https://i.ytimg.com/vi/$video_id/0.jpg";
                            $name = $node->filter('.video-title')->text();
                            $channel = $node->filter('.video-data .name')->attr("href");
                            $channel_name = $node->filter('.video-data .name')->text();
                            $youtube_cateogry = YoutubeCategory::getYouTubeCategoryById($category_id, $region);
                            $avg_views_increase_number = "";
                            $avg_views_increase_type = "";

                            // var_dump($name  . "_Lượt xem Subscribers   : " . $number . "  Avg.Views   : " . $avg);
                            $data = [
                                'region'                     => $region,
                                'category_id'                 => $category_id,
                                'type'                        => $type,
                                'no_index'                    => $no_index,
                                'no_index_type'               => $no_index_type,
                                'no_index_number'             => changeIndexView($no_index),
                                'influencer_id'               => $influencer_week->id,
                                'start_week'                  => $start_week,
                                'end_week'                    => $end_week,
                                'week_of_year'                => $week_of_year,
                                'avatar'                      => $avatar,
                                'video_id'                    => $video_id,
                                'video_url'                   => "https://www.youtube.com/watch?v=$video_id",
                                'video_thumb'                 => $avatar,
                                'video_description'           => '',
                                'title'                       => $name,
                                'channel'                     => "https://www.youtube.com/channel/" . str_replace('/youtube/channel/', '', $channel),
                                'channel_name'                => $channel_name,
                                'youtube_category_id'         => $youtube_cateogry['youtube_category_id'],
                                'youtube_category_name'       => $youtube_cateogry['youtube_category_name'],
                                'subscribers'                 => "",
                                'subscribers_increase_type'   => "",
                                'subscribers_increase_number' => "",
                                'avg_views'                   => "",
                                'avg_views_increase_type'     => $avg_views_increase_type,
                                'avg_views_increase_number'   => $avg_views_increase_number,
                            ];
                            $youtbe_rank = YoutubeRank::create($data);
                        }
                    );
                }
            }
        } catch (\Exception $ex2) {
            Log::channel('daily_crawl_error')->error($ex2->getMessage(), [
                'file' => $ex2->getFile(),
                'line' => $ex2->getLine(),
                'trace' => $ex2->getTraceAsString()
            ]);
        }
    }
}
