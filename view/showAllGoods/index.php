<?php

use Engine\Categories;
use Engine\Goods;

$id = $_GET['id'];

$categories = new Categories();
$allCategories = $categories->getCategories();
$titleCategori = $categories->getCurrentNameCategories($id);

$goods = new Goods();
$allGoods = $goods->getGoodsCategori($id);
?>


<div class="container-fluid">

    <div class="header">
        <div class="row">
            <div class="col-sm-12 col-present-custom">
                <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
                    <form class="form-inline my-2 my-lg-0 form-inline-customs">
                        <input class="form-control mr-sm-2 form-control-customs" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0 btn-customs" type="submit">Поиск</button>
                    </form>
                    <a class="navbar-brand  navbar-brand-customs" href="/"><img src="/uploads/logo.png" alt="" srcset="">
                        <h4>ZURAB</h4>
                    </a>
                    <div class="basked-block">
                        <a class="basked" href="">Корзина заказа <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </div>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light navbar-block-custom">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto navbar-nav-customs">
                            <li class="nav-item nav-item-customs active">
                                <a class="nav-link nav-link-customs" href="/">Главная <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item nav-item-customs">
                                <a class="nav-link nav-link-customs" href="/about">О нас</a>
                            </li>
                            <li class="nav-item nav-item-customs">
                                <a class="nav-link nav-link-customs" href="/menu">
                                    Назад  
                                </a>
                            </li>
                            <li class="nav-item nav-item-customs">
                                <a class="nav-link nav-link-customs" href="/certificates">
                                    Сертификаты
                                </a>
                            </li>
                            <li class="nav-item nav-item-customs">
                                <a class="nav-link nav-link-customs" href="/delivery">
                                    Доставка
                                </a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </div>

    </div>

    <div class="content">

        <div class="row">
            <div class="col-sm-5 header-present">
                <h4 class="centered"><?php echo $titleCategori; ?></h4>
            </div>
        </div>

        <div class="row">
        <div class="col-sm-2 content-left">
                <ul class="nav flex-column content-left-nav">
                    <?php 
                        foreach ($allCategories as $key1 => $value1):
                        $id = $value1['id'];
                        $linkAtAllGoodsCategori = "/showAllGoods/index.php?id=$id";
                    ?>
                    <div class="btn-group dropright">
                        <button type="button" class="btn btn-secondary dropdown-toggle btn-secondary-custom"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $value1['name_categories']; ?>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item active" href="<?php echo $linkAtAllGoodsCategori; ?>">ПОКАЗАТЬ ВСЕ</a>
                            <?php
                                $currentCategoriGood = $goods->getGoodsCategori($value1['id']);
                                foreach($currentCategoriGood as $key2 => $value2):
                            ?>
                            <a class="dropdown-item" href="#">
                                <?php echo $value2['name_good'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-sm-10 content-right">
                <div class="cards">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($allGoods as $good):
                    
                    ?>
                            <div class="col-sm-4">
                                <div class="card card-custom" style="width: 18rem;">
                                    <img class="card-img-top" src="/uploads/s1200.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $good['name_good'] ?>
                                        </h5>
                                        <p class="card-text">Some quick example text to build on the card title and
                                            make up
                                            the bulk of
                                            the card's content.</p>
                                        <a href="#" class="btn btn-primary">ЗАКАЗАТЬ</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>