<div class="row">
    <div class="col-12 col-md-5">

        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                <select name="locale" class="form-control <?php echo e(!empty($installment) ? 'js-edit-content-locale' : ''); ?>">
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
            <input type="text" name="title" value="<?php echo e(!empty($installment) ? $installment->title : old('title')); ?>" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.installment_title_hint')); ?></div>
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

        <div class="form-group mt-15">
            <label class="input-label"><?php echo e(trans('update.main_title')); ?></label>
            <input type="text" name="main_title" value="<?php echo e(!empty($installment) ? $installment->main_title : old('main_title')); ?>" class="form-control <?php $__errorArgs = ['main_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.installment_main_title_hint')); ?></div>
            <?php $__errorArgs = ['main_title'];
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

        <div class="form-group mt-15">
            <label class="input-label"><?php echo e(trans('public.description')); ?></label>
            <textarea name="description" rows="5" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(!empty($installment) ? $installment->description : old('description')); ?></textarea>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.installment_description_hint')); ?></div>
            <?php $__errorArgs = ['description'];
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

        <div class="form-group mt-15">
            <label class="input-label"><?php echo e(trans('update.banner')); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text admin-file-manager" data-input="banner" data-preview="holder">
                        <i class="fa fa-upload"></i>
                    </button>
                </div>
                <input type="text" name="banner" id="banner" value="<?php echo e(!empty($installment) ? $installment->banner : old('banner')); ?>" class="form-control <?php $__errorArgs = ['banner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                <div class="input-group-append">
                    <button type="button" class="input-group-text admin-file-view" data-input="banner">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>

                <?php $__errorArgs = ['banner'];
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

            <div class="text-muted text-small mt-1"><?php echo e(trans('update.installment_banner_hint')); ?></div>
        </div>


        
        <div id="installmentOptionsCard" class="mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="fs-15"><?php echo e(trans('update.options')); ?></h5>

                <button type="button" class="js-add-btn btn btn-success">
                    <i class="fa fa-plus"></i>
                    <?php echo e(trans('update.add_option')); ?>

                </button>
            </div>

            <?php if(!empty($installment) and !empty($installment->options)): ?>
                <?php
                    $installmentOptions = explode(\App\Models\Installment::$optionsExplodeKey, $installment->options);
                ?>
                <?php $__currentLoopData = $installmentOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="input-group mt-2">
                        <input type="text" name="installment_options[]"
                               class="form-control w-auto flex-grow-1" value="<?php echo e($option); ?>"/>

                        <div class="input-group-append">
                            <button type="button" class="js-remove-btn btn btn-danger"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div id="installmentOptionsMainRow" class="d-none">
                <div class="input-group mt-2">
                    <input type="text" name="installment_options[]"
                           class="form-control w-auto flex-grow-1"/>

                    <div class="input-group-append">
                        <button type="button" class="js-remove-btn btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-muted text-small mt-1"><?php echo e(trans('update.installment_options_hint')); ?></div>
        <div class="form-group mt-15">
            <label class="input-label"><?php echo e(trans('public.capacity')); ?></label>
            <input type="number" name="capacity" value="<?php echo e(!empty($installment) ? $installment->capacity : old('capacity')); ?>" class="form-control <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Empty means inactive this mode"/>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.installment_capacity_hint')); ?></div>
            <?php $__errorArgs = ['capacity'];
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

        <?php
            $selectedGroupIds = !empty($installment) ? $installment->userGroups->pluck('group_id')->toArray() : [];
        ?>

        <div class="form-group ">
            <label class="input-label"><?php echo e(trans('admin/main.user_group')); ?></label>

            <select name="group_ids[]" class="custom-select select2" multiple data-placeholder="<?php echo e(trans('admin/main.select_users_group')); ?>">

                <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($userGroup->id); ?>" <?php echo e(in_array($userGroup->id, $selectedGroupIds) ? 'selected' : ''); ?>><?php echo e($userGroup->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.installment_user_group_hint')); ?></div>
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
            <p class="text-muted font-12 mt-1"><?php echo e(trans('')); ?></p>
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
                       value="<?php echo e((!empty($installment) and !empty($installment->start_date)) ? dateTimeFormat($installment->start_date, 'Y-m-d H:i', false) : old('start_date')); ?>"/>


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
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.installment_start_date_hint')); ?></div>
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
                       value="<?php echo e((!empty($installment) and !empty($installment->end_date)) ? dateTimeFormat($installment->end_date, 'Y-m-d H:i', false) : old('end_date')); ?>"/>


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
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.installment_end_date_hint')); ?></div>
        </div>

    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\installments\create\includes\basic_information.blade.php ENDPATH**/ ?>