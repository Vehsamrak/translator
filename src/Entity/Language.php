<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Language for translations
 * @ApiResource(
 *     attributes={
 *          "filters"={"search_filter", "order_filter"},
 *          "normalization_context"={"groups"={"translation"}},
 *          "denormalization_context"={"groups"={"translation"}},
 *     },
 *     itemOperations={
 *          "get"={"method"="GET"},
 *          "delete"={"method"="DELETE"},
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
     * @Groups({"translation"})
     * @ORM\Id
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
