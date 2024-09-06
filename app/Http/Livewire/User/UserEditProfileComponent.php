<?php

namespace App\Http\Livewire\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name ; 
    public $image ; 
    public $email ; 
    public $mobile ; 
    public $line1 ; 
    public $line2 ; 
    public $city ; 
    public $state ; 
    public $country ; 
    public $newimage ; 
    public $password_confirmation ; 
    public $password ; 
    public $current_password ; 
    public function mount(){
        $user = User::find(Auth::user()->id);
        $this->name  = $user->name;
        $this->image  = $user->profile->image;
        $this->email  = $user->email;
        $this->mobile  = $user->profile->mobile;
        $this->line1  = $user->profile->line1;
        $this->line2  = $user->profile->line2;
        $this->city  = $user->profile->city;
        $this->state  = $user->profile->state;
        $this->country  = $user->profile->country;
  
    }
 

    public function updateProfile(){
        $user = User::find(Auth::user()->id);

        if($this->password){
            $this->validate([
                'current_password' =>'required',
                'password' => 'required|min:8|confirmed|different:current_password'
            ]);
        
            if(Hash::check($this->current_password,Auth::user()->password)){
                $user = User::findOrFail(Auth::user()->id);
                $user->password = Hash::make($this->password);
                $user->save();
                session()->flash('password_success','password changed successfly');
            }else{
                session()->flash('password_error','password does not matched');
                return view('livewire.user.user-edit-profile-component')->layout('layouts.base');;
            }

        }
        $user->name  = $this->name;
        $user->save();

        if($this->newimage){
            if($this->image){
                unlink('asset/images/profile/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp . '.' .$this->newimage->extension();
            $path =$this->newimage->storeAs('profile',$imageName,'public');
            if($path){
                $user->profile->image    = $imageName;
            }
        }
        
        $user->profile->mobile   = $this->mobile;
        $user->profile->line1    = $this->line1;
        $user->profile->line2    = $this->line2;
        $user->profile->city     = $this->city;
        $user->profile->state    = $this->state;
        $user->profile->country  = $this->country;
        $user->profile->save();
        session()->flash('message','profile updated successfly');
        return $this->redirect('/user/profile');
    }

    public function updatePassword(){
        $this->validate([
            'current_password' =>'required',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);

        if(Hash::check($this->current_password,Auth::user()->password)){
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('password_success','password changed successfly');
        }else{
            session()->flash('password_error','password does not matched');
        }
    }
    public function render()
    {
        \Log::info("mansoooor");
        $user = User::find(Auth::user()->id);
        return view('livewire.user.user-edit-profile-component')->layout('layouts.base');;
    }
}

