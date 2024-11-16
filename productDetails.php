<?php
require_once ("vendor/connect.php");
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {

    $sql_select = "SELECT * FROM `product` WHERE `id` = {$_GET['id']}";
    $result = mysqli_query($con, $sql_select);
    $row = mysqli_fetch_assoc($result);
    // Check if the product exists (array is not empty)
    if (!$result) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
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
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="https://pyscript.net/releases/2024.1.1/core.css" />
<script type="module" src="https://pyscript.net/releases/2024.1.1/core.js"></script>
    <title>Boy’s T-Shirt - Codevo</title>
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

    <!-- Product Details -->
    <section class="section product-detail" style="padding-top: 20px">
      <div class="details container">
        <div class="left image-container">
          <div class="main">
            <img src="<?php echo $row['imageref']?>" id="zoom" alt="" />
          </div>
        </div>
        <div class="right">
          <span><a href="product.php">Каталог</a>/<a href="product.php?key=<?php if ($row['cat'] == "Женщинам")
              echo "women";
          else
              echo "men";  ?>"><?php echo $row['cat'] ?></a>/<?php echo $row['name'] ?></span>
          <h1><?php echo $row['name']?></h1>
          <div class="price"><?php echo $row['price'] ?> ₽</div>
          <form>
            <div>
              <select>
                <option value="Размер">
                  Размер
                </option>
                <option value="1">32</option>
                <option value="2">42</option>
                <option value="3">52</option>
                <option value="4">62</option>
              </select>
              <span><i class="bx bx-chevron-down"></i></span>
            </div>
          </form>
          <form class="form">
            <input type="text" placeholder="1" />
            <a href="cart.php?action=add&id=<?=$row['id']?>" class="addCart">Add To Cart</a>
          </form>
          <h3>Описание</h3>
          <p>
            <?php echo $row['description'] ?>
          </p>
        </div>
      </div>
    </section>

    <!-- Related -->
    <section class="section featured" style="background-image: url(images/i2.jpg); background-size: cover">
      <div class="top container"  style="margin-top: 50px">
        <h1>Related Products</h1>
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
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
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
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
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
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
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
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
      </div>
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
    <script
      src="https://code.jquery.com/jquery-3.4.0.min.js"
      integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6"
      crossorigin="anonymous"
    ></script>
    <script src="./js/zoomsl.min.js"></script>
    <script>
      $(function () {
        console.log("hello");
        $("#zoom").imagezoomsl({
          zoomrange: [4, 4],
        });
      });
    </script>
  </body>
</php>
