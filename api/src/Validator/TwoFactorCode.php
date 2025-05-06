<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_CLASS)]
final class TwoFactorCode extends Constraint
{
    public string $message = 'The string "{{ string }}" contains an illegal character: it can only contain letters or numbers.';

    public function __construct(
        public bool $withDeviceId
    ) {
        parent::__construct([], [], []);
    }

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }
}
