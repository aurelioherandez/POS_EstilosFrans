<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdateProveedoreRequest;
use App\Models\Documento;
use App\Models\Persona;
use App\Models\Proveedore;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class proveedoreController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-proveedore|crear-proveedore|editar-proveedore|eliminar-proveedore', ['only' => ['index']]);
        $this->middleware('permission:crear-proveedore', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-proveedore', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-proveedore', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedore::with('persona.documento')->latest()->get();
        return view('proveedore.index', ['proveedores' => $proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $documentos = Documento::all();
        return view('proveedore.create',compact('documentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'razon_social' => 'required|max:80',
            'direccion' => 'required|max:80',
            'tipo_persona' => 'required|string',
            'documento_id' => 'required|integer',
            'numero_documento' => 'required|max:20|unique:personas,numero_documento',
            'nit' => 'required|max:10|unique:personas,nit'
        ]);

        try {
            DB::beginTransaction();
            $persona = Persona::create($request->all());
            $persona->proveedore()->create([
                'persona_id' => $persona->id
            ]);
            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }

        return redirect()->route('proveedores.index')->with('success', 'Proveedor registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedore $proveedore)
    {
        $proveedore->load('persona.documento');
        $documentos = Documento::all();
        return view('proveedore.edit',compact('proveedore','documentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedore $proveedore)
    {
        $request->validate([
            'razon_social' => 'required|max:80',
            'direccion' => 'required|max:80',
            'documento_id' => 'required|integer|exists:documentos,id',
            'numero_documento' => 'required|max:20|unique:personas,numero_documento,' . $proveedore->persona->id,
            'nit' => 'required|max:10|unique:personas,nit,' . $proveedore->persona->id
        ]);

        try {
            DB::beginTransaction();

            Persona::where('id', $proveedore->persona->id)
                ->update($request->all());

            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }

        return redirect()->route('proveedores.index')->with('success', 'Proveedor editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = '';
        $persona = Persona::find($id);
        if ($persona->estado == 1) {
            Persona::where('id', $persona->id)
                ->update([
                    'estado' => 0
                ]);
            $message = 'Proveedor eliminado';
        } else {
            Persona::where('id', $persona->id)
                ->update([
                    'estado' => 1
                ]);
            $message = 'Proveedor restaurado';
        }

        return redirect()->route('proveedores.index')->with('success', $message);
    }
}
