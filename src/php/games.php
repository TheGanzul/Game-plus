<?php
include("games_bd.php");
?>
<!DOCTYPE html>
<html lang="en, en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Plus</title>
    <link 
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link 
        rel="stylesheet" 
        href="../css/games.css"
    />
</head>
<body>
    <div id="main-container">
        <header>
            <nav>
                <div class="mobile">
                    <div class="header">
                        <button id="bmenu">
                            <span class="material-symbols-outlined"> &#xe5d2 </span>
                        </button>

                        <a href="../../index.html"><img src="../img/index/LOGO1.png" width ="100"></a>

                        <div>
                            <a href="#"><span class="material-symbols-outlined"> &#xe8b6</span> </a> <!--lupa-->
                            <a href="src/php/register.php"><span class="material-symbols-outlined"> &#xe7fd</span> </a><!--login-->
                        </div>
                    </div>

                    <div class="links">
                        <a href="#">Games</a>
                        <a href="#">New & sales</a>
                        <a href="#"> Help</a>
                        <a href="#"> About us</a>
                        <a href="#"> Sreach</a>
                    </div>
                </div>

                <ul>
                    <li><a href="../../index.html"><img src="../img/index/LOGO1.png" width ="100"  -10px></a></li>
                    <li><a href="#"class="link">Games</a></li>
                    <li><a href="#"class="link">New & sales</a></li>
                    <li><a href="#"class="link link-hide"> Help</a></li>
                    <li><a href="#"class="link link-hide"> About us</a></li>
                    <li class="more">
                        <a href="#" class="link" id="bmore">More</a>
                        <div class="menu">
                            <a href="#"> Help</a>
                            <a href="#"> About us</a>
                        </div>
                </ul>

                <ul>
                    <li><a href="src/php/register.php" class="links">Login</a></li>
                    <li><a href="#" class="links">Sreach</a></li>
                </ul>
            </nav>
        </header>
        <section id="banner" style="background-image: url(../img/Games/Posters/<?php echo $banner; ?>);">
        
            <div class="Title">
                <img src="../img/Games/Posters/<?php echo $cover; ?>" alt="img">
                <div class="Name">
                    <h1><?php echo $name; ?></h1>
                    <p><?php echo $category; ?></p>
                </div>
            </div>
            <button > Download</button>
        </section>
        <div class="classification">
            <img src="../img/Games/Clasification/<?php echo $img_clasification; ?>" alt="">
            <p><?php echo $text_clasification; ?></p>
        </div>
        <section id="Info">
            <div class="description_container">
                <h2>Description</h2>
                <div class="description">
                <p><?php echo $description; ?></p>
                </div>
                <button class="read-more" id="read-more-button">Read more</button>
                <div class="version">
                    <p>Version
                    <br><?php echo $version; ?>
                    </p>
                    <p>Developer
                        <br><?php echo $developer; ?>
                    </p>
                    <p>Release date
                        <br><?php echo $release_date; ?>
                    </p>
                </div>
            </div>
            <div class="Galery">
                <div class="slider-container">
                    <div class="slider" id="slider">
                        <?php foreach ($gallery_images as $image) { ?>
                        <div class="slider_section"><img src="../img/Games/Gallery/<?php echo $image; ?>"></div>
                        <?php } ?>
                    </div>
                    <button class="slider_button left"  id="Previous">
                        <span class="material-symbols-outlined">&#xe408;</span>
                    </button>
                    <button class="slider_button right" id="Next">
                        <span class="material-symbols-outlined">&#xe409;</span>
                    </button>
                </div>
            </div>
        </section>

        <footer>
            <img src="../img/LOGO1.png" height=100px alt="">

        </footer>

    </div>
    <script src="../js/games.js"></script>
</body>
</html>
