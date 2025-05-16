<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Titulo;
use App\Models\Carousel;
use App\Models\SeccionMedia;
use App\Models\ImagenSeccionMedia;
use App\Models\MisionVision;
use App\Models\ConoceMas;
use App\Models\HistoriasEmpresa;
use App\Models\Directorio;
use App\Models\Servicio;
use App\Models\Socio;

class WelcomeController extends Controller
{
    public function index()
    {
        $carousel = Carousel::join('titulos', 'carousels.titulo_id', '=', 'titulos.id')
            ->select('carousels.*', 'titulos.titulo as nombre_titulo')
            ->get();
        $seccionmedia = SeccionMedia::all();
        $imagenSeccionMedia = ImagenSeccionMedia::join('titulos', 'imagen_seccion_media.titulo_id', '=', 'titulos.id')
            ->select('imagen_seccion_media.*', 'titulos.titulo as nombre_titulo')
            ->get();

        $misionVision = DB::table('mision_visions')
        ->join('titulos', 'mision_visions.titulo_id', '=', 'titulos.id')
        ->select(
            'mision_visions.*',          
            'titulos.titulo as nombre_titulo' 
        )
        ->orderBy('titulo_id')
        ->get();

        // Agrupar por título_id y nombre_titulo
        $gruposmisionVision = $misionVision->groupBy('nombre_titulo');

        $conoceMas = ConoceMas::join('titulos', 'conoce_mas.titulo_id', '=', 'titulos.id')
            ->select('conoce_mas.*', 'titulos.titulo as nombre_titulo')
            ->get();
        
        $historiasEmpresa = HistoriasEmpresa::join('titulos', 'historias_empresas.titulo_id', '=', 'titulos.id')
            ->select('historias_empresas.*', 'titulos.titulo as nombre_titulo')
            ->get();
        
         $directorio = Directorio::join('titulos', 'directorios.titulo_id', '=', 'titulos.id')
            ->select('directorios.*', 'titulos.titulo as nombre_titulo')
            ->get();

         $servicios = Servicio::join('titulos', 'servicios.titulo_id', '=', 'titulos.id')
            ->select('servicios.*', 'titulos.titulo as nombre_titulo')
            ->get();
            
          $socios = Socio::all();   

        // También puedes usar consultas más complejas
       /* $datosFiltrados = TuModelo::where('activo', true)
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();*/
        
        // Pasar datos a la vista
        return view('welcome', [
            'carousel' => $carousel,
            'seccionmedia' => $seccionmedia,
            'imagenSeccionMedia' => $imagenSeccionMedia,
            'gruposmisionVision' => $gruposmisionVision,
            'conoceMas' =>  $conoceMas,
            'historiasEmpresa'  => $historiasEmpresa,
            'directorio' => $directorio,
            'servicios' => $servicios,
            'socios' => $socios
            // Puedes agregar más variables aquí
        ]);
    }
}