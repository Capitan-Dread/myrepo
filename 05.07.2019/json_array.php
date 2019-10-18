<?php
 
//Path o URL del file
$string = file_get_contents('test.txt', 'r');
 
//Decodifichiamo il json e lo associamo ad un array (True)
$json_o = json_decode($string, true);
 
//Per ogni elemento possiamo effettuare un' operazione
//In questo caso la mostro a video
foreach($json_o['checklist'] as $p)
{
  echo 'Nome: '.$p['elemento']['Nome'];
  echo 'Cognome: '.$p['elemento']['Cognome'];
}
 
?>
