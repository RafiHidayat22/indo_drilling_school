<!-- resources/views/layouts/adminmain.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Indonesia Drilling School'); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/appadmin.css', 'resources/js/appadmin.js']); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="bg-gray-50">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script>
    <?php echo $__env->make('admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('admin.topbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Tambahkan pl-6 untuk memberi ruang ekstra di sebelah kiri -->
    <main class="ml-64 pt-16 pl-6">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>

</html><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views\layouts\adminmain.blade.php ENDPATH**/ ?>