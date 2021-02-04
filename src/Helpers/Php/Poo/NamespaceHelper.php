<?php

namespace Zend\Ext\Helpers\Php\Poo;

use Zend\View\Helper\AbstractHelper;


class NamespaceHelper extends AbstractHelper
{
    protected $count = 0;

    public function __invoke($namepsace)
    {
        // Play with Filter
        return strtolower($namepsace);
    }
}
