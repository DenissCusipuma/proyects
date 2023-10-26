<?php
	include "conex_bd.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>HTML CSS JS</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<section class="intro">
  <div class="container">
    <form action="buscar_fotos.php" method="get" class="buscar">
				<input type="text" name="busca" id="busca" placeholder="Buscar...">	
				<button type="submit">Buscar</button>
		</form>
    <h1>IE SAN RAMON &darr;</h1>
  </div>
</section>

<section class="timeline">
  <ul>
    <?php
			$queryFecha = mysqli_query($conex,"SELECT * FROM images GROUP BY fecha HAVING COUNT( * ) >=1");
			$resultFecha = mysqli_num_rows($queryFecha);
      
			if($resultFecha > 0){
				while ($dataFecha = mysqli_fetch_array($queryFecha)) {
    ?>
    <li>
      <div>
        <time><a href="#"><?php echo $dataFecha["fecha"]; ?> </a></time> 
        <?php $imagenFecha=ucwords(strtolower($dataFecha["fecha"]))?>

        <?php
          $queryImg = mysqli_query($conex,"SELECT * FROM images WHERE fecha='$imagenFecha'");
          $resultImg = mysqli_num_rows($queryImg);
          if($resultImg > 0){
            while ($dataImg = mysqli_fetch_array($queryImg)) {
        ?>
          <img type="file" class="img-Vent" src="data:data:image/jpg:base64;base64,<?php echo  base64_encode($dataImg['image']); ?>">
        <?php 
				    }
			    }
		    ?>  
      </div>
    </li>
    <?php 
				}
			}
		?>
  </ul>
</section>

  <script src="script/script.js"></script>
</body>
</html>