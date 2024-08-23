<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/css/css-stars.css">
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <section class="course-cover-container bg-gray200">
        <img src="<?php echo e($upcomingCourse->getImageCover()); ?>" class="img-cover course-cover-img" alt="<?php echo e($upcomingCourse->title); ?>"/>
    </section>

    <section class="container course-content-section">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="course-content-body user-select-none">
                    <div class="upcoming-course-body-on-cover d-flex flex-column text-white pb-15">
                        <h1 class="font-30">
                            <?php echo e(clean($upcomingCourse->title, 't')); ?>

                        </h1>


                        <?php if(!empty($upcomingCourse->category)): ?>
                            <span class="d-block font-16 mt-10"><?php echo e(trans('public.in')); ?> <a href="<?php echo e($upcomingCourse->category->getUrl()); ?>" target="_blank" class="font-weight-500 text-decoration-underline text-white"><?php echo e($upcomingCourse->category->title); ?></a></span>
                        <?php endif; ?>

                        <div class="mt-15">
                            <span class="font-14"><?php echo e(trans('public.created_by')); ?></span>
                            <a href="<?php echo e($upcomingCourse->teacher->getProfileUrl()); ?>" target="_blank" class="text-decoration-underline text-white font-14 font-weight-500"><?php echo e($upcomingCourse->teacher->full_name); ?></a>
                        </div>

                        <div class="mt-auto">
                            <?php if(!empty($followingUsers) and count($followingUsers)): ?>
                                <div class="d-flex align-items-center mt-40">
                                    <div class="d-flex align-items-center overlay-avatars">
                                        <?php $__currentLoopData = $followingUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $followingUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="overlay-avatars__item size-40 rounded-circle">
                                                <img src="<?php echo e($followingUser->user->getAvatar(40)); ?>" alt="<?php echo e($followingUser->full_name); ?>" class="img-cover rounded-circle">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($followingUsersCount - $followingUsers->count() > 0): ?>
                                            <div class="overlay-avatars__count size-40 rounded-circle d-flex align-items-center justify-content-center font-14 text-gray">
                                                +<?php echo e($followingUsersCount - $followingUsers->count()); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="ml-5">
                                        <span class="d-block font-14 font-weight-bold text-white"><?php echo e($followingUsersCount); ?> <?php echo e(trans('panel.users')); ?></span>
                                        <span class="d-block font-12 text-white"><?php echo e(trans('update.are_following_this_upcoming_course')); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mt-20">
                        <?php echo $__env->make('web.default.upcoming_courses.tabs.information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

            <div class="course-content-sidebar col-12 col-lg-4 mt-25 mt-lg-0">
                <div class="rounded-lg shadow-sm">
                    <div class="course-img <?php echo e($upcomingCourse->video_demo ? 'has-video' :''); ?>">

                        <img src="<?php echo e($upcomingCourse->getImage()); ?>" class="img-cover" alt="">

                        <?php if($upcomingCourse->video_demo): ?>
                            <div id="webinarDemoVideoBtn"
                                 data-video-path="<?php echo e($upcomingCourse->video_demo_source == 'upload' ?  url($upcomingCourse->video_demo) : $upcomingCourse->video_demo); ?>"
                                 data-video-source="<?php echo e($upcomingCourse->video_demo_source); ?>"
                                 class="course-video-icon cursor-pointer d-flex align-items-center justify-content-center">
                                <i data-feather="play" width="25" height="25"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="px-20 pb-30">

                        <?php if(!empty($upcomingCourse->webinar_id)): ?>
                            <a href="<?php echo e($upcomingCourse->webinar->getUrl()); ?>" class="btn btn-primary btn-block mt-20"><?php echo e(trans('update.view_course')); ?></a>
                        <?php else: ?>
                            <?php if(!empty($authUser)): ?>
                                <button type="button" class="js-follow-upcoming-course btn btn-primary btn-block mt-20" data-path="/upcoming_courses/<?php echo e($upcomingCourse->slug); ?>/toggleFollow">
                                    <?php echo e($followed ? trans('update.unfollow_course') : trans('update.follow_course')); ?>

                                </button>
                            <?php else: ?>
                                <a href="/login" class="btn btn-primary btn-block mt-20"><?php echo e(trans('update.follow_course')); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="mt-20 d-flex align-items-center justify-content-center text-gray">
                            <i data-feather="bell" width="20" height="20"></i>
                            <span class="ml-5 font-14"><?php echo e(trans('update.youll_get_notified_about_course_publish')); ?></span>
                        </div>

                        <div class="mt-35">
                            <strong class="d-block text-secondary font-weight-bold"><?php echo e(trans('update.this_course_includes')); ?>:</strong>

                            <?php if($upcomingCourse->downloadable): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="download-cloud" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.downloadable_content')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($upcomingCourse->certificate): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="award" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.official_certificate')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($upcomingCourse->include_quizzes): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="file-text" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('quiz.quizzes')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($upcomingCourse->support): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="headphones" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.instructor_support')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($upcomingCourse->forum): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="headphones" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('update.course_forum')); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mt-40 p-10 rounded-sm border row align-items-center favorites-share-box">
                            <?php if(!empty($upcomingCourse->publish_date)): ?>
                                <div class="col">
                                    <a href="<?php echo e($upcomingCourse->addToCalendarLink()); ?>" target="_blank" class="d-flex flex-column align-items-center text-center text-gray">
                                        <i data-feather="calendar" width="20" height="20"></i>
                                        <span class="font-12"><?php echo e(trans('public.reminder')); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="col">
                                <a href="/upcoming_courses/<?php echo e($upcomingCourse->slug); ?>/favorite" id="favoriteToggle" class="d-flex flex-column align-items-center text-gray">
                                    <i data-feather="heart" class="<?php echo e(!empty($isFavorite) ? 'favorite-active' : ''); ?>" width="20" height="20"></i>
                                    <span class="font-12"><?php echo e(trans('panel.favorite')); ?></span>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" class="js-share-course d-flex flex-column align-items-center text-gray">
                                    <i data-feather="share-2" width="20" height="20"></i>
                                    <span class="font-12"><?php echo e(trans('public.share')); ?></span>
                                </a>
                            </div>
                        </div>

                        <div class="mt-30 text-center">
                            <button type="button" id="webinarReportBtn" class="font-14 text-gray btn-transparent"><?php echo e(trans('update.report_this_course')); ?></button>
                        </div>
                    </div>
                </div>

                <?php if($upcomingCourse->teacher->offline): ?>
                    <div class="rounded-lg shadow-sm mt-35 d-flex">
                        <div class="offline-icon offline-icon-left d-flex align-items-stretch">
                            <div class="d-flex align-items-center">
                                <img src="/assets/default/img/profile/time-icon.png" alt="offline">
                            </div>
                        </div>

                        <div class="p-15">
                            <h3 class="font-16 text-dark-blue"><?php echo e(trans('public.instructor_is_not_available')); ?></h3>
                            <p class="font-14 font-weight-500 text-gray mt-15"><?php echo e($upcomingCourse->teacher->offline_message); ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="rounded-lg shadow-sm mt-35 px-25 py-20">
                    <h3 class="sidebar-title font-16 text-secondary font-weight-bold"><?php echo e(trans('update.course_specifications')); ?></h3>

                    <div class="mt-30">
                        <?php if(!empty($upcomingCourse->publish_date)): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="calendar" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('update.publish_date')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e(dateTimeFormat($upcomingCourse->publish_date, 'j M Y | H:i')); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($upcomingCourse->duration)): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="clock" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.duration')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e(convertMinutesToHourAndMinute($upcomingCourse->duration)); ?> <?php echo e(trans('home.hours')); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($upcomingCourse->sections)): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="layers" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('update.sections')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($upcomingCourse->sections); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($upcomingCourse->parts)): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="film" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.parts')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($upcomingCourse->parts); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($upcomingCourse->capacity)): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="users" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.capacity')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($upcomingCourse->capacity); ?></span>
                            </div>
                        <?php endif; ?>


                        <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                            <div class="d-flex align-items-center">
                                <i data-feather="tag" width="20" height="20"></i>
                                <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.price')); ?>:</span>
                            </div>
                            <span class="font-14"><?php echo e((!empty($upcomingCourse->price) and $upcomingCourse->price > 0) ? handlePrice($upcomingCourse->price) : trans('public.free')); ?></span>
                        </div>

                        <?php if(!empty($upcomingCourse->course_progress)): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="trending-up" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('update.progress')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($upcomingCourse->course_progress); ?>%</span>
                            </div>

                            <div class="progress upcoming-course-progress mt-15">
                                <span class="progress-bar <?php echo e(($upcomingCourse->course_progress < 50) ? 'less-50' : ''); ?>" style="width: <?php echo e($upcomingCourse->course_progress); ?>%"></span>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                
                <?php if($upcomingCourse->creator_id != $upcomingCourse->teacher_id): ?>
                    <?php echo $__env->make('web.default.course.sidebar_instructor_profile', ['courseTeacher' => $upcomingCourse->creator], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                
                <?php echo $__env->make('web.default.course.sidebar_instructor_profile', ['courseTeacher' => $upcomingCourse->teacher], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                

                
                <?php if($upcomingCourse->tags->count() > 0): ?>
                    <div class="rounded-lg tags-card shadow-sm mt-35 px-25 py-20">
                        <h3 class="sidebar-title font-16 text-secondary font-weight-bold"><?php echo e(trans('public.tags')); ?></h3>

                        <div class="d-flex flex-wrap mt-10">
                            <?php $__currentLoopData = $upcomingCourse->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="/tags/upcoming-courses/<?php echo e(urlencode($tag->title)); ?>" class="tag-item bg-gray200 p-5 font-14 text-gray font-weight-500 rounded"><?php echo e($tag->title); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                
                <?php if(!empty($advertisingBannersSidebar) and count($advertisingBannersSidebar)): ?>
                    <div class="row">
                        <?php $__currentLoopData = $advertisingBannersSidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebarBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-lg sidebar-ads mt-35 col-<?php echo e($sidebarBanner->size); ?>">
                                <a href="<?php echo e($sidebarBanner->link); ?>">
                                    <img src="<?php echo e($sidebarBanner->image); ?>" class="img-cover rounded-lg" alt="<?php echo e($sidebarBanner->title); ?>">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>

        
        <?php if(!empty($advertisingBanners) and count($advertisingBanners)): ?>
            <div class="mt-30 mt-md-50">
                <div class="row">
                    <?php $__currentLoopData = $advertisingBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-<?php echo e($banner->size); ?>">
                            <a href="<?php echo e($banner->link); ?>">
                                <img src="<?php echo e($banner->image); ?>" class="img-cover rounded-sm" alt="<?php echo e($banner->title); ?>">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        
    </section>

    <div id="webinarReportModal" class="d-none">
        <h3 class="section-title after-line font-20 text-dark-blue"><?php echo e(trans('product.report_the_course')); ?></h3>

        <form action="/upcoming_courses/<?php echo e($upcomingCourse->id); ?>/report" method="post" class="mt-25">

            <div class="form-group">
                <label class="text-dark-blue font-14"><?php echo e(trans('product.reason')); ?></label>
                <select id="reason" name="reason" class="form-control">
                    <option value="" selected disabled><?php echo e(trans('product.select_reason')); ?></option>

                    <?php $__currentLoopData = getReportReasons(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($reason); ?>"><?php echo e($reason); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label class="text-dark-blue font-14" for="message_to_reviewer"><?php echo e(trans('public.message_to_reviewer')); ?></label>
                <textarea name="message" id="message_to_reviewer" class="form-control" rows="10"></textarea>
                <div class="invalid-feedback"></div>
            </div>
            <p class="text-gray font-16"><?php echo e(trans('product.report_modal_hint')); ?></p>

            <div class="mt-30 d-flex align-items-center justify-content-end">
                <button type="button" class="js-course-report-submit btn btn-sm btn-primary"><?php echo e(trans('panel.report')); ?></button>
                <button type="button" class="btn btn-sm btn-danger ml-10 close-swl"><?php echo e(trans('public.close')); ?></button>
            </div>
        </form>
    </div>

    <?php echo $__env->make('web.default.course.share_modal',['course' => $upcomingCourse], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/video/video.min.js"></script>
    <script src="/assets/default/vendors/video/youtube.min.js"></script>
    <script src="/assets/default/vendors/video/vimeo.js"></script>

    <script>
        var webinarDemoLang = '<?php echo e(trans('webinars.webinar_demo')); ?>';
        var replyLang = '<?php echo e(trans('panel.reply')); ?>';
        var closeLang = '<?php echo e(trans('public.close')); ?>';
        var saveLang = '<?php echo e(trans('public.save')); ?>';
        var reportLang = '<?php echo e(trans('panel.report')); ?>';
        var reportSuccessLang = '<?php echo e(trans('panel.report_success')); ?>';
        var reportFailLang = '<?php echo e(trans('panel.report_fail')); ?>';
        var messageToReviewerLang = '<?php echo e(trans('public.message_to_reviewer')); ?>';
        var copyLang = '<?php echo e(trans('public.copy')); ?>';
        var copiedLang = '<?php echo e(trans('public.copied')); ?>';
    </script>

    <script src="/assets/default/js/parts/comment.min.js"></script>
    <script src="/assets/default/js/parts/video_player_helpers.min.js"></script>
    <script src="/assets/default/js/parts/upcoming_course_show.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\upcoming_courses\show.blade.php ENDPATH**/ ?>