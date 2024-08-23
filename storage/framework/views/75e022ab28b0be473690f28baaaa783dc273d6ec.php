<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <?php echo e($pageTitle); ?>

                </div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-gift"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_gifts')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalGifts); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-money-bill"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_gift_amount')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(handlePrice($totalGiftAmount)); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-paper-plane"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_senders')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalSenders); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-arrow-down"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_receipts')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalReceipts); ?>

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
                                    <input name="search" type="text" class="form-control" value="<?php echo e(request()->get('search')); ?>">
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
                                $filters = ['amount_asc', 'amount_desc', 'submit_date_asc', 'submit_date_desc', 'receive_date_asc', 'receive_date_desc'];
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
                                    <label class="input-label"><?php echo e(trans('update.receipt_status')); ?></label>
                                    <select name="receipt_status" class="form-control">
                                        <option value=""><?php echo e(trans('admin/main.all')); ?></option>
                                        <option value="registered" <?php echo e(request()->get('receipt_status') == "registered" ? 'selected' : ''); ?>><?php echo e(trans('update.registered')); ?></option>
                                        <option value="unregistered" <?php echo e(request()->get('receipt_status') == "unregistered" ? 'selected' : ''); ?>><?php echo e(trans('update.unregistered')); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.gift_status')); ?></label>
                                    <select name="gift_status" class="form-control">
                                        <option value=""><?php echo e(trans('admin/main.all')); ?></option>
                                        <option value="pending" <?php echo e(request()->get('gift_status') == "pending" ? 'selected' : ''); ?>><?php echo e(trans('admin/main.pending')); ?></option>
                                        <option value="sent" <?php echo e(request()->get('gift_status') == "sent" ? 'selected' : ''); ?>><?php echo e(trans('update.sent')); ?></option>
                                        <option value="canceled" <?php echo e(request()->get('gift_status') == "canceled" ? 'selected' : ''); ?>><?php echo e(trans('public.canceled')); ?></option>
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
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_gift_export')): ?>
                                <div class="text-right">
                                    <a href="<?php echo e(getAdminPanelUrl('/gifts/excel?'. http_build_query(request()->all()))); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.sender')); ?></th>
                                        <th><?php echo e(trans('update.receipt')); ?></th>
                                        <th><?php echo e(trans('update.receipt_status')); ?></th>
                                        <th><?php echo e(trans('update.gift_message')); ?></th>
                                        <th><?php echo e(trans('admin/main.amount')); ?></th>
                                        <th><?php echo e(trans('update.submit_date')); ?></th>
                                        <th><?php echo e(trans('update.receive_date')); ?></th>
                                        <th><?php echo e(trans('update.gift_status')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $gifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">

                                            <td class="text-left">
                                                <?php echo e($gift->getItemTitle()); ?>

                                            </td>

                                            <td class="text-left">
                                                <div class="mt-0 mb-1 font-weight-bold"><?php echo e($gift->user->full_name); ?></div>

                                                <?php if($gift->user->mobile): ?>
                                                    <div class="text-primary text-small font-600-bold"><?php echo e($gift->user->mobile); ?></div>
                                                <?php endif; ?>

                                                <?php if($gift->user->email): ?>
                                                    <div class="text-primary text-small font-600-bold"><?php echo e($gift->user->email); ?></div>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if(!empty($gift->receipt)): ?>
                                                    <div class="mt-0 mb-1 font-weight-bold"><?php echo e($gift->receipt->full_name); ?></div>
                                                <?php else: ?>
                                                    <div class="mt-0 mb-1 font-weight-bold"><?php echo e($gift->name); ?></div>
                                                <?php endif; ?>
                                                <div class="text-primary text-small font-600-bold"><?php echo e($gift->email); ?></div>
                                            </td>

                                            <td class="">
                                                <span class=""><?php echo e($gift->receipt_status ? trans('update.registered') : trans('update.unregistered')); ?></span>
                                            </td>

                                            <td class="">
                                                <div class="d-flex">
                                                    <button type="button" class="js-show-gift-message btn btn-outline-primary"><?php echo e(trans('update.message')); ?></button>
                                                    <input type="hidden" value="<?php echo e(nl2br($gift->description)); ?>">
                                                </div>
                                            </td>

                                            <td class="">
                                                <?php if(!empty($gift->sale) and $gift->sale->total_amount > 0): ?>
                                                    <?php echo e(handlePrice($gift->sale->total_amount)); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('admin/main.free')); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td class="">
                                                <?php echo e(dateTimeFormat($gift->created_at, 'j M Y H:i')); ?>

                                            </td>

                                            <td class="">
                                                <?php if(!empty($gift->date)): ?>
                                                    <?php echo e(dateTimeFormat($gift->date, 'j M Y H:i')); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('update.instantly')); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td class="">
                                                <?php if(!empty($gift->date) and $gift->date > time()): ?>
                                                    <span class="text-warning"><?php echo e(trans('admin/main.pending')); ?></span>
                                                <?php elseif($gift->status == 'cancel'): ?>
                                                    <span class="text-danger"><?php echo e(trans('admin/main.pending')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-success"><?php echo e(trans('update.sent')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center mb-2" width="120">

                                                <?php if($gift->status != 'cancel'): ?>
                                                    <div class="d-flex align-items-center justify-content-end">
                                                        <?php if(empty($gift->date) or $gift->date < time()): ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_gift_send_reminder')): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                        'url' => getAdminPanelUrl("/gifts/{$gift->id}/send_reminder"),
                                                                        'btnClass' => 'text-primary btn-transparent',
                                                                        'tooltip' => trans('admin/main.send_reminder'),
                                                                        'btnIcon' => 'fa-paper-plane'
                                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>


                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_gift_cancel')): ?>
                                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                                        'url' => getAdminPanelUrl("/gifts/{$gift->id}/cancel"),
                                                                        'btnClass' => 'text-danger btn-transparent ml-2',
                                                                        'tooltip' => trans('admin/main.cancel'),
                                                                        'btnIcon' => 'fa-times'
                                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($gifts->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="giftMessage" tabindex="-1" aria-labelledby="giftMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="giftMessageLabel"><?php echo e(trans('admin/main.message')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/gifts.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\gifts\history.blade.php ENDPATH**/ ?>