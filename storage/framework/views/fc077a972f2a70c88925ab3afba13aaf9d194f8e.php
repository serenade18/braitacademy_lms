<li data-id="<?php echo e(!empty($formField) ? $formField->id :''); ?>" class="accordion-row bg-white rounded-sm border border-gray300 mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="form_<?php echo e(!empty($formField) ? $formField->id :'record'); ?>">
        <div class="d-flex align-items-center" href="#collapseForm<?php echo e(!empty($formField) ? $formField->id :'record'); ?>" aria-controls="collapseForm<?php echo e(!empty($formField) ? $formField->id :'record'); ?>" data-parent="#formFieldsCard" role="button"
             data-toggle="collapse"
             aria-expanded="true">
            <span class="chapter-icon chapter-content-icon mr-10">
                <i data-feather="file-text" class=""></i>
            </span>

            <div class="font-weight-bold text-dark-blue d-block cursor-pointer"><?php echo e(!empty($formField) ? $formField->title : trans('update.add_new_field')); ?></div>
        </div>

        <div class="d-flex align-items-center">

            <?php if(!empty($formField)): ?>
                <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

                <a href="<?php echo e(getAdminPanelUrl()); ?>/forms/<?php echo e($form->id); ?>/fields/<?php echo e($formField->id); ?>/delete" class="delete-action btn btn-sm btn-transparent text-gray" data-confirm="<?php echo e(trans('update.delete_form_field_confirm_btn_text')); ?>" data-title="<?php echo e(trans('update.delete_form_field_hint')); ?>">
                    <i data-feather="trash-2" class="mr-10 cursor-pointer" height="20"></i>
                </a>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseForm<?php echo e(!empty($formField) ? $formField->id :'record'); ?>" aria-controls="collapseForm<?php echo e(!empty($formField) ? $formField->id :'record'); ?>"
               data-parent="#formFieldsCard"
               role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseForm<?php echo e(!empty($formField) ? $formField->id :'record'); ?>" aria-labelledby="form_<?php echo e(!empty($formField) ? $formField->id :'record'); ?>" class=" collapse <?php if(empty($formField)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="js-field-form" data-action="<?php echo e(getAdminPanelUrl()); ?>/forms/<?php echo e($form->id); ?>/fields/<?php echo e(!empty($formField) ? $formField->id . '/update' : 'store'); ?>">

                <div class="row">
                    <div class="col-12 col-lg-6">

                        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                <select name="ajax[<?php echo e(!empty($formField) ? $formField->id : 'new'); ?>][locale]"
                                        class="form-control <?php echo e(!empty($formField) ? 'js-form-field-locale' : ''); ?>"
                                        data-path="<?php echo e(!empty($formField) ? getAdminPanelUrl("/forms/{$form->id}/fields/{$formField->id}/edit") : ''); ?>"
                                >
                                    <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang); ?>" <?php echo e((!empty($formField) and !empty($formField->locale)) ? (mb_strtolower($formField->locale) == mb_strtolower($lang) ? 'selected' : '') : (app()->getLocale() == $lang ? 'selected' : '')); ?>><?php echo e($language); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="ajax[<?php echo e(!empty($formField) ? $formField->id : 'new'); ?>][locale]" value="<?php echo e($defaultLocale); ?>">
                        <?php endif; ?>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.type')); ?></label>
                            <select name="ajax[<?php echo e(!empty($formField) ? $formField->id : 'new'); ?>][type]" class="js-ajax-type js-form-field-type form-control">
                                <option value=""><?php echo e(trans('update.choose_a_field_type')); ?></option>
                                <?php $__currentLoopData = \App\Models\FormField::$fieldTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type); ?>" <?php if(!empty($formField) and $formField->type == $type): ?> selected <?php endif; ?>><?php echo e(trans('update.'.$type)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="js-form-field-title-card form-group <?php echo e((!empty($formField)) ? '' : 'd-none'); ?>">
                            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($formField) ? $formField->id : 'new'); ?>][title]" class="js-ajax-title form-control <?php echo e(!empty($formField) ? "js-title-field-{$formField->id}" : ''); ?>" value="<?php echo e(!empty($formField) ? $formField->title : ''); ?>"
                                   placeholder="<?php echo e(trans('forms.maximum_255_characters')); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="js-field-options ml-1 <?php echo e((!empty($formField) and in_array($formField->type, ['dropdown', 'checkbox', 'radio'])) ? '' : 'd-none'); ?>">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <strong class="d-block"><?php echo e(trans('admin/main.add_options')); ?></strong>
                                <button type="button" class="btn btn-success add-field-option-btn "><i class="fa fa-plus"></i> <?php echo e(trans('admin/main.add')); ?></button>
                            </div>

                            <ul class="js-field-options-lists draggable-content-lists draggable-form-field-options-lists-<?php echo e(!empty($formField) ? $formField->id : ''); ?>"
                                data-drag-class="draggable-form-field-options-lists-<?php echo e(!empty($formField) ? $formField->id : ''); ?>"
                                data-path="<?php echo e(!empty($formField) ? getAdminPanelUrl("/forms/{$form->id}/fields/{$formField->id}/options/orders") : ''); ?>"
                                data-move-class="move-icon2"
                            >
                                <?php if(!empty($formField) and !empty($formField->options)): ?>
                                    <?php $__currentLoopData = $formField->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li data-id="<?php echo e($option->id); ?>" class="form-group list-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text cursor-pointer move-icon2">
                                                        <i class="fa fa-arrows-alt"></i>
                                                    </div>
                                                </div>

                                                <input type="text" name="ajax[options][<?php echo e($option->id); ?>][title]"
                                                       class="form-control w-auto flex-grow-1 js-title-option-<?php echo e($option->id); ?>"
                                                       value="<?php echo e($option->title); ?>"
                                                       placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>

                                                <div class="input-group-append">
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/forms/<?php echo e($formField->id); ?>/fields/<?php echo e($formField->id); ?>/options/<?php echo e($option->id); ?>/delete" class="delete-action btn btn-danger d-inline-flex align-items-center">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="form-group mt-30 mb-0 d-flex align-items-center">
                            <label class="" for="requiredSwitch<?php echo e(!empty($formField) ? $formField->id : 'new'); ?>"><?php echo e(trans('public.required')); ?></label>
                            <div class="custom-control custom-switch ml-3">
                                <input type="checkbox" name="ajax[<?php echo e(!empty($formField) ? $formField->id : 'new'); ?>][required]" class="custom-control-input" id="requiredSwitch<?php echo e(!empty($formField) ? $formField->id : 'new'); ?>" <?php echo e((!empty($formField) and $formField->required) ? 'checked' : ''); ?>>
                                <label class="custom-control-label" for="requiredSwitch<?php echo e(!empty($formField) ? $formField->id : 'new'); ?>"></label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-20 d-flex align-items-center">
                    <button type="button" class="js-save-form-field btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                    <?php if(empty($formField)): ?>
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\forms\create\includes\field_accordion.blade.php ENDPATH**/ ?>