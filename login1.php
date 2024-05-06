<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>

    <?php
    require 'vendor/autoload.php'; // Include PHPMailer autoloader
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    function generateOTP($length = 6) {
        return rand(pow(10, $length-1), pow(10, $length)-1);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email']; // Retrieve email from the POST data
        $otp = generateOTP(); // Generate OTP
        
        // Send OTP to the user's email
        $mail = new PHPMailer(true);
    
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.example.com'; // SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'your_email@example.com'; // SMTP username
            $mail->Password   = 'your_email_password'; // SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587; // Port for TLS
    
            // Recipients
            $mail->setFrom('your_email@example.com', 'Your Name');
            $mail->addAddress($email); // Add a recipient
    
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP';
            $mail->Body    = 'Your OTP is: ' . $otp;
    
            $mail->send();
            echo 'An OTP has been sent to your email address.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    ?>
    


    
   <div class="content">
    <div class="icon">
        <h2 class="logo"></h2>
    </div>
    <h1>
    PAW<span>
    <a href="#"><ion-icon name="paw-sharp"></ion-icon></a>
    sitive</span>ALLY</h1>
   </div>









   
       <div class="form">
           <h2>Log In </h2>
           <input type="email" name="email" placeholder="Enter User Name">
           <input type="password" name="" placeholder="Enter Password">
           <a href="#" id="forgot-password-link">Forgot Password?</a>
        <div id="forgot-password-form" style="display: none;">
            <input type="email" id="forgot-email" name="forgot-email" placeholder="Enter Email">
            <button id="reset-password-btn">Reset Password</button>
        </div>
        <div id="response-message"></div>
           
           <button class="btnn"><a href="homepage.html">Log In</a></button>

   
           <p class="link">Don't have an account?<br>
               <a href="registration.html">Sign Up</a> here</a>
           </p>
           <!-- <p class="liw">Log in with</p>
   
           <div class="icons">
               <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
               <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
               <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
               <a href="#"><ion-icon name="logo-google"></ion-icon></a>
               <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
           </div> -->
       </div>
       <!-- <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script> -->



        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js">

document.getElementById('forgot-password-link').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('forgot-password-form').style.display = 'block';
});

document.getElementById('reset-password-btn').addEventListener('click', function(event) {
    event.preventDefault();
    var email = document.getElementById('forgot-email').value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'reset_password.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('response-message').innerHTML = xhr.responseText;
        }
    };
    xhr.send('email=' + email);
});
        </script>
</body>
</html>