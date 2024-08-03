<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/learning_page/styles.css"/>
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="learning-page">

        <?php echo $__env->make('web.default.course.learningPage.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="d-flex position-relative">
            <div class="learning-page-content flex-grow-1 bg-info-light p-15">
                <?php echo $__env->make('web.default.course.learningPage.components.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="learning-page-tabs show">
                <ul class="nav nav-tabs py-15 d-flex align-items-center justify-content-around" id="tabs-tab" role="tablist">
                    <li class="nav-item">
                        <a class="position-relative font-14 d-flex align-items-center active" id="content-tab"
                           data-toggle="tab" href="#content" role="tab" aria-controls="content"
                           aria-selected="true">
                            <i class="learning-page-tabs-icons mr-5">
                                <?php echo $__env->make('web.default.panel.includes.sidebar_icons.webinars', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </i>
                            <span class="learning-page-tabs-link-text"><?php echo e(trans('product.content')); ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="position-relative font-14 d-flex align-items-center" id="quizzes-tab" data-toggle="tab"
                           href="#quizzes" role="tab" aria-controls="quizzes"
                           aria-selected="false">
                            <i class="learning-page-tabs-icons mr-5">
                                <?php echo $__env->make('web.default.panel.includes.sidebar_icons.quizzes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </i>
                            <span class="learning-page-tabs-link-text"><?php echo e(trans('quiz.quizzes')); ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="position-relative font-14 d-flex align-items-center" id="certificates-tab" data-toggle="tab"
                           href="#certificates" role="tab" aria-controls="certificates"
                           aria-selected="false">
                            <i class="learning-page-tabs-icons mr-5">
                                <?php echo $__env->make('web.default.panel.includes.sidebar_icons.certificate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </i>
                            <span class="learning-page-tabs-link-text"><?php echo e(trans('panel.certificates')); ?></span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content h-100" id="nav-tabContent">
                    <div class="pb-20 tab-pane fade show active h-100" id="content" role="tabpanel"
                         aria-labelledby="content-tab">
                        <?php echo $__env->make('web.default.course.learningPage.components.content_tab.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="pb-20 tab-pane fade  h-100" id="quizzes" role="tabpanel"
                         aria-labelledby="quizzes-tab">
                        <?php echo $__env->make('web.default.course.learningPage.components.quiz_tab.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="pb-20 tab-pane fade  h-100" id="certificates" role="tabpanel"
                         aria-labelledby="certificates-tab">
                        <?php echo $__env->make('web.default.course.learningPage.components.certificate_tab.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/video/video.min.js"></script>
    <script src="/assets/default/vendors/video/youtube.min.js"></script>
    <script src="/assets/default/vendors/video/vimeo.js"></script>

    <script>
        var defaultItemType = '<?php echo e(!empty(request()->get('type')) ? request()->get('type') : (!empty($userLearningLastView) ? $userLearningLastView->item_type : '')); ?>'
        var defaultItemId = '<?php echo e(!empty(request()->get('item')) ? request()->get('item') : (!empty($userLearningLastView) ? $userLearningLastView->item_id : '')); ?>'
        var loadFirstContent = <?php echo e((!empty($dontAllowLoadFirstContent) and $dontAllowLoadFirstContent) ? 'false' : 'true'); ?>; // allow to load first content when request item is empty

        var appUrl = '<?php echo e(url('')); ?>';
        var courseUrl = '<?php echo e($course->getUrl()); ?>';
        var courseNotesStatus = '<?php echo e(!empty(getFeaturesSettings('course_notes_status'))); ?>';
        var courseNotesShowAttachment = '<?php echo e(!empty(getFeaturesSettings('course_notes_attachment'))); ?>';

        // lang
        var pleaseWaitForTheContentLang = '<?php echo e(trans('update.please_wait_for_the_content_to_load')); ?>';
        var downloadTheFileLang = '<?php echo e(trans('update.download_the_file')); ?>';
        var downloadLang = '<?php echo e(trans('home.download')); ?>';
        var showHtmlFileLang = '<?php echo e(trans('update.show_html_file')); ?>';
        var showLang = '<?php echo e(trans('update.show')); ?>';
        var sessionIsLiveLang = '<?php echo e(trans('update.session_is_live')); ?>';
        var youCanJoinTheLiveNowLang = '<?php echo e(trans('update.you_can_join_the_live_now')); ?>';
        var passwordLang = '<?php echo e(trans('auth.password')); ?>';
        var joinTheClassLang = '<?php echo e(trans('update.join_the_class')); ?>';
        var coursePageLang = '<?php echo e(trans('update.course_page')); ?>';
        var quizPageLang = '<?php echo e(trans('update.quiz_page')); ?>';
        var sessionIsNotStartedYetLang = '<?php echo e(trans('update.session_is_not_started_yet')); ?>';
        var thisSessionWillBeStartedOnLang = '<?php echo e(trans('update.this_session_will_be_started_on')); ?>';
        var sessionIsFinishedLang = '<?php echo e(trans('update.session_is_finished')); ?>';
        var sessionIsFinishedHintLang = '<?php echo e(trans('update.this_session_is_finished_You_cant_join_it')); ?>';
        var goToTheQuizPageForMoreInformationLang = '<?php echo e(trans('update.go_to_the_quiz_page_for_more_information')); ?>';
        var downloadCertificateLang = '<?php echo e(trans('update.download_certificate')); ?>';
        var enjoySharingYourCertificateWithOthersLang = '<?php echo e(trans('update.enjoy_sharing_your_certificate_with_others')); ?>';
        var attachmentsLang = '<?php echo e(trans('public.attachments')); ?>';
        var checkAgainLang = '<?php echo e(trans('update.check_again')); ?>';
        var learningToggleLangSuccess = '<?php echo e(trans('public.course_learning_change_status_success')); ?>';
        var learningToggleLangError = '<?php echo e(trans('public.course_learning_change_status_error')); ?>';
        var sequenceContentErrorModalTitle = '<?php echo e(trans('update.sequence_content_error_modal_title')); ?>';
        var sendAssignmentSuccessLang = '<?php echo e(trans('update.send_assignment_success')); ?>';
        var saveAssignmentRateSuccessLang = '<?php echo e(trans('update.save_assignment_grade_success')); ?>';
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var changesSavedSuccessfullyLang = '<?php echo e(trans('update.changes_saved_successfully')); ?>';
        var oopsLang = '<?php echo e(trans('update.oops')); ?>';
        var somethingWentWrongLang = '<?php echo e(trans('update.something_went_wrong')); ?>';
        var notAccessToastTitleLang = '<?php echo e(trans('public.not_access_toast_lang')); ?>';
        var notAccessToastMsgLang = '<?php echo e(trans('public.not_access_toast_msg_lang')); ?>';
        var cantStartQuizToastTitleLang = '<?php echo e(trans('public.request_failed')); ?>';
        var cantStartQuizToastMsgLang = '<?php echo e(trans('quiz.cant_start_quiz')); ?>';
        var learningPageEmptyContentTitleLang = '<?php echo e(trans('update.learning_page_empty_content_title')); ?>';
        var learningPageEmptyContentHintLang = '<?php echo e(trans('update.learning_page_empty_content_hint')); ?>';
        var expiredQuizLang = '<?php echo e(trans('update.expired_quiz')); ?>';
        var personalNoteLang = '<?php echo e(trans('update.personal_note')); ?>';
        var personalNoteHintLang = '<?php echo e(trans('update.this_note_will_be_displayed_for_you_privately')); ?>';
        var attachmentLang = '<?php echo e(trans('update.attachment')); ?>';
        var saveNoteLang = '<?php echo e(trans('update.save_note')); ?>';
        var clearNoteLang = '<?php echo e(trans('update.clear_note')); ?>';
        var personalNoteStoredSuccessfullyLang = '<?php echo e(trans('update.personal_note_stored_successfully')); ?>';
    </script>
    <script type="text/javascript" src="/assets/default/vendors/dropins/dropins.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script src="/assets/default/js/parts/video_player_helpers.min.js"></script>
    <script src="/assets/learning_page/scripts.min.js"></script>

    <?php if((!empty($isForumPage) and $isForumPage) or (!empty($isForumAnswersPage) and $isForumAnswersPage)): ?>
        <script src="/assets/learning_page/forum.min.js"></script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app',['appFooter' => false, 'appHeader' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/web/default/course/learningPage/index.blade.php ENDPATH**/ ?>