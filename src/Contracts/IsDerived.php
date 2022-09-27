<?php

namespace MiBo\Properties\Contracts;

/**
 * Class IsDerived
 *
 * @package MiBo\Properties\Contracts
 */
trait IsDerived
{
    /** @var \MiBo\Properties\Contracts\Derivable[] */
    protected array $requiredQuantities = [];

    /**
     * @return \MiBo\Properties\Contracts\Derivable[]
     */
    public function getRequiredQuantities(): array
    {
        return $this->requiredQuantities;
    }
}
