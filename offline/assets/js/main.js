/**
 * OUTSINC Offline - Main JavaScript
 * Handles accessibility, theme switching, and core interactions
 * This is a standalone version with mock data and no backend dependencies
 */

// Hardcoded resource data from the issue
const RESOURCES_DATA = [
    {
        id: 1,
        name: "Transition House",
        category: "housing",
        description: "Provides emergency housing, coordinated entry for local shelter access, support services, and referrals to other community resources.",
        phone: "905-376-9562",
        location: "Cobourg, ON",
        hours: "24/7 (emergency shelter)",
        services: "Emergency/overnight shelter for individuals, couples, and families experiencing homelessness",
        isOpenNow: true
    },
    {
        id: 2,
        name: "Cornerstone Family Violence Prevention Centre",
        category: "support",
        description: "Provides immediate safety, counselling, and long-term support for those experiencing domestic violence.",
        phone: "905-372-0746",
        location: "Cobourg, ON",
        hours: "24/7 crisis line and shelter",
        services: "Shelter, crisis line, and support for individuals and families fleeing violence",
        isOpenNow: true
    },
    {
        id: 3,
        name: "Northumberland Hills Hospital (NHH)",
        category: "health",
        description: "Offers comprehensive medical services, outpatient community mental health, RAAM for alcohol and opioid use, and crisis intervention.",
        phone: "905-377-9891",
        location: "Cobourg, ON",
        hours: "Emergency Dept. 24/7; RAAM Clinic Tue & Thu 12:30–2:30pm",
        services: "Hospital services, mental health supports, Rapid Access Addiction Medicine (RAAM) Clinic",
        isOpenNow: true
    },
    {
        id: 4,
        name: "Greenwood Coalition",
        category: "support",
        description: "A grassroots community group supporting people facing poverty, mental illness, addiction, and social isolation through peer support and advocacy.",
        phone: "905-885-8700",
        location: "Port Hope, ON",
        hours: "Not specified",
        services: "Community outreach, advocacy, and harm reduction supports",
        isOpenNow: false
    },
    {
        id: 5,
        name: "Youth Emergency Shelter Peterborough",
        category: "housing",
        description: "Provides temporary emergency shelter and outreach support for homeless youth.",
        phone: "705-748-3851",
        location: "Peterborough, ON",
        hours: "24/7",
        services: "Emergency housing for youth in crisis",
        isOpenNow: true
    },
    {
        id: 6,
        name: "Northumberland County Community & Social Services",
        category: "support",
        description: "Provides access to shelter services, housing stability support, utility assistance, emergency help, and outreach programs.",
        phone: "905-372-6846 / 1-800-354-7051",
        location: "Cobourg, ON",
        hours: "Business hours, Mon–Fri",
        services: "Social assistance, housing stability, outreach, utility and emergency financial aid",
        isOpenNow: false
    },
    {
        id: 7,
        name: "Fourcast (Four Counties Addiction Services Team)",
        category: "health",
        description: "Provides outpatient addiction treatment, withdrawal management, problem gambling services, and specialized programming.",
        phone: "Contact through NHH",
        location: "Cobourg site (with NHH)",
        hours: "Not specified",
        services: "Addiction counselling, community withdrawal, gambling support, programs for women",
        isOpenNow: false
    },
    {
        id: 8,
        name: "The Help Centre of Northumberland",
        category: "support",
        description: "Provides help with housing, utilities, financial insecurity, and advocacy.",
        phone: "905-372-2646",
        location: "Cobourg, ON",
        hours: "Not specified",
        services: "Housing support, financial advocacy, referrals",
        isOpenNow: false
    },
    {
        id: 9,
        name: "Northumberland Legal Centre",
        category: "legal",
        description: "Offers legal support around housing, employment, social assistance, and other civil matters.",
        phone: "905-373-4464",
        location: "Cobourg, ON",
        hours: "Not specified",
        services: "Free legal advice for low-income residents",
        isOpenNow: false
    },
    {
        id: 10,
        name: "The Salvation Army (Cobourg)",
        category: "food",
        description: "Provides food assistance, emergency support, and community services to vulnerable individuals.",
        phone: "905-373-9440",
        location: "Cobourg, ON",
        hours: "Not specified",
        services: "Food bank, emergency aid, outreach",
        isOpenNow: false
    },
    {
        id: 11,
        name: "The Salvation Army (Port Hope)",
        category: "food",
        description: "Provides food assistance, emergency support, and community services to vulnerable individuals.",
        phone: "905-885-2323",
        location: "Port Hope, ON",
        hours: "Not specified",
        services: "Food bank, emergency aid, outreach",
        isOpenNow: false
    },
    {
        id: 12,
        name: "Community Care Northumberland",
        category: "support",
        description: "Provides meal delivery, affordable transportation, and support programs for seniors and vulnerable community members.",
        phone: "1-866-514-5774 (Meals), 1-866-768-7778 (Transportation)",
        location: "Northumberland County, ON",
        hours: "Office hours Mon–Fri; services vary",
        services: "Meals on Wheels, transportation, support for seniors/vulnerable",
        isOpenNow: false
    },
    {
        id: 13,
        name: "Christian Horizons",
        category: "support",
        description: "Provides housing and supportive services for individuals with intellectual and developmental disabilities.",
        phone: "705-741-1977",
        location: "Peterborough/Northumberland area",
        hours: "Not specified",
        services: "Developmental disability supports and housing",
        isOpenNow: false
    },
    {
        id: 14,
        name: "Community Living Campbellford/Brighton",
        category: "support",
        description: "Provides residential and respite services for people with intellectual and developmental disabilities.",
        phone: "705-653-1821",
        location: "Campbellford/Brighton, ON",
        hours: "Not specified",
        services: "Developmental disability supports",
        isOpenNow: false
    },
    {
        id: 15,
        name: "Highland Shores Children's Aid",
        category: "support",
        description: "Provides protection services, foster care, adoption, and family support to ensure child safety and wellbeing.",
        phone: "1-800-267-0570",
        location: "Northumberland & surrounding region",
        hours: "24/7 child protection emergency response",
        services: "Child protection, family supports",
        isOpenNow: true
    },
    {
        id: 16,
        name: "4 County Crisis",
        category: "health",
        description: "Provides phone-based crisis intervention, mental health support, and referral to local services.",
        phone: "705-745-6484",
        location: "Serves Northumberland, Peterborough, Haliburton, Kawartha Lakes",
        hours: "24/7",
        services: "Crisis mental health line",
        isOpenNow: true
    },
    {
        id: 17,
        name: "National Overdose Response Service (NORS)",
        category: "health",
        description: "A Canada-wide phone service where people using substances can call and be monitored by trained peers to prevent fatal overdoses.",
        phone: "1-888-688-6677",
        location: "Canada-wide (virtual service)",
        hours: "24/7",
        services: "Overdose prevention hotline",
        isOpenNow: true
    },
    {
        id: 18,
        name: "Kids Help Phone",
        category: "health",
        description: "A national service offering phone, text, and online chat support for youth in distress, plus resources for mental health and crisis.",
        phone: "1-800-668-6868",
        location: "Canada-wide",
        hours: "24/7 phone and text",
        services: "Youth crisis support, counselling, and chat line",
        isOpenNow: true
    },
    {
        id: 19,
        name: "Talk Suicide Canada",
        category: "health",
        description: "A national service providing immediate suicide prevention support and connections to local resources.",
        phone: "1-833-456-4566",
        location: "Canada-wide",
        hours: "24/7 phone; text line evenings",
        services: "Suicide crisis support",
        isOpenNow: true
    },
    {
        id: 20,
        name: "211 Ontario",
        category: "support",
        description: "Free, confidential service that connects people to community and social supports, including housing, food, health, and legal aid.",
        phone: "211",
        location: "Ontario-wide",
        hours: "24/7",
        services: "Community and social services directory helpline",
        isOpenNow: true
    }
];

