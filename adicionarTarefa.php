<?php

require_once "Classes/Tarefa.php";
require_once "Classes/Banco.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $tarefa = new Tarefa($_POST['titulo'],$_POST['tarefa'],$_POST['etiqueta'],$_POST['prazo'],$_POST['duracao']);
    $conexao = new Banco();
    $inclusao = $conexao->insereTarefa($tarefa);
    if($inclusao != 1) {
        header('Location: ./adicionarTarefa.php');
        die();
    }
    header('Location: ./');
}

?>
<!DOCTYPE html>
<html "pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Cria tarefa</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div id="area">
        <form method="post" id="formulario" autocomplete="off">
            <fieldset>
                <legend>Nova tarefa</legend>
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" />
                <label for="etiqueta">Etiquetas:</label>
                <input type"text" name="etiqueta" id="etiqueta" title="Divida suas etiquetas com vírgula"/>
                <label for="tarefa">Tarefa:</label>
                <textarea name="tarefa" id="tarefa" placeholder="Escreva sua tarefa aqui..."></textarea>
                <label for="prazo">Prazo final:</label>
                <input name="prazo" id="prazo" type="datetime-local" />
                <label for="duracao">Duração:</label>
                <input name="duracao" id="duracao" type="time" value="00:30" />
                <input class="btn_submit" type="submit" value="Criar tarefa" />
            </fieldset>
        </form>
    </div>
    <br>
    <a href="./"><button>Voltar</button></a>
</body>
</html>
