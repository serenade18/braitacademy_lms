<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('update.service_templates')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('update.service_templates')); ?></div>
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
                                        <th><?php echo e(trans('update.service_type')); ?></th>
                                        <th><?php echo e(trans('update.generated_contents')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($template->title); ?></td>

                                            <td><?php echo e(trans($template->type)); ?></td>

                                            <td><?php echo e($template->contents_count ?? 0); ?></td>

                                            <td>
                                                <?php if($template->enable): ?>
                                                    <span class="text-success"><?php echo e(trans('admin/main.active')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-danger"><?php echo e(trans('admin/main.inactive')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_ai_contents_templates_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/ai-contents/templates/<?php echo e($template->id); ?>/edit"
                                                       class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <?php echo $__env->make('admin.includes.delete_button',[
                                                          'url' => getAdminPanelUrl('/ai-contents/templates/'. $template->id.'/statusToggle'),
                                                          'tooltip' => ($template->enable ? trans('admin/main.inactive') : trans('admin/main.active')),
                                                          'btnClass' => 'mx-2',
                                                          'btnIcon' => "fa-times-circle"
                                                      ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_ai_contents_templates_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/ai-contents/templates/'.$template->id.'/delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\ai_contents\templates\lists\index.blade.php ENDPATH**/ ?>