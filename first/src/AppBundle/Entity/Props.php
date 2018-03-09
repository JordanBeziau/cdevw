<?php
/**
 * Created by PhpStorm.
 * User: jordanbeziau
 * Date: 09/03/2018
 * Time: 09:53
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Props
 * @ORM\Entity
 * @ORM\Table(name="sec_props")
 */
class Props
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(name="properties", type="string", length=255, nullable=false)
   */
  protected $properties;

  /**
   * @ORM\Column(name="parent_propertie", type="string", length=255, nullable=false)
   */
  protected $parentPropertie;
}