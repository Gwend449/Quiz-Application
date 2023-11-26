<?php 

require_once __DIR__ . 'Quiz.php';
require_once __DIR__ . 'components/questions.php';

$testId = $_GET["test_id"] ?? null;

switch ($testId) {
   case 'test1':
      $questions = $questionsTest1;
      break;
   
   
   default:
      echo "Invalid Test ID";
      exit;
}

$quiz = new Quiz($questions);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
   $userAnswers = $_POST["user_answers"] ?? array();
   $quiz->handleForm($userAnswers);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   <title>Chapter <?php $questionNumber ?>test</title>
</head>

<body>

   <div class="container p-3">
      <div class="row m-3">
         <h3>Часть I</h3>
         <div class="row m-3">
            <form class="row m-2 p-1" action="" method="post">
               <?php 
                  foreach ($questions as $questionNumber => $questionData) {
                     $quiz->displayQuestion($questionData, $questionNumber + 1);
                  }
               ?>
               <div class="col">
                  <button type="submit" class="btn btn-primary">Завершить</button>
               </div>
            </form>
         </div>
      </div>
   </div>

</body>

</html>