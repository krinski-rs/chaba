<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PowerswitchesPortas
 */
class PowerswitchesPortas
{
    /**
     * @var integer
     */
    private $portaid;

    /**
     * @var string
     */
    private $nomemaquina;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var integer
     */
    private $powerswitchid;

    /**
     * @var integer
     */
    private $porta;

    /**
     * @var string
     */
    private $local;

    /**
     * @var integer
     */
    private $mostrarparacliente;


    /**
     * Get portaid
     *
     * @return integer 
     */
    public function getPortaid()
    {
        return $this->portaid;
    }

    /**
     * Set nomemaquina
     *
     * @param string $nomemaquina
     * @return PowerswitchesPortas
     */
    public function setNomemaquina($nomemaquina)
    {
        $this->nomemaquina = $nomemaquina;

        return $this;
    }

    /**
     * Get nomemaquina
     *
     * @return string 
     */
    public function getNomemaquina()
    {
        return $this->nomemaquina;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return PowerswitchesPortas
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
     * Set powerswitchid
     *
     * @param integer $powerswitchid
     * @return PowerswitchesPortas
     */
    public function setPowerswitchid($powerswitchid)
    {
        $this->powerswitchid = $powerswitchid;

        return $this;
    }

    /**
     * Get powerswitchid
     *
     * @return integer 
     */
    public function getPowerswitchid()
    {
        return $this->powerswitchid;
    }

    /**
     * Set porta
     *
     * @param integer $porta
     * @return PowerswitchesPortas
     */
    public function setPorta($porta)
    {
        $this->porta = $porta;

        return $this;
    }

    /**
     * Get porta
     *
     * @return integer 
     */
    public function getPorta()
    {
        return $this->porta;
    }

    /**
     * Set local
     *
     * @param string $local
     * @return PowerswitchesPortas
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return string 
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Set mostrarparacliente
     *
     * @param integer $mostrarparacliente
     * @return PowerswitchesPortas
     */
    public function setMostrarparacliente($mostrarparacliente)
    {
        $this->mostrarparacliente = $mostrarparacliente;

        return $this;
    }

    /**
     * Get mostrarparacliente
     *
     * @return integer 
     */
    public function getMostrarparacliente()
    {
        return $this->mostrarparacliente;
    }
}
