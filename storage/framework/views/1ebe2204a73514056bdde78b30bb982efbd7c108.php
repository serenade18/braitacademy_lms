<?php $__env->startPush('styles_top'); ?>
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>

<div class=" mt-3 ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/personalization/home_sections" method="post">
                                <?php echo e(csrf_field()); ?>

                                <select name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value=""><?php echo e(trans('admin/main.select')); ?></option>

                                    <?php $__currentLoopData = \App\Models\HomeSection::$names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sectionName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!in_array($sectionName,$selectedSectionsName)): ?>
                                            <option value="<?php echo e($sectionName); ?>"><?php echo e(trans('admin/main.'.$sectionName)); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <button type="submit" class="btn btn-success mt-2"><?php echo e(trans('admin/main.add_new')); ?></button>
                            </form>

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-md-6">
                            <h3 class="font-20 font-weight-bold"><?php echo e(trans('admin/main.home_sections')); ?></h3>

                            <ul class="draggable-lists list-group" data-order-table="home_sections">

                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li data-id="<?php echo e($section->id); ?>" class="form-group list-group">
                                        <div class="d-flex align-items-center justify-content-between p-2 border rounded-lg">
                                            <span><?php echo e(trans('admin/main.'.$section->name)); ?></span>

                                            <div class="d-flex align-items-center">
                                                <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/settings/personalization/home_sections/'. $section->id .'/delete','btnClass' => 'text-danger mr-2 font-16'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                <div class="cursor-pointer move-icon font-16 mr-1">
                                                    <i class="fa fa-arrows-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/home_sections.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\personalization\home_sections.blade.php ENDPATH**/ ?>