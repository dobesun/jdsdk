<?php
namespace Dobesun\Jdsdk;

use Illuminate\Support\ServiceProvider;

class JdSdkServiceProvider extends ServiceProvider
{
    public function register()
    {
        // 绑定客户端到服务容器
        $this->app->singleton('spurn.jd.sdk', function ($app) {
            return new Spurn(
                $app['config']['jd.key'],
                $app['config']['jd.secret'],
                $app['config']['jd.api_path'],
            );
        });
    }
}
