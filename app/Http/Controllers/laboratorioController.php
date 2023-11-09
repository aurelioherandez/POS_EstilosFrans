<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeLaboratorioRequest;
use App\Http\Requests\updateLaboratorioRequest;
use App\Models\Caracteristica;
use App\Models\Laboratorio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class laboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tallas = Laboratorio::with("caracteristica")->latest()->get();

        return view("laboratorio.index", ["tallas" => $tallas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("laboratorio.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeLaboratorioRequest $request)
    {
        try {
            DB::beginTransaction();
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->laboratorio()->create([
                'caracteristica_id' => $caracteristica-> id
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('tallas.index')->with('success','Talla Registrado Correctamente');
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
    public function edit(Laboratorio $talla)
    {
        return view('laboratorio.edit', ['talla'=> $talla]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateLaboratorioRequest $request, Laboratorio $talla)
    {
        Caracteristica::where('id', $talla->caracteristica->id)->update($request->validated());

        return redirect()->route('tallas.index')->with('success','Talla Editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = '';
        $talla = Laboratorio::find($id);
        if ($talla->caracteristica->estado == 1) {
            Caracteristica::where('id', $talla->caracteristica->id)
                ->update([
                    'estado' => 0
                ]);
            $message = 'Talla eliminado';
        } else {
            Caracteristica::where('id', $talla->caracteristica->id)
                ->update([
                    'estado' => 1
                ]);
            $message = 'Talla restaurado';
        }

        return redirect()->route('tallas.index')->with('success', $message);
    }
}
