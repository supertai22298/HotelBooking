<?php

namespace App\Providers;

use App\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
        //
        View::composer('admin.layout.masterpage', function($view){
            $notifications = Notification::orderBy('created_at', 'desc')->where('read_at', null)->get();
            $view->with('notifications', $notifications);
        });
    }
}   
