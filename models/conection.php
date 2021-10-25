<?php
class Conexion{
   static public function Conectar()
   {
       $link = new PDO(
           "mysql:host = localhost;dbname=crud-base","root",""
       );
       $link->exec('set name utf-8');
       return $link;
   }
}