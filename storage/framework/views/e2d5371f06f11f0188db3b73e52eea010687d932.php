<div class="row">
    <div class="col-12 ">

        <button type="button" class="js-add-form-field btn btn-success btn-sm"><?php echo e(trans('update.add_field')); ?></button>

        <ul id="formFieldsCard" class="draggable-content-lists draggable-form-field-lists"
            data-drag-class="draggable-form-field-lists"
            data-path="<?php echo e(getAdminPanelUrl("/forms/{$form->id}/fields/orders")); ?>"
            data-move-class="move-icon"
        >

            <?php if(!empty($form->fields)): ?>
                <?php $__currentLoopData = $form->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('admin.forms.create.includes.field_accordion',['formField' => $field], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </ul>

    </div>
</div>


<div id="newFormField" class="d-none">
    <?php echo $__env->make('admin.forms.create.includes.field_accordion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\forms\create\includes\form_fields.blade.php ENDPATH**/ ?>