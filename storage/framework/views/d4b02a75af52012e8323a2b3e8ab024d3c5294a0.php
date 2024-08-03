<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.testimonials')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.testimonials')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_testimonials_create')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/testimonials/create" class="btn btn-primary"><?php echo e(trans('admin/main.add_new')); ?></a>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(trans('admin/main.user_name')); ?></th>
                                        <th><?php echo e(trans('admin/main.rate')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.content')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th><?php echo e(trans('admin/main.action')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo e($testimonial->user_avatar); ?>" alt="" width="56" height="56" class="rounded-circle">
                                            </td>
                                            <td><?php echo e($testimonial->user_name); ?></td>
                                            <td><?php echo e($testimonial->rate); ?></td>
                                            <td class="text-center" width="30%"><?php echo e(nl2br(truncate($testimonial->comment, 150, true))); ?></td>

                                            <td class="text-center">
                                                <?php if($testimonial->status == 'active'): ?>
                                                    <span class="text-success"><?php echo e(trans('admin/main.active')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-warning"><?php echo e(trans('admin/main.disable')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(dateTimeFormat($testimonial->created_at, 'j M Y | H:i')); ?></td>
                                            <td width="150px">

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_supports_reply')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/testimonials/<?php echo e($testimonial->id); ?>/edit" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_supports_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/testimonials/'.$testimonial->id.'/delete' , 'btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($testimonials->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/testimonials/lists.blade.php ENDPATH**/ ?>