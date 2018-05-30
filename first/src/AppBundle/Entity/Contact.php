<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 04/05/2018
 * Time: 09:48
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Object
 * @ORM\Entity
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(name="name", type="string", length=255, nullable=false)
   */
  protected $name;

  /**
   * @ORM\Column(name="email", type="string", length=255, nullable=false)
   */
  protected $email;

  /**
   * @ORM\Column(name="message", type="text", nullable=false)
   */
  protected $message;

  /**
   * @ORM\Column(name="answer", type="text", nullable=true)
   */
  protected $answer;

  /**
   * @ORM\Column(name="author", type="string", length=255, nullable=true)
   */
  protected $author;

  /**
   * @ORM\Column(name="updated_at", type="datetime", nullable=false)
   */
  protected $updatedAt;

  /**
   * @ORM\Column(name="created_at", type="datetime", nullable=false)
   */
  protected $createdAt;

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param mixed $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  /**
   * @return mixed
   */
  public function getMessage()
  {
    return $this->message;
  }

  /**
   * @param mixed $message
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }

  /**
   * @return mixed
   */
  public function getAnswer()
  {
    return $this->answer;
  }

  /**
   * @param mixed $answer
   */
  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }

  /**
   * @return mixed
   */
  public function getAuthor()
  {
    return $this->author;
  }

  /**
   * @param mixed $author
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }

  /**
   * @return mixed
   */
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }

  /**
   * @param mixed $updatedAt
   */
  public function setUpdatedAt($updatedAt)
  {
    $this->updatedAt = $updatedAt;
  }

  /**
   * @return mixed
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * @param mixed $createdAt
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }

  public function __toString()
  {
    return $this->getName();
  }
}