-- Create Payments Table
CREATE TABLE Payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_method ENUM('credit_card', 'paypal', 'bank_transfer') NOT NULL,
    payment_date DATETIME NOT NULL,
    customer_id INT,
    member_id INT,
    FOREIGN KEY (booking_id) REFERENCES Bookings(booking_id),
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id),
    FOREIGN KEY (member_id) REFERENCES MemberCustomers(member_id)
);

-- Populate Payments Table
INSERT INTO Payments (booking_id, amount, payment_method, payment_date, customer_id, member_id) VALUES
(14, 90.00, 'credit_card', '2024-07-01 07:45:00', 5, 10),
(15, 135.00, 'paypal', '2024-07-01 08:15:00', 2, 11);



