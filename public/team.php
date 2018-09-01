<?php 
   define("TITLE", "Team | Abu Muhsin Dining Resort");

    include('includes/header.php');
?>

<div id="team-members" class="cf">
    <h1>Our Team at Abu Muhsin</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt iure consequatur sequi ipsum quisquam dignissimos perferendis, reiciendis ex quam quod voluptate rerum, officia deleniti quas: <strong>The best food yo've ever had. Ever.</strong></p>

    <hr>

    <?php
      foreach($teamMembers as $member) {
    ?>
        <div class="member">
            <h2><?php echo $member['name']; ?></h2>
            <p><?php echo $member['bio']; ?></p>
        </div>
    <?php
      }
    ?>
</div>

<?php
  include('includes/footer.php');
?>