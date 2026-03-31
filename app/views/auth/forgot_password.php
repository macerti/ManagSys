<?php $title = 'Forgot Password'; require __DIR__ . '/../layout/header.php'; ?>

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
                <div style="font-size: 3rem; margin-bottom: var(--spacing-md);">🔑</div>
                <h1>Reset Password</h1>
                <p style="color: var(--color-text-secondary); font-family: var(--font-secondary);">
                    Enter your email to receive reset instructions
                </p>
            </div>

            <form method="post" novalidate>
                <input type="hidden" name="csrf_token" value="<?= e(csrf_token()); ?>">

                <div class="form-group">
                    <label for="email">
                        Email Address
                        <span class="tooltip-container" data-tooltip="We'll send reset link to this email">ℹ️</span>
                    </label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        required 
                        placeholder="you@example.com"
                        autocomplete="email"
                    >
                </div>

                <button type="submit" style="width: 100%; margin-bottom: var(--spacing-md);">
                    Send Reset Link
                </button>

                <div style="text-align: center;">
                    Remember your password? 
                    <a href="index.php?page=login">Sign In</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
