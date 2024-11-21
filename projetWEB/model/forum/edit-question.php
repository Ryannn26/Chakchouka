<?php
require('action/user/securityAction.php');
require('action/question/getInfosOfEditedQuestionAction.php');
require('action/question/editQuestioAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<body>
<?php include 'includes/navbar.php';?>
<br>
<div class="container">
  <?php if (isset($errorMsg)) { echo '<p>'.$errorMsg.'</p>'; } ?>

  <?php if (isset($question_content)) { ?>
    <form class="container" method="POST" onsubmit="return validateForm()">
      <div class="mb-3">
        <label for="title" class="form-label">Titre de question</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $question_title; ?>" oninput="validateTitle()">
        <small id="titleError" class="text-danger"></small>
        <small id="titleSuccess" class="text-success"></small>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description de la question</label>
        <textarea class="form-control" name="description" id="description" oninput="validateDescription()"><?= $question_description; ?></textarea>
        <small id="descriptionError" class="text-danger"></small>
        <small id="descriptionSuccess" class="text-success"></small>
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Contenu de la question</label>
        <textarea class="form-control" name="content" id="content" oninput="validateContent()"><?= $question_content; ?></textarea>
        <small id="contentError" class="text-danger"></small>
        <small id="contentSuccess" class="text-success"></small>
      </div>
      <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
    </form>
  <?php } ?>
</div>
<script src="../../controller/js/validation.js"></script>
</body>
</html>
