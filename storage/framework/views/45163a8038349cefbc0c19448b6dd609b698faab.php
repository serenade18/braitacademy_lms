<div class="tab-pane mt-3 fade" id="purchased_courses" role="tabpanel" aria-labelledby="purchased_courses-tab">
    <div class="row">

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_add_student_to_items')): ?>
            <div class="col-12 col-md-6">
                <h5 class="section-title after-line"><?php echo e(trans('update.add_student_to_course')); ?></h5>

                <form action="<?php echo e(getAdminPanelUrl()); ?>/enrollments/store" method="Post">

                    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('admin/main.class')); ?></label>
                        <select name="webinar_id" class="form-control search-webinar-select2"
                                data-placeholder="<?php echo e(trans('panel.choose_webinar')); ?>">

                        </select>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class=" mt-4">
                        <button type="button" class="js-save-manual-add btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                    </div>
                </form>
            </div>
        <?php endif; ?>

        <div class="col-12">
            <div class="mt-5">
                <h5 class="section-title after-line"><?php echo e(trans('update.manual_added')); ?></h5>

                <div class="table-responsive mt-3">
                    <table class="table table-striped table-md">
                        <tr>
                            <th><?php echo e(trans('admin/main.class')); ?></th>
                            <th><?php echo e(trans('admin/main.type')); ?></th>
                            <th><?php echo e(trans('admin/main.price')); ?></th>
                            <th><?php echo e(trans('admin/main.instructor')); ?></th>
                            <th class="text-center"><?php echo e(trans('update.added_date')); ?></th>
                            <th class="text-right"><?php echo e(trans('admin/main.actions')); ?></th>
                        </tr>

                        <?php if(!empty($manualAddedClasses)): ?>
                            <?php $__currentLoopData = $manualAddedClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manualAddedClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td width="25%">
                                        <a href="<?php echo e(!empty($manualAddedClass->webinar) ? $manualAddedClass->webinar->getUrl() : '#1'); ?>" target="_blank" class=""><?php echo e(!empty($manualAddedClass->webinar) ? $manualAddedClass->webinar->title : trans('update.deleted_item')); ?></a>
                                    </td>

                                    <td>
                                        <?php if(!empty($manualAddedClass->webinar)): ?>
                                            <?php echo e(trans('admin/main.'.$manualAddedClass->webinar->type)); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if(!empty($manualAddedClass->webinar)): ?>
                                            <?php echo e(!empty($manualAddedClass->webinar->price) ? handlePrice($manualAddedClass->webinar->price) : '-'); ?>

                                        <?php else: ?>
                                            <?php echo e(!empty($manualAddedClass->amount) ? handlePrice($manualAddedClass->amount) : '-'); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td width="25%">
                                        <?php if(!empty($manualAddedClass->webinar)): ?>
                                            <p><?php echo e($manualAddedClass->webinar->creator->full_name); ?></p>
                                        <?php else: ?>
                                            <p><?php echo e($manualAddedClass->seller->full_name); ?></p>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($manualAddedClass->created_at,'j M Y | H:i')); ?></td>
                                    <td class="text-right">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_block_access')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                    'url' => getAdminPanelUrl().'/enrollments/'. $manualAddedClass->id .'/block-access',
                                                    'tooltip' => trans('update.block_access'),
                                                    'btnIcon' => 'fa-times-circle'
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </table>
                    <p class="font-12 text-gray mt-1 mb-0"><?php echo e(trans('update.manual_add_hint')); ?></p>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="mt-5">
                <h5 class="section-title after-line"><?php echo e(trans('update.manual_disabled')); ?></h5>

                <div class="table-responsive mt-3">
                    <table class="table table-striped table-md">
                        <tr>
                            <th><?php echo e(trans('admin/main.class')); ?></th>
                            <th><?php echo e(trans('admin/main.type')); ?></th>
                            <th><?php echo e(trans('admin/main.price')); ?></th>
                            <th><?php echo e(trans('admin/main.instructor')); ?></th>
                            <th class="text-right"><?php echo e(trans('admin/main.actions')); ?></th>
                        </tr>

                        <?php if(!empty($manualDisabledClasses)): ?>
                            <?php $__currentLoopData = $manualDisabledClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manualDisabledClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td width="25%">
                                        <a href="<?php echo e(!empty($manualDisabledClass->webinar) ? $manualDisabledClass->webinar->getUrl() : '#1'); ?>" target="_blank" class=""><?php echo e(!empty($manualDisabledClass->webinar) ? $manualDisabledClass->webinar->title : trans('update.deleted_item')); ?></a>
                                    </td>

                                    <td>
                                        <?php if(!empty($manualDisabledClass->webinar)): ?>
                                            <?php echo e(trans('admin/main.'.$manualDisabledClass->webinar->type)); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if(!empty($manualDisabledClass->webinar)): ?>
                                            <?php echo e(!empty($manualDisabledClass->webinar->price) ? handlePrice($manualDisabledClass->webinar->price) : '-'); ?>

                                        <?php else: ?>
                                            <?php echo e(!empty($manualDisabledClass->amount) ? handlePrice($manualDisabledClass->amount) : '-'); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td width="25%">
                                        <?php if(!empty($manualDisabledClass->webinar)): ?>
                                            <p><?php echo e($manualDisabledClass->webinar->creator->full_name); ?></p>
                                        <?php else: ?>
                                            <p><?php echo e($manualDisabledClass->seller->full_name); ?></p>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-right">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_block_access')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                    'url' => getAdminPanelUrl().'/enrollments/'. $manualDisabledClass->id .'/enable-access',
                                                    'tooltip' => trans('update.enable-student-access'),
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </table>
                    <p class="font-12 text-gray mt-1 mb-0"><?php echo e(trans('update.manual_remove_hint')); ?></p>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="mt-5">
                <h5 class="section-title after-line"><?php echo e(trans('panel.purchased')); ?></h5>

                <div class="table-responsive mt-3">
                    <table class="table table-striped table-md">
                        <tr>
                            <th><?php echo e(trans('admin/main.class')); ?></th>
                            <th><?php echo e(trans('admin/main.type')); ?></th>
                            <th><?php echo e(trans('admin/main.price')); ?></th>
                            <th><?php echo e(trans('admin/main.instructor')); ?></th>
                            <th class="text-center"><?php echo e(trans('panel.purchase_date')); ?></th>
                            <th><?php echo e(trans('admin/main.actions')); ?></th>
                        </tr>

                        <?php if(!empty($purchasedClasses)): ?>
                            <?php $__currentLoopData = $purchasedClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchasedClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td width="25%">
                                        <a href="<?php echo e(!empty($purchasedClass->webinar) ? $purchasedClass->webinar->getUrl() : '#1'); ?>" target="_blank" class=""><?php echo e(!empty($purchasedClass->webinar) ? $purchasedClass->webinar->title : trans('update.deleted_item')); ?></a>
                                    </td>

                                    <td>
                                        <?php if(!empty($purchasedClass->webinar)): ?>
                                            <?php echo e(trans('admin/main.'.$purchasedClass->webinar->type)); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if(!empty($purchasedClass->webinar)): ?>
                                            <?php echo e(!empty($purchasedClass->webinar->price) ? handlePrice($purchasedClass->webinar->price) : '-'); ?>

                                        <?php else: ?>
                                            <?php echo e(!empty($purchasedClass->amount) ? handlePrice($purchasedClass->amount) : '-'); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td width="25%">
                                        <?php if(!empty($purchasedClass->webinar)): ?>
                                            <p><?php echo e($purchasedClass->webinar->creator->full_name); ?></p>
                                        <?php else: ?>
                                            <p><?php echo e($purchasedClass->seller->full_name); ?></p>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($purchasedClass->created_at,'j M Y | H:i')); ?></td>

                                    <td class="text-right">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_block_access')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                    'url' => getAdminPanelUrl().'/enrollments/'. $purchasedClass->id .'/block-access',
                                                    'tooltip' => trans('update.block_access'),
                                                    'btnIcon' => 'fa-times-circle'
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </table>
                    <p class="font-12 text-gray mt-1 mb-0"><?php echo e(trans('update.purchased_hint')); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\users\editTabs\purchased_courses.blade.php ENDPATH**/ ?>