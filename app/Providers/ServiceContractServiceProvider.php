<?php

namespace App\Providers;

use App\Services\AboutUs\AboutUsService;
use App\Services\Gallery\GalleryService;
use App\Services\Slider\Contracts\SliderService as SliderServiceInterface;
use App\Services\AboutUs\Contracts\AboutUsService as AboutUsServiceInterface;
use App\Services\Slider\SliderService;
use App\Services\Testimonial\TestimonialService;
use Illuminate\Support\ServiceProvider;
use App\Services\Testimonial\Contracts\TestimonialService as TestimonialServiceInterface;
use App\Services\Gallery\Contracts\GalleryService as GalleryServiceInterface;
use App\Services\Staff\Contracts\StaffService as StaffServiceInterface;
use App\Services\Staff\StaffService;
use App\Services\Price\Contracts\PriceService as PriceServiceInterface;
use App\Services\Price\PriceService;
use App\Services\Service\ServiceService;
use App\Services\Service\Contracts\ServiceService as ServiceServiceInterface;

class ServiceContractServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SliderServiceInterface::class, SliderService::class);
        $this->app->bind(AboutUsServiceInterface::class, AboutUsService::class);
        $this->app->bind(TestimonialServiceInterface::class, TestimonialService::class);
        $this->app->bind(GalleryServiceInterface::class, GalleryService::class);
        $this->app->bind(StaffServiceInterface::class, StaffService::class);
        $this->app->bind(PriceServiceInterface::class, PriceService::class);
        $this->app->bind(ServiceServiceInterface::class, ServiceService::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
