<?php

/**
 * Created By sadaimudiNaadhar 
 * @author https://github.com/sadaimudiNaadhar
 *
 */

namespace Sadaimudinaadhar\Tinyurl;

use Illuminate\Support\Facades\DB;

class TinyUrls {

	private $url_prefix;
    public function __construct() {

        $this->url_prefix = config('tinyurls.URL_PREFIX');

    }

    public function create($url = null) {

        if (self::validateURL($url)) {
            $tinyCode = self::generateUniqueTinyCode(self::getMinLength());
            DB::table(self::getTableName())->insert([
            	'short_code' => $tinyCode, 
            	'short_url' => url($this->url_prefix . '/' . $tinyCode) , 
            	'long_url' => $url, 
            	'created_at' => date("Y-m-d H:i:s") , 
            	'updated_at' => date("Y-m-d H:i:s") 
            ]);
            return url($this->url_prefix . '/' . $tinyCode);
        }
        else {

            return "Please input or specify a valid URL!";
        }

    }

    public function getLongUrl($code = null) {

        if ($code != null) {
            $query = DB::table(self::getTableName())->select('long_url')
                ->where('short_code', '=', $code)->first();
            if ($query != null) {
                return redirect($query->long_url);
            }
            else {
                return "No URL found for code " . $code;
            }
        }
        else {
            return "No URL found for code " . $code;
        }

    }

    private function getTableName() {

        if (array_key_exists("TABLE", config('tinyurls'))) {

            if (is_string(config('tinyurls.TABLE')) === false) {
                print "Table name must be  a string";
                exit;
            }
            else {
                return config('tinyurls.TABLE');
            }

        }
        else {
            print "TABLE key in file " . config_path('tinyurls') . " corrupted or can't fetch";
            exit;
        }
    }

    private function getMinLength() {

        if (array_key_exists("MIN_LENGTH", config('tinyurls'))) {

            if (is_int(config('tinyurls.MIN_LENGTH')) === false) {
                print "Your variable is not an integer";
                exit;
            }
            else {
                return config('tinyurls.MIN_LENGTH');
            }

        }
        else {

            print "MIN_LENGTH key in file " . config_path('tinyurls') . " corrupted or can't fetch";
            exit;
        }
    }

    private function validateURL($url) {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return true;
        }
        else {
            return false;
        }
    }

    private function generateUniqueTinyCode($length = 4) {
        if (config('tinyurls.USE_NUMBERS')) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        else {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }

        $charactersLength = strlen($characters);
        $randomCode = '';
        for ($i = 0;$i < $length;$i++) {
            $randomCode .= $characters[rand(0, $charactersLength - 1) ];
        }

        // Checks code already generated
        $codeAlreadyExist = DB::table(self::getTableName())->where('short_code', '=', $randomCode)->exists();
        if ($codeAlreadyExist) {
            return self::generateUniqueTinyCode(self::getMinLength());
        }
        else {
            return $randomCode;
        }

    }

}

