<?php

namespace App\Service;

use App\Contract;
use App\Enum\HttpStatusCode;
use App\Repository;

/**
 * Servico relacionado aos seos.
 *
 * @property Repository\Seo $serviceRespository
 *
 * @author Thiago Hofmeister <thiago.souza@moovin.com.br>
 */
class Seo extends Contract\Service
{
    /**
     * Retorna lista de postagens da Api.
     *
     * @inheritDoc
     */
    public function get($path = []): Base\Response
    {
        if (!empty($path)) {

            $seo = $this->serviceRespository->getByUrl($path);

        } else {

            $seo = $this->serviceRespository->getAll($this->limit, $this->getOffset());
        }

        if (!empty($seo)) {
            return Base\Response::create($seo, HttpStatusCode::OK());
        }

        return Base\Response::create(['message' => 'Nenhum seo encontrado.'], HttpStatusCode::OK());
    }
}
