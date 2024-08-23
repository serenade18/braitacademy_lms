<?php $__env->startPush('libraries_top'); ?>


<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(!empty($role) ?trans('/admin/main.edit'): trans('admin/main.new')); ?> <?php echo e(trans('admin/main.role')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>/roles"><?php echo e(trans('admin/main.roles')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(!empty($role) ?trans('/admin/main.edit'): trans('admin/main.new')); ?></div>
            </div>
        </div>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(getAdminPanelUrl()); ?>/roles/<?php echo e(!empty($role) ? $role->id.'/update' : 'store'); ?>" method="Post">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">

                                        <?php if(empty($role)): ?>
                                            <div class="form-group <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <label><?php echo e(trans('admin/main.name')); ?></label>
                                                <input type="text" name="name" class="form-control"
                                                       value="<?php echo e(!empty($role) ? $role->name : old('name')); ?>"
                                                       placeholder=""/>

                                                <p class="mt-1 text-muted"><?php echo e(trans('update.role_name_hint')); ?></p>
                                            </div>

                                            <?php $__errorArgs = ['name'];
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
                                        <?php endif; ?>

                                        <div class="form-group <?php $__errorArgs = ['caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <label><?php echo e(trans('admin/main.caption')); ?></label>
                                            <input type="text" name="caption" class="form-control" value="<?php echo e(!empty($role) ? $role->caption : old('caption')); ?>"
                                                   placeholder="<?php echo e(trans('admin/main.create_field_name_placeholder')); ?>"/>

                                            <?php $__errorArgs = ['caption'];
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

                                        <?php if(empty($role) or !$role->isDefaultRole()): ?>
                                            <div class="form-group mb-1">
                                                <label class="custom-switch pl-0">
                                                    <input id="isAdmin" type="checkbox" name="is_admin" class="custom-switch-input section-parent" <?php echo e((!empty($role) && $role->is_admin) ? 'checked' : ''); ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description"><?php echo e(trans('admin/main.is_admin')); ?></span>
                                                </label>
                                            </div>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.new_role_admin_access_hint')); ?></div>
                                        <?php endif; ?>

                                    </div>
                                </div>


                                    <div class="form-group" id="sections">

                                        <h2 class="section-title"><?php echo e(trans('admin/main.permission')); ?></h2>
                                        <p class="section-lead">
                                            <?php echo e(trans('admin/main.permission_description')); ?>

                                        </p>

                                        <div class="row">
                                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="section-card is_<?php echo e($section->type); ?> col-12 col-md-6 col-lg-4 <?php echo e((!empty($role) and $role->is_admin and $section->type == 'panel') ? 'd-none' : ''); ?> <?php echo e((!empty($role) and !$role->is_admin and $section->type == 'admin') ? 'd-none' : ''); ?> <?php echo e((empty($role) and $section->type == 'admin') ? 'd-none' : ''); ?>">
                                                    <div class="card card-primary section-box">
                                                        <div class="card-header">
                                                            <input type="checkbox" name="permissions[]" id="permissions_<?php echo e($section->id); ?>" value="<?php echo e($section->id); ?>"
                                                                   <?php echo e(isset($permissions[$section->id]) ? 'checked' : ''); ?> class="form-check-input mt-0 section-parent">
                                                            <label class="form-check-label font-16 font-weight-bold cursor-pointer" for="permissions_<?php echo e($section->id); ?>">
                                                                <?php echo e($section->caption); ?>

                                                            </label>
                                                        </div>

                                                        <?php if(!empty($section->children)): ?>
                                                            <div class="card-body">

                                                                <?php $__currentLoopData = $section->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="form-check mt-1">
                                                                        <input type="checkbox" name="permissions[]" id="permissions_<?php echo e($child->id); ?>" value="<?php echo e($child->id); ?>"
                                                                               <?php echo e(isset($permissions[$child->id]) ? 'checked' : ''); ?> class="form-check-input section-child">
                                                                        <label class="form-check-label cursor-pointer mt-0" for="permissions_<?php echo e($child->id); ?>">
                                                                            <?php echo e($child->caption); ?>

                                                                        </label>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                <div class=" mt-4">
                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
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
    <script src="/assets/default/js/admin/roles.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\roles\create.blade.php ENDPATH**/ ?>