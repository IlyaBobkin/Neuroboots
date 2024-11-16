<?php
error_reporting(0);
require 'vendor/connect.php';
if ($_SESSION['client']['admin'] == false)
    header("Location: index.php");

if (isset($_GET['key'])) {
    if ($_GET['key'] == "products") {
        $sql_select = "SELECT * FROM `product`";
    }
    if ($_GET['key'] == "orders") {
        $sql_select = "            SELECT
                zakaz.*,
                client.name, client.phone, client.`e-mail`,
                adress.adress_name
            FROM
                zakaz
            JOIN
                client ON zakaz.client_id = client.id
            JOIN
                adress ON zakaz.adress_id = adress.id ORDER BY zakaz.id";
    }
    if ($_GET['key'] == "postav") {
        $sql_select = "
    SELECT
        postavka.*,
        product.name AS product_name,
        product.description AS product_description,
        sklad.sklad_adress,
        postavshik.name AS postavshik_name,
        postavshik.phone AS postavshik_phone,
        postavshik.email AS postavshik_email
    FROM
        postavka
    JOIN
        product ON postavka.product_id = product.id
    JOIN
        sklad ON postavka.sklad_id = sklad.id
    JOIN
        postavshik ON postavka.dogovor_id = postavshik.id
";
    }

} else if (isset($_GET['action']) and isset($_GET['id'])) {
    if ($_GET['action'] == "products") {
        $sql_select = "SELECT * FROM `product`";
    }
    if ($_GET['key'] == "orders") {
        $sql_select = "
            SELECT
                zakaz.*,
                client.*,
                adress.*
            FROM
                zakaz
            JOIN
                client ON zakaz.client_id = client.id
            JOIN
                adress ON zakaz.adress_id = adress.id
";
    }
    if ($_GET['key'] == "postav") {
        $sql_select = "
    SELECT
        postavka.*,
        product.name AS product_name,
        product.description AS product_description,
        sklad.sklad_adress,
        postavshik.name AS postavshik_name,
        postavshik.phone AS postavshik_phone,
        postavshik.email AS postavshik_email
    FROM
        postavka
    JOIN
        product ON postavka.product_id = product.id
    JOIN
        sklad ON postavka.sklad_id = sklad.id
    JOIN
        postavshik ON postavka.dogovor_id = postavshik.id
";
    }

} else if (isset($_POST['search'])) {
    if ($_POST['name']) {
        $_GET['key'] = "products";
        $sql_select = "SELECT * FROM `product` WHERE `name` LIKE '{$_POST["name"]}%'";
    } else {
        $_GET['key'] = "products";
        $sql_select = "SELECT * FROM `product`";
    }
} else {
    $_GET['key'] = "products";
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
            <div style="display: block">
                <div class="title" style="height: 10px">
                    <h1>Панель администратора</h1>
                </div>
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
                    <?php if ($_GET['key'] == "products") { ?>
                        <div class="nav-center container d-flex" style="background-color: var(--black); height: 50px; border-radius: 2rem;">
                            <ul class="nav-list d-flex">
                                <li class="nav-item" style="display: flex;">
                                    <a href="add.php" style="align-content: center; display: flex"> Добавить товар
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>

                    <div class="nav-center container d-flex" style="background-color: var(--black); height: 50px; border-radius: 2rem;">

                        <ul class="nav-list d-flex">

                            <li class="nav-item">
                                <a href="adminpanel.php?key=products" class="nav-link-cat<?php if ($_GET['key'] == "products")
                                    echo "-active"; ?>">Товары</a>
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                    <a href="adminpanel.php?key=orders" class="nav-link-cat<?php if ($_GET['key'] == "orders")
                                        echo "-active"; ?>">Заказы</a>
                                </li>
                                <li class="nav-item">
                                    <a href="adminpanel.php?key=postav" class="nav-link-cat<?php if ($_GET['key'] == "postav")
                                        echo "-active"; ?>">Поставки</a>
                                </li>
                        </ul>
                    </div>


                    <div class="nav-center container d-flex" style="background-color: var(--black); height: 50px; border-radius: 2rem; width: 24%; padding: 2%;">
                        <form method="post" action="adminpanel.php">
                            <ul class="nav-list d-flex">
                                <li class="nav-item" style="display: flex">
                                    <input name="name" placeholder="Поиск" style="font-family: 'Roboto', sans-serif;font-size: 17px;; text-indent: 2rem; width: 100%; border-radius: 1rem; outline: none; border: none; border-bottom: 1px solid var(--white); border-radius: 0; background-color: var(--black); color: var(--white) " />
                                    <div class="icon">
                                        <button name="search" type="submit" class="icon" style="background-color: var(--black); border: none"><i class="bx bx-search"></i></button>

                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <?php if ($_GET['key'] == 'products') { ?>
                <?php if ($_POST['name']) { ?>
                    <div style="margin-left: 23%; padding-bottom: 30px">По запросу "<?= $_POST['name'] ?>" найдено:</div>
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
                            <form>
                                <span class="discount" style="position: relative; margin-left: 65%; top: -386px; background-color: forestgreen "><a href="edit.php?id=<?php echo $row['id'] ?>" name="submit"><i class="bx bx-edit"></i></a></span>
                                <span class="discount" style="position: relative; margin-left: 80%; top: -405px"><a href="vendor/delete_product.php?id=<?php echo $row['id'] ?>" name="submit"><i class="bx bx-trash"></i></a></span>
                            </form>

                        </div>
                        <?php
                    }
            } else if ($_GET['key'] == 'orders') {
                ?>

                        <table style="width: 90%; padding: 30px; margin-left: 5%; background-color: var(--black)">
                            <tr>
                                <th>Order ID</th>
                                <th>Client Name</th>
                                <th>Client Phone</th>
                                <th>Client Email</th>
                                <th>Address</th>
                                <th>Order Sum</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                            </tr>
                            <?php
                            $result = mysqli_query($con, $sql_select);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["phone"] . "</td>";
                                echo "<td>" . $row["e-mail"] . "</td>";
                                echo "<td>" . $row["adress_name"] . "</td>";
                                echo "<td>" . $row["sum"] . " ₽</td>";
                                echo "<td>" . $row["date_oformlen"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>

                <?php } else { ?>
                        <table style="width: 90%; padding: 30px; margin-left: 5%; background-color: var(--black)">
                            <tr>
                                <th>Postavka ID</th>
                                <th>Product Name</th>
                                <th>Count</th>
                                <th>Sklad Address</th>
                                <th>Postavshik Name</th>
                                <th>Postavshik Phone</th>
                                <th>Postavshik Email</th>
                            </tr>

                            <?php 
                            $result = mysqli_query($con, $sql_select);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["product_name"] . "</td>";
                                echo "<td>" . $row["count"] . "</td>";
                                echo "<td>" . $row["sklad_adress"] . "</td>";
                                echo "<td>" . $row["postavshik_name"] . "</td>";
                                echo "<td>" . $row["postavshik_phone"] . "</td>";
                                echo "<td>" . $row["postavshik_email"] . "</td>";
                                echo "</tr>";
                            }
                                ?>

                        </table>

                <?php } ?>

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
    </body>
</php>
