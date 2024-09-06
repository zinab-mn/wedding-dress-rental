<?php

namespace App\Http\Livewire\User;
use App\Models\Reservation;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class UserDashboardComponent extends Component
{
    public function render()
    {
        $reservations = Reservation::orderBy('created_at','DESC')->where('user_id',Auth::user()->id)->get()->take(20);
        $totalCost = Reservation::where('user_id',Auth::user()->id)->where('status','!=','canceld')->sum('reservation_price');
        $totalReservations = Reservation::where('user_id',Auth::user()->id)->where('status','!=','canceld')->count();
        $totalCanceldReservations = Reservation::where('user_id',Auth::user()->id)->where('status','=','canceld')->count();
        $CanceldCostReservations = Reservation::where('user_id',Auth::user()->id)->where('status','=','canceld')->sum('reservation_price');
        $data = [
                'reservations' => $reservations ,
                'totalCost' =>   $totalCost ,
                'totalReservations' =>  $totalReservations,
                'totalCanceldReservations' =>  $totalCanceldReservations ,
                'CanceldCostReservations' =>  $CanceldCostReservations ,
             ];
        return view('livewire.user.user-dashboard-component',$data )->layout('layouts.base');
    }
}
