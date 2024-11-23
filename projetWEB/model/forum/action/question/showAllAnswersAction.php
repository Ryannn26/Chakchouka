<?php
require('action/database.php');

$getAllAnswersOfTheQuestion=$bdd->prepare('SELECT *  FROM answers WHERE id_question = ? ORDER BY id DESC');

$getAllAnswersOfTheQuestion->execute(array($idOfTheQuestion));