class OUTSINC {
    constructor() {
        this.currentSlide = 0;
        this.chatOpen = false;
        this.filteredResources = RESOURCES_DATA;
        this.init();
    }

    init() {
        this.setupAccessibility();
        this.setupCTACarousel();
        this.setupMarquee();
        this.setupChat();
        this.setupForms();
        this.setupScrollEffects();
        this.setupImpactCounters();
        this.setupResourceDirectory();
    }

    // Accessibility features
    setupAccessibility() {
        // Apply saved preferences
        const preferences = this.getUserPreferences();
        this.applyTheme(preferences.theme);
        this.applyFontSize(preferences.fontSize);
        this.applyFontType(preferences.fontType);
        this.applyHighContrast(preferences.highContrast);

        this.setupAccessibilityControls();
        this.setupKeyboardNavigation();
        this.setupScreenReaderSupport();
    }

    getUserPreferences() {
        return {
            theme: localStorage.getItem('theme') || 'light',
            fontSize: localStorage.getItem('fontSize') || 'medium',
            fontType: localStorage.getItem('fontType') || 'default',
            highContrast: localStorage.getItem('highContrast') === 'true'
        };
    }

    applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        this.updateThemeButton(theme);
    }

    applyFontSize(size) {
        document.documentElement.setAttribute('data-font-size', size);
        localStorage.setItem('fontSize', size);
        this.updateFontSizeButton(size);
    }

    applyFontType(type) {
        document.documentElement.setAttribute('data-font-type', type);
        localStorage.setItem('fontType', type);
        this.updateFontTypeButton(type);
    }

    applyHighContrast(enabled) {
        if (enabled) {
            document.documentElement.setAttribute('data-theme', 'high-contrast');
        }
        localStorage.setItem('highContrast', enabled);
    }

    setupAccessibilityControls() {
        // Theme toggle
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                const themes = ['light', 'dark', 'high-contrast'];
                const nextTheme = themes[(themes.indexOf(currentTheme) + 1) % themes.length];
                this.applyTheme(nextTheme);
                this.announce(`Theme changed to ${nextTheme}`);
            });
        }

        // Font size toggle
        const fontSizeToggle = document.getElementById('font-size-toggle');
        if (fontSizeToggle) {
            fontSizeToggle.addEventListener('click', () => {
                const currentSize = document.documentElement.getAttribute('data-font-size');
                const sizes = ['small', 'medium', 'large', 'xl'];
                const nextSize = sizes[(sizes.indexOf(currentSize) + 1) % sizes.length];
                this.applyFontSize(nextSize);
                this.announce(`Font size changed to ${nextSize}`);
            });
        }

        // Font type toggle
        const fontTypeToggle = document.getElementById('font-type-toggle');
        if (fontTypeToggle) {
            fontTypeToggle.addEventListener('click', () => {
                const currentType = document.documentElement.getAttribute('data-font-type');
                const nextType = currentType === 'default' ? 'dyslexia-friendly' : 'default';
                this.applyFontType(nextType);
                this.announce(`Font changed to ${nextType === 'dyslexia-friendly' ? 'dyslexia-friendly' : 'default'} font`);
            });
        }
    }

    setupKeyboardNavigation() {
        // CTA carousel keyboard controls
        document.addEventListener('keydown', (e) => {
            const carousel = document.querySelector('.cta-carousel');
            if (document.activeElement === carousel) {
                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    this.previousSlide();
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    this.nextSlide();
                }
            }
        });
    }

    setupScreenReaderSupport() {
        // Create screen reader live region if it doesn't exist
        if (!document.getElementById('sr-announcements')) {
            const liveRegion = document.createElement('div');
            liveRegion.id = 'sr-announcements';
            liveRegion.className = 'sr-only';
            liveRegion.setAttribute('aria-live', 'polite');
            document.body.appendChild(liveRegion);
        }
    }

    announce(message) {
        const liveRegion = document.getElementById('sr-announcements');
        if (liveRegion) {
            liveRegion.textContent = message;
        }
    }

    // CTA Carousel
    setupCTACarousel() {
        const slides = document.querySelectorAll('.cta-slide');
        const indicators = document.querySelectorAll('.carousel-indicator');
        const prevBtn = document.querySelector('.carousel-prev');
        const nextBtn = document.querySelector('.carousel-next');

        if (slides.length === 0) return;

        // Auto-rotation every 8 seconds
        this.carouselInterval = setInterval(() => {
            this.nextSlide();
        }, 8000);

        // Manual controls
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                this.previousSlide();
                this.resetCarouselTimer();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                this.nextSlide();
                this.resetCarouselTimer();
            });
        }

        // Indicator controls
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                this.goToSlide(index);
                this.resetCarouselTimer();
            });
        });

        // Pause on hover
        const carousel = document.querySelector('.cta-carousel');
        if (carousel) {
            carousel.addEventListener('mouseenter', () => {
                clearInterval(this.carouselInterval);
            });

            carousel.addEventListener('mouseleave', () => {
                this.resetCarouselTimer();
            });
        }
    }

    nextSlide() {
        const slides = document.querySelectorAll('.cta-slide');
        this.goToSlide((this.currentSlide + 1) % slides.length);
    }

    previousSlide() {
        const slides = document.querySelectorAll('.cta-slide');
        this.goToSlide((this.currentSlide - 1 + slides.length) % slides.length);
    }

    goToSlide(index) {
        const slides = document.querySelectorAll('.cta-slide');
        const indicators = document.querySelectorAll('.carousel-indicator');

        if (slides.length === 0) return;

        // Update slides
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
            slide.setAttribute('aria-hidden', i !== index);
        });

        // Update indicators
        indicators.forEach((indicator, i) => {
            indicator.classList.toggle('active', i === index);
            indicator.setAttribute('aria-current', i === index);
        });

        this.currentSlide = index;
    }

    resetCarouselTimer() {
        clearInterval(this.carouselInterval);
        this.carouselInterval = setInterval(() => {
            this.nextSlide();
        }, 8000);
    }

    // Scrolling Marquee
    setupMarquee() {
        const marquee = document.querySelector('.marquee');
        const dismissBtn = document.querySelector('.marquee-dismiss');

        if (dismissBtn) {
            dismissBtn.addEventListener('click', () => {
                marquee.style.display = 'none';
                sessionStorage.setItem('marquee-dismissed', 'true');
            });
        }

        // Check if previously dismissed
        if (sessionStorage.getItem('marquee-dismissed')) {
            marquee.style.display = 'none';
        }
    }

    // Chat functionality (mock implementation)
    setupChat() {
        const chatBubble = document.querySelector('.chat-bubble');
        const chatWidget = document.getElementById('chat-widget');
        const chatClose = document.querySelector('.chat-close');
        const chatInput = document.getElementById('chat-input');
        const chatSend = document.getElementById('chat-send');
        const openChatBtn = document.getElementById('open-chat');

        if (!chatBubble) return;

        // Mock chat responses
        this.mockResponses = [
            "Thank you for reaching out! How can I help you today?",
            "I understand you're looking for resources. Let me help you find what you need.",
            "For housing assistance, I recommend contacting Transition House at 905-376-9562.",
            "If you need immediate crisis support, please call 4 County Crisis at 705-745-6484.",
            "You can also browse our resource directory by clicking the 'Find a Resource' button.",
            "Is there anything specific I can help you with today?"
        ];
        this.responseIndex = 0;

        // Chat bubble click
        chatBubble.addEventListener('click', () => {
            this.toggleChat();
        });

        // Open chat button
        if (openChatBtn) {
            openChatBtn.addEventListener('click', () => {
                this.openChat();
            });
        }

        // Close chat
        if (chatClose) {
            chatClose.addEventListener('click', () => {
                this.closeChat();
            });
        }

        // Send message
        const sendMessage = () => {
            const message = chatInput.value.trim();
            if (message) {
                this.addChatMessage(message, 'user');
                chatInput.value = '';
                
                // Mock response after short delay
                setTimeout(() => {
                    const response = this.mockResponses[this.responseIndex % this.mockResponses.length];
                    this.addChatMessage(response, 'operator');
                    this.responseIndex++;
                }, 1000 + Math.random() * 2000);
            }
        };

        if (chatSend) {
            chatSend.addEventListener('click', sendMessage);
        }

        if (chatInput) {
            chatInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });
        }

        // Update chat presence with mock data
        this.updateChatPresence();
    }

    toggleChat() {
        if (this.chatOpen) {
            this.closeChat();
        } else {
            this.openChat();
        }
    }

    openChat() {
        const chatWidget = document.getElementById('chat-widget');
        if (chatWidget) {
            chatWidget.classList.add('open');
            this.chatOpen = true;
            document.getElementById('chat-input')?.focus();
        }
    }

    closeChat() {
        const chatWidget = document.getElementById('chat-widget');
        if (chatWidget) {
            chatWidget.classList.remove('open');
            this.chatOpen = false;
        }
    }

    addChatMessage(message, sender) {
        const messagesContainer = document.getElementById('chat-messages');
        if (!messagesContainer) return;

        const messageDiv = document.createElement('div');
        messageDiv.className = `chat-message ${sender}`;
        
        const now = new Date();
        const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        
        messageDiv.innerHTML = `
            <div class="message-content">
                <p>${this.escapeHtml(message)}</p>
                <span class="message-time">${timeString}</span>
            </div>
        `;

        messagesContainer.appendChild(messageDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    updateChatPresence() {
        // Mock chat presence - always show as "live" for demo
        const statusElement = document.querySelector('.chat-status');
        if (statusElement) {
            statusElement.textContent = 'Live now';
            statusElement.className = 'chat-status status-live';
        }
    }

    // Form handling (mock)
    setupForms() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            if (!form.onsubmit) { // Don't override existing handlers
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.showMessage('Form submitted successfully! (This is a demo - no data was actually sent)', 'success');
                });
            }
        });
    }

    // Scroll effects
    setupScrollEffects() {
        const backToTop = document.querySelector('.back-to-top');
        
        if (backToTop) {
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 600) {
                    backToTop.classList.add('visible');
                } else {
                    backToTop.classList.remove('visible');
                }
            });

            backToTop.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    }

    // Impact counters
    setupImpactCounters() {
        const counters = document.querySelectorAll('.impact-counter');
        
        const animateCounters = () => {
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000; // 2 seconds
                const increment = target / (duration / 16); // 60fps
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counter.textContent = Math.floor(current);
                }, 16);
            });
        };

        // Animate when counters come into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.disconnect(); // Only animate once
                }
            });
        });

        const countersSection = document.querySelector('.impact-counters');
        if (countersSection) {
            observer.observe(countersSection);
        }
    }

    // Resource Directory
    setupResourceDirectory() {
        this.renderResources();
        this.setupResourceFilters();
    }

    setupResourceFilters() {
        const categoryFilter = document.getElementById('category-filter');
        const openNowFilter = document.getElementById('open-now-filter');

        if (categoryFilter) {
            categoryFilter.addEventListener('change', () => {
                this.filterResources();
            });
        }

        if (openNowFilter) {
            openNowFilter.addEventListener('change', () => {
                this.filterResources();
            });
        }
    }

    filterResources() {
        const categoryFilter = document.getElementById('category-filter');
        const openNowFilter = document.getElementById('open-now-filter');
        
        const selectedCategory = categoryFilter?.value || '';
        const openNowOnly = openNowFilter?.checked || false;

        this.filteredResources = RESOURCES_DATA.filter(resource => {
            const categoryMatch = !selectedCategory || resource.category === selectedCategory;
            const openNowMatch = !openNowOnly || resource.isOpenNow;
            return categoryMatch && openNowMatch;
        });

        this.renderResources();
    }

    renderResources() {
        const resourcesList = document.getElementById('resources-list');
        if (!resourcesList) return;

        // Show first 6 resources by default
        const resourcesToShow = this.filteredResources.slice(0, 6);

        if (resourcesToShow.length === 0) {
            resourcesList.innerHTML = '<p>No resources found matching your criteria.</p>';
            return;
        }

        resourcesList.innerHTML = resourcesToShow.map(resource => `
            <div class="resource-card">
                <h3>${this.escapeHtml(resource.name)}</h3>
                <p class="resource-category">${this.escapeHtml(resource.category.charAt(0).toUpperCase() + resource.category.slice(1))}</p>
                <p>${this.escapeHtml(resource.description)}</p>
                <p class="resource-phone">📞 <a href="tel:${this.escapeHtml(resource.phone)}">${this.escapeHtml(resource.phone)}</a></p>
                <p class="resource-location">📍 ${this.escapeHtml(resource.location)}</p>
                <p class="resource-hours">🕒 ${this.escapeHtml(resource.hours)}</p>
                ${resource.isOpenNow ? '<span class="status-badge open">Open Now</span>' : '<span class="status-badge closed">Check Hours</span>'}
                <div class="resource-actions">
                    <button class="btn btn-sm favorite-btn" onclick="alert('In the full version, this would save to your favorites')">
                        ♡ Save to favorites
                    </button>
                </div>
            </div>
        `).join('');
    }

    // Utility methods
    showMessage(message, type = 'info') {
        const container = this.getMessageContainer();
        
        const messageDiv = document.createElement('div');
        messageDiv.className = `message message-${type}`;
        messageDiv.innerHTML = `
            <span>${this.escapeHtml(message)}</span>
            <button class="message-close" aria-label="Close message">×</button>
        `;

        const closeBtn = messageDiv.querySelector('.message-close');
        closeBtn.addEventListener('click', () => {
            messageDiv.remove();
        });

        container.appendChild(messageDiv);

        // Auto-remove after 5 seconds
        setTimeout(() => {
            if (messageDiv.parentNode) {
                messageDiv.remove();
            }
        }, 5000);
    }

    getMessageContainer() {
        let container = document.querySelector('.message-container');
        if (!container) {
            container = this.createMessageContainer();
        }
        return container;
    }

    createMessageContainer() {
        const container = document.createElement('div');
        container.className = 'message-container';
        container.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            pointer-events: none;
        `;
        document.body.appendChild(container);
        return container;
    }

    updateThemeButton(theme) {
        const button = document.getElementById('theme-toggle');
        if (button) {
            const themeIcons = {
                'light': '☀️',
                'dark': '🌙',
                'high-contrast': '⚫'
            };
            button.textContent = themeIcons[theme] || '🌓';
            button.setAttribute('aria-label', `Current theme: ${theme}. Click to change theme.`);
        }
    }

    updateFontSizeButton(size) {
        const button = document.getElementById('font-size-toggle');
        if (button) {
            const sizeLabels = {
                'small': 'A-',
                'medium': 'A',
                'large': 'A+',
                'xl': 'A++'
            };
            button.textContent = sizeLabels[size] || 'A+';
            button.setAttribute('aria-label', `Current font size: ${size}. Click to change size.`);
        }
    }

    updateFontTypeButton(type) {
        const button = document.getElementById('font-type-toggle');
        if (button) {
            const typeIcons = {
                'default': '👁',
                'dyslexia-friendly': '👁‍🗨'
            };
            button.textContent = typeIcons[type] || '👁';
            button.setAttribute('aria-label', `Current font: ${type}. Click to toggle dyslexia-friendly font.`);
        }
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
}

// Global functions for onclick handlers
function showAllResources() {
    const app = window.outsinc;
    if (app) {
        app.filteredResources = RESOURCES_DATA;
        app.renderResources();
        app.showMessage('Showing all resources', 'info');
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    window.outsinc = new OUTSINC();
});

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = OUTSINC;
}