<?php
	$hasil_screenshot_gambar = '';

	if(isset($_POST["screenshot"]))
	{
		$url = $_POST["url"];
		$json_data = file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$url&screenshot=true");
		$hasil_screenshot_result = json_decode($json_data, true);
		$hasil_screenshot = $hasil_screenshot_result['screenshot']['data'];
		$hasil_screenshot = str_replace(array('_','-'), array('/', '+'), $hasil_screenshot);
		$hasil_screenshot_gambar = "<img src=\"data:image/jpeg;base64,".$hasil_screenshot."\" class='img-responsive img-thumbnail'/>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
	<title>Dewan Website Screenshot</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-dark bg-danger fixed-top">
	  <a class="navbar-brand" href="index.php" style="color: #fff;">
	    Dewan Komputer
	  </a>
	</nav>

	<div class="container mb-5">
		<div class="container box">
			<h2 align="center" style="margin: 60px 10px 10px 10px;">Cara Membuat Screenshot Website dengan PHP</h2><hr>
		   	<form method="post">
				<div class="form-group">
					<label>Masukkan URL</label>
					<input type="url" name="url" class="form-control input-lg" required autocomplete="off" />
					<small>contoh : https://dewankomputer.com/</small>
				</div>

				<input type="submit" name="screenshot" value="Ambil Screenshot" class="btn btn-primary"/>
		   	</form>
		   	<hr>
   			<?php echo $hasil_screenshot_gambar; ?>
		</div>
	</div>

	<div class="navbar bg-dark fixed-bottom">
		<div style="color: #fff;">© <?php echo date('Y'); ?> Copyright:
		    <a href="https://dewankomputer.com/"> Dewan Komputer</a>
		</div>
	</div>
</body>
</html>