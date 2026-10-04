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
use Prefabcortex\UpsShip\Model\LTLHandlingUnits;
use Prefabcortex\UpsShip\Model\LTLOtherCharges;
use Prefabcortex\UpsShip\Model\LTLPackageWeightType;
use Prefabcortex\UpsShip\Model\LTLReferenceNumber;
use Prefabcortex\UpsShip\Model\MailInnovationsLabelImageLabelImageFormat;
use Prefabcortex\UpsShip\Model\MasterPickup;
use Prefabcortex\UpsShip\Model\MasterSoldTo;
use Prefabcortex\UpsShip\Model\MasterTradeComplianceDetails;
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
use Prefabcortex\UpsShip\Model\SelfNormalizingModel;
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
use Prefabcortex\UpsShip\Model\ShipmentWorldEase;
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
use Prefabcortex\UpsShip\Model\TradeDirectMaster;
use Prefabcortex\UpsShip\Model\TradeDirectNotificationBeforeDelivery;
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
use Prefabcortex\UpsShip\Validator\AddressPOEConstraint;
use Prefabcortex\UpsShip\Validator\AdjustedHeightUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\AgentTaxIdentificationNumberTaxIdentificationNumberConstraint;
use Prefabcortex\UpsShip\Validator\AlternateDeliveryAddressAddressConstraint;
use Prefabcortex\UpsShip\Validator\BillingWeightUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\BillReceiverAddressConstraint;
use Prefabcortex\UpsShip\Validator\BillShipperCreditCardConstraint;
use Prefabcortex\UpsShip\Validator\BillThirdPartyAddressConstraint;
use Prefabcortex\UpsShip\Validator\ChildLTLChargesConstraint;
use Prefabcortex\UpsShip\Validator\ChildLTLPackageConstraint;
use Prefabcortex\UpsShip\Validator\ChildProductConstraint;
use Prefabcortex\UpsShip\Validator\CN22ContentCN22ContentWeightConstraint;
use Prefabcortex\UpsShip\Validator\CN22ContentCN22DDSReferenceNumberConstraint;
use Prefabcortex\UpsShip\Validator\CN22ContentWeightUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\CN22FormCN22ContentConstraint;
use Prefabcortex\UpsShip\Validator\CODCODAmountConstraint;
use Prefabcortex\UpsShip\Validator\CODTurnInPageImageConstraint;
use Prefabcortex\UpsShip\Validator\CODTurnInPageImageImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\CommodityNMFCConstraint;
use Prefabcortex\UpsShip\Validator\CommonErrorResponseConstraint;
use Prefabcortex\UpsShip\Validator\ContactsForwardAgentConstraint;
use Prefabcortex\UpsShip\Validator\ContactsIntermediateConsigneeConstraint;
use Prefabcortex\UpsShip\Validator\ContactsProducerConstraint;
use Prefabcortex\UpsShip\Validator\ContactsSoldToConstraint;
use Prefabcortex\UpsShip\Validator\ContactsUltimateConsigneeConstraint;
use Prefabcortex\UpsShip\Validator\ControlLogReceiptImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\CreditCardAddressConstraint;
use Prefabcortex\UpsShip\Validator\DDTCInformationUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\DeclaredValueTypeConstraint;
use Prefabcortex\UpsShip\Validator\DimensionsUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\DimWeightUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\DryIceDryIceWeightConstraint;
use Prefabcortex\UpsShip\Validator\DryIceWeightUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\EEIFilingOptionShipperFiledConstraint;
use Prefabcortex\UpsShip\Validator\EEIFilingOptionUPSFiledConstraint;
use Prefabcortex\UpsShip\Validator\EEIInformationDDTCInformationConstraint;
use Prefabcortex\UpsShip\Validator\EEIInformationLicenseConstraint;
use Prefabcortex\UpsShip\Validator\ErrorMessageConstraint;
use Prefabcortex\UpsShip\Validator\ErrorResponseConstraint;
use Prefabcortex\UpsShip\Validator\FormImageConstraint;
use Prefabcortex\UpsShip\Validator\ForwardAgentAddressConstraint;
use Prefabcortex\UpsShip\Validator\FreightDensityInfoAdjustedHeightConstraint;
use Prefabcortex\UpsShip\Validator\FreightDensityInfoHandlingUnitsConstraint;
use Prefabcortex\UpsShip\Validator\FreightShipmentInformationFreightDensityInfoConstraint;
use Prefabcortex\UpsShip\Validator\FRSPaymentInformationAddressConstraint;
use Prefabcortex\UpsShip\Validator\FRSPaymentInformationTypeConstraint;
use Prefabcortex\UpsShip\Validator\FRSShipmentDataFreightDensityRateConstraint;
use Prefabcortex\UpsShip\Validator\FRSShipmentDataHandlingUnitsConstraint;
use Prefabcortex\UpsShip\Validator\FRSShipmentDataTransportationChargesConstraint;
use Prefabcortex\UpsShip\Validator\GlobalTaxInformationAgentTaxIdentificationNumberConstraint;
use Prefabcortex\UpsShip\Validator\HandlingUnitsAdjustedHeightConstraint;
use Prefabcortex\UpsShip\Validator\HandlingUnitsDimensionsConstraint;
use Prefabcortex\UpsShip\Validator\HandlingUnitsTypeConstraint;
use Prefabcortex\UpsShip\Validator\HandlingUnitsUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\HighValueReportImageConstraint;
use Prefabcortex\UpsShip\Validator\HighValueReportImageImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\ImageImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\IntermediateConsigneeAddressConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsBlanketPeriodConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsCN22FormConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsContactsConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsDiscountConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsEEIFilingOptionConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsFreightChargesConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsInsuranceChargesConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsOtherChargesConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsProductConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsUPSPremiumCareFormConstraint;
use Prefabcortex\UpsShip\Validator\InternationalFormsUserCreatedFormConstraint;
use Prefabcortex\UpsShip\Validator\LabelDeliveryEMailConstraint;
use Prefabcortex\UpsShip\Validator\LabelImageLabelImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryFormImageConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryImageImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryLabelSpecificationLabelImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryLabelSpecificationLabelStockSizeConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryRequestConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryRequestLabelDeliveryConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryRequestLabelSpecificationConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryRequestReferenceValuesConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryRequestRequestConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryRequestTranslateConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryRequestUPSPremiumCareFormConstraint;
use Prefabcortex\UpsShip\Validator\LABELRECOVERYRequestWrapperConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryResponseCODTurnInPageConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryResponseConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryResponseFormConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryResponseHighValueReportConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryResponseLabelResultsConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryResponseResponseConstraint;
use Prefabcortex\UpsShip\Validator\LabelRecoveryResponseTrackingCandidateConstraint;
use Prefabcortex\UpsShip\Validator\LABELRECOVERYResponseWrapperConstraint;
use Prefabcortex\UpsShip\Validator\LabelResultsFormConstraint;
use Prefabcortex\UpsShip\Validator\LabelResultsLabelImageConstraint;
use Prefabcortex\UpsShip\Validator\LabelResultsMailInnovationsLabelImageConstraint;
use Prefabcortex\UpsShip\Validator\LabelResultsReceiptConstraint;
use Prefabcortex\UpsShip\Validator\LabelSpecificationInstructionConstraint;
use Prefabcortex\UpsShip\Validator\LabelSpecificationLabelImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\LabelSpecificationLabelStockSizeConstraint;
use Prefabcortex\UpsShip\Validator\LRCODTurnInPageImageConstraint;
use Prefabcortex\UpsShip\Validator\LRCODTurnInPageImageImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\LRFormImageConstraint;
use Prefabcortex\UpsShip\Validator\LRRequestTransactionReferenceConstraint;
use Prefabcortex\UpsShip\Validator\LRResponseResponseStatusConstraint;
use Prefabcortex\UpsShip\Validator\LRResponseTransactionReferenceConstraint;
use Prefabcortex\UpsShip\Validator\LTLDimensionsConstraint;
use Prefabcortex\UpsShip\Validator\LTLHandlingUnitsConstraint;
use Prefabcortex\UpsShip\Validator\LTLOtherChargesConstraint;
use Prefabcortex\UpsShip\Validator\LTLPackageWeightTypeConstraint;
use Prefabcortex\UpsShip\Validator\LTLReferenceNumberConstraint;
use Prefabcortex\UpsShip\Validator\MailInnovationsLabelImageLabelImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\MasterPickupConstraint;
use Prefabcortex\UpsShip\Validator\MasterSoldToConstraint;
use Prefabcortex\UpsShip\Validator\MasterTradeComplianceDetailsConstraint;
use Prefabcortex\UpsShip\Validator\NegotiatedChargesItemizedChargesConstraint;
use Prefabcortex\UpsShip\Validator\NegotiatedChargesRateModifierConstraint;
use Prefabcortex\UpsShip\Validator\NegotiatedRateChargesItemizedChargesConstraint;
use Prefabcortex\UpsShip\Validator\NegotiatedRateChargesRateModifierConstraint;
use Prefabcortex\UpsShip\Validator\NegotiatedRateChargesTaxChargesConstraint;
use Prefabcortex\UpsShip\Validator\NegotiatedRateChargesTotalChargeConstraint;
use Prefabcortex\UpsShip\Validator\NegotiatedRateChargesTotalChargesWithTaxesConstraint;
use Prefabcortex\UpsShip\Validator\NotificationEMailConstraint;
use Prefabcortex\UpsShip\Validator\NotificationLocaleConstraint;
use Prefabcortex\UpsShip\Validator\NotificationTextMessageConstraint;
use Prefabcortex\UpsShip\Validator\NotificationVoiceMessageConstraint;
use Prefabcortex\UpsShip\Validator\PackageCommodityConstraint;
use Prefabcortex\UpsShip\Validator\PackageDimensionsConstraint;
use Prefabcortex\UpsShip\Validator\PackageDimWeightConstraint;
use Prefabcortex\UpsShip\Validator\PackageHazMatPackageInformationConstraint;
use Prefabcortex\UpsShip\Validator\PackageLevelResultsStatusConstraint;
use Prefabcortex\UpsShip\Validator\PackagePackageServiceOptionsConstraint;
use Prefabcortex\UpsShip\Validator\PackagePackageWeightConstraint;
use Prefabcortex\UpsShip\Validator\PackagePackagingConstraint;
use Prefabcortex\UpsShip\Validator\PackageReferenceNumberConstraint;
use Prefabcortex\UpsShip\Validator\PackageResultsAccessorialConstraint;
use Prefabcortex\UpsShip\Validator\PackageResultsBaseServiceChargeConstraint;
use Prefabcortex\UpsShip\Validator\PackageResultsFormConstraint;
use Prefabcortex\UpsShip\Validator\PackageResultsItemizedChargesConstraint;
use Prefabcortex\UpsShip\Validator\PackageResultsNegotiatedChargesConstraint;
use Prefabcortex\UpsShip\Validator\PackageResultsRateModifierConstraint;
use Prefabcortex\UpsShip\Validator\PackageResultsServiceOptionsChargesConstraint;
use Prefabcortex\UpsShip\Validator\PackageResultsShippingLabelConstraint;
use Prefabcortex\UpsShip\Validator\PackageResultsShippingReceiptConstraint;
use Prefabcortex\UpsShip\Validator\PackageResultsSimpleRateConstraint;
use Prefabcortex\UpsShip\Validator\PackageServiceOptionsAccessPointCODConstraint;
use Prefabcortex\UpsShip\Validator\PackageServiceOptionsCODCODAmountConstraint;
use Prefabcortex\UpsShip\Validator\PackageServiceOptionsCODConstraint;
use Prefabcortex\UpsShip\Validator\PackageServiceOptionsDeclaredValueConstraint;
use Prefabcortex\UpsShip\Validator\PackageServiceOptionsDeliveryConfirmationConstraint;
use Prefabcortex\UpsShip\Validator\PackageServiceOptionsDryIceConstraint;
use Prefabcortex\UpsShip\Validator\PackageServiceOptionsHazMatConstraint;
use Prefabcortex\UpsShip\Validator\PackageServiceOptionsHealthcareConstraint;
use Prefabcortex\UpsShip\Validator\PackageServiceOptionsNotificationConstraint;
use Prefabcortex\UpsShip\Validator\PackageServiceOptionsNotificationEMailConstraint;
use Prefabcortex\UpsShip\Validator\PackageSimpleRateConstraint;
use Prefabcortex\UpsShip\Validator\PackageUPSPremierConstraint;
use Prefabcortex\UpsShip\Validator\PackageWeightUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\PackingListInfoPackageAssociatedConstraint;
use Prefabcortex\UpsShip\Validator\PaymentInformationShipmentChargeConstraint;
use Prefabcortex\UpsShip\Validator\PreAlertNotificationEMailMessageConstraint;
use Prefabcortex\UpsShip\Validator\PreAlertNotificationLocaleConstraint;
use Prefabcortex\UpsShip\Validator\PreAlertNotificationTextMessageConstraint;
use Prefabcortex\UpsShip\Validator\PreAlertNotificationVoiceMessageConstraint;
use Prefabcortex\UpsShip\Validator\ProducerAddressConstraint;
use Prefabcortex\UpsShip\Validator\ProducerPhoneConstraint;
use Prefabcortex\UpsShip\Validator\ProductDDSReferenceNumberConstraint;
use Prefabcortex\UpsShip\Validator\ProductEEIInformationConstraint;
use Prefabcortex\UpsShip\Validator\ProductExcludeFromFormConstraint;
use Prefabcortex\UpsShip\Validator\ProductNetCostDateRangeConstraint;
use Prefabcortex\UpsShip\Validator\ProductPackingListInfoConstraint;
use Prefabcortex\UpsShip\Validator\ProductProductWeightConstraint;
use Prefabcortex\UpsShip\Validator\ProductScheduleBConstraint;
use Prefabcortex\UpsShip\Validator\ProductUnitConstraint;
use Prefabcortex\UpsShip\Validator\ProductWeightUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\ReceiptImageConstraint;
use Prefabcortex\UpsShip\Validator\ReceiptImageImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\ReceiptSpecificationImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\ReferenceValuesReferenceNumberConstraint;
use Prefabcortex\UpsShip\Validator\RequestTransactionReferenceConstraint;
use Prefabcortex\UpsShip\Validator\ResponseAlertConstraint;
use Prefabcortex\UpsShip\Validator\ResponseResponseStatusConstraint;
use Prefabcortex\UpsShip\Validator\ResponseTransactionReferenceConstraint;
use Prefabcortex\UpsShip\Validator\ScheduleBUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\ShipFromAddressConstraint;
use Prefabcortex\UpsShip\Validator\ShipFromPhoneConstraint;
use Prefabcortex\UpsShip\Validator\ShipFromTaxIDTypeConstraint;
use Prefabcortex\UpsShip\Validator\ShipFromVendorInfoConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentAlternateDeliveryAddressConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentChargeBillReceiverConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentChargeBillShipperConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentChargeBillThirdPartyConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentChargesBaseServiceChargeConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentChargesItemizedChargesConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentChargesServiceOptionsChargesConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentChargesTaxChargesConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentChargesTotalChargesConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentChargesTotalChargesWithTaxesConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentChargesTransportationChargesConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentDGSignatoryInfoConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentFreightShipmentInformationConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentFRSPaymentInformationConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentGlobalTaxInformationConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentInvoiceLineTotalConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentPackageConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentPaymentInformationConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentPromotionalDiscountInformationConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentReferenceNumberConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentRequestConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentRequestLabelSpecificationConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentRequestReceiptSpecificationConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentRequestRequestConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentRequestShipmentConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResponseConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResponseResponseConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResponseShipmentResultsConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsBillingWeightConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsCODTurnInPageConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsControlLogReceiptConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsDisclaimerConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsFormConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsFormImageConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsFRSShipmentDataConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsHighValueReportConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsImageImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsNegotiatedRateChargesConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsPackageResultsConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsPalletLabelConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentResultsShipmentChargesConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentReturnServiceConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceOptionsAccessPointCODConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceOptionsCODConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceOptionsDeliveryConfirmationConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceOptionsInternationalFormsConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceOptionsLabelDeliveryConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceOptionsLabelMethodConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceOptionsNotificationConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceOptionsPreAlertNotificationConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceOptionsRestrictedArticlesConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentServiceOptionsVerifiedDeliveryConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentShipFromConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentShipmentIndicationTypeConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentShipmentRatingOptionsConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentShipmentServiceOptionsConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentShipperConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentShipToConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentTradeDirectConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentWorldEaseConstraint;
use Prefabcortex\UpsShip\Validator\ShipmentWorldEasePortOfEntryConstraint;
use Prefabcortex\UpsShip\Validator\ShipperAddressConstraint;
use Prefabcortex\UpsShip\Validator\ShipperPhoneConstraint;
use Prefabcortex\UpsShip\Validator\ShippingLabelImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\ShippingReceiptImageFormatConstraint;
use Prefabcortex\UpsShip\Validator\SHIPRequestWrapperConstraint;
use Prefabcortex\UpsShip\Validator\SHIPResponseWrapperConstraint;
use Prefabcortex\UpsShip\Validator\ShipToAddressConstraint;
use Prefabcortex\UpsShip\Validator\ShipToPhoneConstraint;
use Prefabcortex\UpsShip\Validator\SoldToAddressConstraint;
use Prefabcortex\UpsShip\Validator\SoldToPhoneConstraint;
use Prefabcortex\UpsShip\Validator\SummaryResultStatusConstraint;
use Prefabcortex\UpsShip\Validator\TrackingCandidatePickupDateRangeConstraint;
use Prefabcortex\UpsShip\Validator\TradeDirectAddressConstraint;
use Prefabcortex\UpsShip\Validator\TradeDirectChildConstraint;
use Prefabcortex\UpsShip\Validator\TradeDirectMasterConstraint;
use Prefabcortex\UpsShip\Validator\TradeDirectNotificationBeforeDeliveryConstraint;
use Prefabcortex\UpsShip\Validator\TradeDirectPhoneConstraint;
use Prefabcortex\UpsShip\Validator\TransportationChargesDiscountAmountConstraint;
use Prefabcortex\UpsShip\Validator\TransportationChargesGrossChargeConstraint;
use Prefabcortex\UpsShip\Validator\TransportationChargesNetChargeConstraint;
use Prefabcortex\UpsShip\Validator\UltimateConsigneeAddressConstraint;
use Prefabcortex\UpsShip\Validator\UltimateConsigneeUltimateConsigneeTypeConstraint;
use Prefabcortex\UpsShip\Validator\UnitUnitOfMeasurementConstraint;
use Prefabcortex\UpsShip\Validator\UPSFiledPOAConstraint;
use Prefabcortex\UpsShip\Validator\UPSPremierHandlingInstructionsConstraint;
use Prefabcortex\UpsShip\Validator\UPSPremiumCareFormLanguageForUPSPremiumCareConstraint;
use Prefabcortex\UpsShip\Validator\VoidRequestTransactionReferenceConstraint;
use Prefabcortex\UpsShip\Validator\VoidResponseResponseStatusConstraint;
use Prefabcortex\UpsShip\Validator\VoidResponseTransactionReferenceConstraint;
use Prefabcortex\UpsShip\Validator\VoidShipmentRequestConstraint;
use Prefabcortex\UpsShip\Validator\VoidShipmentRequestRequestConstraint;
use Prefabcortex\UpsShip\Validator\VoidShipmentRequestVoidShipmentConstraint;
use Prefabcortex\UpsShip\Validator\VOIDSHIPMENTRequestWrapperConstraint;
use Prefabcortex\UpsShip\Validator\VoidShipmentResponseConstraint;
use Prefabcortex\UpsShip\Validator\VoidShipmentResponsePackageLevelResultsConstraint;
use Prefabcortex\UpsShip\Validator\VoidShipmentResponseResponseConstraint;
use Prefabcortex\UpsShip\Validator\VoidShipmentResponseSummaryResultConstraint;
use Prefabcortex\UpsShip\Validator\VOIDSHIPMENTResponseWrapperConstraint;
use Symfony\Component\Validator\Constraint;

/**
 * The data providers over ModelFixtures: one schema-conformant instance of every model in this
 * package, and what each is checked against.
 *
 * Values are the ones the API description states — `example` or `default` where it gives one, a
 * typed placeholder where it does not. They are shaped like real data, not equal to it: nothing
 * here has been sent to the service, so a value being accepted by the schema says nothing about it
 * being accepted by the server.
 */
