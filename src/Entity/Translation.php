<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Translation from English to specified language
 * @ApiResource(attributes={"filters"={"translation.search_filters", "translation.order_filter"}})
 * @ORM\Entity(repositoryClass="App\Repository\TranslationRepository")
 * @ORM\Table(name="translations")
 * @UniqueEntity("key")
 */
class Translation
{
    /**
     * English word used as key
     * @ORM\Id
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $key;

    /**
     * Language of translation
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $language;

    /**
     * Text translated from English to specified language
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $translation;

    public function __construct(string $key, string $language, string $translation)
    {
        $this->key = $key;
        $this->language = $language;
        $this->translation = $translation;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getLanguage(): string
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

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function setTranslation(string $translation): void
    {
        $this->translation = $translation;
    }
}
