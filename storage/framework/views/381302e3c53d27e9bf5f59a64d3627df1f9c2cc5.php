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
                            <i class="fas fa-object-group"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_generated')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalGenerated); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-file-word"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.text_generated')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($textGenerated); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-file-image"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.image_generated')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($imageGenerated); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-users"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.users')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($usersCount); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('admin/main.user')); ?></th>
                                        <th><?php echo e(trans('update.service_type')); ?></th>
                                        <th><?php echo e(trans('update.service')); ?></th>
                                        <th><?php echo e(trans('update.keyword')); ?></th>
                                        <th><?php echo e(trans('auth.language')); ?></th>
                                        <th><?php echo e(trans('update.generated_date')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td class="text-left">
                                                <?php echo e(!empty($content->user) ? $content->user->full_name : ''); ?>

                                                <div class="text-primary text-small font-600-bold">ID : <?php echo e(!empty($content->user) ? $content->user->id : ''); ?></div>
                                            </td>

                                            <td>
                                                <?php echo e(trans($content->service_type)); ?>

                                            </td>

                                            <td>
                                                <?php if(!empty($content->template)): ?>
                                                    <?php echo e($content->template->title); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('update.custom')); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <span class=""><?php echo e(truncate($content->keyword, 100)); ?></span>
                                            </td>

                                            <td>
                                                <span class=""><?php echo e(truncate($content->language, 100)); ?></span>
                                            </td>

                                            <td><?php echo e(dateTimeFormat($content->created_at, 'j F Y H:i')); ?></td>

                                            <td>
                                                <input type="hidden" class="js-prompt" value="<?php echo e($content->prompt); ?>">
                                                <input type="hidden" class="js-result" value="<?php echo e($content->result); ?>">


                                                <a href="#" class="js-view-content btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.view')); ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($content->user_id); ?>/edit" class="btn-transparent mx-1 text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('update.edit_user')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_sales_refund')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',[
                                                                'url' => getAdminPanelUrl("/ai-contents/{$content->id}/delete"),
                                                                'tooltip' => trans('admin/main.delete'),
                                                                'btnIcon' => 'fa-times-circle'
                                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($contents->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="contentModal" tabindex="-1" aria-labelledby="contactMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactMessageLabel"><?php echo e(trans('update.generated_content')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="js-prompt-card">
                        <h6 class="fs-12"><?php echo e(trans('update.prompt')); ?>:</h6>
                        <p class=""></p>
                    </div>

                    
                    <div id="generatedTextContents" class="d-none"></div>

                    <div class="js-text-generated-modal mt-20 p-15 bg-info-light border-gray300 rounded-sm d-none">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="font-14 text-gray"><?php echo e(trans('update.generated_content')); ?></h4>

                            <div class="form-group mb-0">
                                <button type="button" class="btn-transparent d-flex align-items-center js-copy-content-modal" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.copy')); ?>" data-copy-text="<?php echo e(trans('public.copy')); ?>" data-done-text="<?php echo e(trans('public.done')); ?>">
                                    <i data-feather="copy" width="18" height="18" class="text-gray"></i>
                                    <span class="text-gray font-12 ml-5"><?php echo e(trans('public.copy')); ?></span>
                                </button>
                            </div>
                        </div>

                        <div class="mt-15 font-14 text-gray js-content-modal"></div>
                    </div>


                    
                    <div class="js-image-generated-modal mt-20 p-15 bg-info-light border-gray300 rounded-sm d-none">
                        <div class="">
                            <h4 class="font-14 text-gray"><?php echo e(trans('update.generated_content')); ?></h4>
                            <p class="mt-1 text-gray font-12"><?php echo e(trans('update.click_on_images_to_download_them')); ?></p>
                        </div>

                        <div class="js-content-modal mt-15 d-flex-center flex-wrap">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var generatedContentLang = '<?php echo e(trans('update.generated_content')); ?>';
        var copyLang = '<?php echo e(trans('public.copy')); ?>';
        var doneLang = '<?php echo e(trans('public.done')); ?>';
    </script>

    <script src="/assets/default/js/admin/ai_contents_lists.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\ai_contents\lists\index.blade.php ENDPATH**/ ?>