-- OUTSINC Seed Data
-- Demo accounts and sample data for development and testing

USE outsinc_db;

-- Clear existing data (for fresh installs)
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE chat_messages;
TRUNCATE TABLE chat_sessions;
TRUNCATE TABLE chat_operators;
TRUNCATE TABLE contact_requests;
TRUNCATE TABLE directory_suggestions;
TRUNCATE TABLE user_favorites;
TRUNCATE TABLE reports;
TRUNCATE TABLE cases;
TRUNCATE TABLE users;
TRUNCATE TABLE service_providers;
TRUNCATE TABLE resources;
TRUNCATE TABLE admin_settings;
SET FOREIGN_KEY_CHECKS = 1;

-- Demo user accounts with different roles
INSERT INTO users (id, username, email, password_hash, first_name, last_name, phone, role, is_active) VALUES 
(1, 'admin', 'admin@outsinc.ca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System', 'Administrator', '555-0100', 'admin', true),
(2, 'staff1', 'staff@outsinc.ca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Sarah', 'Johnson', '555-0101', 'staff', true),
(3, 'operator1', 'operator@outsinc.ca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Mike', 'Chen', '555-0102', 'staff', true),
(4, 'client1', 'client@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Alex', 'Smith', '555-0201', 'client', true),
(5, 'provider1', 'provider@housing.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Maria', 'Rodriguez', '555-0301', 'provider', true);

-- Demo account passwords (all use 'password123' for testing)
-- Hash: $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi

-- Chat operators setup
INSERT INTO chat_operators (id, user_id, is_active, status, last_active) VALUES 
(1, 3, true, 'online', NOW()),
(2, 2, false, 'offline', DATE_SUB(NOW(), INTERVAL 3 HOUR));

-- Sample service providers
INSERT INTO service_providers (id, name, category, description, services_offered, address, phone, email, website, hours, is_active, is_open_now) VALUES 
(1, 'Downtown Housing Help Center', 'housing', 'Emergency housing assistance and long-term housing support', 'Emergency shelter, transitional housing, housing search assistance, rent supplements', '123 Main St, Downtown', '555-0401', 'info@housinghelp.org', 'https://housinghelp.org', 'Monday-Friday 9AM-5PM, Saturday 10AM-2PM', true, true),
(2, 'Community Health Clinic', 'health', 'Comprehensive primary healthcare services for all', 'Medical care, mental health support, addiction services, pharmacy', '456 Health Ave, Midtown', '555-0402', 'contact@communityclinic.org', 'https://communityclinic.org', '24/7 Emergency, Clinic hours Monday-Friday 8AM-6PM', true, true),
(3, 'Safe Harbor Crisis Center', 'harm_reduction', 'Crisis intervention and harm reduction services', 'Crisis counseling, needle exchange, safe consumption, overdose prevention', '789 Safety Blvd, Eastside', '555-0403', 'help@safeharbor.org', 'https://safeharbor.org', '24/7 Crisis Line, Drop-in Monday-Sunday 9AM-9PM', true, true),
(4, 'Legal Aid Society', 'legal', 'Free legal assistance for low-income individuals and families', 'Housing law, family law, immigration, benefits assistance, tenant rights', '321 Justice St, Legal District', '555-0404', 'intake@legalaid.org', 'https://legalaid.org', 'Monday, Wednesday, Friday 9AM-4PM', true, false),
(5, 'WorkForward Employment Center', 'employment', 'Job training and employment placement services', 'Job search assistance, resume building, interview prep, skills training', '654 Career Rd, Business District', '555-0405', 'jobs@workforward.org', 'https://workforward.org', 'Monday-Thursday 8AM-5PM, Friday 8AM-3PM', true, true),
(6, 'ID & Documents Help Desk', 'id', 'Assistance with obtaining identification and essential documents', 'Birth certificates, ID cards, passport applications, social insurance numbers', 'City Hall Annex, 987 Government Way', '555-0406', 'docs@cityservices.gov', 'https://cityservices.gov/id-help', 'Tuesday & Thursday 10AM-4PM, Saturday 9AM-1PM', true, false);

-- Sample resources for directory
INSERT INTO resources (id, name, category, description, contact_info, hours, address, phone, website, is_active, is_featured, last_updated) VALUES 
(1, 'Downtown Food Bank', 'Food & Nutrition', 'Emergency food assistance and meal programs for individuals and families', 'Phone: 555-0501, Email: info@downtownfoodbank.org', 'Tuesday & Thursday 10AM-2PM, Saturday 9AM-12PM', '147 Food Bank Lane', '555-0501', 'https://downtownfoodbank.org', true, true, NOW()),
(2, 'Crisis Text Line', 'Mental Health', '24/7 crisis support via text message - free and confidential', 'Text HOME to 741741', '24/7', 'Text-based service', '741741', 'https://crisistextline.org', true, true, NOW()),
(3, 'Transit Help Desk', 'Transportation', 'Public transit passes, reduced fares, and transportation information', 'Phone: 555-0502, Located at Main Transit Center', 'Monday-Friday 7AM-7PM, Saturday 8AM-4PM', 'Main Transit Center, 258 Transit Way', '555-0502', 'https://publictransit.city', true, false, NOW()),
(4, 'Warm Meals Kitchen', 'Food & Nutrition', 'Hot meals served daily, no questions asked', 'Drop-in service, Phone: 555-0503', 'Daily 11:30AM-1PM, 5PM-6:30PM', '369 Community Center Dr', '555-0503', null, true, false, NOW()),
(5, 'Free Legal Clinic', 'Legal', 'Walk-in legal advice and brief services', 'First-come, first-served. Phone: 555-0504', 'Saturdays 10AM-2PM', '753 Law Center Bldg', '555-0504', 'https://freelegalclinic.org', true, false, NOW()),
(6, 'Clothing Closet', 'Basic Needs', 'Free clothing for all ages and sizes', 'Phone: 555-0505, Email: help@clothingcloset.org', 'Wednesday & Friday 1PM-4PM', '852 Charity Ave', '555-0505', 'https://clothingcloset.org', true, false, NOW()),
(7, 'Mental Health Drop-in Center', 'Mental Health', 'Peer support and mental health resources', 'Phone: 555-0506, Walk-ins welcome', 'Monday-Friday 10AM-6PM', '951 Wellness Blvd', '555-0506', 'https://mentalhealthcenter.org', true, true, NOW()),
(8, 'Job Training Center', 'Employment', 'Skills training and employment preparation programs', 'Phone: 555-0507, Email: training@jobcenter.org', 'Monday-Thursday 9AM-4PM', '159 Skills St', '555-0507', 'https://jobtrainingcenter.org', true, false, NOW());

