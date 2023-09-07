<?php

use MityDigital\Feedamic\Http\Controllers\FeedamicController;
use MityDigital\Feedamic\Feedamic;


collect(config('feedamic.routes'))->each(function ($route, $type) {
    Route::get($route, [FeedamicController::class, $type]);
});
