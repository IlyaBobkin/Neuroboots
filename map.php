<!DOCTYPE php>
<php lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Box icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Login</title>

    <script src="https://api-maps.yandex.ru/2.0-stable/?apikey=71ce294c-8870-4375-9db2-ef47bde95e02
&load=package.standard&lang=ru-RU" type="text/javascript"></script>
        <script src="https://yandex.st/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
      <script src="./js/groups.js"></script>
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
              <a href="index.php" class="nav-link">Главное</a>
            </li>
            <li class="nav-item">
            <a href="product.php" class="nav-link">Каталог</a>
            </li>
            <li class="nav-item">
              <a href="product.php" class="nav-link">Акции</a>
            </li>
            <li class="nav-item">
              <a href="map.php" class="nav-link-active">Карта</a>
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

          <div style="background-image: url(images/i2.jpg); background-size: cover">    <div class="container" style="padding-top: 20px; padding-bottom: 20px; display: flex">

            <div class="left" style="padding-bottom: 20px">
                  <h1 style="padding-bottom: 10px">Пункты выдачи заказов</h1>
                  <p>Города: Санкт-Петербург, Москва</p> <br/>
                          <div id="adresses"></div>
            </div>

      <div id="map" style="width: 600px; height: 400px; margin-left: 10%"></div>
    </div></div>


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

  </body>
    <script src="./js/map.js"></script>
</php>
