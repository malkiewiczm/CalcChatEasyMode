<?php
	if (! isset($validated)) {
		header('Location: /../');
		die();
	}

	$help = -1;
	if (isset($_GET['h']) && is_numeric($_GET['h']) && $_GET['h'] >= 0 && $_GET['h'] < 100) {
		$help = $_GET['h'];
	}
?>

<form method="get" action="?">
	<div class="fullcenter">
		<div id="help"></div>
		<div>Select textbook:</div>
		<br />
		<a onclick="textBookClick(1, this)" href="#"><img class="textbook" alt="calc ab" src="http://i.imgur.com/UC2UgPk.png" /></a>
		<a onclick="textBookClick(2, this)" href="#"><img class="textbook" alt="precalc" src="http://i.imgur.com/WeXo9zI.png" /></a>
		<input type="hidden" id="textbookfield" name="t" value="-1" />
		<br />
		<span id="textbookselection"></span>
		<br />
		<br />
		Chapter number:
		<select name="c">
			<?php
				for ($i = 0; $i <= 16; $i ++) {
					echo('<option value="' . $i . '">' . $i . '</option>');
				}
			?>
		</select>
		<br />
		<br />
		Section number:
		<select name="s">
			<?php
				for ($i = 1; $i <= 20; $i ++) {
					echo('<option value="' . chr($i + 96) . '">' . $i . '</option>');
				}
			?>
		</select>
		<br />
		<br />
		<div>Type your question numbers: (&nbsp;<span style="font-size:16pt;"><a href="#" onclick="showHelp(3);">?</a></span>&nbsp;)</div>
		<br />
		<input id="qqq" type="text" value="" name="q" />
		<div id="version">Version <?php echo($VERSION); ?><br /><a target="_blank" href="https://github.com/malkiewiczm/CalcChatEasyMode">Source Code</a><?php /*<br /><a style="color:inherit;" onclick="showChangelog()" href="#">Changelog</a>*/ ?></div>
	</div>
</form>
<script>
	var helpmsg = <?php echo(json_encode($HELPMESSAGE)); ?>;
	function textBookClick(n, obj) {
		document.getElementById('textbookselection').innerHTML = 'Textbook : ' + obj.childNodes[0].getAttribute('alt');
		document.getElementById('textbookfield').value = n;
	}
	function showHelp(n) {
		if (n > -1 && n < helpmsg.length) {
			showInfoBox('Help', helpmsg[n]);
		}
	}
	function showChangelog() {
		showInfoBox('Changelog', '<table><?php
echo('Disabled');
/*
			for ($i = 0; $i < count($CHANGELOG); $i ++) {
				echo('<tr><td>v1.' . str_pad($i + 1, 2, '0', STR_PAD_LEFT) . '</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>' . $CHANGELOG[$i] . '</td></tr>');
			}

*/
		?></table>');
	}
	function showInfoBox(ti, msg) {
		document.getElementById('help').style.height = '250px';
		document.getElementById('help').style.padding = '15px';
		document.getElementById('help').innerHTML = '<h3>' + ti + '</h3><br />' + msg + '<br /><br /><div class="button" onclick="hideInfoBox()">Close</div>';
	}
	
	function hideInfoBox() {
		document.getElementById('help').style.height = '0px';
		document.getElementById('help').style.padding = '0px';
	}

	window.onload = function() {
		showHelp(<?php echo($help); ?>);
		document.getElementById('qqq').value = '';
		document.getElementById('textbookfield').value = -1;
		window.onkeydown = function() {
			document.getElementById('qqq').focus();
		};
	};
</script>
