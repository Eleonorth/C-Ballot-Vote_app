<?php
include '../Utils/generics.php';

function createVote(){

    $idoption = $_POST['id'];
    $date = 2;
    $fields =array('idoption','voted');
    $data=array($idoption,$date);

    create('vote', $fields, $data);
    //INSERT INTO 'vote' (idoption, voted) VALUES (3 "Reine", date)
}