# Dynamic Content Management Plan for Portfolio Website

## Overview
Transform the static Welcome.vue page into a fully dynamic, admin-manageable system using Filament admin panel. This will allow easy content updates without code changes.

## 🎯 Components to Make Dynamic

### 1. Hero Section (`Hero.vue`)
- **Personal Information**
  - Greeting text ("👋 Hey, I'm Amril")
  - Main title and highlight text
  - Description paragraph
  - CTA button text and link
- **Media Assets**
  - Hero image
  - Resume file (PDF)
- **Social Media Links**
  - Platform links (Twitter, LinkedIn, GitHub)
  - Icons and labels

### 2. About Section (`About.vue`)
- **Content**
  - Section title and subtitle
  - Main description paragraphs
  - Skills lists (Frontend, Backend, DevOps)
  - Approach/philosophy text
- **Media**
  - About image

### 3. Services Section (`Services.vue`)
- **Section Header**
  - Main title and description
- **Service Cards** (4 cards)
  - Service icons (SVG or icon classes)
  - Service titles
  - Service descriptions

### 4. Contact Section (`ContactMe.vue`)
- **Content**
  - Section title and subtitle
  - Contact email address
  - Contact description text

## 🗄️ Database Structure

### 1. `site_settings` Table
```sql
CREATE TABLE site_settings (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    key varchar(255) NOT NULL UNIQUE,
    value text,
    type enum('text', 'textarea', 'file', 'image', 'json') DEFAULT 'text',
    group_name varchar(100) DEFAULT 'general',
    order_index int DEFAULT 0,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id),
    KEY idx_group_order (group_name, order_index)
);
```

### 2. `services` Table
```sql
CREATE TABLE services (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    description text NOT NULL,
    icon_type enum('svg', 'class') DEFAULT 'svg',
    icon_content text,
    order_index int DEFAULT 0,
    is_active boolean DEFAULT true,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id),
    KEY idx_order_active (order_index, is_active)
);
```

### 3. `social_links` Table
```sql
CREATE TABLE social_links (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    platform varchar(100) NOT NULL,
    url varchar(500) NOT NULL,
    icon_svg text,
    order_index int DEFAULT 0,
    is_active boolean DEFAULT true,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id),
    KEY idx_order_active (order_index, is_active)
);
```

## 🏗️ Implementation Steps

### Phase 1: Database & Models Setup

#### 1.1 Create Migrations
- `create_site_settings_table.php`
- `create_services_table.php` 
- `create_social_links_table.php`

#### 1.2 Create Models
- `SiteSetting.php` - For general content management
- `Service.php` - For services section
- `SocialLink.php` - For social media links

#### 1.3 Create Seeders
- Populate initial data from existing static content
- Set up default values for all sections

### Phase 2: Filament Resources

#### 2.1 SiteSettingResource
- Group settings by sections (hero, about, contact, general)
- Custom form fields based on setting type
- File upload handling for images and documents
- Rich text editor for longer content

#### 2.2 ServiceResource
- CRUD operations for service cards
- Icon management (SVG upload or icon class)
- Order management with drag & drop
- Active/inactive toggle

#### 2.3 SocialLinkResource
- Platform management
- URL validation
- SVG icon upload
- Order management

### Phase 3: Backend Services

#### 3.1 SiteSettingService
```php
class SiteSettingService
{
    public static function get(string $key, $default = null)
    public static function set(string $key, $value, string $type = 'text')
    public static function getGroup(string $group): Collection
    public static function getHeroSettings(): array
    public static function getAboutSettings(): array
    public static function getContactSettings(): array
}
```

#### 3.2 File Management
- Resume upload handling
- Image optimization and variants
- File storage organization
- Old file cleanup

### Phase 4: Controller Updates

#### 4.1 WelcomeController Enhancement
```php
public function index()
{
    return Inertia::render('Welcome', [
        'skills' => Skill::all(),
        'projects' => Project::with('skills')->get(),
        'certifications' => Certification::all(),
        'heroData' => SiteSettingService::getHeroSettings(),
        'aboutData' => SiteSettingService::getAboutSettings(),
        'services' => Service::active()->ordered()->get(),
        'socialLinks' => SocialLink::active()->ordered()->get(),
        'contactData' => SiteSettingService::getContactSettings(),
    ]);
}
```

