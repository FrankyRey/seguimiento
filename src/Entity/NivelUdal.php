<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NivelUdal
 *
 * @ORM\Table(name="nivel_udal")
 * @ORM\Entity
 */
class NivelUdal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_nivel_udal", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNivelUdal;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_nivel_udal", type="string", length=50, nullable=false)
     */
    private $nombreNivelUdal;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=1, nullable=false, options={"default"="A"})
     */
    private $estatus = 'A';

    public function getIdNivelUdal(): ?int
    {
        return $this->idNivelUdal;
    }

    public function getNombreNivelUdal(): ?string
    {
        return $this->nombreNivelUdal;
    }

    public function setNombreNivelUdal(string $nombreNivelUdal): self
    {
        $this->nombreNivelUdal = $nombreNivelUdal;

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


}
