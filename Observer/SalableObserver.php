<?php

namespace Web4Pro\AuthorizationPrice\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Web4Pro\AuthorizationPrice\Helper\Data as Helper;

class SalableObserver implements ObserverInterface
{
    protected $_helper;

    public function __construct(
        Helper $helper
    ) {
        $this->_helper = $helper;
    }

    public function execute(Observer $observer)
    {
        if ($this->_helper->isAvailablePrice() && !$this->_helper->getIsLoggedIn()) {
            $salable = $observer->getEvent()->getSalable();
            $salable->setIsSalable(false);
        }
    }
}
