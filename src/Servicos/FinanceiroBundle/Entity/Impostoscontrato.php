<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Impostoscontrato
 */
class Impostoscontrato
{
    /**
     * @var integer
     */
    private $impocontCodigoid;

    /**
     * @var boolean
     */
    private $impocontPisReter;

    /**
     * @var boolean
     */
    private $impocontPisDestacar;

    /**
     * @var string
     */
    private $impocontPisValor;

    /**
     * @var string
     */
    private $impocontPisReducao;

    /**
     * @var boolean
     */
    private $impocontCofinsReter;

    /**
     * @var boolean
     */
    private $impocontCofinsDestacar;

    /**
     * @var string
     */
    private $impocontCofinsValor;

    /**
     * @var string
     */
    private $impocontCofinsReducao;

    /**
     * @var boolean
     */
    private $impocontIrReter;

    /**
     * @var boolean
     */
    private $impocontIrDestacar;

    /**
     * @var string
     */
    private $impocontIrValor;

    /**
     * @var string
     */
    private $impocontIrReducao;

    /**
     * @var boolean
     */
    private $impocontIsllReter;

    /**
     * @var boolean
     */
    private $impocontIsllDestacar;

    /**
     * @var string
     */
    private $impocontIsllValor;

    /**
     * @var string
     */
    private $impocontIsllReducao;

    /**
     * @var boolean
     */
    private $impocontIssqnReter;

    /**
     * @var boolean
     */
    private $impocontIssqnDestacar;

    /**
     * @var string
     */
    private $impocontIssqnValor;

    /**
     * @var string
     */
    private $impocontIssqnReducao;

    /**
     * @var boolean
     */
    private $impocontIcmsReter;

    /**
     * @var boolean
     */
    private $impocontIcmsDestacar;

    /**
     * @var string
     */
    private $impocontIcmsValor;

    /**
     * @var string
     */
    private $impocontIcmsReducao;

    /**
     * @var string
     */
    private $ativPisValor;

    /**
     * @var boolean
     */
    private $ativPisReter;

    /**
     * @var string
     */
    private $ativCofinsValor;

    /**
     * @var boolean
     */
    private $ativCofinsReter;

    /**
     * @var string
     */
    private $ativIrValor;

    /**
     * @var boolean
     */
    private $ativIrReter;

    /**
     * @var string
     */
    private $ativCsllValor;

    /**
     * @var boolean
     */
    private $ativCsllReter;

    /**
     * @var string
     */
    private $ativIssqnValor;

    /**
     * @var boolean
     */
    private $ativIssqnReter;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get impocontCodigoid
     *
     * @return integer 
     */
    public function getImpocontCodigoid()
    {
        return $this->impocontCodigoid;
    }

    /**
     * Set impocontPisReter
     *
     * @param boolean $impocontPisReter
     * @return Impostoscontrato
     */
    public function setImpocontPisReter($impocontPisReter)
    {
        $this->impocontPisReter = $impocontPisReter;

        return $this;
    }

    /**
     * Get impocontPisReter
     *
     * @return boolean 
     */
    public function getImpocontPisReter()
    {
        return $this->impocontPisReter;
    }

    /**
     * Set impocontPisDestacar
     *
     * @param boolean $impocontPisDestacar
     * @return Impostoscontrato
     */
    public function setImpocontPisDestacar($impocontPisDestacar)
    {
        $this->impocontPisDestacar = $impocontPisDestacar;

        return $this;
    }

    /**
     * Get impocontPisDestacar
     *
     * @return boolean 
     */
    public function getImpocontPisDestacar()
    {
        return $this->impocontPisDestacar;
    }

    /**
     * Set impocontPisValor
     *
     * @param string $impocontPisValor
     * @return Impostoscontrato
     */
    public function setImpocontPisValor($impocontPisValor)
    {
        $this->impocontPisValor = $impocontPisValor;

        return $this;
    }

    /**
     * Get impocontPisValor
     *
     * @return string 
     */
    public function getImpocontPisValor()
    {
        return $this->impocontPisValor;
    }

    /**
     * Set impocontPisReducao
     *
     * @param string $impocontPisReducao
     * @return Impostoscontrato
     */
    public function setImpocontPisReducao($impocontPisReducao)
    {
        $this->impocontPisReducao = $impocontPisReducao;

        return $this;
    }

    /**
     * Get impocontPisReducao
     *
     * @return string 
     */
    public function getImpocontPisReducao()
    {
        return $this->impocontPisReducao;
    }

