LOAD DATA LOCAL INFILE 'taskc/customer.csv' INTO TABLE Customer
  FIELDS TERMINATED BY ',' 
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (customerID, email, phoneNumber, firstName, lastName);

LOAD DATA LOCAL INFILE 'taskc/distributor.csv' INTO TABLE Distributor
  FIELDS TERMINATED BY ',' 
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (companyName, distributorID);

LOAD DATA LOCAL INFILE 'taskc/transaction.csv' INTO TABLE Transaction
  FIELDS TERMINATED BY ',' 
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (transactionID, customerID, itemID, distributorID);

LOAD DATA LOCAL INFILE 'taskc/item.csv' INTO TABLE Item
  FIELDS TERMINATED BY ',' 
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (name, itemID, price, distributorID, itemType);

LOAD DATA LOCAL INFILE 'taskc/availability.csv' INTO TABLE Availability
  FIELDS TERMINATED BY ',' 
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
(itemID, distributorID, quantity, availability);