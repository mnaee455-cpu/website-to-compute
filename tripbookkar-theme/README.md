# TripBookKar WordPress Theme

A modern, fully functional WordPress theme for travel booking websites inspired by MakeMyTrip. Built with responsive design, API integration capabilities, and comprehensive booking functionality.

![TripBookKar Theme](https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=1200&h=600&fit=crop)

## 🌟 Features

### Core Functionality
- **Modern Responsive Design** - Optimized for desktop, tablet, and mobile devices
- **Travel Booking System** - Complete booking forms for flights, hotels, and packages
- **API Integration Ready** - Built-in support for Amadeus, Booking.com, TravelPayouts APIs
- **20 Pre-made Destinations** - SEO-friendly destination pages with rich content
- **One-click Demo Importer** - Quick setup with sample content
- **Elementor Support** - Drag-and-drop page building capability

### Homepage Features
- **Hero Section** with full-width travel image/video background
- **Tabbed Search Forms** for Flights, Hotels, and Packages
- **Top Destinations** in responsive grid/card layout
- **Featured Packages** with images, prices, and booking buttons
- **Customer Testimonials** section
- **Why Choose Us** section with trust indicators

### Dedicated Pages
- **Flights Page** - Advanced search with Amadeus API placeholder
- **Hotels Page** - Comprehensive hotel search with Booking.com integration
- **Holiday Packages** - Complete package browsing with filters
- **Individual Destinations** - 20 pre-made destination pages with:
  - Hero sections with destination stats
  - Photo galleries
  - Top attractions
  - Weather information
  - Travel tips
  - Quick booking widgets

### Admin Features
- **Custom Admin Panel** with TripBookKar branding
- **API Settings Page** for configuring travel APIs
- **Theme Customization** options
- **Demo Content Importer** for quick setup
- **SEO Optimization** built-in

### Technical Features
- **WordPress 6.0+ Compatible**
- **PHP 8.0+ Support**
- **Responsive Grid System**
- **Custom Post Types** (Destinations, Packages, Testimonials)
- **Custom Meta Fields** for travel data
- **AJAX Search Functionality**
- **Loading Animations** and smooth transitions
- **Schema Markup** for SEO
- **Performance Optimized**

## 📋 Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher
- Memory limit of 128MB (256MB recommended)

### Recommended Plugins
- **Elementor** (Free) - For drag-and-drop editing
- **Contact Form 7** - For contact forms
- **Yoast SEO** - For enhanced SEO
- **Wordfence Security** - For security
- **WP Super Cache** - For performance

## 🚀 Installation

### Method 1: Direct Upload
1. Download the `tripbookkar-theme` folder
2. Upload it to `/wp-content/themes/` directory
3. Go to WordPress Admin → Appearance → Themes
4. Activate "TripBookKar" theme

### Method 2: WordPress Admin
1. Go to WordPress Admin → Appearance → Themes → Add New
2. Click "Upload Theme"
3. Choose the theme ZIP file
4. Click "Install Now" and then "Activate"

## ⚙️ Setup Guide

### 1. Initial Setup
After activating the theme:

1. **Import Demo Content**:
   - Go to `TripBookKar → Demo Importer` in admin
   - Click "Import Demo Content"
   - This creates 20 destinations, packages, and sample content

2. **Configure Menus**:
   - Go to `Appearance → Menus`
   - Create menu with: Home, Destinations, Flights, Hotels, Packages, Contact
   - Assign to "Primary Menu" location

3. **Set Homepage**:
   - Go to `Settings → Reading`
   - Set "A static page" and choose your homepage

### 2. API Configuration
To enable live data integration:

