<?php 

/**
 * Created By sadaimudiNaadhar 
 * @author https://github.com/sadaimudiNaadhar
 *
 */

namespace Sadaimudinaadhar\Tinyurl\Facades;
use Illuminate\Support\Facades\Facade;

class TinyUrl extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tinyurl';
    }
}