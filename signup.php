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
    <title>Sign Up</title>
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
            <a href="login.php" class="icon" style=" color: var(--red);">
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

    <div style="background-image: url(images/i2.jpg); background-size: cover">     
      <div class="container">
          <div class="login-form">
            <form method="POST" action="vendor/signup.php" style="margin-top: 50px">
              <h1>Sign Up</h1>
              <p>
                Please fill in this form to create an account. or
                <a href="login.php">Login</a>
              </p>

              <label for="name">Name</label>
              <input type="text" placeholder="Enter Name" name="name" required />

              <label for="phone">Phone</label>
              <input type="tel" placeholder="+7(___)___-__-__" name="phone" id="phone" minlength="16" maxlength="16" required />

              <label for="email">Email</label>
              <input type="email" placeholder="Enter Email" name="email" required />

              <label for="psw">Password</label>
              <input
                type="password"
                placeholder="Enter Password"
                name="psw"
                minlength = "8"
                required
              />

              <p>
                By creating an account you agree to our
                <a href="#">Terms & Privacy</a>.
              </p>

              <div class="buttons">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" name="submit" class="signupbtn">Sign Up</button>
              </div>
            </form>
          </div>
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

    <!-- Custom Script -->
    <script src="./js/index.js"></script>
    <script src="./js/phone.js"></script>
  </body>
</php>
