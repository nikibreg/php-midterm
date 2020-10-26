@extends('home')
@section('main-section')
        <div class="material-table card">
            <div class="material-table-header"></div>
            <div class="material-table-body">
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <div>Name</div>
                            </th>
                            <th>
                                <div>Surname</div>
                            </th>
                            <th>
                                <div>Position</div>
                            </th>
                            <th>
                                <div>Phone</div>
                            </th>
                            <th>
                                <div>Is Hired</div>
                            </th>
                            <th>
                                <div>Edit</div>
                            </th>
                        </tr>
                        <tr class="invisible"></tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)  
                            <tr title="{{ $employee->name }}-ის რედაქტირება">
                        
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->surname }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->is_hired ? 'Hired' : 'Not Hired' }}</td>
                                <td><a class="underline text-gray-900 dark:text-white" href="employees/{{ $employee->id }}/edit">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
