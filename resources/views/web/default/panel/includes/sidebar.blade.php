@php
    $getPanelSidebarSettings = getPanelSidebarSettings();
@endphp

<div class="xs-panel-nav d-flex d-lg-none justify-content-between py-5 px-15">
    <div class="user-info d-flex align-items-center justify-content-between">
        <div class="user-avatar bg-gray200">
            <img src="{{ $authUser->getAvatar(100) }}" class="img-cover" alt="{{ $authUser->full_name }}">
        </div>

        <div class="user-name ml-15">
            <h3 class="font-16 font-weight-bold">{{ $authUser->full_name }}</h3>
        </div>
    </div>

    <button class="sidebar-toggler btn-transparent d-flex flex-column-reverse justify-content-center align-items-center p-5 rounded-sm sidebarNavToggle" type="button">
        <span>{{ trans('navbar.menu') }}</span>
        <i data-feather="menu" width="16" height="16"></i>
    </button>
</div>

<div class="panel-sidebar pt-50 pb-25 px-25" id="panelSidebar">
    <button class="btn-transparent panel-sidebar-close sidebarNavToggle">
        <i data-feather="x" width="24" height="24"></i>
    </button>

    <div class="user-info d-flex align-items-center flex-row flex-lg-column justify-content-lg-center">
        <a href="/panel" class="user-avatar bg-gray200">
            <img src="{{ $authUser->getAvatar(100) }}" class="img-cover" alt="{{ $authUser->full_name }}">
        </a>

        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/panel" class="user-name mt-15">
                <h3 class="font-16 font-weight-bold text-center">{{ $authUser->full_name }}</h3>
            </a>

            @if(!empty($authUser->getUserGroup()))
                <span class="create-new-user mt-10">{{ $authUser->getUserGroup()->name }}</span>
            @endif
        </div>
    </div>

    <div class="d-flex sidebar-user-stats pb-10 ml-20 pb-lg-20 mt-15 mt-lg-30">
        <div class="sidebar-user-stat-item d-flex flex-column">
            <strong class="text-center">{{ $authUser->webinars()->count() }}</strong>
            <span class="font-12">{{ trans('panel.classes') }}</span>
        </div>

        <div class="border-left mx-30"></div>

        @if($authUser->isUser())
            <div class="sidebar-user-stat-item d-flex flex-column">
                <strong class="text-center">{{ $authUser->following()->count() }}</strong>
                <span class="font-12">{{ trans('panel.following') }}</span>
            </div>
        @else
            <div class="sidebar-user-stat-item d-flex flex-column">
                <strong class="text-center">{{ $authUser->followers()->count() }}</strong>
                <span class="font-12">{{ trans('panel.followers') }}</span>
            </div>
        @endif
    </div>

    <ul id="panel-sidebar-scroll" class="sidebar-menu pt-10 @if(!empty($authUser->userGroup)) has-user-group @endif @if(empty($getPanelSidebarSettings) or empty($getPanelSidebarSettings['background'])) without-bottom-image @endif" @if((!empty($isRtl) and $isRtl)) data-simplebar-direction="rtl" @endif>

        <li class="sidenav-item {{ (request()->is('panel')) ? 'sidenav-item-active' : '' }}">
            <a href="/panel" class="d-flex align-items-center">
                <span class="sidenav-item-icon mr-10">
                    @include('web.default.panel.includes.sidebar_icons.dashboard')
                </span>
                <span class="font-14 text-dark-blue font-weight-500">{{ trans('panel.dashboard') }}</span>
            </a>
        </li>

        <li class="sidenav-item {{ (request()->is('panel/webinars') or request()->is('panel/webinars/*')) ? 'sidenav-item-active' : '' }}">
            <a class="d-flex align-items-center" data-toggle="collapse" href="#webinarCollapse" role="button" aria-expanded="false" aria-controls="webinarCollapse">
            <span class="sidenav-item-icon mr-10">
                @include('web.default.panel.includes.sidebar_icons.webinars')
            </span>
                <span class="font-14 text-dark-blue font-weight-500">{{ trans('panel.webinars') }}</span>
            </a>

            <div class="collapse {{ (request()->is('panel/certificates') or request()->is('panel/certificates/*')) ? 'show' : '' }}" id="webinarCollapse">
                <ul class="sidenav-item-collapse">

                    <li cgitlass="mt-5 {{ (request()->is('panel/webinars/purchases')) ? 'active' : '' }}">
                        <a href="/panel/webinars/purchases">{{ trans('panel.my_classes') }}</a>
                    </li>

                    <li class="mt-5 {{ (request()->is('panel/webinars/comments')) ? 'active' : '' }}">
                        <a href="/panel/webinars/comments">{{ trans('panel.my_class_comments') }}</a>
                    </li>

                    <li class="mt-5 {{ (request()->is('panel/webinars/my-comments')) ? 'active' : '' }}">
                        <a href="/panel/webinars/my-comments">{{ trans('panel.my_comments') }}</a>
                    </li>

                    <li class="mt-5 {{ (request()->is('panel/webinars/favorites')) ? 'active' : '' }}">
                        <a href="/panel/webinars/favorites">{{ trans('panel.favorites') }}</a>
                    </li>

                    @if(!empty(getFeaturesSettings('course_notes_status')))
                        <li class="mt-5 {{ (request()->is('panel/webinars/personal-notes')) ? 'active' : '' }}">
                            <a href="/panel/webinars/personal-notes">{{ trans('update.course_notes') }}</a>
                        </li>
                    @endif

                </ul>
            </div>
        </li>

        @if($authUser->isOrganization())

            @can('panel_organization_instructors')
                <li class="sidenav-item {{ (request()->is('panel/instructors') or request()->is('panel/manage/instructors*')) ? 'sidenav-item-active' : '' }}">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#instructorsCollapse" role="button" aria-expanded="false" aria-controls="instructorsCollapse">
                <span class="sidenav-item-icon mr-10">
                    @include('web.default.panel.includes.sidebar_icons.teachers')
                </span>
                        <span class="font-14 text-dark-blue font-weight-500">{{ trans('public.instructors') }}</span>
                    </a>

                    <div class="collapse {{ (request()->is('panel/instructors') or request()->is('panel/manage/instructors*')) ? 'show' : '' }}" id="instructorsCollapse">
                        <ul class="sidenav-item-collapse">
                            @can('panel_organization_instructors_create')
                                <li class="mt-5 {{ (request()->is('panel/instructors/new')) ? 'active' : '' }}">
                                    <a href="/panel/manage/instructors/new">{{ trans('public.new') }}</a>
                                </li>
                            @endcan

                            @can('panel_organization_instructors_lists')
                                <li class="mt-5 {{ (request()->is('panel/manage/instructors')) ? 'active' : '' }}">
                                    <a href="/panel/manage/instructors">{{ trans('public.list') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan

            @can('panel_organization_students')
                <li class="sidenav-item {{ (request()->is('panel/students') or request()->is('panel/manage/students*')) ? 'sidenav-item-active' : '' }}">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#studentsCollapse" role="button" aria-expanded="false" aria-controls="studentsCollapse">
                <span class="sidenav-item-icon mr-10">
                    @include('web.default.panel.includes.sidebar_icons.students')
                </span>
                        <span class="font-14 text-dark-blue font-weight-500">{{ trans('quiz.students') }}</span>
                    </a>

                    <div class="collapse {{ (request()->is('panel/students') or request()->is('panel/manage/students*')) ? 'show' : '' }}" id="studentsCollapse">
                        <ul class="sidenav-item-collapse">
                            @can('panel_organization_students_create')
                                <li class="mt-5 {{ (request()->is('panel/manage/students/new')) ? 'active' : '' }}">
                                    <a href="/panel/manage/students/new">{{ trans('public.new') }}</a>
                                </li>
                            @endcan

                            @can('panel_organization_students_lists')
                                <li class="mt-5 {{ (request()->is('panel/manage/students')) ? 'active' : '' }}">
                                    <a href="/panel/manage/students">{{ trans('public.list') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
        @endif

        <!-- Added  assignment dropdown -->

        @if(getFeaturesSettings('webinar_assignment_status'))
                <li class="sidenav-item {{ (request()->is('panel/assignments') or request()->is('panel/assignments/*')) ? 'sidenav-item-active' : '' }}">
                    <a class="d-flex align-items-center" data-toggle="collapse" href="#assignmentCollapse" role="button" aria-expanded="false" aria-controls="assignmentCollapse">
                <span class="sidenav-item-icon mr-10">
                    @include('web.default.panel.includes.sidebar_icons.assignments')
                </span>
                        <span class="font-14 text-dark-blue font-weight-500">{{ trans('update.assignments') }}</span>
                    </a>

                    <div class="collapse {{ (request()->is('panel/assignments') or request()->is('panel/assignments/*')) ? 'show' : '' }}" id="assignmentCollapse">
                        <ul class="sidenav-item-collapse">

                            
                                <li class="mt-5 {{ (request()->is('panel/assignments/my-assignments')) ? 'active' : '' }}">
                                    <a href="/panel/assignments/my-assignments">{{ trans('update.my_assignments') }}</a>
                                </li>
                           

                            @if($authUser->isOrganization() || $authUser->isTeacher())
                                    <li class="mt-5 {{ (request()->is('panel/assignments/my-courses-assignments')) ? 'active' : '' }}">
                                        <a href="/panel/assignments/my-courses-assignments">{{ trans('update.students_assignments') }}</a>
                                    </li>
                                
                            @endif
                        </ul>
                    </div>
                </li>
        @endif

        <!-- certificate dropdown -->

        <li class="sidenav-item {{ (request()->is('panel/certificates') or request()->is('panel/certificates/*')) ? 'sidenav-item-active' : '' }}">
            <a class="d-flex align-items-center" data-toggle="collapse" href="#certificatesCollapse" role="button" aria-expanded="false" aria-controls="certificatesCollapse">
            <span class="sidenav-item-icon mr-10">
                @include('web.default.panel.includes.sidebar_icons.certificate')
            </span>
                <span class="font-14 text-dark-blue font-weight-500">{{ trans('panel.certificates') }}</span>
            </a>

            <div class="collapse {{ (request()->is('panel/certificates') or request()->is('panel/certificates/*')) ? 'show' : '' }}" id="certificatesCollapse">
                <ul class="sidenav-item-collapse">

                    <li class="mt-5 {{ (request()->is('panel/certificates/webinars')) ? 'active' : '' }}">
                        <a href="/panel/certificates/webinars">{{ trans('update.course_certificates') }}</a>
                    </li>

                    <li class="mt-5">
                        <a href="/certificate_validation">{{ trans('site.certificate_validation') }}</a>
                    </li>

                </ul>
            </div>
        </li>

        <!-- support dropdown -->

        <li class="sidenav-item {{ (request()->is('panel/support') or request()->is('panel/support/*')) ? 'sidenav-item-active' : '' }}">
            <a class="d-flex align-items-center" data-toggle="collapse" href="#supportCollapse" role="button" aria-expanded="false" aria-controls="supportCollapse">
            <span class="sidenav-item-icon assign-fill mr-10">
                @include('web.default.panel.includes.sidebar_icons.support')
            </span>
                <span class="font-14 text-dark-blue font-weight-500">{{ trans('panel.support') }}</span>
            </a>

            <div class="collapse {{ (request()->is('panel/support') or request()->is('panel/support/*')) ? 'show' : '' }}" id="supportCollapse">
                <ul class="sidenav-item-collapse">

                        <li class="mt-5 {{ (request()->is('panel/support/new')) ? 'active' : '' }}">
                            <a href="/panel/support/new">{{ trans('public.new') }}</a>
                        </li>
                    
                        <li class="mt-5 {{ (request()->is('panel/support')) ? 'active' : '' }}">
                            <a href="/panel/support">{{ trans('panel.classes_support') }}</a>
                        </li>
                    
                        <li class="mt-5 {{ (request()->is('panel/support/tickets')) ? 'active' : '' }}">
                            <a href="/panel/support/tickets">{{ trans('panel.support_tickets') }}</a>
                        </li>
                    

                </ul>
            </div>
        </li>

        <!-- forums dropdown -->

        <li class="sidenav-item {{ (request()->is('panel/forums') or request()->is('panel/forums/*')) ? 'sidenav-item-active' : '' }}">
            <a class="d-flex align-items-center" data-toggle="collapse" href="#forumsCollapse" role="button" aria-expanded="false" aria-controls="forumsCollapse">
            <span class="sidenav-item-icon assign-fill mr-10">
                @include('web.default.panel.includes.sidebar_icons.forums')
            </span>
                <span class="font-14 text-dark-blue font-weight-500">{{ trans('update.forums') }}</span>
            </a>

            <div class="collapse {{ (request()->is('panel/forums') or request()->is('panel/forums/*')) ? 'show' : '' }}" id="forumsCollapse">
                <ul class="sidenav-item-collapse">

                    <li class="mt-5 {{ (request()->is('/forums/create-topic')) ? 'active' : '' }}">
                        <a href="/forums/create-topic">{{ trans('update.new_topic') }}</a>
                    </li>
                
                    <li class="mt-5 {{ (request()->is('panel/forums/topics')) ? 'active' : '' }}">
                        <a href="/panel/forums/topics">{{ trans('update.my_topics') }}</a>
                    </li>
                
                    <li class="mt-5 {{ (request()->is('panel/forums/posts')) ? 'active' : '' }}">
                        <a href="/panel/forums/posts">{{ trans('update.my_posts') }}</a>
                    </li>
                
                    <li class="mt-5 {{ (request()->is('panel/forums/bookmarks')) ? 'active' : '' }}">
                        <a href="/panel/forums/bookmarks">{{ trans('update.bookmarks') }}</a>
                    </li>
                </ul>
            </div>
        </li>

        @php
            $rewardSetting = getRewardsSettings();
        @endphp

        @if(!empty($rewardSetting) and $rewardSetting['status'] == '1')
            
                <li class="sidenav-item {{ (request()->is('panel/rewards')) ? 'sidenav-item-active' : '' }}">
                    <a href="/panel/rewards" class="d-flex align-items-center">
                <span class="sidenav-item-icon assign-strock mr-10">
                    @include('web.default.panel.includes.sidebar_icons.rewards')
                </span>
                        <span class="font-14 text-dark-blue font-weight-500">{{ trans('update.rewards') }}</span>
                    </a>
                </li>
            
        @endif

        @if($authUser->checkAccessToAIContentFeature())
            
                <li class="sidenav-item {{ (request()->is('panel/ai-contents')) ? 'sidenav-item-active' : '' }}">
                    <a href="/panel/ai-contents" class="d-flex align-items-center">
                <span class="sidenav-item-icon assign-strock mr-10">
                    @include('web.default.panel.includes.sidebar_icons.ai_contents')
                </span>
                        <span class="font-14 text-dark-blue font-weight-500">{{ trans('update.ai_contents') }}</span>
                    </a>
                </li>
            
        @endif
        
        <li class="sidenav-item {{ (request()->is('panel/notifications')) ? 'sidenav-item-active' : '' }}">
            <a href="/panel/notifications" class="d-flex align-items-center">
            <span class="sidenav-notification-icon sidenav-item-icon mr-10">
                @include('web.default.panel.includes.sidebar_icons.notifications')
            </span>
                <span class="font-14 text-dark-blue font-weight-500">{{ trans('panel.notifications') }}</span>
            </a>
        </li>
        
        <li class="sidenav-item {{ (request()->is('panel/setting')) ? 'sidenav-item-active' : '' }}">
            <a href="/panel/setting" class="d-flex align-items-center">
            <span class="sidenav-setting-icon sidenav-item-icon mr-10">
                @include('web.default.panel.includes.sidebar_icons.setting')
            </span>
                <span class="font-14 text-dark-blue font-weight-500">{{ trans('panel.settings') }}</span>
            </a>
        </li>

        
        <li class="sidenav-item">
            <a href="/logout" class="d-flex align-items-center">
            <span class="sidenav-logout-icon sidenav-item-icon mr-10">
                @include('web.default.panel.includes.sidebar_icons.logout')
            </span>
                <span class="font-14 text-dark-blue font-weight-500">{{ trans('panel.log_out') }}</span>
            </a>
        </li>
        
    </ul>

    @if(!empty($getPanelSidebarSettings) and !empty($getPanelSidebarSettings['background']))
        <div class="sidebar-create-class d-none d-md-block">
            <a href="{{ !empty($getPanelSidebarSettings['link']) ? $getPanelSidebarSettings['link'] : '' }}" class="sidebar-create-class-btn d-block text-right p-5">
                <img src="{{ !empty($getPanelSidebarSettings['background']) ? $getPanelSidebarSettings['background'] : '' }}" alt="">
            </a>
        </div>
    @endif
</div>
