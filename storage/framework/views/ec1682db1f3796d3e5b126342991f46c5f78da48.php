<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4><?php echo e(trans('update.total_users')); ?></h4>
                </div>
                <div class="card-body">
                    <?php echo e($totalUsers); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-money-bill"></i>
            </div>

            <div class="card-wrap">
                <div class="card-header">
                    <h4><?php echo e(trans('financial.total_amount')); ?></h4>
                </div>
                <div class="card-body">
                    <?php echo e($totalAmount); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-cube"></i></div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4><?php echo e(trans('update.total_items')); ?></h4>
                </div>
                <div class="card-body">
                    <?php echo e($totalItems); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-arrow-down"></i></div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4><?php echo e(trans('update.total_sent_reminders')); ?></h4>
                </div>
                <div class="card-body">
                    <?php echo e($totalSentReminders); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\abandoned_cart\users_carts\top_stats.blade.php ENDPATH**/ ?>