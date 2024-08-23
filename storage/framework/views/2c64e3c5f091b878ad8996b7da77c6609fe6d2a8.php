<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/leaflet/leaflet.css">
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<section class="mt-30">

    <?php if(!$user->isUser()): ?>
        <h2 class="section-title after-line"><?php echo e(trans('update.settings')); ?></h2>

        <div class="row mt-20">
            <div class="col-12 col-lg-4">

                <div class="form-group mb-30 mt-30">
                    <label class="input-label"><?php echo e(trans('update.gender')); ?>:</label>

                    <div class="d-flex align-items-center">
                        <div class="custom-control custom-radio">
                            <input type="radio" name="gender" value="man" <?php echo e((!empty($user->gender) and $user->gender == 'man') ? 'checked="checked"' : ''); ?> id="man" class="custom-control-input">
                            <label class="custom-control-label font-14 cursor-pointer" for="man"><?php echo e(trans('update.man')); ?></label>
                        </div>

                        <div class="custom-control custom-radio ml-15">
                            <input type="radio" name="gender" value="woman" id="woman" <?php echo e((!empty($user->gender) and $user->gender == 'woman') ? 'checked="checked"' : ''); ?> class="custom-control-input">
                            <label class="custom-control-label font-14 cursor-pointer" for="woman"><?php echo e(trans('update.woman')); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-30">
                    <label class="input-label"><?php echo e(trans('update.age')); ?>:</label>
                    <input type="number" name="age" value="<?php echo e(!empty($user->age) ? $user->age : ''); ?>" class="form-control">
                </div>

                <div class="form-group mb-30">
                    <label class="input-label"><?php echo e(trans('update.meeting_type')); ?>:</label>

                    <div class="d-flex align-items-center">
                        <div class="custom-control custom-radio">
                            <input type="radio" name="meeting_type" value="in_person" id="in_person" <?php echo e((!empty($user->meeting_type) and $user->meeting_type == 'in_person') ? 'checked="checked"' : ''); ?> class="custom-control-input">
                            <label class="custom-control-label font-14 cursor-pointer" for="in_person"><?php echo e(trans('update.in_person')); ?></label>
                        </div>

                        <div class="custom-control custom-radio ml-10">
                            <input type="radio" name="meeting_type" value="online" id="online" <?php echo e((!empty($user->meeting_type) and $user->meeting_type == 'online') ? 'checked="checked"' : ''); ?> class="custom-control-input">
                            <label class="custom-control-label font-14 cursor-pointer" for="online"><?php echo e(trans('update.online')); ?></label>
                        </div>

                        <div class="custom-control custom-radio ml-10">
                            <input type="radio" name="meeting_type" value="all" id="all" <?php echo e((!empty($user->meeting_type) and $user->meeting_type == 'all') ? 'checked="checked"' : ''); ?> class="custom-control-input">
                            <label class="custom-control-label font-14 cursor-pointer" for="all"><?php echo e(trans('public.all')); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-30">
                    <label class="input-label"><?php echo e(trans('update.level_of_training')); ?>:</label>

                    <div class="d-flex align-items-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="level_of_training[]" value="beginner" id="beginner" <?php echo e((!empty($user->level_of_training) and is_array($user->level_of_training) and in_array('beginner',$user->level_of_training)) ? 'checked="checked"' : ''); ?> class="custom-control-input">
                            <label class="custom-control-label font-14 cursor-pointer" for="beginner"><?php echo e(trans('update.beginner')); ?></label>
                        </div>

                        <div class="custom-control custom-checkbox ml-10">
                            <input type="checkbox" name="level_of_training[]" value="middle" id="middle" <?php echo e((!empty($user->level_of_training) and is_array($user->level_of_training) and in_array('middle',$user->level_of_training)) ? 'checked="checked"' : ''); ?> class="custom-control-input">
                            <label class="custom-control-label font-14 cursor-pointer" for="middle"><?php echo e(trans('update.middle')); ?></label>
                        </div>

                        <div class="custom-control custom-checkbox ml-10">
                            <input type="checkbox" name="level_of_training[]" value="expert" id="expert" <?php echo e((!empty($user->level_of_training) and is_array($user->level_of_training) and in_array('expert',$user->level_of_training)) ? 'checked="checked"' : ''); ?> class="custom-control-input">
                            <label class="custom-control-label font-14 cursor-pointer" for="expert"><?php echo e(trans('update.expert')); ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="section-title after-line"><?php echo e(trans('update.region')); ?></h2>

        <div class="row mt-30">
            <div class="col-12 col-lg-4">
                <div class="form-group ">
                    <label class="input-label"><?php echo e(trans('update.country')); ?>:</label>

                    <select name="country_id" class="form-control " <?php echo e(empty($countries) ? 'disabled' : ''); ?>>
                        <option value=""><?php echo e(trans('update.select_country')); ?></option>

                        <?php if(!empty($countries)): ?>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $country->geo_center = \Geo::get_geo_array($country->geo_center);
                                ?>

                                <option value="<?php echo e($country->id); ?>" data-center="<?php echo e(implode(',', $country->geo_center)); ?>" <?php echo e((($user->country_id == $country->id) or old('country_id') == $country->id) ? 'selected' : ''); ?>><?php echo e($country->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group mt-30">
                    <label class="input-label"><?php echo e(trans('update.province')); ?>:</label>

                    <select name="province_id" class="form-control " <?php echo e(empty($provinces) ? 'disabled' : ''); ?>>
                        <option value=""><?php echo e(trans('update.select_province')); ?></option>

                        <?php if(!empty($provinces)): ?>
                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $province->geo_center = \Geo::get_geo_array($province->geo_center);
                                ?>

                                <option value="<?php echo e($province->id); ?>" data-center="<?php echo e(implode(',', $province->geo_center)); ?>" <?php echo e((($user->province_id == $province->id) or old('province_id') == $province->id) ? 'selected' : ''); ?>><?php echo e($province->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group mt-30">
                    <label class="input-label"><?php echo e(trans('update.city')); ?>:</label>

                    <select name="city_id" class="form-control " <?php echo e(empty($cities) ? 'disabled' : ''); ?>>
                        <option value=""><?php echo e(trans('update.select_city')); ?></option>

                        <?php if(!empty($cities)): ?>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $city->geo_center = \Geo::get_geo_array($city->geo_center);
                                ?>

                                <option value="<?php echo e($city->id); ?>" data-center="<?php echo e(implode(',', $city->geo_center)); ?>" <?php echo e((($user->city_id == $city->id) or old('city_id') == $city->id) ? 'selected' : ''); ?>><?php echo e($city->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group mt-30">
                    <label class="input-label"><?php echo e(trans('update.district')); ?>:</label>

                    <select name="district_id" class="form-control " <?php echo e(empty($districts) ? 'disabled' : ''); ?>>
                        <option value=""><?php echo e(trans('update.select_district')); ?></option>

                        <?php if(!empty($districts)): ?>
                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $district->geo_center = \Geo::get_geo_array($district->geo_center);
                                ?>

                                <option value="<?php echo e($district->id); ?>" data-center="<?php echo e(implode(',', $district->geo_center)); ?>" <?php echo e((($user->district_id == $district->id) or old('district_id') == $district->id) ? 'selected' : ''); ?>><?php echo e($district->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group mb-30">
                    <label class="input-label"><?php echo e(trans('update.address')); ?>:</label>
                    <input type="text" name="address" value="<?php echo e(!empty($user->address) ? $user->address : ''); ?>" class="form-control">
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="form-group">
                    <input type="hidden" id="LocationLatitude" name="latitude" value="<?php echo e((!empty($user->location)) ? $user->location[0] : ''); ?>">
                    <input type="hidden" id="LocationLongitude" name="longitude" value="<?php echo e((!empty($user->location)) ? $user->location[1] : ''); ?>">

                    <div id="mapContainer" class="d-none">
                        <label class="input-label"><?php echo e(trans('update.select_location')); ?></label>
                        <span class="d-block font-12 text-gray"><?php echo e(trans('update.select_location_hint')); ?></span>

                        <div class="region-map mt-10" id="mapBox"
                             data-zoom="12"
                        >
                            <img src="/assets/default/img/location.png" class="marker">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(!empty(getFeaturesSettings('show_live_chat_widget'))): ?>
            <h2 class="section-title after-line"><?php echo e(trans('update.live_chat_widget')); ?></h2>

            <div class="row mt-30">
                <div class="col-12 col-lg-4">

                    <div class="form-group ">
                        <label class="input-label"><?php echo e(trans('update.java_script_code')); ?>:</label>
                        <textarea name="live_chat_js_code" class="form-control" rows="8"><?php echo e($user->live_chat_js_code); ?></textarea>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        
    <?php endif; ?>

    <?php if(!empty($formFieldsHtml)): ?>
        <h2 class="section-title after-line mt-30"><?php echo e(trans('update.forms')); ?></h2>

        <div class="row mt-20">
            <div class="col-12 col-lg-4">
                <?php echo $formFieldsHtml; ?>

            </div>
        </div>
    <?php endif; ?>

    <div class="mt-30">
        <h2 class="section-title after-line "><?php echo e(trans('update.login_history')); ?></h2>

        <div class="table-responsive mt-15">
            <table class="table text-center custom-table">
                <thead>
                <th class="text-left"><?php echo e(trans('update.os')); ?></th>
                <th class="text-center"><?php echo e(trans('update.browser')); ?></th>
                <th class="text-center"><?php echo e(trans('update.device')); ?></th>
                <th class="text-center"><?php echo e(trans('update.ip_address')); ?></th>
                <th class="text-center"><?php echo e(trans('update.country')); ?></th>
                <th class="text-center"><?php echo e(trans('update.city')); ?></th>
                <th class="text-center"><?php echo e(trans('update.session_start')); ?></th>
                <th class="text-center"><?php echo e(trans('update.session_end')); ?></th>
                <th class="text-center"><?php echo e(trans('public.duration')); ?></th>
                <th class="text-right"><?php echo e(trans('admin/main.actions')); ?></th>
                </thead>

                <tbody>
                <?php if(!empty($userLoginHistories)): ?>
                    <?php $__currentLoopData = $userLoginHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td class="text-left"><?php echo e($session->os ?? '-'); ?></td>

                            <td class="text-center"><?php echo e($session->browser ?? '-'); ?></td>

                            <td class="text-center"><?php echo e($session->device ?? '-'); ?></td>

                            <td class="text-center"><?php echo e($session->ip ?? '-'); ?></td>

                            <td class="text-center"><?php echo e($session->country ?? '-'); ?></td>

                            <td class="text-center"><?php echo e($session->city ?? '-'); ?></td>

                            <td class="text-center"><?php echo e(dateTimeFormat($session->session_start_at, 'j M Y H:i')); ?></td>

                            <td class="text-center"><?php echo e(!empty($session->session_end_at) ? dateTimeFormat($session->session_end_at, 'j M Y H:i') : '-'); ?></td>

                            <td class="text-center"><?php echo e($session->getDuration()); ?></td>

                            <td class="text-right mb-2" width="120">
                                <a
                                    href="/panel/users/login-history/<?php echo e($session->id); ?>/end-session"
                                    data-title="<?php echo e(trans('update.this_device_will_be_logout_from_your_account')); ?>"
                                    data-confirm="<?php echo e(trans('update.end_session')); ?>"
                                    class="delete-action font-12 text-primary">
                                    <?php echo e(trans('update.end_session')); ?>

                                </a>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</section>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>

    <script src="/assets/vendors/leaflet/leaflet.min.js"></script>

    <script>
        var selectProvinceLang = '<?php echo e(trans('update.select_province')); ?>';
        var selectCityLang = '<?php echo e(trans('update.select_city')); ?>';
        var selectDistrictLang = '<?php echo e(trans('update.select_district')); ?>';
        var leafletApiPath = '<?php echo e(getLeafletApiPath()); ?>';
    </script>

    <script src="/assets/default/js/panel/user_settings_tab.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\setting\setting_includes\settings.blade.php ENDPATH**/ ?>