<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('update.new_rule')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('update.new_rule')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo e(getAdminPanelUrl('/abandoned-cart/rules/').(!empty($rule) ? $rule->id.'/update' : 'store')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>


                                <div class="row">

                                    <div class="col-12 col-md-6">

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
                                                <div class="invalid-feedback d-block">
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

                                        <div class="form-group">
                                            <label><?php echo e(trans('admin/main.title')); ?></label>
                                            <input type="text" name="title" value="<?php echo e(!empty($rule) ? $rule->title : old('title')); ?>" class="form-control "/>
                                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo e(trans('update.minimum_cart_amount')); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <?php echo e($currency); ?>

                                                    </div>
                                                </div>

                                                <input type="number" name="minimum_cart_amount"
                                                       class="form-control text-center <?php $__errorArgs = ['minimum_cart_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       value="<?php echo e((!empty($rule) and !empty($rule->minimum_cart_amount)) ? convertPriceToUserCurrency($rule->minimum_cart_amount) : old('minimum_cart_amount')); ?>"
                                                       placeholder="<?php echo e(trans('update.minimum_cart_amount_placeholder')); ?>"/>
                                                <?php $__errorArgs = ['minimum_cart_amount'];
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
                                            <label><?php echo e(trans('update.maximum_cart_amount')); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <?php echo e($currency); ?>

                                                    </div>
                                                </div>

                                                <input type="number" name="maximum_cart_amount"
                                                       class="form-control text-center <?php $__errorArgs = ['maximum_cart_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       value="<?php echo e((!empty($rule) and !empty($rule->maximum_cart_amount)) ? convertPriceToUserCurrency($rule->maximum_cart_amount) : old('maximum_cart_amount')); ?>"
                                                       placeholder="<?php echo e(trans('update.maximum_cart_amount_placeholder')); ?>"/>
                                                <?php $__errorArgs = ['maximum_cart_amount'];
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
                                            <label><?php echo e(trans('admin/main.action')); ?></label>
                                            <select name="action" class="form-control">
                                                <option value="send_reminder" <?php echo e((!empty($rule) and $rule->action == "send_reminder") ? 'selected' : ''); ?>><?php echo e(trans('admin/main.send_reminder')); ?></option>
                                                <option value="send_coupon" <?php echo e((!empty($rule) and $rule->action == "send_coupon") ? 'selected' : ''); ?>><?php echo e(trans('update.send_coupon')); ?></option>
                                            </select>
                                        </div>

                                        <div class="js-discounts-field form-group <?php echo e((!empty($rule) and $rule->action == "send_coupon") ? '' : 'd-none'); ?>">
                                            <label class="input-label d-block"><?php echo e(trans('update.coupon')); ?></label>
                                            <select name="discount_id" class="form-control select2 <?php $__errorArgs = ['source'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($discount->id); ?>" <?php echo e((!empty($rule) and $rule->discount_id == $discount->id) ? 'selected' : ''); ?>><?php echo e($discount->title); ?> - <?php echo e(($discount->discount_type == \App\Models\Discount::$discountTypePercentage) ? ($discount->percent."%") : handlePrice($discount->amount)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.abandoned_cart_coupon_hint')); ?></div>
                                            <div class="invalid-feedback"><?php $__errorArgs = ['discount_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo e(trans('update.action_cycle')); ?> (<?php echo e(trans('home.hours')); ?>)</label>
                                            <input type="number" name="action_cycle" class="form-control <?php $__errorArgs = ['action_cycle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($rule) ? $rule->action_cycle : old('action_cycle')); ?>">

                                            <?php $__errorArgs = ['action_cycle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0">
                                                <input type="hidden" name="repeat_action" value="0">
                                                <input type="checkbox" name="repeat_action" id="repeat_actionSwitch" value="1" <?php echo e((!empty($rule) and $rule->repeat_action) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="repeat_actionSwitch"><?php echo e(trans('update.repeat_action')); ?></label>
                                            </label>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.abandoned_cart_repeat_action_hint')); ?></div>
                                        </div>

                                        <div class="js-repeat-action-count-field form-group <?php echo e((!empty($rule) and $rule->repeat_action) ? '' : 'd-none'); ?>">
                                            <label><?php echo e(trans('update.repeat_action_count')); ?></label>
                                            <input type="number" name="repeat_action_count" class="form-control <?php $__errorArgs = ['repeat_action_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($rule) ? $rule->repeat_action_count : old('repeat_action_count')); ?>">

                                            <?php $__errorArgs = ['repeat_action_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.abandoned_cart_repeat_action_count_hint')); ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="dateRangeLabel">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>

                                                <input type="text" name="start_at" class="form-control text-center datetimepicker"
                                                       aria-describedby="dateRangeLabel" autocomplete="off"
                                                       value="<?php echo e((!empty($rule) and !empty($rule->start_at)) ? dateTimeFormat($rule->start_at, 'Y-m-d H:i', false) : old('start_at')); ?>"/>
                                                <?php $__errorArgs = ['start_at'];
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
                                        </div>

                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="dateRangeLabel">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>

                                                <input type="text" name="end_at" class="form-control text-center datetimepicker"
                                                       aria-describedby="dateRangeLabel" autocomplete="off"
                                                       value="<?php echo e((!empty($rule) and !empty($rule->end_at)) ? dateTimeFormat($rule->end_at, 'Y-m-d H:i', false) : old('end_at')); ?>"/>
                                                <?php $__errorArgs = ['end_at'];
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
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.abandoned_cart_rule_users_hint')); ?></div>
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
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.abandoned_cart_rule_user_groups_hint')); ?></div>
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

                                        
                                        <section class="mt-3">
                                            <h2 class="section-title after-line"><?php echo e(trans('update.target_products')); ?></h2>

                                            <?php echo $__env->make('admin.abandoned_cart.rules.create.target_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </section>

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0">
                                                <input type="hidden" name="enable" value="0">
                                                <input type="checkbox" name="enable" id="enableSwitch" value="1" <?php echo e((!empty($rule) and $rule->enable) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="enableSwitch"><?php echo e(trans('update.enable')); ?></label>
                                            </label>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.abandoned_cart_rule_enable_hint')); ?></div>
                                        </div>

                                        <div class=" mt-4">
                                            <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/abandoned_cart_rules.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\abandoned_cart\rules\create\index.blade.php ENDPATH**/ ?>