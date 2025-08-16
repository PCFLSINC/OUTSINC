/**
 * OUTSINC - Main JavaScript
 * Handles accessibility, theme switching, and core interactions
 */

class OUTSINC {
    constructor() {
        this.init();
    }

    init() {
        this.setupAccessibility();
        this.setupThemeSwitcher();
        this.setupCTACarousel();
        this.setupMarquee();
        this.setupChat();
        this.setupForms();
        this.setupScrollEffects();
        this.setupImpactCounters();
    }

    // Accessibility features
    setupAccessibility() {
        // Apply saved preferences
        const preferences = this.getUserPreferences();
        this.applyTheme(preferences.theme);
        this.applyFontSize(preferences.font_size);
        this.applyFontType(preferences.font_type);
        this.applyHighContrast(preferences.high_contrast);

        // Setup accessibility controls
        this.setupAccessibilityControls();
        
        // Keyboard navigation
        this.setupKeyboardNavigation();
        
        // Screen reader announcements
        this.setupScreenReaderSupport();
    }

    getUserPreferences() {
        return {
            theme: localStorage.getItem('theme') || 'light',
            font_size: localStorage.getItem('font_size') || 'medium',
            font_type: localStorage.getItem('font_type') || 'default',
            high_contrast: localStorage.getItem('high_contrast') === 'true'
        };
    }

    applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        this.updateThemeButton(theme);
    }

    applyFontSize(size) {
        document.documentElement.setAttribute('data-font-size', size);
        localStorage.setItem('font_size', size);
        this.updateFontSizeButton(size);
    }

    applyFontType(type) {
        document.documentElement.setAttribute('data-font-type', type);
        localStorage.setItem('font_type', type);
        this.updateFontTypeButton(type);
    }

    applyHighContrast(enabled) {
        if (enabled) {
            this.applyTheme('high-contrast');
        }
        localStorage.setItem('high_contrast', enabled);
    }

    setupAccessibilityControls() {
        // Theme switcher
        const themeButton = document.getElementById('theme-toggle');
        if (themeButton) {
            themeButton.addEventListener('click', () => {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                const themes = ['light', 'dark', 'high-contrast'];
                const currentIndex = themes.indexOf(currentTheme);
                const nextTheme = themes[(currentIndex + 1) % themes.length];
                this.applyTheme(nextTheme);
            });
        }

        // Font size controls
        const fontSizeButtons = document.querySelectorAll('[data-font-size-btn]');
        fontSizeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const size = button.dataset.fontSizeBtn;
                this.applyFontSize(size);
            });
        });

        // Font type toggle
        const fontTypeButton = document.getElementById('font-type-toggle');
        if (fontTypeButton) {
            fontTypeButton.addEventListener('click', () => {
                const current = document.documentElement.getAttribute('data-font-type');
                const newType = current === 'default' ? 'dyslexia-friendly' : 'default';
                this.applyFontType(newType);
            });
        }
    }

    setupKeyboardNavigation() {
        // Skip link functionality
        const skipLink = document.querySelector('.skip-link');
        if (skipLink) {
            skipLink.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.querySelector(skipLink.getAttribute('href'));
                if (target) {
                    target.focus();
                    target.scrollIntoView();
                }
            });
        }

        // Escape key to close modals/dropdowns
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.closeAllModals();
            }
        });
    }

    setupScreenReaderSupport() {
        // Live region for announcements
        if (!document.getElementById('sr-announcements')) {
            const liveRegion = document.createElement('div');
            liveRegion.id = 'sr-announcements';
            liveRegion.setAttribute('aria-live', 'polite');
            liveRegion.setAttribute('aria-atomic', 'true');
            liveRegion.className = 'sr-only';
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
        const carousel = document.querySelector('.cta-carousel');
        if (!carousel) return;

        const slides = carousel.querySelectorAll('.cta-slide');
        const prevBtn = carousel.querySelector('.carousel-prev');
        const nextBtn = carousel.querySelector('.carousel-next');
        const indicators = carousel.querySelectorAll('.carousel-indicator');
        
        let currentSlide = 0;
        let autoRotateInterval;
        const rotateSpeed = 8000; // 8 seconds

        const showSlide = (index) => {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
                slide.setAttribute('aria-hidden', i !== index);
            });
            
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
                indicator.setAttribute('aria-current', i === index ? 'true' : 'false');
            });

            this.announce(`Showing slide ${index + 1} of ${slides.length}`);
        };

        const nextSlide = () => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        };

        const prevSlide = () => {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        };

        const startAutoRotate = () => {
            autoRotateInterval = setInterval(nextSlide, rotateSpeed);
        };

        const stopAutoRotate = () => {
            clearInterval(autoRotateInterval);
        };

        // Event listeners
        if (nextBtn) nextBtn.addEventListener('click', () => { stopAutoRotate(); nextSlide(); startAutoRotate(); });
        if (prevBtn) prevBtn.addEventListener('click', () => { stopAutoRotate(); prevSlide(); startAutoRotate(); });

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                stopAutoRotate();
                currentSlide = index;
                showSlide(currentSlide);
                startAutoRotate();
            });
        });

        // Keyboard controls
        carousel.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                stopAutoRotate();
                prevSlide();
                startAutoRotate();
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                stopAutoRotate();
                nextSlide();
                startAutoRotate();
            }
        });

        // Pause on hover/focus
        carousel.addEventListener('mouseenter', stopAutoRotate);
        carousel.addEventListener('mouseleave', startAutoRotate);
        carousel.addEventListener('focusin', stopAutoRotate);
        carousel.addEventListener('focusout', startAutoRotate);

        // Initialize
        showSlide(0);
        
        // Check for reduced motion preference
        if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            startAutoRotate();
        }
    }

    // Scrolling Marquee
    setupMarquee() {
        const marquee = document.querySelector('.marquee');
        if (!marquee) return;

        const content = marquee.querySelector('.marquee-content');
        if (!content) return;

        // Pause on hover
        marquee.addEventListener('mouseenter', () => {
            content.style.animationPlayState = 'paused';
        });

        marquee.addEventListener('mouseleave', () => {
            if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                content.style.animationPlayState = 'running';
            }
        });

        // Dismiss functionality
        const dismissBtn = marquee.querySelector('.marquee-dismiss');
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

    // Chat functionality
    setupChat() {
        const chatBubble = document.querySelector('.chat-bubble');
        const chatWidget = document.querySelector('.chat-widget');
        
        if (!chatBubble) return;

        // Lazy load chat script on first interaction
        let chatScriptLoaded = false;
        
        const loadChatScript = () => {
            if (chatScriptLoaded) return;
            
            // Simulate loading chat script
            console.log('Loading chat script...');
            chatScriptLoaded = true;
            
            // Update presence status
            this.updateChatPresence();
        };

        chatBubble.addEventListener('click', () => {
            loadChatScript();
            if (chatWidget) {
                chatWidget.classList.toggle('open');
            }
        });

        // Update chat presence periodically
        this.updateChatPresence();
        setInterval(() => this.updateChatPresence(), 30000); // Every 30 seconds
    }

    async updateChatPresence() {
        try {
            const response = await fetch('/api/chat-status.php');
            const data = await response.json();
            
            const statusElement = document.querySelector('.chat-status');
            if (statusElement) {
                statusElement.textContent = this.getChatStatusText(data.status);
                statusElement.className = `chat-status status-${data.status}`;
            }
        } catch (error) {
            console.error('Error updating chat presence:', error);
        }
    }

    getChatStatusText(status) {
        const statusTexts = {
            'live': 'Live now',
            'recent': 'Recently active',
            'offline': 'Leave a message'
        };
        return statusTexts[status] || 'Chat available';
    }

    // Form handling
    setupForms() {
        const forms = document.querySelectorAll('form[data-ajax]');
        
        forms.forEach(form => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                await this.handleFormSubmit(form);
            });
        });

        // File upload validation
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', (e) => {
                this.validateFileUpload(e.target);
            });
        });
    }

    async handleFormSubmit(form) {
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn ? submitBtn.textContent : '';
        
        try {
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.classList.add('loading');
                submitBtn.textContent = 'Submitting...';
            }

            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                this.showMessage(result.message, 'success');
                form.reset();
            } else {
                this.showMessage(result.message, 'error');
            }
        } catch (error) {
            this.showMessage('An error occurred. Please try again.', 'error');
            console.error('Form submission error:', error);
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.classList.remove('loading');
                submitBtn.textContent = originalText;
            }
        }
    }

    validateFileUpload(input) {
        const file = input.files[0];
        if (!file) return;

        const maxSize = 5 * 1024 * 1024; // 5MB
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];

        if (file.size > maxSize) {
            this.showMessage('File size must be less than 5MB', 'error');
            input.value = '';
            return;
        }

        if (!allowedTypes.includes(file.type)) {
            this.showMessage('File type not allowed', 'error');
            input.value = '';
            return;
        }
    }

    // Scroll effects
    setupScrollEffects() {
        const nav = document.querySelector('.main-nav');
        const backToTop = document.querySelector('.back-to-top');
        
        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;
            
            // Hide/show navigation on scroll
            if (nav) {
                if (currentScrollY > lastScrollY && currentScrollY > 100) {
                    nav.classList.add('nav-hidden');
                } else {
                    nav.classList.remove('nav-hidden');
                }
            }

            // Show/hide back to top button
            if (backToTop) {
                if (currentScrollY > 600) {
                    backToTop.classList.add('visible');
                } else {
                    backToTop.classList.remove('visible');
                }
            }

            lastScrollY = currentScrollY;
        });

        // Back to top functionality
        if (backToTop) {
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
        
        const animateCounter = (element, target) => {
            const duration = 2000; // 2 seconds
            const start = performance.now();
            const startValue = 0;

            const animate = (currentTime) => {
                const elapsed = currentTime - start;
                const progress = Math.min(elapsed / duration, 1);
                
                const current = Math.floor(startValue + (target - startValue) * progress);
                element.textContent = current.toLocaleString();

                if (progress < 1) {
                    requestAnimationFrame(animate);
                }
            };

            requestAnimationFrame(animate);
        };

        // Intersection Observer for counter animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.dataset.animated) {
                    const target = parseInt(entry.target.dataset.target);
                    animateCounter(entry.target, target);
                    entry.target.dataset.animated = 'true';
                }
            });
        });

        counters.forEach(counter => {
            observer.observe(counter);
        });

        // Auto-refresh counters
        setInterval(() => {
            this.refreshImpactCounters();
        }, 120000); // Every 2 minutes
    }

    async refreshImpactCounters() {
        try {
            const response = await fetch('/api/impact-counters.php');
            const data = await response.json();
            
            Object.keys(data).forEach(key => {
                const element = document.querySelector(`[data-counter="${key}"]`);
                if (element) {
                    element.dataset.target = data[key];
                    element.textContent = data[key].toLocaleString();
                }
            });
        } catch (error) {
            console.error('Error refreshing impact counters:', error);
        }
    }

    // Utility methods
    showMessage(message, type = 'info') {
        const messageContainer = document.querySelector('.message-container') || this.createMessageContainer();
        
        const messageElement = document.createElement('div');
        messageElement.className = `message message-${type}`;
        messageElement.textContent = message;
        
        messageContainer.appendChild(messageElement);
        
        // Announce to screen readers
        this.announce(message);
        
        // Auto-remove after 5 seconds
        setTimeout(() => {
            messageElement.remove();
        }, 5000);
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

    closeAllModals() {
        const modals = document.querySelectorAll('.modal.open, .dropdown.open');
        modals.forEach(modal => {
            modal.classList.remove('open');
        });
    }

    updateThemeButton(theme) {
        const button = document.getElementById('theme-toggle');
        if (button) {
            const themeNames = {
                'light': 'Light',
                'dark': 'Dark',
                'high-contrast': 'High Contrast'
            };
            button.textContent = themeNames[theme] || theme;
            button.setAttribute('aria-label', `Current theme: ${themeNames[theme]}. Click to change theme.`);
        }
    }

    updateFontSizeButton(size) {
        const buttons = document.querySelectorAll('[data-font-size-btn]');
        buttons.forEach(button => {
            button.classList.toggle('active', button.dataset.fontSizeBtn === size);
        });
    }

    updateFontTypeButton(type) {
        const button = document.getElementById('font-type-toggle');
        if (button) {
            const typeNames = {
                'default': 'Default Font',
                'dyslexia-friendly': 'Dyslexia-Friendly Font'
            };
            button.textContent = typeNames[type] || type;
            button.classList.toggle('active', type === 'dyslexia-friendly');
        }
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new OUTSINC();
});

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = OUTSINC;
}