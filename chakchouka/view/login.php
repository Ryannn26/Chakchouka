<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        // JavaScript form validation
        function validateLoginForm() {
            var email = document.getElementById("email").value.trim();
            var password = document.getElementById("password").value.trim();
            var errorMessage = "";

            // Email validation
            if (email === "" || !email.includes("@")) {
                errorMessage += "Please enter a valid email address.\n";
            }

            // Password validation
            if (password === "") {
                errorMessage += "Password is required.\n";
            }

            // Show error messages
            if (errorMessage !== "") {
                alert(errorMessage);
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
</head>
<body>
    <h2>Login</h2>
    <form action="../controller/process_login.php" method="POST" onsubmit="return validateLoginForm();">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>
