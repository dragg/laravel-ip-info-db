<?php

namespace Dragg\IPInfoDB\Exceptions;



class InvalidAPIKeyException extends IPInfoDBException
{
    /**
     * @var int
     */
    protected $statusCode = 400;
}
