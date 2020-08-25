@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="justify-comtemt-center pt-5">
                                        <a href="{{url('customer-login/google')}}" class="col-md-6">
                                            <button type="button" class="btn btn-danger col-md-12 " ><i class="fab fa-google"></i> Google </button> 
                                        </a>
                                        <a href="{{url('customer-login/facebook')}}" class="col-md-6">
                                            <button type="button" class="btn btn-primary col-md-12"><i class="fab fa-facebook-square"></i> Facebook </button>
                                         </a>
                                         <a href="{{url('customer-login/github')}}" class="col-md-6">
                                            <button type="button" class="btn btn-success col-md-12" ><i class="fab fa-github-square"></i> Github </button> 
                                        </a>
                                </div>
        </div>
    </div>
</div>
@endsection



