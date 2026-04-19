INSERT INTO Airline VALUES
('Jet Blue');

INSERT INTO Airport VALUES
('JFK', 'New York City', 'USA', 'both'),
('PVG', 'Shanghai', 'China', 'international'),
('LAX', 'Los Angeles', 'USA', 'both');

INSERT INTO Customer VALUES
('justinoh@nyu.edu', 'Justin Oh', 'password',
 '5', 'Jay St', 'Brooklyn', 'NY',
 '5165328826', 'N13241601', '2030-05-10', 'USA', '2005-10-09'),

('johndoe@gmail.com', 'John Doe', 'password123',
 '10', 'Main St', 'Queens', 'NY',
 '1234567890', 'N13572468', '2029-08-20', 'USA', '2000-01-01'),

('janedoe@gmail.com', 'Jane Doe', 'password321',
 '22', 'Ocean Ave', 'Brooklyn', 'NY',
 '0987654321', 'N24681357', '2031-03-15', 'USA', '2003-03-03');

INSERT INTO Airline_Staff VALUES
('staffjb1', 'staffpass', 'Bob', 'Smith', '1990-04-18', 'bobsmith@jetblue.com', 'Jet Blue');

INSERT INTO Staff_Phone VALUES
('staffjb1', '6465552001'),
('staffjb1', '6465552002');

INSERT INTO Airplane VALUES
('Jet Blue', 101, 180, 'Airbus', '2018-06-01'),
('Jet Blue', 102, 220, 'Boeing', '2019-09-15'),
('Jet Blue', 103, 150, 'Airbus', '2020-12-20');

INSERT INTO Flight VALUES
('Jet Blue', 'JB101', '2026-03-28 08:00:00', '2026-03-28 20:00:00', 850.00, 'on-time', 'JFK', 'PVG', 101),
('Jet Blue', 'JB102', '2026-03-29 09:30:00', '2026-03-29 12:30:00', 300.00, 'delayed', 'JFK', 'LAX', 102),
('Jet Blue', 'JB103', '2026-03-30 14:00:00', '2026-03-30 22:00:00', 320.00, 'on-time', 'LAX', 'JFK', 103),
('Jet Blue', 'JB090', '2026-03-20 07:00:00', '2026-03-20 19:00:00', 780.00, 'delayed', 'JFK', 'PVG', 101);

INSERT INTO Ticket VALUES
(1, 'credit', '4111111111111111', 'Justin Oh', '2028-06-30',
 '2026-03-22', '10:15:00', 'justinoh@nyu.edu', 'Jet Blue', 'JB101', '2026-03-28 08:00:00'),

(2, 'debit', '5222222222222222', 'John Doe', '2027-11-30',
 '2026-03-22', '11:00:00', 'johndoe@gmail.com', 'Jet Blue', 'JB102', '2026-03-29 09:30:00'),

(3, 'credit', '4333333333333333', 'Jane Doe', '2029-01-31',
 '2026-03-18', '17:45:00', 'janedoe@gmail.com', 'Jet Blue', 'JB090', '2026-03-20 07:00:00');

INSERT INTO Rates VALUES
('janedoe@gmail.com', 'Jet Blue', 'JB090', '2026-03-20 07:00:00', 4, 'Flight was good but delayed.');