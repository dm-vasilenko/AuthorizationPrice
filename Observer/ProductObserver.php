<?php

namespace Web4Pro\AuthorizationPrice\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Web4Pro\AuthorizationPrice\Helper\Data as Helper;

class ProductObserver implements ObserverInterface
{
    protected $_helper;

    public function __construct(
        Helper $helper
    ) {
        $this->_helper = $helper;
    }

    public function execute(Observer $observer)
    {
        /**
         * @var \Magento\Catalog\Model\Product $product
         */
        if ($this->_helper->isAvailablePrice() && !$this->_helper->getIsLoggedIn()) {
            $product = $observer->getEvent()->getProduct();
            $product->setCanShowPrice(false);
        }
    }
}
