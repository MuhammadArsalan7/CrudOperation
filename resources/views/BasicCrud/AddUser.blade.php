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
    @if(session()->has('message'))
    <script>
    // alert('Done');
    swal("Good job!", "You clicked the button!", "success");
    </script>
    @endif
<div class="container">

  <form action="{{ url('inserted') }}" method="POST" class="was-validated">
    @csrf
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control"  placeholder="Enter username" name="Name" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
        <label for="uname">FatherName:</label>
        <input type="text" class="form-control"  placeholder="Enter FatherName" name="FatherName" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
        <label for="uname">Cnic:</label>
        <input type="text" class="form-control"  placeholder="Enter Cnic" name="Cnic" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
        <label for="uname">ConatctNo:</label>
        <input type="text" class="form-control"  placeholder="Enter Cnic" name="Contact" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
        <label for="uname">Email:</label>
        <input type="text" class="form-control"  placeholder="Enter Cnic" name="Email" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
