/**
 * TripBookKar Theme JavaScript
 * 
 * @package TripBookKar
 */

jQuery(document).ready(function($) {
    'use strict';

    // Search Form Tab Switching
    $('.search-tab').on('click', function() {
        var target = $(this).data('tab');
        
        // Remove active class from all tabs and forms
        $('.search-tab').removeClass('active');
        $('.search-form').removeClass('active');
        
        // Add active class to clicked tab
        $(this).addClass('active');
        
        // Show corresponding form
        $('#' + target + '-search').addClass('active');
    });

    // Mobile Menu Toggle
    $('.menu-toggle').on('click', function() {
        $('.main-navigation').toggleClass('active');
        $(this).toggleClass('active');
        $('body').toggleClass('menu-open');
    });

    // Smooth Scrolling for Anchor Links
    $('a[href*="#"]:not([href="#"])').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
                return false;
            }
        }
    });

    // Animate Elements on Scroll
    function animateOnScroll() {
        $('.fade-in, .slide-in-left').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animated');
            }
        });
    }

    // Trigger animation on scroll
    $(window).on('scroll', animateOnScroll);
    animateOnScroll(); // Initial check

    // Header Scroll Effect
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 100) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });

    // Flight Search Form Handler
    $('#flight-search').on('submit', function(e) {
        e.preventDefault();
        
        var formData = {
            action: 'search_flights',
            nonce: tripbookkar_ajax.nonce,
            from: $('#flight-from').val(),
            to: $('#flight-to').val(),
            departure: $('#flight-departure').val(),
            return: $('#flight-return').val(),
            passengers: $('#flight-passengers').val()
        };

        // Show loading state
        $(this).find('.search-btn').html('<i class="fas fa-spinner fa-spin"></i> Searching...');
        
        $.ajax({
            url: tripbookkar_ajax.ajax_url,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Redirect to flights page with search results
                    window.location.href = '/flights/?search=' + encodeURIComponent(JSON.stringify(formData));
                } else {
                    alert('Search failed. Please try again.');
                }
            },
            error: function() {
                alert('Search failed. Please try again.');
            },
            complete: function() {
                $('#flight-search').find('.search-btn').html('<i class="fas fa-search"></i> Search Flights');
            }
        });
    });

    // Hotel Search Form Handler
    $('#hotel-search').on('submit', function(e) {
        e.preventDefault();
        
        var formData = {
            action: 'search_hotels',
            nonce: tripbookkar_ajax.nonce,
            city: $('#hotel-city').val(),
            checkin: $('#hotel-checkin').val(),
            checkout: $('#hotel-checkout').val(),
            guests: $('#hotel-guests').val()
        };

        // Show loading state
        $(this).find('.search-btn').html('<i class="fas fa-spinner fa-spin"></i> Searching...');
        
        $.ajax({
            url: tripbookkar_ajax.ajax_url,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Redirect to hotels page with search results
                    window.location.href = '/hotels/?search=' + encodeURIComponent(JSON.stringify(formData));
                } else {
                    alert('Search failed. Please try again.');
                }
            },
            error: function() {
                alert('Search failed. Please try again.');
            },
            complete: function() {
                $('#hotel-search').find('.search-btn').html('<i class="fas fa-search"></i> Search Hotels');
            }
        });
    });

    // Package Search Form Handler
    $('#package-search').on('submit', function(e) {
        e.preventDefault();
        
        var formData = {
            destination: $('#package-destination').val(),
            departure: $('#package-departure').val(),
            duration: $('#package-duration').val(),
            travelers: $('#package-travelers').val()
        };

        // Redirect to packages page with search parameters
        var searchParams = new URLSearchParams(formData);
        window.location.href = '/packages/?' + searchParams.toString();
    });

    // Newsletter Subscription
    $('.newsletter-form').on('submit', function(e) {
        e.preventDefault();
        
        var email = $(this).find('input[type="email"]').val();
        var $button = $(this).find('button[type="submit"]');
        var originalText = $button.text();
        
        // Show loading state
        $button.html('<i class="fas fa-spinner fa-spin"></i> Subscribing...');
        
        // Simulate AJAX call (replace with actual implementation)
        setTimeout(function() {
            alert('Thank you for subscribing to our newsletter!');
            $button.text(originalText);
            $('.newsletter-form')[0].reset();
        }, 1500);
    });

    // Set minimum date for date inputs to today
    var today = new Date().toISOString().split('T')[0];
    $('input[type="date"]').attr('min', today);

    // Auto-set return date to next day after departure
    $('#flight-departure, #package-departure').on('change', function() {
        var departureDate = new Date($(this).val());
        if (departureDate) {
            departureDate.setDate(departureDate.getDate() + 1);
            var returnDate = departureDate.toISOString().split('T')[0];
            $('#flight-return').attr('min', returnDate);
            
            if (!$('#flight-return').val()) {
                $('#flight-return').val(returnDate);
            }
        }
    });

    // Hotel checkout date auto-set
    $('#hotel-checkin').on('change', function() {
        var checkinDate = new Date($(this).val());
        if (checkinDate) {
            checkinDate.setDate(checkinDate.getDate() + 1);
            var checkoutDate = checkinDate.toISOString().split('T')[0];
            $('#hotel-checkout').attr('min', checkoutDate);
            
            if (!$('#hotel-checkout').val()) {
                $('#hotel-checkout').val(checkoutDate);
            }
        }
    });

    // Card Hover Effects
    $('.card').hover(
        function() {
            $(this).find('.card-image').css('transform', 'scale(1.05)');
        },
        function() {
            $(this).find('.card-image').css('transform', 'scale(1)');
        }
    );

    // Back to Top Button
    var backToTop = $('<button class="back-to-top" aria-label="Back to top"><i class="fas fa-arrow-up"></i></button>');
    $('body').append(backToTop);

    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 300) {
            backToTop.addClass('show');
        } else {
            backToTop.removeClass('show');
        }
    });

    backToTop.on('click', function() {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    });

    // Price Range Filter (for search results pages)
    if ($('#price-range').length) {
        $('#price-range').on('input', function() {
            var value = $(this).val();
            $('#price-value').text('$' + value);
            filterByPrice(value);
        });
    }

    function filterByPrice(maxPrice) {
        $('.package-card, .hotel-card, .flight-card').each(function() {
            var price = parseFloat($(this).find('.card-price').text().replace(/[^0-9.]/g, ''));
            if (price <= maxPrice) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    // Load More Functionality
    $('.load-more-btn').on('click', function() {
        var $button = $(this);
        var page = $button.data('page') || 1;
        var postType = $button.data('post-type') || 'post';
        
        $button.html('<i class="fas fa-spinner fa-spin"></i> Loading...');
        
        $.ajax({
            url: tripbookkar_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: page + 1,
                post_type: postType,
                nonce: tripbookkar_ajax.nonce
            },
            success: function(response) {
                if (response.success && response.data.html) {
                    $('.posts-container, .packages-grid, .destinations-grid').append(response.data.html);
                    $button.data('page', page + 1);
                    
                    if (!response.data.has_more) {
                        $button.hide();
                    }
                } else {
                    $button.hide();
                }
            },
            error: function() {
                alert('Failed to load more content.');
            },
            complete: function() {
                $button.html('Load More');
            }
        });
    });

    // Search Autocomplete for Cities
    var cities = [
        'New York', 'Los Angeles', 'London', 'Paris', 'Tokyo', 'Dubai', 'Singapore',
        'Hong Kong', 'Sydney', 'Mumbai', 'Delhi', 'Bangkok', 'Istanbul', 'Rome',
        'Barcelona', 'Amsterdam', 'Berlin', 'Vienna', 'Prague', 'Budapest'
    ];

    $('input[name="from"], input[name="to"], input[name="city"], input[name="destination"]').on('input', function() {
        var input = $(this);
        var value = input.val().toLowerCase();
        
        if (value.length >= 2) {
            var matches = cities.filter(function(city) {
                return city.toLowerCase().includes(value);
            });
            
            // Create or update dropdown
            var dropdown = input.siblings('.autocomplete-dropdown');
            if (dropdown.length === 0) {
                dropdown = $('<ul class="autocomplete-dropdown"></ul>');
                input.after(dropdown);
            }
            
            dropdown.empty();
            
            if (matches.length > 0) {
                matches.slice(0, 5).forEach(function(city) {
                    var li = $('<li>' + city + '</li>');
                    li.on('click', function() {
                        input.val(city);
                        dropdown.hide();
                    });
                    dropdown.append(li);
                });
                dropdown.show();
            } else {
                dropdown.hide();
            }
        } else {
            $('.autocomplete-dropdown').hide();
        }
    });

    // Hide autocomplete when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('input, .autocomplete-dropdown').length) {
            $('.autocomplete-dropdown').hide();
        }
    });

    // Form Validation
    $('form').on('submit', function() {
        var isValid = true;
        
        $(this).find('input[required], select[required]').each(function() {
            if (!$(this).val()) {
                $(this).addClass('error');
                isValid = false;
            } else {
                $(this).removeClass('error');
            }
        });
        
        if (!isValid) {
            alert('Please fill in all required fields.');
            return false;
        }
    });

    // Remove error class on input
    $('input, select').on('input change', function() {
        $(this).removeClass('error');
    });
});

