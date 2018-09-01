<?php 
   define("TITLE", "Contact Us | Abu Muhsin Dining Resort");

    include('includes/header.php');

  ?>

  <div class="contact">
    <hr>

    <h1>Get in touch with us!</h1>

    <?php 

    // Check for header injections
    function has_header_injection($str) {
        return preg_match("/[\r\n]/", $str);
    }

      if(isset($_POST['contact_submit'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $msg = $_POST['message'];

            // Check to see if $name or $email have header injections
            if (has_header_injection($name) || has_header_injection($email)) {
              die(); // If true, kill the script
            }
            if (!$name || $email ||$msg) {
              echo '<div class="alert alert-danger" role="alert">
              All fields required.
            </div><a href="contact.php" class="btn btn-outline-secondary btn-sm">&laquo; Go back and try again</a>';
            exit;
            }

            // Add the recipient email to a variable
            $to = "onakoyak@gmail.com";

            // Create a subject
            $subject = "$name sent you a message via your contact form";

            // Construct the message
            $message = "Name: $name\r\n";
            $message .= "Email: $email\r\n";
            $message .= "Message:\r\n$msg";

            // If the subscribe checkbox was checked
            if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe') {

              // Add a new line to the $message
              $message .= "r\n\r\nPlease add $email to the mailing list.\r\n";
            }

            $message = wordwrap($message, 72);

            // Set the mail headers into a variable
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "content-type: text/plain; charset=iso-8859-1\r\n";
            $headers .= "From: $name <$email>\r\n";
            $headers .= "X-Piority: 1\r\n";
            $headers .= "x-MSMail-Priority: High\r\n\r\n";

            // Send the mail
            mail($to, $subject, $message, $headers );
    ?>

    <!-- Show success message after email has sent -->
    <div class="alert alert-danger" role="alert">
              <h5>Thanks for contacting Abu Muhsin!</h5>
              <p>Please allow 24 hours for a response.</p>
              <p><a href="/final" class="btn btn-outline-primary btn-sm">&laquo; Go to Home Page</a></p>
    </div>

    <?php } else {  ?>
    <form action="" method="post"">
    <div class="container">
    <div class="row">
    <div class="col-md-10 my-1">
    <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">

        <label for="email">Your Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Your Email">

        <label for="message">Enter Your Message</label>
        <textarea type="text" id="message" name="message" class="form-control" placeholder="Enter Your Message" rows="8"></textarea>

        <input type="checkbox" name="subscribe" id="subscribe" value="Subscribe">
        <label for="subscribe">Subscribe to Newsletter</label>

        <input type="submit" class="btn btn-outline-secondary btn-sm btn-block my-1" name="contact_submit" value="Send Message">
    </div>
    </div>
    </div>
    </div>
    </form>
    <?php } ?>

    <hr>
  <!-- </div> -->

  <?php
  include('includes/footer.php');
?>