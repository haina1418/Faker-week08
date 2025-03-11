<?php

function generateDOB() {
    $start = strtotime('1970-01-01');
    $end = strtotime('2000-01-01');
    $timestamp = mt_rand($start, $end);
    return date('Y-m-d', $timestamp);
}


function generatePhoneNumber() {
    $prefix = '+63-9';
    $random = rand(100, 999);
    $second_part = rand(100, 999);
    $third_part = rand(1000, 9999);
    return $prefix . $random . ' ' . $second_part . ' ' . $third_part;
}


$firstNames = ['Juan', 'Maria', 'Jose', 'Ana', 'Pedro', 'Carla', 'Rafael', 'Liza', 'Carlos', 'Jasmine'];
$lastNames = ['Santos', 'Dela Cruz', 'Garcia', 'Reyes', 'Lopez', 'Bautista', 'Mendoza', 'Fernandez', 'Gonzales', 'Ramirez'];


$jobTitles = ['Teacher', 'Engineer', 'Nurse', 'Manager', 'Accountant', 'Doctor', 'Sales Associate', 'Customer Service Representative', 'Software Developer', 'Architect'];


$provinces = ['Cebu', 'Palawan', 'Batangas', 'Laguna', 'Pangasinan', 'Quezon', 'Rizal', 'Bulacan', 'Makati', 'Taguig'];
$cities = ['Cebu City', 'Puerto Princes City', 'Quezon City', 'Makati City', 'Manila', 'Pasig City', 'Taguig City', 'Muntinlupa City', 'Antipolo', 'Caloocan'];


function generateAddress() {
    global $provinces, $cities;
    $streetNames = ['Avenue', 'Street', 'Road', 'Drive'];
    $randomStreet = rand(1, 200) . ' ' . $streetNames[array_rand($streetNames)];
    $randomProvince = $provinces[array_rand($provinces)];
    $randomCity = $cities[array_rand($cities)];
    return $randomStreet . ', ' . $randomCity . ', ' . $randomProvince;
}

function generateUserProfile() {
    global $firstNames, $lastNames, $jobTitles;

    $fullName = $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
    $email = strtolower(str_replace(' ', '', $fullName)) . '@gmail.com';
    $phoneNumber = generatePhoneNumber();
    $address = generateAddress();
    $birthdate = generateDOB();
    $jobTitle = $jobTitles[array_rand($jobTitles)];

    return [
        'fullName' => $fullName,
        'email' => $email,
        'phoneNumber' => $phoneNumber,
        'address' => $address,
        'birthdate' => $birthdate,
        'jobTitle' => $jobTitle
    ];
}

$userProfiles = [];
for ($i = 0; $i < 5; $i++) {
    $userProfiles[] = generateUserProfile();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Profiles</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Fake User Profiles (Philippines)</h1>
    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Birthdate</th>
                <th>Job Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userProfiles as $profile): ?>
                <tr>
                    <td><?php echo $profile['fullName']; ?></td>
                    <td><?php echo $profile['email']; ?></td>
                    <td><?php echo $profile['phoneNumber']; ?></td>
                    <td><?php echo $profile['address']; ?></td>
                    <td><?php echo $profile['birthdate']; ?></td>
                    <td><?php echo $profile['jobTitle']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>