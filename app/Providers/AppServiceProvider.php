<?php

namespace App\Providers;

use App\Models\Job;
use App\Policies\JobPolicy;
use App\Services\SettingsService; // Import the SettingsService
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View; // Import the View facade
use App\Models\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(SettingsService::class, function ($app) {
            return new SettingsService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Job::class, JobPolicy::class);

        View::composer('layouts.frontend', function ($view) {
            $settingsService = app(SettingsService::class);

            $footerDescription = $settingsService->get('footer_description', 'The largest job portal for garments & textiles sector in Bangladesh.');
            $footerPhone = $settingsService->get('footer_phone', '+123 456 7890');
            $footerEmail = $settingsService->get('footer_email', 'support@mm.com');

            $footerCompanyLinks = $this->generateFooterLinks($settingsService->get('footer_company_page_slugs', ''));
            $footerDevelopersLinks = $this->generateFooterLinks($settingsService->get('footer_developers_page_slugs', ''));
            $footerCommunitiesLinks = $this->generateFooterLinks($settingsService->get('footer_communities_page_slugs', ''));

            $footerCopyrightText = $settingsService->get('footer_copyright_text', '&copy; ' . date('Y') . ' BGEA Jobs. Develop by POPCORN IT.');
            $footerInstagramUrl = $settingsService->get('footer_instagram_url', '#');
            $footerTwitterUrl = $settingsService->get('footer_twitter_url', '#');
            $footerLinkedinUrl = $settingsService->get('footer_linkedin_url', '#');

            $view->with(compact(
                'footerDescription',
                'footerPhone',
                'footerEmail',
                'footerCompanyLinks',
                'footerDevelopersLinks',
                'footerCommunitiesLinks',
                'footerCopyrightText',
                'footerInstagramUrl',
                'footerTwitterUrl',
                'footerLinkedinUrl'
            ));
        });
    }

    /**
     * Generate HTML for footer links based on a comma-separated string of page slugs.
     */
    protected function generateFooterLinks(string $slugsString): string
    {
        $slugs = array_filter(array_map('trim', explode(',', $slugsString)));
        if (empty($slugs)) {
            return '';
        }

        $pages = Page::whereIn('slug', $slugs)->where('status', 'published')->get();

        $html = '<ul>';
        foreach ($slugs as $slug) {
            $page = $pages->firstWhere('slug', $slug);
            if ($page) {
                $html .= '<li><a href="' . route('page.show', $page->slug) . '" class="text-base text-gray-300 hover:text-white">' . $page->title . '</a></li>';
            }
        }
        $html .= '</ul>';

        return $html;
    }
}