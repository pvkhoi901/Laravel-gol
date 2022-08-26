<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Scraper\GetInfoWebsite;

class WebsiteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * php artisan scrape:infowebsite
     * @var string
     */
    protected $signature = 'scrape:infowebsite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command WebsiteCommand';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bot = new GetInfoWebsite();
        $bot->scrape();
    }
}
