@extends('home')

@section('content_form_permisions')
<div class="panel panel-primary" id="frmEdit0">
    <div class="panel-heading">
            <span>{{ ucwords($titulo).$iduser }}</span>
    </div>

    <div class="panel-body">

        <div class="row">
            <div class="col-xs-6 col-sm-4">
                {{ Form::select('listEle', $listEle, '', ['id' => 'listEle','multiple' => 'multiple','class'=>'listEle']) }}
            </div>
            <div class="col-xs-6 col-sm-4">
                <a class="btn btn-default btnAsign0" id="{{ 'btnAsign0-'.$id.'-'.$iduser }}" href="#" role="button">Asignar</a><br/>
                <a class="btn btn-default btnUnasign0" id="{{ 'btnUnasign0-'.$id.'-'.$iduser }}" href="#" role="button">Quitar</a>
            </div>
            <div class="col-xs-6 col-sm-4">
                {{ Form::select('listTarget', $listTarget, $iduser, ['id' => 'listTarget-'.$id,'size' => '1', 'class'=>'listTarget']) }}
                {{ Form::select('lstAsigns', $lstAsigns, '', ['id' => 'lstAsigns','multiple' => 'multiple', 'class'=>'lstAsigns']) }}
            </div>
        </div>

    </div>
</div>
@endsection

