<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <h2 class="section-title"><?php echo e(trans('quiz.students')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/48.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($users->count()); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('quiz.students')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/49.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($activeCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('public.active')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/60.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($inActiveCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('public.inactive')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-35">
        <h2 class="section-title"><?php echo e(trans('panel.filter_students')); ?></h2>

        <?php echo $__env->make('web.default.panel.manage.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="mt-35">
        <h2 class="section-title"><?php echo e(trans('panel.students_list')); ?></h2>

        <?php if(!empty($users) and !$users->isEmpty()): ?>
            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table custom-table text-center ">
                                <thead>
                                <tr>
                                    <th class="text-left text-gray"><?php echo e(trans('auth.name')); ?></th>
                                    <th class="text-left text-gray"><?php echo e(trans('auth.email')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('public.phone')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('webinars.webinars')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('quiz.quizzes')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('panel.certificates')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('public.date')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td class="text-left">
                                            <div class="user-inline-avatar d-flex align-items-center">
                                                <div class="avatar bg-gray200">
                                                    <img src="<?php echo e($user->getAvatar()); ?>" class="img-cover" alt="">
                                                </div>
                                                <div class=" ml-5">
                                                    <span class="d-block text-dark-blue font-weight-500"><?php echo e($user->full_name); ?></span>
                                                    <span class="mt-5 d-block font-12 text-<?php echo e(($user->status == 'active') ? 'gray' : 'danger'); ?>"><?php echo e(($user->status == 'active') ? trans('public.active') : trans('public.inactive')); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="">
                                                <span class="d-block text-dark-blue font-weight-500"><?php echo e($user->email); ?></span>
                                                <span class="mt-5 d-block font-12 text-gray">id : <?php echo e($user->id); ?></span>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-dark-blue font-weight-500"><?php echo e($user->mobile); ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-dark-blue font-weight-500"><?php echo e(count($user->getPurchasedCoursesIds())); ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-dark-blue font-weight-500"><?php echo e(count($user->getActiveQuizzesResults())); ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-dark-blue font-weight-500"><?php echo e(count($user->certificates)); ?></span>
                                        </td>
                                        <td class="text-dark-blue font-weight-500 align-middle"><?php echo e(dateTimeFormat($user->created_at,'j M Y | H:i')); ?></td>

                                        <td class="text-right align-middle">
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="<?php echo e($user->getProfileUrl()); ?>" class="btn-transparent webinar-actions d-block mt-10"><?php echo e(trans('public.profile')); ?></a>
                                                    <a href="/panel/manage/students/<?php echo e($user->id); ?>/edit" class="btn-transparent webinar-actions d-block mt-10"><?php echo e(trans('public.edit')); ?></a>
                                                    <a href="/panel/manage/students/<?php echo e($user->id); ?>/delete" class="webinar-actions d-block mt-10 delete-action"><?php echo e(trans('public.delete')); ?></a>
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

            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                'file_name' => 'studentt.png',
                'title' => trans('panel.students_no_result'),
                'hint' =>  nl2br(trans('panel.students_no_result_hint')),
                'btn' => ['url' => '/panel/manage/students/new','text' => trans('panel.add_an_student')]
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </section>

    <div class="my-30">
        <?php echo e($users->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\manage\students.blade.php ENDPATH**/ ?>