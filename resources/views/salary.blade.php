<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary</title>
</head>
<body>
    <form action="{{ route('salary.submit') }}" method="POST">
        @csrf
        <label for="number">Enter a number between 5 and 50:</label>
        <input type="number" id="number" name="number" min="5" max="50" required>
        <button type="submit">Submit</button>
    </form>

    @if(isset($employeesWithNthSalary))
        <h2>Employees with the {{ $n }}th Highest Salary ({{ $nthHighestSalary }})</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Highest Salary</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employeesWithNthSalary as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->highest_salary }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No employees found with the {{ $n }}th highest salary.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endif
</body>
</html>