### Phase 5: Frontend Component Updates

#### 5.1 Hero.vue Updates
- Accept props for all dynamic content
- Handle dynamic social links rendering
- Dynamic resume link generation
- Conditional rendering based on available data

#### 5.2 About.vue Updates
- Props for all text content and image
- Dynamic skills list rendering
- Fallback content handling

#### 5.3 Services.vue Updates
- Loop through services data
- Dynamic icon rendering (SVG or icon class)
- Responsive grid based on service count

#### 5.4 ContactMe.vue Updates
- Dynamic content props
- Configurable contact information

## 📁 File Organization

### Models Location
```
app/Models/
├── SiteSetting.php
├── Service.php
└── SocialLink.php
```

### Filament Resources
```
app/Filament/Resources/
├── SiteSettingResource.php
├── ServiceResource.php
└── SocialLinkResource.php
```

### Services
```
app/Services/
├── SiteSettingService.php
└── FileUploadService.php
```

### Storage Structure
```
storage/app/public/
├── hero/
│   ├── images/
│   └── resume/
├── about/
│   └── images/
├── services/
│   └── icons/
└── social/
    └── icons/
```

## 🎨 Filament Admin Interface Design

### 1. Navigation Menu Structure
```
Content Management
├── 📄 Site Settings
├── 🛠️ Services
├── 🔗 Social Links
├── 💼 Skills (existing)
├── 📂 Projects (existing)
└── 🏆 Certifications (existing)
```

### 2. Site Settings Groups
- **Hero Section**: Greeting, title, description, CTA, images, resume
- **About Section**: Title, description, skills, images
- **Contact Section**: Title, description, email
- **General**: Meta information, analytics, etc.

### 3. Form Field Types
- **Text Input**: Short text content
- **Textarea**: Longer descriptions
- **Rich Editor**: Formatted content
- **File Upload**: Images and documents
- **Repeater**: For skill lists
- **Toggle**: Active/inactive states

## 🚀 Deployment Considerations

### 1. File Storage
- Configure proper file storage (local/S3)
- Set up file serving routes
- Image optimization pipeline

### 2. Caching Strategy
- Cache site settings for performance
- Cache busting for file updates
- Redis caching for frequently accessed data

### 3. Backup Strategy
- Regular database backups
- File storage backups
- Export/import functionality for content

## 📋 Testing Strategy

### 1. Unit Tests
- Model relationships and methods
- Service class functionality
- File upload validation

### 2. Feature Tests
- Filament resource operations
- Frontend data rendering
- File management workflows

### 3. Browser Tests
- Admin panel usability
- Frontend content updates
- Responsive design validation

## 🔄 Migration Strategy

### Phase 1: Parallel Implementation
- Build new system alongside existing
- Populate with current static content
- Test thoroughly in development

### Phase 2: Content Migration
- Export current static content to database
- Verify data integrity
- Test frontend rendering

### Phase 3: Switch Over
- Update controllers to use dynamic data
- Deploy with zero downtime
- Monitor for issues

### Phase 4: Cleanup
- Remove static content files
- Update documentation
- Train content managers

## 📝 Content Management Workflow

### 1. Admin User Journey
1. Login to Filament admin panel
2. Navigate to relevant content section
3. Edit content using rich interface
4. Preview changes (if implemented)
5. Publish updates
6. View live changes on frontend

### 2. Content Types Supported
- **Plain Text**: Titles, labels, short descriptions
- **Rich Text**: Formatted content with HTML
- **Images**: Hero images, about photos, service icons
- **Files**: Resume PDFs, documents
- **URLs**: Social media links, external references
- **JSON**: Complex structured data

## 🎯 Success Metrics

### 1. Performance Metrics
- Page load time impact
- Database query optimization
- File serving efficiency

### 2. Usability Metrics
- Admin panel ease of use
- Content update frequency
- Error rate reduction

### 3. Maintenance Metrics
- Code deployment frequency
- Content update speed
- Bug report reduction

This plan provides a comprehensive roadmap for transforming your static portfolio into a fully dynamic, admin-manageable system while maintaining performance and user experience. 