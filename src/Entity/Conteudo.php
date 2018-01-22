<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modelagem referente aos conteudos.
 *
 * @ORM\Entity
 * @ORM\Table(name="conteudos")
 */
class Conteudo extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", length=220)
     *
     * @var string $imagem
     */
    protected $imagem;

    /**
     * @ORM\Column(type="string", length=120)
     *
     * @var string $titulo
     */
    protected $titulo;

    /**
     * @ORM\Column(type="string", length=140)
     *
     * @var string $slug
     */
    protected $slug;

    /**
     * @ORM\Column(type="text")
     *
     * @var string $conteudo
     */
    protected $conteudo;

    /**
     * @ORM\Column(type="string", lenght=255)
     *
     * @var string $link
     */
    protected $link;

    /**
     * @ORM\ManyToOne(targetEntity="TipoConteudo")
     * @ORM\JoinColumn(name="id_tipo_conteudo", referencedColumnName="id")
     *
     * @var TipoConteudo $tipoConteudo
     */
    protected $tipoConteudo;

    /**
     * Retorna a propriedade {@see Conteudo::$imagem}.
     *
     * @return string
     */
    public function getImagem(): string
    {
        return $this->imagem;
    }

    /**
     * Define a propriedade {@see Conteudo::$imagem}.
     *
     * @param string $imagem
     *
     * @return Conteudo
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Conteudo::$titulo}.
     *
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * Define a propriedade {@see Conteudo::$titulo}.
     *
     * @param string $titulo
     *
     * @return Conteudo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Conteudo::$slug}.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Define a propriedade {@see Conteudo::$slug}.
     *
     * @param string $slug
     *
     * @return Conteudo
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Conteudo::$conteudo}.
     *
     * @return string
     */
    public function getConteudo(): string
    {
        return $this->conteudo;
    }

    /**
     * Define a propriedade {@see Conteudo::$conteudo}.
     *
     * @param string $conteudo
     *
     * @return Conteudo
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Conteudo::$link}.
     *
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * Define a propriedade {@see Conteudo::$link}.
     *
     * @param string $link
     *
     * @return Conteudo
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Conteudo::$tipoConteudo}.
     *
     * @return TipoConteudo
     */
    public function getTipoConteudo(): TipoConteudo
    {
        return $this->tipoConteudo;
    }

    /**
     * Define a propriedade {@see Conteudo::$tipoConteudo}.
     *
     * @param TipoConteudo $tipoConteudo
     *
     * @return Conteudo
     */
    public function setTipoConteudo($tipoConteudo)
    {
        $this->tipoConteudo = $tipoConteudo;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $toArray = [
            'imagem' => $this->getImagem(),
            'titulo' => $this->getTitulo(),
            'slug' => $this->getSlug(),
            'conteudo' => $this->getConteudo(),
            'link' => $this->getLink(),
            'tipoConteudo' => $this->getTipoConteudo(),
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
        return (new Conteudo())
            ->setImagem($array['imagem'])
            ->setTitulo($array['titulo'])
            ->setSlug($array['slug'])
            ->setConteudo($array['conteudo'])
            ->setLink($array['link'])
            ->setTipoConteudo($array['tipoConteudo']);
    }
}
