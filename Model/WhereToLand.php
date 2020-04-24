<?php

namespace Drop\BetterLogout\Model;

class WhereToLand implements \Magento\Framework\Option\ArrayInterface
{

    const HOME_VALUE = 'home';
    const CURRENT_VALUE = 'current';

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::HOME_VALUE, 'label' => __('Home Page')],
            ['value' => self::CURRENT_VALUE, 'label' => __('Current Page')]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            self::HOME_VALUE => __('Home Page'),
            self::CURRENT_VALUE => __('Current Page')
        ];
    }
}
