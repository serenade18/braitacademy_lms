<?php $__env->startSection('content'); ?>
    <div class="instructor-finder-wizard row">
        <div class="col-12 col-lg-4 wizard-left-side d-none d-md-block" style="background-image: url('<?php echo e(getPageBackgroundSettings('instructor_finder_wizard')); ?>')">
            <div class="wizard-left-side-content position-relative w-100 h-100 d-flex align-items-end justify-content-center">
                <div class="">
                    <h1 class="font-36 font-weight-bold text-white"><?php echo e(trans('update.looking_for_an_instructor')); ?></h1>
                    <p class="text-white font-16"><?php echo e(trans('update.looking_for_an_instructor_hint')); ?></p>

                    <div class="mt-30 d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column align-items-center">
                            <span class="wizard-stat-icon d-flex align-items-center justify-content-center rounded-circle text-white">
                                <i data-feather="user" width="30" height="30" class="text-white"></i>
                            </span>
                            <span class="font-30 font-weight-bold text-white mt-10"><?php echo e($instructorsCount); ?></span>
                            <span class="font-14 text-white"><?php echo e(trans('home.instructors')); ?></span>
                        </div>

                        <div class="d-flex flex-column align-items-center">
                            <span class="wizard-stat-icon d-flex align-items-center justify-content-center rounded-circle text-white">
                                <i data-feather="briefcase" width="30" height="30" class="text-white"></i>
                            </span>
                            <span class="font-30 font-weight-bold text-white mt-10"><?php echo e($organizationsCount); ?></span>
                            <span class="font-14 text-white"><?php echo e(trans('home.organizations')); ?></span>
                        </div>

                        <div class="d-flex flex-column align-items-center">
                            <span class="wizard-stat-icon d-flex align-items-center justify-content-center rounded-circle text-white">
                                <i data-feather="map-pin" width="30" height="30" class="text-white"></i>
                            </span>
                            <span class="font-30 font-weight-bold text-white mt-10"><?php echo e($citiesCount); ?></span>
                            <span class="font-14 text-white"><?php echo e(trans('update.cities')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8 bg-white">
            <div class="row wizard-content d-flex align-items-lg-center justify-content-lg-center">
                <div class="col-12 col-lg-5">

                    <form action="/instructor-finder/wizard?<?php echo e(http_build_query(request()->all())); ?>" method="get">
                        <?php if(!empty(request()->all()) and count(request()->all())): ?>
                            <?php $__currentLoopData = request()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($param !== 'step'): ?>
                                    <input type="hidden" name="<?php echo e($param); ?>" value="<?php echo e($value); ?>">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <input type="hidden" name="step" value="<?php echo e($step + 1); ?>">

                        <?php echo $__env->make('web.default.instructorFinder.wizard.step_'.$step, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="mt-50 pt-20 border-top border-gray300 d-flex align-items-center justify-content-end">
                            <a href="<?php echo e(url()->previous()); ?>" class="js-prev-btn btn btn-gray300 btn-sm text-gray <?php echo e(($step == 1) ? 'disabled' : ''); ?>" ><?php echo e(trans('update.prev')); ?></a>

                            <button type="submit" class="btn btn-primary btn-sm ml-10"><?php echo e(trans('webinars.next')); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var selectProvinceLang = '<?php echo e(trans('update.select_province')); ?>';
        var selectCityLang = '<?php echo e(trans('update.select_city')); ?>';
        var selectDistrictLang = '<?php echo e(trans('update.select_district')); ?>';
    </script>

    <script src="/assets/default/js/parts/get-regions.min.js"></script>
    <script src="/assets/default/js/parts/instructor-finder-wizard.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app',['appFooter' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\instructorFinder\wizard.blade.php ENDPATH**/ ?>