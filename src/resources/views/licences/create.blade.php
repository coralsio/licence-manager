@extends('layouts.crud.create_edit')



@section('content_header')
    @component('components.content_header')
        @slot('page_title')
            {{ $title_singular }}
        @endslot
        @slot('breadcrumb')
            {{ Breadcrumbs::render('licence_create_edit') }}
        @endslot
    @endcomponent
@endsection

@section('content')
    @parent
    <div class="row">
        <div class="col-md-8">
            @component('components.box')
                {!! CoralsForm::openForm($licence) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! CoralsForm::select('licenceable_id','LicenceManager::attributes.licence.product', [], true, null,
                                               ['class'=>'select2-ajax','data'=>[
                                               'model'=>\Corals\Modules\Ecommerce\Models\Product::class,
                                               'columns'=> json_encode(['name']),
                                               'selected'=>json_encode([]),
                                               'where'=>json_encode([['field'=>'properties','operation'=>'like','value'=>'%"has_licence":"True"%']]),
                                                ],'id'=>'product_id'],'select2') !!}

                        {!! Form::hidden('licenceable_type', \Corals\Modules\Ecommerce\Models\Product::class) !!}

                        {!! CoralsForm::number('expiry_period', 'LicenceManager::attributes.licence.expiry_period', false, 0, [
                            'help_text'=>'LicenceManager::attributes.licence.expiry_period_help','min'=>0]) !!}
                    </div>
                </div>

                {!! CoralsForm::textarea('codes', 'LicenceManager::attributes.licence.codes', true, null,[
                'help_text'=>'LicenceManager::attributes.licence.codes_help']) !!}

                {!! CoralsForm::customFields($licence) !!}

                {!! CoralsForm::formButtons() !!}

                {!! CoralsForm::closeForm($licence) !!}
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
@endsection
