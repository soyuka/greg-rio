<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\Patch;
use App\Dto\Device;
use App\Entity\User;
use App\State\EnableDeviceProvider;
use App\Validator\TwoFactorCode;
use Symfony\Component\Validator\Constraints\NotBlank;

#[Patch(
    inputFormats: ['json' => 'application/json'],
    uriTemplate: '/users/{userId}/two-factor/devices/{deviceId}',
    uriVariables: ['userId', 'deviceId'],
    provider: EnableDeviceProvider::class,
    validate: true,
)]
#[TwoFactorCode(withDeviceId: true)]
final class EnableDevice
{
    #[NotBlank]
    public string $code;

    #[NotBlank]
    public string $name;

    public function __construct(
        private readonly ?User $user,
        private readonly ?Device $device,
    ) {
    }
}
