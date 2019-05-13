Task Description:

Personal mini car inventory system from scratch. The system will have inventory of manufacturer and models (cars) of each manufacturer owned.


Technology to be used:

PHP 7 (OOP), MySql (Normalized Database Schema), Javascript (JQuery -  AJAX), HTML and CSS.


Classes to be created:	

Database - Class to deal with each and every operation of database.

Manufacturer - Class to deal with all operations related to car manufacturer.

Model  - Class to deal with all operations related to car model.



Page 1: Add Manufacturer.
The page should contain a input box for manufacturer name and a submit button. 


Page 2: Add Model.
This page should have a manufacturer dropdown on the right side and model name textbox on the left side (Both should be in the same line)


Add other details below about the car like “Color, manufacturing year, registration number, note and 2 pictures”. Pictures should be uploaded using any ajax plugin.


And lastly there should be a submit button.


Page 3: View Inventory.

This page should populate a table of all the models and manufacturers from the DB. 

It should have the columns as below

Serial Number, Manufacturer Name, Model Name, Count


eg. 

1.	 Maruti                  WagonR                  2 

2.       Tata                 Nano                   1



On clicking on the row, a popup will appear which will have details of the individual models like color, manufacturing year etc. (Basically all details from page 2) and a Sold clickable link.


On clicking Sold, the row will be deleted and the DB will be updated accordingly.
