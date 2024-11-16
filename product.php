<?php
error_reporting(0);
require 'vendor/connect.php';

if (isset($_GET['key'])) {
    if ($_GET['key'] == "all") {
        $sql_select = "SELECT * FROM `product`";
    }
    if ($_GET['key'] == "sale") {
        $sql_select = "SELECT * FROM `product` WHERE skidka > 0";
    }
    if ($_GET['key'] == "new") {
        $sql_select = "SELECT * FROM `product` WHERE `new_collection` = 1";
    }
    if ($_GET['key'] == "men") {
        $sql_select = "SELECT * FROM product WHERE cat = 'Мужчинам'";
    }
    if ($_GET['key'] == "women") {
        $sql_select = "SELECT * FROM product WHERE cat = 'Женщинам'";
    }

}
else if (isset($_POST['search'])) {
    if ($_POST['name'])
    {
        $sql_select = "SELECT * FROM `product` WHERE `name` LIKE '{$_POST["name"]}%'";
    }
    else 
    {
        $_GET['key'] = "all";
        $sql_select = "SELECT * FROM `product`";
    }
}
else {
    $_GET['key'] = "all";
    $sql_select = "SELECT * FROM `product`";
}

?>

<!DOCTYPE php>
<php lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Box icons -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <!-- Custom StyleSheet -->
        <link rel="stylesheet" href="./css/styles.css" />
        <title>Boy’s T-Shirt</title>
    </head>

    <body>
        <div class="navigation">
            <div class="nav-center container d-flex">
                <a href="index.php" class="logo">
                    <div style="display: flex; align-items: space-around">
                        <img src="images/logo.png" width="45" style="margin-right: 3px" />
                        <h1 style="font-size: 25px">neuroboots</h1>
                    </div>

                </a>

                <ul class="nav-list d-flex">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Главное</a>
                    </li>
                    <li class="nav-item">
                        <a href="product.php" class="nav-link-active">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a href="product.php" class="nav-link">Акции</a>
                    </li>
                    <li class="nav-item">
                        <a href="map.php" class="nav-link">Карта</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">О нас</a>
                    </li>
                    <li class="icons d-flex">
                        <a href="login.php" class="icon">
                            <i class="bx bx-user"></i>
                        </a>
                        <div class="icon">
                            <i class="bx bx-search"></i>
                        </div>
                        <div class="icon">
                            <i class="bx bx-heart"></i>
                            <span class="d-flex">0</span>
                        </div>
                        <a href="cart.php" class="icon">
                            <i class="bx bx-cart"></i>
                            <span class="d-flex">0</span>
                        </a>
                    </li>
                </ul>

                <div class="icons d-flex">
                    <a href="login.php" class="icon">
                        <i class="bx bx-user"></i>
                    </a>
                    <div class="icon">
                        <i class="bx bx-search"></i>
                    </div>
                    <div class="icon">
                        <i class="bx bx-heart"></i>
                        <span class="d-flex">0</span>
                    </div>
                    <a href="cart.php" class="icon">
                        <i class="bx bx-cart"></i>
                        <span class="d-flex">0</span>
                    </a>
                </div>

                <div class="hamburger">
                    <i class="bx bx-menu-alt-left"></i>
                </div>
            </div>
        </div>

        <!-- All Products -->
        <section class="section all-products" id="products" style="padding-top: 20px; background-image: url(images/i2.jpg); background-size: cover">
            <div class="top container">

                <div class="nav-center container d-flex" style="background-color: var(--black); height: 50px; border-radius: 2rem;">
                    <ul class="nav-list d-flex">
                        <li class="nav-item" style="display: flex;">
                            <a href="product.php?key=all" style="align-content: center; display: flex">
                                Фильтр
                                <div style="padding-right: 2px; font-size: 22px">
                                    <i class="bx bx-filter" style="margin-left: 5px"></i>
                                </div>

                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-center container d-flex" style="background-color: var(--black); height: 50px; border-radius: 2rem;">
                    <ul class="nav-list d-flex">
                        <li class="nav-item">
                            <a href="product.php?key=all" class="nav-link-cat<?php if ($_GET['key'] == "all")
                                echo "-active"; ?>">Все</a>
                        </li>
                        <li class="nav-item">
                            <li class="nav-item">
                                <a href="product.php?key=men" class="nav-link-cat<?php if ($_GET['key'] == "men")
                                    echo "-active"; ?>">Мужчинам</a>
                            </li>
                            <li class="nav-item">
                                <a href="product.php?key=women" class="nav-link-cat<?php if ($_GET['key'] == "women")
                                    echo "-active"; ?>">Женщинам</a>
                            </li>
                            <li class="nav-item">
                                <a href="product.php?key=sale" class="nav-link-cat<?php if ($_GET['key'] == "sale")
                                    echo "-active"; ?>">Распродажа 🔥</a>
                            </li>
                            <a href="product.php?key=new" class="nav-link-cat<?php if ($_GET['key'] == "new")
                                echo "-active"; ?>">Новая коллекция</a>
                    </ul>
                </div>

                <div class="nav-center container d-flex" style="background-color: var(--black); height: 50px; border-radius: 2rem; width: 24%; padding: 2%;">
                    <form method="post" action="product.php">
                                            <ul class="nav-list d-flex">
                        <li class="nav-item" style="display: flex">
                            <input name="name" placeholder="Поиск" id="search-input" style="font-family: 'Roboto', sans-serif;font-size: 17px;; text-indent: 2rem; width: 100%; border-radius: 1rem; outline: none; border: none; border-bottom: 1px solid var(--white); border-radius: 0; background-color: var(--black); color: var(--white) " />
                            <div class="icon">
                                <button name="search" type="submit" class="icon" style="background-color: var(--black); border: none"> <i class="bx bx-search"></i></button>

                            </div>
                        </li>
                    </ul>
                    </form>

                </div>
            </div>
            <?php if ($_POST['name']){ ?>
            <div style="margin-left: 23%; padding-bottom: 30px">По запросу "<?=$_POST['name']?>" найдено:</div>
            <?php } ?>
            <div class="product-center container">

                <?php
                $result = mysqli_query($con, $sql_select);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="product-item">
                        <div class="overlay">
                            <a href="" class="product-thumb">
                                <img src="<?php echo $row['imageref'] ?>" alt="" />
                            </a>
                            <?php if ($row['skidka'] > 0) { ?>
                                <span class="discount"><?php echo $row['skidka']; ?>%</span>
                            <?php } ?>
                        </div>
                        <div class="product-info">
                            <span><?php echo $row['cat']; ?></span>
                            <a href="productDetails.php?id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a>
                            <h4><?php echo $row['price']; ?> ₽</h4>
                        </div>
                        <form method="post" action="vendor/cartoperations.php">
                            <span class="discount" style="position: relative; margin-left: 78%; top: -386px"><a href="cart.php?action=add&id=<?php echo $row['id'] ?>" name="submit">+<i class="bx bx-cart"></i></a></span>
                        </form>
                    </div>
                    <?php
                }

                ?>

                <script>
                    $('#js-sort').change(function () {
                        $(this).closest('form').submit();
                    });
                </script>

            </div>
            <section class="pagination">
                <div class="container">
                    <span>1</span><span>2</span><span>3</span><span>4</span>
                    <span><i class="bx bx-right-arrow-alt"></i></span>
                </div>
            </section>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="row">
                <div class="col d-flex">
                    <h4>INFORMATION</h4>
                    <a href="">About us</a>
                    <a href="">Contact Us</a>
                    <a href="">Term & Conditions</a>
                    <a href="">Shipping Guide</a>
                </div>
                <div class="col d-flex">
                    <h4>USEFUL LINK</h4>
                    <a href="">Online Store</a>
                    <a href="">Customer Services</a>
                    <a href="">Promotion</a>
                    <a href="">Top Brands</a>
                </div>
                <div class="col d-flex">
                    <span><i class="bx bxl-facebook-square"></i></span>
                    <span><i class="bx bxl-instagram-alt"></i></span>
                    <span><i class="bx bxl-github"></i></span>
                    <span><i class="bx bxl-twitter"></i></span>
                    <span><i class="bx bxl-pinterest"></i></span>
                </div>
            </div>
        </footer>
        <!-- Custom Script -->
        <script src="./js/index.js"></script>
        <script src="./js/search.js"></script>
    </body>
</php>
