<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NfRecebimento
 */
class NfRecebimento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $nfCod;

    /**
     * @var string
     */
    private $nfSerie;

    /**
     * @var \DateTime
     */
    private $nfEmissao;

    /**
     * @var integer
     */
    private $nfCnpj;

    /**
     * @var boolean
     */
    private $status;


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
     * Set nfCod
     *
     * @param integer $nfCod
     * @return NfRecebimento
     */
    public function setNfCod($nfCod)
    {
        $this->nfCod = $nfCod;

        return $this;
    }

    /**
     * Get nfCod
     *
     * @return integer 
     */
    public function getNfCod()
    {
        return $this->nfCod;
    }

    /**
     * Set nfSerie
     *
     * @param string $nfSerie
     * @return NfRecebimento
     */
    public function setNfSerie($nfSerie)
    {
        $this->nfSerie = $nfSerie;

        return $this;
    }

    /**
     * Get nfSerie
     *
     * @return string 
     */
    public function getNfSerie()
    {
        return $this->nfSerie;
    }

    /**
     * Set nfEmissao
     *
     * @param \DateTime $nfEmissao
     * @return NfRecebimento
     */
    public function setNfEmissao($nfEmissao)
    {
        $this->nfEmissao = $nfEmissao;

        return $this;
    }

    /**
     * Get nfEmissao
     *
     * @return \DateTime 
     */
    public function getNfEmissao()
    {
        return $this->nfEmissao;
    }

    /**
     * Set nfCnpj
     *
     * @param integer $nfCnpj
     * @return NfRecebimento
     */
    public function setNfCnpj($nfCnpj)
    {
        $this->nfCnpj = $nfCnpj;

        return $this;
    }

    /**
     * Get nfCnpj
     *
     * @return integer 
     */
    public function getNfCnpj()
    {
        return $this->nfCnpj;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return NfRecebimento
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
