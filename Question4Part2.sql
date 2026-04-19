--a. Show all future flights in the system
SELECT *
FROM Flight
WHERE departure_datetime > NOW();
/*result: 

JB101
JB102
JB103

*/



--b. Show all delayed flights in the system
SELECT *
FROM Flight
WHERE status = 'delayed';
/*result: 

JB102
JB090

*/


--c. Show the customer names who bought the tickets
SELECT DISTINCT c.name
FROM Customer c
JOIN Ticket t
ON c.email = t.customer_email;
/*result: 

Justin Oh
John Doe
Jane Doe

*/


--d. Show all the airplanes owned by the airline Jet Blue
SELECT *
FROM Airplane
WHERE airline_name = 'Jet Blue';
/*result: 

101
102
103

*/