<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/leaflet/leaflet.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">
            <section class="card">
                <div class="card-body">
                    <form action="<?php echo e(!empty($region) ? getAdminPanelUrl("/regions/{$region->id}/update") : getAdminPanelUrl("/regions/store")); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                        <input type="hidden" name="type" value="<?php echo e(!empty($region) ? $region->type : request()->get('type', \App\Models\Region::$country)); ?>">

                        <div class="row">
                            <div class="col-12 col-lg-6">

                                <div id="countrySelectBox" class="form-group <?php echo e(!empty($countries) ? '' : 'd-none'); ?>">
                                    <label class="input-label"><?php echo e(trans('update.countries')); ?></label>
                                    <select name="country_id" class="form-control search-region-select2 <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-type="<?php echo e(\App\Models\Region::$country); ?>" data-placeholder="<?php echo e(trans('admin/main.search')); ?> <?php echo e(trans('update.countries')); ?>">

                                        <?php if(!empty($countries)): ?>
                                            <option value=""><?php echo e(trans('admin/main.select')); ?> <?php echo e(trans('update.country')); ?></option>

                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->id); ?>" data-center="<?php echo e(implode(',', $country->geo_center)); ?>" <?php echo e(((!empty($region) and $region->country_id == $country->id) or old('country_id') == $country->id) ? 'selected' : ''); ?>><?php echo e($country->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['country_id'];
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

                                <div id="provinceSelectBox" class="form-group <?php echo e(((!empty($region) and ($region->type == \App\Models\Region::$city or $region->type == \App\Models\Region::$district)) or (!empty(request()->get('type')) and (request()->get('type') == \App\Models\Region::$city or request()->get('type') == \App\Models\Region::$district))) ? '' : 'd-none'); ?>">
                                    <label class="input-label"><?php echo e(trans('update.provinces')); ?></label>

                                    <select name="province_id" <?php echo e(empty($provinces) ? 'disabled' : ''); ?> class="form-control <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""><?php echo e(trans('admin/main.select')); ?> <?php echo e(trans('update.province')); ?></option>

                                        <?php if(!empty($provinces)): ?>
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($province->id); ?>" data-center="<?php echo e(implode(',', $province->geo_center)); ?>" <?php echo e(((!empty($region) and $region->province_id == $province->id) or old('province_id') == $province->id) ? 'selected' : ''); ?>><?php echo e($province->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>

                                    <?php $__errorArgs = ['province_id'];
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

                                <div id="citySelectBox" class="form-group <?php echo e(((!empty($region) and $region->type == \App\Models\Region::$district) or (!empty(request()->get('type')) and request()->get('type') == \App\Models\Region::$district)) ? '' : 'd-none'); ?>">
                                    <label class="input-label"><?php echo e(trans('update.city')); ?></label>

                                    <select name="city_id" <?php echo e(empty($cities) ? 'disabled' : ''); ?> class="form-control <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""><?php echo e(trans('admin/main.select')); ?> <?php echo e(trans('update.city')); ?></option>

                                        <?php if(!empty($cities)): ?>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($city->id); ?>" data-center="<?php echo e(implode(',', $city->geo_center)); ?>" <?php echo e(((!empty($region) and $region->city_id == $city->id) or old('city_id') == $city->id) ? 'selected' : ''); ?>><?php echo e($city->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>

                                    <?php $__errorArgs = ['city_id'];
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
                                    <label for="" class="input-label"><?php echo e(trans('admin/main.title')); ?></label>
                                    <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($region) ? $region->title : ''); ?>" placeholder="<?php echo e(trans('admin/main.title')); ?>">
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
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <input type="hidden" id="LocationLatitude" name="latitude" value="<?php echo e($latitude); ?>">
                                    <input type="hidden" id="LocationLongitude" name="longitude" value="<?php echo e($longitude); ?>">

                                    <label class="input-label"><?php echo e(trans('update.select_location')); ?></label>
                                    <span class="d-block"><?php echo e(trans('update.select_location_hint')); ?></span>

                                    <div class="region-map mt-2" id="mapBox"
                                         data-latitude="<?php echo e($latitude); ?>"
                                         data-longitude="<?php echo e($longitude); ?>"
                                         data-zoom="<?php echo e((!empty($region) and $region->type !== \App\Models\Region::$country and $region->type !== \App\Models\Region::$province and !empty($region->geo_center)) ? 12 : 5); ?>"
                                    >
                                        <img src="/assets/default/img/location.png" class="marker">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success mt-4"><?php echo e(trans('admin/main.save')); ?></button>
                    </form>
                </div>
            </section>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/leaflet/leaflet.min.js"></script>

    <script>
        var selectProvinceLang = '<?php echo e(trans('update.select_province')); ?>';
        var selectCityLang = '<?php echo e(trans('update.select_city')); ?>';
        var leafletApiPath = '<?php echo e(getLeafletApiPath()); ?>';
    </script>
    <script src="/assets/default/js/admin/regions_create.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/regions/create.blade.php ENDPATH**/ ?>