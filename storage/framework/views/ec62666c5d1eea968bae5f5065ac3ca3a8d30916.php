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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.user')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.package')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $becomeInstructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $become): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                        <?php if(!empty($become->user->full_name)): ?>
                                        <td><?php echo e($become->user->full_name); ?></td>
                                               <?php else: ?>
                                                <td class="text-danger">User Deleted</td>
                                                <?php endif; ?>


                                           

                                            <td>
                                                <?php if(!empty($become->registrationPackage)): ?>
                                                    <?php echo e($become->registrationPackage->title); ?>

                                                <?php else: ?>
                                                    ---
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center">
                                                <span class="<?php echo e(($become->status == 'accept' ? 'text-success' : ($become->status == 'pending' ? 'text-warning' : 'text-danger'))); ?>">
                                                    <?php if($become->status == 'accept'): ?>
                                                        <?php echo e(trans('admin/main.accepted')); ?>

                                                    <?php elseif($become->status == 'pending'): ?>
                                                        <?php echo e(trans('admin/main.waiting')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(trans('public.rejected')); ?>

                                                    <?php endif; ?>
                                                </span>
                                            </td>

                                            <td class="text-center"><?php echo e(dateTimeFormat($become->created_at, 'Y M j | H:i')); ?></td>

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_become_instructors_reject')): ?>
                                                    <?php if($become->status != 'accept'): ?>
                                                        <?php echo $__env->make('admin.includes.delete_button',[
                                                             'url' => getAdminPanelUrl("/users/{$become->user_id}/acceptRequestToInstructor") ,
                                                             'btnClass' => 'mr-1',
                                                             'btnIcon' => 'fa-check',
                                                             'tooltip' => trans('admin/main.accept_request')
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php echo $__env->make('admin.includes.delete_button',[
                                                         'url' => getAdminPanelUrl("/users/become-instructors/{$become->id}/reject") ,
                                                         'btnClass' => 'mr-1',
                                                         'btnIcon' => 'fa-times',
                                                         'tooltip' => trans('admin/main.reject_request')
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($become->user_id); ?>/edit?type=check_instructor_request" class="btn-transparent text-primary mr-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.check')); ?>">
                                                        <i class="fa fa-id-card" aria-hidden="true"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_become_instructors_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',[
                                                             'url' => getAdminPanelUrl().'/users/become-instructors/'. $become->id .'/delete' ,
                                                             'btnClass' => '',
                                                             'btnIcon' => 'fa-trash',
                                                             'tooltip' => trans('admin/main.delete')
                                                         ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($becomeInstructors->appends(request()->input())->links()); ?>

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
                <div class="col-md-6">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.become_instructor_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.become_instructor_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.become_instructor_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.become_instructor_hint_description_2')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\users\become_instructors\lists.blade.php ENDPATH**/ ?>