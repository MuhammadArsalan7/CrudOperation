<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Father Name</th>
                <th>Cnic</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($UserDat as $a)
                <tr>
                <td>{{ $a->Name }}</td>
                <td>{{ $a->FatherName }}</td>
                <td>{{ $a->Cnic }}</td>
                <td>{{ $a->Contact }}</td>
                <td>{{ $a->Email }}</td>
                <td>
                    <a href={{ url('edit/'.$a->id) }} class="btn btn-success">Update</a>

                </td>
                <td>
                    <form action="{{ url('delete/'.$a->id) }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @if(session()->has('message'))
                        <script>
                         swal("Good job!", "You clicked the button!", "success");
                        </script>
                        @endif
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
