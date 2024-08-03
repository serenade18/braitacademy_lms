<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.documents')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.documents')); ?></div>
            </div>
        </div>
        <div class="section-filters">
            <section class="card">
                <div class="card-body">
                    <div class="mt-3">
                        <form action="<?php echo e(getAdminPanelUrl()); ?>/financial/documents" method="get" class="row mb-0">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i class="fa fa-calendar-alt"></i>
                                        </span>
                                        </div>
                                        <input type="text" name="from" autocomplete="off" class="form-control datefilter"
                                               aria-describedby="dateInputGroupPrepend"
                                               value="<?php echo e(request()->get('from',null)); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i class="fa fa-calendar-alt"></i>
                                        </span>
                                        </div>
                                        <input type="text" name="to" autocomplete="off" class="form-control datefilter"
                                               aria-describedby="dateInputGroupPrepend"
                                               value="<?php echo e(request()->get('to',null)); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label
                                        class="input-label d-block"><?php echo e(trans('/admin/main.user')); ?></label>
                                    <select name="user[]" multiple="" class="form-control search-user-select2"
                                            data-placeholder="<?php echo e(trans('/admin/main.search_user_or_instructor')); ?>">
                                        <?php if( request()->get('user',null)): ?>
                                            <?php $__currentLoopData = request()->get('user'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($userId); ?>"
                                                        selected="selected"><?php echo e($users[$userId]->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label d-block"><?php echo e(trans('admin/main.class')); ?></label>
                                    <select name="webinar" class="form-control search-webinar-select2"
                                            data-placeholder="<?php echo e(trans('admin/main.search_webinar')); ?>">
                                        <?php if(request()->get('webinar',null)): ?>
                                            <option value="<?php echo e(request()->get('webinar',null)); ?>"
                                                    selected="selected"><?php echo e($webinar ? $webinar->title : ''); ?></option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label d-block"><?php echo e(trans('admin/main.type')); ?></label>
                                    <select name="type" class="form-control">
                                        <option value="all"
                                                <?php if(request()->get('type',null) == 'all'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.all')); ?></option>
                                        <option value="addiction"
                                                <?php if(request()->get('type',null) == 'addiction'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('admin/main.addiction')); ?></option>
                                        <option value="deduction"
                                                <?php if(request()->get('type',null) == 'deduction'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('admin/main.deduction')); ?></option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label d-block"><?php echo e(trans('admin/main.type_account')); ?></label>
                                    <select name="type_account" class="form-control">
                                        <option value="all"
                                                <?php if(request()->get('type_account',null) == 'all'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.all')); ?></option>
                                        <option value="asset"
                                                <?php if(request()->get('type_account',null) == 'asset'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('admin/main.asset')); ?></option>
                                        <option value="income"
                                                <?php if(request()->get('type_account',null) == 'income'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('admin/main.income')); ?></option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                                <button type="submit" class="btn btn-primary w-100"><?php echo e(trans('admin/main.show_results')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <div class="section-body">

            <div class="d-flex align-items-center justify-content-between">

                
            </div>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.user')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.tax')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.system')); ?></th>
                                        <th><?php echo e(trans('admin/main.amount')); ?></th>
                                        <th><?php echo e(trans('admin/main.type')); ?></th>
                                        <th><?php echo e(trans('admin/main.creator')); ?></th>
                                        <th><?php echo e(trans('admin/main.type_account')); ?></th>
                                        <th><?php echo e(trans('public.date_time')); ?></th>
                                        <th><?php echo e(trans('public.controls')); ?></th>
                                    </tr>


                                    <?php if($documents->count() > 0): ?>
                                        <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-left">
                                                    <div class="text-left">
                                                        <?php if($document->is_cashback): ?>
                                                            <span class="d-block font-weight-bold"><?php echo e(trans('update.cashback')); ?></span>
                                                        <?php endif; ?>

                                                        <?php if(!empty($document->webinar_id)): ?>
                                                            <?php if(!$document->is_cashback): ?>
                                                                <span class="d-block font-weight-bold"><?php echo e(trans('admin/main.item_purchased')); ?></span>
                                                            <?php endif; ?>

                                                            <a href="<?php echo e(!empty($document->webinar) ? $document->webinar->getUrl() : ''); ?>"
                                                               target="_blank" class="font-12">#<?php echo e($document->webinar_id); ?>-<?php echo e(!empty($document->webinar) ? $document->webinar->title : ''); ?></a>
                                                        <?php elseif(!empty($document->bundle_id)): ?>
                                                            <?php if(!$document->is_cashback): ?>
                                                                <span class="d-block font-weight-bold"><?php echo e(trans('update.bundle_purchased')); ?></span>
                                                            <?php endif; ?>

                                                            <a href="<?php echo e(!empty($document->bundle) ? $document->bundle->getUrl() : ''); ?>"
                                                               target="_blank" class="font-12">#<?php echo e($document->bundle_id); ?>-<?php echo e(!empty($document->bundle) ? $document->bundle->title : ''); ?></a>
                                                        <?php elseif(!empty($document->product_id)): ?>
                                                            <?php if(!$document->is_cashback): ?>
                                                                <span class="d-block font-weight-bold"><?php echo e(trans('update.product_purchased')); ?></span>
                                                            <?php endif; ?>

                                                            <a href="<?php echo e(!empty($document->product) ? $document->product->getUrl() : ''); ?>"
                                                               target="_blank" class="font-12">#<?php echo e($document->product_id); ?>-<?php echo e(!empty($document->product) ? $document->product->title : ''); ?></a>
                                                        <?php elseif(!empty($document->meeting_time_id)): ?>
                                                            <?php if(!$document->is_cashback): ?>
                                                                <span class="d-block font-weight-bold"><?php echo e(trans('admin/main.item_purchased')); ?></span>
                                                            <?php endif; ?>

                                                            <a href="" target="_blank" class="font-12">#<?php echo e($document->meeting_time_id); ?> <?php echo e(trans('admin/main.meeting')); ?></a>
                                                        <?php elseif(!empty($document->subscribe_id)): ?>
                                                            <span class="<?php echo e((!$document->is_cashback) ? 'd-block font-weight-bold' : 'font-12'); ?>"><?php echo e(trans('admin/main.purchased_subscribe')); ?></span>
                                                        <?php elseif(!empty($document->promotion_id)): ?>
                                                            <span class="<?php echo e((!$document->is_cashback) ? 'd-block font-weight-bold' : 'font-12'); ?>"><?php echo e(trans('admin/main.purchased_promotion')); ?></span>
                                                        <?php elseif(!empty($document->registration_package_id)): ?>
                                                            <span class="<?php echo e((!$document->is_cashback) ? 'd-block font-weight-bold' : 'font-12'); ?>"><?php echo e(trans('update.purchased_registration_package')); ?></span>
                                                        <?php elseif($document->store_type == \App\Models\Accounting::$storeManual): ?>
                                                            <span class="<?php echo e((!$document->is_cashback) ? 'd-block font-weight-bold' : 'font-12'); ?>"><?php echo e(trans('admin/main.manual_document')); ?></span>
                                                        <?php else: ?>
                                                            <?php if($document->is_cashback): ?>
                                                                <span class="font-12"><?php echo e($document->description); ?></span>
                                                            <?php else: ?>
                                                                <span class="d-block font-weight-bold"><?php echo e(trans('admin/main.automatic_document')); ?></span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>

                                                <td class="text-left">
                                                    <?php if(!empty($document->user)): ?>
                                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($document->user_id); ?>/edit" target="_blank"
                                                           class=""><?php echo e($document->user->full_name); ?></a>
                                                    <?php endif; ?>
                                                </td>

                                                <td class="text-center">
                                                    <?php if($document->tax): ?>
                                                        <span class="fas fa-check"></span>
                                                    <?php endif; ?>
                                                </td>

                                                <td class="text-center">
                                                    <?php if($document->system): ?>
                                                        <span class="fas fa-check"></span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <span class="text-success"><?php echo e(handlePrice($document->amount)); ?></span>
                                                </td>

                                                <td>
                                                    <?php switch($document->type):
                                                        case (\App\Models\Accounting::$addiction): ?>
                                                            <span class="text-success"><?php echo e(trans('admin/main.addiction')); ?></span>
                                                            <?php break; ?>
                                                        <?php case (\App\Models\Accounting::$deduction): ?>
                                                            <span class="text-danger"><?php echo e(trans('admin/main.deduction')); ?></span>
                                                            <?php break; ?>
                                                    <?php endswitch; ?>
                                                </td>

                                                <td>
                                                    <?php if($document->creator_id): ?>
                                                        <span><?php echo e(trans('admin/main.admin')); ?></span>
                                                    <?php else: ?>
                                                        <span><?php echo e(trans('admin/main.automatic')); ?></span>
                                                    <?php endif; ?>
                                                </td>

                                                <td width="20%">
                                                    <?php echo e(trans('admin/main.'.$document->type_account)); ?>

                                                </td>

                                                <td><?php echo e(dateTimeFormat($document->created_at, 'j F Y H:i')); ?></td>

                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_documents_print')): ?>
                                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/documents/<?php echo e($document->id); ?>/print" class="btn-sm fa fa-print"></a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($documents->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/financial/documents/lists.blade.php ENDPATH**/ ?>