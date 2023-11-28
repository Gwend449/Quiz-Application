<?php

namespace app\core;

class Quiz
{
   private $questions;

   public function __construct(array $questions)
   {
      $this->questions = $questions;
   }

   function displayQuestion($questionData, $questionNumber)
   {
      echo "<p>$questionNumber. {$questionData['question']}</p>";
      foreach ($questionData['options'] as $optionKey => $optionValue) {
         echo "<label class='px-4'><input type='checkbox' name='{$questionNumber}[]' value='$optionKey'> $optionValue</label><br>";
      }
      echo "<br>";
   }

   function handleForm($questions)
   {
      $score = 0;
      $userAnswers = $_POST["user_answers"] ?? array();

      foreach ($questions as $questionsNumber => $questionData) {
         $correctAnswers = $questionData['correct_answer'];

         if (
            count($userAnswers[$questionsNumber]) === count($correctAnswers) &&
            empty(array_diff($userAnswers[$questionData[$questionsNumber]], $correctAnswers))
         ) {
            $score++;
         }
      }

      echo "Your score: $score out of " . count($questions);

      foreach ($questions as $questionNumber => $questionData) {
         echo "<p>Question $questionNumber: ";
         if (
            count($userAnswers[$questionNumber]) === count($questionData['correct_answer']) &&
            empty(array_diff($userAnswers[$questionData[$questionsNumber]], $questionData['correct_answer']))
         ) {
            echo "Correct";
         } else {
            echo "Incorrect";
         }
         echo "</p";
      }
   }

}