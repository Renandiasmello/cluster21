<?php

include_once 'EntradaTexto.php';

/**
 * Classe EntradaNumerica 
 */
class EntradaNumerica extends EntradaTexto
{
	private $entradaTexto;

	public function __construct()
	{
		$this->entradaTexto = new EntradaTexto();
	}

	/** 
	* @method Adicionar registro numérico no banco
	*/
	public function adicionar($numerico)
    {
        if(!is_numeric($numerico)){
            return false;
        }
        $sql = $this->entradaTexto->conn->prepare('INSERT INTO entradas_valores (descricao, is_text) VALUES (:numerico, :is_text);');
        $sql->bindValue(':numerico', $numerico, PDO::PARAM_INT);
        $sql->bindValue(':is_text', false, PDO::PARAM_BOOL);
        $sql->execute();
        return $this->entradaTexto->conn->lastInsertId();
    }

	/** 
	* @method Retornar valores com is_text FALSE, ou seja numéricos
	*/
    public function retornarValor()
    {
        $sql = $this->entradaTexto->conn->prepare("SELECT * FROM entradas_valores WHERE is_text is false");
        $sql->execute();

        $dados = [];

        while ($obj = $sql->fetch(PDO::FETCH_OBJ)) {
            $dados[] = $obj;
        }

        return $dados;
    }

    /** 
    * @method Deletar valor
    */
    public function deletarValor($id)
    {
        $sql = $this->entradaTexto->conn->prepare("DELETE FROM entradas_valores WHERE id=:id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        return $sql->execute();
    }

	
}