<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\NotationRepository")
 * @Table(name="notation",uniqueConstraints={@ORM\UniqueConstraint(name="notation_constraint", columns={"user_id", "product_id"})})
 * @UniqueEntity(
 *     fields={"user", "product"},
 *     message="Vous avez déjà voté."
 * )
 */
class Notation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(
     *     type = "integer",
     *     message = "La notation doit être de type chiffre entier.",
     * )
     * @Assert\Length(
     *     min="1",
     *     max="1",
     *     minMessage="La notation doit être de 1 caractères minimum.",
     *     maxMessage="Le notation doit être de 1 caractères maximum.",
     * )
     * @Assert\LessThanOrEqual(
     *     value="5",
     *     message="La notation doit être plus petite ou égal à 5.",
     * )
     * @Assert\GreaterThanOrEqual(
     *     value="0",
     *     message="La notation doit être plus grande ou égal à 0.",
     * )
     */
    public $notation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="notation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
	public $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="notation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
	public $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNotation(): ?int
    {
        return $this->notation;
    }

    public function setNotation(?int $notation): self
    {
        $this->notation = $notation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}