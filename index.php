<?php
require "autoload.php";
$tree = new Tree();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tree</title>
    <script src="js/jquery.js"></script>
    <script src="js/functions.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <meta name="Author" lang="en" content="Boretskiy Leonid" />
</head>
<body>

<div id="main-popup">
<div id="confirm-popup">
    <div id="popupTop"><span class="closePopup">X</span></div>
    <div id="popupCenter">Are you sure you want to delete this node?</div>
    <div id="popupBottom">
        <div id="timer">20 sec</div>
        <div id="inputPopup">
            <input type="button" id="delNode" value="Yes">
            <input type="button" class="closePopup" value="Close">
        </div>
    </div>
</div>
</div>

<input type="button" id="create-button" onclick='createRoot()' value="Create root">
<div id="result-output"><?php $tree->outputTree($output->cats, 0); ?></div>

</body>
</html>