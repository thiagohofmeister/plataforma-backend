<?php

namespace App\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Tipos de métodos Http
 *
 * @method static Genre GET()
 * @method static Genre POST()
 * @method static Genre PUT()
 * @method static Genre DELETE()
 *
 * @author Thiago Hofmeister <thiago.hofmeister@gmail.com>
 */
final class HttpMethod extends AbstractEnumeration
{
    /** @var string Método GET */
    const GET = 'GET';

    /** @var string Método POST */
    const POST = 'POST';

    /** @var string Método PUT */
    const PUT = 'PUT';

    /** @var string Método DELETE */
    const DELETE = 'DELETE';
}
