<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('update.forms')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo e(getAdminPanelUrl("/forms/{$form->id}/submissions/{$submission->id}/update")); ?>" method="post" class="mt-30">
                                <?php echo e(csrf_field()); ?>


                                <?php $__currentLoopData = $form->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $item = $submission->items->where('form_field_id', $field->id)->first();
                                        $value = null;

                                        if (!empty($item)) {
                                            $value = $item->value;
                                        }
                                    ?>

                                    <?php if($field->type == "input"): ?>
                                        <div class="form-group">
                                            <label class="input-label" for="code"><?php echo e($field->title); ?>:</label>
                                            <input type="text" name="fields[<?php echo e($field->id); ?>]" class="form-control <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($value); ?>" >
                                            <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    <?php elseif($field->type == "number"): ?>
                                        <div class="form-group">
                                            <label class="input-label" for="code"><?php echo e($field->title); ?>:</label>
                                            <input type="number" name="fields[<?php echo e($field->id); ?>]" class="form-control <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($value); ?>" >
                                            <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    <?php elseif($field->type == "textarea"): ?>
                                        <div class="form-group">
                                            <label class="input-label" for="code"><?php echo e($field->title); ?>:</label>
                                            <textarea rows="4" name="fields[<?php echo e($field->id); ?>]" class="form-control <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" ><?php echo e($value); ?></textarea>
                                            <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    <?php elseif($field->type == "upload"): ?>
                                        <div class="form-group">
                                            <label class="input-label"><?php echo e($field->title); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="input-group-text panel-file-manager" disabled data-input="upload_<?php echo e($field->id); ?>" data-preview="holder">
                                                        <i class="fa fa-upload"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="fields[<?php echo e($field->id); ?>]" id="upload_<?php echo e($field->id); ?>" class="form-control <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($value); ?>" />
                                                <div class="input-group-append">
                                                    <button type="button" class="input-group-text admin-file-view" data-input="upload_<?php echo e($field->id); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    <?php elseif($field->type == "date_picker"): ?>
                                        <div class="form-group">
                                            <label class="input-label"><?php echo e($field->title); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="dateRangeLabel<?php echo e($field->id); ?>">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                </div>

                                                <input type="text" name="fields[<?php echo e($field->id); ?>]" class="form-control text-center datetimepicker <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       aria-describedby="dateRangeLabel<?php echo e($field->id); ?>" autocomplete="off" value="<?php echo e($value); ?>" />
                                            </div>

                                            <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    <?php elseif($field->type == "toggle"): ?>
                                        <div class="mb-20">
                                            <div class="d-flex align-items-center ">
                                                <label class="mb-0 mr-10 cursor-pointer" for="toggle<?php echo e($field->id); ?>"><?php echo e($field->title); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="fields[<?php echo e($field->id); ?>]" class="custom-control-input" id="toggle<?php echo e($field->id); ?>" <?php echo e(($value == "on" ? 'checked' : '')); ?> >
                                                    <label class="custom-control-label" for="toggle<?php echo e($field->id); ?>"></label>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    <?php elseif($field->type == "dropdown"): ?>
                                        <?php if(!empty($field->options) and count($field->options)): ?>
                                            <div class="form-group">
                                                <label class="input-label"><?php echo e($field->title); ?>:</label>
                                                <select name="fields[<?php echo e($field->id); ?>]" class="form-control <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                                                    <option value="" class=""><?php echo e(trans('update.select_a_option')); ?></option>
                                                    <?php $__currentLoopData = $field->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($option->id); ?>" <?php echo e(($value == $option->id) ? 'selected' : ''); ?>><?php echo e($option->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        <?php endif; ?>

                                    <?php elseif($field->type == "checkbox"): ?>
                                        <?php
                                            if (!empty($value)) {
                                                $value = json_decode($value, true);
                                            }
                                        ?>

                                        <?php if(!empty($field->options) and count($field->options)): ?>
                                            <div class="form-group">
                                                <label class="input-label"><?php echo e($field->title); ?>:</label>

                                                <?php $__currentLoopData = $field->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="custom-control custom-checkbox mt-10">
                                                        <input type="checkbox" name="fields[<?php echo e($field->id); ?>][]" value="<?php echo e($option->id); ?>" class="custom-control-input" id="checkbox<?php echo e($option->id); ?>" <?php echo e((is_array($value) and in_array($option->id, $value)) ? 'checked' : ''); ?> >
                                                        <label class="custom-control-label font-14" for="checkbox<?php echo e($option->id); ?>"><?php echo e($option->title); ?></label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        <?php endif; ?>

                                    <?php elseif($field->type == "radio"): ?>
                                        <?php if(!empty($field->options) and count($field->options)): ?>
                                            <div class="form-group">
                                                <label class="input-label"><?php echo e($field->title); ?>:</label>

                                                <?php $__currentLoopData = $field->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="custom-control custom-radio mt-10">
                                                        <input type="radio" name="fields[<?php echo e($field->id); ?>]" value="<?php echo e($option->id); ?>" class="custom-control-input" id="radio<?php echo e($option->id); ?>" <?php echo e(($value == $option->id) ? 'checked' : ''); ?> >
                                                        <label class="custom-control-label font-14" for="radio<?php echo e($option->id); ?>"><?php echo e($option->title); ?></label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                <div class="d-flex align-items-center justify-content-end mt-30">
                                    <button type="button" class="js-clear-form btn btn-outline-primary mr-2"><?php echo e(trans('update.clear_form')); ?></button>

                                    <button type="submit" class="btn btn-primary"><?php echo e(trans('update.submit_form')); ?></button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/form_submissions_details.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\forms\submissions\details.blade.php ENDPATH**/ ?>