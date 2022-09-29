<?php

Route::group([
        'prefix'     => 'pagespeed',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {

        Route::get('/', 'ACME\PageSpeed\Http\Controllers\Shop\PageSpeedController@index')->defaults('_config', [
            'view' => 'pagespeed::shop.index',
        ])->name('shop.pagespeed.index');

});