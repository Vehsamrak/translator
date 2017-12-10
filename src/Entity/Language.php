<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Language for translations
 * @ApiResource(
 *     attributes={"filters"={"search_filter", "order_filter"}},
 *     itemOperations={
 *      "get"={"method"="GET"},
 *      "delete"={"method"="DELETE"},
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\LanguageRepository")
 * @ORM\Table(name="languages")
 * @UniqueEntity("name")
 */
class Language
{
    /**
     * Name of the language
     * @var string
     * @ORM\Id
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }
}
