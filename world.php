<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country'] ?? '';
$lookup = $_GET['lookup'] ?? '';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if ($lookup === 'cities') {
	$sql = 
		"SELECT c.name AS city, c.district, c.population
		FROM cities c
		JOIN countries co ON c.country_code = co.code
		WHERE co.name LIKE'%$country%'";


	$stmt = $conn->query($sql);
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	?>

	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>District</th>
				<th>Population</th>
			</tr>
		</thead>	
		<tbody>
			<?php foreach ($results as $row): ?>
				<tr>
					<td><?= $row['city']; ?></td>
					<td><?= $row['district']; ?></td>
					<td><?= $row['population']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php
} else {

	$sql = "SELECT * FROM countries WHERE name LIKE '%$country%'";
	$stmt = $conn->query($sql);
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	?>
	
	<table>

		<thead>
			<tr>
				<th>Country</th>
				<th>Continent</th>
				<th>Independence Year</th>
				<th>Head of State</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($results as $row): ?>
				<tr>
					<td><?= $row['name']; ?></td>
					<td><?= $row['continent']; ?></td>
					<td><?= $row['independence_year']; ?></td>
					<td><?= $row['head_of_state']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php
}
?>