<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(trans('admin/main.print')); ?> <?php echo e($document->title); ?></title>
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/admin/css/print.css">
</head>
<body>
<div class="main-box">
    <div class="print-1"></div>
    <div class="factor-logo-container">
        <img src="<?php echo e(getGeneralSettings('logo')); ?>" class=""/>
        <br>
        <h3 class="mt-1"><?php echo e(trans('financial.financial_documents')); ?></h3>
    </div>
    <div class="print-2">
        <div>
            <span><?php echo e(trans('admin/main.document_number')); ?>:</span>&nbsp;<label><?php echo e($document->id); ?></label>
        </div>
        <div class="mt-2">
            <span><?php echo e(trans('admin/main.created_at')); ?>:</span>&nbsp;<label><?php echo e(dateTimeFormat($document->created_at,'d F Y - H:i')); ?></label>
        </div>
    </div>
    <div class="w-100 clear-both"></div>
    <table>

        <th><?php echo e(trans('admin/main.email')); ?></th>
        <th><?php echo e(trans('admin/main.mobile')); ?></th>
        <th><?php echo e(trans('admin/main.title')); ?></th>
        <th><?php echo e(trans('admin/main.type')); ?></th>
        <th><?php echo e(trans('admin/main.amount')); ?>(<?php echo e($currency); ?>)</th>

        <tr>
            <th><?php echo e($document->user->email ?? '-'); ?></th>
            <th><?php echo e($document->user->mobile ?? '-'); ?></th>
            <th>
                <?php if(!empty($document->webinar_id)): ?>
                    <span class="d-block font-weight-bold"><?php echo e(trans('admin/main.item_purchased')); ?></span>
                    <span class="d-block font-weight-bold">#<?php echo e($document->webinar_id); ?>-<?php echo e($document->webinar->title); ?></span>
                <?php elseif(!empty($document->meeting_time_id)): ?>
                    <span class="d-block font-weight-bold"><?php echo e(trans('admin/main.item_purchased')); ?></span>
                    <span class="d-block font-weight-bold"><?php echo e(trans('admin/main.meeting')); ?></span>
                <?php elseif(!empty($document->subscribe_id)): ?>
                    <span class="d-block font-weight-bold"><?php echo e(trans('admin/main.purchased_subscribe')); ?></span>
                <?php elseif(!empty($document->promotion_id)): ?>
                    <span class="d-block font-weight-bold"><?php echo e(trans('admin/main.purchased_promotion')); ?></span>
                <?php endif; ?>
            </th>
            <th>
                <?php switch($document->type):
                    case (\App\Models\Accounting::$addiction): ?>
                    <span class="text-success"><?php echo e(trans('admin/main.addiction')); ?></span>
                    <?php break; ?>
                    <?php case (\App\Models\Accounting::$deduction): ?>
                    <span class="text-danger"><?php echo e(trans('admin/main.deduction')); ?></span>
                    <?php break; ?>
                <?php endswitch; ?>
            </th>
            <th><?php echo e($document->amount); ?></th>
        </tr>

    </table>

    <table>

        <tr>
            <th class="th-1">
                <?php echo e(!empty($document->description) ? $document->description : 'Description'); ?>

            </th>
        </tr>

    </table>

    <div class="print-3"></div>

    <div class="print-4">

        <div class="print-5">
            <span><?php echo e(trans('public.created_by')); ?>:</span>&nbsp;
            <label><?php echo e(!empty($document->creator_id) ? $document->creator->full_name : 'Automatic'); ?></label>
        </div>
    </div>

    <div class="print-6"></div>
</div>
</body>
</html>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\documents\print.blade.php ENDPATH**/ ?>