<?php $title = 'Login'; require __DIR__ . '/../layout/header.php'; ?>

<div style="
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: var(--spacing-lg);
    margin: auto;
">
    <div style="
        width: 100%;
        max-width: 400px;
        animation: slideUp 0.5s ease-out;
    ">
        <div class="card">
            <div style="text-align: center; margin-bottom: var(--spacing-2xl);">
                <div style="font-size: 3rem; margin-bottom: var(--spacing-md);">🔐</div>
                <h1>Welcome Back</h1>
                <p style="color: var(--color-text-secondary); font-family: var(--font-secondary);">
                    ISO 17021 Accreditation Management
                </p>
            </div>

            <form method="post" novalidate>
                <input type="hidden" name="csrf_token" value="<?= e(csrf_token()); ?>">

                <div class="form-group">
                    <label for="email">
                        Email Address
                        <span class="tooltip-container" data-tooltip="Enter your registered email">ℹ️</span>
                    </label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        required 
                        placeholder="you@example.com"
                        autocomplete="email"
                    >
                    <div class="form-hint">We'll never share your email</div>
                </div>

                <div class="form-group">
                    <label for="password">
                        Password
                        <span class="tooltip-container" data-tooltip="At least 8 characters">ℹ️</span>
                    </label>
                    <input 
                        type="password" 
                        id="password"
                        name="password" 
                        required 
                        minlength="8"
                        placeholder="••••••••"
                        autocomplete="current-password"
                    >
                    <div class="form-hint">Keep your password secure</div>
                </div>

                <button type="submit" style="width: 100%; margin-bottom: var(--spacing-md);">
                    Sign In
                </button>

                <div style="text-align: center; display: flex; gap: var(--spacing-sm); justify-content: center; flex-wrap: wrap;">
                    <a href="index.php?page=register">Create Account</a>
                    <span>•</span>
                    <a href="index.php?page=forgot-password">Forgot Password?</a>
                </div>
            </form>
        </div>

        <div style="text-align: center; margin-top: var(--spacing-xl); color: var(--color-text-tertiary); font-size: 0.85rem; font-family: var(--font-secondary);">
            <p>Secure • Encrypted • ISO Compliant</p>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
