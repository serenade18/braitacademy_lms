<?php if(!empty($file) and $file->storage == 'upload_archive'): ?>
    <?php echo $__env->make('web.default.panel.webinar.create_includes.accordions.new_interactive_file',['file' => $file], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <li data-id="<?php echo e(!empty($chapterItem) ? $chapterItem->id :''); ?>" class="accordion-row bg-white rounded-sm border border-gray300 mt-20 py-15 py-lg-30 px-10 px-lg-20">
        <div class="d-flex align-items-center justify-content-between " role="tab" id="file_<?php echo e(!empty($file) ? $file->id :'record'); ?>">
            <div class="d-flex align-items-center" href="#collapseFile<?php echo e(!empty($file) ? $file->id :'record'); ?>" aria-controls="collapseFile<?php echo e(!empty($file) ? $file->id :'record'); ?>" data-parent="#chapterContentAccordion<?php echo e(!empty($chapter) ? $chapter->id :''); ?>" role="button" data-toggle="collapse" aria-expanded="true">
            <span class="chapter-icon chapter-content-icon mr-10">
                <i data-feather="<?php echo e(!empty($file) ? $file->getIconByType() : 'file'); ?>" class=""></i>
            </span>

                <div class="font-weight-bold text-dark-blue d-block"><?php echo e(!empty($file) ? $file->title . ($file->accessibility == 'free' ? " (". trans('public.free') .")" : '') : trans('public.add_new_files')); ?></div>
            </div>

            <div class="d-flex align-items-center">

                <?php if(!empty($file) and $file->status != \App\Models\WebinarChapter::$chapterActive): ?>
                    <span class="disabled-content-badge mr-10"><?php echo e(trans('public.disabled')); ?></span>
                <?php endif; ?>

                <?php if(!empty($file)): ?>
                    <button type="button" data-item-id="<?php echo e($file->id); ?>" data-item-type="<?php echo e(\App\Models\WebinarChapterItem::$chapterFile); ?>" data-chapter-id="<?php echo e(!empty($chapter) ? $chapter->id : ''); ?>" class="js-change-content-chapter btn btn-sm btn-transparent text-gray mr-10">
                        <i data-feather="grid" class="" height="20"></i>
                    </button>
                <?php endif; ?>

                <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

                <?php if(!empty($file)): ?>
                    <a href="/panel/files/<?php echo e($file->id); ?>/delete" class="delete-action btn btn-sm btn-transparent text-gray">
                        <i data-feather="trash-2" class="mr-10 cursor-pointer" height="20"></i>
                    </a>
                <?php endif; ?>

                <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseFile<?php echo e(!empty($file) ? $file->id :'record'); ?>" aria-controls="collapseFile<?php echo e(!empty($file) ? $file->id :'record'); ?>" data-parent="#chapterContentAccordion<?php echo e(!empty($chapter) ? $chapter->id :''); ?>" role="button" data-toggle="collapse" aria-expanded="true"></i>
            </div>
        </div>

        <div id="collapseFile<?php echo e(!empty($file) ? $file->id :'record'); ?>" aria-labelledby="file_<?php echo e(!empty($file) ? $file->id :'record'); ?>" class=" collapse <?php if(empty($file)): ?> show <?php endif; ?>" role="tabpanel">
            <div class="panel-collapse text-gray">
                <div class="js-content-form file-form" data-action="/panel/files/<?php echo e(!empty($file) ? $file->id . '/update' : 'store'); ?>">
                    <input type="hidden" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][webinar_id]" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

                    <div class="row">
                        <div class="col-12 col-lg-6">

                            <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                    <select name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][locale]"
                                            class="form-control <?php echo e(!empty($file) ? 'js-webinar-content-locale' : ''); ?>"
                                            data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>"
                                            data-id="<?php echo e(!empty($file) ? $file->id : ''); ?>"
                                            data-relation="files"
                                            data-fields="title,description"
                                    >
                                        <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lang); ?>" <?php echo e((!empty($file) and !empty($file->locale)) ? (mb_strtolower($file->locale) == mb_strtolower($lang) ? 'selected' : '') : ($locale == $lang ? 'selected' : '')); ?>><?php echo e($language); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php else: ?>
                                <input type="hidden" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][locale]" value="<?php echo e($defaultLocale); ?>">
                            <?php endif; ?>

                            <?php if(!empty($file)): ?>
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('public.chapter')); ?></label>
                                    <select name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][chapter_id]" class="js-ajax-chapter_id form-control">
                                        <?php $__currentLoopData = $webinar->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ch->id); ?>" <?php echo e(($file->chapter_id == $ch->id) ? 'selected' : ''); ?>><?php echo e($ch->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            <?php else: ?>
                                <input type="hidden" name="ajax[new][chapter_id]" value="" class="chapter-input">
                            <?php endif; ?>

                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                                <input type="text" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][title]" class="js-ajax-title form-control" value="<?php echo e(!empty($file) ? $file->title : ''); ?>" placeholder="<?php echo e(trans('forms.maximum_255_characters')); ?>"/>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.source')); ?></label>
                                <select name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][storage]"
                                        class="js-file-storage form-control"
                                >
                                    <?php $__currentLoopData = getFeaturesSettings('available_sources'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($source); ?>" <?php if(!empty($file) and $file->storage == $source): ?> selected <?php endif; ?>><?php echo e(trans('update.file_source_'.$source)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.accessibility')); ?></label>

                                <div class="d-flex align-items-center js-ajax-accessibility">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][accessibility]" value="free" <?php if(empty($file) or (!empty($file) and $file->accessibility == 'free')): ?> checked="checked" <?php endif; ?> id="accessibilityRadio1_<?php echo e(!empty($file) ? $file->id : 'record'); ?>" class="custom-control-input">
                                        <label class="custom-control-label font-14 cursor-pointer" for="accessibilityRadio1_<?php echo e(!empty($file) ? $file->id : 'record'); ?>"><?php echo e(trans('public.free')); ?></label>
                                    </div>

                                    <div class="custom-control custom-radio ml-15">
                                        <input type="radio" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][accessibility]" value="paid" <?php if(!empty($file) and $file->accessibility == 'paid'): ?> checked="checked" <?php endif; ?> id="accessibilityRadio2_<?php echo e(!empty($file) ? $file->id : 'record'); ?>" class="custom-control-input">
                                        <label class="custom-control-label font-14 cursor-pointer" for="accessibilityRadio2_<?php echo e(!empty($file) ? $file->id : 'record'); ?>"><?php echo e(trans('public.paid')); ?></label>
                                    </div>
                                </div>

                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="js-secure-host-upload-type-field form-group <?php echo e((!empty($file) and $file->storage == "secure_host") ? '' : 'd-none'); ?>">
                                <label class="input-label"><?php echo e(trans('update.upload_type')); ?></label>

                                <div class="d-flex align-items-center js-ajax-secure_host_upload_type">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][secure_host_upload_type]" value="direct" id="uploadTypeRadio1_<?php echo e(!empty($file) ? $file->id : 'record'); ?>" class="custom-control-input" <?php echo e((empty($file) or $file->secure_host_upload_type == 'direct') ? 'checked' : ''); ?>>
                                        <label class="custom-control-label font-14 cursor-pointer" for="uploadTypeRadio1_<?php echo e(!empty($file) ? $file->id : 'record'); ?>"><?php echo e(trans('update.direct')); ?></label>
                                    </div>

                                    <div class="custom-control custom-radio ml-15">
                                        <input type="radio" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][secure_host_upload_type]" value="manual" id="uploadTypeRadio2_<?php echo e(!empty($file) ? $file->id : 'record'); ?>" class="custom-control-input" <?php echo e((!empty($file) and $file->secure_host_upload_type == 'manual') ? 'checked' : ''); ?>>
                                        <label class="custom-control-label font-14 cursor-pointer" for="uploadTypeRadio2_<?php echo e(!empty($file) ? $file->id : 'record'); ?>"><?php echo e(trans('public.manual')); ?></label>
                                    </div>
                                </div>

                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group js-secure-host-path-input <?php echo e((!empty($file) and $file->storage == 'secure_host' and $file->secure_host_upload_type == 'manual') ? '' : 'd-none'); ?>">
                                <div class="local-input input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text text-white cursor-default">
                                            <i data-feather="link" width="18" height="18" class="text-white"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][secure_host_file_path]" value="<?php echo e((!empty($file)) ? $file->file : ''); ?>" class="js-ajax-secure_host_file_path form-control" placeholder="<?php echo e(trans('update.enter_file_url')); ?>"/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>


                            <div class="form-group js-file-path-input <?php echo e((!empty($file) and $file->storage == 's3') ? 'd-none' : ''); ?>">
                                <div class="local-input input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text panel-file-manager text-white" data-input="file_path<?php echo e(!empty($file) ? $file->id : 'record'); ?>" data-preview="holder">
                                            <i data-feather="upload" width="18" height="18" class="text-white"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][file_path]" id="file_path<?php echo e(!empty($file) ? $file->id : 'record'); ?>" value="<?php echo e((!empty($file)) ? $file->file : ''); ?>" class="js-ajax-file_path form-control" placeholder="<?php echo e(trans('webinars.file_upload_placeholder')); ?>"/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="form-group js-s3-file-path-input <?php echo e((!empty($file) and $file->storage == 's3') ? '' : 'd-none'); ?>">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text text-white">
                                            <i data-feather="upload" width="18" height="18" class="text-white"></i>
                                        </button>
                                    </div>
                                    <div class="custom-file js-ajax-s3_file">
                                        <input type="file" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][s3_file]" class="js-s3-file-input custom-file-input cursor-pointer" id="s3File<?php echo e(!empty($file) ? $file->id : 'record'); ?>">
                                        <label class="custom-file-label cursor-pointer" for="s3File<?php echo e(!empty($file) ? $file->id : 'record'); ?>"><?php echo e(trans('update.choose_file')); ?></label>
                                    </div>

                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="row form-group js-file-type-volume d-none">
                                <div class="col-6 js-file-type-field">
                                    <label class="input-label"><?php echo e(trans('webinars.file_type')); ?></label>
                                    <select name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][file_type]" class="js-ajax-file_type form-control">
                                        <option value=""><?php echo e(trans('webinars.select_file_type')); ?></option>

                                        <?php $__currentLoopData = \App\Models\File::$fileTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fileType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($fileType); ?>" <?php if(!empty($file) and $file->file_type == $fileType): ?> selected <?php endif; ?>><?php echo e(trans('update.file_type_'.$fileType)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-6 js-file-volume-field">
                                    <label class="input-label"><?php echo e(trans('webinars.file_volume')); ?></label>
                                    <input type="text" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][volume]" value="<?php echo e((!empty($file)) ? $file->volume : ''); ?>" class="js-ajax-volume form-control" placeholder="<?php echo e(trans('webinars.online_file_volume')); ?>"/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                                <textarea name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][description]" class="js-ajax-description form-control" rows="6"><?php echo e(!empty($file) ? $file->description : ''); ?></textarea>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="js-online_viewer-input form-group mt-20">
                                <div class="d-flex align-items-center justify-content-between">
                                    <label class="cursor-pointer input-label" for="online_viewerSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>"><?php echo e(trans('update.online_viewer')); ?></label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][online_viewer]" class="custom-control-input" id="online_viewerSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>" <?php echo e((!empty($file) and $file->online_viewer) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="online_viewerSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="js-downloadable-input form-group mt-20">
                                <div class="d-flex align-items-center justify-content-between">
                                    <label class="cursor-pointer input-label" for="downloadableSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>"><?php echo e(trans('home.downloadable')); ?></label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][downloadable]" class="custom-control-input" id="downloadableSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>" <?php echo e((empty($file) or $file->downloadable) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="downloadableSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-20">
                                <div class="d-flex align-items-center justify-content-between">
                                    <label class="cursor-pointer input-label" for="fileStatusSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>"><?php echo e(trans('public.active')); ?></label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][status]" class="custom-control-input" id="fileStatusSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>" <?php echo e((empty($file) or $file->status == \App\Models\File::$Active) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="fileStatusSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>"></label>
                                    </div>
                                </div>
                            </div>

                            <?php if(getFeaturesSettings('sequence_content_status')): ?>
                                <div class="form-group mt-20">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="cursor-pointer input-label" for="SequenceContentSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>"><?php echo e(trans('update.sequence_content')); ?></label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][sequence_content]" class="js-sequence-content-switch custom-control-input" id="SequenceContentSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>" <?php echo e((!empty($file) and ($file->check_previous_parts or !empty($file->access_after_day))) ? 'checked' : ''); ?>>
                                            <label class="custom-control-label" for="SequenceContentSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="js-sequence-content-inputs pl-5 <?php echo e((!empty($file) and ($file->check_previous_parts or !empty($file->access_after_day))) ? '' : 'd-none'); ?>">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <label class="cursor-pointer input-label" for="checkPreviousPartsSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>"><?php echo e(trans('update.check_previous_parts')); ?></label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][check_previous_parts]" class="custom-control-input" id="checkPreviousPartsSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>" <?php echo e((empty($file) or $file->check_previous_parts) ? 'checked' : ''); ?>>
                                                <label class="custom-control-label" for="checkPreviousPartsSwitch<?php echo e(!empty($file) ? $file->id : '_record'); ?>"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('update.access_after_day')); ?></label>
                                        <input type="number" name="ajax[<?php echo e(!empty($file) ? $file->id : 'new'); ?>][access_after_day]" value="<?php echo e((!empty($file)) ? $file->access_after_day : ''); ?>" class="js-ajax-access_after_day form-control" placeholder="<?php echo e(trans('update.access_after_day_placeholder')); ?>"/>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="progress d-none">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>

                        </div>
                    </div>

                    <div class="mt-30 d-flex align-items-center">
                        <button type="button" class="js-save-file btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                        <?php if(empty($file)): ?>
                            <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </li>

    <?php $__env->startPush('scripts_bottom'); ?>
        <script>
            var filePathPlaceHolderBySource = {
                upload: '<?php echo e(trans('update.file_source_upload_placeholder')); ?>',
                youtube: '<?php echo e(trans('update.file_source_youtube_placeholder')); ?>',
                vimeo: '<?php echo e(trans('update.file_source_vimeo_placeholder')); ?>',
                external_link: '<?php echo e(trans('update.file_source_external_link_placeholder')); ?>',
                google_drive: '<?php echo e(trans('update.file_source_google_drive_placeholder')); ?>',
                dropbox: '<?php echo e(trans('update.file_source_dropbox_placeholder')); ?>',
                iframe: '<?php echo e(trans('update.file_source_iframe_placeholder')); ?>',
                s3: '<?php echo e(trans('update.file_source_s3_placeholder')); ?>',
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH /home/braitaca/public_html/resources/views/web/default/panel/webinar/create_includes/accordions/file.blade.php ENDPATH**/ ?>