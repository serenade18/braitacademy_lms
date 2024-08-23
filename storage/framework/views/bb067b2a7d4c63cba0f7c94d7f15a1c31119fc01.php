<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('update.upcoming_courses')); ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_courses')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalCourses); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-calendar-check"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.released_courses')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($releasedCourses); ?>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-clock"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.not_released')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($notReleased); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-users"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.followers')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($followers); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                    <label class="input-label"><?php echo e(trans('update.release_date')); ?></label>
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


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('public.all')); ?></option>
                                        <option value="newest" <?php if(request()->get('sort', null) == 'newest'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.newest')); ?></option>
                                        <option value="earliest_publish_date" <?php if(request()->get('sort', null) == 'earliest_publish_date'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.earliest_publish_date')); ?></option>
                                        <option value="farthest_publish_date" <?php if(request()->get('sort', null) == 'farthest_publish_date'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.farthest_publish_date')); ?></option>
                                        <option value="highest_price" <?php if(request()->get('sort', null) == 'highest_price'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.highest_price')); ?></option>
                                        <option value="lowest_price" <?php if(request()->get('sort', null) == 'lowest_price'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.lowest_price')); ?></option>
                                        <option value="only_not_released_courses" <?php if(request()->get('sort', null) == 'only_not_released_courses'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.only_not_released_courses')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.instructor')); ?></label>
                                    <select name="teacher_ids[]" multiple="multiple" data-search-option="just_teacher_role" class="form-control search-user-select2"
                                            data-placeholder="Search teachers">

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
                                    <label class="input-label"><?php echo e(trans('admin/main.category')); ?></label>
                                    <select name="category_id" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_categories')); ?></option>

                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                                                <optgroup label="<?php echo e($category->title); ?>">
                                                    <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($subCategory->id); ?>" <?php if(request()->get('category_id') == $subCategory->id): ?> selected="selected" <?php endif; ?>><?php echo e($subCategory->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </optgroup>
                                            <?php else: ?>
                                                <option value="<?php echo e($category->id); ?>" <?php if(request()->get('category_id') == $category->id): ?> selected="selected" <?php endif; ?>><?php echo e($category->title); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="pending" <?php if(request()->get('status') == 'pending'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.pending_review')); ?></option>
                                        <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.published')); ?></option>
                                        <option value="inactive" <?php if(request()->get('status') == 'inactive'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.rejected')); ?></option>
                                        <option value="is_draft" <?php if(request()->get('status') == 'is_draft'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.draft')); ?></option>
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
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_upcoming_courses_export_excel')): ?>
                                <div class="text-right">
                                    <a href="<?php echo e(getAdminPanelUrl('/upcoming_courses/excel?'. http_build_query(request()->all()))); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.id')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.instructor')); ?></th>
                                        <th><?php echo e(trans('admin/main.type')); ?></th>
                                        <th><?php echo e(trans('admin/main.price')); ?></th>
                                        <th><?php echo e(trans('update.followers')); ?></th>
                                        <th><?php echo e(trans('admin/main.start_date')); ?></th>
                                        <th><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $upcomingCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <td><?php echo e($upcomingCourse->id); ?></td>

                                            <td width="18%" class="text-left">
                                                <a class="text-primary mt-0 mb-1 font-weight-bold" href="<?php echo e($upcomingCourse->getUrl()); ?>"><?php echo e($upcomingCourse->title); ?></a>
                                                <?php if(!empty($upcomingCourse->category->title)): ?>
                                                    <div class="text-small"><?php echo e($upcomingCourse->category->title); ?></div>
                                                <?php else: ?>
                                                    <div class="text-small text-warning"><?php echo e(trans('admin/main.no_category')); ?></div>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-left"><?php echo e($upcomingCourse->teacher->full_name); ?></td>

                                            <td class=""><?php echo e(trans('admin/main.'.$upcomingCourse->type)); ?></td>

                                            <td>
                                                <?php if(!empty($upcomingCourse->price) and $upcomingCourse->price > 0): ?>
                                                    <span class="mt-0 mb-1">
                                                        <?php echo e(handlePrice($upcomingCourse->price, true, true)); ?>

                                                    </span>
                                                <?php else: ?>
                                                    <?php echo e(trans('public.free')); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td class="font-12">
                                                <a href="<?php echo e(getAdminPanelUrl('/upcoming_courses/'. $upcomingCourse->id .'/followers')); ?>" target="_blank" class=""><?php echo e($upcomingCourse->followers_count); ?></a>
                                            </td>

                                            <td class="font-12"><?php echo e(dateTimeFormat($upcomingCourse->publish_date, 'Y M j | H:i')); ?></td>

                                            <td class="font-12"><?php echo e(dateTimeFormat($upcomingCourse->created_at, 'Y M j | H:i')); ?></td>

                                            <td>
                                                <?php if(!empty($upcomingCourse->webinar_id)): ?>
                                                    <div class="text-success font-600-bold"><?php echo e(trans('update.released')); ?></div>
                                                <?php else: ?>
                                                    <?php switch($upcomingCourse->status):
                                                        case (\App\Models\Webinar::$active): ?>
                                                            <div class="text-primary"><?php echo e(trans('admin/main.published')); ?></div>
                                                            <?php break; ?>
                                                        <?php case (\App\Models\Webinar::$isDraft): ?>
                                                            <span class="text-dark"><?php echo e(trans('admin/main.is_draft')); ?></span>
                                                            <?php break; ?>
                                                        <?php case (\App\Models\Webinar::$pending): ?>
                                                            <span class="text-warning"><?php echo e(trans('admin/main.waiting')); ?></span>
                                                            <?php break; ?>
                                                        <?php case (\App\Models\Webinar::$inactive): ?>
                                                            <span class="text-danger"><?php echo e(trans('public.rejected')); ?></span>
                                                            <?php break; ?>
                                                    <?php endswitch; ?>
                                                <?php endif; ?>
                                            </td>

                                            <td width="200" class="">
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu text-left webinars-lists-dropdown">

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_upcoming_courses_edit')): ?>
                                                            <?php if($upcomingCourse->status != \App\Models\Webinar::$active): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl('/upcoming_courses/'.$upcomingCourse->id.'/approve'),
                                                                    'btnClass' => 'd-flex align-items-center text-success text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.approve") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>

                                                            <?php if($upcomingCourse->status == \App\Models\Webinar::$pending): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl('/upcoming_courses/'.$upcomingCourse->id.'/reject'),
                                                                    'btnClass' => 'd-flex align-items-center text-danger text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.reject") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>

                                                            <?php if($upcomingCourse->status == \App\Models\Webinar::$active): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl('/upcoming_courses/'.$upcomingCourse->id.'/unpublish'),
                                                                    'btnClass' => 'd-flex align-items-center text-danger text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.unpublish") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_upcoming_courses_followers')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/upcoming_courses/<?php echo e($upcomingCourse->id); ?>/followers" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 " title="<?php echo e(trans('update.followers')); ?>">
                                                                <i class="fa fa-users"></i>
                                                                <span class="ml-2"><?php echo e(trans('update.followers')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_upcoming_courses_edit')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl('/upcoming_courses/'. $upcomingCourse->id .'/edit')); ?>" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 " title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                <i class="fa fa-edit"></i>
                                                                <span class="ml-2"><?php echo e(trans('admin/main.edit')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_delete')): ?>
                                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl('/upcoming_courses/'.$upcomingCourse->id.'/delete'),
                                                                    'btnClass' => 'd-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.delete") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($upcomingCourses->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\upcoming_courses\lists.blade.php ENDPATH**/ ?>