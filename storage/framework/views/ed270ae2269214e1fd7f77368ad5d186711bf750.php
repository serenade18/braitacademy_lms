<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <?php echo e(trans('update.registration_bonus')); ?>

                </div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.achieved_users')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($achievedUsers); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-unlock"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.unlocked_bonus_users')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($unlockedBonusUsers); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-money-bill"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_bonus')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(handlePrice($totalBonus)); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-money-bill-wave"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.unlocked_bonus')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(handlePrice($unlockedBonus)); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input name="title" type="text" class="form-control" value="<?php echo e(request()->get('title')); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="from" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="to" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>

                            <?php
                                $filters = ['registration_date_asc', 'registration_date_desc', 'referred_users_asc', 'referred_users_desc', 'bonus_asc', 'bonus_desc'];
                            ?>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                                        <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($filter); ?>" <?php if(request()->get('sort') == $filter): ?> selected <?php endif; ?>><?php echo e(trans('update.'.$filter)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.user')); ?></label>
                                    <select name="user_ids[]" multiple="multiple" class="form-control search-user-select2"
                                            data-placeholder="Search users">

                                        <?php if(!empty($selectedUsers) and $selectedUsers->count() > 0): ?>
                                            <?php $__currentLoopData = $selectedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>" selected><?php echo e($user->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.user')); ?></label>
                                    <select name="role_id" class="form-control select2" data-allow-clear="true"
                                            data-placeholder="<?php echo e(trans('update.select_user_role')); ?>">
                                        <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>" <?php echo e((request()->get('role_id') == $role->id) ? 'selected' : ''); ?>><?php echo e($role->caption); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.bonus_status')); ?></label>
                                    <select name="bonus_status" class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                                        <option value="locked" <?php echo e((request()->get('bonus_status') == 'locked') ? 'selected' : ''); ?>><?php echo e(trans('update.locked')); ?></option>
                                        <option value="unlocked" <?php echo e((request()->get('bonus_status') == 'unlocked') ? 'selected' : ''); ?>><?php echo e(trans('update.unlocked')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group mt-1">
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
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_bonus_export_excel')): ?>
                                <div class="text-right">
                                    <a href="<?php echo e(getAdminPanelUrl('/registration_bonus/export?'. http_build_query(request()->all()))); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('update.user_id')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.name')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.role')); ?></th>

                                        <th><?php echo e(trans('update.bonus')); ?></th>

                                        <?php if(!empty($registrationBonusSettings['unlock_registration_bonus_with_referral']) and !empty($registrationBonusSettings['number_of_referred_users'])): ?>
                                            <th><?php echo e(trans('update.referred_users')); ?></th>

                                            <?php if(!empty($registrationBonusSettings['enable_referred_users_purchase'])): ?>
                                                <th><?php echo e(trans('update.referred_purchases')); ?></th>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        
                                        <th><?php echo e(trans('update.registration_date')); ?></th>
                                        <th><?php echo e(trans('update.bonus_status')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
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

                                            <td class="text-left"><?php echo e($user->role->caption); ?></td>

                                            <td>
                                                <?php echo e(handlePrice($user->registration_bonus_amount ?? 0)); ?>

                                            </td>

                                            <?php if(!empty($registrationBonusSettings['unlock_registration_bonus_with_referral']) and !empty($registrationBonusSettings['number_of_referred_users'])): ?>
                                                <td><?php echo e($user->referred_users); ?></td>

                                                <?php if(!empty($registrationBonusSettings['enable_referred_users_purchase'])): ?>
                                                    <td><?php echo e($user->referred_purchases); ?></td>
                                                <?php endif; ?>
                                            <?php endif; ?>


                                            

                                            <td class="font-12"><?php echo e(dateTimeFormat($user->created_at, 'j M Y')); ?></td>

                                            <td class="font-12"><?php echo e($user->bonus_status); ?></td>


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

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',[
                                                            'url' => getAdminPanelUrl("/users/{$user->id}/disable_registration_bonus"),
                                                            'tooltip' => trans('update.disable_registration_bonus'),
                                                            'btnIcon' => 'fa-times-circle'
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\registration_bonus\history.blade.php ENDPATH**/ ?>