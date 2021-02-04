<?php
/**
 * Zend Extension (https://github.com/Glash-Gnome)
 *
 * @link      https://github.com/Glash-Gnome/zend-ext for the canonical source repository
 * @copyright Copyright (c) 2021-2021 Glash. <5312910@php.net>
 * @license   GPL 3.0
 */

namespace Zend\Ext\Exceptions;

//use Zend\Stdlib\Exception\ExceptionInterface;
use Error;
use Throwable;

/**
 * Invalid Argument Exception
 */
class NoSuchFileException extends Error
{
    public function __construct ( string $message = "" , int $code = 0 , Throwable $previous = null ) {
        parent::__construct($message, $code, $previous);
    }
}
