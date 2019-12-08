<?php
namespace ServerPlanning\Exceptions;

class InvalidResourceException extends \Exception
{
    public function __construct($resource, $value)
    {
        parent::__construct("$resource must be positive integer greater than or equal 1. $value given ");
    }
}