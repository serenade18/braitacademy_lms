<div data-action="<?php echo e(getAdminPanelUrl()); ?>/quizzes/<?php echo e(!empty($quiz) ? $quiz->id .'/update' : 'store'); ?>" class="js-content-form quiz-form webinar-form">
    <?php echo e(csrf_field()); ?>

    <section>

        <div class="row">
            <div class="col-12 col-md-4">


                <div class="d-flex align-items-center justify-content-between">
                    <div class="">
                        <h2 class="section-title"><?php echo e(!empty($quiz) ? (trans('public.edit').' ('. $quiz->title .')') : trans('quiz.new_quiz')); ?></h2>

                        <?php if(!empty($creator)): ?>
                            <p><?php echo e(trans('admin/main.instructor')); ?>: <?php echo e($creator->full_name); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                        <select name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][locale]" class="form-control <?php echo e(!empty($quiz) ? 'js-edit-content-locale' : ''); ?>">
                            <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][locale]" value="<?php echo e(getDefaultLocale()); ?>">
                <?php endif; ?>

                <?php if(empty($selectedWebinar)): ?>
                    <?php if(!empty($webinars) and count($webinars)): ?>
                        <div class="form-group mt-3">
                            <label class="input-label"><?php echo e(trans('panel.webinar')); ?></label>
                            <select name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][webinar_id]" class="js-ajax-webinar_id custom-select">
                                <option <?php echo e(!empty($quiz) ? 'disabled' : 'selected disabled'); ?> value=""><?php echo e(trans('panel.choose_webinar')); ?></option>
                                <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($webinar->id); ?>" <?php echo e((!empty($quiz) and $quiz->webinar_id == $webinar->id) ? 'selected' : ''); ?>><?php echo e($webinar->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <label class="input-label d-block"><?php echo e(trans('admin/main.webinar')); ?></label>
                            <select name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][webinar_id]" class="js-ajax-webinar_id form-control search-webinar-select2" data-placeholder="<?php echo e(trans('admin/main.search_webinar')); ?>">

                            </select>

                            <div class="invalid-feedback"></div>
                        </div>
                    <?php endif; ?>
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

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('quiz.quiz_title')); ?></label>
                    <input type="text" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][title]" value="<?php echo e(!empty($quiz) ? $quiz->title : old('title')); ?>"  class="js-ajax-title form-control " placeholder=""/>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('public.time')); ?> <span class="braces">(<?php echo e(trans('public.minutes')); ?>)</span></label>
                    <input type="text" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][time]" value="<?php echo e(!empty($quiz) ? $quiz->time : old('time')); ?>" class="js-ajax-time form-control " placeholder="<?php echo e(trans('forms.empty_means_unlimited')); ?>"/>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('quiz.number_of_attemps')); ?></label>
                    <input type="text" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][attempt]" value="<?php echo e(!empty($quiz) ? $quiz->attempt : old('attempt')); ?>" class="js-ajax-attempt form-control " placeholder="<?php echo e(trans('forms.empty_means_unlimited')); ?>"/>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('quiz.pass_mark')); ?></label>
                    <input type="text" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][pass_mark]" value="<?php echo e(!empty($quiz) ? $quiz->pass_mark : old('pass_mark')); ?>" class="js-ajax-pass_mark form-control <?php $__errorArgs = ['pass_mark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('update.expiry_days')); ?></label>
                    <input type="number" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][expiry_days]" value="<?php echo e(!empty($quiz) ? $quiz->expiry_days : old('expiry_days')); ?>" class="js-ajax-expiry_days form-control <?php $__errorArgs = ['expiry_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" min="0"/>
                    <div class="invalid-feedback"></div>

                    <p class="font-12 text-gray mt-1"><?php echo e(trans('update.quiz_expiry_days_hint')); ?></p>
                </div>

                <?php if(!empty($quiz)): ?>
                    <div class="form-group mt-4 d-flex align-items-center justify-content-between">
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
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group mt-4 d-flex align-items-center justify-content-between">
                    <label class="cursor-pointer" for="certificateSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>"><?php echo e(trans('quiz.certificate_included')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][certificate]" class="custom-control-input" id="certificateSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>" <?php echo e(!empty($quiz) && $quiz->certificate ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="certificateSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>"></label>
                    </div>
                </div>

                <div class="form-group mt-4 d-flex align-items-center justify-content-between">
                    <label class="cursor-pointer" for="statusSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>"><?php echo e(trans('quiz.active_quiz')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="ajax[<?php echo e(!empty($quiz) ? $quiz->id : 'new'); ?>][status]" class="custom-control-input" id="statusSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>" <?php echo e(!empty($quiz) && $quiz->status ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="statusSwitch<?php echo e(!empty($quiz) ? $quiz->id : 'record'); ?>"></label>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php if(!empty($quiz)): ?>
        <section class="mt-5">
            <div class="d-flex justify-content-between align-items-center pb-20">
                <h2 class="section-title after-line"><?php echo e(trans('public.questions')); ?></h2>
                <button id="add_multiple_question" data-quiz-id="<?php echo e($quiz->id); ?>" type="button" class="btn btn-primary btn-sm ml-2 mt-3"><?php echo e(trans('quiz.add_multiple_choice')); ?></button>
                <button id="add_descriptive_question" data-quiz-id="<?php echo e($quiz->id); ?>" type="button" class="btn btn-primary btn-sm ml-2 mt-3"><?php echo e(trans('quiz.add_descriptive')); ?></button>
            </div>
            <?php if($quizQuestions): ?>
                <ul class="draggable-questions-lists draggable-questions-lists-<?php echo e($quiz->id); ?>" data-drag-class="draggable-questions-lists-<?php echo e($quiz->id); ?>" data-order-table="quizzes_questions" data-quiz="<?php echo e($quiz->id); ?>">
                    <?php $__currentLoopData = $quizQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-id="<?php echo e($question->id); ?>" class="quiz-question-card d-flex align-items-center mt-4">
                            <div class="flex-grow-1">
                                <h4 class="question-title"><?php echo e($question->title); ?></h4>
                                <div class="font-12 mt-3 question-infos">
                                    <span><?php echo e($question->type === App\Models\QuizzesQuestion::$multiple ? trans('quiz.multiple_choice') : trans('quiz.descriptive')); ?> | <?php echo e(trans('quiz.grade')); ?>: <?php echo e($question->grade); ?></span>
                                </div>
                            </div>

                            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

                            <div class="btn-group dropdown table-actions">
                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu text-left">
                                    <button type="button" data-question-id="<?php echo e($question->id); ?>" class="edit_question btn btn-sm btn-transparent"><?php echo e(trans('public.edit')); ?></button>
                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl('/quizzes-questions/'. $question->id .'/delete'), 'btnClass' => 'btn-sm btn-transparent' , 'btnText' => trans('public.delete')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php if(!empty($quiz)): ?>
    <?php echo $__env->make('admin.quizzes.modals.multiple_question', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.quizzes.modals.descriptive_question', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/quizzes/create_quiz_form.blade.php ENDPATH**/ ?>