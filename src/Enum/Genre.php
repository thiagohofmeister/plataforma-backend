<?php

namespace App\Enum;


/**
 * Generos disponiveis.
 *
 * @method static Genre FEMALE()
 * @method static Genre MALE()
 *
 * @author Thiago Hofmeister <thiago.hofmeister@gmail.com>
 */
final class Genre extends Label
{
    /** @var string Genero Feminino */
    const FEMALE = 'f';

    /** @var string Genero Masculino */
    const MALE = 'm';

    /**
     * @inheritDoc
     */
    protected function getLabels()
    {
        return [
            self::FEMALE => "Feminino",
            self::MALE => "Masculino"
        ];
    }
}
