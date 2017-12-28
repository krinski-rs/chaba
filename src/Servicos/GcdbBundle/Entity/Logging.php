<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logging
 */
class Logging
{
    /**
     * @var integer
     */
    private $idlog;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $log;

    /**
     * @var string
     */
    private $data;

    /**
     * @var string
     */
    private $hora;

    /**
     * @var integer
     */
    private $idusuario;


    /**
     * Get idlog
     *
     * @return integer 
     */
    public function getIdlog()
    {
        return $this->idlog;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Logging
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
     * Set log
     *
     * @param string $log
     * @return Logging
     */
    public function setLog($log)
    {
        $this->log = $log;

        return $this;
    }

    /**
     * Get log
     *
     * @return string 
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Logging
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set hora
     *
     * @param string $hora
     * @return Logging
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return string 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set idusuario
     *
     * @param integer $idusuario
     * @return Logging
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return integer 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }
}
