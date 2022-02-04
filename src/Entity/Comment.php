<?php
/**
 * Created by PhpStorm.
 * User: nemzag aka Gazmen Arifi.
 * Date: 2018-12-10
 * Time: 13:55
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 * @Table(name="comment",uniqueConstraints={@ORM\UniqueConstraint(name="comment_constraint", columns={"user_id", "product_id"})})
 * @UniqueEntity(
 *     fields={"user", "product"},
 *     message="Vous avez déjà voté."
 * )
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\Type(
     *     type = "string",
     *     message = "Le commêntaire doit être de type texte, chiffres, lettres et ponctuation.",
     * )
     * @Assert\Length(
     *     min="4",
     *     max="2000",
     *     minMessage="La notation doit être de {{ limit }} caractères minimum.",
     *     maxMessage="Le notation doit être de {{ limit }} caractères maximum.",
     * )
     * @Assert\Regex(
     *     pattern = "/^[A-Za-z0-9 _.…«»,;‑-‧⁠]*$/",
     *     htmlPattern = "[A-Za-z0-9 _.…«»,;‑-‧⁠]*",
     *     message = "Le commêntaire doit être de type texte, chiffres, lettres et ponctuation.",
     * )
     */
    private $comment;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date_added;

	// @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comments")
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    //=======================================================================================

    // @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comments")
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

	public function getProduct(): ?Product
	{
		return $this->product;
	}

	public function setProduct(?Product $product): self
	{
		$this->product = $product;

		return $this;
	}

    //=======================================================================================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDateAdded(): ?\DateTimeInterface
    {
        return $this->date_added;
    }

    public function setDateAdded(?\DateTimeInterface $date_added): self
    {
        $this->date_added = $date_added;

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
