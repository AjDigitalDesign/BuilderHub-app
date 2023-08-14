@extends('layouts.Admin.app')

@section('content')
    <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">

                    <div class=" md:flex justify-between items-center">
                            <!-- BEGIN: Breadcrumb -->
                            <div class="mb-5">
                                <ul class="m-0 p-0 list-none">
                                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                                        <a href="{{route('admin.dashboard')}}">
                                            <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                            <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                        Users</li>
                                </ul>
                            </div>

                            <div class="flex flex-wrap mb-5">
                            <a href="{{route('admin.users.create')}}" class="btn inline-flex justify-center btn-dark
                            dark:bg-slate-700
                            dark:text-slate-300
                            m-1 ">
                                <span class="flex items-center">
                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                                    <span>Add New </span>
                                </span>
                            </a>
                        </div>
                            <!-- END: BreadCrumb -->
                    </div>



                    <div class=" space-y-5">
                        <!-- BEGIN: Advanced Table 2 -->


                        <div class="card">
                            <header class=" card-header noborder">
                                <h4 class="card-title">Users
                                </h4>
                            </header>
                            <div class="card-body px-6 pb-6">
                                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                    <span class=" col-span-8  hidden"></span>
                                    <span class="  col-span-4 hidden"></span>
                                    <div class="inline-block min-w-full align-middle">
                                        <div class="overflow-hidden ">
                                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                                <thead class=" bg-slate-200 dark:bg-slate-700">
                                                <tr>

                                                    <th scope="col" class=" table-th ">
                                                        Id
                                                    </th>

                                                    <th scope="col" class=" table-th ">
                                                        Name
                                                    </th>
                                                    <th scope="col" class=" table-th ">
                                                        Username
                                                    </th>
                                                    <th scope="col" class=" table-th ">
                                                        Action
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                                @foreach($users as $key => $user)
                                                    <tr>
                                                        <td class="table-td">{{$key+1}}</td>
                                                        <td class="table-td">
                                                            <span class="text-sm text-slate-600 dark:text-slate-300
                                                            capitalize">{{$user->fname}}  {{$user->lname}}</span>
                                                        </td>
                                                        <td class="table-td">
                                                            <span class="text-sm text-slate-600 dark:text-slate-300
                                                            capitalize">{{$user->username}}</span>
                                                        </td>
                                                        <td class="table-td">
                                                            <div class="flex space-x-3 rtl:space-x-reverse">

                                                                <a
                                                                    href="#editlocation{{$user->id}}"
                                                                    data-location="{{json_encode($user)}}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#showlocation{{$user->id}}"
                                                                    class="action-btn"
                                                                    type="button"
                                                                >
                                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                                </a>

                                                                <a
                                                                    href="{{route('admin.users.edit',$user)}}"
                                                                   class="action-btn"
                                                                   type="button">
                                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                                </a>

                                                                <form method="POST"
                                                                  action="{{route('admin.users.destroy', $user)}}"
                                                                >
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        class="action-btn action-btn show_confirm" type="submit">
                                                                        <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade fixed top-0 left-0 hidden
                                                                w-full h-full outline-none overflow-x-hidden
                                                                overflow-y-auto" id="showlocation{{$user->id}}"
                                                         tabindex="-1"
                                                         aria-labelledby="basic_modal" aria-hidden="true">

                                                        <!-- BEGIN: Modal -->
                                                        <div class="modal-dialog relative w-auto pointer-events-none">
                                                            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                                                    <!-- Modal header -->
                                                                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                                                                        <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                                                            {{$user->fname}} {{$user->lname}}
                                                                        </h3>
                                                                        <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                                                                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>
                                                                    <!-- Modal body -->

                                                                    <div class="card">
                                                                        <div class="card-body flex flex-col p-6">
                                                                            <div class="card-text h-full">
                                                                                <div class="card-body  bg-white dark:bg-slate-800 shadow-base active">
                                                                                    <ul class="list-none">
                                                                                        <li>Name: <span
                                                                                            class="font-bold">{{$user->fname}}
                                                                                                {{$user->lname}}</span>
                                                                                        </li>
                                                                                        <li>Username: <span
                                                                                                class="font-bold">{{$user->username}}</span>
                                                                                        </li>
                                                                                        <li>Position: <span
                                                                                                class="font-bold">{{$user->position}}</span>
                                                                                        </li>
                                                                                        <li>Email: <span
                                                                                                class="font-bold">{{$user->email}}</span>
                                                                                        </li>
                                                                                        <li>City: <span
                                                                                                class="font-bold">{{$user->city}}</span>
                                                                                        </li>
                                                                                        <li>Role: <span
                                                                                                class="font-bold"></span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END: Modals -->
                                                    </div>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Advanced Table -->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )

                    form.submit();
                }

            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>
@endsection
