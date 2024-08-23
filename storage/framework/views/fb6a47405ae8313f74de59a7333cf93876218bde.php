<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e((!empty($values) and !empty($values[$field->id])) ? $values[$field->id] : old('fields.'.$field->id)); ?>">
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e((!empty($values) and !empty($values[$field->id])) ? $values[$field->id] : old('fields.'.$field->id)); ?>">
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
unset($__errorArgs, $__bag); ?>"><?php echo e((!empty($values) and !empty($values[$field->id])) ? $values[$field->id] : old('fields.'.$field->id)); ?></textarea>
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
                    <button type="button" class="input-group-text panel-file-manager" data-input="upload_<?php echo e($field->id); ?>" data-preview="holder">
                        <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                    </button>
                </div>
                <input type="text" name="fields[<?php echo e($field->id); ?>]" id="upload_<?php echo e($field->id); ?>" class="form-control <?php $__errorArgs = [$field->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e((!empty($values) and !empty($values[$field->id])) ? $values[$field->id] : old('fields.'.$field->id)); ?>"/>
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
                                <i data-feather="calendar" width="18" height="18" class="text-white"></i>
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
                       aria-describedby="dateRangeLabel<?php echo e($field->id); ?>" autocomplete="off" value="<?php echo e((!empty($values) and !empty($values[$field->id])) ? $values[$field->id] : old('fields.'.$field->id)); ?>"/>
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
                    <input type="checkbox" name="fields[<?php echo e($field->id); ?>]" class="custom-control-input" id="toggle<?php echo e($field->id); ?>" <?php echo e((!empty($values) and !empty($values[$field->id]) and $values[$field->id] == "on") ? 'checked' : ((!empty(old('fields.'.$field->id)) and old('fields.'.$field->id) == "on") ? 'checked' : '')); ?>>
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
unset($__errorArgs, $__bag); ?>">
                    <option value="" class=""><?php echo e(trans('update.select_a_option')); ?></option>
                    <?php $__currentLoopData = $field->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($option->id); ?>" <?php echo e((!empty($values) and !empty($values[$field->id]) and $values[$field->id] == $option->id) ? 'selected' : ((!empty(old('fields.'.$field->id)) and old('fields.'.$field->id) == $option->id) ? 'selected' : '')); ?>><?php echo e($option->title); ?></option>
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
        <?php if(!empty($field->options) and count($field->options)): ?>
            <?php
                $checkboxValues = [];

                if (!empty($values) and !empty($values[$field->id])) {
                    $checkboxValues = json_decode($values[$field->id], true);
                } else if (!empty(old('fields.'.$field->id)) and is_array(old('fields.'.$field->id))) {
                    $checkboxValues = old('fields.'.$field->id);
                }
            ?>

            <div class="form-group">
                <label class="input-label"><?php echo e($field->title); ?>:</label>

                <?php $__currentLoopData = $field->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="custom-control custom-checkbox mt-10">
                        <input type="checkbox" name="fields[<?php echo e($field->id); ?>][]" value="<?php echo e($option->id); ?>" class="custom-control-input" id="checkbox<?php echo e($option->id); ?>" <?php echo e(in_array($option->id, $checkboxValues) ? 'checked' : ""); ?>>
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
                        <input type="radio" name="fields[<?php echo e($field->id); ?>]" value="<?php echo e($option->id); ?>" class="custom-control-input" id="radio<?php echo e($option->id); ?>" <?php echo e((!empty($values) and !empty($values[$field->id]) and $values[$field->id] == $option->id) ? 'checked' : ((!empty(old('fields.'.$field->id)) and old('fields.'.$field->id) == $option->id) ? 'checked' : '')); ?>>
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
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\forms\handle_field.blade.php ENDPATH**/ ?>