<li data-id="<?php echo e(!empty($faq) ? $faq->id :''); ?>" class="accordion-row bg-white rounded-sm panel-shadow mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="faq_<?php echo e(!empty($faq) ? $faq->id :'record'); ?>">
        <div class="font-weight-bold text-dark-blue" href="#collapseFaq<?php echo e(!empty($faq) ? $faq->id :'record'); ?>" aria-controls="collapseFaq<?php echo e(!empty($faq) ? $faq->id :'record'); ?>" data-parent="#faqsAccordion" role="button" data-toggle="collapse" aria-expanded="true">
            <span><?php echo e(!empty($faq) ? $faq->title : trans('webinars.add_new_faqs')); ?></span>
        </div>

        <div class="d-flex align-items-center">
            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

            <?php if(!empty($faq)): ?>
                <div class="btn-group dropdown table-actions mr-15">
                    <button type="button" class="btn-transparent dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical" height="20"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a href="/panel/faqs/<?php echo e($faq->id); ?>/delete" class="delete-action btn btn-sm btn-transparent"><?php echo e(trans('public.delete')); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseFaq<?php echo e(!empty($faq) ? $faq->id :'record'); ?>" aria-controls="collapseFaq<?php echo e(!empty($faq) ? $faq->id :'record'); ?>" data-parent="#faqsAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseFaq<?php echo e(!empty($faq) ? $faq->id :'record'); ?>" aria-labelledby="faq_<?php echo e(!empty($faq) ? $faq->id :'record'); ?>" class=" collapse <?php if(empty($faq)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="js-content-form faq-form" data-action="/panel/faqs/<?php echo e(!empty($faq) ? $faq->id . '/update' : 'store'); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($faq) ? $faq->id : 'new'); ?>][bundle_id]" value="<?php echo e(!empty($bundle) ? $bundle->id :''); ?>">

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                <select name="ajax[<?php echo e(!empty($faq) ? $faq->id : 'new'); ?>][locale]"
                                        class="form-control <?php echo e(!empty($faq) ? 'js-bundle-content-locale' : ''); ?>"
                                        data-bundle-id="<?php echo e(!empty($bundle) ? $bundle->id : ''); ?>"
                                        data-id="<?php echo e(!empty($faq) ? $faq->id : ''); ?>"
                                        data-relation="faqs"
                                        data-fields="title,answer"
                                >
                                    <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang); ?>" <?php echo e((!empty($faq) and !empty($faq->locale)) ? (mb_strtolower($faq->locale) == mb_strtolower($lang) ? 'selected' : '') : ($locale == $lang ? 'selected' : '')); ?>><?php echo e($language); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="ajax[<?php echo e(!empty($faq) ? $faq->id : 'new'); ?>][locale]" value="<?php echo e($defaultLocale); ?>">
                        <?php endif; ?>


                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                            <input type="text" name="ajax[<?php echo e(!empty($faq) ? $faq->id : 'new'); ?>][title]" class="js-ajax-title form-control" value="<?php echo e(!empty($faq) ? $faq->title : ''); ?>" placeholder="<?php echo e(trans('forms.maximum_64_characters')); ?>"/>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.answer')); ?></label>
                            <textarea name="ajax[<?php echo e(!empty($faq) ? $faq->id : 'new'); ?>][answer]" class="js-ajax-answer form-control" rows="6"><?php echo e(!empty($faq) ? $faq->answer : ''); ?></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" class="js-save-faq btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                    <?php if(empty($faq)): ?>
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\bundle\create_includes\accordions\faq.blade.php ENDPATH**/ ?>