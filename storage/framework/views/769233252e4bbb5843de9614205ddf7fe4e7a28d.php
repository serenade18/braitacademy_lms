<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <?php echo e(trans('update.transactions')); ?>

                </div>
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
                                $filters = ['purchase_amount_asc', 'purchase_amount_desc', 'cashback_amount_asc', 'cashback_amount_desc', 'date_asc', 'date_desc'];
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
                                    <label class="input-label"><?php echo e(trans('admin/main.type')); ?></label>
                                    <select name="target_type" class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                                        <?php $__currentLoopData = \App\Models\CashbackRule::$targetTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type); ?>" <?php if(request()->get('target_type') == $type): ?> selected <?php endif; ?>><?php echo e(trans('update.target_types_'.$type)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cashback_transactions')): ?>
                                <div class="text-right">
                                    <a href="<?php echo e(getAdminPanelUrl('/cashback/transactions/excel?'. http_build_query(request()->all()))); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('admin/main.user')); ?></th>
                                        <th class="text-left"><?php echo e(trans('update.product')); ?></th>
                                        <th class=""><?php echo e(trans('admin/main.description')); ?></th>
                                        <th><?php echo e(trans('admin/main.amount')); ?></th>
                                        <th><?php echo e(trans('update.cashback_amount')); ?></th>
                                        <th><?php echo e(trans('admin/main.date')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">

                                            <td class="text-left">
                                                <div class="d-flex align-items-center">
                                                    <?php if(!empty($transaction->user)): ?>
                                                        <figure class="avatar mr-2">
                                                            <img src="<?php echo e($transaction->user->getAvatar()); ?>" alt="<?php echo e($transaction->user->full_name); ?>">
                                                        </figure>
                                                        <div class="media-body ml-1">
                                                            <div class="mt-0 mb-1 font-weight-bold"><?php echo e($transaction->user->full_name); ?></div>

                                                            <?php if($transaction->user->mobile): ?>
                                                                <div class="text-primary text-small font-600-bold"><?php echo e($transaction->user->mobile); ?></div>
                                                            <?php endif; ?>

                                                            <?php if($transaction->user->email): ?>
                                                                <div class="text-primary text-small font-600-bold"><?php echo e($transaction->user->email); ?></div>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php else: ?>
                                                        <span class="fs-11"><?php echo e(trans('update.deleted_user')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>

                                            <td class="text-left">
                                                <div class="">
                                                    <?php if(!empty($transaction->webinar_id)): ?>
                                                        <a href="<?php echo e(!empty($transaction->webinar) ? $transaction->webinar->getUrl() : ''); ?>"
                                                           target="_blank" class="font-14">#<?php echo e($transaction->webinar_id); ?>-<?php echo e(!empty($transaction->webinar) ? $transaction->webinar->title : ''); ?></a>
                                                        <span class="d-block font-12"><?php echo e(trans('update.target_types_courses')); ?></span>
                                                    <?php elseif(!empty($transaction->bundle_id)): ?>
                                                        <a href="<?php echo e(!empty($transaction->bundle) ? $transaction->bundle->getUrl() : ''); ?>"
                                                           target="_blank" class="font-14">#<?php echo e($transaction->bundle_id); ?>-<?php echo e(!empty($transaction->bundle) ? $transaction->bundle->title : ''); ?></a>
                                                        <span class="d-block font-12"><?php echo e(trans('update.target_types_bundles')); ?></span>
                                                    <?php elseif(!empty($transaction->product_id)): ?>
                                                        <a href="<?php echo e(!empty($transaction->product) ? $transaction->product->getUrl() : ''); ?>"
                                                           target="_blank" class="font-14">#<?php echo e($transaction->product_id); ?>-<?php echo e(!empty($transaction->product) ? $transaction->product->title : ''); ?></a>
                                                        <span class="d-block font-12"><?php echo e(trans('update.target_types_store_products')); ?></span>
                                                    <?php elseif(!empty($transaction->meeting_time_id)): ?>
                                                        <div class="font-14">#<?php echo e($transaction->meeting_time_id); ?> <?php echo e(trans('admin/main.meeting')); ?></div>
                                                        <span class="d-block font-12"><?php echo e(trans('update.target_types_meetings')); ?></span>
                                                    <?php elseif(!empty($transaction->subscribe_id)): ?>
                                                        <span class="font-14"><?php echo e(trans('admin/main.purchased_subscribe')); ?></span>
                                                        <span class="d-block font-12"><?php echo e(trans('update.target_types_subscription_packages')); ?></span>
                                                    <?php elseif(!empty($transaction->promotion_id)): ?>
                                                        <span class="font-14"><?php echo e(trans('admin/main.purchased_promotion')); ?></span>
                                                    <?php elseif(!empty($transaction->registration_package_id)): ?>
                                                        <span class="font-14"><?php echo e(trans('update.purchased_registration_package')); ?></span>
                                                        <span class="d-block font-12"><?php echo e(trans('update.target_types_registration_packages')); ?></span>
                                                    <?php else: ?>
                                                        ---
                                                    <?php endif; ?>
                                                </div>
                                            </td>

                                            <td><?php echo e($transaction->description); ?></td>

                                            <td>
                                                <?php echo e($transaction->purchase_amount ? handlePrice($transaction->purchase_amount) : '-'); ?>

                                            </td>

                                            <td>
                                                <?php echo e(handlePrice($transaction->amount)); ?>

                                            </td>

                                            <td class="font-12"><?php echo e(dateTimeFormat($transaction->created_at, 'j M Y')); ?></td>

                                            <td class="">
                                                <?php if($transaction->system): ?>
                                                    <span class="font-12 text-danger"><?php echo e(trans('admin/main.refund')); ?></span>
                                                <?php else: ?>
                                                    <span class="font-12 text-success"><?php echo e(trans('update.successful')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center mb-2" width="120">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cashback_transactions')): ?>
                                                    <?php if(!$transaction->system): ?>
                                                        <?php echo $__env->make('admin.includes.delete_button',[
                                                                'url' => getAdminPanelUrl('/cashback/transactions/'. $transaction->id .'/refund'),
                                                                'tooltip' => trans('admin/main.refund'),
                                                                'btnIcon' => 'fa-times-circle'
                                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($transactions->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\cashback\transactions.blade.php ENDPATH**/ ?>