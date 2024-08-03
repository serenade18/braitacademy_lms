<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.comments')); ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-comment"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total_comments')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalComments); ?>

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
                            <h4><?php echo e(trans('admin/main.published_comments')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($publishedComments); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-hourglass-start"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.pending_comments')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($pendingComments); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-flag"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.comments_reports')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($commentReports); ?>

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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control" name="title" value="<?php echo e(request()->get('title')); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="date" value="<?php echo e(request()->get('date')); ?>" placeholder="Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="pending" <?php if(request()->get('status') == 'pending'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.pending')); ?></option>
                                        <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.published')); ?></option>
                                    </select>
                                </div>
                            </div>

                            <?php if($page == 'webinars'): ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('admin/main.class')); ?></label>
                                        <select name="webinar_ids[]" multiple="multiple" class="form-control search-webinar-select2 " data-placeholder="<?php echo e(trans('admin/main.search_webinar')); ?>">

                                            <?php if(!empty($webinars) and $webinars->count() > 0): ?>
                                                <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($webinar->id); ?>" selected><?php echo e($webinar->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php elseif($page == 'bundles'): ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('update.bundle')); ?></label>
                                        <select name="bundle_ids[]" multiple="multiple" class="form-control search-bundle-select2 " data-placeholder="Search bundles">

                                            <?php if(!empty($bundles) and $bundles->count() > 0): ?>
                                                <?php $__currentLoopData = $bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($bundle->id); ?>" selected><?php echo e($bundle->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php elseif($page == 'blog'): ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('admin/main.blog')); ?></label>
                                        <select name="post_ids[]" multiple="multiple" class="form-control search-blog-select2 " data-placeholder="Search blog">

                                            <?php if(!empty($blog) and $blog->count() > 0): ?>
                                                <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($post->id); ?>" selected><?php echo e($post->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php elseif($page == 'products'): ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('update.products')); ?></label>
                                        <select name="product_ids[]" multiple="multiple" class="form-control search-product-select2 " data-placeholder="Search products">

                                            <?php if(!empty($products) and $products->count() > 0): ?>
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($product->id); ?>" selected><?php echo e($product->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.user')); ?></label>
                                    <select name="user_ids[]" multiple="multiple" class="form-control search-user-select2"
                                            data-placeholder="Search users">

                                        <?php if(!empty($users) and $users->count() > 0): ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>" selected><?php echo e($user->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.comment')); ?></th>
                                        <th><?php echo e(trans('admin/main.created_date')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.user')); ?></th>
                                        <?php if($page == 'webinars'): ?>
                                            <th class="text-left"><?php echo e(trans('admin/main.class')); ?></th>
                                        <?php elseif($page == 'bundles'): ?>
                                            <th class="text-left"><?php echo e(trans('update.bundle')); ?></th>
                                        <?php elseif($page == 'blog'): ?>
                                            <th class="text-left"><?php echo e(trans('admin/main.blog')); ?></th>
                                        <?php elseif($page == 'products'): ?>
                                            <th class="text-left"><?php echo e(trans('update.product')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(trans('admin/main.type')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th width="150"><?php echo e(trans('admin/main.action')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <button type="button" class="js-show-description btn btn-outline-primary"><?php echo e(trans('admin/main.show')); ?></button>
                                                <input type="hidden" value="<?php echo nl2br($comment->comment); ?>">
                                            </td>
                                            <td><?php echo e(dateTimeFormat($comment->created_at, 'j M Y | H:i')); ?></td>
                                            <td class="text-left">
                                                <a href="<?php echo e($comment->user->getProfileUrl()); ?>" target="_blank" class=""><?php echo e($comment->user->full_name); ?></a>
                                            </td>

                                            <td class="text-left">
                                                <a href="<?php echo e($comment->$itemRelation->getUrl()); ?>" target="_blank">
                                                    <?php echo e($comment->$itemRelation->title); ?>

                                                </a>
                                            </td>

                                            <td>
                                                <span>
                                                    <?php echo e((empty($comment->reply_id)) ? trans('admin/main.main_comment') : trans('admin/main.replied')); ?>

                                                </span>
                                            </td>

                                            <td>
                                                <span class="text-<?php echo e(($comment->status == 'pending') ? 'warning' : 'success'); ?>">
                                                    <?php echo e(($comment->status == 'pending') ? trans('admin/main.pending') : trans('admin/main.published')); ?>

                                                </span>
                                            </td>

                                            <td width="150px" class="text-center">

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments_status')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/comments/<?php echo e($page); ?>/<?php echo e($comment->id); ?>/toggle" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.'.(($comment->status == 'pending') ? 'publish' : 'pending'))); ?>">
                                                        <?php if($comment->status == 'pending'): ?>
                                                            <i class="fa fa-eye"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-eye-slash"></i>
                                                        <?php endif; ?>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments_reply')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/comments/<?php echo e($page); ?>/<?php echo e(!empty($comment->reply_id) ? $comment->reply_id : $comment->id); ?>/reply" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.reply')); ?>">
                                                        <i class="fa fa-reply"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/comments/<?php echo e($page); ?>/<?php echo e($comment->id); ?>/edit" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/comments/'. $page .'/'.$comment->id.'/delete','btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($comments->appends(request()->input())->links()); ?>

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
    <script src="/assets/default/js/admin/comments.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/comments/comments.blade.php ENDPATH**/ ?>