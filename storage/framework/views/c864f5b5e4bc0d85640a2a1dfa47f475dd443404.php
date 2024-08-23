<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>


<div class="tab-pane mt-3 fade  <?php if(request()->get('tab') == "offline_banks"): ?> active show <?php endif; ?>" id="offline_banks" role="tabpanel" aria-labelledby="offline_banks-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="page" value="financial">
                <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$offlineBanksName); ?>">


                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0 d-flex align-items-center">
                        <input type="hidden" name="value[offline_banks_status]" value="0">
                        <input type="checkbox" name="value[offline_banks_status]" id="offline_banks_statusSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['offline_banks_status']) and $itemValue['offline_banks_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="offline_banks_statusSwitch"><?php echo e(trans('update.offline_banks_status')); ?></label>
                    </label>
                </div>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>

    <section class="mt-3">
        <div class="d-flex justify-content-between align-items-center pb-2">
            <h2 class="section-title after-line"><?php echo e(trans('update.offline_banks_credits')); ?></h2>

            <button type="button" data-path="<?php echo e(getAdminPanelUrl("/settings/financial/offline_banks/get-form")); ?>" class="js-add-offline-banks btn btn-primary btn-sm ml-2"><?php echo e(trans('update.add_bank')); ?></button>
        </div>

        <?php if(!empty($offlineBanks)): ?>
            <div class="table-responsive">
                <table class="table table-striped font-14">
                    <tr>
                        <th class="text-left"><?php echo e(trans('admin/main.logo')); ?></th>
                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                        <th class="text-center"><?php echo e(trans('update.specifications')); ?></th>
                        <th class="text-right"><?php echo e(trans('admin/main.actions')); ?></th>
                    </tr>

                    <?php $__currentLoopData = $offlineBanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineBank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-left">
                                <img src="<?php echo e($offlineBank->logo); ?>" alt="" width="48">
                            </td>

                            <td class="text-left"><?php echo e($offlineBank->title); ?></td>

                            <td class="text-center"><?php echo e($offlineBank->specifications->count()); ?></td>

                            <td class="text-right">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button" data-path="<?php echo e(getAdminPanelUrl("/settings/financial/offline_banks/{$offlineBank->id}/edit")); ?>" class="js-edit-offline-banks font-14 btn-transparent text-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                    <?php echo $__env->make('admin.includes.delete_button',[
                                      'url' => getAdminPanelUrl("/settings/financial/offline_banks/{$offlineBank->id}/delete"),
                                      'btnClass' => 'btn-sm btn-transparent d-block text-danger ml-2' ,
                                      'btnText' => ''
                                      ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>
            </div>
        <?php endif; ?>
    </section>

</div>


<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var specificationLang = '<?php echo e(trans('update.specification')); ?>';
        var valueLang = '<?php echo e(trans('update.value')); ?>';
    </script>
    <script src="/assets/default/js/admin/settings/offline_banks_credits.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\financial\offline_banks\index.blade.php ENDPATH**/ ?>