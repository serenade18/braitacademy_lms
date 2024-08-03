<div class="tab-pane mt-3 fade" id="badges" role="tabpanel" aria-labelledby="badges-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($user->id .'/badgesUpdate'); ?>" method="Post">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <select name="badge_id" class="form-control <?php $__errorArgs = ['badge_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value=""><?php echo e(trans('admin/main.select_badge')); ?></option>

                        <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($badge->id); ?>"><?php echo e($badge->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['badge_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class=" mt-4">
                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                </div>
            </form>

        </div>

        <div class="col-12">
            <div class="mt-5">
                <h5><?php echo e(trans('admin/main.custom_badges')); ?></h5>

                <div class="table-responsive mt-3">
                    <table class="table table-striped table-md">
                        <tr>
                            <th><?php echo e(trans('admin/main.title')); ?></th>
                            <th><?php echo e(trans('admin/main.image')); ?></th>
                            <th><?php echo e(trans('admin/main.condition')); ?></th>
                            <th><?php echo e(trans('admin/main.description')); ?></th>
                            <th class="text-center"><?php echo e(trans('admin/main.created_at')); ?></th>
                            <th><?php echo e(trans('admin/main.actions')); ?></th>
                        </tr>

                        <?php if(!empty($user->customBadges)): ?>
                            <?php $__currentLoopData = $user->customBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customBadge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php
                                    $condition = json_decode($customBadge->badge->condition);
                                ?>

                                <tr>
                                    <td><?php echo e($customBadge->badge->title); ?></td>
                                    <td>
                                        <img src="<?php echo e($customBadge->badge->image); ?>" width="24"/>
                                    </td>
                                    <td><?php echo e($condition->from); ?> to <?php echo e($condition->to); ?></td>
                                    <td width="25%">
                                        <p><?php echo e($customBadge->badge->description); ?></p>
                                    </td>
                                    <td class="text-center"><?php echo e(dateTimeFormat($customBadge->badge->created_at,'j M Y')); ?></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/users/'.$user->id.'/deleteBadge/'.$customBadge->id , 'btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="mt-5">
                <h5><?php echo e(trans('admin/main.auto_badges')); ?></h5>

                <div class="table-responsive mt-3">
                    <table class="table table-striped table-md">
                        <tr>
                            <th><?php echo e(trans('admin/main.title')); ?></th>
                            <th><?php echo e(trans('admin/main.image')); ?></th>
                            <th><?php echo e(trans('admin/main.condition')); ?></th>
                            <th><?php echo e(trans('admin/main.description')); ?></th>
                            <th><?php echo e(trans('admin/main.created_at')); ?></th>
                        </tr>

                        <?php if(!empty($userBadges)): ?>
                            <?php $__currentLoopData = $userBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $badgeCondition = json_decode($badge->condition);
                                ?>

                                <tr>
                                    <td><?php echo e($badge->title); ?></td>
                                    <td>
                                        <img src="<?php echo e($badge->image); ?>" width="24"/>
                                    </td>
                                    <td><?php echo e($badgeCondition->from); ?> to <?php echo e($badgeCondition->to); ?></td>
                                    <td width="25%">
                                        <p><?php echo e($badge->description); ?></p>
                                    </td>
                                    <td><?php echo e(dateTimeFormat($badge->created_at,'j M Y')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/users/editTabs/badges.blade.php ENDPATH**/ ?>