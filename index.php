<?php
include 'IPDO.php';

$IPDO = new IPDO('post');
$IPDO->insert('post',['title'=>'afshin','text'=>'neda']);
