<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" class="w-100 h-100">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo e($pageTitle ?? ''); ?><?php echo e(!empty($generalSettings['site_name']) ? (' | '.$generalSettings['site_name']) : ''); ?></title>
    <link rel="stylesheet" href="/assets/default/css/app.css">
</head>

<body class="w-100 h-100">
    <div class="w-100 h-100" id="meet"></div>


</body>

<script src="https://meet.jit.si/external_api.js"></script>
<script>
    "use strict"

    function jitsiMeeting() {
        const meeting_id = "<?php echo e($session->id); ?>";

        const domain = '<?php echo e(getFeaturesSettings("jitsi_live_url")); ?>';
        const options = {
            roomName: meeting_id,
            role: '<?php echo e($role); ?>',
            parentNode: document.querySelector('#meet'),

            userInfo: {
                email: "<?php echo e($authUser->email); ?>",
                displayName: "<?php echo e($authUser->full_name); ?>",
                role: '<?php echo e($role); ?>',
            }
        }

        const api = new JitsiMeetExternalAPI(domain, options);
    }

    window.onload = jitsiMeeting();
</script>

<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\jitsi\join_live.blade.php ENDPATH**/ ?>