@extends('dashboard.layouts.main')

@section('content') 

    <div class="flex flex-col" style="margin: 50px 0;">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="overflow-x-auto ml-5">
              <table class="min-w-full my-light-dark-text">
                <thead class="bg-gray-800 text-white">
                  <tr>
                  @if(auth()->user()->role_as == '2')
                    <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                        Action
                    </th>
                  @endif
                    <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                      #
                    </th>
                    <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                      Name
                    </th>
                    <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                      Email
                    </th>
                    <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                      Role
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users->skip(1) as $user)
                      <tr class="border-b">
                        @if(auth()->user()->role_as == '2')
                        <td class="text-xs px-6">
                            <a href="/dashboard/users-registered/details/{{ $user->id }}" class="btn-effect btn-details py-2 px-4 rounded text-xs"> Details</a>
                        </td>
                        @endif
                        <td class="text-sm font-light px-5 whitespace-nowrap">
                          {{ $loop->iteration + $users->firstItem() - 1 }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            {{ $user->first_name . ' ' . $user->last_name }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            {{ $user->email }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                          @if ($user->role_as == 0)
                             <span class="badge text-white bg-blue-500">Customer</span>
                          @elseif($user->role_as == 1)
                             <span class="badge text-white bg-red-500">Admin</span>
                          @elseif($user->role_as == 2)
                              <span class="badge text-white" style="background: linear-gradient(to right, #9108bf, #3700ff);"">Super Admin</span>
                          @else
                              No Role                              
                          @endif
                        </td>
              
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="relative left-10 top-10">
              {{ $users->links() }}
            </div>
          </div>
        </div>
      </div>
@endsection

