<div class="d-none" id="joinMeetingLinkModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('panel.join_live_meeting')); ?></h3>

    <div class="row">
        <div class="col-12 col-md-8">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('panel.url')); ?></label>
                <input type="text" readonly name="link" class="form-control"/>
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('auth.password')); ?> (<?php echo e(trans('public.optional')); ?>)</label>
                <input type="text" readonly name="password" class="form-control"/>
                <div class="invalid-feedback"></div>
            </div>
        </div>
    </div>
    <p class="font-weight-500 text-gray"><?php echo e(trans('panel.add_live_meeting_link_hint')); ?></p>

    <div class="mt-30 d-flex align-items-center justify-content-end">
        <a href="" target="_blank" class="js-join-meeting-link btn btn-sm btn-primary"><?php echo e(trans('footer.join')); ?></a>
        <button type="button" class="btn btn-sm btn-danger ml-10 close-swl"><?php echo e(trans('public.close')); ?></button>
    </div>
</div>
<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/panel/meeting/join_modal.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\meeting\join_modal.blade.php ENDPATH**/ ?>