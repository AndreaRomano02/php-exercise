<?php
$register = false;

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
if (!strlen($email) && !strlen($password)  || filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $class['email'] = "is-valid";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message['email'] =  ("$email is not a valid email address");
    $class['email'] = "is-invalid";
}


//# Validate Password
if (!strlen($email) && !strlen($password)) {
    $class['password'] = 'is-valid';
} else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    $message['password'] =  'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    $class['password'] = 'is-invalid';
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD HTML -->
<?php include './includes/head.html' ?>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form action="" method="POST">

                                        <!-- Email -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="email">Your Email</label>
                                                <input value="<?= $email ?>" type="email" id="email" class="form-control <?= $class['email'] ?>" name="email" />
                                                <div>
                                                    <small class="text-danger"><?= $message['email'] ?></small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="password" class="form-control <?= $class['password'] ?>" name="password" />
                                                <label class="form-label" for="password">Password</label>
                                                <div>
                                                    <small class="text-danger"><?= $message['password'] ?></small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Button submit -->
                                        <div class="d-flex justify-content-between ">

                                            <button class="btn btn-primary btn-lg">Login</button>
                                            <a href="./register.php">Registrati</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>