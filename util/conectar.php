<?php 

class Conectar{

    public static function getConexao(){
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec('SET NAMES "utf8"');

        return $conexao;
    }


}