<?php
error_reporting(0);
require_once ("vendor/connect.php");


if (!$_SESSION['cart'])
    $_SESSION['cart'] = array();

if (isset($_GET['checkout']) && (!$_SESSION['client'] || $_SESSION['client']['admin'] == 1)) {
    $_SESSION['message'] = "Для начала авторизируйтесь";
    header("Location: login.php");
}

// Check to make sure the id parameter is specified in the URL
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $_SESSION['count_cart'] = (double) $_SESSION['count_cart'] + 1;
    $sql_select = "SELECT * FROM `product` WHERE `id` = {$_GET['id']}";
    $result = mysqli_query($con, $sql_select);
    $row = mysqli_fetch_assoc($result);
    if ($_SESSION['cart'][$row['id']]) {
        $_SESSION['cart'][$row['id']]['count'] = (double) $_SESSION['cart'][$row['id']]['count'] + 1;
    } else {
        $_SESSION['cart'][$row['id']] = $row;
        $_SESSION['cart'][$row['id']]['count'] = 1;
    }


} else if (isset($_GET['action']) && $_GET['action'] == "del") {
    $_SESSION['count_cart'] = (double) $_SESSION['count_cart'] - 1;
    if ($_SESSION['cart'][$_GET['id']]['count'] > 1)
        $_SESSION['cart'][$_GET['id']]['count'] = (double) $_SESSION['cart'][$_GET['id']]['count'] - 1;
    else {
        unset($_SESSION['cart'][$_GET['id']]);
        $_SESSION['count_cart'] = (double) $_SESSION['count_cart'] - $_SESSION['cart'][$_GET['id']]['count'];
    }
} else if (isset($_GET['action']) && $_GET['action'] == "remove") {
    $_SESSION['count_cart'] = (double) $_SESSION['count_cart'] - (double) $_SESSION['cart'][$_GET['id']]['count'];
    unset($_SESSION['cart'][$_GET['id']]);
}
?>