final class ModelFixtureProviders
{
    /**
     * Every model that could be built and reads back what it writes, keyed by class name so a
     * failure names the model.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel}>
     */
    public static function roundTrips(): iterable
    {
        yield 'SHIPRequestWrapper' => [ModelFixtures::buildSHIPRequestWrapper(), SHIPRequestWrapper::fromArray(...)];
        yield 'SHIPResponseWrapper' => [ModelFixtures::buildSHIPResponseWrapper(), SHIPResponseWrapper::fromArray(...)];
        yield 'ShipmentRequest' => [ModelFixtures::buildShipmentRequest(), ShipmentRequest::fromArray(...)];
        yield 'AddressPOE' => [ModelFixtures::buildAddressPOE(), AddressPOE::fromArray(...)];
        yield 'ShipmentWorldEase' => [ModelFixtures::buildShipmentWorldEase(), ShipmentWorldEase::fromArray(...)];
        yield 'ShipmentWorldEasePortOfEntry' => [
            ModelFixtures::buildShipmentWorldEasePortOfEntry(),
            ShipmentWorldEasePortOfEntry::fromArray(...),
        ];
        yield 'ShipmentRequestRequest' => [
            ModelFixtures::buildShipmentRequestRequest(),
            ShipmentRequestRequest::fromArray(...),
        ];
        yield 'RequestTransactionReference' => [
            ModelFixtures::buildRequestTransactionReference(),
            RequestTransactionReference::fromArray(...),
        ];
        yield 'ShipmentRequestShipment' => [
            ModelFixtures::buildShipmentRequestShipment(),
            ShipmentRequestShipment::fromArray(...),
        ];
        yield 'ShipmentReturnService' => [
            ModelFixtures::buildShipmentReturnService(),
            ShipmentReturnService::fromArray(...),
        ];
        yield 'ShipmentShipper' => [ModelFixtures::buildShipmentShipper(), ShipmentShipper::fromArray(...)];
        yield 'ShipperPhone' => [ModelFixtures::buildShipperPhone(), ShipperPhone::fromArray(...)];
        yield 'ShipperAddress' => [ModelFixtures::buildShipperAddress(), ShipperAddress::fromArray(...)];
        yield 'ShipmentShipTo' => [ModelFixtures::buildShipmentShipTo(), ShipmentShipTo::fromArray(...)];
        yield 'ShipToPhone' => [ModelFixtures::buildShipToPhone(), ShipToPhone::fromArray(...)];
        yield 'ShipToAddress' => [ModelFixtures::buildShipToAddress(), ShipToAddress::fromArray(...)];
        yield 'ShipmentAlternateDeliveryAddress' => [
            ModelFixtures::buildShipmentAlternateDeliveryAddress(),
            ShipmentAlternateDeliveryAddress::fromArray(...),
        ];
        yield 'AlternateDeliveryAddressAddress' => [
            ModelFixtures::buildAlternateDeliveryAddressAddress(),
            AlternateDeliveryAddressAddress::fromArray(...),
        ];
        yield 'ShipmentShipFrom' => [ModelFixtures::buildShipmentShipFrom(), ShipmentShipFrom::fromArray(...)];
        yield 'ShipFromTaxIDType' => [ModelFixtures::buildShipFromTaxIDType(), ShipFromTaxIDType::fromArray(...)];
        yield 'ShipFromPhone' => [ModelFixtures::buildShipFromPhone(), ShipFromPhone::fromArray(...)];
        yield 'ShipFromAddress' => [ModelFixtures::buildShipFromAddress(), ShipFromAddress::fromArray(...)];
        yield 'ShipFromVendorInfo' => [ModelFixtures::buildShipFromVendorInfo(), ShipFromVendorInfo::fromArray(...)];
        yield 'ShipmentPaymentInformation' => [
            ModelFixtures::buildShipmentPaymentInformation(),
            ShipmentPaymentInformation::fromArray(...),
        ];
        yield 'PaymentInformationShipmentCharge' => [
            ModelFixtures::buildPaymentInformationShipmentCharge(),
            PaymentInformationShipmentCharge::fromArray(...),
        ];
        yield 'ShipmentChargeBillShipper' => [
            ModelFixtures::buildShipmentChargeBillShipper(),
            ShipmentChargeBillShipper::fromArray(...),
        ];
        yield 'BillShipperCreditCard' => [
            ModelFixtures::buildBillShipperCreditCard(),
            BillShipperCreditCard::fromArray(...),
        ];
        yield 'CreditCardAddress' => [ModelFixtures::buildCreditCardAddress(), CreditCardAddress::fromArray(...)];
        yield 'ShipmentChargeBillReceiver' => [
            ModelFixtures::buildShipmentChargeBillReceiver(),
            ShipmentChargeBillReceiver::fromArray(...),
        ];
        yield 'BillReceiverAddress' => [ModelFixtures::buildBillReceiverAddress(), BillReceiverAddress::fromArray(...)];
        yield 'ShipmentChargeBillThirdParty' => [
            ModelFixtures::buildShipmentChargeBillThirdParty(),
            ShipmentChargeBillThirdParty::fromArray(...),
        ];
        yield 'BillThirdPartyAddress' => [
            ModelFixtures::buildBillThirdPartyAddress(),
            BillThirdPartyAddress::fromArray(...),
        ];
        yield 'ShipmentFRSPaymentInformation' => [
            ModelFixtures::buildShipmentFRSPaymentInformation(),
            ShipmentFRSPaymentInformation::fromArray(...),
        ];
        yield 'FRSPaymentInformationType' => [
            ModelFixtures::buildFRSPaymentInformationType(),
            FRSPaymentInformationType::fromArray(...),
        ];
        yield 'FRSPaymentInformationAddress' => [
            ModelFixtures::buildFRSPaymentInformationAddress(),
            FRSPaymentInformationAddress::fromArray(...),
        ];
        yield 'ShipmentFreightShipmentInformation' => [
            ModelFixtures::buildShipmentFreightShipmentInformation(),
            ShipmentFreightShipmentInformation::fromArray(...),
        ];
        yield 'FreightShipmentInformationFreightDensityInfo' => [
            ModelFixtures::buildFreightShipmentInformationFreightDensityInfo(),
            FreightShipmentInformationFreightDensityInfo::fromArray(...),
        ];
        yield 'FreightDensityInfoAdjustedHeight' => [
            ModelFixtures::buildFreightDensityInfoAdjustedHeight(),
            FreightDensityInfoAdjustedHeight::fromArray(...),
        ];
        yield 'AdjustedHeightUnitOfMeasurement' => [
            ModelFixtures::buildAdjustedHeightUnitOfMeasurement(),
            AdjustedHeightUnitOfMeasurement::fromArray(...),
        ];
        yield 'FreightDensityInfoHandlingUnits' => [
            ModelFixtures::buildFreightDensityInfoHandlingUnits(),
            FreightDensityInfoHandlingUnits::fromArray(...),
        ];
        yield 'HandlingUnitsType' => [ModelFixtures::buildHandlingUnitsType(), HandlingUnitsType::fromArray(...)];
        yield 'HandlingUnitsDimensions' => [
            ModelFixtures::buildHandlingUnitsDimensions(),
            HandlingUnitsDimensions::fromArray(...),
        ];
        yield 'HandlingUnitsUnitOfMeasurement' => [
            ModelFixtures::buildHandlingUnitsUnitOfMeasurement(),
            HandlingUnitsUnitOfMeasurement::fromArray(...),
        ];
        yield 'ShipmentPromotionalDiscountInformation' => [
            ModelFixtures::buildShipmentPromotionalDiscountInformation(),
            ShipmentPromotionalDiscountInformation::fromArray(...),
        ];
        yield 'ShipmentDGSignatoryInfo' => [
            ModelFixtures::buildShipmentDGSignatoryInfo(),
            ShipmentDGSignatoryInfo::fromArray(...),
        ];
        yield 'ShipmentShipmentRatingOptions' => [
            ModelFixtures::buildShipmentShipmentRatingOptions(),
            ShipmentShipmentRatingOptions::fromArray(...),
        ];
        yield 'ShipmentReferenceNumber' => [
            ModelFixtures::buildShipmentReferenceNumber(),
            ShipmentReferenceNumber::fromArray(...),
        ];
        yield 'ShipmentService' => [ModelFixtures::buildShipmentService(), ShipmentService::fromArray(...)];
        yield 'ShipmentInvoiceLineTotal' => [
            ModelFixtures::buildShipmentInvoiceLineTotal(),
            ShipmentInvoiceLineTotal::fromArray(...),
        ];
        yield 'ShipmentShipmentIndicationType' => [
            ModelFixtures::buildShipmentShipmentIndicationType(),
            ShipmentShipmentIndicationType::fromArray(...),
        ];
        yield 'ShipmentShipmentServiceOptions' => [
            ModelFixtures::buildShipmentShipmentServiceOptions(),
            ShipmentShipmentServiceOptions::fromArray(...),
        ];
        yield 'ShipmentServiceOptionsCOD' => [
            ModelFixtures::buildShipmentServiceOptionsCOD(),
            ShipmentServiceOptionsCOD::fromArray(...),
        ];
        yield 'CODCODAmount' => [ModelFixtures::buildCODCODAmount(), CODCODAmount::fromArray(...)];
        yield 'ShipmentServiceOptionsAccessPointCOD' => [
            ModelFixtures::buildShipmentServiceOptionsAccessPointCOD(),
            ShipmentServiceOptionsAccessPointCOD::fromArray(...),
        ];
        yield 'ShipmentServiceOptionsNotification' => [
            ModelFixtures::buildShipmentServiceOptionsNotification(),
            ShipmentServiceOptionsNotification::fromArray(...),
        ];
        yield 'NotificationEMail' => [ModelFixtures::buildNotificationEMail(), NotificationEMail::fromArray(...)];
        yield 'NotificationVoiceMessage' => [
            ModelFixtures::buildNotificationVoiceMessage(),
            NotificationVoiceMessage::fromArray(...),
        ];
        yield 'NotificationTextMessage' => [
            ModelFixtures::buildNotificationTextMessage(),
            NotificationTextMessage::fromArray(...),
        ];
        yield 'NotificationLocale' => [ModelFixtures::buildNotificationLocale(), NotificationLocale::fromArray(...)];
        yield 'ShipmentServiceOptionsLabelDelivery' => [
            ModelFixtures::buildShipmentServiceOptionsLabelDelivery(),
            ShipmentServiceOptionsLabelDelivery::fromArray(...),
        ];
        yield 'LabelDeliveryEMail' => [ModelFixtures::buildLabelDeliveryEMail(), LabelDeliveryEMail::fromArray(...)];
        yield 'ShipmentServiceOptionsInternationalForms' => [
            ModelFixtures::buildShipmentServiceOptionsInternationalForms(),
            ShipmentServiceOptionsInternationalForms::fromArray(...),
        ];
        yield 'InternationalFormsUserCreatedForm' => [
            ModelFixtures::buildInternationalFormsUserCreatedForm(),
            InternationalFormsUserCreatedForm::fromArray(...),
        ];
        yield 'InternationalFormsUPSPremiumCareForm' => [
            ModelFixtures::buildInternationalFormsUPSPremiumCareForm(),
            InternationalFormsUPSPremiumCareForm::fromArray(...),
        ];
        yield 'UPSPremiumCareFormLanguageForUPSPremiumCare' => [
            ModelFixtures::buildUPSPremiumCareFormLanguageForUPSPremiumCare(),
            UPSPremiumCareFormLanguageForUPSPremiumCare::fromArray(...),
        ];
        yield 'InternationalFormsCN22Form' => [
            ModelFixtures::buildInternationalFormsCN22Form(),
            InternationalFormsCN22Form::fromArray(...),
        ];
        yield 'CN22FormCN22Content' => [ModelFixtures::buildCN22FormCN22Content(), CN22FormCN22Content::fromArray(...)];
        yield 'CN22ContentCN22DDSReferenceNumber' => [
            ModelFixtures::buildCN22ContentCN22DDSReferenceNumber(),
            CN22ContentCN22DDSReferenceNumber::fromArray(...),
        ];
        yield 'CN22ContentCN22ContentWeight' => [
            ModelFixtures::buildCN22ContentCN22ContentWeight(),
            CN22ContentCN22ContentWeight::fromArray(...),
        ];
        yield 'CN22ContentWeightUnitOfMeasurement' => [
            ModelFixtures::buildCN22ContentWeightUnitOfMeasurement(),
            CN22ContentWeightUnitOfMeasurement::fromArray(...),
        ];
        yield 'InternationalFormsEEIFilingOption' => [
            ModelFixtures::buildInternationalFormsEEIFilingOption(),
            InternationalFormsEEIFilingOption::fromArray(...),
        ];
        yield 'EEIFilingOptionUPSFiled' => [
            ModelFixtures::buildEEIFilingOptionUPSFiled(),
            EEIFilingOptionUPSFiled::fromArray(...),
        ];
        yield 'UPSFiledPOA' => [ModelFixtures::buildUPSFiledPOA(), UPSFiledPOA::fromArray(...)];
        yield 'EEIFilingOptionShipperFiled' => [
            ModelFixtures::buildEEIFilingOptionShipperFiled(),
            EEIFilingOptionShipperFiled::fromArray(...),
        ];
        yield 'InternationalFormsContacts' => [
            ModelFixtures::buildInternationalFormsContacts(),
            InternationalFormsContacts::fromArray(...),
        ];
        yield 'ContactsForwardAgent' => [
            ModelFixtures::buildContactsForwardAgent(),
            ContactsForwardAgent::fromArray(...),
        ];
        yield 'ForwardAgentAddress' => [ModelFixtures::buildForwardAgentAddress(), ForwardAgentAddress::fromArray(...)];
        yield 'ContactsUltimateConsignee' => [
            ModelFixtures::buildContactsUltimateConsignee(),
            ContactsUltimateConsignee::fromArray(...),
        ];
        yield 'UltimateConsigneeAddress' => [
            ModelFixtures::buildUltimateConsigneeAddress(),
            UltimateConsigneeAddress::fromArray(...),
        ];
        yield 'UltimateConsigneeUltimateConsigneeType' => [
            ModelFixtures::buildUltimateConsigneeUltimateConsigneeType(),
            UltimateConsigneeUltimateConsigneeType::fromArray(...),
        ];
        yield 'ContactsIntermediateConsignee' => [
            ModelFixtures::buildContactsIntermediateConsignee(),
            ContactsIntermediateConsignee::fromArray(...),
        ];
        yield 'IntermediateConsigneeAddress' => [
            ModelFixtures::buildIntermediateConsigneeAddress(),
            IntermediateConsigneeAddress::fromArray(...),
        ];
        yield 'ContactsProducer' => [ModelFixtures::buildContactsProducer(), ContactsProducer::fromArray(...)];
        yield 'ProducerAddress' => [ModelFixtures::buildProducerAddress(), ProducerAddress::fromArray(...)];
        yield 'ProducerPhone' => [ModelFixtures::buildProducerPhone(), ProducerPhone::fromArray(...)];
        yield 'ContactsSoldTo' => [ModelFixtures::buildContactsSoldTo(), ContactsSoldTo::fromArray(...)];
        yield 'SoldToPhone' => [ModelFixtures::buildSoldToPhone(), SoldToPhone::fromArray(...)];
        yield 'SoldToAddress' => [ModelFixtures::buildSoldToAddress(), SoldToAddress::fromArray(...)];
        yield 'InternationalFormsProduct' => [
            ModelFixtures::buildInternationalFormsProduct(),
            InternationalFormsProduct::fromArray(...),
        ];
        yield 'ProductUnit' => [ModelFixtures::buildProductUnit(), ProductUnit::fromArray(...)];
        yield 'UnitUnitOfMeasurement' => [
            ModelFixtures::buildUnitUnitOfMeasurement(),
            UnitUnitOfMeasurement::fromArray(...),
        ];
        yield 'ProductNetCostDateRange' => [
            ModelFixtures::buildProductNetCostDateRange(),
            ProductNetCostDateRange::fromArray(...),
        ];
        yield 'ProductProductWeight' => [
            ModelFixtures::buildProductProductWeight(),
            ProductProductWeight::fromArray(...),
        ];
        yield 'ProductWeightUnitOfMeasurement' => [
            ModelFixtures::buildProductWeightUnitOfMeasurement(),
            ProductWeightUnitOfMeasurement::fromArray(...),
        ];
        yield 'ProductScheduleB' => [ModelFixtures::buildProductScheduleB(), ProductScheduleB::fromArray(...)];
        yield 'ScheduleBUnitOfMeasurement' => [
            ModelFixtures::buildScheduleBUnitOfMeasurement(),
            ScheduleBUnitOfMeasurement::fromArray(...),
        ];
        yield 'ProductExcludeFromForm' => [
            ModelFixtures::buildProductExcludeFromForm(),
            ProductExcludeFromForm::fromArray(...),
        ];
        yield 'ProductPackingListInfo' => [
            ModelFixtures::buildProductPackingListInfo(),
            ProductPackingListInfo::fromArray(...),
        ];
        yield 'PackingListInfoPackageAssociated' => [
            ModelFixtures::buildPackingListInfoPackageAssociated(),
            PackingListInfoPackageAssociated::fromArray(...),
        ];
        yield 'ProductDDSReferenceNumber' => [
            ModelFixtures::buildProductDDSReferenceNumber(),
            ProductDDSReferenceNumber::fromArray(...),
        ];
        yield 'ProductEEIInformation' => [
            ModelFixtures::buildProductEEIInformation(),
            ProductEEIInformation::fromArray(...),
        ];
        yield 'EEIInformationLicense' => [
            ModelFixtures::buildEEIInformationLicense(),
            EEIInformationLicense::fromArray(...),
        ];
        yield 'EEIInformationDDTCInformation' => [
            ModelFixtures::buildEEIInformationDDTCInformation(),
            EEIInformationDDTCInformation::fromArray(...),
        ];
        yield 'DDTCInformationUnitOfMeasurement' => [
            ModelFixtures::buildDDTCInformationUnitOfMeasurement(),
            DDTCInformationUnitOfMeasurement::fromArray(...),
        ];
        yield 'InternationalFormsDiscount' => [
            ModelFixtures::buildInternationalFormsDiscount(),
            InternationalFormsDiscount::fromArray(...),
        ];
        yield 'InternationalFormsFreightCharges' => [
            ModelFixtures::buildInternationalFormsFreightCharges(),
            InternationalFormsFreightCharges::fromArray(...),
        ];
        yield 'InternationalFormsInsuranceCharges' => [
            ModelFixtures::buildInternationalFormsInsuranceCharges(),
            InternationalFormsInsuranceCharges::fromArray(...),
        ];
        yield 'InternationalFormsOtherCharges' => [
            ModelFixtures::buildInternationalFormsOtherCharges(),
            InternationalFormsOtherCharges::fromArray(...),
        ];
        yield 'InternationalFormsBlanketPeriod' => [
            ModelFixtures::buildInternationalFormsBlanketPeriod(),
            InternationalFormsBlanketPeriod::fromArray(...),
        ];
        yield 'ShipmentServiceOptionsDeliveryConfirmation' => [
            ModelFixtures::buildShipmentServiceOptionsDeliveryConfirmation(),
            ShipmentServiceOptionsDeliveryConfirmation::fromArray(...),
        ];
        yield 'ShipmentServiceOptionsLabelMethod' => [
            ModelFixtures::buildShipmentServiceOptionsLabelMethod(),
            ShipmentServiceOptionsLabelMethod::fromArray(...),
        ];
        yield 'ShipmentServiceOptionsPreAlertNotification' => [
            ModelFixtures::buildShipmentServiceOptionsPreAlertNotification(),
            ShipmentServiceOptionsPreAlertNotification::fromArray(...),
        ];
        yield 'PreAlertNotificationEMailMessage' => [
            ModelFixtures::buildPreAlertNotificationEMailMessage(),
            PreAlertNotificationEMailMessage::fromArray(...),
        ];
        yield 'PreAlertNotificationVoiceMessage' => [
            ModelFixtures::buildPreAlertNotificationVoiceMessage(),
            PreAlertNotificationVoiceMessage::fromArray(...),
        ];
        yield 'PreAlertNotificationTextMessage' => [
            ModelFixtures::buildPreAlertNotificationTextMessage(),
            PreAlertNotificationTextMessage::fromArray(...),
        ];
        yield 'PreAlertNotificationLocale' => [
            ModelFixtures::buildPreAlertNotificationLocale(),
            PreAlertNotificationLocale::fromArray(...),
        ];
        yield 'ShipmentServiceOptionsRestrictedArticles' => [
            ModelFixtures::buildShipmentServiceOptionsRestrictedArticles(),
            ShipmentServiceOptionsRestrictedArticles::fromArray(...),
        ];
        yield 'ShipmentServiceOptionsVerifiedDelivery' => [
            ModelFixtures::buildShipmentServiceOptionsVerifiedDelivery(),
            ShipmentServiceOptionsVerifiedDelivery::fromArray(...),
        ];
        yield 'ShipmentPackage' => [ModelFixtures::buildShipmentPackage(), ShipmentPackage::fromArray(...)];
        yield 'ShipmentTradeDirect' => [ModelFixtures::buildShipmentTradeDirect(), ShipmentTradeDirect::fromArray(...)];
        yield 'TradeDirectMaster' => [ModelFixtures::buildTradeDirectMaster(), TradeDirectMaster::fromArray(...)];
        yield 'MasterSoldTo' => [ModelFixtures::buildMasterSoldTo(), MasterSoldTo::fromArray(...)];
        yield 'MasterPickup' => [ModelFixtures::buildMasterPickup(), MasterPickup::fromArray(...)];
        yield 'TradeDirectPhone' => [ModelFixtures::buildTradeDirectPhone(), TradeDirectPhone::fromArray(...)];
        yield 'TradeDirectAddress' => [ModelFixtures::buildTradeDirectAddress(), TradeDirectAddress::fromArray(...)];
        yield 'MasterTradeComplianceDetails' => [
            ModelFixtures::buildMasterTradeComplianceDetails(),
            MasterTradeComplianceDetails::fromArray(...),
        ];
        yield 'TradeDirectChild' => [ModelFixtures::buildTradeDirectChild(), TradeDirectChild::fromArray(...)];
        yield 'ChildProduct' => [ModelFixtures::buildChildProduct(), ChildProduct::fromArray(...)];
        yield 'ChildLTLPackage' => [ModelFixtures::buildChildLTLPackage(), ChildLTLPackage::fromArray(...)];
        yield 'LTLHandlingUnits' => [ModelFixtures::buildLTLHandlingUnits(), LTLHandlingUnits::fromArray(...)];
        yield 'LTLReferenceNumber' => [ModelFixtures::buildLTLReferenceNumber(), LTLReferenceNumber::fromArray(...)];
        yield 'LTLDimensions' => [ModelFixtures::buildLTLDimensions(), LTLDimensions::fromArray(...)];
        yield 'LTLPackageWeightType' => [
            ModelFixtures::buildLTLPackageWeightType(),
            LTLPackageWeightType::fromArray(...),
        ];
        yield 'ChildLTLCharges' => [ModelFixtures::buildChildLTLCharges(), ChildLTLCharges::fromArray(...)];
        yield 'LTLOtherCharges' => [ModelFixtures::buildLTLOtherCharges(), LTLOtherCharges::fromArray(...)];
        yield 'TradeDirectNotificationBeforeDelivery' => [
            ModelFixtures::buildTradeDirectNotificationBeforeDelivery(),
            TradeDirectNotificationBeforeDelivery::fromArray(...),
        ];
        yield 'PackagePackaging' => [ModelFixtures::buildPackagePackaging(), PackagePackaging::fromArray(...)];
        yield 'PackageDimensions' => [ModelFixtures::buildPackageDimensions(), PackageDimensions::fromArray(...)];
        yield 'DimensionsUnitOfMeasurement' => [
            ModelFixtures::buildDimensionsUnitOfMeasurement(),
            DimensionsUnitOfMeasurement::fromArray(...),
        ];
        yield 'PackageDimWeight' => [ModelFixtures::buildPackageDimWeight(), PackageDimWeight::fromArray(...)];
        yield 'DimWeightUnitOfMeasurement' => [
            ModelFixtures::buildDimWeightUnitOfMeasurement(),
            DimWeightUnitOfMeasurement::fromArray(...),
        ];
        yield 'PackagePackageWeight' => [
            ModelFixtures::buildPackagePackageWeight(),
            PackagePackageWeight::fromArray(...),
        ];
        yield 'PackageWeightUnitOfMeasurement' => [
            ModelFixtures::buildPackageWeightUnitOfMeasurement(),
            PackageWeightUnitOfMeasurement::fromArray(...),
        ];
        yield 'PackageReferenceNumber' => [
            ModelFixtures::buildPackageReferenceNumber(),
            PackageReferenceNumber::fromArray(...),
        ];
        yield 'PackageSimpleRate' => [ModelFixtures::buildPackageSimpleRate(), PackageSimpleRate::fromArray(...)];
        yield 'PackageUPSPremier' => [ModelFixtures::buildPackageUPSPremier(), PackageUPSPremier::fromArray(...)];
        yield 'UPSPremierHandlingInstructions' => [
            ModelFixtures::buildUPSPremierHandlingInstructions(),
            UPSPremierHandlingInstructions::fromArray(...),
        ];
        yield 'PackagePackageServiceOptions' => [
            ModelFixtures::buildPackagePackageServiceOptions(),
            PackagePackageServiceOptions::fromArray(...),
        ];
        yield 'PackageServiceOptionsHealthcare' => [
            ModelFixtures::buildPackageServiceOptionsHealthcare(),
            PackageServiceOptionsHealthcare::fromArray(...),
        ];
        yield 'PackageServiceOptionsDeliveryConfirmation' => [
            ModelFixtures::buildPackageServiceOptionsDeliveryConfirmation(),
            PackageServiceOptionsDeliveryConfirmation::fromArray(...),
        ];
        yield 'PackageServiceOptionsDeclaredValue' => [
            ModelFixtures::buildPackageServiceOptionsDeclaredValue(),
            PackageServiceOptionsDeclaredValue::fromArray(...),
        ];
        yield 'DeclaredValueType' => [ModelFixtures::buildDeclaredValueType(), DeclaredValueType::fromArray(...)];
        yield 'PackageServiceOptionsCOD' => [
            ModelFixtures::buildPackageServiceOptionsCOD(),
            PackageServiceOptionsCOD::fromArray(...),
        ];
        yield 'PackageServiceOptionsCODCODAmount' => [
            ModelFixtures::buildPackageServiceOptionsCODCODAmount(),
            PackageServiceOptionsCODCODAmount::fromArray(...),
        ];
        yield 'PackageServiceOptionsAccessPointCOD' => [
            ModelFixtures::buildPackageServiceOptionsAccessPointCOD(),
            PackageServiceOptionsAccessPointCOD::fromArray(...),
        ];
        yield 'PackageServiceOptionsNotification' => [
            ModelFixtures::buildPackageServiceOptionsNotification(),
            PackageServiceOptionsNotification::fromArray(...),
        ];
        yield 'PackageServiceOptionsNotificationEMail' => [
            ModelFixtures::buildPackageServiceOptionsNotificationEMail(),
            PackageServiceOptionsNotificationEMail::fromArray(...),
        ];
        yield 'PackageServiceOptionsHazMat' => [
            ModelFixtures::buildPackageServiceOptionsHazMat(),
            PackageServiceOptionsHazMat::fromArray(...),
        ];
        yield 'PackageServiceOptionsDryIce' => [
            ModelFixtures::buildPackageServiceOptionsDryIce(),
            PackageServiceOptionsDryIce::fromArray(...),
        ];
        yield 'DryIceDryIceWeight' => [ModelFixtures::buildDryIceDryIceWeight(), DryIceDryIceWeight::fromArray(...)];
        yield 'DryIceWeightUnitOfMeasurement' => [
            ModelFixtures::buildDryIceWeightUnitOfMeasurement(),
            DryIceWeightUnitOfMeasurement::fromArray(...),
        ];
        yield 'PackageCommodity' => [ModelFixtures::buildPackageCommodity(), PackageCommodity::fromArray(...)];
        yield 'CommodityNMFC' => [ModelFixtures::buildCommodityNMFC(), CommodityNMFC::fromArray(...)];
        yield 'PackageHazMatPackageInformation' => [
            ModelFixtures::buildPackageHazMatPackageInformation(),
            PackageHazMatPackageInformation::fromArray(...),
        ];
        yield 'ShipmentRequestLabelSpecification' => [
            ModelFixtures::buildShipmentRequestLabelSpecification(),
            ShipmentRequestLabelSpecification::fromArray(...),
        ];
        yield 'LabelSpecificationLabelImageFormat' => [
            ModelFixtures::buildLabelSpecificationLabelImageFormat(),
            LabelSpecificationLabelImageFormat::fromArray(...),
        ];
        yield 'LabelSpecificationLabelStockSize' => [
            ModelFixtures::buildLabelSpecificationLabelStockSize(),
            LabelSpecificationLabelStockSize::fromArray(...),
        ];
        yield 'LabelSpecificationInstruction' => [
            ModelFixtures::buildLabelSpecificationInstruction(),
            LabelSpecificationInstruction::fromArray(...),
        ];
        yield 'ShipmentRequestReceiptSpecification' => [
            ModelFixtures::buildShipmentRequestReceiptSpecification(),
            ShipmentRequestReceiptSpecification::fromArray(...),
        ];
        yield 'ReceiptSpecificationImageFormat' => [
            ModelFixtures::buildReceiptSpecificationImageFormat(),
            ReceiptSpecificationImageFormat::fromArray(...),
        ];
        yield 'ShipmentResponse' => [ModelFixtures::buildShipmentResponse(), ShipmentResponse::fromArray(...)];
        yield 'ShipmentResponseResponse' => [
            ModelFixtures::buildShipmentResponseResponse(),
            ShipmentResponseResponse::fromArray(...),
        ];
        yield 'ResponseResponseStatus' => [
            ModelFixtures::buildResponseResponseStatus(),
            ResponseResponseStatus::fromArray(...),
        ];
        yield 'ResponseAlert' => [ModelFixtures::buildResponseAlert(), ResponseAlert::fromArray(...)];
        yield 'ResponseTransactionReference' => [
            ModelFixtures::buildResponseTransactionReference(),
            ResponseTransactionReference::fromArray(...),
        ];
        yield 'ShipmentResponseShipmentResults' => [
            ModelFixtures::buildShipmentResponseShipmentResults(),
            ShipmentResponseShipmentResults::fromArray(...),
        ];
        yield 'ShipmentResultsPalletLabel' => [
            ModelFixtures::buildShipmentResultsPalletLabel(),
            ShipmentResultsPalletLabel::fromArray(...),
        ];
        yield 'ShipmentResultsDisclaimer' => [
            ModelFixtures::buildShipmentResultsDisclaimer(),
            ShipmentResultsDisclaimer::fromArray(...),
        ];
        yield 'ShipmentResultsShipmentCharges' => [
            ModelFixtures::buildShipmentResultsShipmentCharges(),
            ShipmentResultsShipmentCharges::fromArray(...),
        ];
        yield 'ShipmentChargesBaseServiceCharge' => [
            ModelFixtures::buildShipmentChargesBaseServiceCharge(),
            ShipmentChargesBaseServiceCharge::fromArray(...),
        ];
        yield 'ShipmentChargesTransportationCharges' => [
            ModelFixtures::buildShipmentChargesTransportationCharges(),
            ShipmentChargesTransportationCharges::fromArray(...),
        ];
        yield 'ShipmentChargesItemizedCharges' => [
            ModelFixtures::buildShipmentChargesItemizedCharges(),
            ShipmentChargesItemizedCharges::fromArray(...),
        ];
        yield 'ShipmentChargesServiceOptionsCharges' => [
            ModelFixtures::buildShipmentChargesServiceOptionsCharges(),
            ShipmentChargesServiceOptionsCharges::fromArray(...),
        ];
        yield 'ShipmentChargesTaxCharges' => [
            ModelFixtures::buildShipmentChargesTaxCharges(),
            ShipmentChargesTaxCharges::fromArray(...),
        ];
        yield 'ShipmentChargesTotalCharges' => [
            ModelFixtures::buildShipmentChargesTotalCharges(),
            ShipmentChargesTotalCharges::fromArray(...),
        ];
        yield 'ShipmentChargesTotalChargesWithTaxes' => [
            ModelFixtures::buildShipmentChargesTotalChargesWithTaxes(),
            ShipmentChargesTotalChargesWithTaxes::fromArray(...),
        ];
        yield 'ShipmentResultsNegotiatedRateCharges' => [
            ModelFixtures::buildShipmentResultsNegotiatedRateCharges(),
            ShipmentResultsNegotiatedRateCharges::fromArray(...),
        ];
        yield 'NegotiatedRateChargesItemizedCharges' => [
            ModelFixtures::buildNegotiatedRateChargesItemizedCharges(),
            NegotiatedRateChargesItemizedCharges::fromArray(...),
        ];
        yield 'NegotiatedRateChargesTaxCharges' => [
            ModelFixtures::buildNegotiatedRateChargesTaxCharges(),
            NegotiatedRateChargesTaxCharges::fromArray(...),
        ];
        yield 'NegotiatedRateChargesTotalCharge' => [
            ModelFixtures::buildNegotiatedRateChargesTotalCharge(),
            NegotiatedRateChargesTotalCharge::fromArray(...),
        ];
        yield 'NegotiatedRateChargesRateModifier' => [
            ModelFixtures::buildNegotiatedRateChargesRateModifier(),
            NegotiatedRateChargesRateModifier::fromArray(...),
        ];
        yield 'NegotiatedRateChargesTotalChargesWithTaxes' => [
            ModelFixtures::buildNegotiatedRateChargesTotalChargesWithTaxes(),
            NegotiatedRateChargesTotalChargesWithTaxes::fromArray(...),
        ];
        yield 'ShipmentResultsFRSShipmentData' => [
            ModelFixtures::buildShipmentResultsFRSShipmentData(),
            ShipmentResultsFRSShipmentData::fromArray(...),
        ];
        yield 'FRSShipmentDataTransportationCharges' => [
            ModelFixtures::buildFRSShipmentDataTransportationCharges(),
            FRSShipmentDataTransportationCharges::fromArray(...),
        ];
        yield 'TransportationChargesGrossCharge' => [
            ModelFixtures::buildTransportationChargesGrossCharge(),
            TransportationChargesGrossCharge::fromArray(...),
        ];
        yield 'TransportationChargesDiscountAmount' => [
            ModelFixtures::buildTransportationChargesDiscountAmount(),
            TransportationChargesDiscountAmount::fromArray(...),
        ];
        yield 'TransportationChargesNetCharge' => [
            ModelFixtures::buildTransportationChargesNetCharge(),
            TransportationChargesNetCharge::fromArray(...),
        ];
        yield 'FRSShipmentDataFreightDensityRate' => [
            ModelFixtures::buildFRSShipmentDataFreightDensityRate(),
            FRSShipmentDataFreightDensityRate::fromArray(...),
        ];
        yield 'FRSShipmentDataHandlingUnits' => [
            ModelFixtures::buildFRSShipmentDataHandlingUnits(),
            FRSShipmentDataHandlingUnits::fromArray(...),
        ];
        yield 'HandlingUnitsAdjustedHeight' => [
            ModelFixtures::buildHandlingUnitsAdjustedHeight(),
            HandlingUnitsAdjustedHeight::fromArray(...),
        ];
        yield 'ShipmentResultsBillingWeight' => [
            ModelFixtures::buildShipmentResultsBillingWeight(),
            ShipmentResultsBillingWeight::fromArray(...),
        ];
        yield 'BillingWeightUnitOfMeasurement' => [
            ModelFixtures::buildBillingWeightUnitOfMeasurement(),
            BillingWeightUnitOfMeasurement::fromArray(...),
        ];
        yield 'ShipmentResultsPackageResults' => [
            ModelFixtures::buildShipmentResultsPackageResults(),
            ShipmentResultsPackageResults::fromArray(...),
        ];
        yield 'PackageResultsBaseServiceCharge' => [
            ModelFixtures::buildPackageResultsBaseServiceCharge(),
            PackageResultsBaseServiceCharge::fromArray(...),
        ];
        yield 'PackageResultsServiceOptionsCharges' => [
            ModelFixtures::buildPackageResultsServiceOptionsCharges(),
            PackageResultsServiceOptionsCharges::fromArray(...),
        ];
        yield 'PackageResultsShippingLabel' => [
            ModelFixtures::buildPackageResultsShippingLabel(),
            PackageResultsShippingLabel::fromArray(...),
        ];
        yield 'ShippingLabelImageFormat' => [
            ModelFixtures::buildShippingLabelImageFormat(),
            ShippingLabelImageFormat::fromArray(...),
        ];
        yield 'PackageResultsShippingReceipt' => [
            ModelFixtures::buildPackageResultsShippingReceipt(),
            PackageResultsShippingReceipt::fromArray(...),
        ];
        yield 'ShippingReceiptImageFormat' => [
            ModelFixtures::buildShippingReceiptImageFormat(),
            ShippingReceiptImageFormat::fromArray(...),
        ];
        yield 'PackageResultsAccessorial' => [
            ModelFixtures::buildPackageResultsAccessorial(),
            PackageResultsAccessorial::fromArray(...),
        ];
        yield 'PackageResultsSimpleRate' => [
            ModelFixtures::buildPackageResultsSimpleRate(),
            PackageResultsSimpleRate::fromArray(...),
        ];
        yield 'PackageResultsForm' => [ModelFixtures::buildPackageResultsForm(), PackageResultsForm::fromArray(...)];
        yield 'ShipmentResultsFormImage' => [
            ModelFixtures::buildShipmentResultsFormImage(),
            ShipmentResultsFormImage::fromArray(...),
        ];
        yield 'FormImage' => [ModelFixtures::buildFormImage(), FormImage::fromArray(...)];
        yield 'HighValueReportImageImageFormat' => [
            ModelFixtures::buildHighValueReportImageImageFormat(),
            HighValueReportImageImageFormat::fromArray(...),
        ];
        yield 'CODTurnInPageImageImageFormat' => [
            ModelFixtures::buildCODTurnInPageImageImageFormat(),
            CODTurnInPageImageImageFormat::fromArray(...),
        ];
        yield 'ShipmentResultsImageImageFormat' => [
            ModelFixtures::buildShipmentResultsImageImageFormat(),
            ShipmentResultsImageImageFormat::fromArray(...),
        ];
        yield 'ImageImageFormat' => [ModelFixtures::buildImageImageFormat(), ImageImageFormat::fromArray(...)];
        yield 'PackageResultsItemizedCharges' => [
            ModelFixtures::buildPackageResultsItemizedCharges(),
            PackageResultsItemizedCharges::fromArray(...),
        ];
        yield 'PackageResultsNegotiatedCharges' => [
            ModelFixtures::buildPackageResultsNegotiatedCharges(),
            PackageResultsNegotiatedCharges::fromArray(...),
        ];
        yield 'NegotiatedChargesItemizedCharges' => [
            ModelFixtures::buildNegotiatedChargesItemizedCharges(),
            NegotiatedChargesItemizedCharges::fromArray(...),
        ];
        yield 'NegotiatedChargesRateModifier' => [
            ModelFixtures::buildNegotiatedChargesRateModifier(),
            NegotiatedChargesRateModifier::fromArray(...),
        ];
        yield 'PackageResultsRateModifier' => [
            ModelFixtures::buildPackageResultsRateModifier(),
            PackageResultsRateModifier::fromArray(...),
        ];
        yield 'ShipmentResultsControlLogReceipt' => [
            ModelFixtures::buildShipmentResultsControlLogReceipt(),
            ShipmentResultsControlLogReceipt::fromArray(...),
        ];
        yield 'ControlLogReceiptImageFormat' => [
            ModelFixtures::buildControlLogReceiptImageFormat(),
            ControlLogReceiptImageFormat::fromArray(...),
        ];
        yield 'ShipmentResultsForm' => [ModelFixtures::buildShipmentResultsForm(), ShipmentResultsForm::fromArray(...)];
        yield 'ShipmentResultsCODTurnInPage' => [
            ModelFixtures::buildShipmentResultsCODTurnInPage(),
            ShipmentResultsCODTurnInPage::fromArray(...),
        ];
        yield 'CODTurnInPageImage' => [ModelFixtures::buildCODTurnInPageImage(), CODTurnInPageImage::fromArray(...)];
        yield 'ShipmentResultsHighValueReport' => [
            ModelFixtures::buildShipmentResultsHighValueReport(),
            ShipmentResultsHighValueReport::fromArray(...),
        ];
        yield 'HighValueReportImage' => [
            ModelFixtures::buildHighValueReportImage(),
            HighValueReportImage::fromArray(...),
        ];
        yield 'VOIDSHIPMENTRequestWrapper' => [
            ModelFixtures::buildVOIDSHIPMENTRequestWrapper(),
            VOIDSHIPMENTRequestWrapper::fromArray(...),
        ];
        yield 'VOIDSHIPMENTResponseWrapper' => [
            ModelFixtures::buildVOIDSHIPMENTResponseWrapper(),
            VOIDSHIPMENTResponseWrapper::fromArray(...),
        ];
        yield 'VoidShipmentRequest' => [ModelFixtures::buildVoidShipmentRequest(), VoidShipmentRequest::fromArray(...)];
        yield 'VoidShipmentRequestRequest' => [
            ModelFixtures::buildVoidShipmentRequestRequest(),
            VoidShipmentRequestRequest::fromArray(...),
        ];
        yield 'VoidRequestTransactionReference' => [
            ModelFixtures::buildVoidRequestTransactionReference(),
            VoidRequestTransactionReference::fromArray(...),
        ];
        yield 'VoidShipmentRequestVoidShipment' => [
            ModelFixtures::buildVoidShipmentRequestVoidShipment(),
            VoidShipmentRequestVoidShipment::fromArray(...),
        ];
        yield 'VoidShipmentResponse' => [
            ModelFixtures::buildVoidShipmentResponse(),
            VoidShipmentResponse::fromArray(...),
        ];
        yield 'VoidShipmentResponseResponse' => [
            ModelFixtures::buildVoidShipmentResponseResponse(),
            VoidShipmentResponseResponse::fromArray(...),
        ];
        yield 'VoidResponseResponseStatus' => [
            ModelFixtures::buildVoidResponseResponseStatus(),
            VoidResponseResponseStatus::fromArray(...),
        ];
        yield 'VoidResponseTransactionReference' => [
            ModelFixtures::buildVoidResponseTransactionReference(),
            VoidResponseTransactionReference::fromArray(...),
        ];
        yield 'VoidShipmentResponseSummaryResult' => [
            ModelFixtures::buildVoidShipmentResponseSummaryResult(),
            VoidShipmentResponseSummaryResult::fromArray(...),
        ];
        yield 'SummaryResultStatus' => [ModelFixtures::buildSummaryResultStatus(), SummaryResultStatus::fromArray(...)];
        yield 'VoidShipmentResponsePackageLevelResults' => [
            ModelFixtures::buildVoidShipmentResponsePackageLevelResults(),
            VoidShipmentResponsePackageLevelResults::fromArray(...),
        ];
        yield 'PackageLevelResultsStatus' => [
            ModelFixtures::buildPackageLevelResultsStatus(),
            PackageLevelResultsStatus::fromArray(...),
        ];
        yield 'LABELRECOVERYRequestWrapper' => [
            ModelFixtures::buildLABELRECOVERYRequestWrapper(),
            LABELRECOVERYRequestWrapper::fromArray(...),
        ];
        yield 'LABELRECOVERYResponseWrapper' => [
            ModelFixtures::buildLABELRECOVERYResponseWrapper(),
            LABELRECOVERYResponseWrapper::fromArray(...),
        ];
        yield 'LabelRecoveryRequest' => [
            ModelFixtures::buildLabelRecoveryRequest(),
            LabelRecoveryRequest::fromArray(...),
        ];
        yield 'LabelRecoveryRequestRequest' => [
            ModelFixtures::buildLabelRecoveryRequestRequest(),
            LabelRecoveryRequestRequest::fromArray(...),
        ];
        yield 'LRRequestTransactionReference' => [
            ModelFixtures::buildLRRequestTransactionReference(),
            LRRequestTransactionReference::fromArray(...),
        ];
        yield 'LabelRecoveryRequestLabelSpecification' => [
            ModelFixtures::buildLabelRecoveryRequestLabelSpecification(),
            LabelRecoveryRequestLabelSpecification::fromArray(...),
        ];
        yield 'LabelRecoveryLabelSpecificationLabelImageFormat' => [
            ModelFixtures::buildLabelRecoveryLabelSpecificationLabelImageFormat(),
            LabelRecoveryLabelSpecificationLabelImageFormat::fromArray(...),
        ];
        yield 'LabelRecoveryLabelSpecificationLabelStockSize' => [
            ModelFixtures::buildLabelRecoveryLabelSpecificationLabelStockSize(),
            LabelRecoveryLabelSpecificationLabelStockSize::fromArray(...),
        ];
        yield 'LabelRecoveryRequestTranslate' => [
            ModelFixtures::buildLabelRecoveryRequestTranslate(),
            LabelRecoveryRequestTranslate::fromArray(...),
        ];
        yield 'LabelRecoveryRequestLabelDelivery' => [
            ModelFixtures::buildLabelRecoveryRequestLabelDelivery(),
            LabelRecoveryRequestLabelDelivery::fromArray(...),
        ];
        yield 'LabelRecoveryRequestReferenceValues' => [
            ModelFixtures::buildLabelRecoveryRequestReferenceValues(),
            LabelRecoveryRequestReferenceValues::fromArray(...),
        ];
        yield 'ReferenceValuesReferenceNumber' => [
            ModelFixtures::buildReferenceValuesReferenceNumber(),
            ReferenceValuesReferenceNumber::fromArray(...),
        ];
        yield 'LabelRecoveryRequestUPSPremiumCareForm' => [
            ModelFixtures::buildLabelRecoveryRequestUPSPremiumCareForm(),
            LabelRecoveryRequestUPSPremiumCareForm::fromArray(...),
        ];
        yield 'LabelRecoveryResponse' => [
            ModelFixtures::buildLabelRecoveryResponse(),
            LabelRecoveryResponse::fromArray(...),
        ];
        yield 'LabelRecoveryResponseResponse' => [
            ModelFixtures::buildLabelRecoveryResponseResponse(),
            LabelRecoveryResponseResponse::fromArray(...),
        ];
        yield 'LRResponseResponseStatus' => [
            ModelFixtures::buildLRResponseResponseStatus(),
            LRResponseResponseStatus::fromArray(...),
        ];
        yield 'LRResponseTransactionReference' => [
            ModelFixtures::buildLRResponseTransactionReference(),
            LRResponseTransactionReference::fromArray(...),
        ];
        yield 'LabelRecoveryResponseLabelResults' => [
            ModelFixtures::buildLabelRecoveryResponseLabelResults(),
            LabelRecoveryResponseLabelResults::fromArray(...),
        ];
        yield 'LabelResultsLabelImage' => [
            ModelFixtures::buildLabelResultsLabelImage(),
            LabelResultsLabelImage::fromArray(...),
        ];
        yield 'LabelImageLabelImageFormat' => [
            ModelFixtures::buildLabelImageLabelImageFormat(),
            LabelImageLabelImageFormat::fromArray(...),
        ];
        yield 'LabelResultsMailInnovationsLabelImage' => [
            ModelFixtures::buildLabelResultsMailInnovationsLabelImage(),
            LabelResultsMailInnovationsLabelImage::fromArray(...),
        ];
        yield 'MailInnovationsLabelImageLabelImageFormat' => [
            ModelFixtures::buildMailInnovationsLabelImageLabelImageFormat(),
            MailInnovationsLabelImageLabelImageFormat::fromArray(...),
        ];
        yield 'LabelResultsReceipt' => [ModelFixtures::buildLabelResultsReceipt(), LabelResultsReceipt::fromArray(...)];
        yield 'ReceiptImage' => [ModelFixtures::buildReceiptImage(), ReceiptImage::fromArray(...)];
        yield 'ReceiptImageImageFormat' => [
            ModelFixtures::buildReceiptImageImageFormat(),
            ReceiptImageImageFormat::fromArray(...),
        ];
        yield 'LabelResultsForm' => [ModelFixtures::buildLabelResultsForm(), LabelResultsForm::fromArray(...)];
        yield 'LRFormImage' => [ModelFixtures::buildLRFormImage(), LRFormImage::fromArray(...)];
        yield 'LabelRecoveryResponseCODTurnInPage' => [
            ModelFixtures::buildLabelRecoveryResponseCODTurnInPage(),
            LabelRecoveryResponseCODTurnInPage::fromArray(...),
        ];
        yield 'LRCODTurnInPageImage' => [
            ModelFixtures::buildLRCODTurnInPageImage(),
            LRCODTurnInPageImage::fromArray(...),
        ];
        yield 'LRCODTurnInPageImageImageFormat' => [
            ModelFixtures::buildLRCODTurnInPageImageImageFormat(),
            LRCODTurnInPageImageImageFormat::fromArray(...),
        ];
        yield 'LabelRecoveryResponseForm' => [
            ModelFixtures::buildLabelRecoveryResponseForm(),
            LabelRecoveryResponseForm::fromArray(...),
        ];
        yield 'LabelRecoveryFormImage' => [
            ModelFixtures::buildLabelRecoveryFormImage(),
            LabelRecoveryFormImage::fromArray(...),
        ];
        yield 'LabelRecoveryImageImageFormat' => [
            ModelFixtures::buildLabelRecoveryImageImageFormat(),
            LabelRecoveryImageImageFormat::fromArray(...),
        ];
        yield 'LabelRecoveryResponseHighValueReport' => [
            ModelFixtures::buildLabelRecoveryResponseHighValueReport(),
            LabelRecoveryResponseHighValueReport::fromArray(...),
        ];
        yield 'LabelRecoveryResponseTrackingCandidate' => [
            ModelFixtures::buildLabelRecoveryResponseTrackingCandidate(),
            LabelRecoveryResponseTrackingCandidate::fromArray(...),
        ];
        yield 'TrackingCandidatePickupDateRange' => [
            ModelFixtures::buildTrackingCandidatePickupDateRange(),
            TrackingCandidatePickupDateRange::fromArray(...),
        ];
        yield 'GlobalTaxInformationAgentTaxIdentificationNumber' => [
            ModelFixtures::buildGlobalTaxInformationAgentTaxIdentificationNumber(),
            GlobalTaxInformationAgentTaxIdentificationNumber::fromArray(...),
        ];
        yield 'AgentTaxIdentificationNumberTaxIdentificationNumber' => [
            ModelFixtures::buildAgentTaxIdentificationNumberTaxIdentificationNumber(),
            AgentTaxIdentificationNumberTaxIdentificationNumber::fromArray(...),
        ];
        yield 'ShipmentGlobalTaxInformation' => [
            ModelFixtures::buildShipmentGlobalTaxInformation(),
            ShipmentGlobalTaxInformation::fromArray(...),
        ];
        yield 'ErrorResponse' => [ModelFixtures::buildErrorResponse(), ErrorResponse::fromArray(...)];
        yield 'CommonErrorResponse' => [ModelFixtures::buildCommonErrorResponse(), CommonErrorResponse::fromArray(...)];
        yield 'ErrorMessage' => [ModelFixtures::buildErrorMessage(), ErrorMessage::fromArray(...)];
    }

