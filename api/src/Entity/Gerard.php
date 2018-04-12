<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 *
 * @ORM\Entity
 */
class Gerard
{
    /**
     * @var int The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string A nice person
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $name = '';

    /**
     * @var string A nice person
     *
     * @ORM\ManyToMany(targetEntity="Greeting")
     */
    public $greetings;
    /**
     * @var string A nice person
     *
     * @ORM\ManyToMany(targetEntity="Hello")
     */
    public $hellos;

    public function __construct()
    {
        $this->greetings = new ArrayCollection();
        $this->hellos = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }
}
