<?php

namespace App\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Generos disponiveis.
 *
 * @method static Genre GET()
 * @method static Genre POST()
 * @method static Genre PUT()
 * @method static Genre DELETE()
 *
 * @author Thiago Hofmeister <thiago.hofmeister@gmail.com>
 */
final class Genre extends AbstractEnumeration
{
    /** @var string Genero Feminino */
    const FEMALE = 'F';

    /** @var string Genero Masculino */
    const MALE = 'M';
}
