<?php if($user->offline): ?>
    <div class="user-offline-alert d-flex mt-40">
        <div class="p-15">
            <h3 class="font-16 text-dark-blue"><?php echo e(trans('public.instructor_is_not_available')); ?></h3>
            <p class="font-14 font-weight-500 text-gray mt-15"><?php echo e($user->offline_message); ?></p>
        </div>

        <div class="offline-icon offline-icon-right ml-auto d-flex align-items-stretch">
            <div class="d-flex align-items-center">
                <img src="/assets/default/img/profile/time-icon.png" alt="offline">
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if((!empty($educations) and !$educations->isEmpty()) or (!empty($experiences) and !$experiences->isEmpty()) or (!empty($occupations) and !$occupations->isEmpty()) or !empty($user->about)): ?>
    <?php if(!empty($educations) and !$educations->isEmpty()): ?>
        <div class="mt-40">
            <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e(trans('site.education')); ?></h3>

            <ul class="list-group-custom">
                <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="mt-15 text-gray"><?php echo e($education->value); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if(!empty($experiences) and !$experiences->isEmpty()): ?>
        <div class="mt-40">
            <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e(trans('site.experiences')); ?></h3>

            <ul class="list-group-custom">
                <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="mt-15 text-gray"><?php echo e($experience->value); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if(!empty($user->about)): ?>
        <div class="mt-40">
            <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e(trans('site.about')); ?></h3>

            <div class="mt-30">
                <?php echo nl2br($user->about); ?>

            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($occupations) and !$occupations->isEmpty()): ?>
        <div class="mt-40">
            <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e(trans('site.occupations')); ?></h3>

            <div class="d-flex flex-wrap align-items-center pt-10">
                <?php $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-gray200 font-14 rounded mt-10 px-10 py-5 text-gray mr-15"><?php echo e($occupation->category->title); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

<?php else: ?>

    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
        'file_name' => 'bio.png',
        'title' => trans('site.not_create_bio'),
        'hint' => '',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>

<?php /**PATH /home/braitaca/public_html/resources/views/web/default/user/profile_tabs/about.blade.php ENDPATH**/ ?>