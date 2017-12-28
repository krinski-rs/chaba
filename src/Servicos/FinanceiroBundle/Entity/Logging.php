<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logging
 */
class Logging
{
    /**
     * @var integer
     */
    private $loggCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var \DateTime
     */
    private $loggDatainc;

    /**
     * @var string
     */
    private $loggIp;

    /**
     * @var string
     */
    private $loggOldendata;

    /**
     * @var string
     */
    private $loggDatabase;

    /**
     * @var string
     */
    private $loggTable;

    /**
     * @var integer
     */
    private $loggTableid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Tipologging
     */
    private $tipologgCodigoid;


    /**
     * Get loggCodigoid
     *
     * @return integer 
     */
    public function getLoggCodigoid()
    {
        return $this->loggCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Logging
     */
    public function setUsuaCodigoid($usuaCodigoid)
    {
        $this->usuaCodigoid = $usuaCodigoid;

        return $this;
    }

    /**
     * Get usuaCodigoid
     *
     * @return integer 
     */
    public function getUsuaCodigoid()
    {
        return $this->usuaCodigoid;
    }

    /**
     * Set loggDatainc
     *
     * @param \DateTime $loggDatainc
     * @return Logging
     */
    public function setLoggDatainc($loggDatainc)
    {
        $this->loggDatainc = $loggDatainc;

        return $this;
    }

    /**
     * Get loggDatainc
     *
     * @return \DateTime 
     */
    public function getLoggDatainc()
    {
        return $this->loggDatainc;
    }

    /**
     * Set loggIp
     *
     * @param string $loggIp
     * @return Logging
     */
    public function setLoggIp($loggIp)
    {
        $this->loggIp = $loggIp;

        return $this;
    }

    /**
     * Get loggIp
     *
     * @return string 
     */
    public function getLoggIp()
    {
        return $this->loggIp;
    }

    /**
     * Set loggOldendata
     *
     * @param string $loggOldendata
     * @return Logging
     */
    public function setLoggOldendata($loggOldendata)
    {
        $this->loggOldendata = $loggOldendata;

        return $this;
    }

    /**
     * Get loggOldendata
     *
     * @return string 
     */
    public function getLoggOldendata()
    {
        return $this->loggOldendata;
    }

    /**
     * Set loggDatabase
     *
     * @param string $loggDatabase
     * @return Logging
     */
    public function setLoggDatabase($loggDatabase)
    {
        $this->loggDatabase = $loggDatabase;

        return $this;
    }

    /**
     * Get loggDatabase
     *
     * @return string 
     */
    public function getLoggDatabase()
    {
        return $this->loggDatabase;
    }

    /**
     * Set loggTable
     *
     * @param string $loggTable
     * @return Logging
     */
    public function setLoggTable($loggTable)
    {
        $this->loggTable = $loggTable;

        return $this;
    }

    /**
     * Get loggTable
     *
     * @return string 
     */
    public function getLoggTable()
    {
        return $this->loggTable;
    }

    /**
     * Set loggTableid
     *
     * @param integer $loggTableid
     * @return Logging
     */
    public function setLoggTableid($loggTableid)
    {
        $this->loggTableid = $loggTableid;

        return $this;
    }

    /**
     * Get loggTableid
     *
     * @return integer 
     */
    public function getLoggTableid()
    {
        return $this->loggTableid;
    }

    /**
     * Set tipologgCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Tipologging $tipologgCodigoid
     * @return Logging
     */
    public function setTipologgCodigoid(\Servicos\FinanceiroBundle\Entity\Tipologging $tipologgCodigoid = null)
    {
        $this->tipologgCodigoid = $tipologgCodigoid;

        return $this;
    }

    /**
     * Get tipologgCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Tipologging 
     */
    public function getTipologgCodigoid()
    {
        return $this->tipologgCodigoid;
    }
}
