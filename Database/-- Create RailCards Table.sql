Create RailCards Table
CREATE TABLE RailCards (
    card_id INT AUTO_INCREMENT PRIMARY KEY,
    card_type VARCHAR(255) NOT NULL,
    discount_rate DECIMAL(5, 2) NOT NULL
);

-- Populate RailCards Table
INSERT INTO RailCards (card_type, discount_rate) VALUES
('16-17 Saver', 50.00),
('16-25 Railcard', 33.00),
('26-30 Railcard', 35.00),
('Disabled Persons Railcard', 40.00),
('Family & Friends Railcard', 30.00),
('Network Railcard', 25.00),
('Senior Railcard', 20.00),
('Two Together Railcard', 33.00),
('Veterans Railcard', 34.00);

