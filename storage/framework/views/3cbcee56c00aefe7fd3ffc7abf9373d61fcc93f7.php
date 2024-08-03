<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.settings_navbar_links')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.settings_navbar_links')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-md-8 col-lg-6">
                                    <form action="<?php echo e(getAdminPanelUrl()); ?>/additional_page/navbar_links/store" method="post">
                                        <?php echo e(csrf_field()); ?>


                                        <input type="hidden" name="navbar_link" value="<?php echo e(!empty($navbarLinkKey) ? $navbarLinkKey : 'newLink'); ?>">

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
                                            <input type="text" name="value[title]" value="<?php echo e((!empty($navbar_link)) ? $navbar_link->title : old('value.title')); ?>" class="form-control  <?php $__errorArgs = ['value.title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['value.title'];
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
                                            <label><?php echo e(trans('public.link')); ?></label>
                                            <input type="text" name="value[link]" value="<?php echo e((!empty($navbar_link)) ? $navbar_link->link : old('value.link')); ?>" class="form-control  <?php $__errorArgs = ['value.link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['value.link'];
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
                                            <label><?php echo e(trans('admin/main.order')); ?></label>
                                            <input type="number" name="value[order]" value="<?php echo e((!empty($navbar_link)) ? $navbar_link->order : old('value.order')); ?>" class="form-control  <?php $__errorArgs = ['value.order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['value.order'];
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

                                        <button type="submit" class="btn btn-primary mt-1"><?php echo e(trans('admin/main.submit')); ?></button>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.title')); ?></th>
                                        <th><?php echo e(trans('admin/main.link')); ?></th>
                                        <th><?php echo e(trans('admin/main.order')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php if(!empty($items)): ?>
                                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val['title']); ?></td>
                                                <td><?php echo e($val['link']); ?></td>
                                                <td><?php echo e($val['order']); ?></td>
                                                <td>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/additional_page/navbar_links/<?php echo e($key); ?>/edit" class="btn-sm" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/additional_page/navbar_links/'. $key .'/delete','btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/additional_pages/navbar_links.blade.php ENDPATH**/ ?>