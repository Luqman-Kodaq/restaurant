
      <div id="footer" class="cf">
        <div class="column three">
        <strong>Phone</strong>
        800.529.3819
        </div>
        <div class="column three"><strong>Location</strong>
        123 Kapiolani BouveLard<br> Hanolulu, HI
        </div>
        <div class="column three last"><strong>Hours</strong><em> Tuesday - Thursday</em><br>
        1:00pm - 9:00pm<br><br>

        <em>Friday - Saturday</em><br>
        4:00pm - 11:00pm<br><br>

        <em>Sunday - Monday</em><br>
        Closed<br><br>
        <?php include('includes/storeHours.class.php');
                
        $hours = array(
          'mon' => array('00:00-00:00'),
          'tue' => array('13:00-21:00'),
          'wed' => array('13:00-21:00'),
          'thu' => array('13:00-21:00'),
          'fri' => array('16:00-23:00'),
          'sat' => array('16:00-23:00'),
          'sun' => array('00:00-00:00') // Closed all day
      );

      $exceptions = array(
          '12/25' => array('11:00-18:00'),
          '1/1' => array('11:00-16:00', '18:00-20:30')
      );

           // Instantiate class
          $store_hours = new StoreHours($hours, $exceptions);
            
          // Display open / closed message
          if($store_hours->is_open()) {
              echo "Yes, we're open! Today's hours are " . $store_hours->hours_today() . ".";
          } else {
              echo "Sorry, we're closed. Today's hours are " . $store_hours->hours_today() . ".";
          }
        ?>
        </div>
      </div>

      <small>&copy; <?php echo date('Y'); ?> <?php echo $companyName; ?></small>
    </div>
  </div>
  </body>
</html>