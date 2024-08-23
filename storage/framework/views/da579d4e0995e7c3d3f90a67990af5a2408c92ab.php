<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('update.forms')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('update.forms')); ?></div>
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
                                        <th><?php echo e(trans('update.inputs')); ?></th>
                                        <th><?php echo e(trans('update.submissions')); ?></th>
                                        <th><?php echo e(trans('admin/main.users')); ?></th>
                                        <th><?php echo e(trans('update.last_submission')); ?></th>
                                        <th><?php echo e(trans('admin/main.created_date')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($form->title); ?></td>

                                            <td><?php echo e($form->fields_count); ?></td>

                                            <td><?php echo e($form->submissions_count); ?></td>

                                            <td><?php echo e($form->users_count); ?></td>

                                            <td><?php echo e(dateTimeFormat(time(), 'j M Y')); ?></td>

                                            <td><?php echo e(dateTimeFormat($form->created_at, 'j M Y')); ?></td>

                                            <td>
                                                <?php if($form->enable): ?>
                                                    <span class=""><?php echo e(trans('admin/main.active')); ?></span>
                                                <?php else: ?>
                                                    <span class=""><?php echo e(trans('admin/main.inactive')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>

                                                <a href="/forms/<?php echo e($form->url); ?>" target="_blank"
                                                   class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('update.show_form')); ?>">
                                                    <i class="fa fa-link"></i>
                                                </a>


                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forms_submissions')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/forms/submissions?form=<?php echo e($form->id); ?>"
                                                       class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('update.show_submissions')); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forms_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/forms/<?php echo e($form->id); ?>/edit"
                                                       class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forms_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/forms/'.$form->id.'/delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($forms->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\forms\lists\index.blade.php ENDPATH**/ ?>