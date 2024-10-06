-- Create Bookings Table
CREATE TABLE Bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    train_id INT NOT NULL,
    booking_date DATETIME NOT NULL,
    number_of_tickets INT NOT NULL,
    customer_id INT NOT NULL,
    member_id INT,
    card_id INT,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (train_id) REFERENCES Trains(train_id),
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id),
    FOREIGN KEY (member_id) REFERENCES MemberCustomers(member_id),
    FOREIGN KEY (card_id) REFERENCES RailCards(card_id)
);

-- Populate Bookings Table
INSERT INTO Bookings (train_id, booking_date, number_of_tickets, customer_id, member_id, card_id, total_price) VALUES
(14, '2024-07-01 07:30:00', 1, 1, 9, 1, 90.00),
(15, '2024-07-01 08:00:00', 5, 2, 10, 2, 135.00);



