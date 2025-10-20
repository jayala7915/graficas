<?php
 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\TituloController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\SeccionMediaController;
use App\Http\Controllers\ImagenSeccionMediaController;
use App\Http\Controllers\MisionVisionController;
use App\Http\Controllers\ConoceMasController;
use App\Http\Controllers\HistoriasEmpresaController;
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DatosEmpresaController;
use App\Http\Controllers\CargaDocumentacionController;
use App\Http\Controllers\OfertaLaboralController;



// Reemplaza la ruta existente de welcome
Route::get('/', [WelcomeController::class, 'index'])->name('index');
/*
Route::get('/', function () {
    return view('welcome');
})->name('index');*/

Route::resource('contenidos', App\Http\Controllers\ContenidoController::class);

// routes/web.php
Route::get('/showmore/{texto_identificador}/{tabla}', [WelcomeController::class, 'showMore'])->name('showmore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('titulos', TituloController::class)
 ->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::post('/upload-image', function(Request $request) {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/uploads');
            return response()->json([
                'success' => true,
                'file' => [
                    'url' => Storage::url($path)
                ]
            ]);
        }
        return response()->json(['success' => false]);
    })->name('upload.image');
});


Route::resource('carousel', CarouselController::class)
 ->middleware('auth');
Route::resource('seccion-media', SeccionMediaController::class)
     ->parameters(['seccion-media' => 'seccionMedia'])
      ->middleware('auth');
Route::resource('imagen-seccion-media', ImagenSeccionMediaController::class)
->parameters(['imagen-seccion-media' => 'imagenSeccionMedia'])
 ->middleware('auth');
Route::resource('mision-vision', MisionVisionController::class)
->parameters(['mision-vision' => 'misionVision'])
 ->middleware('auth');
Route::resource('conoce-mas', ConoceMasController::class)
->parameters(['conoce-mas' => 'conoceMas'])
 ->middleware('auth');
Route::resource('historias-empresa', HistoriasEmpresaController::class)
->parameters(['historias-empresa' => 'historiasEmpresa'])
 ->middleware('auth');
Route::resource('directorios', DirectorioController::class)
->parameters(['directorios' => 'directorio'])
 ->middleware('auth');
Route::resource('servicios', ServicioController::class)
->parameters(['servicios' => 'servicio'])
 ->middleware('auth');
Route::resource('socios', SocioController::class)
->parameters(['socios' => 'socio'])
 ->middleware('auth');
Route::resource('datos-empresa', DatosEmpresaController::class)
->parameters(['datos-empresa' => 'datosEmpresa'])
 ->middleware('auth');
 Route::resource('documentos', CargaDocumentacionController::class)
 ->parameters(['documentos' => 'documentos'])
 ->middleware('auth');
Route::resource('ofertas-laborales', OfertaLaboralController::class)
 ->parameters(['ofertas-laborales' => 'ofertas_laborale'])
 ->middleware('auth');
 
Route::post('/upload-image', function(\Illuminate\Http\Request $request) {
    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('editor-uploads', 'public');
        return response()->json([
            'success' => true,
            'file' => [
                'url' => asset('storage/'.$path)
            ]
        ]);
    }
    return response()->json(['success' => false]);
})->name('upload.image');
