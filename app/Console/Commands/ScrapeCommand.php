<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Scraper\YouTube ;

class ScrapeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * php artisan scrape:noxinfluencer
     * @var string
     */
    protected $signature = 'scrape:noxinfluencer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $bot = new YouTube();
        $bot->scrape();
    }
}
