<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.classes')); ?></div>

                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">

                        <div class="card-body ">

                            
                            <div class="d-flex align-items-start mb-3 border rounded-lg p-2">
                                <img class="avatar mr-2" src="<?php echo e($question->user->getAvatar()); ?>">

                                <div class="ml-2">
                                    <div class="font-weight-bold"><?php echo e($question->user->full_name); ?></div>

                                    <h3 class="mt-2 font-16 font-weight-bold"><?php echo e($question->title); ?></h3>
                                    <div class="mt-1"><?php echo $question->description; ?></div>

                                    <div class="mt-2">
                                        <span class="mr-2"><?php echo e(dateTimeFormat($question->created_at,'Y M j | H:i')); ?></span>

                                        <?php if(!empty($question->attach)): ?>
                                            <a href="<?php echo e($course->getForumPageUrl()); ?>/<?php echo e($question->id); ?>/downloadAttach" target="_blank" class="text-success"><i class="fa fa-paperclip"></i> <?php echo e(trans('admin/main.open_attach')); ?></a>
                                        <?php endif; ?>

                                        <button type="button" data-action="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e($course->id); ?>/forums/<?php echo e($question->id); ?>/edit" class="js-answer-edit btn-transparent ml-2 font-14 font-weight-500 text-gray"><?php echo e(trans('public.edit')); ?></button>

                                        <?php echo $__env->make('admin.includes.delete_button', [
                                            'url' => "/admin/webinars/$course->id/forums/$question->id/delete",
                                            'btnText' => trans('admin/main.delete'),
                                            'btnClass' => 'ml-2 font-14 font-weight-500 text-danger'
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>

                            

                            <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex align-items-start mb-3 border rounded-lg p-2 <?php echo e($answer->resolved ? 'border-danger' : ''); ?>">
                                    <img src="<?php echo e($answer->user->getAvatar()); ?>">

                                    <div class="ml-2">

                                        <div class="font-weight-bold"><?php echo e($answer->user->full_name); ?></div>

                                        <div class="mt-1"><?php echo $answer->description; ?></div>

                                        <div class="d-flex align-items-center mt-2">
                                            <span class=""><?php echo e(dateTimeFormat($answer->created_at,'Y M j | H:i')); ?></span>

                                            <?php if($answer->resolved): ?>
                                                <span class="text-danger ml-2"><?php echo e(trans('update.resolved')); ?></span>
                                            <?php endif; ?>

                                            <?php if($answer->pin): ?>
                                                <span class="text-success ml-2"><?php echo e(trans('update.pin')); ?></span>
                                            <?php endif; ?>

                                            <button type="button" data-action="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e($course->id); ?>/forums/<?php echo e($question->id); ?>/answers/<?php echo e($answer->id); ?>/edit" class="js-answer-edit btn-transparent ml-2 font-14 font-weight-500 text-gray"><?php echo e(trans('public.edit')); ?></button>

                                            <?php echo $__env->make('admin.includes.delete_button', [
                                                'url' => "/admin/webinars/$course->id/forums/$question->id/answers/$answer->id/delete",
                                                'btnText' => trans('admin/main.delete'),
                                                'btnClass' => 'ml-2 font-14 font-weight-500 text-danger'
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var editPostLang = '<?php echo e(trans('update.edit_post')); ?>';
        var titleLang = '<?php echo e(trans('public.title')); ?>';
        var descriptionLang = '<?php echo e(trans('public.description')); ?>';
        var sendLang = '<?php echo e(trans('update.send')); ?>';
        var oopsLang = '<?php echo e(trans('update.oops')); ?>';
        var somethingWentWrongLang = '<?php echo e(trans('update.something_went_wrong')); ?>';
        var editAttachmentLabelLang = '<?php echo e(trans('update.attach_a_file')); ?> (<?php echo e(trans('public.optional')); ?>)';
        var savedSuccessfullyLang = '<?php echo e(trans('update.saved_successfully')); ?>'
    </script>
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/default/js/admin/course-forum-answers.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\webinars\forum\answers_lists.blade.php ENDPATH**/ ?>