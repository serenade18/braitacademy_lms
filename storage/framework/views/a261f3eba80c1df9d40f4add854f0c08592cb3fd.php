
<section class="card">
    <div class="card-body">
        <form method="get" class="mb-0">
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


                <?php
                    $filters = ['amount_asc', 'amount_desc', 'paid_amount_asc', 'paid_amount_desc', 'date_asc', 'date_desc'];
                ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                        <select name="sort" data-plugin-selectTwo class="form-control populate">
                            <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                            <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($filter); ?>" <?php if(request()->get('sort') == $filter): ?> selected <?php endif; ?>><?php echo e(trans('update.'.$filter)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('admin/main.type')); ?></label>
                        <select name="target_type" class="form-control populate">
                            <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                            <?php $__currentLoopData = \App\Models\CashbackRule::$targetTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type); ?>" <?php if(request()->get('target_type') == $type): ?> selected <?php endif; ?>><?php echo e(trans('update.target_types_'.$type)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                        <select name="status" class="form-control populate">
                            <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                            <option value="active" <?php echo e((request()->get('status') == 'active') ? 'selected' : ''); ?>><?php echo e(trans('admin/main.active')); ?></option>
                            <option value="inactive" <?php echo e((request()->get('status') == 'inactive') ? 'selected' : ''); ?>><?php echo e(trans('admin/main.inactive')); ?></option>
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
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\cashback\rules\lists\filters.blade.php ENDPATH**/ ?>