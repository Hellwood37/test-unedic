<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\StudentRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 *  @ApiResource(
 *  collectionOperations={"GET"={"openapi_context"={"summary"="Récupère tous les étudiants inscrits dans un département"}}},
 *  
 *  normalizationContext={
 *      "groups"={"students_read"}
 *  }
 * )
 * 

 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"students_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     * @Groups({"students_read"})
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=25)
     * @Groups({"students_read"})
     */
    private $LastName;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"students_read"})
     */
    private $NumEtud;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="Students")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"students_read"})
     */
    private $department;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getNumEtud(): ?int
    {
        return $this->NumEtud;
    }

    public function setNumEtud(int $NumEtud): self
    {
        $this->NumEtud = $NumEtud;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }
}
