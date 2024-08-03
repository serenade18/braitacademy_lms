<div class="tab-pane mt-3 fade" id="purchased_bundles" role="tabpanel" aria-labelledby="purchased_bundles-tab">
    <div class="row">

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_add_student_to_items')): ?>
            <div class="col-12 col-md-6">
                <h5 class="section-title after-line"><?php echo e(trans('update.add_student_to_bundle')); ?></h5>

                <form action="<?php echo e(getAdminPanelUrl()); ?>/enrollments/store" method="Post">

                    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('update.bundle')); ?></label>
                        <select name="bundle_id" class="form-control search-bundle-select2"
                                data-placeholder="<?php echo e(trans('update.search_bundle')); ?>">

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
                <h5 class="section-title after-line"><?php echo e(trans('update.manual_added_bundles')); ?></h5>

                <div class="table-responsive mt-3">
                    <table class="table table-striped table-md">
                        <tr>
                            <th><?php echo e(trans('update.bundle')); ?></th>
                            <th><?php echo e(trans('admin/main.type')); ?></th>
                            <th><?php echo e(trans('admin/main.price')); ?></th>
                            <th><?php echo e(trans('admin/main.instructor')); ?></th>
                            <th class="text-center"><?php echo e(trans('update.added_date')); ?></th>
                            <th class="text-right"><?php echo e(trans('admin/main.actions')); ?></th>
                        </tr>

                        <?php if(!empty($manualAddedBundles)): ?>
                            <?php $__currentLoopData = $manualAddedBundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manualAddedBundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td width="25%">
                                        <a href="<?php echo e(!empty($manualAddedBundle->bundle) ? $manualAddedBundle->bundle->getUrl() : '#1'); ?>" target="_blank" class=""><?php echo e(!empty($manualAddedBundle->bundle) ? $manualAddedBundle->bundle->title : trans('update.deleted_item')); ?></a>
                                    </td>

                                    <td>
                                        <?php if(!empty($manualAddedBundle->bundle)): ?>
                                            <?php echo e(trans('admin/main.'.$manualAddedBundle->bundle->type)); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if(!empty($manualAddedBundle->bundle)): ?>
                                            <?php echo e(!empty($manualAddedBundle->bundle->price) ? handlePrice($manualAddedBundle->bundle->price) : '-'); ?>

                                        <?php else: ?>
                                            <?php echo e(!empty($manualAddedBundle->amount) ? handlePrice($manualAddedBundle->amount) : '-'); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td width="25%">
                                        <?php if(!empty($manualAddedBundle->bundle)): ?>
                                            <p><?php echo e($manualAddedBundle->bundle->creator->full_name); ?></p>
                                        <?php else: ?>
                                            <p><?php echo e($manualAddedBundle->seller->full_name); ?></p>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($manualAddedBundle->created_at,'j M Y | H:i')); ?></td>
                                    <td class="text-right">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_block_access')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                    'url' => getAdminPanelUrl().'/enrollments/'. $manualAddedBundle->id .'/block-access',
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
                <h5 class="section-title after-line"><?php echo e(trans('update.manual_disabled_bundles')); ?></h5>

                <div class="table-responsive mt-3">
                    <table class="table table-striped table-md">
                        <tr>
                            <th><?php echo e(trans('update.bundle')); ?></th>
                            <th><?php echo e(trans('admin/main.type')); ?></th>
                            <th><?php echo e(trans('admin/main.price')); ?></th>
                            <th><?php echo e(trans('admin/main.instructor')); ?></th>
                            <th class="text-right"><?php echo e(trans('admin/main.actions')); ?></th>
                        </tr>

                        <?php if(!empty($manualDisabledBundles)): ?>
                            <?php $__currentLoopData = $manualDisabledBundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manualDisabledBundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td width="25%">
                                        <a href="<?php echo e(!empty($manualDisabledBundle->bundle) ? $manualDisabledBundle->bundle->getUrl() : '#1'); ?>" target="_blank" class=""><?php echo e(!empty($manualDisabledBundle->bundle) ? $manualDisabledBundle->bundle->title : trans('update.deleted_item')); ?></a>
                                    </td>

                                    <td>
                                        <?php if(!empty($manualDisabledBundle->bundle)): ?>
                                            <?php echo e(trans('admin/main.'.$manualDisabledBundle->bundle->type)); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if(!empty($manualDisabledBundle->bundle)): ?>
                                            <?php echo e(!empty($manualDisabledBundle->bundle->price) ? handlePrice($manualDisabledBundle->bundle->price) : '-'); ?>

                                        <?php else: ?>
                                            <?php echo e(!empty($manualDisabledBundle->amount) ? handlePrice($manualDisabledBundle->amount) : '-'); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td width="25%">
                                        <?php if(!empty($manualDisabledBundle->bundle)): ?>
                                            <p><?php echo e($manualDisabledBundle->bundle->creator->full_name); ?></p>
                                        <?php else: ?>
                                            <p><?php echo e($manualDisabledBundle->seller->full_name); ?></p>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-right">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_block_access')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                    'url' => getAdminPanelUrl().'/enrollments/'. $manualDisabledBundle->id .'/enable-access',
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
                            <th><?php echo e(trans('update.bundle')); ?></th>
                            <th><?php echo e(trans('admin/main.type')); ?></th>
                            <th><?php echo e(trans('admin/main.price')); ?></th>
                            <th><?php echo e(trans('admin/main.instructor')); ?></th>
                            <th class="text-center"><?php echo e(trans('panel.purchase_date')); ?></th>
                            <th><?php echo e(trans('admin/main.actions')); ?></th>
                        </tr>

                        <?php if(!empty($purchasedBundles)): ?>
                            <?php $__currentLoopData = $purchasedBundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchasedBundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td width="25%">
                                        <a href="<?php echo e(!empty($purchasedBundle->bundle) ? $purchasedBundle->bundle->getUrl() : '#1'); ?>" target="_blank" class=""><?php echo e(!empty($purchasedBundle->bundle) ? $purchasedBundle->bundle->title : trans('update.deleted_item')); ?></a>
                                    </td>

                                    <td>
                                        <?php if(!empty($purchasedBundle->bundle)): ?>
                                            <?php echo e(trans('admin/main.'.$purchasedBundle->bundle->type)); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if(!empty($purchasedBundle->bundle)): ?>
                                            <?php echo e(!empty($purchasedBundle->bundle->price) ? handlePrice($purchasedBundle->bundle->price) : '-'); ?>

                                        <?php else: ?>
                                            <?php echo e(!empty($purchasedBundle->amount) ? handlePrice($purchasedBundle->amount) : '-'); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td width="25%">
                                        <?php if(!empty($purchasedBundle->bundle)): ?>
                                            <p><?php echo e($purchasedBundle->bundle->creator->full_name); ?></p>
                                        <?php else: ?>
                                            <p><?php echo e($purchasedBundle->seller->full_name); ?></p>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($purchasedBundle->created_at,'j M Y | H:i')); ?></td>
                                    <td class="text-right">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_block_access')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                    'url' => getAdminPanelUrl().'/enrollments/'. $purchasedBundle->id .'/block-access',
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
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/users/editTabs/purchased_bundles.blade.php ENDPATH**/ ?>