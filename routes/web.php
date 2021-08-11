<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PresetPreferenceController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\AHPController;
use App\Http\Controllers\UserMetodePembobotanController;

  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
Route::get('/', function () {
    return view('landingpage');
});
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {

    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);
        Route::resource('presetpreferences', PresetPreferenceController::class);
        
        Route::resource('ahp', AHPController::class, [
            'only' => ['index', 'create', 'store']
        ]);
        Route::get('/ahp/{ahp}', [AHPController::class, 'show'])->name('ahp.show');
        Route::get('/ahp/{ahp}/edit', [AHPController::class, 'edit'])->name('ahp.edit');
        Route::post('/ahp/{ahp}', [AHPController::class, 'update'])->name('ahp.update');
        Route::post('/ahp/t/{ahp}', [AHPController::class, 'toggle'])->name('ahp.toggle');
        Route::delete('/ahp/{ahp}', [AHPController::class, 'destroy'])->name('ahp.destroy');

        // Verb          Path                        Action  Route Name
        // GET           /users                      index   users.index
        // GET           /users/create               create  users.create
        // POST          /users                      store   users.store
        // GET           /users/{user}               show    users.show
        // GET           /users/{user}/edit          edit    users.edit
        // PUT|PATCH     /users/{user}               update  users.update
        // DELETE        /users/{user}               destroy users.destroy

    });

    Route::group(['middleware' => ['role:User|Admin']], function () {
        Route::get('/myprofile', [UserController::class, 'myProfile'])->name('myprofile.index');
        Route::get('/myprofile/edit', [UserController::class, 'myProfileEdit'])->name('myprofile.edit');
        Route::post('/myprofile/update', [UserController::class, 'myProfileUpdate'])->name('myprofile.update');
        Route::get('/myprofile/password', [UserController::class, 'getPassword'])->name('myprofile.changePassword.index');
        Route::post('/myprofile/change_password', [UserController::class, 'postPassword'])->name('myprofile.userPostPassword');

        Route::resource('laptop/myfavorites', FavoriteController::class, [
            // 'except' => ['edit', 'create', 'update']
            'only' => ['index', 'store', 'show', 'destroy']
        ]);

        Route::resource('laptop/search', SearchController::class, [
            // 'except' => ['edit', 'create', 'update']
            'only' => ['index', 'store', 'show', 'destroy']
        ]);

        Route::resource('laptop/rekomendasi', RekomendasiController::class, [
            // 'except' => ['edit', 'create', 'update', 'show']
            'only' => ['index', 'store', 'destroy']
        ]);
        Route::get('laptop/rekomendasi/usepreset/{presetpreference}', [RekomendasiController::class, 'index'])->name('rekomendasi.preset.use');
        Route::get('laptop/rekomendasi/hasil', [RekomendasiController::class, 'hasil_index'])->name('rekomendasi.hasil.index');
        Route::post('laptop/rekomendasi/hasil', [RekomendasiController::class, 'hasil'])->name('rekomendasi.hasil');
        Route::get('laptop/rekomendasi/hasil/{laptop}', [RekomendasiController::class, 'product_detail'])->name('rekomendasi.hasil.product.detail');
        Route::get('laptop/rekomendasi/preset', [RekomendasiController::class, 'list'])->name('rekomendasi.list_preset');
        Route::get('laptop/rekomendasi/preset/{presetpreference}', [RekomendasiController::class, 'presetDetail'])->name('rekomendasi.preset.show');

        // -----------------
        // metode pembobotan
        // -----------------
        // Pembobotan AHP
        Route::get('user/bobot/ahp', [UserMetodePembobotanController::class, 'ahp_index'])->name('user.bobot.ahp.index');
        Route::get('user/bobot/ahp/create', [UserMetodePembobotanController::class, 'ahp_create'])->name('user.bobot.ahp.create');
        Route::post('user/bobot/ahp', [UserMetodePembobotanController::class, 'ahp_store'])->name('user.bobot.ahp.store');
        Route::get('user/bobot/ahp/{ahp}', [UserMetodePembobotanController::class, 'ahp_show'])->name('user.bobot.ahp.show');
        Route::get('user/bobot/ahp/{ahp}/edit', [UserMetodePembobotanController::class, 'ahp_edit'])->name('user.bobot.ahp.edit');
        Route::post('user/bobot/ahp/{ahp}', [UserMetodePembobotanController::class, 'ahp_update'])->name('user.bobot.ahp.update');
        Route::post('user/bobot/ahp/t/{ahp}', [UserMetodePembobotanController::class, 'ahp_toggle'])->name('user.bobot.ahp.toggle');
        Route::delete('user/bobot/ahp/{ahp}', [UserMetodePembobotanController::class, 'ahp_destroy'])->name('user.bobot.ahp.destroy');


        // Pembobotan Langsung
        Route::get('user/bobot/langsung', [UserMetodePembobotanController::class, 'langsung_index'])->name('user.bobot.langsung.index');
        Route::get('user/bobot/langsung/edit', [UserMetodePembobotanController::class, 'langsung_edit'])->name('user.bobot.langsung.edit');
        Route::post('user/bobot/langsung/edit', [UserMetodePembobotanController::class, 'langsung_update'])->name('user.bobot.langsung.update');

        // Route::resource('user/bobot/ahp', SearchController::class, [
        //     // 'except' => ['edit', 'create', 'update']
        //     'only' => ['index', 'store', 'show', 'destroy']
        // ]);
        // Route::resource('user/bobot/langsung', SearchController::class, [
        //     // 'except' => ['create', 'update', 'show', 'destroy']
        //     'only' => ['index', 'store', 'edit']
        // ]);
        
    });
    

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
