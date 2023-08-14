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
                                <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                    <a href="{{route('admin.users.index')}}">
                                        Users
                                        <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                    </a>
                                </li>
                                <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                    Exit User</li>
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

                    <form method="POST" action="{{route('admin.users.update', $user)}}"
                          class="flex flex-col p-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class=" space-y-5">
                            <!-- BEGIN: Advanced Table 2 -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <div class="card p-6">
                                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                    <div class="flex-1">
                                        <div class="card-title text-slate-900 dark:text-white">
                                            Edit {{$user->fname}} {{$user->lname}}</div>
                                    </div>
                                </header>
                                <div class="card-body px-6 pb-6">
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <div class="grid sm:grid-cols-2  gap-5">

                                        <div class="input-area">
                                            <div>
                                                <x-input-label for="fname" :value="__('First Name')" />
                                                <x-text-input id="fname" name="fname" type="text" class="form-control"
                                                  :value="old('fname', $user->fname)"
                                                  autofocus autocomplete="fname"
                                                />
                                                <x-input-error class="mt-2" :messages="$errors->get('fname')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <x-input-label for="lname" :value="__('Last Name')" />
                                                <x-text-input id="fname" name="lname" type="text" class="form-control"
                                                  :value="old('lname', $user->lname)"
                                                  autofocus autocomplete="lname"
                                                />
                                                <x-input-error class="mt-2" :messages="$errors->get('lname')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <x-input-label for="phone" :value="__('Phone')" />
                                                <x-text-input id="phone" name="phone" type="tel" class="form-control"
                                                  :value="old('phone', $user->phone)"
                                                  autofocus autocomplete="phone"
                                                />
                                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <x-input-label for="position" :value="__('Position')" />
                                                <x-text-input id="position" name="position" type="text"
                                                  class="form-control"
                                                  :value="old('position', $user->position)"
                                                  autofocus autocomplete="position"
                                                />
                                                <x-input-error class="mt-2" :messages="$errors->get('position')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <x-input-label for="address" :value="__('Address')" />
                                                <x-text-input id="address" name="address" type="text"
                                                              class="form-control"
                                                              :value="old('address', $user->address)"
                                                              autofocus autocomplete="address"
                                                />
                                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <x-input-label for="city" :value="__('City')" />
                                                <x-text-input id="city" name="city" type="text"
                                                              class="form-control"
                                                              :value="old('city', $user->city)"
                                                              autofocus autocomplete="city"
                                                />
                                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="grid sm:grid-cols-2 gap-5">
                                        <div class="input-area mt-5">
                                            <div>
                                                <x-input-label for="state" :value="__('State')" />
                                                <x-text-input id="state" name="state" type="text"
                                                              class="form-control"
                                                              :value="old('state', $user->state)"
                                                              autofocus autocomplete="state"
                                                />
                                                <x-input-error class="mt-2" :messages="$errors->get('state')" />
                                            </div>
                                        </div>

                                        <div class="input-area  mt-5">
                                            <div>
                                                <x-input-label for="zipcode" :value="__('Zipcode')" />
                                                <x-text-input id="zipcode" name="zipcode" type="text"
                                                              class="form-control"
                                                              :value="old('zipcode', $user->zipcode)"
                                                              autofocus autocomplete="zipcode"
                                                />
                                                <x-input-error class="mt-2" :messages="$errors->get('zipcode')" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid sm:grid-cols-2 gap-5">
                                        <div class="input-area mt-5">
                                            <div>
                                                <label for="role" class="form-label">Role</label>
                                                <select name="role" id="role" class="select2
                                                    form-control">
                                                    @foreach($roles as $role)
                                                        <option
                                                            value="{{$role->id}}"
                                                            {{$role->id == $user->hasRole($role->id) ? 'selected' :
                                                            ''}}
                                                            class="inline-block font-Inter font-normal text-sm text-slate-600">
                                                            {{$role->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-input-error class="mt-2" :messages="$errors->get('role')" />
                                            </div>
                                        </div>

                                        <div class="input-area mt-5">
                                            <div>
                                                <label for="permissions" class="form-label">Permissions</label>
                                                <select name="permissions[]" id="permissions" class="select2
                                                    form-control w-full mt-2 py-2" multiple="multiple">
                                                    @foreach($permissions as $permission)
                                                        <option
                                                            value="{{$permission->id}}"
                                                            {{ in_array($permission->id,
                                                              $user->permissions->pluck('id')->toArray()) ?
                                                                'selected' : ''
                                                            }}
                                                            class="inline-block font-Inter font-normal text-sm text-slate-600">
                                                            {{$permission->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn inline-flex justify-center btn-success justifty-flex-end
                                    mt-5">Submit</button>

                                </div>
                            </div>
                            <!-- END: Advanced Table -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
