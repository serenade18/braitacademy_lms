<?php
    $elId = "langFileSwitch_{$fileName}";

    if (!empty($folderName)) {
        $elId .= "_{$folderName}";
    }

?>

<div class="form-group d-flex align-items-center mb-1">

    <div class="custom-control custom-checkbox mr-1">
        <input type="checkbox" name="<?php echo e($inputName); ?>[]" value="<?php echo e($fileName); ?>" class="custom-control-input" id="<?php echo e($elId); ?>">
        <label class="custom-control-label" for="<?php echo e($elId); ?>"></label>
    </div>

    <label class="mb-0 cursor-pointer" for="<?php echo e($elId); ?>"><?php echo e($fileName); ?></label>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\translator\lang_file_checkbox.blade.php ENDPATH**/ ?>