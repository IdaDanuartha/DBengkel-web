@extends('dashboard.layouts.main')

@section('content') 

    <div class="flex flex-col" style="margin: 50px 0;">
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
                      Name
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Email
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Role
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                      <tr class="border-b">
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            {{ $loop->iteration }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            {{ $user->first_name . ' ' . $user->last_name }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            {{ $user->email }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            {{ $user->role_as == 0 ? 'User':'Admin' }}
                        </td>
                        <td class="text-sm p-4">
                            <a href="/dashboard/users-registered/{{ $user->id }}" class="btn-effect btn-details py-2 px-4 rounded text-xs"> Details</a>
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

