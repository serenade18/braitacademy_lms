<li data-id="<?php echo e(!empty($chapterItem) ? $chapterItem->id :''); ?>" class="accordion-row bg-white rounded-sm border border-gray300 mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="text_lesson_<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>">
        <div class="d-flex align-items-center" href="#collapseTextLesson<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>" aria-controls="collapseTextLesson<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>" data-parent="#chapterContentAccordion<?php echo e(!empty($chapter) ? $chapter->id :''); ?>" role="button" data-toggle="collapse" aria-expanded="true">
            <span class="chapter-icon chapter-content-icon mr-10">
                <i data-feather="file-text" class=""></i>
            </span>

            <div class="font-weight-bold text-dark-blue d-block cursor-pointer"><?php echo e(!empty($textLesson) ? $textLesson->title . ($textLesson->accessibility == 'free' ? " (". trans('public.free') .")" : '') : trans('public.add_new_test_lesson')); ?></div>
        </div>

        <div class="d-flex align-items-center">

            <?php if(!empty($textLesson) and $textLesson->status != \App\Models\WebinarChapter::$chapterActive): ?>
                <span class="disabled-content-badge mr-10"><?php echo e(trans('public.disabled')); ?></span>
            <?php endif; ?>

            <?php if(!empty($textLesson)): ?>
                <button type="button" data-item-id="<?php echo e($textLesson->id); ?>" data-item-type="<?php echo e(\App\Models\WebinarChapterItem::$chapterTextLesson); ?>" data-chapter-id="<?php echo e(!empty($chapter) ? $chapter->id : ''); ?>" class="js-change-content-chapter btn btn-sm btn-transparent text-gray mr-10">
                    <i data-feather="grid" class="" height="20"></i>
                </button>
            <?php endif; ?>

            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

            <?php if(!empty($textLesson)): ?>
                <a href="<?php echo e(getAdminPanelUrl()); ?>/text-lesson/<?php echo e($textLesson->id); ?>/delete" class="delete-action btn btn-sm btn-transparent text-gray">
                    <i data-feather="trash-2" class="mr-10 cursor-pointer" height="20"></i>
                </a>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseTextLesson<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>" aria-controls="collapseTextLesson<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>" data-parent="#chapterContentAccordion<?php echo e(!empty($chapter) ? $chapter->id :''); ?>" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseTextLesson<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>" aria-labelledby="text_lesson_<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>" class=" collapse <?php if(empty($textLesson)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="js-content-form text_lesson-form" data-action="<?php echo e(getAdminPanelUrl()); ?>/text-lesson/<?php echo e(!empty($textLesson) ? $textLesson->id . '/update' : 'store'); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][webinar_id]" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                <select name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][locale]"
                                        class="form-control <?php echo e(!empty($textLesson) ? 'js-webinar-content-locale' : ''); ?>"
                                        data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>"
                                        data-id="<?php echo e(!empty($textLesson) ? $textLesson->id : ''); ?>"
                                        data-relation="textLessons"
                                        data-fields="title,summary,content"
                                >
                                    <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang); ?>" <?php echo e((!empty($textLesson) and !empty($textLesson->locale)) ? (mb_strtolower($textLesson->locale) == mb_strtolower($lang) ? 'selected' : '') : (app()->getLocale() == $lang ? 'selected' : '')); ?>><?php echo e($language); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][locale]" value="<?php echo e($defaultLocale); ?>">
                        <?php endif; ?>

                        <?php if(!empty($textLesson)): ?>
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.chapter')); ?></label>
                                <select name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][chapter_id]" class="js-ajax-chapter_id form-control">
                                    <?php $__currentLoopData = $webinar->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ch->id); ?>" <?php echo e(($textLesson->chapter_id == $ch->id) ? 'selected' : ''); ?>><?php echo e($ch->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="ajax[new][chapter_id]" value="" class="chapter-input">
                        <?php endif; ?>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][title]" class="js-ajax-title form-control" value="<?php echo e(!empty($textLesson) ? $textLesson->title : ''); ?>" placeholder=""/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.study_time')); ?> (Min)</label>
                            <input type="text" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][study_time]" class="js-ajax-study_time form-control" value="<?php echo e(!empty($textLesson) ? $textLesson->study_time : ''); ?>" placeholder="<?php echo e(trans('forms.maximum_255_characters')); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.image')); ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="input-group-text admin-file-manager" data-input="image<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>" data-preview="holder">
                                        <i data-feather="arrow-up" width="18" height="18" class=""></i>
                                    </button>
                                </div>
                                <input type="text" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][image]" id="image<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>" value="<?php echo e(!empty($textLesson) ? $textLesson->image : ''); ?>" class="js-ajax-image form-control"/>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.accessibility')); ?></label>

                            <div class="d-flex align-items-center js-ajax-accessibility">
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][accessibility]" value="free" <?php if(empty($textLesson) or (!empty($textLesson) and $textLesson->accessibility == 'free')): ?> checked="checked" <?php endif; ?> id="accessibilityRadio1_<?php echo e(!empty($textLesson) ? $textLesson->id : 'record'); ?>" class="custom-control-input">
                                    <label class="custom-control-label font-14 cursor-pointer" for="accessibilityRadio1_<?php echo e(!empty($textLesson) ? $textLesson->id : 'record'); ?>"><?php echo e(trans('public.free')); ?></label>
                                </div>

                                <div class="custom-control custom-radio ml-15">
                                    <input type="radio" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][accessibility]" value="paid" <?php if(!empty($textLesson) and $textLesson->accessibility == 'paid'): ?> checked="checked" <?php endif; ?> id="accessibilityRadio2_<?php echo e(!empty($textLesson) ? $textLesson->id : 'record'); ?>" class="custom-control-input">
                                    <label class="custom-control-label font-14 cursor-pointer" for="accessibilityRadio2_<?php echo e(!empty($textLesson) ? $textLesson->id : 'record'); ?>"><?php echo e(trans('public.paid')); ?></label>
                                </div>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label d-block"><?php echo e(trans('public.attachments')); ?></label>

                            <select class="js-ajax-attachments <?php if(empty($textLesson)): ?> form-control <?php endif; ?> attachments-select2" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][attachments]" data-placeholder="<?php echo e(trans('public.choose_attachments')); ?>">
                                <option></option>

                                <?php if(!empty($webinar->files) and count($webinar->files)): ?>
                                    <?php $__currentLoopData = $webinar->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filesInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($filesInfo->downloadable): ?>
                                            <option value="<?php echo e($filesInfo->id); ?>" <?php if(!empty($textLesson) and in_array($filesInfo->id,$textLesson->attachments->pluck('file_id')->toArray())): ?> selected <?php endif; ?>><?php echo e($filesInfo->title); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.summary')); ?></label>
                            <textarea name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][summary]" class="js-ajax-summary form-control" rows="6"><?php echo e(!empty($textLesson) ? $textLesson->summary : ''); ?></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.content')); ?></label>
                            <div class="content-summernote js-ajax-file_path">
                                <textarea class="js-content-summernote form-control <?php echo e(!empty($textLesson) ? 'js-content-'.$textLesson->id : ''); ?>"><?php echo e(!empty($textLesson) ? $textLesson->content : ''); ?></textarea>
                                <textarea name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][content]" class="js-hidden-content-summernote <?php echo e(!empty($textLesson) ? 'js-hidden-content-'.$textLesson->id : ''); ?> d-none"><?php echo e(!empty($textLesson) ? $textLesson->content : ''); ?></textarea>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="form-group mt-20">
                            <div class="d-flex align-items-center justify-content-between">
                                <label class="cursor-pointer input-label" for="textLessonStatusSwitch<?php echo e(!empty($textLesson) ? $textLesson->id : '_record'); ?>"><?php echo e(trans('public.active')); ?></label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][status]" class="custom-control-input" id="textLessonStatusSwitch<?php echo e(!empty($textLesson) ? $textLesson->id : '_record'); ?>" <?php echo e((empty($textLesson) or $textLesson->status == \App\Models\TextLesson::$Active) ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="textLessonStatusSwitch<?php echo e(!empty($textLesson) ? $textLesson->id : '_record'); ?>"></label>
                                </div>
                            </div>
                        </div>

                        <?php if(getFeaturesSettings('sequence_content_status')): ?>
                            <div class="form-group mt-20">
                                <div class="d-flex align-items-center justify-content-between">
                                    <label class="cursor-pointer input-label" for="SequenceContentTextLessionSwitch<?php echo e(!empty($textLesson) ? $textLesson->id : '_record'); ?>"><?php echo e(trans('update.sequence_content')); ?></label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][sequence_content]" class="js-sequence-content-switch custom-control-input" id="SequenceContentTextLessionSwitch<?php echo e(!empty($textLesson) ? $textLesson->id : '_record'); ?>" <?php echo e((!empty($textLesson) and ($textLesson->check_previous_parts or !empty($textLesson->access_after_day))) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="SequenceContentTextLessionSwitch<?php echo e(!empty($textLesson) ? $textLesson->id : '_record'); ?>"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="js-sequence-content-inputs pl-5 <?php echo e((!empty($textLesson) and ($textLesson->check_previous_parts or !empty($textLesson->access_after_day))) ? '' : 'd-none'); ?>">
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="cursor-pointer input-label" for="checkPreviousPartsTextLessionSwitch<?php echo e(!empty($textLesson) ? $textLesson->id : '_record'); ?>"><?php echo e(trans('update.check_previous_parts')); ?></label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][check_previous_parts]" class="custom-control-input" id="checkPreviousPartsTextLessionSwitch<?php echo e(!empty($textLesson) ? $textLesson->id : '_record'); ?>" <?php echo e((empty($textLesson) or $textLesson->check_previous_parts) ? 'checked' : ''); ?>>
                                            <label class="custom-control-label" for="checkPreviousPartsTextLessionSwitch<?php echo e(!empty($textLesson) ? $textLesson->id : '_record'); ?>"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.access_after_day')); ?></label>
                                    <input type="number" name="ajax[<?php echo e(!empty($textLesson) ? $textLesson->id : 'new'); ?>][access_after_day]" value="<?php echo e((!empty($textLesson)) ? $textLesson->access_after_day : ''); ?>" class="js-ajax-access_after_day form-control" placeholder="<?php echo e(trans('update.access_after_day_placeholder')); ?>"/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" class="js-save-text_lesson btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                    <?php if(empty($textLesson)): ?>
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/webinars/create_includes/accordions/text-lesson.blade.php ENDPATH**/ ?>