<li data-id="<?php echo e(!empty($chapterItem) ? $chapterItem->id :''); ?>" class="accordion-row bg-white rounded-sm border border-gray300 mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="quiz_<?php echo e(!empty($quizInfo) ? $quizInfo->id :'record'); ?>">
        <div class="d-flex align-items-center" href="#collapseQuiz<?php echo e(!empty($quizInfo) ? $quizInfo->id :'record'); ?>" aria-controls="collapseQuiz<?php echo e(!empty($quizInfo) ? $quizInfo->id :'record'); ?>" data-parent="#<?php echo e(!empty($chapter) ? 'chapterContentAccordion'.$chapter->id : 'quizzesAccordion'); ?>" role="button" data-toggle="collapse" aria-expanded="true">
            <span class="chapter-icon chapter-content-icon mr-10">
                <i data-feather="award" class=""></i>
            </span>

            <span class="font-weight-bold text-dark-blue d-block cursor-pointer"><?php echo e(!empty($quizInfo) ? $quizInfo->title : trans('public.add_new_quizzes')); ?></span>
        </div>

        <div class="d-flex align-items-center">

            <?php if(!empty($quizInfo) and $quizInfo->status != \App\Models\WebinarChapter::$chapterActive): ?>
                <span class="disabled-content-badge mr-10"><?php echo e(trans('public.disabled')); ?></span>
            <?php endif; ?>

            <?php if(!empty($quizInfo) and !empty($chapterItem)): ?>
                <button type="button" data-item-id="<?php echo e($quizInfo->id); ?>" data-item-type="<?php echo e(\App\Models\WebinarChapterItem::$chapterQuiz); ?>" data-chapter-id="<?php echo e(!empty($chapter) ? $chapter->id : ''); ?>" class="js-change-content-chapter btn btn-sm btn-transparent text-gray mr-10">
                    <i data-feather="grid" class="" height="20"></i>
                </button>
            <?php endif; ?>

            <?php if(!empty($chapter)): ?>
                <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>
            <?php endif; ?>

            <?php if(!empty($quizInfo)): ?>
                <a href="<?php echo e(getAdminPanelUrl()); ?>/quizzes/<?php echo e($quizInfo->id); ?>/delete" class="delete-action btn btn-sm btn-transparent text-gray">
                    <i data-feather="trash-2" class="mr-10 cursor-pointer" height="20"></i>
                </a>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseQuiz<?php echo e(!empty($quizInfo) ? $quizInfo->id :'record'); ?>" aria-controls="collapseQuiz<?php echo e(!empty($quizInfo) ? $quizInfo->id :'record'); ?>" data-parent="#quizzesAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseQuiz<?php echo e(!empty($quizInfo) ? $quizInfo->id :'record'); ?>" aria-labelledby="quiz_<?php echo e(!empty($quizInfo) ? $quizInfo->id :'record'); ?>" class=" collapse <?php if(empty($quizInfo)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <?php echo $__env->make('admin.quizzes.create_quiz_form',
                    [
                        'inWebinarPage' => true,
                        'selectedWebinar' => $webinar,
                        'quiz' => $quizInfo ?? null,
                        'quizQuestions' => !empty($quizInfo) ? $quizInfo->quizQuestions : [],
                        'chapters' => $webinar->chapters,
                        'webinarChapterPages' => !empty($webinarChapterPages),
                        'creator' => $webinar->creator
                    ]
                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</li>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/admin/webinars/create_includes/accordions/quiz.blade.php ENDPATH**/ ?>