<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NotaFiscal
 */
class NotaFiscal
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cid;

    /**
     * @var string
     */
    private $accounts;

    /**
     * @var integer
     */
    private $nf;

    /**
     * @var string
     */
    private $user;

    /**
     * @var integer
     */
    private $nft;


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
     * Set cid
     *
     * @param string $cid
     * @return NotaFiscal
     */
    public function setCid($cid)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * Get cid
     *
     * @return string 
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Set accounts
     *
     * @param string $accounts
     * @return NotaFiscal
     */
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;

        return $this;
    }

    /**
     * Get accounts
     *
     * @return string 
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * Set nf
     *
     * @param integer $nf
     * @return NotaFiscal
     */
    public function setNf($nf)
    {
        $this->nf = $nf;

        return $this;
    }

    /**
     * Get nf
     *
     * @return integer 
     */
    public function getNf()
    {
        return $this->nf;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return NotaFiscal
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set nft
     *
     * @param integer $nft
     * @return NotaFiscal
     */
    public function setNft($nft)
    {
        $this->nft = $nft;

        return $this;
    }

    /**
     * Get nft
     *
     * @return integer 
     */
    public function getNft()
    {
        return $this->nft;
    }
}