// CSS for dynamic elements
var dynamicCSS = `
<style>
.back-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: #e74c3c;
    color: white;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
    box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
}

.back-to-top.show {
    opacity: 1;
    visibility: visible;
}

.back-to-top:hover {
    background: #c0392b;
    transform: translateY(-3px);
}

.site-header.scrolled {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 20px rgba(0,0,0,0.15);
}

.autocomplete-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ddd;
    border-top: none;
    border-radius: 0 0 8px 8px;
    max-height: 200px;
    overflow-y: auto;
    z-index: 1000;
    display: none;
}

.autocomplete-dropdown li {
    padding: 12px;
    cursor: pointer;
    border-bottom: 1px solid #eee;
    transition: background-color 0.2s ease;
}

.autocomplete-dropdown li:hover {
    background: #f8f9fa;
}

.autocomplete-dropdown li:last-child {
    border-bottom: none;
}

.form-group {
    position: relative;
}

input.error,
select.error {
    border-color: #e74c3c !important;
    box-shadow: 0 0 5px rgba(231, 76, 60, 0.3);
}

.animated.fade-in {
    animation: fadeInUp 0.6s ease forwards;
}

.animated.slide-in-left {
    animation: slideInLeft 0.6s ease forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Mobile Menu Styles */
@media (max-width: 768px) {
    .menu-toggle {
        display: block;
        background: none;
        border: none;
        cursor: pointer;
        padding: 10px;
    }
    
    .hamburger {
        display: flex;
        flex-direction: column;
        width: 25px;
        height: 20px;
        justify-content: space-between;
    }
    
    .hamburger span {
        background: #333;
        height: 3px;
        width: 100%;
        border-radius: 2px;
        transition: all 0.3s ease;
    }
    
    .menu-toggle.active .hamburger span:nth-child(1) {
        transform: rotate(45deg) translate(6px, 6px);
    }
    
    .menu-toggle.active .hamburger span:nth-child(2) {
        opacity: 0;
    }
    
    .menu-toggle.active .hamburger span:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
    }
    
    #site-navigation {
        position: fixed;
        top: 0;
        left: -100%;
        width: 80%;
        height: 100vh;
        background: white;
        transition: left 0.3s ease;
        z-index: 9999;
        padding-top: 80px;
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    }
    
    #site-navigation.active {
        left: 0;
    }
    
    #site-navigation ul {
        flex-direction: column;
        padding: 20px;
    }
    
    #site-navigation li {
        margin: 0 0 20px 0;
    }
    
    #site-navigation a {
        font-size: 18px;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }
    
    .body.menu-open::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 9998;
    }
}
</style>
`;

jQuery(document).ready(function($) {
    $('head').append(dynamicCSS);
});