<?php

namespace App;

use Goutte\Client;
use App\Models\Constellation;

class ConstellationCrawlerService
{
    public function constellationCrawler()
    {
        # code...
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
    }
}
