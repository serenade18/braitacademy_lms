<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <?php if(!empty(session()->has('send_email_error'))): ?>
                <div class="alert alert-danger my-25">
                    <h4 class="alert-heading">Error !</h4>

                    <p class=""><?php echo e(session()->get('send_email_error')); ?></p>
                </div>

                <?php
                    session()->forget('send_email_error');
                ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(getAdminPanelUrl()); ?>/newsletters/send" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>


                                <div class="row">
                                    <div class="col-12 col-md-8 col-lg-6">

                                        <div class="form-group">
                                            <label><?php echo e(trans('admin/main.title')); ?></label>
                                            <input type="text" name="title"
                                                   class="form-control  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   value="<?php echo e(old('title')); ?>"/>
                                            <?php $__errorArgs = ['title'];
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

                                        <div class="form-group">
                                            <label><?php echo e(trans('update.send_method')); ?></label>
                                            <select name="send_method" class="js-newsletter-send-method form-control">
                                                <option value="send_to_all" <?php echo e(old('send_method') == 'send_to_all' ? 'selected' : ''); ?>><?php echo e(trans('update.send_newsletter_to_all')); ?></option>
                                                <option value="send_to_bcc" <?php echo e(old('send_method') == 'send_to_bcc' ? 'selected' : ''); ?>><?php echo e(trans('update.send_newsletter_to_bcc')); ?></option>
                                                <option value="send_to_excel" <?php echo e(old('send_method') == 'send_to_excel' ? 'selected' : ''); ?>><?php echo e(trans('update.send_newsletter_to_excel')); ?></option>
                                            </select>
                                        </div>

                                        <div class="form-group js-newsletter-bcc-email <?php echo e((old('send_method') != 'send_to_bcc') ? 'd-none' : ''); ?>">
                                            <label><?php echo e(trans('update.send_newsletter_bcc_email')); ?></label>
                                            <input type="text" name="bcc_email"
                                                   class="form-control  <?php $__errorArgs = ['bcc_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   value="<?php echo e(old('bcc_email')); ?>"/>
                                            <?php $__errorArgs = ['bcc_email'];
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

                                        <div class="form-group js-newsletter-excel <?php echo e((old('send_method') != 'send_to_excel') ? 'd-none' : ''); ?>">
                                            <label><?php echo e(trans('update.send_newsletter_select_excel_file')); ?></label>
                                            <input type="file" name="excel"
                                                   class="form-control h-auto <?php $__errorArgs = ['excel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   value=""/>
                                            <?php $__errorArgs = ['excel'];
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
                                    </div>
                                </div>

                                <div class="form-group mt-15">
                                    <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                                    <textarea id="summernote" name="description" class="summernote form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('admin/main.description_placeholder')); ?>"><?php echo e(old('description')); ?></textarea>
                                    <?php $__errorArgs = ['description'];
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
                                <div class="text-muted text-small mb-3"><?php echo e(trans('update.send_newsletter_description_hint')); ?></div>
                                <button type="submit" class="btn btn-primary mt-3"><?php echo e(trans('admin/main.send')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/js/admin/newsletter.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\newsletters\send.blade.php ENDPATH**/ ?>