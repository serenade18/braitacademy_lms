<?php $__currentLoopData = \App\Models\WebinarExtraDescription::$types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraDescriptionType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section class="mt-30">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="section-title after-line"><?php echo e(trans('update.'.$extraDescriptionType)); ?></h2>
            <button id="add_new_<?php echo e($extraDescriptionType); ?>" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('update.add_'.$extraDescriptionType)); ?></button>
        </div>

        <?php
            $webinarExtraDescriptionValues = $upcomingCourse->extraDescriptions->where('type',$extraDescriptionType);
        ?>

        <div class="row mt-10">
            <div class="col-12">
                <?php if(!empty($webinarExtraDescriptionValues) and count($webinarExtraDescriptionValues)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped text-center font-14">

                            <tr>
                                <?php if($extraDescriptionType == \App\Models\WebinarExtraDescription::$COMPANY_LOGOS): ?>
                                    <th><?php echo e(trans('admin/main.icon')); ?></th>
                                <?php else: ?>
                                    <th><?php echo e(trans('public.title')); ?></th>
                                <?php endif; ?>
                                <th></th>
                            </tr>

                            <?php $__currentLoopData = $webinarExtraDescriptionValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraDescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php if($extraDescriptionType == \App\Models\WebinarExtraDescription::$COMPANY_LOGOS): ?>
                                        <td>
                                            <img src="<?php echo e($extraDescription->value); ?>" class="webinar-extra-description-company-logos" alt="">
                                        </td>
                                    <?php else: ?>
                                        <td><?php echo e($extraDescription->value); ?></td>
                                    <?php endif; ?>

                                    <td class="text-right">
                                        <button type="button" data-item-id="<?php echo e($extraDescription->id); ?>" data-webinar-id="<?php echo e(!empty($upcomingCourse) ? $upcomingCourse->id : ''); ?>" class="edit-extraDescription btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/webinar-extra-description/'. $extraDescription->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                <?php else: ?>
                    <?php echo $__env->make('admin.includes.no-result',[
                         'file_name' => 'faq.png',
                         'title' => trans("update.{$extraDescriptionType}_no_result"),
                         'hint' => trans("update.{$extraDescriptionType}_no_result_hint"),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\upcoming_courses\create\includes\extraDescription.blade.php ENDPATH**/ ?>