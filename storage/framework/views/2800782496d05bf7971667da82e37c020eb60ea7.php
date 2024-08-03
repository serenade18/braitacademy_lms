<div class="">
    <div data-action="<?php echo e(!empty($quiz) ? ('/panel/quizzes/'. $quiz->id .'/update') : ('/panel/quizzes/store')); ?>" class="js-content-form quiz-form webinar-form">

        <section>
            <h2 class="section-title after-line"><?php echo e(!empty($quiz) ? (trans('public.edit').' ('. $quiz->title .')') : trans('quiz.new_quiz')); ?></h2>

            <div class="row">
                <div class="col-12 col-md-4">

                    <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                        <div class="form-group mt-25">
                            <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                            <select name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][locale]"
                                    class="form-control <?php echo e(!empty($quiz) ? 'js-webinar-content-locale' : ''); ?>"
                                    data-webinar-id="<?php echo e(!empty($quiz) ? $quiz->webinar_id : ''); ?>"
                                    data-id="<?php echo e(!empty($quiz) ? $quiz->id : ''); ?>"
                                    data-relation="quizzes"
                                    data-fields="title"
                            >
                                <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang); ?>" <?php echo e((!empty($quiz) and !empty($quiz->locale)) ? (mb_strtolower($quiz->locale) == mb_strtolower($lang) ? 'selected' : '') : ($locale == $lang ? 'selected' : '')); ?>><?php echo e($language); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][locale]" value="<?php echo e($defaultLocale); ?>">
                    <?php endif; ?>

                    <?php if(empty($selectedWebinar)): ?>
                        <div class="form-group mt-25">
                            <label class="input-label"><?php echo e(trans('panel.webinar')); ?></label>
                            <select name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][webinar_id]" class="js-ajax-webinar_id custom-select">
                                <option <?php echo e(!empty($quiz) ? 'disabled' : 'selected disabled'); ?> value=""><?php echo e(trans('panel.choose_webinar')); ?></option>
                                <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($webinar->id); ?>" <?php echo e((!empty($quiz) and $quiz->webinar_id == $webinar->id) ? 'selected' : ''); ?>><?php echo e($webinar->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][webinar_id]" value="<?php echo e($selectedWebinar->id); ?>">
                    <?php endif; ?>

                    <?php if(!empty($quiz)): ?>
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.chapter')); ?></label>
                            <select name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][chapter_id]" class="js-ajax-chapter_id form-control">
                                <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ch->id); ?>" <?php echo e(($quiz->chapter_id == $ch->id) ? 'selected' : ''); ?>><?php echo e($ch->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][chapter_id]" value="" class="chapter-input">
                    <?php endif; ?>

                    <div class="form-group <?php if(!empty($selectedWebinar)): ?> mt-25 <?php endif; ?>">
                        <label class="input-label"><?php echo e(trans('quiz.quiz_title')); ?></label>
                        <input type="text" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][title]" value="<?php echo e(!empty($quiz) ? $quiz->title : old('title')); ?>"  class="js-ajax-title form-control" placeholder=""/>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('public.time')); ?> <span class="braces">(<?php echo e(trans('public.minutes')); ?>)</span></label>
                        <input type="number" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][time]" value="<?php echo e(!empty($quiz) ? $quiz->time : old('time')); ?>"  class="js-ajax-time form-control" placeholder="<?php echo e(trans('forms.empty_means_unlimited')); ?>" min="0"/>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('quiz.number_of_attemps')); ?></label>
                        <input type="number" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][attempt]" value="<?php echo e(!empty($quiz) ? $quiz->attempt : old('attempt')); ?>" class="js-ajax-attempt form-control " placeholder="<?php echo e(trans('forms.empty_means_unlimited')); ?>" min="0"/>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('quiz.pass_mark')); ?></label>
                        <input type="number" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][pass_mark]" value="<?php echo e(!empty($quiz) ? $quiz->pass_mark : old('pass_mark')); ?>" class="js-ajax-pass_mark form-control " min="0"/>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('update.expiry_days')); ?></label>
                        <input type="number" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][expiry_days]" value="<?php echo e(!empty($quiz) ? $quiz->expiry_days : old('expiry_days')); ?>" class="js-ajax-expiry_days form-control" min="0"/>
                        <div class="invalid-feedback"></div>

                        <p class="font-12 text-gray mt-5"><?php echo e(trans('update.quiz_expiry_days_hint')); ?></p>
                    </div>

                    <?php if(!empty($quiz)): ?>
                        <div class="form-group mt-20 d-flex align-items-center justify-content-between">
                            <label class="cursor-pointer input-label" for="displayLimitedQuestionsSwitch<?php echo e($quiz->id); ?>"><?php echo e(trans('update.display_limited_questions')); ?></label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][display_limited_questions]" class="js-ajax-display_limited_questions custom-control-input" id="displayLimitedQuestionsSwitch<?php echo e($quiz->id); ?>" <?php echo e(($quiz->display_limited_questions) ? 'checked' : ''); ?>>
                                <label class="custom-control-label" for="displayLimitedQuestionsSwitch<?php echo e($quiz->id); ?>"></label>
                            </div>
                        </div>

                        <div class="form-group js-display-limited-questions-count-field <?php echo e(($quiz->display_limited_questions) ? '' : 'd-none'); ?>">
                            <label class="input-label"><?php echo e(trans('update.number_of_questions')); ?> (<?php echo e(trans('update.total_questions')); ?>: <?php echo e($quiz->quizQuestions->count()); ?>)</label>
                            <input type="number" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][display_number_of_questions]" value="<?php echo e($quiz->display_number_of_questions); ?>" class="js-ajax-display_number_of_questions form-control " min="1"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    <?php endif; ?>

                    <div class="form-group mt-20 d-flex align-items-center justify-content-between">
                        <label class="cursor-pointer input-label" for="displayQuestionsRandomlySwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>"><?php echo e(trans('update.display_questions_randomly')); ?></label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][display_questions_randomly]" class="js-ajax-display_questions_randomly custom-control-input" id="displayQuestionsRandomlySwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>" <?php echo e((!empty($quiz) && $quiz->display_questions_randomly) ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="displayQuestionsRandomlySwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>"></label>
                        </div>
                    </div>

                    <div class="form-group mt-20 d-flex align-items-center justify-content-between">
                        <label class="cursor-pointer input-label" for="certificateSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>"><?php echo e(trans('quiz.certificate_included')); ?></label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][certificate]" class="js-ajax-certificate custom-control-input" id="certificateSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>" <?php echo e((!empty($quiz) && $quiz->certificate) ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="certificateSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>"></label>
                        </div>
                    </div>

                    <div class="form-group mt-20 d-flex align-items-center justify-content-between">
                        <label class="cursor-pointer input-label" for="statusSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>"><?php echo e(trans('quiz.active_quiz')); ?></label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][status]" class="js-ajax-status custom-control-input" id="statusSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>" <?php echo e((!empty($quiz) && $quiz->status == 'active') ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="statusSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>"></label>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php if(!empty($quiz)): ?>
            <section class="mt-30">
                <div class="d-block d-md-flex justify-content-between align-items-center pb-20">
                    <h2 class="section-title after-line"><?php echo e(trans('public.questions')); ?></h2>

                    <div class="d-flex align-items-center mt-20 mt-md-0">
                        <button id="add_multiple_question" data-quiz-id="<?php echo e($quiz->id); ?>" type="button" class="quiz-form-btn btn btn-primary btn-sm ml-10"><?php echo e(trans('quiz.add_multiple_choice')); ?></button>
                        <button id="add_descriptive_question" data-quiz-id="<?php echo e($quiz->id); ?>" type="button" class="quiz-form-btn btn btn-primary btn-sm ml-10"><?php echo e(trans('quiz.add_descriptive')); ?></button>
                    </div>
                </div>

                <?php if($quizQuestions): ?>
                    <ul class="draggable-questions-lists draggable-questions-lists-<?php echo e($quiz->id); ?>" data-drag-class="draggable-questions-lists-<?php echo e($quiz->id); ?>" data-order-table="quizzes_questions" data-quiz="<?php echo e($quiz->id); ?>">
                        <?php $__currentLoopData = $quizQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-id="<?php echo e($question->id); ?>" class="quiz-question-card d-flex align-items-center mt-20">
                                <div class="flex-grow-1">
                                    <h4 class="question-title"><?php echo e($question->title); ?></h4>
                                    <div class="font-12 mt-5 question-infos">
                                        <span><?php echo e($question->type === App\Models\QuizzesQuestion::$multiple ? trans('quiz.multiple_choice') : trans('quiz.descriptive')); ?> | <?php echo e(trans('quiz.grade')); ?>: <?php echo e($question->grade); ?></span>
                                    </div>
                                </div>

                                <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

                                <div class="btn-group dropdown table-actions">
                                    <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical" height="20"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" data-question-id="<?php echo e($question->id); ?>" class="edit_question btn btn-sm btn-transparent d-block"><?php echo e(trans('public.edit')); ?></button>
                                        <a href="/panel/quizzes-questions/<?php echo e($question->id); ?>/delete" class="delete-action btn btn-sm btn-transparent d-block"><?php echo e(trans('public.delete')); ?></a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <input type="hidden" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][is_webinar_page]" value="<?php if(!empty($inWebinarPage) and $inWebinarPage): ?> 1 <?php else: ?> 0 <?php endif; ?>">

        <div class="mt-20 mb-20">
            <button type="button" class="js-submit-quiz-form btn btn-sm btn-primary"><?php echo e(!empty($quiz) ? trans('public.save_change') : trans('public.create')); ?></button>

            <?php if(empty($quiz) and !empty($inWebinarPage)): ?>
                <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal -->
<?php if(!empty($quiz)): ?>
    <?php echo $__env->make(getTemplate() .'.panel.quizzes.modals.multiple_question',['quiz' => $quiz], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make(getTemplate() .'.panel.quizzes.modals.descriptive_question',['quiz' => $quiz], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/braitaca/public_html/resources/views/web/default/panel/quizzes/create_quiz_form.blade.php ENDPATH**/ ?>