
<div class="top-navbar d-flex border-bottom">
    <div class="container d-flex justify-content-between flex-column flex-lg-row">
        <a class="navbar-brand navbar-order mr-0 d-flex align-items-center justify-content-center" href="/">
            <?php if(!empty($generalSettings['logo'])): ?>
                <img src="<?php echo e($generalSettings['logo']); ?>" class="img-cover" alt="site logo">
            <?php endif; ?>
        </a>

        <div class="top-contact-box border-bottom d-flex flex-column flex-md-row align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center">
                <?php if(!empty($generalSettings['site_phone'])): ?>
                    <span class="d-flex align-items-center py-10 py-lg-0 text-dark-blue font-14">
                        <i data-feather="phone" width="20" height="20" class="mr-10"></i>
                        <?php echo e($generalSettings['site_phone']); ?>

                    </span>
                <?php endif; ?>

                <?php if(!empty($generalSettings['site_email'])): ?>
                    <div class="border-left mx-5 mx-lg-15 h-100"></div>

                    <span class="d-flex align-items-center py-10 py-lg-0 text-dark-blue font-14">
                        <i data-feather="mail" width="20" height="20" class="mr-10"></i>
                        <?php echo e($generalSettings['site_email']); ?>

                    </span>
                <?php endif; ?>
            </div>

            
            <?php echo $__env->make('web.default.includes.top_nav.user_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\includes\mobile_app_top_nav.blade.php ENDPATH**/ ?>