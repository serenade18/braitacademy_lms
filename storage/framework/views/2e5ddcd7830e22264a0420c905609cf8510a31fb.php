<li data-id="<?php echo e(!empty($ticket) ? $ticket->id :''); ?>" class="accordion-row bg-white rounded-sm panel-shadow mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="ticket_<?php echo e(!empty($ticket) ? $ticket->id :'record'); ?>">
        <div class="font-weight-bold text-dark-blue" href="#collapseTicket<?php echo e(!empty($ticket) ? $ticket->id :'record'); ?>" aria-controls="collapseTicket<?php echo e(!empty($ticket) ? $ticket->id :'record'); ?>" data-parent="#ticketsAccordion" role="button" data-toggle="collapse" aria-expanded="true">
            <span><?php echo e(!empty($ticket) ? $ticket->title : trans('public.add_new_ticket')); ?></span>
        </div>

        <div class="d-flex align-items-center">
            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

            <?php if(!empty($ticket)): ?>
                <div class="btn-group dropdown table-actions mr-15 font-weight-normal">
                    <button type="button" class="btn-transparent dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical" height="20"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a href="/panel/tickets/<?php echo e($ticket->id); ?>/delete" class="delete-action btn btn-sm btn-transparent"><?php echo e(trans('public.delete')); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseTicket<?php echo e(!empty($ticket) ? $ticket->id :'record'); ?>" aria-controls="collapseTicket<?php echo e(!empty($ticket) ? $ticket->id :'record'); ?>" data-parent="#ticketsAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseTicket<?php echo e(!empty($ticket) ? $ticket->id :'record'); ?>" aria-labelledby="ticket_<?php echo e(!empty($ticket) ? $ticket->id :'record'); ?>" class=" collapse <?php if(empty($ticket)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="js-content-form ticket-form" data-action="/panel/tickets/<?php echo e(!empty($ticket) ? $ticket->id . '/update' : 'store'); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($ticket) ? $ticket->id : 'new'); ?>][webinar_id]" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

                <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                <select name="ajax[<?php echo e(!empty($ticket) ? $ticket->id : 'new'); ?>][locale]"
                                        class="form-control <?php echo e(!empty($ticket) ? 'js-webinar-content-locale' : ''); ?>"
                                        data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>"
                                        data-id="<?php echo e(!empty($ticket) ? $ticket->id : ''); ?>"
                                        data-relation="tickets"
                                        data-fields="title"
                                >
                                    <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang); ?>" <?php echo e((!empty($ticket) and !empty($ticket->locale)) ? (mb_strtolower($ticket->locale) == mb_strtolower($lang) ? 'selected' : '') : ($locale == $lang ? 'selected' : '')); ?>><?php echo e($language); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="ajax[<?php echo e(!empty($ticket) ? $ticket->id : 'new'); ?>][locale]" value="<?php echo e($defaultLocale); ?>">
                <?php endif; ?>


                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($ticket) ? $ticket->id : 'new'); ?>][title]" class="js-ajax-title form-control" value="<?php echo e(!empty($ticket) ? $ticket->title :''); ?>" placeholder="<?php echo e(trans('forms.maximum_64_characters')); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.discount')); ?> <span class="braces">(%)</span></label>
                            <input type="text" name="ajax[<?php echo e(!empty($ticket) ? $ticket->id : 'new'); ?>][discount]" class="js-ajax-discount form-control" value="<?php echo e(!empty($ticket) ? $ticket->discount :''); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label d-block"><?php echo e(trans('public.capacity')); ?></label>
                            <?php if(empty($ticket) and !empty($webinar->capacity) and !empty($sumTicketsCapacities)): ?>
                                <span class="test-gray font-12 d-block"><?php echo e(trans('panel.remaining')); ?>: <span class="js-ticket-remaining-capacity"><?php echo e($webinar->capacity - $sumTicketsCapacities); ?></span></span>
                            <?php endif; ?>

                            <input type="text" name="ajax[<?php echo e(!empty($ticket) ? $ticket->id : 'new'); ?>][capacity]" class="js-ajax-capacity form-control mt-10" value="<?php echo e(!empty($ticket) ? $ticket->capacity :''); ?>" placeholder="<?php echo e($webinar->isWebinar() ? trans('webinars.empty_means_webinar_capacity') : trans('forms.empty_means_unlimited')); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('public.start_date')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="dateRangeLabel">
                                                <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="ajax[<?php echo e(!empty($ticket) ? $ticket->id : 'new'); ?>][start_date]" class="js-ajax-start_date form-control datepicker" value="<?php echo e(!empty($ticket) ? dateTimeFormat($ticket->start_date, 'Y-m-d', false) :''); ?>" aria-describedby="dateRangeLabel"/>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mt-15 mt-lg-0">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('webinars.end_date')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="dateRangeLabel">
                                                <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="ajax[<?php echo e(!empty($ticket) ? $ticket->id : 'new'); ?>][end_date]" class="js-ajax-end_date form-control datepicker" value="<?php echo e(!empty($ticket) ? dateTimeFormat($ticket->end_date, 'Y-m-d', false) :''); ?>" aria-describedby="dateRangeLabel"/>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" class="js-save-ticket btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                    <?php if(empty($ticket)): ?>
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\webinar\create_includes\accordions\ticket.blade.php ENDPATH**/ ?>