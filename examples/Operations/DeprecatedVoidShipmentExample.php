<?php

declare(strict_types=1);

namespace Prefabcortex\UpsShip\Examples\Operations;

use Prefabcortex\UpsShip\Client;
use Prefabcortex\UpsShip\Exception\ApiException;
use Prefabcortex\UpsShip\Exception\DeprecatedVoidShipmentBadRequestException;
use Prefabcortex\UpsShip\Exception\DeprecatedVoidShipmentForbiddenException;
use Prefabcortex\UpsShip\Exception\DeprecatedVoidShipmentTooManyRequestsException;
use Prefabcortex\UpsShip\Exception\DeprecatedVoidShipmentUnauthorizedException;
use Prefabcortex\UpsShip\Exception\MalformedResponseException;
use Prefabcortex\UpsShip\Exception\ResponseValidationException;
use Prefabcortex\UpsShip\Exception\TransportException;
use Prefabcortex\UpsShip\Exception\UnexpectedContentTypeException;
use Prefabcortex\UpsShip\Exception\UnexpectedStatusCodeException;
use Prefabcortex\UpsShip\Exception\UnsupportedValueException;
use Prefabcortex\UpsShip\Model\VOIDSHIPMENTResponseWrapper;
use Prefabcortex\UpsShip\Parameter\DeprecatedVoidShipmentHeaderParameters;
use Prefabcortex\UpsShip\Parameter\DeprecatedVoidShipmentQueryParameters;

final class DeprecatedVoidShipmentExample
{
    /**
     * The Void Shipping API is used to cancel the previously scheduled shipment.
     *
     * Usage: pass an already-authenticated Client (see examples/Auth/).
     *
     *   $client = Client::withOAuth($token, $config); // see examples/Auth/
     *   $queryParameters = new DeprecatedVoidShipmentQueryParameters();
     *   $headerParameters = new DeprecatedVoidShipmentHeaderParameters();
     *   DeprecatedVoidShipmentExample::deprecatedVoidShipment($client, $shipmentidentificationnumber, $deprecatedVersion, $queryParameters, $headerParameters);
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws DeprecatedVoidShipmentBadRequestException
     * @throws DeprecatedVoidShipmentUnauthorizedException
     * @throws DeprecatedVoidShipmentForbiddenException
     * @throws DeprecatedVoidShipmentTooManyRequestsException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function deprecatedVoidShipment(
        Client $client,
        string $shipmentidentificationnumber,
        string $deprecatedVersion,
        DeprecatedVoidShipmentQueryParameters $queryParameters,
        DeprecatedVoidShipmentHeaderParameters $headerParameters,
    ): VOIDSHIPMENTResponseWrapper {
        return $client->deprecatedVoidShipment(
            $shipmentidentificationnumber,
            $deprecatedVersion,
            $queryParameters,
            $headerParameters,
        );
    }
}
