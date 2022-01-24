<?php

class Tarefa
{
    private string $titulo;
    private string $tarefa;
    private array $etiquetas;
    private string $prazo;
    private string $duracao = '00:30';
    private string $criacao;
    private string $atualizacao;
    private bool $encerrado = false;

    public function __construct($titulo, $tarefa, $etiquetas, $prazo, $duracao)
    {
        $this->verificaTarefa($titulo, $tarefa);
        $this->etiquetas = $this->organizaEtiquetas($etiquetas);

        $this->titulo = $titulo;
        $this->tarefa = $tarefa;
        $this->prazo = $prazo;
        $this->duracao = $duracao;
        
        $this->criacao = $this->recuperaDataHora();
        $this->atualizacao = $this->recuperaDataHora();
    }

    public function recuperaTitulo(): string
    {
        return $this->titulo;
    }

    public function recuperaTarefa(): string
    {
        return $this->tarefa;
    }

    public function recuperaPrazo(): string
    {
        return $this->prazo;
    }

    public function recuperaDuracao(): string
    {
        return $this->duracao;
    }

    public function recuperaCriacao(): string
    {
        return $this->criacao;
    }

    public function recuperaAtualizacao(): string
    {
        return $this->atualizacao;
    }

    public function recuperaEncerrado(): string
    {
        return $this->encerrado;
    }
    
    private function verificaTarefa($titulo, $tarefa)
    {
        if(empty($titulo) && empty($tarefa)) {
            header('Location: ./adicionarTarefa.php');
            exit();
        }
    }

    private function recuperaDataHora(): string
    {
        date_default_timezone_set('America/Sao_Paulo');
        return date('Y/m/d h:i:s');
    }

    private function organizaEtiquetas($etiquetas): array
    {
        if(isset($etiquetas) && !empty($etiquetas)) {
            $etiquetas = explode(',',$etiquetas);
            foreach($etiquetas as $key => $etiqueta) {
                $etiquetas[$key] = trim($etiqueta);
            }
            return $etiquetas;
        } 
        return array();
    }
}
