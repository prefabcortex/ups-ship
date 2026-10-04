<?php

declare(strict_types=1);

namespace Prefabcortex\UpsShip\Tests\Fixture;

use Prefabcortex\UpsShip\Model\AddressPOE;
use Prefabcortex\UpsShip\Model\AdjustedHeightUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\AgentTaxIdentificationNumberTaxIdentificationNumber;
use Prefabcortex\UpsShip\Model\AlternateDeliveryAddressAddress;
use Prefabcortex\UpsShip\Model\BillingWeightUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\BillReceiverAddress;
use Prefabcortex\UpsShip\Model\BillShipperCreditCard;
use Prefabcortex\UpsShip\Model\BillThirdPartyAddress;
use Prefabcortex\UpsShip\Model\ChildLTLCharges;
use Prefabcortex\UpsShip\Model\ChildLTLPackage;
use Prefabcortex\UpsShip\Model\ChildProduct;
use Prefabcortex\UpsShip\Model\ChildProductUnitOfMeasure;
use Prefabcortex\UpsShip\Model\CN22ContentCN22ContentWeight;
use Prefabcortex\UpsShip\Model\CN22ContentCN22DDSReferenceNumber;
use Prefabcortex\UpsShip\Model\CN22ContentWeightUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\CN22FormCN22Content;
use Prefabcortex\UpsShip\Model\CODCODAmount;
use Prefabcortex\UpsShip\Model\CODTurnInPageImage;
use Prefabcortex\UpsShip\Model\CODTurnInPageImageImageFormat;
use Prefabcortex\UpsShip\Model\CommodityNMFC;
use Prefabcortex\UpsShip\Model\CommonErrorResponse;
use Prefabcortex\UpsShip\Model\ContactsForwardAgent;
use Prefabcortex\UpsShip\Model\ContactsIntermediateConsignee;
use Prefabcortex\UpsShip\Model\ContactsProducer;
use Prefabcortex\UpsShip\Model\ContactsSoldTo;
use Prefabcortex\UpsShip\Model\ContactsUltimateConsignee;
use Prefabcortex\UpsShip\Model\ControlLogReceiptImageFormat;
use Prefabcortex\UpsShip\Model\CreditCardAddress;
use Prefabcortex\UpsShip\Model\DDTCInformationUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\DeclaredValueType;
use Prefabcortex\UpsShip\Model\DimensionsUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\DimWeightUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\DryIceDryIceWeight;
use Prefabcortex\UpsShip\Model\DryIceWeightUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\EEIFilingOptionShipperFiled;
use Prefabcortex\UpsShip\Model\EEIFilingOptionUPSFiled;
use Prefabcortex\UpsShip\Model\EEIInformationDDTCInformation;
use Prefabcortex\UpsShip\Model\EEIInformationLicense;
use Prefabcortex\UpsShip\Model\ErrorMessage;
use Prefabcortex\UpsShip\Model\ErrorResponse;
use Prefabcortex\UpsShip\Model\FormImage;
use Prefabcortex\UpsShip\Model\ForwardAgentAddress;
use Prefabcortex\UpsShip\Model\FreightDensityInfoAdjustedHeight;
use Prefabcortex\UpsShip\Model\FreightDensityInfoHandlingUnits;
use Prefabcortex\UpsShip\Model\FreightShipmentInformationFreightDensityInfo;
use Prefabcortex\UpsShip\Model\FRSPaymentInformationAddress;
use Prefabcortex\UpsShip\Model\FRSPaymentInformationType;
use Prefabcortex\UpsShip\Model\FRSShipmentDataFreightDensityRate;
use Prefabcortex\UpsShip\Model\FRSShipmentDataHandlingUnits;
use Prefabcortex\UpsShip\Model\FRSShipmentDataTransportationCharges;
use Prefabcortex\UpsShip\Model\GlobalTaxInformationAgentTaxIdentificationNumber;
use Prefabcortex\UpsShip\Model\HandlingUnitsAdjustedHeight;
use Prefabcortex\UpsShip\Model\HandlingUnitsDimensions;
use Prefabcortex\UpsShip\Model\HandlingUnitsType;
use Prefabcortex\UpsShip\Model\HandlingUnitsUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\HighValueReportImage;
use Prefabcortex\UpsShip\Model\HighValueReportImageImageFormat;
use Prefabcortex\UpsShip\Model\ImageImageFormat;
use Prefabcortex\UpsShip\Model\IntermediateConsigneeAddress;
use Prefabcortex\UpsShip\Model\InternationalFormsBlanketPeriod;
use Prefabcortex\UpsShip\Model\InternationalFormsCN22Form;
use Prefabcortex\UpsShip\Model\InternationalFormsContacts;
use Prefabcortex\UpsShip\Model\InternationalFormsDiscount;
use Prefabcortex\UpsShip\Model\InternationalFormsEEIFilingOption;
use Prefabcortex\UpsShip\Model\InternationalFormsFreightCharges;
use Prefabcortex\UpsShip\Model\InternationalFormsInsuranceCharges;
use Prefabcortex\UpsShip\Model\InternationalFormsOtherCharges;
use Prefabcortex\UpsShip\Model\InternationalFormsProduct;
use Prefabcortex\UpsShip\Model\InternationalFormsUPSPremiumCareForm;
use Prefabcortex\UpsShip\Model\InternationalFormsUserCreatedForm;
use Prefabcortex\UpsShip\Model\LabelDeliveryEMail;
use Prefabcortex\UpsShip\Model\LabelImageLabelImageFormat;
use Prefabcortex\UpsShip\Model\LabelRecoveryFormImage;
use Prefabcortex\UpsShip\Model\LabelRecoveryImageImageFormat;
use Prefabcortex\UpsShip\Model\LabelRecoveryLabelSpecificationLabelImageFormat;
use Prefabcortex\UpsShip\Model\LabelRecoveryLabelSpecificationLabelStockSize;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequest;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestLabelDelivery;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestLabelSpecification;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestReferenceValues;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestRequest;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestTranslate;
use Prefabcortex\UpsShip\Model\LabelRecoveryRequestUPSPremiumCareForm;
use Prefabcortex\UpsShip\Model\LABELRECOVERYRequestWrapper;
use Prefabcortex\UpsShip\Model\LabelRecoveryResponse;
use Prefabcortex\UpsShip\Model\LabelRecoveryResponseCODTurnInPage;
use Prefabcortex\UpsShip\Model\LabelRecoveryResponseForm;
use Prefabcortex\UpsShip\Model\LabelRecoveryResponseHighValueReport;
use Prefabcortex\UpsShip\Model\LabelRecoveryResponseLabelResults;
use Prefabcortex\UpsShip\Model\LabelRecoveryResponseResponse;
use Prefabcortex\UpsShip\Model\LabelRecoveryResponseTrackingCandidate;
use Prefabcortex\UpsShip\Model\LABELRECOVERYResponseWrapper;
use Prefabcortex\UpsShip\Model\LabelResultsForm;
use Prefabcortex\UpsShip\Model\LabelResultsLabelImage;
use Prefabcortex\UpsShip\Model\LabelResultsMailInnovationsLabelImage;
use Prefabcortex\UpsShip\Model\LabelResultsReceipt;
use Prefabcortex\UpsShip\Model\LabelSpecificationInstruction;
use Prefabcortex\UpsShip\Model\LabelSpecificationLabelImageFormat;
use Prefabcortex\UpsShip\Model\LabelSpecificationLabelStockSize;
use Prefabcortex\UpsShip\Model\LRCODTurnInPageImage;
use Prefabcortex\UpsShip\Model\LRCODTurnInPageImageImageFormat;
use Prefabcortex\UpsShip\Model\LRFormImage;
use Prefabcortex\UpsShip\Model\LRRequestTransactionReference;
use Prefabcortex\UpsShip\Model\LRResponseResponseStatus;
use Prefabcortex\UpsShip\Model\LRResponseTransactionReference;
use Prefabcortex\UpsShip\Model\LTLDimensions;
use Prefabcortex\UpsShip\Model\LTLDimensionsUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\LTLHandlingUnits;
use Prefabcortex\UpsShip\Model\LTLHandlingUnitsFreightClass;
use Prefabcortex\UpsShip\Model\LTLHandlingUnitsType;
use Prefabcortex\UpsShip\Model\LTLOtherCharges;
use Prefabcortex\UpsShip\Model\LTLPackageWeightType;
use Prefabcortex\UpsShip\Model\LTLPackageWeightTypeUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\LTLReferenceNumber;
use Prefabcortex\UpsShip\Model\LTLReferenceNumberCode;
use Prefabcortex\UpsShip\Model\MailInnovationsLabelImageLabelImageFormat;
use Prefabcortex\UpsShip\Model\MasterPickup;
use Prefabcortex\UpsShip\Model\MasterSoldTo;
use Prefabcortex\UpsShip\Model\MasterTradeComplianceDetails;
use Prefabcortex\UpsShip\Model\MasterTradeComplianceDetailsTermsOfShipment;
use Prefabcortex\UpsShip\Model\NegotiatedChargesItemizedCharges;
use Prefabcortex\UpsShip\Model\NegotiatedChargesRateModifier;
use Prefabcortex\UpsShip\Model\NegotiatedRateChargesItemizedCharges;
use Prefabcortex\UpsShip\Model\NegotiatedRateChargesRateModifier;
use Prefabcortex\UpsShip\Model\NegotiatedRateChargesTaxCharges;
use Prefabcortex\UpsShip\Model\NegotiatedRateChargesTotalCharge;
use Prefabcortex\UpsShip\Model\NegotiatedRateChargesTotalChargesWithTaxes;
use Prefabcortex\UpsShip\Model\NotificationEMail;
use Prefabcortex\UpsShip\Model\NotificationLocale;
use Prefabcortex\UpsShip\Model\NotificationTextMessage;
use Prefabcortex\UpsShip\Model\NotificationVoiceMessage;
use Prefabcortex\UpsShip\Model\PackageCommodity;
use Prefabcortex\UpsShip\Model\PackageDimensions;
use Prefabcortex\UpsShip\Model\PackageDimWeight;
use Prefabcortex\UpsShip\Model\PackageHazMatPackageInformation;
use Prefabcortex\UpsShip\Model\PackageLevelResultsStatus;
use Prefabcortex\UpsShip\Model\PackagePackageServiceOptions;
use Prefabcortex\UpsShip\Model\PackagePackageWeight;
use Prefabcortex\UpsShip\Model\PackagePackaging;
use Prefabcortex\UpsShip\Model\PackageReferenceNumber;
use Prefabcortex\UpsShip\Model\PackageResultsAccessorial;
use Prefabcortex\UpsShip\Model\PackageResultsBaseServiceCharge;
use Prefabcortex\UpsShip\Model\PackageResultsForm;
use Prefabcortex\UpsShip\Model\PackageResultsItemizedCharges;
use Prefabcortex\UpsShip\Model\PackageResultsNegotiatedCharges;
use Prefabcortex\UpsShip\Model\PackageResultsRateModifier;
use Prefabcortex\UpsShip\Model\PackageResultsServiceOptionsCharges;
use Prefabcortex\UpsShip\Model\PackageResultsShippingLabel;
use Prefabcortex\UpsShip\Model\PackageResultsShippingReceipt;
use Prefabcortex\UpsShip\Model\PackageResultsSimpleRate;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsAccessPointCOD;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsCOD;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsCODCODAmount;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsDeclaredValue;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsDeliveryConfirmation;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsDryIce;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsHazMat;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsHealthcare;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsNotification;
use Prefabcortex\UpsShip\Model\PackageServiceOptionsNotificationEMail;
use Prefabcortex\UpsShip\Model\PackageSimpleRate;
use Prefabcortex\UpsShip\Model\PackageUPSPremier;
use Prefabcortex\UpsShip\Model\PackageWeightUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\PackingListInfoPackageAssociated;
use Prefabcortex\UpsShip\Model\PaymentInformationShipmentCharge;
use Prefabcortex\UpsShip\Model\PreAlertNotificationEMailMessage;
use Prefabcortex\UpsShip\Model\PreAlertNotificationLocale;
use Prefabcortex\UpsShip\Model\PreAlertNotificationTextMessage;
use Prefabcortex\UpsShip\Model\PreAlertNotificationVoiceMessage;
use Prefabcortex\UpsShip\Model\ProducerAddress;
use Prefabcortex\UpsShip\Model\ProducerPhone;
use Prefabcortex\UpsShip\Model\ProductDDSReferenceNumber;
use Prefabcortex\UpsShip\Model\ProductEEIInformation;
use Prefabcortex\UpsShip\Model\ProductExcludeFromForm;
use Prefabcortex\UpsShip\Model\ProductNetCostDateRange;
use Prefabcortex\UpsShip\Model\ProductPackingListInfo;
use Prefabcortex\UpsShip\Model\ProductProductWeight;
use Prefabcortex\UpsShip\Model\ProductScheduleB;
use Prefabcortex\UpsShip\Model\ProductUnit;
use Prefabcortex\UpsShip\Model\ProductWeightUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\ReceiptImage;
use Prefabcortex\UpsShip\Model\ReceiptImageImageFormat;
use Prefabcortex\UpsShip\Model\ReceiptSpecificationImageFormat;
use Prefabcortex\UpsShip\Model\ReferenceValuesReferenceNumber;
use Prefabcortex\UpsShip\Model\RequestTransactionReference;
use Prefabcortex\UpsShip\Model\ResponseAlert;
use Prefabcortex\UpsShip\Model\ResponseResponseStatus;
use Prefabcortex\UpsShip\Model\ResponseTransactionReference;
use Prefabcortex\UpsShip\Model\ScheduleBUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\ShipFromAddress;
use Prefabcortex\UpsShip\Model\ShipFromPhone;
use Prefabcortex\UpsShip\Model\ShipFromTaxIDType;
use Prefabcortex\UpsShip\Model\ShipFromVendorInfo;
use Prefabcortex\UpsShip\Model\ShipmentAlternateDeliveryAddress;
use Prefabcortex\UpsShip\Model\ShipmentChargeBillReceiver;
use Prefabcortex\UpsShip\Model\ShipmentChargeBillShipper;
use Prefabcortex\UpsShip\Model\ShipmentChargeBillThirdParty;
use Prefabcortex\UpsShip\Model\ShipmentChargesBaseServiceCharge;
use Prefabcortex\UpsShip\Model\ShipmentChargesItemizedCharges;
use Prefabcortex\UpsShip\Model\ShipmentChargesServiceOptionsCharges;
use Prefabcortex\UpsShip\Model\ShipmentChargesTaxCharges;
use Prefabcortex\UpsShip\Model\ShipmentChargesTotalCharges;
use Prefabcortex\UpsShip\Model\ShipmentChargesTotalChargesWithTaxes;
use Prefabcortex\UpsShip\Model\ShipmentChargesTransportationCharges;
use Prefabcortex\UpsShip\Model\ShipmentDGSignatoryInfo;
use Prefabcortex\UpsShip\Model\ShipmentFreightShipmentInformation;
use Prefabcortex\UpsShip\Model\ShipmentFRSPaymentInformation;
use Prefabcortex\UpsShip\Model\ShipmentGlobalTaxInformation;
use Prefabcortex\UpsShip\Model\ShipmentInvoiceLineTotal;
use Prefabcortex\UpsShip\Model\ShipmentPackage;
use Prefabcortex\UpsShip\Model\ShipmentPaymentInformation;
use Prefabcortex\UpsShip\Model\ShipmentPromotionalDiscountInformation;
use Prefabcortex\UpsShip\Model\ShipmentReferenceNumber;
use Prefabcortex\UpsShip\Model\ShipmentRequest;
use Prefabcortex\UpsShip\Model\ShipmentRequestLabelSpecification;
use Prefabcortex\UpsShip\Model\ShipmentRequestReceiptSpecification;
use Prefabcortex\UpsShip\Model\ShipmentRequestRequest;
use Prefabcortex\UpsShip\Model\ShipmentRequestShipment;
use Prefabcortex\UpsShip\Model\ShipmentResponse;
use Prefabcortex\UpsShip\Model\ShipmentResponseResponse;
use Prefabcortex\UpsShip\Model\ShipmentResponseShipmentResults;
use Prefabcortex\UpsShip\Model\ShipmentResultsBillingWeight;
use Prefabcortex\UpsShip\Model\ShipmentResultsCODTurnInPage;
use Prefabcortex\UpsShip\Model\ShipmentResultsControlLogReceipt;
use Prefabcortex\UpsShip\Model\ShipmentResultsDisclaimer;
use Prefabcortex\UpsShip\Model\ShipmentResultsForm;
use Prefabcortex\UpsShip\Model\ShipmentResultsFormImage;
use Prefabcortex\UpsShip\Model\ShipmentResultsFRSShipmentData;
use Prefabcortex\UpsShip\Model\ShipmentResultsHighValueReport;
use Prefabcortex\UpsShip\Model\ShipmentResultsImageImageFormat;
use Prefabcortex\UpsShip\Model\ShipmentResultsNegotiatedRateCharges;
use Prefabcortex\UpsShip\Model\ShipmentResultsPackageResults;
use Prefabcortex\UpsShip\Model\ShipmentResultsPalletLabel;
use Prefabcortex\UpsShip\Model\ShipmentResultsShipmentCharges;
use Prefabcortex\UpsShip\Model\ShipmentReturnService;
use Prefabcortex\UpsShip\Model\ShipmentService;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsAccessPointCOD;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsCOD;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsDeliveryConfirmation;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsInternationalForms;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsLabelDelivery;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsLabelMethod;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsNotification;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsPreAlertNotification;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsRestrictedArticles;
use Prefabcortex\UpsShip\Model\ShipmentServiceOptionsVerifiedDelivery;
use Prefabcortex\UpsShip\Model\ShipmentShipFrom;
use Prefabcortex\UpsShip\Model\ShipmentShipmentIndicationType;
use Prefabcortex\UpsShip\Model\ShipmentShipmentRatingOptions;
use Prefabcortex\UpsShip\Model\ShipmentShipmentServiceOptions;
use Prefabcortex\UpsShip\Model\ShipmentShipper;
use Prefabcortex\UpsShip\Model\ShipmentShipTo;
use Prefabcortex\UpsShip\Model\ShipmentTradeDirect;
use Prefabcortex\UpsShip\Model\ShipmentTradeDirectShipmentType;
use Prefabcortex\UpsShip\Model\ShipmentWorldEase;
use Prefabcortex\UpsShip\Model\ShipmentWorldEaseMasterShipmentChgType;
use Prefabcortex\UpsShip\Model\ShipmentWorldEasePortOfEntry;
use Prefabcortex\UpsShip\Model\ShipperAddress;
use Prefabcortex\UpsShip\Model\ShipperPhone;
use Prefabcortex\UpsShip\Model\ShippingLabelImageFormat;
use Prefabcortex\UpsShip\Model\ShippingReceiptImageFormat;
use Prefabcortex\UpsShip\Model\SHIPRequestWrapper;
use Prefabcortex\UpsShip\Model\SHIPResponseWrapper;
use Prefabcortex\UpsShip\Model\ShipToAddress;
use Prefabcortex\UpsShip\Model\ShipToPhone;
use Prefabcortex\UpsShip\Model\SoldToAddress;
use Prefabcortex\UpsShip\Model\SoldToPhone;
use Prefabcortex\UpsShip\Model\SummaryResultStatus;
use Prefabcortex\UpsShip\Model\TrackingCandidatePickupDateRange;
use Prefabcortex\UpsShip\Model\TradeDirectAddress;
use Prefabcortex\UpsShip\Model\TradeDirectChild;
use Prefabcortex\UpsShip\Model\TradeDirectChildType;
use Prefabcortex\UpsShip\Model\TradeDirectMaster;
use Prefabcortex\UpsShip\Model\TradeDirectMasterUomType;
use Prefabcortex\UpsShip\Model\TradeDirectNotificationBeforeDelivery;
use Prefabcortex\UpsShip\Model\TradeDirectNotificationBeforeDeliveryMediaTypeCode;
use Prefabcortex\UpsShip\Model\TradeDirectNotificationBeforeDeliveryRequestType;
use Prefabcortex\UpsShip\Model\TradeDirectPhone;
use Prefabcortex\UpsShip\Model\TransportationChargesDiscountAmount;
use Prefabcortex\UpsShip\Model\TransportationChargesGrossCharge;
use Prefabcortex\UpsShip\Model\TransportationChargesNetCharge;
use Prefabcortex\UpsShip\Model\UltimateConsigneeAddress;
use Prefabcortex\UpsShip\Model\UltimateConsigneeUltimateConsigneeType;
use Prefabcortex\UpsShip\Model\UnitUnitOfMeasurement;
use Prefabcortex\UpsShip\Model\UPSFiledPOA;
use Prefabcortex\UpsShip\Model\UPSPremierHandlingInstructions;
use Prefabcortex\UpsShip\Model\UPSPremiumCareFormLanguageForUPSPremiumCare;
use Prefabcortex\UpsShip\Model\VoidRequestTransactionReference;
use Prefabcortex\UpsShip\Model\VoidResponseResponseStatus;
use Prefabcortex\UpsShip\Model\VoidResponseTransactionReference;
use Prefabcortex\UpsShip\Model\VoidShipmentRequest;
use Prefabcortex\UpsShip\Model\VoidShipmentRequestRequest;
use Prefabcortex\UpsShip\Model\VoidShipmentRequestVoidShipment;
use Prefabcortex\UpsShip\Model\VOIDSHIPMENTRequestWrapper;
use Prefabcortex\UpsShip\Model\VoidShipmentResponse;
use Prefabcortex\UpsShip\Model\VoidShipmentResponsePackageLevelResults;
use Prefabcortex\UpsShip\Model\VoidShipmentResponseResponse;
use Prefabcortex\UpsShip\Model\VoidShipmentResponseSummaryResult;
use Prefabcortex\UpsShip\Model\VOIDSHIPMENTResponseWrapper;

