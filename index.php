<?php
error_reporting(0);
session_start();
require_once ("vendor/connect.php");
$sql_select = "SELECT * FROM `product` LIMIT 8";
?>

<!DOCTYPE php>
<php lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- Glide js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Neuroboots</title>
  </head>
  <body>
    <div class="navigation">
        <div class="nav-center container d-flex">
        <a href="index.php" class="logo">
          <div style="display: flex; align-items: space-around">
            <img src="images/logo.png" width="45" style="margin-right: 3px">
            <h1 style="font-size: 25px">neuroboots</h1>
          </div>

        </a>

          <ul class="nav-list d-flex">
            <li class="nav-item">
              <a href="index.php" class="nav-link-active">Главное</a>
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
            <a href="vendor/check_login.php" class="icon">
              <i class="bx bx-user"></i>
            </a>
            <div class="icon" >
              <i class="bx bx-search" ></i>
            </div>
            <div class="icon">
              <i class="bx bx-heart"></i>
              <span class="d-flex"><?php if ($_SESSION['count_cart'])
                  echo ($_SESSION['count_cart']);
              else
                  echo "0";?></span>
            </div>
            <a href="cart.php" class="icon">
              <i class="bx bx-cart"></i>
              <span class="d-flex">0</span>
            </a>
          </li>
          </ul>

          <div class="icons d-flex">
            <a href="vendor/check.php" class="icon">
              <i class="bx bx-user"></i>
            </a>
            <div class="icon" id="search-icon">
              <i class="bx bx-search"></i>
            </div>
            <div class="icon">
              <i class="bx bx-heart" ></i>
              <span class="d-flex">0</span>
            </div>
            <a href="cart.php" class="icon">
              <i class="bx bx-cart"></i>
              <span class="d-flex"><?php if ($_SESSION['count_cart'])
                  echo ($_SESSION['count_cart']);
              else
                  echo "0"; ?></span>
            </a>
          </div>

          <div class="hamburger">
            <i class="bx bx-menu-alt-left"></i>
          </div>
        </div>
      </div>
    <!-- Header -->
    <header class="header" id="header" >

    <div class="hero">
      <div class="glide" id="glide_1" >
        <div class="glide__track" data-glide-el="track" >
          <ul class="glide__slides">
            <li class="glide__slide">
              <div class="center" style="background-repeat: no-repeat; background-size: cover; background-image: url(images/bg3.jpg)">
                <div class="left">
                  <span class="">Главное</span>
                  <h1 class="">НОВАЯ КОЛЛЕКЦИЯ!</h1>
                  <p>Окунитесь в ночной город в кроссовках из новой коллекции!</p>
                  <a href="product.php?key=new" class="hero-btn" style="pointer-events: auto">Перейти</a>
                  <div style="position: relative; align-content: space-between; margin-top: 3%" data-glide-el="controls[nav]">
                    <button class="glide__bullet" data-glide-dir="=0"></button>
                    <button class="glide__bullet" style="pointer-events: auto" data-glide-dir="=1"></button>
                    <button class="glide__bullet" style="pointer-events: auto" data-glide-dir="=2"></button>
                  </div>
                </div>
              </div>
            </li>
            <li class="glide__slide">
              <div class="center" style="background-repeat: no-repeat; background-size: cover; background-image: url(images/bg4.jpg)">
                <div class="left">
                  <span class="">Главное</span>
                  <h1 class="">НОВАЯ КОЛЛЕКЦИЯ!</h1>
                  <p>Окунитесь в ночной город в кроссовках из новой коллекции!</p>
                  <a href="product.php?key=new" class="hero-btn" style="pointer-events: auto">Перейти</a>
                   <div style="position: relative; align-content: space-between; margin-top: 3%" data-glide-el="controls[nav]">
                    <button class="glide__bullet" style="pointer-events: auto" data-glide-dir="=0"></button>
                    <button class="glide__bullet" data-glide-dir="=1"></button>
                    <button class="glide__bullet" style="pointer-events: auto" data-glide-dir="=2"></button>
                  </div>
                </div>
              </div>
            </li>
                        <li class="glide__slide">
              <div class="center" style="background-repeat: no-repeat; background-size: cover; background-image: url(images/bg5.jpg)">
                <div class="left">
                  <span class="">Главное</span>
                  <h1 class="">НОВАЯ КОЛЛЕКЦИЯ!</h1>
                  <p>Окунитесь в ночной город в кроссовках из новой коллекции!</p>
                  <a href="product.php?key=new" class="hero-btn" style="pointer-events: auto">Перейти</a>
                   <div style="position: relative; align-content: space-between; margin-top: 3%" data-glide-el="controls[nav]">
                    <button class="glide__bullet" style="pointer-events: auto" data-glide-dir="=0"></button>
                    <button class="glide__bullet" style="pointer-events: auto" data-glide-dir="=1"></button>
                    <button class="glide__bullet" data-glide-dir="=2"></button>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </header>

    <!-- Categories Section -->
    <section class="section category" >
      <div class="title">
        <h1>Категории</h1>
        <p>Наша продукция - для всех</p>
      </div>
      <div class="cat-center" >
        <div class="cat">
          <a href="product.php?key=men">          <img src="./images/man.jpg" alt="" />
          <div>
            <p>Мужчинам</p>
          </div></a>

        </div>
        <div class="cat">
          <a href="product.php?key=women">          <img src="./images/woman.jpg" alt="" />
          <div>
            <p>Женщинам</p>
          </div></a></div>

        <div class="cat">
          <a href="product.php?key=pop">          <img src="./images/man.jpg" alt="" />
          <div>
            <p>Акции</p>
          </div></a>

      </div>
    </section>

    <!-- New Arrivals -->
    <section class="section new-arrival" style="background-image: url(images/i2.jpg); background-size: cover">
      <div class="title" style="margin-top: 50px">
        <h1>Популярное</h1>
        <p>Самые покупаемые товары за последний месяц</p>
      </div>

      <div class="product-center">
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
      </div>
    </section>


    <!-- Promo -->

    <section class="section banner" style="background-image: url(images/i.jpg)">
