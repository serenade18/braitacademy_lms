

<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/css/css-stars.css">
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="course-cover-container <?php echo e(empty($activeSpecialOffer) ? 'not-active-special-offer' : ''); ?>">
        <img src="<?php echo e($course->getImageCover()); ?>" class="img-cover course-cover-img" alt="<?php echo e($course->title); ?>"/>

        <div class="cover-content pt-40">
            <div class="container position-relative">
                <?php if(!empty($activeSpecialOffer)): ?>
                    <?php echo $__env->make('web.default.course.special_offer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php
        $percent = $course->getProgress();
    ?>

    <section class="container course-content-section <?php echo e($course->type); ?> <?php echo e(($hasBought or $percent) ? 'has-progress-bar' : ''); ?>">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="course-content-body user-select-none">
                    <div class="course-body-on-cover text-white">
                        <h1 class="font-30 course-title">
                            <?php echo e($course->title); ?>

                        </h1>

                        <?php if(!empty($course->category)): ?>
                            <span class="d-block font-16 mt-10"><?php echo e(trans('public.in')); ?> <a href="<?php echo e($course->category->getUrl()); ?>" target="_blank" class="font-weight-500 text-decoration-underline text-white"><?php echo e($course->category->title); ?></a></span>
                        <?php endif; ?>

                        <?php if($hasBought or $percent): ?>
                            <div class="mt-30 d-flex align-items-center">
                                <div class="progress course-progress flex-grow-1 shadow-xs rounded-sm">
                                    <span class="progress-bar rounded-sm bg-warning" style="width: <?php echo e($percent); ?>%"></span>
                                </div>

                                <span class="ml-15 font-14 font-weight-500">
                                    <?php if($hasBought and (!$course->isWebinar() or $course->isProgressing())): ?>
                                        <?php echo e(trans('public.course_learning_passed',['percent' => $percent])); ?>

                                    <?php elseif(!is_null($course->capacity)): ?>
                                        <?php echo e($course->getSalesCount()); ?>/<?php echo e($course->capacity); ?> <?php echo e(trans('quiz.students')); ?>

                                    <?php else: ?>
                                        <?php echo e(trans('public.course_learning_passed',['percent' => $percent])); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-35">
                        <ul class="nav nav-tabs bg-secondary rounded-sm p-15 d-flex align-items-center justify-content-between" id="tabs-tab" role="tablist">
                            <li class="nav-item">
                                <div class="position-relative font-14 text-white active" id="information-tab"
                                   data-toggle="tab" href="#information" role="tab" aria-controls="information"
                                   aria-selected="true">Certificate of Completion</div>
                            </li>
                        </ul>
                        <div class="tab-content" id="nav-tabContent">
                            <div 
                                class="tab-pane show active" 
                                id="information" role="tabpanel"
                                aria-labelledby="information-tab"
                            >
                                <div class="accordion-row rounded-sm border mt-15 p-15">
                                    <div class="d-flex align-items-center justify-content-between" role="tab" id="files_110">
                                        <div class="d-flex align-items-center" href="#collapseFiles110" aria-controls="collapseFiles110" data-parent="#chaptersAccordion" role="button" data-toggle="collapse" aria-expanded="true">
                                            <span class="d-flex align-items-center justify-content-center mr-15">
                                                <span class="chapter-icon chapter-content-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text text-gray"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                </span>
                                            </span>

                                            <span class="font-weight-bold text-secondary font-14 file-title"><?php echo e($course->title); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="collapse show">
                                        <div class="panel-collapse">
                                            <div class="text-gray text-14">
                                                
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-20">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud text-gray mr-5">
                                                            <polyline points="8 17 12 21 16 17"></polyline>
                                                            <line x1="12" y1="12" x2="12" y2="21"></line>
                                                            <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path>
                                                        </svg>
                                                        <span class="line-height-1">1 MB</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <?php if($certificate && (is_null($course->certificate_price) || $course->certificate_price == 0)): ?>
                                                        <a href="<?php echo e(url('panel/certificates/webinars/' . ($certificate->id ?? '#') . '/show')); ?>" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                                                            <?php echo e($certificate ? 'Download' : 'No certificate available'); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="course-content-sidebar col-12 col-lg-4 mt-25 mt-lg-0">
                <div class="rounded-lg shadow-sm">
                    <div class="course-img <?php echo e($course->video_demo ? 'has-video' : ''); ?>">
                        <img src="<?php echo e($course->getImage()); ?>" class="img-cover" alt="">
                    </div>

                    <div class="px-20 pb-30">
                        <form action="/cart/store" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="item_id" value="<?php echo e($certificate->id); ?>">
                            <input type="hidden" name="item_name" value="certificate_id">

                            <?php if(!empty($course->tickets)): ?>
                                <?php $__currentLoopData = $course->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check mt-20">
                                        <input class="form-check-input" <?php if(!$ticket->isValid()): ?> disabled <?php endif; ?> type="radio"
                                               data-discount-price="<?php echo e(handlePrice($ticket->getPriceWithDiscount($course->certificate_price, !empty($activeSpecialOffer) ? $activeSpecialOffer : null))); ?>"
                                               value="<?php echo e(($ticket->isValid()) ? $ticket->id : ''); ?>"
                                               name="ticket_id"
                                               id="courseOff<?php echo e($ticket->id); ?>">
                                        <label class="form-check-label d-flex flex-column cursor-pointer" for="courseOff<?php echo e($ticket->id); ?>">
                                            <span class="font-16 font-weight-500 text-dark-blue"><?php echo e($ticket->title); ?> <?php if(!empty($ticket->discount)): ?>
                                                    (<?php echo e($ticket->discount); ?>% <?php echo e(trans('public.off')); ?>)
                                                <?php endif; ?></span>
                                            <span class="font-14 text-gray"><?php echo e($ticket->getSubTitle()); ?></span>
                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <!--  use this to check if certificate can be sold -->
                            <?php
                                $canSaleCertificate = ($course->canSaleCertificate());
                            ?>

                            <?php if(isset($course->certificate_price) && $course->certificate_price > 0): ?>
                                <div id="priceBox" class="d-flex align-items-center justify-content-center mt-20 <?php echo e(!empty($activeSpecialOffer) ? ' flex-column ' : ''); ?>">
                                    <div class="text-center">
                                        <?php
                                            $realPrice = handleCoursePagePrice($course->certificate_price);
                                        ?>
                                        <span id="realPrice" data-value="<?php echo e($course->certificate_price); ?>"
                                              data-special-offer="<?php echo e(!empty($activeSpecialOffer) ? $activeSpecialOffer->percent : ''); ?>"
                                              class="d-block <?php if(!empty($activeSpecialOffer)): ?> font-16 text-gray text-decoration-line-through <?php else: ?> font-30 text-primary <?php endif; ?>">
                                            <?php echo e($realPrice['price']); ?>

                                        </span>

                                        <?php if(!empty($realPrice['tax']) and empty($activeSpecialOffer)): ?>
                                            <span class="d-block font-14 text-gray">+ <?php echo e($realPrice['tax']); ?> <?php echo e(trans('cart.tax')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php else: ?>
                            <?php if(is_null($course->certificate_price) || $course->certificate_price == 0): ?>
                                <div class="d-flex align-items-center justify-content-center mt-20">
                                    <span class="font-36 text-primary">Get Certificate</span>
                                </div>
                                <div class="mt-20 d-flex flex-column">
                                    <a href="<?php echo e(url('panel/certificates/webinars/' . $certificate->id . '/show')); ?>" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                                        Download
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php endif; ?>

                            <div class="mt-20 d-flex flex-column">
                                <?php if(!empty($course->certificate_price) and $course->certificate_price > 0): ?>
                                    <button type="button" class="btn btn-primary js-course-add-to-cart-btn"> 
                                        <?php echo e(trans('public.add_to_cart')); ?>

                                    </button>

                                    <?php if($canSaleCertificate && !empty($course->certificate_price) && $course->certificate_price > 0 ): ?>
                                        <!-- <a href="<?php echo e(route('certificate.direct-payment')); ?>" class="btn btn-outline-danger mt-20 js-course-direct-payment">
                                            Pay Now!
                                        </a> -->

                                        <button type="submit" class="btn btn-outline-danger mt-20">
                                            Pay Now!
                                        </button>
                                    <?php endif; ?>
                                <?php else: ?>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('web.default.course.share_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('web.default.course.buy_with_point_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts_bottom'); ?>

    <?php if(!empty($course->creator) and !empty($course->creator->getLiveChatJsCode()) and !empty(getFeaturesSettings('show_live_chat_widget'))): ?>
        <script>
            (function () {
                "use strict"

                <?php echo $course->creator->getLiveChatJsCode(); ?>

            })(jQuery)
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/web/default/course/cert.blade.php ENDPATH**/ ?>