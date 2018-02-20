@extends('home')

@section('content_catalogo')

    <div class="panel-heading">

        <span id="titulo_catalogo">Catálogos </span>
        @if ( $id != 1)
            <a href="{{ route('catalogos/', array('id' => $id,'idItem' => 0,'action' => 0)) }}" class="btn btn-default btn-xs pull-right" title="Agregar nuevo registro">
                <i class="fa fa-plus-circle fa-lg green" aria-hidden="true"></i>
            </a>
        @endif
    </div>

    <div class="panel-body">
        @switch($id)

            @case(0)
            @if(Auth::user()->hasRole('user'))
                <table class="table table-responsive" >
                    <thead>
                    <tr>
                        <th class="active">ID</th>
                        <th class="success">EDITORIAL</th>
                        <th class="warning">REPRESENTANTE</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="active">{{ $item->id }}</td>
                            <td class="success">{{ $item->editorial }}</td>
                            <td class="warning">{{ $item->representante }}</td>
                            <td>

                                    <a href="#" class="btn btn-default btn-xs margen-izquierdo-1em pull-right btnAction2" id ="editorial-{{$item->id.'-'.$user->id.'-'.$id}}-0-/destroy_editorial/" >
                                        <i class="fa fa-trash fa-lg red" ></i>
                                    </a>

                                <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-default btn-xs pull-right" >
                                    <i class="fas fa-pencil-alt blue"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            @endif
            @break;

{{--

            @case(2)

            <table class="table table-responsive" >
                <thead>
                <tr>
                    <th class="active">ID</th>
                    <th class="success">TASA</th>
                    <th class="warning">PORCENTAJE</th>
                    <th class="danger"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td class="active">{{ $item->id }}</td>
                        <td class="success">{{ $item->tasa }}</td>
                        <td class="warning">{{ $item->porcentaje }}</td>
                        <td class="danger">
                            @can('todos')
                                <a href="#" class="btn btn-default btn-xs margen-izquierdo-1em pull-right btnAction2" role="button" id ="tasa-{{$item->id.'-'.$user->id.'-'.$id}}-2-/destroy_tasa/" >
                                    <i class="fa fa-trash fa-lg red" aria-hidden="true"></i>
                                </a>
                            @endcan
                            <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-default btn-xs pull-right" role="button">
                                <i class="fa fa-pencil fa-lg blue" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            @break;
            @case(3)

            <table class="table table-bordered" >
                <thead>
                <tr>
                    <th class="active">ID</th>
                    <th class="success">LUGAR</th>
                    <th class="warning">DOMICILIO</th>
                    <th class="danger">LOCALIDAD</th>
                    <th class="active"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td class="active">{{ $item->id }}</td>
                        <td class="success"><b>{{ $item->lugar }}</b></td>
                        <td class="warning">{{ $item->colonia }}, {{ $item->calle }}</td>
                        <td class="danger">{{ $item->localidad }}, {{ $item->municipio }}, {{ $item->estado }}</td>
                        <td class="active">
                            @can('todos')
                                <a href="#" class="btn btn-default btn-xs margen-izquierdo-1em pull-right btnAction2" role="button" id ="lugar-{{$item->id.'-'.$user->id.'-'.$id}}-2-/destroy_lugar/" >
                                    <i class="fa fa-trash fa-lg red" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-default btn-xs pull-right" role="button">
                                    <i class="fa fa-pencil fa-lg blue" aria-hidden="true"></i>
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            @break;

            @case(4)

            <table class="table table-bordered" >
                <thead>
                <tr>
                    <th class="active">ID</th>
                    <th class="success">ROL</th>
                    <th class="warning">GUARD NAME</th>
                    <th class="danger">DESCRIPCIÓN</th>
                    <th class="active"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td class="active">{{ $item->id }}</td>
                        <td class="success">{{ $item->name }}</td>
                        <td class="warning">{{ $item->guard_name }}</td>
                        <td class="danger">{{ $item->description }}</td>
                        <td class="active">
                            @can('todos')
                                <a href="#" class="btn btn-default btn-xs margen-izquierdo-1em pull-right btnAction2" role="button" id ="lugar-{{$item->id.'-'.$user->id.'-'.$id}}-2-/destroy_role/" >
                                    <i class="fa fa-trash fa-lg red" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('catalogos/', array('id' => $id,'idItem' => $item->id,'action' => 1)) }}" class="btn btn-default btn-xs pull-right" role="button">
                                    <i class="fa fa-pencil fa-lg blue" aria-hidden="true"></i>
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            @break;

            @case(5)

            @if(Auth::user()->hasRole('admin'))
                <table class="table table-bordered" >
                    <thead>
                    <tr>
                        <th class="active">ID</th>
                        <th class="success">PERMISO</th>
                        <th class="warning">GUARD_NAME</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="active">{{ $item->id }}</td>
                            <td class="success">{{ $item->name }}</td>
                            <td class="warning">{{ $item->guard_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @break;

            @case(6)

            @if(Auth::user()->hasRole('admin'))
                <table class="table table-bordered" >
                    <thead>
                    <tr>
                        <th class="active">ID ROLE</th>
                        <th class="success">ROLE</th>
                        <th class="warning">ID PERMISO</th>
                        <th class="danger">PERMISO</th>
                        <th class="active">GUARD_NAME</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="active">{{ $item->role_id }}</td>
                            <td class="success">{{ $item->role }}</td>
                            <td class="warning">{{ $item->permission_id }}</td>
                            <td class="danger">{{ $item->permission }}</td>
                            <td class="active">{{ $item->guard_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            @break;

            @case(7)
            @if(Auth::user()->hasRole('admin'))

                <table class="table table-bordered" >
                    <thead>
                    <tr>
                        <th class="active">ID</th>
                        <th class="success">USUARIO</th>
                        <th class="warning">EMAIL</th>
                        <th class="danger" colspan="2">ROLE</th>
                        <th class="active" colspan="2">PERMISO</th>
                        <th class="success">GN PERMISO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="active">{{ $item->id }}</td>
                            <td class="success">{{ $item->name }}</td>
                            <td class="warning">{{ $item->email }}</td>
                            <td class="danger" colspan="2">{{ $item->role }}</td>
                            <td class="active" colspan="2">{{ $item->permission }}</td>
                            <td class="success"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @endif
            @break;
--}}

        @endswitch


    </div>

@endsection

