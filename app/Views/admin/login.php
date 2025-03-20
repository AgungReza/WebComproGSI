<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="<?= base_url('/src/output.css') ?>" rel="stylesheet">
</head>
<body class="bg-gray-900 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-white text-center mb-4">Login</h2>

        <?php if (session()->getFlashdata('error')) : ?>
            <p class="text-red-500 text-sm mb-4"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="<?= site_url('/admin/login') ?>" method="post">
            <?= csrf_field() ?>

            <label class="block text-white">Email</label>
            <input type="email" name="email" class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none mb-3" required>

            <label class="block text-white">Password</label>
            <input type="password" name="password" class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none mb-3" required>

            <button type="submit" class="w-full bg-yellow-500 text-black p-2 rounded-lg">Login</button>
        </form>

        <p class="text-gray-400 text-center mt-4">Don't have an account? <a href="/admin/register" class="text-yellow-400">Register</a></p>
    </div>
</body>
</html>
