<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Void_;

use Serializable;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *     fields = {"email"},
 *     message = "Cet email est deja utilisé."
 * )
 * @UniqueEntity(
 *     fields = {"username"},
 *     message = "Le nom d'utilisateur doit être unique."
 * )
 */
class User implements UserInterface, Serializable // Pour que l'utilisateur soit sauvegardé au niveau de la session.
{
	public function __toString()
	{
		return $this->username;
	}

	/*
	const ROLES = [
		5 => 'Utilisateur',
		4 => 'Modérateur',
		3 => 'Contributeur',
		2 => 'Administrateur',
		1 => 'Super‑Administrateur',
		];
	*/

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

	//==============================================================================

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\Length(
	 *     min="3",
	 *     max="255",
	 *     minMessage="Le pseudonyme doit être de 3 caractères minimum.",
	 *     maxMessage="Le pseudonyme doit être de 255 caractères maximum.",
	 * )
	 */
	private $username;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\Length(
	 *     max="255",
	 *     maxMessage="Le pseudonyme doit être de 255 caractères maximum.",
	 * )
	 * @Assert\Email(
	 *     mode = "html5",
	 *     message = "Inséré une addresse valide.",
	 * )
	 */
	private $email;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\Length(
	 *      min = 6,
	 *      minMessage = "Le mot de passe doit contenir au minimum {{ limit }} caractères.",
	 * )
	 */
	private $password;

	/**
	 * @Assert\EqualTo(propertyPath="password", message = "Le mot de passe doit être identique.")
	 * @Assert\Length(
	 *      min = 6,
	 *      minMessage = "Le mot de passe doit contenir au minimum {{ limit }} caractères.",
	 * )
	 */
	private $confirmPassword;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\Length(
	 *     min="1",
	 *     max="255",
	 *     minMessage="Le prénom doit être de 1 caractères minimum.",
	 *     maxMessage="Le prénom doit être de 255 caractères maximum.",
	 * )
	 * @Assert\Regex(
	 *     pattern = "/^[a-zA-Z]+$/",
	 *     htmlPattern = "[A-Za-z]",
	 *     message = "Vous devez utilisé des lettres de l'alpha‑beta et vous pouvez aussi utiliser des hyphens ou trait de unions (-, ‑).",
	 * )
	 */
	private $first_name;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\Length(
	 *     min="1",
	 *     max="255",
	 *     minMessage="Le nom de famille doit être de 1 caractères minimum.",
	 *     maxMessage="Le nom de famille doit être de 255 caractères maximum.",
	 * )
	 * @Assert\Regex(
	 *     pattern = "/^[a-zA-Z]+$/",
	 *     htmlPattern = "[A-Za-z]",
	 *     message = "Vous devez utilisé des lettres de l'alpha‑beta et vous pouvez aussi utiliser des hyphens ou trait de unions (-, ‑).",
	 * )
	 */
	private $last_name;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $birth_day;

	//==============================================================================

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	private $presentation;

