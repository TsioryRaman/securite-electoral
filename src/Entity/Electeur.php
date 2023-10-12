<?php

namespace App\Entity;

use App\Repository\ElecteurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: ElecteurRepository::class)]
class Electeur
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
    private ?string $birth_place = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $birthday = null;

    #[ORM\Column(length: 255)]
    private ?string $sign = null;

    #[ORM\Column(length: 255)]
    private ?string $cin_number = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $father_name = null;

    #[ORM\Column(length: 255)]
    private ?string $mother_name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $done_in = null;

    #[ORM\ManyToOne(inversedBy: 'electeurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?VotePlace $votePlace = null;

    private File $imageFile;

    #[ORM\ManyToOne(cascade: ['remove'], inversedBy: 'vote')]
    private ?Candidate $candidate = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

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

    public function getBirthPlace(): ?string
    {
        return $this->birth_place;
    }

    public function setBirthPlace(string $birth_place): static
    {
        $this->birth_place = $birth_place;

        return $this;
    }

    public function getBirthday(): ?\DateTimeImmutable
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeImmutable $birthday): static
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getSign(): ?string
    {
        return $this->sign;
    }

    public function setSign(string $sign): static
    {
        $this->sign = $sign;

        return $this;
    }

    public function getCinNumber(): ?string
    {
        return $this->cin_number;
    }

    public function setCinNumber(string $cin_number): static
    {
        $this->cin_number = $cin_number;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getFatherName(): ?string
    {
        return $this->father_name;
    }

    public function setFatherName(?string $father_name): static
    {
        $this->father_name = $father_name;

        return $this;
    }

    public function getMotherName(): ?string
    {
        return $this->mother_name;
    }

    public function setMotherName(string $mother_name): static
    {
        $this->mother_name = $mother_name;

        return $this;
    }

    public function getDoneIn(): ?\DateTimeImmutable
    {
        return $this->done_in;
    }

    public function setDoneIn(\DateTimeImmutable $done_in): static
    {
        $this->done_in = $done_in;

        return $this;
    }

    public function getVotePlace(): ?VotePlace
    {
        return $this->votePlace;
    }

    public function setVotePlace(?VotePlace $votePlace): static
    {
        $this->votePlace = $votePlace;

        return $this;
    }

    public function getCandidate(): ?Candidate
    {
        return $this->candidate;
    }

    public function setCandidate(?Candidate $candidate): static
    {
        $this->candidate = $candidate;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
