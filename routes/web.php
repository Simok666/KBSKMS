<?php

use Illuminate\Support\Facades\Route;

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

        return view($view);
    });
});
