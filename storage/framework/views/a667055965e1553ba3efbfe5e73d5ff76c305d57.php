<section class="mt-30">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="section-title after-line"><?php echo e(trans('public.faq')); ?></h2>
        <button id="upcomingCourseAddFAQ" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('public.add_faq')); ?></button>
    </div>

    <div class="row mt-10">
        <div class="col-12">
            <?php if(!empty($upcomingCourse->faqs) and !$upcomingCourse->faqs->isEmpty()): ?>
                <div class="table-responsive">
                    <table class="table table-striped text-center font-14">

                        <tr>
                            <th><?php echo e(trans('public.title')); ?></th>
                            <th><?php echo e(trans('public.answer')); ?></th>
                            <th></th>
                        </tr>

                        <?php $__currentLoopData = $upcomingCourse->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($faq->title); ?></th>
                                <td>
                                    <button type="button" class="js-get-faq-description btn btn-sm btn-gray200"><?php echo e(trans('public.view')); ?></button>
                                    <input type="hidden" value="<?php echo e($faq->answer); ?>"/>
                                </td>

                                <td class="text-right">
                                    <button type="button" data-faq-id="<?php echo e($faq->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-faq btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl('/faqs/'. $faq->id .'/delete'), 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </table>
                </div>
            <?php else: ?>
                <?php echo $__env->make('admin.includes.no-result',[
                    'file_name' => 'faq.png',
                    'title' => trans('public.faq_no_result'),
                    'hint' => trans('public.faq_no_result_hint'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\upcoming_courses\create\includes\faq.blade.php ENDPATH**/ ?>