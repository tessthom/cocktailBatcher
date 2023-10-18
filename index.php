<?php
require_once 'batch_it.php';

// display any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Batched Old Fashioned Calculator</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <main>
    <h1>Batched Old Fashioned Calculator</h1>
    <?php if (!empty($error_message)) { ?>
      <p class="error"><?php echo $error_message; ?></p>
    <?php } ?>

    <form action="display_results.php" method="post">
      <div id="data">
        <label>Number of servings:</label>
        <input type="text" name="servings"><br>

        <label>Sweetness level:</label>
        <select name="sweetness">
          <option value="Just enough">Just enough - 0.25oz</option> <!-- 0.25oz -->
          <option value="Classic specs" selected>Classic specs - 0.5oz</option> <!-- 0.5oz -->
          <option value="Sweeter">Sweeter - 0.75oz</option> <!-- 0.75oz -->
          <option value="Wisconsin sweet">Wisconsin sweet - 1.0oz</option> <!-- 1.0oz -->
        </select>

        <p>*Calculation for a 1:1 simple syrup</p>
      </div>

      <div class="buttons">
        <label>&nbsp;</label>
        <input type="submit" value="Calculate">
      </div>
    </form>
  </main>
</body>

</html>