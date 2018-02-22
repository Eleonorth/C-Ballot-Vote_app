<?php

include 'connexion.php';

function create($tablename,$fields,$data) {

    $fields_values= implode(',',$fields);
    $data_values=implode(',',$data);

    var_dump($fields_values);
    var_dump($data_values);


    $sql= 'INSERT INTO '.$tablename.' ('.$fields_values.') '.'VALUES'.'('.$data_values.')';
    $pdo = connectDb();
    $pdo->exec($sql);

}

function delete ($tablename,$field,$id){

    $sql= 'DELETE FROM '.$tablename.' WHERE '.$field.'='.$id;
    var_dump($sql);
    $pdo = connectDb();
    $pdo->exec($sql);

}

//$tablename = 'person';
//$fields = array('email','password','firstname','lastname');
//$data= array("'toto'","'eeee'","'eeee'","'eeee'");
//
//create($tablename,$fields,$data);

delete('person',"idperson",'11');