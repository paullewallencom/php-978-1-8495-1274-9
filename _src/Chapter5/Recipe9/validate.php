<?php
$text = $_POST['comment'];
echo trim(strip_tags($text, '<b><u><i><strong>'));
?>
