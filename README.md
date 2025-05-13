نیازمندی های استفاده از پکیج:
نصب پی اچ پی و کامپوزر بر روی سیستم
ابتدا این دستور رو اجرا کنید تا پکیج و نیازمندی های آن به پوشه وندور اضافه شود:
composer require unisa/basalam-proxy:@dev
بعد این دستور رو اجرا کنید تا فایل کانفیگ پابلیش شود در پروژه تان:
php artisan vendor:publish --provider="Unisa\BasalamProxy\ProxyServiceProvider" --tag=config
