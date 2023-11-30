<?php
echo '<pre>';
var_dump($_POST);
echo '</pre>';
session_start();
require_once __DIR__ . '/vendor/autoload.php';
use app\core\Quiz;
use app\core\Questions;

$testId = $_GET["test_id"] ?? null;

$questions = new Questions();
$quizHandle = $questions->getQuestions($testId);
$quiz = new Quiz($quizHandle);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
   $userAnswers = $_POST["user_answers"] ?? array();
   //$quiz = new Quiz($quizHandle);
   foreach ($quizHandle as $questionNumber => $questionData) {
      $quiz->handleForm($quizHandle, $questionNumber);
   };
   $total = count($quizHandle);
   echo "Верных ответов: " . $quiz->getScore() . " из " . $total;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   <title>Chapter
      <?php $questionNumber ?>test
   </title>
</head>

<body>

   <div class="container p-3">
      <div class="row m-3">
         <h3>Часть I</h3>
         <div class="row m-3">
            <form class="row m-2 p-1" action="test_page.php" method="post">
               <?php
               foreach ($quizHandle as $questionNumber => $questionData) {
                  $quiz->displayQuestion($questionData, $questionNumber + 1);
               }
               ?>
               <div class="col">
                  <button type="submit" name="complete" class="btn btn-primary">Завершить</button>
               </div>
            </form>
         </div>
      </div>
   </div>

</body>

</html>