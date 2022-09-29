<?php

Route::group([
    'prefix' => 'admin/pagespeed',
    'middleware' => ['web', 'admin']
], function () {

    Route::get('', 'ACME\PageSpeed\Http\Controllers\Admin\PageSpeedController@index')->defaults('_config', [
        'view' => 'pagespeed::admin.index',
    ])->name('admin.pagespeed.index');

    Route::get('/getInfo', 'ACME\PageSpeed\Http\Controllers\Admin\PageSpeedController@getSiteInfo')->defaults('_config', [
        'view' => 'pagespeed::admin.index',
    ])->name('admin.pagespeed.getSiteInfo');

});