<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="section-title"><?php echo e(trans('update.course_notes')); ?></h2>
        </div>

        <?php if(!empty($personalNotes) and !$personalNotes->isEmpty()): ?>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table custom-table text-center ">
                                <thead>
                                <tr>
                                    <th class="text-left"><?php echo e(trans('product.course')); ?></th>
                                    <th class="text-left"><?php echo e(trans('public.file')); ?></th>
                                    <th class="text-center"><?php echo e(trans('update.note')); ?></th>

                                    <?php if(!empty(getFeaturesSettings('course_notes_attachment'))): ?>
                                        <th class="text-center"><?php echo e(trans('update.attachment')); ?></th>
                                    <?php endif; ?>

                                    <th class="text-center"><?php echo e(trans('public.date')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $personalNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personalNote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $item = $personalNote->getItem();
                                    ?>

                                    <tr>
                                        <th class="text-left">
                                            <span class="d-block"><?php echo e($personalNote->course->title); ?></span>
                                            <span class="d-block font-12 text-gray mt-5"><?php echo e(trans('public.by')); ?> <?php echo e($personalNote->course->teacher->full_name); ?></span>
                                        </th>

                                        <th class="text-left">
                                            <?php if(!empty($item)): ?>
                                                <span class="d-block"><?php echo e($item->title); ?></span>

                                                <?php if(!empty($item->chapter)): ?>
                                                    <span class="d-block font-12 text-gray mt-5"><?php echo e(trans('public.chapter')); ?>: <?php echo e($item->chapter->title); ?></span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </th>

                                        <td class=" text-center">
                                            <input type="hidden" value="<?php echo e($personalNote->note); ?>">
                                            <button type="button" class="js-show-note btn btn-sm btn-gray200"><?php echo e(trans('public.view')); ?></button>
                                        </td>

                                        <?php if(!empty(getFeaturesSettings('course_notes_attachment'))): ?>
                                            <td class="align-middle">
                                                <?php if(!empty($personalNote->attachment)): ?>
                                                    <a href="/course/personal-notes/<?php echo e($personalNote->id); ?>/download-attachment" class="btn btn-sm btn-gray200"><?php echo e(trans('home.download')); ?></a>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>

                                        <td class="align-middle"><?php echo e(dateTimeFormat($personalNote->created_at,'j M Y | H:i')); ?></td>

                                        <td class="align-middle text-right">

                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu">

                                                    <a href="<?php echo e("{$personalNote->course->getLearningPageUrl()}?type={$personalNote->getItemType()}&item={$personalNote->targetable_id}"); ?>" target="_blank" class="d-block text-left btn btn-sm btn-transparent"><?php echo e(trans('public.view')); ?></a>

                                                    <a href="/panel/webinars/personal-notes/<?php echo e($personalNote->id); ?>/delete" class="delete-action d-block text-left btn btn-sm btn-transparent"><?php echo e(trans('public.delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="no-result my-50 d-flex align-items-center justify-content-center flex-column">
                <div class="no-result-logo">
                    <img src="/assets/default/img/no-results/personal_note.png" alt="<?php echo e(trans('update.no_notes')); ?>">
                </div>
                <div class="d-flex align-items-center flex-column mt-0 text-center">
                    <h2><?php echo e(trans('update.no_notes')); ?></h2>
                    <p class="mt-5 text-center"><?php echo e(trans("update.you_haven't_submitted_notes_for_your_courses")); ?></p>
                </div>
            </div>
        <?php endif; ?>

    </section>

    <div class="my-30">
        <?php echo e($personalNotes->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var noteLang = '<?php echo e(trans('update.note')); ?>';
    </script>

    <script src="/assets/default/js/panel/personal_note.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\webinar\personal_notes.blade.php ENDPATH**/ ?>