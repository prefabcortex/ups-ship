<?php

declare(strict_types=1);

namespace Prefabcortex\UpsShip\Examples\Operations;

use Prefabcortex\UpsShip\Client;
use Prefabcortex\UpsShip\Exception\ApiException;
use Prefabcortex\UpsShip\Exception\LabelRecoveryBadRequestException;
use Prefabcortex\UpsShip\Exception\LabelRecoveryForbiddenException;
use Prefabcortex\UpsShip\Exception\LabelRecoveryTooManyRequestsException;
use Prefabcortex\UpsShip\Exception\LabelRecoveryUnauthorizedException;
use Prefabcortex\UpsShip\Exception\MalformedResponseException;
use Prefabcortex\UpsShip\Exception\ResponseValidationException;
use Prefabcortex\UpsShip\Exception\TransportException;
use Prefabcortex\UpsShip\Exception\UnexpectedContentTypeException;
use Prefabcortex\UpsShip\Exception\UnexpectedStatusCodeException;
use Prefabcortex\UpsShip\Exception\UnsupportedValueException;
use Prefabcortex\UpsShip\Model\LabelRecoveryLabelSpecificationLabelImageFormat;
use Prefabcortex\UpsShip\Model\LabelRecoveryLabelSpecificationLabelStockSize;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequest;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestLabelDelivery;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestLabelSpecification;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestReferenceValues;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestRequest;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestTranslate;
use Prefabcortex\UpsShip\Model\LABELRECOVERYRequestWrapper;
use Prefabcortex\UpsShip\Model\LABELRECOVERYResponseWrapper;
use Prefabcortex\UpsShip\Model\LRRequestTransactionReference;
use Prefabcortex\UpsShip\Model\ReferenceValuesReferenceNumber;
use Prefabcortex\UpsShip\Parameter\LabelRecoveryHeaderParameters;

final class LabelRecoveryExample
{
    /**
     * The Label Shipping API allows us to retrieve forward and return labels.
     *
     * Usage: pass an already-authenticated Client (see examples/Auth/).
     *
     * Request body: pass the result of one of build1(), build2().
     *
     *   $client = Client::withOAuth($token, $config); // see examples/Auth/
     *   $headerParameters = new LabelRecoveryHeaderParameters();
     *   LabelRecoveryExample::labelRecovery($client, $version, LabelRecoveryExample::build1(), $headerParameters);
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws LabelRecoveryBadRequestException
     * @throws LabelRecoveryUnauthorizedException
     * @throws LabelRecoveryForbiddenException
     * @throws LabelRecoveryTooManyRequestsException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function labelRecovery(
        Client $client,
        string $version,
        LABELRECOVERYRequestWrapper $requestBody,
        LabelRecoveryHeaderParameters $headerParameters,
    ): LABELRECOVERYResponseWrapper {
        return $client->labelRecovery(
            $version,
            $requestBody,
            $headerParameters,
        );
    }

    /**
     * Label Recovery Request (Standard Example).
     */
    public static function build1(): LABELRECOVERYRequestWrapper
    {
        $transactionReference = LRRequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = LabelRecoveryRequestRequest::builder()
            ->setSubVersion('1903')
            ->setRequestOption('Non_Validate')
            ->setTransactionReference($transactionReference)
            ->build();
        $referenceNumber = ReferenceValuesReferenceNumber::builder('REPLACE_ME')->build();
        $referenceValues = LabelRecoveryRequestReferenceValues::builder(
            // referenceNumber
            $referenceNumber,
            // shipperNumber
            'REPLAC',
        )->build();
        $labelImageFormat = LabelRecoveryLabelSpecificationLabelImageFormat::builder('REPL')->build();
        $labelStockSize = LabelRecoveryLabelSpecificationLabelStockSize::builder(
            // height
            '6',
            // width
            '4',
        )->build();
        $labelSpecification = LabelRecoveryRequestLabelSpecification::builder()
            ->setHTTPUserAgent('Mozilla/4.5')
            ->setLabelImageFormat($labelImageFormat)
            ->setLabelStockSize($labelStockSize)
            ->build();
        $translate = LabelRecoveryRequestTranslate::builder(
            // languageCode
            'eng',
            // dialectCode
            'US',
            // code
            '01',
        )->build();
        $labelDelivery = LabelRecoveryRequestLabelDelivery::builder()
            ->setLabelLinkIndicator('')
            ->build();
        $labelRecoveryRequest = LabelRecoveryRequest::builder(
            // request
            $request,
            // trackingNumbers
            ['REPLACE_ME'],
            // referenceValues
            $referenceValues,
        )
            ->setLabelSpecification($labelSpecification)
            ->setTranslate($translate)
            ->setLabelDelivery($labelDelivery)
            ->setTrackingNumber('1Z12345E8791315509')
            ->build();

        return LABELRECOVERYRequestWrapper::builder($labelRecoveryRequest)->build();
    }

    /**
     * Label Recovery Request (Roadie).
     */
    public static function build2(): LABELRECOVERYRequestWrapper
    {
        $transactionReference = LRRequestTransactionReference::builder()
            ->setCustomerContext('Success case')
            ->build();
        $request = LabelRecoveryRequestRequest::builder()
            ->setSubVersion('2603')
            ->setTransactionReference($transactionReference)
            ->build();
        $referenceNumber = ReferenceValuesReferenceNumber::builder('REPLACE_ME')->build();
        $referenceValues = LabelRecoveryRequestReferenceValues::builder(
            // referenceNumber
            $referenceNumber,
            // shipperNumber
            'XXXXXX',
        )->build();
        $labelImageFormat = LabelRecoveryLabelSpecificationLabelImageFormat::builder('REPL')->build();
        $labelSpecification = LabelRecoveryRequestLabelSpecification::builder()
            ->setLabelImageFormat($labelImageFormat)
            ->build();
        $labelRecoveryRequest = LabelRecoveryRequest::builder(
            // request
            $request,
            // trackingNumbers
            ['REPLACE_ME'],
            // referenceValues
            $referenceValues,
        )
            ->setLabelSpecification($labelSpecification)
            ->build();

        return LABELRECOVERYRequestWrapper::builder($labelRecoveryRequest)->build();
    }
}
