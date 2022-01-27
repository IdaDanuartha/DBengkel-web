@extends('frontend.layouts.main')

@section('main-content')
    <div class="cart-container pt-60">
    @if($orders->count() > 0)
        <div class="container overflow-x-auto">
            <h1 class="uppercase font-medium m-2 text-2xl">My Orders</h1>
            <table class="min-w-full my-light-dark-text border-1 border-gray-300">
                <thead class="bg-gray-800 text-white">
                  <tr>
                    <th scope="col" class="text-sm font-medium p-4 text-left">
                      Order Date
                    </th>
                    <th scope="col" class="text-sm font-medium p-4 text-left">
                      Number Tracking
                    </th>
                    <th scope="col" class="text-sm font-medium p-4 text-left">
                      Total Price
                    </th>
                    <th scope="col" class="text-sm font-medium p-4 text-left">
                      Orders Status
                    </th>
                    <th scope="col" class="text-sm font-medium p-4 text-left">
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                    <tr>
                        <td class="p-4 whitespace-nowrap text-sm">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                        {{ $order->tracking_no }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            Rp. {{ $order->total_price }}
                        </td>
                        <td class="text-sm font-medium p-4 whitespace-nowrap">
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
                        <td class="text-sm p-4">
                            <a href="/order-details/{{ $order->id }}" class="py-1 px-3 rounded text-white bg-blue-500"> Details</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        @endif
    </div>
@endsection