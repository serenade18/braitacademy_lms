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

            <div class="card">
                <div class="card-header">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_newsletters_send')): ?>
                        <div class="text-right">
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/newsletters/send" class="btn btn-primary"><?php echo e(trans('update.send_newsletter')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped font-14" id="datatable-basic">

                            <tr>
                                <th class="text-left"><?php echo e(trans('update.send_method')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.title')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.description')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.email_count')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.created_at')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $newsletters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsletter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php switch($newsletter->send_method):
                                            case ('send_to_all'): ?>
                                                <?php echo e(trans('update.send_newsletter_to_all')); ?>

                                            <?php break; ?>

                                            <?php case ('send_to_bcc'): ?>
                                                <?php echo e(trans('update.send_newsletter_to_bcc')); ?>

                                            <?php break; ?>

                                            <?php case ('send_to_excel'): ?>
                                                <?php echo e(trans('update.send_newsletter_to_excel')); ?>

                                            <?php break; ?>
                                        <?php endswitch; ?>
                                    </td>

                                    <td><?php echo e($newsletter->title); ?></td>

                                    <td class="text-center">
                                        <button type="button" data-item-id="<?php echo e($newsletter->id); ?>" class="js-show-description btn btn-outline-primary"><?php echo e(trans('admin/main.show')); ?></button>
                                        <input type="hidden" value="<?php echo e(nl2br($newsletter->description)); ?>">
                                    </td>

                                    <td class="text-center"><?php echo e($newsletter->email_count); ?></td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($newsletter->created_at, 'j M Y | H:i')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($newsletters->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="newsletterMessageModal" tabindex="-1" aria-labelledby="notificationMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationMessageLabel"><?php echo e(trans('admin/main.contacts_message')); ?></h5>
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
    <script src="/assets/default/js/admin/newsletter.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\newsletters\history.blade.php ENDPATH**/ ?>