-- Create the Products table
CREATE TABLE Products (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Image VARCHAR(255),
    Availability BOOLEAN DEFAULT TRUE

);

-- Insert data into the Products table
INSERT INTO Products (Name, Price, Image, Availability) VALUES
('Iced Mixed Berries', 150.00, NULL, TRUE),
('Matcha', 60.00, NULL, TRUE),
('Strawberry Milk', 129.00, NULL, FALSE);
