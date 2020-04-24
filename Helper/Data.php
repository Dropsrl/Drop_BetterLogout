<?php

namespace Drop\BetterLogout\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

    const XML_PATH_ENABLE = 'betterlogout/general/enable';
    const XML_PATH_LOGOUTLANDING = 'betterlogout/general/logoutlanding';

    /**
     * @param $field
     * @param null $storeId
     * @return mixed
     */
    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field, ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * @return mixed
     */
    public function getLandingConfig()
    {
        return $this->getConfigValue(self::XML_PATH_LOGOUTLANDING);
    }

    /**
     * @return mixed
     */
    public function getIsEnabled()
    {
        return $this->getConfigValue(self::XML_PATH_ENABLE);
    }
}
