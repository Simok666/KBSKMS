<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\API\HomeController;

Route::group(['suffix' => '.html'], function () {
   
    Route::get('/{view?}', function ($view = "auth.login") {
        $view = str_replace(["-", ".html"], [".", ""], $view);
        if (!view()->exists($view)) {
            abort(404);
        }

        return view($view);
    });

    Route::get('/{view?}', function ($view = "user.home") {
        $view = str_replace(["-", ".html"], [".", ""], $view);
        if (!view()->exists($view)) {
            abort(404);
        }

        // if ($view === 'user.blogs') {
        //     $shareComponent = \Share::page(
        //         'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
        //         'Your share text comes here'
        //     )
        //     ->facebook()
        //     ->twitter()
        //     ->linkedin()
        //     ->telegram()
        //     ->whatsapp();

        //     return view($view, compact('shareComponent'));
        // }

        return view($view);
    });
});

