<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <h2 class="section-title"><?php echo e(trans('update.coupons_overview')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/upcoming.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($totalCoupons); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.total_coupons')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($activeCoupons); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.active_coupons')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/hours.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($couponPurchases); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.coupon_purchases')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/49.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($purchaseAmount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.purchase_amount')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="mt-25">
        <h2 class="section-title"><?php echo e(trans('update.filter_coupons')); ?></h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="/panel/marketing/discounts" method="get" class="row">
                <div class="col-12 col-lg-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.from')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="from" autocomplete="off" value="<?php echo e(request()->get('from')); ?>" class="form-control <?php echo e(!empty(request()->get('from')) ? 'datepicker' : 'datefilter'); ?>" aria-describedby="dateInputGroupPrepend"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.to')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="to" autocomplete="off" value="<?php echo e(request()->get('to')); ?>" class="form-control <?php echo e(!empty(request()->get('to')) ? 'datepicker' : 'datefilter'); ?>" aria-describedby="dateInputGroupPrepend"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('update.source')); ?></label>
                        <select name="source" class="form-control">
                            <option value=""><?php echo e(trans('public.all')); ?></option>

                            <?php $__currentLoopData = \App\Models\Discount::$panelDiscountSource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($source); ?>" <?php echo e((request()->get('source') == $source) ? 'selected' : ''); ?>><?php echo e(trans('update.discount_source_'.$source)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-12 col-lg-2">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                        <select name="status" class="form-control">
                            <option value=""><?php echo e(trans('public.all')); ?></option>

                            <option value="active" <?php echo e((request()->get('status') == "active") ? 'selected' : ''); ?>><?php echo e(trans('public.active')); ?></option>
                            <option value="expired" <?php echo e((request()->get('status') == "expired") ? 'selected' : ''); ?>><?php echo e(trans('panel.expired')); ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary w-100 mt-2"><?php echo e(trans('public.show_results')); ?></button>
                </div>
            </form>
        </div>
    </section>

    <?php if(!empty($discounts) and $discounts->count() > 0): ?>

        <section class="mt-35">
            <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
                <h2 class="section-title"><?php echo e(trans('update.coupons_list')); ?></h2>

                <form action="" method="get" class="d-flex align-items-center flex-row-reverse flex-md-row justify-content-start justify-content-md-center mt-20 mt-md-0">
                    <label class="cursor-pointer mb-0 mr-10 text-gray font-14 font-weight-500" for="activeDiscountsSwitch"><?php echo e(trans('update.show_only_active_coupons')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="status" class="js-panel-list-switch-filter custom-control-input" <?php echo e((request()->get('status') == 'active') ? 'checked' : ''); ?> value="active" id="activeDiscountsSwitch">
                        <label class="custom-control-label" for="activeDiscountsSwitch"></label>
                    </div>
                </form>
            </div>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table custom-table text-center">
                                <thead>
                                <tr>
                                    <th class="text-left text-gray"><?php echo e(trans('public.title')); ?></th>
                                    <th class="text-left text-gray"><?php echo e(trans('update.source')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('panel.amount')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('admin/main.usable_times')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('update.min_amount')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('update.max_amount')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('admin/main.sales')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('admin/main.created_date')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('update.expiry_date')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('public.status')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left align-middle text-dark-blue font-weight-500">
                                            <?php echo e($discount->title); ?>

                                        </td>

                                        <td class="align-middle">
                                            <?php echo e(trans("update.discount_source_{$discount->source}")); ?>

                                        </td>

                                        <td class="align-middle">
                                            <?php echo e($discount->amount ?  handlePrice($discount->amount) : '-'); ?>

                                        </td>

                                        <td class="align-middle">
                                            <div class="font-16 font-weight-500 text-secondary"><?php echo e($discount->count); ?></div>
                                            <div class="text-12 text-gray mt-5"><?php echo e(trans('admin/main.remain')); ?> : <?php echo e($discount->discountRemain()); ?></div>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo e($discount->minimum_order ?  handlePrice($discount->minimum_order) : '-'); ?>

                                        </td>

                                        <td class="align-middle">
                                            <?php echo e($discount->max_amount ?  handlePrice($discount->max_amount) : '-'); ?>

                                        </td>

                                        <?php
                                            $salesStats = $discount->salesStats();
                                        ?>

                                        <td class="align-middle">
                                            <div class="font-16 font-weight-500 text-secondary"><?php echo e($salesStats['count']); ?></div>

                                            <?php if(!empty($salesStats['amount'])): ?>
                                                <div class="text-12 text-gray mt-5"><?php echo e(handlePrice($salesStats['amount'])); ?></div>
                                            <?php endif; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo e(dateTimeFormat($discount->created_at, 'Y M d')); ?>

                                        </td>

                                        <td class="align-middle">
                                            <?php echo e(dateTimeFormat($discount->expired_at, 'Y M d - H:i')); ?>

                                        </td>

                                        <td class="align-middle">
                                            <?php if($discount->expired_at < time()): ?>
                                                <span class="text-danger"><?php echo e(trans('panel.expired')); ?></span>
                                            <?php else: ?>
                                                <span class="text-primary"><?php echo e(trans('admin/main.active')); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-right align-middle">
                                            <?php if($discount->status != \App\Models\SpecialOffer::$inactive): ?>
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i data-feather="more-vertical" height="20"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="/panel/marketing/discounts/<?php echo e($discount->id); ?>/edit" type="button"
                                                           class="btn-transparent text-gray d-block"><?php echo e(trans('public.edit')); ?></a>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_marketing_delete_coupon')): ?>
                                                            <a href="/panel/marketing/discounts/<?php echo e($discount->id); ?>/delete" type="button"
                                                               class="delete-action btn-transparent text-danger mt-5 d-block"><?php echo e(trans('public.delete')); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <div class="my-30">
            <?php echo e($discounts->appends(request()->input())->links('vendor.pagination.panel')); ?>

        </div>

    <?php else: ?>

        <?php echo $__env->make(getTemplate() . '.includes.no-result',[
            'file_name' => 'offer.png',
            'title' => trans('panel.discount_no_result'),
            'hint' =>  nl2br(trans('panel.discount_no_result_hint')) ,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\marketing\discounts\lists\index.blade.php ENDPATH**/ ?>