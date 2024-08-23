<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.discounts')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form class="mb-0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control" name="search" value="<?php echo e(request()->get('search')); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.expiration_from')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.expiration_to')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('from')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_users_discount')); ?></option>
                                        <option value="percent_asc" <?php if(request()->get('sort') == 'percent_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.percentage_ascending')); ?></option>
                                        <option value="percent_desc" <?php if(request()->get('sort') == 'percent_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.percentage_descending')); ?></option>
                                        <option value="amount_asc" <?php if(request()->get('sort') == 'amount_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.max_amount_ascending')); ?></option>
                                        <option value="amount_desc" <?php if(request()->get('sort') == 'amount_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.max_amount_descending')); ?></option>
                                        <option value="usable_time_asc" <?php if(request()->get('sort') == 'usable_time_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.usable_times_ascending')); ?></option>
                                        <option value="usable_time_desc" <?php if(request()->get('sort') == 'usable_time_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.usable_times_descending')); ?></option>
                                        <option value="usable_time_remain_asc" <?php if(request()->get('sort') == 'usable_time_remain_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.usable_times_remain_ascending')); ?></option>
                                        <option value="usable_time_remain_desc" <?php if(request()->get('sort') == 'usable_time_remain_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.usable_times_remain_descending')); ?></option>
                                        <option value="created_at_asc" <?php if(request()->get('sort') == 'created_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_ascending')); ?></option>
                                        <option value="created_at_desc" <?php if(request()->get('sort') == 'created_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_descending')); ?></option>
                                        <option value="expire_at_asc" <?php if(request()->get('sort') == 'expire_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.expire_date_ascending')); ?></option>
                                        <option value="expire_at_desc" <?php if(request()->get('sort') == 'expire_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.expire_date_descending')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.user')); ?></label>
                                    <select name="user_ids[]" multiple="multiple" class="form-control search-user-select2"
                                            data-placeholder="Search users">

                                        <?php if(!empty($users) and $users->count() > 0): ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>" selected><?php echo e($user->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?>>Active</option>
                                        <option value="expired" <?php if(request()->get('status') == 'expired'): ?> selected <?php endif; ?>>Expired</option>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th class="text-left" width="150"><?php echo e(trans('admin/main.title')); ?></th>
                                        <?php if($isInstructorCoupons): ?>
                                            <th class="text-left" width="150"><?php echo e(trans('admin/main.creator')); ?></th>
                                        <?php endif; ?>
                                        <th width="150"><?php echo e(trans('admin/main.type')); ?></th>
                                        <th class="text-left" width="150"><?php echo e(trans('admin/main.code')); ?></th>
                                        <th class="text-left" width="150"><?php echo e(trans('admin/main.user')); ?></th>
                                        <th width="250"><?php echo e(trans('admin/main.created_date')); ?></th>
                                        <th width="250"><?php echo e(trans('admin/main.ext_date')); ?></th>
                                        <th width="150"><?php echo e(trans('admin/main.usable_times')); ?></th>
                                        <th width="150"><?php echo e(trans('admin/main.percentage')); ?></th>
                                        <th width="150"><?php echo e(trans('admin/main.max_amount')); ?></th>
                                        <th width="150"><?php echo e(trans('admin/main.amount')); ?></th>
                                        <th width="150"><?php echo e(trans('update.minimum_order')); ?></th>
                                        <th width="50"><?php echo e(trans('admin/main.status')); ?></th>
                                        <th width="50"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="white-space-nowrap"><?php echo e($discount->title); ?></div>
                                            </td>

                                            <?php if($isInstructorCoupons): ?>
                                                <td class="text-left">
                                                    <div class="d-flex align-items-center">
                                                        <figure class="avatar mr-2">
                                                            <img src="<?php echo e($discount->creator->getAvatar()); ?>" alt="<?php echo e($discount->creator->full_name); ?>">
                                                        </figure>
                                                        <div class="media-body ml-1">
                                                            <div class="mt-0 mb-1 font-weight-bold"><?php echo e($discount->creator->full_name); ?></div>

                                                            <?php if($discount->creator->mobile): ?>
                                                                <div class="text-primary text-small font-600-bold"><?php echo e($discount->creator->mobile); ?></div>
                                                            <?php endif; ?>

                                                            <?php if($discount->creator->email): ?>
                                                                <div class="text-primary text-small font-600-bold"><?php echo e($discount->creator->email); ?></div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php endif; ?>

                                            <td>
                                                <?php if($discount->discount_type == \App\Models\Discount::$discountTypeFixedAmount): ?>
                                                    <?php echo e(trans('update.fixed_amount')); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('admin/main.percentage')); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td class="text-left"><?php echo e($discount->code); ?></td>
                                            <td class="text-left">
                                                <?php if($discount->user_type == 'all_users'): ?>
                                                    <span class="text-primary"><?php echo e(trans('admin/main.all_users')); ?></span>
                                                <?php elseif(!empty($discount->discountUsers) and !empty($discount->discountUsers->user)): ?>
                                                    <span class=""><?php echo e($discount->discountUsers->user->full_name); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td><?php echo e(dateTimeFormat($discount->created_at, 'Y M d')); ?></td>

                                            <td><?php echo e(dateTimeFormat($discount->expired_at, 'Y M d - H:i')); ?></td>

                                            <td>
                                                <div class="media-body">
                                                    <div class=" mt-0 mb-1 font-weight-bold"><?php echo e($discount->count); ?></div>
                                                    <div class="text-primary text-small"><?php echo e(trans('admin/main.remain')); ?> : <?php echo e($discount->discountRemain()); ?></div>
                                                </div>
                                            </td>

                                            <td><?php echo e($discount->percent ?  $discount->percent . '%' : '-'); ?></td>
                                            <td><?php echo e($discount->max_amount ?  handlePrice($discount->max_amount) : '-'); ?></td>
                                            <td><?php echo e($discount->amount ?  handlePrice($discount->amount) : '-'); ?></td>
                                            <td><?php echo e($discount->minimum_order ?  handlePrice($discount->minimum_order) : '-'); ?></td>

                                            <td>
                                                <?php if($discount->expired_at < time()): ?>
                                                    <span class="text-danger"><?php echo e(trans('panel.expired')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-success"><?php echo e(trans('admin/main.active')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_discount_codes_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/discounts/<?php echo e($discount->id); ?>/edit" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_discount_codes_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/financial/discounts/'. $discount->id.'/delete','btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($discounts->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\discount\lists.blade.php ENDPATH**/ ?>