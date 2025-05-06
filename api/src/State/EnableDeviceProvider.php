<?php

namespace App\State;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\Metadata\Operation\Factory\OperationMetadataFactoryInterface;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\EnableDevice;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * @implements ProviderInterfac<EnableDevice>
 */
class EnableDeviceProvider implements ProviderInterface
{
    /**
     * @param ProviderInterface<User> $doctrineProvider
     * @param ProviderInterface<Device> $deviceId
     */
    public function __construct(
        private OperationMetadataFactoryInterface $operationMetadataFactory,
        #[Autowire(service: 'api_platform.doctrine.orm.state.item_provider')] private ProviderInterface $doctrineProvider,
        #[Autowire(service: DeviceProvider::class)] private ProviderInterface $deviceProvider,
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object
    {
        return new EnableDevice(
            user: $this->doctrineProvider->provide($this->operationMetadataFactory->create('_api_/users/{id}{._format}_get'), ['id' => $uriVariables['userId']]),
            device: $this->deviceProvider->provide(new Get(), ['id' => $uriVariables['deviceId']])
        );
    }
}
