<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <h2 class="section-title"><?php echo e(trans('panel.create_a_new_discount')); ?></h2>
        <?php if(\Session::has('msg')): ?>
            <div class="alert alert-warning">
                <ul>
                    <li><?php echo \Session::get('msg'); ?></li>
                </ul>
            </div>
        <?php endif; ?>
        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="/panel/marketing/special_offers/store" method="post" class="row">
                <?php echo e(csrf_field()); ?>


                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                                <input type="text" name="name"
                                       class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>

                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label class="input-label d-block"><?php echo e(trans('panel.webinar')); ?></label>
                                <select name="webinar_id"
                                        class="form-control custom-select <?php $__errorArgs = ['webinar_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option selected disabled><?php echo e(trans('panel.select_course')); ?></option>

                                    <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($webinar->id); ?>"><?php echo e($webinar->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('panel.amount')); ?>(%)</label>
                                <input type="text" name="percent"
                                       class="form-control <?php $__errorArgs = ['percent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>

                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.from')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="from_date" autocomplete="off"
                                           class="form-control datetimepicker <?php $__errorArgs = ['from_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           aria-describedby="dateInputGroupPrepend"/>

                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.to')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="to_date" autocomplete="off"
                                           class="form-control datetimepicker <?php $__errorArgs = ['to_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           aria-describedby="dateInputGroupPrepend"/>

                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-1 d-flex align-items-center justify-content-end">
                    <button type="button" id="formSubmit" class="btn btn-sm btn-primary"><?php echo e(trans('public.create')); ?></button>
                </div>
            </form>
        </div>
    </section>

    <?php if(!empty($specialOffers) and $specialOffers->count() > 0): ?>

        <section class="mt-35">
            <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
                <h2 class="section-title"><?php echo e(trans('panel.discounts')); ?></h2>

                <form action="" method="get" class="d-flex align-items-center flex-row-reverse flex-md-row justify-content-start justify-content-md-center mt-20 mt-md-0">
                    <label class="cursor-pointer mb-0 mr-10 text-gray font-14 font-weight-500" for="activeDiscountsSwitch"><?php echo e(trans('panel.show_only_active_discounts')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="active_discounts" class="js-panel-list-switch-filter custom-control-input" <?php echo e(request()->get('active_discounts', '') == 'on' ? 'checked' : ''); ?>

                        id="activeDiscountsSwitch">
                        <label class="custom-control-label" for="activeDiscountsSwitch"></label>
                    </div>
                </form>
            </div>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table custom-table text-center">
                                <thead>
                                <tr>
                                    <th class="text-left text-gray"><?php echo e(trans('panel.name')); ?></th>
                                    <th class="text-left text-gray"><?php echo e(trans('panel.webinar')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('panel.amount')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('public.status')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('public.from')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('public.to')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $specialOffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialOffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left align-middle text-dark-blue font-weight-500"><?php echo e($specialOffer->name); ?></td>
                                        <td class="text-left align-middle">
                                            <a href="<?php echo e($specialOffer->webinar->getUrl()); ?>" class="text-dark-blue font-weight-500" target="_blank"><?php echo e($specialOffer->webinar->title); ?></a>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-dark-blue font-weight-500"><?php echo e($specialOffer->percent); ?>%</span>
                                        </td>
                                        <td class="align-middle">
                                            <?php switch($specialOffer->status):
                                                case (\App\Models\SpecialOffer::$active): ?>
                                                <span class="text-primary font-weight-500"><?php echo e(trans('public.active')); ?></span>

                                                <?php break; ?>
                                                <?php case (\App\Models\SpecialOffer::$inactive): ?>
                                                <span class="text-warning font-weight-500"><?php echo e(trans('public.inactive')); ?></span>
                                                <?php break; ?>
                                            <?php endswitch; ?>
                                        </td>
                                        <td class="align-middle text-dark-blue font-weight-500"><?php echo e(dateTimeFormat($specialOffer->from_date, 'j M Y | H:i')); ?></td>
                                        <td class="align-middle text-dark-blue font-weight-500"><?php echo e(dateTimeFormat($specialOffer->to_date, 'j M Y | H:i')); ?></td>
                                        <td class="text-right align-middle">
                                            <?php if($specialOffer->status != \App\Models\SpecialOffer::$inactive): ?>
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i data-feather="more-vertical" height="20"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="/panel/marketing/special_offers/<?php echo e($specialOffer->id); ?>/disable" type="button"
                                                           class="delete-action btn-transparent"><?php echo e(trans('public.disable')); ?></a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <div class="my-30">
            <?php echo e($specialOffers->appends(request()->input())->links('vendor.pagination.panel')); ?>

        </div>

    <?php else: ?>

        <?php echo $__env->make(getTemplate() . '.includes.no-result',[
            'file_name' => 'offer.png',
            'title' => trans('panel.discount_no_result'),
            'hint' =>  nl2br(trans('panel.discount_no_result_hint')) ,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>

    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
    </script>

    <script src="/assets/default/js/panel/marketing/special_offers.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\marketing\special_offers.blade.php ENDPATH**/ ?>