<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH'); 
function generatePhoneNumber($faker) {
    return '+63 9' . $faker->randomNumber(2, true) . ' ' . $faker->randomNumber(3, true) . ' ' . $faker->randomNumber(4, true);
}

$users = [];
for ($i = 0; $i < 5; $i++) {
    $users[] = [
        'name' => $faker->name, #AYAW NIYA MAG GENERATE NG FILIPINO NAME REGARDLESS OF THE LOCALIZATION PERIMETER
        'email' => $faker->email,
        'phone' => generatePhoneNumber($faker), #AYAW NIYA MAG GENERATE NG FILIPINO NUMBER KAYA I HAD TO MAKE A FUNCTION FOR IT NA PARA SA PH FORMAT 
        'address' => $faker->city . ', ' . $faker->province,
        'birthdate' => $faker->date('Y-m-d'),
        'job' => $faker->jobTitle
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Profiles - Philippines</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="contaAiner py-4">

<h2 class="text-center mb-4">Fake User Profiles (Philippines)</h2>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Complete Address</th>
                <th>Birthdate</th>
                <th>Job Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['phone']) ?></td>
                    <td><?= htmlspecialchars($user['address']) ?></td>
                    <td><?= htmlspecialchars($user['birthdate']) ?></td>
                    <td><?= htmlspecialchars($user['job']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
