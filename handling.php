<?php

require "autoload.php";

use controllers\TreeController;
$treeController = new TreeController();

$input = $_POST['createButton'].$_POST['addNode'].$_POST['delNode'];

switch($input) {
    case $_POST['createButton']:
        $treeController->actionCreate();
    break;
    case $_POST['addNode']:
        $treeController->actionAdd($_POST['addNode']);
    break;
    case $_POST['delNode']:        
        $treeController->actionDel($treeController->node->cats, $_POST['delNode']);
    break;
}
?>