<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="panel panel-default">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert" >{{Session::get('message')}}</div>
            @endif
            <div class="panel-heading">Profile</div>
            <div class="panel-body">
                <div class="col-md-4">
                    @if($user->profile->image)
                        <img src="{{asset('assets/images/profile')}}/{{$user->profile->image}}" width="100%" />
                    @else
                        <img src="{{ asset('assets/images/profile/default.jpg')}}" width="100%" />
                    @endif
                </div>
                <div class="col-md-8">
                    <p><b>Name: </b>{{ $user->name }}</p>
                    <p><b>Email: </b>{{ $user->email }}</p>
                    <p><b>Phone: </b>{{ $user->profile->mobile }}</p>
                    <p><b>Line1: </b>{{ $user->profile->Line1 }}</p>
                    <p><b>Line2: </b>{{ $user->profile->Line2 }}</p>
                    <p><b>city: </b>{{ $user->profile->city }}</p>
                    <p><b>state: </b>{{ $user->profile->state }}</p>
                    <p><b>country: </b>{{ $user->profile->country }}</p>
                    <a href="{{route('user.editprofile')}}" class="btn btn-info pull-right"> Update Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
