<?php

//Créer une campagne

function createCampaign(&$conn,$nameCamp,$startdate,$enddate,$nboptions) {
    $conn->exec("INSERT INTO `campaign` (`idcampaign`, `idorganization`, `name`, `startdate`, `enddate`, `numberoptions`) VALUES (NULL,(SELECT idorganization FROM organization WHERE name = $nameOrg ),'$nameCamp','$startDate','$endDate','$nbOptions');");
    echo "Campaign created";
}

//Visualiser les campagnes (terminées, en cours, à venir)

function selectCampaign(&$conn){
    $conn->query("SELECT name FROM campaign");
    $list=[];
    while($row = $conn->fetch()){
        $list[]=$row;
    }
    echo "All campaigns selected";
}

//Arrêter une campagne en cours : modifier la date de fin de la campagne

function stopCampaign(&$conn,$newEndDate,$endDate){
    $conn->exec("UPDATE campaign SET enddate = $newEndDate WHERE enddate = $endDate");
    echo "Campaign end date updated";
}

//Visualiser les résultats d'une campagne



