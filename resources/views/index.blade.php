@extends('master')
@section('content')
    <div class="grid grid-cols-12 h-screen">
        {{-- navigation bar start --}}
            <div class="grid row-span-1 bg-cyan-300 col-span-10 col-start-2 sticky top-0">
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-white ms-7">To Do List</span>
                    <button class="btn bg-cyan-400 border-0 hover:bg-cyan-500 me-7"><i class="fa-solid fa-plus text-white text-2xl"></i></button>
                </div>
            </div>
        {{-- navigation bar end --}}

        {{-- panel 1 start --}}
            <div class="grid col-start-2 col-span-5 bg-slate-300">
                <div class="">
                    <div class="underline text-xl my-4 font-semibold text-center">To-Do(5)</div>
                    <div class="flex justify-between">
                        Total: {{$count}}
                        <button class="mx-9 underline p-1" onclick="my_modal_3.showModal();">Create New</button>
                        {{-- modal start --}}
                        <!-- You can open the modal using ID.showModal() method -->
                            <dialog id="my_modal_3" class="modal">
                            <div class="modal-box w-96">
                                <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="font-bold text-lg">Create a new task</h3>
                                <form action="javascript:void(0)" method="POST" name="taskForm" id="taskForm" class="my-2">
                                    <input type="hidden" id="id" name="id">
                                    <span class="font-semibold">Task Name: </span>
                                    <input type="text" name="task" id="task" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                                    <input type="submit" value="CREATE" class="btn btn-ghost float-end mt-2">
                                </form>
                            </div>
                            </dialog>
                        {{-- modal end --}}
                    </div>
                    <div class="" id="itemsList">
                    @foreach ($journals as $journal)
                    <div class="flex justify-between border h-auto w-auto mx-9 my-1 text-normal p-1 rounded-xl ">
                        <button class="btn btn-sm btn-success">Done</button>
                        {{$journal['task']}}
                        <span class="">
                            <i class="fa-solid fa-pen m-1"></i>
                            <i class="fa-solid fa-trash m-1"></i>
                        </span>
                    </div>
                    @endforeach
                </div>
                </div>

            </div>

        {{-- panel 1 end --}}

        {{-- panel 2 start --}}
            <div class="grid bg-purple-200  col-span-5">
                <div class="">
                    <div class="underline text-xl my-4 font-semibold text-center">Completed(5)</div>
                    @for ($i=1;$i<20;$i++)
                        <div class="flex justify-between border h-auto w-auto mx-9 my-1 text-normal p-1 rounded-xl ">
                            Implementation Intention
                            <span class="">
                                <i class="fa-solid fa-pen m-1"></i>
                                <i class="fa-solid fa-trash m-1"></i>
                            </span>
                        </div>
                    @endfor
                </div>
            </div>
        {{-- panel 2 end --}}

    </div>
<script type="text/javascript">
$(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    });

// Additional code to close the modal
const my_modal_3 = document.getElementById('my_modal_3');

if (!my_modal_3.showModal) {
    dialogPolyfill.registerDialog(my_modal_3);
}
$('#taskForm').submit(function(e){
   e.preventDefault();
   var formData = new FormData(this);
   $.ajax({
    type: "POST",
    url: "{{url('store')}}",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: (data)=>{
        console.log(data);
        var newTask = '<div class="flex justify-between border h-auto w-auto mx-9 my-1 text-normal p-1 rounded-xl ">' +
            '<button class="btn btn-sm btn-success">Done</button>' +
            data.task +
            '<span class="">' +
                '<i class="fa-solid fa-pen m-1"></i>' +
                '<i class="fa-solid fa-trash m-1"></i>' +
            '</span>' +
            '</div>';
        $('#itemsList').append(newTask);
        my_modal_3.close();
        $('#taskForm').trigger('reset');
    },
    error: function(){console.log("error");}
   });
});


</script>
@endsection
