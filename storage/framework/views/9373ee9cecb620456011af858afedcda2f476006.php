<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.feature_webinars')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.feature_webinars')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form action="<?php echo e(getAdminPanelUrl()); ?>/webinars/features" method="get" class="row mb-0">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('admin/main.page')); ?></label>
                                        <select class="custom-select" name="page">
                                            <option selected disabled><?php echo e(trans('admin/main.select_page')); ?></option>
                                            <option value=""><?php echo e(trans('admin/main.all')); ?></option>
                                            <?php $__currentLoopData = \App\Models\FeatureWebinar::$pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($page); ?>" <?php if(request()->get('page', null) == $page): ?> selected="selected" <?php endif; ?>><?php echo e(trans('admin/main.page_'.$page)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                        <select class="custom-select" name="status">
                                            <option selected disabled><?php echo e(trans('admin/main.status')); ?></option>
                                            <option value=""><?php echo e(trans('admin/main.all')); ?></option>
                                            <option value="pending" <?php if(request()->get('status', null) == 'pending'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('admin/main.pending')); ?></option>
                                            <option value="publish" <?php if(request()->get('status', null) == 'publish'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('admin/main.published')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('admin/main.webinar_title')); ?></label>
                                        <input type="text" name="webinar_title" class="form-control" value="<?php echo e(request()->get('webinar_title',null)); ?>"/>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('public.category')); ?></label>

                                        <select id="categories" class="custom-select" name="category_id">
                                            <option <?php echo e(!empty($webinar) ? '' : 'selected'); ?> disabled><?php echo e(trans('public.choose_category')); ?></option>
                                            <option value=""><?php echo e(trans('admin/main.all')); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                                                    <optgroup label="<?php echo e($category->title); ?>">
                                                        <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($subCategory->id); ?>" <?php echo e((request()->get('category_id',null) == $subCategory->id) ? 'selected' : ''); ?>><?php echo e($subCategory->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </optgroup>
                                                <?php else: ?>
                                                    <option value="<?php echo e($category->id); ?>" <?php echo e((!empty($webinar) and $webinar->category_id == $category->id) ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
                            <button type="submit" class="btn btn-primary w-100"><?php echo e(trans('admin/main.show_results')); ?></button>
                        </div>
                    </form>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_feature_webinars_export_excel')): ?>
                                <div class="text-right">
                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/features/excel?<?php echo e(http_build_query(request()->all())); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.webinar_title')); ?></th>
                                        <th><?php echo e(trans('admin/main.webinar_status')); ?></th>
                                        <th class="text-center"><?php echo e(trans('public.date')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.instructor')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.category')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.page')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td>
                                                <a href="<?php echo e($feature->webinar->getUrl()); ?>" target="_blank"><?php echo e($feature->webinar->title); ?></a>
                                            </td>

                                            <td class="text-center"><?php echo e(trans('admin/main.'.$feature->webinar->status)); ?></td>

                                            <td class="text-center"><?php echo e(dateTimeFormat($feature->updated_at, 'j M Y | H:i')); ?></td>
                                            <td class="text-center"><?php echo e($feature->webinar->teacher->full_name); ?></td>
                                            <td class="text-center"><?php echo e($feature->webinar->category->title); ?></td>
                                            <td class="text-center"><?php echo e(trans('admin/main.page_'.$feature->page)); ?></td>
                                            <td class="text-center">
                                                <span class="text-<?php echo e(($feature->status == 'publish') ? 'success' : 'warning'); ?>">
                                                    <?php echo e(($feature->status == 'publish') ? trans('admin/main.published') : trans('admin/main.pending')); ?>

                                                </span>
                                            </td>
                                            <td width="150">
                                                <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/features/<?php echo e($feature->id); ?>/<?php echo e(($feature->status == 'publish') ? 'pending' : 'publish'); ?>" class="btn-transparent btn-sm text-primary">
                                                    <?php if($feature->status == 'publish'): ?>
                                                        <i class="fa fa-eye-slash" data-toggle="tooltip" title="<?php echo e(trans('admin/main.pending')); ?>"></i>
                                                    <?php else: ?>
                                                        <i class="fa fa-eye" data-toggle="tooltip" title="<?php echo e(trans('admin/main.publish')); ?>"></i>
                                                    <?php endif; ?>
                                                </a>

                                                <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/features/<?php echo e($feature->id); ?>/edit" class="btn-sm" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/webinars/features/'. $feature->id .'/delete','btnClass' => 'btn-sm','icon' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($features->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/admin/webinars/feature/lists.blade.php ENDPATH**/ ?>