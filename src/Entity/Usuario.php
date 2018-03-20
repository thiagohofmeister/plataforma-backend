<?php

namespace App\Entity;

use App\Enum\Genre;
use MDW\Utils\Router;
use Doctrine\ORM\Mapping as ORM;

/**
 * Modelagem referente aos usuarios.
 *
 * @ORM\Entity
 * @ORM\Table(name="usuarios")
 */
class Usuario extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", length=200)
     *
     * @var string $imagem
     */
    protected $imagem;

    /**
     * @ORM\Column(type="string", length=70)
     *
     * @var string $nome
     */
    protected $nome;

    /**
     * @ORM\Column(type="string", length=150)
     *
     * @var string $email
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=1)
     *
     * @var Genre $genero
     */
    protected $genero;

    /**
     * @ORM\Column(type="string", length=120)
     *
     * @var string $facebook
     */
    protected $facebook;

    /**
     * @ORM\Column(type="string", length=120)
     *
     * @var string $googleplus
     */
    protected $googleplus;

    /**
     * @ORM\Column(type="string", length=60)
     *
     * @var string $twitter
     */
    protected $twitter;

    /**
     * @ORM\Column(type="string", length=60)
     *
     * @var string $password
     */
    protected $password;

    /**
     * @ORM\ManyToOne(targetEntity="Cargo")
     * @ORM\JoinColumn(name="id_cargo", referencedColumnName="id")
     *
     * @var Cargo $cargo
     */
    protected $cargo;

    /**
     * Retorna a propriedade {@see Usuario::$imagem}.
     *
     * @return string
     */
    public function getImagem(): string
    {
        return $this->imagem;
    }

    /**
     * Define a propriedade {@see Usuario::$imagem}.
     *
     * @param string $imagem
     *
     * @return Usuario
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Usuario::$nome}.
     *
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Define a propriedade {@see Usuario::$nome}.
     *
     * @param string $nome
     *
     * @return Usuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Usuario::$email}.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Define a propriedade {@see Usuario::$email}.
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Usuario::$genero}.
     *
     * @return string
     */
    public function getGenero(): string
    {
        return $this->genero;
    }

    /**
     * Define a propriedade {@see Usuario::$genero}.
     *
     * @param Genre $genero
     *
     * @return Usuario
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Usuario::$facebook}.
     *
     * @return string
     */
    public function getFacebook(): string
    {
        return $this->facebook;
    }

    /**
     * Define a propriedade {@see Usuario::$facebook}.
     *
     * @param string $facebook
     *
     * @return Usuario
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Usuario::$googleplus}.
     *
     * @return string
     */
    public function getGoogleplus(): string
    {
        return $this->googleplus;
    }

    /**
     * Define a propriedade {@see Usuario::$googleplus}.
     *
     * @param string $googleplus
     *
     * @return Usuario
     */
    public function setGoogleplus($googleplus)
    {
        $this->googleplus = $googleplus;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Usuario::$twitter}.
     *
     * @return string
     */
    public function getTwitter(): string
    {
        return $this->twitter;
    }

    /**
     * Define a propriedade {@see Usuario::$twitter}.
     *
     * @param string $twitter
     *
     * @return Usuario
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Usuario::$password}.
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Define a propriedade {@see Usuario::$password}.
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Retorna a propriedade {@see Usuario::$cargo}.
     *
     * @return Cargo
     */
    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    /**
     * Define a propriedade {@see Usuario::$cargo}.
     *
     * @param Cargo $cargo
     *
     * @return Usuario
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $toArray = [
            'imagem' => Router::parser($this->getImagem()),
            'nome' => $this->getNome(),
            'email' => $this->getEmail(),
            'facebook' => $this->getFacebook(),
            'googleplus' => $this->getGoogleplus(),
            'twitter' => $this->getTwitter(),
            'cargo' => $this->getCargo()->toArray(),
        ];

        try {
            $toArray['genero'] = Genre::memberByValue($this->getGenero())->getLabel();
        } catch (\Exception $exception) {
            // previne fatal error
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
        return (new Usuario())
            ->setImagem($array['imagem'])
            ->setNome($array['nome'])
            ->setEmail($array['email'])
            ->setGenero($array['genero'])
            ->setFacebook($array['facebook'])
            ->setGoogleplus($array['googleplus'])
            ->setTwitter($array['twitter'])
            ->setCargo($array['cargo']);
    }
}
