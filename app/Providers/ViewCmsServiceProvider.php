<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class ViewCmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.cms', function ($view){
            $wtitle = $wdesc = $wlogo = $wfavicon = null;

            // Append W-Value
            $wtitle = "Social Care DIY";
            $wdesc = "Non-Profit Organization";
            $wlogo = null;
            $wfavicon = null;
            $wversion = '2.0.2';

            $view->with([
                'wtitle' => $wtitle,
                'wdesc' => $wdesc,
                'wlogo' => $wlogo,
                'wfavicon' => $wfavicon,
                'wversion' => $wversion
            ]);
        });
    }
}
