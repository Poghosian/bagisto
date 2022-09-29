<?php

namespace ACME\PageSpeed\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;

class PageSpeedService
{


    /**
     * @var PendingRequest
     */
    protected PendingRequest $http;

    public function __construct()
    {
        $this->http = Http::baseUrl(config('gps.pageSpeedUrl'));
    }


    /**
     * @param string $url
     * @return mixed
     */
    public function getPageSpeedInfo(string $url): mixed
    {
        $url = $this->addHttp($url);
        return $this->http->timeout(120)->get('runPagespeed', [
            'url' => $url,
            'key' => config('gps.pageSpeedKey')
        ])->json();
    }

    private function addHttp($url)
    {

        // Search the pattern
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {

            // If not exist then add http
            $url = "http://" . $url;
        }

        // Return the URL
        return $url;
    }
}

