<?php
	$CHAPTERMAP = array();
	require_once('config.php');

	$error = -1;
	$validated = true;
	$page = 'a.php';
	
	// calc
	// http://c782279.r79.cf2.rackcdn.com/se00a01001.png
	// pre
	// http://c811145.r45.cf2.rackcdn.com/se08a01003.gif
	
	$prefix = null;
	$suffix = null;
	$chaper = null;
	$section = null;
	$query = null;
	
	if (isset($_GET['q']) && $_GET['q'] != '') {
		$query = $_GET['q'];
		$page = 'b.php';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>CalcChat Easy Mode</title>
		<link rel="stylesheet" type="text/css" href="main.min.css" />
	</head>
	<body>
		<?php
			include('./' . $page);
			if ($error >= 0) {
				echo('<div id="error">' . $ERRORMESSAGE[$error] . '</div><a href="?h=' . $error . '">Return</a> ');
			}
		?>
	</body>
</html>
<?php
// This die() statement prevents the sketchy (but free) webhost I use from loading its ads on the page
die();
?>
