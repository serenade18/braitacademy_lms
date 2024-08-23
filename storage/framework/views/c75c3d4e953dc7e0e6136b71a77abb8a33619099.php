<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages_create')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/pages/create" class="btn btn-primary"><?php echo e(trans('admin/main.add_new')); ?></a>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.name')); ?></th>
                                        <th><?php echo e(trans('admin/main.link')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.robot')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th><?php echo e(trans('admin/main.action')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($page->name); ?></td>
                                            <td><?php echo e($page->link); ?></td>
                                            <td class="text-center">
                                                <?php if($page->robot): ?>
                                                    <span class="text-success"><?php echo e(trans('admin/main.follow')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-danger"><?php echo e(trans('admin/main.no_follow')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center">
                                                <?php if($page->status == 'publish'): ?>
                                                    <span class="text-success"><?php echo e(trans('admin/main.published')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-warning"><?php echo e(trans('admin/main.is_draft')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(dateTimeFormat($page->created_at, 'j M Y | H:i')); ?></td>
                                            <td width="150px">

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/pages/<?php echo e($page->id); ?>/edit" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages_toggle')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/pages/<?php echo e($page->id); ?>/toggle" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(($page->status == 'draft') ? trans('admin/main.publish') : trans('admin/main.draft')); ?>">
                                                        <?php if($page->status == 'draft'): ?>
                                                            <i class="fa fa-arrow-up"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-arrow-down"></i>
                                                        <?php endif; ?>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/pages/'.$page->id.'/delete' , 'btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($pages->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\pages\lists.blade.php ENDPATH**/ ?>