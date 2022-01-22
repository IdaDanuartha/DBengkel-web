@extends('dashboard.layouts.main')

@section('content') 

<a href="/dashboard/customers-order/" class="rounded py-2 px-3 ml-5 bg-blue-500 text-white relative top-5"><i class="bi bi-arrow-left"></i> Back</a>
    <div class="flex flex-col relative top-10">
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $loop->iteration }}</td>
                        <td class="p-4 whitespace-nowrap text-sm">{{ $order->created_at }}</td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                        {{ $order->tracking_no }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            Rp. {{ $order->total_price }}
                        </td>
                        <td class="text-sm font-medium p-4 whitespace-nowrap" style="color: rgb(22 163 74);">
                          @if($order->status == 0)
                            Waiting For Confirmation
                          @elseif($order->status == 1)
                            Barang dikemas
                          @elseif($order->status == 2)
                            Sedang diantar
                          @elseif($order->status == 3)
                            Sudah sampai
                          @else
                            Pesanan selesai
                          @endif
                        </td>
                        <td class="text-sm p-4">
                            <a href="/dashboard/customers-order/order-details/{{ $order->id }}" class="py-1 px-3 rounded text-white bg-blue-500"> Details</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection

