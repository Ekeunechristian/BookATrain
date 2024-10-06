
-- Create the Schedules table with the additional attribute
CREATE TABLE Schedules (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    operator VARCHAR(255) NOT NULL,
    departure_time DATETIME NOT NULL,
    arrival_time DATETIME NOT NULL,
    duration TIME GENERATED ALWAYS AS (TIMEDIFF(arrival_time, departure_time)) STORED,
    price DECIMAL(10, 2) NOT NULL,
    train_id INT NOT NULL,
    start_point VARCHAR(255) NOT NULL,
    end_point VARCHAR(255) NOT NULL,
    available_tickets INT NOT NULL
    number_of_changes INT DEFAULT 0,
    FOREIGN KEY (train_id) REFERENCES Trains(train_id)
);

--  Populate the  Schedules table with the data
INSERT INTO Schedules (operator, departure_time, arrival_time, price, train_id, start_point, end_point, number_of_changes) VALUES
('Avanti West Coast', '2024-07-01 08:00:00', '2024-07-01 10:00:00', 50.00, 1, 'London Euston', 'Manchester Piccadilly', 0),
('Avanti West Coast', '2024-07-01 09:00:00', '2024-07-01 11:00:00', 45.00, 2, 'Birmingham New Street', 'Leeds', 2),
('West Midlands Trains', '2024-07-01 10:00:00', '2024-07-01 12:00:00', 40.00, 3, 'Glasgow Central', 'Liverpool Lime Street', 0),
('CrossCountry', '2024-07-01 11:00:00', '2024-07-01 13:00:00', 55.00, 4, 'Edinburgh Waverley', 'Bristol Temple Meads', 0),
('Great Western Railway', '2024-07-01 12:00:00', '2024-07-01 14:00:00', 35.00, 5, 'Reading', 'York', 1),
('Northern Rail', '2024-07-01 13:00:00', '2024-07-01 15:00:00', 35.00, 6, 'Newcastle', 'Sheffield', 0),
('East Midlands Railway', '2024-07-01 14:00:00', '2024-07-01 16:00:00', 35.00, 7, 'Nottingham', 'Cardiff Central', 0),
('Southern', '2024-07-01 15:00:00', '2024-07-01 17:00:00', 20.00, 8, 'Southampton Central', 'Brighton', 0),
('Greater Anglia', '2024-07-01 16:00:00', '2024-07-01 18:00:00', 40.00, 9, 'Norwich', 'Exeter St Davids', 0),
('East Midlands Railway', '2024-07-01 17:00:00', '2024-07-01 19:00:00', 25.00, 10, 'Cambridge', 'Leicester', 0),
('Avanti West Coast', '2024-07-02 08:00:00', '2024-07-02 10:00:00', 50.00, 1, 'London Euston', 'Manchester Piccadilly', 0),
('Avanti West Coast', '2024-07-02 09:00:00', '2024-07-02 11:00:00', 45.00, 2, 'Birmingham New Street', 'Leeds', 0),
('West Midlands Trains', '2024-07-02 10:00:00', '2024-07-02 12:00:00', 40.00, 3, 'Glasgow Central', 'Liverpool Lime Street', 0),
('CrossCountry', '2024-07-02 11:00:00', '2024-07-02 13:00:00', 55.00, 4, 'Edinburgh Waverley', 'Bristol Temple Meads', 0),
('Great Western Railway', '2024-07-02 12:00:00', '2024-07-02 14:00:00', 35.00, 5, 'Reading', 'York', 1),
('Great Western Railway', '2024-07-02 12:00:00', '2024-07-02 14:00:00', 22.00, 5, 'Reading', 'York', 2),
('Great Western Railway', '2024-07-02 12:00:00', '2024-07-02 14:00:00', 50.00, 5, 'Reading', 'York', 4),
('Great Western Railway', '2024-07-02 12:00:00', '2024-07-02 14:00:00', 75.00, 5, 'Reading', 'York', 5),
('Great Western Railway', '2024-07-02 12:00:00', '2024-07-02 14:00:00', 30.00, 5, 'Reading', 'York', 6),
('Northern Rail', '2024-07-02 13:00:00', '2024-07-02 15:00:00', 25.00, 6, 'Newcastle', 'Sheffield', 0),
('East Midlands Railway', '2024-07-02 14:00:00', '2024-07-02 16:00:00', 35.00, 7, 'Nottingham', 'Cardiff Central', 0),
('Southern', '2024-07-02 15:00:00', '2024-07-02 17:00:00', 20.00, 8, 'Southampton Central', 'Brighton', 0),
('Greater Anglia', '2024-07-02 16:00:00', '2024-07-02 18:00:00', 40.00, 9, 'Norwich', 'Exeter St Davids', 0),
('East Midlands Railway', '2024-07-02 17:00:00', '2024-07-02 19:00:00', 25.00, 10, 'Cambridge', 'Leicester', 0),
('Avanti West Coast', '2024-07-03 08:00:00', '2024-07-03 10:00:00', 50.00, 1, 'London Euston', 'Manchester Piccadilly', 0),
('Avanti West Coast', '2024-07-03 09:00:00', '2024-07-03 11:00:00', 45.00, 2, 'Birmingham New Street', 'Leeds', 0),
('West Midlands Trains', '2024-07-03 10:00:00', '2024-07-03 12:00:00', 40.00, 3, 'Glasgow Central', 'Liverpool Lime Street', 0),
('CrossCountry', '2024-07-03 11:00:00', '2024-07-03 13:00:00', 55.00, 4, 'Edinburgh Waverley', 'Bristol Temple Meads', 0),
('Great Western Railway', '2024-07-03 12:00:00', '2024-07-03 14:00:00', 30.00, 5, 'Reading', 'York', 0),
('Northern Rail', '2024-07-03 13:00:00', '2024-07-03 15:00:00', 25.00, 6, 'Newcastle', 'Sheffield', 0),
('East Midlands Railway', '2024-07-03 14:00:00', '2024-07-03 16:00:00', 35.00, 7, 'Nottingham', 'Cardiff Central', 0),
('Southern', '2024-07-03 15:00:00', '2024-07-03 17:00:00', 20.00, 8, 'Southampton Central', 'Brighton', 0),
('Greater Anglia', '2024-07-03 16:00:00', '2024-07-03 18:00:00', 40.00, 9, 'Norwich', 'Exeter St Davids', 0),
('East Midlands Railway', '2024-07-03 17:00:00', '2024-07-03 19:00:00', 25.00, 10, 'Cambridge', 'Leicester', 0),
('Avanti West Coast', '2024-07-04 08:00:00', '2024-07-04 10:00:00', 50.00, 1, 'London Euston', 'Manchester Piccadilly', 7),
('Avanti West Coast', '2024-07-04 09:00:00', '2024-07-04 11:00:00', 45.00, 2, 'Birmingham New Street', 'Leeds', 5),
('West Midlands Trains', '2024-07-04 10:00:00', '2024-07-04 12:00:00', 40.00, 3, 'Glasgow Central', 'Liverpool Lime Street', 0);

