<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Modelagem referente as postagens.
 *
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */
class Post extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", length=180)
     *
     * @var string $titulo
     */
    protected $titulo;

    /**
     * @ORM\Column(type="string", length=150)
     *
     * @var string $imagem
     */
    protected $imagem;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @var string $slug
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @var string $migalha
     */
    protected $migalha;

    /**
     * @ORM\Column(type="text")
     *
     * @var string $conteudo
     */
    protected $conteudo;

    /**
     * @ORM\Column(name="data_postagem", type="datetime")
     *
     * @var \DateTime $dataPostagem
     */
    protected $dataPostagem;

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
     * @ORM\Column(name="possui_seo", type="boolean")
     *
     * @var bool $possuiSeo
     */
    protected $possuiSeo;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool $status
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     *
     * @var Usuario $usuario
     */
    protected $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumn(name="id_categoria", referencedColumnName="id")
     *
     * @var Categoria $categoria
     */
    protected $categoria;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="posts")
     * @ORM\JoinTable(name="post_tags",
     *      joinColumns={@ORM\JoinColumn(name="id_post", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_tag", referencedColumnName="id")}
     *      )
     *
     * @var Tag[] $tags
     */
    protected $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * Retorna a propriedade {@see Post::$titulo}.
     *
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * Define a propriedade {@see Post::$titulo}.
     *
     * @param string $titulo
     *
     * @return Post
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$imagem}.
     *
     * @return string
     */
    public function getImagem(): string
    {
        return $this->imagem;
    }

    /**
     * Define a propriedade {@see Post::$imagem}.
     *
     * @param string $imagem
     *
     * @return Post
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$slug}.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Define a propriedade {@see Post::$slug}.
     *
     * @param string $slug
     *
     * @return Post
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$migalha}.
     *
     * @return string
     */
    public function getMigalha(): string
    {
        return $this->migalha;
    }

    /**
     * Define a propriedade {@see Post::$migalha}.
     *
     * @param string $migalha
     *
     * @return Post
     */
    public function setMigalha($migalha)
    {
        $this->migalha = $migalha;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$conteudo}.
     *
     * @return string
     */
    public function getConteudo(): string
    {
        return $this->conteudo;
    }

    /**
     * Define a propriedade {@see Post::$conteudo}.
     *
     * @param string $conteudo
     *
     * @return Post
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$dataPostagem}.
     *
     * @return \DateTime
     */
    public function getDataPostagem(): \DateTime
    {
        return $this->dataPostagem;
    }

    /**
     * Define a propriedade {@see Post::$dataPostagem}.
     *
     * @param \DateTime $dataPostagem
     *
     * @return Post
     */
    public function setDataPostagem($dataPostagem)
    {
        $this->dataPostagem = $dataPostagem;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$seoTitle}.
     *
     * @return string
     */
    public function getSeoTitle(): string
    {
        return $this->seoTitle;
    }

    /**
     * Define a propriedade {@see Post::$seoTitle}.
     *
     * @param string $seoTitle
     *
     * @return Post
     */
    public function setSeoTitle($seoTitle)
    {
        $this->seoTitle = $seoTitle;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$seoDescription}.
     *
     * @return string
     */
    public function getSeoDescription(): string
    {
        return $this->seoDescription;
    }

    /**
     * Define a propriedade {@see Post::$seoDescription}.
     *
     * @param string $seoDescription
     *
     * @return Post
     */
    public function setSeoDescription($seoDescription)
    {
        $this->seoDescription = $seoDescription;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$seoSpamText}.
     *
     * @return string
     */
    public function getSeoSpamText(): string
    {
        return $this->seoSpamText;
    }

    /**
     * Define a propriedade {@see Post::$seoSpamText}.
     *
     * @param string $seoSpamText
     *
     * @return Post
     */
    public function setSeoSpamText($seoSpamText)
    {
        $this->seoSpamText = $seoSpamText;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$seoOpenGraph}.
     *
     * @return string
     */
    public function getSeoOpenGraph(): string
    {
        return $this->seoOpenGraph;
    }

    /**
     * Define a propriedade {@see Post::$seoOpenGraph}.
     *
     * @param string $seoOpenGraph
     *
     * @return Post
     */
    public function setSeoOpenGraph($seoOpenGraph)
    {
        $this->seoOpenGraph = $seoOpenGraph;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$possuiSeo}.
     *
     * @return bool
     */
    public function isPossuiSeo(): bool
    {
        return $this->possuiSeo;
    }

    /**
     * Define a propriedade {@see Post::$possuiSeo}.
     *
     * @param bool $possuiSeo
     *
     * @return Post
     */
    public function setPossuiSeo($possuiSeo)
    {
        $this->possuiSeo = $possuiSeo;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$status}.
     *
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * Define a propriedade {@see Post::$status}.
     *
     * @param bool $status
     *
     * @return Post
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$usuario}.
     *
     * @return Usuario
     */
    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    /**
     * Define a propriedade {@see Post::$usuario}.
     *
     * @param Usuario $usuario
     *
     * @return Post
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$categoria}.
     *
     * @return Categoria
     */
    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    /**
     * Define a propriedade {@see Post::$categoria}.
     *
     * @param Categoria $categoria
     *
     * @return Post
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Post::$tags}.
     *
     * @return Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Define a propriedade {@see Post::$tags}.
     *
     * @param Tag[] $tags
     *
     * @return Post
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        $this->tags->addPost($this);
        return $this;
    }

    /**
     * Adiciona uma tag na propriedade $tags.
     *
     * @param Tag $tag
     *
     * @return $this
     */
    public function addTag(Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }
}
