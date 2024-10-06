-- Create Customers Table
CREATE TABLE Customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone_number VARCHAR(20),
    postal_code VARCHAR(10),
    is_member BOOLEAN DEFAULT false
);

-- Populate Customers Table
INSERT INTO Customers (full_name, email, phone_number, postal_code, is_member) VALUES
('John Doe', 'john.doe1@example.com', '1234567890', '12345', true),
('Jane Smith', 'jane.smith@example.com', '0987654321', '67890', true),
('User 3', 'user3@example.com', '1231231234', '11223', true),
('User 4', 'user4@example.com', '5675675678', '44556', true),
('User 5', 'user5@example.com', '9109109101', '77889', false),
('User 6', 'user6@example.com', '1111111111', '22334', true),
('User 7', 'user7@example.com', '2222222222', '55667', false),
('User 8', 'user8@example.com', '3333333333', '88990', true),
('User 9', 'user9@example.com', '4444444444', '11212', true),
('User 10', 'user10@example.com', '5555555555', '33445', false),
('User 11', 'user11@example.com', '6666666666', '55678', true),
('User 12', 'user12@example.com', '7777777777', '77889', true),
('User 13', 'user13@example.com', '8888888888', '88990', false),
('User 14', 'user14@example.com', '9999999999', '99001', true),
('User 15', 'user15@example.com', '1010101010', '00112', false),
('User 16', 'user16@example.com', '1212121212', '11223', true),
('User 17', 'user17@example.com', '1313131313', '22334', true),
('User 18', 'user18@example.com', '1414141414', '33445', false),
('User 19', 'user19@example.com', '1515151515', '44556', true),
('User 20', 'user20@example.com', '1616161616', '55667', false),
('User 21', 'user21@example.com', '1717171717', '66778', true),
('User 22', 'user22@example.com', '1818181818', '77889', true),
('User 23', 'user23@example.com', '1919191919', '88990', false),
('User 24', 'user24@example.com', '2020202020', '99001', true),
('User 25', 'user25@example.com', '2121212121', '00112', false),
('User 26', 'user26@example.com', '2222222222', '11223', true),
('User 27', 'user27@example.com', '2323232323', '22334', true),
('User 28', 'user28@example.com', '2424242424', '33445', false),
('User 29', 'user29@example.com', '2525252525', '44556', true),
('User 30', 'user30@example.com', '2626262626', '55667', false);
