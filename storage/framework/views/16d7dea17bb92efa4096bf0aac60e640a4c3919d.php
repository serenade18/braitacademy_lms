<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <section class="mt-40">
            <h2 class="font-weight-bold font-16 text-dark-blue"><?php echo e($quiz->title); ?></h2>
            <p class="text-gray font-14 mt-5">
                <a href="<?php echo e($quiz->webinar->getUrl()); ?>" target="_blank" class="text-gray"><?php echo e($quiz->webinar->title); ?></a>
                | <?php echo e(trans('public.by')); ?>

                <span class="font-weight-bold">
                    <a href="<?php echo e($quiz->creator->getProfileUrl()); ?>" target="_blank" class="font-14"> <?php echo e($quiz->creator->full_name); ?></a>
                </span>
            </p>

            <div class="activities-container shadow-sm rounded-lg mt-25 p-20 p-lg-35">
                <div class="row">
                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/58.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-secondary mt-5"><?php echo e($quiz->pass_mark); ?>/<?php echo e($quizQuestions->sum('grade')); ?></strong>
                            <span class="font-16 text-gray"><?php echo e(trans('public.min')); ?> <?php echo e(trans('quiz.grade')); ?></span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/88.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-secondary mt-5"><?php echo e($attempt_count); ?>/<?php echo e($quiz->attempt); ?></strong>
                            <span class="font-16 text-gray"><?php echo e(trans('quiz.attempts')); ?></span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/47.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-secondary mt-5"><?php echo e($totalQuestionsCount); ?></strong>
                            <span class="font-16 text-gray"><?php echo e(trans('public.questions')); ?></span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/clock.svg" width="64" height="64" alt="">
                            <?php if(!empty($quiz->time)): ?>
                                <strong class="font-30 font-weight-bold text-secondary mt-5">
                                    <div class="d-flex align-items-center timer ltr" data-minutes-left="<?php echo e($quiz->time); ?>"></div>
                                </strong>
                            <?php else: ?>
                                <strong class="font-30 font-weight-bold text-secondary mt-5"><?php echo e(trans('quiz.unlimited')); ?></strong>
                            <?php endif; ?>
                            <span class="font-16 text-gray"><?php echo e(trans('quiz.remaining_time')); ?></span>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <section class="mt-30 quiz-form">
            <form action="/panel/quizzes/<?php echo e($quiz->id); ?>/store-result" method="post" class="">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="quiz_result_id" value="<?php echo e($newQuizStart->id); ?>" class="form-control" placeholder=""/>
                <input type="hidden" name="attempt_number" value="<?php echo e($attempt_count); ?>" class="form-control" placeholder=""/>

                <?php $__currentLoopData = $quizQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <fieldset class="question-step question-step-<?php echo e($key + 1); ?>">
                        <div class="rounded-lg shadow-sm py-25 px-20">
                            <div class="quiz-card">

                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="text-gray font-14">
                                        <span><?php echo e(trans('quiz.question_grade')); ?> : <?php echo e($question->grade); ?> </span>
                                    </p>

                                    <div class="rounded-sm border border-gray200 p-15 text-gray"><?php echo e($key + 1); ?>/<?php echo e($totalQuestionsCount); ?></div>
                                </div>

                                <?php if(!empty($question->image) or !empty($question->video)): ?>
                                    <div class="quiz-question-media-card rounded-lg mt-10 mb-15">
                                        <?php if(!empty($question->image)): ?>
                                            <img src="<?php echo e($question->image); ?>" class="img-cover rounded-lg" alt="">
                                        <?php else: ?>
                                            <video id="questionVideo<?php echo e($question->id); ?>" oncontextmenu="return false;" controlsList="nodownload" class="video-js" controls preload="auto" width="100%" data-setup='{"fluid": true}'>
                                                <source src="<?php echo e($question->video); ?>" type="video/mp4"/>
                                            </video>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="">
                                    <h3 class="font-weight-bold font-16 text-secondary"><?php echo e($question->title); ?></h3>
                                </div>

                                <?php if($question->type === \App\Models\QuizzesQuestion::$descriptive): ?>
                                    <div class="form-group mt-35">
                                        <textarea name="question[<?php echo e($question->id); ?>][answer]" rows="15" class="form-control"></textarea>
                                    </div>
                                <?php else: ?>
                                    <div class="question-multi-answers mt-35">
                                        <?php $__currentLoopData = $question->quizzesQuestionsAnswers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="answer-item">
                                                <input id="asw-<?php echo e($answer->id); ?>" type="radio" name="question[<?php echo e($question->id); ?>][answer]" value="<?php echo e($answer->id); ?>">
                                                <?php if(!$answer->image): ?>
                                                    <label for="asw-<?php echo e($answer->id); ?>" class="answer-label font-16 text-dark-blue d-flex align-items-center justify-content-center">
                                                            <span class="answer-title">
                                                                <?php echo e($answer->title); ?>

                                                            </span>
                                                    </label>
                                                <?php else: ?>
                                                    <label for="asw-<?php echo e($answer->id); ?>" class="answer-label font-16 text-dark-blue d-flex align-items-center justify-content-center">
                                                        <div class="image-container">
                                                            <img src="<?php echo e(config('app_url') . $answer->image); ?>" class="img-cover" alt="">
                                                        </div>
                                                    </label>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </fieldset>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="d-flex align-items-center mt-30">
                    <button type="button" class="previous btn btn-sm btn-primary mr-20"><?php echo e(trans('quiz.previous_question')); ?></button>
                    <button type="button" class="next btn btn-sm btn-primary mr-auto"><?php echo e(trans('quiz.next_question')); ?></button>
                    <button type="submit" class="finish btn btn-sm btn-danger"><?php echo e(trans('public.finish')); ?></button>
                </div>
            </form>
        </section>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/video/video.min.js"></script>
    <script src="/assets/default/vendors/jquery.simple.timer/jquery.simple.timer.js"></script>
    <script src="/assets/default/js/parts/quiz-start.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\quizzes\start.blade.php ENDPATH**/ ?>