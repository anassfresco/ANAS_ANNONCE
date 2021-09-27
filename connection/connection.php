<?php
session_start();
$host="localhost";
$dbname="project";
$user="root";
$password="";




$conn=new PDO("mysql:host=$host;dbname=$dbname","$user","$password");
?>