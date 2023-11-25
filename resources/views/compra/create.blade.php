@extends('adminlte::page')

@section('title', 'Compras')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="row pt-4">
            <div class="col">
                <div class="card">
                    <div class="row container">
                        <div class="">
                            <a href="{{ route('compras.index') }}" class="font-bold pl-3 text-red-500">
                                volver
                            </a>
                        </div>
                        <div class="mx-auto text-amber-500 text-center font-bold text-3xl">
                            NUEVA COMPRA
                        </div>
                    </div>
                    <div class="cardbody">
                        <form action="{{ route('compras.store') }}" method="post">
                            @csrf

                            <div class="container-lg mt-4">
                                <div class="row gy-4">
                                    <!------Compra producto---->
                                    <div class="col-xl-8">
                                        <div class="text-white bg-warning p-1 text-center">
                                            Detalles de la compra
                                        </div>
                                        <div class="p-3 border border-3 border-warning">
                                            <div class="row">
                                                <!-----Producto---->
                                                <div class="col-12 mb-4">
                                                    <select name="producto_id" id="producto_id" class="form-control"
                                                        title="Busque un producto aquí">
                                                        @foreach ($productos as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->codigo . ' ' . $item->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-----Cantidad---->
                                                <div class="col-sm-4 mb-2">
                                                    <label for="cantidad" class="form-label">Cantidad:</label>
                                                    <input type="number" name="cantidad" id="cantidad"
                                                        class="form-control" min="0">
                                                </div>

                                                <!-----Precio de compra---->
                                                <div class="col-sm-4 mb-2">
                                                    <label for="precio_compra" class="form-label">Precio de compra:</label>
                                                    <input type="number" name="precio_compra" id="precio_compra"
                                                        class="form-control" step="0.1" min="0">
                                                </div>

                                                <!-----Precio de venta---->
                                                <div class="col-sm-4 mb-2">
                                                    <label for="precio_venta" class="form-label">Precio de venta:</label>
                                                    <input type="number" name="precio_venta" id="precio_venta"
                                                        class="form-control" step="0.1" min="0">
                                                </div>

                                                <!-----botón para agregar--->
                                                <div class="col-12 mb-4 mt-2 text-end">
                                                    <button id="btn_agregar"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-2 rounded-md text-white font-bold"
                                                        type="button">Agregar</button>
                                                </div>

                                                <!-----Tabla para el detalle de la compra--->
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table id="tabla_detalle" class="table table-hover">
                                                            <thead class="bg-black">
                                                                <tr>
                                                                    <th class="text-white">#</th>
                                                                    <th class="text-white">Producto</th>
                                                                    <th class="text-white">Cantidad</th>
                                                                    <th class="text-white">Precio compra</th>
                                                                    <th class="text-white">Precio venta</th>
                                                                    <th class="text-white">Subtotal</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th></th>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th colspan="4">Sumas</th>
                                                                    <th colspan="2"><span id="sumas">0</span></th>
                                                                </tr>
                                                                <tr>
                                                                    <th></th>
                                                                    <th colspan="4">IVA %</th>
                                                                    <th colspan="2"><span id="iva">0</span></th>
                                                                </tr>
                                                                <tr>
                                                                    <th></th>
                                                                    <th colspan="4">Total</th>
                                                                    <th colspan="2"> <input type="hidden" name="total"
                                                                            value="0" id="inputTotal"> <span
                                                                            id="total">0</span></th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!--Boton para cancelar compra-->
                                                <div class="col-12 mt-2">
                                                    <button id="cancelar" type="button"
                                                        class="bg-red-500 hover:bg-red-600 px-3 py-2 rounded-md text-white font-bold"
                                                        data-toggle="modal" data-target="#exampleModal">
                                                        Cancelar compra
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-----Compra---->
                                    <div class="col-xl-4">
                                        <div class="text-white bg-warning p-1 text-center">
                                            Datos generales
                                        </div>
                                        <div class="p-3 border border-3 border-warning">
                                            <div class="row">
                                                <!--Proveedor-->
                                                <div class="col-12 mb-2">
                                                    <label for="proveedore_id" class="form-label">Proveedor:</label>
                                                    <select name="proveedore_id" id="proveedore_id"
                                                        class="form-control show-tick" data-live-search="true"
                                                        title="Selecciona" data-size='2'>
                                                        @foreach ($proveedores as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->persona->nit . ' ' . $item->persona->razon_social }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('proveedore_id')
                                                        <small class="text-danger">{{ '*' . $message }}</small>
                                                    @enderror
                                                </div>

                                                <!--Tipo de comprobante-->
                                                <div class="col-12 mb-2">
                                                    <label for="comprobante_id" class="form-label">Comprobante:</label>
                                                    <select name="comprobante_id" id="comprobante_id"
                                                        class="form-control" title="Selecciona">
                                                        @foreach ($comprobantes as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->tipo_comprobante }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('comprobante_id')
                                                        <small class="text-danger">{{ '*' . $message }}</small>
                                                    @enderror
                                                </div>

                                                <!--Numero de comprobante-->
                                                <div class="col-12 mb-2">
                                                    <label for="numero_comprobante" class="form-label">Numero de
                                                        comprobante:</label>
                                                    <input required type="text" name="numero_comprobante"
                                                        id="numero_comprobante" class="form-control">
                                                    @error('numero_comprobante')
                                                        <small class="text-danger">{{ '*' . $message }}</small>
                                                    @enderror
                                                </div>

                                                <!--Impuesto---->
                                                <div class="col-sm-6 mb-2">
                                                    <label for="impuesto" class="form-label">Impuesto(IVA):</label>
                                                    <input readonly type="text" name="impuesto" id="impuesto"
                                                        class="form-control border-warning">
                                                    @error('impuesto')
                                                        <small class="text-danger">{{ '*' . $message }}</small>
                                                    @enderror
                                                </div>

                                                <!--Fecha--->
                                                <div class="col-sm-6 mb-2">
                                                    <label for="fecha" class="form-label">Fecha:</label>
                                                    <input readonly type="date" name="fecha" id="fecha"
                                                        class="form-control border-warning" value="<?php echo date('Y-m-d'); ?>">
                                                    <?php
                                                    
                                                    use Carbon\Carbon;
                                                    
                                                    $fecha_hora = Carbon::now()->toDateTimeString();
                                                    ?>
                                                    <input type="hidden" name="fecha_hora" value="{{ $fecha_hora }}">
                                                </div>

                                                <!--Botones--->
                                                <div class="col-12 mt-4 text-center">
                                                    <button type="submit" class="btn btn-warning"
                                                        id="guardar">Realizar compra</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal para cancelar la compra -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Advertencia</h1>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Seguro que quieres cancelar la compra?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                            <button id="btnCancelarCompra" type="button" class="btn btn-danger"
                                                data-dismiss="modal">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card {
            display: flex;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.36);
        }
    </style>
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#producto_id').change(mostrarValores);

            $('#btn_agregar').click(function() {
                agregarProducto();
            });

            $('#btnCancelarVenta').click(function() {
                cancelarVenta();
            });

            disableButtons();

            $('#impuesto').val(impuesto + '%');
        });

        //Variables
        let cont = 0;
        let subtotal = [];
        let sumas = 0;
        let iva = 0;
        let total = 0;

        //Constantes
        const impuesto = 12;

        function mostrarValores() {
            let dataProducto = document.getElementById('producto_id').value.split('-');
            $('#stock').val(dataProducto[1]);
            $('#precio_venta').val(dataProducto[2]);
        }

        function agregarProducto() {
            //Obtener valores de los campos
            let idProducto = $('#producto_id').val();
            let nameProducto = $('#producto_id option:selected').text();
            let cantidad = $('#cantidad').val();
            let precioCompra = $('#precio_compra').val();
            let precioVenta = $('#precio_venta').val();

            //Validaciones 
            //1.Para que los campos no esten vacíos
            // if (nameProducto != '' && nameProducto != undefined && cantidad != '' && precioCompra != '' && precioVenta !=
            //     '') {

                //2. Para que los valores ingresados sean los correctos
                if (parseInt(cantidad) > 0 && (cantidad % 1 == 0) && parseFloat(precioCompra) > 0 && parseFloat(
                        precioVenta) > 0) {

                    //3. Para que el precio de compra sea menor que el precio de venta
                    if (parseFloat(precioVenta) > parseFloat(precioCompra)) {
                        //Calcular valores
                        subtotal[cont] = round(cantidad * precioCompra);
                        sumas += subtotal[cont];
                        iva = round(sumas / 100 * impuesto);
                        total = round(sumas + iva);

                        //Crear la fila
                        let fila = '<tr id="fila' + cont + '">' +
                            '<th>' + (cont + 1) + '</th>' +
                            '<td><input type="hidden" name="arrayidproducto[]" value="' + idProducto + '">' + nameProducto +
                            '</td>' +
                            '<td><input type="hidden" name="arraycantidad[]" value="' + cantidad + '">' + cantidad +
                            '</td>' +
                            '<td><input type="hidden" name="arraypreciocompra[]" value="' + precioCompra + '">' +
                            precioCompra + '</td>' +
                            '<td><input type="hidden" name="arrayprecioventa[]" value="' + precioVenta + '">' +
                            precioVenta + '</td>' +
                            '<td>' + subtotal[cont] + '</td>' +
                            '<td><button class="btn btn-danger" type="button" onClick="eliminarProducto(' + cont +
                            ')"><i class="fas fa-trash"></i></button></td>' +
                            '</tr>';

                        //Acciones después de añadir la fila
                        $('#tabla_detalle').append(fila);
                        limpiarCampos();
                        cont++;
                        disableButtons();

                        //Mostrar los campos calculados
                        $('#sumas').html(sumas);
                        $('#iva').html(iva);
                        $('#total').html(total);
                        $('#impuesto').val(iva);
                        $('#inputTotal').val(total);
                    } else {
                        showModal('Precio de compra incorrecto');
                    }

                } else {
                    showModal('Valores incorrectos');
                }

            // } else {
            //     showModal('Le faltan campos por llenar');
            // }
        }

        function cancelarCompra() {
            //Eliminar el tbody de la tabla
            $('#tabla_detalle tbody').empty();

            //Añadir una nueva fila a la tabla
            let fila = '<tr>' +
                '<th></th>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '</tr>';
            $('#tabla_detalle').append(fila);

            //Reiniciar valores de las variables
            cont = 0;
            subtotal = [];
            sumas = 0;
            iva = 0;
            total = 0;

            //Mostrar los campos calculados
            $('#sumas').html(sumas);
            $('#iva').html(iva);
            $('#total').html(total);
            $('#impuesto').val(impuesto + '%');
            $('#inputTotal').val(total);

            limpiarCampos();
            disableButtons();
        }

        function eliminarProducto(indice) {
            //Calcular valores
            sumas -= round(subtotal[indice]);
            iva = round(sumas / 100 * impuesto);
            total = round(sumas + iva);

            //Mostrar los campos calculados
            $('#sumas').html(sumas);
            $('#iva').html(iva);
            $('#total').html(total);
            $('#impuesto').val(iva);
            $('#InputTotal').val(total);

            //Eliminar el fila de la tabla
            $('#fila' + indice).remove();

            disableButtons();
        }

        function limpiarCampos() {
            let select = $('#producto_id');
            select.val('');
            $('#cantidad').val('');
            $('#precio_compra').val('');
            $('#precio_venta').val('');
        }

        function round(num, decimales = 2) {
            var signo = (num >= 0 ? 1 : -1);
            num = num * signo;
            if (decimales === 0) //con 0 decimales
                return signo * Math.round(num);
            // round(x * 10 ^ decimales)
            num = num.toString().split('e');
            num = Math.round(+(num[0] + 'e' + (num[1] ? (+num[1] + decimales) : decimales)));
            // x * 10 ^ (-decimales)
            num = num.toString().split('e');
            return signo * (num[0] + 'e' + (num[1] ? (+num[1] - decimales) : -decimales));
        }

        function showModal(message, icon = 'error') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: icon,
                title: message
            })
        }
    </script>
@endpush
