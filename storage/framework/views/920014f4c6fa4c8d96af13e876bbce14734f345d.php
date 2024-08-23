<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <div class="flex-grow-1">
                <h2 class="font-20 font-weight-bold"><?php echo e($pageTitle); ?></h2>

                <span class="d-block font-14 font-weight-500 text-gray mt-1"><?php echo e(trans('public.by')); ?> <span class="font-weight-bold"><?php echo e($topic->creator->full_name); ?></span> <?php echo e(trans('public.in')); ?> <?php echo e(dateTimeFormat($topic->created_at, 'j M Y | H:i')); ?></span>
            </div>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><a href="<?php echo e(getAdminPanelUrl()); ?>/forums"><?php echo e(trans('update.forums')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">

                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo e(getAdminPanelUrl()); ?>/forums/<?php echo e(!empty($topic) ? ($topic->forum_id.'/topics/'. $topic->id .'/update') : '/topics/store'); ?>" method="post">
                                <?php echo e(csrf_field()); ?>


                                <div class="">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label class="input-label"><?php echo e(trans('update.topic_title')); ?></label>
                                                <input type="text" name="title" value="<?php echo e(!empty($topic) ? $topic->title : old('title')); ?>" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('update.topic_title_placeholder')); ?>">
                                                <?php $__errorArgs = ['title'];
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

                                            <div class="form-group">
                                                <label class="input-label"><?php echo e(trans('update.forums')); ?></label>
                                                <select name="forum_id" class="form-control <?php $__errorArgs = ['forum_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <option selected disabled><?php echo e(trans('admin/main.choose_category')); ?></option>

                                                    <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($forum->subForums) and count($forum->subForums)): ?>
                                                            <?php
                                                                $showOptgroup = false;

                                                                foreach($forum->subForums as $subForum) {
                                                                    if(!$subForum->close) {
                                                                        $showOptgroup = true;
                                                                    }
                                                                }
                                                            ?>

                                                            <?php if($showOptgroup): ?>
                                                                <optgroup label="<?php echo e($forum->title); ?>">
                                                                    <?php $__currentLoopData = $forum->subForums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subForum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(!$subForum->close): ?>
                                                                            <option value="<?php echo e($subForum->id); ?>" <?php echo e(((!empty($topic) and $topic->forum_id == $subForum->id) or (request()->get('forum_id') == $subForum->id)) ? 'selected' : ''); ?>><?php echo e($subForum->title); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </optgroup>
                                                            <?php endif; ?>
                                                        <?php elseif(!$forum->close): ?>
                                                            <option value="<?php echo e($forum->id); ?>" <?php echo e((request()->get('forum_id') == $forum->id) ? 'selected' : ''); ?>><?php echo e($forum->title); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['forum_id'];
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
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                                                <textarea id="summernote" name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo !empty($topic) ? $topic->description : old('description'); ?></textarea>
                                                <?php $__errorArgs = ['description'];
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
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div id="topicImagesInputs" class="create-topic-attachments form-group mt-2">
                                                <label class="input-label mb-0"><?php echo e(trans('update.attachments')); ?></label>

                                                <div class="main-row input-group product-images-input-group mt-2">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="input-group-text admin-file-manager" data-input="attachments_record" data-preview="holder">
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="attachments[]" id="attachments_record" value="" class="form-control"/>

                                                    <button type="button" class="btn btn-primary btn-sm add-btn">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>

                                                <?php if(!empty($topic) and !empty($topic->attachments) and count($topic->attachments)): ?>
                                                    <?php $__currentLoopData = $topic->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topicAttachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="input-group product-images-input-group mt-2">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="input-group-text admin-file-manager" data-input="attachments_<?php echo e($topicAttachment->id); ?>" data-preview="holder">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="attachments[]" id="attachments_<?php echo e($topicAttachment->id); ?>" value="<?php echo e($topicAttachment->path); ?>" class="form-control" placeholder="<?php echo e(trans('update.attachments_size')); ?>"/>

                                                            <button type="button" class="btn btn-sm btn-danger remove-btn">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>

                                                <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">
                                    <i class="fa fa-file"></i>
                                    <span class="ml-1"><?php echo e(trans('update.publish_topic')); ?></span>
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="/assets/default/js/parts/create_topics.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\forums\topics\create.blade.php ENDPATH**/ ?>