# OUTSINC Offline Copy

This is an offline copy of the OUTSINC landing page that runs entirely in the browser without any backend dependencies. It was created to provide a standalone demonstration version with the same style, layout, and format as the main application.

## What's Included

- **Complete UI/UX**: Same styling and layout as the main OUTSINC application
- **Interactive Features**: 
  - CTA carousel with auto-rotation and manual controls
  - Accessibility controls (theme switcher, font controls, high contrast)
  - Mock chat functionality with pre-programmed responses
  - Resource directory with filtering capabilities
  - Form interactions (with demo alerts instead of actual submission)

## What's Different

- **No Backend**: All forms show demo messages instead of actually submitting data
- **Hardcoded Data**: All resource information is hardcoded from the provided list
- **Mock Chat**: Chat responses are pre-programmed mock responses
- **No Database**: Impact counters use static demo values
- **Local Storage Only**: User preferences are saved to browser localStorage

## Resource Data

The following organizations and services are included with their contact information:

### Emergency Services (24/7)
- **Transition House** - 905-376-9562 (Emergency shelter)
- **Cornerstone Family Violence Prevention Centre** - 905-372-0746 (Crisis line)
- **4 County Crisis** - 705-745-6484 (Mental health crisis line)
- **Kids Help Phone** - 1-800-668-6868 (Youth support)
- **Talk Suicide Canada** - 1-833-456-4566 (Suicide prevention)
- **211 Ontario** - 211 (Community services directory)

### Healthcare Services
- **Northumberland Hills Hospital** - 905-377-9891 (Emergency 24/7, RAAM Clinic)
- **National Overdose Response Service** - 1-888-688-6677 (Overdose prevention)
- **Fourcast (Addiction Services)** - Contact through NHH (Addiction counselling)

### Housing & Support
- **Youth Emergency Shelter Peterborough** - 705-748-3851 (Youth housing)
- **Northumberland County Community & Social Services** - 905-372-6846 (Housing stability)
- **The Help Centre of Northumberland** - 905-372-2646 (Housing support)

### Legal Services
- **Northumberland Legal Centre** - 905-373-4464 (Free legal advice)

### Food & Community Support
- **The Salvation Army Cobourg** - 905-373-9440 (Food bank)
- **The Salvation Army Port Hope** - 905-885-2323 (Food bank)
- **Community Care Northumberland** - 1-866-514-5774 (Meals on Wheels)
- **Community Works** - 905-797-2535 ext. 22 (Food & clothing)

### Specialized Support Services
- **Highland Shores Children's Aid** - 1-800-267-0570 (Child protection)
- **Christian Horizons** - 705-741-1977 (Developmental disabilities)
- **Community Living Campbellford/Brighton** - 705-653-1821 (Developmental disabilities)
- **Greenwood Coalition** - 905-885-8700 (Community outreach)

## How to Use

1. Open `index.html` in any modern web browser
2. No server or internet connection required (except for optional dyslexia-friendly fonts)
3. All functionality works client-side
4. Settings are saved to browser localStorage

## Features

### Accessibility
- **Theme Options**: Light, dark, and high contrast modes
- **Font Controls**: Size adjustment and dyslexia-friendly font option
- **Keyboard Navigation**: Full keyboard support throughout
- **Screen Reader Support**: ARIA labels and live regions

### Interactive Elements
- **CTA Carousel**: Auto-rotates every 8 seconds, manual controls with arrows/keyboard
- **Chat System**: Click the chat bubble to open a mock chat interface
- **Resource Directory**: Filter by category or "open now" status
- **Impact Counters**: Animated counters showing demo statistics

### Mock Chat Responses
The chat system includes these pre-programmed responses:
- General greeting and assistance offers
- Housing resource recommendations
- Crisis support information
- Directory navigation help

## Technical Details

- **Pure HTML/CSS/JavaScript** - No frameworks or dependencies
- **Responsive Design** - Works on mobile, tablet, and desktop
- **CSS Custom Properties** - Theme system with CSS variables
- **ES6+ JavaScript** - Modern JavaScript with classes and modules
- **Local Storage** - Preferences persistence

## File Structure

```
offline/
├── index.html              # Main landing page
├── assets/
│   ├── css/
│   │   ├── main.css        # Core styles and theme system
│   │   └── components.css  # Component styles + chat widget
│   └── js/
│       └── main.js         # All functionality + resource data
└── README.md               # This file
```

## Browser Compatibility

- Chrome 88+
- Firefox 85+
- Safari 14+
- Edge 88+

## Contact Information Included

**OUTSINC Organization**
- Phone: (555) 010-0100
- Email: info@outsinc.ca
- Address: 123 Main Street, Toronto, ON M1A 1A1
- Hours: Monday-Friday 9:00 AM - 5:00 PM

---

*This offline copy was created as requested to provide a standalone demonstration of the OUTSINC platform with all resource information hardcoded and no backend dependencies.*