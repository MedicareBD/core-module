<?php

namespace Modules\Core\Providers;

use Modules\Core\Actions\Fortify\CreateNewUser;
use Modules\Core\Actions\Fortify\ResetUserPassword;
use Modules\Core\Actions\Fortify\UpdateUserPassword;
use Modules\Core\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                return $request->wantsJson()
                    ? response()->json([
                        'message' => __('Logged In Successfully'),
                        'redirect' => \Auth::user()->hasRole('customer') ? null : route('admin.dashboard.index'),
                        'two_factor' => false
                    ])
                    : redirect()->route('admin.dashboard.index');
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(fn() => view('core::auth.login'));
    }
}
