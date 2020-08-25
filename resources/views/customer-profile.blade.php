@extends('layouts.app')

@section('content')
<div class="container">
       <div class="row">
          <div class="col-lg-12 mx-auto">
             <div class="row no-gutters">
                <div class="col-md-3">
                   <div class="card account-left">
                      <div class="user-profile-header">
                         <h5 class="mb-1 text-secondary"><strong>Hi </strong> {{Auth::guard('customer')->user()->name}}</h5>
                         <p>{{Auth::guard('customer')->user()->email}}</p>
                      </div>
                      <div class="list-group">
                         
                         <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-lock"></i>  Logout</button>
                         <form id="logout-form" action="{{url('customer-logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form> 
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
  @endsection



