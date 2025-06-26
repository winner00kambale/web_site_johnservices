<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Autenticate\AutenticateController;
use App\Http\Controllers\Chambre\ChambreController;
use App\Http\Controllers\Chambre\SlideRoomsController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Faqs\FaqsController;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\Menurestaurant\CategoryController;
use App\Http\Controllers\Menurestaurant\MenuController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Partenaire\PartenaireController;
use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\Restaurant\SlideRestauController;
use App\Http\Controllers\Service\OtherServiceController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Service\SlideOtheServiceController;
use App\Http\Controllers\Slide\SlideController;
use App\Http\Controllers\Team\TeamController;
use App\Http\Controllers\Temoignage\TemoignageController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function () {
    Route::post('/createUSer', 'storeUser');
    Route::put('/updateUser/{id}', 'updateUser');
    Route::delete('/deleteUser/{id}', 'deleteUser');
    Route::get('/getAllUser', 'getUsers');
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AutenticateController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/logout', [AutenticateController::class, 'logout']);
    });
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/getAllAboutData', 'getAllAboutData');
    Route::get('/getSingleAboutData/{id}', 'getSingleAboutData');
    Route::post('/createAbout', 'storeAbout');
    Route::post('/updateAbout/{id}', 'updateAbout');
    Route::delete('/deleteAbout/{id}', 'deleteAbout');
});

Route::controller(SlideController::class)->group(function () {
    Route::post('/createSlide', 'storeSlide');
    Route::post('/updateSlide/{id}', 'updateSlide');
    Route::delete('/deleteSlide/{id}', 'deleteSlide');
    Route::get('/getAllSlideData', 'getAllSlideData');
    Route::get('/getOneSilde', 'getOneSilde');
    Route::get('/getSingleSlide/{id}', 'getSingleSlide');
});
Route::controller(TeamController::class)->group(function () {
    Route::get('/getAllTeamData', 'getAllTeamData');
    Route::post('/createTeam', 'storeTeam');
    Route::post('/updateTeam/{id}', 'updateTeam');
    Route::delete('/deleteTeam/{id}', 'deleteTeam');
    Route::get('/getSingleTeamData/{id}', 'getSingleTeamData');
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('getServiceData', 'getServiceData');
    Route::get('getSingleService/{id}', 'getSingleService');
    Route::post('createService', 'createService');
    Route::post('updateService', 'updateService');
    Route::delete('deleteService/{id}', 'deleteService');
});

Route::controller(GalleryController::class)->group(function () {
    Route::get('/getAllGalleyData', 'getAllGalleyData');
    Route::get('/getSixImagesGallery', 'getSixGallery');
    Route::post('/createGallery', 'storeGallery');
    Route::post('/updateGallery/{id}', 'updateGallery');
    Route::delete('/deleteGallery/{id}', 'deleteGallery');
    Route::get('/getSingleGallery/{id}', 'getSingleGallery');
});

Route::controller(FaqsController::class)->group(function () {
    Route::post('/createFaqs', 'createFaqs');
    Route::put('/updateFaqs/{id}', 'updateFaqs');
    Route::get('/getFaqsData', 'getFaqsData');
    Route::delete('/deleteFaqs/{id}', 'deleteFaqs');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/getCategoryData', 'getCategoryData');
    Route::post('/createCategory', 'createCategory');
    Route::put('/updateCategory/{id}', 'updateCategory');
});

Route::controller(MenuController::class)->group(function () {
    Route::get('/getMenuData', 'getMenuData');
    Route::post('/createMenu', 'createMenu');
    Route::put('/updateMenu/{id}', 'updateMenu');
    Route::get('/getMenuRestauByCategory/{id?}', 'getMenuRestauByCategory');
});
Route::controller(ContactController::class)->group(function () {
    Route::get('/getAllContactData', 'getContact');
    Route::post('/createContact', 'storeContact');
    Route::delete('/deleteContact/{id}', 'deleteContact');
});

Route::controller(ChambreController::class)->group(function () {
    Route::post('/createRoom', 'createChambre');
    Route::post('/updateRoom/{id}', 'updateChambre');
    Route::get('/getRoomsData', 'getRoomsData');
    Route::get('/getSingleRoom/{id}', 'getSingleRoom');
    Route::delete('/deleteRoom/{id}', 'deleteChambre');
});

Route::controller(SlideRestauController::class)->group(function () {
    Route::post('/createSlideRestau', 'createSlideRestau');
    Route::post('/updateSlideRestau/{id}', 'updateSlideRestau');
    Route::delete('/deleteSlideRestau/{id}', 'deleteSlideRestau');
    Route::get('/getAllSlideRestauData', 'getAllSlideRestauData');
    Route::get('/getOneSildeRestau', 'getOneSildeRestau');
});

Route::controller(RestaurantController::class)->group(function () {
    Route::post('/createRestaurant', 'createRestaurant');
    Route::put('/updateRestaurant/{id}', 'updateRestaurant');
    Route::get('/getRestaurantData', 'getRestaurantData');
    Route::get('/getMenuRestauByCategory/{id}', 'getMenuRestauByCategory');
});

Route::controller(NewsController::class)->group(function () {
    Route::post('/createNews', 'createNews');
    Route::post('/updateNews/{id}', 'updateNews');
    Route::get('/getNewsData', 'getNewsData');
    Route::get('/getEventsById/{id}', 'getEventsById');
});

Route::controller(TemoignageController::class)->group(function () {
    Route::get('/getAllTemoignage', 'getTemoignage');
    Route::post('/createTemoignage', 'storeTemoignage');
    Route::post('/updateTemoignage/{id}', 'updateTemoignage');
    Route::delete('/deleteTemoignage/{id}', 'deleteTemoignage');
});

Route::controller(PartenaireController::class)->group(function () {
    Route::get('/getAllPartenaire', 'getPartenaire');
    Route::post('/createPartenaire', 'storePartenaire');
    Route::post('/updatePartenaire/{id}', 'updatePartenaire');
    Route::delete('/deletePartenaire/{id}', 'deletePartenaire');
});

Route::controller(SlideRoomsController::class)->group(function () {
    Route::post('/createSlideRoom', 'createSlideRoom');
    Route::post('/updateSlideRoom/{id}', 'updateSlideRoom');
    Route::delete('/deleteSlideRoom/{id}', 'deleteSlideRoom');
    Route::get('/getAllSlideRoomData', 'getAllSlideRoomData');
    Route::get('/getOneSildeRoom', 'getOneSildeRoom');
});

Route::controller(OtherServiceController::class)->group(function () {
    Route::get('getOtherServicesData', 'getOtherServicesData');
    Route::post('createOtherService', 'createOtherService');
    Route::post('updateOtherService', 'updateOtherService');
    Route::delete('deleteOtheService/{id}', 'deleteOtheService');
});

Route::controller(SlideOtheServiceController::class)->group(function () {
    Route::post('/createSlideService', 'createSlideService');
    Route::post('/updateSlideService/{id}', 'updateSlideService');
    Route::delete('/deleteSlideService/{id}', 'deleteSlideService');
    Route::get('/getAllSlideServiceData', 'getAllSlideServiceData');
    Route::get('/getOneSildeService', 'getOneSildeService');
});

