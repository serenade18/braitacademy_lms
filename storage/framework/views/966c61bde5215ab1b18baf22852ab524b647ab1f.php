<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel Payku | <?php echo e(trans('laravel-payku::missing.title')); ?></title>
</head>
<body>
    <header>
        <img src="https://payku.cl/wp-content/uploads/2019/05/payku_2x.png" alt="">
        <h1><?php echo e(trans('laravel-payku::missing.it_works')); ?></h1>
    </header>

    <div class="detail">
        <div class="group">
            <div class="title">ID:</div>
            <div class="value"><?php echo e($result->id); ?></div>
        </div>
        <div class="group">
            <div class="title">Status:</div>
            <div class="value"><?php echo e($result->status); ?></div>
        </div>
        <div class="group">
            <div class="title">Order:</div>
            <div class="value"><?php echo e($result->order); ?></div>
        </div>
        <div class="group">
            <div class="title">Email:</div>
            <div class="value"><?php echo e($result->email); ?></div>
        </div>
        <div class="group">
            <div class="title">Subject:</div>
            <div class="value"><?php echo e($result->subject); ?></div>
        </div>
        <div class="group">
            <div class="title">Amount:</div>
            <div class="value"><?php echo e($result->amount); ?></div>
        </div>
    </div>

    <p><?php echo e(trans('laravel-payku::missing.finished_1')); ?> "<strong><?php echo e($routeName); ?></strong>", <?php echo e(trans('laravel-payku::missing.finished_2')); ?></p>

    <pre><?php echo e($result); ?></pre>

</body>
</html>

<style>
    @import('https://fonts.googleapis.com/css2?family=Karla:wght@400;600&display=swap');

    :root {
        --color-one:  #000036;
        --color-two:  #00E48C;
        --color-three:  #fff;
    }

    * {
        margin:  0;
        padding:  0;
    }

    html {
        font-family: 'Karla', sans-serif;
        background: #1b2032;
        color: var(--color-three);
        text-align: center;
    }

    header {
        background: #4d39e9;
        padding: 30px 40px;
        display: flex;
        justify-content: space-between;
    }

    h1 {

    }

    .detail {
        background: var(--color-three);
        color: var(--color-one);
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        padding: 50px 5px;
    }

    .group {
        margin: 5px;
    }

    .title {
        font-weight: 600;
    }

    pre {
        margin: 20px;
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    p {
        color: #f8b526;
        padding: 10px;
    }
</style>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\vendor\sebacarrasco93\laravel-payku\resources\views\notify\missing-route.blade.php ENDPATH**/ ?>