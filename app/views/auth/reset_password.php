<?php $title = 'Reset Password'; require __DIR__ . '/../layout/header.php'; ?>
<section class="card">
    <h2>Reset Password</h2>
    <form method="post" class="auth-form" novalidate>
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()); ?>">
        <label>Reset Token
            <input type="text" name="token" required>
        </label>
        <label>New Password
            <input type="password" name="password" required minlength="8">
        </label>
        <button type="submit">Reset Password</button>
    </form>
</section>
<?php require __DIR__ . '/../layout/footer.php'; ?>
