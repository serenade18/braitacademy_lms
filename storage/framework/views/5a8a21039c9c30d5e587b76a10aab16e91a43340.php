<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group mt-30 d-flex align-items-center justify-content-between mb-5">
            <label class="cursor-pointer input-label" for="subscribeSwitch"><?php echo e(trans('update.include_subscribe')); ?></label>
            <div class="custom-control custom-switch">
                <input type="checkbox" name="subscribe" class="custom-control-input" id="subscribeSwitch" <?php echo e(!empty($bundle) && $bundle->subscribe ? 'checked' : (old('subscribe') ? 'checked' : '')); ?>>
                <label class="custom-control-label" for="subscribeSwitch"></label>
            </div>
        </div>

        <div>
            <p class="font-12 text-gray">- <?php echo e(trans('forms.subscribe_hint')); ?></p>
        </div>

        <div class="form-group mt-15">
            <label class="input-label"><?php echo e(trans('update.access_days')); ?> (<?php echo e(trans('public.optional')); ?>)</label>
            <input type="number" name="access_days" value="<?php echo e(!empty($bundle) ? $bundle->access_days : old('access_days')); ?>" class="form-control <?php $__errorArgs = ['access_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
            <?php $__errorArgs = ['access_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <p class="font-12 text-gray mt-10">- <?php echo e(trans('update.access_days_input_hint')); ?></p>
        </div>

        <div class="form-group mt-15">
            <label class="input-label"><?php echo e(trans('public.price')); ?> (<?php echo e($currency); ?>)</label>
            <input type="number" name="price" value="<?php echo e((!empty($bundle) and !empty($bundle->price)) ? convertPriceToUserCurrency($bundle->price) : old('price')); ?>" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('public.0_for_free')); ?>"/>
            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
</div>

<section class="mt-30">
    <div class="">
        <h2 class="section-title after-line"><?php echo e(trans('webinars.sale_plans')); ?> (<?php echo e(trans('public.optional')); ?>)</h2>


        <div class="mt-15">
            <p class="font-12 text-gray">- <?php echo e(trans('webinars.sale_plans_hint_1')); ?></p>
            <p class="font-12 text-gray">- <?php echo e(trans('webinars.sale_plans_hint_2')); ?></p>
            <p class="font-12 text-gray">- <?php echo e(trans('webinars.sale_plans_hint_3')); ?></p>
        </div>
    </div>

    <button id="webinarAddTicket" data-webinar-id="<?php echo e($bundle->id); ?>" type="button" class="btn btn-primary btn-sm mt-15"><?php echo e(trans('public.add_plan')); ?></button>

    <div class="row mt-10">
        <div class="col-12">

            <div class="accordion-content-wrapper mt-15" id="ticketsAccordion" role="tablist" aria-multiselectable="true">
                <?php if(!empty($bundle->tickets) and count($bundle->tickets)): ?>
                    <ul class="draggable-lists" data-order-table="tickets">
                        <?php $__currentLoopData = $bundle->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.panel.bundle.create_includes.accordions.ticket',['bundle' => $bundle,'ticket' => $ticketInfo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                        'file_name' => 'ticket.png',
                        'title' => trans('public.ticket_no_result'),
                        'hint' => trans('public.ticket_no_result_hint'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div id="newTicketForm" class="d-none">
    <?php echo $__env->make('web.default.panel.bundle.create_includes.accordions.ticket',['bundle' => $bundle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\bundle\create_includes\step_3.blade.php ENDPATH**/ ?>