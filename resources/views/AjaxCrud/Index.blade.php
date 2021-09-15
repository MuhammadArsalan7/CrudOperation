<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Record Inserted with Ajax </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<section style="padding-top:60px">
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Students <a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add New Student</a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered" id="customerTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Father Name</th>
                            <th>Cnic</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cus as $a)
                            <tr id="cid{{ $a->id }}">
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->Name }}</td>
                                <td>{{ $a->FatherName }}</td>
                                <td>{{ $a->Cnic }}</td>
                                <td>{{ $a->Contact }}</td>
                                <td>{{ $a->Email }}</td>
                                <td><a href="#"  class="btn btn-info editBtn" data-toggle="modal" data-target="#editModel">Edit</a>
                                <a href="#" class="btn btn-danger" onclick="DeleteRec({{ $a->id }})">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</section>

<!-- Add Customer Modal -->
<div class="container">

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog ">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add New Customer</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form id="customerform" >
                @csrf
                <div class="form-group">
                    <label> Name</label>
                    <input type="text" class="form-control"  name="Name" />
                </div>
                <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" class="form-control"  name="FatherName"/>
                </div>
                <div class="form-group">
                    <label>Cnic</label>
                    <input type="text" class="form-control"  name="Cnic" />
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control"  name="Contact" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="Email" />
                </div>
                <div class="card" style="width:50%">
                    <div class="header">
                        <h2>Image</h2>
                    </div>
                    <div class="body">
                        <div class="dropify-wrapper">
                            <div class="dropify-message">
                                <span class="file-icon"></span>
                                <p>Drag and drop a file here or click</p>
                                <p class="dropify-error">Ooops, something wrong appended.</p>
                            </div>
                            <div class="dropify-loader" style="display: none;">
                                </div><div class="dropify-errors-container">

                                    </div>
                                    <input type="file" class="dropify" name="Image" >
                                    <button type="button" class="dropify-clear">Remove</button>
                                     <div class="dropify-preview" style="display: none;">

                                        <span class="dropify-render">

                                        </span>
                                        <div class="dropify-infos">
                                            <div class="dropify-infos-inner">
                                                <p class="dropify-filename">
                                                    <span class="file-icon"></span>
                                                    <span class="dropify-filename-inner"></span>
                                                </p>
                                                <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>

            </form>
          </div>

          <!-- Modal footer -->


        </div>
      </div>
    </div>

  </div>

<!-- Edit Customer Modal -->

  <div class="container">

    <!-- The Modal -->
    <div class="modal fade" id="editModel">
      <div class="modal-dialog ">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Customer</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form id="customerEditform" >
                @csrf
                @method('PUT')
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                    <label> Name</label>
                    <input type="text" class="form-control" name="Name" id="Name"/>
                </div>
                <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" class="form-control" name="FatherName" id="FatherName"/>
                </div>
                <div class="form-group">
                    <label>Cnic</label>
                    <input type="text" class="form-control" name="Cnic" id="Cnic"/>
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="Contact" id="Contact"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="Email" id="Email"/>
                </div>
                <button type="submit" class="btn btn-primary" >Updated</button>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

  </div>
  <script>
  $(document).ready(function(){
    $('.editBtn').on('click',function(){

        $tr=$(this).closest('tr');

        var data=$tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log("data");
        $('#id').val(data[0]);
        $('#Name').val(data[1]);
        $('#FatherName').val(data[2]);
        $('#Cnic').val(data[3]);
        $('#Contact').val(data[4]);
        $('#Email').val(data[5]);
    });


    $("#customerEditform").on('submit',function(e){
        e.preventDefault();

        var id=$('#id').val();

        $.ajax({

            type: "PUT",
            url: "updateData/"+id ,
            data: $("#customerEditform").serialize(),

            success:function(response)
            {
                alert("Data Updated");
                if(response.id==id){
                    $("#cid"+id).remove();
                }
                $("#customerTable tbody").prepend('<tr><td>'+ response.id +'</td><td>'+ response.Name +'</td><td>'+ response.FatherName +'</td><td>'+ response.Cnic +'</td><td>'+ response.Contact +'</td><td>'+ response.Email +'</td><td> <a href="" class="btn btn-info">Edit</a>&nbsp<a href="" class="btn btn-danger" onclick="DeleteRec({{ $a->id }})">Delete</a></td></tr>');
                $("#customerEditform")[0].reset();
                $("#editModel").modal('hide');


            }
        });
    });

  });
</script>
<script>
$("#customerform").submit(function(e){
e.preventDefault();
$.ajax({
url:"{{ route('customers.add') }}",
type:"POST",
data:
    $("#customerform").serialize(),
success:function(response)
{
    if(response)
    {
        $("#customerTable tbody").prepend('<tr><td>'+ response.id +'</td><td>'+ response.Name +'</td><td>'+ response.FatherName +'</td><td>'+ response.Cnic +'</td><td>'+ response.Contact +'</td><td>'+ response.Email +'</td><td> <a href="" class="btn btn-info">Edit</a>&nbsp<a href="" class="btn btn-danger" onclick="DeleteRec({{ $a->id }})">Delete</a></td></tr>');
        $("#customerform")[0].reset();
        $("#myModal").modal('hide');
    }
}
});
});

</script>
<script>
    function DeleteRec(id){
        if(confirm("Do You want to Delete Record")){
            $.ajax({
                url:"del/"+id,
                type:"delete",
                data:{
                    _token:$("input[name=_token]").val()
                },
                success:function(response)
                {
                    $("#cid"+id).remove();
                }
            });
        }
    }
</script>
</body>
</html>
