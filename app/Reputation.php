<?php

namespace App;

class Reputation
{
    const THREAD_WAS_PUBLISHED = 10;
    const REPLY_POSTED = 2;
    const BEST_REPLY_AWARDED = 50;

    public function award($user, $points)
    {
        $user->increment('reputation', $points);
    }
}
