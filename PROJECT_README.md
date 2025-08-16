# OUTSINC Portal Development Setup

This repository contains the complete implementation of the OUTSINC landing page and portal system based on the specifications in the README.md file.

## Project Overview

OUTSINC is a comprehensive portal that helps users navigate housing, health, ID services, and more. The system features:

- **Accessible Design**: Full accessibility controls with theme switching, font adjustments, and screen reader support
- **Mobile-First**: Responsive design optimized for mobile devices
- **Interactive Components**: Rotating CTAs, live chat, impact counters, and more
- **Form Processing**: Report submissions, contact forms, and callback requests
- **Resource Directory**: Searchable directory with favorites functionality
- **Service Provider Network**: Information and partnership portal

## Technical Stack

- **Backend**: PHP 7.4+ with MySQL database
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Database**: MySQL with phpMyAdmin support
- **Styling**: Custom CSS framework with accessibility features
- **Theme**: "Minimal Line + Neon Glow" design system

## Quick Start

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- phpMyAdmin (optional, for database management)

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd OUTSINC
   ```

2. **Set up the database**
   ```bash
   mysql -u root -p -e "CREATE DATABASE outsinc_db;"
   mysql -u root -p outsinc_db < database_schema.sql
   ```

3. **Configure database connection**
   Edit `config/database.php` with your database credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'outsinc_db');
   define('DB_USER', 'your_username');
   define('DB_PASS', 'your_password');
   ```

4. **Set up web server**
   Point your web server document root to the project directory.
   
   For Apache, ensure mod_rewrite is enabled for clean URLs.

5. **Set permissions**
   ```bash
   chmod 755 logs/
   chmod 755 uploads/
   ```

6. **Test the installation**
   Visit your local server URL to see the landing page.

## File Structure

```
OUTSINC/
├── api/                    # API endpoints
│   ├── chat-status.php    # Chat operator status
│   ├── impact-counters.php # Statistics API
│   ├── submit-report.php  # Report submission
│   └── callback-request.php # Callback requests
├── assets/                 # Static assets
│   ├── css/
│   │   ├── main.css       # Core styles and theme system
│   │   └── components.css # Component-specific styles
│   ├── js/
│   │   └── main.js        # Core JavaScript functionality
│   └── images/            # Images and media files
├── config/                # Configuration files
│   ├── database.php       # Database connection
│   └── config.php         # Site configuration
├── includes/              # Shared PHP includes
│   └── functions.php      # Utility functions
├── pages/                 # Page templates
│   ├── landing.php        # Main landing page
│   ├── chat-ops.php       # Chat operations console
│   ├── directory.php      # Resource directory
│   ├── report.php         # Issue reporting page
│   ├── providers.php      # Service providers info
│   └── 404.php           # Error page
├── logs/                  # Error logs (writable)
├── uploads/               # User uploads (writable)
├── .htaccess             # Apache configuration
├── database_schema.sql   # Database schema
├── index.php            # Main entry point
├── WORKFLOW.md          # Development workflow
└── TASKS.md             # Detailed task list
```

## Key Features Implemented

### Landing Page Components
- ✅ Top Navigation with accessibility controls
- ✅ Scrolling Marquee for announcements
- ✅ Rotating Call-to-Actions (5 slides)
- ✅ Featured App Spotlight (MOMCARE)
- ✅ Other Apps Showcase grid
- ✅ Contact Us with callback form
- ✅ Report an Issue form with file upload
- ✅ Service Providers categories
- ✅ Resource Directory preview
- ✅ Footer with all required links
- ✅ Chat Bubble with presence status
- ✅ Impact Counters with animations

### Accessibility Features
- ✅ Theme switching (Light/Dark/High Contrast)
- ✅ Font size controls (Small/Medium/Large/XL)
- ✅ Dyslexia-friendly font option
- ✅ Keyboard navigation support
- ✅ Screen reader compatibility
- ✅ Reduced motion preferences
- ✅ ARIA labels and roles
- ✅ Focus management

### Interactive Features
- ✅ Auto-rotating CTA carousel with manual controls
- ✅ Real-time chat presence status
- ✅ Animated impact counters
- ✅ Form validation and AJAX submissions
- ✅ File upload with validation
- ✅ Mobile-responsive navigation
- ✅ Smooth scrolling and animations

## API Endpoints

- `GET /api/chat-status.php` - Chat operator presence status
- `GET /api/impact-counters.php` - Live statistics
- `POST /api/submit-report.php` - Submit issue reports
- `POST /api/callback-request.php` - Request callbacks

## Routes

- `/` - Landing page
- `/chat-ops` - Operator console
- `/directory` - Full resource directory
- `/report` - Standalone report form
- `/providers` - Service provider information

## Development

### Testing
Run through the testing checklist in `TASKS.md`:
- Form submissions
- Accessibility controls
- Mobile responsiveness
- Cross-browser compatibility
- API endpoints

### Customization
- Update colors and branding in CSS custom properties
- Modify content in the database or page templates
- Add new API endpoints in the `api/` directory
- Extend functionality in `assets/js/main.js`

## Deployment

1. Set up production web server
2. Configure SSL certificate
3. Update database configuration for production
4. Set `DEBUG` to `false` in `config/config.php`
5. Set appropriate file permissions
6. Point `outsinc.ca` domain to server

## Security

- Input sanitization on all forms
- SQL injection prevention
- XSS protection
- File upload validation
- Secure headers in .htaccess
- Error logging without exposure

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Performance

- Lazy loading for images
- CSS/JS optimization
- Gzip compression
- Browser caching
- Minimal HTTP requests

## Support

For technical issues or questions:
- Review `WORKFLOW.md` for development procedures
- Check `TASKS.md` for implementation status
- Examine error logs in `logs/error.log`
- Test API endpoints individually

## License

Copyright © 2024 OUTSINC. All rights reserved.