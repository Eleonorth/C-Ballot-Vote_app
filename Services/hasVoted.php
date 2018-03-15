<?php
include '../Utils/generics.php';
function createVote(){

    $idoption = $_POST['idoption'];
    $date = date('d/m/Y');
    $fields = array('idoption','voted');
    $data = array($idoption,$date);

    create('vote', $fields, $data);
    //INSERT INTO 'vote' (idoption, voted) VALUES (1 "Poulet BBQ", date)
}
createVote();


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