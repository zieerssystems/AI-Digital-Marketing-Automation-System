<?php
$config = parse_ini_file('C:/wamp64/private/ai_config.ini', true);
$signupAction = $config['urls']['signup_action'] ?? '#';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | AI Marketing Automation</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Center the signup container */
        .signup-container {
            width: 350px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 100px auto;
        }

        /* Form Inputs */
        .signup-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Signup Button */
        .signup-container button {
            width: 100%;
            padding: 10px;
            background: #1abc9c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .signup-container button:hover {
            background: #16a085;
        }

        /* Message Box Styling */
        #message-box {
            display: none;
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
        }
        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <span>Brand Name</span>
        </div>
        <nav class="nav-container">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="#">Features ▼</a>
                <ul class="dropdown-menu">
                    <li><a href="ai_gener_content.php">AI-Generated Content</a></li>
                    <li><a href="seo_optimization.php">SEO Optimization</a></li>
                    <li><a href="social_media_management.php">Social Media Management</a></li>
                    <li><a href="email.php">Email Marketing Automation</a></li>
                    <li><a href="ads.php">Paid Ads Management</a></li>
                    <li><a href="lead.php">Lead Generation</a></li>
                    <li><a href="analytics_reporting.php">Analytics & Reporting</a></li>
                </ul>
            </li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
        </nav>
    </header>

    <div class="signup-container">
        <!-- Message Box (Initially Hidden) -->
        <div id="message-box"></div>
        
        <h2>Create Your Account</h2>
        <form action="<?= $signupAction ?>" method="POST">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" maxlength="10" title="Enter a 10-digit phone number" required>
            <input type="text" name="location" placeholder="City / Location" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>

            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <footer>
        <p>&copy; <script>document.write(new Date().getFullYear());</script> AI Marketing Automation. All rights reserved.</p>
    </footer>
    
    <script>
       window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        const messageBox = document.getElementById("message-box");

        if (status === "success") {
            messageBox.innerHTML = "✅ Registration completed successfully!";
            messageBox.classList.add("success");
            messageBox.style.display = "block";
        } else if (status === "error") {
            messageBox.innerHTML = "❌ Registration failed. Please try again.";
            messageBox.classList.add("error");
            messageBox.style.display = "block";
        } else if (status === "email_exists") {
            messageBox.innerHTML = "❌ This email is already registered. Try logging in.";
            messageBox.classList.add("error");
            messageBox.style.display = "block";
        }
        else if (status === "password_mismatch") {
        messageBox.innerHTML = "❌ Password and Confirm Password do not match.";
        messageBox.classList.add("error");
        messageBox.style.display = "block";
}


    document.addEventListener('DOMContentLoaded', () => {
        const phoneInput = document.querySelector('input[name="phone"]');
        phoneInput.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    });



        // Hide message after 3 seconds
        if (messageBox.style.display === "block") {
            setTimeout(() => {
                messageBox.style.display = "none";
            }, 3000);
        }
    };
    </script>
</body>
</html>