<div class="card">
    <div class="card-body">

        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                <select name="locale" class="form-control <?php echo e(!empty($template) ? 'js-edit-content-locale' : ''); ?>">
                    <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['locale'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        <?php else: ?>
            <input type="hidden" name="locale" value="<?php echo e(getDefaultLocale()); ?>">
        <?php endif; ?>

        <div class="form-group">
            <label class="control-label"><?php echo trans('public.title'); ?></label>
            <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($template) ? $template->title : old('title')); ?>">
            <div class="invalid-feedback"><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('admin/main.template_image')); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text admin-file-manager " data-input="image" data-preview="holder">
                        <i class="fa fa-upload"></i>
                    </button>
                </div>
                <input type="text" name="image" id="image" value="<?php echo e(!empty($template) ? $template->image : old('image')); ?>" class="js-certificate-image form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-prefix="<?php echo e(url('')); ?>"/>
                <div class="invalid-feedback"><?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
            </div>
            <div class="invalid-feedback"><?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.certificate_template_image_hint')); ?></div>
        </div>

        <div class="form-group">
            <label class="control-label"><?php echo trans('public.type'); ?></label>
            <select name="type" class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <option value=""><?php echo e(trans('admin/main.select_type')); ?></option>
                <option value="quiz" <?php echo e((!empty($template) and $template->type == 'quiz') ? 'selected' : ''); ?>><?php echo e(trans('update.quiz_related')); ?></option>
                <option value="course" <?php echo e((!empty($template) and $template->type == 'course') ? 'selected' : ''); ?>><?php echo e(trans('update.course_completion')); ?></option>
                <option value="bundle" <?php echo e((!empty($template) and $template->type == 'bundle') ? 'selected' : ''); ?>><?php echo e(trans('update.bundle_completion')); ?></option>
            </select>
            <div class="invalid-feedback"><?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
        </div>


        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element => $elementValues): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($elementValues)): ?>
                <div data-element="<?php echo e($element); ?>" class="accordion-row bg-white rounded-sm border border-gray300 mt-20 py-15 py-lg-30 px-10 px-lg-20">
                    <div class="d-flex align-items-center justify-content-between " role="tab" id="<?php echo e($element); ?>_accordion">
                        <div class="d-flex align-items-center" href="#<?php echo e($element); ?>_accordion_collapse" aria-controls="<?php echo e($element); ?>_accordion_collapse" role="button"
                             data-toggle="collapse"
                             aria-expanded="true">

                            <div class="font-weight-bold text-dark-blue d-block cursor-pointer"><?php echo e(trans("update.certificate_{$element}")); ?></div>
                        </div>

                        <div class="d-flex align-items-center">
                            <?php $__currentLoopData = $elementValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elementValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $isActiveElement = (!empty($template) and !empty($template->elements) and !empty($template->elements[$element]) and !empty($template->elements[$element][$elementValue['name']])) ? $template->elements[$element][$elementValue['name']] : null;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <span class="js-status-element text-success mr-2 <?php echo e(!empty($isActiveElement) ? '' : 'd-none'); ?>"><?php echo e(trans('admin/main.active')); ?></span>

                            <div class="d-flex align-items-center">
                                <i class="fa fa-chevron-down" href="#<?php echo e($element); ?>_accordion_collapse" aria-controls="<?php echo e($element); ?>_accordion_collapse" role="button" data-toggle="collapse" aria-expanded="true"></i>
                            </div>
                        </div>
                    </div>

                    <div id="<?php echo e($element); ?>_accordion_collapse" aria-labelledby="<?php echo e($element); ?>_accordion" class="collapse" role="tabpanel">
                        <div class="panel-collapse text-gray">

                            <?php $__currentLoopData = $elementValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elementValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $storedData = (!empty($template) and !empty($template->elements) and !empty($template->elements[$element]) and !empty($template->elements[$element][$elementValue['name']])) ? $template->elements[$element][$elementValue['name']] : null;
                                ?>

                                <?php if($elementValue['type'] == 'text_input'): ?>
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e($elementValue['label']); ?>:</label>
                                        <input type="text" name="elements[<?php echo e($element); ?>][<?php echo e($elementValue['name']); ?>]" class="js-changeable-element-input js-element-<?php echo e($elementValue['name']); ?> form-control" value="<?php echo e(!empty($storedData) ? $storedData : ''); ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if($elementValue['type'] == 'number_input'): ?>
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e($elementValue['label']); ?>:</label>
                                        <input type="number" name="elements[<?php echo e($element); ?>][<?php echo e($elementValue['name']); ?>]" class="js-changeable-element-input js-element-<?php echo e($elementValue['name']); ?> form-control" value="<?php echo e(!empty($storedData) ? $storedData : ''); ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if($elementValue['type'] == 'file_input_manager'): ?>
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e($elementValue['label']); ?>:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="input-group-text admin-file-manager " data-input="elements_<?php echo e($element); ?>_<?php echo e($elementValue['name']); ?>" data-preview="holder">
                                                    <i class="fa fa-upload"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="elements[<?php echo e($element); ?>][<?php echo e($elementValue['name']); ?>]" id="elements_<?php echo e($element); ?>_<?php echo e($elementValue['name']); ?>" value="<?php echo e(!empty($storedData) ? $storedData : ''); ?>" class="js-changeable-element-input js-element-<?php echo e($elementValue['name']); ?> form-control" data-prefix="<?php echo e(url('')); ?>"/>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($elementValue['type'] == 'color_input'): ?>
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e($elementValue['label']); ?>:</label>
                                        <div class="input-group colorpickerinput">
                                            <input type="text" name="elements[<?php echo e($element); ?>][<?php echo e($elementValue['name']); ?>]" class="js-changeable-element-input js-element-<?php echo e($elementValue['name']); ?> form-control" value="<?php echo e(!empty($storedData) ? $storedData : '#000'); ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-fill-drip"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($elementValue['type'] == 'switch'): ?>
                                    <div class="form-group d-flex align-items-center cursor-pointer">
                                        <div class="custom-control custom-switch align-items-start">
                                            <input type="checkbox" name="elements[<?php echo e($element); ?>][<?php echo e($elementValue['name']); ?>]" class="js-element-<?php echo e($elementValue['name']); ?> custom-control-input <?php echo e(($elementValue['name'] != 'enable') ? 'js-changeable-element-input' : ''); ?>" id="<?php echo e($element); ?>_<?php echo e($elementValue['name']); ?>Switch" <?php echo e(!empty($storedData) ? 'checked' : ''); ?>>
                                            <label class="custom-control-label" for="<?php echo e($element); ?>_<?php echo e($elementValue['name']); ?>Switch"></label>
                                        </div>
                                        <label for="<?php echo e($element); ?>_<?php echo e($elementValue['name']); ?>Switch" class="mb-0 cursor-pointer"><?php echo e($elementValue['label']); ?></label>
                                    </div>
                                <?php endif; ?>

                                <?php if($elementValue['type'] == 'textarea'): ?>
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e($elementValue['label']); ?>:</label>
                                        <textarea name="elements[<?php echo e($element); ?>][<?php echo e($elementValue['name']); ?>]" class="js-changeable-element-input js-element-<?php echo e($elementValue['name']); ?> form-control" rows="4"><?php echo e(!empty($storedData) ? $storedData : ''); ?></textarea>
                                    </div>
                                <?php endif; ?>

                                <?php if($elementValue['type'] == 'select'): ?>
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e($elementValue['label']); ?>:</label>
                                        <select name="elements[<?php echo e($element); ?>][<?php echo e($elementValue['name']); ?>]" class="js-changeable-element-input js-element-<?php echo e($elementValue['name']); ?> form-control">
                                            <?php $__currentLoopData = $elementValue['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionName => $optionLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($optionName); ?>" <?php echo e((!empty($storedData) and $storedData == $optionName) ? 'selected' : ''); ?>><?php echo e($optionLabel); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <?php if($element == 'date'): ?>
                                <input type="hidden" name="elements[<?php echo e($element); ?>][content]" class="js-element-content" value="[date]">
                            <?php elseif($element == 'qr_code'): ?>
                                <input type="hidden" name="elements[<?php echo e($element); ?>][content]" class="js-element-content" value="[qr_code]">
                            <?php elseif($element == 'student_name'): ?>
                                <input type="hidden" name="elements[<?php echo e($element); ?>][content]" class="js-element-content" value="[student_name]">
                            <?php elseif($element == 'instructor_name'): ?>
                                <input type="hidden" name="elements[<?php echo e($element); ?>][content]" class="js-element-content" value="[instructor_name]">
                            <?php elseif($element == 'platform_name'): ?>
                                <input type="hidden" name="elements[<?php echo e($element); ?>][content]" class="js-element-content" value="[platform_name]">
                            <?php elseif($element == 'course_name'): ?>
                                <input type="hidden" name="elements[<?php echo e($element); ?>][content]" class="js-element-content" value="[course_name]">
                            <?php elseif($element == 'instructor_signature'): ?>
                                <input type="hidden" name="elements[<?php echo e($element); ?>][content]" class="js-element-content" value="[instructor_signature]">
                            <?php elseif($element == 'user_certificate_additional'): ?>
                                <input type="hidden" name="elements[<?php echo e($element); ?>][content]" class="js-element-content" value="[user_certificate_additional]">
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <input type="hidden" name="template_contents" class="js-template-contents" value="<?php echo e((!empty($template) and !empty($template->body)) ? $template->body : ''); ?>">

        <div class="form-group custom-switches-stacked mt-3">
            <label class="custom-switch pl-0">
                <input type="hidden" name="status" value="draft">
                <input type="checkbox" id="status" name="status" value="publish" <?php echo e((!empty($template) and $template->status == 'publish') ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                <span class="custom-switch-indicator"></span>
                <label class="custom-switch-description mb-0 cursor-pointer" for="status"><?php echo e(trans('admin/main.active')); ?></label>
            </label>
        </div>


        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary"><?php echo e(trans('save')); ?></button>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\certificates\create_template\template-form.blade.php ENDPATH**/ ?>