<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modelagem referente as categorias.
 *
 * @ORM\Entity
 * @ORM\Table(name="categorias")
 */
class Categoria extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", length=30)
     *
     * @var string $nome
     */
    protected $nome;

    /**
     * @ORM\Column(type="string", length=50)
     *
     * @var string $slug
     */
    protected $slug;

    /**
     * @ORM\Column(type="text")
     *
     * @var string $descricao
     */
    protected $descricao;

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
     * @ORM\Column(type="boolean")
     *
     * @var bool $status
     */
    protected $status;

    /**
     * Retorna a propriedade {@see Categoria::$nome}.
     *
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Define a propriedade {@see Categoria::$nome}.
     *
     * @param string $nome
     *
     * @return Categoria
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Categoria::$slug}.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Define a propriedade {@see Categoria::$slug}.
     *
     * @param string $slug
     *
     * @return Categoria
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Categoria::$descricao}.
     *
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * Define a propriedade {@see Categoria::$descricao}.
     *
     * @param string $descricao
     *
     * @return Categoria
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Categoria::$seoTitle}.
     *
     * @return string
     */
    public function getSeoTitle(): string
    {
        return $this->seoTitle;
    }

    /**
     * Define a propriedade {@see Categoria::$seoTitle}.
     *
     * @param string $seoTitle
     *
     * @return Categoria
     */
    public function setSeoTitle($seoTitle)
    {
        $this->seoTitle = $seoTitle;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Categoria::$seoDescription}.
     *
     * @return string
     */
    public function getSeoDescription(): string
    {
        return $this->seoDescription;
    }

    /**
     * Define a propriedade {@see Categoria::$seoDescription}.
     *
     * @param string $seoDescription
     *
     * @return Categoria
     */
    public function setSeoDescription($seoDescription)
    {
        $this->seoDescription = $seoDescription;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Categoria::$seoSpamText}.
     *
     * @return string
     */
    public function getSeoSpamText(): string
    {
        return $this->seoSpamText;
    }

    /**
     * Define a propriedade {@see Categoria::$seoSpamText}.
     *
     * @param string $seoSpamText
     *
     * @return Categoria
     */
    public function setSeoSpamText($seoSpamText)
    {
        $this->seoSpamText = $seoSpamText;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Categoria::$seoOpenGraph}.
     *
     * @return string
     */
    public function getSeoOpenGraph(): string
    {
        return $this->seoOpenGraph;
    }

    /**
     * Define a propriedade {@see Categoria::$seoOpenGraph}.
     *
     * @param string $seoOpenGraph
     *
     * @return Categoria
     */
    public function setSeoOpenGraph($seoOpenGraph)
    {
        $this->seoOpenGraph = $seoOpenGraph;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Categoria::$status}.
     *
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * Define a propriedade {@see Categoria::$status}.
     *
     * @param bool $status
     *
     * @return Categoria
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $toArray = [
            'nome' => $this->getNome(),
            'slug' => $this->getSlug(),
            'descricao' => $this->getDescricao(),
            'seoTitle' => $this->getSeoTitle(),
            'seoDescription' => $this->getSeoDescription(),
            'seoSpamText' => $this->getSeoSpamText(),
            'seoOpenGraph' => $this->getSeoOpenGraph(),
            'status' => $this->isStatus(),
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
        return (new Categoria())
            ->setNome($array['nome'])
            ->setSlug($array['slug'])
            ->setDescricao($array['descricao'])
            ->setSeoTitle($array['seoTitle'])
            ->setSeoDescription($array['seoDescription'])
            ->setSeoSpamText($array['seoSpamText'])
            ->setSeoOpenGraph($array['seoOpenGraph'])
            ->setStatus($array['status']);
    }
}
