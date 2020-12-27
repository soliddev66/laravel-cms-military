<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\AppSectionController;
use App\Http\Controllers\Admin\BackgroundImageController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionController;
use App\Http\Controllers\Admin\BreadcrumbController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CommentSectionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactSectionController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CounterSectionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExternalUrlController;
use App\Http\Controllers\Admin\FixedContentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FaqSectionController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeatureSectionController;
use App\Http\Controllers\Admin\GoogleAnalyticController;
use App\Http\Controllers\Admin\HomepageVersionController;
use App\Http\Controllers\Admin\HowToInstallController;
use App\Http\Controllers\Admin\HowToInstallSectionController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LanguageKeywordController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\PriceSectionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QuickAccessButtonController;
use App\Http\Controllers\Admin\ScreenshotController;
use App\Http\Controllers\Admin\ScreenshotSectionController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ServiceSectionController;
use App\Http\Controllers\Admin\SiteImageController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TeamSectionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TestimonialSectionController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\Landing\HomeController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Models\Admin\Theme;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Features;
use App\Http\Kernel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (Schema::hasTable('themes')) {
    // Retrieve the first model
    $theme = Theme::first();

}


if (isset($theme)) {

    if ($theme->choose_theme == 0) {
        Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
            // Authentication...
            Route::get('/login', [LoginController::class, 'create'])
                ->middleware(['guest'])
                ->name('login');
        
            $limiter = config('fortify.limiters.login');
        
            Route::post('/login', [LoginController::class, 'store'])
                ->middleware(array_filter([
                    'guest',
                    $limiter ? 'throttle:'.$limiter : null,
                ]));
            Route::post('/logout', [LoginController::class, 'destroy'])
                ->name('logout');

            // Registration...
            if (Features::enabled(Features::registration())) {
                Route::post('/register', [RegisterController::class, 'store'])
                    ->middleware(['guest']);
            }
        

        });
        
        

// Start Landing Site Frontend Route
        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->get('/', [HomeController::class, 'index'])->name('homepage');
        
        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->get('change-password', [ChangePasswordController::class, 'index'])->name('change.password');
        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');

      
        Route::post('message', [App\Http\Controllers\Frontend\Landing\MessageController::class, 'store'])
            ->name('message.store')->middleware(['auth:sanctum', 'verified', 'XSS']);

        Route::middleware(['auth:sanctum', 'verified','XSS'])->group(function () {
            Route::get('blogs', [App\Http\Controllers\Frontend\Landing\BlogController::class, 'index'])->name('blog-page.index');
            Route::get('blog/{slug}', [App\Http\Controllers\Frontend\Landing\BlogController::class, 'show'])->name('blog-detail.show');
            Route::get('blog/category/{category_name}', [App\Http\Controllers\Frontend\Landing\BlogController::class, 'category_show'])->name('blog-category.show');
            Route::get('blog/category/{category_name}/detail', [App\Http\Controllers\Frontend\Landing\BlogController::class, 'category_detail'])->name('blog-category_detail.show');
            Route::post('blog/search', [App\Http\Controllers\Frontend\Landing\BlogController::class, 'search'])->name('blog-page.search');
        });

        Route::get('page/{page_slug}', [App\Http\Controllers\Frontend\Landing\PageController::class, 'show'])
            ->name('any-page.show')->middleware(['auth:sanctum', 'verified', 'XSS']);

        Route::post('comment', [App\Http\Controllers\Frontend\Landing\CommentController::class, 'store'])
            ->name('comment.store')->middleware(['auth:sanctum', 'verified', 'XSS']);
    

// End Landing Site Frontend Route

