## About <a href="javascript:void();" target="_blank">Laravel Settings Components</a>

Laravel's missing setting component Feature

## Doc:

<hr/>

- The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:

  ```
  App\Providers\SettingsProvider::class,
  ```

  - Add those route in yor routes/web.php

    ```

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::get('/{setting}/move-up', [SettingController::class, 'move_up'])->name('admin.settings.moveUp');
        Route::get('/{setting}/move-down', [SettingController::class, 'move_down'])->name('admin.settings.moveDown');
        Route::post('/', [SettingController::class, 'store'])->name('admin.settings.store');
        Route::put('/', [SettingController::class, 'update'])->name('admin.settings.update');
        Route::delete('/{setting}/delete', [SettingController::class, 'destroy'])->name('admin.settings.delete');
        Route::get('/{setting}/unset-value', [SettingController::class, 'unsetValue'])->name('admin.settings.unsetValue');
    });

    ```

## <a href="https://iqbalhasan.dev" target="_blank">iqbalhasan.dev</a> Sponsors

We would like to extend our thanks to the following sponsors for funding <a href="https://iqbalhasan.dev" target="_blank">iqbalhasan.dev</a> development. If you are interested in becoming a sponsor, please email us <a href="mailto:info@iqbalhasan.dev">info@iqbalhasan.dev</a>

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to <a href="https://iqbalhasan.dev" target="_blank">IQBAL HASAN</a> via [info@iqbalhasan.dev](mailto:info@iqbalhasan.dev). All security vulnerabilities will be promptly addressed.

## License

The iqbalhasan.dev Project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
