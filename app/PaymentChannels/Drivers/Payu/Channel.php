<?php

namespace App\PaymentChannels\Drivers\Payu;

use App\Models\Order;
use App\Models\PaymentChannel;
use App\PaymentChannels\BasePaymentChannel;
use App\PaymentChannels\IChannel;
use Illuminate\Http\Request;
use Tzsk\Payu\Concerns\Attributes;
use Tzsk\Payu\Concerns\Customer;
use Tzsk\Payu\Concerns\Transaction;
use Tzsk\Payu\Facades\Payu;

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
        $customer = Customer::make()
            ->firstName($order->user->full_name)
            ->email(!empty($order->user->email) ? $order->user->email : 'john@example.com');

        $attributes = Attributes::make()
            ->udf1($order->id)
            ->udf2($order->user->id);

        $transaction = Transaction::make()
            ->charge($this->makeAmountByCurrency($order->total_amount, $this->currency))
            ->for('Product')
            ->with($attributes)
            ->to($customer);

        return Payu::initiate($transaction)->redirect(route('payment_verify', ['gateway' => 'Payu']));
    }

    public function verify(Request $request)
    {
        $transaction = Payu::capture();

        $order_id = $transaction->response('udf1');
        $user_id = $transaction->response('udf2');

        $order = Order::where('id', $order_id)
            ->where('user_id', $user_id)
            ->first();

        if (!empty($order)) {
            if ($transaction->successful()) {
                $order->update(['status' => Order::$paying]);
            } elseif ($transaction->failed()) {
                $order->update(['status' => Order::$fail]);
            } elseif ($transaction->pending()) {
                $order->update(['status' => Order::$pending]);
            }
        }

        return $order;
    }
}
