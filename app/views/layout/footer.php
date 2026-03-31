            </div>
        </main>
    </div>

    <!-- MOBILE BOTTOM NAVIGATION -->
    <nav class="app-bottom-nav" role="navigation" aria-label="Mobile navigation">
        <nav>
            <?php if (!is_logged_in()): ?>
                <a href="index.php?page=login" data-page="login" <?= isCurrentPage('login') ? 'class="active"' : '' ?>>
                    <span>🔐</span>
                    <span>Login</span>
                </a>
                <a href="index.php?page=register" data-page="register" <?= isCurrentPage('register') ? 'class="active"' : '' ?>>
                    <span>✍️</span>
                    <span>Register</span>
                </a>
            <?php else: ?>
                <a href="index.php?page=dashboard" data-page="dashboard" <?= isCurrentPage('dashboard') ? 'class="active"' : '' ?>>
                    <span>📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="index.php?page=roles" data-page="roles" <?= isCurrentPage('roles') ? 'class="active"' : '' ?>>
                    <span>👥</span>
                    <span>Roles</span>
                </a>
                <a href="index.php?page=profile" data-page="profile" <?= isCurrentPage('profile') ? 'class="active"' : '' ?>>
                    <span>👤</span>
                    <span>Profile</span>
                </a>
                <a href="index.php?page=logout">
                    <span>🚪</span>
                    <span>Logout</span>
                </a>
            <?php endif; ?>
        </nav>
    </nav>

    <!-- PATTERN BACKGROUND (For login/register pages) -->
    <?php if (in_array($title ?? '', ['Login', 'Register', 'Forgot Password', 'Reset Password'])): ?>
        <div class="pattern-background">
            <div class="pattern-element"></div>
            <div class="pattern-element"></div>
            <div class="pattern-element"></div>
            <div class="pattern-element"></div>
        </div>
    <?php endif; ?>

    <!-- Scripts -->
    <script src="/public/js/app.js"></script>
    <script>
        // PHP helper function for JS
        function isCurrentPage(page) {
            const urlParams = new URLSearchParams(window.location.search);
            const currentPage = urlParams.get('page') || 'login';
            return currentPage === page;
        }
    </script>
</body>
</html>
