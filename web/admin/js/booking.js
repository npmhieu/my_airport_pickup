$('.arrive-date').datepicker({
  orientation: 'bottom',
  format: "dd/mm/yyyy",
  autoclose: true
});


$('.btn-delete').click(function (e) {

  e.preventDefault();

  let url = $(this).attr('href');
  console.log(url);

  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this booking!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {

        // Call server to delete booking
        // if ok show ok

        $.post(url, null, function (res) {

          if (res.status.code == 200) {
            swal({
              title: "Success!",
              text: "Your booking is deleted successfully",
              icon: "success",
            }).then(function (e) {
              window.location.reload(false);
            });
          }

        });

      }
    });
});



