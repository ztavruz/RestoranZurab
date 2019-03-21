<?php

use Engine\Categories;
use Engine\Goods;

$categories = new Categories();
$allCategories = $categories->getCategories();

$goods = new Goods();
$allGods = $goods->getGoods();

?>
<h1 class="centered">Админ - панель</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 br">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="nav flex-column">
                            <?php 
                             foreach ($allCategories as $key1 => $value1):
                                // debug($value1);
                            ?>
                            
                            <div class="btn-group dropright">
                                <button type="button" class="btn btn-secondary dropdown-toggle btn-secondary-custom"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $value1['name_categories']; ?>
                                </button>
                                <div class="dropdown-menu">
                                    <?php 
                                        $currentCategoriGoods = $goods->getGoodsCategori($value1['id']);
                                        foreach($currentCategoriGoods as $key2 => $value2):
                                        // debug($good);
                                    ?>
                                    <a class="dropdown-item" href="#">
                                        <?php  
                                            echo $value2['name_good'];
                                        ?>
                                    </a>
                                    <?php endforeach; ?>
                                    <!-- <a class="dropdown-item  active" href="#">Regular link</a>
                                    <a class="dropdown-item" href="#">Active link</a> -->
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </div>

        <div class="col-sm-8 br">
            <div class="editcategories">
                <div class="container-fluid">
                    <div class="row">
                        <!-- ДОБАВЛЕНИЕ КАТЕГОРИИ -->
                        <div class="col-sm-4 border">
                            <form action="/view/admin/handler.php" method="post">
                                <h4>Добавить категорию</h4>
                                <div class="form-group">
                                    <label for="form-control">Название:</label>
                                    <input class="form-control" type="text" name="nameCategories" placeholder="Задайте название категории">
                                </div>
                                <button type="submit" class="btn btn-primary">ДОБАВИТЬ</button>
                            </form>
                        </div>
                        <!-- ИЗМЕНЕНИЕ КАТЕГОРИИ -->
                        <div class="col-sm-4 border">
                            <form action="/view/admin/handler.php" method="post">
                                <h4>Измененить категорию</h4>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите изменяемую категорию</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="renameCategories">
                                        <?php 
                                        foreach ($allCategories as $key1 => $value1):
                                        ?>

                                        <option>
                                            <?php echo $value1['name_categories']; ?>
                                        </option>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="form-control">Изменить название:</label>
                                    <input class="form-control" type="text" name="newNameCategories" placeholder="Задайте название новое название">
                                </div>
                                <div class="form-group">
                                    <label for="form-control">Изменить порядковый номер:</label>
                                    <input class="form-control" type="text" name="numberCategories" placeholder="Задайте очередь (не обязательно)">
                                </div>
                                <button type="submit" class="btn btn-primary">ИЗМЕНИТЬ</button>
                            </form>
                        </div>
                        
                        <!-- УДАЛЕНИЕ КАТЕГОРИИ -->
                        <div class="col-sm-4 border">
                            <form action="/view/admin/handler.php" method="post">
                                <h4>Удалить категорию</h4>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите удаляемую категорию</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="deleteCategories">
                                        <?php 
                   foreach ($allCategories as $key1 => $value1):
                    ?>

                                        <option name="deleteId">
                                            <?php echo $value1['name_categories']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">УДАЛИТЬ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<!-- РЕДАКТИРОВАНИЕ ТОВАРОВ -->
            <div class="editgoods">
                <div class="container-fluid">
                    <div class="row">
                        <!-- ДОБАВЛЕНИЕ ТОВАРА -->
                        <div class="col-sm-4 border">
                            <form action="/view/admin/handler.php" method="post">
                                <h4>Добавить товар</h4>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите категорию:</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="categoriForAddGoods">
                                        <?php 
                                            foreach ($allCategories as $key1 => $value1):
                                            ?>

                                            <option>
                                            <?php echo $value1['name_categories']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="form-control">Название:</label>
                                    <input class="form-control" type="text" name="nameAddGood" placeholder="Задайте название товара:">
                                </div>
                                <button type="submit" class="btn btn-primary">ДОБАВИТЬ</button>
                            </form>
                        </div>
                         <!-- ТЕСТ ТОВАРА -->
                         <div class="col-sm-4 border">
                            <form action="/view/admin/handler.php" method="post">
                                <h4>Измененить товар</h4>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите категорию товара:</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="renameCategories">
                                        <?php 
                                            foreach ($allCategories as $key1 => $value1):
                                            ?>

                                            <option>
                                            <?php echo $value1['name_categories']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите изменяемый товар:</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="renameCategories">
                                        <?php 
                                            foreach ($allCategories as $key1 => $value1):
                                            ?>

                                            <option>
                                            <?php echo $value1['name_categories']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="form-control">Изменить название:</label>
                                    <input class="form-control" type="text" name="newNameCategories" placeholder="Задайте название новое название">
                                </div>
                                <div class="form-group">
                                    <label for="form-control">Изменить порядковый номер:</label>
                                    <input class="form-control" type="text" name="numberCategories" placeholder="Задайте очередь (не обязательно)">
                                </div>
                                <button type="submit" class="btn btn-primary">ИЗМЕНИТЬ</button>
                            </form>
                        </div>
                        <!-- ИЗМЕНЕНИЕ ТОВАРА -->
                        <div class="col-sm-4 border">
                            <form action="/view/admin/handler.php" method="post">
                                <h4>Измененить товар</h4>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите изменяемый товар</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="renameCategories">
                                        <?php 
                                            foreach ($allCategories as $key1 => $value1):
                                            ?>

                                            <option>
                                            <?php echo $value1['name_categories']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="form-control">Изменить название:</label>
                                    <input class="form-control" type="text" name="newNameCategories" placeholder="Задайте название новое название">
                                </div>
                                <div class="form-group">
                                    <label for="form-control">Изменить порядковый номер:</label>
                                    <input class="form-control" type="text" name="numberCategories" placeholder="Задайте очередь (не обязательно)">
                                </div>
                                <button type="submit" class="btn btn-primary">ИЗМЕНИТЬ</button>
                            </form>
                        </div>
                       
                        <!-- УДАЛЕНИЕ ТОВАРА  -->
                        <div class="col-sm-4 border">
                            <form action="/view/admin/handler.php" method="post">
                                <h4>Удалить категорию</h4>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите удаляемую категорию</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="deleteCategories">
                                        <?php 
                                            foreach ($allCategories as $key1 => $value1):
                                            ?>

                                            <option name="deleteId">
                                                <?php echo $value1['name_categories']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">УДАЛИТЬ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>