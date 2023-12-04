<?php
$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";

$message = [
    "email" => '',
    'password' => ''
];

$class = [
    "email" => '',
    'password' => ''
];

$uppercase = preg_match('@[A-Z]@', $password);  // If there are a capital letter return 1 else 0
$lowercase = preg_match('@[a-z]@', $password);  // If there are a miniuno capital letter return 1 else 0
$number    = preg_match('@[0-9]@', $password);  // If there are the number letter return 1 else 0
$specialChars = preg_match('@[^\w]@', $password);  // If there are a special charapter letter return 1 else 0

//# Validate email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $class['email'] = "is-valid";
} else {
    $message['email'] =  ("$email is not a valid email address");
    $class['email'] = "is-invalid";
}


//# Validate Password
if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    $message['password'] =  'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    $class['password'] = 'is-invalid';
} else {
    $class['password'] = 'is-valid';
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD HTML -->
<?php include './includes/head.html' ?>

<body>
    <div class="container my-5">

        <form action="" method="POST">

            <!-- Email -->
            <label for="email">Email</label>
            <div class="mb-3">
                <input type="email" id="email" name="email" class="d-block form-control <?= $class['email'] ?>">
                <div>
                    <small class="text-danger"><?= $message['email'] ?></small>
                </div>
            </div>

            <!-- Password -->
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="d-block form-control <?= $class['email'] ?>">
            <div>
                <small class="text-danger"><?= $message['password'] ?></small>
            </div>

            <!-- Button submit -->
            <button class="btn btn-success">Login</button>
        </form>
    </div>
</body>

</html>