// Start Landing Site Admin Route
        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('fixed-content/create', [FixedContentController::class, 'create'])->name('fixed-content.create');
            Route::post('fixed-content', [FixedContentController::class, 'store'])->name('fixed-content.store');
            Route::put('fixed-content/{id}', [FixedContentController::class, 'update'])->name('fixed-content.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('background-image/create', [BackgroundImageController::class, 'create'])->name('background-image.create');
            Route::post('background-image', [BackgroundImageController::class, 'store'])->name('background-image.store');
            Route::put('background-image/{id}', [BackgroundImageController::class, 'update'])->name('background-image.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
            Route::post('slider', [SliderController::class, 'store'])->name('slider.store');
            Route::get('slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
            Route::put('slider/{id}', [SliderController::class, 'update'])->name('slider.update');
            Route::delete('slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('video/create', [VideoController::class, 'create'])->name('video.create');
            Route::post('video', [VideoController::class, 'store'])->name('video.store');
            Route::put('video/{id}', [VideoController::class, 'update'])->name('video.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('about/create', [AboutController::class, 'create'])->name('about.create');
            Route::post('about', [AboutController::class, 'store'])->name('about.store');
            Route::put('about/{id}', [AboutController::class, 'update'])->name('about.update');

            Route::post('info-list', [AboutController::class, 'store_info_list'])->name('about.store_info_list');
            Route::get('info-list/{id}/edit', [AboutController::class, 'edit_info_list'])->name('about.edit_info_list');
            Route::put('info-list/{id}', [AboutController::class, 'update_info_list'])->name('about.update_info_list');
            Route::delete('info-list/{id}', [AboutController::class, 'destroy_info_list'])->name('about.destroy_info_list');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
            Route::post('service', [ServiceController::class, 'store'])->name('service.store');
            Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
            Route::put('service/{id}', [ServiceController::class, 'update'])->name('service.update');
            Route::delete('service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

            Route::post('service-section', [ServiceSectionController::class, 'store'])->name('service-section.store');
            Route::put('service-section/{id}', [ServiceSectionController::class, 'update'])->name('service-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('feature/create', [FeatureController::class, 'create'])->name('feature.create');
            Route::post('feature', [FeatureController::class, 'store'])->name('feature.store');
            Route::get('feature/{id}/edit', [FeatureController::class, 'edit'])->name('feature.edit');
            Route::put('feature/{id}', [FeatureController::class, 'update'])->name('feature.update');
            Route::delete('feature/{id}', [FeatureController::class, 'destroy'])->name('feature.destroy');

            Route::post('feature-section', [FeatureSectionController::class, 'store'])->name('feature-section.store');
            Route::put('feature-section/{id}', [FeatureSectionController::class, 'update'])->name('feature-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('counter/create', [CounterController::class, 'create'])->name('counter.create');
            Route::post('counter', [CounterController::class, 'store'])->name('counter.store');
            Route::get('counter/{id}/edit', [CounterController::class, 'edit'])->name('counter.edit');
            Route::put('counter/{id}', [CounterController::class, 'update'])->name('counter.update');
            Route::delete('counter/{id}', [CounterController::class, 'destroy'])->name('counter.destroy');

            Route::post('counter-section', [CounterSectionController::class, 'store'])->name('counter-section.store');
            Route::put('counter-section/{id}', [CounterSectionController::class, 'update'])->name('counter-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('how-to-install/create', [HowToInstallController::class, 'create'])->name('how-to-install.create');
            Route::post('how-to-install', [HowToInstallController::class, 'store'])->name('how-to-install.store');
            Route::get('how-to-install/{id}/edit', [HowToInstallController::class, 'edit'])->name('how-to-install.edit');
            Route::put('how-to-install/{id}', [HowToInstallController::class, 'update'])->name('how-to-install.update');
            Route::delete('how-to-install/{id}', [HowToInstallController::class, 'destroy'])->name('how-to-install.destroy');

            Route::post('how-to-install-section', [HowToInstallSectionController::class, 'store'])->name('how-to-install-section.store');
            Route::put('how-to-install-section/{id}', [HowToInstallSectionController::class, 'update'])->name('how-to-install-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('screenshot/create', [ScreenshotController::class, 'create'])->name('screenshot.create');
            Route::post('screenshot', [ScreenshotController::class, 'store'])->name('screenshot.store');
            Route::get('screenshot/{id}/edit', [ScreenshotController::class, 'edit'])->name('screenshot.edit');
            Route::put('screenshot/{id}', [ScreenshotController::class, 'update'])->name('screenshot.update');
            Route::delete('screenshot/{id}', [ScreenshotController::class, 'destroy'])->name('screenshot.destroy');

            Route::post('screenshot-section', [ScreenshotSectionController::class, 'store'])->name('screenshot-section.store');
            Route::put('screenshot-section/{id}', [ScreenshotSectionController::class, 'update'])->name('screenshot-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('price/create', [PriceController::class, 'create'])->name('price.create');
            Route::post('price', [PriceController::class, 'store'])->name('price.store');
            Route::get('price/{id}/edit', [PriceController::class, 'edit'])->name('price.edit');
            Route::put('price/{id}', [PriceController::class, 'update'])->name('price.update');
            Route::delete('price/{id}', [PriceController::class, 'destroy'])->name('price.destroy');

            Route::post('price-section', [PriceSectionController::class, 'store'])->name('price-section.store');
            Route::put('price-section/{id}', [PriceSectionController::class, 'update'])->name('price-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
            Route::post('testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
            Route::get('testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
            Route::put('testimonial/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
            Route::delete('testimonial/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');

            Route::post('testimonial-section', [TestimonialSectionController::class, 'store'])->name('testimonial-section.store');
            Route::put('testimonial-section/{id}', [TestimonialSectionController::class, 'update'])->name('testimonial-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('team/create', [TeamController::class, 'create'])->name('team.create');
            Route::post('team', [TeamController::class, 'store'])->name('team.store');
            Route::get('team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
            Route::put('team/{id}', [TeamController::class, 'update'])->name('team.update');
            Route::delete('team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

            Route::post('team-section', [TeamSectionController::class, 'store'])->name('team-section.store');
            Route::put('team-section/{id}', [TeamSectionController::class, 'update'])->name('team-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('faq/create', [FaqController::class, 'create'])->name('faq.create');
            Route::post('faq', [FaqController::class, 'store'])->name('faq.store');
            Route::get('faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit');
            Route::put('faq/{id}', [FaqController::class, 'update'])->name('faq.update');
            Route::delete('faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');

            Route::post('faq-section', [FaqSectionController::class, 'store'])->name('faq-section.store');
            Route::put('faq-section/{id}', [FaqSectionController::class, 'update'])->name('faq-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('site-info/create', [SiteInfoController::class, 'create'])->name('site-info.create');
            Route::post('site-info', [SiteInfoController::class, 'store'])->name('site-info.store');
            Route::put('site-info/{id}', [SiteInfoController::class, 'update'])->name('site-info.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('site-image/create', [SiteImageController::class, 'create'])->name('site-image.create');
            Route::post('site-image', [SiteImageController::class, 'store'])->name('site-image.store');
            Route::put('site-image/{id}', [SiteImageController::class, 'update'])->name('site-image.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('homepage-version/create', [HomepageVersionController::class, 'create'])->name('homepage-version.create');
            Route::put('homepage-version/{id}', [HomepageVersionController::class, 'update'])->name('homepage-version.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('google-analytic/create', [GoogleAnalyticController::class, 'create'])->name('google-analytic.create');
            Route::post('google-analytic', [GoogleAnalyticController::class, 'store'])->name('google-analytic.store');
            Route::put('google-analytic/{id}', [GoogleAnalyticController::class, 'update'])->name('google-analytic.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('external-url/create', [ExternalUrlController::class, 'create'])->name('external-url.create');
            Route::post('external-url', [ExternalUrlController::class, 'store'])->name('external-url.store');
            Route::put('external-url/{id}', [ExternalUrlController::class, 'update'])->name('external-url.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('breadcrumb/create', [BreadcrumbController::class, 'create'])->name('breadcrumb.create');
            Route::post('breadcrumb', [BreadcrumbController::class, 'store'])->name('breadcrumb.store');
            Route::put('breadcrumb/{id}', [BreadcrumbController::class, 'update'])->name('breadcrumb.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('section/create',  [SectionController::class, 'create'])->name('section.create');
            Route::patch('section/{id}',  [SectionController::class, 'update'])->name('section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('seo/create', [SeoController::class, 'create'])->name('seo.create');
            Route::post('seo', [SeoController::class, 'store'])->name('seo.store');
            Route::put('seo/{id}', [SeoController::class, 'update'])->name('seo.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('color/create', [ColorController::class, 'create'])->name('color.create');
            Route::post('color', [ColorController::class, 'store'])->name('color.store');
            Route::put('color/{id}', [ColorController::class, 'update'])->name('color.update');
            Route::delete('color/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Admin'])->prefix('admin')->group(function () {
            Route::get('category/create', [CategoryController::class, 'create'])->name('blog-category.create');
            Route::post('category', [CategoryController::class, 'store'])->name('blog-category.store');
            Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('blog-category.edit');
            Route::put('category/{id}', [CategoryController::class, 'update'])->name('blog-category.update');
            Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('blog-category.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Admin'])->prefix('admin')->group(function () {
            Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
            Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
            Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
            Route::get('blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
            Route::put('blog/{id}', [BlogController::class, 'update'])->name('blog.update');
            Route::delete('blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

            Route::post('blog-section', [BlogSectionController::class, 'store'])->name('blog-section.store');
            Route::put('blog-section/{id}', [BlogSectionController::class, 'update'])->name('blog-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
            Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
            Route::get('contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
            Route::put('contact/{id}', [ContactController::class, 'update'])->name('contact.update');
            Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

            Route::post('contact-section', [ContactSectionController::class, 'store'])->name('contact-section.store');
            Route::put('contact-section/{id}', [ContactSectionController::class, 'update'])->name('contact-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('social/create', [SocialController::class, 'create'])->name('social.create');
            Route::post('social', [SocialController::class, 'store'])->name('social.store');
            Route::get('social/{id}/edit', [SocialController::class, 'edit'])->name('social.edit');
            Route::put('social/{id}', [SocialController::class, 'update'])->name('social.update');
            Route::patch('social/update_status/{id}', [SocialController::class, 'update_status'])->name('social.update_status');
            Route::delete('social/{id}', [SocialController::class, 'destroy'])->name('social.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('quick-access/create', [QuickAccessButtonController::class, 'create'])->name('quick-access.create');
            Route::post('quick-access', [QuickAccessButtonController::class, 'store'])->name('quick-access.store');
            Route::put('quick-access/{id}', [QuickAccessButtonController::class, 'update'])->name('quick-access.update');
        });

        Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
            Route::get('message', [MessageController::class, 'index'])->name('message.index');
            Route::put('message/{id}', [MessageController::class, 'update'])->name('message.update');
            Route::patch('message/mark_all', [MessageController::class, 'mark_all_read_update'])->name('message.mark_all_read_update');
            Route::delete('message/{id}', [MessageController::class, 'destroy'])->name('message.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('app/create', [AppController::class, 'create'])->name('app.create');
            Route::post('app', [AppController::class, 'store'])->name('app.store');
            Route::get('app/{id}/edit', [AppController::class, 'edit'])->name('app.edit');
            Route::put('app/{id}', [AppController::class, 'update'])->name('app.update');
            Route::delete('app/{id}', [AppController::class, 'destroy'])->name('app.destroy');

            Route::post('app-section', [AppSectionController::class, 'store'])->name('app-section.store');
            Route::put('app-section/{id}', [AppSectionController::class, 'update'])->name('app-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('page', [PageController::class, 'index'])->name('page.index');
            Route::get('page/create', [PageController::class, 'create'])->name('page.create');
            Route::post('page', [PageController::class, 'store'])->name('page.store');
            Route::get('page/{id}/edit', [PageController::class, 'edit'])->name('page.edit');
            Route::put('page/{id}', [PageController::class, 'update'])->name('page.update');
            Route::delete('page/{id}', [PageController::class, 'destroy'])->name('page.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
            Route::get('comment', [CommentSectionController::class, 'index'])->name('comment-section.index');
            Route::put('comment/{id}', [CommentSectionController::class, 'update'])->name('comment-section.update');
            Route::patch('comment/mark_all', [CommentSectionController::class, 'mark_all_approval_update'])->name('comment-section.mark_all_approval_update');
            Route::delete('comment/{id}', [CommentSectionController::class, 'destroy'])->name('comment-section.destroy');
        });
// End Landing Site Admin Route

} else {

        // Start Creative Site Frontend Route
        Route::get('/', [App\Http\Controllers\Frontend\Creative\HomeController::class, 'index'])->name('homepage')->middleware('XSS');

        Route::get('service/{slug}', [App\Http\Controllers\Frontend\Creative\ServiceController::class, 'show'])
            ->name('service-page.show')->middleware('XSS');

        Route::get('work/{slug}', [App\Http\Controllers\Frontend\Creative\WorkController::class, 'show'])
            ->name('work-page.show')->middleware('XSS');

        Route::post('message', [App\Http\Controllers\Frontend\Creative\MessageController::class, 'store'])
            ->name('message.store')->middleware('XSS');

        Route::middleware(['XSS'])->group(function () {
            Route::get('blogs', [App\Http\Controllers\Frontend\Creative\BlogController::class, 'index'])->name('blog-page.index');
            Route::get('blog/{slug}', [App\Http\Controllers\Frontend\Creative\BlogController::class, 'show'])->name('blog-page.show');
            Route::get('blog/category/{category_name}', [App\Http\Controllers\Frontend\Creative\BlogController::class, 'category_show'])->name('blog-category.show');
            Route::post('blog/search', [App\Http\Controllers\Frontend\Creative\BlogController::class, 'search'])->name('blog-page.search');
        });

        Route::get('page/{page_slug}', [App\Http\Controllers\Frontend\Creative\PageController::class, 'show'])
            ->name('any-page.show')->middleware('XSS');

        Route::get('gallery', [App\Http\Controllers\Frontend\Creative\GalleryController::class, 'index'])
            ->name('gallery-page.show')->middleware('XSS');

        Route::post('comment', [App\Http\Controllers\Frontend\Creative\CommentController::class, 'store'])
            ->name('comment.store')->middleware( 'XSS');
// End Creative Site Frontend Route

        // Start Creative Site Admin Route
        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('fixed-content/create', [App\Http\Controllers\Admin\Creative\FixedContentController::class, 'create'])->name('fixed-content.create');
            Route::post('fixed-content', [App\Http\Controllers\Admin\Creative\FixedContentController::class, 'store'])->name('fixed-content.store');
            Route::put('fixed-content/{id}', [App\Http\Controllers\Admin\Creative\FixedContentController::class, 'update'])->name('fixed-content.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('background-image/create', [App\Http\Controllers\Admin\Creative\BackgroundImageController::class, 'create'])->name('background-image.create');
            Route::post('background-image', [App\Http\Controllers\Admin\Creative\BackgroundImageController::class, 'store'])->name('background-image.store');
            Route::put('background-image/{id}', [App\Http\Controllers\Admin\Creative\BackgroundImageController::class, 'update'])->name('background-image.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('slider/create', [App\Http\Controllers\Admin\Creative\SliderController::class, 'create'])->name('slider.create');
            Route::post('slider', [App\Http\Controllers\Admin\Creative\SliderController::class, 'store'])->name('slider.store');
            Route::get('slider/{id}/edit', [App\Http\Controllers\Admin\Creative\SliderController::class, 'edit'])->name('slider.edit');
            Route::put('slider/{id}', [App\Http\Controllers\Admin\Creative\SliderController::class, 'update'])->name('slider.update');
            Route::delete('slider/{id}', [App\Http\Controllers\Admin\Creative\SliderController::class, 'destroy'])->name('slider.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('video/create', [App\Http\Controllers\Admin\Creative\VideoController::class, 'create'])->name('video.create');
            Route::post('video', [App\Http\Controllers\Admin\Creative\VideoController::class, 'store'])->name('video.store');
            Route::put('video/{id}', [App\Http\Controllers\Admin\Creative\VideoController::class, 'update'])->name('video.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('about/create', [App\Http\Controllers\Admin\Creative\AboutController::class, 'create'])->name('about.create');
            Route::post('about', [App\Http\Controllers\Admin\Creative\AboutController::class, 'store'])->name('about.store');
            Route::put('about/{id}', [App\Http\Controllers\Admin\Creative\AboutController::class, 'update'])->name('about.update');

            Route::post('info-list', [App\Http\Controllers\Admin\Creative\AboutController::class, 'store_info_list'])->name('about.store_info_list');
            Route::get('info-list/{id}/edit', [App\Http\Controllers\Admin\Creative\AboutController::class, 'edit_info_list'])->name('about.edit_info_list');
            Route::put('info-list/{id}', [App\Http\Controllers\Admin\Creative\AboutController::class, 'update_info_list'])->name('about.update_info_list');
            Route::delete('info-list/{id}', [App\Http\Controllers\Admin\Creative\AboutController::class, 'destroy_info_list'])->name('about.destroy_info_list');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('skill/create', [App\Http\Controllers\Admin\Creative\SkillController::class, 'create'])->name('skill.create');
            Route::post('skill', [App\Http\Controllers\Admin\Creative\SkillController::class, 'store'])->name('skill.store');
            Route::get('skill/{id}/edit', [App\Http\Controllers\Admin\Creative\SkillController::class, 'edit'])->name('skill.edit');
            Route::put('skill/{id}', [App\Http\Controllers\Admin\Creative\SkillController::class, 'update'])->name('skill.update');
            Route::delete('skill/{id}', [App\Http\Controllers\Admin\Creative\SkillController::class, 'destroy'])->name('skill.destroy');

            Route::post('skill-section', [App\Http\Controllers\Admin\Creative\SkillSectionController::class, 'store'])->name('skill-section.store');
            Route::put('skill-section/{id}', [App\Http\Controllers\Admin\Creative\SkillSectionController::class, 'update'])->name('skill-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('counter/create', [App\Http\Controllers\Admin\Creative\CounterController::class, 'create'])->name('counter.create');
            Route::post('counter', [App\Http\Controllers\Admin\Creative\CounterController::class, 'store'])->name('counter.store');
            Route::get('counter/{id}/edit', [App\Http\Controllers\Admin\Creative\CounterController::class, 'edit'])->name('counter.edit');
            Route::put('counter/{id}', [App\Http\Controllers\Admin\Creative\CounterController::class, 'update'])->name('counter.update');
            Route::delete('counter/{id}', [App\Http\Controllers\Admin\Creative\CounterController::class, 'destroy'])->name('counter.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('service', [App\Http\Controllers\Admin\Creative\ServiceController::class, 'index'])->name('service.index');
            Route::get('service/create', [App\Http\Controllers\Admin\Creative\ServiceController::class, 'create'])->name('service.create');
            Route::post('service', [App\Http\Controllers\Admin\Creative\ServiceController::class, 'store'])->name('service.store');
            Route::get('service/{id}/edit', [App\Http\Controllers\Admin\Creative\ServiceController::class, 'edit'])->name('service.edit');
            Route::put('service/{id}', [App\Http\Controllers\Admin\Creative\ServiceController::class, 'update'])->name('service.update');
            Route::delete('service/{id}', [App\Http\Controllers\Admin\Creative\ServiceController::class, 'destroy'])->name('service.destroy');

            Route::post('service-section', [App\Http\Controllers\Admin\Creative\ServiceSectionController::class, 'store'])->name('service-section.store');
            Route::put('service-section/{id}', [App\Http\Controllers\Admin\Creative\ServiceSectionController::class, 'update'])->name('service-section.update');

            Route::get('service-detail/create/{id}', [App\Http\Controllers\Admin\Creative\ServiceDetailController::class, 'create'])->name('service-detail.create');
            Route::post('service-detail', [App\Http\Controllers\Admin\Creative\ServiceDetailController::class, 'store'])->name('service-detail.store');
            Route::get('service-detail/{creative_service_id}/{id}/edit', [App\Http\Controllers\Admin\Creative\ServiceDetailController::class, 'edit'])->name('service-detail.edit');
            Route::put('service-detail/{id}', [App\Http\Controllers\Admin\Creative\ServiceDetailController::class, 'update'])->name('service-detail.update');
            Route::delete('service-detail/{id}', [App\Http\Controllers\Admin\Creative\ServiceDetailController::class, 'destroy'])->name('service-detail.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('work-category/create', [App\Http\Controllers\Admin\Creative\CategoryController::class, 'create'])->name('work-category.create');
            Route::post('work-category', [App\Http\Controllers\Admin\Creative\CategoryController::class, 'store'])->name('work-category.store');
            Route::get('work-category/{id}/edit', [App\Http\Controllers\Admin\Creative\CategoryController::class, 'edit'])->name('work-category.edit');
            Route::put('work-category/{id}', [App\Http\Controllers\Admin\Creative\CategoryController::class, 'update'])->name('work-category.update');
            Route::delete('work-category/{id}', [App\Http\Controllers\Admin\Creative\CategoryController::class, 'destroy'])->name('work-category.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('work', [App\Http\Controllers\Admin\Creative\WorkController::class, 'index'])->name('work.index');
            Route::get('work/create', [App\Http\Controllers\Admin\Creative\WorkController::class, 'create'])->name('work.create');
            Route::post('work', [App\Http\Controllers\Admin\Creative\WorkController::class, 'store'])->name('work.store');
            Route::get('work/{id}/edit', [App\Http\Controllers\Admin\Creative\WorkController::class, 'edit'])->name('work.edit');
            Route::put('work/{id}', [App\Http\Controllers\Admin\Creative\WorkController::class, 'update'])->name('work.update');
            Route::delete('work/{id}', [App\Http\Controllers\Admin\Creative\WorkController::class, 'destroy'])->name('work.destroy');

            Route::post('work-section', [App\Http\Controllers\Admin\Creative\WorkSectionController::class, 'store'])->name('work-section.store');
            Route::put('work-section/{id}', [App\Http\Controllers\Admin\Creative\WorkSectionController::class, 'update'])->name('work-section.update');

            Route::get('work-detail/create/{id}', [App\Http\Controllers\Admin\Creative\WorkDetailController::class, 'create'])->name('work-detail.create');
            Route::post('work-detail', [App\Http\Controllers\Admin\Creative\WorkDetailController::class, 'store'])->name('work-detail.store');
            Route::get('work-detail/{creative_work_id}/{id}/edit', [App\Http\Controllers\Admin\Creative\WorkDetailController::class, 'edit'])->name('work-detail.edit');
            Route::put('work-detail/{id}', [App\Http\Controllers\Admin\Creative\WorkDetailController::class, 'update'])->name('work-detail.update');
            Route::delete('work-detail/{id}', [App\Http\Controllers\Admin\Creative\WorkDetailController::class, 'destroy'])->name('work-detail.destroy');

            Route::get('work-slider/create/{id}', [App\Http\Controllers\Admin\Creative\WorkSliderController::class, 'create'])->name('work-slider.create');
            Route::post('work-slider', [App\Http\Controllers\Admin\Creative\WorkSliderController::class, 'store'])->name('work-slider.store');
            Route::get('work-slider/{creative_work_id}/{id}/edit', [App\Http\Controllers\Admin\Creative\WorkSliderController::class, 'edit'])->name('work-slider.edit');
            Route::put('work-slider/{id}', [App\Http\Controllers\Admin\Creative\WorkSliderController::class, 'update'])->name('work-slider.update');
            Route::delete('work-slider/{id}', [App\Http\Controllers\Admin\Creative\WorkSliderController::class, 'destroy'])->name('work-slider.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('call-to-action/create', [App\Http\Controllers\Admin\Creative\CallToActionController::class, 'create'])->name('call-to-action.create');
            Route::post('call-to-action', [App\Http\Controllers\Admin\Creative\CallToActionController::class, 'store'])->name('call-to-action.store');
            Route::put('call-to-action/{id}', [App\Http\Controllers\Admin\Creative\CallToActionController::class, 'update'])->name('call-to-action.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('testimonial/create', [App\Http\Controllers\Admin\Creative\TestimonialController::class, 'create'])->name('testimonial.create');
            Route::post('testimonial', [App\Http\Controllers\Admin\Creative\TestimonialController::class, 'store'])->name('testimonial.store');
            Route::get('testimonial/{id}/edit', [App\Http\Controllers\Admin\Creative\TestimonialController::class, 'edit'])->name('testimonial.edit');
            Route::put('testimonial/{id}', [App\Http\Controllers\Admin\Creative\TestimonialController::class, 'update'])->name('testimonial.update');
            Route::delete('testimonial/{id}', [App\Http\Controllers\Admin\Creative\TestimonialController::class, 'destroy'])->name('testimonial.destroy');

            Route::post('testimonial-section', [App\Http\Controllers\Admin\Creative\TestimonialSectionController::class, 'store'])->name('testimonial-section.store');
            Route::put('testimonial-section/{id}', [App\Http\Controllers\Admin\Creative\TestimonialSectionController::class, 'update'])->name('testimonial-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('gallery/create', [App\Http\Controllers\Admin\Creative\GalleryController::class, 'create'])->name('gallery.create');
            Route::post('gallery', [App\Http\Controllers\Admin\Creative\GalleryController::class, 'store'])->name('gallery.store');
            Route::get('gallery/{id}/edit', [App\Http\Controllers\Admin\Creative\GalleryController::class, 'edit'])->name('gallery.edit');
            Route::put('gallery/{id}', [App\Http\Controllers\Admin\Creative\GalleryController::class, 'update'])->name('gallery.update');
            Route::delete('gallery/{id}', [App\Http\Controllers\Admin\Creative\GalleryController::class, 'destroy'])->name('gallery.destroy');

            Route::post('gallery-section', [App\Http\Controllers\Admin\Creative\GallerySectionController::class, 'store'])->name('gallery-section.store');
            Route::put('gallery-section/{id}', [App\Http\Controllers\Admin\Creative\GallerySectionController::class, 'update'])->name('gallery-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('team/create', [App\Http\Controllers\Admin\Creative\TeamController::class, 'create'])->name('team.create');
            Route::post('team', [App\Http\Controllers\Admin\Creative\TeamController::class, 'store'])->name('team.store');
            Route::get('team/{id}/edit', [App\Http\Controllers\Admin\Creative\TeamController::class, 'edit'])->name('team.edit');
            Route::put('team/{id}', [App\Http\Controllers\Admin\Creative\TeamController::class, 'update'])->name('team.update');
            Route::delete('team/{id}', [App\Http\Controllers\Admin\Creative\TeamController::class, 'destroy'])->name('team.destroy');

            Route::post('team-section', [App\Http\Controllers\Admin\Creative\TeamSectionController::class, 'store'])->name('team-section.store');
            Route::put('team-section/{id}', [App\Http\Controllers\Admin\Creative\TeamSectionController::class, 'update'])->name('team-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('price/create', [App\Http\Controllers\Admin\Creative\PriceController::class, 'create'])->name('price.create');
            Route::post('price', [App\Http\Controllers\Admin\Creative\PriceController::class, 'store'])->name('price.store');
            Route::get('price/{id}/edit', [App\Http\Controllers\Admin\Creative\PriceController::class, 'edit'])->name('price.edit');
            Route::put('price/{id}', [App\Http\Controllers\Admin\Creative\PriceController::class, 'update'])->name('price.update');
            Route::delete('price/{id}', [App\Http\Controllers\Admin\Creative\PriceController::class, 'destroy'])->name('price.destroy');

            Route::post('price-section', [App\Http\Controllers\Admin\Creative\PriceSectionController::class, 'store'])->name('price-section.store');
            Route::put('price-section/{id}', [App\Http\Controllers\Admin\Creative\PriceSectionController::class, 'update'])->name('price-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('blog-category/create', [App\Http\Controllers\Admin\Creative\BlogCategoryController::class, 'create'])->name('blog-category.create');
            Route::post('blog-category', [App\Http\Controllers\Admin\Creative\BlogCategoryController::class, 'store'])->name('blog-category.store');
            Route::get('blog-category/{id}/edit', [App\Http\Controllers\Admin\Creative\BlogCategoryController::class, 'edit'])->name('blog-category.edit');
            Route::put('blog-category/{id}', [App\Http\Controllers\Admin\Creative\BlogCategoryController::class, 'update'])->name('blog-category.update');
            Route::delete('blog-category/{id}', [App\Http\Controllers\Admin\Creative\BlogCategoryController::class, 'destroy'])->name('blog-category.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('blog', [App\Http\Controllers\Admin\Creative\BlogController::class, 'index'])->name('blog.index');
            Route::get('blog/create', [App\Http\Controllers\Admin\Creative\BlogController::class, 'create'])->name('blog.create');
            Route::post('blog', [App\Http\Controllers\Admin\Creative\BlogController::class, 'store'])->name('blog.store');
            Route::get('blog/{id}/edit', [App\Http\Controllers\Admin\Creative\BlogController::class, 'edit'])->name('blog.edit');
            Route::put('blog/{id}', [App\Http\Controllers\Admin\Creative\BlogController::class, 'update'])->name('blog.update');
            Route::delete('blog/{id}', [App\Http\Controllers\Admin\Creative\BlogController::class, 'destroy'])->name('blog.destroy');

            Route::post('blog-section', [App\Http\Controllers\Admin\Creative\BlogSectionController::class, 'store'])->name('blog-section.store');
            Route::put('blog-section/{id}', [App\Http\Controllers\Admin\Creative\BlogSectionController::class, 'update'])->name('blog-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('contact/create', [App\Http\Controllers\Admin\Creative\ContactController::class, 'create'])->name('contact.create');
            Route::post('contact', [App\Http\Controllers\Admin\Creative\ContactController::class, 'store'])->name('contact.store');
            Route::get('contact/{id}/edit', [App\Http\Controllers\Admin\Creative\ContactController::class, 'edit'])->name('contact.edit');
            Route::put('contact/{id}', [App\Http\Controllers\Admin\Creative\ContactController::class, 'update'])->name('contact.update');
            Route::delete('contact/{id}', [App\Http\Controllers\Admin\Creative\ContactController::class, 'destroy'])->name('contact.destroy');

            Route::post('contact-section', [App\Http\Controllers\Admin\Creative\ContactSectionController::class, 'store'])->name('contact-section.store');
            Route::put('contact-section/{id}', [App\Http\Controllers\Admin\Creative\ContactSectionController::class, 'update'])->name('contact-section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('page', [App\Http\Controllers\Admin\Creative\PageController::class, 'index'])->name('page.index');
            Route::get('page/create', [App\Http\Controllers\Admin\Creative\PageController::class, 'create'])->name('page.create');
            Route::post('page', [App\Http\Controllers\Admin\Creative\PageController::class, 'store'])->name('page.store');
            Route::get('page/{id}/edit', [App\Http\Controllers\Admin\Creative\PageController::class, 'edit'])->name('page.edit');
            Route::put('page/{id}', [App\Http\Controllers\Admin\Creative\PageController::class, 'update'])->name('page.update');
            Route::delete('page/{id}', [App\Http\Controllers\Admin\Creative\PageController::class, 'destroy'])->name('page.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('social/create', [App\Http\Controllers\Admin\Creative\SocialController::class, 'create'])->name('social.create');
            Route::post('social', [App\Http\Controllers\Admin\Creative\SocialController::class, 'store'])->name('social.store');
            Route::get('social/{id}/edit', [App\Http\Controllers\Admin\Creative\SocialController::class, 'edit'])->name('social.edit');
            Route::put('social/{id}', [App\Http\Controllers\Admin\Creative\SocialController::class, 'update'])->name('social.update');
            Route::patch('social/update_status/{id}', [App\Http\Controllers\Admin\Creative\SocialController::class, 'update_status'])->name('social.update_status');
            Route::delete('social/{id}', [App\Http\Controllers\Admin\Creative\SocialController::class, 'destroy'])->name('social.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('quick-access/create', [App\Http\Controllers\Admin\Creative\QuickAccessButtonController::class, 'create'])->name('quick-access.create');
            Route::post('quick-access', [App\Http\Controllers\Admin\Creative\QuickAccessButtonController::class, 'store'])->name('quick-access.store');
            Route::put('quick-access/{id}', [App\Http\Controllers\Admin\Creative\QuickAccessButtonController::class, 'update'])->name('quick-access.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('message', [App\Http\Controllers\Admin\Creative\MessageController::class, 'index'])->name('message.index');
            Route::put('message/{id}', [App\Http\Controllers\Admin\Creative\MessageController::class, 'update'])->name('message.update');
            Route::patch('message/mark_all', [App\Http\Controllers\Admin\Creative\MessageController::class, 'mark_all_read_update'])->name('message.mark_all_read_update');
            Route::delete('message/{id}', [App\Http\Controllers\Admin\Creative\MessageController::class, 'destroy'])->name('message.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('site-info/create', [App\Http\Controllers\Admin\Creative\SiteInfoController::class, 'create'])->name('site-info.create');
            Route::post('site-info', [App\Http\Controllers\Admin\Creative\SiteInfoController::class, 'store'])->name('site-info.store');
            Route::put('site-info/{id}', [App\Http\Controllers\Admin\Creative\SiteInfoController::class, 'update'])->name('site-info.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('site-image/create', [App\Http\Controllers\Admin\Creative\SiteImageController::class, 'create'])->name('site-image.create');
            Route::post('site-image', [App\Http\Controllers\Admin\Creative\SiteImageController::class, 'store'])->name('site-image.store');
            Route::put('site-image/{id}', [App\Http\Controllers\Admin\Creative\SiteImageController::class, 'update'])->name('site-image.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('homepage-version/create', [App\Http\Controllers\Admin\Creative\HomepageVersionController::class, 'create'])->name('homepage-version.create');
            Route::put('homepage-version/{id}', [App\Http\Controllers\Admin\Creative\HomepageVersionController::class, 'update'])->name('homepage-version.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('google-analytic/create', [App\Http\Controllers\Admin\Creative\GoogleAnalyticController::class, 'create'])->name('google-analytic.create');
            Route::post('google-analytic', [App\Http\Controllers\Admin\Creative\GoogleAnalyticController::class, 'store'])->name('google-analytic.store');
            Route::put('google-analytic/{id}', [App\Http\Controllers\Admin\Creative\GoogleAnalyticController::class, 'update'])->name('google-analytic.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('external-url/create', [App\Http\Controllers\Admin\Creative\ExternalUrlController::class, 'create'])->name('external-url.create');
            Route::post('external-url', [App\Http\Controllers\Admin\Creative\ExternalUrlController::class, 'store'])->name('external-url.store');
            Route::put('external-url/{id}', [App\Http\Controllers\Admin\Creative\ExternalUrlController::class, 'update'])->name('external-url.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('breadcrumb/create', [App\Http\Controllers\Admin\Creative\BreadcrumbController::class, 'create'])->name('breadcrumb.create');
            Route::post('breadcrumb', [App\Http\Controllers\Admin\Creative\BreadcrumbController::class, 'store'])->name('breadcrumb.store');
            Route::put('breadcrumb/{id}', [App\Http\Controllers\Admin\Creative\BreadcrumbController::class, 'update'])->name('breadcrumb.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('section/create',  [App\Http\Controllers\Admin\Creative\SectionController::class, 'create'])->name('section.create');
            Route::patch('section/{id}',  [App\Http\Controllers\Admin\Creative\SectionController::class, 'update'])->name('section.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('color/create', [App\Http\Controllers\Admin\Creative\ColorController::class, 'create'])->name('color.create');
            Route::post('color', [App\Http\Controllers\Admin\Creative\ColorController::class, 'store'])->name('color.store');
            Route::put('color/{id}', [App\Http\Controllers\Admin\Creative\ColorController::class, 'update'])->name('color.update');
            Route::delete('color/{id}', [App\Http\Controllers\Admin\Creative\ColorController::class, 'destroy'])->name('color.destroy');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('seo/create', [App\Http\Controllers\Admin\Creative\SeoController::class, 'create'])->name('seo.create');
            Route::post('seo', [App\Http\Controllers\Admin\Creative\SeoController::class, 'store'])->name('seo.store');
            Route::put('seo/{id}', [App\Http\Controllers\Admin\Creative\SeoController::class, 'update'])->name('seo.update');
        });

        Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
            Route::get('comment', [App\Http\Controllers\Admin\Creative\CommentSectionController::class, 'index'])->name('comment-section.index');
            Route::put('comment/{id}', [App\Http\Controllers\Admin\Creative\CommentSectionController::class, 'update'])->name('comment-section.update');
            Route::patch('comment/mark_all', [App\Http\Controllers\Admin\Creative\CommentSectionController::class, 'mark_all_approval_update'])->name('comment-section.mark_all_approval_update');
            Route::delete('comment/{id}', [App\Http\Controllers\Admin\Creative\CommentSectionController::class, 'destroy'])->name('comment-section.destroy');
        });
        // End Creative Site Admin Route

    }

    Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
        Route::get('user/management', [UserManagementController::class, 'index'])->name('user.management');
        Route::get('user/management/{id}/edit', [UserManagementController::class, 'edit'])->name('user.management.edit');
        Route::put('user/management/{id}', [UserManagementController::class, 'update'])->name('user.management.update');
        Route::delete('user/management/destroy/{id}', [UserManagementController::class, 'destroy'])->name('user.management.destroy');
    });


    Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
        Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('profile/change-password', [ProfileController::class, 'change_password_edit'])->name('profile.change_password_edit');
        Route::put('profile/change-password/update', [ProfileController::class, 'change_password_update'])->name('profile.change_password_update');
    });

    Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
        Route::get('theme/create', [ThemeController::class, 'create'])->name('theme.create');
        Route::put('theme/{id}', [ThemeController::class, 'update'])->name('theme.update');
    });

    Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
        Route::get('language/create', [LanguageController::class, 'create'])->name('language.create');
        Route::post('language', [LanguageController::class, 'store'])->name('language.store');
        Route::get('language/{id}/edit', [LanguageController::class, 'edit'])->name('language.edit');
        Route::patch('language/language-select', [LanguageController::class, 'update_language'])->name('language.update_language');
        Route::patch('language/processed-language', [LanguageController::class, 'update_processed_language'])->name('language.update_processed_language');
        Route::put('language/{id}', [LanguageController::class, 'update'])->name('language.update');
        Route::patch('language/update_display_dropdown/{id}', [LanguageController::class, 'update_display_dropdown'])->name('language.update_display_dropdown');
        Route::delete('language/{id}', [LanguageController::class, 'destroy'])->name('language.destroy');
    });

    Route::get('language/set-locale/{language_id}', [LanguageController::class, 'set_locale'])
        ->name('language.set_locale')->middleware('XSS');


    Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {

        Route::get('language-keyword-for-adminpanel/create/{id}', [LanguageKeywordController::class, 'create'])
            ->name('language-keyword-for-adminpanel.create');
        Route::get('language-keyword-for-frontend/frontend-create/{id}', [LanguageKeywordController::class, 'frontend_create'])
            ->name('language-keyword-for-frontend.frontend_create');

        Route::post('menu-keyword', [LanguageKeywordController::class, 'store_menu_keyword'])->name('menu-keyword.store_menu_keyword');
        Route::put('menu-keyword/{id}', [LanguageKeywordController::class, 'update_menu_keyword'])->name('menu-keyword.update_menu_keyword');

        Route::post('content-one-group-keyword', [LanguageKeywordController::class, 'store_content_one_group_keyword'])->name('content-one-group-keyword.store_content_one_group_keyword');
        Route::put('content-one-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_one_group_keyword'])->name('content-one-group-keyword.update_content_one_group_keyword');

        Route::post('content-two-group-keyword', [LanguageKeywordController::class, 'store_content_two_group_keyword'])->name('content-two-group-keyword.store_content_two_group_keyword');
        Route::put('content-two-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_two_group_keyword'])->name('content-two-group-keyword.update_content_two_group_keyword');

        Route::post('content-three-group-keyword', [LanguageKeywordController::class, 'store_content_three_group_keyword'])->name('content-three-group-keyword.store_content_three_group_keyword');
        Route::put('content-three-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_three_group_keyword'])->name('content-three-group-keyword.update_content_three_group_keyword');

        Route::post('content-four-group-keyword', [LanguageKeywordController::class, 'store_content_four_group_keyword'])->name('content-four-group-keyword.store_content_four_group_keyword');
        Route::put('content-four-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_four_group_keyword'])->name('content-four-group-keyword.update_content_four_group_keyword');

        Route::post('content-five-group-keyword', [LanguageKeywordController::class, 'store_content_five_group_keyword'])->name('content-five-group-keyword.store_content_five_group_keyword');
        Route::put('content-five-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_five_group_keyword'])->name('content-five-group-keyword.update_content_five_group_keyword');

        Route::post('content-six-group-keyword', [LanguageKeywordController::class, 'store_content_six_group_keyword'])->name('content-six-group-keyword.store_content_six_group_keyword');
        Route::put('content-six-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_six_group_keyword'])->name('content-six-group-keyword.update_content_six_group_keyword');

        Route::post('frontend-one-group-keyword', [LanguageKeywordController::class, 'store_frontend_one_group_keyword'])->name('frontend-one-group-keyword.store_frontend_one_group_keyword');
        Route::put('frontend-one-group-keyword/{id}', [LanguageKeywordController::class, 'update_frontend_one_group_keyword'])->name('frontend-one-group-keyword.update_frontend_one_group_keyword');

        Route::post('frontend-two-group-keyword', [LanguageKeywordController::class, 'store_frontend_two_group_keyword'])->name('frontend-two-group-keyword.store_frontend_two_group_keyword');
        Route::put('frontend-two-group-keyword/{id}', [LanguageKeywordController::class, 'update_frontend_two_group_keyword'])->name('frontend-two-group-keyword.update_frontend_two_group_keyword');


        Route::get('language-keyword-for-frontend/create/{id}', [LanguageKeywordController::class, 'create_frontend'])
            ->name('language-keyword-frontend.create_frontend');

    });

    Route::middleware(['auth:sanctum', 'verified', 'XSS', 'is_Super_Admin'])->prefix('admin')->group(function () {
        Route::get('clear-cache', function() {
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            return redirect()->route('dashboard')
                ->with('success','content.created_successfully');
        });
    });


}
