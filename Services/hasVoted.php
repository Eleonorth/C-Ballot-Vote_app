<?php
include '../Utils/generics.php';

function createVote($value){

    $date = date('Y/m/d');
    $fields = array('idoption','voted');
    $data = array($value,$date);

    create('vote', $fields, $data);
}

function recupValeur(){
    foreach($_POST['name'] as $value){
        createVote($value);
        header('Location:../Vues/profile.php');
    }
}
recupValeur();


function editHasVoted(){

    $array[] = explode('?',$_SERVER["REQUEST_URI"]);
    $codeurl = $array[0][1];

    $field = array('hasvoted');
    $data = 1;
    $wherefield = 'code';
    $id = $codeurl;

    edit('invitation', $field, $data, $wherefield, $id);

}

function deleteEmail(){

    $field = 'hasvoted';
    $id = 1;

    delete ('invitation',$field,$id);

}