<?php
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

$parking = isset($_GET['parking']);
$min_rating = $_GET['rating'] ?? '';

$arr_filtered = $hotels;

if($parking) {
    $arr_filtered_temp = [];

    foreach ($arr_filtered as $hotel) {
        if ($hotel['parking']) {
            $arr_filtered_temp[] = $hotel;
        }
    }
    $arr_filtered = $arr_filtered_temp;
}

if($min_rating) {
    $arr_filtered_temp = [];

    foreach ($arr_filtered as $hotel) {
        if ($hotel['vote'] >= $min_rating) {
            $arr_filtered_temp[] = $hotel;
        }
    }

    $arr_filtered = $arr_filtered_temp;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="get">
        <div>
            <input class="form-check-input" type="checkbox" id="parking" name="parking" <?= $parking ? 'checked' : '' ?>>
            <label class="form-check-label" for="parking">
            Solo con parcheggio
            </label>
            <button class="btn btn-primary" type="submit">Cerca</button>
            <button class="btn btn-secondary" type="reset">Annulla</button>
		</div>
        <div class="mb-3 d-flex">
            <label for="rating" class="form-label"> Voto Minimo</label>
            <input type="number" class="form-control" id="rating" name="rating" value="<?= $min_rating ?>">
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Stelle</th>
                <th scope="col">Distanza dal centro</th>
            </tr>
        </thead>
        <tbody><?php 
            foreach ($arr_filtered as $hotel) { ?>
            <tr>
                <th><?= $hotel['name'] ?></th>
                <td><?= $hotel['description'] ?></td>
                <td><?= $hotel['parking'] ? 'Sì' : 'No' ?></td>
                <td><?= $hotel['vote'] ?></td>
                <td><?= $hotel['distance_to_center'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>