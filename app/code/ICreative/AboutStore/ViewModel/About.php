<?php

namespace ICreative\AboutStore\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

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
     * @return string
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
}
