$(document).ready(function(){

    var url = "/user";
$('#alertwarning').hide();

/*
================================================================================



start modal





================================================================================
*/



    $('.open-modal').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        var uuid = $(this).val();
        var uri = url + '/edit/' + uuid;


        $.get(uri, function (data) {
         
            $('#uuid').val(data.uuid);
            $('#uuid_').val(data.uuid);
            $('#nama').val(data.nama);
            $('#alamat').val(data.alamat);
            $("#nama").prop('disabled', true);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        }); 

    });

    
    $('#btn-add').click(function(){

     
        var uri = url + '/getHash';
        $("#nama").prop('disabled', false);

        $.ajax({

            type: "GET",
            url: uri,
            success: function (data) {
                
                $('#btn-save').val("add");
                $('#frmUsers').trigger("reset");
                $('#myModal').modal('show');
                $("#uuid").val(data.uuid);
                $("#uuid_").val(data.uuid);

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

        


    });

    
    $('.delete-user').click(function(){
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
     var uuid = $(this).val();
     var uri = url + '/delete/' + uuid;


     $.ajax({

        type: "DELETE",
        url: uri,
        success: function (data) {


            $("#user" + uuid).remove();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
 });

    
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        
        e.preventDefault(); 

        var formData = {
            uuid: $('#uuid').val(),
            nama: $('#nama').val(),
            alamat: $('#alamat').val(),
        }

        if ($('#nama').val() === '' || $('#alamat').val() === ''){
           return alert('All field is required');
        }
        
        
        var state = $('#btn-save').val();

        var type = "POST"; 
        var uuid = $('#uuid').val();;
        var my_url = url;
        if (state == "add"){
            // 
            type = "POST";
            my_url += '/store';

        }else
        if (state == "update"){
            // 
            type = "PATCH"; 
            my_url += '/update/' + uuid;

        }

        
        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
 
               if(data.response !== undefined){

                alert(data.response);  
               }else{
                
                var res = '<tr id="user' + data.uuid + '"><td>' + data.uuid + '</td><td>' + data.nama + '</td><td>' + data.alamat + '</td><td>' + data.created_at + '</td>';
                res += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.uuid + '">Edit</button>';
                res += ' <button class="btn btn-danger btn-xs btn-delete delete-user" value="' + data.uuid + '">Delete</button></td></tr>';

                if (state == "add"){ 
                   
                    $('#users-list').append(res);
                }else{ 


                    $("#user" + uuid).replaceWith(res);
                }

                $('#frmUsers').trigger("reset");

                $('#myModal').modal('hide')
            
                location.reload();
               }

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


/*
================================================================================



end modal





================================================================================
*/




/*
================================================================================



start no modal





================================================================================
*/





    $('#btn-add_nomodal').click(function(){

    
        var uri = url + '/create';
         window.location.href = uri;
        


    });
    $('.edit-nomodal').click(function(){

        var uuid = $(this).val();
        var uri = url + '/edit_nomodal/' + uuid;

        window.location.href = uri;
       
        


    });
    $("#btn-save_nomodal").click(function (e) {
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        
        e.preventDefault(); 

        var formData = {
            uuid: $('#uuid').val(),
            nama: $('#nama').val(),
            alamat: $('#alamat').val(),
        }

       
        if ($('#nama').val() === '' || $('#alamat').val() === ''){
           return alert('All field is required');
        }
        
        
        var state = $('#btn-save_nomodal').val();
       
        var type = "POST"; 
        var uuid = $('#uuid').val();;
        var my_url = url;
        if (state == "add"){
            // 
            type = "POST";
            my_url += '/store';

        }else
        if (state == "update"){
            
            type = "PATCH"; 
            my_url += '/update/' + uuid;

        }

        
        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
             if(data.response !== undefined){
                $('#alertwarning').html('');
                $('#alertwarning').append(data.response);
                $('#alertwarning').show();
                 alert(data.response);  
               }else{
                    window.location.href = '/user';
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });













/*
================================================================================



end no modal





================================================================================
*/

















    
});