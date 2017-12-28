<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cartao
 */
class Cartao
{
    /**
     * @var integer
     */
    private $cartaoid;

    /**
     * @var integer
     */
    private $verificador;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $obs;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var string
     */
    private $numero;


    /**
     * Get cartaoid
     *
     * @return integer 
     */
    public function getCartaoid()
    {
        return $this->cartaoid;
    }

    /**
     * Set verificador
     *
     * @param integer $verificador
     * @return Cartao
     */
    public function setVerificador($verificador)
    {
        $this->verificador = $verificador;

        return $this;
    }

    /**
     * Get verificador
     *
     * @return integer 
     */
    public function getVerificador()
    {
        return $this->verificador;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Cartao
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
     * Set tipo
     *
     * @param string $tipo
     * @return Cartao
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set obs
     *
     * @param string $obs
     * @return Cartao
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get obs
     *
     * @return string 
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return Cartao
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
     * Set numero
     *
     * @param string $numero
     * @return Cartao
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }
}
