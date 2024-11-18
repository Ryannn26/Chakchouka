<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Posts</title>
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/534045aa55.js" crossorigin="anonymous"></script>
    <!--custom stylinf css file-->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <!--CKeditor-->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">
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
            <li><a href="index.php">Manage Posts</a></li>
            <li><a href="../topics/index.php">Manage Topics</a></li>
        </ul>
    </div>
    <!--//left sidebar-->
    <!--admin content-->
    <div class="admin-content">
        <div class="button-group">
            <a href="create-posts.php" class="btn btn-big">Add Post</a>
            <a href="index.php" class="btn btn-big">Manage Posts</a>
            <div class="content">
                <h2 class="page-title">Manage Posts</h2>
               <form action="create-posts.html" method="post">
                <label>Title</label>
                <input type="text" name="title" class="text-input">
                <div>
                    <label>Body</label>
                    <textarea name="body" id="body"></textarea>
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="image" class="text-input">
                </div>
                <div>
                    <label>Topic</label>
                    <select name="Topic" class="text-input">
                        <option value="Topic 1">Topic 1</option>
                        <option value="Topic 2">Topic 2</option>
                        <option value="Topic 3">Topic 3</option>
                        <option value="Topic 4">Topic 4</option>
                        <option value="Topic 5">Topic 5</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-big">Add Post</button>
                </div>
               </form>
            </div>
        </div>

    </div>
    <!--//admin content-->
</div>
<!--Page wrapper-->
<!--CK Editor script -->
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font
    } from 'ckeditor5';
    ClassicEditor
        .create( document.querySelector( '#body' ), {
            plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
<!--JQUERRY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--CKEDITOR-->
    <script src="https://cdn.ckeditor.com/ckeditor5/43.3.1/classic/ckeditor.js"></script>
<!--Custom Script-->
    <script src="../../js/script.js"></script>
</body>
</html> 