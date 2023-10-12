<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidateRepository::class)]
class Candidate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $political_party = null;

    #[ORM\Column(length: 255)]
    private ?string $number_list = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fileImage = null;

    #[ORM\OneToMany(mappedBy: 'candidate', targetEntity: Electeur::class)]
    private Collection $vote;

    #[ORM\Column(length: 255)]
    private ?string $filename = null;

    public function __construct()
    {
        $this->vote = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPoliticalParty(): ?string
    {
        return $this->political_party;
    }

    public function setPoliticalParty(string $political_party): static
    {
        $this->political_party = $political_party;

        return $this;
    }

    public function getNumberList(): ?string
    {
        return $this->number_list;
    }

    public function setNumberList(string $number_list): static
    {
        $this->number_list = $number_list;

        return $this;
    }

    public function getFileImage(): ?string
    {
        return $this->fileImage;
    }

    public function setFileImage(?string $fileImage): static
    {
        $this->fileImage = $fileImage;

        return $this;
    }

    /**
     * @return Collection<int, Electeur>
     */
    public function getVote(): Collection
    {
        return $this->vote;
    }

    public function addVote(Electeur $vote): static
    {
        if (!$this->vote->contains($vote)) {
            $this->vote->add($vote);
            $vote->setCandidate($this);
        }

        return $this;
    }

    public function removeVote(Electeur $vote): static
    {
        if ($this->vote->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getCandidate() === $this) {
                $vote->setCandidate(null);
            }
        }

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): static
    {
        $this->filename = $filename;

        return $this;
    }
}
