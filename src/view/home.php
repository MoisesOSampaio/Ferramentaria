
<h1>Home</h1>


<?php

use SOURCE\controller\ToolController;

$controller = new ToolController();
$list = $_SESSION['ToolList']->getList();
echo "<ul>";
foreach($list as $tool){
    echo "<li>" . $tool->getId() . "</li>";
    echo "<li>" . $tool->getNome() . "</li>";
    echo "<li>" . $tool->getQuantityStorage() . "</li>";
    echo "<li>" . $tool->getQuantityDamaged() . "</li>";
    echo "<li>" . $tool->getQuantityAvailable() . "</li>";
}

echo "</ul>";

//var_dump($_SESSION['ToolList']->getList());
?>