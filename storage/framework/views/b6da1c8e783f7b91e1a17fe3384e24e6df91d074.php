<li data-id="<?php echo e(!empty($chapterItem) ? $chapterItem->id :''); ?>" class="accordion-row bg-white rounded-sm border border-gray300 mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="file_<?php echo e(!empty($assignment) ? $assignment->id :'record'); ?>">
        <div class="d-flex align-items-center" href="#collapseFile<?php echo e(!empty($assignment) ? $assignment->id :'record'); ?>" aria-controls="collapseFile<?php echo e(!empty($assignment) ? $assignment->id :'record'); ?>" data-parent="#chapterContentAccordion<?php echo e(!empty($chapter) ? $chapter->id :''); ?>" role="button" data-toggle="collapse" aria-expanded="true">
            <span class="chapter-icon chapter-content-icon mr-10">
                <i data-feather="feather" class=""></i>
            </span>

            <div class="font-weight-bold text-dark-blue d-block cursor-pointer"><?php echo e(!empty($assignment) ? $assignment->title . ($assignment->accessibility == 'free' ? " (". trans('public.free') .")" : '') : trans('update.add_new_assignments')); ?></div>
        </div>

        <div class="d-flex align-items-center">

            <?php if(!empty($assignment) and $assignment->status != \App\Models\WebinarChapter::$chapterActive): ?>
                <span class="disabled-content-badge mr-10"><?php echo e(trans('public.disabled')); ?></span>
            <?php endif; ?>

            <?php if(!empty($assignment)): ?>
                <button type="button" data-item-id="<?php echo e($assignment->id); ?>" data-item-type="<?php echo e(\App\Models\WebinarChapterItem::$chapterAssignment); ?>" data-chapter-id="<?php echo e(!empty($chapter) ? $chapter->id : ''); ?>" class="js-change-content-chapter btn btn-sm btn-transparent text-gray mr-10">
                    <i data-feather="grid" class="" height="20"></i>
                </button>
            <?php endif; ?>

            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

            <?php if(!empty($assignment)): ?>
                <a href="<?php echo e(getAdminPanelUrl()); ?>/assignments/<?php echo e($assignment->id); ?>/delete" class="delete-action btn btn-sm btn-transparent text-gray">
                    <i data-feather="trash-2" class="mr-10 cursor-pointer" height="20"></i>
                </a>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseFile<?php echo e(!empty($assignment) ? $assignment->id :'record'); ?>" aria-controls="collapseFile<?php echo e(!empty($assignment) ? $assignment->id :'record'); ?>" data-parent="#chapterContentAccordion<?php echo e(!empty($chapter) ? $chapter->id :''); ?>" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseFile<?php echo e(!empty($assignment) ? $assignment->id :'record'); ?>" aria-labelledby="file_<?php echo e(!empty($assignment) ? $assignment->id :'record'); ?>" class=" collapse <?php if(empty($assignment)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="js-content-form assignment-form" data-action="<?php echo e(getAdminPanelUrl()); ?>/assignments/<?php echo e(!empty($assignment) ? $assignment->id . '/update' : 'store'); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][webinar_id]" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

                <div class="row">
                    <div class="col-12 col-lg-6">

                        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                <select name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][locale]"
                                        class="form-control <?php echo e(!empty($assignment) ? 'js-webinar-content-locale' : ''); ?>"
                                        data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>"
                                        data-id="<?php echo e(!empty($assignment) ? $assignment->id : ''); ?>"
                                        data-relation="assignments"
                                        data-fields="title,description"
                                >
                                    <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang); ?>" <?php echo e((!empty($assignment) and !empty($assignment->locale)) ? (mb_strtolower($assignment->locale) == mb_strtolower($lang) ? 'selected' : '') : (app()->getLocale() == $lang ? 'selected' : '')); ?>><?php echo e($language); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][locale]" value="<?php echo e($defaultLocale); ?>">
                        <?php endif; ?>

                        <?php if(!empty($assignment)): ?>
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.chapter')); ?></label>
                                <select name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][chapter_id]" class="js-ajax-chapter_id form-control">
                                    <?php $__currentLoopData = $webinar->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ch->id); ?>" <?php echo e(($assignment->chapter_id == $ch->id) ? 'selected' : ''); ?>><?php echo e($ch->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="ajax[new][chapter_id]" value="" class="chapter-input">
                        <?php endif; ?>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][title]" class="js-ajax-title form-control" value="<?php echo e(!empty($assignment) ? $assignment->title : ''); ?>" placeholder=""/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                            <textarea name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][description]" class="js-ajax-description form-control" rows="6"><?php echo e(!empty($assignment) ? $assignment->description : ''); ?></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('quiz.grade')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][grade]" class="js-ajax-grade form-control" value="<?php echo e(!empty($assignment) ? $assignment->grade : ''); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.pass_grade')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][pass_grade]" class="js-ajax-pass_grade form-control" value="<?php echo e(!empty($assignment) ? $assignment->pass_grade : ''); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.deadline')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][deadline]" class="js-ajax-deadline form-control" value="<?php echo e(!empty($assignment) ? $assignment->deadline : ''); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.attempts')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][attempts]" class="js-ajax-attempts form-control" value="<?php echo e(!empty($assignment) ? $assignment->attempts : ''); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="js-assignment-attachments-items form-group mt-15">
                            <div class="d-flex align-items-center justify-content-between">
                                <label class="input-label mb-0"><?php echo e(trans('public.attachments')); ?></label>

                                <button type="button" class="btn btn-primary btn-sm assignment-attachments-add-btn">
                                    <i data-feather="plus" width="18" height="18" class="text-white"></i>
                                </button>
                            </div>

                            <div class="assignment-attachments-main-row js-ajax-attachments position-relative">
                                <div class="mt-10 p-10 border rounded">
                                    <div class="mb-10">
                                        <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                                        <input type="text" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][attachments][assignmentTemp][title]" class="form-control" placeholder="<?php echo e(trans('forms.maximum_255_characters')); ?>"/>
                                    </div>

                                    <div class="input-group product-images-input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text admin-file-manager" data-input="attachments_assignmentTemp" data-preview="holder">
                                                <i data-feather="upload" width="18" height="18" class=""></i>
                                            </button>
                                        </div>
                                        <input type="text" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][attachments][assignmentTemp][attach]" id="attachments_assignmentTemp" value="" class="form-control" placeholder="<?php echo e(trans('update.assignment_attachments_placeholder')); ?>"/>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger btn-sm assignment-attachments-remove-btn d-none">
                                    <i data-feather="x" width="18" height="18" class="text-white"></i>
                                </button>
                            </div>

                            <div class="invalid-feedback"></div>

                            <?php if(!empty($assignment) and !empty($assignment->attachments) and count($assignment->attachments)): ?>
                                <?php $__currentLoopData = $assignment->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="js-ajax-attachments position-relative">
                                        <div class="mt-10 p-10 border rounded">
                                            <div class="mb-10">
                                                <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                                                <input type="text" name="ajax[<?php echo e($assignment->id); ?>][attachments][<?php echo e($attachment->id); ?>][title]" value="<?php echo e($attachment->title); ?>" class="form-control" placeholder="<?php echo e(trans('forms.maximum_255_characters')); ?>"/>
                                            </div>

                                            <div class="input-group product-images-input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="input-group-text admin-file-manager" data-input="attachments_<?php echo e($attachment->id); ?>" data-preview="holder">
                                                        <i data-feather="upload" width="18" height="18" class=""></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="ajax[<?php echo e($assignment->id); ?>][attachments][<?php echo e($attachment->id); ?>][attach]" id="attachments_<?php echo e($attachment->id); ?>" value="<?php echo e($attachment->attach); ?>" class="form-control" placeholder="<?php echo e(trans('update.assignment_attachments_placeholder')); ?>"/>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-danger btn-sm assignment-attachments-remove-btn">
                                            <i data-feather="x" width="18" height="18" class="text-white"></i>
                                        </button>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mt-20">
                            <div class="d-flex align-items-center justify-content-between">
                                <label class="cursor-pointer input-label" for="assignmentStatusSwitch<?php echo e(!empty($assignment) ? $assignment->id : '_record'); ?>"><?php echo e(trans('public.active')); ?></label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][status]" class="custom-control-input" id="assignmentStatusSwitch<?php echo e(!empty($assignment) ? $assignment->id : '_record'); ?>" <?php echo e((empty($assignment) or $assignment->status == \App\Models\File::$Active) ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="assignmentStatusSwitch<?php echo e(!empty($assignment) ? $assignment->id : '_record'); ?>"></label>
                                </div>
                            </div>
                        </div>

                        <?php if(getFeaturesSettings('sequence_content_status')): ?>
                            <div class="form-group mt-20">
                                <div class="d-flex align-items-center justify-content-between">
                                    <label class="cursor-pointer input-label" for="SequenceContentAssignmentSwitch<?php echo e(!empty($assignment) ? $assignment->id : '_record'); ?>"><?php echo e(trans('update.sequence_content')); ?></label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][sequence_content]" class="js-sequence-content-switch custom-control-input" id="SequenceContentAssignmentSwitch<?php echo e(!empty($assignment) ? $assignment->id : '_record'); ?>" <?php echo e((!empty($assignment) and ($assignment->check_previous_parts or !empty($assignment->access_after_day))) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="SequenceContentAssignmentSwitch<?php echo e(!empty($assignment) ? $assignment->id : '_record'); ?>"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="js-sequence-content-inputs pl-5 <?php echo e((!empty($assignment) and ($assignment->check_previous_parts or !empty($assignment->access_after_day))) ? '' : 'd-none'); ?>">
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="cursor-pointer input-label" for="checkPreviousPartsAssignmentSwitch<?php echo e(!empty($assignment) ? $assignment->id : '_record'); ?>"><?php echo e(trans('update.check_previous_parts')); ?></label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][check_previous_parts]" class="custom-control-input" id="checkPreviousPartsAssignmentSwitch<?php echo e(!empty($assignment) ? $assignment->id : '_record'); ?>" <?php echo e((empty($assignment) or $assignment->check_previous_parts) ? 'checked' : ''); ?>>
                                            <label class="custom-control-label" for="checkPreviousPartsAssignmentSwitch<?php echo e(!empty($assignment) ? $assignment->id : '_record'); ?>"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.access_after_day')); ?></label>
                                    <input type="number" name="ajax[<?php echo e(!empty($assignment) ? $assignment->id : 'new'); ?>][access_after_day]" value="<?php echo e((!empty($assignment)) ? $assignment->access_after_day : ''); ?>" class="js-ajax-access_after_day form-control" placeholder="<?php echo e(trans('update.access_after_day_placeholder')); ?>"/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" class="js-save-assignment btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                    <?php if(empty($assignment)): ?>
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/admin/webinars/create_includes/accordions/assignment.blade.php ENDPATH**/ ?>