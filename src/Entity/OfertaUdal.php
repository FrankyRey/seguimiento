<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OfertaUdal
 *
 * @ORM\Table(name="oferta_udal", indexes={@ORM\Index(name="fk_oferta_udal_nivel_udal1_idx", columns={"id_nivel_udal"})})
 * @ORM\Entity
 */
class OfertaUdal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_oferta_udal", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOfertaUdal;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_oferta_udal", type="string", length=90, nullable=false)
     */
    private $nombreOfertaUdal;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=1, nullable=false, options={"default"="A"})
     */
    private $estatus = 'A';

    /**
     * @var \NivelUdal
     *
     * @ORM\ManyToOne(targetEntity="NivelUdal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nivel_udal", referencedColumnName="id_nivel_udal")
     * })
     */
    private $idNivelUdal;

    public function getIdOfertaUdal(): ?int
    {
        return $this->idOfertaUdal;
    }

    public function getNombreOfertaUdal(): ?string
    {
        return $this->nombreOfertaUdal;
    }

    public function setNombreOfertaUdal(string $nombreOfertaUdal): self
    {
        $this->nombreOfertaUdal = $nombreOfertaUdal;

        return $this;
    }

    public function getEstatus(): ?string
    {
        return $this->estatus;
    }

    public function setEstatus(string $estatus): self
    {
        $this->estatus = $estatus;

        return $this;
    }

    public function getIdNivelUdal(): ?NivelUdal
    {
        return $this->idNivelUdal;
    }

    public function setIdNivelUdal(?NivelUdal $idNivelUdal): self
    {
        $this->idNivelUdal = $idNivelUdal;

        return $this;
    }


}
