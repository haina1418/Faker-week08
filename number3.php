<?php

require_once 'vendor/autoload.php';


$faker = Faker\Factory::create();


function generateUUID() {
    return bin2hex(random_bytes(16));
}


function hashPassword($password) {
    return hash('sha256', $password);
}


$users = [];
for ($i = 0; $i < 10; $i++) {
    // Generate random user data
    $fullName = $faker->name();
    $email = $faker->email();
    $username = strtolower(explode('@', $email)[0]);
    $password = $faker->password();
    $hashedPassword = hashPassword($password);
    $accountCreated = $faker->dateTimeThisYear()->format('Y-m-d H:i:s');

    
    $users[] = [
        'user_id' => generateUUID(),
        'full_name' => $fullName,
        'email' => $email,
        'username' => $username,
        'password' => $hashedPassword,
        'account_created' => $accountCreated
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Accounts</title>
    <!-- Bootstrap 4 CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3X8p+Knujsl5/1hbY6Zz2XcxCQ0d9GpxtpZuZl9h8FfwaXyH2n4" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Fake User Accounts</h2>

    <!-- User Accounts Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Password (SHA-256)</th>
                <th scope="col">Account Created</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['user_id']) ?></td>
                <td><?= htmlspecialchars($user['full_name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['password']) ?></td>
                <td><?= htmlspecialchars($user['account_created']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyF3h+G5pXbbIYw8iY5Q93M8HVyT7+9N5+GnqP3D" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-WpA5S1Y2+v6U6B9C9KrW8g4L5PciY7lrmvULg3Ppwe9UPbY8gmsfsEoWq36jwPt" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-ggOyR0iXCbMQv3X8p+Knujsl5/1hbY6Zz2XcxCQ0d9GpxtpZuZl9h8FfwaXyH2n4" crossorigin="anonymous"></script>

</body>
</html>