
CREATE TABLE MemberCustomers (
    member_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    card_id INT NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id),
    FOREIGN KEY (card_id) REFERENCES RailCards(card_id)
);
INSERT INTO MemberCustomers (customer_id, card_id, username, password, email, phone_number) 
VALUES (9, 1, 'John_does', 'Password123', 'john_doe@example.com', '123-456-7890');



