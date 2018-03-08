<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 08/03/2018
 * Time: 09:48
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
   */
  protected $address;

  public function __construct()
  {
    parent::__construct();
    // your own logic
  }

  /**
   * @return mixed
   */
  public function getAddress()
  {
    return $this->address;
  }

  /**
   * @param mixed $address
   */
  public function setAddress($address)
  {
    $this->address = $address;
  }

  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * @param string $username
   */
  public function setUsername($username)
  {
    $this->username = $username;
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
   * @return bool
   */
  public function isEnabled()
  {
    return $this->enabled;
  }

  /**
   * @param bool $enabled
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }

  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @param string $password
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }

  /**
   * @return \DateTime|null
   */
  public function getLastLogin()
  {
    return $this->lastLogin;
  }
}