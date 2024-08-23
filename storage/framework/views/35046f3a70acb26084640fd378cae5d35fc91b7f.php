<section class="card">
    <div class="card-body">
        <form method="get" class="mb-0">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                        <input name="search" type="text" class="form-control" value="<?php echo e(request()->get('search')); ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('admin/main.role')); ?></label>

                        <select name="role" class="form-control populate">
                            <option value=""><?php echo e(trans('admin/main.all_roles')); ?></option>
                            <?php $__currentLoopData = ['instructor', 'organization', 'student']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role); ?>" <?php echo e((request()->get('role') == $role) ? 'selected' : ''); ?>><?php echo e(trans('admin/main.'.$role)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                


                <?php
                    $filters = ['items_asc', 'items_desc']; /* 'amount_asc', 'amount_desc', */
                    // It is not possible to specify the minimum and maximum amount of shopping cart items for each user in the query
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
                    <div class="form-group mt-1">
                        <label class="input-label mb-4"> </label>
                        <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\abandoned_cart\users_carts\filters.blade.php ENDPATH**/ ?>