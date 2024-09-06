<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Update Profile</div>
                <div class="panel-body">
                     @if(Session::has('message'))
                     <div class="alert alert-success" role="alert" >{{Session::get('message')}}</div>
                     @endif
                        <form id="updateProfileForm" wire:submit.prevent="updateProfile">
                        <div class="col-md-4">
                             @if($newimage)
                                  <img src="{{$newimage->temporaryUrl()}}" width="100%" />
                             @elseif($image)
                                  <img src="{{asset('assets/images/profile')}}/{{$image}}" width="100%" />
                             @else
                                  <img src="{{ asset('assets/images/profile/default.jpg') }}" width="100%" />
                              @endif
                            <input type="file" class="form-control" wire:model='newimage' />
                        </div>
                        <div class="col-md-8">
                            <p><b>Name: </b><input type="text" class="form-control" wire:model='name' /></p>
                            <p><b>Email: </b>{{ $email }}</p>
                            <p><b>Phone: </b><input type="text" class="form-control" wire:model='mobile'/></p>
                            <p><b>Line1: </b><input type="text" class="form-control" wire:model='line1'/></p>
                            <p><b>Line2: </b><input type="text" class="form-control" wire:model='line2'/></p>
                            <p><b>City: </b><input type="text" class="form-control" wire:model='city' /></p>
                            <p><b>state: </b><input type="text" class="form-control" wire:model='state' /></p>
                            <p><b>Country: </b><input type="text" class="form-control" wire:model='country'/></p>

                            <p><b> Change Password</b></p>
                            <p><span>If you need change password fill data ,To update profile details ,a password change is not necessary </span></p>
                            @if(Session::has('password_success'))
                            <div class="alert alert-success" role="alert" >{{Session::get('password_success')}}</div>
                            @endif
                            @if(Session::has('password_error'))
                            <div class="alert alert-danger" role="alert" >{{Session::get('password_error')}}</div>
                            @endif
                            <p><b>current Password: </b><input  type="password" class="form-control" wire:model='current_password'/></p>
                            @error('current_password') <p class="text-danger"> {{$message}}</p> @enderror
                            <p><b>new Password: </b><input  type="password" class="form-control" wire:model='password'/></p>
                            @error('password') <p class="text-danger"> {{$message}}</p>@enderror
                            <p><b>Confirm Password: </b><input  type="password" class="form-control" wire:model='password_confirmation'/></p>
                            @error('password_confirmation') <p class="text-danger"> {{$message}}</p>@enderror
                         
                            <button type="submit" class="btn btn-info pull-right"> Update </button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
