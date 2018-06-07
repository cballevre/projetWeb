<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 23:22
 */

?>

<!DOCTYPE html>
<html lang="fr" class="no-js gr__modularcode_io">
<head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Key Manager</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,800,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="<?php echo WEBROOT; ?>assets/css/vendor.css">
    <link rel="stylesheet" id="theme-style" href="<?php echo WEBROOT; ?>assets/css/app.css">

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>
    <div class="main-wrapper">
        <div class="app" id="app">
            <header class="header">
                <div class="header-block header-block-search">
                    <h3 class="title">
                        <?php echo $this->getHeadline(); ?>
                    </h3>
                </div>
            </header>
            <aside class="sidebar">
                <div class="sidebar-container">
                    <div class="sidebar-header">
                        <div class="brand">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span>
                                <span class="l l3"></span>
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div>
                            Key Manager
                        </div>
                    </div>
                    <nav class="menu">
                        <ul class="sidebar-menu metismenu" id="sidebar-menu">

                            <?php  /**
                            * Require le fichier de conf du menu
                            */
                            $menu = require ROOT. '/config/menu.php';

                            foreach ($menu as $item): ?>
                                <li>
                                    <?php if(isset($item["children"])): ?>
                                        <a href="">
                                    <?php else: ?>
                                        <a href="<?php echo $item["route"]; ?>">
                                    <?php endif; ?>
                                        <?php if(isset($item['icon'])) :  ?>
                                            <i class="<?php echo $item['icon']; ?>"></i>
                                        <?php endif; ?>
                                        <?php echo $item['title']; ?>
                                        <?php if(isset($item["children"])): ?>
                                            <i class="fa arrow"></i>
                                        <?php endif; ?>
                                    </a>
                                    <?php if(isset($item['children'])): ?>
                                        <ul class="sidebar-nav">
                                            <?php foreach ($item['children'] as $child): ?>
                                                <?php var_dump($child); ?>
                                                <li>
                                                    <a href="items-list.html"> Items List </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </aside>
            <article class="content dashboard-page">
                <?php echo $getContent; ?>
            </article>
            <footer class="footer">
            </footer>
        </div><!-- end #app.app -->
    </div><!-- end .main-wrapper -->
</body>

<script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
        crossorigin="anonymous"></script>
</html>