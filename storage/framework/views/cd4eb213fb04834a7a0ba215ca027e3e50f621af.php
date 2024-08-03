<?php
    $getPanelSidebarSettings = getPanelSidebarSettings();
?>

<div class="xs-panel-nav d-flex d-lg-none justify-content-between py-5 px-15">
    <div class="user-info d-flex align-items-center justify-content-between">
        <div class="user-avatar bg-gray200">
            <img src="<?php echo e($authUser->getAvatar(100)); ?>" class="img-cover" alt="<?php echo e($authUser->full_name); ?>">
        </div>

        <div class="user-name ml-15">
            <h3 class="font-16 font-weight-bold"><?php echo e($authUser->full_name); ?></h3>
        </div>
    </div>

    <button class="sidebar-toggler btn-transparent d-flex flex-column-reverse justify-content-center align-items-center p-5 rounded-sm sidebarNavToggle" type="button">
        <span><?php echo e(trans('navbar.menu')); ?></span>
        <i data-feather="menu" width="16" height="16"></i>
    </button>
</div>

<div class="panel-sidebar pt-50 pb-25 px-25" id="panelSidebar">
    <button class="btn-transparent panel-sidebar-close sidebarNavToggle">
        <i data-feather="x" width="24" height="24"></i>
    </button>

    <div class="user-info d-flex align-items-center flex-row flex-lg-column justify-content-lg-center">
        <a href="/panel" class="user-avatar bg-gray200">
            <img src="<?php echo e($authUser->getAvatar(100)); ?>" class="img-cover" alt="<?php echo e($authUser->full_name); ?>">
        </a>

        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/panel" class="user-name mt-15">
                <h3 class="font-16 font-weight-bold text-center"><?php echo e($authUser->full_name); ?></h3>
            </a>

            <?php if(!empty($authUser->getUserGroup())): ?>
                <span class="create-new-user mt-10"><?php echo e($authUser->getUserGroup()->name); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="d-flex sidebar-user-stats pb-10 ml-20 pb-lg-20 mt-15 mt-lg-30">
        <div class="sidebar-user-stat-item d-flex flex-column">
            <strong class="text-center"><?php echo e($authUser->webinars()->count()); ?></strong>
            <span class="font-12"><?php echo e(trans('panel.classes')); ?></span>
        </div>

        <div class="border-left mx-30"></div>

        <?php if($authUser->isUser()): ?>
            <div class="sidebar-user-stat-item d-flex flex-column">
                <strong class="text-center"><?php echo e($authUser->following()->count()); ?></strong>
                <span class="font-12"><?php echo e(trans('panel.following')); ?></span>
            </div>
        <?php else: ?>
            <div class="sidebar-user-stat-item d-flex flex-column">
                <strong class="text-center"><?php echo e($authUser->followers()->count()); ?></strong>
                <span class="font-12"><?php echo e(trans('panel.followers')); ?></span>
            </div>
        <?php endif; ?>
    </div>

    <ul id="panel-sidebar-scroll" class="sidebar-menu pt-10 <?php if(!empty($authUser->userGroup)): ?> has-user-group <?php endif; ?> <?php if(empty($getPanelSidebarSettings) or empty($getPanelSidebarSettings['background'])): ?> without-bottom-image <?php endif; ?>" <?php if((!empty($isRtl) and $isRtl)): ?> data-simplebar-direction="rtl" <?php endif; ?>>

        <li class="sidenav-item <?php echo e((request()->is('panel')) ? 'sidenav-item-active' : ''); ?>">
            <a href="/panel" class="d-flex align-items-center">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.dashboard')); ?></span>
            </a>
        </li>

        <?php if($authUser->isOrganization()): ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_organization_instructors')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/instructors') or request()->is('panel/manage/instructors*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#instructorsCollapse" role="button" aria-expanded="false" aria-controls="instructorsCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.teachers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('public.instructors')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/instructors') or request()->is('panel/manage/instructors*')) ? 'show' : ''); ?>" id="instructorsCollapse">
                        <ul class="sidenav-item-collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_organization_instructors_create')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/instructors/new')) ? 'active' : ''); ?>">
                                    <a href="/panel/manage/instructors/new"><?php echo e(trans('public.new')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_organization_instructors_lists')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/manage/instructors')) ? 'active' : ''); ?>">
                                    <a href="/panel/manage/instructors"><?php echo e(trans('public.list')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_organization_students')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/students') or request()->is('panel/manage/students*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#studentsCollapse" role="button" aria-expanded="false" aria-controls="studentsCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.students', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('quiz.students')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/students') or request()->is('panel/manage/students*')) ? 'show' : ''); ?>" id="studentsCollapse">
                        <ul class="sidenav-item-collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_organization_students_create')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/manage/students/new')) ? 'active' : ''); ?>">
                                    <a href="/panel/manage/students/new"><?php echo e(trans('public.new')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_organization_students_lists')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/manage/students')) ? 'active' : ''); ?>">
                                    <a href="/panel/manage/students"><?php echo e(trans('public.list')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_webinars')): ?>
            <li class="sidenav-item <?php echo e((request()->is('panel/webinars') or request()->is('panel/webinars/*')) ? 'sidenav-item-active' : ''); ?>">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#webinarCollapse" role="button" aria-expanded="false" aria-controls="webinarCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.webinars', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.webinars')); ?></span>
                </a>

                <div class="collapse <?php echo e((request()->is('panel/webinars') or request()->is('panel/webinars/*')) ? 'show' : ''); ?>" id="webinarCollapse">
                    <ul class="sidenav-item-collapse">
                        <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_webinars_create')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/webinars/new')) ? 'active' : ''); ?>">
                                    <a href="/panel/webinars/new"><?php echo e(trans('public.new')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_webinars_lists')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/webinars')) ? 'active' : ''); ?>">
                                    <a href="/panel/webinars"><?php echo e(trans('panel.my_classes')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_webinars_invited_lists')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/webinars/invitations')) ? 'active' : ''); ?>">
                                    <a href="/panel/webinars/invitations"><?php echo e(trans('panel.invited_classes')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(!empty($authUser->organ_id)): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_webinars_organization_classes')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/webinars/organization_classes')) ? 'active' : ''); ?>">
                                    <a href="/panel/webinars/organization_classes"><?php echo e(trans('panel.organization_classes')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_webinars_my_purchases')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/webinars/purchases')) ? 'active' : ''); ?>">
                                <a href="/panel/webinars/purchases"><?php echo e(trans('panel.my_purchases')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_webinars_my_class_comments')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/webinars/comments')) ? 'active' : ''); ?>">
                                    <a href="/panel/webinars/comments"><?php echo e(trans('panel.my_class_comments')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_webinars_comments')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/webinars/my-comments')) ? 'active' : ''); ?>">
                                <a href="/panel/webinars/my-comments"><?php echo e(trans('panel.my_comments')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_webinars_favorites')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/webinars/favorites')) ? 'active' : ''); ?>">
                                <a href="/panel/webinars/favorites"><?php echo e(trans('panel.favorites')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(!empty(getFeaturesSettings('course_notes_status'))): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_webinars_personal_course_notes')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/webinars/personal-notes')) ? 'active' : ''); ?>">
                                    <a href="/panel/webinars/personal-notes"><?php echo e(trans('update.course_notes')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        <?php if(!empty(getFeaturesSettings('upcoming_courses_status'))): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_upcoming_courses')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/upcoming_courses') or request()->is('panel/upcoming_courses/*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#upcomingCoursesCollapse" role="button" aria-expanded="false" aria-controls="upcomingCoursesCollapse">
                    <span class="sidenav-item-icon mr-10">
                        <i data-feather="film" class="img-cover"></i>
                    </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('update.upcoming_courses')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/upcoming_courses') or request()->is('panel/upcoming_courses/*')) ? 'show' : ''); ?>" id="upcomingCoursesCollapse">
                        <ul class="sidenav-item-collapse">
                            <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_upcoming_courses_create')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/upcoming_courses/new')) ? 'active' : ''); ?>">
                                        <a href="/panel/upcoming_courses/new"><?php echo e(trans('public.new')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_upcoming_courses_lists')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/upcoming_courses')) ? 'active' : ''); ?>">
                                        <a href="/panel/upcoming_courses"><?php echo e(trans('update.my_upcoming_courses')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_upcoming_courses_followings')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/upcoming_courses/followings')) ? 'active' : ''); ?>">
                                    <a href="/panel/upcoming_courses/followings"><?php echo e(trans('update.following_courses')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if($authUser->isOrganization() or $authUser->isTeacher()): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_bundles')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/bundles') or request()->is('panel/bundles/*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#bundlesCollapse" role="button" aria-expanded="false" aria-controls="bundlesCollapse">
                <span class="sidenav-item-icon assign-fill mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.bundles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('update.bundles')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/bundles') or request()->is('panel/bundles/*')) ? 'show' : ''); ?>" id="bundlesCollapse">
                        <ul class="sidenav-item-collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_bundles_create')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/bundles/new')) ? 'active' : ''); ?>">
                                    <a href="/panel/bundles/new"><?php echo e(trans('public.new')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_bundles_lists')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/bundles')) ? 'active' : ''); ?>">
                                    <a href="/panel/bundles"><?php echo e(trans('update.my_bundles')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(getFeaturesSettings('webinar_assignment_status')): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_assignments')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/assignments') or request()->is('panel/assignments/*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#assignmentCollapse" role="button" aria-expanded="false" aria-controls="assignmentCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.assignments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('update.assignments')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/assignments') or request()->is('panel/assignments/*')) ? 'show' : ''); ?>" id="assignmentCollapse">
                        <ul class="sidenav-item-collapse">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_assignments_lists')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/assignments/my-assignments')) ? 'active' : ''); ?>">
                                    <a href="/panel/assignments/my-assignments"><?php echo e(trans('update.my_assignments')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_assignments_my_courses_assignments')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/assignments/my-courses-assignments')) ? 'active' : ''); ?>">
                                        <a href="/panel/assignments/my-courses-assignments"><?php echo e(trans('update.students_assignments')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_meetings')): ?>
            <li class="sidenav-item <?php echo e((request()->is('panel/meetings') or request()->is('panel/meetings/*')) ? 'sidenav-item-active' : ''); ?>">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#meetingCollapse" role="button" aria-expanded="false" aria-controls="meetingCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.requests', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.meetings')); ?></span>
                </a>

                <div class="collapse <?php echo e((request()->is('panel/meetings') or request()->is('panel/meetings/*')) ? 'show' : ''); ?>" id="meetingCollapse">
                    <ul class="sidenav-item-collapse">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_meetings_my_reservation')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/meetings/reservation')) ? 'active' : ''); ?>">
                                <a href="/panel/meetings/reservation"><?php echo e(trans('public.my_reservation')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_meetings_requests')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/meetings/requests')) ? 'active' : ''); ?>">
                                    <a href="/panel/meetings/requests"><?php echo e(trans('panel.requests')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_meetings_settings')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/meetings/settings')) ? 'active' : ''); ?>">
                                    <a href="/panel/meetings/settings"><?php echo e(trans('panel.settings')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_quizzes')): ?>
            <li class="sidenav-item <?php echo e((request()->is('panel/quizzes') or request()->is('panel/quizzes/*')) ? 'sidenav-item-active' : ''); ?>">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#quizzesCollapse" role="button" aria-expanded="false" aria-controls="quizzesCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.quizzes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.quizzes')); ?></span>
                </a>

                <div class="collapse <?php echo e((request()->is('panel/quizzes') or request()->is('panel/quizzes/*')) ? 'show' : ''); ?>" id="quizzesCollapse">
                    <ul class="sidenav-item-collapse">
                        <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_quizzes_create')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/quizzes/new')) ? 'active' : ''); ?>">
                                    <a href="/panel/quizzes/new"><?php echo e(trans('quiz.new_quiz')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_quizzes_lists')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/quizzes')) ? 'active' : ''); ?>">
                                    <a href="/panel/quizzes"><?php echo e(trans('public.list')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_quizzes_results')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/quizzes/results')) ? 'active' : ''); ?>">
                                    <a href="/panel/quizzes/results"><?php echo e(trans('public.results')); ?></a>
                                </li>
                            <?php endif; ?>

                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_quizzes_my_results')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/quizzes/my-results')) ? 'active' : ''); ?>">
                                <a href="/panel/quizzes/my-results"><?php echo e(trans('public.my_results')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_quizzes_not_participated')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/quizzes/opens')) ? 'active' : ''); ?>">
                                <a href="/panel/quizzes/opens"><?php echo e(trans('public.not_participated')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </li>
        <?php endif; ?>

        <?php if(!empty(getCertificateMainSettings("status"))): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_certificates')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/certificates') or request()->is('panel/certificates/*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#certificatesCollapse" role="button" aria-expanded="false" aria-controls="certificatesCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.certificate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.certificates')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/certificates') or request()->is('panel/certificates/*')) ? 'show' : ''); ?>" id="certificatesCollapse">
                        <ul class="sidenav-item-collapse">
                            <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_certificates_lists')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/certificates')) ? 'active' : ''); ?>">
                                        <a href="/panel/certificates"><?php echo e(trans('public.list')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_certificates_achievements')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/certificates/achievements')) ? 'active' : ''); ?>">
                                    <a href="/panel/certificates/achievements"><?php echo e(trans('quiz.achievements')); ?></a>
                                </li>
                            <?php endif; ?>

                            <li class="mt-5">
                                <a href="/certificate_validation"><?php echo e(trans('site.certificate_validation')); ?></a>
                            </li>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_certificates_course_certificates')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/certificates/webinars')) ? 'active' : ''); ?>">
                                    <a href="/panel/certificates/webinars"><?php echo e(trans('update.course_certificates')); ?></a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if($authUser->checkCanAccessToStore()): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_products')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/store') or request()->is('panel/store/*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#storeCollapse" role="button" aria-expanded="false" aria-controls="storeCollapse">
                <span class="sidenav-item-icon assign-fill mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.store', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('update.store')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/store') or request()->is('panel/store/*')) ? 'show' : ''); ?>" id="storeCollapse">
                        <ul class="sidenav-item-collapse">
                            <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_products_create')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/store/products/new')) ? 'active' : ''); ?>">
                                        <a href="/panel/store/products/new"><?php echo e(trans('update.new_product')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_products_lists')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/store/products')) ? 'active' : ''); ?>">
                                        <a href="/panel/store/products"><?php echo e(trans('update.products')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php
                                    $sellerProductOrderWaitingDeliveryCount = $authUser->getWaitingDeliveryProductOrdersCount();
                                ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_products_sales')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/store/sales')) ? 'active' : ''); ?>">
                                        <a href="/panel/store/sales"><?php echo e(trans('panel.sales')); ?></a>

                                        <?php if($sellerProductOrderWaitingDeliveryCount > 0): ?>
                                            <span class="d-inline-flex align-items-center justify-content-center font-weight-500 ml-15 panel-sidebar-store-sales-circle-badge"><?php echo e($sellerProductOrderWaitingDeliveryCount); ?></span>
                                        <?php endif; ?>
                                    </li>
                                <?php endif; ?>

                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_products_purchases')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/store/purchases')) ? 'active' : ''); ?>">
                                    <a href="/panel/store/purchases"><?php echo e(trans('panel.my_purchases')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_products_comments')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/store/products/comments')) ? 'active' : ''); ?>">
                                        <a href="/panel/store/products/comments"><?php echo e(trans('update.product_comments')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_products_my_comments')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/store/products/my-comments')) ? 'active' : ''); ?>">
                                    <a href="/panel/store/products/my-comments"><?php echo e(trans('panel.my_comments')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_financial')): ?>
            <li class="sidenav-item <?php echo e((request()->is('panel/financial') or request()->is('panel/financial/*')) ? 'sidenav-item-active' : ''); ?>">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#financialCollapse" role="button" aria-expanded="false" aria-controls="financialCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.financial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.financial')); ?></span>
                </a>

                <div class="collapse <?php echo e((request()->is('panel/financial') or request()->is('panel/financial/*')) ? 'show' : ''); ?>" id="financialCollapse">
                    <ul class="sidenav-item-collapse">

                        <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_financial_sales_reports')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/financial/sales')) ? 'active' : ''); ?>">
                                    <a href="/panel/financial/sales"><?php echo e(trans('financial.sales_report')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_financial_summary')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/financial/summary')) ? 'active' : ''); ?>">
                                <a href="/panel/financial/summary"><?php echo e(trans('financial.financial_summary')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_financial_payout')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/financial/payout')) ? 'active' : ''); ?>">
                                <a href="/panel/financial/payout"><?php echo e(trans('financial.payout')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_financial_charge_account')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/financial/account')) ? 'active' : ''); ?>">
                                <a href="/panel/financial/account"><?php echo e(trans('financial.charge_account')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_financial_subscribes')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/financial/subscribes')) ? 'active' : ''); ?>">
                                <a href="/panel/financial/subscribes"><?php echo e(trans('financial.subscribes')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(($authUser->isOrganization() || $authUser->isTeacher()) and getRegistrationPackagesGeneralSettings('status')): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("panel_financial_registration_packages")): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/financial/registration-packages')) ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('panelRegistrationPackagesLists')); ?>"><?php echo e(trans('update.registration_packages')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(getInstallmentsSettings('status')): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_financial_installments')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/financial/installments*')) ? 'active' : ''); ?>">
                                    <a href="/panel/financial/installments"><?php echo e(trans('update.installments')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_support')): ?>
            <li class="sidenav-item <?php echo e((request()->is('panel/support') or request()->is('panel/support/*')) ? 'sidenav-item-active' : ''); ?>">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#supportCollapse" role="button" aria-expanded="false" aria-controls="supportCollapse">
                <span class="sidenav-item-icon assign-fill mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.support', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.support')); ?></span>
                </a>

                <div class="collapse <?php echo e((request()->is('panel/support') or request()->is('panel/support/*')) ? 'show' : ''); ?>" id="supportCollapse">
                    <ul class="sidenav-item-collapse">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_support_create')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/support/new')) ? 'active' : ''); ?>">
                                <a href="/panel/support/new"><?php echo e(trans('public.new')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_support_lists')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/support')) ? 'active' : ''); ?>">
                                <a href="/panel/support"><?php echo e(trans('panel.classes_support')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_support_tickets')): ?>
                            <li class="mt-5 <?php echo e((request()->is('panel/support/tickets')) ? 'active' : ''); ?>">
                                <a href="/panel/support/tickets"><?php echo e(trans('panel.support_tickets')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </li>
        <?php endif; ?>


        <?php if(!$authUser->isUser() or (!empty($referralSettings) and $referralSettings['status'] and $authUser->affiliate) or (!empty(getRegistrationBonusSettings('status')) and $authUser->enable_registration_bonus)): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_marketing')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/marketing') or request()->is('panel/marketing/*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#marketingCollapse" role="button" aria-expanded="false" aria-controls="marketingCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.marketing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.marketing')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/marketing') or request()->is('panel/marketing/*')) ? 'show' : ''); ?>" id="marketingCollapse">
                        <ul class="sidenav-item-collapse">
                            <?php if(!$authUser->isUser()): ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_marketing_special_offers')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/marketing/special_offers')) ? 'active' : ''); ?>">
                                        <a href="/panel/marketing/special_offers"><?php echo e(trans('panel.discounts')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_marketing_promotions')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/marketing/promotions')) ? 'active' : ''); ?>">
                                        <a href="/panel/marketing/promotions"><?php echo e(trans('panel.promotions')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty($referralSettings) and $referralSettings['status'] and $authUser->affiliate): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_marketing_affiliates')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/marketing/affiliates')) ? 'active' : ''); ?>">
                                        <a href="/panel/marketing/affiliates"><?php echo e(trans('panel.affiliates')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty(getRegistrationBonusSettings('status')) and $authUser->enable_registration_bonus): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_marketing_registration_bonus')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/marketing/registration_bonus')) ? 'active' : ''); ?>">
                                        <a href="/panel/marketing/registration_bonus"><?php echo e(trans('update.registration_bonus')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty(getFeaturesSettings('frontend_coupons_status'))): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_marketing_coupons')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/marketing/discounts')) ? 'active' : ''); ?>">
                                        <a href="/panel/marketing/discounts"><?php echo e(trans('update.coupons')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_marketing_new_coupon')): ?>
                                    <li class="mt-5 <?php echo e((request()->is('panel/marketing/discounts/new')) ? 'active' : ''); ?>">
                                        <a href="/panel/marketing/discounts/new"><?php echo e(trans('update.new_coupon')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>


        <?php if(getFeaturesSettings('forums_status')): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_forums')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/forums') or request()->is('panel/forums/*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#forumsCollapse" role="button" aria-expanded="false" aria-controls="forumsCollapse">
                <span class="sidenav-item-icon assign-fill mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.forums', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('update.forums')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/forums') or request()->is('panel/forums/*')) ? 'show' : ''); ?>" id="forumsCollapse">
                        <ul class="sidenav-item-collapse">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_forums_new_topic')): ?>
                                <li class="mt-5 <?php echo e((request()->is('/forums/create-topic')) ? 'active' : ''); ?>">
                                    <a href="/forums/create-topic"><?php echo e(trans('update.new_topic')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_forums_my_topics')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/forums/topics')) ? 'active' : ''); ?>">
                                    <a href="/panel/forums/topics"><?php echo e(trans('update.my_topics')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_forums_my_posts')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/forums/posts')) ? 'active' : ''); ?>">
                                    <a href="/panel/forums/posts"><?php echo e(trans('update.my_posts')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_forums_bookmarks')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/forums/bookmarks')) ? 'active' : ''); ?>">
                                    <a href="/panel/forums/bookmarks"><?php echo e(trans('update.bookmarks')); ?></a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>


        <?php if($authUser->isTeacher()): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_blog')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/blog') or request()->is('panel/blog/*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#blogCollapse" role="button" aria-expanded="false" aria-controls="blogCollapse">
                <span class="sidenav-item-icon assign-fill mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('update.articles')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/blog') or request()->is('panel/blog/*')) ? 'show' : ''); ?>" id="blogCollapse">
                        <ul class="sidenav-item-collapse">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_blog_new_article')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/blog/posts/new')) ? 'active' : ''); ?>">
                                    <a href="/panel/blog/posts/new"><?php echo e(trans('update.new_article')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_blog_my_articles')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/blog/posts')) ? 'active' : ''); ?>">
                                    <a href="/panel/blog/posts"><?php echo e(trans('update.my_articles')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_blog_comments')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/blog/comments')) ? 'active' : ''); ?>">
                                    <a href="/panel/blog/comments"><?php echo e(trans('panel.comments')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if($authUser->isOrganization() || $authUser->isTeacher()): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_noticeboard')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/noticeboard*') or request()->is('panel/course-noticeboard*')) ? 'sidenav-item-active' : ''); ?>">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#noticeboardCollapse" role="button" aria-expanded="false" aria-controls="noticeboardCollapse">
                <span class="sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.noticeboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>

                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.noticeboard')); ?></span>
                    </a>

                    <div class="collapse <?php echo e((request()->is('panel/noticeboard*') or request()->is('panel/course-noticeboard*')) ? 'show' : ''); ?>" id="noticeboardCollapse">
                        <ul class="sidenav-item-collapse">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_noticeboard_history')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/noticeboard')) ? 'active' : ''); ?>">
                                    <a href="/panel/noticeboard"><?php echo e(trans('public.history')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_noticeboard_create')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/noticeboard/new')) ? 'active' : ''); ?>">
                                    <a href="/panel/noticeboard/new"><?php echo e(trans('public.new')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_noticeboard_course_notices')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/course-noticeboard')) ? 'active' : ''); ?>">
                                    <a href="/panel/course-noticeboard"><?php echo e(trans('update.course_notices')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_noticeboard_course_notices_create')): ?>
                                <li class="mt-5 <?php echo e((request()->is('panel/course-noticeboard/new')) ? 'active' : ''); ?>">
                                    <a href="/panel/course-noticeboard/new"><?php echo e(trans('update.new_course_notices')); ?></a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php
            $rewardSetting = getRewardsSettings();
        ?>

        <?php if(!empty($rewardSetting) and $rewardSetting['status'] == '1'): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_rewards')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/rewards')) ? 'sidenav-item-active' : ''); ?>">
                    <a href="/panel/rewards" class="d-flex align-items-center">
                <span class="sidenav-item-icon assign-strock mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.rewards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('update.rewards')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if($authUser->checkAccessToAIContentFeature()): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_ai_contents')): ?>
                <li class="sidenav-item <?php echo e((request()->is('panel/ai-contents')) ? 'sidenav-item-active' : ''); ?>">
                    <a href="/panel/ai-contents" class="d-flex align-items-center">
                <span class="sidenav-item-icon assign-strock mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.ai_contents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('update.ai_contents')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_notifications')): ?>
            <li class="sidenav-item <?php echo e((request()->is('panel/notifications')) ? 'sidenav-item-active' : ''); ?>">
                <a href="/panel/notifications" class="d-flex align-items-center">
            <span class="sidenav-notification-icon sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.notifications')); ?></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_others_profile_setting')): ?>
            <li class="sidenav-item <?php echo e((request()->is('panel/setting')) ? 'sidenav-item-active' : ''); ?>">
                <a href="/panel/setting" class="d-flex align-items-center">
                <span class="sidenav-setting-icon sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.settings')); ?></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if($authUser->isTeacher() or $authUser->isOrganization()): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_others_profile_url')): ?>
                <li class="sidenav-item ">
                    <a href="<?php echo e($authUser->getProfileUrl()); ?>" class="d-flex align-items-center">
                <span class="sidenav-item-icon assign-strock mr-10">
                    <i data-feather="user" stroke="#1f3b64" stroke-width="1.5" width="24" height="24" class="mr-10 webinar-icon"></i>
                </span>
                        <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('public.my_profile')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_others_logout')): ?>
            <li class="sidenav-item">
                <a href="/logout" class="d-flex align-items-center">
                <span class="sidenav-logout-icon sidenav-item-icon mr-10">
                    <?php echo $__env->make('web.default.panel.includes.sidebar_icons.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </span>
                    <span class="font-14 text-dark-blue font-weight-500"><?php echo e(trans('panel.log_out')); ?></span>
                </a>
            </li>
        <?php endif; ?>

    </ul>

    <?php if(!empty($getPanelSidebarSettings) and !empty($getPanelSidebarSettings['background'])): ?>
        <div class="sidebar-create-class d-none d-md-block">
            <a href="<?php echo e(!empty($getPanelSidebarSettings['link']) ? $getPanelSidebarSettings['link'] : ''); ?>" class="sidebar-create-class-btn d-block text-right p-5">
                <img src="<?php echo e(!empty($getPanelSidebarSettings['background']) ? $getPanelSidebarSettings['background'] : ''); ?>" alt="">
            </a>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/braitaca/public_html/resources/views/web/default/panel/includes/sidebar.blade.php ENDPATH**/ ?>