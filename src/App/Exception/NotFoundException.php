<?php

namespace App\Exception;

use Exception;

class NotFoundException extends Exception
{

    function __construct() {

        parent::__construct( 'NotFound', 404 );

    }
    
}