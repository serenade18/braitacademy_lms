<?php
    $progressSteps = [
        1 => [
            'name' => 'basic_information',
            'icon' => 'paper'
        ],

        2 => [
            'name' => 'extra_information',
            'icon' => 'paper_plus'
        ],

        3 => [
            'name' => 'pricing',
            'icon' => 'wallet'
        ],

        4 => [
            'name' => 'content',
            'icon' => 'folder'
        ],

        5 => [
            'name' => 'faq',
            'icon' => 'tick_square'
        ],
    ];

    if (empty(getGeneralOptionsSettings('direct_publication_of_bundles'))) {
        $progressSteps[6] = [
            'name' => 'message_to_reviewer',
            'icon' => 'shield_done'
        ];
    }

    $currentStep = empty($currentStep) ? 1 : $currentStep;
?>


<div class="webinar-progress d-block d-lg-flex align-items-center p-15 panel-shadow bg-white rounded-sm">

    <?php $__currentLoopData = $progressSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="progress-item d-flex align-items-center">
            <button type="button" data-step="<?php echo e($key); ?>" class="js-get-next-step p-0 border-0 progress-icon p-10 d-flex align-items-center justify-content-center rounded-circle <?php echo e($key == $currentStep ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.' . $step['name'])); ?>">
                <img src="/assets/default/img/icons/<?php echo e($step['icon']); ?>.svg" class="img-cover" alt="">
            </button>

            <div class="ml-10 <?php echo e($key == $currentStep ? '' : 'd-lg-none'); ?>">
                <span class="font-14 text-gray"><?php echo e(trans('webinars.progress_step', ['step' => $key,'count' => $stepCount])); ?></span>
                <h4 class="font-16 text-secondary font-weight-bold"><?php echo e(trans('public.' . $step['name'])); ?></h4>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\bundle\create_includes\progress.blade.php ENDPATH**/ ?>