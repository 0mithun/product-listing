<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;
use Illuminate\Contracts\Foundation\Application;
use msztorc\LaravelEnv\Env;
class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);
        $env = new Env();
        $url = $env->getValue('APP_MAINTENCE_MODE_DISABLE_URL');
        $url = ($url == "" || null) ? '/admin/site/live' : $url;

        $this->except = [
          $url,
        ];
    }

    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [

    ];
}
