# Setup

```bash
composer install

npm install

npm run build

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed
```

# Filament

AdminPanelProvider and TenantPanelProvider
1. Check both plugins I have to register both to make it work.
2. I have no ideas how can I make the image url to be "tenant aware url", laravel tenancy auto do suffixing when 
   tenant initialized,  I am able to use using Storage::disk('public') to store the files, and tenant_asset
   ('app/public/...') to get a link to the asset. Maybe I need to rewrite the url Accessor and other url related 
   function.
