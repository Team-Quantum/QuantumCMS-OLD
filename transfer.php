<?php

$i = 0;

$con = new MySQLi('localhost', 'admin', 'pollux', 'player', 3306);
$q = 'SELECT id, empire FROM player.player_index;';
$fetch = $con->query($q);
while($res = $fetch->fetch_object()){
    $i++;
    $u = "UPDATE account.account SET empire='".$res->empire."' WHERE id='".$res->id."';";
    echo $u.'<br/>';
    $update = $con->query($u);

    if($i == 1000000000000){
        die('FEDDIG!');
    }
}
$con->close();