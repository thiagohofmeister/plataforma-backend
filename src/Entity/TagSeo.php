<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modelagem referente ao seo do site.
 *
 * @ORM\Entity
 * @ORM\Table(name="tag_seos")
 */
class TagSeo extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", length=200)
     *
     * @var string $baseUrl
     */
    protected $baseUrl;

    /**
     * Retorna a propriedade {@see PaginaSeo::$url}.
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Define a propriedade {@see PaginaSeo::$url}.
     *
     * @param string $baseUrl
     *
     * @return TagSeo
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $toArray = [
            'baseUrl' => $this->getBaseUrl(),
        ];

        if (!empty($this->getId())) {
            $toArray['id'] = $this->getId();
        }

        return $toArray;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray($array)
    {
        return (new TagSeo())
            ->setBaseUrl($array['baseUrl']);
    }
}
