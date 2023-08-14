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
                                    Permissions</li>
                            </ul>
                        </div>

                        <div class="flex flex-wrap mb-5">
                            <a href="{{route('admin.permissions.create')}}" class="btn inline-flex justify-center
                            btn-dark
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
                                <h4 class="card-title">Permissions
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
                                                        Action
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                                @foreach($permissions as $key => $permission)
                                                    <tr>
                                                        <td class="table-td">{{$key+1}}</td>
                                                        <td class="table-td">
                                                            <span class="text-sm text-slate-600 dark:text-slate-300
                                                            capitalize">{{$permission->name}}</span>
                                                        </td>
                                                        <td class="table-td">
                                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                                <button class="action-btn" type="button">
                                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                                </button>
                                                                <a
                                                                    href="{{route('admin.permissions.edit',$permission)}}"
                                                                   class="action-btn"
                                                                   type="button">
                                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                                </a>
                                                                <form method="POST"
                                                                      action="{{route('admin.permissions.destroy', $permission)}}"
                                                                >
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="action-btn" type="button">
                                                                        <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </td>
                                                    </tr>
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
@endsection
