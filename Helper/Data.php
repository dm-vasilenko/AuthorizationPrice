<?php

namespace Web4Pro\AuthorizationPrice\Helper;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    protected $_session;

    private $httpContext;

    public function __construct(
        Context $context,
        Session $session,
        HttpContext $httpContext
    ) {
        $this->_session = $session;
        $this->httpContext = $httpContext;
        parent::__construct($context);
    }

    public function isAvailablePrice()
    {
        return $this->scopeConfig->getValue('general/authorization_price/authorization_price_yesno', ScopeInterface::SCOPE_STORE);
    }

    public function getIsLoggedIn()
    {
        $isLoggedIn = $this->httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
        return $isLoggedIn;
    }
}
