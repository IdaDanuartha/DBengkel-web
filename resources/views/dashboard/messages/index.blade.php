@extends('dashboard.layouts.main')

@section('content') 

    <div class="flex flex-col" style="margin: 50px 0;">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="overflow-x-auto ml-5">
              <table class="min-w-full my-light-dark-text">
                <thead class="bg-gray-800 text-white">
                  <tr>
                    <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                        Message
                    </th>
                    <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                      #
                    </th>
                    <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                      Name
                    </th>
                    <th scope="col" class="text-sm font-medium px-5 py-3 text-left">
                      Email
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($messages as $message)
                      <tr class="border-b">
                        <td class="text-xs px-6">
                            <button type="button" class="btn-effect btn-details py-2 px-4 rounded text-xs btn-show-message" data-bs-toggle="modal" data-bs-target="#show-modal" onclick="btnShow('{{ $message->message }}')"> Show</button>
                        </td>
                        <td class="text-sm font-light px-5 whitespace-nowrap">
                          {{ $loop->iteration + $messages->firstItem() - 1 }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            {{ $message->first_name . ' ' . $message->last_name }}
                        </td>
                        <td class="text-sm font-light p-4 whitespace-nowrap">
                            {{ $message->email }}
                        </td>
              
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="relative left-10 top-10">
              {{ $messages->links() }}
            </div>
          </div>
        </div>
      </div>

      {{-- Modal show message --}}
      <div class="modal fade" id="show-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header flex justify-center">
              <h5 class="modal-title font-medium text-xl">Message</h5>
            </div>
                <div class="modal-body modal-message-body p-0">
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="text-md btn-effect btn-gray font-medium py-2 px-4 rounded" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
          </div>
        </div>
      </div>

@endsection

@section('script')
    <script>
        function btnShow(msg) {
            let message = `<textarea class="w-full h-full py-2 px-3 message-textarea" rows="6" disabled>${msg}</textarea>`;

            $('.modal-message-body').html(message);
        }
        
    </script>
@endsection

