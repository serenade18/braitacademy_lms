<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>


        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form action="<?php echo e(getAdminPanelUrl("/content-delete-requests")); ?>" method="get" class="row mb-0">
                        <div class="col-12 col-lg-2">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                <input type="text" name="search" class="form-control" value="<?php echo e(request()->get('search',null)); ?>"/>
                            </div>
                        </div>

                        <div class="col-12 col-lg-2">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.content_type')); ?></label>

                                <select name="content_type" class="form-control">
                                    <option value=""><?php echo e(trans('admin/main.all')); ?></option>
                                    <option value="course" <?php echo e((request()->get('content_type') == "course") ? 'selected' : ''); ?>><?php echo e(trans('update.course')); ?></option>
                                    <option value="bundle" <?php echo e((request()->get('content_type') == "bundle") ? 'selected' : ''); ?>><?php echo e(trans('update.bundle')); ?></option>
                                    <option value="product" <?php echo e((request()->get('content_type') == "product") ? 'selected' : ''); ?>><?php echo e(trans('update.product')); ?></option>
                                    <option value="post" <?php echo e((request()->get('content_type') == "post") ? 'selected' : ''); ?>><?php echo e(trans('update.post')); ?></option>
                                </select>
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

                        <div class="col-12 col-lg-2">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>

                                <select name="status" class="form-control">
                                    <option value=""><?php echo e(trans('admin/main.all')); ?></option>
                                    <option value="pending" <?php echo e((request()->get('status') == "pending") ? 'selected' : ''); ?>><?php echo e(trans('admin/main.pending')); ?></option>
                                    <option value="approved" <?php echo e((request()->get('status') == "approved") ? 'selected' : ''); ?>><?php echo e(trans('admin/main.approved')); ?></option>
                                    <option value="rejected" <?php echo e((request()->get('status') == "rejected") ? 'selected' : ''); ?>><?php echo e(trans('admin/main.rejected')); ?></option>
                                </select>
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

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('admin/main.content')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.instructor')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.customers')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.sales')); ?></th>
                                        <th class="text-center"><?php echo e(trans('product.reason')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.published_date')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.request_date')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                        <th class="text-right" width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $contentItem = $request->getContentItem();
                                            $contentType = $request->getContentType();

                                            $contentItemTitle = null;
                                            $customers = null;
                                            $sales = null;
                                            $publishedDate = null;

                                            if (!empty($contentItem)) {
                                                $contentItemTitle = $contentItem->title;
                                                $publishedDate = $contentItem->created_at;

                                                if ($contentType == "course" or $contentType == "bundle") {
                                                    $sales = $contentItem->sales->whereNull('refund_at')->sum('total_amount');
                                                    $customers = $contentItem->sales->whereNull('refund_at')->count();
                                                } elseif ($contentType == "product") {
                                                    $sales = $contentItem->sales()->sum('total_amount');
                                                    $customers = $contentItem->salesCount();
                                                }
                                            } else {
                                                $contentItemTitle = $request->content_title;
                                                $customers = $request->customers_count;
                                                $sales = $request->sales;
                                                $publishedDate = $request->content_published_date;
                                            }
                                        ?>

                                        <tr>
                                            <th class="text-left">
                                                <span class="d-block"><?php echo e($contentItemTitle); ?></span>

                                                <?php if(!empty($contentType)): ?>
                                                    <span class="d-block font-12 text-gray mt-1"><?php echo e(trans('update.'.$contentType)); ?></span>
                                                <?php endif; ?>
                                            </th>

                                            <th class="text-left">
                                                <span class="d-block"><?php echo e($request->user->full_name); ?></span>

                                                <?php if(!empty($request->user->email)): ?>
                                                    <span class="d-block font-12 text-gray mt-1"><?php echo e($request->user->email); ?></span>
                                                <?php endif; ?>

                                                <?php if(!empty($request->user->mobile)): ?>
                                                    <span class="d-block font-12 text-gray mt-1"><?php echo e($request->user->mobile); ?></span>
                                                <?php endif; ?>
                                            </th>

                                            <td class=" text-center align-middle">
                                                <?php if(!empty($customers)): ?>
                                                    <?php echo e($customers); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>

                                            <td class=" text-center align-middle">
                                                <?php if(!empty($sales)): ?>
                                                    <?php echo e(handlePrice($sales)); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>

                                            <td class="align-middle">
                                                <input type="hidden" class="" value="<?php echo e($request->description); ?>">
                                                <button type="button" class="js-show-description btn btn-outline-primary"><?php echo e(trans('admin/main.show')); ?></button>
                                            </td>

                                            <td class="align-middle">
                                                <?php if(!empty($publishedDate)): ?>
                                                    <?php echo e(dateTimeFormat($publishedDate, 'j M Y | H:i')); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>

                                            <td class="align-middle"><?php echo e(dateTimeFormat($request->created_at,'j M Y | H:i')); ?></td>

                                            <td class="align-middle">
                                                <?php echo e(trans('admin/main.'.$request->status)); ?>

                                            </td>

                                            <td class="align-middle text-right">

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_content_delete_requests_actions')): ?>
                                                    <?php if($request->status == "pending"): ?>
                                                        <?php echo $__env->make('admin.includes.delete_button',[
                                                                'url' => getAdminPanelUrl("/content-delete-requests/{$request->id}/approve"),
                                                                'btnClass' => 'text-primary text-decoration-none btn-transparent btn-sm mr-1',
                                                                'btnText' => '<i class="fa fa-check"></i>',
                                                                'tooltip' => trans("admin/main.approve"),
                                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php echo $__env->make('admin.includes.delete_button',[
                                                        'url' => getAdminPanelUrl("/content-delete-requests/{$request->id}/reject"),
                                                        'btnClass' => 'text-danger text-decoration-none btn-transparent btn-sm',
                                                        'btnText' => '<i class="fa fa-times"></i>',
                                                        'tooltip' => trans("admin/main.reject"),
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($requests->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script src="/assets/default/js/admin/content-delete-requests.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\content_delete_requests\index.blade.php ENDPATH**/ ?>