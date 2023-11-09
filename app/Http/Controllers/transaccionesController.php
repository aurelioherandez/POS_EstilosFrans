<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Venta;
use Illuminate\Http\Request;

class transaccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::all();
        $compras = Compra::all();

        // Calcular las sumas
        $totalVentas = $ventas->sum('total');
        $totalCompras = $compras->sum('total');

        // Añadir un campo para identificar si es una venta o una compra
        $ventas->map(function ($venta) {
            $venta['tipo'] = 'venta';
            return $venta;
        });

        $compras->map(function ($compra) {
            $compra['tipo'] = 'compra';
            return $compra;
        });

        // Combinar las dos colecciones
        $movimientos = $ventas->concat($compras);

        // Ordenar por fecha de creación
        $movimientos = $movimientos->sortBy('created_at');

        return view('transaccion.index', compact('movimientos', 'totalVentas', 'totalCompras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
