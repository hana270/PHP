<?php
abstract class Connexion {
protected $pdo;

function __construct()
{
$this->pdo =new PDO('mysql:host=localhost;dbname=sitephp','root','');
}
function __destruct()
{
$this->pdo=null;
}
public function getPDO()
    {
        return $this->pdo;
    }


}
?>