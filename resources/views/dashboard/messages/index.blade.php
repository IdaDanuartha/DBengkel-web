@extends('dashboard.layouts.main')

@section('content') 
<div class="container-table rounded-md mx-3 mt-5 mb-5 p-2" style="box-shadow: 10px 10px 35px rgba(0,0,0,0.2)">
    <div class="flex flex-col" style="margin: 20px 0 50px;">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="overflow-x-auto ml-5">
              <table class="min-w-full my-light-dark-text">
                <thead class="my-light-dark-text border-b">
                  <tr>
                    <th scope="col" class="text-sm font-semibold px-5 py-3 text-left">
                        Message
                    </th>
                    <th scope="col" class="text-sm font-semibold px-5 py-3 text-left">
                      No
                    </th>
                    <th scope="col" class="text-sm font-semibold px-5 py-3 text-left">
                      Name
                    </th>
                    <th scope="col" class="text-sm font-semibold px-5 py-3 text-left">
                      Email
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($messages as $message)
                      <tr class="border-b hovered-table">
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
          <div class="modal-content my-light-dark-card my-light-dark-text">
            <div class="modal-header flex justify-center">
              <h5 class="modal-title font-medium text-xl">Message</h5>
            </div>
                <div class="modal-body modal-message-body p-0">
                    {{-- Message content --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="text-md btn-effect btn-gray font-medium py-2 px-4 rounded" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
          </div>
        </div>
      </div>
</div>
@endsection

@section('script')
    <script>
        function btnShow(msg) {
            let message = `<textarea class="my-light-dark-card w-full h-full py-2 px-3 message-textarea" rows="6" disabled>${msg}</textarea>`;

            $('.modal-message-body').html(message);
        }
        
    </script>
@endsection

