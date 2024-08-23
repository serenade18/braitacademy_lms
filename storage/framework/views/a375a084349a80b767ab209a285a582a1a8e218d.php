<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('update.rewards')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('update.rewards')); ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards_items')): ?>
                                <button type="button" class="js-add-new-reward btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i>
                                    <?php echo e(trans('update.new_condition')); ?>

                                </button>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.title')); ?></th>
                                        <th><?php echo e(trans('update.score')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php if(!empty($rewards)): ?>
                                        <?php $__currentLoopData = $rewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(trans('update.reward_type_'.$reward->type)); ?></td>
                                                <td><?php echo e($reward->score); ?></td>
                                                <td><?php echo e(trans('admin/main.'.$reward->status)); ?></td>
                                                <td><?php echo e(dateTimeFormat($reward->created_at,'j M Y')); ?></td>
                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards_items')): ?>
                                                        <button type="button" class="js-edit-reward btn-transparent btn-sm text-primary" data-id="<?php echo e($reward->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards_item_delete')): ?>
                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/rewards/items/'.$reward->id.'/delete' , 'btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="rewardSettingModal" tabindex="-1" aria-labelledby="contactMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(trans('update.new_condition')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.condition')); ?></label>
                            <select name="type" class="form-control">
                                <option selected disabled>--</option>

                                <?php $__currentLoopData = \App\Models\Reward::getTypesLists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type); ?>"><?php echo e(trans('update.reward_type_'.$type)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="js-score-input form-group">
                            <label class="input-label"><?php echo e(trans('update.score')); ?></label>
                            <input type="number" name="score" class="form-control"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="js-condition-input form-group d-none ">
                            <label class="input-label"><?php echo e(trans('update.value')); ?></label>
                            <input type="text" name="condition" class="form-control"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="status" id="statusSwitch" class="custom-control-input" checked>
                            <label class="custom-control-label" for="statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="js-save-reward btn btn-primary"><?php echo e(trans('admin/main.save')); ?></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
    </script>

    <script src="/assets/default/js/admin/rewards_items.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\rewards\create.blade.php ENDPATH**/ ?>