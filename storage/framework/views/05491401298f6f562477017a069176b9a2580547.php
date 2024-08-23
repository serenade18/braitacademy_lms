<?php $__env->startPush('styles_top'); ?>
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(!empty($forum) ?trans('/admin/main.edit'): trans('admin/main.new')); ?> <?php echo e(trans('update.forum')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/forums"><?php echo e(trans('update.forum')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(!empty($forum) ?trans('/admin/main.edit'): trans('admin/main.new')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(getAdminPanelUrl()); ?>/forums/<?php echo e(!empty($forum) ? $forum->id.'/update' : 'store'); ?>"
                                  method="Post">
                                <?php echo e(csrf_field()); ?>


                                <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                        <select name="locale" class="form-control <?php echo e(!empty($forum) ? 'js-edit-content-locale' : ''); ?>">
                                            <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['locale'];
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
                                <?php else: ?>
                                    <input type="hidden" name="locale" value="<?php echo e(getDefaultLocale()); ?>">
                                <?php endif; ?>

                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.icon')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text admin-file-manager " data-input="icon" data-preview="holder">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="icon" id="icon" value="<?php echo e(!empty($forum) ? $forum->icon : old('icon')); ?>" class="form-control <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                        <div class="invalid-feedback"><?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(trans('/admin/main.title')); ?></label>
                                    <input type="text" name="title"
                                           class="form-control  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($forum) ? $forum->title : old('title')); ?>"
                                           placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>
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
                                    <label><?php echo e(trans('/admin/main.description')); ?></label>
                                    <textarea type="text" name="description" rows="4"
                                              class="form-control  <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    ><?php echo e(!empty($forum) ? $forum->description : old('description')); ?></textarea>
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

                                <div class="form-group">
                                    <label class="input-label d-block"><?php echo e(trans('admin/main.group')); ?></label>
                                    <select name="group_id" class="form-control <?php $__errorArgs = ['group_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                                        <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($userGroup->id); ?>" <?php if(!empty($forum) and $forum->group_id == $userGroup->id): ?> selected <?php endif; ?>><?php echo e($userGroup->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="invalid-feedback"><?php $__errorArgs = ['group_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>

                                <div class="form-group">
                                    <label class="input-label d-block"><?php echo e(trans('admin/main.role')); ?></label>
                                    <select name="role_id" class="form-control <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>" <?php if(!empty($forum) and $forum->role_id == $role->id): ?> selected <?php endif; ?>><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="text-muted text-small mt-1"><?php echo e(trans('update.forum_group_role_hint')); ?></div>
                                    <div class="invalid-feedback"><?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>

                                <div class="form-group custom-switches-stacked">
                                    <label class="custom-switch pl-0 d-flex align-items-center">
                                        <input type="hidden" name="status" value="disabled">
                                        <input type="checkbox" name="status" id="forumStatusSwitch" value="active" <?php echo e((empty($forum) or $forum->status == 'active') ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="forumStatusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                                    </label>
                                </div>


                                <div class="form-group custom-switches-stacked">
                                    <label class="custom-switch pl-0 d-flex align-items-center">
                                        <input type="hidden" name="close" value="0">
                                        <input type="checkbox" name="close" id="forumCloseSwitch" value="1" <?php echo e((!empty($forum) and $forum->close) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="forumCloseSwitch"><?php echo e(trans('admin/main.closed')); ?></label>
                                    </label>
                                    <div class="text-muted text-small mt-1"><?php echo e(trans('update.closed_forum_hint')); ?></div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input id="hasSubCategory" type="checkbox" name="has_sub"
                                               class="custom-control-input" <?php echo e((!empty($subForums) and !$subForums->isEmpty()) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label"
                                               for="hasSubCategory"><?php echo e(trans('update.include_sub_forums')); ?></label>
                                    </div>
                                </div>

                                <div id="subCategories" class="ml-0 <?php echo e((!empty($subForums) and !$subForums->isEmpty()) ? '' : ' d-none'); ?>">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <strong class="d-block"><?php echo e(trans('update.new_sub_forums')); ?></strong>

                                        <button type="button" class="btn btn-success add-btn"><i class="fa fa-plus"></i> Add</button>
                                    </div>

                                    <ul class="draggable-lists list-group">

                                        <?php if((!empty($subForums) and !$subForums->isEmpty())): ?>
                                            <?php $__currentLoopData = $subForums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subForum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="form-group list-group  border rounded-lg p-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text cursor-pointer move-icon">
                                                                <i class="fa fa-arrows-alt"></i>
                                                            </div>
                                                        </div>

                                                        <input type="text" name="sub_forums[<?php echo e($subForum->id); ?>][title]"
                                                               class="form-control w-auto flex-grow-1"
                                                               placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"
                                                               value="<?php echo e($subForum->title); ?>"
                                                        />

                                                        <div class="input-group-append">
                                                            <button type="button" class="btn remove-btn btn-danger"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0 mt-1">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="input-group-text admin-file-manager " data-input="icon_<?php echo e($subForum->id); ?>" data-preview="holder">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="sub_forums[<?php echo e($subForum->id); ?>][icon]" id="icon_<?php echo e($subForum->id); ?>" class="form-control" value="<?php echo e($subForum->icon); ?>" placeholder="<?php echo e(trans('admin/main.icon')); ?>"/>
                                                        </div>
                                                    </div>

                                                    <textarea name="sub_forums[<?php echo e($subForum->id); ?>][description]"
                                                              class="form-control w-auto flex-grow-1 mt-1" placeholder="<?php echo e(trans('update.forum_description')); ?>"><?php echo e($subForum->description); ?></textarea>

                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="input-label d-block mb-0"><?php echo e(trans('admin/main.group')); ?></label>
                                                        <select name="sub_forums[<?php echo e($subForum->id); ?>][group_id]" class="form-control">
                                                            <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                                                            <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($userGroup->id); ?>" <?php if(!empty($subForum) and $subForum->group_id == $userGroup->id): ?> selected <?php endif; ?>><?php echo e($userGroup->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-0 mt-1">
                                                        <label class="input-label d-block mb-0"><?php echo e(trans('admin/main.role')); ?></label>
                                                        <select name="sub_forums[<?php echo e($subForum->id); ?>][role_id]" class="form-control">
                                                            <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($role->id); ?>" <?php if(!empty($subForum) and $subForum->role_id == $role->id): ?> selected <?php endif; ?>><?php echo e($role->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-0 mt-1 custom-switches-stacked">
                                                        <label class="custom-switch pl-0 d-flex align-items-center mb-0">
                                                            <input type="hidden" name="sub_forums[<?php echo e($subForum->id); ?>][status]" value="disabled">
                                                            <input type="checkbox" name="sub_forums[<?php echo e($subForum->id); ?>][status]" id="forumStatusSwitch_<?php echo e($subForum->id); ?>" value="active" <?php echo e((!empty($subForum) and $subForum->status == 'active') ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                            <span class="custom-switch-indicator"></span>
                                                            <label class="custom-switch-description mb-0 cursor-pointer" for="forumStatusSwitch_<?php echo e($subForum->id); ?>"><?php echo e(trans('admin/main.active')); ?></label>
                                                        </label>
                                                    </div>


                                                    <div class="form-group mb-0 mt-1 custom-switches-stacked">
                                                        <label class="custom-switch pl-0 d-flex align-items-center mb-0">
                                                            <input type="hidden" name="sub_forums[<?php echo e($subForum->id); ?>][close]" value="0">
                                                            <input type="checkbox" name="sub_forums[<?php echo e($subForum->id); ?>][close]" id="forumCloseSwitch_<?php echo e($subForum->id); ?>" value="1" <?php echo e((!empty($subForum) and $subForum->close) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                            <span class="custom-switch-indicator"></span>
                                                            <label class="custom-switch-description mb-0 cursor-pointer" for="forumCloseSwitch_<?php echo e($subForum->id); ?>"><?php echo e(trans('admin/main.close')); ?></label>
                                                        </label>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                                <div class="text-right mt-4">
                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                </div>
                            </form>

                            <li class="form-group main-row list-group d-none border rounded-lg p-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text cursor-pointer move-icon">
                                            <i class="fa fa-arrows-alt"></i>
                                        </div>
                                    </div>

                                    <input type="text" name="sub_forums[record][title]"
                                           class="form-control w-auto flex-grow-1"
                                           placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>

                                    <div class="input-group-append">
                                        <button type="button" class="btn remove-btn btn-danger"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                                <div class="form-group mb-0 mt-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text admin-file-manager " data-input="icon_record" data-preview="holder">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="sub_forums[record][icon]" id="icon_record" class="form-control" placeholder="<?php echo e(trans('admin/main.icon')); ?>"/>
                                    </div>
                                </div>

                                <textarea name="sub_forums[record][description]"
                                          class="form-control w-auto flex-grow-1 mt-1" placeholder="<?php echo e(trans('update.category_description')); ?>"></textarea>

                                <div class="form-group mb-0 mt-1">
                                    <label class="input-label d-block mb-0"><?php echo e(trans('admin/main.group')); ?></label>
                                    <select name="sub_forums[record][group_id]" class="form-control">
                                        <option value="" selected disabled><?php echo e(trans('admin/main.select_users_group')); ?></option>

                                        <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($userGroup->id); ?>"><?php echo e($userGroup->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group mb-0 mt-1">
                                    <label class="input-label d-block"><?php echo e(trans('admin/main.role')); ?></label>
                                    <select name="sub_forums[record][role_id]" class="form-control">
                                        <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group mb-0 mt-1 custom-switches-stacked">
                                    <label class="custom-switch pl-0 d-flex align-items-center mb-0">
                                        <input type="hidden" name="sub_forums[record][status]" value="disabled">
                                        <input type="checkbox" name="sub_forums[record][status]" id="forumStatusSwitch_record" value="active" checked="checked" class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="forumStatusSwitch_record"><?php echo e(trans('admin/main.active')); ?></label>
                                    </label>
                                </div>


                                <div class="form-group mb-0 mt-1 custom-switches-stacked">
                                    <label class="custom-switch pl-0 d-flex align-items-center mb-0">
                                        <input type="hidden" name="sub_forums[record][close]" value="0">
                                        <input type="checkbox" name="sub_forums[record][close]" id="forumCloseSwitch_record" value="1" class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="forumCloseSwitch_record"><?php echo e(trans('admin/main.close')); ?></label>
                                    </label>
                                </div>
                            </li>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/categories.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\forums\create.blade.php ENDPATH**/ ?>