<div class="left">
  <span class="trend">Скорее!</span>
  <h1 style="color: var(--white)" >Новая коллекция 2024</h1>
  <p>Скидки до 50% <span class="color">на новые поступления!</span></p>
  <a href="product.php?key=new" class="btn btn-1">Перейти</a>
</div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="row">
        <div class="col d-flex">
          <h4>ИНФОРМАЦИЯ</h4>
          <a href="">О нас</a>
          <a href="">Связаться с нами</a>
          <a href="">Пользовательское соглашение</a>
        </div>
        <div class="col d-flex">
          <h4>ПОЛЕЗНЫЕ ССЫЛКИ</h4>
          <a href="">Каталог</a>
          <a href="">Карта</a>
          <a href="">Акции</a>
        </div>
        <div class="col d-flex">
          <span><i class='bx bxl-facebook-square'></i></span>
          <span><i class='bx bxl-instagram-alt' ></i></span>
          <span><i class='bx bxl-github' ></i></span>
          <span><i class='bx bxl-twitter' ></i></span>
          <span><i class='bx bxl-pinterest' ></i></span>
        </div>
      </div>
    </footer>


  <!-- PopUp -->
  <div class="popup hide-popup">
    <div class="popup-content">
      <div class="popup-close">
        <i class='bx bx-x'></i>
      </div>
      <div class="popup-left">
        <div class="popup-img-container">
          <img class="popup-img" src="./images/popup.jpg" alt="popup">
        </div>
      </div>
      <div class="popup-right">
        <div class="right-content">
          <h1>Get Discount <span>50%</span> Off</h1>
          <p>Sign up to our newsletter and save 30% for you next purchase. No spam, we promise!
          </p>
          <form action="#">
            <input type="email" placeholder="Enter your email..." class="popup-form">
            <a href="#">Subscribe</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/search.js"></script>
</php>