	//==============================================================================

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $inscription_date;

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
	 *     disallowEmptyMessage="Vous êtes obligé de choisir une image pour le utilisateur.",
	 *     notFoundMessage="Vous êtes obligé de choisir une image pour le utilisateur.",
	 * )
	 */
	private $image;

	//==============================================================================

	/**
	 * @ORM\Column(type="json")
	 */
	private $role = [];

	/**
	 * Returns the roles granted to the user.
	 *
	 *     public function getRoles()
	 *     {
	 *         return array('ROLE_USER');
	 *     }
	 *
	 * Alternatively, the roles might be stored on a ``roles`` property,
	 * and populated in any number of different ways when the user object
	 * is created.
	 *
	 * @return array (Role|integer)[] The user roles
	 */
	public function getRoles() /* : ?int : à mettre une fois le switch fait… */
	{
		// TODO: Implement getRoles() method.
		return $this->role;

		/*
		$i = $this->roles;

		switch ($i) {
			case 1:
				return ['ROLE_SUPER_ADMIN'];
				break;
			case 2:
				return ['ROLE_ADMIN'];
				break;
			case 3:
				return ['ROLE_CONTRIBUTOR'];
				break;
			case 4:
				return ['ROLE_MODERATOR'];
				break;
			case 5:
				return ['ROLE_USER'];
				break;
		}
		*/
	}

	public function getRole(): ?array
	{
		return $this->role;
	}

	public function setRole(array $role): self
	{
		$this->role = $role;

		return $this;
	}

	//==============================================================================

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\Notation", mappedBy="user", cascade={"persist", "remove"})
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
		if ($this !== $notation->getUser()) {
			$notation->setUser($this);
		}

		return $this;
	}

	//==============================================================================

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="user")
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
			$comment->setUser($this);
		}

		return $this;
	}

	public function removeComment(Comment $comment): self
	{
		if ($this->comments->contains($comment)) {
			$this->comments->removeElement($comment);
			// set the owning side to null (unless already changed)
			if ($comment->getUser() === $this) {
				$comment->setUser(null);
			}
		}

		return $this;
	}

	//==============================================================================


	public function getUsername(): ?string
	{
		// TODO: Implement getUsername() method.
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

	public function getPassword(): ?string
	{
		return $this->password;
	}

	public function setPassword(string $password): self
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getConfirmPassword()
	{
		return $this->confirmPassword;
	}

	/**
	 * @param mixed $confirmPassword
	 */
	public function setConfirmPassword($confirmPassword): void
	{
		$this->confirmPassword = $confirmPassword;
	}

	public function getFirstName(): ?string
	{
		return $this->first_name;
	}

	public function setFirstName(string $first_name): self
	{
		$this->first_name = $first_name;

		return $this;
	}

	public function getLastName(): ?string
	{
		return $this->last_name;
	}

	public function setLastName(string $last_name): self
	{
		$this->last_name = $last_name;

		return $this;
	}

	public function getBirthDay(): ?\DateTimeInterface
	{
		return $this->birth_day;
	}

	public function setBirthDay(\DateTimeInterface $birth_day): self
	{
		$this->birth_day = $birth_day;

		return $this;
	}

	public function getPresentation(): ?string
	{
		return $this->presentation;
	}

	public function setPresentation(?string $presentation): self
	{
		$this->presentation = $presentation;

		return $this;
	}

	public function getInscriptionDate(): ?\DateTimeInterface
	{
		return $this->inscription_date;
	}

	public function setInscriptionDate(\DateTimeInterface $inscription_date): self
	{
		$this->inscription_date = $inscription_date;

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

	/**
	 * Returns the salt that was originally used to encode the password.
	 *
	 * This can return null if the password was not encoded using a salt.
	 *
	 * @return string|null The salt
	 */
	public function getSalt()
	{
		// TODO: Implement getSalt() method.
		return null;
	}

	/**
	 * Returns the username used to authenticate the user.
	 *
	 * @return string The username
	 */

	/**
	 * Removes sensitive data from the user.
	 *
	 * This is important if, at any given point, sensitive information like
	 * the plain-text password is stored on this object.
	 */
	public function eraseCredentials()
	{
		// TODO: Implement eraseCredentials() method.
	}





	/**
	 * String representation of object
	 * @link https://php.net/manual/en/serializable.serialize.php
	 * @return string the string representation of the object or null
	 * @since 5.1.0
	 */
	public function serialize()
	{
		// TODO: Implement serialize() method.
		return serialize([
			$this->id,
			$this->username,
			$this->password,
			$this->first_name,
			$this->last_name,
			$this->birth_day,
			$this->presentation,
			$this->inscription_date,
			$this->image,
			$this->role,
		]);
	}

	/**
	 * Constructs the object
	 * @link https://php.net/manual/en/serializable.unserialize.php
	 * @param string $serialized <p>
	 * The string representation of the object.
	 * </p>
	 * @return void
	 * @since 5.1.0
	 */
	public function unserialize($serialized)
	{
		// TODO: Implement unserialize() method.
		list(
			$this->id,
			$this->username,
			$this->password,
			$this->first_name,
			$this->last_name,
			$this->birth_day,
			$this->presentation,
			$this->inscription_date,
			$this->image,
			$this->roles,
			) = unserialize($serialized, ['allowed_classes' => false]);
	}
}
