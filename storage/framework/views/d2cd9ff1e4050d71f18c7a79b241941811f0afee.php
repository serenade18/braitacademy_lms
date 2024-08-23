<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.promotion_sales')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.promotion_sales')); ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.full_name')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.webinar')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.created_at')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $promotionSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotionSale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e(!empty($promotionSale->promotion) ? $promotionSale->promotion->title : trans('update.deleted_promotion')); ?></td>
                                            <td class="text-left"><?php echo e(!empty($promotionSale->buyer) ? $promotionSale->buyer->full_name : trans('update.deleted_user')); ?></td>
                                            <td class="text-left">
                                                <?php if(!empty($promotionSale->webinar)): ?>
                                                    <a href="<?php echo e($promotionSale->webinar->getUrl()); ?>" target="_blank"><?php echo e($promotionSale->webinar->title); ?></a>
                                                <?php else: ?>
                                                    <?php echo e(trans('update.deleted_item')); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"><?php echo e(dateTimeFormat($promotionSale->created_at, 'Y-m-d H:i:s')); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($promotionSales->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\promotions\promotion_sales.blade.php ENDPATH**/ ?>