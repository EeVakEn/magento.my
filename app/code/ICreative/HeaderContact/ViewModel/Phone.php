<?php

namespace ICreative\HeaderContact\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

class Phone implements ArgumentInterface
{
    private ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getStorePhone()
    {
        return $this->scopeConfig->getValue(
            'general/store_information/phone',
            ScopeInterface::SCOPE_STORE
        );
    }
}
