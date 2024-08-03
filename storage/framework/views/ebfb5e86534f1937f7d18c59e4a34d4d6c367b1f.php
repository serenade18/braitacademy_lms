<?php if(!empty($user->blog) and !$user->blog->isEmpty()): ?>
    <div class="row">

        <?php $__currentLoopData = $user->blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-md-4">
                <div class="mt-30">
                    <?php echo $__env->make('web.default.blog.grid-list',['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
        'file_name' => 'webinar.png',
        'title' => trans('update.instructor_not_have_posts'),
        'hint' => '',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/web/default/user/profile_tabs/posts.blade.php ENDPATH**/ ?>