<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.payouts')); ?></div>
            </div>
        </div>


        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <input type="hidden" name="payout" value="<?php echo e(request()->get('payout')); ?>">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control text-center" name="search" value="<?php echo e(request()->get('search')); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
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

                            <div class="col-md-3">
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

                            <div class="col-md-3">
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

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value="">Filter Type</option>
                                        <option value="amount_asc" <?php if(request()->get('sort') == 'amount_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.amount_ascending')); ?></option>
                                        <option value="amount_desc" <?php if(request()->get('sort') == 'amount_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.amount_descending')); ?></option>
                                        <option value="created_at_asc" <?php if(request()->get('sort') == 'created_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.last_payout_date_ascending')); ?></option>
                                        <option value="created_at_desc" <?php if(request()->get('sort') == 'created_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.last_payout_date_descending')); ?></option>
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
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts_export_excel')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/payouts/excel?<?php echo e(http_build_query(request()->all())); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.user')); ?></th>
                                        <th><?php echo e(trans('admin/main.role')); ?></th>
                                        <th><?php echo e(trans('admin/main.payout_amount')); ?></th>
                                        <th class=""><?php echo e(trans('admin/main.bank')); ?></th>

                                        <th><?php echo e(trans('admin/main.phone')); ?></th>
                                        <th width="180px"><?php echo e(trans('admin/main.last_payout_date')); ?></th>

                                        <?php if(request()->get('payout') == 'history'): ?>
                                            <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <?php endif; ?>

                                        <th width="150px"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php if($payouts->count() > 0): ?>
                                        <?php $__currentLoopData = $payouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td class="text-left">
                                                    <span class="d-block"><?php echo e($payout->user->full_name); ?></span>
                                                </td>

                                                <td><?php echo e($payout->user->role->caption); ?></td>

                                                <td><?php echo e(handlePrice($payout->amount)); ?></td>


                                                <?php if(!empty($payout->userSelectedBank->bank)): ?>
                                                <td class="">
                                                    <?php
                                                        $bank = $payout->userSelectedBank->bank;
                                                    ?>
                                                    <div class="font-weight-500"><?php echo e($bank->title); ?></div>

                                                    
                                                    <input type="hidden" class="js-bank-details" data-name="<?php echo e(trans("admin/main.bank")); ?>" value="<?php echo e($bank->title); ?>">
                                                    <?php $__currentLoopData = $bank->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $selectedBankSpecification = $payout->userSelectedBank->specifications->where('user_selected_bank_id', $payout->userSelectedBank->id)->where('user_bank_specification_id', $specification->id)->first();
                                                        ?>

                                                        <?php if(!empty($selectedBankSpecification)): ?>
                                                            <input type="hidden" class="js-bank-details" data-name="<?php echo e($specification->name); ?>" value="<?php echo e($selectedBankSpecification->value); ?>">
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </td>
                                                <?php else: ?>
                                                <td>-</td>
                                                <?php endif; ?>

                                                <td><?php echo e($payout->user->mobile); ?></td>

                                                <td><?php echo e(dateTimeFormat($payout->created_at, 'j M Y H:i')); ?></td>

                                                <?php if(request()->get('payout') == 'history'): ?>
                                                    <td>
                                                        <span class="<?php echo e(($payout->status == 'done') ? 'text-success' : 'text-danger'); ?>"><?php echo e(trans('public.'.$payout->status)); ?></span>
                                                    </td>
                                                <?php endif; ?>


                                                <td width="150px">
                                                    <div class="">
                                                        <button type="button" class="js-show-details btn-sm btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('update.show_details')); ?>">
                                                            <i class="fa fa-eye"></i>
                                                        </button>

                                                        <?php if(request()->get('payout') == 'requests' and $payout->status === \App\Models\Payout::$waiting): ?>

                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts_payout')): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                        'url' => getAdminPanelUrl().'/financial/payouts/'. $payout->id .'/payout',
                                                                        'tooltip' => trans('admin/main.payout'),
                                                                        'btnClass' => 'ml-2',
                                                                        'btnIcon' => 'fa-credit-card'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>

                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts_reject')): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                        'url' => getAdminPanelUrl().'/financial/payouts/'. $payout->id .'/reject',
                                                                        'tooltip' => trans('public.reject'),
                                                                        'btnIcon' => 'fa-times-circle',
                                                                        'btnClass' => 'ml-2',
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($payouts->appends(request()->input())->links()); ?>

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
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.payout_list_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.payout_list_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.payout_list_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.payout_list_hint_description_2')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var payoutDetailsLang = '<?php echo e(trans('update.payout_details')); ?>';
        var closeLang = '<?php echo e(trans('public.close')); ?>';
    </script>

    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/default/js/admin/payout.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\payout\lists.blade.php ENDPATH**/ ?>