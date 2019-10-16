<?php

/**
 * Classe AgrouparPorDonos 
 */
class ClassAgrouparPorDonos
{
	private $agroupar;

	public function __construct(Array $agroupar)
	{
		$this->agroupar = $agroupar;
	}

	/** 
	* @method Agroupar por Donos, invertendo os indices e pegando os valores pertencentes a ele
	* @return Array()
	*/
	public function agrouparPorDonos()
	{
	    ## Inverte as chaves com seus valores no array
		$data_flip = array_flip($this->agroupar);

		## Varro os itens implodindo por ',' nas novas chaves agora invertidas
		foreach($data_flip as $key => $v) {
			$data_flip[$key] = implode(", ", array_keys($this->agroupar, $key));
		}

	    return $data_flip;
    }
}