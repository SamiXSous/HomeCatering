@extends('layouts.app')

@section('content')
{{-- {{var_dump($user)}} --}}
<div class="container editCatering">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form autocomplete="off" method="POST"
                        action="{{ route('updateCatering', ['id' => $catering->id]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{$catering->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{$catering->description}}" required>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" accept="image/x-png,image/gif,image/jpeg"
                                    class="form-control @error('image') is-invalid @enderror" name="image">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Active') }}</label>

                        <div class="col-md-6">
                            @if ($catering->active)
                            <input id="active" name="active" type="checkbox" checked>
                            @else
                            <input id="active" name="active" type="checkbox">
                            @endif
                        </div>
                </div> --}}

                <div class="custom-control row custom-switch">
                    {{-- @dump($menu) --}}
                    @if ($catering->active)

                    <input type="checkbox" class="custom-control-input" id="activeCatering" name="activeCatering"
                        checked onchange="{{ route('activeOrInactiveCatering', ['id' => $catering->id]) }}">
                    <label class="custom-control-label col-md-4 col-form-label text-md-right" for="activeCatering"
                        id="activeCateringLabel">Active</label>


                    @else
                    <input type="checkbox" class="custom-control-input" id="activeCatering" name="activeCatering"
                        onchange="console.log('Test')">
                    <label class="custom-control-label col-md-4 col-form-label text-md-right" for="activeCatering"
                        id="activeCateringLabel">Inactive</label>
                    @endif


                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


@push('scripts')
<script src="{{ asset('js/editCatering.js') }}" defer></script>
{{-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> --}}
@endpush