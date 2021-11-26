<?php

namespace App\Entity;

use App\Repository\DirectorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Valab ;


/**
 * @ORM\Entity(repositoryClass=DirectorsRepository::class)
 */
class Directors
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\ManyToMany(targetEntity=Film::class, inversedBy="directors")
     */
    private $Directors;

    public function __construct()
    {
        $this->Directors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    

    /**
     * @return Collection|Film[]
     */
    public function getDirectors(): Collection
    {
        return $this->Directors;
    }

    public function addDirector(Film $director): self
    {
        if (!$this->Directors->contains($director)) {
            $this->Directors[] = $director;
        }

        return $this;
    }

    public function removeDirector(Film $director): self
    {
        $this->Directors->removeElement($director);

        return $this;
    }
}
