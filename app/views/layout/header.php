<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="ManagSys - ISO 17021 Accreditation Management System">
    <title><?= e($title ?? 'ManagSys') ?> - Accreditation Management</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90' fill='%232563eb'%3E⚙%3C/text%3E%3C/svg%3E">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/public/css/styles.css">
    
    <style>
      /* Additional responsive fixes */
      @supports (padding: max(0px)) {
        body {
          padding-left: max(0px, env(safe-area-inset-left));
          padding-right: max(0px, env(safe-area-inset-right));
          padding-bottom: max(0px, env(safe-area-inset-bottom));
        }
      }
    </style>
</head>
<body>
    <div class="app-container">
        <!-- DESKTOP SIDEBAR -->
        <aside class="app-sidebar" role="navigation" aria-label="Main navigation">
            <div class="app-sidebar-logo">
                <span>⚙️</span>
                <span>ManagSys</span>
            </div>
            
            <nav class="app-sidebar-nav">
                <?php if (!is_logged_in()): ?>
                    <a href="index.php?page=login" data-page="login" <?= isCurrentPage('login') ? 'class="active"' : '' ?>>
                        <span>🔐</span> Login
                    </a>
                    <a href="index.php?page=register" data-page="register" <?= isCurrentPage('register') ? 'class="active"' : '' ?>>
                        <span>✍️</span> Register
                    </a>
                <?php else: ?>
                    <a href="index.php?page=dashboard" data-page="dashboard" <?= isCurrentPage('dashboard') ? 'class="active"' : '' ?>>
                        <span>📊</span> Dashboard
                    </a>
                    <a href="index.php?page=roles" data-page="roles" <?= isCurrentPage('roles') ? 'class="active"' : '' ?>>
                        <span>👥</span> Roles & Users
                    </a>
                    <a href="index.php?page=profile" data-page="profile" <?= isCurrentPage('profile') ? 'class="active"' : '' ?>>
                        <span>👤</span> Profile
                    </a>
                <?php endif; ?>
            </nav>

            <?php if (is_logged_in()): ?>
                <div style="border-top: 1px solid var(--color-border); padding-top: var(--spacing-lg); margin-top: auto;">
                    <div style="font-size: 0.9rem; color: var(--color-text-secondary); margin-bottom: var(--spacing-md);">
                        Logged in as<br>
                        <strong><?= e($_SESSION['user_email'] ?? '') ?></strong>
                    </div>
                    <a href="index.php?page=logout" class="btn btn-secondary" style="width: 100%; justify-content: center;">
                        <span>🚪</span> Logout
                    </a>
                </div>
            <?php endif; ?>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="app-main">
            <!-- TOP BAR (Desktop only, visible on desktop screens) -->
            <?php if (is_logged_in()): ?>
                <div class="app-topbar">
                    <h1 class="app-topbar-title">
                        <?= e($title ?? 'ManagSys') ?>
                    </h1>
                    <div class="app-topbar-actions">
                        <span class="tooltip-container" data-tooltip="Your account">👤</span>
                    </div>
                </div>
            <?php endif; ?>

            <!-- CONTENT -->
            <div class="app-content">
                <!-- ALERTS -->
                <?php if ($flashes = get_flash()): ?>
                    <?php foreach ($flashes as $flash): ?>
                        <div class="alert alert-<?= e($flash['type']) ?>">
                            <?= e($flash['message']) ?>
                            <button onclick="this.parentElement.remove()" style="background: none; border: none; color: inherit; cursor: pointer; font-size: 1.2rem; padding: 0; margin-left: auto;">×</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
