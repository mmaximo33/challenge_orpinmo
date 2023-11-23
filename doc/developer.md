# Developer documentation

The objective of this document is to transfer the operation of this module

# Summary
The module works with an auxiliary table called **omnipro_quickproductpositioning** which is created when the module is enabled in the implementation.
This feature allows us to completely decouple from the Magento core or any other third-party element.
It also allows its management and uninstallation to be much simpler, avoiding leaving residue from its installation.

# Data visualization
When loading the product list, there is a plugin which is responsible for adding the position data to each row

# Data update
When updating the value of the Position_Value column, an ajax call is fired to the only controller that has the module.
This endpoint receives the data for the row to be modified and updates or creates a new record as appropriate.


