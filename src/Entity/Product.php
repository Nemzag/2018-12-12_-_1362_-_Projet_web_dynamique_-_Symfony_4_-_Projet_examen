<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

	public function getId(): ?int
	{
		return $this->id;
	}

	//====================================================================================

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min="3",
     *     max="255",
     *     minMessage="Le nom doit être de 3 caractères minimum.",
     *     maxMessage="Le nom doit être de 255 caractères maximum.",
     * )
     */
    private $name;

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	//====================================================================================

    // *     pattern = "/^(\d*\.)?\d{2}+$/",
    /**
     * @ORM\Column(type="float")
     * @Assert\Type(
     *     type = "float",
     *     message = "Votre prix contenir que des chiffres et la décimale doit être representé par un point et deux chiffres minimum & maximum."
     * )
     * @Assert\Regex(
     *     pattern = "/^(\d+\.{0,1}\d{0,2})$/",
     *     htmlPattern = "[0-9]\.[0-9]{2}",
     *     message = "Votre prix contenir que des chiffres et la décimale doit être representé par un point et deux chiffres minimum & maximum.",
     * )
     */
    private $price;

	public function getPrice(): ?float
	{
		return $this->price;
	}

	public function setPrice(float $price): self
	{
		$this->price = $price;

		return $this;
	}

	//====================================================================================

    /**
     * @ORM\Column(type="text")
     */
    private $description;

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(string $description): self
	{
		$this->description = $description;

		return $this;
	}

	//====================================================================================

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Range(
     *     min = 0,
     *     max = 99,
     *     minMessage = "La promotion doit être au minimum de {{ limit }}%.",
     *     maxMessage = "La promotion doit être au maximum de {{ limit }}%."
     * )
     */
    private $promotion;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min = 1,
     *     max = 255,
     *     minMessage = "L'image doit être cômposé de au moins {{ limit }} caractère.",
     *     maxMessage = "L'image doit être cômposé de au plus {{ limit }} caractères."
     * )
     * @Assert\Image(
     *     mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/gif"},
     *     mimeTypesMessage = "Ce fichier n'est pas une image valide.",
     *     minWidthMessage = "Cette image a une largeur trop petite.",
     *     minHeightMessage = "Cette image a une hauteur trop petite.",
     *     minWidth = "100",
     *     minHeight = "100",
     *     disallowEmptyMessage="Vous êtes obligé de choisir une image pour le produit.",
     *     notFoundMessage="Vous êtes obligé de choisir une image pour le produit.",
     * )
     */
    public $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", cascade={"persist"})
     */
    private $category;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_added;

	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\User", cascade={"persist"})
	 */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url(
     *     message = "Ecrivez une addresse valide (HTTP ou HTTPS).",
     *     protocols = {"http", "https"},
     * )
     */
    private $url;

    // ────────────────────────────────────────────────────────────────────────

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notation", mappedBy="product", cascade={"persist", "remove"})
     */
    private $notation;

	public function getNotation(): ?Notation
	{
		return $this->notation;
	}

	public function setNotation(Notation $notation): self
	{
		$this->notation = $notation;

		// set the owning side of the relation if necessary
		if ($this !== $notation->getProduct()) {
			$notation->setProduct($this);
		}

		return $this;
	}

	// ────────────────────────────────────────────────────────────────────────

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="product")
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

	/**
	 * @return Collection|Comment[]
	 */
	public function getComments(): Collection
	{
		return $this->comments;
	}

	public function addComment(Comment $comment): self
	{
		if (!$this->comments->contains($comment)) {
			$this->comments[] = $comment;
			$comment->setProduct($this);
		}

		return $this;
	}

	public function removeComment(Comment $comment): self
	{
		if ($this->comments->contains($comment)) {
			$this->comments->removeElement($comment);
			// set the owning side to null (unless already changed)
			if ($comment->getProduct() === $this) {
				$comment->setProduct(null);
			}
		}

		return $this;
	}

    public function getPromotion(): ?int
    {
        return $this->promotion;
    }

    public function setPromotion(int $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDateAdded(): ?\DateTimeInterface
    {
        return $this->date_added;
    }

    public function setDateAdded(\DateTimeInterface $date_added): self
    {
        $this->date_added = $date_added;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    // public function setUser(int $user): self
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

}
