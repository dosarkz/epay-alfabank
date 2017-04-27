<?php
namespace Dosarkz\EPayAlfaBank\Facades;

use Illuminate\Support\Facades\Facade;

class AlfaBank extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'alfabank'; }

}