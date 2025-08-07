/**
 * TripBookKar Theme Main JavaScript
 * 
 * @package TripBookKar
 * @version 1.0.0
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initializeTheme();
    });

    // Window Load
    $(window).on('load', function() {
        initializeAnimations();
        hidePreloader();
    });

    // Window Resize
    $(window).on('resize', function() {
        handleResize();
    });

    // Window Scroll
    $(window).on('scroll', function() {
        handleScroll();
    });

    /**
     * Initialize Theme Functions
     */
    function initializeTheme() {
        initializeMobileMenu();
        initializeSearchForm();
        initializeBookingForms();
        initializeTestimonialsSlider();
        initializeCounters();
        initializeDatePickers();
        initializeTooltips();
        initializeSmoothScroll();
    }

    /**
     * Mobile Menu Toggle
     */
    function initializeMobileMenu() {
        $('.mobile-menu-toggle').on('click', function(e) {
            e.preventDefault();
            
            const $this = $(this);
            const $navigation = $('.main-navigation');
            
            $this.toggleClass('active');
            $navigation.toggleClass('active');
            $('body').toggleClass('menu-open');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.header-content').length) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('active');
                $('body').removeClass('menu-open');
            }
        });

        // Close menu on window resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('active');
                $('body').removeClass('menu-open');
            }
        });
    }

    /**
     * Initialize Search Form
     */
    function initializeSearchForm() {
        // Search tab switching
        $('.search-tab').on('click', function() {
            const $this = $(this);
            const tabType = $this.data('tab');
            
            // Update active tab
            $('.search-tab').removeClass('active');
            $this.addClass('active');
            
            // Show corresponding form content
            $('.search-form-content').removeClass('active');
            $('.search-form-content[data-type="' + tabType + '"]').addClass('active');
            
            updateSearchForm(tabType);
        });

        // Search form submission
        $('#hero-search-form').on('submit', function(e) {
            e.preventDefault();
            handleSearch();
        });

        // Auto-complete for destinations
        $('.destination-input').on('input', function() {
            const query = $(this).val();
            if (query.length > 2) {
                fetchDestinationSuggestions(query);
            }
        });
    }

    /**
     * Update Search Form Based on Tab
     */
    function updateSearchForm(tabType) {
        const $formContent = $('.search-form-content');
        
        // Clear existing content
        $formContent.empty();
        
        let formHTML = '';
        
        switch(tabType) {
            case 'flights':
                formHTML = `
                    <div class="form-group">
                        <label for="flight-from">From</label>
                        <input type="text" id="flight-from" name="from" placeholder="Departure city" required>
                    </div>
                    <div class="form-group">
                        <label for="flight-to">To</label>
                        <input type="text" id="flight-to" name="to" placeholder="Destination city" required>
                    </div>
                    <div class="form-group">
                        <label for="flight-departure">Departure</label>
                        <input type="date" id="flight-departure" name="departure" required>
                    </div>
                    <div class="form-group">
                        <label for="flight-return">Return</label>
                        <input type="date" id="flight-return" name="return">
                    </div>
                    <div class="form-group">
                        <label for="flight-passengers">Passengers</label>
                        <select id="flight-passengers" name="passengers">
                            <option value="1">1 Adult</option>
                            <option value="2">2 Adults</option>
                            <option value="3">3 Adults</option>
                            <option value="4">4 Adults</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-large">Search Flights</button>
                    </div>
                `;
                break;
                
            case 'hotels':
                formHTML = `
                    <div class="form-group">
                        <label for="hotel-destination">Destination</label>
                        <input type="text" id="hotel-destination" name="destination" placeholder="City or hotel name" required>
                    </div>
                    <div class="form-group">
                        <label for="hotel-checkin">Check-in</label>
                        <input type="date" id="hotel-checkin" name="checkin" required>
                    </div>
                    <div class="form-group">
                        <label for="hotel-checkout">Check-out</label>
                        <input type="date" id="hotel-checkout" name="checkout" required>
                    </div>
                    <div class="form-group">
                        <label for="hotel-rooms">Rooms</label>
                        <select id="hotel-rooms" name="rooms">
                            <option value="1">1 Room</option>
                            <option value="2">2 Rooms</option>
                            <option value="3">3 Rooms</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hotel-guests">Guests</label>
                        <select id="hotel-guests" name="guests">
                            <option value="1">1 Guest</option>
                            <option value="2">2 Guests</option>
                            <option value="3">3 Guests</option>
                            <option value="4">4 Guests</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-large">Search Hotels</button>
                    </div>
                `;
                break;
                
            case 'packages':
                formHTML = `
                    <div class="form-group">
                        <label for="package-destination">Destination</label>
                        <input type="text" id="package-destination" name="destination" placeholder="Where do you want to go?" required>
                    </div>
                    <div class="form-group">
                        <label for="package-date">Travel Date</label>
                        <input type="date" id="package-date" name="travel_date" required>
                    </div>
                    <div class="form-group">
                        <label for="package-duration">Duration</label>
                        <select id="package-duration" name="duration">
                            <option value="">Any Duration</option>
                            <option value="3-5">3-5 Days</option>
                            <option value="6-10">6-10 Days</option>
                            <option value="11-15">11-15 Days</option>
                            <option value="15+">15+ Days</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="package-budget">Budget (per person)</label>
                        <select id="package-budget" name="budget">
                            <option value="">Any Budget</option>
                            <option value="0-500">Under $500</option>
                            <option value="500-1000">$500 - $1000</option>
                            <option value="1000-2000">$1000 - $2000</option>
                            <option value="2000+">$2000+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="package-travelers">Travelers</label>
                        <select id="package-travelers" name="travelers">
                            <option value="1">1 Person</option>
                            <option value="2">2 People</option>
                            <option value="3">3 People</option>
                            <option value="4">4 People</option>
                            <option value="5+">5+ People</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-large">Search Packages</button>
                    </div>
                `;
                break;
        }
        
        $formContent.html(formHTML);
        
        // Reinitialize date pickers for new elements
        initializeDatePickers();
    }

    /**
     * Handle Search Form Submission
     */
    function handleSearch() {
        const $form = $('#hero-search-form');
        const $button = $form.find('button[type="submit"]');
        const activeTab = $('.search-tab.active').data('tab');
        
        // Get form data
        const formData = new FormData($form[0]);
        formData.append('action', 'tripbookkar_search');
        formData.append('search_type', activeTab);
        formData.append('nonce', tripbookkar_ajax.nonce);
        
        // Show loading state
        $button.addClass('loading').text(tripbookkar_ajax.strings.searching);
        
        // Make AJAX request
        $.ajax({
            url: tripbookkar_ajax.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    handleSearchResults(response.data, activeTab);
                } else {
                    showSearchError(response.data || tripbookkar_ajax.strings.error);
                }
            },
            error: function() {
                showSearchError(tripbookkar_ajax.strings.error);
            },
            complete: function() {
                $button.removeClass('loading').text('Search ' + activeTab.charAt(0).toUpperCase() + activeTab.slice(1));
            }
        });
    }

    /**
     * Handle Search Results
     */
    function handleSearchResults(results, searchType) {
        // Create results modal or redirect to results page
        const resultsHTML = createResultsHTML(results, searchType);
        showResultsModal(resultsHTML);
    }

    /**
     * Create Results HTML
     */
    function createResultsHTML(results, searchType) {
        let html = '<div class="search-results">';
        html += '<h3>Search Results for ' + searchType.charAt(0).toUpperCase() + searchType.slice(1) + '</h3>';
        
        if (results.length > 0) {
            html += '<div class="results-grid">';
            results.forEach(function(result) {
                html += '<div class="result-item">';
                if (result.image) {
                    html += '<img src="' + result.image + '" alt="' + result.title + '">';
                }
                html += '<div class="result-content">';
                html += '<h4>' + result.title + '</h4>';
                if (result.excerpt) {
                    html += '<p>' + result.excerpt + '</p>';
                }
                if (result.price) {
                    html += '<div class="result-price">$' + result.price + '</div>';
                }
                if (result.url) {
                    html += '<a href="' + result.url + '" class="btn btn-primary">View Details</a>';
                }
                html += '</div></div>';
            });
            html += '</div>';
        } else {
            html += '<p>No results found. Please try different search criteria.</p>';
        }
        
        html += '</div>';
        return html;
    }

    /**
     * Show Results Modal
     */
    function showResultsModal(content) {
        const modalHTML = `
            <div class="search-results-modal">
                <div class="modal-overlay"></div>
                <div class="modal-content">
                    <button class="modal-close">&times;</button>
                    ${content}
                </div>
            </div>
        `;
        
        $('body').append(modalHTML);
        $('.search-results-modal').fadeIn();
        
        // Close modal handlers
        $('.modal-close, .modal-overlay').on('click', function() {
            $('.search-results-modal').fadeOut(function() {
                $(this).remove();
            });
        });
    }

    /**
     * Show Search Error
     */
    function showSearchError(message) {
        const errorHTML = `
            <div class="search-error">
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    ${message}
                </div>
            </div>
        `;
        
        $('.hero-search-form').prepend(errorHTML);
        
        setTimeout(function() {
            $('.search-error').fadeOut(function() {
                $(this).remove();
            });
        }, 5000);
    }

    /**
     * Initialize Booking Forms
     */
    function initializeBookingForms() {
        $('.booking-form').on('submit', function(e) {
            e.preventDefault();
            
            const $form = $(this);
            const $button = $form.find('button[type="submit"]');
            
            // Validate form
            if (!validateBookingForm($form)) {
                return;
            }
            
            // Show loading state
            $button.addClass('loading').text('Processing...');
            
            // Simulate booking process
            setTimeout(function() {
                $button.removeClass('loading').text('Book Now');
                showBookingSuccess();
            }, 2000);
        });
    }

    /**
     * Validate Booking Form
     */
    function validateBookingForm($form) {
        let isValid = true;
        
        $form.find('[required]').each(function() {
            const $field = $(this);
            if (!$field.val().trim()) {
                $field.addClass('error');
                isValid = false;
            } else {
                $field.removeClass('error');
            }
        });
        
        return isValid;
    }

    /**
     * Show Booking Success
     */
    function showBookingSuccess() {
        const successHTML = `
            <div class="booking-success-modal">
                <div class="modal-overlay"></div>
                <div class="modal-content">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Booking Request Submitted!</h3>
                    <p>Thank you for your booking request. We will contact you shortly to confirm your reservation.</p>
                    <button class="btn btn-primary modal-close">Continue</button>
                </div>
            </div>
        `;
        
        $('body').append(successHTML);
        $('.booking-success-modal').fadeIn();
        
        $('.modal-close, .modal-overlay').on('click', function() {
            $('.booking-success-modal').fadeOut(function() {
                $(this).remove();
            });
        });
    }

    /**
     * Initialize Testimonials Slider
     */
    function initializeTestimonialsSlider() {
        if ($('.testimonials-slider').length) {
            let currentSlide = 0;
            const $slides = $('.testimonial-card');
            const totalSlides = $slides.length;
            
            if (totalSlides > 1) {
                // Auto-rotate testimonials
                setInterval(function() {
                    $slides.eq(currentSlide).fadeOut();
                    currentSlide = (currentSlide + 1) % totalSlides;
                    $slides.eq(currentSlide).fadeIn();
                }, 5000);
            }
        }
    }

    /**
     * Initialize Counters
     */
    function initializeCounters() {
        $('.counter').each(function() {
            const $this = $(this);
            const countTo = $this.attr('data-count');
            
            $({ countNum: $this.text() }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    }

    /**
     * Initialize Date Pickers
     */
    function initializeDatePickers() {
        $('input[type="date"]').each(function() {
            const $this = $(this);
            
            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            $this.attr('min', today);
            
            // Set default value if not set
            if (!$this.val() && $this.attr('name') !== 'return') {
                $this.val(today);
            }
        });
        
        // Return date should be after departure date
        $('input[name="departure"], input[name="checkin"]').on('change', function() {
            const departureDate = $(this).val();
            const $returnField = $('input[name="return"], input[name="checkout"]');
            
            if (departureDate) {
                $returnField.attr('min', departureDate);
                
                // Clear return date if it's before departure date
                if ($returnField.val() && $returnField.val() < departureDate) {
                    $returnField.val('');
                }
            }
        });
    }

    /**
     * Initialize Tooltips
     */
    function initializeTooltips() {
        $('[data-tooltip]').on('mouseenter', function() {
            const tooltipText = $(this).attr('data-tooltip');
            const tooltip = $('<div class="tooltip">' + tooltipText + '</div>');
            
            $('body').append(tooltip);
            
            const pos = $(this).offset();
            tooltip.css({
                top: pos.top - tooltip.outerHeight() - 10,
                left: pos.left + ($(this).outerWidth() / 2) - (tooltip.outerWidth() / 2)
            }).fadeIn();
        }).on('mouseleave', function() {
            $('.tooltip').fadeOut(function() {
                $(this).remove();
            });
        });
    }

    /**
     * Initialize Smooth Scroll
     */
    function initializeSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            const target = $(this.hash);
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800);
            }
        });
    }

    /**
     * Initialize Animations
     */
    function initializeAnimations() {
        // Fade in elements on scroll
        $(window).on('scroll', function() {
            $('.fade-in').each(function() {
                const elementTop = $(this).offset().top;
                const elementBottom = elementTop + $(this).outerHeight();
                const viewportTop = $(window).scrollTop();
                const viewportBottom = viewportTop + $(window).height();
                
                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('fade-in-active');
                }
            });
        });
        
        // Trigger scroll event on load
        $(window).trigger('scroll');
    }

    /**
     * Hide Preloader
     */
    function hidePreloader() {
        $('.preloader').fadeOut(500);
    }

    /**
     * Handle Window Resize
     */
    function handleResize() {
        // Close mobile menu on resize
        if ($(window).width() > 768) {
            $('.mobile-menu-toggle').removeClass('active');
            $('.main-navigation').removeClass('active');
            $('body').removeClass('menu-open');
        }
    }

    /**
     * Handle Window Scroll
     */
    function handleScroll() {
        const scrollTop = $(window).scrollTop();
        
        // Header scroll effect
        if (scrollTop > 100) {
            $('.site-header').addClass('header-scrolled');
        } else {
            $('.site-header').removeClass('header-scrolled');
        }
        
        // Back to top button
        if (scrollTop > 500) {
            $('.back-to-top').addClass('show');
        } else {
            $('.back-to-top').removeClass('show');
        }
    }

    /**
     * Fetch Destination Suggestions
     */
    function fetchDestinationSuggestions(query) {
        // This would typically make an AJAX call to get destination suggestions
        // For now, it's a placeholder
        console.log('Fetching suggestions for:', query);
    }

    /**
     * Back to Top Button
     */
    $(document).ready(function() {
        // Add back to top button if it doesn't exist
        if (!$('.back-to-top').length) {
            $('body').append('<button class="back-to-top"><i class="fas fa-arrow-up"></i></button>');
        }
        
        $('.back-to-top').on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 800);
        });
    });

    /**
     * Form Enhancements
     */
    $(document).ready(function() {
        // Add floating labels effect
        $('.form-group input, .form-group select, .form-group textarea').on('focus blur', function() {
            const $this = $(this);
            const $group = $this.closest('.form-group');
            
            if ($this.val() || $this.is(':focus')) {
                $group.addClass('focused');
            } else {
                $group.removeClass('focused');
            }
        });
        
        // Trigger for pre-filled fields
        $('.form-group input, .form-group select, .form-group textarea').each(function() {
            if ($(this).val()) {
                $(this).closest('.form-group').addClass('focused');
            }
        });
    });

})(jQuery);