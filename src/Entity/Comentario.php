<?php

namespace App\Entity;

use App\Enum;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Modelagem referente aos comentarios.
 *
 * @ORM\Entity
 * @ORM\Table(name="comentarios")
 */
class Comentario extends AbstractEntity
{
    /**
     * @ORM\Column(name="nome_autor", type="string", length=80)
     *
     * @var string $nomeAutor
     */
    protected $nomeAutor;

    /**
     * @ORM\Column(type="string", length=150)
     *
     * @var string $email
     */
    protected $email;

    /**
     * @ORM\Column(name="comentario_texto", type="string", length=250)
     *
     * @var string $comentarioTexto
     */
    protected $comentarioTexto;

    /**
     * @ORM\Column(type="string", length=1)
     *
     * @var string $status
     */
    protected $status;

    /**
     * @ORM\Column(name="data_comentario", type="datetime")
     *
     * @var \DateTime $dataComentario
     */
    protected $dataComentario;

    /**
     * @ORM\ManyToOne(targetEntity="Comentario")
     * @ORM\JoinColumn(name="id_comentario_parent", referencedColumnName="id")
     *
     * @var Comentario $comentarioParent
     */
    protected $comentarioParent;

    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="comentarios")
     * @ORM\JoinColumn(name="id_post", referencedColumnName="id")
     *
     * @var Post $post
     */
    protected $post;

    /**
     * Retorna a propriedade {@see Comentario::$nomeAutor}.
     *
     * @return string
     */
    public function getNomeAutor(): string
    {
        return $this->nomeAutor;
    }

    /**
     * Define a propriedade {@see Comentario::$nomeAutor}.
     *
     * @param string $nomeAutor
     *
     * @return Comentario
     */
    public function setNomeAutor($nomeAutor)
    {
        $this->nomeAutor = $nomeAutor;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Comentario::$email}.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Define a propriedade {@see Comentario::$email}.
     *
     * @param string $email
     *
     * @return Comentario
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Comentario::$comentarioTexto}.
     *
     * @return string
     */
    public function getComentarioTexto(): string
    {
        return $this->comentarioTexto;
    }

    /**
     * Define a propriedade {@see Comentario::$comentarioTexto}.
     *
     * @param string $comentarioTexto
     *
     * @return Comentario
     */
    public function setComentarioTexto($comentarioTexto)
    {
        $this->comentarioTexto = $comentarioTexto;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Comentario::$status}.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Define a propriedade {@see Comentario::$status}.
     *
     * @param string $status
     *
     * @return Comentario
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Comentario::$dataComentario}.
     *
     * @return \DateTime
     */
    public function getDataComentario(): \DateTime
    {
        return $this->dataComentario;
    }

    /**
     * Define a propriedade {@see Comentario::$dataComentario}.
     *
     * @param \DateTime $dataComentario
     *
     * @return Comentario
     */
    public function setDataComentario($dataComentario)
    {
        $this->dataComentario = $dataComentario;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Comentario::$comentarioParent}.
     *
     * @return Comentario
     */
    public function getComentarioParent(): ?Comentario
    {
        return $this->comentarioParent;
    }

    /**
     * Define a propriedade {@see Comentario::$comentarioParent}.
     *
     * @param Comentario $comentarioParent
     *
     * @return Comentario
     */
    public function setComentarioParent($comentarioParent)
    {
        $this->comentarioParent = $comentarioParent;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Comentario::$post}.
     *
     * @return Post
     */
    public function getPost(): Post
    {
        return $this->post;
    }

    /**
     * Define a propriedade {@see Comentario::$post}.
     *
     * @param Post $post
     *
     * @return Comentario
     */
    public function setPost($post)
    {
        $this->post = $post;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $toArray = [
            'nomeAutor' => $this->getNomeAutor(),
            'email' => $this->getEmail(),
            'comentarioTexto' => $this->getComentarioTexto(),
            'status' => Enum\Comentario\Status::memberByValue($this->getStatus())->getLabel(),
            'dataComentario' => $this->getDataComentario()->format('d/m/Y'),
        ];

        if (!empty($this->getComentarioParent())) {
            $toArray['comentarioPai'] = $this->getComentarioParent()->toArray();
        }

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
        return (new Comentario())
            ->setNomeAutor($array['nomeAutor'])
            ->setEmail($array['email'])
            ->setComentarioTexto($array['comentarioTexto'])
            ->setStatus($array['status'])
            ->setDataComentario($array['dataComentario'])
            ->setComentarioParent($array['comentarioParent'])
            ->setPost($array['post']);
    }
}
