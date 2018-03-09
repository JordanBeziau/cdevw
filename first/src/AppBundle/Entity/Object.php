<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 09/03/2018
 * Time: 09:39
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Object
 * @ORM\Entity
 * @ORM\Table(name="first_props")
 */
class Object
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(name="properties", type="string", length=255, nullable=false, unique=true)
   */
  protected $properties;
}