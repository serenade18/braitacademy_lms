<form action="/cart/storeCheckout" method="post" id="cartForm">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="discount_id" value="<?php echo e($discount_id); ?>">

 </form>


<script>

 function submitForm() {
  document.getElementById("cartForm").submit();
}
submitForm() ;
</script>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\api\checkout.blade.php ENDPATH**/ ?>