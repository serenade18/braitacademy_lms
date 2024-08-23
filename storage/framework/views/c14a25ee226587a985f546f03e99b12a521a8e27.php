<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('update.points_statistics')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/trophy_cup.png" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($availablePoints); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.available_points')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/rank.png" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($totalPoints); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.total_points')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/spent.png" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($spentPoints); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.spent_points')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row mt-20">
        <div class="col-12 col-lg-6">
            <div class="rounded-sm bg-white shadow-lg px-15 px-lg-25 py-15 py-lg-35">
                <div class="row">
                    <div class="col-12 col-lg-5 d-flex align-items-center justify-content-center">
                        <div class="reward-gift-img">
                            <img src="/assets/default/img/rewards/gift_icon.svg" class="img-fluid" alt="gift">
                        </div>
                    </div>

                    <div class="col-12 col-lg-7 mt-20 mt-lg-0 text-center">
                        <h3 class="font-16 font-weight-bold text-dark-blue"><?php echo e(trans('update.exchange_or_get_a_course')); ?></h3>
                        <?php if(!empty($rewardsSettings) and !empty($rewardsSettings['exchangeable']) and $rewardsSettings['exchangeable'] == '1'): ?>
                            <p class="mt-15 text-gray font-16 font-weight-500"><?php echo e(trans('update.exchange_or_get_a_course_by_spending_points_hint')); ?></p>

                            <span class="font-30 font-weight-bold mt-15 text-primary d-block"><?php echo e(handlePrice($earnByExchange)); ?></span>

                            <p class="mt-15 text-gray font-16 font-weight-500"><?php echo e(trans('update.for_your_available_points')); ?></p>
                        <?php else: ?>
                            <p class="mt-15 text-gray font-16 font-weight-500"><?php echo e(trans('update.just_get_a_course_by_spending_points_hint')); ?></p>
                        <?php endif; ?>

                        <div class="d-flex align-items-center justify-content-center w-100 mt-25">
                            <?php if(!empty($rewardsSettings) and !empty($rewardsSettings['exchangeable']) and $rewardsSettings['exchangeable'] == '1'): ?>
                                <button type="button" class="btn btn-sm mr-15 <?php echo e($earnByExchange > 0 ? 'js-exchange-btn  btn-primary' : 'bg-gray300 text-gray disabled'); ?>" <?php echo e($earnByExchange > 0 ? '' : 'disabled'); ?>><?php echo e(trans('update.exchange')); ?></button>
                            <?php endif; ?>

                            <a href="/reward-courses" class="btn btn-sm btn-outline-primary"><?php echo e(trans('update.browse_courses')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="d-flex align-items-center justify-content-between rounded-sm bg-white p-15 shadow-lg">
                <div class="d-flex align-items-center ">
                    <img src="/assets/default/img/rewards/medal.png" width="51" height="51" alt="medal">

                    <div class="ml-15">
                        <h3 class="font-16 font-weight-bold text-dark-blue"><?php echo e(trans('update.want_more_points')); ?></h3>
                        <p class="mt-5 text-gray font-12 font-weight-500"><?php echo e(trans('update.want_more_points_hint')); ?></p>
                    </div>
                </div>

                <div class="flex-grow-1 ml-15 text-right">
                    <a href="<?php echo e((!empty($rewardsSettings) and !empty($rewardsSettings['want_more_points_link'])) ? $rewardsSettings['want_more_points_link'] : ''); ?>" class="btn btn-sm btn-border-white"><?php echo e(trans('update.view_more')); ?></a>
                </div>
            </div>

            <?php if(!empty($mostPointsUsers) and count($mostPointsUsers)): ?>
                <div class="rounded-sm bg-white p-15 shadow-lg mt-20">
                    <div class="row">
                        <?php
                            $leaderboard = $mostPointsUsers->shift();
                        ?>
                        <div class="col-12 col-lg-5">
                            <h3 class="text-dark-blue font-16 font-weight-bold"><?php echo e(trans('update.leaderboard')); ?></h3>

                            <div class="d-flex align-items-center justify-content-center flex-column mt-20">
                                <div class="leaderboard-avatar">
                                    <img src="<?php echo e($leaderboard->user->getAvatar()); ?>" class="img-cover rounded-circle" alt="<?php echo e($leaderboard->user->full_name); ?>">
                                </div>

                                <span class="font-14 font-weight-bold text-secondary mt-10 d-block"><?php echo e($leaderboard->user->full_name); ?></span>
                                <span class="mt-5 text-gray font-12 font-weight-500"><?php echo e($leaderboard->total_points); ?> <?php echo e(trans('update.points')); ?></span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-7 mt-20 mt-lg-0">
                            <?php $__currentLoopData = $mostPointsUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mostPoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="rounded-sm border p-10 d-flex align-items-center <?php echo e(($loop->iteration > 1) ? 'mt-10' : ''); ?>">
                                    <div class="leaderboard-others-avatar">
                                        <img src="<?php echo e($mostPoint->user->getAvatar()); ?>" class="img-cover rounded-circle" alt="<?php echo e($mostPoint->user->full_name); ?>">
                                    </div>

                                    <div class="flex-grow-1 ml-15">
                                        <span class="font-14 font-weight-bold text-secondary d-block"><?php echo e($mostPoint->user->full_name); ?></span>
                                        <span class="text-gray font-12 font-weight-500"><?php echo e($mostPoint->total_points); ?> <?php echo e(trans('update.points')); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <section class="mt-35">
        <h2 class="section-title"><?php echo e(trans('update.points_statistics')); ?></h2>

        <?php if(!empty($rewards)): ?>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table text-center custom-table">
                                <thead>
                                <tr>
                                    <th class="text-left"><?php echo e(trans('public.title')); ?></th>
                                    <th class="text-center"><?php echo e(trans('update.points')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.type')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.date_time')); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $rewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left"><?php echo e(trans('update.reward_type_'.$reward->type)); ?></td>
                                        <td class="text-center align-middle"><?php echo e($reward->score); ?></td>
                                        <td class="text-center align-middle">
                                            <?php if($reward->status == \App\Models\RewardAccounting::ADDICTION): ?>
                                                <span class="text-primary"><?php echo e(trans('update.add')); ?></span>
                                            <?php else: ?>
                                                <span class="text-danger"><?php echo e(trans('update.minus')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center align-middle"><?php echo e(dateTimeFormat($reward->created_at, 'j F Y H:i')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-30">
                <?php echo e($rewards->links('vendor.pagination.panel')); ?>

            </div>
        <?php else: ?>

            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                'file_name' => 'quiz.png',
                'title' => trans('update.reward_no_result'),
                'hint' => nl2br(trans('update.reward_no_result_hint')),
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>
    </section>

    <?php if(!empty($rewardsSettings) and !empty($rewardsSettings['exchangeable']) and $rewardsSettings['exchangeable'] == '1'): ?>
        <?php echo $__env->make('web.default.panel.rewards.exchange_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var exchangeSuccessAlertTitleLang = '<?php echo e(trans('update.exchange_success_alert_title')); ?>';
        var exchangeSuccessAlertDescLang = '<?php echo e(trans('update.exchange_success_alert_desc')); ?>';
        var exchangeErrorAlertTitleLang = '<?php echo e(trans('update.exchange_error_alert_title')); ?>';
        var exchangeErrorAlertDescLang = '<?php echo e(trans('update.exchange_error_alert_desc')); ?>';
    </script>
    <script src="/assets/default/js/panel/reward.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\rewards\index.blade.php ENDPATH**/ ?>