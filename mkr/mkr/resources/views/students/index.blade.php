
    <h1>Список студентів</h1>
    <table border="1px solid black">
        <thead>
        <tr>
            <th>Id</th>
            <th>ПІБ</th>
            <th>Курс</th>
            <th>Спеціальність</th>
            <th>Дії</th>
        </tr>
        </thead>
        @foreach($students as $student)
            <form>
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->specialty }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}">Редагувати</a>
                    </td>
                </tr>
            </form>
        @endforeach
        </tb>
    </table>
