<?php if(!empty($meeting) and !empty($meeting->meetingTimes) and $meeting->meetingTimes->count() > 0): ?>
    <?php $__env->startPush('styles_top'); ?>
        <link rel="stylesheet" href="/assets/vendors/wrunner-html-range-slider-with-2-handles/css/wrunner-default-theme.css">
    <?php $__env->stopPush(); ?>

    <div class="mt-40">
        <h3 class="font-16 font-weight-bold text-dark-blue"><?php echo e(trans('site.view_available_times')); ?></h3>

        <div class="mt-35">
            <div class="row align-items-center justify-content-center">
                <input type="hidden" id="inlineCalender" class="form-control">
                <div class="inline-reservation-calender"></div>
            </div>
        </div>
    </div>

    <div class="pick-a-time d-none" id="PickTimeContainer" data-user-id="<?php echo e($user["id"]); ?>">

        <?php if(
               !empty(getFeaturesSettings("frontend_coupons_display_type")) and
               !empty($instructorDiscounts) and
               count($instructorDiscounts)
           ): ?>
            <?php $__currentLoopData = $instructorDiscounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructorDiscount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('web.default.includes.discounts.instructor_discounts_card', ['discount' => $instructorDiscount, 'instructorDiscountClassName' => "my-40"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <div class="d-flex align-items-center my-40 rounded-lg border px-10 py-5">
            <div class="appointment-timezone-icon">
                <img src="/assets/default/img/icons/timezone.svg" alt="appointment timezone">
            </div>
            <div class="ml-15">
                <div class="font-16 font-weight-bold text-dark-blue"><?php echo e(trans('update.note')); ?>:</div>
                <p class="font-14 font-weight-500 text-gray"><?php echo e(trans('update.appointment_timezone_note_hint',['timezone' => $meetingTimezone .' '. toGmtOffset($meetingTimezone)])); ?></p>
            </div>
        </div>


        
        <?php echo $__env->make('web.default.includes.cashback_alert',['itemPrice' => $meeting->amount, 'classNames' => 'mt-0 mb-40', 'itemType' => 'meeting'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="loading-img d-none text-center">
            <img src="/assets/default/img/loading.gif" width="80" height="80">
        </div>

        <form action="<?php echo e((!$meeting->disabled) ? '/meetings/reserve' : ''); ?>" method="post" id="PickTimeBody" class="d-none">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="day" id="selectedDay" value="">

            <h3 class="font-16 font-weight-bold text-dark-blue">
                <?php if($meeting->disabled): ?>
                    <?php echo e(trans('public.unavailable')); ?>

                <?php else: ?>
                    <?php echo e(trans('site.pick_a_time')); ?>

                    <?php if(!empty($meeting) and !empty($meeting->discount) and !empty($meeting->amount) and $meeting->amount > 0): ?>
                        <span class="badge badge-danger text-white font-12"><?php echo e($meeting->discount); ?>% <?php echo e(trans('public.off')); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
            </h3>

            <div class="d-flex flex-column mt-10">
                <?php if($meeting->disabled): ?>
                    <span class="font-14 text-gray"><?php echo e(trans('public.unavailable_description')); ?></span>
                <?php else: ?>
                    <span class="d-block font-14 text-gray font-weight-500">
                        <?php echo e(trans('site.instructor_hourly_charge')); ?>


                        <?php if(!empty($meeting->amount) and $meeting->amount > 0): ?>
                            <?php if(!empty($meeting->discount)): ?>
                                <span class="text-decoration-line-through"><?php echo e(handlePrice($meeting->amount, true, true, false, null, true)); ?></span>
                                <span class="text-primary"><?php echo e(handlePrice($meeting->amount - (($meeting->amount * $meeting->discount) / 100), true, true, false, null, true)); ?></span>
                            <?php else: ?>
                                <span class="text-primary"><?php echo e(handlePrice($meeting->amount, true, true, false, null, true)); ?></span>
                            <?php endif; ?>
                        <?php else: ?>
                            <span class="text-primary"><?php echo e(trans('public.free')); ?></span>
                        <?php endif; ?>
                    </span>

                    <?php if($meeting->in_person): ?>
                    <span class="d-block font-14 text-gray font-weight-500">
                        <?php echo e(trans('update.instructor_hourly_charge_in_person_amount')); ?>


                        <?php if(!empty($meeting->in_person_amount) and $meeting->in_person_amount > 0): ?>
                            <?php if(!empty($meeting->discount)): ?>
                                <span class="text-decoration-line-through"><?php echo e(handlePrice($meeting->in_person_amount, true, true, false, null, true)); ?></span>
                                <span class="text-primary"><?php echo e(handlePrice($meeting->in_person_amount - (($meeting->in_person_amount * $meeting->discount) / 100), true, true, false, null, true)); ?></span>
                            <?php else: ?>
                                <span class="text-primary"><?php echo e(handlePrice($meeting->in_person_amount, true, true, false, null, true)); ?></span>
                            <?php endif; ?>
                        <?php else: ?>
                            <span class="text-primary"><?php echo e(trans('public.free')); ?></span>
                        <?php endif; ?>
                    </span>
                  <?php endif; ?>
                  <?php if($meeting->group_meeting): ?>
                    <span class="d-block font-14 text-gray font-weight-500"><?php echo e(trans('update.instructor_conducts_group_meetings',['min' => $meeting->online_group_min_student,'max' => $meeting->online_group_max_student])); ?></span>
                  <?php endif; ?>

                <?php endif; ?>

                <span class="font-14 text-gray mt-5 selected_date font-weight-500"><?php echo e(trans('site.selected_date')); ?>: <span></span></span>
            </div>

            <?php if(!$meeting->disabled): ?>
                <div id="availableTimes" class="d-flex flex-wrap align-items-center mt-25">

                </div>

                <div class="js-time-description-card d-none mt-25 rounded-sm border p-10">

                </div>

                <div class="mt-25 d-none js-finalize-reserve">
                    <h3 class="font-16 font-weight-bold text-dark-blue"><?php echo e(trans('update.finalize_your_meeting')); ?></h3>
                    <span class="selected-date-time font-14 text-gray font-weight-500"><?php echo e(trans('update.meeting_time')); ?>: <span></span></span>

                    <div class="mt-15">
                        <span class="font-16 font-weight-500 text-dark-blue"><?php echo e(trans('update.meeting_type')); ?></span>

                        <div class="d-flex align-items-center mt-5">
                            <div class="meeting-type-reserve position-relative">
                                <input type="radio" name="meeting_type" id="meetingTypeInPerson" value="in_person">
                                <label for="meetingTypeInPerson"><?php echo e(trans('update.in_person')); ?></label>
                            </div>

                            <div class="meeting-type-reserve position-relative">
                                <input type="radio" name="meeting_type" id="meetingTypeOnline" value="online">
                                <label for="meetingTypeOnline"><?php echo e(trans('update.online')); ?></label>
                            </div>
                        </div>
                    </div>

                    <?php if($meeting->group_meeting): ?>
                        <div class="js-group-meeting-switch d-none align-items-center mt-20">
                            <label class="mb-0 mr-10 text-gray font-14 font-weight-500 cursor-pointer"
                                   for="withGroupMeetingSwitch"><?php echo e(trans('update.group_meeting')); ?></label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="with_group_meeting" class="custom-control-input"
                                       id="withGroupMeetingSwitch">
                                <label class="custom-control-label" for="withGroupMeetingSwitch"></label>
                            </div>
                        </div>

                        <div class="js-group-meeting-options d-none mt-15">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <input type="hidden" id="online_group_max_student" value="<?php echo e($meeting->online_group_max_student); ?>">
                                        <input type="hidden" id="in_person_group_max_student" value="<?php echo e($meeting->in_person_group_max_student); ?>">
                                        <label for="studentCountRange" class="form-label"><?php echo e(trans('update.participates')); ?>:</label>
                                        <div
                                            class="range"
                                            id="studentCountRange"
                                            data-minLimit="1"
                                        >
                                            <input type="hidden" name="student_count" value="1">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="js-online-group-amount d-none font-14 font-weight-500 mt-15">
                                <span class="text-gray d-block"><?php echo e(trans('update.online')); ?> <?php echo e(trans('update.group_meeting_hourly_rate_per_student',['amount' => handlePrice($meeting->online_group_amount, true, true, false, null, true)])); ?></span>
                                <span class="text-danger mt-5 d-block"><?php echo e(trans('update.group_meeting_student_count_hint',['min' => $meeting->online_group_min_student, 'max' => $meeting->online_group_max_student])); ?></span>
                                <span class="text-danger mt-5 d-block"><?php echo e(trans('update.group_meeting_max_student_count_hint',['max' => $meeting->online_group_max_student])); ?></span>
                            </div>

                            <?php if($meeting->in_person): ?>
                            <div class="js-in-person-group-amount d-none font-14 font-weight-500 mt-15">
                                <span class="text-gray d-block"><?php echo e(trans('update.in_person')); ?> <?php echo e(trans('update.group_meeting_hourly_rate_per_student',['amount' => handlePrice($meeting->in_person_group_amount, true, true, false, null, true)])); ?></span>
                                <span class="text-danger mt-5 d-block"><?php echo e(trans('update.group_meeting_student_count_hint',['min' => $meeting->in_person_group_min_student, 'max' => $meeting->in_person_group_max_student])); ?></span>
                                <span class="text-danger mt-5 d-block"><?php echo e(trans('update.group_meeting_max_student_count_hint',['max' => $meeting->in_person_group_max_student])); ?></span>
                            </div>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="js-reserve-description d-none form-group mt-30">
                    <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                    <textarea name="description" class="form-control" rows="5" placeholder="<?php echo e(trans('update.reserve_time_description_placeholder')); ?>"></textarea>
                </div>

                <div class="js-reserve-btn d-none align-items-center justify-content-end mt-30">
                    <button type="button" class="js-submit-form btn btn-primary"><?php echo e(trans('meeting.reserve_appointment')); ?></button>
                </div>
            <?php endif; ?>
        </form>
    </div>

    <?php $__env->startPush('scripts_bottom'); ?>
        <script src="/assets/vendors/wrunner-html-range-slider-with-2-handles/js/wrunner-jquery.js"></script>
    <?php $__env->stopPush(); ?>
<?php else: ?>

    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
       'file_name' => 'meet.png',
       'title' => trans('site.instructor_not_available'),
       'hint' => '',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/web/default/user/profile_tabs/appointments.blade.php ENDPATH**/ ?>