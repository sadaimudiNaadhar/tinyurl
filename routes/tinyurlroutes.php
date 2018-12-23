<?php

/**
 * Created By sadaimudiNaadhar 
 * @author https://github.com/sadaimudiNaadhar
 *
 */

Route::get(config('tinyurls.URL_PREFIX').'/{code}', function($code) {
    return TinyUrl::getLongUrl($code);
});