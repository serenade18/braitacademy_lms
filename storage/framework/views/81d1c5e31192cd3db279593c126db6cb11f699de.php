<?php if(!empty($course->chapters) and count($course->chapters)): ?>
    <div class="accordion-content-wrapper mt-15" id="chapterAccordion" role="tablist" aria-multiselectable="true">
        <?php $__currentLoopData = $course->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="accordion-row bg-white rounded-sm border border-gray200 mb-2">
                <div class="d-flex align-items-center justify-content-between p-10" role="tab" id="chapter_<?php echo e($chapter->id); ?>">
                    <div class="d-flex align-items-center" href="#collapseChapter<?php echo e($chapter->id); ?>" aria-controls="collapseChapter<?php echo e($chapter->id); ?>" data-parent="#chapterAccordion" role="button" data-toggle="collapse" aria-expanded="true">
                        <span class="chapter-icon mr-10">
                            <i data-feather="grid" class="" width="20" height="20"></i>
                        </span>

                        <div class="">
                            <span class="font-weight-bold font-14 text-dark-blue d-block"><?php echo e($chapter->title); ?></span>

                            <span class="font-12 text-gray d-block">
                                <?php echo e($chapter->getTopicsCount(true)); ?> <?php echo e(trans('public.topic')); ?>

                            </span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <i class="collapse-chevron-icon feather-chevron-down text-gray" data-feather="chevron-down" height="20" href="#collapseChapter<?php echo e($chapter->id); ?>" aria-controls="collapseChapter<?php echo e($chapter->id); ?>" data-parent="#chapterAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
                    </div>
                </div>

                <div id="collapseChapter<?php echo e($chapter->id); ?>" aria-labelledby="chapter_<?php echo e($chapter->id); ?>" class="collapse" role="tabpanel">
                    <div class="panel-collapse text-gray">

                        <?php if(!empty($chapter->chapterItems) and count($chapter->chapterItems)): ?>
                            <?php $__currentLoopData = $chapter->chapterItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapterItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($chapterItem->type == \App\Models\WebinarChapterItem::$chapterSession and !empty($chapterItem->session) and $chapterItem->session->status == 'active'): ?>
                                    <?php echo $__env->make('web.default.course.learningPage.components.content_tab.content' , ['item' => $chapterItem->session, 'type' => 'session'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php elseif($chapterItem->type == \App\Models\WebinarChapterItem::$chapterFile and !empty($chapterItem->file) and $chapterItem->file->status == 'active'): ?>
                                    <?php echo $__env->make('web.default.course.learningPage.components.content_tab.content' , ['item' => $chapterItem->file, 'type' => 'file'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php elseif($chapterItem->type == \App\Models\WebinarChapterItem::$chapterTextLesson and !empty($chapterItem->textLesson) and $chapterItem->textLesson->status == 'active'): ?>
                                    <?php echo $__env->make('web.default.course.learningPage.components.content_tab.content' , ['item' => $chapterItem->textLesson, 'type' => 'text_lesson'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php elseif($chapterItem->type == \App\Models\WebinarChapterItem::$chapterAssignment and !empty($chapterItem->assignment) and $chapterItem->assignment->status == 'active'): ?>
                                    <?php echo $__env->make('web.default.course.learningPage.components.content_tab.assignment-content-tab' ,['item' => $chapterItem->assignment], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php elseif($chapterItem->type == \App\Models\WebinarChapterItem::$chapterQuiz and !empty($chapterItem->quiz) and $chapterItem->quiz->status == 'active'): ?>
                                    <?php echo $__env->make('web.default.course.learningPage.components.quiz_tab.quiz' ,['item' => $chapterItem->quiz, 'type' => 'quiz'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/web/default/course/learningPage/components/content_tab/chapter.blade.php ENDPATH**/ ?>