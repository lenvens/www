<?php
require_once "doctrine.php";
//根据根据class创建表结构
$tool = new \Doctrine\ORM\Tools\SchemaTool($em);
$classes = array(
$em->getClassMetadata('wit\witclass\User_t'),
$em->getClassMetadata('wit\witclass\Task_t'),
// $em->getClassMetadata('Entities\Serveinfo'),
//$em->getClassMetadata('Entities\Userserveinfo'),
// $em->getClassMetadata('Entities\Addressinfo')
//$em->getClassMetadata('Entities\Evaluate')
);
print_r($classes);
$tool->dropSchema($classes);
$tool->createSchema($classes);


?>
