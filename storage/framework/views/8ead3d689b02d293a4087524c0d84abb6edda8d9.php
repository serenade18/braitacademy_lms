<div class="<?php if(!empty($quiz)): ?> multipleQuestionModal<?php echo e($quiz->id); ?> <?php endif; ?> <?php echo e(empty($question_edit) ? 'd-none' : ''); ?>">
    <div class="custom-modal-body">
        <h2 class="section-title after-line"><?php echo e(trans('quiz.multiple_choice_question')); ?></h2>

        <div class="quiz-questions-form" data-action="<?php echo e(getAdminPanelUrl()); ?>/quizzes-questions/<?php echo e(empty($question_edit) ? 'store' : $question_edit->id.'/update'); ?>" method="post">

            <input type="hidden" name="ajax[quiz_id]" value="<?php echo e(!empty($quiz) ? $quiz->id :''); ?>">
            <input type="hidden" name="ajax[type]" value="<?php echo e(\App\Models\QuizzesQuestion::$multiple); ?>">

            <div class="row mt-3">

                <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                            <select name="ajax[locale]"
                                    class="form-control <?php echo e(!empty($question_edit) ? 'js-quiz-question-locale' : ''); ?>"
                                    data-id="<?php echo e(!empty($question_edit) ? $question_edit->id : ''); ?>"
                            >
                                <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang); ?>" <?php echo e((!empty($question_edit) and !empty($question_edit->locale)) ? (mb_strtolower($question_edit->locale) == mb_strtolower($lang) ? 'selected' : '') : (app()->getLocale() == $lang ? 'selected' : '')); ?>><?php echo e($language); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="ajax[locale]" value="<?php echo e($defaultLocale); ?>">
                <?php endif; ?>

                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('quiz.question_title')); ?></label>
                        <textarea type="text" name="ajax[title]" class="js-ajax-title form-control" rows="1"><?php echo e(!empty($question_edit) ? $question_edit->title : ''); ?></textarea>
                        <span class="invalid-feedback"></span>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('quiz.grade')); ?></label>
                        <input type="text" name="ajax[grade]" class="js-ajax-grade form-control" value="<?php echo e(!empty($question_edit) ? $question_edit->grade : ''); ?>"/>
                        <span class="invalid-feedback"></span>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('public.image')); ?> (<?php echo e(trans('public.optional')); ?>)</label>

                        <div class="input-group mr-10">
                            <div class="input-group-prepend">
                                <button type="button" class="input-group-text admin-file-manager" data-input="questionImageInput_<?php echo e(!empty($question_edit) ? $question_edit->id : 'record'); ?>" data-preview="holder">
                                    <i class="fa fa-upload"></i>
                                </button>
                            </div>
                            <input type="text" name="ajax[image]" id="questionImageInput_<?php echo e(!empty($question_edit) ? $question_edit->id : 'record'); ?>" value="<?php echo e(!empty($question_edit) ? $question_edit->image : ''); ?>" class="js-ajax-image form-control" placeholder=""/>
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('update.video')); ?> (<?php echo e(trans('public.optional')); ?>)</label>

                        <div class="input-group mr-10">
                            <div class="input-group-prepend">
                                <button type="button" class="input-group-text admin-file-manager" data-input="questionVideoInput_<?php echo e(!empty($question_edit) ? $question_edit->id : 'record'); ?>" data-preview="holder">
                                    <i class="fa fa-upload"></i>
                                </button>
                            </div>
                            <input type="text" name="ajax[video]" id="questionVideoInput_<?php echo e(!empty($question_edit) ? $question_edit->id : 'record'); ?>" value="<?php echo e(!empty($question_edit) ? $question_edit->video : ''); ?>" class="js-ajax-video form-control" placeholder=""/>
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <h2 class="section-title after-line"><?php echo e(trans('public.answers')); ?></h2>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-sm btn-primary mt-2 add-answer-btn"><?php echo e(trans('quiz.add_an_answer')); ?></button>

                    <div class="form-group">
                        <input type="hidden" name="ajax[current_answer]" class="form-control"/>
                        <span class="invalid-feedback"></span>
                    </div>
                </div>
            </div>

            <div class="add-answer-container">

                <?php if(!empty($question_edit->quizzesQuestionsAnswers) and !$question_edit->quizzesQuestionsAnswers->isEmpty()): ?>
                    <?php $__currentLoopData = $question_edit->quizzesQuestionsAnswers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('admin.quizzes.modals.multiple_answer_form',['answer' => $answer], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php echo $__env->make('admin.quizzes.modals.multiple_answer_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>

            <div class="d-flex align-items-center justify-content-end mt-3">
                <button type="button" class="save-question btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>
                <button type="button" class="close-swl btn btn-sm btn-danger ml-2"><?php echo e(trans('public.close')); ?></button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\quizzes\modals\multiple_question.blade.php ENDPATH**/ ?>