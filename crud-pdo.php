<?php
//---------------------------------CONEXÃO--------------------------------//

    try {
        $pdo = new PDO("mysql:dbname=crudpdo2;host:localhost","root","");

    } catch ( PDOException $e) {

        echo "Erro com o banco de dados: ".$e-getMessage();

    } catch ( Exception $e ) {
        
        echo "Erro genérico: ".$e-getMessage();

    }
//---------------------------------INSERT-----------------------------------//
//preprare() = com passagem de parâmetros
// $res = $pdo->prepare("INSERT INTO pessoa(nome, telefone, email)
//     VALUES (:n, :t, :e)");

//bindValue() = aceita variaveis, funções
// $res->bindValue(":n","Roberta");
// $res->bindValue(":t","33333333");
// $res->bindValue(":e","roberta@hotmail.com");
// $res->execute();


//bindParam() = não aceita valores passados diretamente 
// $nome = "Miriam";
// $res->bindParam(":n",$nome);


//query() = sem a passagem de parâmetros
// $pdo->query("INSERT INTO pessoa(nome, telefone, email)
// VALUES ('Paulo', '2222222222', 'paulo@email.com')");


//---------------------------------DELETE E UPDATE------------------------//
// $cmd = $pdo->prepare("DELETE FROM pessoa WHERE id = :id");
// $id = 2;
// $cmd->bindValue(":id", $id );
// $cmd->execute();

//ou

// $res = $pdo->query("DELETE FROM pessoa WHERE id = '3'");




// $cmd = $pdo->prepare("UPDATE pessoa SET email = :e WHERE id = :id");
// $cmd->bindValue(":e","Miriam@gmail.com");
// $cmd->bindValue(":id","1");
// $cmd->execute();

//ou

//$res = $pdo->query("UPDATE pessoa SET email = 'Paulo2@hotmail.com' WHERE id = '4'");

//------------------------------------SELECT---------------------------------//

$cmd = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
$cmd->bindValue(":id", 4);
$cmd->execute();

// para o retorno de uma única uma linha(registro)
// $resultado = $cmd->fetch();
// PDO::FETCH_ASSOC - simplifica o retorno do banco de  dados
$resultado = $cmd->fetch(PDO::FETCH_ASSOC);

//ou

// para o retorno de mais de uam linha(registro)
// $cmd->fetchAll();

//
// echo "<pre>";
// print_r($resultado);
// echo "</pre>";

foreach ($resultado as $key => $value) {
    echo $key.":".$value."<br>";
}

?>