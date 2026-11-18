<?php

namespace Webkul\Bagisto\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\Admin\Providers\AdminServiceProvider;
use Webkul\Attribute\Providers\AttributeServiceProvider;
use Webkul\BookingProduct\Providers\BookingProductServiceProvider;
use Webkul\CartRule\Providers\CartRuleServiceProvider;
use Webkul\CatalogRule\Providers\CatalogRuleServiceProvider;
use Webkul\Category\Providers\CategoryServiceProvider;
use Webkul\Checkout\Providers\CheckoutServiceProvider;
use Webkul\CMS\Providers\CMSServiceProvider;
use Webkul\Core\Providers\CoreServiceProvider;
use Webkul\Core\Providers\EnvValidatorServiceProvider;
use Webkul\Customer\Providers\CustomerServiceProvider;
use Webkul\DataGrid\Providers\DataGridServiceProvider;
use Webkul\DataTransfer\Providers\DataTransferServiceProvider;
use Webkul\DebugBar\Providers\DebugBarServiceProvider;
use Webkul\EUWithdrawal\Providers\EUWithdrawalServiceProvider;
use Webkul\FPC\Providers\FPCServiceProvider;
use Webkul\GDPR\Providers\GDPRServiceProvider;
use Webkul\ImageCache\Providers\ImageCacheServiceProvider;
use Webkul\Installer\Providers\InstallerServiceProvider;
use Webkul\Inventory\Providers\InventoryServiceProvider;
use Webkul\MagicAI\Providers\MagicAIServiceProvider;
use Webkul\Marketing\Providers\MarketingServiceProvider;
use Webkul\Notification\Providers\NotificationServiceProvider;
use Webkul\Omnibus\Providers\OmnibusServiceProvider;
use Webkul\PayGlocal\Providers\PayGlocalServiceProvider;
use Webkul\Payment\Providers\PaymentServiceProvider;
use Webkul\Paypal\Providers\PaypalServiceProvider;
use Webkul\PayU\Providers\PayUServiceProvider;
use Webkul\PhonePe\Providers\PhonePeServiceProvider;
use Webkul\Product\Providers\ProductServiceProvider;
use Webkul\Razorpay\Providers\RazorpayServiceProvider;
use Webkul\RMA\Providers\RMAServiceProvider;
use Webkul\Rule\Providers\RuleServiceProvider;
use Webkul\Sales\Providers\SalesServiceProvider;
use Webkul\Shipping\Providers\ShippingServiceProvider;
use Webkul\Shop\Providers\ShopServiceProvider;
use Webkul\Sitemap\Providers\SitemapServiceProvider;
use Webkul\SocialLogin\Providers\SocialLoginServiceProvider;
use Webkul\SocialShare\Providers\SocialShareServiceProvider;
use Webkul\Stripe\Providers\StripeServiceProvider;
use Webkul\Tax\Providers\TaxServiceProvider;
use Webkul\Theme\Providers\ThemeServiceProvider;
use Webkul\User\Providers\UserServiceProvider;

class BagistoServiceProvider extends ServiceProvider
{
    /**
     * Webkul package service providers to register.
     */
    protected array $providers = [
        CoreServiceProvider::class,
        EnvValidatorServiceProvider::class,
        OmnibusServiceProvider::class,
        AdminServiceProvider::class,
        AttributeServiceProvider::class,
        BookingProductServiceProvider::class,
        CMSServiceProvider::class,
        CartRuleServiceProvider::class,
        CatalogRuleServiceProvider::class,
        CategoryServiceProvider::class,
        CheckoutServiceProvider::class,
        CustomerServiceProvider::class,
        DataGridServiceProvider::class,
        DataTransferServiceProvider::class,
        DebugBarServiceProvider::class,
        EUWithdrawalServiceProvider::class,
        FPCServiceProvider::class,
        GDPRServiceProvider::class,
        ImageCacheServiceProvider::class,
        InstallerServiceProvider::class,
        InventoryServiceProvider::class,
        MagicAIServiceProvider::class,
        MarketingServiceProvider::class,
        NotificationServiceProvider::class,
        PayGlocalServiceProvider::class,
        PayUServiceProvider::class,
        PaymentServiceProvider::class,
        PaypalServiceProvider::class,
        PhonePeServiceProvider::class,
        ProductServiceProvider::class,
        RMAServiceProvider::class,
        RazorpayServiceProvider::class,
        RuleServiceProvider::class,
        SalesServiceProvider::class,
        ShippingServiceProvider::class,
        ShopServiceProvider::class,
        SitemapServiceProvider::class,
        SocialLoginServiceProvider::class,
        SocialShareServiceProvider::class,
        StripeServiceProvider::class,
        TaxServiceProvider::class,
        ThemeServiceProvider::class,
        UserServiceProvider::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(dirname(__DIR__, 2).'/config/concord.php', 'concord');
        $this->mergeConfigFrom(dirname(__DIR__, 2).'/config/themes.php', 'themes');

        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            dirname(__DIR__, 2).'/config/concord.php' => config_path('concord.php'),
            dirname(__DIR__, 2).'/config/themes.php' => config_path('themes.php'),
        ], 'bagisto-config');

        $this->publishes([
            dirname(__DIR__, 2).'/public/themes' => public_path('themes'),
            dirname(__DIR__, 2).'/public/installer' => public_path('installer'),
        ], 'bagisto-assets');
    }
}
