<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
  <title>ArtHive</title>
  <!--font-->
  <style type="text/css">
    @font-face {
      font-family: myFont;
      src: url(TTChocolatesExtraBold.otf);
    }

    @font-face {
      font-family: myFontThin;
      src: url(TTCommonsProRegular.otf);
    }

    body {
      font-family: myFont;
      src: url(TTChocolatesExtraBold.otf);
    }
  </style>

  <!--CSS files here-->
  <link rel="stylesheet" href="./css/home_css/home.css" />
  <link rel="stylesheet" href="./css/about_css/about.css" />
  <link rel="stylesheet" href="css/catalog_css/catalog.css" />
  <link rel="stylesheet" href="./css/contact_css/contact.css" />
  <link rel="stylesheet" href="preloader.css" />
  <link rel="stylesheet" href="./css/login_register_css/login.css" />
  <link rel="stylesheet" href="./css/login_register_css/loginArtist.css" />

  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
  <script src="./LogInBackEnd/logIn.js" defer> </script>

  <style>
    .z{
      width: 100%;
    }
    .just-validate-error-label{
      margin-left: -230px;
    }

.just-validate-error-label {
  color: #4bb6b7 !important;
  font-family: myFontThin;
}
  </style>

</head>

<body>
  <!--Preloader Start-->
  <div id="preloader"></div>



  <header>

    <div class="nav">

      <div class="navDiv">
        <div class="homeHover">
          <a href="#home_area">Home</a>
        </div>
        <div class="aboutHover"><a href="#about_area">About</a>
        </div>
        <div class="catalogeHover"><a href="#catalog_area">Catalog</a>
        </div>
        <div class="buyHover">
          <a href="#" id="BuyPage" onclick="toggleBuy()">Buy</a>
        </div>
        <div class="sellHover">
          <a href="#" id="SellPage" onclick="toggleSell()">Sell</a>
        </div>
        <div class="contactHover">
          <a href="#contact_area">Contact</a>
        </div>
        <button type="submit" class="searchButton">
          <i class="fas fa-search"></i>
        </button>
      </div>

      <span class="search_menu">
        <input type="searchBar" name="searchBar" id="searchBar" placeholder="SearchBar" />
        <span class="icon"><ion-icon name="ellipsis-horizontal"></ion-icon></span>
        <span class="line">
          <ion-icon name="remove-outline"></ion-icon>
        </span>
        <span class="searchIcon">
          <ion-icon name="search-circle-outline"></ion-icon>
        </span>
      </span>




    </div>

  </header>
  
  <!------------------------------------------------------------------------------------------------------->

  <!--CUSTOMERS login/register gui-->

  <div class="popup" id="popup">
    <div class="form-container register-container" method="post">
      <form action="./LogInBackEnd/signUp_process.php" method="post" id="signUp">
        <h1 id="popup-h1" style="color: #292929;">Discover and Explore Art.</h1>
      <div class="z">
        <input type="text" placeholder="Name" name="name" id="name">
      </div>
      <div class="z">
        <input type="email" placeholder="Email" name="email" id="email">
      </div>
      <div class="z">
        <input type="password" placeholder="Password" name="password" id="password">
      </div>
      <button>Register</button>
    </form>
    </div>



  <div class="form-container login-container">
    <form action="./LogInBackEnd/logIn_process.php" method="post">
      <h1 id="popup-h1" style="color: #292929;">Log in to collect Art.</h1>
      <input type="email" placeholder="Email" name="email">
      <input type="password" placeholder="Password" name="password">
      <div class="content">
        <div class="checkbox">
          <!-- <input type="checkbox" name="checkbox" id="checkbox"> -->
          <!-- <label>Remember me</label> -->
        </div>
        <div class="pass-link">
          <!-- <a href="#">Forgot password?</a> -->
        </div>
      </div>
      <button>Log in</button>
    </form>
  </div>

    <div class="overlay-container">
      <!--<a id="closeA" href="#" onclick="toggle()">x</a>-->
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Already have an Account?</h1>
          <p>Log in and immerse yourself in the art world!</p>
          <button class="ghost" id="login">Login
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">Start your journey now</h1>
          <p>No account yet? Join ArtHive Community as an Art Lover.</p>
          <button class="ghost" id="register">Register
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>

  <!--ARTISTS login/register gui-->

  <div class="popup2" id="popup2">
  <div class="form-container register-container" method="post">
    <form action="./LogInBackEnd/signUp_process.php" method="post" id="signUp2">
      <h1 id="popup2-h1" style="color: #292929;">Discover and Explore Art.</h1>
      <div class="z">
        <input type="text" placeholder="Name" name="name" id="name2">
      </div>
      <div class="z">
        <input type="email" placeholder="Email" name="email" id="email2">
      </div>
      <div class="z">
        <input type="password" placeholder="Password" name="password" id="password2">
      </div>
      <button>Register</button>
    </form>
  </div>



  <div class="form-container login-container">
    <form action="./LogInBackEnd/logIn_process.php" method="post">
      <h1 id="popup-h1" style="color: #292929;">Log in to SELL Art.</h1>
      <input type="email" placeholder="Email" name="email">
      <input type="password" placeholder="Password" name="password">
      <div class="content">
        <div class="checkbox">
          <!-- <input type="checkbox" name="checkbox" id="checkbox"> -->
          <!-- <label>Remember me</label> -->
        </div>
        <div class="pass-link">
          <!-- <a href="#">Forgot password?</a> -->
        </div>
      </div>
      <button>Log in</button>
    </form>
  </div>

    <div class="overlay-container">
      <!--<a id="closeA" href="#" onclick="toggle()">x</a>-->
      <div class="overlay2">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Already have an Account?</h1>
          <p>Log in and immerse yourself in the art world!</p>
          <button class="ghost" id="login2">Login
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">Start your journey now</h1>
          <p>No account yet? Join ArtHive Community as an Art Lover.</p>
          <button class="ghost" id="register2">Register
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>


  <!------------------------------------------------------------------------------------------------------>


  <!--A div that includes the whole page except the Header-->
  <div class="wholePage" id="blur">

    <!--Start Slider-->

    <!--Ardisa's Work-->
    <!-- ....................................................................................... -->
    <div class="home-area" id="home_area">
      <div class="title">

        <h1>"DISCOVER ART. COLLECT JOY."</h1>
        <br />
        <h4>WHERE CREATIVITY MEETS ACCESSIBILITY</h4>
        <br />
      </div>
      <br>


      <!-- <div class="content">
        </div> --->
      <div class="video-container">
        <video id="myVideo" controls autoplay muted loop>
          <source src="./images/home_img/videoHome.mp4" type="video/mp4" />
          Your browser does not support the video tag.
        </video>
      </div>

      <div class="ArtSide">
        <p id="ArtHive" style="font-family: 'myFont'">ArtHive</p>
      </div>
    </div>
    <!-- ....................................................................................... -->

    <!-- David Work -->
    <!-- ....................................................................................... -->

    <div id="about_area"></div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="about-area">
      <div class="about_conteiner">
        <div class="about_text">
          <h3 id="about_title" style="font-family: 'myFont'">
            WELCOME TO ArtHive
          </h3>

          <p id="about_paragraph1" style="font-family: Calibri">
            The ultimate platform for art lovers and collectors! Here you can
            discover a vast collection of breathtaking artwork from emerging and
            established artists around the world. From captivating paintings to
            stunning sculptures, our diverse range of categories ensures that
            there is something for everyone.
          </p>

          <p id="about_paragraph1" style="font-family: Calibri">
            With ArtHive, you can conveniently browse and purchase your favorite
            pieces online, while our secure payment methods ensure a hassle-free
            transaction. Our platform also offers personalized profiles, order
            tracking, and the ability to follow your favorite artists, making
            your art buying experience truly unique.
          </p>

          <h3 id="about_footer">
            Join us in supporting the arts and bringing beauty into your life
            with ArtHive!
          </h3>
          <button id="about_getReady" style="font-family: 'myFont'">
            Get Ready
          </button>
        </div>

        <div class="about_photo">
          <div>
            <img id="about_icon" src="images/about_img/Picture1.png" alt="" />
          </div>

          <div class="about_iconBackground"></div>
        </div>
      </div>
    </div>

    <!-- ....................................................................................... -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!--Era's Work-->
    <!-- ....................................................................................... -->
    <div class="catalog-area" id="catalog_area">
      <div class="catalog-slider">
        <div class="catalog-slide-track">
          <div class="catalog-slide">
            <img src="./images/catalog_img/balcony.jpg" />
          </div>

          <div class="catalog-slide">
            <img src="./images/catalog_img/Daily Paintworks - Original Fine Art © Stuart Roper.jpg" />
          </div>

          <div class="catalog-slide">
            <img src="./images/catalog_img/sea (1).jpg" />
          </div>
          <div class="catalog-slide">
            <img src="./images/catalog_img/p2.jpg" />
          </div>
          <div class="catalog-slide">
            <img src="./images/catalog_img/p6.jpg" />
          </div>
          <div class="catalog-slide">
            <img src="./images/catalog_img/pianoo.jpg" />
          </div>
          <div class="catalog-slide">
            <img src="./images/catalog_img/Love Art x.jpg" />
          </div>

          <div class="catalog-slide">
            <img
              src="./images/catalog_img/Pixelated Palette Knife Paintings Capture Energetic Cityscapes in Hazy Hues.jpg" />
          </div>
          <div class="catalog-slide">
            <img src="./images/catalog_img/Art Print of Painting Titled_ Lithia Springs  Archival - Etsy Israel.jpg" />
          </div>

          <div class="catalog-slide">
            <img src="./images/catalog_img/daisies.jpg" />
          </div>
          <div class="catalog-slide">
            <img src="./images/catalog_img/p7.jpg" />
          </div>
          <div class="catalog-slide">
            <img src="./images/catalog_img/p4.jpg" />
          </div>
          <div class="catalog-slide-2">
            <img src="./images/catalog_img/sail.png" />
          </div>
        </div>
      </div>

      <div class="catalog-slider-2">
        <div class="catalog-slide-track-2">
          <div class="catalog-slide-2">
            <img src="./images/catalog_img/From_sky.jpg" />
          </div>

          <div class="catalog-slide-2">
            <img src="./images/catalog_img/bread.jpg" />
          </div>
          <div class="catalog-slide-2">
            <img src="./images/catalog_img/cloud.jpg" />
          </div>
          <div class="catalog-slide">
            <img src="./images/catalog_img/p5.jpg" />
          </div>
          <div class="catalog-slide-2">
            <img src="./images/catalog_img/gramafon.jpg" />
          </div>
          <div class="catalog-slide-2">
            <img src="./images/catalog_img/urgetocreate (1).jpg" />
          </div>
          <div class="catalog-slide-2">
            <img src="./images/catalog_img/Road, Igor Artyomenko.png" />
          </div>

          <div class="catalog-slide-2">
            <img src="./images/catalog_img/Sunlight Sea.jpg" />
          </div>
          <div class="catalog-slide-2">
            <img src="./images/catalog_img/The Teddi Parker Gallery.jpg" />
          </div>
          <div class="catalog-slide-2">
            <img src="./images/catalog_img/sea (2).jpg" />
          </div>
          <div class="catalog-slide">
            <img src="./images/catalog_img/p1.jpg" />
          </div>

          <div class="catalog-slide-2">
            <img src="./images/catalog_img/l1 (2).jpg" />
          </div>
          <div class="catalog-slide-2">
            <img src="./images/catalog_img/l1 (1).jpg" />
          </div>
          <div class="catalog-slide-2">
            <img src="./images/catalog_img/rroba.jpg" />
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>




    <!--Wave Shape-->

    <div class="custom-shape-divider-bottom-1684688853">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path
          d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
          class="shape-fill"></path>
      </svg>
    </div>



    <!--Additional Part - Circles 
  <div class="beforeFooter">


    <hr class="blueline">
    <div class="allCircles">
      <div class="circleDot1"><img class="logoImg"
          src="./images/home_img/handbag-removebg-preview-fotor-bg-remover-20230518235424__1_-removebg-preview__1_-removebg-preview (1).png"
          alt="">
      </div>
      <div class="circleDot2"><img class="logoImg"
          src="./images/home_img/dollar-sign-icon-transparent-background-6__1_-removebg-preview.png" alt=""></div>
      <div class="circleDot3">
        <img class="logoImg" src="./images/home_img/phone.png" alt="">
      </div>
    </div>

  </div>

  <div class="UnderCircles">
    <div class="p1">
      <p>The ultimate platform for art lovers and collectors! Here you can discover a vast collection of breathtaking
        artwork from emerging and established artists around the world. </p>
    </div>
    <div class="p2">
      <p>The ultimate platform for art lovers and collectors! Here you can discover a vast collection of breathtaking
        artwork from emerging and established artists around the world. </p>
    </div>
    <div class="p3">
      <p>The ultimate platform for art lovers and collectors! Here you can discover a vast collection of breathtaking
        artwork from emerging and established artists around the world. </p>
    </div>

  </div>

  -->



    <!-- ....................................................................................... -->
    <!--Klea's part-->
    <footer>
      <div class="contact-area"></div>
      <div class="footer">
        <div class="container">
          <div class="row"></div>
          <div class="footer-col-1" id="contact_area">
            <h3>Get Our App</h3>
            <p style="font-family: myFontThin">
              Download App for Android and IOS mobile phone.
            </p>
            <br />
            <div class="app_logo">
              <img src="./images/contact_img/play-store.png" alt="" width="0px" />
              <img src="./images/contact_img/app-store.png" alt="" width="0px" />
            </div>
          </div>

          <div class="footer-col-2">
            <h3>MENU</h3>
            <ul style="font-family: myFontThin">
              <li>Shop</li>
              <li>About</li>
              <li>Journal</li>
              <li>Contact Us</li>
            </ul>
          </div>
          <div class="footer-col-3">
            <h3>HELP</h3>
            <ul style="font-family: Calibri">
              <li>Shipping Information</li>
              <li>Return &amp; Exchange</li>
              <li>Terms &amp; Conditions</li>
              <li>Privacy Policy</li>
            </ul>
          </div>
          <div class="footer-col-4">
            <h3>Follow Us</h3>
            <ul style="font-family: Calibri">
              <li>Facebook</li>
              <li>Twitter</li>
              <li>Instagram</li>
            </ul>
            <img src="./images/contact_img/social.png" alt="" width="00px" />
          </div>
        </div>
        <hr />
        <p class="CopyRight">
          Copyright ©2023 - All rights reserverd | Created with ❤ by ArtHive
        </p>
      </div>
    </footer>

    <!---Ending the div that includes the whole page-->
  </div>

  <!--Scroll Up-->
  <div id="back-top"></div>

  <!--Preloader script-->
  <script src="./js/homeJs.js"></script>
  <script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function () {
      loader.style.display = "none";
    });
  </script>



  <!--JS files here-->
  <script src="./js/catalog.js"></script>
  <script src="./js/blurred.js"></script>
  <script src="./js/loginUI.js"></script>
  <script src="./js/loginUIartist.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


  <script>
    var navbarItems = document.getElementsByClassName("navDiv")[0].getElementsByTagName("a");

    for (var i = 0; i < navbarItems.length; i++) {
      navbarItems[i].addEventListener("mouseover", function () {
        this.classList.add("navbarHovered");
      });

      navbarItems[i].addEventListener("mouseout", function () {
        this.classList.remove("navbarHovered");
      });
    }

  </script>

</body>

</html>