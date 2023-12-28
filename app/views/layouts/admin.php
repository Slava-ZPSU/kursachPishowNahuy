<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <link href="/public/css/bootstrap.css" rel="stylesheet">
    <link href="/public/css/admin.css" rel="stylesheet">
    <link href="/public/css/stylesForAllPages.css" rel="stylesheet">
    <link href="/public/fonts/google-fonts.css" rel="stylesheet"  type="text/css">
    <link rel="shortcut icon" href="#" />
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/form.js"></script>
    <script src="/public/js/popper.js"></script>
    <script src="/public/js/bootstrap.js"></script>
</head>
<body class="fixed-nav sticky-footer bg-dark">
<?php if ($this->route['action'] != 'login'): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand store-logo" href="/admin/moderation">BitBazar</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/moderation">
                        <span class="nav-link-text">Модерація товарів</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/add">
                        <span class="nav-link-text">Додавання</span>
                    </a>
                </li>
                <?php if ($_SESSION['admin']['role'] == 'main'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/register">
                        <span class="nav-link-text">Реєстрація нового адміна</span>
                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/logout">
                        <span class="nav-link-text">Вихід</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<?php endif; ?>

<?php echo $content; ?>

<?php if ($this->route['action'] != 'login'): ?>
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>&copy; 2023, ZPSU</small>
            </div>
        </div>
    </footer>
<?php endif; ?>

<script src="/public/js/displayUploadImage.js"></script>
</body>
</html>