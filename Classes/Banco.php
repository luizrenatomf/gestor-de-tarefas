<?php 

require_once "Classes/Tarefa.php";

class Banco
{
    private string $user = "root";
    private string $password = "";
    private string $database = "tarefas";
    private string $hostname = "127.0.0.1";

    private function conectaNoBanco()
    {
        $conexao = mysqli_connect(
                    $this->hostname, $this->user,
                    $this->password, $this->database
        );
        if($conexao == false) {
            echo "Erro ao realizar conexão com o Banco de Dados.";
            exit();
        }
        return $conexao;
    }

    public function insereTarefa(Tarefa $tarefa)
    {
        $titulo = $tarefa->recuperaTitulo();
        $corpo = $tarefa->recuperaTarefa();
        $prazo = $tarefa->recuperaPrazo();
        $duracao = $tarefa->recuperaDuracao();
        $criacao = $tarefa->recuperaCriacao();
        $atualizacao = $tarefa->recuperaAtualizacao();
        $encerrado = $tarefa->recuperaEncerrado();

        $sql = "INSERT INTO tarefa (titulo, tarefa, prazo, duracao, criacao, atualizacao, encerrado)" .
               "VALUES ('$titulo', '$corpo', '$prazo', '$duracao', '$criacao', '$atualizacao', '$encerrado')";
        $resultado = mysqli_query($this->conectaNoBanco(),$sql);
        return $resultado;
    }

    public function listaTarefas()
    {
       $sql = "SELECT * FROM tarefa";
       return mysqli_query($this->conectaNoBanco(),$sql);
    }
}
