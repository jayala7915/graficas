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
use App\Models\DatosEmpresa;
use App\Models\CargaDocumentacion;
use App\Models\OfertaLaboral;

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
        
       /* $historiasEmpresa = HistoriasEmpresa::join('titulos', 'historias_empresas.titulo_id', '=', 'titulos.id')
            ->select('historias_empresas.*', 'titulos.titulo as nombre_titulo')
            ->get();
        */
         $directorio = Directorio::join('titulos', 'directorios.titulo_id', '=', 'titulos.id')
            ->select('directorios.*', 'titulos.titulo as nombre_titulo')
            ->get();

         $servicios = Servicio::join('titulos', 'servicios.titulo_id', '=', 'titulos.id')
            ->select('servicios.*', 'titulos.titulo as nombre_titulo')
            ->get();
            
         // $socios = Socio::all();  
          // En tu controlador
$socios = Socio::with(['ofertasLaborales' => function($query) {
    $query->where('numero_vacantes', '>', 0); // Solo ofertas con vacantes
}])->get();
           $empresa = DatosEmpresa::all();   

          $documentos = CargaDocumentacion::all();  
          

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
           // 'historiasEmpresa'  => $historiasEmpresa,
            'directorio' => $directorio,
            'servicios' => $servicios,
            'socios' => $socios,
            'empresa' => $empresa,
             'documentos' => $documentos,
            // Puedes agregar más variables aquí
        ]);
    }

// app/Http/Controllers/TuControlador.php
public function showMore($texto_identificador,$tabla)
{
    // Buscar en todas las tablas relevantes
    $resultados = collect();
    
    if ($tabla == 'CA')
    {
 $resultados = $resultados->merge(
        Carousel::join('titulos', 'carousels.titulo_id', '=', 'titulos.id')
            ->select('carousels.*', 'titulos.titulo as nombre_titulo')
            ->where('carousels.id', $texto_identificador)
            ->get()
    );
    }
    elseif($tabla == 'SE')
    {
 $resultados = $resultados->merge(
         Servicio::join('titulos', 'servicios.titulo_id', '=', 'titulos.id')
            ->select('servicios.*', 'servicios.texto_enriquesido_html as texto_amplio_html','titulos.titulo as nombre_titulo')
            ->where('servicios.id', $texto_identificador)
            ->get()
    );
    }
    elseif($tabla == 'CM')
    {
        $resultados = $resultados->merge(
         ConoceMas::join('titulos', 'conoce_mas.titulo_id', '=', 'titulos.id')
            ->select('conoce_mas.*','conoce_mas.texto_corto as texto', 'conoce_mas.texto_largo as texto_amplio_html','titulos.titulo as nombre_titulo')
            ->where('conoce_mas.id', $texto_identificador)
            ->get()
        );
    }
    elseif($tabla == 'VA')
    {
        $resultados = $resultados->merge(
         OfertaLaboral::join('socios', 'oferta_laborals.socio_id', '=', 'socios.id')
            ->select('oferta_laborals.*','socios.socio as nombre_socio','socios.imagen')
             ->selectRaw("'VA' as variable")  // Aquí agregamos el valor fijo
            ->where('oferta_laborals.socio_id', $texto_identificador)
            ->get()
        );

     
    }

    // Tabla 1

   

    $empresa = DatosEmpresa::all();  

    $servicios = Servicio::join('titulos', 'servicios.titulo_id', '=', 'titulos.id')
            ->select('servicios.*', 'titulos.titulo as nombre_titulo')
            ->get();

   /* // Tabla 2
    $resultados = $resultados->merge(
        DB::table('tabla2')->where('texto_identificador', $texto_identificador)->get()
    );
    
    // Tabla 3
    $resultados = $resultados->merge(
        DB::table('tabla3')->where('texto_identificador', $texto_identificador)->get()
    );
    */
    // Si solo esperas un resultado único de una tabla específica:
    // $contenido = Modelo::where('texto_identificador', $texto_identificador)->first();
    //dd($resultados);
    return view('showmore', [
        'contenido' => $resultados,
        'texto_identificador' => $texto_identificador,
        'empresa' => $empresa,
        'servicios' => $servicios
    ]);
}

    
}