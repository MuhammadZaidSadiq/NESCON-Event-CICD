CREATE DATABASE IF NOT EXISTS nescon_db;
USE nescon_db;
CREATE TABLE IF NOT EXISTS events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  category VARCHAR(80) NOT NULL,
  event_date VARCHAR(50) NOT NULL,
  venue VARCHAR(120) NOT NULL,
  seats INT NOT NULL DEFAULT 100
);
CREATE TABLE IF NOT EXISTS registrations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(120) NOT NULL,
  event_id INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (event_id) REFERENCES events(id)
);
INSERT INTO events (title, category, event_date, venue, seats) VALUES
('Opening Ceremony & Keynote','Main Event','Day 1 - 9:00 AM','Main Auditorium',300),
('Robo Wars','Competition','Day 1 - 11:00 AM','EE Block Ground',80),
('Speed Programming','Competition','Day 1 - 2:00 PM','CS Labs',120),
('Gaming Arena - FIFA & Tekken','Gaming','Day 2 - 10:00 AM','Student Lounge',100),
('Project Exhibition','Exhibition','Day 2 - 12:00 PM','Main Hall',150),
('Closing & Prize Distribution','Main Event','Day 2 - 4:00 PM','Main Auditorium',300);
