CREATE TABLE IF NOT EXISTS purchases (
  purchaseId INT AUTO_INCREMENT,
  productId  INT NOT NULL,
  unitPrice float NOT NULL,
  purchaseDate date NOT NULL,
  PRIMARY KEY (purchaseId)
);