<?php

require_once "Classes/Tarefa.php";
require_once "Classes/Banco.php";

$conexao = new Banco();
$tarefas = $conexao->listaTarefas();

?>
<!DOCTYPE html>
<html "pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Tarefas</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <h1>Tarefas andamento</h1>
    <table border=1>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Duração</th>
                <th>Criação</th>
                <th>Última atualização</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tarefas as $tarefa) { ?>
                <tr>
                    <td><?= $tarefa['titulo'] ?></td>
                    <td><?= $tarefa['tarefa'] ?></td>
                    <td><?= $tarefa['prazo'] ?></td>
                    <td><?= $tarefa['duracao'] ?></td>
                    <td><?= $tarefa['criacao'] ?></td>
                    <td><?= $tarefa['atualizacao'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>    
    <h4>Tarefas incompletas: <?= mysqli_num_rows($tarefas) ?>.</h4>
    <br>
    <a href="adicionarTarefa.php"><button>Adicionar tarefa</button></a>
</body>
</html>


