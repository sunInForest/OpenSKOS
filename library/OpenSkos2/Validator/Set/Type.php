<?php

namespace OpenSkos2\Validator\Set;

use OpenSkos2\Validator\AbstractSetValidator;
use OpenSkos2\Set;

class Type extends AbstractSetValidator
{

    protected function validateSet(Set $resource)
    {
        return $this->validateType($resource);
    }
}
