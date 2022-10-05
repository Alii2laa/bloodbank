<?php

namespace App\Providers;

use App\Models\Client;
use App\Trait\ApiResponse;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    use ApiResponse;
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';
    public const Client = '/client';
    public const Admin = '/admin';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->group(base_path('routes/front.php'));

            Route::middleware('web')
                ->group(base_path('routes/admin.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('password-rate-limit', function (Request $request) {
            return Limit::perMinute(3)->by($request->input('pin_code'))->response(function (Request $request) {
                $client = Client::where('phone',$request->phone)->first();
                $client->update([
                    'pin_code' => Null
                ]);
                return $this->apiResponseJson(null,'تم إرسال عدد كثير من الطلبات رجاءاً حاول بعد قليل و أيضاً قم بطلب تغير كلمة المرور مرة آخرى',429);
            });
        });

    }
}
