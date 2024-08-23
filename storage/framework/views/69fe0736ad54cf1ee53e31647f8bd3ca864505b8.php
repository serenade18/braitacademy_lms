<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('update.waitlists')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('update.waitlists')); ?></div>
            </div>
        </div>

        <div class="section-body">


            <div class="card">
                <div class="card-header">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_waitlists_exports')): ?>
                        <a href="<?php echo e(getAdminPanelUrl('/waitlists/export')); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <table class="table table-striped font-14" id="datatable-details">
                        <thead>
                        <tr>
                            <th class="text-left"><?php echo e(trans('admin/main.course')); ?></th>
                            <th class=""><?php echo e(trans('update.members')); ?></th>
                            <th class=""><?php echo e(trans('update.registered_members')); ?></th>
                            <th class=""><?php echo e(trans('update.last_submission')); ?></th>
                            <th class="text-left"><?php echo e(trans('admin/main.actions')); ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $waitlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $waitlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-left">
                                    <a class="text-primary mt-0 mb-1 font-weight-bold" href="<?php echo e($waitlist->getUrl()); ?>"><?php echo e($waitlist->title); ?></a>
                                    <?php if(!empty($waitlist->category->title)): ?>
                                        <div class="text-small"><?php echo e($waitlist->category->title); ?></div>
                                    <?php else: ?>
                                        <div class="text-small text-warning"><?php echo e(trans('admin/main.no_category')); ?></div>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo e($waitlist->members); ?></td>

                                <td><?php echo e($waitlist->registered_members); ?></td>

                                <td>
                                    <?php echo e(!empty($waitlist->last_submission) ? dateTimeFormat($waitlist->last_submission, 'j M Y H:i') : '-'); ?>

                                </td>

                                <td class="text-left">
                                    <div class="btn-group dropdown table-actions">
                                        <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu webinars-lists-dropdown">

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_waitlists_clear_list')): ?>
                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                    'url' => getAdminPanelUrl("/waitlists/{$waitlist->id}/clear_list"),
                                                    'btnClass' => 'd-flex align-items-center text-warning text-decoration-none btn-transparent btn-sm mt-1',
                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("update.clear_list") .'</span>'
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_waitlists_users')): ?>
                                                <a href="<?php echo e(getAdminPanelUrl("/waitlists/{$waitlist->id}/view_list")); ?>" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1">
                                                    <i class="fa fa-eye"></i>
                                                    <span class="ml-2"><?php echo e(trans("update.view_list")); ?></span>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_waitlists_exports')): ?>
                                                <a href="<?php echo e(getAdminPanelUrl("/waitlists/{$waitlist->id}/export_list")); ?>" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1">
                                                    <i class="fa fa-download"></i>
                                                    <span class="ml-2"><?php echo e(trans("update.export_list")); ?></span>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_waitlists_disable')): ?>
                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                        'url' => getAdminPanelUrl("/waitlists/{$waitlist->id}/disable"),
                                                        'btnClass' => 'd-flex align-items-center text-danger text-decoration-none btn-transparent btn-sm mt-1',
                                                        'btnText' => '<i class="fa fa-lock"></i><span class="ml-2">'. trans("update.disable_waitlist") .'</span>'
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($waitlists->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\waitlists\index.blade.php ENDPATH**/ ?>