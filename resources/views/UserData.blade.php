<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.0/css/buttons.dataTables.min.css" type="text/css"  />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.0/css/select.dataTables.min.css" type="text/css" />

{{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://datatables.net/release-datatables/media/js/jquery.js"></script> --}}
<script type="text/javascript" src="https://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" scr="https://datatables.net/release-datatables/extensions/TableTools/js/dataTables.tableTools.js"></script>

<script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.html5.min.js"></script>

<script src="https://jquery-datatables-column-filter.googlecode.com/svn/trunk/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<style>
    .f-cont{
        cursor: pointer;
    font-size: 1rem;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
       }
</style>
</head>
<body>

<div class="container">
    <table class="table table-hover table-bordered" id="">
        <thead>
            <tr>
                <th>Name</th>
                <th>Father Name</th>
                <th>Cnic</th>
                <th>Contact</th>
                <th>Email</th>
                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keey as $rec)
            <tr>
                <td>{{ $rec->uname }}</td>
                <td>{{ $rec->fname }}</td>
                <td>{{ $rec->cnic }}</td>
                <td>{{ $rec->contact }}</td>
                <td>{{ $rec->email }}</td>
                <td>
                    <a href="{{ url('EditUser/'.$rec->id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ url('delete/'.$rec->id) }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE"/>
                        <button class="btn btn-danger" onclick="return confirm('Are u sure u want to delete?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
</body>
<script>
    $(document).ready(function() {

        $('.table').DataTable( {

            "lengthMenu": [[5,10,15,20, 25, 30,50, -1], [5,10,15,20, 25, 30, 50, "All"]],
            dom: 'Blfrtip',
        buttons: [
       {
           extend: 'pdf',
           title: 'User Information ',
            pageSize: 'A4',
            filename: "pdffile",
           footer: false,
  customize: function(doc) {
    doc.styles.title = {
      color: 'red',
      fontSize: '20',
      alignment: 'center'
    },
    doc.defaultStyle.fontSize = 12;
    doc.defaultStyle.alignment='center';
    doc.styles['td.bigcol'] = {
                        fontSize: 16,
                        bold: true,

                    },

    doc.content[1].table.widths = [
        '20%',
        '20%',
        '20%',
        '20%',
        '20%',
],
doc.content[1].margin = [ 10, 0, 10, 0 ]
  },

        pageSize: 'LEGAL',
           exportOptions: {
                columns: [0,1,2,3,4],
                modifier: {
                page: 'current'
            }
            }
       },
       {

           extend: 'csv',
           footer: false,
           exportOptions: {
                columns: [0,1,2,3,4]
            },
       },
       {
           extend: 'excel',
           footer: false,
           exportOptions: {
                columns: [0,1,2,3,4]
            },
       }
    ] ,
    initComplete: function () {
            var btns = $('.dt-button');
            var s=$('.dataTables_length label select');
            btns.addClass('btn btn-success mx-2 mb-1');
            btns.removeClass('dt-button');
            s.addClass('f-cont');
            var place=$('.dataTables_filter label input');
            place.addClass('f-cont');
            place.attr("placeholder", "Search Here");

        }

    } );
} );
    </script>
</html>
