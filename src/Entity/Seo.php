<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modelagem referente ao seo das paginas.
 *
 * @ORM\Entity
 * @ORM\Table(name="pagina_seos")
 */
class Seo extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", length=200)
     *
     * @var string $url
     */
    protected $url;

    /**
     * @ORM\Column(name="seo_title", type="string", length=180)
     *
     * @var string $seoTitle
     */
    protected $seoTitle;

    /**
     * @ORM\Column(name="seo_description", type="string", length=150)
     *
     * @var string $seoDescription
     */
    protected $seoDescription;

    /**
     * @ORM\Column(name="seo_spam_text", type="string", length=180)
     *
     * @var string $seoSpamText
     */
    protected $seoSpamText;

    /**
     * @ORM\Column(name="seo_open_graph", type="string", length=200)
     *
     * @var string $seoOpenGraph
     */
    protected $seoOpenGraph;

    /**
     * Retorna a propriedade {@see PaginaSeo::$url}.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Define a propriedade {@see PaginaSeo::$url}.
     *
     * @param string $url
     *
     * @return Seo
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Retorna a propriedade {@see PaginaSeo::$seoTitle}.
     *
     * @return string
     */
    public function getSeoTitle(): ?string
    {
        return $this->seoTitle;
    }

    /**
     * Define a propriedade {@see PaginaSeo::$seoTitle}.
     *
     * @param string $seoTitle
     *
     * @return Seo
     */
    public function setSeoTitle($seoTitle)
    {
        $this->seoTitle = $seoTitle;
        return $this;
    }

    /**
     * Retorna a propriedade {@see PaginaSeo::$seoDescription}.
     *
     * @return string
     */
    public function getSeoDescription(): ?string
    {
        return $this->seoDescription;
    }

    /**
     * Define a propriedade {@see PaginaSeo::$seoDescription}.
     *
     * @param string $seoDescription
     *
     * @return Seo
     */
    public function setSeoDescription($seoDescription)
    {
        $this->seoDescription = $seoDescription;
        return $this;
    }

    /**
     * Retorna a propriedade {@see PaginaSeo::$seoSpamText}.
     *
     * @return string
     */
    public function getSeoSpamText(): ?string
    {
        return $this->seoSpamText;
    }

    /**
     * Define a propriedade {@see PaginaSeo::$seoSpamText}.
     *
     * @param string $seoSpamText
     *
     * @return Seo
     */
    public function setSeoSpamText($seoSpamText)
    {
        $this->seoSpamText = $seoSpamText;
        return $this;
    }

    /**
     * Retorna a propriedade {@see PaginaSeo::$seoOpenGraph}.
     *
     * @return string
     */
    public function getSeoOpenGraph(): ?string
    {
        return $this->seoOpenGraph;
    }

    /**
     * Define a propriedade {@see PaginaSeo::$seoOpenGraph}.
     *
     * @param string $seoOpenGraph
     *
     * @return Seo
     */
    public function setSeoOpenGraph($seoOpenGraph)
    {
        $this->seoOpenGraph = $seoOpenGraph;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $toArray = [
            'url' => $this->getUrl(),
            'seoTitle' => $this->getSeoTitle(),
            'seoDescription' => $this->getSeoDescription(),
            'seoSpamText' => $this->getSeoSpamText(),
            'seoOpenGraph' => $this->getSeoOpenGraph(),
        ];

        /*$toArray = [
            'title' => [
                'inner' => $this->getSeoTitle()
            ]
        ];*/

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
        return (new Seo())
            ->setUrl($array['url'])
            ->setSeoTitle($array['seoTitle'])
            ->setSeoDescription($array['seoDescription'])
            ->setSeoSpamText($array['seoSpamText'])
            ->setSeoOpenGraph($array['seoOpenGraph']);
    }
}
