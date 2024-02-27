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


    $filter_parking = isset($_GET['check-parking']) ? true : false;
    $filter_vote = $_GET['filter-vote'] ?? false;

    if($filter_parking)
        $hotels = array_filter($hotels, fn($hotel) => $hotel['parking']);

    if($filter_vote)
        $hotels = array_filter($hotels, fn($hotel) => $hotel['vote'] >= $filter_vote);
?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Hotel</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>



    <h1 class="container text-center my-5">PHP Hotels</h1>

    <div class="card mt-5 container mb-3">
        <div class="card-body">
            <form method="GET">

                <div class="form-check">
                    <input 
                    class="form-check-input" 
                    type="checkbox" 
                    id="check-parking" 
                    name="check-parking"
                    <?= $filter_parking ? 'checked' : '' ?>>
                    
                    <label class="form-check-label mb-3" for="check-parking">
                        Con parcheggio
                    </label>
                </div>

                <div class="mb-3">
                    <label for="filter-vote" class="form-label">Voto:</label>
                    <input type="number" value="<?= $filter_vote ?>" class="form-control" id="filter-vote" name="filter-vote" min="1" max="5">
                </div>

                <button class="btn btn-success">Filtra</button>

            </form>
        </div>
    </div>


    <!-- Tabella Hotel -->
    <div class="card container p-3">
        <table class="table table-hover m-0">
            <thead class="text-center">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($hotels as $hotel): ?>
                <tr>
                    <td>
                        <?= $hotel['name'] ?>
                    </td>
                    <td>
                        <?= $hotel['description'] ?>
                    </td>
                    <td>
                        <?= $hotel['parking'] ? 'Si' : 'No' ?>
                    </td>
                    <td>
                        <?= $hotel['vote'] ?>
                    </td>
                    <td>
                        <?= $hotel['distance_to_center'] ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>