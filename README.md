# Setup

```bash
composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

npm run build
```

Create Tenant 
```bash
php artisan tinker

$tenant1 = App\Models\Tenant::create(['id' => 'foo']);

$tenant1->domains()->create(['domain' => 'foo.localhost']);

App\Models\Tenant::all()->runForEach(function () {
    App\Models\User::factory()->create(['email' => 'test@gmail.com']);
});
```
