<?php
    $progressSteps = [
        1 => [
            'lang' => 'public.basic_information',
            'icon' => 'basic-info'
        ],

        2 => [
            'lang' => 'public.images',
            'icon' => 'images'
        ],

        3 => [
            'lang' => 'public.about',
            'icon' => 'about'
        ],

        4 => [
            'lang' => 'public.educations',
            'icon' => 'graduate'
        ],

        5 => [
            'lang' => 'public.experiences',
            'icon' => 'experiences'
        ],

        6 => [
            'lang' => 'public.identity_and_financial',
            'icon' => 'financial'
        ]
    ];

    if(!$user->isUser()) {
        $progressSteps[6] =[
            'lang' => 'public.occupations',
            'icon' => 'skills'
        ];

        $progressSteps[7] =[
            'lang' => 'public.identity_and_financial',
            'icon' => 'financial'
        ];
    }


    $progressSteps[8] =[
            'lang' => 'public.extra_information',
            'icon' => 'extra_info'
        ];

    $currentStep = empty($currentStep) ? 1 : $currentStep;
?>


<div class="webinar-progress d-block d-lg-flex align-items-center p-15 panel-shadow bg-white rounded-sm">

    <?php $__currentLoopData = $progressSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="progress-item d-flex align-items-center">
            <a href="<?php if(!empty($organization_id)): ?> /panel/manage/<?php echo e($user_type ?? 'instructors'); ?>/<?php echo e($user->id); ?>/edit/step/<?php echo e($key); ?> <?php else: ?> /panel/setting/step/<?php echo e($key); ?> <?php endif; ?>" class="progress-icon p-10 d-flex align-items-center justify-content-center rounded-circle <?php echo e($key == $currentStep ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans($step['lang'])); ?>">
                <img src="/assets/default/img/icons/<?php echo e($step['icon']); ?>.svg" class="img-cover" alt="">
            </a>

            <div class="ml-10 <?php echo e($key == $currentStep ? '' : 'd-lg-none'); ?>">
                <h4 class="font-16 text-secondary font-weight-bold"><?php echo e(trans($step['lang'])); ?></h4>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\setting\setting_includes\progress.blade.php ENDPATH**/ ?>