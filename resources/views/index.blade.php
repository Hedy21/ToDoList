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
                    @for ($i=1;$i<20;$i++)
                        <div class="flex justify-between border h-auto w-auto mx-9 my-1 text-normal p-1 rounded-xl ">
                            <button class="btn btn-sm btn-success">Done</button>
                            Implementation Intention
                            <span class="">
                                <i class="fa-solid fa-pen m-1"></i>
                                <i class="fa-solid fa-trash m-1"></i>
                            </span>
                        </div>
                    @endfor
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
@endsection
