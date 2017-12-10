<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Translation from English to specified language
 * @ApiResource(
 *     attributes={
 *          "filters"={"search_filter", "order_filter"},
 *          "normalization_context"={"groups"={"translation"}},
 *          "denormalization_context"={"groups"={"translation"}},
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\TranslationRepository")
 * @ORM\Table(name="translations")
 * @UniqueEntity("key")
 */
class Translation
{
    /**
     * English word used as key
     * @Groups({"translation"})
     * @ORM\Id
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $key;

    /**
     * Language of translation
     * @var Language
     * @Groups({"translation"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Language", cascade={"persist"})
     * @ORM\JoinColumn(name="language", referencedColumnName="name", nullable=false)
     * @Assert\NotBlank()
     */
    private $language;

    /**
     * Text translated from English to specified language
     * @Groups({"translation"})
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $translation;

    public function getKey(): string
    {
        return $this->key;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }

    public function getTranslation(): string
    {
        return $this->translation;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function setLanguage(Language $language): void
    {
        $this->language = $language;
    }

    public function setTranslation(string $translation): void
    {
        $this->translation = $translation;
    }
}
