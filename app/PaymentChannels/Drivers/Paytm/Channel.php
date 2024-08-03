<?php

namespace App\PaymentChannels\Drivers\Paytm;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Order;
use App\Models\PaymentChannel;
use App\PaymentChannels\BasePaymentChannel;
use App\PaymentChannels\IChannel;
use Illuminate\Http\Request;

class Channel extends BasePaymentChannel implements IChannel
{
    protected $currency;
    /**
     * Channel constructor.
     * @param PaymentChannel $paymentChannel
     */
    public function __construct(PaymentChannel $paymentChannel)
    {
        $this->currency = currency();
    }

    public function paymentRequest(Order $order)
    {
        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => $order->id,
            'user' => $order->user_id,
            'email' => $order->user->email,
            'mobile_number' => $order->user->mobile,
            'amount' => $this->makeAmountByCurrency($order->total_amount, $this->currency),
            'callback_url' => $this->makeCallbackUrl($order)
        ]);

        return $payment->receive();
    }

    private function makeCallbackUrl(Order $order)
    {
        $callbackUrl = route('payment_verify_post', [
            'gateway' => 'Paytm'
        ]);

        return $callbackUrl;
    }

    public function verify(Request $request)
    {
        $paytmWallet = PaytmWallet::with('receive');

        $order = Order::find($paytmWallet->getOrderId());

        if ($paytmWallet->isSuccessful()) {
            $order->update(['status' => Order::$paying]);
        } else if($paytmWallet->isFailed()){
            $order->update(['status' => Order::$fail]);
        }

        return $order;
    }
}
