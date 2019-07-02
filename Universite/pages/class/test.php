<?php
 require_once('Database.php');
 require_once('EtudiantService.php');
  $etusev = new EtudiantService();
 $r= $etusev->find('ETUDIANT','derv');
 var_dump($r);