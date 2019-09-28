<?php

namespace App\Providers;

use App\Notification;
use Illuminate\Support\Facades\Auth;
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
            $notifications = Notification::where('read_at', null)->orderBy('created_at', 'desc')->get();
            $view->with('notifications', $notifications);
        });
        View::composer('page_layout.page_masterpage', function($view){
            $userNotifications = Notification::where([['user_id', Auth::user()->id],['user_read_at', null]])->orderBy('created_at', 'desc')->get();
            $view->with('userNotifications', $userNotifications);
        });
    }
}   
