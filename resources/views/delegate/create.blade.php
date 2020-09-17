@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

            <form action="{{ route('delegate.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card card-purple card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.fullname')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="delegate[fullname]"
                                            value="{{old('delegate.fullname')}}"
                                            class="form-control  @error('delegate.fullname') is-invalid @enderror"
                                            id="fullname">
                                        @error('delegate.fullname')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.qualification')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="delegate[qualification]"
                                            value="{{old('delegate.qualification')}}"
                                            class="form-control @error('delegate.qualification') is-invalid @enderror"
                                            id="qualification" placeholder="@lang('site.qualification_placeholder')">
                                        @error('delegate.qualification')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.national_id')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="delegate[national_id]"
                                            value="{{old('delegate.national_id')}}"
                                            class="form-control  @error('delegate.national_id') is-invalid @enderror"
                                             placeholder="@lang('site.national_id_placeholder')"
                                            data-inputmask="'mask': ['99999999999999']" data-mask="" im-insert="true">
                                        @error('delegate.national_id')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.social_status')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <select name="delegate[social_status]" class="custom-select">
                                            <option value="single">@lang('site.social_status_single')</option>
                                            <option value="married">@lang('site.social_status_married')</option>
                                            <option value="divorce">@lang('site.social_status_divorce')</option>
                                            <option value="widower">@lang('site.social_status_widower')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.phone')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="delegate[phone]" value="{{old('delegate.phone')}}"
                                            class="form-control  @error('delegate.phone') is-invalid @enderror"
                                            data-inputmask="'mask': ['099999999[9][9]']" data-mask="" im-insert="true">
                                        @error('delegate.phone')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.other_phone')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="delegate[other_phone]"
                                            value="{{old('delegate.other_phone')}}"
                                            class="form-control @error('delegate.other_phone') is-invalid @enderror"
                                            data-inputmask="'mask': ['099999999[9][9]']" data-mask="" im-insert="true">
                                        @error('delegate.other_phone')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.governorate')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <select
                                            class="custom-select @error('delegate.governorate_id') is-invalid @enderror"
                                            name="delegate[governorate_id]" id="governorate_id">
                                            @isset($governorates)
                                            @foreach($governorates as $governorate)
                                            <option value="{{ $governorate->id }}">{{ $governorate->name }}
                                            </option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        @error('delegate.governorate_id')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.city')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <select class="custom-select @error('delegate.city_id') is-invalid @enderror" name="delegate[city_id]" id="city_id">
                                            @isset($cities)
                                            @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        @error('delegate.city_id')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.address')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="delegate[address]" value="{{old('delegate.address')}}"
                                            class="form-control  @error('delegate.address') is-invalid @enderror"
                                            id="address" placeholder="@lang('site.address_placeholder')">
                                        @error('delegate.address')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.driveType')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="delegateDrive[type]">
                                            <option value="motocycle">@lang('site.driveType_motocycle')</option>
                                            <option value="car">@lang('site.driveType_car')</option>
                                            <option value="trocycle">@lang('site.driveType_trocycle')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- start delegateDrive information ########################################################### -->
                        <div class="row">

                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.driveColor')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="delegateDrive[color]"
                                            value="{{old('delegateDrive.color')}}"
                                            class="form-control  @error('delegateDrive.color') is-invalid @enderror"
                                            placeholder="@lang('site.driveColor_placeholder')">
                                        @error('delegateDrive.color')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.drivePlate_number')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="delegateDrive[plate_number]"
                                            value="{{old('delegateDrive.plate_number')}}"
                                            class="form-control  @error('delegateDrive.plate_number') is-invalid @enderror"
                                            placeholder="@lang('site.driveplate_number_placeholder')">
                                        @error('delegateDrive.plate_number')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!-- end of row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.image')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="input-group @error('delegate.image') is-invalid @enderror">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image"
                                                    onchange="loadFile(event)">
                                                <label class="custom-file-label" for="image">إختار صورة</label>
                                            </div>
                                        </div>
                                        @error('delegate.image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <span class="text-gray-dark font-weight-normal">
                                            @lang('site.national_image')
                                        </span>
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="input-group @error('delegate.national_image') is-invalid @enderror">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input"
                                                    name="national_image" onchange="loadFile(event)">
                                                <label class="custom-file-label" for="national_image">إختار صورة</label>
                                            </div>
                                        </div>
                                        @error('delegate.national_image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!-- end of row-->
                        <!-- start delegateDrive information ########################################################### -->
                    </div><!-- end of card-body-->


                    <div class="card-footer">
                        <a href="{{ route('order.create' , ['page' => 2]) }}"
                            class="btn btn-outline-secondary">@lang('site.back')</a>
                        <button type="submit" class="btn btn-success">@lang('site.add')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection