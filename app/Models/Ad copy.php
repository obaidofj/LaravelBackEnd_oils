<?php

namespace App\Models;

class Ad
{
    public function getAds($session)
    {
        if (!$session->has('Ads')) {
            $this->createDummyData($session);
        }
        return $session->get('Ads');
    }

    public function getAd($session, $id)
    {
        if (!$session->has('Ads')) {
            $this->createDummyData($session);
        }
        return $session->get('Ads')[$id];
    }

    public function addAd($session, $title, $content)
    {
        if (!$session->has('Ads')) {
            $this->createDummyData($session);
        }
        $Ads = $session->get('Ads');
        array_push($Ads, ['title' => $title, 'content' => $content]);
        $session->put('Ads', $Ads);
    }

    public function editAd($session, $id, $title, $content)
    {
        $Ads = $session->get('Ads');
        $Ads[$id] = ['title' => $title, 'content' => $content];
        $session->put('Ads', $Ads);
    }

    private function createDummyData($session)
    {
        $Ads = [
            [
                'title' => 'Learning Laravel',
                'content' => 'This blog Ad will get you right on track with Laravel!'
            ],
            [
                'title' => 'Something else',
                'content' => 'Some other content'
            ]
        ];
        $session->put('Ads', $Ads);
    }
}


