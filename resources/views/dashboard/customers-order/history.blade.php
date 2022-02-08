@extends('dashboard.layouts.main')

@section('content') 

<a href="/dashboard/customers-order/" class="btn-effect btn-create py-2 px-4 rounded text-md left-10 top-10"><i class="bi bi-arrow-left"></i> Back</a>
    <div class="flex flex-col my-20">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="overflow-x-auto ml-5">
              <table class="min-w-full my-light-dark-text">
                <thead class="bg-gray-800 text-white">
                  <tr>
                    <th scope="col" class="text-sm font-medium px-6 py-3 text-center">
                      Action
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-3 text-center">
                      #
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-3 text-center">
                      Order date
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-3 text-center">
                      Number Tracking
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-3 text-center">
                      Total Price
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-3 text-center">
                      Order Status
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                    <tr class="border-b text-center">
                      <td class="text-sm p-4">
                        <a href="/dashboard/customer-orders/order-details/{{ $order->id }}" class="btn-effect btn-details py-2 px-4 rounded text-xs"> Details</a>
                      </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $loop->iteration }}</td>
                        <td class="p-4 whitespace-nowrap text-sm">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                        {{ $order->tracking_no }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </td>
                        @if($order->status == 4)
                          <td class="text-sm font-medium p-4 whitespace-nowrap" style="color: rgb(22 163 74);">
                            Order Completed
                          </td>
                        @elseif($order->status == 5)
                          <td class="text-sm font-medium text-red-500 p-4 whitespace-nowrap">
                            Order Canceled
                          </td>
                        @endif
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