-- Sample cases (care plans)
INSERT INTO cases (id, case_id, user_id, title, description, status, priority, assigned_provider_id) VALUES 
(1, 'CASE-2024-001', 4, 'Housing assistance needed', 'Client needs emergency housing due to eviction notice', 'active', 'high', 1),
(2, 'CASE-2024-002', 4, 'Healthcare enrollment', 'Help enrolling in provincial healthcare program', 'active', 'medium', 2);

-- Sample reports
INSERT INTO reports (id, case_id, category, location, description, reporter_name, reporter_contact, status, assigned_to) VALUES 
(1, 'RPT-2024-001', 'housing', '123 Elm Street Apartment Building', 'No heat in building for 3 days, multiple families affected', 'Anonymous', null, 'new', 2),
(2, 'RPT-2024-002', 'safety', 'Downtown Transit Station', 'Poor lighting and safety concerns in evening hours', 'Alex Smith', 'alexsmith@email.com', 'reviewing', 2);

-- Sample contact requests
INSERT INTO contact_requests (id, type, name, email, phone, subject, message, status) VALUES 
(1, 'callback', 'Jennifer Wilson', 'jwilson@email.com', '555-0601', 'Need help finding housing', 'I have been on the waiting list for housing for 6 months and need assistance', 'new'),
(2, 'message', 'Robert Kim', 'rkim@email.com', null, 'Questions about mental health services', 'What mental health services are available through OUTSINC?', 'new');

-- User favorites
INSERT INTO user_favorites (user_id, resource_id) VALUES 
(4, 1), -- Client favorited Downtown Food Bank
(4, 2), -- Client favorited Crisis Text Line
(4, 7); -- Client favorited Mental Health Drop-in Center

-- Directory suggestions
INSERT INTO directory_suggestions (id, resource_name, category, description, contact_info, suggested_by_email, status) VALUES 
(1, 'New Community Garden', 'Food & Nutrition', 'Community garden offering fresh produce to local families', 'Located at 456 Garden St, contact: garden@community.org', 'community@example.com', 'pending');

-- Admin settings
INSERT INTO admin_settings (setting_key, setting_value, description, updated_by) VALUES 
('impact_counters_enabled', 'true', 'Show impact counters on landing page', 1),
('events_announcements_enabled', 'false', 'Show events and announcements section', 1),
('chat_enabled', 'true', 'Enable chat functionality', 1),
('directory_suggestions_enabled', 'true', 'Allow anonymous directory suggestions', 1),
('cta_rotation_speed', '8', 'CTA carousel rotation speed in seconds', 1),
('site_maintenance', 'false', 'Site maintenance mode', 1),
('debug_mode', 'true', 'Enable debug mode and detailed error logging', 1),
('max_file_upload_size', '5242880', 'Maximum file upload size in bytes (5MB)', 1);

-- Sample chat session (for testing)
INSERT INTO chat_sessions (id, session_id, user_id, operator_id, status, started_at) VALUES 
(1, 'chat_session_demo_001', 4, 1, 'completed', DATE_SUB(NOW(), INTERVAL 1 HOUR));

INSERT INTO chat_messages (session_id, sender_type, sender_id, message, timestamp) VALUES 
(1, 'user', 4, 'Hello, I need help finding housing resources', DATE_SUB(NOW(), INTERVAL 1 HOUR)),
(1, 'operator', 3, 'Hi! I can definitely help you with housing resources. What type of housing assistance are you looking for?', DATE_SUB(NOW(), INTERVAL 58 MINUTE)),
(1, 'user', 4, 'I need emergency housing, I received an eviction notice', DATE_SUB(NOW(), INTERVAL 55 MINUTE)),
(1, 'operator', 3, 'I understand this is urgent. Let me connect you with our Downtown Housing Help Center. They have emergency shelter options available.', DATE_SUB(NOW(), INTERVAL 50 MINUTE));

-- Reset auto-increment counters to ensure consistent IDs
ALTER TABLE users AUTO_INCREMENT = 6;
ALTER TABLE service_providers AUTO_INCREMENT = 7;
ALTER TABLE resources AUTO_INCREMENT = 9;
ALTER TABLE cases AUTO_INCREMENT = 3;
ALTER TABLE reports AUTO_INCREMENT = 3;
ALTER TABLE contact_requests AUTO_INCREMENT = 3;
ALTER TABLE directory_suggestions AUTO_INCREMENT = 2;
ALTER TABLE chat_sessions AUTO_INCREMENT = 2;