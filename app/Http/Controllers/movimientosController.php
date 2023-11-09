<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class movimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventasDelDia = Venta::whereDate('created_at', Carbon::today())->get();
        $comprasDelDia = Compra::whereDate('created_at', Carbon::today())->get();

        // Calcular las sumas antes de combinar las colecciones
        $totalVentas = $ventasDelDia->sum('total');
        $totalCompras = $comprasDelDia->sum('total');

        // Añadir un campo para identificar si es una venta o una compra
        $ventasDelDia->map(function ($venta) {
            $venta['tipo'] = 'venta';
            return $venta;
        });

        $comprasDelDia->map(function ($compra) {
            $compra['tipo'] = 'compra';
            return $compra;
        });

        // Combinar las dos colecciones
        $movimientos = $ventasDelDia->concat($comprasDelDia);

        // Ordenar por fecha de creación
        $movimientos = $movimientos->sortBy('created_at');

        return view('movimiento.index', compact('movimientos', 'totalVentas', 'totalCompras'));
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
    public function store()
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
