@extends('dashboard.layouts.main')

@section('content') 

<a href="/dashboard/customers-order/order-history" class="btn-effect btn-create py-2 px-4 rounded text-md left-10 top-10"><i class="bi bi-hourglass"></i> Order History</a>
    <div class="flex flex-col my-20">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="overflow-x-auto ml-5">
              <table class="min-w-full my-light-dark-text">
                <thead class="bg-gray-800 text-white">
                  <tr>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      #
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Order date
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Number Tracking
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Total Price
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Order Status
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $loop->iteration + $orders->firstItem() - 1 }}</td>
                        <td class="p-4 whitespace-nowrap text-sm">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                        {{ $order->tracking_no }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            Rp. {{ number_format($order->total_price, 0, ',', '.') }}
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
                          @endif
                        </td>
                        <td class="text-sm p-4">
                            <a href="/dashboard/customers-order/order-details/{{ $order->id }}" class="btn-effect btn-details py-2 px-4 rounded text-xs"> Details</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="relative left-10 top-10">
              {{ $orders->links() }}
            </div>
          </div>
        </div>
      </div>
@endsection

