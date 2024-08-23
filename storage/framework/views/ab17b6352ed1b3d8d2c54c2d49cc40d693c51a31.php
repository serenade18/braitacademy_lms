<div class="row">
    <div class="col-12 col-md-6">

        <div class="form-group mt-3">
            <label class="input-label"><?php echo e(trans('update.estimated_publish_date')); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="dateInputGroupPrepend">
                        <i class="fa fa-calendar-alt "></i>
                    </span>
                </div>
                <input type="text" name="publish_date" value="<?php echo e((!empty($upcomingCourse) and $upcomingCourse->publish_date) ? dateTimeFormat($upcomingCourse->publish_date, 'Y-m-d H:i', false, false, $upcomingCourse->timezone) : old('publish_date')); ?>" class="form-control <?php $__errorArgs = ['publish_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> datetimepicker" aria-describedby="dateInputGroupPrepend"/>
                <?php $__errorArgs = ['publish_date'];
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

        <?php
            $selectedTimezone = getGeneralSettings('default_time_zone');

            if (!empty($upcomingCourse->timezone)) {
                $selectedTimezone = $upcomingCourse->timezone;
            } elseif (!empty($authUser) and !empty($authUser->timezone)) {
                $selectedTimezone = $authUser->timezone;
            }
        ?>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('update.timezone')); ?></label>
            <select name="timezone" class="form-control select2" data-allow-clear="false">
                <?php $__currentLoopData = getListOfTimezones(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($timezone); ?>" <?php if($selectedTimezone == $timezone): ?> selected <?php endif; ?>><?php echo e($timezone); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['timezone'];
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
            <label class="input-label"><?php echo e(trans('public.capacity')); ?></label>
            <input type="number" name="capacity" value="<?php echo e((!empty($upcomingCourse) and !empty($upcomingCourse->capacity)) ? $upcomingCourse->capacity : old('capacity')); ?>" class="form-control <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('forms.capacity_placeholder')); ?>"/>
            <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.class_url_hint')); ?></div>
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

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.price')); ?> (<?php echo e($currency); ?>)</label>
            <input type="text" name="price" value="<?php echo e((!empty($upcomingCourse) and !empty($upcomingCourse->price)) ? convertPriceToUserCurrency($upcomingCourse->price) : old('price')); ?>" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
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

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.duration')); ?> (<?php echo e(trans('public.minutes')); ?>)</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="timeInputGroupPrepend">
                        <i class="fa fa-clock"></i>
                    </span>
                </div>

                <input type="number" name="duration" value="<?php echo e((!empty($upcomingCourse) and !empty($upcomingCourse->duration)) ? $upcomingCourse->duration : old('duration')); ?>" class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" min="0"/>
                <?php $__errorArgs = ['duration'];
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
            <label class="input-label"><?php echo e(trans('update.sections')); ?></label>
            <input type="number" min="0" name="sections" value="<?php echo e((!empty($upcomingCourse) and !empty($upcomingCourse->sections)) ? $upcomingCourse->sections : old('sections')); ?>" class="form-control <?php $__errorArgs = ['sections'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.upcoming_sections_hint')); ?></div>
            <?php $__errorArgs = ['sections'];
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
            <label class="input-label"><?php echo e(trans('public.parts')); ?></label>
            <input type="number" min="0" name="parts" value="<?php echo e((!empty($upcomingCourse) and !empty($upcomingCourse->parts)) ? $upcomingCourse->parts : old('parts')); ?>" class="form-control <?php $__errorArgs = ['parts'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.upcoming_parts_hint')); ?></div>
            <?php $__errorArgs = ['parts'];
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
            <label class="input-label"><?php echo e(trans('update.course_progress')); ?></label>
            <input type="number" min="0" name="course_progress" value="<?php echo e((!empty($upcomingCourse) and !empty($upcomingCourse->course_progress)) ? $upcomingCourse->course_progress : old('course_progress')); ?>" class="form-control <?php $__errorArgs = ['course_progress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('update.progress_placeholder')); ?>"/>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.upcoming_progress_hint')); ?></div>
            <?php $__errorArgs = ['course_progress'];
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

        <div class="row">
            <div class="col-12 col-md-6">

                <div class="form-group d-flex align-items-center justify-content-between">
                    <label class="cursor-pointer input-label" for="supportSwitch"><?php echo e(trans('webinars.support')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="support" class="custom-control-input" id="supportSwitch" <?php echo e(((!empty($upcomingCourse) && $upcomingCourse->support) or old('support') == 'on') ? 'checked' :  ''); ?>>
                        <label class="custom-control-label" for="supportSwitch"></label>
                    </div>
                </div>

                <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                    <label class="cursor-pointer input-label" for="certificateSwitch"><?php echo e(trans('update.include_certificate')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="certificate" class="custom-control-input" id="certificateSwitch" <?php echo e(((!empty($upcomingCourse) && $upcomingCourse->certificate) or old('certificate') == 'on') ? 'checked' :  ''); ?>>
                        <label class="custom-control-label" for="certificateSwitch"></label>
                    </div>
                </div>

                <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                    <label class="cursor-pointer input-label" for="quizzesSwitch"><?php echo e(trans('update.certificate_included')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="include_quizzes" class="custom-control-input" id="quizzesSwitch" <?php echo e(((!empty($upcomingCourse) && $upcomingCourse->include_quizzes) or old('quizzes') == 'on') ? 'checked' :  ''); ?>>
                        <label class="custom-control-label" for="quizzesSwitch"></label>
                    </div>
                </div>

                <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                    <label class="cursor-pointer input-label" for="downloadableSwitch"><?php echo e(trans('home.downloadable')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="downloadable" class="custom-control-input" id="downloadableSwitch" <?php echo e(((!empty($upcomingCourse) && $upcomingCourse->downloadable) or old('downloadable') == 'on') ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="downloadableSwitch"></label>
                    </div>
                </div>

                <div class="form-group mt-30 d-flex align-items-center justify-content-between ">
                    <label class="cursor-pointer input-label" for="forumSwitch"><?php echo e(trans('update.course_forum')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="forum" class="custom-control-input" id="forumSwitch" <?php echo e(!empty($upcomingCourse) && $upcomingCourse->forum ? 'checked' : (old('forum') ? 'checked' : '')); ?>>
                        <label class="custom-control-label" for="forumSwitch"></label>
                    </div>
                </div>

            </div>
        </div>

        
        <?php if(!empty($upcomingCourse)): ?>
            <?php echo $__env->make('admin.product_badges.content_include', ['itemTarget' => $upcomingCourse], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>


        <div class="form-group mt-15">
            <label class="input-label d-block"><?php echo e(trans('public.tags')); ?></label>
            <input type="text" name="tags" data-max-tag="5" value="<?php echo e(!empty($upcomingCourse) ? implode(',', $upcomingCourseTags) : ''); ?>" class="form-control inputtags" placeholder="<?php echo e(trans('public.type_tag_name_and_press_enter')); ?> (<?php echo e(trans('admin/main.max')); ?> : 5)"/>
        </div>


        <div class="form-group mt-15">
            <label class="input-label"><?php echo e(trans('public.category')); ?></label>

            <select id="categories" class="custom-select <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_id" required>
                <option <?php echo e(!empty($upcomingCourse) ? '' : 'selected'); ?> disabled><?php echo e(trans('public.choose_category')); ?></option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                        <optgroup label="<?php echo e($category->title); ?>">
                            <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subCategory->id); ?>" <?php echo e((!empty($upcomingCourse) and $upcomingCourse->category_id == $subCategory->id) ? 'selected' : ''); ?>><?php echo e($subCategory->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    <?php else: ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e((!empty($upcomingCourse) and $upcomingCourse->category_id == $category->id) ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <?php $__errorArgs = ['category_id'];
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

<div class="form-group mt-15 <?php echo e((!empty($upcomingCourseCategoryFilters) and count($upcomingCourseCategoryFilters)) ? '' : 'd-none'); ?>" id="categoriesFiltersContainer">
    <span class="input-label d-block"><?php echo e(trans('public.category_filters')); ?></span>
    <div id="categoriesFiltersCard" class="row mt-3">

        <?php if(!empty($upcomingCourseCategoryFilters) and count($upcomingCourseCategoryFilters)): ?>
            <?php $__currentLoopData = $upcomingCourseCategoryFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-3">
                    <div class="webinar-category-filters">
                        <strong class="category-filter-title d-block"><?php echo e($filter->title); ?></strong>
                        <div class="py-10"></div>

                        <?php
                            $upcomingCourseFilterOptions = $upcomingCourse->filterOptions->pluck('filter_option_id')->toArray();

                            if (!empty(old('filters'))) {
                                $upcomingCourseFilterOptions = array_merge($upcomingCourseFilterOptions, old('filters'));
                            }
                        ?>

                        <?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group mt-3 d-flex align-items-center justify-content-between">
                                <label class="text-gray font-14" for="filterOptions<?php echo e($option->id); ?>"><?php echo e($option->title); ?></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="filters[]" value="<?php echo e($option->id); ?>" <?php echo e(((!empty($upcomingCourseFilterOptions) && in_array($option->id, $upcomingCourseFilterOptions)) ? 'checked' : '')); ?> class="custom-control-input" id="filterOptions<?php echo e($option->id); ?>">
                                    <label class="custom-control-label" for="filterOptions<?php echo e($option->id); ?>"></label>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\upcoming_courses\create\includes\additional_information.blade.php ENDPATH**/ ?>