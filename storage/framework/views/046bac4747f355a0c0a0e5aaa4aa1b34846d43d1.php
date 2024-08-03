<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>


<section class="mt-50">
    <div class="">
        <h2 class="section-title after-line"><?php echo e(trans('public.quiz_certificate')); ?> (<?php echo e(trans('public.optional')); ?>)</h2>
    </div>

    <button id="webinarAddQuiz" data-webinar-id="<?php echo e($webinar->id); ?>" type="button" class="btn btn-primary btn-sm mt-15"><?php echo e(trans('public.add_quiz')); ?></button>

    <div class="row mt-10">
        <div class="col-12">

            <div class="accordion-content-wrapper mt-15" id="quizzesAccordion" role="tablist" aria-multiselectable="true">
                <?php if(!empty($webinar->quizzes) and count($webinar->quizzes)): ?>
                    <?php $__currentLoopData = $webinar->quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quizInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('web.default.panel.webinar.create_includes.accordions.quiz',['webinar' => $webinar,'quizInfo' => $quizInfo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                        'file_name' => 'cert.png',
                        'title' => trans('public.quizzes_no_result'),
                        'hint' => trans('public.quizzes_no_result_hint'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div id="newQuizForm" class="d-none">
    <?php echo $__env->make('web.default.panel.webinar.create_includes.accordions.quiz',['webinar' => $webinar,'quizInfo' => null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var quizzesSectionLang = '<?php echo e(trans('quiz.quizzes_section')); ?>';
    </script>

    <script src="/assets/default/js/panel/quiz.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/braitaca/public_html/resources/views/web/default/panel/webinar/create_includes/step_7.blade.php ENDPATH**/ ?>