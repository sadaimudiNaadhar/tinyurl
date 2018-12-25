<?php

/**
 * Created By sadaimudiNaadhar 
 * @author https://github.com/sadaimudiNaadhar
 *
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Table  Name
    |--------------------------------------------------------------------------
    | This will be done before running migration
    */

    'TABLE' => 'tiny_urls',

    /*
    |--------------------------------------------------------------------------
    | URL Prefix
    |--------------------------------------------------------------------------
    | This will be the prefix for generated code. EG: v1/xy2e 
    */

    'URL_PREFIX' => 'v1',

    /*
    |--------------------------------------------------------------------------
    | Define Length
    |--------------------------------------------------------------------------
    | The length of code to be generated.
    */

    'MIN_LENGTH' => 4,

    /*
    |--------------------------------------------------------------------------
    | Use numbers in generated code
    |--------------------------------------------------------------------------
    | The generating code will be  in Alphanumeric format. EG: Xy2e
    */

    'USE_NUMBERS' => true,

    /*
    |--------------------------------------------------------------------------
    | Authenticate URL Routes
    |--------------------------------------------------------------------------
    | This will be  make use of Laravel inbuilt Auth.
    */

    'AUTH_URL_ROUTES' => false,
];  
