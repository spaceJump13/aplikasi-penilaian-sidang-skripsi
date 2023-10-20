<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to your database.
    $db = new mysqli('localhost', 'root', '', 'manpro13');

    if ($db->connect_error) {
        die('Connection failed: ' . $db->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT username, password, type FROM user WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($dbUsername, $dbPassword, $userType);
        $stmt->fetch();

        // Verify the entered password with the stored password hash.
        if (password_verify($password, $dbPassword)) {
            $_SESSION['username'] = $dbUsername;
            $_SESSION['user_type'] = $userType;

            if ($userType === 'admin') {
                header("Location: homeAdmin.html");
                exit();
            } elseif ($userType === 'ketua') {
                header("Location: homeKetuaPenguji.html");
                exit();
            } elseif ($userType === 'dosen') {
                header("Location: homeDosen.html");
                exit();
            }
        } else {
            $loginError = "Incorrect password. Please try again.";
        }
    } else {
        $loginError = "User not found. Please check your username and password.";
    }

    $stmt->close();
    $db->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>
<body style="background-color:#4478FF">
    <div class="login-form">
        <h3 style="font-weight:600">WELCOME</h3>
        <form method="post">
            <div class="input-group mb-3">
                <label for="InputEmail1" class="form-label" style="padding-right: 10px;">Username</label>
                <input type="text" class="form-control" id="InputEmail1" name="username" required>
                <span class="input-group-text" id="emailaddrss">@peter.petra.ac.id</span>
            </div>
            <div class="input-group mb-3">
                <label for="InputPassword1" class="form-label" style="padding-right: 15px;">Password</label>
                <input type="password" class="form-control" id="InputPassword1" name="password" required>
            </div>
            <div class="button_login">
                <button type="submit" class="btn btn-warning" id="login">Login</button>
            </div>
            <?php if (isset($loginError)) { ?>
                <p style="color: red;"><?php echo $loginError; ?></p>
            <?php } ?>
        </form>
    </div>
</body>
</html>
