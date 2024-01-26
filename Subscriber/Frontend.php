<?php

namespace EasyCreditHideForB2b\Subscriber;

use Enlight\Event\SubscriberInterface;

class Frontend implements SubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Modules_Admin_GetPaymentMeans_DataFilter' => 'onFilterPaymentMethods',
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onFilterPaymentMethods(\Enlight_Event_EventArgs $args)
    {
        $paymentMeans = $args->getReturn();

        $this->helper = new \EasyCredit_Helper();
        $this->_userData = $this->helper->getUser();

	foreach ($paymentMeans as $key => $payment) {
            if ($payment['name'] === 'easycredit' && $this->_userData['billingaddress']['company']) {
		unset($paymentMeans[$key]);
                continue;
            }
        }
        $args->setReturn($paymentMeans);
    }
}
