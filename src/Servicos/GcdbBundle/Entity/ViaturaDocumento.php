<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaDocumento
 */
class ViaturaDocumento
{
    /**
     * @var integer
     */
    private $viatDocumentoid;

    /**
     * @var integer
     */
    private $docCadUsuarioid;

    /**
     * @var integer
     */
    private $tipoDocumento;

    /**
     * @var \DateTime
     */
    private $docDatainc;

    /**
     * @var \DateTime
     */
    private $docVencimento;

    /**
     * @var string
     */
    private $docImagem;

    /**
     * @var boolean
     */
    private $docPrincipal;

    /**
     * @var string
     */
    private $docNumero;

    /**
     * @var \Servicos\GcdbBundle\Entity\ViaturaDocumento
     */
    private $viaturaid;


    /**
     * Get viatDocumentoid
     *
     * @return integer 
     */
    public function getViatDocumentoid()
    {
        return $this->viatDocumentoid;
    }

    /**
     * Set docCadUsuarioid
     *
     * @param integer $docCadUsuarioid
     * @return ViaturaDocumento
     */
    public function setDocCadUsuarioid($docCadUsuarioid)
    {
        $this->docCadUsuarioid = $docCadUsuarioid;

        return $this;
    }

    /**
     * Get docCadUsuarioid
     *
     * @return integer 
     */
    public function getDocCadUsuarioid()
    {
        return $this->docCadUsuarioid;
    }

    /**
     * Set tipoDocumento
     *
     * @param integer $tipoDocumento
     * @return ViaturaDocumento
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return integer 
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * Set docDatainc
     *
     * @param \DateTime $docDatainc
     * @return ViaturaDocumento
     */
    public function setDocDatainc($docDatainc)
    {
        $this->docDatainc = $docDatainc;

        return $this;
    }

    /**
     * Get docDatainc
     *
     * @return \DateTime 
     */
    public function getDocDatainc()
    {
        return $this->docDatainc;
    }

    /**
     * Set docVencimento
     *
     * @param \DateTime $docVencimento
     * @return ViaturaDocumento
     */
    public function setDocVencimento($docVencimento)
    {
        $this->docVencimento = $docVencimento;

        return $this;
    }

    /**
     * Get docVencimento
     *
     * @return \DateTime 
     */
    public function getDocVencimento()
    {
        return $this->docVencimento;
    }

    /**
     * Set docImagem
     *
     * @param string $docImagem
     * @return ViaturaDocumento
     */
    public function setDocImagem($docImagem)
    {
        $this->docImagem = $docImagem;

        return $this;
    }

    /**
     * Get docImagem
     *
     * @return string 
     */
    public function getDocImagem()
    {
        return $this->docImagem;
    }

    /**
     * Set docPrincipal
     *
     * @param boolean $docPrincipal
     * @return ViaturaDocumento
     */
    public function setDocPrincipal($docPrincipal)
    {
        $this->docPrincipal = $docPrincipal;

        return $this;
    }

    /**
     * Get docPrincipal
     *
     * @return boolean 
     */
    public function getDocPrincipal()
    {
        return $this->docPrincipal;
    }

    /**
     * Set docNumero
     *
     * @param string $docNumero
     * @return ViaturaDocumento
     */
    public function setDocNumero($docNumero)
    {
        $this->docNumero = $docNumero;

        return $this;
    }

    /**
     * Get docNumero
     *
     * @return string 
     */
    public function getDocNumero()
    {
        return $this->docNumero;
    }

    /**
     * Set viaturaid
     *
     * @param \Servicos\GcdbBundle\Entity\ViaturaDocumento $viaturaid
     * @return ViaturaDocumento
     */
    public function setViaturaid(\Servicos\GcdbBundle\Entity\ViaturaDocumento $viaturaid = null)
    {
        $this->viaturaid = $viaturaid;

        return $this;
    }

    /**
     * Get viaturaid
     *
     * @return \Servicos\GcdbBundle\Entity\ViaturaDocumento 
     */
    public function getViaturaid()
    {
        return $this->viaturaid;
    }
}
