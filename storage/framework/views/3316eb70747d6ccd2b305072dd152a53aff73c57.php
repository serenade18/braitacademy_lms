<?php $__env->startSection('content'); ?>
    <div class="container">
        <section class="mt-40">
            <h2 class="font-weight-bold font-16 text-dark-blue"><?php echo e($quiz->title); ?></h2>
            <p class="text-gray font-14 mt-5">
                <a href="<?php echo e($quiz->webinar->getUrl()); ?>" target="_blank" class="text-gray"><?php echo e($quiz->webinar->title); ?></a>
                | <?php echo e(trans('public.by')); ?>

                <span class="font-weight-bold">
                    <a href="<?php echo e($quiz->creator->getProfileUrl()); ?>" target="_blank" class=""> <?php echo e($quiz->creator->full_name); ?></a>
                </span>
            </p>

            <div class="activities-container shadow-sm rounded-lg mt-25 p-20 p-lg-35">
                <div class="row">
                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/58.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-secondary mt-5"><?php echo e($quiz->pass_mark); ?>/<?php echo e($questionsSumGrade); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('public.min')); ?> <?php echo e(trans('quiz.grade')); ?></span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/88.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-secondary mt-5"><?php echo e($numberOfAttempt); ?>/<?php echo e($quiz->attempt); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('quiz.attempts')); ?></span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/45.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-secondary mt-5"><?php echo e($quizResult->user_grade); ?>/<?php echo e($questionsSumGrade); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('quiz.your_grade')); ?></span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/44.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-<?php echo e(($quizResult->status == 'passed') ? 'primary' : ($quizResult->status == 'waiting' ? 'warning' : 'danger')); ?> mt-5">
                                <?php echo e(trans('quiz.'.$quizResult->status)); ?>

                            </strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('public.status')); ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="mt-30 quiz-form">
            <form action="<?php echo e(!empty($newQuizStart) ? '/panel/quizzes/'. $newQuizStart->quiz->id .'/update-result' : ''); ?> " method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="quiz_result_id" value="<?php echo e(!empty($newQuizStart) ? $newQuizStart->id : ''); ?>" class="form-control" placeholder=""/>
                <input type="hidden" name="attempt_number" value="<?php echo e($numberOfAttempt); ?>" class="form-control" placeholder=""/>
                <input type="hidden" class="js-quiz-question-count" value="<?php echo e($quizQuestions->count()); ?>"/>

                <?php $__currentLoopData = $quizQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <fieldset class="question-step question-step-<?php echo e($key + 1); ?>">
                        <div class="rounded-lg shadow-sm py-25 px-20">
                            <div class="quiz-card">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="font-weight-bold font-16 text-secondary"><?php echo e($question->title); ?>?</h3>
                                        <p class="text-gray font-14 mt-5">
                                            <span><?php echo e(trans('quiz.question_grade')); ?> : <?php echo e($question->grade); ?></span> | <span><?php echo e(trans('quiz.your_grade')); ?> : <?php echo e((!empty($userAnswers[$question->id]) and !empty($userAnswers[$question->id]["grade"])) ? $userAnswers[$question->id]["grade"] : 0); ?></span>
                                        </p>
                                    </div>

                                    <div class="rounded-sm border border-gray200 p-15 text-gray"><?php echo e($key + 1); ?>/<?php echo e($quizQuestions->count()); ?></div>
                                </div>
                                <?php if($question->type === \App\Models\QuizzesQuestion::$descriptive): ?>

                                    <div class="form-group mt-35">
                                        <label class="input-label text-secondary"><?php echo e(trans('quiz.student_answer')); ?></label>
                                        <textarea name="question[<?php echo e($question->id); ?>][answer]" rows="10" disabled class="form-control"><?php echo e((!empty($userAnswers[$question->id]) and !empty($userAnswers[$question->id]["answer"])) ? $userAnswers[$question->id]["answer"] : ''); ?></textarea>
                                    </div>

                                    <div class="form-group mt-35">
                                        <label class="input-label text-secondary"><?php echo e(trans('quiz.correct_answer')); ?></label>
                                        <textarea rows="10" name="question[<?php echo e($question->id); ?>][correct_answer]" <?php if(empty($newQuizStart) or $newQuizStart->quiz->creator_id != $authUser->id): ?> disabled <?php endif; ?> class="form-control"><?php echo e($question->correct); ?></textarea>
                                    </div>

                                    <?php if(!empty($newQuizStart) and $newQuizStart->quiz->creator_id == $authUser->id): ?>
                                        <div class="form-group mt-35">
                                            <label class="font-16 text-secondary"><?php echo e(trans('quiz.grade')); ?></label>
                                            <input type="text" name="question[<?php echo e($question->id); ?>][grade]" value="<?php echo e((!empty($userAnswers[$question->id]) and !empty($userAnswers[$question->id]["grade"])) ? $userAnswers[$question->id]["grade"] : 0); ?>" class="form-control">
                                        </div>
                                    <?php endif; ?>

                                <?php else: ?>
                                    <div class="question-multi-answers mt-35">
                                        <?php $__currentLoopData = $question->quizzesQuestionsAnswers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="answer-item">
                                                <?php if($answer->correct): ?>
                                                    <span class="badge badge-primary correct"><?php echo e(trans('quiz.correct')); ?></span>
                                                <?php endif; ?>

                                                <input id="asw-<?php echo e($answer->id); ?>" type="radio" disabled name="question[<?php echo e($question->id); ?>][answer]" value="<?php echo e($answer->id); ?>" <?php echo e((!empty($userAnswers[$question->id]) and (int)$userAnswers[$question->id]["answer"] === $answer->id) ? 'checked' : ''); ?>>

                                                <?php if(!$answer->image): ?>
                                                    <label for="asw-<?php echo e($answer->id); ?>" class="answer-label font-16 d-flex text-dark-blue align-items-center justify-content-center ">
                                                        <span class="answer-title">
                                                            <?php echo e($answer->title); ?>

                                                            <?php if(!empty($userAnswers[$question->id]) and (int)$userAnswers[$question->id]["answer"] ===  $answer->id): ?>
                                                                <span class="d-block">(<?php echo e(trans('quiz.student_answer')); ?>)</span>
                                                            <?php endif; ?>
                                                        </span>
                                                    </label>
                                                <?php else: ?>
                                                    <label for="asw-<?php echo e($answer->id); ?>" class="answer-label font-16 d-flex align-items-center text-dark-blue justify-content-center ">
                                                        <div class="image-container">
                                                            <?php if(!empty($userAnswers[$question->id]) and (int)$userAnswers[$question->id]["answer"] ===  $answer->id): ?>
                                                                <span class="selected font-14"><?php echo e(trans('quiz.student_answer')); ?></span>
                                                            <?php endif; ?>
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
                    <button type="button" disabled class="previous btn btn-sm btn-primary mr-20"><?php echo e(trans('quiz.previous_question')); ?></button>
                    <button type="button" class="next btn btn-primary btn-sm mr-auto"><?php echo e(trans('quiz.next_question')); ?></button>

                    <?php if(!empty($newQuizStart)): ?>
                        <button type="submit" class="finish btn btn-sm btn-danger"><?php echo e(trans('public.finish')); ?></button>
                    <?php endif; ?>
                </div>
            </form>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/parts/quiz-start.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\quizzes\quiz_result.blade.php ENDPATH**/ ?>