<?php
require_once 'batch_it.php';

// get data
$servings = filter_input(INPUT_POST, 'servings', FILTER_VALIDATE_INT);
$sweetness = filter_input(INPUT_POST, 'sweetness');

// create new BatchValue object
$batch = new BatchValue($servings, $sweetness);

// calculate values
$batch->calculateAll();

// validate data
$error_message = $batch->validate();

// if error message exists, go to index.php
if ($error_message) {
  include('index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Batched Old Fashioned Specs</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Batched Old Fashioned Specs</h1>

  <p>WIP: formatting, conversion calc, styling otw</p>

  <div id="data">
    <label>Number of servings:</label>
    <span><?php echo $batch->servings; ?></span><br>

    <label>Sweetness level:</label>
    <span><?php echo $batch->sweetness; ?></span><br>

    <label>Bourbon:</label>
    <span><?php echo $batch->bourbon; ?></span><br>

    <label>Simple syrup:</label>
    <span><?php echo $batch->simple; ?></span><br>

    <label>Angostura bitters:</label>
    <span><?php echo $batch->angostura; ?></span><br>

    <label>Oranges:</label>
    <span><?php echo $batch->oranges; ?></span><br>

    <p>Batched on <?php echo date('m/d/y'); ?></p>
</body>

</html>