@extends('dashboard.layouts.main')

@section('content') 

    <div class="flex flex-col relative top-10">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="overflow-x-auto ml-5">
              <table class="min-w-full my-light-dark-text">
                <thead class="bg-gray-800 text-white">
                  <tr>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Id
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
                      <tr>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            {{ $user->id }}
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
                            <a href="/dashboard/users-registered/{{ $user->id }}" class="py-1 px-3 rounded text-white bg-blue-500"> Details</a>
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

