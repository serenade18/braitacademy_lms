

<form style="display: none" method="POST" action="<?php echo e($action_url); ?>" id="payhere-checkout-form">
    <input type="hidden" name="merchant_id" value="<?php echo e($merchant_id); ?>">
    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="<?php echo e($return_url); ?>">
    <input type="hidden" name="cancel_url" value="<?php echo e($cancel_url); ?>">
    <input type="hidden" name="notify_url" value="<?php echo e($notify_url); ?>">
    <br><br>Custom Params<br>
    <input type="text" name="custom_1" value="<?php echo e($order_id); ?>">
    <input type="text" name="custom_2" value="">
    <br><br>Item Details<br>
    <input type="text" name="order_id" value="<?php echo e($order_id); ?>">
    <input type="text" name="items" value="<?php echo e(trans("checkout_payment")); ?>"><br>
    <input type="text" name="currency" value="<?php echo e($currency); ?>">
    <input type="text" name="amount" value="<?php echo e($amount); ?>">
    <br><br>Customer Details<br>
    <input type="text" name="first_name" value="<?php echo e($first_name); ?>">
    <input type="text" name="last_name" value="<?php echo e($last_name); ?>"><br>
    <input type="text" name="email" value="<?php echo e($email); ?>">
    <input type="text" name="phone" value="<?php echo e($phone); ?>"><br>
    <input type="text" name="address" value="<?php echo e($address); ?>">
    <input type="text" name="city" value="<?php echo e($city); ?>">
    <input type="hidden" name="country" value="Sri Lanka"><br><br>
    <input type="submit" value="Buy Now">

</form>


<script type="text/javascript">
    var payhere_checkout_form =  document.getElementById('payhere-checkout-form');
    payhere_checkout_form.submit();
</script>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\cart\channels\payhere_checkout_form.blade.php ENDPATH**/ ?>