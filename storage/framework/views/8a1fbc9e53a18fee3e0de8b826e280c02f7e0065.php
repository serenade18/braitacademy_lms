<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($webinarTitle); ?> - <?php echo e(trans('update.waitlists')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('update.waitlists')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control" name="search" placeholder="" value="<?php echo e(request()->get('search')); ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.registration_status')); ?></label>
                                    <select name="registration_status" class="form-control">
                                        <option value=""><?php echo e(trans('admin/main.all')); ?></option>
                                        <option value="registered" <?php echo e((request()->get('registration_status') == "registered") ? 'selected' : ''); ?>><?php echo e(trans('update.registered')); ?></option>
                                        <option value="unregistered" <?php echo e((request()->get('registration_status') == "unregistered") ? 'selected' : ''); ?>><?php echo e(trans('update.unregistered')); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group mt-1">
                                    <label class="input-label mb-4"> </label>
                                    <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_waitlists_exports')): ?>
                        <a href="<?php echo e(getAdminPanelUrl("/waitlists/{$waitlistId}/export_list")); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <table class="table table-striped font-14" id="datatable-details">
                        <thead>
                        <tr>
                            <th class="text-left"><?php echo e(trans('admin/main.name')); ?></th>
                            <th class=""><?php echo e(trans('auth.email')); ?></th>
                            <th class=""><?php echo e(trans('public.phone')); ?></th>
                            <th class=""><?php echo e(trans('update.registration_status')); ?></th>
                            <th class=""><?php echo e(trans('update.submission_date')); ?></th>
                            <th class="text-left"><?php echo e(trans('admin/main.actions')); ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $waitlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $waitlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-left"><?php echo e(!empty($waitlist->user) ? $waitlist->user->full_name : $waitlist->full_name); ?></td>

                                <td><?php echo e(!empty($waitlist->user) ? $waitlist->user->email : $waitlist->email); ?></td>

                                <td><?php echo e(!empty($waitlist->user) ? $waitlist->user->mobile : $waitlist->phone); ?></td>

                                <td>
                                    <?php if(!empty($waitlist->user)): ?>
                                        <span class=""><?php echo e(trans('update.registered')); ?></span>
                                    <?php else: ?>
                                        <span class=""><?php echo e(trans('update.unregistered')); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo e(dateTimeFormat($waitlist->created_at, 'j M Y H:i')); ?></td>

                                <td class="">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <?php echo $__env->make('admin.includes.delete_button',[
                                            'url' => getAdminPanelUrl("/waitlists/items/{$waitlist->id}/delete"),
                                            'btnClass' => 'text-danger',
                                            'btnText' => '<i class="fa fa-times"></i>'
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <?php if(!empty($waitlist->user)): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_impersonate')): ?>
                                                <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($waitlist->user->id); ?>/impersonate" target="_blank" class="btn-transparent  text-primary ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.login')); ?>">
                                                    <i class="fa fa-user-shield"></i>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                                <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($waitlist->user->id); ?>/edit" class="btn-transparent  text-primary ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($waitlists->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\waitlists\users_list.blade.php ENDPATH**/ ?>