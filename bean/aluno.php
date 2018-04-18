<?php 

class aluno{

	private $aluno_cpf;
	private $nome;
	private $email;
	private $fk_endereco_id;
	private $trabalhando;
	private $expec_sobre_curso;
	private $como_conheceu;

	public function getAluno_cpf()
	{
		return $this->aluno_cpf;
	}

	public function setAluno_cpf($value)
	{
		$this->aluno_cpf=$value;
	}

	public function getNome()
	{
		return $this->$nome;
	}

	public function setNome($value)
	{
		$this->nome=$value;
	}

	public function getEmail()
	{
		return $this->$email;
	}

	public function setEmail($value)
	{
		$this->email=$value;
	}

	public function getFk_endereco_id()
	{
		return $this->$fk_endereco_id;
	}

	public function setFk_endereco_id($value)
	{
		$this->fk_endereco_id=$value;
	}

	public function getTrabalhando()
	{
		return $this->$trabalhando;
	}

	public function setTrabalhando($value)
	{
		$this->trabalhando=$value;
	}

	public function getExpec_sobre_curso()
	{
		return $this->$expec_sobre_curso;
	}

	public function setExpec_sobre_curso($value)
	{
		$this->expec_sobre_curso=$value;
	}
	public function getComo_conheceu()
	{
		return $this->$como_conheceu;
	}

	public function setComo_conheceu($value)
	{
		$this->como_conheceu=$value;
	}
}

?>