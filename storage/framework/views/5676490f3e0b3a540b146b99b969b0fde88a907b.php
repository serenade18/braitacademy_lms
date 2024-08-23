<section>
    <h2 class="section-title after-line"><?php echo e(trans('public.basic_information')); ?></h2>

    <div class="row">
        <div class="col-12 col-md-5">
            <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                    <select name="locale" class="form-control <?php echo e(!empty($product) ? 'js-edit-content-locale' : ''); ?>">
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

            <div class="form-group mt-15 ">
                <label class="input-label d-block"><?php echo e(trans('update.select_a_creator')); ?></label>

                <select name="creator_id"
                        class="form-control search-user-select2 <?php $__errorArgs = ['creator_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        data-search-option="except_user"
                        data-allow-clear="false"
                        data-placeholder="<?php echo e(trans('public.search_user')); ?>">

                    <?php if(!empty($product)): ?>
                        <option value="<?php echo e($product->creator->id); ?>" selected><?php echo e($product->creator->full_name); ?></option>
                    <?php elseif(!empty(request()->get('in_house_product'))): ?>
                        <option value="<?php echo e($authUser->id); ?>" selected><?php echo e($authUser->full_name); ?></option>
                    <?php endif; ?>
                </select>

                <?php $__errorArgs = ['creator_id'];
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
                <label class="input-label d-block"><?php echo e(trans('public.type')); ?></label>

                <select name="type" class="custom-select <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="physical" <?php if(!empty($product) and $product->isPhysical()): ?> selected <?php endif; ?>><?php echo e(trans('update.physical')); ?></option>
                    <option value="virtual" <?php if(!empty($product) and $product->isVirtual()): ?> selected <?php endif; ?>><?php echo e(trans('update.virtual')); ?></option>
                </select>

                <?php $__errorArgs = ['type'];
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
                <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                <input type="text" name="title" value="<?php echo e((!empty($product) and !empty($product->translate($locale))) ? $product->translate($locale)->title : old('title')); ?>" class="form-control <?php $__errorArgs = ['title'];
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

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('update.product_url')); ?></label>
                <input type="text" name="slug" value="<?php echo e(!empty($product) ? $product->slug : old('slug')); ?>" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.product_url_hint')); ?></div>
                <?php $__errorArgs = ['slug'];
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
                <label class="input-label"><?php echo e(trans('update.required_points')); ?></label>
                <input type="number" name="point" value="<?php echo e(!empty($product) ? $product->point : old('point')); ?>" class="form-control <?php $__errorArgs = ['point'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.product_points_hint')); ?></div>
                <?php $__errorArgs = ['point'];
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
                <label class="input-label"><?php echo e(trans('admin/main.tax')); ?></label>
                <input type="text" name="tax" value="<?php echo e(!empty($product) ? $product->tax : old('tax')); ?>" class="form-control <?php $__errorArgs = ['tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.product_tax_hint')); ?></div>
                <?php $__errorArgs = ['tax'];
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
                <label class="input-label"><?php echo e(trans('admin/main.commission')); ?></label>

                <div class="row">
                    <div class="col-6">
                        <label class=""><?php echo e(trans("admin/main.type")); ?></label>
                        <select name="commission_type" class="js-commission-type-input form-control" data-currency="<?php echo e($currency); ?>">
                            <option value="percent" <?php echo e((!empty($product) and $product->commission_type == "percent") ? 'selected' : ''); ?>><?php echo e(trans('update.percent')); ?></option>
                            <option value="fixed_amount" <?php echo e((!empty($product) and $product->commission_type == "fixed_amount") ? 'selected' : ''); ?>><?php echo e(trans('update.fixed_amount')); ?></option>
                        </select>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label class="">
                                <?php echo e(trans("update.value")); ?>


                                <span class="ml-1 js-commission-value-span">(<?php echo e(!empty($product) ? (($product->commission_type == "percent") ? '%' : $currency) : '%'); ?>)</span>
                            </label>

                            <input type="number" name="commission" value="<?php echo e(!empty($product) ? $product->commission : old('commission')); ?>" class="js-commission-value-input form-control text-center" <?php echo e((!empty($product) and $product->commission_type == "percent") ? 'maxlength="3" min="0" max="100"' : ''); ?>/>
                        </div>
                    </div>
                </div>

                <div class="text-muted text-small mt-1"><?php echo e(trans('update.product_commission_hint')); ?></div>
                <?php $__errorArgs = ['commission'];
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
                <label class="input-label"><?php echo e(trans('public.seo_description')); ?></label>
                <input type="text" name="seo_description" value="<?php echo e((!empty($product) and !empty($product->translate($locale))) ? $product->translate($locale)->seo_description : old('seo_description')); ?>" class="form-control <?php $__errorArgs = ['seo_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " placeholder="<?php echo e(trans('forms.50_160_characters_preferred')); ?>"/>
                <?php $__errorArgs = ['seo_description'];
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
                <label class="input-label"><?php echo e(trans('public.summary')); ?></label>
                <textarea name="summary" rows="6" class="form-control <?php $__errorArgs = ['summary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " placeholder="<?php echo e(trans('update.product_summary_placeholder')); ?>"><?php echo e((!empty($product) and !empty($product->translate($locale))) ? $product->translate($locale)->summary : old('summary')); ?></textarea>
                <?php $__errorArgs = ['summary'];
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


    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                <textarea id="summernote" name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('forms.webinar_description_placeholder')); ?>"><?php echo (!empty($product) and !empty($product->translate($locale))) ? $product->translate($locale)->description : old('description'); ?></textarea>
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
        </div>
    </div>


    <div class="row">
        <div class="col-6">

            <div class="form-group mb-1 d-flex align-items-center">
                <label class="cursor-pointer mb-0 input-label mr-2" for="orderingSwitch"><?php echo e(trans('update.enable_ordering')); ?></label>
                <div class="custom-control custom-switch d-inline-block">
                    <input type="checkbox" name="ordering" class="custom-control-input" id="orderingSwitch" <?php echo e((!empty($product) and $product->ordering) ? 'checked' :  ''); ?>>
                    <label class="custom-control-label" for="orderingSwitch"></label>
                </div>
            </div>

            <p class="text-gray font-12"><?php echo e(trans('update.create_product_enable_ordering_hint')); ?></p>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\store\products\create\basic_information.blade.php ENDPATH**/ ?>