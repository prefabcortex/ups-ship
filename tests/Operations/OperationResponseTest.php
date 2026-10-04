<?php

declare(strict_types=1);

namespace Prefabcortex\UpsShip\Tests\Operations;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Prefabcortex\UpsShip\Client;
use Prefabcortex\UpsShip\ClientConfig;
use Prefabcortex\UpsShip\Exception\ApiException;
use Prefabcortex\UpsShip\Exception\DeprecatedShipmentBadRequestException;
use Prefabcortex\UpsShip\Exception\DeprecatedShipmentForbiddenException;
use Prefabcortex\UpsShip\Exception\DeprecatedShipmentTooManyRequestsException;
use Prefabcortex\UpsShip\Exception\DeprecatedShipmentUnauthorizedException;
use Prefabcortex\UpsShip\Exception\DeprecatedVoidShipmentBadRequestException;
use Prefabcortex\UpsShip\Exception\DeprecatedVoidShipmentForbiddenException;
use Prefabcortex\UpsShip\Exception\DeprecatedVoidShipmentTooManyRequestsException;
use Prefabcortex\UpsShip\Exception\DeprecatedVoidShipmentUnauthorizedException;
use Prefabcortex\UpsShip\Exception\LabelRecoveryBadRequestException;
use Prefabcortex\UpsShip\Exception\LabelRecoveryForbiddenException;
use Prefabcortex\UpsShip\Exception\LabelRecoveryTooManyRequestsException;
use Prefabcortex\UpsShip\Exception\LabelRecoveryUnauthorizedException;
use Prefabcortex\UpsShip\Exception\MalformedDataException;
use Prefabcortex\UpsShip\Exception\ShipmentBadRequestException;
use Prefabcortex\UpsShip\Exception\ShipmentForbiddenException;
use Prefabcortex\UpsShip\Exception\ShipmentTooManyRequestsException;
use Prefabcortex\UpsShip\Exception\ShipmentUnauthorizedException;
use Prefabcortex\UpsShip\Exception\UnexpectedContentTypeException;
use Prefabcortex\UpsShip\Exception\UnexpectedStatusCodeException;
use Prefabcortex\UpsShip\Exception\VoidShipmentBadRequestException;
use Prefabcortex\UpsShip\Exception\VoidShipmentForbiddenException;
use Prefabcortex\UpsShip\Exception\VoidShipmentTooManyRequestsException;
use Prefabcortex\UpsShip\Exception\VoidShipmentUnauthorizedException;
use Prefabcortex\UpsShip\Http\JsonBody;
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
 * Every response an operation reads, answered once through the method that reads it.
 *
 * A recorded client answers with the status and content type of one branch and a body built from
 * the model fixtures; the test checks that the model comes back, or the declared exception with the
 * response still readable. A status no response declares and a declared status under the wrong
 * content type are answered too.
 *
 * What this cannot show: that the service sends these documents. They come from the same
 * description the client came from, so this proves the package reads what it promises.
 */
