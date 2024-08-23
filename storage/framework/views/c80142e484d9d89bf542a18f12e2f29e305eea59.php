<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.seo_metas')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>/settings"><?php echo e(trans('admin/main.settings')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.seo_metas')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-pills" id="myTab3" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active"
                                       id="extra_meta_tags-tab" data-toggle="tab" href="#extra_meta_tags"
                                       role="tab" aria-controls="extra_meta_tags"
                                       aria-selected="true"><?php echo e(trans('update.extra_meta_tags')); ?></a>
                                </li>

                                <?php $__currentLoopData = \App\Models\Setting::$pagesSeoMetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           id="<?php echo e($page); ?>-tab" data-toggle="tab" href="#<?php echo e($page); ?>"
                                           role="tab" aria-controls="<?php echo e($page); ?>"
                                           aria-selected="true"><?php echo e(trans('admin/main.seo_metas_'.$page)); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <?php
                                $itemValue = (!empty($settings) and !empty($settings['seo_metas'])) ? $settings['seo_metas']->value : '';

                                if (!empty($itemValue) and !is_array($itemValue)) {
                                    $itemValue = json_decode($itemValue, true);
                                }
                            ?>

                            <div class="tab-content" id="myTabContent2">

                                <div class="tab-pane mt-3 fade show active" id="extra_meta_tags" role="tabpanel" aria-labelledby="extra_meta_tags-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-8">
                                            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/seo_metas/store" method="post">
                                            <?php echo e(csrf_field()); ?>


                                                <div class="form-group">
                                                    <label><?php echo e(trans('update.extra_meta_tags')); ?></label>
                                                    <textarea name="value[extra_meta_tags]" rows="6" class="form-control"><?php echo e((!empty($itemValue) and !empty($itemValue['extra_meta_tags'])) ? $itemValue['extra_meta_tags'] : ''); ?></textarea>
                                                    <p class="mb-0">- <?php echo e(trans('update.extra_meta_tags_hint1')); ?></p>
                                                    <p class="mb-0">- <?php echo e(trans('update.extra_meta_tags_hint2')); ?></p>
                                                    <p class="mb-0">- <?php echo e(trans('update.extra_meta_tags_hint3')); ?></p>
                                                    <p class="mb-0">- <?php echo e(trans('update.extra_meta_tags_hint4')); ?></p>
                                                </div>

                                                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php $__currentLoopData = \App\Models\Setting::$pagesSeoMetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane mt-3 fade" id="<?php echo e($page); ?>" role="tabpanel" aria-labelledby="<?php echo e($page); ?>-tab">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/seo_metas/store" method="post">
                                                    <?php echo e(csrf_field()); ?>


                                                    <div class="form-group">
                                                        <label><?php echo e(trans('admin/main.title')); ?></label>
                                                        <input type="text" name="value[<?php echo e($page); ?>][title]" value="<?php echo e((!empty($itemValue) and !empty($itemValue[$page])) ? $itemValue[$page]['title'] : old('title')); ?>" class="form-control  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
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
                                                        <label><?php echo e(trans('public.description')); ?></label>
                                                        <textarea name="value[<?php echo e($page); ?>][description]" rows="4" class="form-control  <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e((!empty($itemValue) and !empty($itemValue[$page])) ? $itemValue[$page]['description'] : old('description')); ?></textarea>
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

                                                    <div class="form-group custom-switches-stacked">
                                                        <label class="custom-switch pl-0 d-flex align-items-center">
                                                            <label class="custom-switch-description mb-0 mr-2"><?php echo e(trans('admin/main.no_index')); ?></label>
                                                            <input type="hidden" name="value[<?php echo e($page); ?>][robot]" value="noindex">
                                                            <input type="checkbox" name="value[<?php echo e($page); ?>][robot]" id="<?php echo e($page); ?>Robot" value="index" <?php echo e((!empty($itemValue) and !empty($itemValue[$page]) and (empty($itemValue[$page]['robot']) or $itemValue[$page]['robot'] != 'noindex')) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                            <span class="custom-switch-indicator"></span>
                                                            <label class="custom-switch-description mb-0 cursor-pointer" for="<?php echo e($page); ?>Robot"><?php echo e(trans('admin/main.index')); ?></label>
                                                        </label>
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

    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h4><?php echo e(trans('admin/main.hints')); ?></h4></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.seo_metas_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold mb-2"><?php echo e(trans('admin/main.seo_metas_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.seo_metas_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold mb-2"><?php echo e(trans('admin/main.seo_metas_hint_description_2')); ?></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\seo.blade.php ENDPATH**/ ?>