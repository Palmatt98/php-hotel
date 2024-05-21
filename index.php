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
$filteredHotels = [];
if ($_GET["parking"] == "yes") {
	$filteredHotels = array_filter($hotels, function($hotel){
		return $hotel["parking"] == true;
	});
} else {
	$filteredHotels = $hotels;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<h1>Hotel List</h1>

		<!-- Form di filtraggio -->
		<!-- se l'action é vuoto, viene ricaricato lo stesso file -->
		<form method="GET" action="">
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" id="parking" name="parking" value="yes" <?php if (isset($_GET['parking']) && $_GET['parking'] == 'yes') echo 'checked'; ?>>
				<label class="form-check-label" for="parking">Mostra solo hotel con parcheggio</label>
			</div>
			<button type="submit" class="btn btn-primary">Filtra</button>
		</form>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Descrizione</th>
					<th scope="col">Parcheggio</th>
					<th scope="col">Voto</th>
					<th scope="col">Distanza dal Centro</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($filteredHotels as $hotel) { ?>

					<tr>

						<td><?php echo $hotel['name']; ?></td>
						<td><?php echo $hotel['description']; ?></td>
						<td><?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></td>
						<td> <?php echo $hotel['vote']; ?></td>
						<td><?php echo $hotel['distance_to_center']; ?> km</td>

					</tr>

				<?php } ?>
			</tbody>

	</div>


</body>

</html>