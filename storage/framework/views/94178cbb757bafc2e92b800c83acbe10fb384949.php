<section class="mt-30">
    <h2 class="section-title after-line"><?php echo e(trans('site.identity_and_financial')); ?></h2>
    <div class="mt-15">
        <?php if($user->financial_approval): ?>
            <p class="font-14 text-primary"><?php echo e(trans('site.identity_and_financial_verified')); ?></p>
        <?php else: ?>
            <p class="font-14 text-danger"><?php echo e(trans('site.identity_and_financial_not_verified')); ?></p>
        <?php endif; ?>
    </div>

    <div class="row mt-20">
        <div class="col-12 col-lg-4">

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('financial.select_account_type')); ?></label>
                <select name="bank_id" class="js-user-bank-input form-control <?php $__errorArgs = ['bank_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" <?php echo e(($user->financial_approval) ? 'disabled' : ''); ?>>
                    <option selected disabled><?php echo e(trans('financial.select_account_type')); ?></option>

                    <?php $__currentLoopData = $userBanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userBank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($userBank->id); ?>" <?php if(!empty($user->selectedBank) and $user->selectedBank->user_bank_id == $userBank->id): ?> selected="selected" <?php endif; ?> data-specifications="<?php echo e(json_encode($userBank->specifications->pluck('name','id')->toArray())); ?>"><?php echo e($userBank->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <?php $__errorArgs = ['bank_id'];
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

            <div class="js-bank-specifications-card">
                <?php if(!empty($user) and !empty($user->selectedBank) and !empty($user->selectedBank->bank)): ?>
                    <?php $__currentLoopData = $user->selectedBank->bank->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $selectedBankSpecification = $user->selectedBank->specifications->where('user_selected_bank_id', $user->selectedBank->id)->where('user_bank_specification_id', $specification->id)->first();
                        ?>
                        <div class="form-group">
                            <label class="font-weight-500 text-dark-blue"><?php echo e($specification->name); ?></label>
                            <input type="text" name="bank_specifications[<?php echo e($specification->id); ?>]" value="<?php echo e((!empty($selectedBankSpecification)) ? $selectedBankSpecification->value : ''); ?>" class="form-control" <?php echo e(($user->financial_approval) ? 'disabled' : ''); ?>/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('financial.identity_scan')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text <?php echo e(($user->financial_approval) ? '' : 'panel-file-manager'); ?>" data-input="identity_scan" data-preview="holder">
                            <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                        </button>
                    </div>
                    <input type="text" name="identity_scan" id="identity_scan" value="<?php echo e((!empty($user) and empty($new_user)) ? $user->identity_scan : old('identity_scan')); ?>" class="form-control <?php $__errorArgs = ['identity_scan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" <?php echo e(($user->financial_approval) ? 'disabled' : ''); ?>/>
                    <?php $__errorArgs = ['identity_scan'];
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

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('public.certificate_and_documents')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text panel-file-manager" data-input="certificate" data-preview="holder">
                            <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                        </button>
                    </div>
                    <input type="text" name="certificate" id="certificate" value="<?php echo e((!empty($user) and empty($new_user)) ? $user->certificate : old('certificate')); ?>" class="form-control "/>
                </div>
            </div>

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('financial.address')); ?></label>
                <input type="text" name="address" value="<?php echo e((!empty($user) and empty($new_user)) ? $user->address : old('address')); ?>" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                <?php $__errorArgs = ['address'];
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

</section>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\setting\setting_includes\identity_and_financial.blade.php ENDPATH**/ ?>