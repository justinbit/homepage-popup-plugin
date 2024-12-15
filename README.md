# Homepage Popup Plugin

A lightweight WordPress plugin that displays a customizable popup message on your website's homepage.

## Features

- ✨ Homepage-only popup display
- 🍪 Weekly cookie-based display control
- 🔒 Secure cookie implementation
- 📱 Responsive design
- 🔧 Easily customizable content
- ❌ Click-to-close functionality

## Installation

1. Download the plugin files
2. Upload to your `/wp-content/plugins/homepage-popup/` directory
3. Activate through WordPress admin panel: Plugins > Installed Plugins

## Usage

The popup displays automatically on homepage with default message:

- Title: "Notice: We are temporarily not shipping packages between 12/12/24 and 01/01/25"
- Content: "Not in a hurry to receive your products? Feel free to place your order and your items will be shipped on January 2nd."

### Customization

To modify the popup content, edit the following variables in `Homepage_Popup.php`:

- `$popup_title`
- `$popup_content`

## Technical Details

- WordPress 5.0+
- PHP 7.4+
- Cookie Duration: 7 days
- Security: HTTPOnly, Secure, SameSite cookies

## Files

- `Homepage_Popup.php` - Main plugin logic
- `popup-style.css` - Styling
- `popup-script.js` - Frontend functionality

## Version

1.1

## Author

Your Name

## License

GPL v2 or later
