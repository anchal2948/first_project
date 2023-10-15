<?php
include "common/header.php";

if (isset($_POST['lead'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $description = $_POST['description'];

    // SQL insert query
    $sql = "INSERT INTO user (user_name, user_email, user_mobile, user_description, created_at) 
            VALUES ('$name', '$email', '$mobile', '$description', NOW())";

    if ($conn->query($sql) === TRUE) {
        // Insert successful, send an email
        $to = "itstudia4@gmail.com"; // Replace with the recipient's email address
        $subject = "New Contact Form Submission";
        $message = "Name: $name\nEmail: $email\nMobile: $mobile\nDescription: $description";

        $headers = "From: $email\r\n"; // Sender's email address
        $headers .= "Reply-To: $email\r\n"; // Reply-To address

        if (mail($to, $subject, $message, $headers)) {
            // Email sent successfully
            echo "<script>alert('Your message has been sent. Thank you!')</script>";
            echo "<script>window.location.replace('http://localhost/itstudia/itstudia/php/Contact.php');</script>";
        } else {
            // Email sending failed
            echo "Error sending email.";
        }
    } else {
        // Insert failed, display error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<!-- Rest of your HTML code -->

<section id="contact" class="contact py-5">
    <div class="container" ="fade-up">

      <div class="section-title">
        <h2>For Any Query</h2>
        <h3><span>Contact Us</span></h3>
        <p></p>
      </div>

      <div class="row" ="fade-up" -delay="100">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Our Address</h3>
            <!-- <p>A108 Adam Street, New York, NY 535022</p> -->
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>itstudiaservices@gmail.com</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>7982337789</p>
          </div>
        </div>

      </div>

      <div class="row" ="fade-up" -delay="100">

        <div class="col-lg-6 ">
          <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6">
          <form action="#" method="post"  class="php-email-form">
            <div class="row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile" >
            </div>
            <div class="form-group">
              <textarea class="form-control" name="description" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <!-- <div class="loading">Loading</div>
              <div class="error-message"></div> -->
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button name="lead" type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section>
  <?php include "common/footer.php"; ?>