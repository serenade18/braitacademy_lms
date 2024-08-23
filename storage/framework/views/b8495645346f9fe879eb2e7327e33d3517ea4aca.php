<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('panel.support_summary')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/41.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($openSupportsCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.open_conversations')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/40.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($closeSupportsCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.closed_conversations')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/39.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($supportsCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.total_conversations')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-25">
        <h2 class="section-title"><?php echo e(trans('panel.message_filters')); ?></h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="/panel/support/tickets" method="get">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('public.from')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                        </div>
                                        <input type="text" name="from" autocomplete="off" class="form-control <?php if(!empty(request()->get('from'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>" aria-describedby="dateInputGroupPrepend" value="<?php echo e(request()->get('from','')); ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('public.to')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text" id="dateInputGroupPrepend">
                                        <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                    </span>
                                        </div>
                                        <input type="text" name="to" autocomplete="off" class="form-control <?php if(!empty(request()->get('to'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>" aria-describedby="dateInputGroupPrepend" value="<?php echo e(request()->get('to','')); ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="input-label d-block"><?php echo e(trans('panel.department')); ?></label>

                                    <select name="department" id="departments" class="form-control">
                                        <option value="all"><?php echo e(trans('public.all')); ?></option>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->id); ?>" <?php if(request()->get('department') == $department->id): ?> selected <?php endif; ?>><?php echo e($department->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('public.status')); ?></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="all"><?php echo e(trans('public.all')); ?></option>
                                        <option value="open" <?php if(request()->get('status') == 'open'): ?> selected <?php endif; ?> ><?php echo e(trans('public.open')); ?></option>
                                        <option value="close" <?php if(request()->get('status') == 'close'): ?> selected <?php endif; ?> ><?php echo e(trans('public.close')); ?></option>
                                        <option value="replied" <?php if(request()->get('status') == 'replied'): ?> selected <?php endif; ?> ><?php echo e(trans('panel.replied')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn btn-sm font-14 btn-primary w-100 mt-2"><?php echo e(trans('public.show_results')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="mt-40">
        <h2 class="section-title"><?php echo e(trans('panel.messages_history')); ?></h2>

        <?php if(!empty($supports) and !$supports->isEmpty()): ?>

            <div class="bg-white shadow rounded-sm py-10 py-lg-25 px-15 px-lg-30 mt-25">
                <div class="row">
                    <div id="conversationsList" class="col-12 col-lg-6 conversations-list">
                        <div class="table-responsive">
                            <table class="table table-md">
                                <tr>
                                    <th class="text-left font-14 text-gray font-weight-500"><?php echo e(trans('navbar.title')); ?></th>
                                    <th class="text-center font-14 text-gray font-weight-500"><?php echo e(trans('public.updated_at')); ?></th>
                                    <th class="text-center font-14 text-gray font-weight-500"><?php echo e(trans('panel.department')); ?></th>
                                    <th class="text-center font-14 text-gray font-weight-500"><?php echo e(trans('public.status')); ?></th>
                                </tr>
                                <tbody>

                                <?php $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="<?php if(!empty($selectSupport) and $selectSupport->id == $support->id): ?> selected-row <?php endif; ?>">
                                        <td class="text-left">
                                            <a href="/panel/support/tickets/<?php echo e($support->id); ?>/conversations" class="">
                                                <div class="user-inline-avatar d-flex align-items-center">
                                                    <div class="avatar bg-gray200">
                                                        <img src="/assets/default/img/support.png" class="img-cover" alt="">
                                                    </div>
                                                    <div class="ml-10">
                                                        <span class="d-block font-14 text-dark-blue font-weight-500"><?php echo e($support->title); ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>

                                        <td class="text-center align-middle">
                                            <span class="font-weight-500 text-dark-blue font-14 text-gray d-block"><?php echo e((!empty($support->conversations) and count($support->conversations)) ? dateTimeFormat($support->conversations->first()->created_at,'j M Y | H:i') : dateTimeFormat($support->created_at,'j M Y | H:i')); ?></span>
                                        </td>

                                        <td class="text-center align-middle">
                                            <span class="font-weight-500 text-dark-blue font-14 d-block"><?php echo e($support->department->title); ?></span>
                                        </td>

                                        <td class="text-center align-middle">
                                            <?php if($support->status == 'close'): ?>
                                                <span class="text-danger font-14 font-weight-500"><?php echo e(trans('panel.closed')); ?></span>
                                            <?php elseif($support->status == 'supporter_replied'): ?>
                                                <span class="text-primary font-14 font-weight-500"><?php echo e(trans('panel.replied')); ?></span>
                                            <?php else: ?>
                                                <span class="text-warning font-14 font-weight-500"><?php echo e(trans('public.waiting')); ?></span>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php if(!empty($selectSupport)): ?>
                        <div class="col-12 col-lg-6 border-left border-gray300">
                            <div class="conversation-box p-15 d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="font-weight-500 font-14 text-dark-blue d-block"><?php echo e($selectSupport->title); ?></span>
                                    <span class="font-12 text-gray d-block mt-5"><?php echo e(trans('public.created')); ?>: <?php echo e(dateTimeFormat($support->created_at,'j M Y | H:i')); ?></span>

                                    <?php if(!empty($selectSupport->webinar)): ?>
                                        <span class="font-12 text-gray d-block mt-5"><?php echo e(trans('webinars.webinar')); ?>: <?php echo e($selectSupport->webinar->title); ?></span>
                                    <?php endif; ?>
                                </div>

                                <?php if($selectSupport->status != 'close'): ?>
                                    <a href="/panel/support/<?php echo e($selectSupport->id); ?>/close" class="btn btn-primary btn-sm"><?php echo e(trans('panel.close_request')); ?></a>
                                <?php endif; ?>
                            </div>

                            <div id="conversationsCard" class="pt-15 conversations-card">

                                <?php if(!empty($selectSupport->conversations) and !$selectSupport->conversations->isEmpty()): ?>

                                    <?php $__currentLoopData = $selectSupport->conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="rounded-sm mt-15 border panel-shadow p-15">
                                            <div class="d-flex align-items-center justify-content-between pb-20 border-bottom border-gray300">
                                                <div class="user-inline-avatar d-flex align-items-center">
                                                    <div class="avatar bg-gray200">
                                                        <img src="<?php echo e((!empty($conversations->supporter)) ? $conversations->supporter->getAvatar() : $conversations->sender->getAvatar()); ?>" class="img-cover" alt="">
                                                    </div>
                                                    <div class="ml-10">
                                                        <span class="d-block text-dark-blue font-14 font-weight-500"><?php echo e((!empty($conversations->supporter)) ? $conversations->supporter->full_name : $conversations->sender->full_name); ?></span>
                                                        <span class="mt-1 font-12 text-gray d-block"><?php echo e((!empty($conversations->supporter)) ? trans('panel.staff') : $conversations->sender->role_name); ?></span>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-column align-items-end">
                                                    <span class="font-12 text-gray"><?php echo e(dateTimeFormat($conversations->created_at,'j M Y | H:i')); ?></span>

                                                    <?php if(!empty($conversations->attach)): ?>
                                                        <a href="<?php echo e(url($conversations->attach)); ?>" target="_blank" class="font-12 mt-10 text-danger"><i data-feather="paperclip" height="14"></i> <?php echo e(trans('panel.attach')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <p class="white-space-pre-wrap text-gray mt-15 font-weight-500 font-14"><?php echo e($conversations->message); ?></p>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php endif; ?>
                            </div>

                            <div class="conversation-box mt-30 py-10 px-15">
                                <h3 class="font-14 text-dark-blue font-weight-bold"><?php echo e(trans('panel.reply_to_the_conversation')); ?></h3>
                                <form action="/panel/support/<?php echo e($selectSupport->id); ?>/conversations" method="post" class="mt-5">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group mt-10">
                                        <label class="input-label d-block"><?php echo e(trans('site.message')); ?></label>
                                        <textarea name="message" class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="5"><?php echo e(old('message')); ?></textarea>
                                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="d-flex d-flex align-items-center">
                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(trans('panel.attach_file')); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="input-group-text panel-file-manager" data-input="attach" data-preview="holder">
                                                        <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="attach" id="attach" value="<?php echo e(old('attach')); ?>" class="form-control"/>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-sm ml-40 mt-10"><?php echo e(trans('site.send_message')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-12 col-lg-6 border-left border-gray300">
                            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                                'file_name' => 'support.png',
                                'title' => trans('panel.select_support'),
                                'hint' => nl2br(trans('panel.select_support_hint')),
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php else: ?>

            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                'file_name' => 'support.png',
                'title' => trans('panel.support_no_result'),
                'hint' => nl2br(trans('panel.support_no_result_hint')),
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>
    </section>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>

    <script src="/assets/default/js/panel/conversations.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\support\ticket_conversations.blade.php ENDPATH**/ ?>