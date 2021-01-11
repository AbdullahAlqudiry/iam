# IAM Auth Package
---

#### Installation
```bash
composer require alqudiry/iam
```

#### Publish 
```bash
php artisan vendor:publish --provider="Alqudiry\Iam\IAMServiceProvider"
```

### Configuration
- Update your "auth.php" to use IAMUser class instead of User class:
- Update credentials of IAM Site in config/iam.php
- Update your "routes\web.php" to include this routes:
```php
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [\App\Http\Controllers\IAMController::class, 'login'])->name('login');
    Route::get('/validate-login', [\App\Http\Controllers\IAMController::class, 'validateLogin'])->name('validateLogin');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [\App\Http\Controllers\IAMController::class, 'logout'])->name('logout');
});
```


### Run the migrations