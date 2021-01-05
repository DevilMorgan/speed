@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{ breadcrumbName() }} </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="FormSubmit" action="{{ route('price.update' , $placePrice->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        {{-- start row  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <x-label title="{{__('site.governorate')}}" />
                                    </div>
                                    <div class="col-sm-8">
                                        <x-input value="{{ $placePrice->governorate->name }}" disabled />
                                    </div>
                                </div>
                            </div>
                            {{-- start col  --}}
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <x-label title="{{__('site.city')}}" />
                                    </div>
                                    <div class="col-sm-8">
                                        <x-input value="{{ $placePrice->city->name }}" disabled />
                                    </div>
                                </div>
                            </div>{{-- end col  --}}
                        </div>{{-- end row  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <x-label title="{{__('site.price_send_weight')}}" />
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="send_weight">
                                            <option value="1">@lang('site.price_send_weight_1k')</option>
                                            <option value="2">@lang('site.price_send_weight_2k')</option>
                                            <option value="3">@lang('site.price_send_weight_3k')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>{{-- end col  --}}
                            <div class="col-md">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <x-label title="{{__('site.price_send_price')}}" />
                                    </div>
                                    <div class="col-sm-8">
                                        <x-input name="send_price" placeholder="{{__('site.price_send_price')}}" />
                                    </div>
                                </div>
                            </div>{{-- end col  --}}
                        </div>{{-- end row  --}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <x-label title="{{__('site.price_weight_addtion')}}" />
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="weight_addtion">
                                            <option value="0.5">@lang('site.price_send_weight_.5k')</option>
                                            <option value="1">@lang('site.price_send_weight_1k')</option>
                                            <option value="2">@lang('site.price_send_weight_2k')</option>
                                            <option value="3">@lang('site.price_send_weight_3k')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>{{-- end col  --}}
                            <div class="col-md">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <x-label title="{{__('site.price_price_addtion')}}" />
                                    </div>
                                    <div class="col-sm-8">
                                        <x-input name="price_addtion"
                                            placeholder="{{__('site.price_price_addtion')}}" />
                                    </div>
                                </div>
                            </div>{{-- end col  --}}
                        </div>{{-- end row  --}}
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.edit')</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12-6">

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</div>
@endsection
@push('scripts')
<script>
    $(function () {
            var data = @json($placePrice);
            $.each(data, function (parentKey, value) {
             $('[name="' + parentKey +'"]').val(value);
            });
        });
</script>
@endpush
