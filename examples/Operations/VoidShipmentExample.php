<?php

declare(strict_types=1);

namespace Prefabcortex\UpsShip\Examples\Operations;

use Prefabcortex\UpsShip\Client;
use Prefabcortex\UpsShip\Exception\ApiException;
use Prefabcortex\UpsShip\Exception\MalformedResponseException;
use Prefabcortex\UpsShip\Exception\ResponseValidationException;
use Prefabcortex\UpsShip\Exception\TransportException;
use Prefabcortex\UpsShip\Exception\UnexpectedContentTypeException;
use Prefabcortex\UpsShip\Exception\UnexpectedStatusCodeException;
use Prefabcortex\UpsShip\Exception\UnsupportedValueException;
use Prefabcortex\UpsShip\Exception\VoidShipmentBadRequestException;
use Prefabcortex\UpsShip\Exception\VoidShipmentForbiddenException;
use Prefabcortex\UpsShip\Exception\VoidShipmentTooManyRequestsException;
use Prefabcortex\UpsShip\Exception\VoidShipmentUnauthorizedException;
use Prefabcortex\UpsShip\Model\VOIDSHIPMENTResponseWrapper;
use Prefabcortex\UpsShip\Parameter\VoidShipmentHeaderParameters;
use Prefabcortex\UpsShip\Parameter\VoidShipmentQueryParameters;

final class VoidShipmentExample
{
    /**
     * The Void Shipping API is used to cancel the previously scheduled shipment.
     *
     * Usage: pass an already-authenticated Client (see examples/Auth/).
     *
     *   $client = Client::withOAuth($token, $config); // see examples/Auth/
     *   $queryParameters = new VoidShipmentQueryParameters();
     *   $headerParameters = new VoidShipmentHeaderParameters();
     *   VoidShipmentExample::voidShipment($client, $shipmentidentificationnumber, $version, $queryParameters, $headerParameters);
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws VoidShipmentBadRequestException
     * @throws VoidShipmentUnauthorizedException
     * @throws VoidShipmentForbiddenException
     * @throws VoidShipmentTooManyRequestsException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function voidShipment(
        Client $client,
        string $shipmentidentificationnumber,
        string $version,
        VoidShipmentQueryParameters $queryParameters,
        VoidShipmentHeaderParameters $headerParameters,
    ): VOIDSHIPMENTResponseWrapper {
        return $client->voidShipment(
            $shipmentidentificationnumber,
            $version,
            $queryParameters,
            $headerParameters,
        );
    }
}
