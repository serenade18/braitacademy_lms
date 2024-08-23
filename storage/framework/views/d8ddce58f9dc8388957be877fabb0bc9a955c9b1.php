<div class="col-12 col-md-3 mt-20">
    <div class="course-statistic-cards-shadow pt-15 px-15 pb-25 rounded-sm bg-white">
        <span class="d-block font-16 font-weight-bold text-secondary"><?php echo e($cardTitle); ?></span>
        <div class="mt-25 statistic-pie-charts">
            <canvas id="<?php echo e($cardId); ?>" height="197"></canvas>
        </div>

        <div class="mt-25">
            <div class="d-flex align-items-center">
                <span class="cart-label-color rounded-circle bg-primary mr-5"></span>
                <span class="font-14 font-weight-500 text-gray"><?php echo e($cardPrimaryLabel); ?></span>
            </div>
            <div class="d-flex align-items-center">
                <span class="cart-label-color rounded-circle bg-secondary mr-5"></span>
                <span class="font-14 font-weight-500 text-gray"><?php echo e($cardSecondaryLabel); ?></span>
            </div>
            <div class="d-flex align-items-center">
                <span class="cart-label-color rounded-circle bg-warning mr-5"></span>
                <span class="font-14 font-weight-500 text-gray"><?php echo e($cardWarningLabel); ?></span>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\webinar\course_statistics\includes\pie_charts.blade.php ENDPATH**/ ?>