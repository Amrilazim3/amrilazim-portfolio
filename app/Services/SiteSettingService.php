<?php

namespace App\Services;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class SiteSettingService
{
    const CACHE_TTL = 3600; // 1 hour
    const CACHE_PREFIX = 'site_settings:';

    /**
     * Get a setting value by key
     */
    public static function get(string $key, $default = null)
    {
        $cacheKey = self::CACHE_PREFIX . $key;
        
        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($key, $default) {
            return SiteSetting::getValue($key, $default);
        });
    }

    /**
     * Set a setting value
     */
    public static function set(string $key, $value, string $type = 'text', string $group = 'general'): SiteSetting
    {
        $setting = SiteSetting::setValue($key, $value, $type, $group);
        
        // Clear cache for this setting
        Cache::forget(self::CACHE_PREFIX . $key);
        Cache::forget(self::CACHE_PREFIX . 'group:' . $group);
        
        return $setting;
    }

    /**
     * Get settings by group
     */
    public static function getGroup(string $group): array
    {
        $cacheKey = self::CACHE_PREFIX . 'group:' . $group;
        
        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($group) {
            return SiteSetting::getGroupSettings($group);
        });
    }

    /**
     * Get hero section settings
     */
    public static function getHeroSettings(): array
    {
        $settings = self::getGroup('hero');
        
        return [
            'greeting' => $settings['hero_greeting'] ?? '👋 Hey, I\'m Amril asd',
            'title' => $settings['hero_title'] ?? 'I Build Amazing',
            'title_highlight' => $settings['hero_title_highlight'] ?? 'Digital Experiences',
            'description' => $settings['hero_description'] ?? 'Full-stack developer with experience in both web and mobile development...',
            'cta_text' => $settings['hero_cta_text'] ?? 'Work with me',
            'cta_link' => $settings['hero_cta_link'] ?? '/#contact',
            'image' => $settings['hero_image'] ?? '/hero/images/hero-mh3f1u.jpeg',
            'resume_file' => $settings['hero_resume'] ?? '/hero/resume/amrilresumeJULY25.pdf',
        ];
    }

    /**
     * Get about section settings
     */
    public static function getAboutSettings(): array
    {
        $settings = self::getGroup('about');
        
        return [
            'title' => $settings['about_title'] ?? 'Turning Ideas Into Reality',
            'subtitle' => $settings['about_subtitle'] ?? 'Full Stack Developer & Problem Solver',
            'description' => $settings['about_description'] ?? 'With over 4+ years of experience...',
            'approach_text' => $settings['about_approach'] ?? 'I believe in writing clean, maintainable code...',
            'image' => $settings['about_image'] ?? '/img/about.jpeg',
            'frontend_skills' => $settings['about_frontend_skills'] ?? [
                'Vue.js', 'JavaScript/TypeScript', 'Tailwind CSS', 'Responsive Design'
            ],
            'backend_skills' => $settings['about_backend_skills'] ?? [
                'Laravel (PHP)', 'MySQL', 'Redis', 'RESTful APIs'
            ],
            'devops_skills' => $settings['about_devops_skills'] ?? [
                'Docker', 'Linux Server Management', 'Git', 'CI/CD'
            ],
        ];
    }

    /**
     * Get about portfolio section settings
     * 
     */
    public static function getPortfolioSettings(): array
    {
        $settings = self::getGroup('portfolio');
        
        return [
            'title' => $settings['portfolio_title'] ?? 'Featured Projects & Case Studies',
            'subtitle' => $settings['portfolio_subtitle'] ?? 'Real projects, real results. Here\'s a showcase of web applications I\'ve built for clients, featuring detailed case studies that demonstrate my problem-solving approach and technical expertise.',
        ];
    }

    /**
     * Get about learning section settings
     * 
     */
    public static function getLearningSettings(): array
    {
        $settings = self::getGroup('learning');
        
        return [
            'title' => $settings['learning_title'] ?? 'Continuous Learning Journey',
            'subtitle' => $settings['learning_subtitle'] ?? '🚀 Committed to staying current with the latest technologies and best practices. Here are some of the courses I\'ve completed to enhance my skills and knowledge.',
            'phylosophy' => [
                'title' => $settings['learning_phylosophy_title'] ?? '🚀 Committed to Continuous Growth',
                'description' => $settings['learning_phylosophy_description'] ?? 'Technology evolves rapidly, and so do I. I\'m constantly learning new technologies through online courses, practical projects, and staying current with industry best practices. This commitment to continuous learning ensures I can always bring the latest techniques to your projects.',
            ],
            'hours' => [
                'value' => $settings['learning_hours_value'] ?? '100+',
                'description' => $settings['learning_hours_description'] ?? 'Hours of Learning',
            ],
            'years' => [
                'value' => $settings['learning_years_value'] ?? '4+',
                'description' => $settings['learning_years_description'] ?? 'Years of Experience',
            ],
            'courses' => [
                'value' => $settings['learning_courses_value'] ?? '6+',
                'description' => $settings['learning_courses_description'] ?? 'Completed Courses',
            ],
        ];
    }

    /**
     * Get services section settings
     */
    public static function getServicesSettings(): array
    {
        $settings = self::getGroup('services');
        
        return [
            'title' => $settings['services_title'] ?? 'How I Can Help Your Business',
            'subtitle' => $settings['services_subtitle'] ?? 'From initial concept to final deployment, I provide comprehensive web development services...',
        ];
    }

    /**
     * Get contact section settings
     */
    public static function getContactSettings(): array
    {
        $settings = self::getGroup('contact');
        
        return [
            'title' => $settings['contact_title'] ?? 'Contact Me',
            'subtitle' => $settings['contact_subtitle'] ?? 'If you are interested in working with me, feel free to send me an email or message.',
            'email' => $settings['contact_email'] ?? 'a.azim0711@gmail.com',
            'description' => $settings['contact_description'] ?? 'Have a question?',
        ];
    }

    /**
     * Clear all cache
     */
    public static function clearCache(): void
    {
        $groups = ['hero', 'about', 'portfolio', 'learning', 'services', 'contact', 'general'];
        
        foreach ($groups as $group) {
            Cache::forget(self::CACHE_PREFIX . 'group:' . $group);
        }
        
        // Clear individual setting keys
        $settings = SiteSetting::all();
        foreach ($settings as $setting) {
            Cache::forget(self::CACHE_PREFIX . $setting->key);
        }
    }

    /**
     * Get all settings grouped by section
     */
    public static function getAllSettings(): array
    {
        return [
            'hero' => self::getHeroSettings(),
            'about' => self::getAboutSettings(),
            'portfolio' => self::getPortfolioSettings(),
            'learning' => self::getLearningSettings(),
            'services' => self::getServicesSettings(),
            'contact' => self::getContactSettings(),
        ];
    }
} 