<form action="/panel/financial/pay-subscribes" method="post" id="cartForm">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($id); ?>">
                            <input type="hidden" name="amount" value="<?php echo e($amount); ?>">


 </form>

 
<script>

 function submitForm() {
  document.getElementById("cartForm").submit();
}
submitForm() ;
</script><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\api\subscribe.blade.php ENDPATH**/ ?>