    /**
     * Set impocontCofinsReter
     *
     * @param boolean $impocontCofinsReter
     * @return Impostoscontrato
     */
    public function setImpocontCofinsReter($impocontCofinsReter)
    {
        $this->impocontCofinsReter = $impocontCofinsReter;

        return $this;
    }

    /**
     * Get impocontCofinsReter
     *
     * @return boolean 
     */
    public function getImpocontCofinsReter()
    {
        return $this->impocontCofinsReter;
    }

    /**
     * Set impocontCofinsDestacar
     *
     * @param boolean $impocontCofinsDestacar
     * @return Impostoscontrato
     */
    public function setImpocontCofinsDestacar($impocontCofinsDestacar)
    {
        $this->impocontCofinsDestacar = $impocontCofinsDestacar;

        return $this;
    }

    /**
     * Get impocontCofinsDestacar
     *
     * @return boolean 
     */
    public function getImpocontCofinsDestacar()
    {
        return $this->impocontCofinsDestacar;
    }

    /**
     * Set impocontCofinsValor
     *
     * @param string $impocontCofinsValor
     * @return Impostoscontrato
     */
    public function setImpocontCofinsValor($impocontCofinsValor)
    {
        $this->impocontCofinsValor = $impocontCofinsValor;

        return $this;
    }

    /**
     * Get impocontCofinsValor
     *
     * @return string 
     */
    public function getImpocontCofinsValor()
    {
        return $this->impocontCofinsValor;
    }

    /**
     * Set impocontCofinsReducao
     *
     * @param string $impocontCofinsReducao
     * @return Impostoscontrato
     */
    public function setImpocontCofinsReducao($impocontCofinsReducao)
    {
        $this->impocontCofinsReducao = $impocontCofinsReducao;

        return $this;
    }

    /**
     * Get impocontCofinsReducao
     *
     * @return string 
     */
    public function getImpocontCofinsReducao()
    {
        return $this->impocontCofinsReducao;
    }

    /**
     * Set impocontIrReter
     *
     * @param boolean $impocontIrReter
     * @return Impostoscontrato
     */
    public function setImpocontIrReter($impocontIrReter)
    {
        $this->impocontIrReter = $impocontIrReter;

        return $this;
    }

    /**
     * Get impocontIrReter
     *
     * @return boolean 
     */
    public function getImpocontIrReter()
    {
        return $this->impocontIrReter;
    }

    /**
     * Set impocontIrDestacar
     *
     * @param boolean $impocontIrDestacar
     * @return Impostoscontrato
     */
    public function setImpocontIrDestacar($impocontIrDestacar)
    {
        $this->impocontIrDestacar = $impocontIrDestacar;

        return $this;
    }

    /**
     * Get impocontIrDestacar
     *
     * @return boolean 
     */
    public function getImpocontIrDestacar()
    {
        return $this->impocontIrDestacar;
    }

    /**
     * Set impocontIrValor
     *
     * @param string $impocontIrValor
     * @return Impostoscontrato
     */
    public function setImpocontIrValor($impocontIrValor)
    {
        $this->impocontIrValor = $impocontIrValor;

        return $this;
    }

    /**
     * Get impocontIrValor
     *
     * @return string 
     */
    public function getImpocontIrValor()
    {
        return $this->impocontIrValor;
    }

    /**
     * Set impocontIrReducao
     *
     * @param string $impocontIrReducao
     * @return Impostoscontrato
     */
    public function setImpocontIrReducao($impocontIrReducao)
    {
        $this->impocontIrReducao = $impocontIrReducao;

        return $this;
    }

    /**
     * Get impocontIrReducao
     *
     * @return string 
     */
    public function getImpocontIrReducao()
    {
        return $this->impocontIrReducao;
    }

    /**
     * Set impocontIsllReter
     *
     * @param boolean $impocontIsllReter
     * @return Impostoscontrato
     */
    public function setImpocontIsllReter($impocontIsllReter)
    {
        $this->impocontIsllReter = $impocontIsllReter;

        return $this;
    }

    /**
     * Get impocontIsllReter
     *
     * @return boolean 
     */
    public function getImpocontIsllReter()
    {
        return $this->impocontIsllReter;
    }

    /**
     * Set impocontIsllDestacar
     *
     * @param boolean $impocontIsllDestacar
     * @return Impostoscontrato
     */
    public function setImpocontIsllDestacar($impocontIsllDestacar)
    {
        $this->impocontIsllDestacar = $impocontIsllDestacar;

        return $this;
    }

    /**
     * Get impocontIsllDestacar
     *
     * @return boolean 
     */
    public function getImpocontIsllDestacar()
    {
        return $this->impocontIsllDestacar;
    }

