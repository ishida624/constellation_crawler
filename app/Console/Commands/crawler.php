<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Goutte\Client;
use App\Models\Constellation;

class crawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:cron';

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
        // dd('crawler run');
        Log::info("Cron is working fine!");
        $client = new Client();
        $now = date('Y-m-d');
        $constellationNames = ['牡羊座', '金牛座', '雙子座', '巨蟹座', '獅子座', '處女座', '天平座', '天蠍座', '射手座', '魔羯座', '水瓶座', '雙魚座'];
        foreach ($constellationNames as $key => $constellationName) {
            $crawler = $client->request('GET', "https://astro.click108.com.tw/daily_$key.php?iAstro=$key");
            $crawlerContent = [];
            $crawler->filter('div.TODAY_CONTENT > p')->each(function ($node) use (&$crawlerContent) {
                array_push($crawlerContent, $node->text());
            });
            $dbData = Constellation::find($key + 1);
            if (!$dbData) {
                Constellation::create([
                    'Today' => $now,
                    'constellation_name' => $constellationName,
                    'total' => $crawlerContent[0],
                    'total_content' => $crawlerContent[1],
                    'love' => $crawlerContent[2],
                    'love_content' => $crawlerContent[3],
                    'work' => $crawlerContent[4],
                    'work_content' => $crawlerContent[5],
                    'money' => $crawlerContent[6],
                    'money_content' => $crawlerContent[7],
                ]);
            } else {
                $dbData->update([
                    'Today' => $now,
                    'constellation_name' => $constellationName,
                    'total' => $crawlerContent[0],
                    'total_content' => $crawlerContent[1],
                    'love' => $crawlerContent[2],
                    'love_content' => $crawlerContent[3],
                    'work' => $crawlerContent[4],
                    'work_content' => $crawlerContent[5],
                    'money' => $crawlerContent[6],
                    'money_content' => $crawlerContent[7],
                ]);
            }
        }
        // Log::info("Cron is working fine!");
        return 0;
    }
}
