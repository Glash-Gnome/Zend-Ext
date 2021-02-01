<?php
/**
 * Zend Extension (https://github.com/Glash-Gnome)
 *
 * @link      https://github.com/Glash-Gnome/zend-ext for the canonical source repository
 * @copyright Copyright (c) 2021-2021 Glash. <5312910@php.net>
 * @license   GPL 3.0
 */

namespace Zend\Ext;

use Traversable;

use function get_class;
use function gettype;
use function is_array;
use function is_object;
use function method_exists;
use function sprintf;

abstract class AbstractGenerator implements GeneratorInterface
{
    /**
     * Line feed to use in place of EOL
     */
    const LINE_FEED = "\n";

    /**
     * @var int|string 4 spaces by default
     */
    protected $indentation = '    ';
    protected $length_line = 80;
    protected $wordwrap = true;
    protected $author = 'Glash';
    protected $email = '5312910@php.net';

    /**
     * AbstractGenerator
     */
    protected $parentGenerator;
    /*
     *
     */
    protected $nameFilter;

    /**
     * @param  array $options
     */
    public function __construct($options = [])
    {
        if ($options) {
            $this->setOptions($options);
        }
    }

    /**
     * @param  string $indentation
     * @return AbstractGenerator
     */
    public function setIndentation($indentation)
    {
        $this->indentation = (string) $indentation;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndentation()
    {
        return $this->indentation;
    }

    /**
     * @param  AbstractGenerator $parentGenerator
     * @return AbstractGenerator
     */
    public function setParentGenerator($parentGenerator)
    {
        $this->parentGenerator = $parentGenerator;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentGenerator()
    {
        return $this->parentGenerator;
    }

    /**
     * @param  array|Traversable $options
     * @throws Exception\InvalidArgumentException
     * @return AbstractGenerator
     */
    public function setOptions($options)
    {
        if (! is_array($options) && ! $options instanceof Traversable) {
            throw new Exception\InvalidArgumentException(sprintf(
                '%s expects an array or Traversable object; received "%s"',
                __METHOD__,
                is_object($options) ? get_class($options) : gettype($options)
            ));
        }

        foreach ($options as $optionName => $optionValue) {
            $methodName = 'set' . $optionName;
            if (method_exists($this, $methodName)) {
                $this->{$methodName}($optionValue);
            }
        }

        return $this;
    }
}
