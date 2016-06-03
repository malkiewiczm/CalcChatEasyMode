<?php
	$CHANGELOG = array('individual question numbers can now be typed without range', 'every other odd ranges available', 'help interface implemented', 'various fixes');
	$VERSION = '1.' . str_pad(count($CHANGELOG), 2, '0', STR_PAD_LEFT);
	$QFORMAT = array(',', '-', '~');
	$CHAPTERMAP[1] = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
	$CHAPTERMAP[2] = array(null,8,9,4,10,11,12,13,6,14,15,16);
	$ERRORMESSAGE = array('Missing parameters', 'No textbook selected', 'Invalid textbook', 'Question numbers were typed in incorrectly', 'Chapter does not exist in textbook.');
	$HELPMESSAGE = array('The entire form must be filled out.', 'Select a textbook by clicking the picture or link that corresponds to your textbook. If CalcChat is normally blocked for you, the textbook cover will be replaced by a plain text link.', 'The textbook was out of the allowed range. Use the pictures / links below to select a textbook.', 'Question numbers should be typed using commas to separate question numbers and hyphens to indicate a range of odd numbered problems. Even number solutions are not supported by CalcChat, so there is no way to retrieve them. Using a tilde (~) will allow you to specify a range of "every other odd" problems.<br /><span style="font-weight:bold">Example:</span>&nbsp;1-11, 17, 25~41<br />This would show the problems 1 through 11 odd, 17, and 25 through 41 every other odd.', 'Use the drop down to select a chapter. The chapter must exist in your book in order to get solutions.');
?>
