# TripBookKar WordPress Theme

A modern, responsive WordPress theme designed for travel booking websites, inspired by MakeMyTrip's layout and functionality.

## Features

### 🎨 Modern Design
- **Responsive Layout**: Optimized for desktop, tablet, and mobile devices
- **Modern UI/UX**: Clean, professional design with smooth animations
- **Travel-Focused**: Specifically designed for travel and booking websites
- **Customizable Colors**: Built-in color customization options

### ✈️ Travel Booking Features
- **Multi-Service Search**: Integrated search forms for flights, hotels, and packages
- **API Integration Ready**: Placeholder integrations for Amadeus, Booking.com, and TravelPayouts
- **Interactive Search Forms**: Dynamic form switching with real-time validation
- **Search Results Display**: Professional flight and hotel results layout

### 🏗️ WordPress Features
- **Custom Post Types**: Destinations, Packages, and Testimonials
- **Custom Taxonomies**: Destination types and package categories
- **Widget Areas**: Sidebar and footer widget areas
- **Custom Meta Boxes**: Package details and destination information
- **SEO Optimized**: Clean code structure and SEO-friendly markup

### 🔧 Developer Features
- **Elementor Compatible**: Built-in support for Elementor page builder
- **Hook System**: WordPress action and filter hooks throughout
- **Translation Ready**: Full i18n support with text domain
- **Security Focused**: Secure coding practices and data sanitization
- **Performance Optimized**: Lightweight code and optimized assets

## Installation

1. **Download the theme files**
2. **Upload to WordPress**:
   - Go to WordPress Admin → Appearance → Themes
   - Click "Add New" → "Upload Theme"
   - Upload the `tripbookkar-theme.zip` file
3. **Activate the theme**
4. **Configure theme settings**:
   - Go to Appearance → Theme Settings
   - Configure API keys and customize colors

## Theme Setup

### Required Plugins
The theme works best with these recommended plugins:

- **Elementor** (Free) - Page builder integration
- **Contact Form 7** - Contact forms
- **Yoast SEO** - SEO optimization
- **WP Super Cache** - Performance optimization

### Theme Configuration

#### 1. API Integration
Navigate to **Appearance → Theme Settings** to configure:

- **Amadeus API**: For flight data integration
  - API Key
  - API Secret
- **Booking.com API**: For hotel data
  - API Key
- **TravelPayouts**: For additional travel data
  - API Token

#### 2. Color Customization
- **Primary Color**: Main theme color (default: #e74c3c)
- **Secondary Color**: Accent color (default: #3498db)

#### 3. Logo Setup
- Go to **Appearance → Customize → Site Identity**
- Upload your logo (recommended size: 250x80px)

### Content Setup

#### 1. Create Pages
Create these essential pages:

- **Home** (set as homepage)
- **Flights** (assign "Flights Page" template)
- **Hotels** (create with hotel content)
- **Packages** (for holiday packages)
- **Destinations** (destination listings)
- **About**
- **Contact**

#### 2. Menu Setup
- Go to **Appearance → Menus**
- Create a main menu with the pages above
- Assign to "Primary Menu" location

#### 3. Add Content
- **Destinations**: Add destination posts with featured images
- **Packages**: Create package posts with pricing and details
- **Testimonials**: Add customer testimonials

## File Structure

```
tripbookkar-theme/
├── assets/
│   ├── css/
│   │   └── main.css
│   ├── js/
│   │   └── main.js
│   └── images/
├── inc/
│   └── (theme includes)
├── template-parts/
│   └── (template components)
├── style.css (theme info & styles)
├── functions.php (theme setup)
├── index.php (main template)
├── home.php (homepage)
├── header.php
├── footer.php
├── sidebar.php
├── page.php
├── single.php
├── page-flights.php (flights template)
└── README.md
```

## Customization

### Custom Post Types

#### Destinations
- Custom fields: Best time to visit, Climate, Top attractions
- Featured image for destination photos
- Supports: title, editor, thumbnail, excerpt

#### Packages
- Custom fields: Price, Duration, Package includes
- Featured image for package photos
- Categories: Package categories taxonomy

#### Testimonials
- Customer reviews and ratings
- Featured image for customer photos

### Template Hierarchy

The theme follows WordPress template hierarchy:

- `home.php` - Homepage template
- `page-flights.php` - Custom flights page
- `single.php` - Blog post template
- `page.php` - General page template
- `index.php` - Fallback template

### Hooks and Filters

#### Available Actions
- `tripbookkar_header_before`
- `tripbookkar_header_after`
- `tripbookkar_footer_before`
- `tripbookkar_footer_after`

#### Available Filters
- `tripbookkar_search_results`
- `tripbookkar_package_price_format`
- `tripbookkar_destination_meta`

## API Integration

### Flight Search (Amadeus API)
```php
// Example usage
$results = tripbookkar_amadeus_search_flights(
    'NYC', // Origin
    'LON', // Destination
    '2024-06-15', // Departure
    '2024-06-22'  // Return (optional)
);
```

### Hotel Search (Booking.com API)
```php
// Example usage
$results = tripbookkar_booking_search_hotels(
    'London', // City
    '2024-06-15', // Check-in
    '2024-06-18', // Check-out
    2 // Guests
);
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Performance

- **Page Load Speed**: Optimized for fast loading
- **Mobile Performance**: Responsive design with mobile-first approach
- **SEO Friendly**: Clean markup and semantic HTML
- **Accessibility**: WCAG 2.1 AA compliant

## Support

### Documentation
- Check the theme's built-in help sections
- Review code comments for developer guidance

### Common Issues

#### Search Forms Not Working
- Ensure AJAX URLs are properly configured
- Check that nonce verification is working
- Verify API credentials in theme settings

#### Styling Issues
- Clear cache after theme activation
- Check for plugin conflicts
- Ensure proper CSS loading

#### API Integration Problems
- Verify API credentials
- Check API endpoint URLs
- Review server error logs

## Updates

The theme includes update checking functionality. When updates are available:

1. Download the latest version
2. Upload via WordPress admin
3. Clear any caching

## License

This theme is licensed under GPL v2 or later.

## Credits

- **Framework**: Built on WordPress best practices
- **Icons**: Emoji icons for cross-platform compatibility
- **Fonts**: Google Fonts (Inter)
- **Inspiration**: MakeMyTrip design patterns

## Changelog

### Version 1.0.0
- Initial release
- Complete theme functionality
- API integration placeholders
- Responsive design
- Elementor compatibility
- SEO optimization

---

**Theme Name**: TripBookKar  
**Version**: 1.0.0  
**Author**: TripBookKar Team  
**License**: GPL v2 or later  
**Requires WordPress**: 5.0+  
**Tested up to**: WordPress 6.4  
**Requires PHP**: 7.4+