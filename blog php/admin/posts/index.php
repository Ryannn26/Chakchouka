<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/534045aa55.js" crossorigin="anonymous"></script>
    <!--custom stylinf css file-->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,421;1,421&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <h1 class="logo-text">
                <span>Chak</span>chouka
            </h1>
        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    Mohamed Ben Saker
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                    
                <ul>
                    
                    <li><a href="#" class="logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!--admin wrapper-->
<div class="admin-wrapper">
    <!--left sidebar-->
    <div class="left-sidebar">
        <ul>
            <li><a href="index.html">Manage Posts</a></li>
            <li><a href="../topics/index.html">Manage Topics</a></li>
        </ul>
    </div>
    <!--//left sidebar-->
    <!--admin content-->
    <div class="admin-content">
        <div class="button-group">
            <a href="create-posts.html" class="btn btn-big">Add Post</a>
            <a href="index.html" class="btn btn-big">Manage Posts</a>
            <div class="content">
                <h2 class="page-title">Manage Posts</h2>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>This is The first post</td>
                            <td><a href="#" class="edit">edit</a></td>
                            <td><a href="#" class="delete">delete</a></td>
                            <td><a href="#" class="publish">publish</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>This is The first post</td>
                            <td><a href="#" class="edit">edit</a></td>
                            <td><a href="#" class="delete">delete</a></td>
                            <td><a href="#" class="publish">publish</a></td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!--//admin content-->
    
    
</div>
<!--Page wrapper-->

<!--JQUERRY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--Custom Script-->
    <script src="../../js/script.js"></script>
</body>
</html> 