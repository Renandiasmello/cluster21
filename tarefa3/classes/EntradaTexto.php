<?php

require_once 'Conexao.php';

/**
 * Classe EntradaTexto 
 */
class EntradaTexto
{
	protected $conn;

	public function __construct()
	{
		$conn = new Conexao();
        $this->conn = $conn->conectar();
	}

	/** 
	* @method Adicionar registro varchar no banco
	*/
	public function adicionar($texto)
    {
        $sql = $this->conn->prepare('INSERT INTO entradas_valores (descricao) VALUES (:texto);');
        $sql->bindValue(':texto', $texto, PDO::PARAM_STR);
        $sql->execute();
        return $this->conn->lastInsertId();
    }

	/** 
	* @method Retornar valores com is_text TRUE, ou seja texto varchar
	*/
    public function retornarValor()
    {
        $sql = $this->conn->prepare("SELECT * FROM entradas_valores WHERE is_text is true");
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
        $sql = $this->conn->prepare("DELETE FROM entradas_valores WHERE id=:id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        return $sql->execute();
    }
}