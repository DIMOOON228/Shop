<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<main>

<!-- breadcrumb-area-start -->

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-text text-center">
                    <h1><?= $product->category->name ?></h1>
                    <ul class="breadcrumb-menu">
                        <li><a href="/">Главная</a></li>
                        <li><span>shop details</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<!-- breadcrumb-area-end -->
<?php 
    $mainImg = $product->getImage();
    $gallery = $product->getImages();
?>

<!-- shop-area start -->
<section class="shop-details-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-4">
                <div class="product-details-img mb-10">
                    <div class="tab-content" id="myTabContentpro">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="product-large-img">
                                <?= Html::img($mainImg->getUrl(),['alt' => $product->name])?>
                            </div>
                        </div>
                        <div class="sale-tag">
                                        <?php if($product->new): ?>
                                        <span class="new">new</span>
                                        <?php endif; ?>
                                        <?php if($product->sale): ?>
                                        <span class="sale">sale</span>
                                        <?php endif; ?>
                                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <div class="product-large-img">
                                <img src="/img/product/pro15.jpg" alt="">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile1" role="tabpanel">
                            <div class="product-large-img">
                                <img src="/img/product/pro16.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-thumb-tab mb-30">  
                    <ul class="nav" id="myTab2" role="tablist">
                    <?php $count=count($gallery); $i=0; foreach($gallery as $img): ?>
                        <?php if($i %3 == 0): ?>
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-selected="true">
                            <?= Html::img($img->getUrl('405x440'),['alt' => $product->name])?></a>
                        </li>
                        <?php endif; ?>
                        <?php $i++;$i==$count; endforeach; ?>
                    </ul>
                    
                </div>
            </div>
            <div class="col-xl-6 col-lg-8">
                <div class="product-details mb-30 pl-30">
                    <div class="details-cat mb-20">
                        <a href="#">decor,</a>
                        <a href="#">furniture</a>
                    </div>
                    
                    <h2 class="pro-details-title mb-15"><?= $product->name?></h2>
                    <div class="details-price mb-20">
                        <span>$<?= $product->price ?></span>
                        <span class="old-price">$<?=$product->old_price?></span>
                    </div>

                    <div class="product-variant">
                        <div class="product-color variant-item">
                            <div class="variant-name">
                                <span>Colors</span>
                            </div>
                            <ul class="shop-link shop-color">
                                <li><a href="shop.html"><span class="blue"></span></a></li>
                                <li><a href="shop.html"><span class="green"></span> </a></li>
                                <li><a href="shop.html"><span class="orange"></span> </a></li>
                                <li><a href="shop.html"><span class="navy"></span> </a></li>
                                <li><a href="shop.html"><span class="pinkish"></span> </a></li>
                                <li><a href="shop.html"><span class="vista"></span> </a></li>
                            </ul>
                        </div>

                        <div class="product-size variant-item">
                            <div class="variant-name">
                                <span>size</span>
                            </div>
                            <ul class="shop-link shop-size">
                                <li><a href="shop.html">xxl   </a></li>
                                <li class="active"><a href="shop.html">xl </a></li>
                                <li><a href="shop.html">lg </a></li>
                                <li><a href="shop.html">md  </a></li>
                                <li><a href="shop.html">sm </a></li>
                            </ul>
                        </div>

                        <div class="product-Metarial variant-item">
                            <div class="variant-name">
                                <span>Material</span>
                            </div>
                            <ul class="shop-link shop-size">
                                <li><a href="shop.html">leather</a></li>
                                <li class="active"><a href="shop.html">resin</a></li>
                                <li><a href="shop.html">metal </a></li>
                                <li><a href="shop.html">fiber </a></li>
                                <li><a href="shop.html">slag </a></li>
                            </ul>
                        </div>

                        <div class="product-desc variant-item">
                        </div>

                        <div class="product-info-list variant-item">
                            <ul>
                                <li><span a href="<?= yii\helpers\Url::to(['category/view','id'=>$product->category->id]) ?>">Brands:</span> <?= $product->category->name ?></li>
                                <li><span>Product Code:</span> <?=$product->id ?></li>
                                <li><span>Reward Points:</span> 100</li>
                                <li><span>Stock:</span> <span class="in-stock">In Stock</span></li>
                            </ul>
                        </div>

                        <div class="product-action-details variant-item">
                            <div class="product-details-action">
                                <form action="*" >
                                    <div class="plus-minus">
                                        <div class="cart-plus-minus"><input type="text" value="1" /></div>
                                    </div>
                                    <button class="details-action-icon" type="submit"><i class="fas fa-heart"></i></button>
                                    <button class="details-action-icon" type="submit"><i class="fas fa-hourglass"></i></button>
                                    <div class="details-cart mt-40">
                                    <a href="<?=\yii\helpers\Url::to(['/cart/add','id'=>$product->id])?>"><button  class="btn theme-btn add-to-cart cart " data-id="<?= $product->id ?>" >Оформить заказ</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col-xl-8 col-lg-8">
                <div class="product-review">
                    <ul class="nav review-tab" id="myTabproduct" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab6" data-toggle="tab" href="#home6" role="tab" aria-controls="home"
                                aria-selected="true">Description </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab6" data-toggle="tab" href="#profile6" role="tab" aria-controls="profile"
                                aria-selected="false">Reviews (2)</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab6">
                            <div class="desc-text">
                                <p><?= $product->content ?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile6" role="tabpanel" aria-labelledby="profile-tab6">
                            <div class="desc-text review-text">
                                <div class="product-commnets">
                                    <div class="product-commnets-list mb-25 pb-15">
                                        <div class="pro-comments-img">
                                            <img src="/img/product/comments/01.png" alt="">
                                        </div>
                                        <div class="pro-commnets-text">
                                            <h4>Roger West -
                                                <span>June 5, 2018</span>
                                            </h4>
                                            <div class="pro-rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                                incididunt
                                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation.</p>
                                        </div>
                                    </div>
                                    <div class="product-commnets-list mb-25 pb-15">
                                        <div class="pro-comments-img">
                                            <img src="/img/product/comments/02.png" alt="">
                                        </div>
                                        <div class="pro-commnets-text">
                                            <h4>Roger West -
                                                <span>June 5, 2018</span>
                                            </h4>
                                            <div class="pro-rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                                incididunt
                                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-box mt-50">
                                    <h4>Add a Review</h4>
                                    <div class="your-rating mb-40">
                                        <span>Your Rating:</span>
                                        <div class="rating-list">
                                            <a href="#">
                                                <i class="far fa-star"></i>
                                            </a>
                                            <a href="#">
                                                <i class="far fa-star"></i>
                                            </a>
                                            <a href="#">
                                                <i class="far fa-star"></i>
                                            </a>
                                            <a href="#">
                                                <i class="far fa-star"></i>
                                            </a>
                                            <a href="#">
                                                <i class="far fa-star"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <form class="review-form" action="#">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <label for="message">YOUR REVIEW</label>
                                                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="r-name">Name</label>
                                                <input type="text" id="r-name">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="r-email">Email</label>
                                                <input type="email" id="r-email">
                                            </div>
                                            <div class="col-xl-12">
                                                <button class="btn theme-btn">Add your Review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="pro-details-banner">
                    <a href="shop.html"><img src="/img/banner/pro-details.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop-area end -->

    <!-- product-area start -->
    <section class="product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="area-title text-center mb-50">
                        <h2>Новинки</h2>
                        <p>Browse the huge variety of our products</p>
                    </div>
                </div>
            </div>
            <div class="product-slider-2 owl-carousel">
                <?php $count=count($new); $i=0;foreach($new as $n):  ?>
                <?php if($i % 3 == 0): ?> 
                <div class=" pro<?php if($i == 0) echo '-item' ?>">
                <?php endif; ?>
                <?php $mainImg=$n->getImage() ?>
                    <div class="product-wrapper">
                        <div class="product-img mb-25">
                            <a href="<?= yii\helpers\Url::to(['product/view','id'=>$n->id]) ?>">
                            <?= Html::img($mainImg->getUrl(),['alt' => $n->name])?>
                                <img class="secondary-img" src="/img/product/pro5.jpg" alt="">
                            </a>
                            <div class="product-action text-center">
                                <a href="#" title="Shoppingb Cart">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                                <a href="#" title="Quick View">
                                    <i class="flaticon-eye"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-placement="right" title="Compare">
                                    <i class="flaticon-compare"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="pro-cat mb-10">
                                <a href="shop.html">decor, </a>
                                <a href="shop.html">furniture</a>
                            </div>
                            <h4>
                            <a href="<?= yii\helpers\Url::to(['product/view','id'=>$n->id]) ?>"><?= $n->name ?></a>
                            </h4>
                            <div class="product-meta">
                                <div class="pro-price">
                                    <span>$<?= $n->price ?>USD</span>
                                    <span class="old-price">$<?= $n->old_price ?> USD</span>
                                </div>
                            </div>
                            <div class="product-wishlist">
                                <a href="#"><i class="far fa-heart" title="Wishlist"></i></a>
                            </div>
                        </div>
                        <?php if($i % 3 == 0): ?>
                        </div>
                    <?php endif; ?>  
                </div>
                <?php endforeach; ?>  
            </div>
        </div>
    </section>
    <!-- product-area end -->


</main>