<?php

namespace App\Enum\Comentario;

use App\Enum\Label;

/**
 * Status possiveis nos comentarios.
 *
 * @method static Status NEW_COMMENT()
 * @method static Status APPROVED()
 * @method static Status DENIED()
 *
 * @author Thiago Hofmeister <thiago.hofmeister@gmail.com>
 */
class Status extends Label
{
    /** @var string Comentario novo. */
    const NEW_COMMENT = 'n';

    /** @var string Comentario aprovado. */
    const APPROVED = 'a';

    /** @var string Comentario reprovado. */
    const DENIED = 'd';

    /**
     * @inheritDoc
     */
    protected function getLabels()
    {
        return [
            self::NEW_COMMENT => "Novo",
            self::APPROVED => "Aprovado",
            self::DENIED => "Reprovado",
        ];
    }
}
