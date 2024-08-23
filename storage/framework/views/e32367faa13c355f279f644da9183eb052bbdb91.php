<form action="/panel/financial/charge" method="post" id="cartForm">
                            <?php echo e(csrf_field()); ?>

                            <input type="amount" name="amount" value="<?php echo e($amount); ?>">
                            <input type="gateway" name="gateway" value="<?php echo e($gateway); ?>">


 </form>

 
<script>

 function submitForm() {
  document.getElementById("cartForm").submit();
}
submitForm() ;
</script><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\api\charge.blade.php ENDPATH**/ ?>