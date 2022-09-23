<!DOCTYPE html>
<html>
<head>
    <title>Laravel Ajax PUT Request Example  - ItSolutionStuff.com</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
        
<div class="container">
    <h1>Laravel Ajax PUT Request Example - ItSolutionStuff.com</h1>
    
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr data-id="{{ $user->id }}">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a 
                        href="javascript:void(0)" 
                        id="edit-user" 
                        class="btn btn-primary"
                        >Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 
</div>
 
<!-- Modal -->
  
<div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
  
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  
      </div>
  
      <div class="modal-body">
        <input type="hidden" id="user-id" name="id"></span>
        <p><strong>Name:</strong> <br/> <input type="text" name="name" id="user-name" class="form-control"></span></p>
        <p><strong>Email:</strong> <br/> <input type="email" name="email" id="user-email" class="form-control"></span></p>
      </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="user-update">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      
</body>
 
<script type="text/javascript">
      
    $(document).ready(function () {
  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  
        /*------------------------------------------
        --------------------------------------------
        When click user on Edit Button
        --------------------------------------------
        --------------------------------------------*/
        $('body').on('click', '#edit-user', function () {
   
            var userURL = $(this).data('url');
  
            $('#userEditModal').modal('show');
            $('#user-id').val($(this).parents("tr").find("td:nth-child(1)").text());
            $('#user-name').val($(this).parents("tr").find("td:nth-child(2)").text());
            $('#user-email').val($(this).parents("tr").find("td:nth-child(3)").text());
 
       });
      
        /*------------------------------------------
        --------------------------------------------
        When click user on Show Button
        --------------------------------------------
        --------------------------------------------*/
        $('body').on('click', '#user-update', function () {
   
            var id = $('#user-id').val();
            var name = $('#user-name').val();
            var email = $('#user-email').val();
  
            $.ajax({
                url: '/users/' + id,
                type: 'PUT',
                dataType: 'json',
                data: { name: name, email: email},
                success: function(data) {
                    $('#userEditModal').modal('hide');
                    alert(data.success);
  
                    $("tr[data-id="+id+"]").find("td:nth-child(2)").text(name);
                    $("tr[data-id="+id+"]").find("td:nth-child(3)").text(email);
                }
            });
  
       });
         
    });
    
</script>
      
</html>