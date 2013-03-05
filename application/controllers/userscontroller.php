<?php
 class UsersController extends Controller
 {
  public function viewall($number1, $number2, $number3)
  {
    $this->set('number1', $number1);
    $this->set('tekst1', 'dit is de tekst');
    $this->set('number2', $number2);
    $this->set('number3', $number3);
	$answer = $number1 + $number2 + $number3;
	$this->set('answer', $answer);
  }
 }
?>