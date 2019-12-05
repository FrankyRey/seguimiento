<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medio
 *
 * @ORM\Table(name="medio")
 * @ORM\Entity
 */
class Medio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_medio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMedio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_medio", type="string", length=60, nullable=false)
     */
    private $nombreMedio;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=1, nullable=false, options={"default"="A"})
     */
    private $estatus = 'A';

    public function getIdMedio(): ?int
    {
        return $this->idMedio;
    }

    public function getNombreMedio(): ?string
    {
        return $this->nombreMedio;
    }

    public function setNombreMedio(string $nombreMedio): self
    {
        $this->nombreMedio = $nombreMedio;

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
