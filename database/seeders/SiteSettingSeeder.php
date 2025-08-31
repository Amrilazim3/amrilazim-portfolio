<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Hero Section Settings
            [
                'key' => 'hero_greeting',
                'value' => '👋 Hey, I\'m Amril',
                'type' => 'text',
                'group_name' => 'hero',
                'order_index' => 1,
            ],
            [
                'key' => 'hero_title',
                'value' => 'I Build Amazing',
                'type' => 'text',
                'group_name' => 'hero',
                'order_index' => 2,
            ],
            [
                'key' => 'hero_title_highlight',
                'value' => 'Digital Experiences',
                'type' => 'text',
                'group_name' => 'hero',
                'order_index' => 3,
            ],
            [
                'key' => 'hero_description',
                'value' => 'Full-stack developer with experience in both <strong>web and mobile development</strong>. I specialize in <strong>Laravel</strong>, <strong>React/React Native (Expo)</strong>, and <strong>Vue.js</strong>. I transform ideas into powerful applications that drive business growth and deliver exceptional user experiences across all platforms. From concept to deployment, I handle it all.',
                'type' => 'textarea',
                'group_name' => 'hero',
                'order_index' => 4,
            ],
            [
                'key' => 'hero_cta_text',
                'value' => 'Work with me',
                'type' => 'text',
                'group_name' => 'hero',
                'order_index' => 5,
            ],
            [
                'key' => 'hero_cta_link',
                'value' => '/#contact',
                'type' => 'text',
                'group_name' => 'hero',
                'order_index' => 6,
            ],
            [
                'key' => 'hero_image',
                'value' => 'hero/images/hero-mh3f1u.jpeg',
                'type' => 'image',
                'group_name' => 'hero',
                'order_index' => 7,
            ],
            [
                'key' => 'hero_resume',
                'value' => 'hero/resume/amrilresumeJULY25.pdf',
                'type' => 'file',
                'group_name' => 'hero',
                'order_index' => 8,
            ],

            // About Section Settings
            [
                'key' => 'about_title',
                'value' => 'Turning Ideas Into Reality',
                'type' => 'text',
                'group_name' => 'about',
                'order_index' => 1,
            ],
            [
                'key' => 'about_subtitle',
                'value' => 'Full Stack Developer & Problem Solver',
                'type' => 'text',
                'group_name' => 'about',
                'order_index' => 2,
            ],
            [
                'key' => 'about_description',
                'value' => 'With over <strong>4+ years</strong> of experience, I specialize in building scalable web applications that solve real business problems. My passion lies in creating digital solutions that not only look great but perform exceptionally well.',
                'type' => 'textarea',
                'group_name' => 'about',
                'order_index' => 3,
            ],
            [
                'key' => 'about_image',
                'value' => 'about/images/about.jpeg',
                'type' => 'image',
                'group_name' => 'about',
                'order_index' => 4,
            ],
            [
                'key' => 'about_frontend_skills',
                'value' => json_encode(['Vue.js', 'JavaScript/TypeScript', 'Tailwind CSS', 'Responsive Design']),
                'type' => 'json',
                'group_name' => 'about',
                'order_index' => 5,
            ],
            [
                'key' => 'about_backend_skills',
                'value' => json_encode(['Laravel (PHP)', 'MySQL', 'Redis', 'RESTful APIs']),
                'type' => 'json',
                'group_name' => 'about',
                'order_index' => 6,
            ],
            [
                'key' => 'about_devops_skills',
                'value' => json_encode(['Docker', 'Linux Server Management', 'Git', 'CI/CD']),
                'type' => 'json',
                'group_name' => 'about',
                'order_index' => 7,
            ],
            [
                'key' => 'about_approach',
                'value' => '<strong>💡 My Approach:</strong> I believe in writing clean, maintainable code and following industry best practices. Every project is an opportunity to create something meaningful that delivers real value to users and businesses.',
                'type' => 'textarea',
                'group_name' => 'about',
                'order_index' => 8,
            ],

            // Portfolio Section Settings
            [
                'key' => 'portfolio_title',
                'value' => 'Featured Projects & Case Studies',
                'type' => 'text',
                'group_name' => 'portfolio',
                'order_index' => 1,
            ],
            [
                'key' => 'portfolio_subtitle',
                'value' => 'Real projects, real results. Here\'s a showcase of web applications I\'ve built for clients, featuring detailed case studies that demonstrate my problem-solving approach and technical expertise.',
                'type' => 'textarea',
                'group_name' => 'portfolio',
                'order_index' => 2,
            ],

            // Services Section Settings
            [
                'key' => 'services_title',
                'value' => 'How I Can Help Your Business',
                'type' => 'text',
                'group_name' => 'services',
                'order_index' => 1,
            ],
            [
                'key' => 'services_subtitle',
                'value' => 'From initial concept to final deployment, I provide comprehensive web development services that help businesses establish a strong digital presence and achieve their goals.',
                'type' => 'textarea',
                'group_name' => 'services',
                'order_index' => 2,
            ],

            // Learning Section Settings
            [
                'key' => 'learning_title',
                'value' => 'Continuous Learning Journey',
                'type' => 'text',
                'group_name' => 'learning',
                'order_index' => 1,
            ],
            [
                'key' => 'learning_subtitle',
                'value' => '🚀 Committed to staying current with the latest technologies and best practices. Here are some of the courses I\'ve completed to enhance my skills and knowledge.',
                'type' => 'textarea',
                'group_name' => 'learning',
                'order_index' => 2,
            ],
            [
                'key' => 'learning_phylosophy_title',
                'value' => '🚀 Committed to Continuous Growth',
                'type' => 'text',
                'group_name' => 'learning',
                'order_index' => 3,
            ],
            [
                'key' => 'learning_phylosophy_description',
                'value' => 'Technology evolves rapidly, and so do I. I\'m constantly learning new technologies through online courses, practical projects, and staying current with industry best practices. This commitment to continuous learning ensures I can always bring the latest techniques to your projects.',
                'type' => 'textarea',
                'group_name' => 'learning',
                'order_index' => 4,
            ],
            [
                'key' => 'learning_hours_value',
                'value' => '100+',
                'type' => 'text',
                'group_name' => 'learning',
                'order_index' => 5,
            ],
            [
                'key' => 'learning_hours_description',
                'value' => 'Hours of Learning',
                'type' => 'text',
                'group_name' => 'learning',
                'order_index' => 6,
            ],
            [
                'key' => 'learning_years_value',
                'value' => '4+',
                'type' => 'text',
                'group_name' => 'learning',
                'order_index' => 7,
            ],
            [
                'key' => 'learning_years_description',
                'value' => 'Years of Experience',
                'type' => 'text',
                'group_name' => 'learning',
                'order_index' => 8,
            ],
            [
                'key' => 'learning_courses_value',
                'value' => '6+',
                'type' => 'text',
                'group_name' => 'learning',
                'order_index' => 9,
            ],
            [
                'key' => 'learning_courses_description',
                'value' => 'Completed Courses',
                'type' => 'text',
                'group_name' => 'learning',
                'order_index' => 10,
            ],

            // Contact Section Settings
            [
                'key' => 'contact_title',
                'value' => 'Contact Me',
                'type' => 'text',
                'group_name' => 'contact',
                'order_index' => 1,
            ],
            [
                'key' => 'contact_subtitle',
                'value' => 'If you are interested in working with me, feel free to send me an email or message.',
                'type' => 'textarea',
                'group_name' => 'contact',
                'order_index' => 2,
            ],
            [
                'key' => 'contact_email',
                'value' => 'a.azim0711@gmail.com',
                'type' => 'text',
                'group_name' => 'contact',
                'order_index' => 3,
            ],
            [
                'key' => 'contact_description',
                'value' => 'Have a question?',
                'type' => 'text',
                'group_name' => 'contact',
                'order_index' => 4,
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
