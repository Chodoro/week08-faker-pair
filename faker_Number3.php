<?php
require 'vendor/autoload.php'; 

$faker = Faker\Factory::create();

$users = [];
for ($i = 0; $i < 10; $i++) {
    $email = $faker->unique()->email;
    $username = strtolower(explode('@', $email)[0]); 
    $password = hash('sha256', $faker->password); 
    $created_at = $faker->dateTimeBetween('2023-01-01', '2025-12-31')->format('Y-m-d H:i:s');

    $users[] = [
        'user_id' => $faker->uuid,
        'full_name' => $faker->name,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'created_at' => $created_at,
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Accounts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

    <div class="container my-5">
        <h2 class="text-center mb-4">Generated User Accounts</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>User ID (UUID)</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Username</th>
                        <th>Password (SHA-256 Encrypted)</th>
                        <th>Account Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['user_id']); ?></td>
                            <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['password']); ?></td>
                            <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
