<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\TranslationRepository")
 * @ORM\Table(name="translations")
 */
class Translation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    private $key;

    /**
     * @ORM\Column(type="string")
     */
    private $language;

    /**
     * @ORM\Column(type="string")
     */
    private $translation;

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
