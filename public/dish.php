<?php 
   define("TITLE", "Menu Item | Abu Muhsin Dining Resort");

    include('includes/header.php');

    function strip_bad_chars($input) {
        $output = preg_replace("/[^a-zA-z0-9_-]/", "", $input);
        return $output;
    }

    if (isset($_GET['item'])) {
      $menuItem =($_GET['item']);

      $dish = $menuItems[$menuItem];
    }

    // Calculate a suggested tip
    function suggestedTip($price, $tip) {
      $totalTip = $price * $tip;
      echo sprintf('%.2f', $totalTip);
    }
?>

<hr>

<div class="dish">
  <h1><?php echo $dish['title']; ?> #<?php echo $dish['price'] ?></h1>
  <p><?php echo $dish['blurb']; ?></p>

  <br>
  <p><strong>Suggested beverage: <?php echo $dish['drink']; ?></strong></p>
  <p><em>Suggested Tip: <sup>#</sup><?php echo suggestedTip($dish['price'], 0.20); ?></em></p>
</div>

<hr>

<a href="menu.php" class="btn btn-outline-secondary btn-sm">&laquo; Back to Menu</a>

<?php
  include('includes/footer.php');
?>