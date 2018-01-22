<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Modelagem referente as tags.
 *
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */
class Tag extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", length=70)
     *
     * @var string $nome
     */
    protected $nome;

    /**
     * @ORM\Column(type="string", length=120)
     *
     * @var string $slug
     */
    protected $slug;

    /**
     * @ORM\ManyToMany(targetEntity="Post", inversedBy="tags")
     * @ORM\JoinTable(name="post_tags",
     *      joinColumns={@ORM\JoinColumn(name="id_tag", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_post", referencedColumnName="id")}
     *      )
     *
     * @var Post[]
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * Retorna a propriedade {@see Tag::$nome}.
     *
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Define a propriedade {@see Tag::$nome}.
     *
     * @param string $nome
     *
     * @return Tag
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Tag::$slug}.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Define a propriedade {@see Tag::$slug}.
     *
     * @param string $slug
     *
     * @return Tag
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Tag::$posts}.
     *
     * @return Post[]
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Define a propriedade {@see Tag::$posts}.
     *
     * @param Post[] $posts
     *
     * @return Tag
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
        $this->posts->addTag($this);

        return $this;
    }

    /**
     * Adiciona um post na propriedade $posts.
     *
     * @param Post $post
     *
     * @return $this
     */
    public function addPost(Post $post)
    {
        $this->posts[] = $post;

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
        return (new Tag())
            ->setNome($array['nome'])
            ->setSlug($array['slug'])
            ->setPosts($array['posts']);
    }
}
