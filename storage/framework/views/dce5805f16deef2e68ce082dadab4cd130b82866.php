<section class="mt-30">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="section-title after-line"><?php echo e(trans('update.related_courses')); ?></h2>
        <button id="addRelatedCourse" type="button" class="btn btn-primary btn-sm mt-3" data-path="<?php echo e(getAdminPanelUrl("/relatedCourses/get-form")); ?>?item=<?php echo e($relatedCourseItemId); ?>&item_type=<?php echo e($relatedCourseItemType); ?>"><?php echo e(trans('update.add_related_courses')); ?></button>
    </div>

    <div class="row mt-10">
        <div class="col-12">
            <?php if(!empty($relatedCourses) and !$relatedCourses->isEmpty()): ?>
                <div class="table-responsive">
                    <table class="table table-striped text-center font-14">

                        <tr>
                            <th><?php echo e(trans('public.title')); ?></th>
                            <th class="text-left"><?php echo e(trans('public.instructor')); ?></th>
                            <th><?php echo e(trans('public.price')); ?></th>
                            <th><?php echo e(trans('public.publish_date')); ?></th>
                            <th></th>
                        </tr>

                        <?php $__currentLoopData = $relatedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($relatedCourse->course->title)): ?>
                                <tr>
                                    <th><?php echo e($relatedCourse->course->title); ?></th>
                                    <td class="text-left"><?php echo e($relatedCourse->course->teacher->full_name); ?></td>
                                    <td><?php echo e(handlePrice($relatedCourse->course->price)); ?></td>
                                    <td><?php echo e(dateTimeFormat($relatedCourse->course->created_at,'j F Y | H:i')); ?></td>

                                    <td>
                                        <button type="button" class="js-edit-related-course btn-transparent text-primary mt-1" data-path="<?php echo e(getAdminPanelUrl("/relatedCourses/{$relatedCourse->id}/edit")); ?>?item=<?php echo e($relatedCourseItemId); ?>&item_type=<?php echo e($relatedCourseItemType); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/relatedCourses/'. $relatedCourse->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </table>
                </div>
            <?php else: ?>
                <?php echo $__env->make('admin.includes.no-result',[
                    'file_name' => 'comment.png',
                    'title' => trans('update.related_courses_no_result'),
                    'hint' => trans('update.related_courses_no_result_hint'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php $__env->startPush('scripts_bottom'); ?>
    <!-- Modal -->
    <script src="/assets/default/js/admin/related_courses.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/admin/webinars/relatedCourse/add_related_course.blade.php ENDPATH**/ ?>