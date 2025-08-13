# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

### Frontend Development
- `npm run dev` - Start Vite development server with hot reloading
- `npm run build` - Build frontend assets for production  
- `npm run production` - Alias for build command

### Backend Development
- `php artisan serve` - Start Laravel development server
- `php artisan migrate` - Run database migrations
- `php artisan db:seed` - Run database seeders
- `php artisan storage:link` - Create symbolic link for storage

### Testing
- `php artisan test` - Run PHPUnit tests
- `vendor/bin/phpunit` - Alternative test command

### Code Quality
- `vendor/bin/pint` - Run Laravel Pint code formatter
- `php artisan filament:upgrade` - Upgrade Filament components

## Architecture Overview

This is a Laravel 9 portfolio application with the following key architectural components:

### Tech Stack
- **Backend**: Laravel 9 with PHP 8.0+
- **Frontend**: Vue 3 + Inertia.js for SPA-like experience
- **Admin Panel**: FilamentPHP v3 at `/admin` route
- **Styling**: TailwindCSS with custom color palette
- **Build**: Vite for asset compilation
- **Image Processing**: Intervention Image v3

### Data Models & Relationships
- `Project` - Portfolio projects (belongs to Skill, has image uploads)
- `Skill` - Technical skills with icons (has many Projects)  
- `Certification` - Professional certifications
- `Service` - Services offered with icons
- `SocialLink` - Social media links
- `SiteSetting` - Dynamic content management via key-value pairs

### Frontend Architecture
- **Layout**: Single `Frontend.vue` layout for public pages
- **Components**: Modular Vue components in `resources/js/Components/Frontend/`
- **Pages**: Main page is `Welcome.vue` with sectioned content
- **Data Flow**: Laravel controllers → Inertia → Vue components

### Content Management
- **FilamentPHP Admin**: Full CRUD interface at `/admin`
- **Dynamic Content**: `SiteSettingService` manages configurable content
- **File Uploads**: Images stored in `storage/app/public/` with proper URL generation
- **Scoping**: Models use scopes for filtering (featured, active, ordered)

### Key Services
- `SiteSettingService` - Manages dynamic site content retrieval
- `ImageProcessingService` - Handles image uploads and optimization

### Routing Structure
- `/` - Main portfolio page (WelcomeController)
- `/contact` - Contact form submission
- `/admin` - FilamentPHP admin panel
- `/sitemap.xml` - Generated sitemap

## Project-Specific Patterns

### Model Conventions
- Use `$fillable` arrays for mass assignment
- Implement appropriate `$casts` for JSON fields
- Add accessor methods for computed attributes (e.g., `getImageUrlAttribute()`)
- Use global scopes for default ordering
- Implement named scopes for common queries

### Frontend Patterns
- Props are passed from Laravel controllers through Inertia
- Components receive data as props and emit events up
- TailwindCSS classes use custom color palette (light-primary, dark-navy-500, etc.)
- Images use `asset('storage/' . $path)` for proper URL generation

### Admin Panel
- FilamentPHP resources in `app/Filament/Resources/`
- Custom form fields for file uploads and rich content
- Proper relationship handling in forms
- Use resource pages for customized CRUD operations

## File Storage
- Public uploads go to `storage/app/public/`
- Symbolic link required: `php artisan storage:link`
- Access via `asset('storage/filename')`