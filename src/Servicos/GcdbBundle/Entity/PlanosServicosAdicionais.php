<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanosServicosAdicionais
 */
class PlanosServicosAdicionais
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var float
     */
    private $valorAtivacao;

    /**
     * @var float
     */
    private $valorMensal;

    /**
     * @var integer
     */
    private $periodo;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return PlanosServicosAdicionais
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return PlanosServicosAdicionais
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set valorAtivacao
     *
     * @param float $valorAtivacao
     * @return PlanosServicosAdicionais
     */
    public function setValorAtivacao($valorAtivacao)
    {
        $this->valorAtivacao = $valorAtivacao;

        return $this;
    }

    /**
     * Get valorAtivacao
     *
     * @return float 
     */
    public function getValorAtivacao()
    {
        return $this->valorAtivacao;
    }

    /**
     * Set valorMensal
     *
     * @param float $valorMensal
     * @return PlanosServicosAdicionais
     */
    public function setValorMensal($valorMensal)
    {
        $this->valorMensal = $valorMensal;

        return $this;
    }

    /**
     * Get valorMensal
     *
     * @return float 
     */
    public function getValorMensal()
    {
        return $this->valorMensal;
    }

    /**
     * Set periodo
     *
     * @param integer $periodo
     * @return PlanosServicosAdicionais
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return integer 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }
}
