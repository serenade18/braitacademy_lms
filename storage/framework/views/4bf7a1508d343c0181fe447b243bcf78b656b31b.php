<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.categories')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('categories.categories')); ?></div>
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
                                        <th><?php echo e(trans('admin/main.icon')); ?></th>
                                        <th class="text-left"><?php echo e(trans('update.order')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th><?php echo e(trans('admin/main.sub_category')); ?></th>
                                        <th><?php echo e(trans('panel.classes')); ?></th>
                                        <th><?php echo e(trans('home.teachers')); ?></th>
                                        <th><?php echo e(trans('admin/main.action')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td>
                                                <?php if(!empty($category->icon)): ?>
                                                    <img src="<?php echo e($category->icon); ?>" width="30" alt="">
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-left"><?php echo e($category->order); ?></td>
                                            <td class="text-left"><?php echo e($category->title); ?></td>
                                            <td><?php echo e($category->subCategories->count()); ?></td>
                                            <td><?php echo e(count($category->getCategoryCourses())); ?></td>
                                            <td><?php echo e(count($category->getCategoryInstructorsIdsHasMeeting())); ?></td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/categories/<?php echo e($category->id); ?>/edit"
                                                       class="btn-transparent btn-sm text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/categories/'.$category->id.'/delete', 'deleteConfirmMsg' => trans('update.category_delete_confirm_msg')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($categories->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\categories\lists.blade.php ENDPATH**/ ?>