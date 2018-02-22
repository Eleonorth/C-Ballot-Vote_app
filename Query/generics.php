<?php

include 'connexion.php';

function create($tablename,$fields,$data) {

    $fields_values= implode(',',$fields);
    $data_values=implode(',',$data);


    $sql= 'INSERT INTO '.$tablename.' ('.$fields_values.') '.'VALUES'.'('.$data_values.')';
    var_dump($sql);
    $pdo = connectDb();
    $pdo->exec($sql);

}

function delete ($tablename,$field,$id){

    $sql= 'DELETE FROM '.$tablename.' WHERE '.$field.'='.$id;
    var_dump($sql);
    $pdo = connectDb();
    $pdo->exec($sql);

}


function edit($tablename,$field,$data,$wherefield, $id) {


    $sql= 'UPDATE '.$tablename.' SET ';
    for ($i=0;$i <count($field)-1; $i++) {

        $sql .= $field[$i].' = '."'".$data[$i]."',";

    }
        $sql .= $field[$i].' = '."'".$data[$i]."'";

    $sql .= ' WHERE '.$wherefield.' = '.$id;

    var_dump($sql);
    
    $pdo= connectDb();
    $pdo->exec($sql);

}
//
//$tablename= 'person';
//$field=array('email',);
//$data=array('bouh');
//$wherefield='idperson';
//$id=2;
//edit($tablename,$field,$data,$wherefield,$id);


$tablename = 'organization';
$fields = array('idperson','name');
$data= array("2","'IMIE'");

create($tablename,$fields,$data);
////
//delete('person',"idperson",'1');

//$tablename = 'person';
//$field = array("firstname","lastname");
//$newvalue = array("Erwan","Marsac");
//$wherefield= "idperson";
//$id = '1';
//
//edit($tablename,$field,$newvalue,$wherefield,$id);



