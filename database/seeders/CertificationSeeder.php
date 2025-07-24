<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certifications = [
            [
                'title' => 'Laravel 8 From Scratch',
                'platform' => 'Laracasts',
                'instructor' => 'Jeffrey Way',
                'date' => '2021',
                'image_url' => 'https://laracasts.com/images/series/2018/laravel-from-scratch-2021.svg',
                'description' => 'Master Laravel fundamentals including Eloquent ORM, authentication, authorization, and building blog post web application',
                'skills' => ['Laravel 8', 'PHP 7.4', 'Eloquent ORM', 'Blade Templates', 'Authentication', 'MVC'],
                'duration' => '1 week',
                'status' => 'completed',
                'course_url' => 'https://laracasts.com/series/laravel-8-from-scratch',
                'sort_order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'Vue 3 + Inertia',
                'platform' => 'Laracasts',
                'instructor' => 'Jeffrey Way',
                'date' => '2022',
                'image_url' => 'https://laracasts.com/images/series/2021/vue-3-inertia.svg',
                'description' => 'Build modern single-page applications with Vue 3, Inertia.js, and Laravel for seamless full-stack development',
                'skills' => ['Vue 3', 'Inertia.js', 'Composition API', 'Laravel Integration', 'SPA', 'Tailwind CSS'],
                'duration' => '1 week',
                'status' => 'completed',
                'course_url' => 'https://laracasts.com/series/build-modern-laravel-apps-using-inertia-js',
                'sort_order' => 2,
                'is_featured' => true,
            ],
            [
                'title' => 'React From Scratch',
                'platform' => 'Laracasts',
                'instructor' => 'Simon Vrachliotis',
                'date' => '2022',
                'image_url' => 'https://laracasts.com/images/series/2020/react-inertia.svg',
                'description' => 'Learn React fundamentals and integrate with Laravel using Inertia.js for powerful full-stack applications',
                'skills' => ['React', 'JSX', 'Hooks'],
                'duration' => '< 1 week',
                'status' => 'completed',
                'course_url' => 'https://laracasts.com/series/react-from-scratch',
                'sort_order' => 3,
                'is_featured' => false,
            ],
            [
                'title' => 'MySQL Database Design',
                'platform' => 'Laracasts',
                'instructor' => 'Jeffrey Way',
                'date' => '2023',
                'image_url' => 'https://laracasts.com/images/series/2017/mysql-database-design.svg',
                'description' => 'Master database design principles, normalization, relationships, and optimization for scalable applications',
                'skills' => ['MySQL', 'Database Design', 'Normalization', 'Relationships', 'Optimization'],
                'duration' => '1 day',
                'status' => 'completed',
                'course_url' => 'https://laracasts.com/series/mysql-database-design',
                'sort_order' => 4,
                'is_featured' => false,
            ],
            [
                'title' => 'Laravel 9',
                'platform' => 'Laracasts',
                'instructor' => 'Jeffrey Way',
                'date' => '2023',
                'image_url' => 'https://laracasts.com/images/series/2019/laravel-testing.svg',
                'description' => 'Comprehensive testing strategies for Laravel applications including unit tests, feature tests, and TDD practices',
                'skills' => ['Laravel 9', 'PHP 8'],
                'duration' => '< 1 day',
                'status' => 'completed',
                'course_url' => 'https://laracasts.com/series/whats-new-in-laravel-9',
                'sort_order' => 5,
                'is_featured' => false,
            ],
            [
                'title' => 'Laravel 10',
                'platform' => 'Laracasts',
                'instructor' => 'Jeffrey Way',
                'date' => '2023',
                'image_url' => 'https://laracasts.com/images/series/2018/advanced-laravel.svg',
                'description' => 'Advanced Laravel concepts including service containers, facades, middleware, and custom packages',
                'skills' => ['Laravel 10', 'PHP 8'],
                'duration' => '< 1 day',
                'status' => 'completed',
                'course_url' => 'https://laracasts.com/series/whats-new-in-laravel-10',
                'sort_order' => 6,
                'is_featured' => false,
            ],
        ];

        foreach ($certifications as $certification) {
            Certification::create($certification);
        }
    }
}
