<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.new_template')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.new_template')); ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <p class="col-6 col-lg-3"><?php echo e(trans('quiz.student')); ?> : [student] </p>

                        <p class="col-6 col-lg-3"><?php echo e(trans('admin/main.course')); ?> : [course] </p>

                        <p class="col-6 col-lg-3"><?php echo e(trans('quiz.grade')); ?> : [grade] </p>

                        <p class="col-6 col-lg-3"><?php echo e(trans('admin/main.certificate_id')); ?> : [certificate_id] </p>

                        <p class="col-6 col-lg-3"><?php echo e(trans('admin/main.date')); ?> : [date] </p>

                        <p class="col-6 col-lg-3"><?php echo e(trans('admin/main.instructor')); ?> : [instructor_name] </p>

                        <p class="col-6 col-lg-3"><?php echo e(trans('public.duration')); ?> : [duration] </p>

                        <p class="col-6 col-lg-6"><?php echo e(trans('update.user_certificate_additional')); ?> : [user_certificate_additional] </p>
                    </div>

                    <hr class="my-4">

                    <form method="post" action="" id="templateForm" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>


                        <div class="row">
                            <div class="col-lg-6">
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
                                    <label class="control-label" for="inputDefault"><?php echo trans('public.type'); ?></label>
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

                                <div class="form-group">
                                    <label class="control-label" for="inputDefault"><?php echo trans('public.title'); ?></label>
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
unset($__errorArgs, $__bag); ?>"/>
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
                                    <div class="text-muted text-small mt-1"><?php echo e(trans('update.certificate_image_hint')); ?></div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <dov class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="inputDefault"><?php echo trans('admin/main.position_x'); ?></label>
                                    <input type="text" name="position_x" class="form-control <?php $__errorArgs = ['position_x'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($template) ? $template->position_x : old('position_x')); ?>">
                                    <div class="invalid-feedback"><?php $__errorArgs = ['position_x'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                            </dov>
                            <dov class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="inputDefault"><?php echo trans('admin/main.position_y'); ?></label>
                                    <input type="text" name="position_y" class="form-control <?php $__errorArgs = ['position_y'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($template) ? $template->position_y : old('position_y')); ?>">
                                    <div class="invalid-feedback"><?php $__errorArgs = ['position_y'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                            </dov>

                            <dov class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="inputDefault"><?php echo trans('admin/main.font_size'); ?></label>
                                    <input type="text" name="font_size" class="form-control <?php $__errorArgs = ['font_size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($template) ? $template->font_size : old('font_size')); ?>">
                                    <div class="invalid-feedback"><?php $__errorArgs = ['font_size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                            </dov>
                            <dov class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="inputDefault"><?php echo trans('admin/main.text_color'); ?></label>
                                    <input type="text" name="text_color" class="form-control <?php $__errorArgs = ['text_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($template) ? $template->text_color : old('text_color')); ?>">
                                    <div class="invalid-feedback"><?php $__errorArgs = ['text_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                    <div>Example: #e1e1e1</div>
                                </div>
                            </dov>
                        </div>

                        <div class="form-group ">
                            <label class="control-label" for="inputDefault"><?php echo e(trans('admin/main.message_body')); ?></label>
                            <textarea class="form-control <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="9" name="body"><?php echo e((!empty($template)) ? $template->body : old('body')); ?></textarea>
                            <div class="invalid-feedback"><?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>

                        <div class="form-group custom-switches-stacked">
                            <label class="custom-switch pl-0">
                                <input type="hidden" name="rtl" value="0">
                                <input type="checkbox" id="rtl" name="rtl" value="1" <?php echo e((!empty($template) and $template->rtl) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                <span class="custom-switch-indicator"></span>
                                <label class="custom-switch-description mb-0 cursor-pointer" for="rtl"><?php echo e(trans('admin/main.rtl')); ?></label>
                            </label>
                        </div>

                        <div class="form-group custom-switches-stacked">
                            <label class="custom-switch pl-0">
                                <input type="hidden" name="status" value="draft">
                                <input type="checkbox" id="status" name="status" value="publish" <?php echo e((!empty($template) and $template->status == 'publish') ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                <span class="custom-switch-indicator"></span>
                                <label class="custom-switch-description mb-0 cursor-pointer" for="status"><?php echo e(trans('admin/main.active')); ?></label>
                            </label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success pull-left" id="submiter" type="button" data-action="<?php echo e(!empty($template) ? getAdminPanelUrl("/certificates/templates/{$template->id}/update") : getAdminPanelUrl("/certificates/templates/store")); ?>"><?php echo e(trans('public.save')); ?></button>
                                <button class="btn btn-info pull-left" id="preview" type="button" data-action="<?php echo e(getAdminPanelUrl()); ?>/certificates/templates/preview"><?php echo e(trans('admin/main.preview_certificate')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>


    <script src="/assets/default/js/admin/certificates.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/admin/certificates/new_templates.blade.php ENDPATH**/ ?>