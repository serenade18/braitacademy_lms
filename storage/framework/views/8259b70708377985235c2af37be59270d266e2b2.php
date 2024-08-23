<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.new_package')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('update.registration_packages')); ?></div>
            </div>
        </div>


        <div class="section-body card">

            <div class="d-flex align-items-center justify-content-between">
                <div class="">
                    <h2 class="section-title ml-4"><?php echo e(!empty($package) ? trans('admin/main.edit') : trans('admin/main.create')); ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card-body">
                        <form action="<?php echo e(getAdminPanelUrl()); ?>/financial/registration-packages/<?php echo e(!empty($package) ? $package->id.'/update' : 'store'); ?>" method="Post">
                            <?php echo e(csrf_field()); ?>


                            <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                    <select name="locale" class="form-control <?php echo e(!empty($package) ? 'js-edit-content-locale' : ''); ?>">
                                        <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
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


                            <div class="form-group">
                                <label><?php echo e(trans('admin/main.title')); ?></label>
                                <input type="text" name="title"
                                       class="form-control  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($package) ? $package->title : old('title')); ?>"/>
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

                            <div class="form-group">
                                <label><?php echo e(trans('admin/main.short_description')); ?></label>
                                <input type="text" name="description"
                                       class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($package) ? $package->description : old('description')); ?>"
                                       placeholder="<?php echo e(trans('admin/main.short_description_placeholder')); ?>"
                                />
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

                            <div class="form-group">
                                <label><?php echo e(trans('admin/main.days')); ?></label>
                                <input type="text" name="days"
                                       class="form-control  <?php $__errorArgs = ['days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($package) ? $package->days : old('days')); ?>"/>
                                <?php $__errorArgs = ['days'];
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

                            <div class="form-group">
                                <label><?php echo e(trans('admin/main.price')); ?> (<?php echo e($currency); ?>)</label>
                                <input type="text" name="price"
                                       class="form-control  <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($package) ? $package->price : old('price')); ?>"/>
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

                            <div class="form-group mt-15">
                                <label class="input-label"><?php echo e(trans('admin/main.icon')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text admin-file-manager" data-input="icon" data-preview="holder">
                                            <i class="fa fa-chevron-up"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="icon" id="icon" value="<?php echo e(!empty($package->icon) ? $package->icon : old('icon')); ?>" class="form-control <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                    <?php $__errorArgs = ['icon'];
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
                                    <div class="input-group-append">
                                        <button type="button" class="input-group-text admin-file-view" data-input="icon">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(trans('admin/main.role')); ?></label>
                                <select name="role" class="form-control <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value=""><?php echo e(trans('admin/main.select')); ?></option>
                                    <option value="instructors" <?php echo e(((!empty($package) and $package->role == 'instructors') or old('role') == 'instructors') ? 'selected' : ''); ?>><?php echo e(trans('admin/main.instructor')); ?></option>
                                    <option value="organizations" <?php echo e(((!empty($package) and $package->role == 'organizations') or old('role') == 'organizations') ? 'selected' : ''); ?>><?php echo e(trans('admin/main.organization')); ?></option>
                                </select>
                                <?php $__errorArgs = ['role'];
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

                            <div class="form-group js-organization-inputs <?php echo e(((!empty($package) and $package->role == 'organizations') or old('role') == 'organizations') ? '' : 'd-none'); ?>">
                                <label><?php echo e(trans('update.instructors_count')); ?></label>
                                <input type="text" name="instructors_count"
                                       class="form-control  <?php $__errorArgs = ['instructors_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($package) ? $package->instructors_count : old('instructors_count')); ?>"/>
                                <?php $__errorArgs = ['instructors_count'];
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
                                <div class="text-muted text-small mt-1"><?php echo e(trans('update.saas_package_condition_hint')); ?></div>
                            </div>

                            <div class="form-group js-organization-inputs <?php echo e(((!empty($package) and $package->role == 'organizations') or old('role') == 'organizations') ? '' : 'd-none'); ?>">
                                <label><?php echo e(trans('update.students_count')); ?></label>
                                <input type="text" name="students_count"
                                       class="form-control  <?php $__errorArgs = ['students_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($package) ? $package->students_count : old('students_count')); ?>"/>
                                <?php $__errorArgs = ['students_count'];
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
                                <div class="text-muted text-small mt-1"><?php echo e(trans('update.saas_package_condition_hint')); ?></div>
                            </div>

                            <div class="form-group js-organization-inputs js-instructor-inputs <?php echo e(((!empty($package) and in_array($package->role, ['instructors', 'organizations'])) or in_array(old('role'), ['instructors', 'organizations'])) ? '' : 'd-none'); ?>">
                                <label><?php echo e(trans('update.courses_capacity')); ?></label>
                                <input type="text" name="courses_capacity"
                                       class="form-control  <?php $__errorArgs = ['courses_capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($package) ? $package->courses_capacity : old('courses_capacity')); ?>"/>
                                <?php $__errorArgs = ['courses_capacity'];
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
                                <div class="text-muted text-small mt-1"><?php echo e(trans('update.saas_package_condition_hint')); ?></div>
                            </div>

                            <div class="form-group js-organization-inputs js-instructor-inputs <?php echo e(((!empty($package) and in_array($package->role, ['instructors', 'organizations'])) or in_array(old('role'), ['instructors', 'organizations'])) ? '' : 'd-none'); ?>">
                                <label><?php echo e(trans('update.courses_count')); ?></label>
                                <input type="text" name="courses_count"
                                       class="form-control  <?php $__errorArgs = ['courses_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($package) ? $package->courses_count : old('courses_count')); ?>"/>
                                <?php $__errorArgs = ['courses_count'];
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
                                <div class="text-muted text-small mt-1"><?php echo e(trans('update.saas_package_condition_hint')); ?></div>
                            </div>

                            <div class="form-group js-organization-inputs js-instructor-inputs <?php echo e(((!empty($package) and in_array($package->role, ['instructors', 'organizations'])) or in_array(old('role'), ['instructors', 'organizations'])) ? '' : 'd-none'); ?>">
                                <label><?php echo e(trans('update.meeting_count')); ?></label>
                                <input type="text" name="meeting_count"
                                       class="form-control  <?php $__errorArgs = ['meeting_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($package) ? $package->meeting_count : old('meeting_count')); ?>"/>
                                <?php $__errorArgs = ['meeting_count'];
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
                                <div class="text-muted text-small mt-1"><?php echo e(trans('update.saas_package_condition_hint')); ?></div>
                            </div>

                            <div class="form-group js-organization-inputs js-instructor-inputs <?php echo e(((!empty($package) and in_array($package->role, ['instructors', 'organizations'])) or in_array(old('role'), ['instructors', 'organizations'])) ? '' : 'd-none'); ?>">
                                <label><?php echo e(trans('update.product_count')); ?></label>
                                <input type="text" name="product_count"
                                       class="form-control  <?php $__errorArgs = ['product_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($package) ? $package->product_count : old('product_count')); ?>"/>
                                <?php $__errorArgs = ['product_count'];
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
                                <div class="text-muted text-small mt-1"><?php echo e(trans('update.saas_package_condition_hint')); ?></div>
                            </div>

                            <div class="form-group custom-switches-stacked mt-2">
                                <label class="custom-switch pl-0">
                                    <input type="hidden" name="ai_content_access" value="0">
                                    <input type="checkbox" name="ai_content_access" id="aiContentAccessSwitch" value="1" <?php echo e((!empty($package) and $package->ai_content_access) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                    <span class="custom-switch-indicator"></span>
                                    <label class="custom-switch-description mb-0 cursor-pointer" for="aiContentAccessSwitch"><?php echo e(trans('update.ai_content_access')); ?></label>
                                </label>
                                <div class="text-muted text-small"><?php echo e(trans('update.admin_registration_packages_ai_content_access_hint')); ?></div>
                            </div>


                            <div class="form-group custom-switches-stacked">
                                <label class="custom-switch pl-0">
                                    <input type="hidden" name="status" value="disabled">
                                    <input type="checkbox" name="status" id="statusSwitch" value="active" <?php echo e((!empty($package) and $package->status == 'active') ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                    <span class="custom-switch-indicator"></span>
                                    <label class="custom-switch-description mb-0 cursor-pointer" for="statusSwitch"><?php echo e(trans('admin/pages/financial.status')); ?></label>
                                </label>
                            </div>

                            <div class=" mt-4">
                                <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

    <script src="/assets/default/js/admin/new_registration_packages.min.js"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\registration_packages\new.blade.php ENDPATH**/ ?>