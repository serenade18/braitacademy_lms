<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>


<div class="tab-pane mt-3 fade  <?php if(request()->get('tab') == "user_banks"): ?> active show <?php endif; ?>" id="user_banks" role="tabpanel" aria-labelledby="user_banks-tab">
    <div class="row">
        <div class="col-12 col-md-6">

        </div>
    </div>

    <section class="mt-3">
        <div class="d-flex justify-content-between align-items-center pb-2">
            <h2 class="section-title after-line"><?php echo e(trans('update.user_banks_credits')); ?></h2>

            <button type="button" data-path="<?php echo e(getAdminPanelUrl("/settings/financial/user_banks/get-form")); ?>" class="js-add-user-banks btn btn-primary btn-sm ml-2"><?php echo e(trans('update.add_bank')); ?></button>
        </div>

        <?php if(!empty($userBanks)): ?>
            <div class="table-responsive">
                <table class="table table-striped font-14">
                    <tr>
                        <th class="text-left"><?php echo e(trans('admin/main.logo')); ?></th>
                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                        <th class="text-center"><?php echo e(trans('update.specifications')); ?></th>
                        <th class="text-right"><?php echo e(trans('admin/main.actions')); ?></th>
                    </tr>

                    <?php $__currentLoopData = $userBanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userBank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-left">
                                <img src="<?php echo e($userBank->logo); ?>" alt="" width="48">
                            </td>

                            <td class="text-left"><?php echo e($userBank->title); ?></td>

                            <td class="text-center"><?php echo e($userBank->specifications->count()); ?></td>

                            <td class="text-right">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button" data-path="<?php echo e(getAdminPanelUrl("/settings/financial/user_banks/{$userBank->id}/edit")); ?>" class="js-edit-user-banks font-14 btn-transparent text-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                    <?php echo $__env->make('admin.includes.delete_button',[
                                      'url' => getAdminPanelUrl("/settings/financial/user_banks/{$userBank->id}/delete"),
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
    <script src="/assets/default/js/admin/settings/user_banks.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/braitaca/public_html/resources/views/admin/settings/financial/user_banks/index.blade.php ENDPATH**/ ?>