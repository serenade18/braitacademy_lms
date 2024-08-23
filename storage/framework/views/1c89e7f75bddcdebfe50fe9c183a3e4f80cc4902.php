<script src="//pay.voguepay.com/js/voguepay.js"></script>

<script>
    closedFunction = function () {
        location.href = '<?php echo e($closedUrl); ?>'
    }

    successFunction = function (transaction_id) {
        location.href = '<?php echo e($successUrl); ?>' + '&transaction_id=' + transaction_id
    }

    failedFunction = function (transaction_id) {
        location.href = '<?php echo e($failedUrl); ?>' + '&transaction_id=' + transaction_id
    }
</script>
<?php if($test_mode): ?>
    <input type="hidden" id="merchant_id" name="v_merchant_id" value="demo">
<?php else: ?>
    <input type="hidden" id="merchant_id" name="v_merchant_id" value="<?php echo e($voguepay_merchant_id); ?>">
<?php endif; ?>

<script>

    window.onload = function () {
        pay3();
    }

    function pay3() {
        Voguepay.init({
            v_merchant_id: document.getElementById("merchant_id").value,
            total: '<?php echo e($total_amount); ?>',
            cur: '<?php echo e($currency); ?>',
            merchant_ref: 'ref123',
            memo: 'Payment',
            developer_code: '5a61be72ab323',
            store_id: 1,
            loadText: 'Custom load text',

            customer: {
                name: '<?php echo e($userData['name']); ?>',
                address: '<?php echo e($userData['address']); ?>',
                city: '<?php echo e($userData['city']); ?>',
                state: 'Customer state',
                zipcode: '<?php echo e($userData['postcode']); ?>',
                email: '<?php echo e($userData['email']); ?>',
                phone: '<?php echo e($userData['phone']); ?>'
            },
            closed: closedFunction,
            success: successFunction,
            failed: failedFunction
        });
    }
</script>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\cart\channels\voguepay.blade.php ENDPATH**/ ?>