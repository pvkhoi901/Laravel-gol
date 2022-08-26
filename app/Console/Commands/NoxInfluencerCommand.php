<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Scraper\NoxInfluencerRank ;

class NoxInfluencerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * php artisan scrape:youtube
     * @var string
     */
    protected $signature = 'scrape:youtube';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run noxinfluencer Every day';

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
        $bot = new NoxInfluencerRank();
        $bot->scrape();
    }
}
