<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function validateInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = validateInput($_POST['firstName']);
    $lastName = validateInput($_POST['lastName']);
    $company = validateInput($_POST['company']);
    $address = validateInput($_POST['address']);
    $address2 = validateInput($_POST['address2']);
    $city = validateInput($_POST['city']);
    $state = validateInput($_POST['state']);
    $zip = validateInput($_POST['zip']);
    $email = validateInput($_POST['email']);
    $phone = validateInput($_POST['phone']);
    $terms = isset($_POST['terms']);
    $signature = validateInput($_POST['signature']);

    $error = '';
    if (empty($firstName) || empty($lastName) || empty($company) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($email) || empty($phone) || !$terms || empty($signature)) {
        $error = 'Please fill in all required fields and agree to the terms.';
    } else {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'site@debtcw.com';
            $mail->Password = 'your_password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('site@debtcw.com', 'Debt Collectors Worldwide');
            $mail->addAddress('info@debtcww.com');

            $mail->isHTML(true);
            $mail->Subject = 'New Collection Claim Submission';
            $mail->Body    = "
                <h3>New Collection Claim Submission</h3>
                <p><strong>Name:</strong> $firstName $lastName</p>
                <p><strong>Company:</strong> $company</p>
                <p><strong>Address:</strong> $address $address2, $city, $state, $zip</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Signature:</strong> $signature</p>
            ";

            $mail->send();
            $success = 'Your claim has been submitted successfully.';
        } catch (Exception $e) {
            $error = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DebtCW - Debt Collectors Worldwide</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/glightbox.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/datepicker.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="top-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md d-flex align-items-center mb-2 mb-md-0">
            <div class="con">
              <p class="mb-0"><span class="fa fa-calendar"></span> Monday - Friday 8:00AM-8:00PM</p>
            </div>
          </div>
          <div class="col-md d-flex align-items-center mb-2 mb-md-0">
            <div class="con">
              <p class="mb-0"><span class="fa fa-phone"></span> Call Us: +1 800 783 5744</p>
            </div>
          </div>
          <div class="col-md d-flex align-items-center mb-2 mb-md-0">
            <div class="con">
              <p class="mb-0"><span class="fa fa-map-o"></span> Location: Windermere, Florida, USA</p>
            </div>
          </div>
          <div class="col-md d-flex justify-content-start justify-content-md-end align-items-center">
            <p class="ftco-social d-flex">
              <a href="#" class="d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
</svg></a>
              <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
              <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-google"></span></a>
              <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg  ftco-navbar-light">
      <div class="container-xl">
        <a class="navbar-brand" href="index.html">
            Debt<small>cw</small>
            <span>Debt Collection Services</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="about.html">About</a></li>
            <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="work.html">Work</a></li>
            <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
            <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 text-center mb-5">
            <p class="breadcrumbs"><span class="me-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Get Started <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Guaranteed Debt Collection Services</h1>
          </div>
        </div>
      </div>
    </section>



      <div class="container mt-5">
          <div class="card">
              <div class="card-body">
                  <h3 class="card-title text-center">Get Started Now</h3>
                  <p class="card-text text-center">
                      Please complete the form below so we can start handling your claims. By completing the form you are agreeing to allow Debt Collectors Worldwide to handle the collection claims placed with us.
                  </p>
                  <?php if (!empty($error)): ?>
                      <div class="alert alert-danger"><?php echo $error; ?></div>
                  <?php endif; ?>
                  <?php if (!empty($success)): ?>
                      <div class="alert alert-success"><?php echo $success; ?></div>
                  <?php endif; ?>
                  <form action="submit.php" method="POST">
                      <!-- Form fields -->
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="firstName">Name</label>
                              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="lastName">&nbsp;</label>
                              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                          </div>
                          <div class="form-group col-md-12">
                              <label for="company">Company</label>
                              <input type="text" class="form-control" id="company" name="company" placeholder="Type in N/A if you are not a company">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" id="address" name="address" placeholder="Street Address">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="address2" name="address2" placeholder="Street Address Line 2">
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-4">
                              <label for="city">City</label>
                              <input type="text" class="form-control" id="city" name="city">
                          </div>
                          <div class="form-group col-md-4">
                              <label for="state">State / Province</label>
                              <input type="text" class="form-control" id="state" name="state">
                          </div>
                          <div class="form-group col-md-4">
                              <label for="zip">Postal / Zip Code</label>
                              <input type="text" class="form-control" id="zip" name="zip">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="phone">Phone Number</label>
                              <input type="tel" class="form-control" id="phone" name="phone" placeholder="(000) 000-0000">
                          </div>
                      </div>
                      <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input" id="terms" name="terms">
                          <label class="form-check-label" for="terms">
                              By clicking this checkbox you agree to terms and conditions below
                          </label>
                      </div>
                      <div class="form-group">
                          <label>Signature</label>
                          <div class="signature-pad" id="signature-pad">
                              <canvas></canvas>
                              <button type="button" class="btn btn-secondary btn-sm" id="clear">Clear</button>
                          </div>
                          <input type="hidden" name="signature" id="signature-input">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  <p class="mt-3" style="font-size: xx-small;">
                    BY EXECUTING THIS AGREEMENT CLIENT UNDERSTANDS THAT THE FILE IS BEING PLACED FOR COLLECTIONS. CLIENT UNDERSTANDS THAT DCW WILL USE THEIR BEST EFFORTS TO SECURE PAYMENT ON THEIR BEHALF AND WILL DIRECT ALL COMMUNICATIONS TO DCW.
                </p>
              </div>
          </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
      <script src="js/start-script.js"></script>


      <footer class="ftco-footer img" style="background-image: url(images/bg_1.jpg);">
    <div class="overlay"></div>
    <div class="container-xl">
      <div class="row mb-5 justify-content-between">
        <div class="col-md-6 col-lg">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2 logo d-flex">
                <a class="navbar-brand" href="/">
                Debt<small>cw</small>
                <span>Debt Collection Services</span>
              </a>
            </h2>
            <img src="../logo.webp.png" width="200px">
            <ul class="ftco-footer-social mt-4">
              <li>
                <a href="#">
                  <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                  </svg></span>
                </a>
              </li>
              <li><a href="#"><span class="fa fa-facebook"></span></a></li>
              <li><a href="#"><span class="fa fa-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Navigation</h2>
            <div class="d-md-flex">
              <ul class="list-unstyled w-100">
                <li><a href="/"><span class="ion ion-ios-arrow-round-forward me-2"></span>Home</a></li>
                <li><a href="about" title="Debt Collectors Worldwide about page."><span class="ion ion-ios-arrow-round-forward me-2"></span>About</a></li>
                <li><a href="place_a_claim.php"title="Debt Collectors Worldwide place a claim page."><span class="ion ion-ios-arrow-round-forward me-2"></span>Place a Claim</a></li>
                <li><a href="faq" title="Debt Collectors Worldwide FAQ page."><span class="ion ion-ios-arrow-round-forward me-2"></span>FAQs</a></li>
              </ul>
              <ul class="list-unstyled w-100">
                <li><a href="https://www.consumerfinance.gov/consumer-tools/debt-collection/" target="_blank" title="Consumer debt collection help."><span class="ion ion-ios-arrow-round-forward me-2"></span>Consumer Help</a></li>
                <li><a href="https://app.simplicitycollect.com/ClientPortalLogin.aspx" target="_blank" title="Debt Collectors Worldwide client login page."><span class="ion ion-ios-arrow-round-forward me-2"></span>Login Client</a></li>
                <li><a href="pricing" title="Debt Collectors Worldwide pricing page."><span class="ion ion-ios-arrow-round-forward me-2"></span>Pricing</a></li>
                <li><a href="contact" title="Debt Collectors Worldwide contact page."><span class="ion ion-ios-arrow-round-forward me-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Recent Posts</h2>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img img rounded" style="background-image: url(images/image_1.jpg);"></a>
              <div class="text">
                <div class="meta">
                  <div><a href="#"><span class="fa fa-calendar"></span> Jan. 27, 2021</a></div>
                  <div><a href="#"><span class="fa fa-user"></span> Admin</a></div>
                </div>
                <h3 class="heading"><a href="blog-single">Debt recovery is a big challenge for business</a></h3>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img img rounded" style="background-image: url(images/image_2.jpg);"></a>
              <div class="text">
                <div class="meta">
                  <div><a href="#"><span class="fa fa-calendar"></span> Jan. 27, 2021</a></div>
                  <div><a href="#"><span class="fa fa-user"></span> Admin</a></div>
                </div>
                <h3 class="heading"><a href="blog-single2">Ready for Regulation F and successful collections</a></h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map marker"></span><span class="text">Windermere, Florida, USA</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+1 800 783 5744</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@debtcw.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid px-0 py-5 bg-darken">
        <div class="container-xl">
            <div class="row">
            <div class="col-md-12 text-center">
              <p class="mb-0" style="font-size: 14px;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Debt Collectors Worldwide, LLC</p>
            </div>
          </div>
        </div>
    </div>
  </footer>

<script>
    function toggleMenu() {
        var menu = document.querySelector('.nav-menu');
        menu.classList.toggle('open');
    }
</script>


    
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/tiny-slider.js"></script>
      <script src="js/glightbox.min.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/datepicker.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
      <script src="js/google-map.js"></script>
      <script src="js/main.js"></script>
    
  </body>
</html>
