<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>

<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<div class="tab-pane mt-3 fade" id="reminders" role="tabpanel" aria-labelledby="reminders-tab">

    <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/reminders" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="page" value="general">
        <input type="hidden" name="reminders" value="reminders">

        <div class="row">
            <div class="col-12 col-md-6">

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('admin/main.webinar_reminder_schedule')); ?></label>
                    <input type="number" name="value[webinar_reminder_schedule]" id="webinar_reminder_schedule" value="<?php echo e((!empty($itemValue) and !empty($itemValue['webinar_reminder_schedule'])) ? $itemValue['webinar_reminder_schedule'] : 1); ?>" class="form-control"/>
                    <p class="font-12 text-gray mt-1 mb-0"><?php echo e(trans('update.webinar_reminder_hint')); ?></p>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('update.meeting_reminder_schedule')); ?></label>
                    <input type="number" name="value[meeting_reminder_schedule]" id="meeting_reminder_schedule" value="<?php echo e((!empty($itemValue) and !empty($itemValue['meeting_reminder_schedule'])) ? $itemValue['meeting_reminder_schedule'] : 1); ?>" class="form-control"/>
                    <p class="font-12 text-gray mt-1 mb-0"><?php echo e(trans('update.meeting_reminder_hint')); ?></p>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('update.subscribe_reminder_schedule')); ?></label>
                    <input type="number" name="value[subscribe_reminder_schedule]" id="subscribe_reminder_schedule" value="<?php echo e((!empty($itemValue) and !empty($itemValue['subscribe_reminder_schedule'])) ? $itemValue['subscribe_reminder_schedule'] : 1); ?>" class="form-control"/>
                    <p class="font-12 text-gray mt-1 mb-0"><?php echo e(trans('update.subscribe_reminder_hint')); ?></p>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
    </form>

</div>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\general\reminders.blade.php ENDPATH**/ ?>