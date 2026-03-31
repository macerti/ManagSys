<?php $title = 'Register'; require __DIR__ . '/../layout/header.php'; ?>

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
                <div style="font-size: 3rem; margin-bottom: var(--spacing-md);">✍️</div>
                <h1>Create Account</h1>
                <p style="color: var(--color-text-secondary); font-family: var(--font-secondary);">
                    Join ManagSys Today
                </p>
            </div>

            <form method="post" novalidate>
                <input type="hidden" name="csrf_token" value="<?= e(csrf_token()); ?>">

                <div class="form-group">
                    <label for="email">
                        Email Address
                        <span class="tooltip-container" data-tooltip="Use your work email">ℹ️</span>
                    </label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        required 
                        placeholder="you@company.com"
                        autocomplete="email"
                    >
                </div>

                <div class="form-group">
                    <label for="password">
                        Password
                        <span class="tooltip-container" data-tooltip="Min 8 characters, mix of uppercase, lowercase, numbers">ℹ️</span>
                    </label>
                    <input 
                        type="password" 
                        id="password"
                        name="password" 
                        required 
                        minlength="8"
                        placeholder="••••••••"
                        autocomplete="new-password"
                    >
                    <div class="form-hint">Must be at least 8 characters</div>
                </div>

                <button type="submit" style="width: 100%; margin-bottom: var(--spacing-md);">
                    Create Account
                </button>

                <div style="text-align: center;">
                    Already have an account? 
                    <a href="index.php?page=login">Sign In</a>
                </div>
            </form>
        </div>

        <div style="text-align: center; margin-top: var(--spacing-xl); color: var(--color-text-tertiary); font-size: 0.85rem; font-family: var(--font-secondary);">
            <p>By registering, you agree to our Terms of Service</p>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
