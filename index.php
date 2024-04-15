<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--- CDNjs icons --->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--- CSS Stylesheets --->
  <link rel="stylesheet" href="css/styles.css">
  <title>Suscription Form</title>
</head>
<body>
  <main id="principal">
    <input type="checkbox" name="" id="toggle">
    <label for="toggle" class="show-btn">Show Modal</label>
    <section class="form-card">
      <label for="toggle" class="cancel-btn"><i class="fa-solid fa-x"></i></label>
      <div class="content-div div">
        <i class="fa-solid fa-envelope-open-text icon"></i>
        <h1 class="title">Become a Subscriber</h1>
        <p>Suscribe to our newsletter and get the latest news, promotions and updates</p>
      </div>
      <form action="index.php" method="POST" id="form">
        <?php
          $userEmail = "";
          if(isset($_POST["subscribe"])) {
            $userEmail = $_POST["email"];
            if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
              echo "Email is corrent";
              $subject = "Thanks for Subscribing!";
              $message = "Thanks for subscribing to our newsletter. You will always receive the latest news, promotions and updates.";
              $sender = "From: mdzg96@gmail.com";
              if(mail($userEmail, $subject, $message, $sender)) {
        ?>
              <div class='success-alert'>Suscription successfully made - Thank you!</div>
        <?php
              $userMail = "";
              } else {
        ?>
              <div class='error-alert'>There has been an error. Please, try again later.</div>
        <?php      
              }

            } else {
        ?>
              <div class='error-alert'><?php echo $userEmail ?> is not a valid email.</div>
        <?php
            }
          }
        ?>
        <div class="email-div div">
          <input type="text" name="email" id="email" placeholder="Enter your email address" required value="<?php echo $userEmail ?>">
        </div>
        <div class="button-div div">
          <input type="submit" name="subscribe" id="submit-btn" value="Subscribe">
        </div>
      </form>
      <div class="text-div div">
        <p>We do not share your information <i class="fa-solid fa-lock"></i></p>
      </div>
    </section>
  </main>

  <!---- JavaScript ---->
  <script src="./js/script.js"></script>
</body>
</html>