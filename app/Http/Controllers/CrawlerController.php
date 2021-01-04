<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use App\Models\Constellation;

class CrawlerController extends Controller
{
    public function crawler()
    {
        app('ConstellationCrawlerService')->constellationCrawler();
        $dbDataAll = Constellation::all();
        $headers = array('Content-Type' => 'application/json; charset=utf-8');
        return response()->json($dbDataAll, 200, $headers, JSON_UNESCAPED_UNICODE);
    }
    public function showTodayLuck()
    {
        $dbDataAll = Constellation::all();
        $headers = array('Content-Type' => 'application/json; charset=utf-8');
        return response()->json($dbDataAll, 200, $headers, JSON_UNESCAPED_UNICODE);
    }
}
