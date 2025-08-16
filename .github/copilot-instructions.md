# OUTSINC Copilot Instructions

**ALWAYS follow these instructions first and only fallback to additional search and context gathering if the information in the instructions is incomplete or found to be in error.**

## Repository Overview

OUTSINC is a comprehensive web application platform for social services, designed to help users navigate housing, health, ID services, and more. This repository currently contains detailed specifications in README.md for a multi-component landing page with accessibility features, chat integration, and resource directory functionality.

**Current State:** This is a specification-only repository containing comprehensive requirements but no implementation code yet.

## Working Effectively

### Initial Repository Setup (When Implementation Begins)

Run these commands to set up the development environment:

1. **Install Node.js and npm** (if not already installed):
   ```bash
   # Check if already installed
   node --version && npm --version
   ```

2. **Initialize the project structure**:
   ```bash
   # Create basic package.json
   npm init -y
   # Takes ~1 second
   ```

3. **Install core dependencies** (recommended tech stack based on specifications):
   ```bash
   # Install React and Next.js for the web application
   npm install react react-dom next@latest
   # Takes ~25-30 seconds. NEVER CANCEL.
   
   # Install development dependencies
   npm install --save-dev typescript @types/react @types/react-dom eslint eslint-config-next tailwindcss postcss autoprefixer
   # Takes ~30-45 seconds. NEVER CANCEL.
   ```

4. **Alternative: Use Next.js scaffolding** (recommended approach):
   ```bash
   # Create complete Next.js application with TypeScript and Tailwind
   npx create-next-app@latest . --typescript --tailwind --eslint --app --src-dir --import-alias "@/*"
   # Takes 2-3 minutes. NEVER CANCEL. Set timeout to 5+ minutes.
   ```

### Build and Development Commands

**CRITICAL TIMING INFORMATION:**

- **Initial project setup**: 
  - `npm init -y`: ~1 second
  - `npx create-next-app`: 30-35 seconds. NEVER CANCEL. Set timeout to 5+ minutes.
- **Dependency installation**: 
  - React/Next.js core: ~25-30 seconds. NEVER CANCEL.
  - Development tools (ESLint, TypeScript): ~50-60 seconds. NEVER CANCEL.
  - Global tools (serve, lighthouse): ~25-60 seconds. NEVER CANCEL.
- **Build commands**: 
  - **Will fail initially** due to Google Fonts network error
  - After font fix: 1-5 minutes. NEVER CANCEL. Set timeout to 10+ minutes.
- **Development server startup**: 10-30 seconds. NEVER CANCEL.
- **Linting/Type checking**: 
  - `npm run lint`: ~2-3 seconds
  - `npx tsc --noEmit`: ~2-3 seconds

#### Development Workflow

1. **Start development server**:
   ```bash
   npm run dev
   # Starts on http://localhost:3000
   # Takes 10-30 seconds to start. NEVER CANCEL.
   ```

2. **Build for production**:
   ```bash
   npm run build
   # WILL FAIL with default template due to Google Fonts network error
   # Fix font imports in layout.tsx first (see Network Limitations section)
   # After font fix: Takes 1-5 minutes. NEVER CANCEL. Set timeout to 10+ minutes.
   ```

3. **Run production build locally**:
   ```bash
   npm run start
   # Requires successful build first
   ```

4. **Run linting**:
   ```bash
   npm run lint
   # ESLint requires configuration in eslint.config.js (v9+)
   # Takes 2-10 seconds depending on project size
   ```

5. **Type checking**:
   ```bash
   npx tsc --noEmit
   # Takes 2-5 seconds for type validation
   ```

### Accessibility Testing Tools

Install and use these tools for comprehensive accessibility validation:

```bash
# Install accessibility testing tools
npm install -g lighthouse axe-core
# Takes ~60 seconds. NEVER CANCEL.

# Run Lighthouse accessibility audit
lighthouse http://localhost:3000 --only-categories=accessibility --output html --output-path ./accessibility-report.html

# Run axe-core testing (install as dev dependency)
npm install --save-dev @axe-core/playwright
```

**Manual Validation Requirements:**

After making any changes to the application, ALWAYS perform these validation steps:

1. **Build Validation**:
   ```bash
   npm run build
   # NEVER CANCEL. Wait for completion even if it takes 5+ minutes.
   ```

2. **Development Server Test**:
   ```bash
   npm run dev
   # Navigate to http://localhost:3000
   # Verify the application loads without console errors
   ```

3. **User Scenario Testing** (based on README.md specifications):
   
   **CRITICAL**: Test these user scenarios after any changes:
   
   - **Landing Page Interaction**:
     - Navigate through the 5 rotating CTAs using arrow keys (←/→)
     - Test accessibility controls (theme toggle, font size, high contrast)
     - Verify chat bubble appears with correct presence status
     - Test all navigation links in the header
   
   - **Form Functionality**:
     - Test "Report an Issue" form with photo upload
     - Test "Contact Us" form submission
     - Test "Call me back" request form (name + phone validation)
   
   - **Resource Directory**:
     - Test category filters
     - Test "Open Now" toggle
     - Test "Save to favorites" (requires login simulation)
     - Test anonymous "Suggest an update" form
   
   - **Accessibility Testing**:
     - Navigate entire site using only keyboard
     - Test with screen reader simulation (if available)
     - Verify high contrast mode works
     - Test with reduced motion preferences

4. **Performance Validation**:
   ```bash
   # Test build size and performance
   npm run build && ls -la .next/static/
   ```

### Repository Structure (When Implemented)

Based on the specifications, expect this structure:

