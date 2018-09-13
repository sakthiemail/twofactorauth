@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enter Mobile number to Authenticate</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ url('/2fa')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('2fa') ? ' has-error' : '' }}">
                            <label for="2fa" class="col-md-4 control-label">OTP Received in Phone or Email</label>

                            <div class="col-md-6">
                                <input id="2fa" type="2fa" class="form-control" name="2fa" value="{{ old('2fa') }}" required>

                                @if ($errors->has('2fa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('2fa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   verify
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
