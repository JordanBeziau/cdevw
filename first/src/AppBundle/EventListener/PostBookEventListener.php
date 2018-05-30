<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 28/05/2018
 * Time: 14:57
 */

namespace AppBundle\EventListener;


use AppBundle\Event\PostBookEvent;

class PostBookEventListener
{
  protected $mailer;

  public function __construct(\Swift_Mailer $mailer)
  {
    $this->mailer = $mailer;
  }

  public function processBookPost(PostBookEvent $event)
  {
    $message = new \Swift_Message();
    $message
      ->setSubject($event->getMessage())
      ->setBody($event->getBook()->getName())
      ->setFrom('jordanbeziau@mail.com')
      ->setTo('jordanbeziau@gmail.com');
    $this->mailer->send($message);
  }
}