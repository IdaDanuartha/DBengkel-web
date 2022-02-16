@extends('frontend.layouts.main')

@section('main-content')
    <div class="cart-container pt-60">
      <div class="my-light-dark-card p-3 shadow-lg">
        <h1 class="uppercase font-medium ml-4 my-2 text-xl tracking-wider">My Orders</h1>
        @if($orders->count() > 0)
            <div class="container overflow-x-auto">
                <table class="min-w-full my-light-dark-text border-1 border-gray-300">
                    <thead class="bg-gray-800 text-white">
                      <tr>
                        <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                          Order Date
                        </th>
                        <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                          Order Code
                        </th>
                        <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                          Total Price
                        </th>
                        <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                          Orders Status
                        </th>
                        <th scope="col" class="text-sm font-medium px-5 py-3 text-center">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        <tr>
                            <td class="px-5 py-3 whitespace-nowrap text-sm">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="text-sm font-light px-5 py-3 whitespace-nowrap">
                            {{ $order->order_code }}
                            </td>
                            <td class="text-sm font-light px-5 py-3 whitespace-nowrap">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>
                            <td class="text-sm font-medium px-5 py-3 whitespace-nowrap">
                            @if($order->status == 0)
                              Waiting For Confirmation
                            @elseif($order->status == 1)
                              Order Proccessed
                            @elseif($order->status == 2)
                              Order Delivered
                            @elseif($order->status == 3)
                              Order Arrived
                            @else
                              Order Completed
                            @endif
                            </td>
                            <td class="text-sm px-5 py-3 text-center">
                                <a href="/order-details/{{ $order->id }}" class="text-white rounded py-2 px-3 btn-effect btn-details"> Details</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        @else
        <h1 class="mt-3 text-xl tracking-wider">You haven't placed any orders</h1>
        @endif
      </div>
    </div>
@endsection