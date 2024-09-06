<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
class ReservationComponent extends Component
{
    public $product;
    public $size ;
    public $reservation_date;

    public function mount($product){
        $this->product = $product;          
    }
    public function defualt(){
        $this->size = '';          
    }
    public function addReservation(){

        if(!Auth::user()){
            session()->flash('warning','you shoud be login first');
            return redirect()->route('login');
        }

        $this->validate([
                    'reservation_date' =>'required|after_or_equal:today',
                    'size' =>'required',
                   
                ]);

        $duplicate_reservation = Reservation::where('reservation_date', $this->reservation_date)->where('attribute_values_id', $this->size)->where('user_id',Auth::user()->id )->get()->first();
        
        if($duplicate_reservation != null){
            session()->flash('error_message','You already have reservation for this dress in the same size and selected date.');
            return redirect()->route('product.details', ['slug' => $this->product->slug]);
        }

        $current_reservation = Reservation::where('reservation_date', $this->reservation_date)->where('attribute_values_id', $this->size)->get()->first();
        if($current_reservation != null){
            session()->flash('error_message','Sorry, this dress is not available in the selected size and date.');
            return redirect()->route('product.details', ['slug' => $this->product->slug]);
        }

        $reservation = new Reservation();
        $reservation->product_id = $this->product->id ;
        $reservation->user_id = Auth::user()->id ;
        $reservation->attribute_values_id =$this->size;
        $reservation->reservation_price = $this->product->regular_price ;
        $reservation->regular_price =  $this->product->regular_price  ;
        $reservation->status =  'confirm';
        $reservation->reservation_date =    $this->reservation_date;
        if($reservation->save()){
            session()->flash('success_message','reversation success');
        }else{
            session()->flash('error_message','some thing wrong');
        }
         
        return redirect()->route('product.details', ['slug' => $this->product->slug]);
    }
    public function render()
    {
        return view('livewire.reservation-component');
    }
}
