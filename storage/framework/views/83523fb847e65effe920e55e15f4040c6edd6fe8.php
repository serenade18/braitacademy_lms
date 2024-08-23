<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.reviews')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.reviews')); ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total_reviews')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalReviews); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-eye"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.published_reviews')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($publishedReviews); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-calculator"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.rates_average')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($ratesAverage); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-comment-slash"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.products_without_review')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($productsWithoutReview); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control" name="search" placeholder="" value="<?php echo e(request()->get('search')); ?>">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.products')); ?></label>
                                    <select name="product_ids[]" multiple="multiple" class="form-control search-product-select2"
                                            data-placeholder="<?php echo e(trans('update.search_product')); ?>">

                                        <?php if(!empty($products) and $products->count() > 0): ?>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product->id); ?>" selected><?php echo e($product->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.published')); ?></option>
                                        <option value="pending" <?php if(request()->get('status') == 'pending'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.hidden')); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group mt-1">
                                    <label class="input-label mb-4"> </label>
                                    <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </section>

            <section class="card">
                <div class="card-body">
                    <table class="table table-striped font-14" id="datatable-details">

                        <tr>
                            <th class="text-left"><?php echo e(trans('update.product')); ?></th>
                            <th class="text-left"><?php echo e(trans('update.customer')); ?></th>
                            <th class=""><?php echo e(trans('admin/main.comment')); ?></th>
                            <th class=""><?php echo e(trans('admin/main.reply')); ?></th>
                            <th class=""><?php echo e(trans('admin/main.rate')); ?> (5)</th>
                            <th class=""><?php echo e(trans('admin/main.created_at')); ?></th>
                            <th class=""><?php echo e(trans('admin/main.status')); ?></th>
                            <th class=""><?php echo e(trans('admin/main.actions')); ?></th>
                        </tr>

                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-left">
                                    <a href="<?php echo e($review->product->getUrl()); ?>" target="_blank"><?php echo e($review->product->title); ?></a>
                                </td>

                                <td class="text-left"><?php echo e($review->creator->full_name); ?></td>

                                <td>
                                    <button type="button" class="js-show-description btn btn-outline-primary"><?php echo e(trans('admin/main.show')); ?></button>
                                    <input type="hidden" value="<?php echo e(nl2br($review->description)); ?>">
                                </td>

                                <td class=""><?php echo e($review->comments_count); ?></td>

                                <td class=""><?php echo e($review->rates); ?></td>

                                <td class=""><?php echo e(dateTimeFormat($review->created_at,'j M Y | H:i')); ?></td>

                                <td class="">
                                    <?php if($review->status == 'active'): ?>
                                        <b class="f-w-b text-success"><?php echo e(trans('admin/main.published')); ?></b>
                                    <?php else: ?>
                                        <b class="f-w-b text-warning"><?php echo e(trans('admin/main.hidden')); ?></b>
                                    <?php endif; ?>
                                </td>
                                <td class="" width="50">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_reviews_status_toggle')): ?>
                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/store/reviews/<?php echo e($review->id); ?>/toggleStatus" class="btn-transparent text-primary mr-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(($review->status == 'active') ? 'Hidden' : 'Publish'); ?>">
                                            <?php if($review->status == 'active'): ?>
                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                            <?php else: ?>
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_reviews_detail_show')): ?>
                                        <input type="hidden" class="js-product_quality" value="<?php echo e($review->product_quality); ?>">
                                        <input type="hidden" class="js-purchase_worth" value="<?php echo e($review->purchase_worth); ?>">
                                        <input type="hidden" class="js-delivery_quality" value="<?php echo e($review->delivery_quality); ?>">
                                        <input type="hidden" class="js-seller_quality" value="<?php echo e($review->seller_quality); ?>">


                                        <button type="button" class="js-show-product-review-details btn-transparent text-primary mr-1" data-toggle="tooltip" data-placement="top" title="Rate Detail">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_reviews_reply')): ?>
                                        <a href="<?php echo e(getAdminPanelUrl("/store/reviews/{$review->id}/reply")); ?>" target="_blank" class="btn-transparent text-primary mr-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.reply')); ?>">
                                            <i class="fa fa-reply"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_reviews_delete')): ?>
                                        <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/store/reviews/'. $review->id.'/delete','btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </table>
                </div>
            </section>
        </div>
    </section>

    <div class="modal fade" id="reviewRateDetail" tabindex="-1" aria-labelledby="contactMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactMessageLabel"><?php echo e(trans('admin/main.view_rates_details')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-between border-bottom py-2">
                        <span class="font-weight-bold"><?php echo e(trans('update.product')); ?>:</span>
                        <span class="js-product_quality"></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-bottom py-2">
                        <span class="font-weight-bold"><?php echo e(trans('product.purchase_worth')); ?>:</span>
                        <span class="js-purchase_worth"></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-bottom py-2">
                        <span class="font-weight-bold"><?php echo e(trans('update.delivery')); ?>:</span>
                        <span class="js-delivery_quality"></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-bottom py-2">
                        <span class="font-weight-bold"><?php echo e(trans('update.seller')); ?>:</span>
                        <span class="js-seller_quality"></span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="contactMessage" tabindex="-1" aria-labelledby="contactMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactMessageLabel"><?php echo e(trans('admin/main.message')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/reviews.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\store\reviews\lists.blade.php ENDPATH**/ ?>