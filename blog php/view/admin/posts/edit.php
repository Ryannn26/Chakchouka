<?php include("../../../controller/posts.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Posts</title>
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/534045aa55.js" crossorigin="anonymous"></script>
    <!--custom stylinf css file-->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <!--CKeditor-->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,421;1,421&display=swap" rel="stylesheet">
</head>
    <header>
        <div class="logo">
            <a href="../../index.php">
                <h1 class="logo-text" >
                <span>Chak</span>chouka
                </h1>
            </a>
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
                <?php if (count($errors) > 0): ?>
                    <div class="error">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form action="edit.php" method="post" enctype="multipart/form-data" >
                    <label>Title</label>
                    <input type="text" name="title" class="text-input" value="<?php echo $title; ?>">
                    <div>
                        <label>Body</label>
                        <textarea name="body" id="body"><?php echo $body; ?></textarea>
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input" value="<?php echo $image; ?>">
                    </div>
                    <br>
                    <div>
                        <label>Topic</label>
                            <select name="topic_id" class="text-input">
                                <option value="">-- Select Topic --</option>
                                <?php foreach ($topics as $topic): ?>
                                    <option value="<?php echo $topic['id'];?>" 
                                    <?php echo isset($topic_id) && $topic_id == $topic['id'] ? 'selected' : ''; ?>>
                                    <?php echo $topic['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                    <br>
                <div>
                    <button type="submit" name="edit-post" class="btn btn-big">Update-Post</button>
                </di>
                <br>
                
               </form>
            </div>
        </div>

    </div>
    <!--//admin content-->
</div>
<!--Page wrapper-->
</body>
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
</html> 