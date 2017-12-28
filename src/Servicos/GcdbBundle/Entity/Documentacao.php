<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documentacao
 */
class Documentacao
{
    /**
     * @var integer
     */
    private $docid;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $texto;

    /**
     * @var string
     */
    private $mostrar;


    /**
     * Get docid
     *
     * @return integer 
     */
    public function getDocid()
    {
        return $this->docid;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return Documentacao
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return integer 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Documentacao
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
     * Set texto
     *
     * @param string $texto
     * @return Documentacao
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set mostrar
     *
     * @param string $mostrar
     * @return Documentacao
     */
    public function setMostrar($mostrar)
    {
        $this->mostrar = $mostrar;

        return $this;
    }

    /**
     * Get mostrar
     *
     * @return string 
     */
    public function getMostrar()
    {
        return $this->mostrar;
    }
}
