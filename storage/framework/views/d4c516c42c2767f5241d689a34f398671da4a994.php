<div class=" mt-3">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/personalization/navbar_button" method="post">
                <?php echo e(csrf_field()); ?>

                <?php if(!empty($navbarButton)): ?>
                    <input type="hidden" name="item_id" value="<?php echo e($navbarButton->id); ?>">
                <?php endif; ?>


                <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                        <select name="locale" class="form-control <?php echo e(!empty($navbarButton) ? 'js-edit-content-locale' : ''); ?>">
                            <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(!empty($selectedLocale) ? $selectedLocale : app()->getLocale()) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
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
                    <label><?php echo e(trans('/admin/main.role_name')); ?></label>

                    <?php if(!empty($navbarButton) and $navbarButton->role_id): ?>
                        <input type="hidden" name="role_id" value="<?php echo e($navbarButton->role_id); ?>">
                    <?php endif; ?>

                    <select class="form-control <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="role_id" <?php echo e((!empty($navbarButton) and $navbarButton->role_id) ? 'disabled' : ''); ?>>
                        <option disabled selected><?php echo e(trans('admin/main.select_role')); ?></option>
                        <option value="for_guest" <?php echo e((!empty($navbarButton) and $navbarButton->for_guest) ? 'selected' :''); ?>><?php echo e(trans('update.guest')); ?></option>

                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->id); ?>" <?php echo e((!empty($navbarButton) and !empty($navbarButton->role_id) and $navbarButton->role_id == $role->id) ? 'selected' :''); ?>><?php echo e($role->caption); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['role_id'];
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
                    <label><?php echo e(trans('admin/main.title')); ?></label>
                    <input type="text" name="title" value="<?php echo e((!empty($navbarButton) and !empty($navbarButton->title)) ? $navbarButton->title : old('title')); ?>" class="form-control <?php $__errorArgs = ['title'];
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
                    <label><?php echo e(trans('admin/main.Url')); ?></label>
                    <input type="text" name="url" value="<?php echo e((!empty($navbarButton) and !empty($navbarButton->url)) ? $navbarButton->url : old('url')); ?>" class="form-control <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                    <?php $__errorArgs = ['url'];
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

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>

    <?php if(!empty($navbarButtons)): ?>
        <div class="table-responsive mt-5">
            <table class="table table-striped font-14">
                <tr>
                    <th><?php echo e(trans('admin/main.title')); ?></th>
                    <th><?php echo e(trans('admin/main.Url')); ?></th>
                    <th><?php echo e(trans('admin/main.role')); ?></th>
                    <th><?php echo e(trans('admin/main.actions')); ?></th>
                </tr>

                <?php $__currentLoopData = $navbarButtons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($row->title); ?></td>
                        <td><?php echo e($row->url); ?></td>
                        <td>
                            <?php if($row->for_guest): ?>
                                <?php echo e(trans('update.guest')); ?>

                            <?php else: ?>
                                <?php echo e(!empty($row->role) ? $row->role->caption : ''); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings_personalization')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/settings/personalization/navbar_button/<?php echo e($row->id); ?>/edit" class="btn-sm" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings_personalization')): ?>
                                <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/settings/personalization/navbar_button/'. $row->id .'/delete' , 'btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/settings/personalization/navbar_button.blade.php ENDPATH**/ ?>