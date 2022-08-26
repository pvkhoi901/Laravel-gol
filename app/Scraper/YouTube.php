<?php

namespace App\Scraper;

use App\Models\InfluencerWeek;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Carbon\Carbon;
use App\Models\YoutubeRank;
use App\Models\YoutubeCategory;

class YouTube
{

    public function scrape()
    {
        // \Log::info("Startttttttttttt scrape noxinfluencer");
        try {
            $countries = [
                "vn",
                "kr",
                "us",
            ];

            $now = Carbon::now();
            $start_week = $now->startOfWeek()->format('Y-m-d');
            $end_week   = $now->endOfWeek()->format('Y-m-d');
            $week_of_year   = $now->weekOfYear;

            $influencer_week = new InfluencerWeek();
            $influencer_week->year = Carbon::now()->year;
            $influencer_week->week_of_year = $week_of_year;
            $influencer_week->start_week = $start_week;
            $influencer_week->end_week = $end_week;
            $influencer_week->status = 1;
            $influencer_week->save();


            $countries = YoutubeCategory::COUNTRY;

            $array_websites = [
                'https://www.noxinfluencer.com/youtube-channel-rank/top-100-vn-film%20%26%20animation-youtuber-sorted-by-subs-weekly',
                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-vn-all-youtuber-sorted-by-subs-weekly',
                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-vn-all-youtuber-sorted-by-growth-weekly',
                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-vn-all-youtuber-sorted-by-avgview-weekly',
                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-vn-all-youtuber-sorted-by-decrease-weekly',

                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-us-all-youtuber-sorted-by-subs-weekly',
                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-us-all-youtuber-sorted-by-growth-weekly',
                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-us-all-youtuber-sorted-by-avgview-weekly',
                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-us-all-youtuber-sorted-by-decrease-weekly',

                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-kr-all-youtuber-sorted-by-subs-weekly',
                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-kr-all-youtuber-sorted-by-growth-weekly',
                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-kr-all-youtuber-sorted-by-avgview-weekly',
                // 'https://www.noxinfluencer.com/youtube-channel-rank/top-100-kr-all-youtuber-sorted-by-decrease-weekly',
            ];


            $websites = [];
            foreach ($countries  as $key => $country) {
                $country = $key;
                $website_vn = [
                    [
                        "category_id" => 0,
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-all-youtuber-sorted-by-subs-weekly"
                    ],
                    [
                        "category_id" => 1, // Film & Animation
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-film%20%26%20animation-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 2, // Autos & Vehicles
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-autos%20%26%20vehicles-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 10, // Music
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-music-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 15, // Pets & Animals
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-pets%20%26%20animals-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 17, // Sports
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-sports-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 19, // Travel & Events
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-travel%20%26%20events-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 20, // Gaming
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-gaming-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 22, // People & Blogs
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-people%20%26%20blogs-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 24, // Entertainment
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-entertainment-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 25, // News & Politics
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-news%20%26%20politics-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 26, // Howto & Style
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-howto%20%26%20style-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 27, // Education
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-education-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 28, // Science & Technology
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-science%20%26%20technology-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 29, // Nonprofits & Activism
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-nonprofits%20%26%20activism-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 34, // Comedy
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-comedy-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 43, // Shows
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-shows-youtuber-sorted-by-avgview-weekly"
                    ],
                    [
                        "category_id" => 44, // Trailers
                        "url" => "https://www.noxinfluencer.com/youtube-channel-rank/top-100-$key-trailers-youtuber-sorted-by-avgview-weekly"
                    ],
                ];
                $websites[$key] = $website_vn;
            }


            foreach ($websites as $key => $website) {
                $country = $key;
                foreach ($website as $detail_website) {
                    $url =    $detail_website['url'];
                    $category_id =    $detail_website['category_id'];
                    var_dump("Begin crawll website :  $url   ---- $category_id");
                    $client = new Client();
                    $crawler = $client->request('GET', $url);
                    $no_index = 0;

                    $crawler->filter('#table-body .table-line')->each(
                        function (Crawler $node) use (
                            $influencer_week,
                            $start_week,
                            $end_week,
                            $country,
                            $category_id,
                            $week_of_year,
                            &$no_index,
                        ) {
                            $no_index = $no_index + 1;
                            $youtube_cateogry = "";
                            $avatar = $node->filter('.avatar')->attr("src");
                            $name = $node->filter('.title')->text();
                            $channel = $node->filter('.rank-desc .link')->attr("href");
                            $channel_name = $node->filter('.rank-desc .title')->text();
                            if ($node->filter('.rank-category')->count() > 0) {
                                $youtube_cateogry = $node->filter('.rank-category')->text();
                            }

                            $subscribers = $node->filter('.rank-subs .number')->text();
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
                                'country'                     => $country,
                                'category_id'                 => $category_id,
                                'no_index'                    => $no_index,
                                'no_index_type'               => $no_index_type,
                                'no_index_number'             => str_replace('-', '',  $no_index_number),
                                'influencer_id'               => $influencer_week->id,
                                'start_week'                  => $start_week,
                                'end_week'                    => $end_week,
                                'week_of_year'                => $week_of_year,
                                'avatar'                      => $avatar,
                                'name'                        => $name,
                                'channel'                     => "https://www.youtube.com/channel/" . str_replace('/youtube/channel/', '', $channel),
                                'channel_name'                => $channel_name,
                                'youtube_cateogry'            => $youtube_cateogry,
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
                }
            }




            // // Gui Tới api của bên apigatewate
            // $client = new Client();
            // $host = env("API_GATEWAY");

            // $datas_send = YoutubeRank::where("influencer_id", $influencer_week->id)->get();
            // \Log::info($datas_send );

            // $response = $client->request('POST', $host, [
            //     'form_params' => [
            //         'datas_send' => $datas_send,
            //     ]
            // ]);
            // $data = json_decode($response->getBody(), true); // returns an array
            // $status_return = $data['status'];
            // if ($status_return == "200") {
            //     $products[$key] = $data['products'];
            // }
        } catch (\Exception $e) {
            \Log::error($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
