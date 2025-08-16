-- OUTSINC Database Schema
-- Create database and tables for the OUTSINC portal

CREATE DATABASE IF NOT EXISTS outsinc_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE outsinc_db;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    email VARCHAR(100) UNIQUE,
    password_hash VARCHAR(255),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    phone VARCHAR(20),
    role ENUM('client', 'staff', 'provider', 'admin') DEFAULT 'client',
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Chat operators table
CREATE TABLE chat_operators (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    is_active BOOLEAN DEFAULT FALSE,
    last_active TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('online', 'away', 'offline') DEFAULT 'offline',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Chat sessions table
CREATE TABLE chat_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(100) UNIQUE,
    user_id INT NULL,
    operator_id INT NULL,
    status ENUM('waiting', 'active', 'completed', 'abandoned') DEFAULT 'waiting',
    started_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ended_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (operator_id) REFERENCES chat_operators(id) ON DELETE SET NULL
);

-- Chat messages table
CREATE TABLE chat_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id INT,
    sender_type ENUM('user', 'operator', 'system') DEFAULT 'user',
    sender_id INT NULL,
    message TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (session_id) REFERENCES chat_sessions(id) ON DELETE CASCADE
);

-- Reports/Issues table
CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    case_id VARCHAR(20) UNIQUE,
    category ENUM('housing', 'health', 'safety', 'access', 'discrimination', 'other') DEFAULT 'other',
    location VARCHAR(255),
    description TEXT,
    photo_path VARCHAR(255) NULL,
    reporter_name VARCHAR(100) NULL,
    reporter_contact VARCHAR(100) NULL,
    status ENUM('new', 'reviewing', 'in_progress', 'resolved', 'closed') DEFAULT 'new',
    assigned_to INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL
);

-- Service providers table
CREATE TABLE service_providers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200),
    category ENUM('housing', 'health', 'harm_reduction', 'id', 'employment', 'legal') DEFAULT 'other',
    description TEXT,
    services_offered TEXT,
    address VARCHAR(500),
    phone VARCHAR(20),
    email VARCHAR(100),
    website VARCHAR(255),
    hours TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    is_open_now BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Resource directory table
CREATE TABLE resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200),
    category VARCHAR(100),
    description TEXT,
    contact_info TEXT,
    hours TEXT,
    address VARCHAR(500),
    phone VARCHAR(20),
    website VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    is_featured BOOLEAN DEFAULT FALSE,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- User favorites table
CREATE TABLE user_favorites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    resource_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (resource_id) REFERENCES resources(id) ON DELETE CASCADE,
    UNIQUE KEY unique_favorite (user_id, resource_id)
);

-- Cases table (for care plans)
CREATE TABLE cases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    case_id VARCHAR(20) UNIQUE,
    user_id INT NULL,
    title VARCHAR(200),
    description TEXT,
    status ENUM('draft', 'active', 'completed', 'on_hold') DEFAULT 'draft',
    priority ENUM('low', 'medium', 'high', 'urgent') DEFAULT 'medium',
    assigned_provider_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (assigned_provider_id) REFERENCES service_providers(id) ON DELETE SET NULL
);

-- Contact requests table
CREATE TABLE contact_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('chat', 'message', 'callback') DEFAULT 'message',
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    subject VARCHAR(200),
    message TEXT,
    status ENUM('new', 'responded', 'closed') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    responded_at TIMESTAMP NULL
);

-- Directory suggestions table
CREATE TABLE directory_suggestions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    resource_name VARCHAR(200),
    category VARCHAR(100),
    description TEXT,
    contact_info TEXT,
    suggested_by_email VARCHAR(100) NULL,
    attachment_path VARCHAR(255) NULL,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    reviewed_by INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reviewed_at TIMESTAMP NULL,
    FOREIGN KEY (reviewed_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Admin settings table
CREATE TABLE admin_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) UNIQUE,
    setting_value TEXT,
    description VARCHAR(500),
    updated_by INT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Insert default admin settings
INSERT INTO admin_settings (setting_key, setting_value, description) VALUES 
('impact_counters_enabled', 'true', 'Show impact counters on landing page'),
('events_announcements_enabled', 'false', 'Show events and announcements section'),
('chat_enabled', 'true', 'Enable chat functionality'),
('directory_suggestions_enabled', 'true', 'Allow anonymous directory suggestions'),
('cta_rotation_speed', '8', 'CTA carousel rotation speed in seconds'),
('site_maintenance', 'false', 'Site maintenance mode');

-- Insert sample data for development
INSERT INTO users (username, email, first_name, last_name, role) VALUES 
('admin', 'admin@outsinc.ca', 'Admin', 'User', 'admin'),
('operator1', 'operator1@outsinc.ca', 'Chat', 'Operator', 'staff'),
('testuser', 'test@example.com', 'Test', 'User', 'client');

INSERT INTO chat_operators (user_id, is_active, status) VALUES 
(2, true, 'online');

INSERT INTO service_providers (name, category, description, services_offered, phone, hours, is_active) VALUES 
('Housing Help Center', 'housing', 'Emergency housing assistance and support', 'Emergency shelter, transitional housing, housing search assistance', '555-0101', 'Monday-Friday 9AM-5PM, Saturday 10AM-2PM', true),
('Community Health Clinic', 'health', 'Primary healthcare services', 'Medical care, mental health support, addiction services', '555-0102', '24/7 Emergency, Clinic hours Monday-Friday 8AM-6PM', true),
('Legal Aid Society', 'legal', 'Free legal assistance for low-income individuals', 'Housing law, family law, immigration, benefits assistance', '555-0103', 'Monday, Wednesday, Friday 9AM-4PM', true);

INSERT INTO resources (name, category, description, contact_info, hours, is_active, is_featured) VALUES 
('Downtown Food Bank', 'Food & Nutrition', 'Emergency food assistance and meal programs', 'Phone: 555-0201, Email: info@downtownfoodbank.org', 'Tuesday & Thursday 10AM-2PM', true, true),
('Crisis Text Line', 'Mental Health', '24/7 crisis support via text', 'Text HOME to 741741', '24/7', true, false),
('Transit Help Desk', 'Transportation', 'Public transit passes and information', 'Phone: 555-0203, Located at Main Transit Center', 'Monday-Friday 7AM-7PM', true, false);