<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('update.enrollment_history')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('update.enrollment_history')); ?></div>
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
                                    <input type="text" class="form-control" name="item_title" value="<?php echo e(request()->get('item_title')); ?>">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="success" <?php if(request()->get('status') == 'success'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.success')); ?></option>
                                        <option value="refund" <?php if(request()->get('status') == 'refund'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.refund')); ?></option>
                                        <option value="blocked" <?php if(request()->get('status') == 'blocked'): ?> selected <?php endif; ?>><?php echo e(trans('update.access_blocked')); ?></option>
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
                                    <label class="input-label"><?php echo e(trans('admin/main.instructor')); ?></label>
                                    <select name="teacher_ids[]" multiple="multiple" data-search-option="just_teacher_role" class="form-control search-user-select2"
                                            data-placeholder="<?php echo e(trans('update.search_instructor')); ?>">

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
                                    <label class="input-label"><?php echo e(trans('admin/main.student')); ?></label>
                                    <select name="student_ids[]" multiple="multiple" data-search-option="just_student_role" class="form-control search-user-select2"
                                            data-placeholder="<?php echo e(trans('webinars.select_student')); ?>">

                                        <?php if(!empty($students) and $students->count() > 0): ?>
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($student->id); ?>" selected><?php echo e($student->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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
                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_export')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/enrollments/export" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left"><?php echo e(trans('admin/main.student')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.instructor')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.item')); ?></th>
                                        <th><?php echo e(trans('admin/main.type')); ?></th>
                                        <th><?php echo e(trans('admin/main.date')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($sale->id); ?></td>

                                            <td class="text-left">
                                                <?php echo e(!empty($sale->buyer) ? $sale->buyer->full_name : ''); ?>

                                                <div class="text-primary text-small font-600-bold">ID : <?php echo e(!empty($sale->buyer) ? $sale->buyer->id : ''); ?></div>
                                            </td>

                                            <td class="text-left">
                                                <?php echo e($sale->item_seller); ?>

                                                <div class="text-primary text-small font-600-bold">ID : <?php echo e($sale->seller_id); ?></div>
                                            </td>

                                            <td class="text-left">
                                                <div class="media-body">
                                                    <div><?php echo e($sale->item_title); ?></div>
                                                    <div class="text-primary text-small font-600-bold">ID : <?php echo e($sale->item_id); ?></div>
                                                </div>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">
                                                    <?php if($sale->manual_added): ?>
                                                        <span class="text-warning"><?php echo e(trans('public.manual')); ?></span>
                                                    <?php else: ?>
                                                        <?php echo e(trans('update.normal_purchased')); ?>

                                                    <?php endif; ?>
                                                </span>
                                            </td>

                                            <td><?php echo e(dateTimeFormat($sale->created_at, 'j F Y H:i')); ?></td>

                                            <td>
                                                <?php if(!empty($sale->refund_at)): ?>
                                                    <span class="text-warning"><?php echo e(trans('admin/main.refund')); ?></span>
                                                <?php elseif(!$sale->access_to_purchased_item): ?>
                                                    <span class="text-danger"><?php echo e(trans('update.access_blocked')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-success"><?php echo e(trans('admin/main.success')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_sales_invoice')): ?>
                                                    <?php if(!empty($sale->webinar_id)): ?>
                                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/sales/<?php echo e($sale->id); ?>/invoice" target="_blank" title="<?php echo e(trans('admin/main.invoice')); ?>"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($sale->access_to_purchased_item): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_block_access')): ?>
                                                        <?php echo $__env->make('admin.includes.delete_button',[
                                                                'url' => getAdminPanelUrl().'/enrollments/'. $sale->id .'/block-access',
                                                                'tooltip' => trans('update.block_access'),
                                                                'btnClass' => '',
                                                                'btnIcon' => 'fa-times-circle',
                                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_enable_access')): ?>
                                                        <?php echo $__env->make('admin.includes.delete_button',[
                                                                'url' => getAdminPanelUrl().'/enrollments/'. $sale->id .'/enable-access',
                                                                'tooltip' => trans('update.enable-student-access'),
                                                                'btnClass' => 'text-success ml-1',
                                                                'btnIcon' => 'fa-check'
                                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($sales->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\enrollment\history.blade.php ENDPATH**/ ?>