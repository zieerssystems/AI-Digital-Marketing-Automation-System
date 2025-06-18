<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // PHPMailer

// ✅ Load mailer config from ini file (outside www)
$config = parse_ini_file('C:/wamp64/private/ai_config.ini', true); // Absolute path

function sendEmailOTP($email, $otp) {
    global $config; // use loaded config
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $config['mailer']['email'];      // From ini
        $mail->Password = $config['mailer']['password'];   // From ini
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($config['mailer']['email'], 'AI Marketing Automation');
        $mail->addAddress($email);
        $mail->Subject = 'Your OTP Code';
        $mail->isHTML(true);

        $mail->Body = "
            <p>We received a request to reset the password for the AI MARKETING AUTOMATION user associated with this email address.</p>
            <p>If you did not request to reset this password, you can ignore this request.</p>
            <p><a href='http://localhost/ai_project/frontend/verify_reset_password.html' style='color: blue; text-decoration: underline;'>Click Here</a> to reset the password for your account.</p>
            <p><strong>Your OTP code is: $otp</strong></p>
            <p>Best regards,<br>AI MARKETING AUTOMATION Team</p>
        ";

        $mail->send();
    } catch (Exception $e) {
        error_log("Email sending failed: " . $mail->ErrorInfo);
    }
}

?>
