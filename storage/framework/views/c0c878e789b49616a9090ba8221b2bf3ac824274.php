<html>
<head>
    <title><?php echo e($pageTitle ?? ''); ?><?php echo e(!empty($generalSettings['site_name']) ? (' | '.$generalSettings['site_name']) : ''); ?></title>

    <!-- General CSS File -->
    <link href="/assets/default/css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/default/css/app.css">
</head>
<body class="play-iframe-page">
<?php if(!empty($iframe)): ?>
    <?php echo $iframe; ?>

<?php else: ?>
    <iframe src="<?php echo e($path); ?>" frameborder="0" allowfullscreen class="interactive-file-iframe"></iframe>
<?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\learningPage\interactive_file.blade.php ENDPATH**/ ?>