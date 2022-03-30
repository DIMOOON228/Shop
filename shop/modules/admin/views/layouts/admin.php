<?php

/** @var yii\web\View $this */
/** @var string $content */
namespace yii\bootstrap4;
use Yii;
use app\assets\AppAsset;
use yii\helpers\ArrayHelper;
use app\components\MenuWidget;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\rest\UrlRule;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<html class="no-js" lang="zxx">
    <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Админка/<?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

        <!-- preloader -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- preloader end  -->

        <!-- header start -->
        <header>
            <div id="header-sticky" class="header-area box-90">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-6 col-md-6 col-7 col-sm-5 d-flex align-items-center pos-relative">

                            <div class="logo">
                                <a href="<?= \yii\helpers\Url::home() ?>"><?= Html::img('@web/img/logo/logo.png',['alt'=>'Shop']) ?></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-6 col-md-8 col-8 d-none d-xl-block">
                            <div class="main-menu text-center">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="<?= \yii\helpers\Url::to(['/admin']) ?>"> Главная</a>
                                        </li>
                                        <li>
                                            <a href="#">Категории</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::to(['category/index']) ?>">Список категорий</a>
                                                </li>
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::to(['category/create']) ?>">Добавить категорию</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Товары</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::to(['product/index']) ?>">Список товаров</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 col-5 col-sm-7 pl-0">
                            <div class="header-right f-right">
                                <ul>
                                    <li class="search-btn" action="<?= \yii\helpers\Url::to(['category/search']) ?>">
                                        <a class="search-btn nav-search search-trigger"  href="#"><i class="fas fa-search"></i></a>
                                    </li>
                                    <?php if(!Yii::$app->user->isGuest): ?>
                                    <li ><a href="<?=\yii\helpers\Url::to(['/site/logout'])?>"><?= Yii::$app->user->identity['username']?>Exit</a></li><?php endif;?>
                                    <li class="d-shop-cart"><a href="№" class="cart-open" ><i class="flaticon-shopping-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 d-xl-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->
        <div class="container"><?=$content ?></div>
       

        <!-- footer start -->
        <footer>
            <div class="footer-area box-90 pt-100 pb-60">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-5 col-md-6 ">
                            <div class="footer-widget mb-40">
                                <div class="footer-logo">
                                    <a href="/"><img src="/img/logo/footer-logo.png" alt=""></a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore mag na
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                                <div class="footer-time d-flex mt-30">
                                    <div class="time-icon">
                                        <img src="/img/icon/time.png" alt="">
                                    </div>
                                    <div class="time-text">
                                        <span>Got Questions ? Call us 24/7!</span>
                                        <span><a href=”tel:+380671406238”>+38 (067) 140-62-38</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 d-lg-none d-xl-block">
                            <div class="footer-widget pl-50 mb-40">
                                <h3>Social Media</h3>
                                <ul class="footer-link">
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Behance</a></li>
                                    <li><a href="#"> Dribbble</a></li>
                                    <li><a href="#">Linkedin</a></li>
                                    <li><a href="#">Youtube</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 d-lg-none d-xl-block">
                            <div class="footer-widget pl-30 mb-40">
                                <h3>Location</h3>
                                <ul class="footer-link">
                                    <li><a href="#">New York</a></li>
                                    <li><a href="#">Tokyo</a></li>
                                    <li><a href="#">Dhaka</a></li>
                                    <li><a href="#"> Chittagong</a></li>
                                    <li><a href="#">China</a></li>
                                    <li><a href="#">Japan</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-widget mb-40">
                                <h3>About</h3>
                                <ul class="footer-link">
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#"> Privacy Policy</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Wholesale</a></li>
                                    <li><a href="#">Direction</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-5 col-md-6">
                            <div class="footer-widget mb-40">
                                <div class="footer-banner">
                                    <a href="shop.html"><img src="/img/banner/add.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area box-105">
                <div class="container-fluid">
                    <div class="copyright-border pt-30 pb-30">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="copyright text-center text-md-left">
                                    <p>Copyright © 2019 <a href="#">BasicTheme</a>. All Rights Reserved</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="footer-icon text-center text-md-right ">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-telegram"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->

    <!-- Fullscreen search -->
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fas fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get"  action=" <?= \yii\helpers\Url::to(['category/search']) ?>">
                    <div class="search-field-holder">
                        <input type="search" class="main-search-input" name = "q" placeholder="Search Entire Store... ">
                    </div>
                </form>
            </div>
        </div>
    </div> 
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>