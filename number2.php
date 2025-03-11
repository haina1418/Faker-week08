<?php
// Include Composer's autoloader
require_once 'vendor/autoload.php';

// Create Faker instance
$faker = Faker\Factory::create();

// Predefined Genres
$genres = ['Fiction', 'Mystery', 'Science Fiction', 'Fantasy', 'Romance', 'Thriller', 'Historical', 'Horror'];

// Generate 15 fake books
$books = [];
for ($i = 0; $i < 15; $i++) {
    $books[] = [
        'title' => $faker->sentence(3),
        'author' => $faker->name(),
        'genre' => $genres[array_rand($genres)],
        'publication_year' => $faker->numberBetween(1900, 2024),
        'isbn' => $faker->isbn13(),
        'summary' => $faker->paragraph(3),
    ];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Books List</title>
    <!-- Bootstrap 4 CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3X8p+Knujsl5/1hbY6Zz2XcxCQ0d9GpxtpZuZl9h8FfwaXyH2n4" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Fake Books List</h2>

    <!-- Books Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Genre</th>
                <th scope="col">Publication Year</th>
                <th scope="col">ISBN</th>
                <th scope="col">Summary</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $index => $book): ?>
            <tr>
                <th scope="row"><?= $index + 1 ?></th>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['author']) ?></td>
                <td><?= htmlspecialchars($book['genre']) ?></td>
                <td><?= htmlspecialchars($book['publication_year']) ?></td>
                <td><?= htmlspecialchars($book['isbn']) ?></td>
                <td><?= htmlspecialchars($book['summary']) ?></td>
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
