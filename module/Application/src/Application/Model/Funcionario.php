<?php

namespace Application\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Funcionario {
	
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue("AUTO")
	 * @ORM\Column(type="integer")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="string", length=50)
	 */
	private $nome;
	
	/**
	 * @ORM\Column(type="string", length=15)
	 */
	private $cpf;
	
	/**
	 * @ORM\Column(type="decimal")
	 */
	private $salario;
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function getCpf() {
		return $this->cpf;
	}
	
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	
	public function getSalario() {
		return $this->salario;
	}
	
	public function setSalario($salario) {
		$this->salario = $salario;
	}
	
}