    /**
     * Each model with the wire names its document must carry.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel, list<string>}>
     */
    public static function documentsMissingARequiredProperty(): iterable
    {
        yield 'SHIPRequestWrapper' => [
            ModelFixtures::buildSHIPRequestWrapper(),
            SHIPRequestWrapper::fromArray(...),
            ['ShipmentRequest'],
        ];
        yield 'SHIPResponseWrapper' => [
            ModelFixtures::buildSHIPResponseWrapper(),
            SHIPResponseWrapper::fromArray(...),
            ['ShipmentResponse'],
        ];
        yield 'ShipmentRequest' => [
            ModelFixtures::buildShipmentRequest(),
            ShipmentRequest::fromArray(...),
            ['Request', 'Shipment'],
        ];
        yield 'AddressPOE' => [
            ModelFixtures::buildAddressPOE(),
            AddressPOE::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'ShipmentWorldEase' => [
            ModelFixtures::buildShipmentWorldEase(),
            ShipmentWorldEase::fromArray(...),
            ['DestinationCountryCode', 'MasterShipmentChgType', 'PortOfEntry'],
        ];
        yield 'ShipmentWorldEasePortOfEntry' => [
            ModelFixtures::buildShipmentWorldEasePortOfEntry(),
            ShipmentWorldEasePortOfEntry::fromArray(...),
            ['Name', 'ClearancePortCode', 'Consignee', 'Address'],
        ];
        yield 'ShipmentRequestRequest' => [
            ModelFixtures::buildShipmentRequestRequest(),
            ShipmentRequestRequest::fromArray(...),
            ['RequestOption'],
        ];
        yield 'ShipmentRequestShipment' => [
            ModelFixtures::buildShipmentRequestShipment(),
            ShipmentRequestShipment::fromArray(...),
            ['Shipper', 'ShipTo', 'Service', 'Package'],
        ];
        yield 'ShipmentReturnService' => [
            ModelFixtures::buildShipmentReturnService(),
            ShipmentReturnService::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentShipper' => [
            ModelFixtures::buildShipmentShipper(),
            ShipmentShipper::fromArray(...),
            ['Name', 'ShipperNumber', 'Address'],
        ];
        yield 'ShipperPhone' => [ModelFixtures::buildShipperPhone(), ShipperPhone::fromArray(...), ['Number']];
        yield 'ShipperAddress' => [
            ModelFixtures::buildShipperAddress(),
            ShipperAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'ShipmentShipTo' => [
            ModelFixtures::buildShipmentShipTo(),
            ShipmentShipTo::fromArray(...),
            ['Name', 'Address'],
        ];
        yield 'ShipToPhone' => [ModelFixtures::buildShipToPhone(), ShipToPhone::fromArray(...), ['Number']];
        yield 'ShipToAddress' => [
            ModelFixtures::buildShipToAddress(),
            ShipToAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'ShipmentAlternateDeliveryAddress' => [
            ModelFixtures::buildShipmentAlternateDeliveryAddress(),
            ShipmentAlternateDeliveryAddress::fromArray(...),
            ['Name', 'AttentionName', 'Address'],
        ];
        yield 'AlternateDeliveryAddressAddress' => [
            ModelFixtures::buildAlternateDeliveryAddressAddress(),
            AlternateDeliveryAddressAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'ShipmentShipFrom' => [
            ModelFixtures::buildShipmentShipFrom(),
            ShipmentShipFrom::fromArray(...),
            ['Name', 'Address'],
        ];
        yield 'ShipFromTaxIDType' => [
            ModelFixtures::buildShipFromTaxIDType(),
            ShipFromTaxIDType::fromArray(...),
            ['Code'],
        ];
        yield 'ShipFromPhone' => [ModelFixtures::buildShipFromPhone(), ShipFromPhone::fromArray(...), ['Number']];
        yield 'ShipFromAddress' => [
            ModelFixtures::buildShipFromAddress(),
            ShipFromAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'ShipFromVendorInfo' => [
            ModelFixtures::buildShipFromVendorInfo(),
            ShipFromVendorInfo::fromArray(...),
            ['VendorCollectIDTypeCode', 'VendorCollectIDNumber'],
        ];
        yield 'ShipmentPaymentInformation' => [
            ModelFixtures::buildShipmentPaymentInformation(),
            ShipmentPaymentInformation::fromArray(...),
            ['ShipmentCharge'],
        ];
        yield 'PaymentInformationShipmentCharge' => [
            ModelFixtures::buildPaymentInformationShipmentCharge(),
            PaymentInformationShipmentCharge::fromArray(...),
            ['Type'],
        ];
        yield 'BillShipperCreditCard' => [
            ModelFixtures::buildBillShipperCreditCard(),
            BillShipperCreditCard::fromArray(...),
            ['Type', 'Number', 'ExpirationDate', 'SecurityCode'],
        ];
        yield 'CreditCardAddress' => [
            ModelFixtures::buildCreditCardAddress(),
            CreditCardAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'ShipmentChargeBillReceiver' => [
            ModelFixtures::buildShipmentChargeBillReceiver(),
            ShipmentChargeBillReceiver::fromArray(...),
            ['AccountNumber'],
        ];
        yield 'ShipmentChargeBillThirdParty' => [
            ModelFixtures::buildShipmentChargeBillThirdParty(),
            ShipmentChargeBillThirdParty::fromArray(...),
            ['Address'],
        ];
        yield 'BillThirdPartyAddress' => [
            ModelFixtures::buildBillThirdPartyAddress(),
            BillThirdPartyAddress::fromArray(...),
            ['CountryCode'],
        ];
        yield 'ShipmentFRSPaymentInformation' => [
            ModelFixtures::buildShipmentFRSPaymentInformation(),
            ShipmentFRSPaymentInformation::fromArray(...),
            ['Type', 'AccountNumber'],
        ];
        yield 'FRSPaymentInformationType' => [
            ModelFixtures::buildFRSPaymentInformationType(),
            FRSPaymentInformationType::fromArray(...),
            ['Code'],
        ];
        yield 'FRSPaymentInformationAddress' => [
            ModelFixtures::buildFRSPaymentInformationAddress(),
            FRSPaymentInformationAddress::fromArray(...),
            ['CountryCode'],
        ];
        yield 'FreightDensityInfoAdjustedHeight' => [
            ModelFixtures::buildFreightDensityInfoAdjustedHeight(),
            FreightDensityInfoAdjustedHeight::fromArray(...),
            ['Value', 'UnitOfMeasurement'],
        ];
        yield 'AdjustedHeightUnitOfMeasurement' => [
            ModelFixtures::buildAdjustedHeightUnitOfMeasurement(),
            AdjustedHeightUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'FreightDensityInfoHandlingUnits' => [
            ModelFixtures::buildFreightDensityInfoHandlingUnits(),
            FreightDensityInfoHandlingUnits::fromArray(...),
            ['Quantity', 'Type', 'Dimensions'],
        ];
        yield 'HandlingUnitsType' => [
            ModelFixtures::buildHandlingUnitsType(),
            HandlingUnitsType::fromArray(...),
            ['Code'],
        ];
        yield 'HandlingUnitsDimensions' => [
            ModelFixtures::buildHandlingUnitsDimensions(),
            HandlingUnitsDimensions::fromArray(...),
            ['UnitOfMeasurement', 'Length', 'Width', 'Height'],
        ];
        yield 'HandlingUnitsUnitOfMeasurement' => [
            ModelFixtures::buildHandlingUnitsUnitOfMeasurement(),
            HandlingUnitsUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentPromotionalDiscountInformation' => [
            ModelFixtures::buildShipmentPromotionalDiscountInformation(),
            ShipmentPromotionalDiscountInformation::fromArray(...),
            ['PromoCode', 'PromoAliasCode'],
        ];
        yield 'ShipmentReferenceNumber' => [
            ModelFixtures::buildShipmentReferenceNumber(),
            ShipmentReferenceNumber::fromArray(...),
            ['Value'],
        ];
        yield 'ShipmentService' => [ModelFixtures::buildShipmentService(), ShipmentService::fromArray(...), ['Code']];
        yield 'ShipmentInvoiceLineTotal' => [
            ModelFixtures::buildShipmentInvoiceLineTotal(),
            ShipmentInvoiceLineTotal::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'ShipmentShipmentIndicationType' => [
            ModelFixtures::buildShipmentShipmentIndicationType(),
            ShipmentShipmentIndicationType::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentServiceOptionsCOD' => [
            ModelFixtures::buildShipmentServiceOptionsCOD(),
            ShipmentServiceOptionsCOD::fromArray(...),
            ['CODFundsCode', 'CODAmount'],
        ];
        yield 'CODCODAmount' => [
            ModelFixtures::buildCODCODAmount(),
            CODCODAmount::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'ShipmentServiceOptionsAccessPointCOD' => [
            ModelFixtures::buildShipmentServiceOptionsAccessPointCOD(),
            ShipmentServiceOptionsAccessPointCOD::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'ShipmentServiceOptionsNotification' => [
            ModelFixtures::buildShipmentServiceOptionsNotification(),
            ShipmentServiceOptionsNotification::fromArray(...),
            ['NotificationCode', 'EMail'],
        ];
        yield 'NotificationEMail' => [
            ModelFixtures::buildNotificationEMail(),
            NotificationEMail::fromArray(...),
            ['EMailAddress'],
        ];
        yield 'NotificationVoiceMessage' => [
            ModelFixtures::buildNotificationVoiceMessage(),
            NotificationVoiceMessage::fromArray(...),
            ['PhoneNumber'],
        ];
        yield 'NotificationTextMessage' => [
            ModelFixtures::buildNotificationTextMessage(),
            NotificationTextMessage::fromArray(...),
            ['PhoneNumber'],
        ];
        yield 'NotificationLocale' => [
            ModelFixtures::buildNotificationLocale(),
            NotificationLocale::fromArray(...),
            ['Language', 'Dialect'],
        ];
        yield 'LabelDeliveryEMail' => [
            ModelFixtures::buildLabelDeliveryEMail(),
            LabelDeliveryEMail::fromArray(...),
            ['EMailAddress'],
        ];
        yield 'ShipmentServiceOptionsInternationalForms' => [
            ModelFixtures::buildShipmentServiceOptionsInternationalForms(),
            ShipmentServiceOptionsInternationalForms::fromArray(...),
            ['FormType', 'Product'],
        ];
        yield 'InternationalFormsUserCreatedForm' => [
            ModelFixtures::buildInternationalFormsUserCreatedForm(),
            InternationalFormsUserCreatedForm::fromArray(...),
            ['DocumentID'],
        ];
        yield 'InternationalFormsUPSPremiumCareForm' => [
            ModelFixtures::buildInternationalFormsUPSPremiumCareForm(),
            InternationalFormsUPSPremiumCareForm::fromArray(...),
            ['ShipmentDate', 'PageSize', 'PrintType', 'NumOfCopies', 'LanguageForUPSPremiumCare'],
        ];
        yield 'UPSPremiumCareFormLanguageForUPSPremiumCare' => [
            ModelFixtures::buildUPSPremiumCareFormLanguageForUPSPremiumCare(),
            UPSPremiumCareFormLanguageForUPSPremiumCare::fromArray(...),
            ['Language'],
        ];
        yield 'InternationalFormsCN22Form' => [
            ModelFixtures::buildInternationalFormsCN22Form(),
            InternationalFormsCN22Form::fromArray(...),
            ['LabelSize', 'PrintsPerPage', 'LabelPrintType', 'CN22Type', 'CN22Content'],
        ];
        yield 'CN22FormCN22Content' => [
            ModelFixtures::buildCN22FormCN22Content(),
            CN22FormCN22Content::fromArray(...),
            [
                'CN22ContentQuantity',
                'CN22ContentDescription',
                'CN22ContentWeight',
                'CN22ContentTotalValue',
                'CN22ContentCurrencyCode',
            ],
        ];
        yield 'CN22ContentCN22ContentWeight' => [
            ModelFixtures::buildCN22ContentCN22ContentWeight(),
            CN22ContentCN22ContentWeight::fromArray(...),
            ['UnitOfMeasurement', 'Weight'],
        ];
        yield 'CN22ContentWeightUnitOfMeasurement' => [
            ModelFixtures::buildCN22ContentWeightUnitOfMeasurement(),
            CN22ContentWeightUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'InternationalFormsEEIFilingOption' => [
            ModelFixtures::buildInternationalFormsEEIFilingOption(),
            InternationalFormsEEIFilingOption::fromArray(...),
            ['Code'],
        ];
        yield 'EEIFilingOptionUPSFiled' => [
            ModelFixtures::buildEEIFilingOptionUPSFiled(),
            EEIFilingOptionUPSFiled::fromArray(...),
            ['POA'],
        ];
        yield 'UPSFiledPOA' => [ModelFixtures::buildUPSFiledPOA(), UPSFiledPOA::fromArray(...), ['Code']];
        yield 'EEIFilingOptionShipperFiled' => [
            ModelFixtures::buildEEIFilingOptionShipperFiled(),
            EEIFilingOptionShipperFiled::fromArray(...),
            ['Code'],
        ];
        yield 'ContactsForwardAgent' => [
            ModelFixtures::buildContactsForwardAgent(),
            ContactsForwardAgent::fromArray(...),
            ['CompanyName', 'TaxIdentificationNumber', 'Address'],
        ];
        yield 'ForwardAgentAddress' => [
            ModelFixtures::buildForwardAgentAddress(),
            ForwardAgentAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'ContactsUltimateConsignee' => [
            ModelFixtures::buildContactsUltimateConsignee(),
            ContactsUltimateConsignee::fromArray(...),
            ['CompanyName', 'Address'],
        ];
        yield 'UltimateConsigneeAddress' => [
            ModelFixtures::buildUltimateConsigneeAddress(),
            UltimateConsigneeAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'UltimateConsigneeUltimateConsigneeType' => [
            ModelFixtures::buildUltimateConsigneeUltimateConsigneeType(),
            UltimateConsigneeUltimateConsigneeType::fromArray(...),
            ['Code'],
        ];
        yield 'ContactsIntermediateConsignee' => [
            ModelFixtures::buildContactsIntermediateConsignee(),
            ContactsIntermediateConsignee::fromArray(...),
            ['CompanyName', 'Address'],
        ];
        yield 'IntermediateConsigneeAddress' => [
            ModelFixtures::buildIntermediateConsigneeAddress(),
            IntermediateConsigneeAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'ProducerAddress' => [
            ModelFixtures::buildProducerAddress(),
            ProducerAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'ProducerPhone' => [ModelFixtures::buildProducerPhone(), ProducerPhone::fromArray(...), ['Number']];
        yield 'ContactsSoldTo' => [
            ModelFixtures::buildContactsSoldTo(),
            ContactsSoldTo::fromArray(...),
            ['Name', 'AttentionName', 'Address'],
        ];
        yield 'SoldToPhone' => [ModelFixtures::buildSoldToPhone(), SoldToPhone::fromArray(...), ['Number']];
        yield 'SoldToAddress' => [
            ModelFixtures::buildSoldToAddress(),
            SoldToAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'InternationalFormsProduct' => [
            ModelFixtures::buildInternationalFormsProduct(),
            InternationalFormsProduct::fromArray(...),
            ['Description'],
        ];
        yield 'ProductUnit' => [
            ModelFixtures::buildProductUnit(),
            ProductUnit::fromArray(...),
            ['Number', 'UnitOfMeasurement', 'Value'],
        ];
        yield 'UnitUnitOfMeasurement' => [
            ModelFixtures::buildUnitUnitOfMeasurement(),
            UnitUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'ProductNetCostDateRange' => [
            ModelFixtures::buildProductNetCostDateRange(),
            ProductNetCostDateRange::fromArray(...),
            ['BeginDate', 'EndDate'],
        ];
        yield 'ProductProductWeight' => [
            ModelFixtures::buildProductProductWeight(),
            ProductProductWeight::fromArray(...),
            ['UnitOfMeasurement', 'Weight'],
        ];
        yield 'ProductWeightUnitOfMeasurement' => [
            ModelFixtures::buildProductWeightUnitOfMeasurement(),
            ProductWeightUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'ProductScheduleB' => [
            ModelFixtures::buildProductScheduleB(),
            ProductScheduleB::fromArray(...),
            ['Number', 'UnitOfMeasurement'],
        ];
        yield 'ScheduleBUnitOfMeasurement' => [
            ModelFixtures::buildScheduleBUnitOfMeasurement(),
            ScheduleBUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'ProductExcludeFromForm' => [
            ModelFixtures::buildProductExcludeFromForm(),
            ProductExcludeFromForm::fromArray(...),
            ['FormType'],
        ];
        yield 'ProductPackingListInfo' => [
            ModelFixtures::buildProductPackingListInfo(),
            ProductPackingListInfo::fromArray(...),
            ['PackageAssociated'],
        ];
        yield 'PackingListInfoPackageAssociated' => [
            ModelFixtures::buildPackingListInfoPackageAssociated(),
            PackingListInfoPackageAssociated::fromArray(...),
            ['PackageNumber', 'ProductAmount'],
        ];
        yield 'DDTCInformationUnitOfMeasurement' => [
            ModelFixtures::buildDDTCInformationUnitOfMeasurement(),
            DDTCInformationUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'InternationalFormsDiscount' => [
            ModelFixtures::buildInternationalFormsDiscount(),
            InternationalFormsDiscount::fromArray(...),
            ['MonetaryValue'],
        ];
        yield 'InternationalFormsFreightCharges' => [
            ModelFixtures::buildInternationalFormsFreightCharges(),
            InternationalFormsFreightCharges::fromArray(...),
            ['MonetaryValue'],
        ];
        yield 'InternationalFormsInsuranceCharges' => [
            ModelFixtures::buildInternationalFormsInsuranceCharges(),
            InternationalFormsInsuranceCharges::fromArray(...),
            ['MonetaryValue'],
        ];
        yield 'InternationalFormsOtherCharges' => [
            ModelFixtures::buildInternationalFormsOtherCharges(),
            InternationalFormsOtherCharges::fromArray(...),
            ['MonetaryValue', 'Description'],
        ];
        yield 'InternationalFormsBlanketPeriod' => [
            ModelFixtures::buildInternationalFormsBlanketPeriod(),
            InternationalFormsBlanketPeriod::fromArray(...),
            ['BeginDate', 'EndDate'],
        ];
        yield 'ShipmentServiceOptionsDeliveryConfirmation' => [
            ModelFixtures::buildShipmentServiceOptionsDeliveryConfirmation(),
            ShipmentServiceOptionsDeliveryConfirmation::fromArray(...),
            ['DCISType'],
        ];
        yield 'ShipmentServiceOptionsLabelMethod' => [
            ModelFixtures::buildShipmentServiceOptionsLabelMethod(),
            ShipmentServiceOptionsLabelMethod::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentServiceOptionsPreAlertNotification' => [
            ModelFixtures::buildShipmentServiceOptionsPreAlertNotification(),
            ShipmentServiceOptionsPreAlertNotification::fromArray(...),
            ['Locale'],
        ];
        yield 'PreAlertNotificationEMailMessage' => [
            ModelFixtures::buildPreAlertNotificationEMailMessage(),
            PreAlertNotificationEMailMessage::fromArray(...),
            ['EMailAddress'],
        ];
        yield 'PreAlertNotificationVoiceMessage' => [
            ModelFixtures::buildPreAlertNotificationVoiceMessage(),
            PreAlertNotificationVoiceMessage::fromArray(...),
            ['PhoneNumber'],
        ];
        yield 'PreAlertNotificationTextMessage' => [
            ModelFixtures::buildPreAlertNotificationTextMessage(),
            PreAlertNotificationTextMessage::fromArray(...),
            ['PhoneNumber'],
        ];
        yield 'PreAlertNotificationLocale' => [
            ModelFixtures::buildPreAlertNotificationLocale(),
            PreAlertNotificationLocale::fromArray(...),
            ['Language', 'Dialect'],
        ];
        yield 'ShipmentServiceOptionsVerifiedDelivery' => [
            ModelFixtures::buildShipmentServiceOptionsVerifiedDelivery(),
            ShipmentServiceOptionsVerifiedDelivery::fromArray(...),
            ['SecurePINType', 'TokenValue', 'RecipientEmail'],
        ];
        yield 'ShipmentPackage' => [
            ModelFixtures::buildShipmentPackage(),
            ShipmentPackage::fromArray(...),
            ['Packaging'],
        ];
        yield 'ShipmentTradeDirect' => [
            ModelFixtures::buildShipmentTradeDirect(),
            ShipmentTradeDirect::fromArray(...),
            ['ShipmentType', 'CurrencyCode'],
        ];
        yield 'TradeDirectMaster' => [
            ModelFixtures::buildTradeDirectMaster(),
            TradeDirectMaster::fromArray(...),
            ['UomType'],
        ];
        yield 'MasterSoldTo' => [
            ModelFixtures::buildMasterSoldTo(),
            MasterSoldTo::fromArray(...),
            ['Name', 'Address', 'EmailAddress'],
        ];
        yield 'MasterPickup' => [
            ModelFixtures::buildMasterPickup(),
            MasterPickup::fromArray(...),
            ['Name', 'Address', 'EMailAddress'],
        ];
        yield 'TradeDirectPhone' => [
            ModelFixtures::buildTradeDirectPhone(),
            TradeDirectPhone::fromArray(...),
            ['Number'],
        ];
        yield 'TradeDirectAddress' => [
            ModelFixtures::buildTradeDirectAddress(),
            TradeDirectAddress::fromArray(...),
            ['AddressLine', 'City', 'CountryCode'],
        ];
        yield 'TradeDirectChild' => [
            ModelFixtures::buildTradeDirectChild(),
            TradeDirectChild::fromArray(...),
            ['USI', 'Type', 'Product', 'LtlPackage'],
        ];
        yield 'ChildProduct' => [
            ModelFixtures::buildChildProduct(),
            ChildProduct::fromArray(...),
            ['Description', 'UnitPrice', 'NumberOfUnits', 'ProductNumber', 'CountryOriginCode', 'UnitOfMeasure'],
        ];
        yield 'ChildLTLPackage' => [
            ModelFixtures::buildChildLTLPackage(),
            ChildLTLPackage::fromArray(...),
            ['NumberOfIdenticalUnits', 'HandlingUnits'],
        ];
        yield 'LTLHandlingUnits' => [
            ModelFixtures::buildLTLHandlingUnits(),
            LTLHandlingUnits::fromArray(...),
            ['Quantity', 'Type', 'FreightClass', 'Dimensions', 'PackageWeight'],
        ];
        yield 'LTLReferenceNumber' => [
            ModelFixtures::buildLTLReferenceNumber(),
            LTLReferenceNumber::fromArray(...),
            ['Code', 'Value'],
        ];
        yield 'LTLDimensions' => [
            ModelFixtures::buildLTLDimensions(),
            LTLDimensions::fromArray(...),
            ['Length', 'Width', 'Height', 'UnitOfMeasurement'],
        ];
        yield 'LTLPackageWeightType' => [
            ModelFixtures::buildLTLPackageWeightType(),
            LTLPackageWeightType::fromArray(...),
            ['Weight', 'UnitOfMeasurement'],
        ];
        yield 'LTLOtherCharges' => [
            ModelFixtures::buildLTLOtherCharges(),
            LTLOtherCharges::fromArray(...),
            ['MonetaryValue', 'ChargeDescription'],
        ];
        yield 'TradeDirectNotificationBeforeDelivery' => [
            ModelFixtures::buildTradeDirectNotificationBeforeDelivery(),
            TradeDirectNotificationBeforeDelivery::fromArray(...),
            ['EMailAddress'],
        ];
        yield 'PackagePackaging' => [
            ModelFixtures::buildPackagePackaging(),
            PackagePackaging::fromArray(...),
            ['Code'],
        ];
        yield 'PackageDimensions' => [
            ModelFixtures::buildPackageDimensions(),
            PackageDimensions::fromArray(...),
            ['UnitOfMeasurement', 'Length', 'Width', 'Height'],
        ];
        yield 'DimWeightUnitOfMeasurement' => [
            ModelFixtures::buildDimWeightUnitOfMeasurement(),
            DimWeightUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'PackagePackageWeight' => [
            ModelFixtures::buildPackagePackageWeight(),
            PackagePackageWeight::fromArray(...),
            ['UnitOfMeasurement', 'Weight'],
        ];
        yield 'PackageWeightUnitOfMeasurement' => [
            ModelFixtures::buildPackageWeightUnitOfMeasurement(),
            PackageWeightUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'PackageReferenceNumber' => [
            ModelFixtures::buildPackageReferenceNumber(),
            PackageReferenceNumber::fromArray(...),
            ['Value'],
        ];
        yield 'PackageSimpleRate' => [
            ModelFixtures::buildPackageSimpleRate(),
            PackageSimpleRate::fromArray(...),
            ['Code'],
        ];
        yield 'PackageUPSPremier' => [
            ModelFixtures::buildPackageUPSPremier(),
            PackageUPSPremier::fromArray(...),
            ['Category', 'HandlingInstructions'],
        ];
        yield 'UPSPremierHandlingInstructions' => [
            ModelFixtures::buildUPSPremierHandlingInstructions(),
            UPSPremierHandlingInstructions::fromArray(...),
            ['Instruction'],
        ];
        yield 'PackageServiceOptionsDeliveryConfirmation' => [
            ModelFixtures::buildPackageServiceOptionsDeliveryConfirmation(),
            PackageServiceOptionsDeliveryConfirmation::fromArray(...),
            ['DCISType'],
        ];
        yield 'PackageServiceOptionsDeclaredValue' => [
            ModelFixtures::buildPackageServiceOptionsDeclaredValue(),
            PackageServiceOptionsDeclaredValue::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'DeclaredValueType' => [
            ModelFixtures::buildDeclaredValueType(),
            DeclaredValueType::fromArray(...),
            ['Code'],
        ];
        yield 'PackageServiceOptionsCOD' => [
            ModelFixtures::buildPackageServiceOptionsCOD(),
            PackageServiceOptionsCOD::fromArray(...),
            ['CODFundsCode', 'CODAmount'],
        ];
        yield 'PackageServiceOptionsCODCODAmount' => [
            ModelFixtures::buildPackageServiceOptionsCODCODAmount(),
            PackageServiceOptionsCODCODAmount::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'PackageServiceOptionsAccessPointCOD' => [
            ModelFixtures::buildPackageServiceOptionsAccessPointCOD(),
            PackageServiceOptionsAccessPointCOD::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'PackageServiceOptionsNotification' => [
            ModelFixtures::buildPackageServiceOptionsNotification(),
            PackageServiceOptionsNotification::fromArray(...),
            ['NotificationCode', 'EMail'],
        ];
        yield 'PackageServiceOptionsNotificationEMail' => [
            ModelFixtures::buildPackageServiceOptionsNotificationEMail(),
            PackageServiceOptionsNotificationEMail::fromArray(...),
            ['EMailAddress'],
        ];
        yield 'PackageServiceOptionsHazMat' => [
            ModelFixtures::buildPackageServiceOptionsHazMat(),
            PackageServiceOptionsHazMat::fromArray(...),
            ['ProperShippingName', 'RegulationSet', 'TransportationMode'],
        ];
        yield 'PackageServiceOptionsDryIce' => [
            ModelFixtures::buildPackageServiceOptionsDryIce(),
            PackageServiceOptionsDryIce::fromArray(...),
            ['RegulationSet', 'DryIceWeight'],
        ];
        yield 'DryIceDryIceWeight' => [
            ModelFixtures::buildDryIceDryIceWeight(),
            DryIceDryIceWeight::fromArray(...),
            ['UnitOfMeasurement', 'Weight'],
        ];
        yield 'DryIceWeightUnitOfMeasurement' => [
            ModelFixtures::buildDryIceWeightUnitOfMeasurement(),
            DryIceWeightUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'PackageCommodity' => [
            ModelFixtures::buildPackageCommodity(),
            PackageCommodity::fromArray(...),
            ['FreightClass'],
        ];
        yield 'CommodityNMFC' => [ModelFixtures::buildCommodityNMFC(), CommodityNMFC::fromArray(...), ['PrimeCode']];
        yield 'ShipmentRequestLabelSpecification' => [
            ModelFixtures::buildShipmentRequestLabelSpecification(),
            ShipmentRequestLabelSpecification::fromArray(...),
            ['LabelImageFormat', 'LabelStockSize'],
        ];
        yield 'LabelSpecificationLabelImageFormat' => [
            ModelFixtures::buildLabelSpecificationLabelImageFormat(),
            LabelSpecificationLabelImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'LabelSpecificationLabelStockSize' => [
            ModelFixtures::buildLabelSpecificationLabelStockSize(),
            LabelSpecificationLabelStockSize::fromArray(...),
            ['Height', 'Width'],
        ];
        yield 'LabelSpecificationInstruction' => [
            ModelFixtures::buildLabelSpecificationInstruction(),
            LabelSpecificationInstruction::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentRequestReceiptSpecification' => [
            ModelFixtures::buildShipmentRequestReceiptSpecification(),
            ShipmentRequestReceiptSpecification::fromArray(...),
            ['ImageFormat'],
        ];
        yield 'ReceiptSpecificationImageFormat' => [
            ModelFixtures::buildReceiptSpecificationImageFormat(),
            ReceiptSpecificationImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentResponse' => [
            ModelFixtures::buildShipmentResponse(),
            ShipmentResponse::fromArray(...),
            ['Response', 'ShipmentResults'],
        ];
        yield 'ShipmentResponseResponse' => [
            ModelFixtures::buildShipmentResponseResponse(),
            ShipmentResponseResponse::fromArray(...),
            ['ResponseStatus'],
        ];
        yield 'ResponseResponseStatus' => [
            ModelFixtures::buildResponseResponseStatus(),
            ResponseResponseStatus::fromArray(...),
            ['Code', 'Description'],
        ];
        yield 'ResponseAlert' => [
            ModelFixtures::buildResponseAlert(),
            ResponseAlert::fromArray(...),
            ['Code', 'Description'],
        ];
        yield 'ShipmentResponseShipmentResults' => [
            ModelFixtures::buildShipmentResponseShipmentResults(),
            ShipmentResponseShipmentResults::fromArray(...),
            ['BillingWeight'],
        ];
        yield 'ShipmentResultsDisclaimer' => [
            ModelFixtures::buildShipmentResultsDisclaimer(),
            ShipmentResultsDisclaimer::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentResultsShipmentCharges' => [
            ModelFixtures::buildShipmentResultsShipmentCharges(),
            ShipmentResultsShipmentCharges::fromArray(...),
            ['TransportationCharges', 'ServiceOptionsCharges', 'TotalCharges'],
        ];
        yield 'ShipmentChargesBaseServiceCharge' => [
            ModelFixtures::buildShipmentChargesBaseServiceCharge(),
            ShipmentChargesBaseServiceCharge::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'ShipmentChargesTransportationCharges' => [
            ModelFixtures::buildShipmentChargesTransportationCharges(),
            ShipmentChargesTransportationCharges::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'ShipmentChargesItemizedCharges' => [
            ModelFixtures::buildShipmentChargesItemizedCharges(),
            ShipmentChargesItemizedCharges::fromArray(...),
            ['Code', 'CurrencyCode', 'MonetaryValue'],
        ];
        yield 'ShipmentChargesServiceOptionsCharges' => [
            ModelFixtures::buildShipmentChargesServiceOptionsCharges(),
            ShipmentChargesServiceOptionsCharges::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'ShipmentChargesTaxCharges' => [
            ModelFixtures::buildShipmentChargesTaxCharges(),
            ShipmentChargesTaxCharges::fromArray(...),
            ['Type', 'MonetaryValue'],
        ];
        yield 'ShipmentChargesTotalCharges' => [
            ModelFixtures::buildShipmentChargesTotalCharges(),
            ShipmentChargesTotalCharges::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'ShipmentChargesTotalChargesWithTaxes' => [
            ModelFixtures::buildShipmentChargesTotalChargesWithTaxes(),
            ShipmentChargesTotalChargesWithTaxes::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'NegotiatedRateChargesItemizedCharges' => [
            ModelFixtures::buildNegotiatedRateChargesItemizedCharges(),
            NegotiatedRateChargesItemizedCharges::fromArray(...),
            ['Code', 'CurrencyCode', 'MonetaryValue'],
        ];
        yield 'NegotiatedRateChargesTaxCharges' => [
            ModelFixtures::buildNegotiatedRateChargesTaxCharges(),
            NegotiatedRateChargesTaxCharges::fromArray(...),
            ['Type', 'MonetaryValue'],
        ];
        yield 'NegotiatedRateChargesTotalCharge' => [
            ModelFixtures::buildNegotiatedRateChargesTotalCharge(),
            NegotiatedRateChargesTotalCharge::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'NegotiatedRateChargesRateModifier' => [
            ModelFixtures::buildNegotiatedRateChargesRateModifier(),
            NegotiatedRateChargesRateModifier::fromArray(...),
            ['ModifierType', 'ModifierDesc', 'Amount'],
        ];
        yield 'NegotiatedRateChargesTotalChargesWithTaxes' => [
            ModelFixtures::buildNegotiatedRateChargesTotalChargesWithTaxes(),
            NegotiatedRateChargesTotalChargesWithTaxes::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'ShipmentResultsFRSShipmentData' => [
            ModelFixtures::buildShipmentResultsFRSShipmentData(),
            ShipmentResultsFRSShipmentData::fromArray(...),
            ['TransportationCharges'],
        ];
        yield 'FRSShipmentDataTransportationCharges' => [
            ModelFixtures::buildFRSShipmentDataTransportationCharges(),
            FRSShipmentDataTransportationCharges::fromArray(...),
            ['GrossCharge', 'DiscountAmount', 'DiscountPercentage', 'NetCharge'],
        ];
        yield 'TransportationChargesGrossCharge' => [
            ModelFixtures::buildTransportationChargesGrossCharge(),
            TransportationChargesGrossCharge::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'TransportationChargesDiscountAmount' => [
            ModelFixtures::buildTransportationChargesDiscountAmount(),
            TransportationChargesDiscountAmount::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'TransportationChargesNetCharge' => [
            ModelFixtures::buildTransportationChargesNetCharge(),
            TransportationChargesNetCharge::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'FRSShipmentDataFreightDensityRate' => [
            ModelFixtures::buildFRSShipmentDataFreightDensityRate(),
            FRSShipmentDataFreightDensityRate::fromArray(...),
            ['Density', 'TotalCubicFeet'],
        ];
        yield 'FRSShipmentDataHandlingUnits' => [
            ModelFixtures::buildFRSShipmentDataHandlingUnits(),
            FRSShipmentDataHandlingUnits::fromArray(...),
            ['Quantity', 'Type', 'Dimensions'],
        ];
        yield 'HandlingUnitsAdjustedHeight' => [
            ModelFixtures::buildHandlingUnitsAdjustedHeight(),
            HandlingUnitsAdjustedHeight::fromArray(...),
            ['Value', 'UnitOfMeasurement'],
        ];
        yield 'ShipmentResultsBillingWeight' => [
            ModelFixtures::buildShipmentResultsBillingWeight(),
            ShipmentResultsBillingWeight::fromArray(...),
            ['UnitOfMeasurement', 'Weight'],
        ];
        yield 'BillingWeightUnitOfMeasurement' => [
            ModelFixtures::buildBillingWeightUnitOfMeasurement(),
            BillingWeightUnitOfMeasurement::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentResultsPackageResults' => [
            ModelFixtures::buildShipmentResultsPackageResults(),
            ShipmentResultsPackageResults::fromArray(...),
            ['TrackingNumber'],
        ];
        yield 'PackageResultsBaseServiceCharge' => [
            ModelFixtures::buildPackageResultsBaseServiceCharge(),
            PackageResultsBaseServiceCharge::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'PackageResultsServiceOptionsCharges' => [
            ModelFixtures::buildPackageResultsServiceOptionsCharges(),
            PackageResultsServiceOptionsCharges::fromArray(...),
            ['CurrencyCode', 'MonetaryValue'],
        ];
        yield 'PackageResultsShippingLabel' => [
            ModelFixtures::buildPackageResultsShippingLabel(),
            PackageResultsShippingLabel::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'ShippingLabelImageFormat' => [
            ModelFixtures::buildShippingLabelImageFormat(),
            ShippingLabelImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'PackageResultsShippingReceipt' => [
            ModelFixtures::buildPackageResultsShippingReceipt(),
            PackageResultsShippingReceipt::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'ShippingReceiptImageFormat' => [
            ModelFixtures::buildShippingReceiptImageFormat(),
            ShippingReceiptImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'PackageResultsAccessorial' => [
            ModelFixtures::buildPackageResultsAccessorial(),
            PackageResultsAccessorial::fromArray(...),
            ['Code'],
        ];
        yield 'PackageResultsSimpleRate' => [
            ModelFixtures::buildPackageResultsSimpleRate(),
            PackageResultsSimpleRate::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentResultsFormImage' => [
            ModelFixtures::buildShipmentResultsFormImage(),
            ShipmentResultsFormImage::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'FormImage' => [
            ModelFixtures::buildFormImage(),
            FormImage::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'HighValueReportImageImageFormat' => [
            ModelFixtures::buildHighValueReportImageImageFormat(),
            HighValueReportImageImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'CODTurnInPageImageImageFormat' => [
            ModelFixtures::buildCODTurnInPageImageImageFormat(),
            CODTurnInPageImageImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentResultsImageImageFormat' => [
            ModelFixtures::buildShipmentResultsImageImageFormat(),
            ShipmentResultsImageImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'ImageImageFormat' => [
            ModelFixtures::buildImageImageFormat(),
            ImageImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'PackageResultsItemizedCharges' => [
            ModelFixtures::buildPackageResultsItemizedCharges(),
            PackageResultsItemizedCharges::fromArray(...),
            ['Code', 'CurrencyCode', 'MonetaryValue'],
        ];
        yield 'NegotiatedChargesItemizedCharges' => [
            ModelFixtures::buildNegotiatedChargesItemizedCharges(),
            NegotiatedChargesItemizedCharges::fromArray(...),
            ['Code', 'CurrencyCode', 'MonetaryValue'],
        ];
        yield 'NegotiatedChargesRateModifier' => [
            ModelFixtures::buildNegotiatedChargesRateModifier(),
            NegotiatedChargesRateModifier::fromArray(...),
            ['ModifierType', 'ModifierDesc', 'Amount'],
        ];
        yield 'PackageResultsRateModifier' => [
            ModelFixtures::buildPackageResultsRateModifier(),
            PackageResultsRateModifier::fromArray(...),
            ['ModifierType', 'ModifierDesc', 'Amount'],
        ];
        yield 'ShipmentResultsControlLogReceipt' => [
            ModelFixtures::buildShipmentResultsControlLogReceipt(),
            ShipmentResultsControlLogReceipt::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'ControlLogReceiptImageFormat' => [
            ModelFixtures::buildControlLogReceiptImageFormat(),
            ControlLogReceiptImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'ShipmentResultsCODTurnInPage' => [
            ModelFixtures::buildShipmentResultsCODTurnInPage(),
            ShipmentResultsCODTurnInPage::fromArray(...),
            ['Image'],
        ];
        yield 'CODTurnInPageImage' => [
            ModelFixtures::buildCODTurnInPageImage(),
            CODTurnInPageImage::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'ShipmentResultsHighValueReport' => [
            ModelFixtures::buildShipmentResultsHighValueReport(),
            ShipmentResultsHighValueReport::fromArray(...),
            ['Image'],
        ];
        yield 'HighValueReportImage' => [
            ModelFixtures::buildHighValueReportImage(),
            HighValueReportImage::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'VOIDSHIPMENTRequestWrapper' => [
            ModelFixtures::buildVOIDSHIPMENTRequestWrapper(),
            VOIDSHIPMENTRequestWrapper::fromArray(...),
            ['VoidShipmentRequest'],
        ];
        yield 'VOIDSHIPMENTResponseWrapper' => [
            ModelFixtures::buildVOIDSHIPMENTResponseWrapper(),
            VOIDSHIPMENTResponseWrapper::fromArray(...),
            ['VoidShipmentResponse'],
        ];
        yield 'VoidShipmentRequest' => [
            ModelFixtures::buildVoidShipmentRequest(),
            VoidShipmentRequest::fromArray(...),
            ['Request', 'VoidShipment'],
        ];
        yield 'VoidShipmentRequestVoidShipment' => [
            ModelFixtures::buildVoidShipmentRequestVoidShipment(),
            VoidShipmentRequestVoidShipment::fromArray(...),
            ['ShipmentIdentificationNumber'],
        ];
        yield 'VoidShipmentResponse' => [
            ModelFixtures::buildVoidShipmentResponse(),
            VoidShipmentResponse::fromArray(...),
            ['Response', 'SummaryResult'],
        ];
        yield 'VoidShipmentResponseResponse' => [
            ModelFixtures::buildVoidShipmentResponseResponse(),
            VoidShipmentResponseResponse::fromArray(...),
            ['ResponseStatus'],
        ];
        yield 'VoidResponseResponseStatus' => [
            ModelFixtures::buildVoidResponseResponseStatus(),
            VoidResponseResponseStatus::fromArray(...),
            ['Code', 'Description'],
        ];
        yield 'VoidShipmentResponseSummaryResult' => [
            ModelFixtures::buildVoidShipmentResponseSummaryResult(),
            VoidShipmentResponseSummaryResult::fromArray(...),
            ['Status'],
        ];
        yield 'SummaryResultStatus' => [
            ModelFixtures::buildSummaryResultStatus(),
            SummaryResultStatus::fromArray(...),
            ['Code', 'Description'],
        ];
        yield 'VoidShipmentResponsePackageLevelResults' => [
            ModelFixtures::buildVoidShipmentResponsePackageLevelResults(),
            VoidShipmentResponsePackageLevelResults::fromArray(...),
            ['TrackingNumber', 'Status'],
        ];
        yield 'PackageLevelResultsStatus' => [
            ModelFixtures::buildPackageLevelResultsStatus(),
            PackageLevelResultsStatus::fromArray(...),
            ['Code', 'Description'],
        ];
        yield 'LABELRECOVERYRequestWrapper' => [
            ModelFixtures::buildLABELRECOVERYRequestWrapper(),
            LABELRECOVERYRequestWrapper::fromArray(...),
            ['LabelRecoveryRequest'],
        ];
        yield 'LABELRECOVERYResponseWrapper' => [
            ModelFixtures::buildLABELRECOVERYResponseWrapper(),
            LABELRECOVERYResponseWrapper::fromArray(...),
            ['LabelRecoveryResponse'],
        ];
        yield 'LabelRecoveryRequest' => [
            ModelFixtures::buildLabelRecoveryRequest(),
            LabelRecoveryRequest::fromArray(...),
            ['Request', 'TrackingNumbers', 'ReferenceValues'],
        ];
        yield 'LabelRecoveryLabelSpecificationLabelImageFormat' => [
            ModelFixtures::buildLabelRecoveryLabelSpecificationLabelImageFormat(),
            LabelRecoveryLabelSpecificationLabelImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'LabelRecoveryLabelSpecificationLabelStockSize' => [
            ModelFixtures::buildLabelRecoveryLabelSpecificationLabelStockSize(),
            LabelRecoveryLabelSpecificationLabelStockSize::fromArray(...),
            ['Height', 'Width'],
        ];
        yield 'LabelRecoveryRequestTranslate' => [
            ModelFixtures::buildLabelRecoveryRequestTranslate(),
            LabelRecoveryRequestTranslate::fromArray(...),
            ['LanguageCode', 'DialectCode', 'Code'],
        ];
        yield 'LabelRecoveryRequestReferenceValues' => [
            ModelFixtures::buildLabelRecoveryRequestReferenceValues(),
            LabelRecoveryRequestReferenceValues::fromArray(...),
            ['ReferenceNumber', 'ShipperNumber'],
        ];
        yield 'ReferenceValuesReferenceNumber' => [
            ModelFixtures::buildReferenceValuesReferenceNumber(),
            ReferenceValuesReferenceNumber::fromArray(...),
            ['Value'],
        ];
        yield 'LabelRecoveryRequestUPSPremiumCareForm' => [
            ModelFixtures::buildLabelRecoveryRequestUPSPremiumCareForm(),
            LabelRecoveryRequestUPSPremiumCareForm::fromArray(...),
            ['PageSize', 'PrintType'],
        ];
        yield 'LabelRecoveryResponse' => [
            ModelFixtures::buildLabelRecoveryResponse(),
            LabelRecoveryResponse::fromArray(...),
            ['Response', 'LabelResults'],
        ];
        yield 'LabelRecoveryResponseResponse' => [
            ModelFixtures::buildLabelRecoveryResponseResponse(),
            LabelRecoveryResponseResponse::fromArray(...),
            ['ResponseStatus'],
        ];
        yield 'LRResponseResponseStatus' => [
            ModelFixtures::buildLRResponseResponseStatus(),
            LRResponseResponseStatus::fromArray(...),
            ['Code', 'Description'],
        ];
        yield 'LabelResultsLabelImage' => [
            ModelFixtures::buildLabelResultsLabelImage(),
            LabelResultsLabelImage::fromArray(...),
            ['LabelImageFormat', 'GraphicImage'],
        ];
        yield 'LabelImageLabelImageFormat' => [
            ModelFixtures::buildLabelImageLabelImageFormat(),
            LabelImageLabelImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'LabelResultsMailInnovationsLabelImage' => [
            ModelFixtures::buildLabelResultsMailInnovationsLabelImage(),
            LabelResultsMailInnovationsLabelImage::fromArray(...),
            ['LabelImageFormat', 'GraphicImage'],
        ];
        yield 'MailInnovationsLabelImageLabelImageFormat' => [
            ModelFixtures::buildMailInnovationsLabelImageLabelImageFormat(),
            MailInnovationsLabelImageLabelImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'ReceiptImage' => [
            ModelFixtures::buildReceiptImage(),
            ReceiptImage::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'ReceiptImageImageFormat' => [
            ModelFixtures::buildReceiptImageImageFormat(),
            ReceiptImageImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'LabelResultsForm' => [
            ModelFixtures::buildLabelResultsForm(),
            LabelResultsForm::fromArray(...),
            ['Image'],
        ];
        yield 'LRFormImage' => [
            ModelFixtures::buildLRFormImage(),
            LRFormImage::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'LabelRecoveryResponseCODTurnInPage' => [
            ModelFixtures::buildLabelRecoveryResponseCODTurnInPage(),
            LabelRecoveryResponseCODTurnInPage::fromArray(...),
            ['Image'],
        ];
        yield 'LRCODTurnInPageImage' => [
            ModelFixtures::buildLRCODTurnInPageImage(),
            LRCODTurnInPageImage::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'LRCODTurnInPageImageImageFormat' => [
            ModelFixtures::buildLRCODTurnInPageImageImageFormat(),
            LRCODTurnInPageImageImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'LabelRecoveryResponseForm' => [
            ModelFixtures::buildLabelRecoveryResponseForm(),
            LabelRecoveryResponseForm::fromArray(...),
            ['Image'],
        ];
        yield 'LabelRecoveryFormImage' => [
            ModelFixtures::buildLabelRecoveryFormImage(),
            LabelRecoveryFormImage::fromArray(...),
            ['ImageFormat', 'GraphicImage'],
        ];
        yield 'LabelRecoveryImageImageFormat' => [
            ModelFixtures::buildLabelRecoveryImageImageFormat(),
            LabelRecoveryImageImageFormat::fromArray(...),
            ['Code'],
        ];
        yield 'LabelRecoveryResponseHighValueReport' => [
            ModelFixtures::buildLabelRecoveryResponseHighValueReport(),
            LabelRecoveryResponseHighValueReport::fromArray(...),
            ['Image'],
        ];
        yield 'LabelRecoveryResponseTrackingCandidate' => [
            ModelFixtures::buildLabelRecoveryResponseTrackingCandidate(),
            LabelRecoveryResponseTrackingCandidate::fromArray(...),
            ['TrackingNumber'],
        ];
        yield 'TrackingCandidatePickupDateRange' => [
            ModelFixtures::buildTrackingCandidatePickupDateRange(),
            TrackingCandidatePickupDateRange::fromArray(...),
            ['BeginDate', 'EndDate'],
        ];
        yield 'GlobalTaxInformationAgentTaxIdentificationNumber' => [
            ModelFixtures::buildGlobalTaxInformationAgentTaxIdentificationNumber(),
            GlobalTaxInformationAgentTaxIdentificationNumber::fromArray(...),
            ['AgentRole'],
        ];
        yield 'AgentTaxIdentificationNumberTaxIdentificationNumber' => [
            ModelFixtures::buildAgentTaxIdentificationNumberTaxIdentificationNumber(),
            AgentTaxIdentificationNumberTaxIdentificationNumber::fromArray(...),
            [
                'IdentificationNumber',
                'IDNumberCustomerRole',
                'IDNumberEncryptionIndicator',
                'IDNumberPurposeCode',
                'IDNumberTypeCode',
            ],
        ];
    }

    /**
     * Each model with, per wire name, a value of a type that property cannot hold.
     *
     * Only properties whose type is a single closed shape appear. A union may legitimately accept
     * what looks like the wrong type, and a schema stating no type accepts anything.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel, array<array-key, int|string>}>
     */
    public static function documentsWithAMistypedProperty(): iterable
    {
        yield 'SHIPRequestWrapper' => [
            ModelFixtures::buildSHIPRequestWrapper(),
            SHIPRequestWrapper::fromArray(...),
            ['ShipmentRequest' => 'not-an-object'],
        ];
        yield 'SHIPResponseWrapper' => [
            ModelFixtures::buildSHIPResponseWrapper(),
            SHIPResponseWrapper::fromArray(...),
            ['ShipmentResponse' => 'not-an-object'],
        ];
        yield 'ShipmentRequest' => [
            ModelFixtures::buildShipmentRequest(),
            ShipmentRequest::fromArray(...),
            ['Request' => 'not-an-object', 'Shipment' => 'not-an-object'],
        ];
        yield 'AddressPOE' => [
            ModelFixtures::buildAddressPOE(),
            AddressPOE::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'ShipmentWorldEase' => [
            ModelFixtures::buildShipmentWorldEase(),
            ShipmentWorldEase::fromArray(...),
            ['DestinationCountryCode' => 42, 'MasterShipmentChgType' => 42, 'PortOfEntry' => 'not-an-object'],
        ];
        yield 'ShipmentWorldEasePortOfEntry' => [
            ModelFixtures::buildShipmentWorldEasePortOfEntry(),
            ShipmentWorldEasePortOfEntry::fromArray(...),
            ['Name' => 42, 'ClearancePortCode' => 42, 'Consignee' => 42, 'Address' => 'not-an-object'],
        ];
        yield 'ShipmentRequestRequest' => [
            ModelFixtures::buildShipmentRequestRequest(),
            ShipmentRequestRequest::fromArray(...),
            ['RequestOption' => 42],
        ];
        yield 'ShipmentRequestShipment' => [
            ModelFixtures::buildShipmentRequestShipment(),
            ShipmentRequestShipment::fromArray(...),
            [
                'Shipper' => 'not-an-object',
                'ShipTo' => 'not-an-object',
                'Service' => 'not-an-object',
                'Package' => 'not-an-object',
            ],
        ];
        yield 'ShipmentReturnService' => [
            ModelFixtures::buildShipmentReturnService(),
            ShipmentReturnService::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentShipper' => [
            ModelFixtures::buildShipmentShipper(),
            ShipmentShipper::fromArray(...),
            ['Name' => 42, 'ShipperNumber' => 42, 'Address' => 'not-an-object'],
        ];
        yield 'ShipperPhone' => [ModelFixtures::buildShipperPhone(), ShipperPhone::fromArray(...), ['Number' => 42]];
        yield 'ShipperAddress' => [
            ModelFixtures::buildShipperAddress(),
            ShipperAddress::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'ShipmentShipTo' => [
            ModelFixtures::buildShipmentShipTo(),
            ShipmentShipTo::fromArray(...),
            ['Name' => 42, 'Address' => 'not-an-object'],
        ];
        yield 'ShipToPhone' => [ModelFixtures::buildShipToPhone(), ShipToPhone::fromArray(...), ['Number' => 42]];
        yield 'ShipToAddress' => [
            ModelFixtures::buildShipToAddress(),
            ShipToAddress::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'ShipmentAlternateDeliveryAddress' => [
            ModelFixtures::buildShipmentAlternateDeliveryAddress(),
            ShipmentAlternateDeliveryAddress::fromArray(...),
            ['Name' => 42, 'AttentionName' => 42, 'Address' => 'not-an-object'],
        ];
        yield 'AlternateDeliveryAddressAddress' => [
            ModelFixtures::buildAlternateDeliveryAddressAddress(),
            AlternateDeliveryAddressAddress::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'ShipmentShipFrom' => [
            ModelFixtures::buildShipmentShipFrom(),
            ShipmentShipFrom::fromArray(...),
            ['Name' => 42, 'Address' => 'not-an-object'],
        ];
        yield 'ShipFromTaxIDType' => [
            ModelFixtures::buildShipFromTaxIDType(),
            ShipFromTaxIDType::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipFromPhone' => [ModelFixtures::buildShipFromPhone(), ShipFromPhone::fromArray(...), ['Number' => 42]];
        yield 'ShipFromAddress' => [
            ModelFixtures::buildShipFromAddress(),
            ShipFromAddress::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'ShipFromVendorInfo' => [
            ModelFixtures::buildShipFromVendorInfo(),
            ShipFromVendorInfo::fromArray(...),
            ['VendorCollectIDTypeCode' => 42, 'VendorCollectIDNumber' => 42],
        ];
        yield 'ShipmentPaymentInformation' => [
            ModelFixtures::buildShipmentPaymentInformation(),
            ShipmentPaymentInformation::fromArray(...),
            ['ShipmentCharge' => 'not-an-object'],
        ];
        yield 'PaymentInformationShipmentCharge' => [
            ModelFixtures::buildPaymentInformationShipmentCharge(),
            PaymentInformationShipmentCharge::fromArray(...),
            ['Type' => 42],
        ];
        yield 'BillShipperCreditCard' => [
            ModelFixtures::buildBillShipperCreditCard(),
            BillShipperCreditCard::fromArray(...),
            ['Type' => 42, 'Number' => 42, 'ExpirationDate' => 42, 'SecurityCode' => 42],
        ];
        yield 'CreditCardAddress' => [
            ModelFixtures::buildCreditCardAddress(),
            CreditCardAddress::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'ShipmentChargeBillReceiver' => [
            ModelFixtures::buildShipmentChargeBillReceiver(),
            ShipmentChargeBillReceiver::fromArray(...),
            ['AccountNumber' => 42],
        ];
        yield 'ShipmentChargeBillThirdParty' => [
            ModelFixtures::buildShipmentChargeBillThirdParty(),
            ShipmentChargeBillThirdParty::fromArray(...),
            ['Address' => 'not-an-object'],
        ];
        yield 'BillThirdPartyAddress' => [
            ModelFixtures::buildBillThirdPartyAddress(),
            BillThirdPartyAddress::fromArray(...),
            ['CountryCode' => 42],
        ];
        yield 'ShipmentFRSPaymentInformation' => [
            ModelFixtures::buildShipmentFRSPaymentInformation(),
            ShipmentFRSPaymentInformation::fromArray(...),
            ['Type' => 'not-an-object', 'AccountNumber' => 42],
        ];
        yield 'FRSPaymentInformationType' => [
            ModelFixtures::buildFRSPaymentInformationType(),
            FRSPaymentInformationType::fromArray(...),
            ['Code' => 42],
        ];
        yield 'FRSPaymentInformationAddress' => [
            ModelFixtures::buildFRSPaymentInformationAddress(),
            FRSPaymentInformationAddress::fromArray(...),
            ['CountryCode' => 42],
        ];
        yield 'FreightDensityInfoAdjustedHeight' => [
            ModelFixtures::buildFreightDensityInfoAdjustedHeight(),
            FreightDensityInfoAdjustedHeight::fromArray(...),
            ['Value' => 42, 'UnitOfMeasurement' => 'not-an-object'],
        ];
        yield 'AdjustedHeightUnitOfMeasurement' => [
            ModelFixtures::buildAdjustedHeightUnitOfMeasurement(),
            AdjustedHeightUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'FreightDensityInfoHandlingUnits' => [
            ModelFixtures::buildFreightDensityInfoHandlingUnits(),
            FreightDensityInfoHandlingUnits::fromArray(...),
            ['Quantity' => 42, 'Type' => 'not-an-object', 'Dimensions' => 'not-an-object'],
        ];
        yield 'HandlingUnitsType' => [
            ModelFixtures::buildHandlingUnitsType(),
            HandlingUnitsType::fromArray(...),
            ['Code' => 42],
        ];
        yield 'HandlingUnitsDimensions' => [
            ModelFixtures::buildHandlingUnitsDimensions(),
            HandlingUnitsDimensions::fromArray(...),
            ['UnitOfMeasurement' => 'not-an-object', 'Length' => 42, 'Width' => 42, 'Height' => 42],
        ];
        yield 'HandlingUnitsUnitOfMeasurement' => [
            ModelFixtures::buildHandlingUnitsUnitOfMeasurement(),
            HandlingUnitsUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentPromotionalDiscountInformation' => [
            ModelFixtures::buildShipmentPromotionalDiscountInformation(),
            ShipmentPromotionalDiscountInformation::fromArray(...),
            ['PromoCode' => 42, 'PromoAliasCode' => 42],
        ];
        yield 'ShipmentReferenceNumber' => [
            ModelFixtures::buildShipmentReferenceNumber(),
            ShipmentReferenceNumber::fromArray(...),
            ['Value' => 42],
        ];
        yield 'ShipmentService' => [
            ModelFixtures::buildShipmentService(),
            ShipmentService::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentInvoiceLineTotal' => [
            ModelFixtures::buildShipmentInvoiceLineTotal(),
            ShipmentInvoiceLineTotal::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'ShipmentShipmentIndicationType' => [
            ModelFixtures::buildShipmentShipmentIndicationType(),
            ShipmentShipmentIndicationType::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentServiceOptionsCOD' => [
            ModelFixtures::buildShipmentServiceOptionsCOD(),
            ShipmentServiceOptionsCOD::fromArray(...),
            ['CODFundsCode' => 42, 'CODAmount' => 'not-an-object'],
        ];
        yield 'CODCODAmount' => [
            ModelFixtures::buildCODCODAmount(),
            CODCODAmount::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'ShipmentServiceOptionsAccessPointCOD' => [
            ModelFixtures::buildShipmentServiceOptionsAccessPointCOD(),
            ShipmentServiceOptionsAccessPointCOD::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'ShipmentServiceOptionsNotification' => [
            ModelFixtures::buildShipmentServiceOptionsNotification(),
            ShipmentServiceOptionsNotification::fromArray(...),
            ['NotificationCode' => 42, 'EMail' => 'not-an-object'],
        ];
        yield 'NotificationEMail' => [
            ModelFixtures::buildNotificationEMail(),
            NotificationEMail::fromArray(...),
            ['EMailAddress' => 'not-an-object'],
        ];
        yield 'NotificationVoiceMessage' => [
            ModelFixtures::buildNotificationVoiceMessage(),
            NotificationVoiceMessage::fromArray(...),
            ['PhoneNumber' => 42],
        ];
        yield 'NotificationTextMessage' => [
            ModelFixtures::buildNotificationTextMessage(),
            NotificationTextMessage::fromArray(...),
            ['PhoneNumber' => 42],
        ];
        yield 'NotificationLocale' => [
            ModelFixtures::buildNotificationLocale(),
            NotificationLocale::fromArray(...),
            ['Language' => 42, 'Dialect' => 42],
        ];
        yield 'LabelDeliveryEMail' => [
            ModelFixtures::buildLabelDeliveryEMail(),
            LabelDeliveryEMail::fromArray(...),
            ['EMailAddress' => 42],
        ];
        yield 'ShipmentServiceOptionsInternationalForms' => [
            ModelFixtures::buildShipmentServiceOptionsInternationalForms(),
            ShipmentServiceOptionsInternationalForms::fromArray(...),
            ['FormType' => 'not-an-object', 'Product' => 'not-an-object'],
        ];
        yield 'InternationalFormsUserCreatedForm' => [
            ModelFixtures::buildInternationalFormsUserCreatedForm(),
            InternationalFormsUserCreatedForm::fromArray(...),
            ['DocumentID' => 'not-an-object'],
        ];
        yield 'InternationalFormsUPSPremiumCareForm' => [
            ModelFixtures::buildInternationalFormsUPSPremiumCareForm(),
            InternationalFormsUPSPremiumCareForm::fromArray(...),
            [
                'ShipmentDate' => 42,
                'PageSize' => 42,
                'PrintType' => 42,
                'NumOfCopies' => 42,
                'LanguageForUPSPremiumCare' => 'not-an-object',
            ],
        ];
        yield 'UPSPremiumCareFormLanguageForUPSPremiumCare' => [
            ModelFixtures::buildUPSPremiumCareFormLanguageForUPSPremiumCare(),
            UPSPremiumCareFormLanguageForUPSPremiumCare::fromArray(...),
            ['Language' => 'not-an-object'],
        ];
        yield 'InternationalFormsCN22Form' => [
            ModelFixtures::buildInternationalFormsCN22Form(),
            InternationalFormsCN22Form::fromArray(...),
            [
                'LabelSize' => 42,
                'PrintsPerPage' => 42,
                'LabelPrintType' => 42,
                'CN22Type' => 42,
                'CN22Content' => 'not-an-object',
            ],
        ];
        yield 'CN22FormCN22Content' => [
            ModelFixtures::buildCN22FormCN22Content(),
            CN22FormCN22Content::fromArray(...),
            [
                'CN22ContentQuantity' => 42,
                'CN22ContentDescription' => 42,
                'CN22ContentWeight' => 'not-an-object',
                'CN22ContentTotalValue' => 42,
                'CN22ContentCurrencyCode' => 42,
            ],
        ];
        yield 'CN22ContentCN22ContentWeight' => [
            ModelFixtures::buildCN22ContentCN22ContentWeight(),
            CN22ContentCN22ContentWeight::fromArray(...),
            ['UnitOfMeasurement' => 'not-an-object', 'Weight' => 42],
        ];
        yield 'CN22ContentWeightUnitOfMeasurement' => [
            ModelFixtures::buildCN22ContentWeightUnitOfMeasurement(),
            CN22ContentWeightUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'InternationalFormsEEIFilingOption' => [
            ModelFixtures::buildInternationalFormsEEIFilingOption(),
            InternationalFormsEEIFilingOption::fromArray(...),
            ['Code' => 42],
        ];
        yield 'EEIFilingOptionUPSFiled' => [
            ModelFixtures::buildEEIFilingOptionUPSFiled(),
            EEIFilingOptionUPSFiled::fromArray(...),
            ['POA' => 'not-an-object'],
        ];
        yield 'UPSFiledPOA' => [ModelFixtures::buildUPSFiledPOA(), UPSFiledPOA::fromArray(...), ['Code' => 42]];
        yield 'EEIFilingOptionShipperFiled' => [
            ModelFixtures::buildEEIFilingOptionShipperFiled(),
            EEIFilingOptionShipperFiled::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ContactsForwardAgent' => [
            ModelFixtures::buildContactsForwardAgent(),
            ContactsForwardAgent::fromArray(...),
            ['CompanyName' => 42, 'TaxIdentificationNumber' => 42, 'Address' => 'not-an-object'],
        ];
        yield 'ForwardAgentAddress' => [
            ModelFixtures::buildForwardAgentAddress(),
            ForwardAgentAddress::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'ContactsUltimateConsignee' => [
            ModelFixtures::buildContactsUltimateConsignee(),
            ContactsUltimateConsignee::fromArray(...),
            ['CompanyName' => 42, 'Address' => 'not-an-object'],
        ];
        yield 'UltimateConsigneeAddress' => [
            ModelFixtures::buildUltimateConsigneeAddress(),
            UltimateConsigneeAddress::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'UltimateConsigneeUltimateConsigneeType' => [
            ModelFixtures::buildUltimateConsigneeUltimateConsigneeType(),
            UltimateConsigneeUltimateConsigneeType::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ContactsIntermediateConsignee' => [
            ModelFixtures::buildContactsIntermediateConsignee(),
            ContactsIntermediateConsignee::fromArray(...),
            ['CompanyName' => 42, 'Address' => 'not-an-object'],
        ];
        yield 'IntermediateConsigneeAddress' => [
            ModelFixtures::buildIntermediateConsigneeAddress(),
            IntermediateConsigneeAddress::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'ProducerAddress' => [
            ModelFixtures::buildProducerAddress(),
            ProducerAddress::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'ProducerPhone' => [ModelFixtures::buildProducerPhone(), ProducerPhone::fromArray(...), ['Number' => 42]];
        yield 'ContactsSoldTo' => [
            ModelFixtures::buildContactsSoldTo(),
            ContactsSoldTo::fromArray(...),
            ['Name' => 42, 'AttentionName' => 42, 'Address' => 'not-an-object'],
        ];
        yield 'SoldToPhone' => [ModelFixtures::buildSoldToPhone(), SoldToPhone::fromArray(...), ['Number' => 42]];
        yield 'SoldToAddress' => [
            ModelFixtures::buildSoldToAddress(),
            SoldToAddress::fromArray(...),
            ['AddressLine' => 'not-an-object', 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'InternationalFormsProduct' => [
            ModelFixtures::buildInternationalFormsProduct(),
            InternationalFormsProduct::fromArray(...),
            ['Description' => 'not-an-object'],
        ];
        yield 'ProductUnit' => [
            ModelFixtures::buildProductUnit(),
            ProductUnit::fromArray(...),
            ['Number' => 42, 'UnitOfMeasurement' => 'not-an-object', 'Value' => 42],
        ];
        yield 'UnitUnitOfMeasurement' => [
            ModelFixtures::buildUnitUnitOfMeasurement(),
            UnitUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ProductNetCostDateRange' => [
            ModelFixtures::buildProductNetCostDateRange(),
            ProductNetCostDateRange::fromArray(...),
            ['BeginDate' => 42, 'EndDate' => 42],
        ];
        yield 'ProductProductWeight' => [
            ModelFixtures::buildProductProductWeight(),
            ProductProductWeight::fromArray(...),
            ['UnitOfMeasurement' => 'not-an-object', 'Weight' => 42],
        ];
        yield 'ProductWeightUnitOfMeasurement' => [
            ModelFixtures::buildProductWeightUnitOfMeasurement(),
            ProductWeightUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ProductScheduleB' => [
            ModelFixtures::buildProductScheduleB(),
            ProductScheduleB::fromArray(...),
            ['Number' => 42, 'UnitOfMeasurement' => 'not-an-object'],
        ];
        yield 'ScheduleBUnitOfMeasurement' => [
            ModelFixtures::buildScheduleBUnitOfMeasurement(),
            ScheduleBUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ProductExcludeFromForm' => [
            ModelFixtures::buildProductExcludeFromForm(),
            ProductExcludeFromForm::fromArray(...),
            ['FormType' => 'not-an-object'],
        ];
        yield 'ProductPackingListInfo' => [
            ModelFixtures::buildProductPackingListInfo(),
            ProductPackingListInfo::fromArray(...),
            ['PackageAssociated' => 'not-an-object'],
        ];
        yield 'PackingListInfoPackageAssociated' => [
            ModelFixtures::buildPackingListInfoPackageAssociated(),
            PackingListInfoPackageAssociated::fromArray(...),
            ['PackageNumber' => 42, 'ProductAmount' => 42],
        ];
        yield 'DDTCInformationUnitOfMeasurement' => [
            ModelFixtures::buildDDTCInformationUnitOfMeasurement(),
            DDTCInformationUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'InternationalFormsDiscount' => [
            ModelFixtures::buildInternationalFormsDiscount(),
            InternationalFormsDiscount::fromArray(...),
            ['MonetaryValue' => 42],
        ];
        yield 'InternationalFormsFreightCharges' => [
            ModelFixtures::buildInternationalFormsFreightCharges(),
            InternationalFormsFreightCharges::fromArray(...),
            ['MonetaryValue' => 42],
        ];
        yield 'InternationalFormsInsuranceCharges' => [
            ModelFixtures::buildInternationalFormsInsuranceCharges(),
            InternationalFormsInsuranceCharges::fromArray(...),
            ['MonetaryValue' => 42],
        ];
        yield 'InternationalFormsOtherCharges' => [
            ModelFixtures::buildInternationalFormsOtherCharges(),
            InternationalFormsOtherCharges::fromArray(...),
            ['MonetaryValue' => 42, 'Description' => 42],
        ];
        yield 'InternationalFormsBlanketPeriod' => [
            ModelFixtures::buildInternationalFormsBlanketPeriod(),
            InternationalFormsBlanketPeriod::fromArray(...),
            ['BeginDate' => 42, 'EndDate' => 42],
        ];
        yield 'ShipmentServiceOptionsDeliveryConfirmation' => [
            ModelFixtures::buildShipmentServiceOptionsDeliveryConfirmation(),
            ShipmentServiceOptionsDeliveryConfirmation::fromArray(...),
            ['DCISType' => 42],
        ];
        yield 'ShipmentServiceOptionsLabelMethod' => [
            ModelFixtures::buildShipmentServiceOptionsLabelMethod(),
            ShipmentServiceOptionsLabelMethod::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentServiceOptionsPreAlertNotification' => [
            ModelFixtures::buildShipmentServiceOptionsPreAlertNotification(),
            ShipmentServiceOptionsPreAlertNotification::fromArray(...),
            ['Locale' => 'not-an-object'],
        ];
        yield 'PreAlertNotificationEMailMessage' => [
            ModelFixtures::buildPreAlertNotificationEMailMessage(),
            PreAlertNotificationEMailMessage::fromArray(...),
            ['EMailAddress' => 42],
        ];
        yield 'PreAlertNotificationVoiceMessage' => [
            ModelFixtures::buildPreAlertNotificationVoiceMessage(),
            PreAlertNotificationVoiceMessage::fromArray(...),
            ['PhoneNumber' => 42],
        ];
        yield 'PreAlertNotificationTextMessage' => [
            ModelFixtures::buildPreAlertNotificationTextMessage(),
            PreAlertNotificationTextMessage::fromArray(...),
            ['PhoneNumber' => 42],
        ];
        yield 'PreAlertNotificationLocale' => [
            ModelFixtures::buildPreAlertNotificationLocale(),
            PreAlertNotificationLocale::fromArray(...),
            ['Language' => 42, 'Dialect' => 42],
        ];
        yield 'ShipmentServiceOptionsVerifiedDelivery' => [
            ModelFixtures::buildShipmentServiceOptionsVerifiedDelivery(),
            ShipmentServiceOptionsVerifiedDelivery::fromArray(...),
            ['SecurePINType' => 42, 'TokenValue' => 42, 'RecipientEmail' => 42],
        ];
        yield 'ShipmentPackage' => [
            ModelFixtures::buildShipmentPackage(),
            ShipmentPackage::fromArray(...),
            ['Packaging' => 'not-an-object'],
        ];
        yield 'ShipmentTradeDirect' => [
            ModelFixtures::buildShipmentTradeDirect(),
            ShipmentTradeDirect::fromArray(...),
            ['ShipmentType' => 42, 'CurrencyCode' => 42],
        ];
        yield 'TradeDirectMaster' => [
            ModelFixtures::buildTradeDirectMaster(),
            TradeDirectMaster::fromArray(...),
            ['UomType' => 42],
        ];
        yield 'MasterSoldTo' => [
            ModelFixtures::buildMasterSoldTo(),
            MasterSoldTo::fromArray(...),
            ['Name' => 42, 'Address' => 'not-an-object', 'EmailAddress' => 42],
        ];
        yield 'MasterPickup' => [
            ModelFixtures::buildMasterPickup(),
            MasterPickup::fromArray(...),
            ['Name' => 42, 'Address' => 'not-an-object', 'EMailAddress' => 42],
        ];
        yield 'TradeDirectPhone' => [
            ModelFixtures::buildTradeDirectPhone(),
            TradeDirectPhone::fromArray(...),
            ['Number' => 42],
        ];
        yield 'TradeDirectAddress' => [
            ModelFixtures::buildTradeDirectAddress(),
            TradeDirectAddress::fromArray(...),
            ['AddressLine' => 42, 'City' => 42, 'CountryCode' => 42],
        ];
        yield 'TradeDirectChild' => [
            ModelFixtures::buildTradeDirectChild(),
            TradeDirectChild::fromArray(...),
            ['USI' => 42, 'Type' => 42, 'Product' => 'not-an-object', 'LtlPackage' => 'not-an-object'],
        ];
        yield 'ChildProduct' => [
            ModelFixtures::buildChildProduct(),
            ChildProduct::fromArray(...),
            [
                'Description' => 42,
                'UnitPrice' => 42,
                'NumberOfUnits' => 42,
                'ProductNumber' => 42,
                'CountryOriginCode' => 42,
                'UnitOfMeasure' => 42,
            ],
        ];
        yield 'ChildLTLPackage' => [
            ModelFixtures::buildChildLTLPackage(),
            ChildLTLPackage::fromArray(...),
            ['NumberOfIdenticalUnits' => 42, 'HandlingUnits' => 'not-an-object'],
        ];
        yield 'LTLHandlingUnits' => [
            ModelFixtures::buildLTLHandlingUnits(),
            LTLHandlingUnits::fromArray(...),
            [
                'Quantity' => 42,
                'Type' => 42,
                'FreightClass' => 42,
                'Dimensions' => 'not-an-object',
                'PackageWeight' => 'not-an-object',
            ],
        ];
        yield 'LTLReferenceNumber' => [
            ModelFixtures::buildLTLReferenceNumber(),
            LTLReferenceNumber::fromArray(...),
            ['Code' => 42, 'Value' => 42],
        ];
        yield 'LTLDimensions' => [
            ModelFixtures::buildLTLDimensions(),
            LTLDimensions::fromArray(...),
            ['Length' => 42, 'Width' => 42, 'Height' => 42, 'UnitOfMeasurement' => 42],
        ];
        yield 'LTLPackageWeightType' => [
            ModelFixtures::buildLTLPackageWeightType(),
            LTLPackageWeightType::fromArray(...),
            ['Weight' => 42, 'UnitOfMeasurement' => 42],
        ];
        yield 'LTLOtherCharges' => [
            ModelFixtures::buildLTLOtherCharges(),
            LTLOtherCharges::fromArray(...),
            ['MonetaryValue' => 42, 'ChargeDescription' => 42],
        ];
        yield 'TradeDirectNotificationBeforeDelivery' => [
            ModelFixtures::buildTradeDirectNotificationBeforeDelivery(),
            TradeDirectNotificationBeforeDelivery::fromArray(...),
            ['EMailAddress' => 42],
        ];
        yield 'PackagePackaging' => [
            ModelFixtures::buildPackagePackaging(),
            PackagePackaging::fromArray(...),
            ['Code' => 42],
        ];
        yield 'PackageDimensions' => [
            ModelFixtures::buildPackageDimensions(),
            PackageDimensions::fromArray(...),
            ['UnitOfMeasurement' => 'not-an-object', 'Length' => 42, 'Width' => 42, 'Height' => 42],
        ];
        yield 'DimWeightUnitOfMeasurement' => [
            ModelFixtures::buildDimWeightUnitOfMeasurement(),
            DimWeightUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'PackagePackageWeight' => [
            ModelFixtures::buildPackagePackageWeight(),
            PackagePackageWeight::fromArray(...),
            ['UnitOfMeasurement' => 'not-an-object', 'Weight' => 42],
        ];
        yield 'PackageWeightUnitOfMeasurement' => [
            ModelFixtures::buildPackageWeightUnitOfMeasurement(),
            PackageWeightUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'PackageReferenceNumber' => [
            ModelFixtures::buildPackageReferenceNumber(),
            PackageReferenceNumber::fromArray(...),
            ['Value' => 42],
        ];
        yield 'PackageSimpleRate' => [
            ModelFixtures::buildPackageSimpleRate(),
            PackageSimpleRate::fromArray(...),
            ['Code' => 42],
        ];
        yield 'PackageUPSPremier' => [
            ModelFixtures::buildPackageUPSPremier(),
            PackageUPSPremier::fromArray(...),
            ['Category' => 42, 'HandlingInstructions' => 'not-an-object'],
        ];
        yield 'UPSPremierHandlingInstructions' => [
            ModelFixtures::buildUPSPremierHandlingInstructions(),
            UPSPremierHandlingInstructions::fromArray(...),
            ['Instruction' => 42],
        ];
        yield 'PackageServiceOptionsDeliveryConfirmation' => [
            ModelFixtures::buildPackageServiceOptionsDeliveryConfirmation(),
            PackageServiceOptionsDeliveryConfirmation::fromArray(...),
            ['DCISType' => 42],
        ];
        yield 'PackageServiceOptionsDeclaredValue' => [
            ModelFixtures::buildPackageServiceOptionsDeclaredValue(),
            PackageServiceOptionsDeclaredValue::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'DeclaredValueType' => [
            ModelFixtures::buildDeclaredValueType(),
            DeclaredValueType::fromArray(...),
            ['Code' => 42],
        ];
        yield 'PackageServiceOptionsCOD' => [
            ModelFixtures::buildPackageServiceOptionsCOD(),
            PackageServiceOptionsCOD::fromArray(...),
            ['CODFundsCode' => 42, 'CODAmount' => 'not-an-object'],
        ];
        yield 'PackageServiceOptionsCODCODAmount' => [
            ModelFixtures::buildPackageServiceOptionsCODCODAmount(),
            PackageServiceOptionsCODCODAmount::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'PackageServiceOptionsAccessPointCOD' => [
            ModelFixtures::buildPackageServiceOptionsAccessPointCOD(),
            PackageServiceOptionsAccessPointCOD::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'PackageServiceOptionsNotification' => [
            ModelFixtures::buildPackageServiceOptionsNotification(),
            PackageServiceOptionsNotification::fromArray(...),
            ['NotificationCode' => 42, 'EMail' => 'not-an-object'],
        ];
        yield 'PackageServiceOptionsNotificationEMail' => [
            ModelFixtures::buildPackageServiceOptionsNotificationEMail(),
            PackageServiceOptionsNotificationEMail::fromArray(...),
            ['EMailAddress' => 'not-an-object'],
        ];
        yield 'PackageServiceOptionsHazMat' => [
            ModelFixtures::buildPackageServiceOptionsHazMat(),
            PackageServiceOptionsHazMat::fromArray(...),
            ['ProperShippingName' => 42, 'RegulationSet' => 42, 'TransportationMode' => 42],
        ];
        yield 'PackageServiceOptionsDryIce' => [
            ModelFixtures::buildPackageServiceOptionsDryIce(),
            PackageServiceOptionsDryIce::fromArray(...),
            ['RegulationSet' => 42, 'DryIceWeight' => 'not-an-object'],
        ];
        yield 'DryIceDryIceWeight' => [
            ModelFixtures::buildDryIceDryIceWeight(),
            DryIceDryIceWeight::fromArray(...),
            ['UnitOfMeasurement' => 'not-an-object', 'Weight' => 42],
        ];
        yield 'DryIceWeightUnitOfMeasurement' => [
            ModelFixtures::buildDryIceWeightUnitOfMeasurement(),
            DryIceWeightUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'PackageCommodity' => [
            ModelFixtures::buildPackageCommodity(),
            PackageCommodity::fromArray(...),
            ['FreightClass' => 42],
        ];
        yield 'CommodityNMFC' => [
            ModelFixtures::buildCommodityNMFC(),
            CommodityNMFC::fromArray(...),
            ['PrimeCode' => 42],
        ];
        yield 'ShipmentRequestLabelSpecification' => [
            ModelFixtures::buildShipmentRequestLabelSpecification(),
            ShipmentRequestLabelSpecification::fromArray(...),
            ['LabelImageFormat' => 'not-an-object', 'LabelStockSize' => 'not-an-object'],
        ];
        yield 'LabelSpecificationLabelImageFormat' => [
            ModelFixtures::buildLabelSpecificationLabelImageFormat(),
            LabelSpecificationLabelImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'LabelSpecificationLabelStockSize' => [
            ModelFixtures::buildLabelSpecificationLabelStockSize(),
            LabelSpecificationLabelStockSize::fromArray(...),
            ['Height' => 42, 'Width' => 42],
        ];
        yield 'LabelSpecificationInstruction' => [
            ModelFixtures::buildLabelSpecificationInstruction(),
            LabelSpecificationInstruction::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentRequestReceiptSpecification' => [
            ModelFixtures::buildShipmentRequestReceiptSpecification(),
            ShipmentRequestReceiptSpecification::fromArray(...),
            ['ImageFormat' => 'not-an-object'],
        ];
        yield 'ReceiptSpecificationImageFormat' => [
            ModelFixtures::buildReceiptSpecificationImageFormat(),
            ReceiptSpecificationImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentResponse' => [
            ModelFixtures::buildShipmentResponse(),
            ShipmentResponse::fromArray(...),
            ['Response' => 'not-an-object', 'ShipmentResults' => 'not-an-object'],
        ];
        yield 'ShipmentResponseResponse' => [
            ModelFixtures::buildShipmentResponseResponse(),
            ShipmentResponseResponse::fromArray(...),
            ['ResponseStatus' => 'not-an-object'],
        ];
        yield 'ResponseResponseStatus' => [
            ModelFixtures::buildResponseResponseStatus(),
            ResponseResponseStatus::fromArray(...),
            ['Code' => 42, 'Description' => 42],
        ];
        yield 'ResponseAlert' => [
            ModelFixtures::buildResponseAlert(),
            ResponseAlert::fromArray(...),
            ['Code' => 42, 'Description' => 42],
        ];
        yield 'ShipmentResponseShipmentResults' => [
            ModelFixtures::buildShipmentResponseShipmentResults(),
            ShipmentResponseShipmentResults::fromArray(...),
            ['BillingWeight' => 'not-an-object'],
        ];
        yield 'ShipmentResultsDisclaimer' => [
            ModelFixtures::buildShipmentResultsDisclaimer(),
            ShipmentResultsDisclaimer::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentResultsShipmentCharges' => [
            ModelFixtures::buildShipmentResultsShipmentCharges(),
            ShipmentResultsShipmentCharges::fromArray(...),
            [
                'TransportationCharges' => 'not-an-object',
                'ServiceOptionsCharges' => 'not-an-object',
                'TotalCharges' => 'not-an-object',
            ],
        ];
        yield 'ShipmentChargesBaseServiceCharge' => [
            ModelFixtures::buildShipmentChargesBaseServiceCharge(),
            ShipmentChargesBaseServiceCharge::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'ShipmentChargesTransportationCharges' => [
            ModelFixtures::buildShipmentChargesTransportationCharges(),
            ShipmentChargesTransportationCharges::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'ShipmentChargesItemizedCharges' => [
            ModelFixtures::buildShipmentChargesItemizedCharges(),
            ShipmentChargesItemizedCharges::fromArray(...),
            ['Code' => 42, 'CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'ShipmentChargesServiceOptionsCharges' => [
            ModelFixtures::buildShipmentChargesServiceOptionsCharges(),
            ShipmentChargesServiceOptionsCharges::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'ShipmentChargesTaxCharges' => [
            ModelFixtures::buildShipmentChargesTaxCharges(),
            ShipmentChargesTaxCharges::fromArray(...),
            ['Type' => 42, 'MonetaryValue' => 42],
        ];
        yield 'ShipmentChargesTotalCharges' => [
            ModelFixtures::buildShipmentChargesTotalCharges(),
            ShipmentChargesTotalCharges::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'ShipmentChargesTotalChargesWithTaxes' => [
            ModelFixtures::buildShipmentChargesTotalChargesWithTaxes(),
            ShipmentChargesTotalChargesWithTaxes::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'NegotiatedRateChargesItemizedCharges' => [
            ModelFixtures::buildNegotiatedRateChargesItemizedCharges(),
            NegotiatedRateChargesItemizedCharges::fromArray(...),
            ['Code' => 42, 'CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'NegotiatedRateChargesTaxCharges' => [
            ModelFixtures::buildNegotiatedRateChargesTaxCharges(),
            NegotiatedRateChargesTaxCharges::fromArray(...),
            ['Type' => 42, 'MonetaryValue' => 42],
        ];
        yield 'NegotiatedRateChargesTotalCharge' => [
            ModelFixtures::buildNegotiatedRateChargesTotalCharge(),
            NegotiatedRateChargesTotalCharge::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'NegotiatedRateChargesRateModifier' => [
            ModelFixtures::buildNegotiatedRateChargesRateModifier(),
            NegotiatedRateChargesRateModifier::fromArray(...),
            ['ModifierType' => 42, 'ModifierDesc' => 42, 'Amount' => 42],
        ];
        yield 'NegotiatedRateChargesTotalChargesWithTaxes' => [
            ModelFixtures::buildNegotiatedRateChargesTotalChargesWithTaxes(),
            NegotiatedRateChargesTotalChargesWithTaxes::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'ShipmentResultsFRSShipmentData' => [
            ModelFixtures::buildShipmentResultsFRSShipmentData(),
            ShipmentResultsFRSShipmentData::fromArray(...),
            ['TransportationCharges' => 'not-an-object'],
        ];
        yield 'FRSShipmentDataTransportationCharges' => [
            ModelFixtures::buildFRSShipmentDataTransportationCharges(),
            FRSShipmentDataTransportationCharges::fromArray(...),
            [
                'GrossCharge' => 'not-an-object',
                'DiscountAmount' => 'not-an-object',
                'DiscountPercentage' => 42,
                'NetCharge' => 'not-an-object',
            ],
        ];
        yield 'TransportationChargesGrossCharge' => [
            ModelFixtures::buildTransportationChargesGrossCharge(),
            TransportationChargesGrossCharge::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'TransportationChargesDiscountAmount' => [
            ModelFixtures::buildTransportationChargesDiscountAmount(),
            TransportationChargesDiscountAmount::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'TransportationChargesNetCharge' => [
            ModelFixtures::buildTransportationChargesNetCharge(),
            TransportationChargesNetCharge::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'FRSShipmentDataFreightDensityRate' => [
            ModelFixtures::buildFRSShipmentDataFreightDensityRate(),
            FRSShipmentDataFreightDensityRate::fromArray(...),
            ['Density' => 42, 'TotalCubicFeet' => 42],
        ];
        yield 'FRSShipmentDataHandlingUnits' => [
            ModelFixtures::buildFRSShipmentDataHandlingUnits(),
            FRSShipmentDataHandlingUnits::fromArray(...),
            ['Quantity' => 42, 'Type' => 'not-an-object', 'Dimensions' => 'not-an-object'],
        ];
        yield 'HandlingUnitsAdjustedHeight' => [
            ModelFixtures::buildHandlingUnitsAdjustedHeight(),
            HandlingUnitsAdjustedHeight::fromArray(...),
            ['Value' => 42, 'UnitOfMeasurement' => 'not-an-object'],
        ];
        yield 'ShipmentResultsBillingWeight' => [
            ModelFixtures::buildShipmentResultsBillingWeight(),
            ShipmentResultsBillingWeight::fromArray(...),
            ['UnitOfMeasurement' => 'not-an-object', 'Weight' => 42],
        ];
        yield 'BillingWeightUnitOfMeasurement' => [
            ModelFixtures::buildBillingWeightUnitOfMeasurement(),
            BillingWeightUnitOfMeasurement::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentResultsPackageResults' => [
            ModelFixtures::buildShipmentResultsPackageResults(),
            ShipmentResultsPackageResults::fromArray(...),
            ['TrackingNumber' => 42],
        ];
        yield 'PackageResultsBaseServiceCharge' => [
            ModelFixtures::buildPackageResultsBaseServiceCharge(),
            PackageResultsBaseServiceCharge::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'PackageResultsServiceOptionsCharges' => [
            ModelFixtures::buildPackageResultsServiceOptionsCharges(),
            PackageResultsServiceOptionsCharges::fromArray(...),
            ['CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'PackageResultsShippingLabel' => [
            ModelFixtures::buildPackageResultsShippingLabel(),
            PackageResultsShippingLabel::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'ShippingLabelImageFormat' => [
            ModelFixtures::buildShippingLabelImageFormat(),
            ShippingLabelImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'PackageResultsShippingReceipt' => [
            ModelFixtures::buildPackageResultsShippingReceipt(),
            PackageResultsShippingReceipt::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'ShippingReceiptImageFormat' => [
            ModelFixtures::buildShippingReceiptImageFormat(),
            ShippingReceiptImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'PackageResultsAccessorial' => [
            ModelFixtures::buildPackageResultsAccessorial(),
            PackageResultsAccessorial::fromArray(...),
            ['Code' => 42],
        ];
        yield 'PackageResultsSimpleRate' => [
            ModelFixtures::buildPackageResultsSimpleRate(),
            PackageResultsSimpleRate::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentResultsFormImage' => [
            ModelFixtures::buildShipmentResultsFormImage(),
            ShipmentResultsFormImage::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'FormImage' => [
            ModelFixtures::buildFormImage(),
            FormImage::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'HighValueReportImageImageFormat' => [
            ModelFixtures::buildHighValueReportImageImageFormat(),
            HighValueReportImageImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'CODTurnInPageImageImageFormat' => [
            ModelFixtures::buildCODTurnInPageImageImageFormat(),
            CODTurnInPageImageImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentResultsImageImageFormat' => [
            ModelFixtures::buildShipmentResultsImageImageFormat(),
            ShipmentResultsImageImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ImageImageFormat' => [
            ModelFixtures::buildImageImageFormat(),
            ImageImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'PackageResultsItemizedCharges' => [
            ModelFixtures::buildPackageResultsItemizedCharges(),
            PackageResultsItemizedCharges::fromArray(...),
            ['Code' => 42, 'CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'NegotiatedChargesItemizedCharges' => [
            ModelFixtures::buildNegotiatedChargesItemizedCharges(),
            NegotiatedChargesItemizedCharges::fromArray(...),
            ['Code' => 42, 'CurrencyCode' => 42, 'MonetaryValue' => 42],
        ];
        yield 'NegotiatedChargesRateModifier' => [
            ModelFixtures::buildNegotiatedChargesRateModifier(),
            NegotiatedChargesRateModifier::fromArray(...),
            ['ModifierType' => 42, 'ModifierDesc' => 42, 'Amount' => 42],
        ];
        yield 'PackageResultsRateModifier' => [
            ModelFixtures::buildPackageResultsRateModifier(),
            PackageResultsRateModifier::fromArray(...),
            ['ModifierType' => 42, 'ModifierDesc' => 42, 'Amount' => 42],
        ];
        yield 'ShipmentResultsControlLogReceipt' => [
            ModelFixtures::buildShipmentResultsControlLogReceipt(),
            ShipmentResultsControlLogReceipt::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'ControlLogReceiptImageFormat' => [
            ModelFixtures::buildControlLogReceiptImageFormat(),
            ControlLogReceiptImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ShipmentResultsCODTurnInPage' => [
            ModelFixtures::buildShipmentResultsCODTurnInPage(),
            ShipmentResultsCODTurnInPage::fromArray(...),
            ['Image' => 'not-an-object'],
        ];
        yield 'CODTurnInPageImage' => [
            ModelFixtures::buildCODTurnInPageImage(),
            CODTurnInPageImage::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'ShipmentResultsHighValueReport' => [
            ModelFixtures::buildShipmentResultsHighValueReport(),
            ShipmentResultsHighValueReport::fromArray(...),
            ['Image' => 'not-an-object'],
        ];
        yield 'HighValueReportImage' => [
            ModelFixtures::buildHighValueReportImage(),
            HighValueReportImage::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'VOIDSHIPMENTRequestWrapper' => [
            ModelFixtures::buildVOIDSHIPMENTRequestWrapper(),
            VOIDSHIPMENTRequestWrapper::fromArray(...),
            ['VoidShipmentRequest' => 'not-an-object'],
        ];
        yield 'VOIDSHIPMENTResponseWrapper' => [
            ModelFixtures::buildVOIDSHIPMENTResponseWrapper(),
            VOIDSHIPMENTResponseWrapper::fromArray(...),
            ['VoidShipmentResponse' => 'not-an-object'],
        ];
        yield 'VoidShipmentRequest' => [
            ModelFixtures::buildVoidShipmentRequest(),
            VoidShipmentRequest::fromArray(...),
            ['Request' => 'not-an-object', 'VoidShipment' => 'not-an-object'],
        ];
        yield 'VoidShipmentRequestVoidShipment' => [
            ModelFixtures::buildVoidShipmentRequestVoidShipment(),
            VoidShipmentRequestVoidShipment::fromArray(...),
            ['ShipmentIdentificationNumber' => 42],
        ];
        yield 'VoidShipmentResponse' => [
            ModelFixtures::buildVoidShipmentResponse(),
            VoidShipmentResponse::fromArray(...),
            ['Response' => 'not-an-object', 'SummaryResult' => 'not-an-object'],
        ];
        yield 'VoidShipmentResponseResponse' => [
            ModelFixtures::buildVoidShipmentResponseResponse(),
            VoidShipmentResponseResponse::fromArray(...),
            ['ResponseStatus' => 'not-an-object'],
        ];
        yield 'VoidResponseResponseStatus' => [
            ModelFixtures::buildVoidResponseResponseStatus(),
            VoidResponseResponseStatus::fromArray(...),
            ['Code' => 42, 'Description' => 42],
        ];
        yield 'VoidShipmentResponseSummaryResult' => [
            ModelFixtures::buildVoidShipmentResponseSummaryResult(),
            VoidShipmentResponseSummaryResult::fromArray(...),
            ['Status' => 'not-an-object'],
        ];
        yield 'SummaryResultStatus' => [
            ModelFixtures::buildSummaryResultStatus(),
            SummaryResultStatus::fromArray(...),
            ['Code' => 42, 'Description' => 42],
        ];
        yield 'VoidShipmentResponsePackageLevelResults' => [
            ModelFixtures::buildVoidShipmentResponsePackageLevelResults(),
            VoidShipmentResponsePackageLevelResults::fromArray(...),
            ['TrackingNumber' => 42, 'Status' => 'not-an-object'],
        ];
        yield 'PackageLevelResultsStatus' => [
            ModelFixtures::buildPackageLevelResultsStatus(),
            PackageLevelResultsStatus::fromArray(...),
            ['Code' => 42, 'Description' => 42],
        ];
        yield 'LABELRECOVERYRequestWrapper' => [
            ModelFixtures::buildLABELRECOVERYRequestWrapper(),
            LABELRECOVERYRequestWrapper::fromArray(...),
            ['LabelRecoveryRequest' => 'not-an-object'],
        ];
        yield 'LABELRECOVERYResponseWrapper' => [
            ModelFixtures::buildLABELRECOVERYResponseWrapper(),
            LABELRECOVERYResponseWrapper::fromArray(...),
            ['LabelRecoveryResponse' => 'not-an-object'],
        ];
        yield 'LabelRecoveryRequest' => [
            ModelFixtures::buildLabelRecoveryRequest(),
            LabelRecoveryRequest::fromArray(...),
            ['Request' => 'not-an-object', 'TrackingNumbers' => 'not-an-object', 'ReferenceValues' => 'not-an-object'],
        ];
        yield 'LabelRecoveryLabelSpecificationLabelImageFormat' => [
            ModelFixtures::buildLabelRecoveryLabelSpecificationLabelImageFormat(),
            LabelRecoveryLabelSpecificationLabelImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'LabelRecoveryLabelSpecificationLabelStockSize' => [
            ModelFixtures::buildLabelRecoveryLabelSpecificationLabelStockSize(),
            LabelRecoveryLabelSpecificationLabelStockSize::fromArray(...),
            ['Height' => 42, 'Width' => 42],
        ];
        yield 'LabelRecoveryRequestTranslate' => [
            ModelFixtures::buildLabelRecoveryRequestTranslate(),
            LabelRecoveryRequestTranslate::fromArray(...),
            ['LanguageCode' => 42, 'DialectCode' => 42, 'Code' => 42],
        ];
        yield 'LabelRecoveryRequestReferenceValues' => [
            ModelFixtures::buildLabelRecoveryRequestReferenceValues(),
            LabelRecoveryRequestReferenceValues::fromArray(...),
            ['ReferenceNumber' => 'not-an-object', 'ShipperNumber' => 42],
        ];
        yield 'ReferenceValuesReferenceNumber' => [
            ModelFixtures::buildReferenceValuesReferenceNumber(),
            ReferenceValuesReferenceNumber::fromArray(...),
            ['Value' => 42],
        ];
        yield 'LabelRecoveryRequestUPSPremiumCareForm' => [
            ModelFixtures::buildLabelRecoveryRequestUPSPremiumCareForm(),
            LabelRecoveryRequestUPSPremiumCareForm::fromArray(...),
            ['PageSize' => 42, 'PrintType' => 42],
        ];
        yield 'LabelRecoveryResponse' => [
            ModelFixtures::buildLabelRecoveryResponse(),
            LabelRecoveryResponse::fromArray(...),
            ['Response' => 'not-an-object', 'LabelResults' => 'not-an-object'],
        ];
        yield 'LabelRecoveryResponseResponse' => [
            ModelFixtures::buildLabelRecoveryResponseResponse(),
            LabelRecoveryResponseResponse::fromArray(...),
            ['ResponseStatus' => 'not-an-object'],
        ];
        yield 'LRResponseResponseStatus' => [
            ModelFixtures::buildLRResponseResponseStatus(),
            LRResponseResponseStatus::fromArray(...),
            ['Code' => 42, 'Description' => 42],
        ];
        yield 'LabelResultsLabelImage' => [
            ModelFixtures::buildLabelResultsLabelImage(),
            LabelResultsLabelImage::fromArray(...),
            ['LabelImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'LabelImageLabelImageFormat' => [
            ModelFixtures::buildLabelImageLabelImageFormat(),
            LabelImageLabelImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'LabelResultsMailInnovationsLabelImage' => [
            ModelFixtures::buildLabelResultsMailInnovationsLabelImage(),
            LabelResultsMailInnovationsLabelImage::fromArray(...),
            ['LabelImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'MailInnovationsLabelImageLabelImageFormat' => [
            ModelFixtures::buildMailInnovationsLabelImageLabelImageFormat(),
            MailInnovationsLabelImageLabelImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'ReceiptImage' => [
            ModelFixtures::buildReceiptImage(),
            ReceiptImage::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'ReceiptImageImageFormat' => [
            ModelFixtures::buildReceiptImageImageFormat(),
            ReceiptImageImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'LabelResultsForm' => [
            ModelFixtures::buildLabelResultsForm(),
            LabelResultsForm::fromArray(...),
            ['Image' => 'not-an-object'],
        ];
        yield 'LRFormImage' => [
            ModelFixtures::buildLRFormImage(),
            LRFormImage::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'LabelRecoveryResponseCODTurnInPage' => [
            ModelFixtures::buildLabelRecoveryResponseCODTurnInPage(),
            LabelRecoveryResponseCODTurnInPage::fromArray(...),
            ['Image' => 'not-an-object'],
        ];
        yield 'LRCODTurnInPageImage' => [
            ModelFixtures::buildLRCODTurnInPageImage(),
            LRCODTurnInPageImage::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'LRCODTurnInPageImageImageFormat' => [
            ModelFixtures::buildLRCODTurnInPageImageImageFormat(),
            LRCODTurnInPageImageImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'LabelRecoveryResponseForm' => [
            ModelFixtures::buildLabelRecoveryResponseForm(),
            LabelRecoveryResponseForm::fromArray(...),
            ['Image' => 'not-an-object'],
        ];
        yield 'LabelRecoveryFormImage' => [
            ModelFixtures::buildLabelRecoveryFormImage(),
            LabelRecoveryFormImage::fromArray(...),
            ['ImageFormat' => 'not-an-object', 'GraphicImage' => 42],
        ];
        yield 'LabelRecoveryImageImageFormat' => [
            ModelFixtures::buildLabelRecoveryImageImageFormat(),
            LabelRecoveryImageImageFormat::fromArray(...),
            ['Code' => 42],
        ];
        yield 'LabelRecoveryResponseHighValueReport' => [
            ModelFixtures::buildLabelRecoveryResponseHighValueReport(),
            LabelRecoveryResponseHighValueReport::fromArray(...),
            ['Image' => 'not-an-object'],
        ];
        yield 'LabelRecoveryResponseTrackingCandidate' => [
            ModelFixtures::buildLabelRecoveryResponseTrackingCandidate(),
            LabelRecoveryResponseTrackingCandidate::fromArray(...),
            ['TrackingNumber' => 42],
        ];
        yield 'TrackingCandidatePickupDateRange' => [
            ModelFixtures::buildTrackingCandidatePickupDateRange(),
            TrackingCandidatePickupDateRange::fromArray(...),
            ['BeginDate' => 42, 'EndDate' => 42],
        ];
        yield 'GlobalTaxInformationAgentTaxIdentificationNumber' => [
            ModelFixtures::buildGlobalTaxInformationAgentTaxIdentificationNumber(),
            GlobalTaxInformationAgentTaxIdentificationNumber::fromArray(...),
            ['AgentRole' => 42],
        ];
        yield 'AgentTaxIdentificationNumberTaxIdentificationNumber' => [
            ModelFixtures::buildAgentTaxIdentificationNumberTaxIdentificationNumber(),
            AgentTaxIdentificationNumberTaxIdentificationNumber::fromArray(...),
            [
                'IdentificationNumber' => 42,
                'IDNumberCustomerRole' => 42,
                'IDNumberEncryptionIndicator' => 42,
                'IDNumberPurposeCode' => 42,
                'IDNumberTypeCode' => 42,
            ],
        ];
    }

    /**
     * Each model whose values all pass their constraints, with those constraints.
     *
     * @return iterable<string, array{SelfNormalizingModel, list<Constraint>}>
     */
    public static function modelsWithTheirConstraints(): iterable
    {
        yield 'SHIPRequestWrapper' => [
            ModelFixtures::buildSHIPRequestWrapper(),
            SHIPRequestWrapperConstraint::constraints(),
        ];
        yield 'SHIPResponseWrapper' => [
            ModelFixtures::buildSHIPResponseWrapper(),
            SHIPResponseWrapperConstraint::constraints(),
        ];
        yield 'ShipmentRequest' => [ModelFixtures::buildShipmentRequest(), ShipmentRequestConstraint::constraints()];
        yield 'AddressPOE' => [ModelFixtures::buildAddressPOE(), AddressPOEConstraint::constraints()];
        yield 'ShipmentWorldEase' => [
            ModelFixtures::buildShipmentWorldEase(),
            ShipmentWorldEaseConstraint::constraints(),
        ];
        yield 'ShipmentWorldEasePortOfEntry' => [
            ModelFixtures::buildShipmentWorldEasePortOfEntry(),
            ShipmentWorldEasePortOfEntryConstraint::constraints(),
        ];
        yield 'ShipmentRequestRequest' => [
            ModelFixtures::buildShipmentRequestRequest(),
            ShipmentRequestRequestConstraint::constraints(),
        ];
        yield 'RequestTransactionReference' => [
            ModelFixtures::buildRequestTransactionReference(),
            RequestTransactionReferenceConstraint::constraints(),
        ];
        yield 'ShipmentRequestShipment' => [
            ModelFixtures::buildShipmentRequestShipment(),
            ShipmentRequestShipmentConstraint::constraints(),
        ];
        yield 'ShipmentReturnService' => [
            ModelFixtures::buildShipmentReturnService(),
            ShipmentReturnServiceConstraint::constraints(),
        ];
        yield 'ShipmentShipper' => [ModelFixtures::buildShipmentShipper(), ShipmentShipperConstraint::constraints()];
        yield 'ShipperPhone' => [ModelFixtures::buildShipperPhone(), ShipperPhoneConstraint::constraints()];
        yield 'ShipperAddress' => [ModelFixtures::buildShipperAddress(), ShipperAddressConstraint::constraints()];
        yield 'ShipmentShipTo' => [ModelFixtures::buildShipmentShipTo(), ShipmentShipToConstraint::constraints()];
        yield 'ShipToPhone' => [ModelFixtures::buildShipToPhone(), ShipToPhoneConstraint::constraints()];
        yield 'ShipToAddress' => [ModelFixtures::buildShipToAddress(), ShipToAddressConstraint::constraints()];
        yield 'ShipmentAlternateDeliveryAddress' => [
            ModelFixtures::buildShipmentAlternateDeliveryAddress(),
            ShipmentAlternateDeliveryAddressConstraint::constraints(),
        ];
        yield 'AlternateDeliveryAddressAddress' => [
            ModelFixtures::buildAlternateDeliveryAddressAddress(),
            AlternateDeliveryAddressAddressConstraint::constraints(),
        ];
        yield 'ShipmentShipFrom' => [ModelFixtures::buildShipmentShipFrom(), ShipmentShipFromConstraint::constraints()];
        yield 'ShipFromTaxIDType' => [
            ModelFixtures::buildShipFromTaxIDType(),
            ShipFromTaxIDTypeConstraint::constraints(),
        ];
        yield 'ShipFromPhone' => [ModelFixtures::buildShipFromPhone(), ShipFromPhoneConstraint::constraints()];
        yield 'ShipFromAddress' => [ModelFixtures::buildShipFromAddress(), ShipFromAddressConstraint::constraints()];
        yield 'ShipFromVendorInfo' => [
            ModelFixtures::buildShipFromVendorInfo(),
            ShipFromVendorInfoConstraint::constraints(),
        ];
        yield 'ShipmentPaymentInformation' => [
            ModelFixtures::buildShipmentPaymentInformation(),
            ShipmentPaymentInformationConstraint::constraints(),
        ];
        yield 'PaymentInformationShipmentCharge' => [
            ModelFixtures::buildPaymentInformationShipmentCharge(),
            PaymentInformationShipmentChargeConstraint::constraints(),
        ];
        yield 'ShipmentChargeBillShipper' => [
            ModelFixtures::buildShipmentChargeBillShipper(),
            ShipmentChargeBillShipperConstraint::constraints(),
        ];
        yield 'BillShipperCreditCard' => [
            ModelFixtures::buildBillShipperCreditCard(),
            BillShipperCreditCardConstraint::constraints(),
        ];
        yield 'CreditCardAddress' => [
            ModelFixtures::buildCreditCardAddress(),
            CreditCardAddressConstraint::constraints(),
        ];
        yield 'ShipmentChargeBillReceiver' => [
            ModelFixtures::buildShipmentChargeBillReceiver(),
            ShipmentChargeBillReceiverConstraint::constraints(),
        ];
        yield 'BillReceiverAddress' => [
            ModelFixtures::buildBillReceiverAddress(),
            BillReceiverAddressConstraint::constraints(),
        ];
        yield 'ShipmentChargeBillThirdParty' => [
            ModelFixtures::buildShipmentChargeBillThirdParty(),
            ShipmentChargeBillThirdPartyConstraint::constraints(),
        ];
        yield 'BillThirdPartyAddress' => [
            ModelFixtures::buildBillThirdPartyAddress(),
            BillThirdPartyAddressConstraint::constraints(),
        ];
        yield 'ShipmentFRSPaymentInformation' => [
            ModelFixtures::buildShipmentFRSPaymentInformation(),
            ShipmentFRSPaymentInformationConstraint::constraints(),
        ];
        yield 'FRSPaymentInformationType' => [
            ModelFixtures::buildFRSPaymentInformationType(),
            FRSPaymentInformationTypeConstraint::constraints(),
        ];
        yield 'FRSPaymentInformationAddress' => [
            ModelFixtures::buildFRSPaymentInformationAddress(),
            FRSPaymentInformationAddressConstraint::constraints(),
        ];
        yield 'ShipmentFreightShipmentInformation' => [
            ModelFixtures::buildShipmentFreightShipmentInformation(),
            ShipmentFreightShipmentInformationConstraint::constraints(),
        ];
        yield 'FreightShipmentInformationFreightDensityInfo' => [
            ModelFixtures::buildFreightShipmentInformationFreightDensityInfo(),
            FreightShipmentInformationFreightDensityInfoConstraint::constraints(),
        ];
        yield 'FreightDensityInfoAdjustedHeight' => [
            ModelFixtures::buildFreightDensityInfoAdjustedHeight(),
            FreightDensityInfoAdjustedHeightConstraint::constraints(),
        ];
        yield 'AdjustedHeightUnitOfMeasurement' => [
            ModelFixtures::buildAdjustedHeightUnitOfMeasurement(),
            AdjustedHeightUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'FreightDensityInfoHandlingUnits' => [
            ModelFixtures::buildFreightDensityInfoHandlingUnits(),
            FreightDensityInfoHandlingUnitsConstraint::constraints(),
        ];
        yield 'HandlingUnitsType' => [
            ModelFixtures::buildHandlingUnitsType(),
            HandlingUnitsTypeConstraint::constraints(),
        ];
        yield 'HandlingUnitsDimensions' => [
            ModelFixtures::buildHandlingUnitsDimensions(),
            HandlingUnitsDimensionsConstraint::constraints(),
        ];
        yield 'HandlingUnitsUnitOfMeasurement' => [
            ModelFixtures::buildHandlingUnitsUnitOfMeasurement(),
            HandlingUnitsUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'ShipmentPromotionalDiscountInformation' => [
            ModelFixtures::buildShipmentPromotionalDiscountInformation(),
            ShipmentPromotionalDiscountInformationConstraint::constraints(),
        ];
        yield 'ShipmentDGSignatoryInfo' => [
            ModelFixtures::buildShipmentDGSignatoryInfo(),
            ShipmentDGSignatoryInfoConstraint::constraints(),
        ];
        yield 'ShipmentShipmentRatingOptions' => [
            ModelFixtures::buildShipmentShipmentRatingOptions(),
            ShipmentShipmentRatingOptionsConstraint::constraints(),
        ];
        yield 'ShipmentReferenceNumber' => [
            ModelFixtures::buildShipmentReferenceNumber(),
            ShipmentReferenceNumberConstraint::constraints(),
        ];
        yield 'ShipmentService' => [ModelFixtures::buildShipmentService(), ShipmentServiceConstraint::constraints()];
        yield 'ShipmentInvoiceLineTotal' => [
            ModelFixtures::buildShipmentInvoiceLineTotal(),
            ShipmentInvoiceLineTotalConstraint::constraints(),
        ];
        yield 'ShipmentShipmentIndicationType' => [
            ModelFixtures::buildShipmentShipmentIndicationType(),
            ShipmentShipmentIndicationTypeConstraint::constraints(),
        ];
        yield 'ShipmentShipmentServiceOptions' => [
            ModelFixtures::buildShipmentShipmentServiceOptions(),
            ShipmentShipmentServiceOptionsConstraint::constraints(),
        ];
        yield 'ShipmentServiceOptionsCOD' => [
            ModelFixtures::buildShipmentServiceOptionsCOD(),
            ShipmentServiceOptionsCODConstraint::constraints(),
        ];
        yield 'CODCODAmount' => [ModelFixtures::buildCODCODAmount(), CODCODAmountConstraint::constraints()];
        yield 'ShipmentServiceOptionsAccessPointCOD' => [
            ModelFixtures::buildShipmentServiceOptionsAccessPointCOD(),
            ShipmentServiceOptionsAccessPointCODConstraint::constraints(),
        ];
        yield 'ShipmentServiceOptionsNotification' => [
            ModelFixtures::buildShipmentServiceOptionsNotification(),
            ShipmentServiceOptionsNotificationConstraint::constraints(),
        ];
        yield 'NotificationEMail' => [
            ModelFixtures::buildNotificationEMail(),
            NotificationEMailConstraint::constraints(),
        ];
        yield 'NotificationVoiceMessage' => [
            ModelFixtures::buildNotificationVoiceMessage(),
            NotificationVoiceMessageConstraint::constraints(),
        ];
        yield 'NotificationTextMessage' => [
            ModelFixtures::buildNotificationTextMessage(),
            NotificationTextMessageConstraint::constraints(),
        ];
        yield 'NotificationLocale' => [
            ModelFixtures::buildNotificationLocale(),
            NotificationLocaleConstraint::constraints(),
        ];
        yield 'ShipmentServiceOptionsLabelDelivery' => [
            ModelFixtures::buildShipmentServiceOptionsLabelDelivery(),
            ShipmentServiceOptionsLabelDeliveryConstraint::constraints(),
        ];
        yield 'LabelDeliveryEMail' => [
            ModelFixtures::buildLabelDeliveryEMail(),
            LabelDeliveryEMailConstraint::constraints(),
        ];
        yield 'ShipmentServiceOptionsInternationalForms' => [
            ModelFixtures::buildShipmentServiceOptionsInternationalForms(),
            ShipmentServiceOptionsInternationalFormsConstraint::constraints(),
        ];
        yield 'InternationalFormsUserCreatedForm' => [
            ModelFixtures::buildInternationalFormsUserCreatedForm(),
            InternationalFormsUserCreatedFormConstraint::constraints(),
        ];
        yield 'InternationalFormsUPSPremiumCareForm' => [
            ModelFixtures::buildInternationalFormsUPSPremiumCareForm(),
            InternationalFormsUPSPremiumCareFormConstraint::constraints(),
        ];
        yield 'UPSPremiumCareFormLanguageForUPSPremiumCare' => [
            ModelFixtures::buildUPSPremiumCareFormLanguageForUPSPremiumCare(),
            UPSPremiumCareFormLanguageForUPSPremiumCareConstraint::constraints(),
        ];
        yield 'InternationalFormsCN22Form' => [
            ModelFixtures::buildInternationalFormsCN22Form(),
            InternationalFormsCN22FormConstraint::constraints(),
        ];
        yield 'CN22FormCN22Content' => [
            ModelFixtures::buildCN22FormCN22Content(),
            CN22FormCN22ContentConstraint::constraints(),
        ];
        yield 'CN22ContentCN22DDSReferenceNumber' => [
            ModelFixtures::buildCN22ContentCN22DDSReferenceNumber(),
            CN22ContentCN22DDSReferenceNumberConstraint::constraints(),
        ];
        yield 'CN22ContentCN22ContentWeight' => [
            ModelFixtures::buildCN22ContentCN22ContentWeight(),
            CN22ContentCN22ContentWeightConstraint::constraints(),
        ];
        yield 'CN22ContentWeightUnitOfMeasurement' => [
            ModelFixtures::buildCN22ContentWeightUnitOfMeasurement(),
            CN22ContentWeightUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'InternationalFormsEEIFilingOption' => [
            ModelFixtures::buildInternationalFormsEEIFilingOption(),
            InternationalFormsEEIFilingOptionConstraint::constraints(),
        ];
        yield 'EEIFilingOptionUPSFiled' => [
            ModelFixtures::buildEEIFilingOptionUPSFiled(),
            EEIFilingOptionUPSFiledConstraint::constraints(),
        ];
        yield 'UPSFiledPOA' => [ModelFixtures::buildUPSFiledPOA(), UPSFiledPOAConstraint::constraints()];
        yield 'EEIFilingOptionShipperFiled' => [
            ModelFixtures::buildEEIFilingOptionShipperFiled(),
            EEIFilingOptionShipperFiledConstraint::constraints(),
        ];
        yield 'InternationalFormsContacts' => [
            ModelFixtures::buildInternationalFormsContacts(),
            InternationalFormsContactsConstraint::constraints(),
        ];
        yield 'ContactsForwardAgent' => [
            ModelFixtures::buildContactsForwardAgent(),
            ContactsForwardAgentConstraint::constraints(),
        ];
        yield 'ForwardAgentAddress' => [
            ModelFixtures::buildForwardAgentAddress(),
            ForwardAgentAddressConstraint::constraints(),
        ];
        yield 'ContactsUltimateConsignee' => [
            ModelFixtures::buildContactsUltimateConsignee(),
            ContactsUltimateConsigneeConstraint::constraints(),
        ];
        yield 'UltimateConsigneeAddress' => [
            ModelFixtures::buildUltimateConsigneeAddress(),
            UltimateConsigneeAddressConstraint::constraints(),
        ];
        yield 'UltimateConsigneeUltimateConsigneeType' => [
            ModelFixtures::buildUltimateConsigneeUltimateConsigneeType(),
            UltimateConsigneeUltimateConsigneeTypeConstraint::constraints(),
        ];
        yield 'ContactsIntermediateConsignee' => [
            ModelFixtures::buildContactsIntermediateConsignee(),
            ContactsIntermediateConsigneeConstraint::constraints(),
        ];
        yield 'IntermediateConsigneeAddress' => [
            ModelFixtures::buildIntermediateConsigneeAddress(),
            IntermediateConsigneeAddressConstraint::constraints(),
        ];
        yield 'ContactsProducer' => [ModelFixtures::buildContactsProducer(), ContactsProducerConstraint::constraints()];
        yield 'ProducerAddress' => [ModelFixtures::buildProducerAddress(), ProducerAddressConstraint::constraints()];
        yield 'ProducerPhone' => [ModelFixtures::buildProducerPhone(), ProducerPhoneConstraint::constraints()];
        yield 'ContactsSoldTo' => [ModelFixtures::buildContactsSoldTo(), ContactsSoldToConstraint::constraints()];
        yield 'SoldToPhone' => [ModelFixtures::buildSoldToPhone(), SoldToPhoneConstraint::constraints()];
        yield 'SoldToAddress' => [ModelFixtures::buildSoldToAddress(), SoldToAddressConstraint::constraints()];
        yield 'InternationalFormsProduct' => [
            ModelFixtures::buildInternationalFormsProduct(),
            InternationalFormsProductConstraint::constraints(),
        ];
        yield 'ProductUnit' => [ModelFixtures::buildProductUnit(), ProductUnitConstraint::constraints()];
        yield 'UnitUnitOfMeasurement' => [
            ModelFixtures::buildUnitUnitOfMeasurement(),
            UnitUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'ProductNetCostDateRange' => [
            ModelFixtures::buildProductNetCostDateRange(),
            ProductNetCostDateRangeConstraint::constraints(),
        ];
        yield 'ProductProductWeight' => [
            ModelFixtures::buildProductProductWeight(),
            ProductProductWeightConstraint::constraints(),
        ];
        yield 'ProductWeightUnitOfMeasurement' => [
            ModelFixtures::buildProductWeightUnitOfMeasurement(),
            ProductWeightUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'ProductScheduleB' => [ModelFixtures::buildProductScheduleB(), ProductScheduleBConstraint::constraints()];
        yield 'ScheduleBUnitOfMeasurement' => [
            ModelFixtures::buildScheduleBUnitOfMeasurement(),
            ScheduleBUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'ProductExcludeFromForm' => [
            ModelFixtures::buildProductExcludeFromForm(),
            ProductExcludeFromFormConstraint::constraints(),
        ];
        yield 'ProductPackingListInfo' => [
            ModelFixtures::buildProductPackingListInfo(),
            ProductPackingListInfoConstraint::constraints(),
        ];
        yield 'PackingListInfoPackageAssociated' => [
            ModelFixtures::buildPackingListInfoPackageAssociated(),
            PackingListInfoPackageAssociatedConstraint::constraints(),
        ];
        yield 'ProductDDSReferenceNumber' => [
            ModelFixtures::buildProductDDSReferenceNumber(),
            ProductDDSReferenceNumberConstraint::constraints(),
        ];
        yield 'ProductEEIInformation' => [
            ModelFixtures::buildProductEEIInformation(),
            ProductEEIInformationConstraint::constraints(),
        ];
        yield 'EEIInformationLicense' => [
            ModelFixtures::buildEEIInformationLicense(),
            EEIInformationLicenseConstraint::constraints(),
        ];
        yield 'EEIInformationDDTCInformation' => [
            ModelFixtures::buildEEIInformationDDTCInformation(),
            EEIInformationDDTCInformationConstraint::constraints(),
        ];
        yield 'DDTCInformationUnitOfMeasurement' => [
            ModelFixtures::buildDDTCInformationUnitOfMeasurement(),
            DDTCInformationUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'InternationalFormsDiscount' => [
            ModelFixtures::buildInternationalFormsDiscount(),
            InternationalFormsDiscountConstraint::constraints(),
        ];
        yield 'InternationalFormsFreightCharges' => [
            ModelFixtures::buildInternationalFormsFreightCharges(),
            InternationalFormsFreightChargesConstraint::constraints(),
        ];
        yield 'InternationalFormsInsuranceCharges' => [
            ModelFixtures::buildInternationalFormsInsuranceCharges(),
            InternationalFormsInsuranceChargesConstraint::constraints(),
        ];
        yield 'InternationalFormsOtherCharges' => [
            ModelFixtures::buildInternationalFormsOtherCharges(),
            InternationalFormsOtherChargesConstraint::constraints(),
        ];
        yield 'InternationalFormsBlanketPeriod' => [
            ModelFixtures::buildInternationalFormsBlanketPeriod(),
            InternationalFormsBlanketPeriodConstraint::constraints(),
        ];
        yield 'ShipmentServiceOptionsDeliveryConfirmation' => [
            ModelFixtures::buildShipmentServiceOptionsDeliveryConfirmation(),
            ShipmentServiceOptionsDeliveryConfirmationConstraint::constraints(),
        ];
        yield 'ShipmentServiceOptionsLabelMethod' => [
            ModelFixtures::buildShipmentServiceOptionsLabelMethod(),
            ShipmentServiceOptionsLabelMethodConstraint::constraints(),
        ];
        yield 'ShipmentServiceOptionsPreAlertNotification' => [
            ModelFixtures::buildShipmentServiceOptionsPreAlertNotification(),
            ShipmentServiceOptionsPreAlertNotificationConstraint::constraints(),
        ];
        yield 'PreAlertNotificationEMailMessage' => [
            ModelFixtures::buildPreAlertNotificationEMailMessage(),
            PreAlertNotificationEMailMessageConstraint::constraints(),
        ];
        yield 'PreAlertNotificationVoiceMessage' => [
            ModelFixtures::buildPreAlertNotificationVoiceMessage(),
            PreAlertNotificationVoiceMessageConstraint::constraints(),
        ];
        yield 'PreAlertNotificationTextMessage' => [
            ModelFixtures::buildPreAlertNotificationTextMessage(),
            PreAlertNotificationTextMessageConstraint::constraints(),
        ];
        yield 'PreAlertNotificationLocale' => [
            ModelFixtures::buildPreAlertNotificationLocale(),
            PreAlertNotificationLocaleConstraint::constraints(),
        ];
        yield 'ShipmentServiceOptionsRestrictedArticles' => [
            ModelFixtures::buildShipmentServiceOptionsRestrictedArticles(),
            ShipmentServiceOptionsRestrictedArticlesConstraint::constraints(),
        ];
        yield 'ShipmentServiceOptionsVerifiedDelivery' => [
            ModelFixtures::buildShipmentServiceOptionsVerifiedDelivery(),
            ShipmentServiceOptionsVerifiedDeliveryConstraint::constraints(),
        ];
        yield 'ShipmentPackage' => [ModelFixtures::buildShipmentPackage(), ShipmentPackageConstraint::constraints()];
        yield 'ShipmentTradeDirect' => [
            ModelFixtures::buildShipmentTradeDirect(),
            ShipmentTradeDirectConstraint::constraints(),
        ];
        yield 'TradeDirectMaster' => [
            ModelFixtures::buildTradeDirectMaster(),
            TradeDirectMasterConstraint::constraints(),
        ];
        yield 'MasterSoldTo' => [ModelFixtures::buildMasterSoldTo(), MasterSoldToConstraint::constraints()];
        yield 'MasterPickup' => [ModelFixtures::buildMasterPickup(), MasterPickupConstraint::constraints()];
        yield 'TradeDirectPhone' => [ModelFixtures::buildTradeDirectPhone(), TradeDirectPhoneConstraint::constraints()];
        yield 'TradeDirectAddress' => [
            ModelFixtures::buildTradeDirectAddress(),
            TradeDirectAddressConstraint::constraints(),
        ];
        yield 'MasterTradeComplianceDetails' => [
            ModelFixtures::buildMasterTradeComplianceDetails(),
            MasterTradeComplianceDetailsConstraint::constraints(),
        ];
        yield 'TradeDirectChild' => [ModelFixtures::buildTradeDirectChild(), TradeDirectChildConstraint::constraints()];
        yield 'ChildProduct' => [ModelFixtures::buildChildProduct(), ChildProductConstraint::constraints()];
        yield 'ChildLTLPackage' => [ModelFixtures::buildChildLTLPackage(), ChildLTLPackageConstraint::constraints()];
        yield 'LTLHandlingUnits' => [ModelFixtures::buildLTLHandlingUnits(), LTLHandlingUnitsConstraint::constraints()];
        yield 'LTLReferenceNumber' => [
            ModelFixtures::buildLTLReferenceNumber(),
            LTLReferenceNumberConstraint::constraints(),
        ];
        yield 'LTLDimensions' => [ModelFixtures::buildLTLDimensions(), LTLDimensionsConstraint::constraints()];
        yield 'LTLPackageWeightType' => [
            ModelFixtures::buildLTLPackageWeightType(),
            LTLPackageWeightTypeConstraint::constraints(),
        ];
        yield 'ChildLTLCharges' => [ModelFixtures::buildChildLTLCharges(), ChildLTLChargesConstraint::constraints()];
        yield 'LTLOtherCharges' => [ModelFixtures::buildLTLOtherCharges(), LTLOtherChargesConstraint::constraints()];
        yield 'TradeDirectNotificationBeforeDelivery' => [
            ModelFixtures::buildTradeDirectNotificationBeforeDelivery(),
            TradeDirectNotificationBeforeDeliveryConstraint::constraints(),
        ];
        yield 'PackagePackaging' => [ModelFixtures::buildPackagePackaging(), PackagePackagingConstraint::constraints()];
        yield 'PackageDimensions' => [
            ModelFixtures::buildPackageDimensions(),
            PackageDimensionsConstraint::constraints(),
        ];
        yield 'DimensionsUnitOfMeasurement' => [
            ModelFixtures::buildDimensionsUnitOfMeasurement(),
            DimensionsUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'PackageDimWeight' => [ModelFixtures::buildPackageDimWeight(), PackageDimWeightConstraint::constraints()];
        yield 'DimWeightUnitOfMeasurement' => [
            ModelFixtures::buildDimWeightUnitOfMeasurement(),
            DimWeightUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'PackagePackageWeight' => [
            ModelFixtures::buildPackagePackageWeight(),
            PackagePackageWeightConstraint::constraints(),
        ];
        yield 'PackageWeightUnitOfMeasurement' => [
            ModelFixtures::buildPackageWeightUnitOfMeasurement(),
            PackageWeightUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'PackageReferenceNumber' => [
            ModelFixtures::buildPackageReferenceNumber(),
            PackageReferenceNumberConstraint::constraints(),
        ];
        yield 'PackageSimpleRate' => [
            ModelFixtures::buildPackageSimpleRate(),
            PackageSimpleRateConstraint::constraints(),
        ];
        yield 'PackageUPSPremier' => [
            ModelFixtures::buildPackageUPSPremier(),
            PackageUPSPremierConstraint::constraints(),
        ];
        yield 'UPSPremierHandlingInstructions' => [
            ModelFixtures::buildUPSPremierHandlingInstructions(),
            UPSPremierHandlingInstructionsConstraint::constraints(),
        ];
        yield 'PackagePackageServiceOptions' => [
            ModelFixtures::buildPackagePackageServiceOptions(),
            PackagePackageServiceOptionsConstraint::constraints(),
        ];
        yield 'PackageServiceOptionsHealthcare' => [
            ModelFixtures::buildPackageServiceOptionsHealthcare(),
            PackageServiceOptionsHealthcareConstraint::constraints(),
        ];
        yield 'PackageServiceOptionsDeliveryConfirmation' => [
            ModelFixtures::buildPackageServiceOptionsDeliveryConfirmation(),
            PackageServiceOptionsDeliveryConfirmationConstraint::constraints(),
        ];
        yield 'PackageServiceOptionsDeclaredValue' => [
            ModelFixtures::buildPackageServiceOptionsDeclaredValue(),
            PackageServiceOptionsDeclaredValueConstraint::constraints(),
        ];
        yield 'DeclaredValueType' => [
            ModelFixtures::buildDeclaredValueType(),
            DeclaredValueTypeConstraint::constraints(),
        ];
        yield 'PackageServiceOptionsCOD' => [
            ModelFixtures::buildPackageServiceOptionsCOD(),
            PackageServiceOptionsCODConstraint::constraints(),
        ];
        yield 'PackageServiceOptionsCODCODAmount' => [
            ModelFixtures::buildPackageServiceOptionsCODCODAmount(),
            PackageServiceOptionsCODCODAmountConstraint::constraints(),
        ];
        yield 'PackageServiceOptionsAccessPointCOD' => [
            ModelFixtures::buildPackageServiceOptionsAccessPointCOD(),
            PackageServiceOptionsAccessPointCODConstraint::constraints(),
        ];
        yield 'PackageServiceOptionsNotification' => [
            ModelFixtures::buildPackageServiceOptionsNotification(),
            PackageServiceOptionsNotificationConstraint::constraints(),
        ];
        yield 'PackageServiceOptionsNotificationEMail' => [
            ModelFixtures::buildPackageServiceOptionsNotificationEMail(),
            PackageServiceOptionsNotificationEMailConstraint::constraints(),
        ];
        yield 'PackageServiceOptionsHazMat' => [
            ModelFixtures::buildPackageServiceOptionsHazMat(),
            PackageServiceOptionsHazMatConstraint::constraints(),
        ];
        yield 'PackageServiceOptionsDryIce' => [
            ModelFixtures::buildPackageServiceOptionsDryIce(),
            PackageServiceOptionsDryIceConstraint::constraints(),
        ];
        yield 'DryIceDryIceWeight' => [
            ModelFixtures::buildDryIceDryIceWeight(),
            DryIceDryIceWeightConstraint::constraints(),
        ];
        yield 'DryIceWeightUnitOfMeasurement' => [
            ModelFixtures::buildDryIceWeightUnitOfMeasurement(),
            DryIceWeightUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'PackageCommodity' => [ModelFixtures::buildPackageCommodity(), PackageCommodityConstraint::constraints()];
        yield 'CommodityNMFC' => [ModelFixtures::buildCommodityNMFC(), CommodityNMFCConstraint::constraints()];
        yield 'PackageHazMatPackageInformation' => [
            ModelFixtures::buildPackageHazMatPackageInformation(),
            PackageHazMatPackageInformationConstraint::constraints(),
        ];
        yield 'ShipmentRequestLabelSpecification' => [
            ModelFixtures::buildShipmentRequestLabelSpecification(),
            ShipmentRequestLabelSpecificationConstraint::constraints(),
        ];
        yield 'LabelSpecificationLabelImageFormat' => [
            ModelFixtures::buildLabelSpecificationLabelImageFormat(),
            LabelSpecificationLabelImageFormatConstraint::constraints(),
        ];
        yield 'LabelSpecificationLabelStockSize' => [
            ModelFixtures::buildLabelSpecificationLabelStockSize(),
            LabelSpecificationLabelStockSizeConstraint::constraints(),
        ];
        yield 'LabelSpecificationInstruction' => [
            ModelFixtures::buildLabelSpecificationInstruction(),
            LabelSpecificationInstructionConstraint::constraints(),
        ];
        yield 'ShipmentRequestReceiptSpecification' => [
            ModelFixtures::buildShipmentRequestReceiptSpecification(),
            ShipmentRequestReceiptSpecificationConstraint::constraints(),
        ];
        yield 'ReceiptSpecificationImageFormat' => [
            ModelFixtures::buildReceiptSpecificationImageFormat(),
            ReceiptSpecificationImageFormatConstraint::constraints(),
        ];
        yield 'ShipmentResponse' => [ModelFixtures::buildShipmentResponse(), ShipmentResponseConstraint::constraints()];
        yield 'ShipmentResponseResponse' => [
            ModelFixtures::buildShipmentResponseResponse(),
            ShipmentResponseResponseConstraint::constraints(),
        ];
        yield 'ResponseResponseStatus' => [
            ModelFixtures::buildResponseResponseStatus(),
            ResponseResponseStatusConstraint::constraints(),
        ];
        yield 'ResponseAlert' => [ModelFixtures::buildResponseAlert(), ResponseAlertConstraint::constraints()];
        yield 'ResponseTransactionReference' => [
            ModelFixtures::buildResponseTransactionReference(),
            ResponseTransactionReferenceConstraint::constraints(),
        ];
        yield 'ShipmentResponseShipmentResults' => [
            ModelFixtures::buildShipmentResponseShipmentResults(),
            ShipmentResponseShipmentResultsConstraint::constraints(),
        ];
        yield 'ShipmentResultsPalletLabel' => [
            ModelFixtures::buildShipmentResultsPalletLabel(),
            ShipmentResultsPalletLabelConstraint::constraints(),
        ];
        yield 'ShipmentResultsDisclaimer' => [
            ModelFixtures::buildShipmentResultsDisclaimer(),
            ShipmentResultsDisclaimerConstraint::constraints(),
        ];
        yield 'ShipmentResultsShipmentCharges' => [
            ModelFixtures::buildShipmentResultsShipmentCharges(),
            ShipmentResultsShipmentChargesConstraint::constraints(),
        ];
        yield 'ShipmentChargesBaseServiceCharge' => [
            ModelFixtures::buildShipmentChargesBaseServiceCharge(),
            ShipmentChargesBaseServiceChargeConstraint::constraints(),
        ];
        yield 'ShipmentChargesTransportationCharges' => [
            ModelFixtures::buildShipmentChargesTransportationCharges(),
            ShipmentChargesTransportationChargesConstraint::constraints(),
        ];
        yield 'ShipmentChargesItemizedCharges' => [
            ModelFixtures::buildShipmentChargesItemizedCharges(),
            ShipmentChargesItemizedChargesConstraint::constraints(),
        ];
        yield 'ShipmentChargesServiceOptionsCharges' => [
            ModelFixtures::buildShipmentChargesServiceOptionsCharges(),
            ShipmentChargesServiceOptionsChargesConstraint::constraints(),
        ];
        yield 'ShipmentChargesTaxCharges' => [
            ModelFixtures::buildShipmentChargesTaxCharges(),
            ShipmentChargesTaxChargesConstraint::constraints(),
        ];
        yield 'ShipmentChargesTotalCharges' => [
            ModelFixtures::buildShipmentChargesTotalCharges(),
            ShipmentChargesTotalChargesConstraint::constraints(),
        ];
        yield 'ShipmentChargesTotalChargesWithTaxes' => [
            ModelFixtures::buildShipmentChargesTotalChargesWithTaxes(),
            ShipmentChargesTotalChargesWithTaxesConstraint::constraints(),
        ];
        yield 'ShipmentResultsNegotiatedRateCharges' => [
            ModelFixtures::buildShipmentResultsNegotiatedRateCharges(),
            ShipmentResultsNegotiatedRateChargesConstraint::constraints(),
        ];
        yield 'NegotiatedRateChargesItemizedCharges' => [
            ModelFixtures::buildNegotiatedRateChargesItemizedCharges(),
            NegotiatedRateChargesItemizedChargesConstraint::constraints(),
        ];
        yield 'NegotiatedRateChargesTaxCharges' => [
            ModelFixtures::buildNegotiatedRateChargesTaxCharges(),
            NegotiatedRateChargesTaxChargesConstraint::constraints(),
        ];
        yield 'NegotiatedRateChargesTotalCharge' => [
            ModelFixtures::buildNegotiatedRateChargesTotalCharge(),
            NegotiatedRateChargesTotalChargeConstraint::constraints(),
        ];
        yield 'NegotiatedRateChargesRateModifier' => [
            ModelFixtures::buildNegotiatedRateChargesRateModifier(),
            NegotiatedRateChargesRateModifierConstraint::constraints(),
        ];
        yield 'NegotiatedRateChargesTotalChargesWithTaxes' => [
            ModelFixtures::buildNegotiatedRateChargesTotalChargesWithTaxes(),
            NegotiatedRateChargesTotalChargesWithTaxesConstraint::constraints(),
        ];
        yield 'ShipmentResultsFRSShipmentData' => [
            ModelFixtures::buildShipmentResultsFRSShipmentData(),
            ShipmentResultsFRSShipmentDataConstraint::constraints(),
        ];
        yield 'FRSShipmentDataTransportationCharges' => [
            ModelFixtures::buildFRSShipmentDataTransportationCharges(),
            FRSShipmentDataTransportationChargesConstraint::constraints(),
        ];
        yield 'TransportationChargesGrossCharge' => [
            ModelFixtures::buildTransportationChargesGrossCharge(),
            TransportationChargesGrossChargeConstraint::constraints(),
        ];
        yield 'TransportationChargesDiscountAmount' => [
            ModelFixtures::buildTransportationChargesDiscountAmount(),
            TransportationChargesDiscountAmountConstraint::constraints(),
        ];
        yield 'TransportationChargesNetCharge' => [
            ModelFixtures::buildTransportationChargesNetCharge(),
            TransportationChargesNetChargeConstraint::constraints(),
        ];
        yield 'FRSShipmentDataFreightDensityRate' => [
            ModelFixtures::buildFRSShipmentDataFreightDensityRate(),
            FRSShipmentDataFreightDensityRateConstraint::constraints(),
        ];
        yield 'FRSShipmentDataHandlingUnits' => [
            ModelFixtures::buildFRSShipmentDataHandlingUnits(),
            FRSShipmentDataHandlingUnitsConstraint::constraints(),
        ];
        yield 'HandlingUnitsAdjustedHeight' => [
            ModelFixtures::buildHandlingUnitsAdjustedHeight(),
            HandlingUnitsAdjustedHeightConstraint::constraints(),
        ];
        yield 'ShipmentResultsBillingWeight' => [
            ModelFixtures::buildShipmentResultsBillingWeight(),
            ShipmentResultsBillingWeightConstraint::constraints(),
        ];
        yield 'BillingWeightUnitOfMeasurement' => [
            ModelFixtures::buildBillingWeightUnitOfMeasurement(),
            BillingWeightUnitOfMeasurementConstraint::constraints(),
        ];
        yield 'ShipmentResultsPackageResults' => [
            ModelFixtures::buildShipmentResultsPackageResults(),
            ShipmentResultsPackageResultsConstraint::constraints(),
        ];
        yield 'PackageResultsBaseServiceCharge' => [
            ModelFixtures::buildPackageResultsBaseServiceCharge(),
            PackageResultsBaseServiceChargeConstraint::constraints(),
        ];
        yield 'PackageResultsServiceOptionsCharges' => [
            ModelFixtures::buildPackageResultsServiceOptionsCharges(),
            PackageResultsServiceOptionsChargesConstraint::constraints(),
        ];
        yield 'PackageResultsShippingLabel' => [
            ModelFixtures::buildPackageResultsShippingLabel(),
            PackageResultsShippingLabelConstraint::constraints(),
        ];
        yield 'ShippingLabelImageFormat' => [
            ModelFixtures::buildShippingLabelImageFormat(),
            ShippingLabelImageFormatConstraint::constraints(),
        ];
        yield 'PackageResultsShippingReceipt' => [
            ModelFixtures::buildPackageResultsShippingReceipt(),
            PackageResultsShippingReceiptConstraint::constraints(),
        ];
        yield 'ShippingReceiptImageFormat' => [
            ModelFixtures::buildShippingReceiptImageFormat(),
            ShippingReceiptImageFormatConstraint::constraints(),
        ];
        yield 'PackageResultsAccessorial' => [
            ModelFixtures::buildPackageResultsAccessorial(),
            PackageResultsAccessorialConstraint::constraints(),
        ];
        yield 'PackageResultsSimpleRate' => [
            ModelFixtures::buildPackageResultsSimpleRate(),
            PackageResultsSimpleRateConstraint::constraints(),
        ];
        yield 'PackageResultsForm' => [
            ModelFixtures::buildPackageResultsForm(),
            PackageResultsFormConstraint::constraints(),
        ];
        yield 'ShipmentResultsFormImage' => [
            ModelFixtures::buildShipmentResultsFormImage(),
            ShipmentResultsFormImageConstraint::constraints(),
        ];
        yield 'FormImage' => [ModelFixtures::buildFormImage(), FormImageConstraint::constraints()];
        yield 'HighValueReportImageImageFormat' => [
            ModelFixtures::buildHighValueReportImageImageFormat(),
            HighValueReportImageImageFormatConstraint::constraints(),
        ];
        yield 'CODTurnInPageImageImageFormat' => [
            ModelFixtures::buildCODTurnInPageImageImageFormat(),
            CODTurnInPageImageImageFormatConstraint::constraints(),
        ];
        yield 'ShipmentResultsImageImageFormat' => [
            ModelFixtures::buildShipmentResultsImageImageFormat(),
            ShipmentResultsImageImageFormatConstraint::constraints(),
        ];
        yield 'ImageImageFormat' => [ModelFixtures::buildImageImageFormat(), ImageImageFormatConstraint::constraints()];
        yield 'PackageResultsItemizedCharges' => [
            ModelFixtures::buildPackageResultsItemizedCharges(),
            PackageResultsItemizedChargesConstraint::constraints(),
        ];
        yield 'PackageResultsNegotiatedCharges' => [
            ModelFixtures::buildPackageResultsNegotiatedCharges(),
            PackageResultsNegotiatedChargesConstraint::constraints(),
        ];
        yield 'NegotiatedChargesItemizedCharges' => [
            ModelFixtures::buildNegotiatedChargesItemizedCharges(),
            NegotiatedChargesItemizedChargesConstraint::constraints(),
        ];
        yield 'NegotiatedChargesRateModifier' => [
            ModelFixtures::buildNegotiatedChargesRateModifier(),
            NegotiatedChargesRateModifierConstraint::constraints(),
        ];
        yield 'PackageResultsRateModifier' => [
            ModelFixtures::buildPackageResultsRateModifier(),
            PackageResultsRateModifierConstraint::constraints(),
        ];
        yield 'ShipmentResultsControlLogReceipt' => [
            ModelFixtures::buildShipmentResultsControlLogReceipt(),
            ShipmentResultsControlLogReceiptConstraint::constraints(),
        ];
        yield 'ControlLogReceiptImageFormat' => [
            ModelFixtures::buildControlLogReceiptImageFormat(),
            ControlLogReceiptImageFormatConstraint::constraints(),
        ];
        yield 'ShipmentResultsForm' => [
            ModelFixtures::buildShipmentResultsForm(),
            ShipmentResultsFormConstraint::constraints(),
        ];
        yield 'ShipmentResultsCODTurnInPage' => [
            ModelFixtures::buildShipmentResultsCODTurnInPage(),
            ShipmentResultsCODTurnInPageConstraint::constraints(),
        ];
        yield 'CODTurnInPageImage' => [
            ModelFixtures::buildCODTurnInPageImage(),
            CODTurnInPageImageConstraint::constraints(),
        ];
        yield 'ShipmentResultsHighValueReport' => [
            ModelFixtures::buildShipmentResultsHighValueReport(),
            ShipmentResultsHighValueReportConstraint::constraints(),
        ];
        yield 'HighValueReportImage' => [
            ModelFixtures::buildHighValueReportImage(),
            HighValueReportImageConstraint::constraints(),
        ];
        yield 'VOIDSHIPMENTRequestWrapper' => [
            ModelFixtures::buildVOIDSHIPMENTRequestWrapper(),
            VOIDSHIPMENTRequestWrapperConstraint::constraints(),
        ];
        yield 'VOIDSHIPMENTResponseWrapper' => [
            ModelFixtures::buildVOIDSHIPMENTResponseWrapper(),
            VOIDSHIPMENTResponseWrapperConstraint::constraints(),
        ];
        yield 'VoidShipmentRequest' => [
            ModelFixtures::buildVoidShipmentRequest(),
            VoidShipmentRequestConstraint::constraints(),
        ];
        yield 'VoidShipmentRequestRequest' => [
            ModelFixtures::buildVoidShipmentRequestRequest(),
            VoidShipmentRequestRequestConstraint::constraints(),
        ];
        yield 'VoidRequestTransactionReference' => [
            ModelFixtures::buildVoidRequestTransactionReference(),
            VoidRequestTransactionReferenceConstraint::constraints(),
        ];
        yield 'VoidShipmentRequestVoidShipment' => [
            ModelFixtures::buildVoidShipmentRequestVoidShipment(),
            VoidShipmentRequestVoidShipmentConstraint::constraints(),
        ];
        yield 'VoidShipmentResponse' => [
            ModelFixtures::buildVoidShipmentResponse(),
            VoidShipmentResponseConstraint::constraints(),
        ];
        yield 'VoidShipmentResponseResponse' => [
            ModelFixtures::buildVoidShipmentResponseResponse(),
            VoidShipmentResponseResponseConstraint::constraints(),
        ];
        yield 'VoidResponseResponseStatus' => [
            ModelFixtures::buildVoidResponseResponseStatus(),
            VoidResponseResponseStatusConstraint::constraints(),
        ];
        yield 'VoidResponseTransactionReference' => [
            ModelFixtures::buildVoidResponseTransactionReference(),
            VoidResponseTransactionReferenceConstraint::constraints(),
        ];
        yield 'VoidShipmentResponseSummaryResult' => [
            ModelFixtures::buildVoidShipmentResponseSummaryResult(),
            VoidShipmentResponseSummaryResultConstraint::constraints(),
        ];
        yield 'SummaryResultStatus' => [
            ModelFixtures::buildSummaryResultStatus(),
            SummaryResultStatusConstraint::constraints(),
        ];
        yield 'VoidShipmentResponsePackageLevelResults' => [
            ModelFixtures::buildVoidShipmentResponsePackageLevelResults(),
            VoidShipmentResponsePackageLevelResultsConstraint::constraints(),
        ];
        yield 'PackageLevelResultsStatus' => [
            ModelFixtures::buildPackageLevelResultsStatus(),
            PackageLevelResultsStatusConstraint::constraints(),
        ];
        yield 'LABELRECOVERYRequestWrapper' => [
            ModelFixtures::buildLABELRECOVERYRequestWrapper(),
            LABELRECOVERYRequestWrapperConstraint::constraints(),
        ];
        yield 'LABELRECOVERYResponseWrapper' => [
            ModelFixtures::buildLABELRECOVERYResponseWrapper(),
            LABELRECOVERYResponseWrapperConstraint::constraints(),
        ];
        yield 'LabelRecoveryRequest' => [
            ModelFixtures::buildLabelRecoveryRequest(),
            LabelRecoveryRequestConstraint::constraints(),
        ];
        yield 'LabelRecoveryRequestRequest' => [
            ModelFixtures::buildLabelRecoveryRequestRequest(),
            LabelRecoveryRequestRequestConstraint::constraints(),
        ];
        yield 'LRRequestTransactionReference' => [
            ModelFixtures::buildLRRequestTransactionReference(),
            LRRequestTransactionReferenceConstraint::constraints(),
        ];
        yield 'LabelRecoveryRequestLabelSpecification' => [
            ModelFixtures::buildLabelRecoveryRequestLabelSpecification(),
            LabelRecoveryRequestLabelSpecificationConstraint::constraints(),
        ];
        yield 'LabelRecoveryLabelSpecificationLabelImageFormat' => [
            ModelFixtures::buildLabelRecoveryLabelSpecificationLabelImageFormat(),
            LabelRecoveryLabelSpecificationLabelImageFormatConstraint::constraints(),
        ];
        yield 'LabelRecoveryLabelSpecificationLabelStockSize' => [
            ModelFixtures::buildLabelRecoveryLabelSpecificationLabelStockSize(),
            LabelRecoveryLabelSpecificationLabelStockSizeConstraint::constraints(),
        ];
        yield 'LabelRecoveryRequestTranslate' => [
            ModelFixtures::buildLabelRecoveryRequestTranslate(),
            LabelRecoveryRequestTranslateConstraint::constraints(),
        ];
        yield 'LabelRecoveryRequestLabelDelivery' => [
            ModelFixtures::buildLabelRecoveryRequestLabelDelivery(),
            LabelRecoveryRequestLabelDeliveryConstraint::constraints(),
        ];
        yield 'LabelRecoveryRequestReferenceValues' => [
            ModelFixtures::buildLabelRecoveryRequestReferenceValues(),
            LabelRecoveryRequestReferenceValuesConstraint::constraints(),
        ];
        yield 'ReferenceValuesReferenceNumber' => [
            ModelFixtures::buildReferenceValuesReferenceNumber(),
            ReferenceValuesReferenceNumberConstraint::constraints(),
        ];
        yield 'LabelRecoveryRequestUPSPremiumCareForm' => [
            ModelFixtures::buildLabelRecoveryRequestUPSPremiumCareForm(),
            LabelRecoveryRequestUPSPremiumCareFormConstraint::constraints(),
        ];
        yield 'LabelRecoveryResponse' => [
            ModelFixtures::buildLabelRecoveryResponse(),
            LabelRecoveryResponseConstraint::constraints(),
        ];
        yield 'LabelRecoveryResponseResponse' => [
            ModelFixtures::buildLabelRecoveryResponseResponse(),
            LabelRecoveryResponseResponseConstraint::constraints(),
        ];
        yield 'LRResponseResponseStatus' => [
            ModelFixtures::buildLRResponseResponseStatus(),
            LRResponseResponseStatusConstraint::constraints(),
        ];
        yield 'LRResponseTransactionReference' => [
            ModelFixtures::buildLRResponseTransactionReference(),
            LRResponseTransactionReferenceConstraint::constraints(),
        ];
        yield 'LabelRecoveryResponseLabelResults' => [
            ModelFixtures::buildLabelRecoveryResponseLabelResults(),
            LabelRecoveryResponseLabelResultsConstraint::constraints(),
        ];
        yield 'LabelResultsLabelImage' => [
            ModelFixtures::buildLabelResultsLabelImage(),
            LabelResultsLabelImageConstraint::constraints(),
        ];
        yield 'LabelImageLabelImageFormat' => [
            ModelFixtures::buildLabelImageLabelImageFormat(),
            LabelImageLabelImageFormatConstraint::constraints(),
        ];
        yield 'LabelResultsMailInnovationsLabelImage' => [
            ModelFixtures::buildLabelResultsMailInnovationsLabelImage(),
            LabelResultsMailInnovationsLabelImageConstraint::constraints(),
        ];
        yield 'MailInnovationsLabelImageLabelImageFormat' => [
            ModelFixtures::buildMailInnovationsLabelImageLabelImageFormat(),
            MailInnovationsLabelImageLabelImageFormatConstraint::constraints(),
        ];
        yield 'LabelResultsReceipt' => [
            ModelFixtures::buildLabelResultsReceipt(),
            LabelResultsReceiptConstraint::constraints(),
        ];
        yield 'ReceiptImage' => [ModelFixtures::buildReceiptImage(), ReceiptImageConstraint::constraints()];
        yield 'ReceiptImageImageFormat' => [
            ModelFixtures::buildReceiptImageImageFormat(),
            ReceiptImageImageFormatConstraint::constraints(),
        ];
        yield 'LabelResultsForm' => [ModelFixtures::buildLabelResultsForm(), LabelResultsFormConstraint::constraints()];
        yield 'LRFormImage' => [ModelFixtures::buildLRFormImage(), LRFormImageConstraint::constraints()];
        yield 'LabelRecoveryResponseCODTurnInPage' => [
            ModelFixtures::buildLabelRecoveryResponseCODTurnInPage(),
            LabelRecoveryResponseCODTurnInPageConstraint::constraints(),
        ];
        yield 'LRCODTurnInPageImage' => [
            ModelFixtures::buildLRCODTurnInPageImage(),
            LRCODTurnInPageImageConstraint::constraints(),
        ];
        yield 'LRCODTurnInPageImageImageFormat' => [
            ModelFixtures::buildLRCODTurnInPageImageImageFormat(),
            LRCODTurnInPageImageImageFormatConstraint::constraints(),
        ];
        yield 'LabelRecoveryResponseForm' => [
            ModelFixtures::buildLabelRecoveryResponseForm(),
            LabelRecoveryResponseFormConstraint::constraints(),
        ];
        yield 'LabelRecoveryFormImage' => [
            ModelFixtures::buildLabelRecoveryFormImage(),
            LabelRecoveryFormImageConstraint::constraints(),
        ];
        yield 'LabelRecoveryImageImageFormat' => [
            ModelFixtures::buildLabelRecoveryImageImageFormat(),
            LabelRecoveryImageImageFormatConstraint::constraints(),
        ];
        yield 'LabelRecoveryResponseHighValueReport' => [
            ModelFixtures::buildLabelRecoveryResponseHighValueReport(),
            LabelRecoveryResponseHighValueReportConstraint::constraints(),
        ];
        yield 'LabelRecoveryResponseTrackingCandidate' => [
            ModelFixtures::buildLabelRecoveryResponseTrackingCandidate(),
            LabelRecoveryResponseTrackingCandidateConstraint::constraints(),
        ];
        yield 'TrackingCandidatePickupDateRange' => [
            ModelFixtures::buildTrackingCandidatePickupDateRange(),
            TrackingCandidatePickupDateRangeConstraint::constraints(),
        ];
        yield 'GlobalTaxInformationAgentTaxIdentificationNumber' => [
            ModelFixtures::buildGlobalTaxInformationAgentTaxIdentificationNumber(),
            GlobalTaxInformationAgentTaxIdentificationNumberConstraint::constraints(),
        ];
        yield 'AgentTaxIdentificationNumberTaxIdentificationNumber' => [
            ModelFixtures::buildAgentTaxIdentificationNumberTaxIdentificationNumber(),
            AgentTaxIdentificationNumberTaxIdentificationNumberConstraint::constraints(),
        ];
        yield 'ShipmentGlobalTaxInformation' => [
            ModelFixtures::buildShipmentGlobalTaxInformation(),
            ShipmentGlobalTaxInformationConstraint::constraints(),
        ];
        yield 'ErrorResponse' => [ModelFixtures::buildErrorResponse(), ErrorResponseConstraint::constraints()];
        yield 'CommonErrorResponse' => [
            ModelFixtures::buildCommonErrorResponse(),
            CommonErrorResponseConstraint::constraints(),
        ];
        yield 'ErrorMessage' => [ModelFixtures::buildErrorMessage(), ErrorMessageConstraint::constraints()];
    }
}
