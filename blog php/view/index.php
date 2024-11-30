<?php include("../controller/posts.php"); ?>
<?php include("../controller/topic.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/534045aa55.js" crossorigin="anonymous"></script>
    <!--custom stylinf css file-->
    <link rel="stylesheet" href="../view/assets/css/style.css">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,421;1,421&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <h1 class="logo-text" >
                <span>Chak</span>chouka
                </h1>
            </a>
        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <!--<li><a href="#"Sign Up</a></li> -->
            <!--<li<a href="#">Login<a/><li/>-->
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    Mohamed Ben Saker
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                    
                <ul>
                    <li><a href="admin/posts/index.php">Dashboard</a></li>
                    <li><a href="#" class="logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!--page wrapper-->
<div class="page wrapper">
    <!--Post slider-->
    <div class="post-slider">
        <h1 class="slider-title">Trending Posts</h1>
        <i class="fas fa-chevron-left prev"></i>       
        <i class="fas fa-chevron-right next"></i>
        <div class="post-wrapper">
            <?php foreach ($posts as $key => $post):?>
                <?php if ($post['published']) {?>
                    <div class="post">
                        <img class="slider-image" src="assets/imgs/images.jpg" alt="Food Blog">
                        <div class="post-info">
                            <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a></h4>
                            <i class="far fa-user"> Food Blog 
                            </i>
                            &nbsp;
                            <i class="far fa-calendar"> <?php echo date('F j ,Y', strtotime($post['created_at']));
                            ?></i>
                        </div>
                    </div>
                <?php }?>
            <?php endforeach ?>
        </div>
    </div>
    <!--//POST SLIDER -->
    <!--content section-->
    <div class="content clearfix">
        <!--main content-->
        <div class="main-content">
            <h1 class="recent-post-title">Recent Posts</h1>
            <?php foreach ($posts as $key => $post):?>
                <?php if ($post['published']) {?>
                    <div class="post">
                        <img src="assets/imgs/images.jpg" alt="" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title'] ?></a></h2>
                            <i class="far fa-user"> Mohamed Ben Saker</i>
                            &nbsp;
                            <i class="far fa-calendar"> <?php echo date('F j ,Y', strtotime($post['created_at']));?></i>
                            <p class="preview-text"><?php echo  substr($post['body'],0,150) . '...'?>
                            </p>
                         <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
                        </div>
                    </div>
                <?php }?>
            <?php endforeach ?>
        </div>
        <!--Main content-->
        <div class="sidebar">
            <div class="section search">
                <h2 class="section-title">Search</h2>
                <form action="index.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Search...">
                </form>
            </div>
            <div class="section topics">
                <h2 class="section-title">Topics</h2>
                <ul>
                    <?php foreach ($topics as $key => $topic):?>
                        <li><a href="#"><?php echo $topic['name']?></a></li>
                        <?php endforeach ?>
                </ul>
            </div>
        </div>   
    </div>
</div>
<!--Page wrapper-->
<!--footer-->
<div class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h1 class="logo-text"><span>Chak</span>chouka</h1>
                <p>
                    Welcome to Chakchouka, your go-to destination for all things delicious
                     and inspiring in the world of food! We're passionate about discovering flavors
                </p>
                <div class="contact">
                    <span>
                        <i class="fas fa-phone"></i>
                        &nbsp;123-456-789
                    </span>
                    <span>
                        <i class="fas fa-envelope"></i> &nbsp; info@chakchouka.com
                    </span>
                </div>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
        </div>
        <div class="footer-section links">
            <h2>Quick Links</h2><br>
            <ul>
            
                <a href="#"><li>Events</li></a>
                <a href="#"><li>Teams</li></a>
                <a href="#"><li>Mentores</li></a>
                <a href="#"><li>Gallery</li></a>
                <a href="#"><li>Terms and Conditions</li></a>
            </ul>
        </div>
        <div class="footer-section contact-form">
            <h2>Contact Us</h2><br>
            <form action="index.html" method="post" id="form" >
                <input type="text" name="email" id="email" class="text-input contact-input" placeholder="Your Email Adresse...">
                <textarea rows="4" name="message" id="message" class="text-input contact-input" placeholder="Your message..."></textarea>
                <button type="submit" class="btn btn-big contact-btn " >
                    <br>
                    <span id="error"></span>
                    <i class="fas fa-envelope">
                        Send
                    </i>
                </button>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; chakchouka.com ! Designed by Mohamed Ben Saker
    </div>
</div>
<!--footer-->
<!--JQUERRY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--Slick Carousel-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>	
<!--Custom Script-->
    <script src="assets/js/script.js"></script>
</body>
</html> 