    /**
     * Set impocontIsllValor
     *
     * @param string $impocontIsllValor
     * @return Impostoscontrato
     */
    public function setImpocontIsllValor($impocontIsllValor)
    {
        $this->impocontIsllValor = $impocontIsllValor;

        return $this;
    }

    /**
     * Get impocontIsllValor
     *
     * @return string 
     */
    public function getImpocontIsllValor()
    {
        return $this->impocontIsllValor;
    }

    /**
     * Set impocontIsllReducao
     *
     * @param string $impocontIsllReducao
     * @return Impostoscontrato
     */
    public function setImpocontIsllReducao($impocontIsllReducao)
    {
        $this->impocontIsllReducao = $impocontIsllReducao;

        return $this;
    }

    /**
     * Get impocontIsllReducao
     *
     * @return string 
     */
    public function getImpocontIsllReducao()
    {
        return $this->impocontIsllReducao;
    }

    /**
     * Set impocontIssqnReter
     *
     * @param boolean $impocontIssqnReter
     * @return Impostoscontrato
     */
    public function setImpocontIssqnReter($impocontIssqnReter)
    {
        $this->impocontIssqnReter = $impocontIssqnReter;

        return $this;
    }

    /**
     * Get impocontIssqnReter
     *
     * @return boolean 
     */
    public function getImpocontIssqnReter()
    {
        return $this->impocontIssqnReter;
    }

    /**
     * Set impocontIssqnDestacar
     *
     * @param boolean $impocontIssqnDestacar
     * @return Impostoscontrato
     */
    public function setImpocontIssqnDestacar($impocontIssqnDestacar)
    {
        $this->impocontIssqnDestacar = $impocontIssqnDestacar;

        return $this;
    }

    /**
     * Get impocontIssqnDestacar
     *
     * @return boolean 
     */
    public function getImpocontIssqnDestacar()
    {
        return $this->impocontIssqnDestacar;
    }

    /**
     * Set impocontIssqnValor
     *
     * @param string $impocontIssqnValor
     * @return Impostoscontrato
     */
    public function setImpocontIssqnValor($impocontIssqnValor)
    {
        $this->impocontIssqnValor = $impocontIssqnValor;

        return $this;
    }

    /**
     * Get impocontIssqnValor
     *
     * @return string 
     */
    public function getImpocontIssqnValor()
    {
        return $this->impocontIssqnValor;
    }

    /**
     * Set impocontIssqnReducao
     *
     * @param string $impocontIssqnReducao
     * @return Impostoscontrato
     */
    public function setImpocontIssqnReducao($impocontIssqnReducao)
    {
        $this->impocontIssqnReducao = $impocontIssqnReducao;

        return $this;
    }

    /**
     * Get impocontIssqnReducao
     *
     * @return string 
     */
    public function getImpocontIssqnReducao()
    {
        return $this->impocontIssqnReducao;
    }

    /**
     * Set impocontIcmsReter
     *
     * @param boolean $impocontIcmsReter
     * @return Impostoscontrato
     */
    public function setImpocontIcmsReter($impocontIcmsReter)
    {
        $this->impocontIcmsReter = $impocontIcmsReter;

        return $this;
    }

    /**
     * Get impocontIcmsReter
     *
     * @return boolean 
     */
    public function getImpocontIcmsReter()
    {
        return $this->impocontIcmsReter;
    }

    /**
     * Set impocontIcmsDestacar
     *
     * @param boolean $impocontIcmsDestacar
     * @return Impostoscontrato
     */
    public function setImpocontIcmsDestacar($impocontIcmsDestacar)
    {
        $this->impocontIcmsDestacar = $impocontIcmsDestacar;

        return $this;
    }

    /**
     * Get impocontIcmsDestacar
     *
     * @return boolean 
     */
    public function getImpocontIcmsDestacar()
    {
        return $this->impocontIcmsDestacar;
    }

    /**
     * Set impocontIcmsValor
     *
     * @param string $impocontIcmsValor
     * @return Impostoscontrato
     */
    public function setImpocontIcmsValor($impocontIcmsValor)
    {
        $this->impocontIcmsValor = $impocontIcmsValor;

        return $this;
    }

    /**
     * Get impocontIcmsValor
     *
     * @return string 
     */
    public function getImpocontIcmsValor()
    {
        return $this->impocontIcmsValor;
    }

    /**
     * Set impocontIcmsReducao
     *
     * @param string $impocontIcmsReducao
     * @return Impostoscontrato
     */
    public function setImpocontIcmsReducao($impocontIcmsReducao)
    {
        $this->impocontIcmsReducao = $impocontIcmsReducao;

        return $this;
    }

