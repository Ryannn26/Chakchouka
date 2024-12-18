<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script>
        function validateForm() {
            var name = document.getElementById("name").value.trim();
            var email = document.getElementById("email").value.trim();
            var password = document.getElementById("password").value.trim();
            var phone = document.getElementById("phone").value.trim();
            var role = document.querySelector('input[name="role"]:checked');

            if (name == "" || email == "" || password == "" || phone == "" || !role) {
                alert("All fields are required, including selecting a role.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="http://localhost/chakchouka/controller/process_register.php">

    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="pseudo">Pseudo:</label><br>
    <input type="text" id="pseudo" name="pseudo" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <label for="phone_number">Phone:</label><br>
    <input type="text" id="phone_number" name="phone_number" required><br><br>

    <label for="role">Role:</label><br>
    <input type="radio" id="client" name="role" value="client" required> Client<br>
    <input type="radio" id="deliverer" name="role" value="deliverer" required> Deliverer<br>
    <input type="radio" id="restaurant" name="role" value="restaurant" required> Restaurant<br><br>

    <button type="submit">Register</button>
</form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
