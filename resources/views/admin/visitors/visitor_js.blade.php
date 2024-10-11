<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha384-4M7GcTbZBdHj1XOpjLci8tUZzJOTiFS7pkXeGguH4d9hZhg7Z7IHu/hgRo6eo35c" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

{{--
<script>
    $(document).ready(function () {



    new DataTable('#visitorTable', {
        responsive: true,
        ordering: false,
        dom: '<"d-flex justify-content-between"lBf>rt<"d-flex justify-content-between"ip>',
        buttons: [
            'copy', 'excel', 'print'
        ]

        });


    $("#addVisitorForm").validate({
        rules: {
            last_name: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            first_name: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            person_to_visit: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            purpose: {
                required: true,
                minlength: 3,
                maxlength: 255,
            },
            id_type: {
                required:true,
            },
        },
        messages: {
            last_name: {
                required: "Last name is required ",
                minlength: "Last name must be atleast 3 chars.",
                maxlength: "Last name must be maximum of 50 letters",
            },
            first_name: {
                required: "First name is required ",
                minlength: "First name must be atleast 3 chars.",
                maxlength: "First name must be maximum of 50 letters",
            },
            person_to_visit: {
                required: "Please fill this up",
                minlength: "Must be greater than 3 letters",
                maxlength: "Must be maximum of 50 letters",
            },
            purpose: {
                required: "Purpose is required",
                minlength: "Purpose must be greater than 3 letters",
                maxlength: "Purpose must be maximum of 50 letters",
            },
            id_type: {
                required: "ID type is required",
            },
        },
        submitHandler: function (form, function(e)) {
            e.preventDefault();
            const formData = $(form).serializeArray();


            $.ajax({
                url: "{{route('visitor.store')}}",
                method: 'POST',
                data: formData,
                beforeSend: function () {
                    console.log("Loading...");
                },
                success: function (response) {
                    if (response.status === "success") {

                    $("#addVisitorForm")[0].reset();
                    $("#addVisitorModal").modal("toggle");
                    $('.modal-backdrop').hide();

                    $('#visitorTable').load(location.href + ' #visitorTable');

                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500,
                        });


                    } else if (response.status === "failed") {
                        Swal.fire({
                            icon: "error",
                            title: "Failed!",
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                },
                error: function (error) {
                    Swal.fire({
                        icon: "error",
                        title: "Failed!",
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                },
            });
        },
    });

});
</script> --}}


<script>
   $(document).ready(function () {
    new DataTable('#visitorTable', {
        responsive: true,
        ordering: false,
        });

    $('#addVisitorForm').on('submit', function(e){
        e.preventDefault();

        $('.errorMessage').html('');

        let first_name = $('#first_name').val();
        let middle_name = $('#middle_name').val();
        let last_name = $('#last_name').val();
        let person_to_visit = $('#person_to_visit').val();
        let purpose = $('#purpose').val();
        let id_type = $('#id_type').val();

        $.ajax({
            url: "{{ route('visitor.store') }}",
            method: 'POST',
            data: {
                last_name: last_name,
                first_name: first_name,
                middle_name: middle_name,
                person_to_visit: person_to_visit,
                purpose: purpose,
                id_type: id_type,
            },
            success:function(resp){
                if(resp.status == 'success'){
                    $('.modal-backdrop').hide();
                    $('#addVisitorForm')[0].reset();
                    $('#visitorTable').load(location.href + ' #visitorTable');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-right',
                        iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast',
                        },
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'Visitor added successfully',
                    });
                }
            },
            error: function(err){
                $('.errorMessage').html('');
                let error = err.responseJSON;
                $.each(error.errors, function(index, value){
                    $('.errorMessage').append('<span class="text-danger">' + value + '</span><br>');
                });
            }
        });
    });
});


   </script>

<script type="text/javascript">

	function deleteVisitor(id)
	{
      if(confirm("Are you sure to delete visitor's data"))
		{
			$.ajax({

				url:'/admin/delete_visitor/'+id,
				type:'DELETE',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

				success:function(result)
				{
                    $("#"+result['tr']).slideUp("slow");
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    iconColor: 'white',
                    customClass: {
                    popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    })

                    Toast.fire({
                        icon:'success',
                        title: 'Visitor Deleted Successfully',
                    });
				}
			});
		}

	}


</script>
