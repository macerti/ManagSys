<?php $title = 'Reset Password'; require __DIR__ . '/../layout/header.php'; ?>

<div style="
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: var(--spacing-lg);
">
    <div style="
        width: 100%;
        max-width: 400px;
        animation: slideUp 0.5s ease-out;
    ">
        <div class="card">
            <div style="text-align: center; margin-bottom: var(--spacing-2xl);">
                <div style="font-size: 3rem; margin-bottom: var(--spacing-md);">🔐</div>
                <h1>Create New Password</h1>
                <p style="color: var(--color-text-secondary); font-family: var(--font-secondary);">
                    Choose a strong password
                </p>
            </div>

            <?php if (!empty($reset)): ?>
                <form method="post" novalidate>
                    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()); ?>">
                    <input type="hidden" name="token" value="<?= e($token); ?>">

                    <div class="form-group">
                        <label for="password">
                            New Password
                            <span class="tooltip-container" data-tooltip="Min 8 chars, use uppercase, lowercase, numbers">ℹ️</span>
                        </label>
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            required 
                            minlength="8"
                            placeholder="••••••••"
                            autocomplete="new-password"
                            autofocus
                        >
                        <div class="form-hint">At least 8 characters</div>
                    </div>

                    <div class="form-group">
                        <label for="confirm">
                            Confirm Password
                            <span class="tooltip-container" data-tooltip="Must match above">ℹ️</span>
                        </label>
                        <input 
                            type="password" 
                            id="confirm"
                            name="confirm_password" 
                            required 
                            minlength="8"
                            placeholder="••••••••"
                            autocomplete="new-password"
                        >
                    </div>

                    <button type="submit" style="width: 100%;">
                        Reset Password
                    </button>
                </form>
            <?php else: ?>
                <div class="alert alert-error">
                    <strong>Invalid or expired link</strong>
                    <p>Please request a new password reset.</p>
                    <a href="index.php?page=forgot-password" class="btn btn-secondary" style="display: inline-block; margin-top: var(--spacing-md);">
                        Request New Link
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
