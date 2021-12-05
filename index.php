<?php
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';
} else {
	$uri = 'http://';
}

echo $uri .= $_SERVER['HTTP_HOST'];
//header('Location: '.$uri.'/wastemanagment/view/login.php');
header('Location: ' . $uri . '/wastemanagment/view/website/index.html');
exit;
