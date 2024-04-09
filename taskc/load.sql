-- TODO: assuming these are all csv files -- 
LOAD DATA LOCAL INFILE '--TODO: insert file path---' INTO TABLE Customer
  FIELDS TERMINATED BY ',' 
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (customerID, email, phoneNumber, firstName, lastName);

LOAD DATA LOCAL INFILE '--TODO: insert file path---' INTO TABLE Distributor
  FIELDS TERMINATED BY ',' 
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (companyName, distributorID);

LOAD DATA LOCAL INFILE '--TODO: insert file path---' INTO TABLE Transaction
  FIELDS TERMINATED BY ',' 
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (transactionID, customerID, itemID, distributorID);

LOAD DATA LOCAL INFILE '--TODO: insert file path---' INTO TABLE Item
  FIELDS TERMINATED BY ',' 
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (name, itemID, price, distributorID, itemType);

LOAD DATA LOCAL INFILE '--TODO: insert file path---' INTO TABLE Availability
  FIELDS TERMINATED BY ',' 
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
(itemID, distributorID, quantity, availability);