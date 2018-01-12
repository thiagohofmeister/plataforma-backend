<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @todo Document class Post.
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Post extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $image;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $slug;

    /**
     * Get array copy of object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Get photo id
     *
     * @ORM\return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get photo title
     *
     * @ORM\return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get photo slug
     *
     * @ORM\return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get photo image
     *
     * @ORM\return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
