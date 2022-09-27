<?php

namespace ICreative\Navigation\Block;

class CustomLink extends \Magento\Framework\View\Element\Html\Link
{
    public function getHref()
    {
        return 'https://www.google.com/';
    }

    public function getTarget()
    {
        return '_blank';
    }

    public function getClass()
    {
        return 'level0 nav-6 category-item level-top';
    }
}
