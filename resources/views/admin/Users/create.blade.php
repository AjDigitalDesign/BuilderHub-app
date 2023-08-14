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
                                    Create New User</li>
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

                    <form method="POST" action="{{route('admin.users.store')}}"
                          class="flex flex-col p-6" enctype="multipart/form-data">
                        @csrf

                        <div class=" space-y-5">
                            <!-- BEGIN: Advanced Table 2 -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <div class="card p-6">
                                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                    <div class="flex-1">
                                        <div class="card-title text-slate-900 dark:text-white">Add New User</div>
                                    </div>
                                </header>
                                <div class="card-body px-6 pb-6">
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <div class="grid sm:grid-cols-2  gap-5">

                                        <div class="input-area">
                                            <div>
                                                <label for="fname" class="form-label">First Name</label>
                                                <input class="form-control" id="fname" name="fname" type="text"
                                                       autofocus="autofocus" placeholder="First Name"
                                                       autocomplete="fname">
                                                <x-input-error class="mt-2" :messages="$errors->get('fname')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="lname" class="form-label">Last Name</label>
                                                <input class="form-control" id="lname" name="lname" type="text"
                                                       autofocus="autofocus" placeholder="Last Name"
                                                       autocomplete="lname">
                                                <x-input-error class="mt-2" :messages="$errors->get('lname')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="username" class="form-label">Username</label>
                                                <input class="form-control" id="username" name="username" type="text"
                                                       autofocus="autofocus" placeholder="Username"
                                                       autocomplete="username">
                                                <x-input-error class="mt-2" :messages="$errors->get('username')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" id="email" name="email" type="email"
                                                       autofocus="autofocus" placeholder="email"
                                                       autocomplete="email">
                                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="phone" class="form-label">Phone</label>
                                                <input class="form-control" id="phone" name="phone" type="tel"
                                                       autofocus="autofocus" placeholder="Phone"
                                                       autocomplete="phone">
                                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="position" class="form-label">Position</label>
                                                <input class="form-control" id="position" name="position" type="text"
                                                       autofocus="autofocus" placeholder="position"
                                                       autocomplete="position">
                                                <x-input-error class="mt-2" :messages="$errors->get('position')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="address" class="form-label">Address</label>
                                                <input class="form-control" id="address" name="address" type="text"
                                                       autofocus="autofocus" placeholder="address"
                                                       autocomplete="address">
                                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="city" class="form-label">City</label>
                                                <input class="form-control" id="city" name="city" type="text"
                                                       autofocus="autofocus" placeholder="city"
                                                       autocomplete="city">
                                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="state" class="form-label">State</label>
                                                <input class="form-control" id="state" name="state" type="text"
                                                       autofocus="autofocus" placeholder="state"
                                                       autocomplete="state">
                                                <x-input-error class="mt-2" :messages="$errors->get('state')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="zipcode" class="form-label">Zipcode</label>
                                                <input class="form-control" id="zipcode" name="zipcode" type="number"
                                                       autofocus="autofocus" placeholder="zipcode"
                                                       autocomplete="zipcode">
                                                <x-input-error class="mt-2" :messages="$errors->get('zipcode')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control" id="password" name="password"
                                                       type="password"
                                                       autofocus="autofocus" placeholder="password"
                                                       autocomplete="password">
                                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <x-input-label for="password_confirmation" class="form-label" :value="__('Confirm
                                                Password')" />

                                                <x-text-input id="password_confirmation" class="form-control"
                                                              type="password"
                                                              name="password_confirmation" required autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="role" class="form-label">Role</label>
                                                <select name="role" id="role" class="select2
                                                    form-control w-full mt-2 py-2">
                                                    @foreach($roles as $role)
                                                        <option
                                                            value="{{$role->id}}"
                                                            class="inline-block font-Inter font-normal text-sm text-slate-600">
                                                            {{$role->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-input-error class="mt-2" :messages="$errors->get('role')" />
                                            </div>
                                        </div>

                                        <div class="input-area">
                                            <div>
                                                <label for="permissions" class="form-label">Permissions</label>
                                                <select name="permissions[]" id="permissions" class="select2
                                                    form-control w-full mt-2 py-2" multiple="multiple">
                                                    @foreach($permissions as $permission)
                                                        <option
                                                            value="{{$permission->id}}"
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
