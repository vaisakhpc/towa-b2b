# Spryker B2B Demo Shop Changes for Towa 

## Description

This repo consists of the changes required by the Towa Digital's coding challenge. The steps followed for the implementation are explained below,

### Yves changes

* New OrderNameForm is created [src/Pyz/Yves/CheckoutPage/Form/Steps/OrderNameForm.php](src/Pyz/Yves/CheckoutPage/Form/Steps/OrderNameForm.php) to define the form inputs for the order name checkout step
* New OrderNameStep is created [src/Pyz/Yves/CheckoutPage/Process/Steps/OrderNameStep.php](src/Pyz/Yves/CheckoutPage/Process/Steps/OrderNameStep.php) is created to specify the checkout process steps like preCondition,execute,postCondition and requireInput. 
* [src/Pyz/Yves/CheckoutPage/Process/StepFactory.php](src/Pyz/Yves/CheckoutPage/Process/StepFactory.php) class is written to extend SprykerShop\Yves\CheckoutPage\Process\StepFactory class so that we can override the method ´getSteps´ . This is done to put the order name form as the first step in checkout process
* Added the action method for the checkout step in the controller [src/Pyz/Yves/CheckoutPage/Controller/CheckoutController.php](src/Pyz/Yves/CheckoutPage/Controller/CheckoutController.php) and added the RouterPlugin as well for the new Yves route (yves.de.spryker.local/en/checkout/order-name)
* Changed the Yves twig templates for accommodating the new form, adding the order name field to the order list table,etc.

### Client changes

* Extended the Client Checkout class with this new class [src/Pyz/Client/Checkout/CheckoutClient.php](src/Pyz/Client/Checkout/CheckoutClient.php) to add a new method to make a connection between Yves and Zed modules. This method will be responsible for making a call to the Zed gateway api endpoint to make sure that the provided order name is saved associated to the quote
* new ZedStub is created to implement the call to the Zed backend api [src/Pyz/Client/Checkout/Zed/CheckoutStub.php](src/Pyz/Client/Checkout/Zed/CheckoutStub.php).

### Shared module changes

* Added a new transfer file for adding the order name field to both Quote and Order transfer . The file is [src/Pyz/Yves/CheckoutPage/CheckoutPageConfig.php](src/Pyz/Yves/CheckoutPage/CheckoutPageConfig.php)

### Zed changes

* Added a gateway controller [src/Pyz/Zed/Checkout/Communication/Controller/GatewayController.php](src/Pyz/Zed/Checkout/Communication/Controller/GatewayController.php) to accommodate the new method for persisting the order name
* Added order name field also to the allowed for saving plugins [src/Pyz/Zed/Checkout/Communication/Plugin/Quote/OrderNameQuoteFieldsAllowedForSavingProviderPlugin.php](src/Pyz/Zed/Checkout/Communication/Plugin/Quote/OrderNameQuoteFieldsAllowedForSavingProviderPlugin.php)
* Added the order_name field to the Propel schema [src/Pyz/Zed/IndexGenerator/Persistence/Propel/Schema/spy_sales.schema.xml](src/Pyz/Zed/IndexGenerator/Persistence/Propel/Schema/spy_sales.schema.xml). This along with the propel build commands will make sure that this field is made available in the sales order db table
* The class [src/Pyz/Zed/Sales/Business/OrderWriter/SalesOrderWriter.php](src/Pyz/Zed/Sales/Business/OrderWriter/SalesOrderWriter.php) has been introduced to extend the `hydrateSalesOrderEntityTransfer` method to add order_name also to the database
* This class [src/Pyz/Zed/Sales/Persistence/Propel/QueryBuilder/OrderSearchFilterFieldQueryBuilder.php](src/Pyz/Zed/Sales/Persistence/Propel/QueryBuilder/OrderSearchFilterFieldQueryBuilder.php) is introduced to include order_name field in the DB to be filterable and sortable in the order history table
* This facade class [src/Pyz/Zed/Checkout/Business/CheckoutFacade.php](src/Pyz/Zed/Checkout/Business/CheckoutFacade.php) is used to extend the Spryker's core version to add the `saveOrderName` method. This method makes sure that the supplied order name is saved with the corresponding quote.
Note: Currently used the generic updateQuote method of the quote facade to save the entire QuoteTransfer to the DB for the sake of simplicity. This could be optimized by a new Writer class in the Business Layer which internally calls an entityManager along with a Repository class (Persistence Factory) which will in turn saves only the order_name in the quote_data field of the sales_quote table.

### Other changes

* Glossary has been updated to add the translations for the labels and messages showing in both German and English languages
* Unit tests are written for certain relevant classes using Codeception. 100% Code coverage is available for the all the classes for which tests are written. `codecept run  -c codeception.functional.yml --coverage-html` Running this command will create the coverage reports under `tests/_output/coverage` folder. Please make sure that the cli is opened using this command `docker/sdk testing -x`.