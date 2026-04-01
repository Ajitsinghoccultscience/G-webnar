# Webnar

Laravel project with Tailwind CSS for webinars and live events.

## Setup

1. **Install PHP dependencies** (already done):
   ```bash
   composer install
   ```

2. **Install Node dependencies and build assets**:
   ```bash
   npm install
   npm run dev
   ```
   Or for production:
   ```bash
   npm run build
   ```

3. **Run the development server**:
   ```bash
   php artisan serve
   ```

4. Open http://localhost:8000 in your browser.

## Stack

- **Laravel 12** - PHP framework
- **Tailwind CSS v4** - Styling (via Vite)
- **Vite** - Asset bundling

## Design Tokens

Design variables are defined in:
- `resources/css/app.css` - @theme block (Tailwind v4)
- `public/css/global.css` - Fallback when Vite is not built

Primary color: `#6366f1` (indigo)
