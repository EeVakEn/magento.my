<?php

namespace ICreative\AboutStore\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

class About implements ArgumentInterface
{

    private \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig;
    private \Magento\Theme\Block\Html\Header\Logo $logo;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Theme\Block\Html\Header\Logo $logo
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->logo = $logo;
    }
    /**
     * Get logo image URL
     *
     * @return stringcall to a member function getabout() on null in magento
     */
    public function getLogoSrc()
    {
        return $this->logo->getLogoSrc();
    }

    /**
     * Get logo text
     *
     * @return string
     */
    public function getLogoAlt()
    {
        return $this->logo->getLogoAlt();
    }

    public function getAbout(){
        return $this->scopeConfig->getValue(
            'general/store_information/about',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getLinkedIn(){
        return $this->scopeConfig->getValue(
            'general/store_information/linkedin',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    public function getFacebook(){
        return $this->scopeConfig->getValue(
            'general/store_information/facebook',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    public function getTwitter(){
        return $this->scopeConfig->getValue(
            'general/store_information/twitter',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