```
/
├── src/
│   ├── components/
│   │   ├── comp-nav.tsx          # Top navigation
│   │   ├── comp-marquee.tsx      # Scrolling banner
│   │   ├── comp-ctas.tsx         # Rotating call-to-actions
│   │   ├── comp-featured-app.tsx # MOMCARE spotlight
│   │   ├── comp-apps-grid.tsx    # Other apps showcase
│   │   ├── comp-contact.tsx      # Contact form
│   │   ├── comp-report.tsx       # Issue reporting
│   │   ├── comp-providers.tsx    # Service providers
│   │   ├── comp-directory.tsx    # Resource directory
│   │   ├── comp-footer.tsx       # Footer
│   │   └── comp-chat.tsx         # Chat bubble
│   ├── pages/ or app/            # Next.js routing
│   │   ├── page.tsx              # Landing page (/)
│   │   ├── chat-ops/             # Operator console
│   │   ├── directory/            # Full directory
│   │   ├── report/               # Standalone report form
│   │   └── providers/            # Provider information
│   └── styles/                   # CSS/styling files
├── public/                       # Static assets
├── package.json
├── next.config.js               # Next.js configuration
├── tailwind.config.js           # Tailwind CSS config
└── tsconfig.json               # TypeScript config
```

### Key Routes (From Specifications)

- `/` - Landing page with all components
- `/chat-ops` - Operator console (powers "Live now" status)
- `/directory` - Full-screen resource directory
- `/report` - Standalone issue reporting form
- `/providers` - Information for partner organizations

## Validation Requirements

### Pre-Commit Validation

ALWAYS run these commands before committing changes:

```bash
# Lint the code
npm run lint
# Takes 2-10 seconds

# Build the application
npm run build
# Takes 1-5 minutes. NEVER CANCEL. Set timeout to 10+ minutes.

# Type check (if using TypeScript)
npx tsc --noEmit
# Takes 2-5 seconds
```

### Accessibility Requirements

The application MUST meet these accessibility standards (from specifications):

- **ARIA roles** on all interactive elements
- **Color contrast AA+** compliance
- **Focus-visible styles** for keyboard navigation
- **Reduced motion support** with `prefers-reduced-motion`
- **Screen reader compatibility**
- **High contrast mode toggle**
- **Font size controls**
- **Dyslexia-friendly font option**

### Performance Requirements

- **Lazy-load heavy images**
- **Defer chat script until first interaction**
- **Cache marquee text**
- **Auto-rotate CTAs every 7-10 seconds**
- **Keyboard shortcuts** for CTA navigation (←/→)

## Important Implementation Notes

### From README.md Specifications

1. **Component Architecture**: Build 11 distinct components as specified
2. **State Management**: Use local storage for user preferences (theme, accessibility)
3. **Chat Integration**: Implement real-time presence logic
4. **Form Handling**: Support photo uploads, anonymous submissions
5. **Responsive Design**: Mobile-first approach required
6. **Theme System**: Support dark/light modes with persistence

### Never Skip Validation

- **NEVER build without testing**: Always run through user scenarios
- **NEVER commit without linting**: CI will fail without proper linting
- **NEVER skip accessibility testing**: This is a social services platform
- **NEVER cancel long-running builds**: Wait for completion

### Network Limitations

**CRITICAL**: Some external dependencies may fail due to network restrictions:
- **Google Fonts will fail** - `getaddrinfo ENOTFOUND fonts.googleapis.com`
- **External CDNs may not be accessible** - bundle all assets locally
- **NPM registry timeouts** - increase timeout: `npm config set timeout 300000`

**Workaround for Google Fonts failure**:
```javascript
// In layout.tsx, replace:
import { Geist, Geist_Mono } from "next/font/google";

// With local fonts or remove font imports:
// Option 1: Use system fonts
const geist = { className: "font-sans" };
const geistMono = { className: "font-mono" };

// Option 2: Use local font files in public/fonts/
```

**Build will fail** with default Next.js template due to Google Fonts. Always fix font imports first.

### ESLint Configuration Requirements

ESLint v9+ requires explicit configuration. Create `eslint.config.js`:

```javascript
export default [
  {
    rules: {
      "no-unused-vars": "error",
      "no-undef": "error"
    }
  }
];
```

For Next.js projects, use:
```bash
npm install --save-dev eslint eslint-config-next
# Then use: npm run lint
```

## Common Commands Reference

```bash
# Quick repository status
ls -la
git status

# Install all dependencies
npm install
# Takes 30-60 seconds. NEVER CANCEL.

# Start development
npm run dev
# Takes 10-30 seconds to start

# Production build
npm run build
# Takes 1-5 minutes. NEVER CANCEL. Set timeout to 10+ minutes.

# Lint code
npm run lint

# Type checking
npx tsc --noEmit

# Serve production build locally
npm install -g serve && serve .next/static
# Global install takes ~25 seconds. NEVER CANCEL.
```

## Troubleshooting

### Build Failures
- Check for TypeScript errors: `npx tsc --noEmit`
- Verify all dependencies: `npm ls`
- Clear cache: `rm -rf .next node_modules package-lock.json && npm install`

### Development Server Issues
- Check port availability: `lsof -i :3000`
- Restart with clean cache: `npm run dev -- --port 3001`

### Network-Related Issues
- Use local alternatives for external fonts/CDNs
- Configure offline-first development setup
- Bundle all external dependencies locally

## Critical Reminders

1. **ALWAYS validate every change** with the user scenarios above
2. **NEVER cancel builds or long-running commands** - they may take 5+ minutes
3. **ALWAYS test accessibility features** after any UI changes
4. **ALWAYS run linting** before committing
5. **Follow the component specifications** exactly as outlined in README.md
6. **Test on multiple devices/screen sizes** due to mobile-first requirement
7. **Validate performance metrics** for lazy loading and caching