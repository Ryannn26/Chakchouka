<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<body>
    <?php include 'includes/navbar.php';?>
    <br>
    <form class="container" method="POST" onsubmit="return validateForm()">
      <?php
         if(isset($errorMsg)){
           echo '<p>'.$errorMsg.'</p>';
        } elseif(isset($successMsg)){
           echo '<p>'.$successMsg.'</p>';
        }
      ?>
      <div class="mb-3">
        <label for="title" class="form-label">Titre de question</label>
        <input type="text" class="form-control" name="title" id="title" oninput="validateTitle()">
        <small id="titleError" class="text-danger"></small>
        <small id="titleSuccess" class="text-success"></small> <!-- Message de succès -->
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description de la question</label>
        <textarea class="form-control" name="description" id="description" oninput="validateDescription()"></textarea>
        <small id="descriptionError" class="text-danger"></small>
        <small id="descriptionSuccess" class="text-success"></small> <!-- Message de succès -->
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Contenu de la question</label>
        <textarea class="form-control" name="content" id="content" oninput="validateContent()"></textarea>
        <small id="contentError" class="text-danger"></small>
        <small id="contentSuccess" class="text-success"></small> <!-- Message de succès -->
      </div>
      <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>
    </form>
    <script src="../../controller/js/validation.js"></script>
</body>
</html>
