<?php

// app/Http/Controllers/DatosEmpresaController.php

namespace App\Http\Controllers;

use App\Models\DatosEmpresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DatosEmpresaController extends Controller
{
    // Listado de empresas
    public function index()
    {
        $datosEmpresas = DatosEmpresa::all();
        return view('datos_empresa.index', compact('datosEmpresas'));
    }

    // Formulario de creación
    public function create()
    {
        $redesDisponibles = [
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
            'youtube' => 'YouTube',
            'tiktok' => 'TikTok',
            'whatsapp' => 'WhatsApp'
        ];
        
        return view('datos_empresa.create', compact('redesDisponibles'));
    }

    // Almacenar nuevo registro
    public function store(Request $request)
    {
        /*$validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'direccion_pagina' => 'nullable|url|max:255',
            'telefono_fijo' => 'required|string|max:20',
            'telefono_movil' => 'required|string|max:20',
            'eslogan_empresa' => 'nullable|string|max:255',
            'logo_empresa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'red_icon.*' => 'nullable|string',
            'red_url.*' => 'nullable|url',
            'red_activa.*' => 'nullable|boolean'
        ]);
*/
        // Procesar redes sociales
        $redesSociales = [];
        if ($request->has('red_icon')) {
            foreach ($request->red_icon as $index => $icono) {
                if (!empty($icono)) {
                    $redesSociales[] = [
                        'icono' => $icono,
                        'url' => $request->red_url[$index] ?? '',
                        'activa' => $request->has("red_activa.$index") ? true : false
                    ];
                }
            }
        }

        $data = [
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'correo' => $request->correo,
            'direccion_pagina' => $request->direccion_pagina,
            'telefono_fijo' => $request->telefono_fijo,
            'telefono_movil' => $request->telefono_movil,
            'eslogan_empresa' => $request->eslogan_empresa,
            'redes_sociales' => !empty($redesSociales) ? $redesSociales : null
        ];

        // Subir logo si existe
        if ($request->hasFile('logo_empresa')) {
            $path = $request->file('logo_empresa')->store('public/logos_empresa');
            $data['logo_empresa'] = Storage::url($path);
        }

        DatosEmpresa::create($data);

        return redirect()->route('datos-empresa.index')
            ->with('success', 'Datos de empresa creados exitosamente.');
    }

    // Mostrar detalles
    public function show(DatosEmpresa $datosEmpresa)
    {
        return view('datos_empresa.show', compact('datosEmpresa'));
    }

    // Formulario de edición
    public function edit(DatosEmpresa $datosEmpresa)
    {
        $redesDisponibles = [
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
            'youtube' => 'YouTube',
            'tiktok' => 'TikTok',
            'whatsapp' => 'WhatsApp'
        ];

        return view('datos_empresa.edit', compact('datosEmpresa', 'redesDisponibles'));
    }

    // Actualizar registro
    public function update(Request $request, DatosEmpresa $datosEmpresa)
    {
        /*$validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'direccion_pagina' => 'nullable|url|max:255',
            'telefono_fijo' => 'required|string|max:20',
            'telefono_movil' => 'required|string|max:20',
            'eslogan_empresa' => 'nullable|string|max:255',
         
            'red_icon.*' => 'nullable|string',
            'red_url.*' => 'nullable|url',
            'red_activa.*' => 'nullable|boolean'
        ]);*/

        // Procesar redes sociales
        $redesSociales = [];
        if ($request->has('red_icon')) {
            foreach ($request->red_icon as $index => $icono) {
                if (!empty($icono)) {
                    $redesSociales[] = [
                        'icono' => $icono,
                        'url' => $request->red_url[$index] ?? '',
                        'activa' => $request->has("red_activa.$index") ? true : false
                    ];
                }
            }
        }

        $data = [
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'correo' => $request->correo,
            'direccion_pagina' => $request->direccion_pagina,
            'telefono_fijo' => $request->telefono_fijo,
            'telefono_movil' => $request->telefono_movil,
            'eslogan_empresa' => $request->eslogan_empresa,
            'redes_sociales' => !empty($redesSociales) ? $redesSociales : null
        ];

        // Actualizar logo si se sube uno nuevo
        if ($request->hasFile('logo_empresa')) {
            // Eliminar el logo anterior si existe
            if ($datosEmpresa->logo_empresa) {
                $oldLogoPath = str_replace('/storage', 'public', $datosEmpresa->logo_empresa);
                Storage::delete($oldLogoPath);
            }

            $path = $request->file('logo_empresa')->store('public/logos_empresa');
            $data['logo_empresa'] = Storage::url($path);
        }

        $datosEmpresa->update($data);

        return redirect()->route('datos-empresa.index')
            ->with('success', 'Datos de empresa actualizados exitosamente.');
    }

    // Eliminar registro
    public function destroy(DatosEmpresa $datosEmpresa)
    {
        // Eliminar el logo si existe
        if ($datosEmpresa->logo_empresa) {
            $oldLogoPath = str_replace('/storage', 'public', $datosEmpresa->logo_empresa);
            Storage::delete($oldLogoPath);
        }

        $datosEmpresa->delete();

        return redirect()->route('datos-empresa.index')
            ->with('success', 'Datos de empresa eliminados exitosamente.');
    }
}