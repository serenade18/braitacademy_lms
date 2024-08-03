<div class="tab-pane mt-3 fade <?php echo e((request()->get('tab') == "loginHistory") ? 'active show' : ''); ?>" id="loginHistory" role="tabpanel" aria-labelledby="loginHistory-tab">
    <div class="row">

        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="section-title after-line m-0 flex-1 mr-10"><?php echo e(trans('update.login_history')); ?></h5>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_login_history_end_session')): ?>
                    <?php echo $__env->make('admin.includes.delete_button',[
                        'url' => getAdminPanelUrl("/users/{$user->id}/end-all-login-sessions"),
                        'noBtnTransparent' => true,
                        'btnText' => trans('update.end_all_sessions'),
                        'btnClass' => "btn btn-primary text-white"
                       ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>

            <div class="table-responsive mt-5">
                <table class="table table-striped font-14">
                    <tr>
                        <th><?php echo e(trans('update.os')); ?></th>
                        <th><?php echo e(trans('update.browser')); ?></th>
                        <th><?php echo e(trans('update.device')); ?></th>
                        <th><?php echo e(trans('update.ip_address')); ?></th>
                        <th><?php echo e(trans('update.country')); ?></th>
                        <th><?php echo e(trans('update.city')); ?></th>
                        <th><?php echo e(trans('update.lat,long')); ?></th>
                        <th><?php echo e(trans('update.session_start')); ?></th>
                        <th><?php echo e(trans('update.session_end')); ?></th>
                        <th><?php echo e(trans('public.duration')); ?></th>
                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                    </tr>

                    <?php if(!empty($userLoginHistories)): ?>
                        <?php $__currentLoopData = $userLoginHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($session->os ?? '-'); ?></td>

                                <td><?php echo e($session->browser ?? '-'); ?></td>

                                <td><?php echo e($session->device ?? '-'); ?></td>

                                <td><?php echo e($session->ip ?? '-'); ?></td>

                                <td><?php echo e($session->country ?? '-'); ?></td>

                                <td><?php echo e($session->city ?? '-'); ?></td>

                                <td><?php echo e($session->location ?? '-'); ?></td>

                                <td><?php echo e(dateTimeFormat($session->session_start_at, 'j M Y H:i')); ?></td>

                                <td><?php echo e(!empty($session->session_end_at) ? dateTimeFormat($session->session_end_at, 'j M Y H:i') : '-'); ?></td>

                                <td><?php echo e($session->getDuration()); ?></td>

                                <td class="text-center mb-2" width="120">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_login_history_end_session')): ?>
                                        <?php if(empty($session->session_end_at)): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                'url' => getAdminPanelUrl().'/users/login-history/'.$session->id.'/end-session' ,
                                                'btnIcon' => 'fa-arrow-down',
                                                'tooltip' => trans('update.end_session')
                                               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_login_history_delete')): ?>
                                        <?php echo $__env->make('admin.includes.delete_button',[
                                                'url' => getAdminPanelUrl().'/users/login-history/'.$session->id.'/delete' ,
                                               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>

                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </table>
            </div>

            <?php if(!empty($userLoginHistories)): ?>
                <div class="card-footer text-center">
                    <?php echo e($userLoginHistories->appends(request()->input())->links()); ?>

                </div>
            <?php endif; ?>


        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/users/editTabs/login_history.blade.php ENDPATH**/ ?>