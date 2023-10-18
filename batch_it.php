<?php

class BatchValue {
  public $servings;
  public $sweetness;
  public $bourbon;
  public $wisc;
  public $brandy;
  public $simple;
  public $angostura;
  public $water;
  public $oranges;

  public function __construct() {
    $this->servings = 0;
    $this->sweetness = '';
    $this->bourbon = 0;
    $this->wisc = FALSE;
    $this->simple = 0;
    $this->angostura = 0;
    $this->oranges = 0;
  }

  // servings
  public function setServings($servings) {
    $this->servings = $servings;
  }
  public function getServings() {
    return $this->servings;
  }

  // wisc
  public function setWisc($wisc) {
    $this->wisc = $wisc;
  }
  public function getWisc() {
    return $this->wisc;
  }

  // brandy 
  public function setBrandy($brandy) {
    $this->brandy = $brandy;
  }
  public function getBrandy() {
    return $this->brandy;
  }

  // bourbon
  public function setBourbon($bourbon) {
    if ($this->sweetness != 'Wisconsin sweet') {
      $this->bourbon = ($bourbon * 2.0) * $this->servings;
    } else {
      $this->setWisc(TRUE);
      $this->brandy = ($bourbon * 2.0) * $this->servings;
      $this->bourbon = 0;
    }
  }
  public function getBourbon() {
    return $this->bourbon;
  }

  // simple syrup
  public function setSimple($simple) {
    if ($this->sweetness == 'Just enough') {
      $this->simple = $simple * 0.25;
    } else if ($this->sweetness == 'Classic specs') {
      $this->simple = $simple * 0.5;
    } else if ($this->sweetness == 'Sweeter') {
      $this->simple = $simple * 0.75;
    } else if ($this->sweetness == 'Wisconsin sweet') {
      $this->simple = $simple * 1.0;
    }
    $this->simple = $this->simple * $this->servings;
  }
  public function getSimple() {
    return $this->simple;
  }

  // angostura bitters
  public function setBitters($angostura) {
    $dashes = $this->servings * 2;
    $this->angostura = $dashes / 48;
    if ($this->servings > 4) {
      $this->angostura = ($angostura * 0.5) * $this->servings;
    } else {
      $this->angostura = $angostura * $this->servings; // come back to dashes output later
    }
  }
  public function getBitters() {
    return $this->angostura;
  }

  // validate servings
  public function validate() {
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