<?php

class BatchValue
{
  public $servings;
  public $sweetness;
  public $bourbon;
  public $simple;
  public $angostura;
  public $water;
  public $oranges;
  public $total;

  public function __construct(int $servings = 0, string $sweetness = '')
  {
    $this->servings = $servings;
    $this->sweetness = $sweetness;
  }

  // bourbon
  public function calculateBourbon()
  {
    $this->bourbon = $this->servings * 2.0; // 2oz per serving
  }

  // simple syrup
  public function calculateSimple()
  {
    $sweetnessLevels = [
      'Just enough' => 0.25,
      'Classic specs' => 0.5,
      'Sweeter' => 0.75,
      'Wisconsin sweet' => 1.0,
    ];

    $this->simple = $this->servings * $sweetnessLevels[$this->sweetness];
  }

  // bitters !REWORK LATER TO CALC OZ FOR LARGE BATCHES!
  public function calculateBitters() {
    if ($this->servings <= 4) {
      $this->angostura = $this->servings * 2.0; // 2 dashes per serving
    } else {
      $this->angostura = ($this->servings * 2.0) * 0.5; // 1 dash per serving
    }
  }

  // dilution
  public function calculateWater() {
    $this->total = $this->bourbon + $this->simple;
    $this->water = $this->total * 0.2;
  }

  // oranges
  public function calculateOranges() {
    // std is 1 orange per 8 servings, rounded up
    $this->oranges = ceil($this->servings / 8);
  }

  // getter methods
  public function getBourbon() {
    return $this->bourbon;
  }

  public function getSimple() {
    return $this->simple;
  }

  public function getBitters() {
    return $this->angostura;
  }

  public function getWater() {
    return $this->water;
  }

  // calculate all values
  public function calculateAll() {
    $this->calculateBourbon();
    $this->calculateSimple();
    $this->calculateBitters();
    $this->calculateWater();
    $this->calculateOranges();
  }

  // validate servings
  public function validate()
  {
    $error_message = '';

    if ($this->servings === false) {
      $error_message = 'Please enter a valid number of servings.';
    } else if ($this->servings <= 0) {
      $error_message = 'Please enter a number greater than zero.';
    } else if (!is_int($this->servings)) {
      $error_message = 'Please enter a whole number.';
    }

    return $error_message;
  }
}
