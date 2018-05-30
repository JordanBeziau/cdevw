<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 28/05/2018
 * Time: 12:25
 */

namespace AppBundle\Event;

use AppBundle\Entity\Book;
use Symfony\Component\EventDispatcher\Event;

class PostBookEvent extends Event
{
  protected $book;
  protected $message;

  function __construct($message, Book $book)
  {
    $this->setMessage($message);
    $this->setBook($book);
  }

  /**
   * @return mixed
   */
  public function getBook()
  {
    return $this->book;
  }

  /**
   * @param mixed $book
   */
  public function setBook($book)
  {
    $this->book = $book;
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

}