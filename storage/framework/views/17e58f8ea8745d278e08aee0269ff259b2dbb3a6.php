<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl("/abandoned-cart/users-carts")); ?>"><?php echo e(trans('update.users_carts')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="card">
                

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped font-14" id="datatable-basic">

                            <tr>
                                <th class="text-left"><?php echo e(trans('admin/main.item')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.amount')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.date')); ?></th>
                                <th><?php echo e(trans('public.controls')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $cartItemInfo = $cart->getItemInfo();
                                    $cartTaxType = !empty($cartItemInfo['isProduct']) ? 'store' : 'general';
                                ?>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <figure class="avatar mr-2 rounded-sm">
                                                <img src="<?php echo e($cartItemInfo['imgPath']); ?>" class="img-fluid rounded-sm" alt="user avatar" width="80px" height="80px">
                                            </figure>

                                            <div class="">
                                                <a href="<?php echo e($cartItemInfo['itemUrl'] ?? '#!'); ?>" target="_blank">
                                                    <h3 class="font-16 font-weight-bold text-black"><?php echo e($cartItemInfo['title']); ?></h3>
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <?php if(!empty($cartItemInfo['discountPrice'])): ?>
                                            <span class="text-muted text-decoration-line-through mx-2 mx-md-0"><?php echo e(handlePrice($cartItemInfo['price'], true, true, false, null, true, $cartTaxType)); ?></span>
                                            <span class="font-16 mt-0 mt-md-1 font-weight-bold"><?php echo e(handlePrice($cartItemInfo['discountPrice'], true, true, false, null, true, $cartTaxType)); ?></span>
                                        <?php else: ?>
                                            <span class="font-16 mt-0 mt-md-1 font-weight-bold"><?php echo e(handlePrice($cartItemInfo['price'], true, true, false, null, true, $cartTaxType)); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($cart->created_at, 'j M Y H:i')); ?></td>

                                    <td width="100">

                                        <?php echo $__env->make('admin.includes.delete_button', [
                                                'url' => getAdminPanelUrl("/abandoned-cart/users-carts/delete-by-id/{$cart->id}"),
                                                'btnClass' => '',
                                                'tooltip' => trans('admin/main.delete'),
                                                'btnIcon' => 'fa-times'
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\abandoned_cart\users_carts\viewItems\index.blade.php ENDPATH**/ ?>