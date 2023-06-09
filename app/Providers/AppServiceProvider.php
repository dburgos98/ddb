<?php

namespace App\Providers;

use App\Repositories\DDBUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        if (!Collection::hasMacro('paginate')) {
            Collection::macro('paginate', function ($perPage = 15, $page = null, $options = []) {
                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                return (new LengthAwarePaginator(
                    $this->forPage($page, $perPage),
                    $this->count(),
                    $perPage,
                    $page,
                    $options
                ))->withPath('');
            });
        }

        $this->app->bind(UserRepository::class, DDBUserRepository::class);

        JsonResource::withoutWrapping();
    }
}
