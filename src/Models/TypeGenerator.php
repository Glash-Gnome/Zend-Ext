<?php
/**
 * Zend Extension (https://github.com/Glash-Gnome)
 *
 * @link      https://github.com/Glash-Gnome/zend-ext for the canonical source repository
 * @copyright Copyright (c) 2021-2021 Glash. <5312910@php.net>
 * @license   GPL 3.0
 */


namespace Zend\Ext\Models;

use Zend\Ext\Models\AbstractGenerator;


class TypeGenerator extends AbstractGenerator
{
    // C types
    const PRIMITIVE_VOID   = 0x00;
    const PRIMITIVE_BOOL   = 0x01;
    const PRIMITIVE_CHAR   = 0x02;
    const PRIMITIVE_SHORT  = 0x03;
    const PRIMITIVE_INT    = 0x04;
    const PRIMITIVE_FLOAT  = 0x05;
    const PRIMITIVE_LONG   = 0x06;
    const PRIMITIVE_DOUBLE = 0x07;
    const PRIMITIVE_UCHAR  = 0x08;
    const PRIMITIVE_USHORT = 0x09;
    const PRIMITIVE_ULONG  = 0x10;
    const PRIMITIVE_UINT   = 0x11;

    const PRIMITIVE_STRING = 0x12;

    const PRIMITIVE_INT8   = 0x13;
    const PRIMITIVE_INT16  = 0x14;
    const PRIMITIVE_INT32  = 0x15;
    const PRIMITIVE_INT64  = 0x16;
    const PRIMITIVE_UINT8  = 0x17;
    const PRIMITIVE_UINT16 = 0x18;
    const PRIMITIVE_UINT32 = 0x19;
    const PRIMITIVE_UINT64 = 0x20;

    /* TODO
'void',
'int',
'float',
'string',
'bool',
'array',      <= int var[], GArray, etc...
'callable',   <= void (*call)(void);GCallback, ...
'iterable',   <= int var[]...
'object'      <= (void*), GObject, ...
    */

    // correspondance entre C->PHP
    private static $internalPhpTypes = [
        self::PRIMITIVE_VOID   =>'void',
        self::PRIMITIVE_BOOL   =>'bool',
        self::PRIMITIVE_CHAR   =>'string',
        self::PRIMITIVE_SHORT  =>'int',
        self::PRIMITIVE_INT    =>'int',
        self::PRIMITIVE_FLOAT  =>'float',
        self::PRIMITIVE_LONG   =>'int',
        self::PRIMITIVE_DOUBLE =>'float',
        self::PRIMITIVE_UCHAR  =>'string',
        self::PRIMITIVE_USHORT =>'int',
        self::PRIMITIVE_ULONG  =>'int',
        self::PRIMITIVE_UINT   =>'int',

        self::PRIMITIVE_STRING =>'string',

        self::PRIMITIVE_INT8   =>'int',
        self::PRIMITIVE_INT16  =>'int',
        self::PRIMITIVE_INT32  =>'int',
        self::PRIMITIVE_INT64  =>'int',
        self::PRIMITIVE_UINT8  =>'int',
        self::PRIMITIVE_UINT16 =>'int',
        self::PRIMITIVE_UINT32 =>'int',
        self::PRIMITIVE_UINT64 =>'int',
    ];

    /**
     * @var bool
     */
    protected $name;
    protected $isArray=False;
    protected $isPrimitive=False;
    protected $expressionArray;

    /**
     *
     */
    public function __construct($name)
    {
        $this->name = $name;
        //parent::__construct($name);
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setArray($isArray=True)
    {
        $this->isArray = $isArray;
        return $this;
    }

    public function isArray()
    {
        return $this->isArray;
    }

    public function setExpressionArray($expressionArray)
    {
        $this->expressionArray = $expressionArray;
        return $this;
    }

    public function getExpressionArray()
    {
        return $this->expressionArray;
    }


    /**
     * @return string
     */
    public function generate_arginfo()
    {
        return $this->getParentGenerator()->getName();
    }
    /**
     * @return string
     */
    public function generate($scope)
    {
        $output = '';// const unsigned char *argv[3]

        $output .= $this->getName();

        /*
        if ($this->isArray()) {
            $output .= '[';
            if ($this->expressionArray!=NULL) {
                $output .= $this->expressionArray;
            }
            $output .= ']';
        }
        */

        return $output;
    }

}