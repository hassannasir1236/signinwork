<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <title><?= $title ?></title> -->
     <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/bootstrap.min.css') ?>">
</head>
<body>
    <header>
        <!-- Header content here -->
    </header>
    <nav>
        <!-- Navigation menu here -->
    </nav>
    <main>
        <!-- Yielded content will be inserted here -->
        <?= $this->renderSection('content') ?>
    </main>
    <footer>
        <!-- Footer content here -->
    </footer>
    <script type="text/javascript" src="<?= base_url('public/assets/js/bootstrap.min.css') ?>"></script>
</body>
</html>