    /**
     * Get impocontIcmsReducao
     *
     * @return string 
     */
    public function getImpocontIcmsReducao()
    {
        return $this->impocontIcmsReducao;
    }

    /**
     * Set ativPisValor
     *
     * @param string $ativPisValor
     * @return Impostoscontrato
     */
    public function setAtivPisValor($ativPisValor)
    {
        $this->ativPisValor = $ativPisValor;

        return $this;
    }

    /**
     * Get ativPisValor
     *
     * @return string 
     */
    public function getAtivPisValor()
    {
        return $this->ativPisValor;
    }

    /**
     * Set ativPisReter
     *
     * @param boolean $ativPisReter
     * @return Impostoscontrato
     */
    public function setAtivPisReter($ativPisReter)
    {
        $this->ativPisReter = $ativPisReter;

        return $this;
    }

    /**
     * Get ativPisReter
     *
     * @return boolean 
     */
    public function getAtivPisReter()
    {
        return $this->ativPisReter;
    }

    /**
     * Set ativCofinsValor
     *
     * @param string $ativCofinsValor
     * @return Impostoscontrato
     */
    public function setAtivCofinsValor($ativCofinsValor)
    {
        $this->ativCofinsValor = $ativCofinsValor;

        return $this;
    }

    /**
     * Get ativCofinsValor
     *
     * @return string 
     */
    public function getAtivCofinsValor()
    {
        return $this->ativCofinsValor;
    }

    /**
     * Set ativCofinsReter
     *
     * @param boolean $ativCofinsReter
     * @return Impostoscontrato
     */
    public function setAtivCofinsReter($ativCofinsReter)
    {
        $this->ativCofinsReter = $ativCofinsReter;

        return $this;
    }

    /**
     * Get ativCofinsReter
     *
     * @return boolean 
     */
    public function getAtivCofinsReter()
    {
        return $this->ativCofinsReter;
    }

    /**
     * Set ativIrValor
     *
     * @param string $ativIrValor
     * @return Impostoscontrato
     */
    public function setAtivIrValor($ativIrValor)
    {
        $this->ativIrValor = $ativIrValor;

        return $this;
    }

    /**
     * Get ativIrValor
     *
     * @return string 
     */
    public function getAtivIrValor()
    {
        return $this->ativIrValor;
    }

    /**
     * Set ativIrReter
     *
     * @param boolean $ativIrReter
     * @return Impostoscontrato
     */
    public function setAtivIrReter($ativIrReter)
    {
        $this->ativIrReter = $ativIrReter;

        return $this;
    }

    /**
     * Get ativIrReter
     *
     * @return boolean 
     */
    public function getAtivIrReter()
    {
        return $this->ativIrReter;
    }

    /**
     * Set ativCsllValor
     *
     * @param string $ativCsllValor
     * @return Impostoscontrato
     */
    public function setAtivCsllValor($ativCsllValor)
    {
        $this->ativCsllValor = $ativCsllValor;

        return $this;
    }

    /**
     * Get ativCsllValor
     *
     * @return string 
     */
    public function getAtivCsllValor()
    {
        return $this->ativCsllValor;
    }

    /**
     * Set ativCsllReter
     *
     * @param boolean $ativCsllReter
     * @return Impostoscontrato
     */
    public function setAtivCsllReter($ativCsllReter)
    {
        $this->ativCsllReter = $ativCsllReter;

        return $this;
    }

    /**
     * Get ativCsllReter
     *
     * @return boolean 
     */
    public function getAtivCsllReter()
    {
        return $this->ativCsllReter;
    }

    /**
     * Set ativIssqnValor
     *
     * @param string $ativIssqnValor
     * @return Impostoscontrato
     */
    public function setAtivIssqnValor($ativIssqnValor)
    {
        $this->ativIssqnValor = $ativIssqnValor;

        return $this;
    }

    /**
     * Get ativIssqnValor
     *
     * @return string 
     */
    public function getAtivIssqnValor()
    {
        return $this->ativIssqnValor;
    }

    /**
     * Set ativIssqnReter
     *
     * @param boolean $ativIssqnReter
     * @return Impostoscontrato
     */
    public function setAtivIssqnReter($ativIssqnReter)
    {
        $this->ativIssqnReter = $ativIssqnReter;

        return $this;
    }

    /**
     * Get ativIssqnReter
     *
     * @return boolean 
     */
    public function getAtivIssqnReter()
    {
        return $this->ativIssqnReter;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Impostoscontrato
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid = null)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato 
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }
}
