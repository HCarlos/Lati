@extends('home')

@section('content_form_permisions')
<div class="panel panel-primary" id="frmEdit0">
    <div class="panel-heading">
            <span>{{ ucwords($titulo) }}</span>
    </div>

    <div class="panel-body">

        <div class="row">
            <div class="col-xs-6 col-sm-4">
                {{--<select class="lstAlumnos " name="listEle" id="$listEle" multiple="multiple" style="width:100% !important; height: 95% !important;" >--}}
                {{--</select>--}}
                {{ Form::select('listEle', $listEle, '', ['id' => 'listEle','multiple' => 'multiple']) }}

            </div>
            <div class="col-xs-6 col-sm-4">
            </div>
            <div class="col-xs-6 col-sm-4">
                {{ Form::select('listTarget', $listTarget, '', ['id' => 'listTarget','size' => '1']) }}
                {{ Form::select('lstAsigns', $lstAsigns, '', ['id' => 'lstAsigns','multiple' => 'multiple']) }}
            </div>
        </div>

    </div>
</div>
@endsection

