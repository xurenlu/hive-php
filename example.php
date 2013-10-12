<?php
include "./lib.php";
echo ini_get("default_socket_timeout")."\n";
define('HOST','localhost');//192.168.1.49');
define('PORT','10000');
use Thrift\Transport;
$transport = new \Thrift\Transport\TSocket(HOST, PORT);
$transport->setSendTimeout(10000);  
$transport->setRecvTimeout(100000);  

$protocol = new Thrift\Protocol\TBinaryProtocol($transport);
$client = new ThriftHiveClient($protocol);
//Create ThriftHive object

$transport->open();

$client->execute('add jar /home/renlu/hive/lib/hive-contrib-0.10.0.jar');
$client->execute('show databases');

$db_array = $client->fetchAll();

$i = 0;
while('' != @$db_array[$i]) {
                echo $db_array[$i];
                $i++;
}
$client->execute("select * from tb_user");
$db_array = $client->fetchAll();
foreach($db_array as $array){
    print_r($array);
}
$transport->close();

