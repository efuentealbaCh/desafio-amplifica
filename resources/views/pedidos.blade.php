@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Hacer pedido</h4>
        </div>
        <div class="card-body">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="region">Región</label>
                            <select name="region" id="region" class="form-control select2">
                                <option value="" disabled selected>Seleccione una región</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="comuna">Comuna</label>
                            <select name="comuna" id="comuna" class="form-control select2">
                                <option value="" disabled selected>Seleccione una comuna</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h5>Seleccione un producto</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="producto">Productos disponibles</label>
                                    <select name="producto" id="producto" class="form-control select2">
                                        <option value="" disabled selected>Seleccione un producto</option>
                                        <option value="800000">Computador Gamer</option>
                                        <option value="20000">Mouse Gamer</option>
                                        <option value="150000">Silla Gamer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" id="cantidad" name="cantidad" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="form-group">
                                    <label for="peso">Peso en kg</label>
                                    <input type="number" id="peso" name="peso" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <button class="btn btn-success" id="addButton"><i class="fa fa-plus"></i> Agregar</button>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="table">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Peso</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="carrito">
                                    </tbody>
                                    <tfoot>
                                        <td colspan="3">Total:</td>
                                        <td id='total'></td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <button class="btn btn-primary" id="cotizar-pedido">Cotizar Pedido</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12" id="tarifas-container" style="display:none;">
                    <div class="card card-info">
                        <div class="card-header">
                            <h5>Tarifas de Envío</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Código</th>
                                        <th>Precio</th>
                                        <th>Días de Tránsito</th>
                                    </tr>
                                </thead>
                                <tbody id="tarifas">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/regiones.js') }}"></script>
    <script src="{{ asset('js/pedidos.js') }}"></script>
@endsection
