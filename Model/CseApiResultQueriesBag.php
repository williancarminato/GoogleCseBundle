<?php

namespace Carminato\GoogleCseBundle\Model;

use Symfony\Component\HttpFoundation\ParameterBag;

class CseApiResultQueriesBag extends ParameterBag
{
    /**
     * @return CseApiResultQueryItem|null
     */
    public function getRequestPage()
    {
        if ($this->has('request')) {
            return $this->get('request');
        }

        return null;
    }

    /**
     * @return CseApiResultQueryItem|null
     */
    public function getPreviousPage()
    {
        if ($this->has('previousPage')) {
            return $this->get('previousPage');
        }

        return null;
    }

    /**
     * @return CseApiResultQueryItem|null
     */
    public function getNextPage()
    {
        if ($this->has('nextPage')) {
            return $this->get('nextPage');
        }

        return null;
    }
}