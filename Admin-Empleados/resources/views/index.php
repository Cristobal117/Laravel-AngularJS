<!doctype html>
<html lang="en" ng-app="empleadoRecords">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,
            shrink-to-fit=no">
        <link rel="stylesheet" href="<?= asset('bootstrap/css/bootstrap.min.css') ?>">

        <title>Laravel AngularJS</title>
    </head>
    <body>
        <div class="container" ng-controller="empleadosController">
            <header>
                <h2>Empleados</h2>
            </header>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th><button id="btn-add" class="btn btn-primary
                                    btn-xs"
                                    ng-click="toggle('add', 0)">Agregar nuevo empleado</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="empleado in empleados">
                            <td>{{ empleado.id }}</td>
                            <td>{{ empleado.nombre }}</td>
                            <td>{{ empleado.email }}</td>
                            <td>{{ empleado.telefono }}</td>
                            <td>{{ empleado.direccion }}</td>
                            <td>
                                <button class="btn btn-default btn-xs
                                    btn-detail"
                                    ng-click="toggle('edit', empleado.id)">Editar</button>
                                <button class="btn btn-danger btn-xs btn-delete"
                                    ng-click="confirmDelete(empleado.id)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{form_title}}</h5>
                            <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="frmEmpleados" class="form-horizontal"
                                novalidate="">

                                <div class="form-group error">
                                  
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control
                                            has-error" id="nombre" name="nombre"
                                            placeholder="Nombre"
                                            value="{{nombre}}"
                                            ng-model="empleado.nombre"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmEmpleados.nombre.$invalid
                                            && frmEmpleados.nombre.$touched">El campo de nombre es obligatorio</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control"
                                            id="email" name="email"
                                            placeholder="Email"
                                            value="{{email}}"
                                            ng-model="empleado.email"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmEmpleados.email.$invalid
                                            && frmEmpleados.email.$touched">Se requiere un campo de correo electrónico válido</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"
                                            id="telefono"
                                            name="telefono"
                                            placeholder="Telefono"
                                            value="{{telefono}}"
                                            ng-model="empleado.telefono"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmEmpleados.telefono.$invalid
                                            &&
                                            frmEmpleados.telefono.$touched">El campo de telefono de contacto es obligatorio</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                   
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"
                                            id="direccion" name="direccion"
                                            placeholder="Direccion"
                                            value="{{direccion}}"
                                            ng-model="empleado.direccion"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmEmpleados.direccion.$invalid
                                            && frmEmpleados.direccion.$touched">El campo de direccion es obligatorio</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary"
                                id="btn-save" ng-click="save(modalstate, id)"
                                ng-disabled="frmEmpleados.$invalid">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
        <script src="<?= asset('jquery/jquery-3.1.1.min.js') ?>"></script>
        <script src="<?= asset('bootstrap/js/bootstrap.min.js') ?>"></script>

        <script src="<?= asset('js/popper.min.js') ?>"></script>

     
        <script src="<?= asset('angular16/angular.min.js') ?>"></script>
        <script src="<?= asset('angular16/angular-animate.min.js') ?>"></script>
        <script src="<?= asset('angular16/angular-route.min.js') ?>"></script>></script>
        
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/empleados.js') ?>"></script>
    </body>
</html>