final class OperationResponseTest extends TestCase
{
    private const string BASE_URL = 'https://response-test.invalid';

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testShipmentReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildSHIPResponseWrapper());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->shipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new ShipmentQueryParameters(),
                new ShipmentHeaderParameters(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'shipment', 200, $error::class, $error->getMessage()));
        }
        self::assertEquals(ModelFixtures::buildSHIPResponseWrapper(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testShipmentReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->shipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new ShipmentQueryParameters(),
                new ShipmentHeaderParameters(),
            );
            self::fail(sprintf('%s did not throw ShipmentBadRequestException for its %d response', 'shipment', 400));
        } catch (ShipmentBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'shipment', 400, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testShipmentReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->shipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new ShipmentQueryParameters(),
                new ShipmentHeaderParameters(),
            );
            self::fail(sprintf('%s did not throw ShipmentUnauthorizedException for its %d response', 'shipment', 401));
        } catch (ShipmentUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'shipment', 401, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testShipmentReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->shipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new ShipmentQueryParameters(),
                new ShipmentHeaderParameters(),
            );
            self::fail(sprintf('%s did not throw ShipmentForbiddenException for its %d response', 'shipment', 403));
        } catch (ShipmentForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'shipment', 403, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testShipmentReads429(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(429, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->shipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new ShipmentQueryParameters(),
                new ShipmentHeaderParameters(),
            );
            self::fail(
                sprintf('%s did not throw ShipmentTooManyRequestsException for its %d response', 'shipment', 429),
            );
        } catch (ShipmentTooManyRequestsException $exception) {
            self::assertSame(429, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'shipment', 429, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testShipmentRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->shipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new ShipmentQueryParameters(),
                new ShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'shipment',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'shipment', 599, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testShipmentRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->shipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new ShipmentQueryParameters(),
                new ShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'shipment',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'shipment', 200, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testVoidShipmentReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildVOIDSHIPMENTResponseWrapper());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->voidShipment(
                'smoke-test',
                'smoke-test',
                new VoidShipmentQueryParameters(),
                new VoidShipmentHeaderParameters(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'voidShipment', 200, $error::class, $error->getMessage()));
        }
        self::assertEquals(ModelFixtures::buildVOIDSHIPMENTResponseWrapper(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testVoidShipmentReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->voidShipment(
                'smoke-test',
                'smoke-test',
                new VoidShipmentQueryParameters(),
                new VoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf('%s did not throw VoidShipmentBadRequestException for its %d response', 'voidShipment', 400),
            );
        } catch (VoidShipmentBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'voidShipment', 400, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testVoidShipmentReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->voidShipment(
                'smoke-test',
                'smoke-test',
                new VoidShipmentQueryParameters(),
                new VoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf('%s did not throw VoidShipmentUnauthorizedException for its %d response', 'voidShipment', 401),
            );
        } catch (VoidShipmentUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'voidShipment', 401, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testVoidShipmentReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->voidShipment(
                'smoke-test',
                'smoke-test',
                new VoidShipmentQueryParameters(),
                new VoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf('%s did not throw VoidShipmentForbiddenException for its %d response', 'voidShipment', 403),
            );
        } catch (VoidShipmentForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'voidShipment', 403, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testVoidShipmentReads429(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(429, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->voidShipment(
                'smoke-test',
                'smoke-test',
                new VoidShipmentQueryParameters(),
                new VoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw VoidShipmentTooManyRequestsException for its %d response',
                    'voidShipment',
                    429,
                ),
            );
        } catch (VoidShipmentTooManyRequestsException $exception) {
            self::assertSame(429, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'voidShipment', 429, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testVoidShipmentRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->voidShipment(
                'smoke-test',
                'smoke-test',
                new VoidShipmentQueryParameters(),
                new VoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'voidShipment',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'voidShipment', 599, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testVoidShipmentRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->voidShipment(
                'smoke-test',
                'smoke-test',
                new VoidShipmentQueryParameters(),
                new VoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'voidShipment',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(sprintf('%s answered %d with %s: %s', 'voidShipment', 200, $error::class, $error->getMessage()));
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testLabelRecoveryReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildLABELRECOVERYResponseWrapper());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->labelRecovery(
                'smoke-test',
                ModelFixtures::buildLABELRECOVERYRequestWrapper(),
                new LabelRecoveryHeaderParameters(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'labelRecovery', 200, $error::class, $error->getMessage()),
            );
        }
        self::assertEquals(ModelFixtures::buildLABELRECOVERYResponseWrapper(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testLabelRecoveryReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->labelRecovery(
                'smoke-test',
                ModelFixtures::buildLABELRECOVERYRequestWrapper(),
                new LabelRecoveryHeaderParameters(),
            );
            self::fail(
                sprintf('%s did not throw LabelRecoveryBadRequestException for its %d response', 'labelRecovery', 400),
            );
        } catch (LabelRecoveryBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'labelRecovery', 400, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testLabelRecoveryReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->labelRecovery(
                'smoke-test',
                ModelFixtures::buildLABELRECOVERYRequestWrapper(),
                new LabelRecoveryHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw LabelRecoveryUnauthorizedException for its %d response',
                    'labelRecovery',
                    401,
                ),
            );
        } catch (LabelRecoveryUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'labelRecovery', 401, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testLabelRecoveryReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->labelRecovery(
                'smoke-test',
                ModelFixtures::buildLABELRECOVERYRequestWrapper(),
                new LabelRecoveryHeaderParameters(),
            );
            self::fail(
                sprintf('%s did not throw LabelRecoveryForbiddenException for its %d response', 'labelRecovery', 403),
            );
        } catch (LabelRecoveryForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'labelRecovery', 403, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testLabelRecoveryReads429(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(429, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->labelRecovery(
                'smoke-test',
                ModelFixtures::buildLABELRECOVERYRequestWrapper(),
                new LabelRecoveryHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw LabelRecoveryTooManyRequestsException for its %d response',
                    'labelRecovery',
                    429,
                ),
            );
        } catch (LabelRecoveryTooManyRequestsException $exception) {
            self::assertSame(429, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'labelRecovery', 429, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testLabelRecoveryRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->labelRecovery(
                'smoke-test',
                ModelFixtures::buildLABELRECOVERYRequestWrapper(),
                new LabelRecoveryHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'labelRecovery',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'labelRecovery', 599, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testLabelRecoveryRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->labelRecovery(
                'smoke-test',
                ModelFixtures::buildLABELRECOVERYRequestWrapper(),
                new LabelRecoveryHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'labelRecovery',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'labelRecovery', 200, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedShipmentReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildSHIPResponseWrapper());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->deprecatedShipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new DeprecatedShipmentQueryParameters(),
                new DeprecatedShipmentHeaderParameters(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'deprecatedShipment', 200, $error::class, $error->getMessage()),
            );
        }
        self::assertEquals(ModelFixtures::buildSHIPResponseWrapper(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedShipmentReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedShipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new DeprecatedShipmentQueryParameters(),
                new DeprecatedShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw DeprecatedShipmentBadRequestException for its %d response',
                    'deprecatedShipment',
                    400,
                ),
            );
        } catch (DeprecatedShipmentBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'deprecatedShipment', 400, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedShipmentReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedShipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new DeprecatedShipmentQueryParameters(),
                new DeprecatedShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw DeprecatedShipmentUnauthorizedException for its %d response',
                    'deprecatedShipment',
                    401,
                ),
            );
        } catch (DeprecatedShipmentUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'deprecatedShipment', 401, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedShipmentReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedShipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new DeprecatedShipmentQueryParameters(),
                new DeprecatedShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw DeprecatedShipmentForbiddenException for its %d response',
                    'deprecatedShipment',
                    403,
                ),
            );
        } catch (DeprecatedShipmentForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'deprecatedShipment', 403, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedShipmentReads429(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(429, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedShipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new DeprecatedShipmentQueryParameters(),
                new DeprecatedShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw DeprecatedShipmentTooManyRequestsException for its %d response',
                    'deprecatedShipment',
                    429,
                ),
            );
        } catch (DeprecatedShipmentTooManyRequestsException $exception) {
            self::assertSame(429, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'deprecatedShipment', 429, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedShipmentRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedShipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new DeprecatedShipmentQueryParameters(),
                new DeprecatedShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'deprecatedShipment',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'deprecatedShipment', 599, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedShipmentRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedShipment(
                'smoke-test',
                ModelFixtures::buildSHIPRequestWrapper(),
                new DeprecatedShipmentQueryParameters(),
                new DeprecatedShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'deprecatedShipment',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'deprecatedShipment', 200, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedVoidShipmentReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildVOIDSHIPMENTResponseWrapper());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $result = $client->deprecatedVoidShipment(
                'smoke-test',
                'smoke-test',
                new DeprecatedVoidShipmentQueryParameters(),
                new DeprecatedVoidShipmentHeaderParameters(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'deprecatedVoidShipment',
                    200,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
        self::assertEquals(ModelFixtures::buildVOIDSHIPMENTResponseWrapper(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedVoidShipmentReads400(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(400, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedVoidShipment(
                'smoke-test',
                'smoke-test',
                new DeprecatedVoidShipmentQueryParameters(),
                new DeprecatedVoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw DeprecatedVoidShipmentBadRequestException for its %d response',
                    'deprecatedVoidShipment',
                    400,
                ),
            );
        } catch (DeprecatedVoidShipmentBadRequestException $exception) {
            self::assertSame(400, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'deprecatedVoidShipment',
                    400,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedVoidShipmentReads401(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(401, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedVoidShipment(
                'smoke-test',
                'smoke-test',
                new DeprecatedVoidShipmentQueryParameters(),
                new DeprecatedVoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw DeprecatedVoidShipmentUnauthorizedException for its %d response',
                    'deprecatedVoidShipment',
                    401,
                ),
            );
        } catch (DeprecatedVoidShipmentUnauthorizedException $exception) {
            self::assertSame(401, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'deprecatedVoidShipment',
                    401,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedVoidShipmentReads403(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(403, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedVoidShipment(
                'smoke-test',
                'smoke-test',
                new DeprecatedVoidShipmentQueryParameters(),
                new DeprecatedVoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw DeprecatedVoidShipmentForbiddenException for its %d response',
                    'deprecatedVoidShipment',
                    403,
                ),
            );
        } catch (DeprecatedVoidShipmentForbiddenException $exception) {
            self::assertSame(403, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'deprecatedVoidShipment',
                    403,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedVoidShipmentReads429(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildErrorResponse());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(429, 'application/json', $body));
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedVoidShipment(
                'smoke-test',
                'smoke-test',
                new DeprecatedVoidShipmentQueryParameters(),
                new DeprecatedVoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw DeprecatedVoidShipmentTooManyRequestsException for its %d response',
                    'deprecatedVoidShipment',
                    429,
                ),
            );
        } catch (DeprecatedVoidShipmentTooManyRequestsException $exception) {
            self::assertSame(429, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildErrorResponse(), $exception->getErrorResponse());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'deprecatedVoidShipment',
                    429,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedVoidShipmentRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedVoidShipment(
                'smoke-test',
                'smoke-test',
                new DeprecatedVoidShipmentQueryParameters(),
                new DeprecatedVoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'deprecatedVoidShipment',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'deprecatedVoidShipment',
                    599,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testDeprecatedVoidShipmentRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(
            ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient)->withValidation(
                ValidationMode::Strict,
            ),
        );
        try {
            $client->deprecatedVoidShipment(
                'smoke-test',
                'smoke-test',
                new DeprecatedVoidShipmentQueryParameters(),
                new DeprecatedVoidShipmentHeaderParameters(),
            );
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'deprecatedVoidShipment',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf(
                    '%s answered %d with %s: %s',
                    'deprecatedVoidShipment',
                    200,
                    $error::class,
                    $error->getMessage(),
                ),
            );
        }
    }
}
