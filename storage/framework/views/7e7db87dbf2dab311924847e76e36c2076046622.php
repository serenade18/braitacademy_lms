
<?php
    $jazzcash_environment = config('jazzcash.environment');
?>
<form name="redirect-to-payment-gateway" method="POST" action="<?php echo e(config("jazzcash.$jazzcash_environment.endpoint")); ?>">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</form>
<script>
    setTimeout(function () {
        document.forms['redirect-to-payment-gateway'].submit();
    }, 1000);
</script>


<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\cart\channels\jazzCash.blade.php ENDPATH**/ ?>