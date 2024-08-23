<div class="row">
    <div class="col-12 col-md-5">

        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                <select name="locale" class="form-control <?php echo e(!empty($rule) ? 'js-edit-content-locale' : ''); ?>">
                    <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?> <?php echo e((!empty($definedLanguage) and is_array($definedLanguage) and in_array(mb_strtolower($lang), $definedLanguage)) ? '('. trans('panel.content_defined') .')' : ''); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['locale'];
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
        <?php else: ?>
            <input type="hidden" name="locale" value="<?php echo e(getDefaultLocale()); ?>">
        <?php endif; ?>

        <div class="form-group mt-15">
            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
            <input type="text" name="title" value="<?php echo e(!empty($rule) ? $rule->title : old('title')); ?>" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
            <?php $__errorArgs = ['title'];
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


        <div class="form-group ">
            <label class="input-label"><?php echo e(trans('admin/main.users')); ?></label>

            <select name="users_ids[]" class="custom-select search-user-select2" multiple data-placeholder="<?php echo e(trans('public.search_user')); ?>">

                <?php if(!empty($rule) and !empty($rule->users)): ?>
                    <?php $__currentLoopData = $rule->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruleUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($ruleUser->id); ?>" selected><?php echo e($ruleUser->full_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.cashback_users_hint')); ?></div>
            <?php $__errorArgs = ['users_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <?php
            $selectedGroupIds = !empty($rule) ? $rule->userGroups->pluck('id')->toArray() : [];
        ?>

        <div class="form-group ">
            <label class="input-label"><?php echo e(trans('admin/main.user_group')); ?></label>

            <select name="group_ids[]" class="custom-select select2" multiple data-placeholder="<?php echo e(trans('admin/main.select_users_group')); ?>">

                <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($userGroup->id); ?>" <?php echo e(in_array($userGroup->id, $selectedGroupIds) ? 'selected' : ''); ?>><?php echo e($userGroup->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.cashback_user_groups_hint')); ?></div>
            <?php $__errorArgs = ['group_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="dateRangeLabel">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>

                <input type="text" name="start_date" class="form-control text-center datetimepicker"
                       aria-describedby="dateRangeLabel" autocomplete="off"
                       value="<?php echo e((!empty($rule) and !empty($rule->start_date)) ? dateTimeFormat($rule->start_date, 'Y-m-d H:i', false) : dateTimeFormat(time(), 'Y-m-d H:i', false)); ?>"/>
                <?php $__errorArgs = ['start_date'];
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
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.cashback_start_date_hint')); ?></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="dateRangeLabel">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>

                <input type="text" name="end_date" class="form-control text-center datetimepicker"
                       aria-describedby="dateRangeLabel" autocomplete="off"
                       value="<?php echo e((!empty($rule) and !empty($rule->end_date)) ? dateTimeFormat($rule->end_date, 'Y-m-d H:i', false) : old('end_date')); ?>"/>
                
                <?php $__errorArgs = ['end_date'];
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
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.cashback_end_date_hint')); ?></div>
        </div>

    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\cashback\rules\create\includes\basic_information.blade.php ENDPATH**/ ?>