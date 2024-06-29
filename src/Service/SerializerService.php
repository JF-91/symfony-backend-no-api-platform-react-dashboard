<?php 
namespace  App\Service;

use Symfony\Component\Serializer\SerializerInterface;

class SerializerService
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function serialize($data, string $format, array $context = []): string
    {
        return $this->serializer->serialize($data, $format, $context);
    }

    public function deserialize(string $data, string $type, string $format, array $context = []): object
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }


    public function serializeDto($data, string $format, array $context = []): string
    {
        return $this->serializer->serialize($data, $format, $context);
    }

    public function deserializeDto(string $data, string $type, string $format, array $context = []): object
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }
}