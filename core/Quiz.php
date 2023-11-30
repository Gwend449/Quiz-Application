<?php

namespace app\core;

class Quiz
{
   private $questions;
   protected $score = 0;

   public function __construct($questions = [] ?? null)
   {
      $this->questions = $questions;
   }

   public function displayQuestion($questionData, $questionNumber)
   {
      echo "<p>$questionNumber. {$questionData['question']}</p>";
      foreach ($questionData['options'] as $optionKey => $optionValue) {
         echo "<label class='px-4'><input type='checkbox' name='{$questionNumber}[]' value='$optionKey'> $optionValue</label><br>";
      }
      echo "<br>";
   }

   public function handleForm($questions, $questionNumber)
   {
      $score = 0;
      $questionData = $questions[$questionNumber] ?? [];
      $correctAnswers = $questionData['correct_answer'] ?? [];

      $userAnswer = $_POST["user_answers"][$questionNumber] ?? [];
      if (is_array($userAnswer) && count(array_diff($userAnswer, $correctAnswers)) === 0) {
         $score++;
      }
      $_SESSION["quiz_score"] = $score;
   }

   public function getScore()
   {
      return $this->score;
   }

}