final class ModelFixtures
{
    public static function buildSHIPRequestWrapper(): SHIPRequestWrapper
    {
        $request = ShipmentRequestRequest::builder('REPLACE_ME')->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
        $shipper = ShipmentShipper::builder(
            // name
            'REPLACE_ME',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'REPLACE_ME',
            // address
            $address_1,
        )->build();
        $service = ShipmentService::builder('RE')->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage],
        )->build();
        $shipmentRequest = ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )->build();

        return SHIPRequestWrapper::builder($shipmentRequest)->build();
    }

    public static function buildSHIPResponseWrapper(): SHIPResponseWrapper
    {
        $responseStatus = ResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
        $response = ShipmentResponseResponse::builder($responseStatus)->build();
        $unitOfMeasurement = BillingWeightUnitOfMeasurement::builder('REP')->build();
        $billingWeight = ShipmentResultsBillingWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLACE_',
        )->build();
        $shipmentResults = ShipmentResponseShipmentResults::builder($billingWeight)
            ->setUSI('578299028T')
            ->build();
        $shipmentResponse = ShipmentResponse::builder(
            // response
            $response,
            // shipmentResults
            $shipmentResults,
        )->build();

        return SHIPResponseWrapper::builder($shipmentResponse)->build();
    }

    public static function buildShipmentRequest(): ShipmentRequest
    {
        $request = ShipmentRequestRequest::builder('REPLACE_ME')->build();
        $address = ShipperAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
        $shipper = ShipmentShipper::builder(
            // name
            'REPLACE_ME',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'REPLACE_ME',
            // address
            $address_1,
        )->build();
        $service = ShipmentService::builder('RE')->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();
        $shipment = ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage],
        )->build();

        return ShipmentRequest::builder(
            // request
            $request,
            // shipment
            $shipment,
        )->build();
    }

    public static function buildAddressPOE(): AddressPOE
    {
        return AddressPOE::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('00000')
            ->build();
    }

    public static function buildShipmentWorldEase(): ShipmentWorldEase
    {
        $address = AddressPOE::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('00000')
            ->build();
        $portOfEntry = ShipmentWorldEasePortOfEntry::builder(
            // name
            'Seagirt Terminal, Port of Baltimore',
            // clearancePortCode
            '56982',
            // consignee
            'John Doe',
            // address
            $address,
        )->build();

        return ShipmentWorldEase::builder(
            // destinationCountryCode
            'FR',
            // masterShipmentChgType
            ShipmentWorldEaseMasterShipmentChgType::CAF,
            // portOfEntry
            $portOfEntry,
        )
            ->setDestinationPostalCode('00000')
            ->setGCCN('123X56GPFWZ')
            ->build();
    }

    public static function buildShipmentWorldEasePortOfEntry(): ShipmentWorldEasePortOfEntry
    {
        $address = AddressPOE::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'Alpharetta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('00000')
            ->build();

        return ShipmentWorldEasePortOfEntry::builder(
            // name
            'Seagirt Terminal, Port of Baltimore',
            // clearancePortCode
            '56982',
            // consignee
            'John Doe',
            // address
            $address,
        )->build();
    }

    public static function buildShipmentRequestRequest(): ShipmentRequestRequest
    {
        return ShipmentRequestRequest::builder('REPLACE_ME')->build();
    }

    public static function buildRequestTransactionReference(): RequestTransactionReference
    {
        return RequestTransactionReference::builder()->build();
    }

    public static function buildShipmentRequestShipment(): ShipmentRequestShipment
    {
        $address = ShipperAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
        $shipper = ShipmentShipper::builder(
            // name
            'REPLACE_ME',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )->build();
        $address_1 = ShipToAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
        $shipTo = ShipmentShipTo::builder(
            // name
            'REPLACE_ME',
            // address
            $address_1,
        )->build();
        $service = ShipmentService::builder('RE')->build();
        $packaging = PackagePackaging::builder('RE')->build();
        $shipmentPackage = ShipmentPackage::builder($packaging)->build();

        return ShipmentRequestShipment::builder(
            // shipper
            $shipper,
            // shipTo
            $shipTo,
            // service
            $service,
            // package
            [$shipmentPackage],
        )->build();
    }

    public static function buildShipmentReturnService(): ShipmentReturnService
    {
        return ShipmentReturnService::builder('RE')->build();
    }

    public static function buildShipmentShipper(): ShipmentShipper
    {
        $address = ShipperAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();

        return ShipmentShipper::builder(
            // name
            'REPLACE_ME',
            // shipperNumber
            'REPLAC',
            // address
            $address,
        )->build();
    }

    public static function buildShipperPhone(): ShipperPhone
    {
        return ShipperPhone::builder('REPLACE_ME')->build();
    }

    public static function buildShipperAddress(): ShipperAddress
    {
        return ShipperAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
    }

    public static function buildShipmentShipTo(): ShipmentShipTo
    {
        $address = ShipToAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();

        return ShipmentShipTo::builder(
            // name
            'REPLACE_ME',
            // address
            $address,
        )->build();
    }

    public static function buildShipToPhone(): ShipToPhone
    {
        return ShipToPhone::builder('REPLACE_ME')->build();
    }

    public static function buildShipToAddress(): ShipToAddress
    {
        return ShipToAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
    }

    public static function buildShipmentAlternateDeliveryAddress(): ShipmentAlternateDeliveryAddress
    {
        $address = AlternateDeliveryAddressAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();

        return ShipmentAlternateDeliveryAddress::builder(
            // name
            'REPLACE_ME',
            // attentionName
            'REPLACE_ME',
            // address
            $address,
        )->build();
    }

    public static function buildAlternateDeliveryAddressAddress(): AlternateDeliveryAddressAddress
    {
        return AlternateDeliveryAddressAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
    }

    public static function buildShipmentShipFrom(): ShipmentShipFrom
    {
        $address = ShipFromAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();

        return ShipmentShipFrom::builder(
            // name
            'REPLACE_ME',
            // address
            $address,
        )->build();
    }

    public static function buildShipFromTaxIDType(): ShipFromTaxIDType
    {
        return ShipFromTaxIDType::builder('REPLACE_ME')->build();
    }

    public static function buildShipFromPhone(): ShipFromPhone
    {
        return ShipFromPhone::builder('REPLACE_ME')->build();
    }

    public static function buildShipFromAddress(): ShipFromAddress
    {
        return ShipFromAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
    }

    public static function buildShipFromVendorInfo(): ShipFromVendorInfo
    {
        return ShipFromVendorInfo::builder(
            // vendorCollectIDTypeCode
            'REPL',
            // vendorCollectIDNumber
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentPaymentInformation(): ShipmentPaymentInformation
    {
        $paymentInformationShipmentCharge = PaymentInformationShipmentCharge::builder('RE')->build();

        return ShipmentPaymentInformation::builder([$paymentInformationShipmentCharge])->build();
    }

    public static function buildPaymentInformationShipmentCharge(): PaymentInformationShipmentCharge
    {
        return PaymentInformationShipmentCharge::builder('RE')->build();
    }

    public static function buildShipmentChargeBillShipper(): ShipmentChargeBillShipper
    {
        return ShipmentChargeBillShipper::builder()->build();
    }

    public static function buildBillShipperCreditCard(): BillShipperCreditCard
    {
        return BillShipperCreditCard::builder(
            // type
            'RE',
            // number
            'REPLACE_ME',
            // expirationDate
            'REPLAC',
            // securityCode
            'REPL',
        )->build();
    }

    public static function buildCreditCardAddress(): CreditCardAddress
    {
        return CreditCardAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
    }

    public static function buildShipmentChargeBillReceiver(): ShipmentChargeBillReceiver
    {
        return ShipmentChargeBillReceiver::builder('REPLAC')->build();
    }

    public static function buildBillReceiverAddress(): BillReceiverAddress
    {
        return BillReceiverAddress::builder()->build();
    }

    public static function buildShipmentChargeBillThirdParty(): ShipmentChargeBillThirdParty
    {
        $address = BillThirdPartyAddress::builder('RE')->build();

        return ShipmentChargeBillThirdParty::builder($address)->build();
    }

    public static function buildBillThirdPartyAddress(): BillThirdPartyAddress
    {
        return BillThirdPartyAddress::builder('RE')->build();
    }

    public static function buildShipmentFRSPaymentInformation(): ShipmentFRSPaymentInformation
    {
        $type = FRSPaymentInformationType::builder('RE')->build();

        return ShipmentFRSPaymentInformation::builder(
            // type
            $type,
            // accountNumber
            'REPLAC',
        )->build();
    }

    public static function buildFRSPaymentInformationType(): FRSPaymentInformationType
    {
        return FRSPaymentInformationType::builder('RE')->build();
    }

    public static function buildFRSPaymentInformationAddress(): FRSPaymentInformationAddress
    {
        return FRSPaymentInformationAddress::builder('RE')->build();
    }

    public static function buildShipmentFreightShipmentInformation(): ShipmentFreightShipmentInformation
    {
        return ShipmentFreightShipmentInformation::builder()->build();
    }

    public static function buildFreightShipmentInformationFreightDensityInfo(): FreightShipmentInformationFreightDensityInfo
    {
        return FreightShipmentInformationFreightDensityInfo::builder()->build();
    }

    public static function buildFreightDensityInfoAdjustedHeight(): FreightDensityInfoAdjustedHeight
    {
        $unitOfMeasurement = AdjustedHeightUnitOfMeasurement::builder('RE')->build();

        return FreightDensityInfoAdjustedHeight::builder(
            // value
            'REPLACE_ME',
            // unitOfMeasurement
            $unitOfMeasurement,
        )->build();
    }

    public static function buildAdjustedHeightUnitOfMeasurement(): AdjustedHeightUnitOfMeasurement
    {
        return AdjustedHeightUnitOfMeasurement::builder('RE')->build();
    }

    public static function buildFreightDensityInfoHandlingUnits(): FreightDensityInfoHandlingUnits
    {
        $type = HandlingUnitsType::builder('REP')->build();
        $unitOfMeasurement = HandlingUnitsUnitOfMeasurement::builder('RE')->build();
        $dimensions = HandlingUnitsDimensions::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // length
            'REPLACE_ME',
            // width
            'REPLACE_ME',
            // height
            'REPLACE_ME',
        )->build();

        return FreightDensityInfoHandlingUnits::builder(
            // quantity
            'REPLACE_',
            // type
            $type,
            // dimensions
            $dimensions,
        )->build();
    }

    public static function buildHandlingUnitsType(): HandlingUnitsType
    {
        return HandlingUnitsType::builder('REP')->build();
    }

    public static function buildHandlingUnitsDimensions(): HandlingUnitsDimensions
    {
        $unitOfMeasurement = HandlingUnitsUnitOfMeasurement::builder('RE')->build();

        return HandlingUnitsDimensions::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // length
            'REPLACE_ME',
            // width
            'REPLACE_ME',
            // height
            'REPLACE_ME',
        )->build();
    }

    public static function buildHandlingUnitsUnitOfMeasurement(): HandlingUnitsUnitOfMeasurement
    {
        return HandlingUnitsUnitOfMeasurement::builder('RE')->build();
    }

    public static function buildShipmentPromotionalDiscountInformation(): ShipmentPromotionalDiscountInformation
    {
        return ShipmentPromotionalDiscountInformation::builder(
            // promoCode
            'REPLACE_M',
            // promoAliasCode
            'REPLACE_MEXXXXXXXXXX',
        )->build();
    }

    public static function buildShipmentDGSignatoryInfo(): ShipmentDGSignatoryInfo
    {
        return ShipmentDGSignatoryInfo::builder()->build();
    }

    public static function buildShipmentShipmentRatingOptions(): ShipmentShipmentRatingOptions
    {
        return ShipmentShipmentRatingOptions::builder()->build();
    }

    public static function buildShipmentReferenceNumber(): ShipmentReferenceNumber
    {
        return ShipmentReferenceNumber::builder('REPLACE_ME')->build();
    }

    public static function buildShipmentService(): ShipmentService
    {
        return ShipmentService::builder('RE')->build();
    }

    public static function buildShipmentInvoiceLineTotal(): ShipmentInvoiceLineTotal
    {
        return ShipmentInvoiceLineTotal::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentShipmentIndicationType(): ShipmentShipmentIndicationType
    {
        return ShipmentShipmentIndicationType::builder('RE')->build();
    }

    public static function buildShipmentShipmentServiceOptions(): ShipmentShipmentServiceOptions
    {
        return ShipmentShipmentServiceOptions::builder()->build();
    }

    public static function buildShipmentServiceOptionsCOD(): ShipmentServiceOptionsCOD
    {
        $cODAmount = CODCODAmount::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLA',
        )->build();

        return ShipmentServiceOptionsCOD::builder(
            // cODFundsCode
            'R',
            // cODAmount
            $cODAmount,
        )->build();
    }

    public static function buildCODCODAmount(): CODCODAmount
    {
        return CODCODAmount::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLA',
        )->build();
    }

    public static function buildShipmentServiceOptionsAccessPointCOD(): ShipmentServiceOptionsAccessPointCOD
    {
        return ShipmentServiceOptionsAccessPointCOD::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_',
        )->build();
    }

    public static function buildShipmentServiceOptionsNotification(): ShipmentServiceOptionsNotification
    {
        $eMail = NotificationEMail::builder(['REPLACE_ME'])->build();

        return ShipmentServiceOptionsNotification::builder(
            // notificationCode
            'REP',
            // eMail
            $eMail,
        )->build();
    }

    public static function buildNotificationEMail(): NotificationEMail
    {
        return NotificationEMail::builder(['REPLACE_ME'])->build();
    }

    public static function buildNotificationVoiceMessage(): NotificationVoiceMessage
    {
        return NotificationVoiceMessage::builder('REPLACE_ME')->build();
    }

    public static function buildNotificationTextMessage(): NotificationTextMessage
    {
        return NotificationTextMessage::builder('REPLACE_ME')->build();
    }

    public static function buildNotificationLocale(): NotificationLocale
    {
        return NotificationLocale::builder(
            // language
            'REP',
            // dialect
            'RE',
        )->build();
    }

    public static function buildShipmentServiceOptionsLabelDelivery(): ShipmentServiceOptionsLabelDelivery
    {
        return ShipmentServiceOptionsLabelDelivery::builder()->build();
    }

    public static function buildLabelDeliveryEMail(): LabelDeliveryEMail
    {
        return LabelDeliveryEMail::builder('REPLACE_ME')->build();
    }

    public static function buildShipmentServiceOptionsInternationalForms(): ShipmentServiceOptionsInternationalForms
    {
        $internationalFormsProduct = InternationalFormsProduct::builder(['REPLACE_ME'])->build();

        return ShipmentServiceOptionsInternationalForms::builder(
            // formType
            ['REPLACE_ME'],
            // product
            [$internationalFormsProduct],
        )->build();
    }

    public static function buildInternationalFormsUserCreatedForm(): InternationalFormsUserCreatedForm
    {
        return InternationalFormsUserCreatedForm::builder(['REPLACE_ME'])->build();
    }

    public static function buildInternationalFormsUPSPremiumCareForm(): InternationalFormsUPSPremiumCareForm
    {
        $languageForUPSPremiumCare = UPSPremiumCareFormLanguageForUPSPremiumCare::builder(['REPLACE_ME'])->build();

        return InternationalFormsUPSPremiumCareForm::builder(
            // shipmentDate
            'REPLACE_ME',
            // pageSize
            'RE',
            // printType
            'RE',
            // numOfCopies
            'RE',
            // languageForUPSPremiumCare
            $languageForUPSPremiumCare,
        )->build();
    }

    public static function buildUPSPremiumCareFormLanguageForUPSPremiumCare(): UPSPremiumCareFormLanguageForUPSPremiumCare
    {
        return UPSPremiumCareFormLanguageForUPSPremiumCare::builder(['REPLACE_ME'])->build();
    }

    public static function buildInternationalFormsCN22Form(): InternationalFormsCN22Form
    {
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

        return InternationalFormsCN22Form::builder(
            // labelSize
            'RE',
            // printsPerPage
            'R',
            // labelPrintType
            'REPL',
            // cN22Type
            'R',
            // cN22Content
            [$cN22FormCN22Content],
        )->build();
    }

    public static function buildCN22FormCN22Content(): CN22FormCN22Content
    {
        $unitOfMeasurement = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
        $cN22ContentWeight = CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLACE',
        )->build();

        return CN22FormCN22Content::builder(
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
    }

    public static function buildCN22ContentCN22DDSReferenceNumber(): CN22ContentCN22DDSReferenceNumber
    {
        return CN22ContentCN22DDSReferenceNumber::builder()->build();
    }

    public static function buildCN22ContentCN22ContentWeight(): CN22ContentCN22ContentWeight
    {
        $unitOfMeasurement = CN22ContentWeightUnitOfMeasurement::builder('REP')->build();

        return CN22ContentCN22ContentWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLACE',
        )->build();
    }

    public static function buildCN22ContentWeightUnitOfMeasurement(): CN22ContentWeightUnitOfMeasurement
    {
        return CN22ContentWeightUnitOfMeasurement::builder('REP')->build();
    }

    public static function buildInternationalFormsEEIFilingOption(): InternationalFormsEEIFilingOption
    {
        return InternationalFormsEEIFilingOption::builder('R')->build();
    }

    public static function buildEEIFilingOptionUPSFiled(): EEIFilingOptionUPSFiled
    {
        $pOA = UPSFiledPOA::builder('R')->build();

        return EEIFilingOptionUPSFiled::builder($pOA)->build();
    }

    public static function buildUPSFiledPOA(): UPSFiledPOA
    {
        return UPSFiledPOA::builder('R')->build();
    }

    public static function buildEEIFilingOptionShipperFiled(): EEIFilingOptionShipperFiled
    {
        return EEIFilingOptionShipperFiled::builder('R')->build();
    }

    public static function buildInternationalFormsContacts(): InternationalFormsContacts
    {
        return InternationalFormsContacts::builder()->build();
    }

    public static function buildContactsForwardAgent(): ContactsForwardAgent
    {
        $address = ForwardAgentAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();

        return ContactsForwardAgent::builder(
            // companyName
            'REPLACE_ME',
            // taxIdentificationNumber
            'REPLACE_ME',
            // address
            $address,
        )->build();
    }

    public static function buildForwardAgentAddress(): ForwardAgentAddress
    {
        return ForwardAgentAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
    }

    public static function buildContactsUltimateConsignee(): ContactsUltimateConsignee
    {
        $address = UltimateConsigneeAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();

        return ContactsUltimateConsignee::builder(
            // companyName
            'REPLACE_ME',
            // address
            $address,
        )->build();
    }

    public static function buildUltimateConsigneeAddress(): UltimateConsigneeAddress
    {
        return UltimateConsigneeAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
    }

    public static function buildUltimateConsigneeUltimateConsigneeType(): UltimateConsigneeUltimateConsigneeType
    {
        return UltimateConsigneeUltimateConsigneeType::builder('R')->build();
    }

    public static function buildContactsIntermediateConsignee(): ContactsIntermediateConsignee
    {
        $address = IntermediateConsigneeAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();

        return ContactsIntermediateConsignee::builder(
            // companyName
            'REPLACE_ME',
            // address
            $address,
        )->build();
    }

    public static function buildIntermediateConsigneeAddress(): IntermediateConsigneeAddress
    {
        return IntermediateConsigneeAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
    }

    public static function buildContactsProducer(): ContactsProducer
    {
        return ContactsProducer::builder()->build();
    }

    public static function buildProducerAddress(): ProducerAddress
    {
        return ProducerAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
    }

    public static function buildProducerPhone(): ProducerPhone
    {
        return ProducerPhone::builder('REPLACE_ME')->build();
    }

    public static function buildContactsSoldTo(): ContactsSoldTo
    {
        $address = SoldToAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();

        return ContactsSoldTo::builder(
            // name
            'REPLACE_ME',
            // attentionName
            'REPLACE_ME',
            // address
            $address,
        )->build();
    }

    public static function buildSoldToPhone(): SoldToPhone
    {
        return SoldToPhone::builder('REPLACE_ME')->build();
    }

    public static function buildSoldToAddress(): SoldToAddress
    {
        return SoldToAddress::builder(
            // addressLine
            ['REPLACE_ME'],
            // city
            'REPLACE_ME',
            // countryCode
            'RE',
        )->build();
    }

    public static function buildInternationalFormsProduct(): InternationalFormsProduct
    {
        return InternationalFormsProduct::builder(['REPLACE_ME'])->build();
    }

    public static function buildProductUnit(): ProductUnit
    {
        $unitOfMeasurement = UnitUnitOfMeasurement::builder('REP')->build();

        return ProductUnit::builder(
            // number
            'REPLACE',
            // unitOfMeasurement
            $unitOfMeasurement,
            // value
            'REPLACE_ME',
        )->build();
    }

    public static function buildUnitUnitOfMeasurement(): UnitUnitOfMeasurement
    {
        return UnitUnitOfMeasurement::builder('REP')->build();
    }

    public static function buildProductNetCostDateRange(): ProductNetCostDateRange
    {
        return ProductNetCostDateRange::builder(
            // beginDate
            'REPLACE_',
            // endDate
            'REPLACE_',
        )->build();
    }

    public static function buildProductProductWeight(): ProductProductWeight
    {
        $unitOfMeasurement = ProductWeightUnitOfMeasurement::builder('REP')->build();

        return ProductProductWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLA',
        )->build();
    }

    public static function buildProductWeightUnitOfMeasurement(): ProductWeightUnitOfMeasurement
    {
        return ProductWeightUnitOfMeasurement::builder('REP')->build();
    }

    public static function buildProductScheduleB(): ProductScheduleB
    {
        $scheduleBUnitOfMeasurement = ScheduleBUnitOfMeasurement::builder('REP')->build();

        return ProductScheduleB::builder(
            // number
            'REPLACE_ME',
            // unitOfMeasurement
            [$scheduleBUnitOfMeasurement],
        )->build();
    }

    public static function buildScheduleBUnitOfMeasurement(): ScheduleBUnitOfMeasurement
    {
        return ScheduleBUnitOfMeasurement::builder('REP')->build();
    }

    public static function buildProductExcludeFromForm(): ProductExcludeFromForm
    {
        return ProductExcludeFromForm::builder(['REPLACE_ME'])->build();
    }

    public static function buildProductPackingListInfo(): ProductPackingListInfo
    {
        $packingListInfoPackageAssociated = PackingListInfoPackageAssociated::builder(
            // packageNumber
            'REPLACE_ME',
            // productAmount
            'REPLACE_ME',
        )->build();

        return ProductPackingListInfo::builder([$packingListInfoPackageAssociated])->build();
    }

    public static function buildPackingListInfoPackageAssociated(): PackingListInfoPackageAssociated
    {
        return PackingListInfoPackageAssociated::builder(
            // packageNumber
            'REPLACE_ME',
            // productAmount
            'REPLACE_ME',
        )->build();
    }

    public static function buildProductDDSReferenceNumber(): ProductDDSReferenceNumber
    {
        return ProductDDSReferenceNumber::builder()->build();
    }

    public static function buildProductEEIInformation(): ProductEEIInformation
    {
        return ProductEEIInformation::builder()->build();
    }

    public static function buildEEIInformationLicense(): EEIInformationLicense
    {
        return EEIInformationLicense::builder()->build();
    }

    public static function buildEEIInformationDDTCInformation(): EEIInformationDDTCInformation
    {
        return EEIInformationDDTCInformation::builder()->build();
    }

    public static function buildDDTCInformationUnitOfMeasurement(): DDTCInformationUnitOfMeasurement
    {
        return DDTCInformationUnitOfMeasurement::builder('REPLACE_ME')->build();
    }

    public static function buildInternationalFormsDiscount(): InternationalFormsDiscount
    {
        return InternationalFormsDiscount::builder('REPLACE_ME')->build();
    }

    public static function buildInternationalFormsFreightCharges(): InternationalFormsFreightCharges
    {
        return InternationalFormsFreightCharges::builder('REPLACE_ME')->build();
    }

    public static function buildInternationalFormsInsuranceCharges(): InternationalFormsInsuranceCharges
    {
        return InternationalFormsInsuranceCharges::builder('REPLACE_ME')->build();
    }

    public static function buildInternationalFormsOtherCharges(): InternationalFormsOtherCharges
    {
        return InternationalFormsOtherCharges::builder(
            // monetaryValue
            'REPLACE_ME',
            // description
            'REPLACE_ME',
        )->build();
    }

    public static function buildInternationalFormsBlanketPeriod(): InternationalFormsBlanketPeriod
    {
        return InternationalFormsBlanketPeriod::builder(
            // beginDate
            'REPLACE_',
            // endDate
            'REPLACE_',
        )->build();
    }

    public static function buildShipmentServiceOptionsDeliveryConfirmation(): ShipmentServiceOptionsDeliveryConfirmation
    {
        return ShipmentServiceOptionsDeliveryConfirmation::builder('R')->build();
    }

    public static function buildShipmentServiceOptionsLabelMethod(): ShipmentServiceOptionsLabelMethod
    {
        return ShipmentServiceOptionsLabelMethod::builder('RE')->build();
    }

    public static function buildShipmentServiceOptionsPreAlertNotification(): ShipmentServiceOptionsPreAlertNotification
    {
        $locale = PreAlertNotificationLocale::builder(
            // language
            'REP',
            // dialect
            'RE',
        )->build();

        return ShipmentServiceOptionsPreAlertNotification::builder($locale)->build();
    }

    public static function buildPreAlertNotificationEMailMessage(): PreAlertNotificationEMailMessage
    {
        return PreAlertNotificationEMailMessage::builder('REPLACE_ME')->build();
    }

    public static function buildPreAlertNotificationVoiceMessage(): PreAlertNotificationVoiceMessage
    {
        return PreAlertNotificationVoiceMessage::builder('REPLACE_ME')->build();
    }

    public static function buildPreAlertNotificationTextMessage(): PreAlertNotificationTextMessage
    {
        return PreAlertNotificationTextMessage::builder('REPLACE_ME')->build();
    }

    public static function buildPreAlertNotificationLocale(): PreAlertNotificationLocale
    {
        return PreAlertNotificationLocale::builder(
            // language
            'REP',
            // dialect
            'RE',
        )->build();
    }

    public static function buildShipmentServiceOptionsRestrictedArticles(): ShipmentServiceOptionsRestrictedArticles
    {
        return ShipmentServiceOptionsRestrictedArticles::builder()->build();
    }

    public static function buildShipmentServiceOptionsVerifiedDelivery(): ShipmentServiceOptionsVerifiedDelivery
    {
        return ShipmentServiceOptionsVerifiedDelivery::builder(
            // securePINType
            'R',
            // tokenValue
            'REPLACE_MEXXXXXXXXXXXXXXXXXXXXXX',
            // recipientEmail
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentPackage(): ShipmentPackage
    {
        $packaging = PackagePackaging::builder('RE')->build();

        return ShipmentPackage::builder($packaging)->build();
    }

    public static function buildShipmentTradeDirect(): ShipmentTradeDirect
    {
        return ShipmentTradeDirect::builder(
            // shipmentType
            ShipmentTradeDirectShipmentType::TRADEDIRECTAIR,
            // currencyCode
            'AAA',
        )->build();
    }

    public static function buildTradeDirectMaster(): TradeDirectMaster
    {
        return TradeDirectMaster::builder(TradeDirectMasterUomType::Imperial)->build();
    }

    public static function buildMasterSoldTo(): MasterSoldTo
    {
        $address = TradeDirectAddress::builder(
            // addressLine
            '123 South Main St',
            // city
            'Atlanta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30022-1323')
            ->build();

        return MasterSoldTo::builder(
            // name
            'a',
            // address
            $address,
            // emailAddress
            'REPLACE_ME',
        )->build();
    }

    public static function buildMasterPickup(): MasterPickup
    {
        $address = TradeDirectAddress::builder(
            // addressLine
            '123 South Main St',
            // city
            'Atlanta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30022-1323')
            ->build();

        return MasterPickup::builder(
            // name
            'a',
            // address
            $address,
            // eMailAddress
            'REPLACE_ME',
        )->build();
    }

    public static function buildTradeDirectPhone(): TradeDirectPhone
    {
        return TradeDirectPhone::builder('REPLACE_ME')->build();
    }

    public static function buildTradeDirectAddress(): TradeDirectAddress
    {
        return TradeDirectAddress::builder(
            // addressLine
            '123 South Main St',
            // city
            'Atlanta',
            // countryCode
            'US',
        )
            ->setStateProvinceCode('GA')
            ->setPostalCode('30022-1323')
            ->build();
    }

    public static function buildMasterTradeComplianceDetails(): MasterTradeComplianceDetails
    {
        return MasterTradeComplianceDetails::builder()
            ->setTermsOfShipment(MasterTradeComplianceDetailsTermsOfShipment::FOB)
            ->build();
    }

    public static function buildTradeDirectChild(): TradeDirectChild
    {
        $product = ChildProduct::builder(
            // description
            'ALPHA BRAIN INSTANT PEACH',
            // unitPrice
            '2',
            // numberOfUnits
            '3',
            // productNumber
            'IDID767640',
            // countryOriginCode
            'AA',
            // unitOfMeasure
            ChildProductUnitOfMeasure::BA,
        )->build();
        $dimensions = LTLDimensions::builder(
            // length
            '48',
            // width
            '40',
            // height
            '36',
            // unitOfMeasurement
            LTLDimensionsUnitOfMeasurement::IN,
        )->build();
        $packageWeight = LTLPackageWeightType::builder(
            // weight
            '10',
            // unitOfMeasurement
            LTLPackageWeightTypeUnitOfMeasurement::KGS,
        )->build();
        $handlingUnits = LTLHandlingUnits::builder(
            // quantity
            '1',
            // type
            LTLHandlingUnitsType::BOXES,
            // freightClass
            LTLHandlingUnitsFreightClass::_50,
            // dimensions
            $dimensions,
            // packageWeight
            $packageWeight,
        )->build();
        $ltlPackage = ChildLTLPackage::builder(
            // numberOfIdenticalUnits
            '1',
            // handlingUnits
            $handlingUnits,
        )->build();

        return TradeDirectChild::builder(
            // uSI
            '578299028T',
            // type
            TradeDirectChildType::LTL,
            // product
            $product,
            // ltlPackage
            $ltlPackage,
        )->build();
    }

    public static function buildChildProduct(): ChildProduct
    {
        return ChildProduct::builder(
            // description
            'ALPHA BRAIN INSTANT PEACH',
            // unitPrice
            '2',
            // numberOfUnits
            '3',
            // productNumber
            'IDID767640',
            // countryOriginCode
            'AA',
            // unitOfMeasure
            ChildProductUnitOfMeasure::BA,
        )->build();
    }

    public static function buildChildLTLPackage(): ChildLTLPackage
    {
        $dimensions = LTLDimensions::builder(
            // length
            '48',
            // width
            '40',
            // height
            '36',
            // unitOfMeasurement
            LTLDimensionsUnitOfMeasurement::IN,
        )->build();
        $packageWeight = LTLPackageWeightType::builder(
            // weight
            '10',
            // unitOfMeasurement
            LTLPackageWeightTypeUnitOfMeasurement::KGS,
        )->build();
        $handlingUnits = LTLHandlingUnits::builder(
            // quantity
            '1',
            // type
            LTLHandlingUnitsType::BOXES,
            // freightClass
            LTLHandlingUnitsFreightClass::_50,
            // dimensions
            $dimensions,
            // packageWeight
            $packageWeight,
        )->build();

        return ChildLTLPackage::builder(
            // numberOfIdenticalUnits
            '1',
            // handlingUnits
            $handlingUnits,
        )->build();
    }

    public static function buildLTLHandlingUnits(): LTLHandlingUnits
    {
        $dimensions = LTLDimensions::builder(
            // length
            '48',
            // width
            '40',
            // height
            '36',
            // unitOfMeasurement
            LTLDimensionsUnitOfMeasurement::IN,
        )->build();
        $packageWeight = LTLPackageWeightType::builder(
            // weight
            '10',
            // unitOfMeasurement
            LTLPackageWeightTypeUnitOfMeasurement::KGS,
        )->build();

        return LTLHandlingUnits::builder(
            // quantity
            '1',
            // type
            LTLHandlingUnitsType::BOXES,
            // freightClass
            LTLHandlingUnitsFreightClass::_50,
            // dimensions
            $dimensions,
            // packageWeight
            $packageWeight,
        )->build();
    }

    public static function buildLTLReferenceNumber(): LTLReferenceNumber
    {
        return LTLReferenceNumber::builder(
            // code
            LTLReferenceNumberCode::PO,
            // value
            'REF834950',
        )->build();
    }

    public static function buildLTLDimensions(): LTLDimensions
    {
        return LTLDimensions::builder(
            // length
            '48',
            // width
            '40',
            // height
            '36',
            // unitOfMeasurement
            LTLDimensionsUnitOfMeasurement::IN,
        )->build();
    }

    public static function buildLTLPackageWeightType(): LTLPackageWeightType
    {
        return LTLPackageWeightType::builder(
            // weight
            '10',
            // unitOfMeasurement
            LTLPackageWeightTypeUnitOfMeasurement::KGS,
        )->build();
    }

    public static function buildChildLTLCharges(): ChildLTLCharges
    {
        return ChildLTLCharges::builder()->build();
    }

    public static function buildLTLOtherCharges(): LTLOtherCharges
    {
        return LTLOtherCharges::builder(
            // monetaryValue
            '2',
            // chargeDescription
            'Miscellaneous charge',
        )->build();
    }

    public static function buildTradeDirectNotificationBeforeDelivery(): TradeDirectNotificationBeforeDelivery
    {
        return TradeDirectNotificationBeforeDelivery::builder('john@ups.com')
            ->setRequestType(TradeDirectNotificationBeforeDeliveryRequestType::_001)
            ->setMediaTypeCode(TradeDirectNotificationBeforeDeliveryMediaTypeCode::_03)
            ->setLanguage('ENG')
            ->setDialect('US')
            ->setAlternateEmailAddress('john@ups.com')
            ->build();
    }

    public static function buildPackagePackaging(): PackagePackaging
    {
        return PackagePackaging::builder('RE')->build();
    }

    public static function buildPackageDimensions(): PackageDimensions
    {
        $unitOfMeasurement = DimensionsUnitOfMeasurement::builder()->build();

        return PackageDimensions::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // length
            'REP',
            // width
            'REP',
            // height
            'REP',
        )->build();
    }

    public static function buildDimensionsUnitOfMeasurement(): DimensionsUnitOfMeasurement
    {
        return DimensionsUnitOfMeasurement::builder()->build();
    }

    public static function buildPackageDimWeight(): PackageDimWeight
    {
        return PackageDimWeight::builder()->build();
    }

    public static function buildDimWeightUnitOfMeasurement(): DimWeightUnitOfMeasurement
    {
        return DimWeightUnitOfMeasurement::builder('REP')->build();
    }

    public static function buildPackagePackageWeight(): PackagePackageWeight
    {
        $unitOfMeasurement = PackageWeightUnitOfMeasurement::builder('REP')->build();

        return PackagePackageWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLA',
        )->build();
    }

    public static function buildPackageWeightUnitOfMeasurement(): PackageWeightUnitOfMeasurement
    {
        return PackageWeightUnitOfMeasurement::builder('REP')->build();
    }

    public static function buildPackageReferenceNumber(): PackageReferenceNumber
    {
        return PackageReferenceNumber::builder('REPLACE_ME')->build();
    }

    public static function buildPackageSimpleRate(): PackageSimpleRate
    {
        return PackageSimpleRate::builder('RE')->build();
    }

    public static function buildPackageUPSPremier(): PackageUPSPremier
    {
        $uPSPremierHandlingInstructions = UPSPremierHandlingInstructions::builder('REP')->build();

        return PackageUPSPremier::builder(
            // category
            'RE',
            // handlingInstructions
            [$uPSPremierHandlingInstructions],
        )->build();
    }

    public static function buildUPSPremierHandlingInstructions(): UPSPremierHandlingInstructions
    {
        return UPSPremierHandlingInstructions::builder('REP')->build();
    }

    public static function buildPackagePackageServiceOptions(): PackagePackageServiceOptions
    {
        return PackagePackageServiceOptions::builder()->build();
    }

    public static function buildPackageServiceOptionsHealthcare(): PackageServiceOptionsHealthcare
    {
        return PackageServiceOptionsHealthcare::builder()->build();
    }

    public static function buildPackageServiceOptionsDeliveryConfirmation(): PackageServiceOptionsDeliveryConfirmation
    {
        return PackageServiceOptionsDeliveryConfirmation::builder('R')->build();
    }

    public static function buildPackageServiceOptionsDeclaredValue(): PackageServiceOptionsDeclaredValue
    {
        return PackageServiceOptionsDeclaredValue::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildDeclaredValueType(): DeclaredValueType
    {
        return DeclaredValueType::builder('RE')->build();
    }

    public static function buildPackageServiceOptionsCOD(): PackageServiceOptionsCOD
    {
        $cODAmount = PackageServiceOptionsCODCODAmount::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLA',
        )->build();

        return PackageServiceOptionsCOD::builder(
            // cODFundsCode
            'R',
            // cODAmount
            $cODAmount,
        )->build();
    }

    public static function buildPackageServiceOptionsCODCODAmount(): PackageServiceOptionsCODCODAmount
    {
        return PackageServiceOptionsCODCODAmount::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLA',
        )->build();
    }

    public static function buildPackageServiceOptionsAccessPointCOD(): PackageServiceOptionsAccessPointCOD
    {
        return PackageServiceOptionsAccessPointCOD::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_',
        )->build();
    }

    public static function buildPackageServiceOptionsNotification(): PackageServiceOptionsNotification
    {
        $eMail = PackageServiceOptionsNotificationEMail::builder(['REPLACE_ME'])->build();

        return PackageServiceOptionsNotification::builder(
            // notificationCode
            'R',
            // eMail
            $eMail,
        )->build();
    }

    public static function buildPackageServiceOptionsNotificationEMail(): PackageServiceOptionsNotificationEMail
    {
        return PackageServiceOptionsNotificationEMail::builder(['REPLACE_ME'])->build();
    }

    public static function buildPackageServiceOptionsHazMat(): PackageServiceOptionsHazMat
    {
        return PackageServiceOptionsHazMat::builder(
            // properShippingName
            'REPLACE_ME',
            // regulationSet
            'REPL',
            // transportationMode
            'REPLACE_ME',
        )->build();
    }

    public static function buildPackageServiceOptionsDryIce(): PackageServiceOptionsDryIce
    {
        $unitOfMeasurement = DryIceWeightUnitOfMeasurement::builder('REPLACE_ME')->build();
        $dryIceWeight = DryIceDryIceWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLACE_ME',
        )->build();

        return PackageServiceOptionsDryIce::builder(
            // regulationSet
            'REPL',
            // dryIceWeight
            $dryIceWeight,
        )->build();
    }

    public static function buildDryIceDryIceWeight(): DryIceDryIceWeight
    {
        $unitOfMeasurement = DryIceWeightUnitOfMeasurement::builder('REPLACE_ME')->build();

        return DryIceDryIceWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLACE_ME',
        )->build();
    }

    public static function buildDryIceWeightUnitOfMeasurement(): DryIceWeightUnitOfMeasurement
    {
        return DryIceWeightUnitOfMeasurement::builder('REPLACE_ME')->build();
    }

    public static function buildPackageCommodity(): PackageCommodity
    {
        return PackageCommodity::builder('REPLACE_ME')->build();
    }

    public static function buildCommodityNMFC(): CommodityNMFC
    {
        return CommodityNMFC::builder('REPLAC')->build();
    }

    public static function buildPackageHazMatPackageInformation(): PackageHazMatPackageInformation
    {
        return PackageHazMatPackageInformation::builder()->build();
    }

    public static function buildShipmentRequestLabelSpecification(): ShipmentRequestLabelSpecification
    {
        $labelImageFormat = LabelSpecificationLabelImageFormat::builder('REPL')->build();
        $labelStockSize = LabelSpecificationLabelStockSize::builder(
            // height
            'REP',
            // width
            'REP',
        )->build();

        return ShipmentRequestLabelSpecification::builder(
            // labelImageFormat
            $labelImageFormat,
            // labelStockSize
            $labelStockSize,
        )->build();
    }

    public static function buildLabelSpecificationLabelImageFormat(): LabelSpecificationLabelImageFormat
    {
        return LabelSpecificationLabelImageFormat::builder('REPL')->build();
    }

    public static function buildLabelSpecificationLabelStockSize(): LabelSpecificationLabelStockSize
    {
        return LabelSpecificationLabelStockSize::builder(
            // height
            'REP',
            // width
            'REP',
        )->build();
    }

    public static function buildLabelSpecificationInstruction(): LabelSpecificationInstruction
    {
        return LabelSpecificationInstruction::builder('RE')->build();
    }

    public static function buildShipmentRequestReceiptSpecification(): ShipmentRequestReceiptSpecification
    {
        $imageFormat = ReceiptSpecificationImageFormat::builder('REP')->build();

        return ShipmentRequestReceiptSpecification::builder($imageFormat)->build();
    }

    public static function buildReceiptSpecificationImageFormat(): ReceiptSpecificationImageFormat
    {
        return ReceiptSpecificationImageFormat::builder('REP')->build();
    }

    public static function buildShipmentResponse(): ShipmentResponse
    {
        $responseStatus = ResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
        $response = ShipmentResponseResponse::builder($responseStatus)->build();
        $unitOfMeasurement = BillingWeightUnitOfMeasurement::builder('REP')->build();
        $billingWeight = ShipmentResultsBillingWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLACE_',
        )->build();
        $shipmentResults = ShipmentResponseShipmentResults::builder($billingWeight)
            ->setUSI('578299028T')
            ->build();

        return ShipmentResponse::builder(
            // response
            $response,
            // shipmentResults
            $shipmentResults,
        )->build();
    }

    public static function buildShipmentResponseResponse(): ShipmentResponseResponse
    {
        $responseStatus = ResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();

        return ShipmentResponseResponse::builder($responseStatus)->build();
    }

    public static function buildResponseResponseStatus(): ResponseResponseStatus
    {
        return ResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
    }

    public static function buildResponseAlert(): ResponseAlert
    {
        return ResponseAlert::builder(
            // code
            'REPLACE_ME',
            // description
            'REPLACE_ME',
        )->build();
    }

    public static function buildResponseTransactionReference(): ResponseTransactionReference
    {
        return ResponseTransactionReference::builder()->build();
    }

    public static function buildShipmentResponseShipmentResults(): ShipmentResponseShipmentResults
    {
        $unitOfMeasurement = BillingWeightUnitOfMeasurement::builder('REP')->build();
        $billingWeight = ShipmentResultsBillingWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLACE_',
        )->build();

        return ShipmentResponseShipmentResults::builder($billingWeight)
            ->setUSI('578299028T')
            ->build();
    }

    public static function buildShipmentResultsPalletLabel(): ShipmentResultsPalletLabel
    {
        return ShipmentResultsPalletLabel::builder()->build();
    }

    public static function buildShipmentResultsDisclaimer(): ShipmentResultsDisclaimer
    {
        return ShipmentResultsDisclaimer::builder('RE')->build();
    }

    public static function buildShipmentResultsShipmentCharges(): ShipmentResultsShipmentCharges
    {
        $transportationCharges = ShipmentChargesTransportationCharges::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
        $serviceOptionsCharges = ShipmentChargesServiceOptionsCharges::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
        $totalCharges = ShipmentChargesTotalCharges::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();

        return ShipmentResultsShipmentCharges::builder(
            // transportationCharges
            $transportationCharges,
            // serviceOptionsCharges
            $serviceOptionsCharges,
            // totalCharges
            $totalCharges,
        )->build();
    }

    public static function buildShipmentChargesBaseServiceCharge(): ShipmentChargesBaseServiceCharge
    {
        return ShipmentChargesBaseServiceCharge::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentChargesTransportationCharges(): ShipmentChargesTransportationCharges
    {
        return ShipmentChargesTransportationCharges::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentChargesItemizedCharges(): ShipmentChargesItemizedCharges
    {
        return ShipmentChargesItemizedCharges::builder(
            // code
            'REP',
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentChargesServiceOptionsCharges(): ShipmentChargesServiceOptionsCharges
    {
        return ShipmentChargesServiceOptionsCharges::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentChargesTaxCharges(): ShipmentChargesTaxCharges
    {
        return ShipmentChargesTaxCharges::builder(
            // type
            'REPLACE_M',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentChargesTotalCharges(): ShipmentChargesTotalCharges
    {
        return ShipmentChargesTotalCharges::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentChargesTotalChargesWithTaxes(): ShipmentChargesTotalChargesWithTaxes
    {
        return ShipmentChargesTotalChargesWithTaxes::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentResultsNegotiatedRateCharges(): ShipmentResultsNegotiatedRateCharges
    {
        return ShipmentResultsNegotiatedRateCharges::builder()->build();
    }

    public static function buildNegotiatedRateChargesItemizedCharges(): NegotiatedRateChargesItemizedCharges
    {
        return NegotiatedRateChargesItemizedCharges::builder(
            // code
            'REP',
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildNegotiatedRateChargesTaxCharges(): NegotiatedRateChargesTaxCharges
    {
        return NegotiatedRateChargesTaxCharges::builder(
            // type
            'REPLACE_M',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildNegotiatedRateChargesTotalCharge(): NegotiatedRateChargesTotalCharge
    {
        return NegotiatedRateChargesTotalCharge::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildNegotiatedRateChargesRateModifier(): NegotiatedRateChargesRateModifier
    {
        return NegotiatedRateChargesRateModifier::builder(
            // modifierType
            'REP',
            // modifierDesc
            'REPLACE_MEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            // amount
            'REPLACE_MEXXXXXX',
        )->build();
    }

    public static function buildNegotiatedRateChargesTotalChargesWithTaxes(): NegotiatedRateChargesTotalChargesWithTaxes
    {
        return NegotiatedRateChargesTotalChargesWithTaxes::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentResultsFRSShipmentData(): ShipmentResultsFRSShipmentData
    {
        $grossCharge = TransportationChargesGrossCharge::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
        $discountAmount = TransportationChargesDiscountAmount::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
        $netCharge = TransportationChargesNetCharge::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
        $transportationCharges = FRSShipmentDataTransportationCharges::builder(
            // grossCharge
            $grossCharge,
            // discountAmount
            $discountAmount,
            // discountPercentage
            'REPLA',
            // netCharge
            $netCharge,
        )->build();

        return ShipmentResultsFRSShipmentData::builder($transportationCharges)->build();
    }

    public static function buildFRSShipmentDataTransportationCharges(): FRSShipmentDataTransportationCharges
    {
        $grossCharge = TransportationChargesGrossCharge::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
        $discountAmount = TransportationChargesDiscountAmount::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
        $netCharge = TransportationChargesNetCharge::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();

        return FRSShipmentDataTransportationCharges::builder(
            // grossCharge
            $grossCharge,
            // discountAmount
            $discountAmount,
            // discountPercentage
            'REPLA',
            // netCharge
            $netCharge,
        )->build();
    }

    public static function buildTransportationChargesGrossCharge(): TransportationChargesGrossCharge
    {
        return TransportationChargesGrossCharge::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildTransportationChargesDiscountAmount(): TransportationChargesDiscountAmount
    {
        return TransportationChargesDiscountAmount::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildTransportationChargesNetCharge(): TransportationChargesNetCharge
    {
        return TransportationChargesNetCharge::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildFRSShipmentDataFreightDensityRate(): FRSShipmentDataFreightDensityRate
    {
        return FRSShipmentDataFreightDensityRate::builder(
            // density
            'REPLA',
            // totalCubicFeet
            'REPLACE_M',
        )->build();
    }

    public static function buildFRSShipmentDataHandlingUnits(): FRSShipmentDataHandlingUnits
    {
        $type = HandlingUnitsType::builder('REP')->build();
        $unitOfMeasurement = HandlingUnitsUnitOfMeasurement::builder('RE')->build();
        $dimensions = HandlingUnitsDimensions::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // length
            'REPLACE_ME',
            // width
            'REPLACE_ME',
            // height
            'REPLACE_ME',
        )->build();

        return FRSShipmentDataHandlingUnits::builder(
            // quantity
            'REPLACE_',
            // type
            $type,
            // dimensions
            $dimensions,
        )->build();
    }

    public static function buildHandlingUnitsAdjustedHeight(): HandlingUnitsAdjustedHeight
    {
        $unitOfMeasurement = AdjustedHeightUnitOfMeasurement::builder('RE')->build();

        return HandlingUnitsAdjustedHeight::builder(
            // value
            'REPLACE_ME',
            // unitOfMeasurement
            $unitOfMeasurement,
        )->build();
    }

    public static function buildShipmentResultsBillingWeight(): ShipmentResultsBillingWeight
    {
        $unitOfMeasurement = BillingWeightUnitOfMeasurement::builder('REP')->build();

        return ShipmentResultsBillingWeight::builder(
            // unitOfMeasurement
            $unitOfMeasurement,
            // weight
            'REPLACE_',
        )->build();
    }

    public static function buildBillingWeightUnitOfMeasurement(): BillingWeightUnitOfMeasurement
    {
        return BillingWeightUnitOfMeasurement::builder('REP')->build();
    }

    public static function buildShipmentResultsPackageResults(): ShipmentResultsPackageResults
    {
        return ShipmentResultsPackageResults::builder('REPLACE_MEXXXXXXXX')->build();
    }

    public static function buildPackageResultsBaseServiceCharge(): PackageResultsBaseServiceCharge
    {
        return PackageResultsBaseServiceCharge::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildPackageResultsServiceOptionsCharges(): PackageResultsServiceOptionsCharges
    {
        return PackageResultsServiceOptionsCharges::builder(
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildPackageResultsShippingLabel(): PackageResultsShippingLabel
    {
        $imageFormat = ShippingLabelImageFormat::builder('REP')->build();

        return PackageResultsShippingLabel::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildShippingLabelImageFormat(): ShippingLabelImageFormat
    {
        return ShippingLabelImageFormat::builder('REP')->build();
    }

    public static function buildPackageResultsShippingReceipt(): PackageResultsShippingReceipt
    {
        $imageFormat = ShippingReceiptImageFormat::builder('REPL')->build();

        return PackageResultsShippingReceipt::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildShippingReceiptImageFormat(): ShippingReceiptImageFormat
    {
        return ShippingReceiptImageFormat::builder('REPL')->build();
    }

    public static function buildPackageResultsAccessorial(): PackageResultsAccessorial
    {
        return PackageResultsAccessorial::builder('REP')->build();
    }

    public static function buildPackageResultsSimpleRate(): PackageResultsSimpleRate
    {
        return PackageResultsSimpleRate::builder('RE')->build();
    }

    public static function buildPackageResultsForm(): PackageResultsForm
    {
        return PackageResultsForm::builder()->build();
    }

    public static function buildShipmentResultsFormImage(): ShipmentResultsFormImage
    {
        $imageFormat = ShipmentResultsImageImageFormat::builder('REP')->build();

        return ShipmentResultsFormImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildFormImage(): FormImage
    {
        $imageFormat = ImageImageFormat::builder('REP')->build();

        return FormImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildHighValueReportImageImageFormat(): HighValueReportImageImageFormat
    {
        return HighValueReportImageImageFormat::builder('REP')->build();
    }

    public static function buildCODTurnInPageImageImageFormat(): CODTurnInPageImageImageFormat
    {
        return CODTurnInPageImageImageFormat::builder('REP')->build();
    }

    public static function buildShipmentResultsImageImageFormat(): ShipmentResultsImageImageFormat
    {
        return ShipmentResultsImageImageFormat::builder('REP')->build();
    }

    public static function buildImageImageFormat(): ImageImageFormat
    {
        return ImageImageFormat::builder('REP')->build();
    }

    public static function buildPackageResultsItemizedCharges(): PackageResultsItemizedCharges
    {
        return PackageResultsItemizedCharges::builder(
            // code
            'REP',
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildPackageResultsNegotiatedCharges(): PackageResultsNegotiatedCharges
    {
        return PackageResultsNegotiatedCharges::builder()->build();
    }

    public static function buildNegotiatedChargesItemizedCharges(): NegotiatedChargesItemizedCharges
    {
        return NegotiatedChargesItemizedCharges::builder(
            // code
            'REP',
            // currencyCode
            'REP',
            // monetaryValue
            'REPLACE_ME',
        )->build();
    }

    public static function buildNegotiatedChargesRateModifier(): NegotiatedChargesRateModifier
    {
        return NegotiatedChargesRateModifier::builder(
            // modifierType
            'REP',
            // modifierDesc
            'REPLACE_MEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            // amount
            'REPLACE_MEXXXXXX',
        )->build();
    }

    public static function buildPackageResultsRateModifier(): PackageResultsRateModifier
    {
        return PackageResultsRateModifier::builder(
            // modifierType
            'REP',
            // modifierDesc
            'REPLACE_ME',
            // amount
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentResultsControlLogReceipt(): ShipmentResultsControlLogReceipt
    {
        $imageFormat = ControlLogReceiptImageFormat::builder('REPL')->build();

        return ShipmentResultsControlLogReceipt::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildControlLogReceiptImageFormat(): ControlLogReceiptImageFormat
    {
        return ControlLogReceiptImageFormat::builder('REPL')->build();
    }

    public static function buildShipmentResultsForm(): ShipmentResultsForm
    {
        return ShipmentResultsForm::builder()->build();
    }

    public static function buildShipmentResultsCODTurnInPage(): ShipmentResultsCODTurnInPage
    {
        $imageFormat = CODTurnInPageImageImageFormat::builder('REP')->build();
        $image = CODTurnInPageImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();

        return ShipmentResultsCODTurnInPage::builder($image)->build();
    }

    public static function buildCODTurnInPageImage(): CODTurnInPageImage
    {
        $imageFormat = CODTurnInPageImageImageFormat::builder('REP')->build();

        return CODTurnInPageImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentResultsHighValueReport(): ShipmentResultsHighValueReport
    {
        $imageFormat = HighValueReportImageImageFormat::builder('REP')->build();
        $image = HighValueReportImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();

        return ShipmentResultsHighValueReport::builder($image)->build();
    }

    public static function buildHighValueReportImage(): HighValueReportImage
    {
        $imageFormat = HighValueReportImageImageFormat::builder('REP')->build();

        return HighValueReportImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildVOIDSHIPMENTRequestWrapper(): VOIDSHIPMENTRequestWrapper
    {
        $request = VoidShipmentRequestRequest::builder()->build();
        $voidShipment = VoidShipmentRequestVoidShipment::builder('REPLACE_MEXXXXXXXX')->build();
        $voidShipmentRequest = VoidShipmentRequest::builder(
            // request
            $request,
            // voidShipment
            $voidShipment,
        )->build();

        return VOIDSHIPMENTRequestWrapper::builder($voidShipmentRequest)->build();
    }

    public static function buildVOIDSHIPMENTResponseWrapper(): VOIDSHIPMENTResponseWrapper
    {
        $responseStatus = VoidResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
        $response = VoidShipmentResponseResponse::builder($responseStatus)->build();
        $status = SummaryResultStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
        $summaryResult = VoidShipmentResponseSummaryResult::builder($status)->build();
        $voidShipmentResponse = VoidShipmentResponse::builder(
            // response
            $response,
            // summaryResult
            $summaryResult,
        )->build();

        return VOIDSHIPMENTResponseWrapper::builder($voidShipmentResponse)->build();
    }

    public static function buildVoidShipmentRequest(): VoidShipmentRequest
    {
        $request = VoidShipmentRequestRequest::builder()->build();
        $voidShipment = VoidShipmentRequestVoidShipment::builder('REPLACE_MEXXXXXXXX')->build();

        return VoidShipmentRequest::builder(
            // request
            $request,
            // voidShipment
            $voidShipment,
        )->build();
    }

    public static function buildVoidShipmentRequestRequest(): VoidShipmentRequestRequest
    {
        return VoidShipmentRequestRequest::builder()->build();
    }

    public static function buildVoidRequestTransactionReference(): VoidRequestTransactionReference
    {
        return VoidRequestTransactionReference::builder()->build();
    }

    public static function buildVoidShipmentRequestVoidShipment(): VoidShipmentRequestVoidShipment
    {
        return VoidShipmentRequestVoidShipment::builder('REPLACE_MEXXXXXXXX')->build();
    }

    public static function buildVoidShipmentResponse(): VoidShipmentResponse
    {
        $responseStatus = VoidResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
        $response = VoidShipmentResponseResponse::builder($responseStatus)->build();
        $status = SummaryResultStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
        $summaryResult = VoidShipmentResponseSummaryResult::builder($status)->build();

        return VoidShipmentResponse::builder(
            // response
            $response,
            // summaryResult
            $summaryResult,
        )->build();
    }

    public static function buildVoidShipmentResponseResponse(): VoidShipmentResponseResponse
    {
        $responseStatus = VoidResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();

        return VoidShipmentResponseResponse::builder($responseStatus)->build();
    }

    public static function buildVoidResponseResponseStatus(): VoidResponseResponseStatus
    {
        return VoidResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
    }

    public static function buildVoidResponseTransactionReference(): VoidResponseTransactionReference
    {
        return VoidResponseTransactionReference::builder()->build();
    }

    public static function buildVoidShipmentResponseSummaryResult(): VoidShipmentResponseSummaryResult
    {
        $status = SummaryResultStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();

        return VoidShipmentResponseSummaryResult::builder($status)->build();
    }

    public static function buildSummaryResultStatus(): SummaryResultStatus
    {
        return SummaryResultStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
    }

    public static function buildVoidShipmentResponsePackageLevelResults(): VoidShipmentResponsePackageLevelResults
    {
        $status = PackageLevelResultsStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();

        return VoidShipmentResponsePackageLevelResults::builder(
            // trackingNumber
            'REPLACE_MEXXXXXXXX',
            // status
            $status,
        )->build();
    }

    public static function buildPackageLevelResultsStatus(): PackageLevelResultsStatus
    {
        return PackageLevelResultsStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
    }

    public static function buildLABELRECOVERYRequestWrapper(): LABELRECOVERYRequestWrapper
    {
        $request = LabelRecoveryRequestRequest::builder()->build();
        $referenceNumber = ReferenceValuesReferenceNumber::builder('REPLACE_ME')->build();
        $referenceValues = LabelRecoveryRequestReferenceValues::builder(
            // referenceNumber
            $referenceNumber,
            // shipperNumber
            'REPLAC',
        )->build();
        $labelRecoveryRequest = LabelRecoveryRequest::builder(
            // request
            $request,
            // trackingNumbers
            ['REPLACE_ME'],
            // referenceValues
            $referenceValues,
        )->build();

        return LABELRECOVERYRequestWrapper::builder($labelRecoveryRequest)->build();
    }

    public static function buildLABELRECOVERYResponseWrapper(): LABELRECOVERYResponseWrapper
    {
        $responseStatus = LRResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
        $response = LabelRecoveryResponseResponse::builder($responseStatus)->build();
        $labelRecoveryResponseLabelResults = LabelRecoveryResponseLabelResults::builder()->build();
        $labelRecoveryResponse = LabelRecoveryResponse::builder(
            // response
            $response,
            // labelResults
            [$labelRecoveryResponseLabelResults],
        )->build();

        return LABELRECOVERYResponseWrapper::builder($labelRecoveryResponse)->build();
    }

    public static function buildLabelRecoveryRequest(): LabelRecoveryRequest
    {
        $request = LabelRecoveryRequestRequest::builder()->build();
        $referenceNumber = ReferenceValuesReferenceNumber::builder('REPLACE_ME')->build();
        $referenceValues = LabelRecoveryRequestReferenceValues::builder(
            // referenceNumber
            $referenceNumber,
            // shipperNumber
            'REPLAC',
        )->build();

        return LabelRecoveryRequest::builder(
            // request
            $request,
            // trackingNumbers
            ['REPLACE_ME'],
            // referenceValues
            $referenceValues,
        )->build();
    }

    public static function buildLabelRecoveryRequestRequest(): LabelRecoveryRequestRequest
    {
        return LabelRecoveryRequestRequest::builder()->build();
    }

    public static function buildLRRequestTransactionReference(): LRRequestTransactionReference
    {
        return LRRequestTransactionReference::builder()->build();
    }

    public static function buildLabelRecoveryRequestLabelSpecification(): LabelRecoveryRequestLabelSpecification
    {
        return LabelRecoveryRequestLabelSpecification::builder()->build();
    }

    public static function buildLabelRecoveryLabelSpecificationLabelImageFormat(): LabelRecoveryLabelSpecificationLabelImageFormat
    {
        return LabelRecoveryLabelSpecificationLabelImageFormat::builder('REPL')->build();
    }

    public static function buildLabelRecoveryLabelSpecificationLabelStockSize(): LabelRecoveryLabelSpecificationLabelStockSize
    {
        return LabelRecoveryLabelSpecificationLabelStockSize::builder(
            // height
            'REP',
            // width
            'REP',
        )->build();
    }

    public static function buildLabelRecoveryRequestTranslate(): LabelRecoveryRequestTranslate
    {
        return LabelRecoveryRequestTranslate::builder(
            // languageCode
            'REP',
            // dialectCode
            'RE',
            // code
            'RE',
        )->build();
    }

    public static function buildLabelRecoveryRequestLabelDelivery(): LabelRecoveryRequestLabelDelivery
    {
        return LabelRecoveryRequestLabelDelivery::builder()->build();
    }

    public static function buildLabelRecoveryRequestReferenceValues(): LabelRecoveryRequestReferenceValues
    {
        $referenceNumber = ReferenceValuesReferenceNumber::builder('REPLACE_ME')->build();

        return LabelRecoveryRequestReferenceValues::builder(
            // referenceNumber
            $referenceNumber,
            // shipperNumber
            'REPLAC',
        )->build();
    }

    public static function buildReferenceValuesReferenceNumber(): ReferenceValuesReferenceNumber
    {
        return ReferenceValuesReferenceNumber::builder('REPLACE_ME')->build();
    }

    public static function buildLabelRecoveryRequestUPSPremiumCareForm(): LabelRecoveryRequestUPSPremiumCareForm
    {
        return LabelRecoveryRequestUPSPremiumCareForm::builder(
            // pageSize
            'RE',
            // printType
            'RE',
        )->build();
    }

    public static function buildLabelRecoveryResponse(): LabelRecoveryResponse
    {
        $responseStatus = LRResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
        $response = LabelRecoveryResponseResponse::builder($responseStatus)->build();
        $labelRecoveryResponseLabelResults = LabelRecoveryResponseLabelResults::builder()->build();

        return LabelRecoveryResponse::builder(
            // response
            $response,
            // labelResults
            [$labelRecoveryResponseLabelResults],
        )->build();
    }

    public static function buildLabelRecoveryResponseResponse(): LabelRecoveryResponseResponse
    {
        $responseStatus = LRResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();

        return LabelRecoveryResponseResponse::builder($responseStatus)->build();
    }

    public static function buildLRResponseResponseStatus(): LRResponseResponseStatus
    {
        return LRResponseResponseStatus::builder(
            // code
            'R',
            // description
            'REPLACE_ME',
        )->build();
    }

    public static function buildLRResponseTransactionReference(): LRResponseTransactionReference
    {
        return LRResponseTransactionReference::builder()->build();
    }

    public static function buildLabelRecoveryResponseLabelResults(): LabelRecoveryResponseLabelResults
    {
        return LabelRecoveryResponseLabelResults::builder()->build();
    }

    public static function buildLabelResultsLabelImage(): LabelResultsLabelImage
    {
        $labelImageFormat = LabelImageLabelImageFormat::builder('REPL')->build();

        return LabelResultsLabelImage::builder(
            // labelImageFormat
            $labelImageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildLabelImageLabelImageFormat(): LabelImageLabelImageFormat
    {
        return LabelImageLabelImageFormat::builder('REPL')->build();
    }

    public static function buildLabelResultsMailInnovationsLabelImage(): LabelResultsMailInnovationsLabelImage
    {
        $labelImageFormat = MailInnovationsLabelImageLabelImageFormat::builder('REPL')->build();

        return LabelResultsMailInnovationsLabelImage::builder(
            // labelImageFormat
            $labelImageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildMailInnovationsLabelImageLabelImageFormat(): MailInnovationsLabelImageLabelImageFormat
    {
        return MailInnovationsLabelImageLabelImageFormat::builder('REPL')->build();
    }

    public static function buildLabelResultsReceipt(): LabelResultsReceipt
    {
        return LabelResultsReceipt::builder()->build();
    }

    public static function buildReceiptImage(): ReceiptImage
    {
        $imageFormat = ReceiptImageImageFormat::builder('REP')->build();

        return ReceiptImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildReceiptImageImageFormat(): ReceiptImageImageFormat
    {
        return ReceiptImageImageFormat::builder('REP')->build();
    }

    public static function buildLabelResultsForm(): LabelResultsForm
    {
        $imageFormat = ImageImageFormat::builder('REP')->build();
        $image = LRFormImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();

        return LabelResultsForm::builder($image)->build();
    }

    public static function buildLRFormImage(): LRFormImage
    {
        $imageFormat = ImageImageFormat::builder('REP')->build();

        return LRFormImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildLabelRecoveryResponseCODTurnInPage(): LabelRecoveryResponseCODTurnInPage
    {
        $imageFormat = LRCODTurnInPageImageImageFormat::builder('REP')->build();
        $image = LRCODTurnInPageImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();

        return LabelRecoveryResponseCODTurnInPage::builder($image)->build();
    }

    public static function buildLRCODTurnInPageImage(): LRCODTurnInPageImage
    {
        $imageFormat = LRCODTurnInPageImageImageFormat::builder('REP')->build();

        return LRCODTurnInPageImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildLRCODTurnInPageImageImageFormat(): LRCODTurnInPageImageImageFormat
    {
        return LRCODTurnInPageImageImageFormat::builder('REP')->build();
    }

    public static function buildLabelRecoveryResponseForm(): LabelRecoveryResponseForm
    {
        $imageFormat = LabelRecoveryImageImageFormat::builder('REP')->build();
        $image = LabelRecoveryFormImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();

        return LabelRecoveryResponseForm::builder($image)->build();
    }

    public static function buildLabelRecoveryFormImage(): LabelRecoveryFormImage
    {
        $imageFormat = LabelRecoveryImageImageFormat::builder('REP')->build();

        return LabelRecoveryFormImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();
    }

    public static function buildLabelRecoveryImageImageFormat(): LabelRecoveryImageImageFormat
    {
        return LabelRecoveryImageImageFormat::builder('REP')->build();
    }

    public static function buildLabelRecoveryResponseHighValueReport(): LabelRecoveryResponseHighValueReport
    {
        $imageFormat = HighValueReportImageImageFormat::builder('REP')->build();
        $image = HighValueReportImage::builder(
            // imageFormat
            $imageFormat,
            // graphicImage
            'REPLACE_ME',
        )->build();

        return LabelRecoveryResponseHighValueReport::builder($image)->build();
    }

    public static function buildLabelRecoveryResponseTrackingCandidate(): LabelRecoveryResponseTrackingCandidate
    {
        return LabelRecoveryResponseTrackingCandidate::builder('REPLACE_MEXXXXXXXX')->build();
    }

    public static function buildTrackingCandidatePickupDateRange(): TrackingCandidatePickupDateRange
    {
        return TrackingCandidatePickupDateRange::builder(
            // beginDate
            'REPLACE_',
            // endDate
            'REPLACE_',
        )->build();
    }

    public static function buildGlobalTaxInformationAgentTaxIdentificationNumber(): GlobalTaxInformationAgentTaxIdentificationNumber
    {
        return GlobalTaxInformationAgentTaxIdentificationNumber::builder('REPLACE_ME')->build();
    }

    public static function buildAgentTaxIdentificationNumberTaxIdentificationNumber(): AgentTaxIdentificationNumberTaxIdentificationNumber
    {
        return AgentTaxIdentificationNumberTaxIdentificationNumber::builder(
            // identificationNumber
            'REPLACE_ME',
            // iDNumberCustomerRole
            'REPLACE_ME',
            // iDNumberEncryptionIndicator
            'REPLACE_ME',
            // iDNumberPurposeCode
            'REPLACE_ME',
            // iDNumberTypeCode
            'REPLACE_ME',
        )->build();
    }

    public static function buildShipmentGlobalTaxInformation(): ShipmentGlobalTaxInformation
    {
        return ShipmentGlobalTaxInformation::builder()->build();
    }

    public static function buildErrorResponse(): ErrorResponse
    {
        return ErrorResponse::builder()->build();
    }

    public static function buildCommonErrorResponse(): CommonErrorResponse
    {
        return CommonErrorResponse::builder()->build();
    }

    public static function buildErrorMessage(): ErrorMessage
    {
        return ErrorMessage::builder()->build();
    }
}
