<div id="topFilters" class="shadow-lg border border-gray300 rounded-sm p-10 p-md-20">
    <div class="row align-items-center">
        <div class="col-lg-3 d-flex align-items-center">
            <div class="checkbox-button primary-selected">
                <input type="radio" name="card" id="gridView" value="grid" <?php if(empty(request()->get('card')) or request()->get('card') == 'grid'): ?> checked="checked" <?php endif; ?>>
                <label for="gridView" class="bg-white border-0 mb-0">
                    <i data-feather="grid" width="25" height="25" class="<?php if(empty(request()->get('card')) or request()->get('card') == 'grid'): ?> text-primary <?php endif; ?>"></i>
                </label>
            </div>

            <div class="checkbox-button primary-selected ml-10">
                <input type="radio" name="card" id="listView" value="list" <?php if(!empty(request()->get('card')) and request()->get('card') == 'list'): ?> checked="checked" <?php endif; ?>>
                <label for="listView" class="bg-white border-0 mb-0">
                    <i data-feather="list" width="25" height="25" class="<?php echo e((!empty(request()->get('card')) and request()->get('card') == 'list') ? 'text-primary' : ''); ?>"></i>
                </label>
            </div>
        </div>

        <div class="col-lg-6 d-block d-md-flex align-items-center justify-content-end my-25 my-lg-0">
            <div class="d-flex align-items-center justify-content-between justify-content-md-center mx-0 mx-md-20 my-20 my-md-0">
                <label class="mb-0 mr-10 cursor-pointer" for="free"><?php echo e(trans('update.free_courses')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="free" class="custom-control-input" id="free" <?php if(request()->get('free', null) == 'on'): ?> checked="checked" <?php endif; ?>>
                    <label class="custom-control-label" for="free"></label>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between justify-content-md-center">
                <label class="mb-0 mr-10 cursor-pointer" for="released"><?php echo e(trans('update.released_courses')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="released" class="custom-control-input" id="released" <?php if(request()->get('released', null) == 'on'): ?> checked="checked" <?php endif; ?>>
                    <label class="custom-control-label" for="released"></label>
                </div>
            </div>
        </div>

        <div class="col-lg-3 d-flex align-items-center">
            <select name="sort" class="form-control font-14">
                <option disabled selected><?php echo e(trans('public.sort_by')); ?></option>
                <option value=""><?php echo e(trans('public.all')); ?></option>
                <option value="newest" <?php if(request()->get('sort', null) == 'newest'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.newest')); ?></option>
                <option value="earliest_publish_date" <?php if(request()->get('sort', null) == 'earliest_publish_date'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.earliest_publish_date')); ?></option>
                <option value="farthest_publish_date" <?php if(request()->get('sort', null) == 'farthest_publish_date'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.farthest_publish_date')); ?></option>
                <option value="highest_price" <?php if(request()->get('sort', null) == 'highest_price'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.highest_price')); ?></option>
                <option value="lowest_price" <?php if(request()->get('sort', null) == 'lowest_price'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.lowest_price')); ?></option>
            </select>
        </div>

    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\upcoming_courses\includes\top_filters.blade.php ENDPATH**/ ?>