<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create();

$genres = ['Fiction', 'Mystery', 'Sci-Fi', 'Fantasy', 'Romance', 'Thriller', 'Historical', 'Horror'];

$books = [];
for ($i = 0; $i < 15; $i++) {
    $books[] = [
        'title' => ucfirst(implode(' ', $faker->words(rand(2, 5)))),
        'author' => $faker->name,
        'genre' => $faker->randomElement($genres),
        'year' => $faker->numberBetween(1900, 2024),
        'isbn' => $faker->isbn13,
        'summary' => $faker->paragraph,
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Book List</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

    <div class="container my-5">
        <h2 class="text-center mb-4">Generated Book List</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>ISBN</th>
                        <th>Summary</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($book['title']); ?></td>
                            <td><?php echo htmlspecialchars($book['author']); ?></td>
                            <td><?php echo htmlspecialchars($book['genre']); ?></td>
                            <td><?php echo $book['year']; ?></td>
                            <td><?php echo $book['isbn']; ?></td>
                            <td><?php echo htmlspecialchars($book['summary']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
