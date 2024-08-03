<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>

<div class="tab-pane mt-3 fade" id="features" role="tabpanel" aria-labelledby="features-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/features" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="page" value="general">
                <input type="hidden" name="features" value="features">

                <div class="mb-5">
                    <h5><?php echo e(trans('update.agora')); ?> <?php echo e(trans('admin/main.settings')); ?></h5>

                    <div class="form-group">
                        <label><?php echo e(trans('update.agora')); ?> <?php echo e(trans('update.resolution')); ?></label>

                        <select class="form-control" name="value[agora_resolution]">
                            <option value=""><?php echo e(trans('admin/main.select')); ?> <?php echo e(trans('update.resolution')); ?></option>

                            <?php $__currentLoopData = getAgoraResolutions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resolution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    value="<?php echo e($resolution); ?>" <?php echo e(((!empty($itemValue) and !empty($itemValue['agora_resolution']) and $itemValue['agora_resolution'] == $resolution) or old('value[agora_resolution]') == $resolution) ? 'selected' : ''); ?>><?php echo e(str_replace('_',' x ', $resolution)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('update.max_bitrate')); ?></label>
                        <input type="text" name="value[agora_max_bitrate]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['agora_max_bitrate'])) ? $itemValue['agora_max_bitrate'] : old('agora_max_bitrate')); ?>" class="form-control "/>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('update.min_bitrate')); ?></label>
                        <input type="text" name="value[agora_min_bitrate]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['agora_min_bitrate'])) ? $itemValue['agora_min_bitrate'] : old('agora_min_bitrate')); ?>" class="form-control "/>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('update.frame_rate')); ?></label>
                        <input type="text" name="value[agora_frame_rate]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['agora_frame_rate'])) ? $itemValue['agora_frame_rate'] : old('agora_frame_rate')); ?>" class="form-control "/>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[agora_live_streaming]" value="0">
                            <input type="checkbox" name="value[agora_live_streaming]" id="agoraStreamSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['agora_live_streaming']) and $itemValue['agora_live_streaming']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="agoraStreamSwitch"><?php echo e(trans('update.agora_live_streaming')); ?></label>
                        </label>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[agora_chat]" value="0">
                            <input type="checkbox" name="value[agora_chat]" id="agoraChatSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['agora_chat']) and $itemValue['agora_chat']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="agoraChatSwitch"><?php echo e(trans('update.agora_chat')); ?></label>
                        </label>
                    </div>
                    

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[agora_in_free_courses]" value="0">
                            <input type="checkbox" name="value[agora_in_free_courses]" id="agoraInFreeCoursesSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['agora_in_free_courses']) and $itemValue['agora_in_free_courses']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="agoraInFreeCoursesSwitch"><?php echo e(trans('update.agora_in_free_courses')); ?></label>
                        </label>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[agora_for_meeting]" value="0">
                            <input type="checkbox" name="value[agora_for_meeting]" id="agoraForMeetingSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['agora_for_meeting']) and $itemValue['agora_for_meeting']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="agoraForMeetingSwitch"><?php echo e(trans('update.agora_for_meeting')); ?></label>
                        </label>
                        <div class="text-muted text-small mt-1"><?php echo e(trans('update.agora_meeting_hint')); ?></div>
                    </div>

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('update.meeting_live_stream_type')); ?></label>
                        <select name="value[meeting_live_stream_type]" class="form-control">
                            <option value="single" <?php echo e((!empty($itemValue) and !empty($itemValue['meeting_live_stream_type']) and $itemValue['meeting_live_stream_type'] == 'single') ? 'selected="selected"' : ''); ?>><?php echo e(trans('update.meeting_single')); ?></option>
                            <option value="multiple" <?php echo e((!empty($itemValue) and !empty($itemValue['meeting_live_stream_type']) and $itemValue['meeting_live_stream_type'] == 'multiple') ? 'selected="selected"' : ''); ?>><?php echo e(trans('update.meeting_multiple')); ?></option>
                        </select><label class="label"></label>
                    </div>

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('update.course_live_stream_type')); ?></label>
                        <select name="value[course_live_stream_type]" class="form-control">
                            <option value="single" <?php echo e((!empty($itemValue) and !empty($itemValue['course_live_stream_type']) and $itemValue['course_live_stream_type'] == 'single') ? 'selected="selected"' : ''); ?>><?php echo e(trans('update.meeting_single')); ?></option>
                            <option value="multiple" <?php echo e((!empty($itemValue) and !empty($itemValue['course_live_stream_type']) and $itemValue['course_live_stream_type'] == 'multiple') ? 'selected="selected"' : ''); ?>><?php echo e(trans('update.meeting_multiple')); ?></option>
                        </select><label class="label"></label>
                    </div>


                    <?php $__currentLoopData = ['agora_app_id', 'agora_app_certificate']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agoraConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans("update.{$agoraConf}")); ?></label>
                            <input type="text" name="value[<?php echo e($agoraConf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["{$agoraConf}"])) ? $itemValue["{$agoraConf}"] : old("{$agoraConf}")); ?>" class="form-control "/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.new_interactive_file')); ?> <?php echo e(trans('admin/main.settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[new_interactive_file]" value="0">
                            <input type="checkbox" name="value[new_interactive_file]" id="newInteractiveFileSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['new_interactive_file']) and $itemValue['new_interactive_file']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="newInteractiveFileSwitch"><?php echo e(trans('update.interactive_feature_toggle')); ?></label>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.timezone')); ?> <?php echo e(trans('admin/main.settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[timezone_in_register]" value="0">
                            <input type="checkbox" name="value[timezone_in_register]" id="timezoneInRegisterSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['timezone_in_register']) and $itemValue['timezone_in_register']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="timezoneInRegisterSwitch"><?php echo e(trans('update.timezone_in_register')); ?></label>
                        </label>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[timezone_in_create_webinar]" value="0">
                            <input type="checkbox" name="value[timezone_in_create_webinar]" id="timezoneInCreateWebinarSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['timezone_in_create_webinar']) and $itemValue['timezone_in_create_webinar']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="timezoneInCreateWebinarSwitch"><?php echo e(trans('update.timezone_in_create_webinar')); ?></label>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.sequence_content_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[sequence_content_status]" value="0">
                            <input type="checkbox" name="value[sequence_content_status]" id="sequenceContentSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['sequence_content_status']) and $itemValue['sequence_content_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="sequenceContentSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                    </div>
                </div>


                <div class="mb-5">
                    <h5><?php echo e(trans('update.assignment_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[webinar_assignment_status]" value="0">
                            <input type="checkbox" name="value[webinar_assignment_status]" id="webinarAssignmentSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['webinar_assignment_status']) and $itemValue['webinar_assignment_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="webinarAssignmentSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.private_content_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[webinar_private_content_status]" value="0">
                            <input type="checkbox" name="value[webinar_private_content_status]" id="webinarPrivateContentSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['webinar_private_content_status']) and $itemValue['webinar_private_content_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="webinarPrivateContentSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.private_content_settings_hint')); ?></p>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[disable_view_content_after_user_register]" value="0">
                            <input type="checkbox" name="value[disable_view_content_after_user_register]" id="disableViewContentAfterUserRegisterSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['disable_view_content_after_user_register']) and $itemValue['disable_view_content_after_user_register']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="disableViewContentAfterUserRegisterSwitch"><?php echo e(trans('update.disable_view_content_after_user_register')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.disable_view_content_after_user_register_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.course_forum_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[course_forum_status]" value="0">
                            <input type="checkbox" name="value[course_forum_status]" id="courseForumSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['course_forum_status']) and $itemValue['course_forum_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="courseForumSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.course_forum_settings_status_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.forum_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[forums_status]" value="0">
                            <input type="checkbox" name="value[forums_status]" id="forumStatusSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['forums_status']) and $itemValue['forums_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="forumStatusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.forum_settings_status_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.direct_classes_payment_button_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[direct_classes_payment_button_status]" value="0">
                            <input type="checkbox" name="value[direct_classes_payment_button_status]" id="directClassesPaymentButtonStatusSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['direct_classes_payment_button_status']) and $itemValue['direct_classes_payment_button_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="directClassesPaymentButtonStatusSwitch"><?php echo e(trans('admin/main.classes')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.direct_classes_payment_button_status_hint')); ?></p>
                    </div>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[direct_bundles_payment_button_status]" value="0">
                            <input type="checkbox" name="value[direct_bundles_payment_button_status]" id="directBundlesPaymentButtonStatusSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['direct_bundles_payment_button_status']) and $itemValue['direct_bundles_payment_button_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="directBundlesPaymentButtonStatusSwitch"><?php echo e(trans('update.bundles')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.direct_bundles_payment_button_status_hint')); ?></p>
                    </div>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[direct_products_payment_button_status]" value="0">
                            <input type="checkbox" name="value[direct_products_payment_button_status]" id="directProductsPaymentButtonStatusSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['direct_products_payment_button_status']) and $itemValue['direct_products_payment_button_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="directProductsPaymentButtonStatusSwitch"><?php echo e(trans('update.products')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.direct_products_payment_button_status_hint')); ?></p>
                    </div>

                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.cookie_settings_status')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[cookie_settings_status]" value="0">
                            <input type="checkbox" name="value[cookie_settings_status]" id="cookieSettingsSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['cookie_settings_status']) and $itemValue['cookie_settings_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="cookieSettingsSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.mobile_app_status')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[mobile_app_status]" value="0">
                            <input type="checkbox" name="value[mobile_app_status]" id="mobileAppSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['mobile_app_status']) and $itemValue['mobile_app_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="mobileAppSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.mobile_app_only_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.maintenance_status')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[maintenance_status]" value="0">
                            <input type="checkbox" name="value[maintenance_status]" id="maintenance_statusSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['maintenance_status']) and $itemValue['maintenance_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="maintenance_statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.maintenance_status_hint')); ?></p>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('update.maintenance_access_key')); ?></label>
                        <input type="text" name="value[maintenance_access_key]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['maintenance_access_key'])) ? $itemValue['maintenance_access_key'] : old('maintenance_access_key')); ?>" class="form-control "/>
                        <p class="text-muted font-12 mt-1"><?php echo e(trans('update.maintenance_access_key_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.extra_time_to_join')); ?></h5>

                    <div class="form-group mt-3 mb-0 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[extra_time_to_join_status]" value="0">
                            <input type="checkbox" name="value[extra_time_to_join_status]" id="extraTimeToJoinSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['extra_time_to_join_status']) and $itemValue['extra_time_to_join_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="extraTimeToJoinSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="input-label" for=""><?php echo e(trans('update.default_time')); ?></label>
                        <input type="text" name="value[extra_time_to_join_default_value]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['extra_time_to_join_default_value'])) ? $itemValue['extra_time_to_join_default_value'] : ''); ?>" class="form-control"/>
                        <p class="text-muted font-12 mt-1"><?php echo e(trans('update.extra_time_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.registration_form_options')); ?></h5>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[show_other_register_method]" value="0">
                            <input type="checkbox" name="value[show_other_register_method]" id="showOtherRegisterMethodSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['show_other_register_method']) and $itemValue['show_other_register_method']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="showOtherRegisterMethodSwitch"><?php echo e(trans('update.show_other_register_method')); ?></label>
                        </label>
                        <p class="font-14"><?php echo e(trans('update.show_other_register_method_hint')); ?></p>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[show_certificate_additional_in_register]" value="0">
                            <input type="checkbox" name="value[show_certificate_additional_in_register]" id="showCertificateAdditionalInRegister" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['show_certificate_additional_in_register']) and $itemValue['show_certificate_additional_in_register']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="showCertificateAdditionalInRegister"><?php echo e(trans('update.show_certificate_additional_in_register')); ?></label>
                        </label>
                        <p class="font-14"><?php echo e(trans('update.show_certificate_additional_in_register_hint')); ?></p>
                    </div>
                </div>


                <div class="mb-5">
                    <h5><?php echo e(trans('update.social_login_settings')); ?></h5>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[show_google_login_button]" value="0">
                            <input type="checkbox" name="value[show_google_login_button]" id="showGoogleLoginButtonSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['show_google_login_button']) and $itemValue['show_google_login_button']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="showGoogleLoginButtonSwitch"><?php echo e(trans('update.show_google_login_button')); ?></label>
                        </label>
                        <p class="font-14"><?php echo e(trans('update.show_google_login_button_hint')); ?></p>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[show_facebook_login_button]" value="0">
                            <input type="checkbox" name="value[show_facebook_login_button]" id="showFacebookLoginButton" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['show_facebook_login_button']) and $itemValue['show_facebook_login_button']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="showFacebookLoginButton"><?php echo e(trans('update.show_facebook_login_button')); ?></label>
                        </label>
                        <p class="font-14"><?php echo e(trans('update.show_facebook_login_button_hint')); ?></p>
                    </div>

                    <?php $__currentLoopData = ['google','facebook']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = ['client_id','client_secret']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <label><?php echo e(trans("update.{$socialConf}_{$conf}")); ?></label>
                                <input type="text" name="value[<?php echo e($socialConf); ?>_<?php echo e($conf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["{$socialConf}_{$conf}"])) ? $itemValue["{$socialConf}_{$conf}"] : old("{$socialConf}_{$conf}")); ?>" class="form-control "/>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.live_chat_widget')); ?></h5>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[show_live_chat_widget]" value="0">
                            <input type="checkbox" name="value[show_live_chat_widget]" id="show_live_chat_widgetSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['show_live_chat_widget']) and $itemValue['show_live_chat_widget']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="show_live_chat_widgetSwitch"><?php echo e(trans('update.show_live_chat_widget')); ?></label>
                        </label>
                        <p class="font-14"><?php echo e(trans('update.show_live_chat_widget_hint')); ?></p>
                    </div>
                </div>


                <div class="mb-5">
                    <h5><?php echo e(trans('update.cashback')); ?></h5>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[cashback_active]" value="0">
                            <input type="checkbox" name="value[cashback_active]" id="cashback_activeSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['cashback_active']) and $itemValue['cashback_active']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="cashback_activeSwitch"><?php echo e(trans('update.cashback_active')); ?></label>
                        </label>
                        <p class="font-14"><?php echo e(trans('update.cashback_active_hint')); ?></p>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[display_cashback_notice_in_the_product_page]" value="0">
                            <input type="checkbox" name="value[display_cashback_notice_in_the_product_page]" id="display_cashback_notice_in_the_product_pageSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['display_cashback_notice_in_the_product_page']) and $itemValue['display_cashback_notice_in_the_product_page']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="display_cashback_notice_in_the_product_pageSwitch"><?php echo e(trans('update.display_cashback_notice_in_the_product_page')); ?></label>
                        </label>
                        <p class="font-14"><?php echo e(trans('update.display_cashback_notice_in_the_product_page_hint')); ?></p>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[display_minimum_amount_cashback_notices]" value="0">
                            <input type="checkbox" name="value[display_minimum_amount_cashback_notices]" id="display_minimum_amount_cashback_noticesSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['display_minimum_amount_cashback_notices']) and $itemValue['display_minimum_amount_cashback_notices']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="display_minimum_amount_cashback_noticesSwitch"><?php echo e(trans('update.display_minimum_amount_cashback_notices')); ?></label>
                        </label>
                        <p class="font-14"><?php echo e(trans('update.display_minimum_amount_cashback_notices_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.session_api')); ?></h5>

                    <?php
                        $selectedApi = (!empty($itemValue) and !empty($itemValue['available_session_apis']) and is_array($itemValue['available_session_apis'])) ? $itemValue['available_session_apis'] : [];
                    ?>
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('update.available_session_apis')); ?></label>
                        <select name="value[available_session_apis][]" class="form-control select2" multiple>
                            <?php $__currentLoopData = \App\Models\Session::$sessionApis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sessionApi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sessionApi); ?>" <?php if(in_array($sessionApi, $selectedApi)): ?> selected <?php endif; ?>><?php echo e(trans('update.session_api_'.$sessionApi)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p class="text-muted font-12 mt-1"><?php echo e(trans('update.session_api_hint')); ?></p>
                    </div>
                </div>


                <div class="mb-5">
                    <h5><?php echo e(trans('update.upload_sources')); ?></h5>

                    <?php
                        $selectedSources = (!empty($itemValue) and !empty($itemValue['available_sources']) and is_array($itemValue['available_sources'])) ? $itemValue['available_sources'] : [];
                    ?>
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('public.source')); ?></label>
                        <select name="value[available_sources][]" class="form-control select2" multiple>
                            <?php $__currentLoopData = \App\Models\File::$fileSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($source); ?>" <?php if(in_array($source, $selectedSources)): ?> selected <?php endif; ?>><?php echo e(trans('update.file_source_'.$source)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p class="text-muted font-12 mt-1"><?php echo e(trans('update.upload_sources_hint')); ?></p>
                    </div>
                </div>


                <div class="mb-5">
                    <h5><?php echo e(trans('update.bunny_stream_settings')); ?> (<?php echo e(trans('update.secure_host')); ?>)</h5>

                    <?php
                        $bunnyConfs = ['library_id', 'hostname', 'access_key']; // token_authentication_key => deleted
                    ?>

                    <?php $__currentLoopData = $bunnyConfs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bunnyConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.'.$bunnyConf)); ?></label>
                            <input name="value[bunny_configs][<?php echo e($bunnyConf); ?>]" class="form-control" value="<?php echo e((!empty($itemValue) and !empty($itemValue['bunny_configs']) and !empty($itemValue['bunny_configs'][$bunnyConf])) ? $itemValue['bunny_configs'][$bunnyConf] : null); ?>">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.select_the_role_during_registration')); ?></h5>

                    <?php
                        $roleItems = [\App\Models\Role::$teacher, \App\Models\Role::$organization];
                        $selectedRoleItems = (!empty($itemValue) and !empty($itemValue['select_the_role_during_registration']) and is_array($itemValue['select_the_role_during_registration'])) ? $itemValue['select_the_role_during_registration'] : [];
                    ?>

                    <div class="form-group">
                        <label class=""><?php echo e(trans('update.select_roles')); ?></label>
                        <select name="value[select_the_role_during_registration][]" class="form-control select2" multiple>
                            <?php $__currentLoopData = $roleItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roleItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($roleItem); ?>" <?php if(in_array($roleItem, $selectedRoleItems)): ?> selected <?php endif; ?>><?php echo e(trans('update.role_'.$roleItem)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p class="text-muted font-12 mt-1"><?php echo e(trans('update.select_rules_hint')); ?></p>
                    </div>

                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.enable_waitlist')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[waitlist_status]" value="0">
                            <input type="checkbox" name="value[waitlist_status]" id="waitlist_statusSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['waitlist_status']) and $itemValue['waitlist_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="waitlist_statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.waitlist_status_hint')); ?></p>
                    </div>

                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.enable_upcoming_courses')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[upcoming_courses_status]" value="0">
                            <input type="checkbox" name="value[upcoming_courses_status]" id="upcoming_courses_statusSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['upcoming_courses_status']) and $itemValue['upcoming_courses_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="upcoming_courses_statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.upcoming_courses_status_hint')); ?></p>
                    </div>

                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.forms')); ?></h5>

                    <?php
                        $forms = \App\Models\Form::query()->where('enable',true)->get();
                        $formSections = ['user_register_form', 'instructor_register_form', 'organization_register_form', 'become_instructor_form', 'become_organization_form'];
                    ?>

                    <?php $__currentLoopData = $formSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label class=""><?php echo e(trans('update.'.$formSection)); ?></label>
                            <select name="value[<?php echo e($formSection); ?>]" class="form-control select2">
                                <option value=""><?php echo e(trans('update.select_a_form')); ?></option>
                                <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($formRow->id); ?>" <?php if((!empty($itemValue) and !empty($itemValue[$formSection]) and $itemValue[$formSection] == $formRow->id)): ?> selected <?php endif; ?>><?php echo e($formRow->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.enable_frontend_coupons')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[frontend_coupons_status]" value="0">
                            <input type="checkbox" name="value[frontend_coupons_status]" id="frontend_coupons_statusSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['frontend_coupons_status']) and $itemValue['frontend_coupons_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="frontend_coupons_statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.frontend_coupons_status_hint')); ?></p>
                    </div>


                    <div class="form-group">
                        <label class=""><?php echo e(trans('update.coupons_display_type')); ?></label>
                        <select name="value[frontend_coupons_display_type]" class="form-control select2">
                            <option value=""><?php echo e(trans('update.select_a_type')); ?></option>
                            <?php $__currentLoopData = ['before_content', 'after_content']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fcType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($fcType); ?>" <?php if((!empty($itemValue) and !empty($itemValue['frontend_coupons_display_type']) and $itemValue['frontend_coupons_display_type'] == $fcType)): ?> selected <?php endif; ?>><?php echo e(trans("update.{$fcType}")); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.course_notes')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[course_notes_status]" value="0">
                            <input type="checkbox" name="value[course_notes_status]" id="course_notes_statusSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['course_notes_status']) and $itemValue['course_notes_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="course_notes_statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.course_notes_status_hint')); ?></p>
                    </div>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[course_notes_attachment]" value="0">
                            <input type="checkbox" name="value[course_notes_attachment]" id="course_notes_attachmentSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['course_notes_attachment']) and $itemValue['course_notes_attachment']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="course_notes_attachmentSwitch"><?php echo e(trans('update.attachment')); ?></label>
                        </label>
                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.course_notes_attachment_hint')); ?></p>
                    </div>
                </div>


                <div class="mb-5">
                    <h5><?php echo e(trans('update.zoom_api_settings')); ?></h5>

                    <?php $__currentLoopData = ['client_id', 'client_secret', 'account_id']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zoomConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans("update.zoom_{$zoomConf}")); ?></label>
                            <input type="text" name="value[zoom_<?php echo e($zoomConf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["zoom_{$zoomConf}"])) ? $itemValue["zoom_{$zoomConf}"] : old("zoom_{$zoomConf}")); ?>" class="form-control "/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.bigbluebutton_api_settings')); ?></h5>

                    <?php $__currentLoopData = ['server_base_url', 'security_salt']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bbbConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans("update.bigbluebutton_{$bbbConf}")); ?></label>
                            <input type="text" name="value[bigbluebutton_<?php echo e($bbbConf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["bigbluebutton_{$bbbConf}"])) ? $itemValue["bigbluebutton_{$bbbConf}"] : old("bigbluebutton_{$bbbConf}")); ?>" class="form-control "/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>


                <div class="mb-5">
                    <h5><?php echo e(trans('update.jitsi_api_settings')); ?></h5>

                    <?php $__currentLoopData = ['jitsi_live_url']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jitsiConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans("update.{$jitsiConf}")); ?></label>
                            <input type="text" name="value[<?php echo e($jitsiConf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["{$jitsiConf}"])) ? $itemValue["{$jitsiConf}"] : old("{$jitsiConf}")); ?>" class="form-control "/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>


                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/settings/general/features.blade.php ENDPATH**/ ?>