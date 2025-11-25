<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    protected $proxies;

    protected $headers =
        \Illuminate\Http\Middleware\TrustProxies::HEADER_X_FORWARDED_ALL;
}
