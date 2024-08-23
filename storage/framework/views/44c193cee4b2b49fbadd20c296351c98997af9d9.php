<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-cart-plus"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4><?php echo e(trans('update.total_rules')); ?></h4>
                </div>
                <div class="card-body">
                    <?php echo e($totalRules); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-check"></i>
            </div>

            <div class="card-wrap">
                <div class="card-header">
                    <h4><?php echo e(trans('update.active_rules')); ?></h4>
                </div>
                <div class="card-body">
                    <?php echo e($activeRules); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-spinner"></i></div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4><?php echo e(trans('update.total_activities')); ?></h4>
                </div>
                <div class="card-body">
                    <?php echo e($totalActivities); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-money-bill"></i></div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4><?php echo e(trans('admin/main.total_sales')); ?></h4>
                </div>
                <div class="card-body">
                    <?php echo e($totalSales); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\abandoned_cart\rules\lists\top_stats.blade.php ENDPATH**/ ?>