<?php
$pdo = new PDO('mysql:host=sql308.epizy.com;port=3306;dbname=epiz_26614913_hindicell', 'epiz_26614913','A3VXD6TEuHZcrP');
$stmt = $pdo->query('SELECT * FROM eventreg');
echo '<table border="1" style="font-size:20px;">'."\n";
echo "<tr><th>"."Serial No."."</th><th>"."Name"."</th><th>"."Admission No."."</th><th>"."Mobile No."."</th><th>"."Email ID"."</th><th>"."Event"."</th></tr>"."\n";
$x=1;
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
echo "<tr><td>".$x."</td><td>".htmlentities($row['fname'])."</td><td>".$row['adnmb']."</td><td>".$row['phone']."</td><td>".$row['email']."</td><td>".$row['eventn']."</td></tr>"."\n";
$x=$x+1;
}
echo "Total participants:".($x-1)."\n";
echo "</table>\n";
?>

<br>  <br>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<button class="button" onclick="window.print()">Print</button>

</body>
</html>