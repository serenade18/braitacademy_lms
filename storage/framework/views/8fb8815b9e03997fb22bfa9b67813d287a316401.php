<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a><?php echo e(trans('admin/main.users')); ?></a></div>
                <div class="breadcrumb-item"><a href="#"><?php echo e($pageTitle); ?></a></div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <section class="card">
            <div class="card-body">
                <form method="get" class="mb-0">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                <input name="search" type="text" class="form-control" value="<?php echo e(request()->get('search')); ?>" placeholder="<?php echo e(trans('public.search_user')); ?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('update.session_status')); ?></label>
                                <select name="session_status" class="form-control">
                                    <option value=""><?php echo e(trans('update.choose_session_status')); ?></option>
                                    <option value="open" <?php echo e((request()->get('session_status') == "open") ? 'selected' : ''); ?>><?php echo e(trans('admin/main.open')); ?></option>
                                    <option value="ended" <?php echo e((request()->get('session_status') == "ended") ? 'selected' : ''); ?>><?php echo e(trans('update.ended')); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('update.start_login_date')); ?></label>
                                <div class="input-group">
                                    <input type="date" id="from" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('update.end_login_date')); ?></label>
                                <div class="input-group">
                                    <input type="date" id="to" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                </div>
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
        </section>
    </div>

    <div class="card">
        <div class="card-header">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_login_history_export')): ?>
                <a href="<?php echo e(getAdminPanelUrl("/users/login-history/export")); ?>?<?php echo e(http_build_query(request()->all())); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
            <?php endif; ?>

            <div class="h-10"></div>
        </div>

        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table table-striped font-14">
                    <tr>
                        <th>ID</th>
                        <th class="text-left"><?php echo e(trans('admin/main.user')); ?></th>
                        <th><?php echo e(trans('update.os')); ?></th>
                        <th><?php echo e(trans('update.browser')); ?></th>
                        <th><?php echo e(trans('update.device')); ?></th>
                        <th><?php echo e(trans('update.ip_address')); ?></th>
                        <th><?php echo e(trans('update.country')); ?></th>
                        <th><?php echo e(trans('update.city')); ?></th>
                        <th><?php echo e(trans('update.lat,long')); ?></th>
                        <th><?php echo e(trans('update.session_start')); ?></th>
                        <th><?php echo e(trans('update.session_end')); ?></th>
                        <th><?php echo e(trans('public.duration')); ?></th>
                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                    </tr>

                    <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($session->user->id); ?></td>
                            <td class="text-left">
                                <div class="d-flex align-items-center">
                                    <figure class="avatar mr-2">
                                        <img src="<?php echo e($session->user->getAvatar()); ?>" alt="<?php echo e($session->user->full_name); ?>">
                                    </figure>
                                    <div class="media-body ml-1">
                                        <div class="mt-0 mb-1 font-weight-bold"><?php echo e($session->user->full_name); ?></div>

                                        <?php if($session->user->mobile): ?>
                                            <div class="text-primary text-small font-600-bold"><?php echo e($session->user->mobile); ?></div>
                                        <?php endif; ?>

                                        <?php if($session->user->email): ?>
                                            <div class="text-primary text-small font-600-bold"><?php echo e($session->user->email); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>

                            <td><?php echo e($session->os ?? '-'); ?></td>

                            <td><?php echo e($session->browser ?? '-'); ?></td>

                            <td><?php echo e($session->device ?? '-'); ?></td>

                            <td><?php echo e($session->ip ?? '-'); ?></td>

                            <td><?php echo e($session->country ?? '-'); ?></td>

                            <td><?php echo e($session->city ?? '-'); ?></td>

                            <td><?php echo e($session->location ?? '-'); ?></td>

                            <td><?php echo e(dateTimeFormat($session->session_start_at, 'j M Y H:i')); ?></td>

                            <td><?php echo e(!empty($session->session_end_at) ? dateTimeFormat($session->session_end_at, 'j M Y H:i') : '-'); ?></td>

                            <td><?php echo e($session->getDuration()); ?></td>

                            <td class="text-center mb-2" width="120">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_impersonate')): ?>
                                    <?php if(!$session->user->isAdmin()): ?>
                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($session->user->id); ?>/impersonate" target="_blank" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.login')); ?>">
                                            <i class="fa fa-user-shield"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($session->user->id); ?>/edit" target="_blank" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('update.user_edit')); ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_ip_restriction_create')): ?>
                                    <?php if(!empty($session->ip)): ?>
                                        <a href="#!" data-path="<?php echo e(getAdminPanelUrl("/users/ip-restriction/get-form?full_ip={$session->ip}")); ?>" class="js-add-restriction btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('update.block_ip')); ?>">
                                            <i class="fa fa-ban"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_login_history_end_session')): ?>
                                    <?php if(empty($session->session_end_at)): ?>
                                        <?php echo $__env->make('admin.includes.delete_button',[
                                            'url' => getAdminPanelUrl().'/users/login-history/'.$session->id.'/end-session' ,
                                            'btnIcon' => 'fa-arrow-down',
                                            'tooltip' => trans('update.end_session')
                                           ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_login_history_delete')): ?>
                                    <?php echo $__env->make('admin.includes.delete_button',[
                                            'url' => getAdminPanelUrl().'/users/login-history/'.$session->id.'/delete' ,
                                           ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>

        <div class="card-footer text-center">
            <?php echo e($sessions->appends(request()->input())->links()); ?>

        </div>
    </div>


    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h5><?php echo e(trans('admin/main.hints')); ?></h5></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.login_history_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('update.login_history_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.login_history_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('update.login_history_hint_description_2')); ?></div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.login_history_hint_title_3')); ?></div>
                        <div class="text-small font-600-bold"><?php echo e(trans('update.login_history_hint_description_3')); ?></div>
                    </div>
                </div>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="/assets/default/js/admin/ip-restriction.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\users\login_history\lists\index.blade.php ENDPATH**/ ?>