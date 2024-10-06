
CREATE TABLE user_selections (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    travel_date_time DATETIME NOT NULL,
    arriving_date_time DATETIME NOT NULL,
    number_of_tickets INT NOT NULL,
    card_id VARCHAR(50),
    member_type VARCHAR(255),
    seat_position VARCHAR(50),
    seat_direction VARCHAR(50),
    seat_type VARCHAR(50),
    seat_number VARCHAR(10),
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255),
    duration TIME,
    price DECIMAL(10, 2),
    operator VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    ticket_number VARCHAR(50),
    start_point VARCHAR(255) NOT NULL,
    end_point VARCHAR(255) NOT NULL
);
