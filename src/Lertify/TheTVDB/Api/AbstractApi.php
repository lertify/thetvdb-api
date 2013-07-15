<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Client;
use Lertify\TheTVDB\Api\Data\ArrayCollection;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

/**
 * Class AbstractApi
 * @package Lertify\TheTVDB\Api
 * @description Basic api
 */
abstract class AbstractApi implements ApiInterface
{

    /**
     * The client
     *
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritDoc}
     */
    public function get($class, $path, array $parameters = array(), $requestOptions = array())
    {
        return $this->deserializeResponse($class, $this->client->get($path, $parameters, $requestOptions));
    }

    /**
     * Process the response and convert it to class
     *
     * @param string $class
     * @param string $response
     * @return object
     */
    protected function deserializeResponse($class, $response)
    {
        $class = 'Lertify\TheTVDB\Api\Data\\'.$class;

        // Fix the response, tag names are a mess, lowercase all tags
        $response = preg_replace_callback("#(</?\w+)(.*?>)#", function($matches) {
            return strtolower($matches[1]) . $matches[2];
        }, $response);

        /** @var SerializerBuilder $builder */
        $builder = SerializerBuilder::create();

        $builder
            ->configureHandlers(function(HandlerRegistry $registry) {
                $registry->registerHandler('deserialization', 'Lertify\TheTVDB\Api\Data\ArrayCollection', 'xml',
                    function(XmlDeserializationVisitor $visitor, $data, array $type, DeserializationContext $context) {

                        // See above.
                        $type['name'] = 'array';

                        return new ArrayCollection($visitor->visitArray($data, $type, $context));
                    }
                );
            })
            ->configureListeners(function(EventDispatcher $dispatcher) {
                $dispatcher->addListener('serializer.pre_deserialize', function(PreDeserializeEvent $event) {
                    if ($event->getContext()->getDepth() > 1) {
                        return;
                    }

                    $type = $event->getType();

                    if (isset($type['params'][0]) && $type['params'][0]['name'] == 'single') {
                        $data = $event->getData();

                        foreach ($data as $child) {
                            $event->setData($child);

                            return;
                        }
                    }
                });
            })
        ;

        $serializer = $builder->build();

        return $serializer->deserialize($response, $class, 'xml');
    }

}
