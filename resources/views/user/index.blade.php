<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Web App Test</title>

    <!-- Load Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>


    <div class="container-narrow">
       <br>
        <br>
         <br>
         

                <br>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New User</button>
         <button id="btn-add_nomodal" name="btn-add_nomodal" class="btn btn-primary btn-xs">Add New nomodal</button>
        <div>

            
            <table class="table">
                <thead>
                    <tr>
                        <th>Uuid</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="users-list" name="users-list">
                    @foreach ($users as $user)
                    <tr id="user{{$user->uuid}}">
                        <td>{{$user->uuid}}</td>
                        <td>{{$user->nama}}</td>
                        <td>{{$user->alamat}}</td>
                       
                        <td>
                             <button class="btn btn-warning btn-xs btn-detail edit-nomodal" value="{{$user->uuid}}">Edit nomodal</button>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$user->uuid}}">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-user" value="{{$user->uuid}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
            <tr colspan="4">
                    <div class='pagination'>{!! str_replace('/?','?', $users->render()) !!}</div>
                </tr>
            <!-- 

    overriding the $users variable in the foreach is forbidden. Use it as singular form in the foreach


                End of Table-to-load-the-data Part -->
             @include('user/form-modal')
        </div>
    </div>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{asset('js/ajax-crud.js')}}"></script>
    <script type="text/javascript">
        
     
    </script>
    
</body>
</html>