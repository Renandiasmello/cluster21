<?php

/**
 * Classe Palindromo 
 */
class ClassPalindromo
{
	private $palindromo;

	public function __construct($palindromo)
	{
		$this->palindromo = $palindromo;
	}

	/** 
	* @method de verificação de strings/numeros palindromos 
	* @return boolean
	*/
	public function ehPalindromo() 
	{

	    ## Retira espaços em brancos
	    $field = str_replace(' ', '', $this->palindromo);

	    ## Retira carácteres especiais
	    $field = preg_replace('/[^A-Za-z0-9\-]/', '', $field);

	    ## Coloca os dados do field em lowercase
	    $field = strtolower($field);

	    ## Reverse no palindromo para comparar com o original
	    $reverse = strrev($field);

	    return $field == $reverse ? true : false;

    }
}