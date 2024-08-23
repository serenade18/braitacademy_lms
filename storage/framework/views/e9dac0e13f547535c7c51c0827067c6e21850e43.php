<?php $__env->startPush('libraries_top'); ?>

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

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_physical_products')); ?></h4>
                            </div>
                            <div class="card-body d-flex flex-column p-0">
                                <span><?php echo e($totalPhysicalProducts); ?></span>
                                <span class="font-12 font-weight-normal mt-1"><?php echo e(trans('admin/main.sales')); ?>: <?php echo e($totalPhysicalSales); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-file-download"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_virtual_products')); ?></h4>
                            </div>
                            <div class="card-body d-flex flex-column p-0">
                                <span><?php echo e($totalVirtualProducts); ?></span>
                                <span class="font-12 font-weight-normal mt-1"><?php echo e(trans('admin/main.sales')); ?>: <?php echo e($totalVirtualSales); ?></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-store"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_sellers')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalSellers); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_buyers')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalBuyers); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <input type="hidden" name="type" value="<?php echo e(request()->get('type')); ?>">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input name="title" type="text" class="form-control" value="<?php echo e(request()->get('title')); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="from" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="to" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.filter_type')); ?></option>
                                        <option value="has_discount" <?php if(request()->get('sort') == 'has_discount'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.discounted_classes')); ?></option>
                                        <option value="sales_asc" <?php if(request()->get('sort') == 'sales_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.sales_ascending')); ?></option>
                                        <option value="sales_desc" <?php if(request()->get('sort') == 'sales_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.sales_descending')); ?></option>
                                        <option value="price_asc" <?php if(request()->get('sort') == 'price_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.Price_ascending')); ?></option>
                                        <option value="price_desc" <?php if(request()->get('sort') == 'price_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.Price_descending')); ?></option>
                                        <option value="income_asc" <?php if(request()->get('sort') == 'income_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.Income_ascending')); ?></option>
                                        <option value="income_desc" <?php if(request()->get('sort') == 'income_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.Income_descending')); ?></option>
                                        <option value="created_at_asc" <?php if(request()->get('sort') == 'created_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_ascending')); ?></option>
                                        <option value="created_at_desc" <?php if(request()->get('sort') == 'created_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_descending')); ?></option>
                                        <option value="updated_at_asc" <?php if(request()->get('sort') == 'updated_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.update_date_ascending')); ?></option>
                                        <option value="updated_at_desc" <?php if(request()->get('sort') == 'updated_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.update_date_descending')); ?></option>
                                        <option value="inventory_asc" <?php if(request()->get('sort') == 'inventory_asc'): ?> selected <?php endif; ?>><?php echo e(trans('update.inventory_asc')); ?></option>
                                        <option value="inventory_desc" <?php if(request()->get('sort') == 'inventory_desc'): ?> selected <?php endif; ?>><?php echo e(trans('update.inventory_desc')); ?></option>
                                        <option value="no_inventory" <?php if(request()->get('sort') == 'no_inventory'): ?> selected <?php endif; ?>><?php echo e(trans('update.no_inventory')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.seller')); ?></label>
                                    <select name="creator_ids[]" multiple="multiple" class="form-control search-user-select2"
                                            data-placeholder="<?php echo e(trans('update.search_seller')); ?>">

                                        <?php if(!empty($teachers) and $teachers->count() > 0): ?>
                                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($teacher->id); ?>" selected><?php echo e($teacher->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.category')); ?></label>
                                    <select name="category_id" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_categories')); ?></option>

                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                                                <optgroup label="<?php echo e($category->title); ?>">
                                                    <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($subCategory->id); ?>" <?php if(request()->get('category_id') == $subCategory->id): ?> selected="selected" <?php endif; ?>><?php echo e($subCategory->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </optgroup>
                                            <?php else: ?>
                                                <option value="<?php echo e($category->id); ?>" <?php if(request()->get('category_id') == $category->id): ?> selected="selected" <?php endif; ?>><?php echo e($category->title); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="pending" <?php if(request()->get('status') == 'pending'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.pending')); ?></option>
                                        <option value="inactive" <?php if(request()->get('status') == 'inactive'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.rejected')); ?></option>
                                        <option value="draft" <?php if(request()->get('status') == 'draft'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.draft')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group mt-1">
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
                        <div class="card-header text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_export_products')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/store/products/excel?<?php echo e(!empty($inHouseProducts) ? 'in_house_products=true&' : ''); ?><?php echo e(http_build_query(request()->all())); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                            <?php endif; ?>

                            <?php if(!empty($inHouseProducts)): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_new_product')): ?>
                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/store/products/create?in_house_product=true" target="_blank" class="btn btn-primary ml-2"><?php echo e(trans('update.create_new_product')); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.id')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.creator')); ?></th>
                                        <th><?php echo e(trans('admin/main.type')); ?></th>
                                        <th><?php echo e(trans('update.inventory')); ?></th>
                                        <th><?php echo e(trans('admin/main.price')); ?></th>
                                        <th><?php echo e(trans('update.delivery_fee')); ?></th>
                                        <th><?php echo e(trans('admin/main.sales')); ?></th>
                                        <th><?php echo e(trans('admin/main.income')); ?></th>
                                        <th><?php echo e(trans('admin/main.updated_at')); ?></th>
                                        <th><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <td><?php echo e($product->id); ?></td>
                                            <td width="18%" class="text-left">
                                                <a class="text-primary mt-0 mb-1 font-weight-bold" href="<?php echo e($product->getUrl()); ?>"><?php echo e($product->title); ?></a>
                                                <?php if(!empty($product->category->title)): ?>
                                                    <div class="text-small"><?php echo e($product->category->title); ?></div>
                                                <?php else: ?>
                                                    <div class="text-small text-warning"><?php echo e(trans('admin/main.no_category')); ?></div>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-left"><?php echo e($product->creator->full_name); ?></td>

                                            <td>
                                                <?php echo e(trans('update.'.$product->type)); ?>

                                            </td>

                                            <td>
                                                <span class="text-primary mt-0 mb-1 font-weight-bold">
                                                    <?php
                                                        $getAvailability = $product->getAvailability();
                                                    ?>

                                                    <?php echo e(($getAvailability == 99999) ? trans('update.unlimited') : $getAvailability); ?>

                                                </span>
                                            </td>

                                            <td>
                                                <?php echo e(!empty($product->price) ? handlePrice($product->price, true, true, false, null, true, 'store') : '-'); ?>

                                            </td>

                                            <td>
                                                <?php echo e($product->delivery_fee ? handlePrice($product->delivery_fee) : '-'); ?>

                                            </td>

                                            <td>
                                                <span class="text-primary mt-0 mb-1 font-weight-bold">
                                                    <?php echo e($product->salesCount()); ?>

                                                </span>
                                            </td>

                                            <td><?php echo e(handlePrice($product->sales()->sum('total_amount'))); ?></td>

                                            <td class="font-12"><?php echo e(dateTimeFormat($product->updated_at, 'Y M j | H:i')); ?></td>

                                            <td class="font-12"><?php echo e(dateTimeFormat($product->created_at, 'Y M j | H:i')); ?></td>

                                            <td>
                                                <?php switch($product->status):
                                                    case (\App\Models\Product::$active): ?>
                                                        <div class="text-success font-600-bold"><?php echo e(trans('admin/main.published')); ?></div>
                                                        <?php break; ?>
                                                    <?php case (\App\Models\Product::$draft): ?>
                                                        <span class="text-dark"><?php echo e(trans('admin/main.is_draft')); ?></span>
                                                        <?php break; ?>
                                                    <?php case (\App\Models\Product::$pending): ?>
                                                        <span class="text-warning"><?php echo e(trans('admin/main.waiting')); ?></span>
                                                        <?php break; ?>
                                                    <?php case (\App\Models\Product::$inactive): ?>
                                                        <span class="text-danger"><?php echo e(trans('public.rejected')); ?></span>
                                                        <?php break; ?>
                                                <?php endswitch; ?>
                                            </td>

                                            <td width="120" class="btn-sm">

                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu text-left webinars-lists-dropdown">

                                                        <?php if(in_array($product->status, [\App\Models\Product::$pending, \App\Models\Product::$inactive])): ?>
                                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                                'url' => getAdminPanelUrl("/store/products/{$product->id}/approve"),
                                                                'btnClass' => 'd-flex align-items-center text-success text-decoration-none btn-transparent btn-sm mb-1',
                                                                'btnText' => '<i class="fa fa-check"></i><span class="ml-2">'. trans("admin/main.approve") .'</span>'
                                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>

                                                        <?php if($product->status == \App\Models\Product::$pending): ?>
                                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                                'url' => getAdminPanelUrl("/store/products/{$product->id}/reject"),
                                                                'btnClass' => 'd-flex align-items-center text-danger text-decoration-none btn-transparent btn-sm mb-1',
                                                                'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.reject") .'</span>'
                                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>

                                                        <?php if($product->status == \App\Models\Product::$active): ?>
                                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                                'url' => getAdminPanelUrl("/store/products/{$product->id}/unpublish"),
                                                                'btnClass' => 'd-flex align-items-center text-danger text-decoration-none btn-transparent btn-sm mb-1',
                                                                'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.unpublish") .'</span>'
                                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_edit_product')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/store/products/<?php echo e($product->id); ?>/edit" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mb-1 " title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                <i class="fa fa-edit"></i>
                                                                <span class="ml-2"><?php echo e(trans('admin/main.edit')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_delete_product')): ?>
                                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl().'/store/products/'.$product->id.'/delete',
                                                                    'btnClass' => 'd-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.delete") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($products->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\store\products\lists.blade.php ENDPATH**/ ?>