1. **Go to `TripBookKar → API Settings`**
2. **Configure APIs**:
   - **Amadeus API**: Get keys from [Amadeus Developer Portal](https://developers.amadeus.com/)
   - **Booking.com**: Apply for partner access at [Booking.com Partner Hub](https://developers.booking.com/)
   - **TravelPayouts**: Sign up at [TravelPayouts](https://www.travelpayouts.com/)
   - **Weather API**: Get free key from [OpenWeatherMap](https://openweathermap.org/api)

### 3. Create Essential Pages
Create these pages and assign the correct templates:

- **Flights**: Create page → Template: "Flights Page"
- **Hotels**: Create page → Template: "Hotels Page"  
- **Packages**: Create page → Template: "Holiday Packages"
- **Contact**: Standard contact page with Contact Form 7

### 4. Customize Theme
1. **Go to `Appearance → Customize`**:
   - Upload your logo
   - Set brand colors
   - Configure homepage sections
   - Add social media links

2. **Or use `TripBookKar → Theme Options`** for additional settings

## 🎨 Customization

### Colors and Branding
- Primary Color: Default `#e74c3c` (customizable)
- Secondary Color: Default `#3498db` (customizable)
- Logo: Upload via Customizer
- Fonts: Inter font family (Google Fonts)

### Creating Destinations
1. Go to `Destinations → Add New`
2. Fill in the content and featured image
3. Add custom fields:
   - Country
   - Continent  
   - Best time to visit
   - Average cost per day
   - Currency
   - Language
   - Time zone

### Adding Packages
1. Go to `Packages → Add New`
2. Add package details, images, and pricing
3. Set package type and inclusions

## 🔌 API Integration

### Flight Search (Amadeus)
```php
// Example integration in functions.php
function tripbookkar_amadeus_search($from, $to, $date) {
    $api_key = get_option('tripbookkar_amadeus_api_key');
    // API call implementation
}
```

### Hotel Search (Booking.com)
```php
// Example integration
function tripbookkar_booking_search($city, $checkin, $checkout) {
    $api_key = get_option('tripbookkar_booking_com_api_key');
    // API call implementation
}
```

## 📱 Mobile Optimization

The theme is fully responsive with:
- Mobile-first design approach
- Touch-friendly navigation
- Optimized images and loading
- Fast mobile performance
- Hamburger menu for mobile

## 🔍 SEO Features

- **Structured Data**: Schema markup for destinations and packages
- **Open Graph**: Social media sharing optimization
- **Meta Tags**: Automatic meta descriptions for destinations
- **Clean URLs**: SEO-friendly permalink structure
- **Sitemap Ready**: Compatible with SEO plugins
- **Fast Loading**: Optimized for Core Web Vitals

## 🎯 Performance

The theme is optimized for speed:
- Minified CSS and JavaScript
- Optimized images with lazy loading
- Efficient database queries
- Caching-friendly code
- CDN ready

## 🛠️ Troubleshooting

### Common Issues

**1. Demo content not importing**
- Check PHP memory limit (increase to 256MB)
- Ensure WordPress has write permissions

**2. API not working**
- Verify API keys are correctly entered
- Check API endpoint URLs
- Ensure server allows external API calls

**3. Styling issues**
- Clear any caching plugins
- Check for theme/plugin conflicts
- Ensure CSS files are loading

**4. Mobile responsiveness**
- Clear browser cache
- Test on actual mobile devices
- Check viewport meta tag

## 📚 Documentation

### File Structure
```
tripbookkar-theme/
├── style.css              # Main stylesheet with theme info
├── functions.php          # Theme functions and features
├── index.php             # Default template
├── home.php              # Homepage template
├── header.php            # Site header
├── footer.php            # Site footer
├── page-flights.php      # Flights page template
├── page-hotels.php       # Hotels page template  
├── page-packages.php     # Packages page template
├── single-destinations.php # Single destination template
├── archive-destinations.php # Destinations archive
├── assets/
│   ├── css/              # Additional stylesheets
│   └── js/               # JavaScript files
└── README.md             # This file
```

### Hooks and Filters
The theme provides several hooks for customization:

```php
// Customize search form
add_filter('tripbookkar_search_form_fields', 'custom_search_fields');

// Modify destination meta
add_filter('tripbookkar_destination_meta', 'custom_destination_meta');

// Add custom package types
add_filter('tripbookkar_package_types', 'custom_package_types');
```

## 🔄 Updates

To update the theme:
1. Backup your site
2. Download the latest version
3. Replace theme files (keep customizations in child theme)
4. Check for any breaking changes in changelog

## 🆘 Support

For support and questions:
- Check this README first
- Review WordPress Codex for general WordPress issues
- Search existing GitHub issues
- Create a new issue with detailed information

### Before Requesting Support
Please provide:
- WordPress version
- PHP version
- Active plugins list
- Error messages (if any)
- Steps to reproduce the issue

## 📄 License

This theme is licensed under GPL v2 or later.
- You can use it for personal and commercial projects
- You can modify and redistribute it
- Attribution is appreciated but not required

## 🙏 Credits

### Third-party Resources
- **Fonts**: [Google Fonts (Inter)](https://fonts.google.com/specimen/Inter)
- **Images**: [Unsplash](https://unsplash.com) (for demo content)
- **Icons**: Emoji (cross-platform compatibility)
- **Inspiration**: MakeMyTrip.com layout and functionality

### Development
- Built with WordPress best practices
- Follows WordPress Coding Standards
- Responsive design principles
- Modern CSS Grid and Flexbox
- Vanilla JavaScript with jQuery

## 🚀 Future Enhancements

Planned features for future versions:
- **Multi-language Support** (WPML compatibility)
- **Advanced Booking System** with payment integration
- **User Dashboard** for booking management
- **Review System** for destinations and packages
- **Advanced Filters** for search functionality
- **Email Templates** for booking confirmations
- **Social Login** integration
- **Progressive Web App** features

---

**Theme Version**: 1.0.0  
**WordPress Compatibility**: 5.0+  
**Last Updated**: 2024  

Made with ❤️ for travel enthusiasts and agencies worldwide.