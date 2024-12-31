@extends('admin.layouts.master')
@section('title', 'admin accounts')
@section('orderCount')
    @if ($pending_order > 0)
        <span
            class="position-absolute bg-danger rounded-circle d-flex align-items-center justify-content-center text-white px-1"
            style="top: -8px; left: 25px; height: 20px; min-width: 20px;">{{ $pending_order }}</span>
    @endif
@endsection
@section('content')
    <a href="{{ route('profile#createAdminPage') }}" class="ml-3 btn btn-primary text-base"><i
            class="fa-solid fa-arrow-left"></i>
        Back</a>
    <div class="row">
        <div class="col-10 offset-1">
            <h1 class="text-center font-weight-bold text-primary mb-5">SuperAdmin && Admin Accounts</h1>
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="mr-2">
                        <a href="{{ route('profile#createAdminPage') }}" class="btn btn-primary text-base">
                            Create Admin Accounts
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('profile#userAccounts') }}" class="btn btn-primary text-base">
                            <i class="mr-1 fa-solid fa-users"></i> See User Accounts
                        </a>
                    </div>
                </div>
                <form style="width: 30%" action={{ route('profile#adminAccounts') }}>
                    <div class=" input-group mb-3">
                        <input name="searchKey" type="text" class="form-control" placeholder="Search..."
                            aria-label="Search..." aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>
            </div>

            <table class=" table mt-2 table-hover shadow-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <div>{{ $item->created_at->timezone('Asia/Yangon')->format('j-M-Y') }}</div>
                                <small>{{ $item->created_at->timezone('Asia/Yangon')->format('h\h : i\m\i\n : s\s a') }}</small>
                            </td>
                            <td>
                                <span
                                    class="bg-success px-2 py-1 rounded-pill text-white font-weight-bold">{{ $item->role }}</span>
                            </td>
                            <td>
                                @if ($item->role != 'superAdmin')
                                    <a href="{{ route('adminAccount#delete', $item->id) }}"
                                        class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <span class="mt-5 d-flex justify-content-end">
                {{ $accounts->links() }}
            </span>
        </div>
    </div>
@endsection
