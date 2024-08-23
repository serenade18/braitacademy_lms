<?php
    $columns = ['first_column','second_column','third_column','forth_column']
?>

<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.footer')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/pages/dashboard.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/pages/setting.footer')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e($loop->iteration == 1 ? 'active' : ''); ?>" id="<?php echo e($column); ?>-tab" data-toggle="tab" href="#<?php echo e($column); ?>" role="tab" aria-controls="<?php echo e($column); ?>" aria-selected="true"><?php echo e(trans('admin/pages/setting.footer_'.$column)); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <div class="tab-content" id="myTabContent2">
                                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane mt-3 fade <?php echo e($loop->iteration == 1 ? 'show active' : ''); ?>" id="<?php echo e($column); ?>" role="tabpanel" aria-labelledby="<?php echo e($column); ?>-tab">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <form action="<?php echo e(getAdminPanelUrl()); ?>/additional_page/footer/store" method="post">
                                                    <?php echo e(csrf_field()); ?>


                                                    <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                                                        <div class="form-group">
                                                            <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                                            <select name="locale" class="form-control js-edit-content-locale">
                                                                <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', $selectedLocal)) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
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
                                                        <label><?php echo e(trans('admin/main.title')); ?></label>
                                                        <input type="text" name="value[<?php echo e($column); ?>][title]" value="<?php echo e((!empty($value) and !empty($value[$column]) and !empty($value[$column]['title'])) ? $value[$column]['title'] : old('title')); ?>" class="form-control "/>
                                                    </div>

                                                    <div class="form-group">
                                                        <label><?php echo e(trans('admin/main.content')); ?></label>
                                                        <textarea type="text" name="value[<?php echo e($column); ?>][value]" class="summernote form-control"><?php echo e((!empty($value) and !empty($value[$column]) and !empty($value[$column]['value'])) ? $value[$column]['value'] : old('value')); ?></textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\additional_pages\footer.blade.php ENDPATH**/ ?>