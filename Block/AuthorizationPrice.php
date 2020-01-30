<?php

namespace Web4Pro\AuthorizationPrice\Block;

use Magento\Framework\View\Element\Template;
use Web4Pro\AuthorizationPrice\Helper\Data as Helper;

class AuthorizationPrice extends Template
{
    protected $helper;

    public function __construct(Template\Context $context, Helper $helper, array $data = [])
    {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    public function getAccess()
    {
        return $this->helper->isAvailablePrice() && !$this->helper->getIsLoggedIn();
    }
}
