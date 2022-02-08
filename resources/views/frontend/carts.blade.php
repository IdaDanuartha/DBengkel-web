@extends('frontend.layouts.main')

@section('main-content')
    <div class="cart-container">
    @if($cartItems->count() > 0)
       <table class="table-cart overflow-x-auto">
           <tr class="my-light-dark-card my-light-dark-text">
               <th>Product Details</th>
               <th class="text-center">Quantity</th>
               <th class="text-center">Subtotal</th>
           </tr>
           @php
               $total = 0;
           @endphp
           @foreach ($cartItems as $item)               
           <tr class="tr-table product_data">
               <td>
                   <div class="cart-product">
                        <img src="/assets/uploads/products/{{ $item->products->main_image }}" class="rounded me-3" width="70px" height="70px" alt="">
                        {{-- <img src="{{ $item->products->main_image }}" class="rounded me-3" width="70px" height="70px" alt=""> --}}
                        <div class="cart-details">
                            <h5 class="mb-1">{{ $item->products->name }}</h5>
                            @if($item->products->disc_price)
                                <span>Rp {{ number_format($item->products->disc_price, 0, ',', '.') }}</span>
                                <span class="relative left-1 text-xs text-gray-500"><s>Rp. {{ number_format($item->products->ori_price, 0, ',', '.') }}</s></span>
                            @else
                                <span>Rp {{ number_format($item->products->ori_price, 0, ',', '.') }}</span>
                            @endif  
                            <button class="mt-2 block delete-cart-btn text-xs text-red-400"><i class="bi bi-trash"></i> Remove</button>
                        </div>
                   </div>
               </td>
               <td class="text-center">
                @if($item->products->quantity >= $item->product_qty)
                <input type="hidden" value="{{ $item->product_id }}" class="product_id" name="product_id">
                <input type="hidden" value="{{ $item->products->quantity }}" class="product_max_qty">

                <button class="minusBtn changeQuantity my-light-dark-text text-2xl px-2.5 duration-400">-</button>
                <input class="product_quantity text-md text-center my-light-dark-card border-1 border-slate-400" id="quantity" type="text" min="1" value="{{ $item->product_qty }}" name="product_qty" disabled>
                <button class="plusBtn changeQuantity my-light-dark-text text-2xl px-2.5 duration-400">+</button>

                @php
                    if($item->products->disc_price) :
                        $total += $item->products->disc_price * $item->product_qty;
                    else :
                        $total += $item->products->ori_price * $item->product_qty;
                    endif;
                @endphp
                
                @else
                <p class="text-red-400 font-semibold">Out of Stock</p>
                @endif
                </td>

               <td class="text-center">Rp
                @if($item->products->disc_price)
                    {{ number_format($item->products->disc_price * $item->product_qty, 0, ',', '.') }}
                @else
                    {{ number_format($item->products->ori_price * $item->product_qty, 0, ',', '.') }}
                @endif
               </td>
           </tr>
           @endforeach
       </table>
       
        <div class="flex justify-between my-light-dark-card p-3">
            <a href="/checkout" class="text-white btn-effect btn-details text-sm rounded py-2 px-3">Proceed to Checkout</a>
            <span class="items-center font-medium">Sub Total : Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>

        @else
        <div>
            <img src="/assets/img/empty_cart.svg" width="500px" alt="Empty Cart" class="mx-auto" style="filter: blur(2px);">
            <div class="relative -top-48 left-10 text-center text-white">
                <h1 class="text-5xl mb-4 font-bold uppercase cart-empty-text ">Your cart is empty</h1>
                {{-- <a class="explore-cart-text text-2xl bg-red-500 font-medium rounded-full py-1 px-3" href="/all-products">Continue Shopping<i class="bi bi-arrow-right ml-1"></i></a> --}}
                <a href="/all-products" id="cart-button">
                    <span class="shadow"></span>
                    <span class="edge"></span>
                    <span class="front text"> Continue Shopping <i class="bi bi-arrow-right ml-1"></i>
                    </span>
                </a>
            </div>
        </div>
            
       @endif
    </div>
@endsection