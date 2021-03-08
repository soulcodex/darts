<?php

namespace App\Infrastructure\Laravel\Providers;

use App\Domain\Entity\Nightclub\NightclubRepositoryInterface;
use App\Domain\Entity\User\UserRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Repository\NightclubRepository;
use App\Infrastructure\Persistence\Eloquent\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array $repositories
     */
    private array $repositories = [
        UserRepositoryInterface::class => UserRepository::class,
        NightclubRepositoryInterface::class => NightclubRepository::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $repository) {
            $this->app->bind($interface, $repository);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
