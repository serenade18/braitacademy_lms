<div class="d-none" id="joinWebinarModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('webinars.next_session_info')); ?></h3>

    <div class="mt-25">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('webinars.session_title')); ?></label>
                    <input type="text" readonly class="js-join-session-title form-control" value=""/>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="form-group">
                    <label class="input-label">&nbsp;</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                            </span>
                        </div>
                        <input type="text" readonly value="" class="js-join-session-date form-control"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                    <textarea class="js-join-session-description form-control" readonly rows="5"></textarea>
                </div>
            </div>
        </div>
    </div>

    <h3 class="section-title after-line font-16 text-dark-blue mb-25"><?php echo e(trans('webinars.join_information')); ?></h3>

    <div class="row js-join-session-link-row">
        <div class="col-12">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('public.link')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text js-copy" data-input="link" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.copy')); ?>" data-copy-text="<?php echo e(trans('public.copy')); ?>" data-done-text="<?php echo e(trans('public.done')); ?>">
                            <i data-feather="copy" width="18" height="18" class="text-white"></i>
                        </button>
                    </div>
                    <input type="text" name="link" readonly value="" class="js-join-session-link form-control"/>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('webinars.system')); ?></label>
                <input type="text" readonly class="js-join-session-session_api form-control" value=""/>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('auth.password')); ?></label>
                <input type="text" readonly class="js-join-session-api_secret form-control" value=""/>
            </div>
        </div>
    </div>

    <div class="mt-30 d-flex align-items-center justify-content-end">
        <a href="" target="_blank" class="js-join-session-link-action btn btn-sm btn-primary"><?php echo e(trans('footer.join')); ?></a>
        <button type="button" class="btn btn-sm btn-danger ml-10 close-swl"><?php echo e(trans('public.close')); ?></button>
    </div>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/web/default/panel/webinar/join_webinar_modal.blade.php ENDPATH**/ ?>