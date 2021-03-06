<?php

namespace App\Entity;

// use Webmozart\Assert\Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CustomerRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ApiResource(
 * attributes={"pagination_items_per_page"=5,"security"="is_granted('ROLE_USER')" },
 * collectionOperations={
 * "get",
 * "post"={
 *                  
 *                  "openapi_context"={
 *                                      
 *                                       "requestBody"={
 *                                                      "content"={
 *                                                                  "application/json"={
 *                                                                                       "schema"={
 *                                                                                                      "type"="object",
 *                                                                                                       "properties"={
 *                                                                                                                     "password"={"type"="string"},
 *                                                                                                                     "username" ={"type"="string"},
 *                                                                                                                     "name" ={"type"="string"},
 *                                                                                                                     "surname" ={"type"="string"},
 *                                                                                                                     "email" ={"type"="string"}
 *                          }
 *                      }
 *                  }
 *              }
 *         }
 *      }
 *                  
 * },
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
 * @UniqueEntity(fields={"email"})
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
     * @Assert\Regex(
     *      pattern="/[#?,;.??{}()`_@&~]/i",
     *      match=false,
     *      message="username ne doit pas contenir de caract??res sp??ciaux"
     * )
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

    /**
     * @ORM\Column(type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *      pattern="/[#?,;.??{}()`_@&~]/i",
     *      match=true,
     *      message="Name ne doit pas contenir de caract??res sp??ciaux"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *      pattern="/[#?,;.??{}()`_@&~]/i",
     *      match=true,
     *      message="Name ne doit pas contenir de caract??res sp??ciaux"
     * )
     */
    private $surname;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = filter_var ( $name, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = filter_var ( $surname, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

}
