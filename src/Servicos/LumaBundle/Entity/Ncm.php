<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ncm
 */
class Ncm
{
    /**
     * @var integer
     */
    private $ncmCodigoid;

    /**
     * @var string
     */
    private $ncmNcm;

    /**
     * @var string
     */
    private $ncmDescricao;

    /**
     * @var string
     */
    private $ncmIpi;

    /**
     * @var \DateTime
     */
    private $ncmDatainc;

    /**
     * @var \DateTime
     */
    private $ncmDataalteracao;

    /**
     * @var \Servicos\LumaBundle\Entity\Ncm
     */
    private $ncmPai;


    /**
     * Get ncmCodigoid
     *
     * @return integer 
     */
    public function getNcmCodigoid()
    {
        return $this->ncmCodigoid;
    }

    /**
     * Set ncmNcm
     *
     * @param string $ncmNcm
     * @return Ncm
     */
    public function setNcmNcm($ncmNcm)
    {
        $this->ncmNcm = $ncmNcm;

        return $this;
    }

    /**
     * Get ncmNcm
     *
     * @return string 
     */
    public function getNcmNcm()
    {
        return $this->ncmNcm;
    }

    /**
     * Set ncmDescricao
     *
     * @param string $ncmDescricao
     * @return Ncm
     */
    public function setNcmDescricao($ncmDescricao)
    {
        $this->ncmDescricao = $ncmDescricao;

        return $this;
    }

    /**
     * Get ncmDescricao
     *
     * @return string 
     */
    public function getNcmDescricao()
    {
        return $this->ncmDescricao;
    }

    /**
     * Set ncmIpi
     *
     * @param string $ncmIpi
     * @return Ncm
     */
    public function setNcmIpi($ncmIpi)
    {
        $this->ncmIpi = $ncmIpi;

        return $this;
    }

    /**
     * Get ncmIpi
     *
     * @return string 
     */
    public function getNcmIpi()
    {
        return $this->ncmIpi;
    }

    /**
     * Set ncmDatainc
     *
     * @param \DateTime $ncmDatainc
     * @return Ncm
     */
    public function setNcmDatainc($ncmDatainc)
    {
        $this->ncmDatainc = $ncmDatainc;

        return $this;
    }

    /**
     * Get ncmDatainc
     *
     * @return \DateTime 
     */
    public function getNcmDatainc()
    {
        return $this->ncmDatainc;
    }

    /**
     * Set ncmDataalteracao
     *
     * @param \DateTime $ncmDataalteracao
     * @return Ncm
     */
    public function setNcmDataalteracao($ncmDataalteracao)
    {
        $this->ncmDataalteracao = $ncmDataalteracao;

        return $this;
    }

    /**
     * Get ncmDataalteracao
     *
     * @return \DateTime 
     */
    public function getNcmDataalteracao()
    {
        return $this->ncmDataalteracao;
    }

    /**
     * Set ncmPai
     *
     * @param \Servicos\LumaBundle\Entity\Ncm $ncmPai
     * @return Ncm
     */
    public function setNcmPai(\Servicos\LumaBundle\Entity\Ncm $ncmPai = null)
    {
        $this->ncmPai = $ncmPai;

        return $this;
    }

    /**
     * Get ncmPai
     *
     * @return \Servicos\LumaBundle\Entity\Ncm 
     */
    public function getNcmPai()
    {
        return $this->ncmPai;
    }
}
