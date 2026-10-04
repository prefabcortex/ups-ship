<?php

declare(strict_types=1);

namespace Prefabcortex\UpsShip\Examples\Operations;

use Prefabcortex\UpsShip\Client;
use Prefabcortex\UpsShip\Exception\ApiException;
use Prefabcortex\UpsShip\Exception\DeprecatedShipmentBadRequestException;
use Prefabcortex\UpsShip\Exception\DeprecatedShipmentForbiddenException;
use Prefabcortex\UpsShip\Exception\DeprecatedShipmentTooManyRequestsException;
use Prefabcortex\UpsShip\Exception\DeprecatedShipmentUnauthorizedException;
use Prefabcortex\UpsShip\Exception\MalformedResponseException;
use Prefabcortex\UpsShip\Exception\ResponseValidationException;
use Prefabcortex\UpsShip\Exception\TransportException;
use Prefabcortex\UpsShip\Exception\UnexpectedContentTypeException;
use Prefabcortex\UpsShip\Exception\UnexpectedStatusCodeException;
use Prefabcortex\UpsShip\Exception\UnsupportedValueException;
use Prefabcortex\UpsShip\Model\AlternateDeliveryAddressAddress;
use Prefabcortex\UpsShip\Model\CN22ContentCN22ContentWeight;
use Prefabcortex\UpsShip\Model\CN22ContentWeightUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\CN22FormCN22Content;
use Prefabcortex\UpsShip\Model\ContactsForwardAgent;
use Prefabcortex\UpsShip\Model\ContactsProducer;
use Prefabcortex\UpsShip\Model\ContactsSoldTo;
use Prefabcortex\UpsShip\Model\ContactsUltimateConsignee;
use Prefabcortex\UpsShip\Model\DimensionsUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\DryIceDryIceWeight;
use Prefabcortex\UpsShip\Model\DryIceWeightUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\EEIFilingOptionShipperFiled;
use Prefabcortex\UpsShip\Model\EEIFilingOptionUPSFiled;
use Prefabcortex\UpsShip\Model\ForwardAgentAddress;
use Prefabcortex\UpsShip\Model\InternationalFormsBlanketPeriod;
use Prefabcortex\UpsShip\Model\InternationalFormsCN22Form;
use Prefabcortex\UpsShip\Model\InternationalFormsContacts;
use Prefabcortex\UpsShip\Model\InternationalFormsDiscount;
use Prefabcortex\UpsShip\Model\InternationalFormsEEIFilingOption;
use Prefabcortex\UpsShip\Model\InternationalFormsFreightCharges;
use Prefabcortex\UpsShip\Model\InternationalFormsInsuranceCharges;
use Prefabcortex\UpsShip\Model\InternationalFormsOtherCharges;
use Prefabcortex\UpsShip\Model\InternationalFormsProduct;
use Prefabcortex\UpsShip\Model\LabelSpecificationLabelImageFormat;
use Prefabcortex\UpsShip\Model\LabelSpecificationLabelStockSize;
use Prefabcortex\UpsShip\Model\NotificationEMail;
use Prefabcortex\UpsShip\Model\PackageDimensions;
use Prefabcortex\UpsShip\Model\PackageHazMatPackageInformation;
use Prefabcortex\UpsShip\Model\PackagePackageServiceOptions;
use Prefabcortex\UpsShip\Model\PackagePackageWeight;
use Prefabcortex\UpsShip\Model\PackagePackaging;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsDryIce;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsHazMat;
use Prefabcortex\UpsShip\Model\PackageWeightUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\PaymentInformationShipmentCharge;
use Prefabcortex\UpsShip\Model\ProducerAddress;
use Prefabcortex\UpsShip\Model\ProducerPhone;
use Prefabcortex\UpsShip\Model\RequestTransactionReference;
use Prefabcortex\UpsShip\Model\ShipFromAddress;
use Prefabcortex\UpsShip\Model\ShipFromPhone;
use Prefabcortex\UpsShip\Model\ShipFromTaxIDType;
use Prefabcortex\UpsShip\Model\ShipFromVendorInfo;
use Prefabcortex\UpsShip\Model\ShipmentAlternateDeliveryAddress;
use Prefabcortex\UpsShip\Model\ShipmentDGSignatoryInfo;
use Prefabcortex\UpsShip\Model\ShipmentInvoiceLineTotal;
use Prefabcortex\UpsShip\Model\ShipmentPackage;
use Prefabcortex\UpsShip\Model\ShipmentPaymentInformation;
use Prefabcortex\UpsShip\Model\ShipmentRequest;
use Prefabcortex\UpsShip\Model\ShipmentRequestLabelSpecification;
use Prefabcortex\UpsShip\Model\ShipmentRequestRequest;
use Prefabcortex\UpsShip\Model\ShipmentRequestShipment;
use Prefabcortex\UpsShip\Model\ShipmentService;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsInternationalForms;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsNotification;
use Prefabcortex\UpsShip\Model\ShipmentShipFrom;
use Prefabcortex\UpsShip\Model\ShipmentShipmentIndicationType;
use Prefabcortex\UpsShip\Model\ShipmentShipmentRatingOptions;
use Prefabcortex\UpsShip\Model\ShipmentShipmentServiceOptions;
use Prefabcortex\UpsShip\Model\ShipmentShipper;
use Prefabcortex\UpsShip\Model\ShipmentShipTo;
use Prefabcortex\UpsShip\Model\ShipperAddress;
use Prefabcortex\UpsShip\Model\ShipperPhone;
use Prefabcortex\UpsShip\Model\SHIPRequestWrapper;
use Prefabcortex\UpsShip\Model\SHIPResponseWrapper;
use Prefabcortex\UpsShip\Model\ShipToAddress;
use Prefabcortex\UpsShip\Model\ShipToPhone;
use Prefabcortex\UpsShip\Model\SoldToAddress;
use Prefabcortex\UpsShip\Model\SoldToPhone;
use Prefabcortex\UpsShip\Model\UltimateConsigneeAddress;
use Prefabcortex\UpsShip\Model\UltimateConsigneeUltimateConsigneeType;
use Prefabcortex\UpsShip\Model\UPSFiledPOA;
use Prefabcortex\UpsShip\Parameter\DeprecatedShipmentHeaderParameters;
use Prefabcortex\UpsShip\Parameter\DeprecatedShipmentQueryParameters;

