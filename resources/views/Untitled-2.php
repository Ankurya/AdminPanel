// $(document).on('click', '#block-user', function (e) {
//     e.preventDefault();
//     var id = $(this).data('id');
//     swal({
//             title: "Are you sure!",
//             type: "error",
//             confirmButtonClass: "btn-danger",
//             confirmButtonText: "Yes!",
//             showCancelButton: true,
//         },
//         function() {
//             $.ajax({
//                 type: "POST",
//                 url: "{{url('block-user/{id}')}}",
//                 data: {id:id},
//                 success: function (data) {
//                               //
//                     }         
//             });
//     });
// });



$(document).on('click', '#block-user', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id);
    // $('#'+id).on('click', function() {

     swal({
      title: “Are you sure you want to block this user?“,
      icon: “warning”,
      buttons: true,
      dangerMode: true,
    })
    .then((res) => {
            if (res) {
              window.location.href = "{{ url('block-user/') }}"+id;
             }
    });
    });