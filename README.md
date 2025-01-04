# Color Converter Application

This Laravel 11 application allows users to convert color values between HEX and RGB formats. The application includes an intuitive form, displays the converted color result along with a visual representation, and provides a "Copy to Clipboard" feature.

## Features
- Convert HEX to RGB.
- Convert RGB to HEX.
- Visual representation of the converted color.
- Copy the converted color value to the clipboard.
- User-friendly interface styled with Tailwind CSS.

## Installation

### Prerequisites
Ensure you have the following installed on your system:
- PHP 8.2 or higher
- Composer
- Node.js and npm (for Tailwind CSS)
- A web server (e.g., Apache, Nginx, or Laravel's built-in server)

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/Volodymyr0587/laravel-color-converter.git
   cd color-converter
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```

3. Set up the `.env` file:
   ```bash
   cp .env.example .env
   ```
   Update the `.env` file with your database and application configuration.

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Start the development server:
   ```bash
   php artisan serve
   ```

## Usage
1. Navigate to the application in your web browser:
   ```
    http://127.0.0.1:8000
   ```
2. Use the form to enter a HEX or RGB value and submit it.
3. View the converted result with the color preview.
4. Click the "Copy to Clipboard" button to copy the converted value.

## Code Structure

### Routes
The application routes are defined in `routes/web.php`:
```php
Route::view('/', 'color-converter')->name('color-converter');
Route::post('/hex-to-rgb', [ColorConverterController::class, 'hexToRgb'])->name('hex-to-rgb');
Route::post('/rgb-to-hex', [ColorConverterController::class, 'rgbToHex'])->name('rgb-to-hex');
```

### Controller
The `ColorConverterController` contains the logic for color conversion.

#### HEX to RGB
Converts a HEX color value to RGB:
```php
public function hexToRgb(Request $request) {
    // Logic to process HEX to RGB conversion
}
```

#### RGB to HEX
Converts an RGB color value to HEX:
```php
public function rgbToHex(Request $request) {
    // Logic to process RGB to HEX conversion
}
```

### Views
The Blade template `resources/views/color-converter.blade.php` provides the user interface. It includes:
- Form for color input.
- Display of conversion results.
- "Copy to Clipboard" functionality.

### Tailwind CSS
Tailwind CSS is used for styling. Ensure Tailwind is set up and compiled using:
```bash
npm run dev
```

## Example Output
### HEX to RGB
Input: `#ff5733`  
Output: `rgb(255, 87, 51)`

### RGB to HEX
Input: `rgb(255, 87, 51)`  
Output: `#ff5733`

## Contributing
Contributions are welcome! Feel free to fork the repository and submit a pull request.

## License
This project is licensed under the MIT License. See the `LICENSE` file for details.

---

Happy Coding!

