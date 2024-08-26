<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section class="mt-25">
        <h2 class="section-title"><?php echo e(trans('quiz.filter_certificates')); ?></h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="" method="get" class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.from')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="from" autocomplete="off" class="form-control <?php if(!empty(request()->get('from'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>" value="<?php echo e(request()->get('from','')); ?>" aria-describedby="dateInputGroupPrepend"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.to')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="to" autocomplete="off" class="form-control <?php if(!empty(request()->get('to'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>" value="<?php echo e(request()->get('to','')); ?>" aria-describedby="dateInputGroupPrepend"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('product.course')); ?></label>
                        <select name="webinar_id" class="form-control">
                            <option value="all"><?php echo e(trans('webinars.all_courses')); ?></option>

                            <?php $__currentLoopData = $userWebinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userWebinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($userWebinar->id); ?>" <?php if(request()->get('webinar_id','') == $userWebinar->id): ?> selected <?php endif; ?>><?php echo e($userWebinar->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary w-100 mt-2"><?php echo e(trans('public.show_results')); ?></button>
                </div>
            </form>
        </div>
    </section>

    <section class="mt-35">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('quiz.my_certificates')); ?></h2>
        </div>

        <?php if(!empty($certificates) and count($certificates)): ?>
            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table text-center custom-table">
                                <thead>
                                <tr>
                                    <th><?php echo e(trans('cart.item')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.type')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.certificate_id')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.date')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left">
                                            <span class="d-block text-dark-blue font-weight-500">
                                                <?php if(!empty($certificate->webinar_id)): ?>
                                                    <?php echo e($certificate->webinar->title); ?>

                                                <?php else: ?>
                                                    <?php echo e($certificate->bundle->title); ?>

                                                <?php endif; ?>
                                            </span>
                                        </td>

                                        <td class="text-center">
                                            <?php if(!empty($certificate->webinar_id)): ?>
                                                <?php echo e(trans('product.course')); ?>

                                            <?php else: ?>
                                                <?php echo e(trans('update.bundle')); ?>

                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <?php echo e($certificate->id); ?>

                                        </td>

                                        <td class="text-center">
                                            <span class="text-dark-blue font-weight-500"><?php echo e(dateTimeFormat($certificate->created_at, 'j M Y')); ?></span>
                                        </td>
                                        <td class="text-center font-weight-normal">
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="/panel/certificates/<?php echo e(!empty($certificate->webinar_id) ? 'webinars' : 'bundles'); ?>/<?php echo e($certificate->id); ?>/show" target="_blank" class="webinar-actions d-block"><?php echo e(trans('public.open')); ?></a>
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
                'file_name' => 'cert.png',
                'title' => trans('quiz.my_certificates_no_result'),
                'hint' => nl2br(trans('quiz.my_certificates_no_result_hint')),
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </section>

    <div class="my-30">
        <?php echo e($certificates->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>

    <script src="/assets/default/js/panel/certificates.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/web/default/panel/certificates/webinar_certificates.blade.php ENDPATH**/ ?>