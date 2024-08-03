<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.promotions')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.promotions')); ?></div>
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
                                        <th></th>
                                        <th><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.sale_count')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.price')); ?></th>
                                        <th class="text-center"><?php echo e(trans('public.days')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.is_popular')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo e($promotion->icon); ?>" width="50" height="50" alt="">
                                            </td>
                                            <td><?php echo e($promotion->title); ?></td>
                                            <td class="text-center"><?php echo e($promotion->sales->count()); ?></td>
                                            <td class="text-center"><?php echo e(handlePrice($promotion->price)); ?></td>
                                            <td class="text-center"><?php echo e($promotion->days); ?> <?php echo e(trans('public.day')); ?></td>
                                            <td class="text-center">
                                                <?php if($promotion->is_popular): ?>
                                                    <span class="fas fa-check text-success"></span>
                                                <?php else: ?>
                                                    <span class="fas fa-times text-danger"></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"><?php echo e(dateTimeFormat($promotion->created_at, 'Y M j | H:i')); ?></td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/promotions/<?php echo e($promotion->id); ?>/edit" class="btn-sm btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/financial/promotions/'. $promotion->id.'/delete','btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($promotions->appends(request()->input())->links()); ?>

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
                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.promotions_list_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold mb-2"><?php echo e(trans('admin/main.promotions_list_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.promotions_list_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold mb-2"><?php echo e(trans('admin/main.promotions_list_hint_description_2')); ?></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.promotions_list_hint_title_3')); ?></div>
                        <div class=" text-small font-600-bold mb-2"><?php echo e(trans('admin/main.promotions_list_hint_description_3')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/financial/promotions/lists.blade.php ENDPATH**/ ?>