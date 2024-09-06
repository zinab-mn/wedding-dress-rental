<form  wire:submit.prevent="addReservation">
	<div>
		@foreach($product->attributeValue->unique('product_attribute_id') as $value )
		<div class="row" style="margin-top: 20px">
			<div class="col-xs-2">
				<p>{{ $value->productAttribute->name}} </p>
			</div>
		<div class="col-xs-10">
		<select  wire:model="size" class="form-control" style="width:150px">
		<option wire:init="defualt" value=""></option>	
		@foreach($value->productAttribute->attributeValue->where('product_id',$product->id) as $pav )
				<option value="{{$pav->id}}">{{$pav->value}}</option>
			@endforeach
		</select>
		@error('size') <p class="text-danger"> {{$message}}</p>@enderror
		</div>
		</div>
		@endforeach
		</div>
		<div class="row" style="margin-top: 20px">
		<div class="col-xs-2"> Date </div>
		<div class="col-xs-10">
		 	<input  wire:model.defer="reservation_date"  type="date" style="width:150px"  class="form-control"> </input>
			  @error('reservation_date') <p class="text-danger"> {{$message}}</p>@enderror
		</div>							
		
		</div>
		<div class="wrap-butons">
			<button style="width:100%" type="submit" class="btn add-to-cart"> Book now </button>
            <div class="wrap-btn">
                <a href="#" class="btn btn-compare">Add Compare</a>
                <a href="#" class="btn btn-wishlist">Add Wishlist</a>
            </div>
		</div>
</form>
