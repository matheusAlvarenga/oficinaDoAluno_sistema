<?php

    class db {

        //host
        private $host = 'www.oficinadoaluno.com.br:3306';

        //usuario
        private $usuario = 'ofici820_sistema';

        //senha
        private $senha = 'oficina';

        //banco de dados
        private $database = 'ofici820_sisOda';

        public function conecta_mysql(){

            //criar conexao
            $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

            //ajustar o charset de comunicação entre a aplicação e o banco de dados
            mysqli_set_charset($con, 'utf8');

            //verificar se houve erro de conexão
            if(mysqli_connect_errno()){
                echo 'Erro ao tentar se conectar com BD MySQL: ' . mysqli_connect_error();
            }

            return $con;

        }

    }

?>