# Product Expected Delivery Days Module

This repository contains a Magento 2 module developed to manage and display expected delivery times for products. The module showcases various aspects of Magento 2 module development, including the creation of custom attributes, data patches, and dynamic frontend formatting.

## Module Purpose
The primary purpose of this module is to demonstrate skills in:
- Developing Magento 2 modules
- Managing EAV attributes via data patches
- Formatting attribute data dynamically for user-friendly frontend display

This module introduces a custom product attribute, `custom_expected_delivery_days`, which allows store administrators to specify expected delivery times for individual products. The attribute values are interpreted as either days or weeks, depending on the input.

## Repository Structure
Since this repository is tailored for simplicity, it only includes the contents of the `ProductExpectedDeliveryDays` directory. Typically, this module would reside under `app/code/Jvdh/ProductExpectedDeliveryDays` in a Magento 2 project.

### Included Components
1. **Handler Classes**
   - `Model/Handler/Output.php`: Contains reusable methods for formatting delivery time data dynamically as "days" or "weeks."

2. **Setup Data Patch**
   - `Setup/Patch/Data/AddExpectedDeliverydaysProductAttribute.php`: Creates the custom product attribute `custom_expected_delivery_days`, with validation and grouping under the attribute set.

## Configuration
The module relies on specific configurations defined in the attribute setup:

1. **Custom Product Attribute**
   - Attribute Name: `custom_expected_delivery_days`  
   - Input Type: Text field (accepts numeric values only).  
   - Validation: Enforces digits-only input.  
   - Attribute Group: Added under "Added by jvdh" for visibility in the admin panel.  

2. **Dynamic Display**
   - If the attribute value is divisible by 7, it is displayed as "weeks" (e.g., `14` becomes `2 weeks`).  
   - Otherwise, it is displayed as "days" (e.g., `5` becomes `5 days`).  

## Key Features
- **Custom Attribute Creation**: Introduces the `custom_expected_delivery_days` attribute via a data patch, ensuring modular installation and removal.
- **Dynamic Data Formatting**: Formats delivery time values into human-readable strings (e.g., days or weeks) for consistent display on the frontend.
- **Revertable Data Patch**: Allows for clean removal of the attribute if the module is no longer needed.
- **Validation**: Ensures the attribute accepts only valid numeric input, reducing admin errors.

## Notes
- This module is designed as a technical demonstration and may require additional customization for production use.  
- Proper testing is recommended when enabling the attribute for frontend or API usage.  

## License
This project is licensed under the MIT License. Feel free to use and modify it as needed.

## Author
Developed by me.

## Contact
For any questions or further discussions, please feel free to contact me via [LinkedIn profile](https://www.linkedin.com/in/jonasvdh/).