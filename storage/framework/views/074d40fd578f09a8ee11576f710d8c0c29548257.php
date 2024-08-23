<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.classes')); ?></div>

                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>



        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form action="<?php echo e(getAdminPanelUrl()); ?>/webinars/personal-notes" method="get" class="row mb-0">
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                <input type="text" name="search" class="form-control" value="<?php echo e(request()->get('search',null)); ?>"/>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.content_type')); ?></label>

                                <select name="content_type" class="form-control">
                                    <option value=""><?php echo e(trans('admin/main.all')); ?></option>
                                    <option value="webinar" <?php echo e((request()->get('content_type') == "webinar") ? 'selected' : ''); ?>><?php echo e(trans('admin/main.webinar')); ?></option>
                                    <option value="course" <?php echo e((request()->get('content_type') == "course") ? 'selected' : ''); ?>><?php echo e(trans('admin/main.course')); ?></option>
                                    <option value="text_lesson" <?php echo e((request()->get('content_type') == "text_lesson") ? 'selected' : ''); ?>><?php echo e(trans('admin/main.text_lesson')); ?></option>
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
                                        <th class="text-left"><?php echo e(trans('admin/main.course')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.user')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.note')); ?></th>
                                        <?php if(!empty(getFeaturesSettings('course_notes_attachment'))): ?>
                                            <th class="text-center"><?php echo e(trans('update.attachment')); ?></th>
                                        <?php endif; ?>

                                        <th class="text-center"><?php echo e(trans('public.date')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $personalNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personalNote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-left">
                                                <span class="d-block"><?php echo e($personalNote->course->title); ?></span>
                                                <span class="d-block font-12 text-gray mt-1"><?php echo e(trans('public.by')); ?> <?php echo e($personalNote->course->teacher->full_name); ?></span>
                                            </th>

                                            <th class="text-left">
                                                <span class="d-block"><?php echo e($personalNote->user->full_name); ?></span>

                                                <?php if(!empty($personalNote->user->email)): ?>
                                                    <span class="d-block font-12 text-gray mt-1"><?php echo e($personalNote->user->email); ?></span>
                                                <?php endif; ?>

                                                <?php if(!empty($personalNote->user->mobile)): ?>
                                                    <span class="d-block font-12 text-gray mt-1"><?php echo e($personalNote->user->mobile); ?></span>
                                                <?php endif; ?>
                                            </th>

                                            <td class="text-center">
                                                <input type="hidden" class="js-note-message" value="<?php echo e($personalNote->note); ?>">
                                                <input type="hidden" class="js-note-attachment" value="<?php echo e($personalNote->attachment); ?>">

                                                <button type="button" class="js-show-note btn btn-sm btn-gray200"><?php echo e(trans('public.view')); ?></button>
                                            </td>

                                            <?php if(!empty(getFeaturesSettings('course_notes_attachment'))): ?>
                                                <td class="align-middle">
                                                    <?php if(!empty($personalNote->attachment)): ?>
                                                        <a href="/course/personal-notes/<?php echo e($personalNote->id); ?>/download-attachment" class="btn btn-sm btn-gray200"><?php echo e(trans('home.download')); ?></a>
                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>

                                            <td class="align-middle"><?php echo e(dateTimeFormat($personalNote->created_at,'j M Y | H:i')); ?></td>

                                            <td class="align-middle text-right">

                                                <a href="<?php echo e("{$personalNote->course->getLearningPageUrl()}?type={$personalNote->getItemType()}&item={$personalNote->targetable_id}"); ?>" class="btn-transparent btn-sm text-primary mr-1" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.view')); ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <button type="button" class="js-edit-note btn-transparent btn-sm text-primary mr-1" data-action="<?php echo e(getAdminPanelUrl("/webinars/personal-notes/{$personalNote->id}/update")); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.edit')); ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl("/webinars/personal-notes/{$personalNote->id}/delete"),'btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($personalNotes->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var noteLang = '<?php echo e(trans('update.note')); ?>';
        var personalNoteLang = '<?php echo e(trans('update.personal_note')); ?>';
        var attachmentLang = '<?php echo e(trans('update.attachment')); ?>';
        var saveNoteLang = '<?php echo e(trans('public.save')); ?>';
        var closeLang = '<?php echo e(trans('public.close')); ?>';
    </script>

    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/default/js/admin/personal_note.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\webinars\personal_notes\index.blade.php ENDPATH**/ ?>