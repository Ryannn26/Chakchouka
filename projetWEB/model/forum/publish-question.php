<?php 
require('action/user/securityAction.php'); 
require('action/question/publishQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="style_formulaire_question.css">
<?php include 'includes/head.php';?>
<body class="bg-light">
    <?php include 'includes/navbar.php';?>
    
    <div class="container mt-5 from-container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Publier une Question</h2>
                        <?php
                            if(isset($errorMsg)){
                                echo '<p class="text-danger">'.$errorMsg.'</p>';
                            } elseif(isset($successMsg)){
                                echo '<p class="text-success">'.$successMsg.'</p>';
                            }
                        ?>
                        <form method="POST" onsubmit="return validateForm()">
                            <div class="mb-4">
                                <label for="title" class="form-label">Titre de la question</label>
                                <input type="text" class="form-control" name="title" id="title" oninput="validateTitle()" placeholder="Entrez le titre ici">
                                <small id="titleError" class="text-danger"></small>
                                <small id="titleSuccess" class="text-success"></small>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" oninput="validateDescription()" placeholder="Décrivez brièvement votre question"></textarea>
                                <small id="descriptionError" class="text-danger"></small>
                                <small id="descriptionSuccess" class="text-success"></small>
                            </div>
                            <div class="mb-4">
                                <label for="content" class="form-label">Contenu détaillé</label>
                                <textarea class="form-control" name="content" id="content" oninput="validateContent()" placeholder="Détaillez votre question ici"></textarea>
                                <small id="contentError" class="text-danger"></small>
                                <small id="contentSuccess" class="text-success"></small>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="validate">Publier la question</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../controller/js/validation.js"></script>
</body>
</html>