<!DOCTYPE php>
<php lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="./css/styles.css" />
        <title>Your Cart</title>
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
                        <a href="product.php" class="nav-link">Каталог</a>
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
                    <a href="cart.php" class="icon" style="color: var(--red)">
                        <i class="bx bx-cart"></i>
                        <span class="d-flex">
                            <?php if ($_SESSION['count_cart'])
                                echo ($_SESSION['count_cart']);
                            else
                                echo "0"; ?>
                        </span>
                    </a>
                </div>

                <div class="hamburger">
                    <i class="bx bx-menu-alt-left"></i>
                </div>
            </div>
        </div>

        <!--     Cart Items -->

        <div class="container cart">
            <?php if (isset($_GET['checkout'])) { ?>
                <div class="title">
                    <h1>Сведения о заказе</h1>
                </div>

                    <h2>
                        Общая стоимость: <?php
                        $total = 0;
                        $count = 0;
                        foreach ($_SESSION['cart'] as $product) {
                            $total = $total + (double) $product['count'] * (double) $product['price'];
                            $count = $count + (double) $product['count'];
                        }
                        $_SESSION['count_cart'] = $count;
                        echo $total;
                        ?> ₽
                    </h2>
                    <h2>Товары (<?= $_SESSION['count_cart'] ?> шт.): </h2>
                    <br />
                    <table style="margin-right: 30px; width: 500px">
                        <?php
                        foreach ($_SESSION['cart'] as $product) {
                            ?>
                            <tr>
                                <td>
                                    <div class="cart-info">
                                        <img src="<?php echo $product['imageref']; ?>" style="width: 100px; height: 100px" alt="" />
                                        <div>
                                            <a href="productDetails.php?id=<?php echo $product['id'] ?>"><p style="color: white; font-size: 20px"><?php echo $product['name']; ?></p></a><br />
                                            <div>SIZE: 43</div><br />
                                            <div>Количество: <?php echo $product['count'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td><?= (double) $product['count'] * (double) $product['price'] ?> ₽</td>
                            </tr>
                            <?php
                        }
                        ?>

                    </table>

                    <h2>
                        Доставка: <select id="post" style="font-family: 'Roboto', sans-serif;font-size: 17px;; text-indent: 2rem; width: 35%; border-radius: 1rem; outline: none; border: none; border-bottom: 1px solid var(--white); border-radius: 0; background-color: var(--black); color: var(--white) ">
                            <option value="pvz"> В ПВЗ
                            </option>
                            <option value="courier"> Курьером
                            </option>
                        </select>
                    </h2>

                    <br />
                    <div id="pvz-content" class="postcontent">
                        <form method="post" action="vendor/add_zakaz.php?key=pvz"  enctype="multipart/form-data">
                            <input name="total" value="<?=$total?>" style="display: none;" />
                            <h2>Выберите ПВЗ: </h2>
                        <select name="adress_pvz" style="font-family: 'Roboto', sans-serif;font-size: 17px;; text-indent: 2rem; width: 35%; border-radius: 1rem; outline: none; border: none; border-bottom: 1px solid var(--white); border-radius: 0; background-color: var(--black); color: var(--white) ">
                            <?php
                            $newsql = "SELECT * FROM `adress` where `store` = 1";
                            $result = mysqli_query($con, $newsql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                            <option value="<?=$row['id']?>"> <?= $row['adress_name'] ?>
                            </option>
                            <?php } ?>

                        </select>
                                                <br />
                        <button name="submit" class="hero-btn" style="pointer-events: auto">Сохранить</button>
                        </form>
                        
                    </div>
                    <!-- Контент для "Курьером" -->
                    <form  method="post" action="vendor/add_zakaz.php?key=courier"  enctype="multipart/form-data">
                            <input name="total" value="<?= $total ?>" style="display: none;" />
                         <div id="courier-content" class="postcontent">
                        <h2>Введите ваш адрес: <input required type="text" name="adress_cur" minlength="1" style="font-family: 'Roboto', sans-serif;font-size: 17px;; text-indent: 2rem; width: 35%; border-radius: 1rem; outline: none; border: none; border-bottom: 1px solid var(--white); border-radius: 0; background-color: var(--black); color: var(--white) " /></h2>
                        <button name="submit" class="hero-btn" style="pointer-events: auto">Сохранить</button>
                    </div>
                    </form>
                   

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var selectElement = document.getElementById('post');
                            var pvzContent = document.getElementById('pvz-content');
                            var courierContent = document.getElementById('courier-content');

                            // Функция для обновления отображаемого контента
                            function updateContent() {
                                var selectedValue = selectElement.value;
                                if (selectedValue === 'pvz') {
                                    pvzContent.style.display = 'block';
                                    courierContent.style.display = 'none';
                                } else if (selectedValue === 'courier') {
                                    pvzContent.style.display = 'none';
                                    courierContent.style.display = 'block';
                                }
                            }

                            // Добавляем обработчик события change
                            selectElement.addEventListener('change', updateContent);

                            // Обновляем контент при загрузке страницы
                            updateContent();
                        });
                    </script>

                    <br />


            <?php } else { ?>
                <div class="title">
                    <h1>Корзина</h1>
                </div>
                <?php
                if (count($_SESSION['cart']) > 0) {
                    ?>
                    <div style="display: inline-flex; width: 100%">
                        <table style="margin-right: 30px">
                            <?php
                            foreach ($_SESSION['cart'] as $product) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="cart-info">
                                            <img src="<?php echo $product['imageref']; ?>" alt="" />
                                            <div>
                                                <a href="productDetails.php?id=<?php echo $product['id'] ?>"><p style="color: white; font-size: 20px"><?php echo $product['name']; ?></p></a><br />
                                                <span>SIZE: 43</span><br /><br />
                                                <span>Количество:                    <a style="font-size: 25px; margin-left: 10px; margin-right: 10px" href="cart.php?action=del&id=<?= $product['id'] ?>" style="color: var(--red)">-</a><?php echo $product['count'] ?></span>

                                                <a style="font-size: 22px; margin-left: 5px" href="cart.php?action=add&id=<?php echo $product['id'] ?>">+</a>
                                                <br />
                                                <a style="font-size: 16px; margin-top: 25px" href="cart.php?action=remove&id=<?= $product['id'] ?>">Убрать</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= (double) $product['count'] * (double) $product['price'] ?> ₽</td>
                                </tr>
                                <?php
                            }
                            ?>


                        </table>

                        <div class="total-price">
                            <div class="title">
                                <h1>Сводка заказа </h1>

                                <p>
                                    К оплате: <?php
                                    $total = 0;
                                    $count = 0;
                                    foreach ($_SESSION['cart'] as $product) {
                                        $total = $total + (double) $product['count'] * (double) $product['price'];
                                        $count = $count + (double) $product['count'];
                                    }
                                    $_SESSION['count_cart'] = $count;
                                    echo $total;
                                    ?> ₽
                                </p>
                                <p><?php echo $count ?> шт.</p>
                            </div>
                            <a href="cart.php?checkout" class="checkout btn">Proceed To Checkout</a>
                        </div>
                    </div>
                <?php } else {
                    ?>
                    <div class="container cart">
                        <div class="title">
                            <h1 style="font-size: 20px; text-transform: none">Ваша корзина пуста, выберите нужные товары в нашем <a href="product.php" style="border-bottom: 1px solid var(--red)">каталоге</a></h1>
                        </div>
                    </div>
                <?php }
                ?>




            </div>

            <!--     Latest Products -->
            <section class="section featured" style="background-image: url(images/i2.jpg)">
                <div class="top container" style="margin-top: 50px">
                    <h1>Latest Products</h1>
                    <a href="#" class="view-more">View more</a>
                </div>
                <div class="product-center container">
                    <div class="product-item">
                        <div class="overlay">
                            <a href="" class="product-thumb">
                                <img src="./images/i.webp" alt="" />
                            </a>
                        </div>
                        <div class="product-info">
                            <span>MEN'S CLOTHES</span>
                            <a href="">Concepts Solid Pink Men’s Polo</a>
                            <h4>$150</h4>
                        </div>

                    </div>
                    <div class="product-item">
                        <div class="overlay">
                            <a href="" class="product-thumb">
                                <img src="./images/i.webp" alt="" />
                            </a>
                            <span class="discount">40%</span>
                        </div>
                        <div class="product-info">
                            <span>MEN'S CLOTHES</span>
                            <a href="">Concepts Solid Pink Men’s Polo</a>
                            <h4>$150</h4>
                        </div>

                    </div>
                    <div class="product-item">
                        <div class="overlay">
                            <a href="" class="product-thumb">
                                <img src="./images/i.webp" alt="" />
                            </a>
                        </div>
                        <div class="product-info">
                            <span>MEN'S CLOTHES</span>
                            <a href="">Concepts Solid Pink Men’s Polo</a>
                            <h4>$150</h4>
                        </div>

                    </div>
                    <div class="product-item">
                        <div class="overlay">
                            <a href="" class="product-thumb">
                                <img src="./images/i.webp" alt="" />
                            </a>
                        </div>
                        <div class="product-info">
                            <span>MEN'S CLOTHES</span>
                            <a href="">Concepts Solid Pink Men’s Polo</a>
                            <h4>$150</h4>
                        </div>

                    </div>
                </div>
            </section>
        <?php } ?>
        <!--     Footer -->
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

        <!--     Custom Script -->
        <script src="./js/index.js"></script>
    </body>
</php>
