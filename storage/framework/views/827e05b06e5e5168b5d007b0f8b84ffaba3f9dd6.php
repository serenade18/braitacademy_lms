<form action="<?php echo e(route('payRegistrationPackage')); ?>" method="post" id="cartForm">
    <?php echo e(csrf_field()); ?>

    <input name="id" value="<?php echo e($package_id); ?>" type="hidden">

</form>



<script>

 function submitForm() {
  document.getElementById("cartForm").submit();
}
submitForm() ;
</script>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\api\registration_package.blade.php ENDPATH**/ ?>