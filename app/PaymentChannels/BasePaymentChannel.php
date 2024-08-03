<?php

namespace App\PaymentChannels;


class BasePaymentChannel
{

    public function makeAmountByCurrency($amount, $currency)
    {
        $userCurrencyItem = getUserCurrencyItem(null, $currency);

        return convertPriceToUserCurrency($amount, $userCurrencyItem);
    }
}
