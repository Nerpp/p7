<?php

namespace App\Entity;

// use Webmozart\Assert\Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CustomerRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ApiResource(
 * attributes={"pagination_items_per_page"=5,"security"="is_granted('ROLE_USER')" },
 * collectionOperations={
 * "get",
 * "post"
 * },
 * 
 * itemOperations={
 * "get",
 * "put",
 * "delete"
 * },
 * 
 * 
 * )
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Email(message = "Votre mail n'est pas valide")
     */
    private $email;

    
    /**
     * @var User The owner
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="customer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
