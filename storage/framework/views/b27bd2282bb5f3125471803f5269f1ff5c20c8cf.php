<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.special_offers')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.special_offers')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control text-center" name="name" value="<?php echo e(request()->get('name')); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.expiration_from')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.expiration_to')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_users_discount')); ?></option>
                                        <option value="percent_asc" <?php if(request()->get('sort') == 'percent_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.percentage_ascending')); ?></option>
                                        <option value="percent_desc" <?php if(request()->get('sort') == 'percent_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.percentage_descending')); ?></option>
                                        <option value="created_at_asc" <?php if(request()->get('sort') == 'created_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_ascending')); ?></option>
                                        <option value="created_at_desc" <?php if(request()->get('sort') == 'created_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_descending')); ?></option>
                                        <option value="expire_at_asc" <?php if(request()->get('sort') == 'expire_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.expire_date_ascending')); ?></option>
                                        <option value="expire_at_desc" <?php if(request()->get('sort') == 'expire_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.expire_date_descending')); ?></option>
                                    </select>
                                </div>
                            </div>

                            <?php
                                $types = [
                                    'courses' => 'webinar_id',
                                    'bundles' => 'bundle_id',
                                    'subscription_packages' => 'subscribe_id',
                                    'registration_packages' => 'registration_package_id',
                                ];
                            ?>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.type')); ?></label>
                                    <select name="type" class="form-control ">
                                        <option value=""><?php echo e(trans('update.select_type')); ?></option>

                                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $typeItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($typeItem); ?>" <?php echo e((request()->get('type') == $typeItem) ? 'selected' : ''); ?>><?php echo e(trans('update.'.$type)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.class')); ?></label>
                                    <select name="webinar_ids[]" multiple="multiple" class="form-control search-webinar-select2"
                                            data-placeholder="Search classes">

                                        <?php if(!empty($webinars) and $webinars->count() > 0): ?>
                                            <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($webinar->id); ?>" selected><?php echo e($webinar->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.active')); ?></option>
                                        <option value="inactive" <?php if(request()->get('status') == 'inactive'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.inactive')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label mb-4"> </label>
                                    <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 text-center">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.item')); ?></th>
                                        <th><?php echo e(trans('admin/main.percentage')); ?></th>
                                        <th><?php echo e(trans('admin/main.from_date')); ?></th>
                                        <th><?php echo e(trans('admin/main.to_date')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $specialOffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialOffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($specialOffer->name); ?></td>

                                            <td class="text-left">
                                                <?php if(!empty($specialOffer->webinar_id)): ?>
                                                    <span class="d-block font-14"><?php echo e($specialOffer->webinar->title); ?></span>
                                                    <span class="d-block font-12 text-muted"><?php echo e(trans('admin/main.course')); ?></span>
                                                <?php elseif($specialOffer->bundle_id): ?>
                                                    <span class="d-block font-14"><?php echo e($specialOffer->bundle->title); ?></span>
                                                    <span class="d-block font-12 text-muted"><?php echo e(trans('update.bundle')); ?></span>
                                                <?php elseif($specialOffer->subscribe_id): ?>
                                                    <span class="d-block font-14"><?php echo e($specialOffer->subscribe->title); ?></span>
                                                    <span class="d-block font-12 text-muted"><?php echo e(trans('public.subscribe')); ?></span>
                                                <?php elseif($specialOffer->registration_package_id): ?>
                                                    <span class="d-block font-14"><?php echo e($specialOffer->registrationPackage->title); ?></span>
                                                    <span class="d-block font-12 text-muted"><?php echo e(trans('update.registration_package')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td><?php echo e($specialOffer->percent ?  $specialOffer->percent . '%' : '-'); ?></td>

                                            <td><?php echo e(dateTimeFormat($specialOffer->from_date, 'Y/m/d h:i:s')); ?></td>

                                            <td><?php echo e(dateTimeFormat($specialOffer->to_date, 'Y/m/d h:i:s')); ?></td>

                                            <td>
                                                <span class="<?php echo e(($specialOffer->status == 'active') ? 'text-success' : 'text-danger'); ?>"><?php echo e(trans('admin/main.'.$specialOffer->status)); ?></span>
                                            </td>

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/special_offers/<?php echo e($specialOffer->id); ?>/edit" class="btn-transparent text-primary btn-sm" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/financial/special_offers/'. $specialOffer->id.'/delete','btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($specialOffers->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\special_offers\lists.blade.php ENDPATH**/ ?>