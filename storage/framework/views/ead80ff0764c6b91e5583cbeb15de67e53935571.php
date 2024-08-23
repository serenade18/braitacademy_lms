<?php $__env->startPush('libraries_top'); ?>

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

            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input name="full_name" type="text" class="form-control" value="<?php echo e(request()->get('full_name')); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.role')); ?></label>
                                    <select name="role_name" class="form-control">
                                        <option value=""><?php echo e(trans('public.all')); ?></option>

                                        <option value="<?php echo e(\App\Models\Role::$teacher); ?>" <?php if(request()->get('role_name') == \App\Models\Role::$teacher): ?> selected <?php endif; ?>><?php echo e(trans('home.instructors')); ?></option>
                                        <option value="<?php echo e(\App\Models\Role::$organization); ?>" <?php if(request()->get('role_name') == \App\Models\Role::$organization): ?> selected <?php endif; ?>><?php echo e(trans('home.organizations')); ?></option>
                                        <option value="<?php echo e(\App\Models\Role::$admin); ?>" <?php if(request()->get('role_name') == \App\Models\Role::$admin): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.admin')); ?></option>

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.users_group')); ?></label>
                                    <select name="group_id" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.select_users_group')); ?></option>
                                        <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($userGroup->id); ?>" <?php if(request()->get('group_id') == $userGroup->id): ?> selected <?php endif; ?>><?php echo e($userGroup->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label mb-4"> </label>
                                    <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.id')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.name')); ?></th>
                                        <th><?php echo e(trans('update.physical_products')); ?></th>
                                        <th><?php echo e(trans('update.virtual_products')); ?></th>
                                        <th><?php echo e(trans('admin/main.total_sales')); ?></th>
                                        <th><?php echo e(trans('update.pending_orders')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->id); ?></td>
                                            <td class="text-left">
                                                <div class="d-flex align-items-center">
                                                    <figure class="avatar mr-2">
                                                        <img src="<?php echo e($user->getAvatar()); ?>" alt="<?php echo e($user->full_name); ?>">
                                                    </figure>
                                                    <div class="media-body ml-1">
                                                        <div class="mt-0 mb-1 font-weight-bold"><?php echo e($user->full_name); ?></div>

                                                        <?php if($user->mobile): ?>
                                                            <div class="text-primary text-small font-600-bold"><?php echo e($user->mobile); ?></div>
                                                        <?php endif; ?>

                                                        <?php if($user->email): ?>
                                                            <div class="text-primary text-small font-600-bold"><?php echo e($user->email); ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <span class="d-block font-14"><?php echo e($user->physical_products_count); ?></span>
                                                <span class="d-block font-12"><?php echo e(!empty($user->physical_products_sales) ? handlePrice($user->physical_products_sales) : 0); ?></span>
                                            </td>

                                            <td class="text-center">
                                                <span class="d-block font-14"><?php echo e($user->virtual_products_count); ?></span>
                                                <span class="d-block font-12"><?php echo e(!empty($user->virtual_products_sales) ? handlePrice($user->virtual_products_sales) : 0); ?></span>
                                            </td>

                                            <td class="text-center">
                                                <span class="d-block font-12"><?php echo e(!empty($user->total_sales) ? handlePrice($user->total_sales) : 0); ?></span>
                                            </td>


                                            <td><?php echo e($user->pending_orders_count); ?></td>


                                            <td class="text-center mb-2" width="120">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_impersonate')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($user->id); ?>/impersonate" target="_blank" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.login')); ?>">
                                                        <i class="fa fa-user-shield"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($user->id); ?>/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/users/'.$user->id.'/delete' , 'btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($users->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\store\sellers\index.blade.php ENDPATH**/ ?>