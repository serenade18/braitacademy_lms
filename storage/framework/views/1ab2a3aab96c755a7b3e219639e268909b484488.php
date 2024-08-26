<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.certificates_templates')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.certificates_templates')); ?></div>
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
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th><?php echo e(trans('admin/main.type')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.action')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <span><?php echo e($template->title); ?></span>
                                            </td>

                                            <td>
                                                <?php if($template->type == 'quiz'): ?>
                                                    <span class=""><?php echo e(trans('update.quiz_related')); ?></span>
                                                <?php else: ?>
                                                    <span class=""><?php echo e(trans('update.course_completion')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <span class="text-<?php echo e(($template->status == 'publish') ? 'success' : ''); ?>"><?php echo e(trans('admin/main.'.$template->status)); ?></span>
                                            </td>

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate_template_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/certificates/templates/<?php echo e($template->id); ?>/edit" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate_template_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/certificates/templates/'. $template->id .'/delete','btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($templates->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/admin/certificates/templates.blade.php ENDPATH**/ ?>