<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('update.purchase_notifications')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('update.purchase_notifications')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo e(getAdminPanelUrl('/purchase_notifications/').(!empty($notification) ? $notification->id.'/update' : 'store')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>


                                <div class="row">

                                    <div class="col-12 col-md-6">

                                        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                                            <div class="form-group">
                                                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                                <select name="locale" class="form-control <?php echo e(!empty($notification) ? 'js-edit-content-locale' : ''); ?>">
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
                                            <input type="text" name="title" value="<?php echo e(!empty($notification) ? $notification->title : old('title')); ?>" class="form-control "/>
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
                                            <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="dateRangeLabel">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>

                                                <input type="text" name="start_at" class="form-control text-center datetimepicker"
                                                       aria-describedby="dateRangeLabel" autocomplete="off"
                                                       value="<?php echo e((!empty($notification) and !empty($notification->start_at)) ? dateTimeFormat($notification->start_at, 'Y-m-d H:i', false) : old('start_at')); ?>"/>
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
                                                       value="<?php echo e((!empty($notification) and !empty($notification->end_at)) ? dateTimeFormat($notification->end_at, 'Y-m-d H:i', false) : old('end_at')); ?>"/>
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


                                        <div class="form-group">
                                            <label><?php echo e(trans('update.popup_duration')); ?> (<?php echo e(trans('seconds')); ?>)</label>
                                            <input type="number" name="popup_duration" value="<?php echo e(!empty($notification) ? $notification->popup_duration : old('popup_duration')); ?>" class="form-control " min="0"/>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_duration_hint')); ?></div>
                                            <?php $__errorArgs = ['popup_duration'];
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
                                            <label><?php echo e(trans('update.popup_delay')); ?> (<?php echo e(trans('seconds')); ?>)</label>
                                            <input type="number" name="popup_delay" value="<?php echo e(!empty($notification) ? $notification->popup_delay : old('popup_delay')); ?>" class="form-control " min="0"/>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_delay_hint')); ?></div>
                                            <?php $__errorArgs = ['popup_delay'];
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


                                        <?php
                                            $selectedRoleIds = !empty($notification) ? $notification->roles->pluck('id')->toArray() : [];
                                            $selectedGroupIds = !empty($notification) ? $notification->userGroups->pluck('id')->toArray() : [];
                                        ?>

                                        <div class="form-group">
                                            <label class="input-label d-block"><?php echo e(trans('admin/main.role')); ?></label>
                                            <select name="role_id[]" class="form-control select2 <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple>

                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role->id); ?>" <?php echo e((in_array($role->id, $selectedRoleIds)) ? 'selected' : ''); ?>><?php echo e($role->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_role_hint')); ?></div>
                                            <div class="invalid-feedback d-block"><?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="input-label d-block"><?php echo e(trans('admin/main.group')); ?></label>
                                            <select name="group_id[]" class="form-control select2 <?php $__errorArgs = ['group_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple>

                                                <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($userGroup->id); ?>" <?php echo e((in_array($userGroup->id, $selectedGroupIds)) ? 'selected' : ''); ?>><?php echo e($userGroup->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_group_hint')); ?></div>
                                            <div class="invalid-feedback d-block"><?php $__errorArgs = ['group_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo e(trans('update.maximum_purchase_amount')); ?></label>
                                            <input type="number" name="maximum_purchase_amount" value="<?php echo e((!empty($notification) and !empty($notification->maximum_purchase_amount)) ? convertPriceToUserCurrency($notification->maximum_purchase_amount) : old('maximum_purchase_amount')); ?>" class="form-control " min="0"/>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_max_amount_hint')); ?></div>
                                            <?php $__errorArgs = ['maximum_purchase_amount'];
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
                                            <label><?php echo e(trans('update.maximum_community_age')); ?></label>
                                            <input type="number" name="maximum_community_age" value="<?php echo e((!empty($notification)) ? $notification->maximum_community_age : old('maximum_community_age')); ?>" class="form-control " min="0"/>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_community_age_hint')); ?></div>
                                            <?php $__errorArgs = ['maximum_community_age'];
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
                                            <label><?php echo e(trans('update.display_type')); ?></label>
                                            <select name="display_type" class="form-control ">
                                                <option value="overall" <?php echo e((!empty($notification) and $notification->display_type == "overall") ? 'selected' : ''); ?>><?php echo e(trans('update.overall')); ?></option>
                                                <option value="per_session" <?php echo e((!empty($notification) and $notification->display_type == "per_session") ? 'selected' : ''); ?>><?php echo e(trans('update.per_session')); ?></option>
                                            </select>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_display_type_hint')); ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo e(trans('update.display_time')); ?></label>
                                            <input type="number" name="display_time" value="<?php echo e((!empty($notification)) ? $notification->display_time : old('display_time')); ?>" class="form-control " min="0"/>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_display_times_hint')); ?></div>
                                            <?php $__errorArgs = ['display_time'];
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

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="display_for_logged_out_users" value="0">
                                                <input type="checkbox" name="display_for_logged_out_users" id="display_for_logged_out_usersSwitch" value="on" <?php echo e((!empty($notification) and $notification->display_for_logged_out_users) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="display_for_logged_out_usersSwitch"><?php echo e(trans('update.display_for_logged_out_users')); ?></label>
                                            </label>
                                        </div>

                                        <h5 class="font-16 font-weight-bold mt-20"><?php echo e(trans('update.popup_content')); ?></h5>
                                        <div class="text-muted text-small mt-1 mb-20"><?php echo e(trans('update.purchase_notifications_content_hint')); ?></div>

                                        <div class="form-group">
                                            <label class="input-label d-block"><?php echo e(trans('admin/main.users')); ?></label>
                                            <input type="text" name="users" data-max-tag="" value="<?php echo e(!empty($notification) ? $notification->users : ''); ?>" class="form-control inputtags" placeholder="<?php echo e(trans('update.type_user_name_and_press_enter')); ?>"/>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_users_hint')); ?></div>
                                            <?php $__errorArgs = ['users'];
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
                                            <label class="input-label"><?php echo e(trans('update.content')); ?></label>
                                            <select name="contents[]" class="form-control search-content-select2" multiple data-path="<?php echo e(getAdminPanelUrl("/purchase_notifications/search-contents")); ?>"
                                                    data-placeholder="<?php echo e(trans('update.choose_contents')); ?>">

                                                <?php if(!empty($notification)): ?>
                                                    <?php $__currentLoopData = $notification->webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($webinar->id); ?>_webinar" selected><?php echo e($webinar->title); ?> - <?php echo e(trans("update.webinar")); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <?php $__currentLoopData = $notification->bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($bundle->id); ?>_bundle" selected><?php echo e($bundle->title); ?> - <?php echo e(trans("update.bundle")); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <?php $__currentLoopData = $notification->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($product->id); ?>_product" selected><?php echo e($product->title); ?> - <?php echo e(trans("update.product")); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_contents_hint')); ?></div>

                                            <?php $__errorArgs = ['contents'];
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
                                            <label class="input-label d-block"><?php echo e(trans('update.times')); ?></label>
                                            <input type="text" name="times" data-max-tag="" value="<?php echo e(!empty($notification) ? $notification->times : ''); ?>" class="form-control inputtags" placeholder="<?php echo e(trans('update.type_time_and_press_enter')); ?>"/>
                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_notifications_time_hint')); ?></div>
                                            <?php $__errorArgs = ['times'];
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

                                        <h5 class="font-16 font-weight-bold mt-20"><?php echo e(trans('admin/main.tags')); ?></h5>
                                        <div class="text-muted text-small mt-1 mb-20"><?php echo e(trans('update.purchase_notifications_tags_hint')); ?></div>

                                        <div class="d-flex align-items-center flex-wrap">
                                            <p class="mb-1 mr-2">[user]: <?php echo e(trans('admin/main.user_name')); ?></p>
                                            <p class="mb-1 mr-2">[content]: <?php echo e(trans('update.content')); ?></p>
                                            <p class="mb-1 mr-2">[time]: <?php echo e(trans('admin/main.time')); ?></p>
                                            <p class="mb-1 mr-2">[price]: <?php echo e(trans('admin/main.price')); ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label class="input-label d-block"><?php echo e(trans('update.popup_title')); ?></label>
                                            <input type="text" name="popup_title" value="<?php echo e(!empty($notification) ? $notification->popup_title : old('popup_title')); ?>" class="form-control "/>
                                            <?php $__errorArgs = ['popup_title'];
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
                                            <label class="input-label d-block"><?php echo e(trans('update.popup_subtitle')); ?></label>
                                            <input type="text" name="popup_subtitle" value="<?php echo e(!empty($notification) ? $notification->popup_subtitle : old('popup_subtitle')); ?>" class="form-control "/>
                                            <?php $__errorArgs = ['popup_subtitle'];
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

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="enable" value="0">
                                                <input type="checkbox" name="enable" id="enableSwitch" value="on" <?php echo e((!empty($notification) and $notification->enable) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="enableSwitch"><?php echo e(trans('update.enable')); ?></label>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="">
                                    <button type="button" class="js-submit-form btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
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
    <script src="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/default/js/admin/purchase_notifications.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\purchase_notifications\create\index.blade.php ENDPATH**/ ?>