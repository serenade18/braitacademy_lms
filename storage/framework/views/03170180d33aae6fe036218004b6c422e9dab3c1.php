<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.offline_payments')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form class="mb-0">
                        <input type="hidden" name="page_type" value="<?php echo e($pageType); ?>">

                        <div class="row">
                            <div class="<?php if($pageType == 'requests'): ?> col-md-3 <?php else: ?> col-md-4 <?php endif; ?>">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control text-center" name="search" value="<?php echo e(request()->get('search')); ?>">
                                </div>
                            </div>

                            <div class="<?php if($pageType == 'requests'): ?> col-md-3 <?php else: ?> col-md-4 <?php endif; ?>">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>

                            <div class="<?php if($pageType == 'requests'): ?> col-md-3 <?php else: ?> col-md-4 <?php endif; ?>">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>

                            <?php if($pageType == 'history'): ?>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                        <select name="status" data-plugin-selectTwo class="form-control populate">
                                            <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                            <option value="approved" <?php if(request()->get('status') == 'approved'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.approved')); ?></option>
                                            <option value="reject" <?php if(request()->get('status') == 'reject'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.rejected')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="<?php if($pageType == 'requests'): ?> col-md-3 <?php else: ?> col-md-2 <?php endif; ?>">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.role')); ?></label>
                                    <select name="role_id" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_roles')); ?></option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>" <?php if($role->id == request()->get('role_id')): ?> selected <?php endif; ?>><?php echo e($role->caption); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="<?php if($pageType == 'requests'): ?> col-md-3 <?php else: ?> col-md-2 <?php endif; ?>">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.user')); ?></label>
                                    <select name="user_ids[]" multiple="multiple" class="form-control search-user-select2"
                                            data-placeholder="Search teachers">

                                        <?php if(!empty($users) and $users->count() > 0): ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user_filter->id); ?>" selected><?php echo e($user_filter->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="<?php if($pageType == 'requests'): ?> col-md-3 <?php else: ?> col-md-2 <?php endif; ?>">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.bank')); ?></label>
                                    <select name="account_type" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_banks')); ?></option>

                                        <?php $__currentLoopData = $offlineBanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineBank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($offlineBank->id); ?>" <?php if(request()->get('account_type') == $offlineBank->id): ?> selected <?php endif; ?>><?php echo e($offlineBank->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="<?php if($pageType == 'requests'): ?> col-md-3 <?php else: ?> col-md-2 <?php endif; ?>">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value="">Filter Type</option>
                                        <option value="amount_asc" <?php if(request()->get('sort') == 'amount_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.amount_ascending')); ?></option>
                                        <option value="amount_desc" <?php if(request()->get('sort') == 'amount_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.amount_descending')); ?></option>
                                        <option value="pay_date_asc" <?php if(request()->get('sort') == 'pay_date_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.Transaction_time_ascending')); ?></option>
                                        <option value="pay_date_desc" <?php if(request()->get('sort') == 'pay_date_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.Transaction_time_descending')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="<?php if($pageType == 'requests'): ?> col-md-3 <?php else: ?> col-md-2 <?php endif; ?>">
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
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_offline_payments_export_excel')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/offline_payments/excel?<?php echo e(http_build_query(request()->all())); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.user')); ?></th>
                                        <th><?php echo e(trans('admin/main.role')); ?></th>
                                        <th><?php echo e(trans('admin/main.amount')); ?></th>
                                        <th><?php echo e(trans('admin/main.bank')); ?></th>
                                        <th><?php echo e(trans('admin/main.referral_code')); ?></th>
                                        <th><?php echo e(trans('admin/main.phone')); ?></th>
                                        <th><?php echo e(trans('update.attachment')); ?></th>
                                        <th width=180px><?php echo e(trans('admin/main.transaction_time')); ?></th>

                                        <?php if($pageType == 'history'): ?>
                                            <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <?php endif; ?>

                                        <?php if($pageType == 'requests'): ?>
                                            <th width="150px"><?php echo e(trans('admin/main.actions')); ?></th>
                                        <?php endif; ?>
                                    </tr>

                                    <?php if($offlinePayments->count() > 0): ?>
                                        <?php $__currentLoopData = $offlinePayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlinePayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-left">
                                                    <?php echo e($offlinePayment->user->full_name); ?>

                                                </td>

                                                <td><?php echo e($offlinePayment->user->role->caption); ?></td>

                                                <td><?php echo e(handlePrice($offlinePayment->amount)); ?></td>

                                                <?php if(!empty($offlinePayment->offlineBank->title)): ?>
                                                <td><?php echo e($offlinePayment->offlineBank->title); ?></td>
                                               <?php else: ?>
                                                <td>-</td>
                                                <?php endif; ?>

                                                <td>
                                                    <span><?php echo e($offlinePayment->reference_number); ?></span>
                                                </td>

                                                <td><?php echo e($offlinePayment->user->mobile); ?></td>

                                                <td class="text-center align-middle">
                                                    <?php if(!empty($offlinePayment->attachment)): ?>
                                                        <a href="<?php echo e($offlinePayment->getAttachmentPath()); ?>" target="_blank" class="text-primary"><?php echo e(trans('public.view')); ?></a>
                                                    <?php else: ?>
                                                        ---
                                                    <?php endif; ?>
                                                </td>

                                                <td><?php echo e(dateTimeFormat($offlinePayment->pay_date, 'j M Y H:i')); ?></td>

                                                <?php if($pageType == 'history'): ?>
                                                    <td>
                                                        <span class="<?php echo e(($offlinePayment->status == 'approved') ? 'text-success' : 'text-danger'); ?>">
                                                            <?php if($offlinePayment->status == 'approved'): ?>
                                                                <span class="text-success"><?php echo e(trans('financial.approved')); ?></span>
                                                            <?php else: ?>
                                                                <span class="text-danger"><?php echo e(trans('public.rejected')); ?></span>
                                                            <?php endif; ?>
                                                        </span>
                                                    </td>
                                                <?php endif; ?>

                                                <?php if($pageType == 'requests'): ?>
                                                    <td>
                                                        <?php if($offlinePayment->status == \App\Models\OfflinePayment::$waiting): ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_offline_payments_approved')): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                        'url' => getAdminPanelUrl().'/financial/offline_payments/'. $offlinePayment->id .'/approved',
                                                                        'tooltip' => trans('financial.approve'),
                                                                        'btnIcon' => 'fa-check'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>

                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_offline_payments_reject')): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                        'url' => getAdminPanelUrl().'/financial/offline_payments/'. $offlinePayment->id .'/reject',
                                                                        'tooltip' => trans('public.reject'),
                                                                        'btnIcon' => 'fa-times-circle',
                                                                        'btnClass' => 'ml-2',
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($offlinePayments->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h5><?php echo e(trans('admin/main.hints')); ?></h5></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.offline_payment_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.offline_payment_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.offline_payment_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.offline_payment_hint_description_2')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\offline_payments\lists.blade.php ENDPATH**/ ?>