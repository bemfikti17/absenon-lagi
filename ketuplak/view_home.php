<?php
$sql = "SELECT kegiatan FROM koordinator  WHERE username =?";
$smd = $conn->prepare($sql);
$smd->bind_param("s",$_SESSION['user'] );
$smd->execute();
$smd->bind_result($arg);
while ($smd->fetch()) {
	$kegiatan=$arg;
	
	
}

$pisah = explode(":",$kegiatan);
foreach ($pisah as $perkeg) {
	echo '<div class="jumbotron">
  <h1 class="display-3">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>';
}

?>
