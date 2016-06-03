<?php
	if (! isset($validated)) {
		header('Location: /../');
		die();
	}
	
	// I'll just leave this in here
  if(str_replace(' ', '', strtolower($_GET['q'])) == 'easteregg') {
    echo("<script> var eax = document.getElementsByTagName('body')[0]; function bgc() { eax.style.backgroundColor = '#'+(Math.random()*0xFFFFFF<<0).toString(16); window.requestAnimationFrame(bgc); } window.onload = function() { bgc(); } </script>");
  return;
  }
	
	if (isset($_GET['t'])) {
		$textbook = $_GET['t'];
	} else {
		$error = 0;
		return;
	}
	
	if (isset($_GET['s'])) {
		$section = $_GET['s'];
	} else {
		$error = 0;
		return;
	}
	
	if (isset($_GET['c'])) {
		$chapter = $_GET['c'];
	} else {
		$error = 0;
		return;
	}
	
	if ($textbook <= 0) {
		$error = 1;
		return;
	} else if ($textbook == 1) {
		$prefix = 'c782279.r79.cf2';
		$suffix = 'png';
	} else if ($textbook == 2) {
		$prefix = 'c811145.r45.cf2';
		$suffix = 'gif';
	} else {
		$error = 2;
		return;
	}
	if ($chapter < 0 || $chapter >= count($CHAPTERMAP[$textbook])) {
		$error = 4;
		return;
	}
	$chapter_id = $CHAPTERMAP[$textbook][$chapter];
	if (!is_numeric($chapter_id)) {
		$error = 4;
		return;
	}
	$images = array();
	try {
		$query = str_replace(' ', '', $query);
		$chunks = explode($QFORMAT[0], $query);
		for ($i = 0; $i < count($chunks); $i ++) {
			$range = explode($QFORMAT[1], $chunks[$i]);
			$inc = 2;
			$min = $range[0];
			$max = $min;
			if (count($range) > 1) {
				$max = $range[1];
			} else if (strpos($range[0], $QFORMAT[2]) !== FALSE && count($range) == 1) {
				$range = explode($QFORMAT[2], $chunks[$i]);
				$inc = 4;
				$min = $range[0];
				$max = $range[1];
			}
			if (!is_numeric($min) || !is_numeric($max)) {
				$error = 3;
				return;
			}
			for ($n = $min; $n <= $max; $n += $inc) {
				$images[] = 'http://' . $prefix . '.rackcdn.com/se' . str_pad($chapter_id, 2, '0', STR_PAD_LEFT) . $section . '01' . str_pad($n, 3, '0', STR_PAD_LEFT) . '.' . $suffix;
			}
		}
	} catch (Exception $e) {
		$error = 3;
		return;
	}
	
	if (count($images) <= 0) {
		$error = 3;
		return;
	}
	
//	echo('<h1>' . 'title' .  '</h1>');

	for ($i = 0; $i < count($images); $i ++) {
		echo('<img src="' . $images[$i] . '" /><br />');
	}
?>
