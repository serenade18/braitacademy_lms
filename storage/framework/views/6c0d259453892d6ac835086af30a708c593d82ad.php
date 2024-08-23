<?php
    if (!empty($session->agora_settings)) {
        $session->agora_settings = json_decode($session->agora_settings);
    }
?>

<li data-id="<?php echo e(!empty($chapterItem) ? $chapterItem->id :''); ?>" class="accordion-row bg-white rounded-sm border border-gray300 mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="session_<?php echo e(!empty($session) ? $session->id :'record'); ?>">
        <div class="d-flex align-items-center" href="#collapseSession<?php echo e(!empty($session) ? $session->id :'record'); ?>" aria-controls="collapseSession<?php echo e(!empty($session) ? $session->id :'record'); ?>" data-parent="#chapterContentAccordion<?php echo e(!empty($chapter) ? $chapter->id :''); ?>" role="button" data-toggle="collapse" aria-expanded="true">
            <span class="chapter-icon chapter-content-icon mr-10">
                <i data-feather="file-text" class=""></i>
            </span>

            <div class="font-weight-bold text-dark-blue d-block cursor-pointer"><?php echo e(!empty($session) ? $session->title : trans('public.add_new_sessions')); ?></div>
        </div>

        <div class="d-flex align-items-center">

            <?php if(!empty($session) and $session->status != \App\Models\WebinarChapter::$chapterActive): ?>
                <span class="disabled-content-badge mr-10"><?php echo e(trans('public.disabled')); ?></span>
            <?php endif; ?>

            <?php if(!empty($session)): ?>
                <button type="button" data-item-id="<?php echo e($session->id); ?>" data-item-type="<?php echo e(\App\Models\WebinarChapterItem::$chapterSession); ?>" data-chapter-id="<?php echo e(!empty($chapter) ? $chapter->id : ''); ?>" class="js-change-content-chapter btn btn-sm btn-transparent text-gray mr-10">
                    <i data-feather="grid" class="" height="20"></i>
                </button>
            <?php endif; ?>

            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

            <?php if(!empty($session)): ?>
                <a href="<?php echo e(getAdminPanelUrl()); ?>/sessions/<?php echo e($session->id); ?>/delete" class="delete-action btn btn-sm btn-transparent text-gray">
                    <i data-feather="trash-2" class="mr-10 cursor-pointer" height="20"></i>
                </a>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseSession<?php echo e(!empty($session) ? $session->id :'record'); ?>" aria-controls="collapseSession<?php echo e(!empty($session) ? $session->id :'record'); ?>" data-parent="#chapterContentAccordion<?php echo e(!empty($chapter) ? $chapter->id :''); ?>" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseSession<?php echo e(!empty($session) ? $session->id :'record'); ?>" aria-labelledby="session_<?php echo e(!empty($session) ? $session->id :'record'); ?>" class=" collapse <?php if(empty($session)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="js-content-form session-form" data-action="<?php echo e(getAdminPanelUrl()); ?>/sessions/<?php echo e(!empty($session) ? $session->id . '/update' : 'store'); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][webinar_id]" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('webinars.select_session_api')); ?></label>

                    <div class="js-session-api">
                        <?php $__currentLoopData = getFeaturesSettings("available_session_apis"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sessionApi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][session_api]" id="<?php echo e($sessionApi); ?>_api_<?php echo e(!empty($session) ? $session->id : ''); ?>" value="<?php echo e($sessionApi); ?>" <?php if((!empty($session) and $session->session_api == $sessionApi) or (empty($session) and $sessionApi == 'local')): ?> checked <?php endif; ?> class="js-api-input custom-control-input" <?php echo e((!empty($session) and $session->session_api != 'local') ? 'disabled' :''); ?>>
                                <label class="custom-control-label" for="<?php echo e($sessionApi); ?>_api_<?php echo e(!empty($session) ? $session->id : ''); ?>"><?php echo e(trans('update.session_api_'.$sessionApi)); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="invalid-feedback"></div>

                    
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">

                        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                <select name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][locale]"
                                        class="form-control <?php echo e(!empty($session) ? 'js-webinar-content-locale' : ''); ?>"
                                        data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>"
                                        data-id="<?php echo e(!empty($session) ? $session->id : ''); ?>"
                                        data-relation="sessions"
                                        data-fields="title,description"
                                >
                                    <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang); ?>" <?php echo e((!empty($session) and !empty($session->locale)) ? (mb_strtolower($session->locale) == mb_strtolower($lang) ? 'selected' : '') : (app()->getLocale() == $lang ? 'selected' : '')); ?>><?php echo e($language); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][locale]" value="<?php echo e($defaultLocale); ?>">
                        <?php endif; ?>

                        <div class="form-group js-api-secret <?php echo e((!empty($session) and in_array($session->session_api, ['zoom', 'agora', 'jitsi'])) ? 'd-none' :''); ?>">
                            <label class="input-label"><?php echo e(trans('auth.password')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][api_secret]" class="js-ajax-api_secret form-control" value="<?php echo e(!empty($session) ? $session->api_secret : ''); ?>" <?php echo e((!empty($session) and $session->session_api != 'local') ? 'disabled' :''); ?>/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group js-moderator-secret <?php echo e((empty($session) or $session->session_api != 'big_blue_button') ? 'd-none' :''); ?>">
                            <label class="input-label"><?php echo e(trans('public.moderator_password')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][moderator_secret]" class="js-ajax-moderator_secret form-control" value="<?php echo e(!empty($session) ? $session->moderator_secret : ''); ?>" <?php echo e((!empty($session) and $session->session_api == 'big_blue_button') ? 'disabled' :''); ?>/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <?php if(!empty($session)): ?>
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.chapter')); ?></label>
                                <select name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][chapter_id]" class="js-ajax-chapter_id form-control">
                                    <?php $__currentLoopData = $webinar->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ch->id); ?>" <?php echo e(($session->chapter_id == $ch->id) ? 'selected' : ''); ?>><?php echo e($ch->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="ajax[new][chapter_id]" value="" class="chapter-input">
                        <?php endif; ?>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][title]" class="js-ajax-title form-control" value="<?php echo e(!empty($session) ? $session->title : ''); ?>" placeholder="<?php echo e(trans('forms.maximum_255_characters')); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.date')); ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="dateRangeLabel">
                                        <i data-feather="calendar" width="18" height="18" class=""></i>
                                    </span>
                                </div>
                                <input type="text" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][date]" class="js-ajax-date form-control datetimepicker" value="<?php echo e(!empty($session) ? dateTimeFormat($session->date, 'Y-m-d H:i', false, true, ($session->webinar ? $session->webinar->timezone : null)) : ''); ?>" aria-describedby="dateRangeLabel" <?php echo e((!empty($session) and $session->session_api != 'local') ? 'disabled' :''); ?> autocomplete="off"/>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.duration')); ?> <span class="braces">(<?php echo e(trans('public.minutes')); ?>)</span></label>
                            <input type="text" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][duration]" class="js-ajax-duration form-control" value="<?php echo e(!empty($session) ? $session->duration : ''); ?>" <?php echo e((!empty($session) and $session->session_api != 'local') ? 'disabled' :''); ?>/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group js-local-link <?php echo e((!empty($session) and in_array($session->session_api, ['agora', 'jitsi'])) ? 'd-none' : ''); ?>">
                            <label class="input-label"><?php echo e(trans('public.link')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][link]" class="js-ajax-link form-control" value="<?php echo e(!empty($session) ? $session->getJoinLink() : ''); ?>" <?php echo e((!empty($session) and $session->session_api != 'local') ? 'disabled' :''); ?>/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                            <textarea name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][description]" class="js-ajax-description form-control" rows="6"><?php echo e(!empty($session) ? $session->description : ''); ?></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                        <?php if(!empty(getFeaturesSettings('extra_time_to_join_status')) and getFeaturesSettings('extra_time_to_join_status')): ?>
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('update.extra_time_to_join')); ?> <span class="braces">(<?php echo e(trans('public.minutes')); ?>)</span></label>
                                <input type="text" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][extra_time_to_join]" value="<?php echo e((!empty($session) and $session->extra_time_to_join) ? $session->extra_time_to_join : getFeaturesSettings('extra_time_to_join_default_value')); ?>" class="js-ajax-extra_time_to_join form-control" placeholder=""/>
                                <div class="invalid-feedback"></div>
                            </div>
                        <?php elseif(!empty(getFeaturesSettings('extra_time_to_join_default_value'))): ?>
                            <input type="hidden" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][extra_time_to_join]" value="<?php echo e((!empty($session) and $session->extra_time_to_join) ? $session->extra_time_to_join : getFeaturesSettings('extra_time_to_join_default_value')); ?>" class="js-ajax-extra_time_to_join form-control" placeholder=""/>
                        <?php endif; ?>

                        <div class="form-group mt-20">
                            <div class="d-flex align-items-center justify-content-between">
                                <label class="cursor-pointer input-label" for="sessionStatusSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>"><?php echo e(trans('public.active')); ?></label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][status]" class="custom-control-input" id="sessionStatusSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>" <?php echo e((empty($session) or $session->status == \App\Models\Session::$Active) ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="sessionStatusSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>"></label>
                                </div>
                            </div>
                        </div>

                        <div class="js-agora-chat-and-rec  <?php echo e((empty($session) or $session->session_api !== 'agora') ? 'd-none' : ''); ?>">
                            <?php if(getFeaturesSettings('agora_chat')): ?>
                                <div class="form-group mt-20">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="cursor-pointer input-label" for="sessionAgoraChatSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>"><?php echo e(trans('update.chat')); ?></label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][agora_chat]" class="custom-control-input" id="sessionAgoraChatSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>" <?php echo e((!empty($session) and !empty($session->agora_settings) and $session->agora_settings->chat) ? 'checked' : ''); ?>>
                                            <label class="custom-control-label" for="sessionAgoraChatSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>"></label>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            

                        </div>

                        <?php if(getFeaturesSettings('sequence_content_status')): ?>
                            <div class="form-group mt-20">
                                <div class="d-flex align-items-center justify-content-between">
                                    <label class="cursor-pointer input-label" for="SequenceContentSessionSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>"><?php echo e(trans('update.sequence_content')); ?></label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][sequence_content]" class="js-sequence-content-switch custom-control-input" id="SequenceContentSessionSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>" <?php echo e((!empty($session) and ($session->check_previous_parts or !empty($session->access_after_day))) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="SequenceContentSessionSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="js-sequence-content-inputs pl-5 <?php echo e((!empty($session) and ($session->check_previous_parts or !empty($session->access_after_day))) ? '' : 'd-none'); ?>">
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="cursor-pointer input-label" for="checkPreviousPartsSessionSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>"><?php echo e(trans('update.check_previous_parts')); ?></label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][check_previous_parts]" class="custom-control-input" id="checkPreviousPartsSessionSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>" <?php echo e((empty($session) or $session->check_previous_parts) ? 'checked' : ''); ?>>
                                            <label class="custom-control-label" for="checkPreviousPartsSessionSwitch<?php echo e(!empty($session) ? $session->id : '_record'); ?>"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.access_after_day')); ?></label>
                                    <input type="number" name="ajax[<?php echo e(!empty($session) ? $session->id : 'new'); ?>][access_after_day]" value="<?php echo e((!empty($session)) ? $session->access_after_day : ''); ?>" class="js-ajax-access_after_day form-control" placeholder="<?php echo e(trans('update.access_after_day_placeholder')); ?>"/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" class="js-save-session btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                    <?php if(!empty($session)): ?>
                        <?php if(!$session->isFinished()): ?>
                            <a href="<?php echo e($session->getJoinLink(true)); ?>" target="_blank" class="ml-10 btn btn-sm btn-secondary"><?php echo e(trans('footer.join')); ?></a>
                        <?php else: ?>
                            <button type="button" class="js-session-has-ended ml-10 btn btn-sm btn-secondary disabled"><?php echo e(trans('footer.join')); ?></button>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(empty($session)): ?>
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\webinars\create_includes\accordions\session.blade.php ENDPATH**/ ?>