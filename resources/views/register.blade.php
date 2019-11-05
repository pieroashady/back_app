<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>

<body>
    <div class="container mt-8">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Please fill your registration form</div>

                    <div class="card-body mb-3">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="title">Username:</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Input username..." aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                                <label for="body">Email:</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Your email..." aria-describedby="helps">
                            </div>

                            <div class="form-group">
                                <label for="body">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Your password..." aria-describedby="helps">
                            </div>

                            <button type="submit" name="submit" id="submitForm" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        // $(function() {

        //     $('form').on('submit', function(e) {

        //         e.preventDefault();

        //         $.ajax({
        //             type: 'post',
        //             url: '/create_programmer',
        //             data: $('form').serialize(),
        //             success: function() {
        //                 alert('form was submitted');
        //             }
        //         });

        //     });

        // });
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                e.preventDefault();

                swal({
                    title: 'Register?',
                    text: 'Proceed with your input?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        saveAjax();
                        swal('Regis success!', {
                            icon: 'success'
                        });
                    } else {
                        swal('Come back again ! :)');
                    }
                });

                function saveAjax() {
                    try {
                        $.ajax({
                            type: 'POST',
                            url: '/register_user',
                            data: $('form').serialize(),
                            success: function() {
                                console.log("submitted");
                                setInterval(() => {
                                    location.reload();
                                }, 5000);
                                // location.reload(true);
                            }
                        });
                    } catch (err) {
                        err.message;
                    }
                }
            });
        });
    </script>
</body>

</html>