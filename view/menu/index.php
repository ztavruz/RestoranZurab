<?php

use Engine\Cards;

$categories = new Cards();
$categories = $categories->getCategories();

// debug($categories);
?>

<h1 class="centered">Наше меню: ЖРИТЕ НЕ ОБЛЯПАЙТЕСЬ</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <ul class="nav flex-column">
                <?php 
                    foreach ($categories as $key => $value):
                ?>

                <div class="btn-group dropright">
                    <button type="button" class="btn btn-secondary dropdown-toggle btn-secondary-custom" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php echo $value['name_categories']; ?>
                    </button>
                    <div class="dropdown-menu">
                        <!-- Dropdown menu links -->
                        <a class="dropdown-item active" href="#">Regular link</a>
                        <a class="dropdown-item" href="#">Active link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                        <a class="dropdown-item" href="#">Another link</a>
                    </div>
                </div>

                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-sm-10">
            <div class="cards">
                <div class="container">
                    <div class="row">
                        <?php for ($i=0; $i < 10; $i++):
                    
                    ?>
                        <div class="col-sm-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="/uploads/s1200.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Название карточки</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of
                                        the card's content.</p>
                                    <a href="#" class="btn btn-primary">Переход куда-нибудь</a>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>