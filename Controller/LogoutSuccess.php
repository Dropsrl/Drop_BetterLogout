<?php
/**
 *
 * Copyright © Drop s.r.l, All rights reserved.
 * @author Enrico Pascucci
 */
namespace Drop\BetterLogout\Controller;

use Drop\BetterLogout\Model\WhereToLand;

class LogoutSuccess {

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Framework\App\Response\Http
     */
    protected $response;

    /**
     * @var \Drop\BetterLogout\Helper\Data
     */
    protected $helper;

    /**
     * @var \Magento\Framework\App\Response\RedirectInterface
     */
    protected $redirect;

    /**
     * Path that needs to be forced to home
     * @var array
     */
    protected $pathToExclude = [
        'customer',
        'checkout'
    ];

    /**
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\App\Response\Http $response
     * @param \Drop\BetterLogout\Helper\Data $helper
     * @param \Magento\Framework\App\Response\RedirectInterface $redirect
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Response\Http $response,
        \Drop\BetterLogout\Helper\Data $helper,
        \Magento\Framework\App\Response\RedirectInterface $redirect
    ) {
        $this->storeManager = $storeManager;
        $this->response = $response;
        $this->helper = $helper;
        $this->redirect = $redirect;
    }

    /**
     * Logout success page
     *
     * @return void
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function beforeExecute()
    {
        if(!$this->helper->getIsEnabled()) {
            return;
        }

        $redirectUrl = $this->redirect->getRedirectUrl();
        $storeCode = $this->storeManager->getStore()->getCode();

        if (
            $this->helper->getLandingConfig() == WhereToLand::HOME_VALUE
            || in_array($this->getArea($redirectUrl, $storeCode), $this->pathToExclude)
        ) {
            $redirectUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_WEB,true);
        }

        $this->response->setRedirect($redirectUrl);
    }

    /**
     * @param $url
     * @param $storeCode
     * @return mixed
     */
    protected function getArea($url, $storeCode) {
        $urlExploder = explode('/', $url);
        return ($url[3] == $storeCode) ? $urlExploder[4] : $urlExploder[3];
    }
}
