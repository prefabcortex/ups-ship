<?php

declare(strict_types=1);

namespace Prefabcortex\UpsShip\Tests\Operations;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Prefabcortex\UpsShip\Client;
use Prefabcortex\UpsShip\ClientConfig;
use Prefabcortex\UpsShip\Exception\ApiException;
use Prefabcortex\UpsShip\Http\ValidationMode;
use Prefabcortex\UpsShip\Parameter\DeprecatedShipmentHeaderParameters;
use Prefabcortex\UpsShip\Parameter\DeprecatedShipmentQueryParameters;
use Prefabcortex\UpsShip\Parameter\DeprecatedVoidShipmentHeaderParameters;
use Prefabcortex\UpsShip\Parameter\DeprecatedVoidShipmentQueryParameters;
use Prefabcortex\UpsShip\Parameter\LabelRecoveryHeaderParameters;
use Prefabcortex\UpsShip\Parameter\ShipmentHeaderParameters;
use Prefabcortex\UpsShip\Parameter\ShipmentQueryParameters;
use Prefabcortex\UpsShip\Parameter\VoidShipmentHeaderParameters;
use Prefabcortex\UpsShip\Parameter\VoidShipmentQueryParameters;
use Prefabcortex\UpsShip\Tests\Fixture\CannedResponse;
use Prefabcortex\UpsShip\Tests\Fixture\ModelFixtures;
use Prefabcortex\UpsShip\Tests\Fixture\RecordingHttpClient;
use RuntimeException;

use function sprintf;

/**
 * Every operation called once, against a client that records the request instead of sending it.
 *
 * Nothing leaves the process and no credentials are needed: PSR-18 is one method, so the client is
 * stood in for. What runs is everything up to the wire — the URI assembled, the query string
 * encoded, the body serialised. The client signs nothing.
 *
 * What is watched is the request: its method, and its path up to the first placeholder. These calls
 * go through the `…Raw()` methods, which hand the response back unparsed, so the canned answer
 * never has to match a status or content type from the description — an answer invented from that
 * document would say nothing about a client built from the same one.
 */
final class OperationSmokeTest extends TestCase
{
    private const string BASE_URL = 'https://smoke-test.invalid';

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function testShipmentBuildsARequest(): void
    {
        $httpClient = new RecordingHttpClient(CannedResponse::empty());
        try {
            $client = Client::create(
                ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                    ValidationMode::Strict,
                ),
            );
            $client->shipmentRaw(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new ShipmentQueryParameters(),
                new ShipmentHeaderParameters(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s could not be called: %s', 'shipment', $error->getMessage()));
        }
        $requests = $httpClient->getRequests();
        self::assertCount(1, $requests, 'the operation did not hand exactly one request to the HTTP client');
        foreach ($requests as $request) {
            self::assertSame('POST', $request->getMethod(), 'the request went out with another HTTP method');
            self::assertStringStartsWith(
                self::BASE_URL . '/shipments/',
                (string) $request->getUri(),
                'the request did not go to the operation\'s path below the configured base URL',
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function testVoidShipmentBuildsARequest(): void
    {
        $httpClient = new RecordingHttpClient(CannedResponse::empty());
        try {
            $client = Client::create(
                ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                    ValidationMode::Strict,
                ),
            );
            $client->voidShipmentRaw(
                'smoke-test',
                'smoke-test',
                new VoidShipmentQueryParameters(),
                new VoidShipmentHeaderParameters(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s could not be called: %s', 'voidShipment', $error->getMessage()));
        }
        $requests = $httpClient->getRequests();
        self::assertCount(1, $requests, 'the operation did not hand exactly one request to the HTTP client');
        foreach ($requests as $request) {
            self::assertSame('DELETE', $request->getMethod(), 'the request went out with another HTTP method');
            self::assertStringStartsWith(
                self::BASE_URL . '/shipments/',
                (string) $request->getUri(),
                'the request did not go to the operation\'s path below the configured base URL',
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function testLabelRecoveryBuildsARequest(): void
    {
        $httpClient = new RecordingHttpClient(CannedResponse::empty());
        try {
            $client = Client::create(
                ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                    ValidationMode::Strict,
                ),
            );
            $client->labelRecoveryRaw(
                'smoke-test',
                ModelFixtures::buildLABELRECOVERYRequestWrapper(),
                new LabelRecoveryHeaderParameters(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s could not be called: %s', 'labelRecovery', $error->getMessage()));
        }
        $requests = $httpClient->getRequests();
        self::assertCount(1, $requests, 'the operation did not hand exactly one request to the HTTP client');
        foreach ($requests as $request) {
            self::assertSame('POST', $request->getMethod(), 'the request went out with another HTTP method');
            self::assertStringStartsWith(
                self::BASE_URL . '/labels/',
                (string) $request->getUri(),
                'the request did not go to the operation\'s path below the configured base URL',
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function testDeprecatedShipmentBuildsARequest(): void
    {
        $httpClient = new RecordingHttpClient(CannedResponse::empty());
        try {
            $client = Client::create(
                ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                    ValidationMode::Strict,
                ),
            );
            $client->deprecatedShipmentRaw(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new DeprecatedShipmentQueryParameters(),
                new DeprecatedShipmentHeaderParameters(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s could not be called: %s', 'deprecatedShipment', $error->getMessage()));
        }
        $requests = $httpClient->getRequests();
        self::assertCount(1, $requests, 'the operation did not hand exactly one request to the HTTP client');
        foreach ($requests as $request) {
            self::assertSame('POST', $request->getMethod(), 'the request went out with another HTTP method');
            self::assertStringStartsWith(
                self::BASE_URL . '/shipments/',
                (string) $request->getUri(),
                'the request did not go to the operation\'s path below the configured base URL',
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function testDeprecatedVoidShipmentBuildsARequest(): void
    {
        $httpClient = new RecordingHttpClient(CannedResponse::empty());
        try {
            $client = Client::create(
                ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                    ValidationMode::Strict,
                ),
            );
            $client->deprecatedVoidShipmentRaw(
                'smoke-test',
                'smoke-test',
                new DeprecatedVoidShipmentQueryParameters(),
                new DeprecatedVoidShipmentHeaderParameters(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s could not be called: %s', 'deprecatedVoidShipment', $error->getMessage()));
        }
        $requests = $httpClient->getRequests();
        self::assertCount(1, $requests, 'the operation did not hand exactly one request to the HTTP client');
        foreach ($requests as $request) {
            self::assertSame('DELETE', $request->getMethod(), 'the request went out with another HTTP method');
            self::assertStringStartsWith(
                self::BASE_URL . '/shipments/',
                (string) $request->getUri(),
                'the request did not go to the operation\'s path below the configured base URL',
            );
        }
    }
}
