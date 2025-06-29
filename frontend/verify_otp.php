<?php
$config = parse_ini_file('C:/wamp64/private/ai_config.ini', true);
$verifyOtpAction = $config['urls']['verify_otp_action'] ?? '#';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo"> <!-- Replace with your logo path -->
            <span>Brand Name</span>
        </div>
        <nav class="nav-container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a href="#">Features </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">AI-Generated Content</a></li>
                        <li><a href="#">SEO Optimization</a></li>
                        <li><a href="#">Social Media Management</a></li>
                        <li><a href="#">Email Marketing Automation</a></li>
                        <li><a href="#">Paid Ads Management</a></li>
                        <li><a href="#">Lead Generation</a></li>
                        <li><a href="#">Engagement & Community Building</a></li>
                        <li><a href="#">Analytics & Reporting</a></li>
                    </ul>
                </li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="signup-container">
        <h2>Verify OTP</h2>
        <p>Enter the OTP sent to your email or phone.</p>
        <form action="<?= htmlspecialchars($verifyOtpAction) ?>" method="POST">
            <input type="text" name="otp" placeholder="Enter OTP" required>
            <button type="submit">Verify</button>
        </form>
    </div>

</body>
</html>
