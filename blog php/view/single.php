<?php include("../controller/posts.php"); ?>
<?php include("../controller/topic.php"); 
$published="";
//single post 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
}
    $stmt = $conn->prepare("SELECT * FROM posts WHERE published = :published");
    $stmt->bindParam(':published', $published, PDO::PARAM_INT);
    $stmt->execute();
    $p = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
    <!--content section-->
    <div class="content clearfix">

        <!--main content-->
        <div class="main-content single">
            <h1 class="post-title"><?php echo $post['title']?></h1>
            <div class="popst-content">
                <p>
                    <?php echo $post['body']?> 
                </p>
            </div>
        </div>
        <!--//Main content-->
        <!--sidebar-->
        <div class="sidebar single">
                    <div class="section popular">
                        <h2 class="section-title">Popular</h2>
                        <?php foreach ($posts as $key => $p):?>
                            <?php if ($p['published']) { ?>
                                <div class="post clearfix">
                                    <img src="assets/imgs/images.jpg" alt="">
                                    <a href="single.php?id=<?php echo $p['id']; ?>"><h4><?php echo $p['title'] ?></h4></a>
                                </div>
                            <?php } ?>
                        <?php endforeach ?>
                    </div>
            <div class="section topics">
                <h2 class="section-title">Topics</h2>
                <ul>
                    <?php foreach ($topics as $key => $topic) : ?>
                        <li><a href="#"><?php echo $topic['name']?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <!--//sidebar-->   
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
            <form action="index.html" method="post">
                <input type="text" name="email" class="text-input contact-input" placeholder="Your Email Adresse...">
                <textarea rows="4" name="message"  class="text-input contact-input" placeholder="Your message..."></textarea>
                <button type="submit" class="btn btn-big contact-btn">
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