final class DeprecatedShipmentExample
{
    /**
     * The Shipping API makes UPS shipping services available to client applications that
     * communicate with UPS using the Internet.
     *
     * Usage: pass an already-authenticated Client (see examples/Auth/).
     *
     * Request body: pass the result of one of buildStandardExample(), buildNegotiatedRates(),
     * buildInternationalForm(), buildDryIceLithiumBatteries(), buildHazmatGoods(),
     * buildBillingThirdParty(), buildMultiPieceShipping(), buildShipToUPSAccessPoint(),
     * buildWorldWideEconomy(), build10(), build11(), build12(), build13().
     *
     *   $client = Client::withOAuth($token, $config); // see examples/Auth/
     *   $queryParameters = new DeprecatedShipmentQueryParameters();
     *   $headerParameters = new DeprecatedShipmentHeaderParameters();
     *   DeprecatedShipmentExample::deprecatedShipment($client, $deprecatedVersion, DeprecatedShipmentExample::buildStandardExample(), $queryParameters, $headerParameters);
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws DeprecatedShipmentBadRequestException
     * @throws DeprecatedShipmentUnauthorizedException
     * @throws DeprecatedShipmentForbiddenException
     * @throws DeprecatedShipmentTooManyRequestsException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function deprecatedShipment(
        Client $client,
        string $deprecatedVersion,
        SHIPRequestWrapper $requestBody,
        DeprecatedShipmentQueryParameters $queryParameters,
        DeprecatedShipmentHeaderParameters $headerParameters,
    ): SHIPResponseWrapper {
        return $client->deprecatedShipment(
            $deprecatedVersion,
            $requestBody,
            $queryParameters,
            $headerParameters,
        );
    }

    /**
     * Shipping Request(Standard Example).
     */
    public static function buildStandardExample(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setSubVersion('1801')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['2311 York Rd'],
            // city
            'Timonium',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('MD')
            ->setPostalCode('21093')
            ->build();
        $phone = ShipperPhone::builder('1115554758')
            ->setExtension(' ')
            ->build();
        $shipper = ShipmentShipper::builder(
            // name
            'ShipperName',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('ShipperZs Attn Name')
            ->setPhone($phone)
            ->setFaxNumber('8002222222')
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['123 Main St'],
            // city
            'timonium',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('MD')
            ->setPostalCode('21030')
            ->build();
        $phone_1 = ShipToPhone::builder('9225377171')->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'Happy Dog Pet Supply',
            // address
            $address_1,
        )
            ->setAttentionName('1160b_74')
            ->setPhone($phone_1)
            ->build();
        $service = ShipmentService::builder('03')
            ->setDescription('Express')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)
            ->setDescription('Nails')
            ->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)->build();
        $packaging_3 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_3 = ShipmentPackage::builder($packaging_3)->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['2311 York Rd'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->build();
        $phone_2 = ShipFromPhone::builder('1234567890')->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'T and T Designs',
            // address
            $address_2,
        )
            ->setAttentionName('1160b_74')
            ->setPhone($phone_2)
            ->setFaxNumber('1234567890')
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2, $shipmentPackage_3],
        )
            ->setDescription('Ship WS test')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->build();
        $labelImageFormat = LabelSpecificationLabelImageFormat::builder('GIF')
            ->setDescription('GIF')
            ->build();
        $labelStockSize = LabelSpecificationLabelStockSize::builder(
            // height
            'REP',
            // width
            'REP',
        )->build();
        $labelSpecification = ShipmentRequestLabelSpecification::builder(
            // labelImageFormat
            $labelImageFormat,
            // labelStockSize
            $labelStockSize,
        )
            ->setHTTPUserAgent('Mozilla/4.5')
            ->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )
            ->setLabelSpecification($labelSpecification)
            ->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Shipping Request with Negotiated Rates.
     */
    public static function buildNegotiatedRates(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setSubVersion('1601')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['Shipper_Addrline1'],
            // city
            'BERLIN',
            // countryCode
            'DE',
        )
            ->setStateProvinceCode('REPLA')
            ->setPostalCode('10785')
            ->build();
        $phone = ShipperPhone::builder('5555555555')->build();
        $shipper = ShipmentShipper::builder(
            // name
            'Shipper_name',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('Shipper_Attn.name')
            ->setCompanyDisplayableName('Shipper_company')
            ->setPhone($phone)
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['Shipper_Addrline1'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->build();
        $phone_1 = ShipToPhone::builder('5555555555')->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'ShipTo_name',
            // address
            $address_1,
        )
            ->setAttentionName('ShipTo_Attn.name')
            ->setCompanyDisplayableName('ShipTo_company')
            ->setPhone($phone_1)
            ->build();
        $service = ShipmentService::builder('07')
            ->setDescription('UPS')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)
            ->setDescription('Customer Supplied Package')
            ->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)->build();
        $packaging_3 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_3 = ShipmentPackage::builder($packaging_3)->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['ShipFrom_Addrline1'],
            // city
            'BERLIN',
            // countryCode
            'DE',
        )
            ->setStateProvinceCode('REPLA')
            ->setPostalCode('10785')
            ->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'ShipFrom_name',
            // address
            $address_2,
        )
            ->setAttentionName('ShipFrom_Attn.name')
            ->setCompanyDisplayableName('ShipFrom_company')
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $shipmentRatingOptions = ShipmentShipmentRatingOptions::builder()
            ->setNegotiatedRatesIndicator('X')
            ->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2, $shipmentPackage_3],
        )
            ->setDescription('1507 US shipment')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->setShipmentRatingOptions($shipmentRatingOptions)
            ->setTaxInformationIndicator('')
            ->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Shipping Request with International Forms.
     */
    public static function buildInternationalForm(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['34 Queen St'],
            // city
            'Toronto',
            // countryCode
            'CA',
        )
            ->setStateProvinceCode('ON')
            ->setPostalCode('M5C2M6')
            ->build();
        $phone = ShipperPhone::builder('1234567890')->build();
        $shipper = ShipmentShipper::builder(
            // name
            'Henry Lee Thomson',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('John Smith')
            ->setPhone($phone)
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['B.B. King Blvd.'],
            // city
            'Charlotte',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('NC')
            ->setPostalCode('28256')
            ->build();
        $phone_1 = ShipToPhone::builder('1234567890')->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'Happy Dog Pet Supply',
            // address
            $address_1,
        )
            ->setAttentionName('Marley Brinson')
            ->setPhone($phone_1)
            ->build();
        $service = ShipmentService::builder('08')
            ->setDescription('Expedited')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['34 Queen St'],
            // city
            'Toronto',
            // countryCode
            'CA',
        )
            ->setStateProvinceCode('ON')
            ->setPostalCode('M5C2M6')
            ->build();
        $phone_2 = ShipFromPhone::builder('1234567890')->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'T and T Designs',
            // address
            $address_2,
        )
            ->setAttentionName('Mike')
            ->setPhone($phone_2)
            ->setFaxNumber('1234567999')
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $internationalFormsProduct = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_1 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_2 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_3 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_4 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_5 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_6 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_7 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $address_3 = ProducerAddress::builder(
            // addressLine
            ['678 Elm St'],
            // city
            'Marietta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30066')
            ->build();
        $phone_3 = ProducerPhone::builder('5555555555')->build();
        $producer = ContactsProducer::builder()
            ->setOption('RE')
            ->setCompanyName('Tree Service')
            ->setTaxIdentificationNumber(' ')
            ->setAddress($address_3)
            ->setPhone($phone_3)
            ->build();
        $address_4 = SoldToAddress::builder(
            // addressLine
            ['123 Main St'],
            // city
            'Phoenix',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30076')
            ->build();
        $phone_4 = SoldToPhone::builder('5551479876')->build();
        $soldTo = ContactsSoldTo::builder(
            // name
            'ACME Designs',
            // attentionName
            'Wile E Coyote',
            // address
            $address_4,
        )
            ->setPhone($phone_4)
            ->setOption('RE')
            ->build();
        $contacts = InternationalFormsContacts::builder()
            ->setProducer($producer)
            ->setSoldTo($soldTo)
            ->build();
        $blanketPeriod = InternationalFormsBlanketPeriod::builder(
            // beginDate
            '20050115',
            // endDate
            '20050816',
        )->build();
        $internationalForms = ShipmentServiceOptionsInternationalForms::builder(
            // formType
            ['REPLACE_ME'],
            // product
            [
                $internationalFormsProduct,
                $internationalFormsProduct_1,
                $internationalFormsProduct_2,
                $internationalFormsProduct_3,
                $internationalFormsProduct_4,
                $internationalFormsProduct_5,
                $internationalFormsProduct_6,
                $internationalFormsProduct_7,
            ],
        )
            ->setFormGroupIdName('USMCA Form')
            ->setContacts($contacts)
            ->setBlanketPeriod($blanketPeriod)
            ->build();
        $shipmentServiceOptions = ShipmentShipmentServiceOptions::builder()
            ->setInternationalForms($internationalForms)
            ->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2],
        )
            ->setDescription('Description of Goods')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->setShipmentServiceOptions($shipmentServiceOptions)
            ->build();
        $labelImageFormat = LabelSpecificationLabelImageFormat::builder('GIF')->build();
        $labelStockSize = LabelSpecificationLabelStockSize::builder(
            // height
            'REP',
            // width
            'REP',
        )->build();
        $labelSpecification = ShipmentRequestLabelSpecification::builder(
            // labelImageFormat
            $labelImageFormat,
            // labelStockSize
            $labelStockSize,
        )->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )
            ->setLabelSpecification($labelSpecification)
            ->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Shipping Dry Ice or Lithium Batteries.
     */
    public static function buildDryIceLithiumBatteries(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setSubVersion('1701')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['12380 Morris Rd'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->build();
        $phone = ShipperPhone::builder('1234567890')->build();
        $shipper = ShipmentShipper::builder(
            // name
            'Shipper_Name',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('Shipper_AttentionName')
            ->setPhone($phone)
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['793 Foothill Blvd'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->build();
        $phone_1 = ShipToPhone::builder('1234567890')->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'ShipTo_CompanyName',
            // address
            $address_1,
        )
            ->setAttentionName('ShipTo_AttentionName')
            ->setPhone($phone_1)
            ->setFaxNumber('1234567890')
            ->build();
        $service = ShipmentService::builder('03')
            ->setDescription('Ground')
            ->build();
        $packaging = PackagePackaging::builder('02')
            ->setDescription('Customer Supplied Package')
            ->build();
        $unitOfMeasurement = DimensionsUnitOfMeasurement::builder()
            ->setCode('IN')
            ->setDescription('Inches')
            ->build();
        $dimensions = PackageDimensions::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // length
            '10',
            // width
            '10',
            // height
            '10',
        )->build();
        $unitOfMeasurement_1 = PackageWeightUnitOfMeasurement::builder('LBS')
            ->setDescription('Pounds')
            ->build();
        $packageWeight = PackagePackageWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_1,
            // weight
            '10',
        )->build();
        $packageServiceOptionsHazMat = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_1 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_2 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_3 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_4 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_5 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_6 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_7 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_8 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_9 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_10 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_11 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_12 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_13 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_14 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_15 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_16 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_17 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_18 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_19 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_20 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_21 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_22 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_23 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_24 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptionsHazMat_25 = PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
        $packageServiceOptions = PackagePackageServiceOptions::builder()
            ->setHazMat([
                $packageServiceOptionsHazMat,
                $packageServiceOptionsHazMat_1,
                $packageServiceOptionsHazMat_2,
                $packageServiceOptionsHazMat_3,
                $packageServiceOptionsHazMat_4,
                $packageServiceOptionsHazMat_5,
                $packageServiceOptionsHazMat_6,
                $packageServiceOptionsHazMat_7,
                $packageServiceOptionsHazMat_8,
                $packageServiceOptionsHazMat_9,
                $packageServiceOptionsHazMat_10,
                $packageServiceOptionsHazMat_11,
                $packageServiceOptionsHazMat_12,
                $packageServiceOptionsHazMat_13,
                $packageServiceOptionsHazMat_14,
                $packageServiceOptionsHazMat_15,
                $packageServiceOptionsHazMat_16,
                $packageServiceOptionsHazMat_17,
                $packageServiceOptionsHazMat_18,
                $packageServiceOptionsHazMat_19,
                $packageServiceOptionsHazMat_20,
                $packageServiceOptionsHazMat_21,
                $packageServiceOptionsHazMat_22,
                $packageServiceOptionsHazMat_23,
                $packageServiceOptionsHazMat_24,
                $packageServiceOptionsHazMat_25,
            ])
            ->setPackageIdentifier('123')
            ->build();
        $hazMatPackageInformation = PackageHazMatPackageInformation::builder()
            ->setAllPackedInOneIndicator(' ')
            ->setOverPackedIndicator(' ')
            ->setQValue('0.1')
            ->setOuterPackagingType('FIBERBOARD BOX')
            ->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)
            ->setDescription('Package Description')
            ->setDimensions($dimensions)
            ->setPackageWeight($packageWeight)
            ->setPackageServiceOptions($packageServiceOptions)
            ->setHazMatPackageInformation($hazMatPackageInformation)
            ->build();
        $packaging_1 = PackagePackaging::builder('02')
            ->setDescription('desc')
            ->build();
        $unitOfMeasurement_2 = DimensionsUnitOfMeasurement::builder()
            ->setCode('IN')
            ->setDescription('IN')
            ->build();
        $dimensions_1 = PackageDimensions::builder(
            // unitOfMeasurement
            $unitOfMeasurement_2,
            // length
            '2',
            // width
            '2',
            // height
            '2',
        )->build();
        $unitOfMeasurement_3 = PackageWeightUnitOfMeasurement::builder('LBS')
            ->setDescription('LBS')
            ->build();
        $packageWeight_1 = PackagePackageWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_3,
            // weight
            '50',
        )->build();
        $unitOfMeasurement_4 = DryIceWeightUnitOfMeasurement::builder('01')
            ->setDescription('LBS')
            ->build();
        $dryIceWeight = DryIceDryIceWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_4,
            // weight
            '50',
        )->build();
        $dryIce = PackageServiceOptionsDryIce::builder(
            // regulationSet
            'CFR',
            // dryIceWeight
            $dryIceWeight,
        )->build();
        $packageServiceOptions_1 = PackagePackageServiceOptions::builder()
            ->setDryIce($dryIce)
            ->setPackageIdentifier('123')
            ->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)
            ->setDescription('DG')
            ->setNumOfPieces('10')
            ->setDimensions($dimensions_1)
            ->setPackageWeight($packageWeight_1)
            ->setPackageServiceOptions($packageServiceOptions_1)
            ->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['12380 Morris Rd'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->build();
        $phone_2 = ShipFromPhone::builder('1234567890')->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'ShipFrom_CompanyName',
            // address
            $address_2,
        )
            ->setAttentionName('ShipFrom_AttentionName')
            ->setPhone($phone_2)
            ->setFaxNumber('1234567890')
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $dGSignatoryInfo = ShipmentDGSignatoryInfo::builder()
            ->setName('REPLACE_MEXXXXXXXXXXXXXXXXXXXXXXXXX')
            ->setTitle('REPLACE_MEXXXXXXXXXXXXXXXXXXXXXXXXX')
            ->setPlace('REPLACE_MEXXXXXXXXXXXXXXXXXXXXXXXXX')
            ->setDate('20200112')
            ->setShipperDeclaration('01')
            ->setUploadOnlyIndicator('Y')
            ->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1],
        )
            ->setDescription('ER1703')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->setDGSignatoryInfo($dGSignatoryInfo)
            ->build();
        $labelImageFormat = LabelSpecificationLabelImageFormat::builder('GIF')->build();
        $labelStockSize = LabelSpecificationLabelStockSize::builder(
            // height
            'REP',
            // width
            'REP',
        )->build();
        $labelSpecification = ShipmentRequestLabelSpecification::builder(
            // labelImageFormat
            $labelImageFormat,
            // labelStockSize
            $labelStockSize,
        )->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )
            ->setLabelSpecification($labelSpecification)
            ->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Shipping Hazmat Goods.
     */
    public static function buildHazmatGoods(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setSubVersion('1701')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['12380 Morris Road'],
            // city
            'LUTHERVILLE TIMONIUM',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('MD')
            ->setPostalCode('21093')
            ->build();
        $phone = ShipperPhone::builder('1115554758')
            ->setExtension('1')
            ->build();
        $shipper = ShipmentShipper::builder(
            // name
            'ShipperName',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('ShipperZs Attn Name')
            ->setPhone($phone)
            ->setFaxNumber('8002222222')
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['460 Rue du Valibout'],
            // city
            'SMITHFIELD',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('RI')
            ->setPostalCode('02917')
            ->build();
        $phone_1 = ShipToPhone::builder('9225377171')->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'Happy Dog Pet Supply',
            // address
            $address_1,
        )
            ->setAttentionName('1160b_74')
            ->setPhone($phone_1)
            ->build();
        $service = ShipmentService::builder('03')
            ->setDescription('UPS Worldwide Saver')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)->build();
        $packaging_3 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_3 = ShipmentPackage::builder($packaging_3)->build();
        $packaging_4 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_4 = ShipmentPackage::builder($packaging_4)->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['12380 Morris Road'],
            // city
            'LUTHERVILLE TIMONIUM',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('MD')
            ->setPostalCode('21093')
            ->build();
        $phone_2 = ShipFromPhone::builder('1234567890')->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'T and T Designs',
            // address
            $address_2,
        )
            ->setAttentionName('1160b_74')
            ->setPhone($phone_2)
            ->setFaxNumber('1234567890')
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2, $shipmentPackage_3, $shipmentPackage_4],
        )
            ->setDescription('Ship WS test')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->setNumOfPiecesInShipment('10000')
            ->build();
        $labelImageFormat = LabelSpecificationLabelImageFormat::builder('GIF')
            ->setDescription('GIF')
            ->build();
        $labelStockSize = LabelSpecificationLabelStockSize::builder(
            // height
            'REP',
            // width
            'REP',
        )->build();
        $labelSpecification = ShipmentRequestLabelSpecification::builder(
            // labelImageFormat
            $labelImageFormat,
            // labelStockSize
            $labelStockSize,
        )
            ->setHTTPUserAgent('Mozilla/4.5')
            ->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )
            ->setLabelSpecification($labelSpecification)
            ->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Billing Third Party.
     */
    public static function buildBillingThirdParty(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setSubVersion('1901')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['ShipperAddress', 'ShipperAddress', 'ShipperAddress'],
            // city
            '01-222 Warszawa',
            // countryCode
            'PL',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('1222')
            ->build();
        $phone = ShipperPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipper = ShipmentShipper::builder(
            // name
            'Shipper_name',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('Shipper_name')
            ->setCompanyDisplayableName('Shipper_name')
            ->setPhone($phone)
            ->setFaxNumber('1234')
            ->setEMailAddress(' ')
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['ShipToAddress', 'ShipToAddress', 'ShipToAddress'],
            // city
            '01-222 Warszawa',
            // countryCode
            'PL',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('1222')
            ->build();
        $phone_1 = ShipToPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'ShipToName',
            // address
            $address_1,
        )
            ->setAttentionName('ShipToName')
            ->setCompanyDisplayableName('ShipToName')
            ->setPhone($phone_1)
            ->setFaxNumber('1234')
            ->setEMailAddress(' ')
            ->build();
        $service = ShipmentService::builder('RE')
            ->setDescription('Standard')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)
            ->setDescription('desc')
            ->build();
        $packaging_3 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_3 = ShipmentPackage::builder($packaging_3)->build();
        $packaging_4 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_4 = ShipmentPackage::builder($packaging_4)->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['ShipFromAddress', 'ShipFromAddress', 'ShipFromAddress'],
            // city
            '01-222 Warszawa',
            // countryCode
            'PL',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('1222')
            ->build();
        $taxIDType = ShipFromTaxIDType::builder('EIN')
            ->setDescription('EIN')
            ->build();
        $phone_2 = ShipFromPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'ShipFromName',
            // address
            $address_2,
        )
            ->setAttentionName('ShipFromName')
            ->setCompanyDisplayableName('ShipFromName')
            ->setTaxIDType($taxIDType)
            ->setPhone($phone_2)
            ->setFaxNumber('1234')
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $invoiceLineTotal = ShipmentInvoiceLineTotal::builder(
            // currencyCode
            'USD',
            // monetaryValue
            '10',
        )->build();
        $shipmentServiceOptions = ShipmentShipmentServiceOptions::builder()->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2, $shipmentPackage_3, $shipmentPackage_4],
        )
            ->setDescription('Payments')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->setInvoiceLineTotal($invoiceLineTotal)
            ->setNumOfPiecesInShipment('1')
            ->setUSPSEndorsement('5')
            ->setCostCenter('123')
            ->setPackageID('1')
            ->setShipmentServiceOptions($shipmentServiceOptions)
            ->build();
        $labelImageFormat = LabelSpecificationLabelImageFormat::builder('GIF')
            ->setDescription('GIF')
            ->build();
        $labelStockSize = LabelSpecificationLabelStockSize::builder(
            // height
            'REP',
            // width
            'REP',
        )->build();
        $labelSpecification = ShipmentRequestLabelSpecification::builder(
            // labelImageFormat
            $labelImageFormat,
            // labelStockSize
            $labelStockSize,
        )->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )
            ->setLabelSpecification($labelSpecification)
            ->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Multi-Piece Shipping.
     */
    public static function buildMultiPieceShipping(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setSubVersion('1701')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['address'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->build();
        $phone = ShipperPhone::builder('1234567890')
            ->setExtension('12')
            ->build();
        $shipper = ShipmentShipper::builder(
            // name
            'ShipperName',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('GA')
            ->setCompanyDisplayableName('GA')
            ->setPhone($phone)
            ->setFaxNumber('2134')
            ->setEMailAddress(' ')
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['AddressLine'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->setResidentialAddressIndicator('Y')
            ->build();
        $phone_1 = ShipToPhone::builder('1234567890')
            ->setExtension('12')
            ->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'ship',
            // address
            $address_1,
        )
            ->setAttentionName('GA')
            ->setCompanyDisplayableName('GA')
            ->setPhone($phone_1)
            ->setFaxNumber('1234')
            ->setEMailAddress(' ')
            ->build();
        $service = ShipmentService::builder('01')
            ->setDescription('desc')
            ->build();
        $packaging = PackagePackaging::builder('02')
            ->setDescription('desc')
            ->build();
        $unitOfMeasurement = DimensionsUnitOfMeasurement::builder()
            ->setCode('IN')
            ->setDescription('desc')
            ->build();
        $dimensions = PackageDimensions::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // length
            '02',
            // width
            '2',
            // height
            '2',
        )->build();
        $unitOfMeasurement_1 = PackageWeightUnitOfMeasurement::builder('LBS')
            ->setDescription('desc')
            ->build();
        $packageWeight = PackagePackageWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_1,
            // weight
            '50',
        )->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)
            ->setDescription('desc')
            ->setDimensions($dimensions)
            ->setPackageWeight($packageWeight)
            ->build();
        $packaging_1 = PackagePackaging::builder('02')
            ->setDescription('desc')
            ->build();
        $unitOfMeasurement_2 = DimensionsUnitOfMeasurement::builder()
            ->setCode('IN')
            ->setDescription('desc')
            ->build();
        $dimensions_1 = PackageDimensions::builder(
            // unitOfMeasurement
            $unitOfMeasurement_2,
            // length
            '02',
            // width
            '2',
            // height
            '2',
        )->build();
        $unitOfMeasurement_3 = PackageWeightUnitOfMeasurement::builder('LBS')
            ->setDescription('desc')
            ->build();
        $packageWeight_1 = PackagePackageWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_3,
            // weight
            '50',
        )->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)
            ->setDescription('desc')
            ->setDimensions($dimensions_1)
            ->setPackageWeight($packageWeight_1)
            ->build();
        $packaging_2 = PackagePackaging::builder('02')
            ->setDescription('desc')
            ->build();
        $unitOfMeasurement_4 = DimensionsUnitOfMeasurement::builder()
            ->setCode('IN')
            ->setDescription('desc')
            ->build();
        $dimensions_2 = PackageDimensions::builder(
            // unitOfMeasurement
            $unitOfMeasurement_4,
            // length
            '02',
            // width
            '2',
            // height
            '2',
        )->build();
        $unitOfMeasurement_5 = PackageWeightUnitOfMeasurement::builder('LBS')
            ->setDescription('desc')
            ->build();
        $packageWeight_2 = PackagePackageWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_5,
            // weight
            '50',
        )->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)
            ->setDescription('desc')
            ->setDimensions($dimensions_2)
            ->setPackageWeight($packageWeight_2)
            ->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['AddressLine'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->build();
        $phone_2 = ShipFromPhone::builder('1234567890')
            ->setExtension('12')
            ->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'ship',
            // address
            $address_2,
        )
            ->setAttentionName('GA')
            ->setCompanyDisplayableName('ShipFrom_CompanyDisplayableName')
            ->setPhone($phone_2)
            ->setFaxNumber('5555555555')
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2],
        )
            ->setDescription('UPS Premier')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->build();
        $labelImageFormat = LabelSpecificationLabelImageFormat::builder('ZPL')
            ->setDescription('desc')
            ->build();
        $labelStockSize = LabelSpecificationLabelStockSize::builder(
            // height
            '6',
            // width
            '4',
        )->build();
        $labelSpecification = ShipmentRequestLabelSpecification::builder(
            // labelImageFormat
            $labelImageFormat,
            // labelStockSize
            $labelStockSize,
        )
            ->setHTTPUserAgent('Mozilla/4.5')
            ->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )
            ->setLabelSpecification($labelSpecification)
            ->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Ship to a UPS Access Point.
     */
    public static function buildShipToUPSAccessPoint(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['AddressLine1'],
            // city
            'BOLTON',
            // countryCode
            'DE',
        )
            ->setStateProvinceCode('ON')
            ->setPostalCode('20999')
            ->build();
        $phone = ShipperPhone::builder('5555555555')->build();
        $shipper = ShipmentShipper::builder(
            // name
            'Shipper Name',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('Attn. Name')
            ->setCompanyDisplayableName('Shipper company')
            ->setPhone($phone)
            ->setEMailAddress(' ')
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['Morris Rd'],
            // city
            'Alpharetta',
            // countryCode
            'CA',
        )
            ->setStateProvinceCode('ON')
            ->setPostalCode('L7E5C1')
            ->build();
        $phone_1 = ShipToPhone::builder('6787462345')->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'ShipTo Name',
            // address
            $address_1,
        )
            ->setAttentionName('ShipTo Attn. Name')
            ->setCompanyDisplayableName('ShipTo Company')
            ->setPhone($phone_1)
            ->setEMailAddress(' ')
            ->build();
        $service = ShipmentService::builder('11')
            ->setDescription('Express')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)
            ->setDescription('D2R package')
            ->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)->build();
        $packaging_3 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_3 = ShipmentPackage::builder($packaging_3)->build();
        $packaging_4 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_4 = ShipmentPackage::builder($packaging_4)->build();
        $address_2 = AlternateDeliveryAddressAddress::builder(
            // addressLine
            ['Morris RD'],
            // city
            'Alpharetta',
            // countryCode
            'DE',
        )
            ->setStateProvinceCode('ON')
            ->setPostalCode('20999')
            ->build();
        $alternateDeliveryAddress = ShipmentAlternateDeliveryAddress::builder(
            // name
            'Alt. Name',
            // attentionName
            'Attn. Name',
            // address
            $address_2,
        )
            ->setUPSAccessPointID('REPLACE_M')
            ->build();
        $address_3 = ShipFromAddress::builder(
            // addressLine
            ['Old Alpharetta rd'],
            // city
            'BOLTON',
            // countryCode
            'DE',
        )
            ->setStateProvinceCode('ON')
            ->setPostalCode('20999')
            ->build();
        $phone_2 = ShipFromPhone::builder('6787463456')->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'ShipFrom Name',
            // address
            $address_3,
        )
            ->setAttentionName('ShipFrom Attn. Name')
            ->setCompanyDisplayableName('ShipFrom company')
            ->setPhone($phone_2)
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $shipmentShipmentIndicationType = ShipmentShipmentIndicationType::builder('RE')->build();
        $shipmentShipmentIndicationType_1 = ShipmentShipmentIndicationType::builder('RE')->build();
        $eMail = NotificationEMail::builder(['REPLACE_ME'])->build();
        $shipmentServiceOptionsNotification = ShipmentServiceOptionsNotification::builder(
            // notificationCode
            'REP',
            // eMail
            $eMail,
        )->build();
        $eMail_1 = NotificationEMail::builder(['REPLACE_ME'])->build();
        $shipmentServiceOptionsNotification_1 = ShipmentServiceOptionsNotification::builder(
            // notificationCode
            'REP',
            // eMail
            $eMail_1,
        )->build();
        $eMail_2 = NotificationEMail::builder(['REPLACE_ME'])->build();
        $shipmentServiceOptionsNotification_2 = ShipmentServiceOptionsNotification::builder(
            // notificationCode
            'REP',
            // eMail
            $eMail_2,
        )->build();
        $eMail_3 = NotificationEMail::builder(['REPLACE_ME'])->build();
        $shipmentServiceOptionsNotification_3 = ShipmentServiceOptionsNotification::builder(
            // notificationCode
            'REP',
            // eMail
            $eMail_3,
        )->build();
        $eMail_4 = NotificationEMail::builder(['REPLACE_ME'])->build();
        $shipmentServiceOptionsNotification_4 = ShipmentServiceOptionsNotification::builder(
            // notificationCode
            'REP',
            // eMail
            $eMail_4,
        )->build();
        $shipmentServiceOptions = ShipmentShipmentServiceOptions::builder()
            ->setNotification([
                $shipmentServiceOptionsNotification,
                $shipmentServiceOptionsNotification_1,
                $shipmentServiceOptionsNotification_2,
                $shipmentServiceOptionsNotification_3,
                $shipmentServiceOptionsNotification_4,
            ])
            ->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2, $shipmentPackage_3, $shipmentPackage_4],
        )
            ->setDescription('D2R shipments')
            ->setAlternateDeliveryAddress($alternateDeliveryAddress)
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->setShipmentIndicationType([$shipmentShipmentIndicationType, $shipmentShipmentIndicationType_1])
            ->setShipmentServiceOptions($shipmentServiceOptions)
            ->build();
        $labelImageFormat = LabelSpecificationLabelImageFormat::builder('GIF')->build();
        $labelStockSize = LabelSpecificationLabelStockSize::builder(
            // height
            '6',
            // width
            '4',
        )->build();
        $labelSpecification = ShipmentRequestLabelSpecification::builder(
            // labelImageFormat
            $labelImageFormat,
            // labelStockSize
            $labelStockSize,
        )->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )
            ->setLabelSpecification($labelSpecification)
            ->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * World Wide Economy Shipping.
     */
    public static function buildWorldWideEconomy(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setSubVersion('2108')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['2311 York Rd', '2311 York Rd', '2311 York Rd'],
            // city
            'Lutherville Timonium',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('MD')
            ->setPostalCode('21093')
            ->build();
        $phone = ShipperPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipper = ShipmentShipper::builder(
            // name
            'Shipper_name',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('UPS')
            ->setCompanyDisplayableName('Shipper_name')
            ->setPhone($phone)
            ->setFaxNumber('1234')
            ->setEMailAddress('REPLACE_ME')
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['12380 Morris Road', '12380 Morris Road', '12380 Morris Road'],
            // city
            'STARZACH',
            // countryCode
            'DE',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('72181')
            ->build();
        $phone_1 = ShipToPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'Happy Dog Pet Supply',
            // address
            $address_1,
        )
            ->setAttentionName('ShipToName')
            ->setCompanyDisplayableName('ShipToName')
            ->setPhone($phone_1)
            ->setFaxNumber('1234')
            ->setEMailAddress('REPLACE_ME')
            ->build();
        $service = ShipmentService::builder('RE')
            ->setDescription('UPS Worldwide Economy DDP')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)
            ->setDescription('Customer Supplied Package')
            ->build();
        $packaging_3 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_3 = ShipmentPackage::builder($packaging_3)->build();
        $packaging_4 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_4 = ShipmentPackage::builder($packaging_4)->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['2311 York Rd', '2311 York Rd', '2311 York Rd'],
            // city
            'Lutherville Timonium',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('MD')
            ->setPostalCode('21093')
            ->build();
        $taxIDType = ShipFromTaxIDType::builder('EIN')
            ->setDescription('EIN')
            ->build();
        $phone_2 = ShipFromPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'UPS',
            // address
            $address_2,
        )
            ->setAttentionName('ShipFromName')
            ->setCompanyDisplayableName('ShipFromName')
            ->setTaxIDType($taxIDType)
            ->setPhone($phone_2)
            ->setFaxNumber('1234')
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $shipmentRatingOptions = ShipmentShipmentRatingOptions::builder()
            ->setNegotiatedRatesIndicator('Y')
            ->build();
        $eMail = NotificationEMail::builder(['REPLACE_ME'])->build();
        $shipmentServiceOptionsNotification = ShipmentServiceOptionsNotification::builder(
            // notificationCode
            'REP',
            // eMail
            $eMail,
        )->build();
        $eMail_1 = NotificationEMail::builder(['REPLACE_ME'])->build();
        $shipmentServiceOptionsNotification_1 = ShipmentServiceOptionsNotification::builder(
            // notificationCode
            'REP',
            // eMail
            $eMail_1,
        )->build();
        $shipmentServiceOptions = ShipmentShipmentServiceOptions::builder()
            ->setNotification([$shipmentServiceOptionsNotification, $shipmentServiceOptionsNotification_1])
            ->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2, $shipmentPackage_3, $shipmentPackage_4],
        )
            ->setDescription('Worldwide econmoy Parcel')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->setShipmentRatingOptions($shipmentRatingOptions)
            ->setNumOfPiecesInShipment('REPLA')
            ->setShipmentServiceOptions($shipmentServiceOptions)
            ->setShipmentValueThresholdCode('RE')
            ->build();
        $labelImageFormat = LabelSpecificationLabelImageFormat::builder('GIF')
            ->setDescription('GIF')
            ->build();
        $labelStockSize = LabelSpecificationLabelStockSize::builder(
            // height
            'REP',
            // width
            'REP',
        )->build();
        $labelSpecification = ShipmentRequestLabelSpecification::builder(
            // labelImageFormat
            $labelImageFormat,
            // labelStockSize
            $labelStockSize,
        )
            ->setHTTPUserAgent('Mozilla/4.5')
            ->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )
            ->setLabelSpecification($labelSpecification)
            ->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Proactive Response Shipping.
     */
    public static function build10(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setSubVersion('1701')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['12380 Morris Rd'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->build();
        $phone = ShipperPhone::builder('1234567890')->build();
        $shipper = ShipmentShipper::builder(
            // name
            'Shipper_Name',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('Shipper_AttentionName')
            ->setPhone($phone)
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['793 Foothill Blvd'],
            // city
            'San Luis Obispo',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('CA')
            ->setPostalCode('93405')
            ->build();
        $phone_1 = ShipToPhone::builder('1234567890')->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'ShipTo_CompanyName',
            // address
            $address_1,
        )
            ->setAttentionName('ShipTo_AttentionName')
            ->setPhone($phone_1)
            ->setFaxNumber('1234567890')
            ->build();
        $service = ShipmentService::builder('03')
            ->setDescription('Ground')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)
            ->setDescription('Customer Supplied Package')
            ->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)->build();
        $packaging_3 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_3 = ShipmentPackage::builder($packaging_3)->build();
        $packaging_4 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_4 = ShipmentPackage::builder($packaging_4)->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['12380 Morris Rd'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->build();
        $phone_2 = ShipFromPhone::builder('1234567890')->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'ShipFrom_CompanyName',
            // address
            $address_2,
        )
            ->setAttentionName('ShipFrom_AttentionName')
            ->setPhone($phone_2)
            ->setFaxNumber('1234567890')
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2, $shipmentPackage_3, $shipmentPackage_4],
        )
            ->setDescription('1701')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->build();
        $labelImageFormat = LabelSpecificationLabelImageFormat::builder('GIF')->build();
        $labelStockSize = LabelSpecificationLabelStockSize::builder(
            // height
            'REP',
            // width
            'REP',
        )->build();
        $labelSpecification = ShipmentRequestLabelSpecification::builder(
            // labelImageFormat
            $labelImageFormat,
            // labelStockSize
            $labelStockSize,
        )->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )
            ->setLabelSpecification($labelSpecification)
            ->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Shipping with EEI Form.
     */
    public static function build11(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setSubVersion('1901')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['2 South Main Street'],
            // city
            'LONDON',
            // countryCode
            'GB',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('TW59NR')
            ->build();
        $phone = ShipperPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipper = ShipmentShipper::builder(
            // name
            'Shipper_name',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('Shipper_name')
            ->setCompanyDisplayableName('Shipper_name')
            ->setPhone($phone)
            ->setFaxNumber('8002222222')
            ->setEMailAddress('REPLACE_ME')
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['103 Avenue des Champs-Élysées'],
            // city
            'Paris',
            // countryCode
            'FR',
        )
            ->setStateProvinceCode('REPLA')
            ->setPostalCode('75008')
            ->build();
        $phone_1 = ShipToPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'ShipToName',
            // address
            $address_1,
        )
            ->setAttentionName('ShipToName')
            ->setCompanyDisplayableName('ShipToName')
            ->setPhone($phone_1)
            ->setFaxNumber('1234')
            ->setEMailAddress('REPLACE_ME')
            ->build();
        $service = ShipmentService::builder('96')
            ->setDescription('IF')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)
            ->setDescription('IF')
            ->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)->build();
        $packaging_3 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_3 = ShipmentPackage::builder($packaging_3)->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['2 South Main Street'],
            // city
            'TW59NR',
            // countryCode
            'GB',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('TW59NR')
            ->build();
        $taxIDType = ShipFromTaxIDType::builder('EIN')
            ->setDescription('IF')
            ->build();
        $phone_2 = ShipFromPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $vendorInfo = ShipFromVendorInfo::builder(
            // vendorCollectIDTypeCode
            '0356',
            // vendorCollectIDNumber
            'IMDEU1234567',
        )
            ->setConsigneeType('01')
            ->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'ShipFromName',
            // address
            $address_2,
        )
            ->setAttentionName('ShipFromName')
            ->setCompanyDisplayableName('ShipFromName')
            ->setTaxIDType($taxIDType)
            ->setPhone($phone_2)
            ->setFaxNumber('1234')
            ->setVendorInfo($vendorInfo)
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $invoiceLineTotal = ShipmentInvoiceLineTotal::builder(
            // currencyCode
            'USD',
            // monetaryValue
            '10',
        )->build();
        $internationalFormsProduct = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_1 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_2 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_3 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_4 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_5 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_6 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_7 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_8 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_9 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_10 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_11 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_12 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_13 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_14 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_15 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_16 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_17 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $unitOfMeasurement = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_1 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_1 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_1,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_1 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_1,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_2 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_2 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_2,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_2 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_2,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_3 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_3 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_3,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_3 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_3,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_4 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_4 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_4,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_4 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_4,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_5 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_5 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_5,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_5 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_5,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_6 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_6 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_6,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_6 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_6,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $cN22Form = InternationalFormsCN22Form::builder(
            // labelSize
            'RE',
            // printsPerPage
            '1',
            // labelPrintType
            'pdf',
            // cN22Type
            '1',
            // cN22Content
            [
                $cN22FormCN22Content,
                $cN22FormCN22Content_1,
                $cN22FormCN22Content_2,
                $cN22FormCN22Content_3,
                $cN22FormCN22Content_4,
                $cN22FormCN22Content_5,
                $cN22FormCN22Content_6,
            ],
        )
            ->setCN22OtherDescription('REPLACE_MEXXXXXXXXXX')
            ->setFoldHereText('REPLACE_MEXXXXXXXXXXXXXXXXXXXXXXXXX')
            ->build();
        $pOA = UPSFiledPOA::builder('1')
            ->setDescription('POA')
            ->build();
        $uPSFiled = EEIFilingOptionUPSFiled::builder($pOA)->build();
        $shipperFiled = EEIFilingOptionShipperFiled::builder('B')
            ->setDescription('ShipperFiled')
            ->setPreDepartureITNNumber('REPLACE_MEXXXXXXX')
            ->setExemptionLegend('REPLACE_MEXXXXXXXXXX')
            ->setEEIShipmentReferenceNumber('1234')
            ->build();
        $eEIFilingOption = InternationalFormsEEIFilingOption::builder('1')
            ->setEMailAddress('REPLACE_ME')
            ->setDescription('EEI')
            ->setUPSFiled($uPSFiled)
            ->setShipperFiled($shipperFiled)
            ->build();
        $address_3 = ForwardAgentAddress::builder(
            // addressLine
            ['AddressLine'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setTown('Town')
            ->setPostalCode('30005')
            ->build();
        $forwardAgent = ContactsForwardAgent::builder(
            // companyName
            'UPS',
            // taxIdentificationNumber
            '94-308351500',
            // address
            $address_3,
        )->build();
        $address_4 = UltimateConsigneeAddress::builder(
            // addressLine
            ['Address'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setTown('TOWN')
            ->setPostalCode('30005')
            ->build();
        $ultimateConsigneeType = UltimateConsigneeUltimateConsigneeType::builder('D')
            ->setDescription('Direct Consumer')
            ->build();
        $ultimateConsignee = ContactsUltimateConsignee::builder(
            // companyName
            'UPS',
            // address
            $address_4,
        )
            ->setUltimateConsigneeType($ultimateConsigneeType)
            ->build();
        $address_5 = ProducerAddress::builder(
            // addressLine
            ['Address'],
            // city
            'Marietta',
            // countryCode
            'CA',
        )
            ->setStateProvinceCode('GA')
            ->setTown('Town')
            ->setPostalCode('166222')
            ->build();
        $phone_3 = ProducerPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $producer = ContactsProducer::builder()
            ->setOption('RE')
            ->setCompanyName('ProducerCompanyName')
            ->setTaxIdentificationNumber('1234')
            ->setAddress($address_5)
            ->setAttentionName('Name')
            ->setPhone($phone_3)
            ->setEMailAddress('REPLACE_ME')
            ->build();
        $address_6 = SoldToAddress::builder(
            // addressLine
            ['103 Avenue des Champs-Élysées'],
            // city
            'Paris',
            // countryCode
            'FR',
        )
            ->setStateProvinceCode('REPLA')
            ->setPostalCode('75008')
            ->build();
        $phone_4 = SoldToPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $soldTo = ContactsSoldTo::builder(
            // name
            'ACME Designs',
            // attentionName
            'ACME Designs',
            // address
            $address_6,
        )
            ->setPhone($phone_4)
            ->setOption('01')
            ->setEMailAddress('REPLACE_ME')
            ->build();
        $contacts = InternationalFormsContacts::builder()
            ->setForwardAgent($forwardAgent)
            ->setUltimateConsignee($ultimateConsignee)
            ->setProducer($producer)
            ->setSoldTo($soldTo)
            ->build();
        $discount = InternationalFormsDiscount::builder('100')->build();
        $freightCharges = InternationalFormsFreightCharges::builder('75')->build();
        $insuranceCharges = InternationalFormsInsuranceCharges::builder('789')->build();
        $otherCharges = InternationalFormsOtherCharges::builder(
            // monetaryValue
            '10',
            // description
            '10',
        )->build();
        $blanketPeriod = InternationalFormsBlanketPeriod::builder(
            // beginDate
            '20130420',
            // endDate
            '20130430',
        )->build();
        $internationalForms = ShipmentServiceOptionsInternationalForms::builder(
            // formType
            ['REPLACE_ME'],
            // product
            [
                $internationalFormsProduct,
                $internationalFormsProduct_1,
                $internationalFormsProduct_2,
                $internationalFormsProduct_3,
                $internationalFormsProduct_4,
                $internationalFormsProduct_5,
                $internationalFormsProduct_6,
                $internationalFormsProduct_7,
                $internationalFormsProduct_8,
                $internationalFormsProduct_9,
                $internationalFormsProduct_10,
                $internationalFormsProduct_11,
                $internationalFormsProduct_12,
                $internationalFormsProduct_13,
                $internationalFormsProduct_14,
                $internationalFormsProduct_15,
                $internationalFormsProduct_16,
                $internationalFormsProduct_17,
            ],
        )
            ->setCN22Form($cN22Form)
            ->setFormGroupIdName('Invoice')
            ->setEEIFilingOption($eEIFilingOption)
            ->setContacts($contacts)
            ->setInvoiceNumber('asdf123')
            ->setInvoiceDate('20130410')
            ->setPurchaseOrderNumber('999jjj777')
            ->setTermsOfShipment('CFR')
            ->setReasonForExport('Sale')
            ->setComments('Enter in any extra information about the current shipment.')
            ->setDiscount($discount)
            ->setFreightCharges($freightCharges)
            ->setInsuranceCharges($insuranceCharges)
            ->setOtherCharges($otherCharges)
            ->setCurrencyCode('USD')
            ->setBlanketPeriod($blanketPeriod)
            ->setExportDate('20210406')
            ->setExportingCarrier('A')
            ->setCarrierID('IATA')
            ->setInBondCode('70')
            ->setEntryNumber('1A34567876545360')
            ->setPointOfOrigin('MS')
            ->setPointOfOriginType('R')
            ->setModeOfTransport('Rail')
            ->setPortOfExport('Overland')
            ->setPortOfUnloading('Germany')
            ->setLoadingPier('Pier 17 Dock 31')
            ->setPartiesToTransaction('N')
            ->build();
        $shipmentServiceOptions = ShipmentShipmentServiceOptions::builder()
            ->setInternationalForms($internationalForms)
            ->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2, $shipmentPackage_3],
        )
            ->setDescription('IF')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->setInvoiceLineTotal($invoiceLineTotal)
            ->setNumOfPiecesInShipment('1')
            ->setUSPSEndorsement('R')
            ->setCostCenter('123')
            ->setPackageID('REPLACE_ME')
            ->setShipmentServiceOptions($shipmentServiceOptions)
            ->setShipmentValueThresholdCode('01')
            ->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Shipping with Tax ID.
     */
    public static function build12(): SHIPRequestWrapper
    {
        $transactionReference = RequestTransactionReference::builder()
            ->setCustomerContext('REPLACE_ME')
            ->build();
        $request = ShipmentRequestRequest::builder('nonvalidate')
            ->setSubVersion('1901')
            ->setTransactionReference($transactionReference)
            ->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['2 South Main Street'],
            // city
            'LONDON',
            // countryCode
            'GB',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('TW59NR')
            ->build();
        $phone = ShipperPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipper = ShipmentShipper::builder(
            // name
            'Shipper_name',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )
            ->setAttentionName('Shipper_name')
            ->setCompanyDisplayableName('Shipper_name')
            ->setPhone($phone)
            ->setFaxNumber('8002222222')
            ->setEMailAddress('REPLACE_ME')
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['2311 York Rd'],
            // city
            'STARZACH',
            // countryCode
            'DE',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('72181')
            ->build();
        $phone_1 = ShipToPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'ShipToName',
            // address
            $address_1,
        )
            ->setAttentionName('ShipToName')
            ->setCompanyDisplayableName('ShipToName')
            ->setPhone($phone_1)
            ->setFaxNumber('1234')
            ->setEMailAddress('REPLACE_ME')
            ->build();
        $service = ShipmentService::builder('96')
            ->setDescription('IF')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)
            ->setDescription('IF')
            ->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)->build();
        $packaging_3 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_3 = ShipmentPackage::builder($packaging_3)->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['2 South Main Street'],
            // city
            'TW59NR',
            // countryCode
            'GB',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('TW59NR')
            ->build();
        $taxIDType = ShipFromTaxIDType::builder('EIN')
            ->setDescription('IF')
            ->build();
        $phone_2 = ShipFromPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $vendorInfo = ShipFromVendorInfo::builder(
            // vendorCollectIDTypeCode
            '0356',
            // vendorCollectIDNumber
            'IMDEU1234567',
        )
            ->setConsigneeType('01')
            ->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'ShipFromName',
            // address
            $address_2,
        )
            ->setAttentionName('ShipFromName')
            ->setCompanyDisplayableName('ShipFromName')
            ->setTaxIDType($taxIDType)
            ->setPhone($phone_2)
            ->setFaxNumber('1234')
            ->setVendorInfo($vendorInfo)
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $invoiceLineTotal = ShipmentInvoiceLineTotal::builder(
            // currencyCode
            'USD',
            // monetaryValue
            '10',
        )->build();
        $internationalFormsProduct = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_1 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_2 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_3 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_4 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_5 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_6 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_7 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_8 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_9 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_10 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_11 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_12 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_13 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_14 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_15 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_16 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $internationalFormsProduct_17 = InternationalFormsProduct::builder(['REPLACE_ME'])->build();
        $unitOfMeasurement = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_1 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_1 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_1,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_1 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_1,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_2 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_2 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_2,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_2 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_2,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_3 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_3 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_3,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_3 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_3,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_4 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_4 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_4,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_4 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_4,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_5 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_5 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_5,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_5 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_5,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $unitOfMeasurement_6 = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight_6 = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement_6,
            // weight
            'REPLACE',
        )->build();
        $cN22FormCN22Content_6 = CN22FormCN22Content::builder(
            // cN22ContentQuantity
            'REPLACE_ME',
            // cN22ContentDescription
            'REPLACE_ME',
            // cN22ContentWeight
            $cN22ContentWeight_6,
            // cN22ContentTotalValue
            'REPLACE_M',
            // cN22ContentCurrencyCode
            'REP',
        )->build();
        $cN22Form = InternationalFormsCN22Form::builder(
            // labelSize
            'RE',
            // printsPerPage
            '1',
            // labelPrintType
            'pdf',
            // cN22Type
            '1',
            // cN22Content
            [
                $cN22FormCN22Content,
                $cN22FormCN22Content_1,
                $cN22FormCN22Content_2,
                $cN22FormCN22Content_3,
                $cN22FormCN22Content_4,
                $cN22FormCN22Content_5,
                $cN22FormCN22Content_6,
            ],
        )
            ->setCN22OtherDescription('REPLACE_MEXXXXXXXXXX')
            ->setFoldHereText('REPLACE_MEXXXXXXXXXXXXXXXXXXXXXXXXX')
            ->build();
        $pOA = UPSFiledPOA::builder('1')
            ->setDescription('POA')
            ->build();
        $uPSFiled = EEIFilingOptionUPSFiled::builder($pOA)->build();
        $shipperFiled = EEIFilingOptionShipperFiled::builder('B')
            ->setDescription('ShipperFiled')
            ->setPreDepartureITNNumber('REPLACE_MEXXXXXXX')
            ->setExemptionLegend('REPLACE_MEXXXXXXXXXX')
            ->setEEIShipmentReferenceNumber('1234')
            ->build();
        $eEIFilingOption = InternationalFormsEEIFilingOption::builder('1')
            ->setEMailAddress('REPLACE_ME')
            ->setDescription('EEI')
            ->setUPSFiled($uPSFiled)
            ->setShipperFiled($shipperFiled)
            ->build();
        $address_3 = ForwardAgentAddress::builder(
            // addressLine
            ['AddressLine'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setTown('Town')
            ->setPostalCode('30005')
            ->build();
        $forwardAgent = ContactsForwardAgent::builder(
            // companyName
            'UPS',
            // taxIdentificationNumber
            '12345',
            // address
            $address_3,
        )->build();
        $address_4 = UltimateConsigneeAddress::builder(
            // addressLine
            ['Address'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setTown('TOWN')
            ->setPostalCode('30005')
            ->build();
        $ultimateConsigneeType = UltimateConsigneeUltimateConsigneeType::builder('D')
            ->setDescription('Direct Consumer')
            ->build();
        $ultimateConsignee = ContactsUltimateConsignee::builder(
            // companyName
            'UPS',
            // address
            $address_4,
        )
            ->setUltimateConsigneeType($ultimateConsigneeType)
            ->build();
        $address_5 = ProducerAddress::builder(
            // addressLine
            ['Address'],
            // city
            'Marietta',
            // countryCode
            'CA',
        )
            ->setStateProvinceCode('GA')
            ->setTown('Town')
            ->setPostalCode('166222')
            ->build();
        $phone_3 = ProducerPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $producer = ContactsProducer::builder()
            ->setOption('RE')
            ->setCompanyName('ProducerCompanyName')
            ->setTaxIdentificationNumber('1234')
            ->setAddress($address_5)
            ->setAttentionName('Name')
            ->setPhone($phone_3)
            ->setEMailAddress('REPLACE_ME')
            ->build();
        $address_6 = SoldToAddress::builder(
            // addressLine
            ['Address'],
            // city
            'STARZACH',
            // countryCode
            'DE',
        )
            ->setStateProvinceCode('GA')
            ->setTown('town')
            ->setPostalCode('72181')
            ->build();
        $phone_4 = SoldToPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $soldTo = ContactsSoldTo::builder(
            // name
            'ACME Designs',
            // attentionName
            'ACME Designs',
            // address
            $address_6,
        )
            ->setPhone($phone_4)
            ->setOption('01')
            ->setEMailAddress('REPLACE_ME')
            ->build();
        $contacts = InternationalFormsContacts::builder()
            ->setForwardAgent($forwardAgent)
            ->setUltimateConsignee($ultimateConsignee)
            ->setProducer($producer)
            ->setSoldTo($soldTo)
            ->build();
        $discount = InternationalFormsDiscount::builder('100')->build();
        $freightCharges = InternationalFormsFreightCharges::builder('75')->build();
        $insuranceCharges = InternationalFormsInsuranceCharges::builder('789')->build();
        $otherCharges = InternationalFormsOtherCharges::builder(
            // monetaryValue
            '10',
            // description
            '10',
        )->build();
        $blanketPeriod = InternationalFormsBlanketPeriod::builder(
            // beginDate
            '20130420',
            // endDate
            '20130430',
        )->build();
        $internationalForms = ShipmentServiceOptionsInternationalForms::builder(
            // formType
            ['REPLACE_ME'],
            // product
            [
                $internationalFormsProduct,
                $internationalFormsProduct_1,
                $internationalFormsProduct_2,
                $internationalFormsProduct_3,
                $internationalFormsProduct_4,
                $internationalFormsProduct_5,
                $internationalFormsProduct_6,
                $internationalFormsProduct_7,
                $internationalFormsProduct_8,
                $internationalFormsProduct_9,
                $internationalFormsProduct_10,
                $internationalFormsProduct_11,
                $internationalFormsProduct_12,
                $internationalFormsProduct_13,
                $internationalFormsProduct_14,
                $internationalFormsProduct_15,
                $internationalFormsProduct_16,
                $internationalFormsProduct_17,
            ],
        )
            ->setCN22Form($cN22Form)
            ->setFormGroupIdName('Invoice')
            ->setEEIFilingOption($eEIFilingOption)
            ->setContacts($contacts)
            ->setInvoiceNumber('asdf123')
            ->setInvoiceDate('20130410')
            ->setPurchaseOrderNumber('999jjj777')
            ->setTermsOfShipment('CFR')
            ->setReasonForExport('Sale')
            ->setComments('Enter in any extra information about the current shipment.')
            ->setDiscount($discount)
            ->setFreightCharges($freightCharges)
            ->setInsuranceCharges($insuranceCharges)
            ->setOtherCharges($otherCharges)
            ->setCurrencyCode('USD')
            ->setBlanketPeriod($blanketPeriod)
            ->setExportDate('20210406')
            ->setExportingCarrier('A')
            ->setCarrierID('IATA')
            ->setInBondCode('70')
            ->setEntryNumber('1A34567876545360')
            ->setPointOfOrigin('MS')
            ->setPointOfOriginType('R')
            ->setModeOfTransport('Rail')
            ->setPortOfExport('Overland')
            ->setPortOfUnloading('Germany')
            ->setLoadingPier('Pier 17 Dock 31')
            ->setPartiesToTransaction('N')
            ->build();
        $shipmentServiceOptions = ShipmentShipmentServiceOptions::builder()
            ->setInternationalForms($internationalForms)
            ->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage, $shipmentPackage_1, $shipmentPackage_2, $shipmentPackage_3],
        )
            ->setDescription('IF')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->setInvoiceLineTotal($invoiceLineTotal)
            ->setNumOfPiecesInShipment('1')
            ->setUSPSEndorsement('R')
            ->setCostCenter('123')
            ->setPackageID('REPLACE_ME')
            ->setShipmentServiceOptions($shipmentServiceOptions)
            ->setShipmentValueThresholdCode('01')
            ->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    /**
     * Shipping with Carbon Offsets.
     */
    public static function build13(): SHIPRequestWrapper
    {
        $request = ShipmentRequestRequest::builder('REPLACE_ME')->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['ShipperAddress', 'ShipperAddress', 'ShipperAddress'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30005')
            ->build();
        $phone = ShipperPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipper = ShipmentShipper::builder(
            // name
            'Shipper_name',
            // shipperNumber
            '3217GG',
            // address
            $address,
        )
            ->setAttentionName('Shipper_name')
            ->setCompanyDisplayableName('Shipper_name')
            ->setPhone($phone)
            ->setFaxNumber('1234')
            ->setEMailAddress('test@ups.com')
            ->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['ShipToAddress', 'ShipToAddress', 'ShipToAddress'],
            // city
            'carrollton',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30117')
            ->build();
        $phone_1 = ShipToPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'ShipToName',
            // address
            $address_1,
        )
            ->setAttentionName('ShipToName')
            ->setCompanyDisplayableName('ShipToName')
            ->setPhone($phone_1)
            ->setFaxNumber('1234')
            ->setEMailAddress('test@ups.com')
            ->build();
        $service = ShipmentService::builder('01')
            ->setDescription('Next Day Air')
            ->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $packaging_1 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_1 = ShipmentPackage::builder($packaging_1)->build();
        $packaging_2 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_2 = ShipmentPackage::builder($packaging_2)
            ->setDescription('desc')
            ->build();
        $packaging_3 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_3 = ShipmentPackage::builder($packaging_3)->build();
        $packaging_4 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_4 = ShipmentPackage::builder($packaging_4)->build();
        $packaging_5 = PackagePackaging::builder('RE')->build();
        $shipmentPackage_5 = ShipmentPackage::builder($packaging_5)->build();
        $address_2 = ShipFromAddress::builder(
            // addressLine
            ['ShipFromAddress', 'ShipFromAddress', 'ShipFromAddress'],
            // city
            'Texas',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('TX')
            ->setPostalCode('77040')
            ->build();
        $taxIDType = ShipFromTaxIDType::builder('EIN')->build();
        $phone_2 = ShipFromPhone::builder('1234567890')
            ->setExtension('1234')
            ->build();
        $shipFrom = ShipmentShipFrom::builder(
            // name
            'ShipFromName',
            // address
            $address_2,
        )
            ->setAttentionName('ShipFromName')
            ->setCompanyDisplayableName('ShipFromName')
            ->setTaxIDType($taxIDType)
            ->setPhone($phone_2)
            ->setFaxNumber('1234')
            ->build();
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformationShipmentCharge_1 = PaymentInformationShipmentCharge::builder('RE')->build();
        $paymentInformation = ShipmentPaymentInformation::builder([
            $paymentInformationShipmentCharge,
            $paymentInformationShipmentCharge_1,
        ])->build();
        $invoiceLineTotal = ShipmentInvoiceLineTotal::builder(
            // currencyCode
            'USD',
            // monetaryValue
            '10',
        )->build();
        $shipmentServiceOptions = ShipmentShipmentServiceOptions::builder()
            ->setUPScarbonneutralIndicator('')
            ->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [
                $shipmentPackage,
                $shipmentPackage_1,
                $shipmentPackage_2,
                $shipmentPackage_3,
                $shipmentPackage_4,
                $shipmentPackage_5,
            ],
        )
            ->setDescription('DG')
            ->setShipFrom($shipFrom)
            ->setPaymentInformation($paymentInformation)
            ->setInvoiceLineTotal($invoiceLineTotal)
            ->setNumOfPiecesInShipment('1')
            ->setShipmentServiceOptions($shipmentServiceOptions)
            ->setShipmentDate('20231012')
            ->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }
}
