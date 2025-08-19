<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Services\CertificationService;
use App\Services\ProjectService;
use App\Services\SiteSettingService;
use App\Services\SkillService;
use App\Services\SocialLinkService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\VarDumper\VarDumper;

class WelcomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Welcome', [
            // Cached data
            'skills' => SkillService::getAll(),
            'projects' => ProjectService::getAll(),
            'certifications' => CertificationService::getAll(),
            
            // New dynamic content
            'heroData' => SiteSettingService::getHeroSettings(),
            'socialLinks' => SocialLinkService::getActive(),
            'aboutData' => SiteSettingService::getAboutSettings(),
            'portfolioData' => SiteSettingService::getPortfolioSettings(),
            'learningData' => SiteSettingService::getLearningSettings(),
            'servicesData' => [
                'settings' => SiteSettingService::getServicesSettings(),
                'services' => Service::active()->ordered()->get(),
            ],
            'contactData' => SiteSettingService::getContactSettings(),
        ]);
    }
}
