CREATE TABLE transactions (
    transactionID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    products TEXT,
    total DECIMAL(10, 2),
    payment VARCHAR(50),
    status VARCHAR(50)
);
