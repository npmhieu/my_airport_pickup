<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Booking
 *
 * @ORM\Table(name="tblUser")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   *
   * @ORM\Column(type="string", length=255)
   */
  private $fullname;

  /**
   * @var string
   *
   * @ORM\Column(type="string", length=256, unique=true)
   */
  private $email;

  /**
   * @var string
   *
   * @ORM\Column(type="string")
   */
  private $phone;

  /**
   * @var int
   *
   * @ORM\Column(type="string", length=256)
   */
  private $password;


  private $repeatPassword;

  /**
   * @var int
   *
   * @ORM\Column(type="integer")
   */
  private $role;

  /**
   * @var int
   *
   * @ORM\Column(type="integer")
   * 0 = inactive
   * 1 = active
   */
  private $status;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="created_date", type="datetime")
   */
  private $createdDate;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="updated_date", type="datetime", nullable=true)
   */
  private $updatedDate;


  /**
   * Poll constructor.
   *
   * @param $anwsers
   */
  public function __construct()
  {
    $this->createdDate = new \DateTime();
    $this->status = 1;
  }

  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getFullname()
  {
    return $this->fullname;
  }

  /**
   * @param string $fullname
   */
  public function setFullname($fullname)
  {
    $this->fullname = $fullname;
  }

  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  /**
   * @return string
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * @param string $phone
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }

  /**
   * @return int
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @param int $password
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }

  /**
   * @return mixed
   */
  public function getRepeatPassword()
  {
    return $this->repeatPassword;
  }

  /**
   * @param mixed $repeatPassword
   */
  public function setRepeatPassword($repeatPassword)
  {
    $this->repeatPassword = $repeatPassword;
  }

  public function getBatKyCaiGi()
  {
    return "Ai ma biet ne";
  }



  /**
   * @return int
   */
  public function getRole()
  {
    return $this->role;
  }

  /**
   * @param int $role
   */
  public function setRole($role)
  {
    $this->role = $role;
  }

  /**
   * @return \DateTime
   */
  public function getCreatedDate()
  {
    return $this->createdDate;
  }

  /**
   * @param \DateTime $createdDate
   */
  public function setCreatedDate($createdDate)
  {
    $this->createdDate = $createdDate;
  }

  /**
   * @return \DateTime
   */
  public function getUpdatedDate()
  {
    return $this->updatedDate;
  }

  /**
   * @param \DateTime $updatedDate
   */
  public function setUpdatedDate($updatedDate)
  {
    $this->updatedDate = $updatedDate;
  }

  /**
   * String representation of object
   * @link http://php.net/manual/en/serializable.serialize.php
   * @return string the string representation of the object or null
   * @since 5.1.0
   */
  public function serialize()
  {
    return serialize(array(
      $this->id,
      $this->email,
      $this->password
    ));
  }

  /**
   * Constructs the object
   * @link http://php.net/manual/en/serializable.unserialize.php
   * @param string $serialized <p>
   * The string representation of the object.
   * </p>
   * @return void
   * @since 5.1.0
   */
  public function unserialize($serialized)
  {
    list (
      $this->id,
      $this->email,
      $this->password,
      ) = unserialize($serialized);
  }

  /**
   * Checks whether the user's account has expired.
   *
   * Internally, if this method returns false, the authentication system
   * will throw an AccountExpiredException and prevent login.
   *
   * @return bool true if the user's account is non expired, false otherwise
   *
   * @see AccountExpiredException
   */
  public function isAccountNonExpired()
  {
    return true;
  }

  /**
   * Checks whether the user is locked.
   *
   * Internally, if this method returns false, the authentication system
   * will throw a LockedException and prevent login.
   *
   * @return bool true if the user is not locked, false otherwise
   *
   * @see LockedException
   */
  public function isAccountNonLocked()
  {
    return true;
  }

  /**
   * Checks whether the user's credentials (password) has expired.
   *
   * Internally, if this method returns false, the authentication system
   * will throw a CredentialsExpiredException and prevent login.
   *
   * @return bool true if the user's credentials are non expired, false otherwise
   *
   * @see CredentialsExpiredException
   */
  public function isCredentialsNonExpired()
  {
    return true;
  }

  /**
   * Checks whether the user is enabled.
   *
   * Internally, if this method returns false, the authentication system
   * will throw a DisabledException and prevent login.
   *
   * @return bool true if the user is enabled, false otherwise
   *
   * @see DisabledException
   */
  public function isEnabled()
  {
    return $this->status == 1;
  }

  /**
   * Returns the roles granted to the user.
   *
   *     public function getRoles()
   *     {
   *         return ['ROLE_USER'];
   *     }
   *
   * Alternatively, the roles might be stored on a ``roles`` property,
   * and populated in any number of different ways when the user object
   * is created.
   *
   * @return (Role|string)[] The user roles
   */
  public function getRoles()
  {
    if ($this->role == 1) {
      return ["ROLE_ADMIN"];
    }

    if ($this->role == 2) {
      return ["ROLE_SALE_ADMIN"];
    }

    if ($this->role == 3) {
      return ["ROLE_DRIVER"];
    }

    if ($this->role == 4) {
      return ["ROLE_NORMAL_USER"];
    }

    return ["ROLE_NORMAL_USER"];
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
  }

  /**
   * Returns the username used to authenticate the user.
   *
   * @return string The username
   */
  public function getUsername()
  {
    return $this->email;
  }

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
}
