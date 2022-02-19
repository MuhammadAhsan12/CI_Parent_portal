<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/b4f9c5aa33.js" crossorigin="anonymous"></script>
    <!-- Toastr -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" />
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/cropped-cedar-school-college-logo.png" style="width : 70px;" alt="Logo" class="img-fluid" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            View More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Web Development</a></li>
                            <li><a class="dropdown-item" href="#">Web Designing</a></li>
                            <li><a class="dropdown-item" href="#">Android Development</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>

                <div class="d-flex">
                    <h5 class="" style="color:aliceblue; margin-top: 10px"><?php $getdata = $this->session->userdata('login'); ?><i class="fa-solid fa-user"></i><?php echo  " " . $getdata['name']; ?></h5>
                    <button class="btn btn-light ms-3 button logbutton" href="javascript:void(0);" onclick="logout();">Logout</button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">
                    Student Portal
                </h1>
                <hr style="background-color: black; color: black; height: 1px;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-2">
                <!-- Add Records Modal -->
                <!-- Button trigger modal -->
                <button href="javascript:void(0);" onclick="showModal();" type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Add Student
                </button>


            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="table-responsive">
                    <table class="table" id="records">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Dob</th>
                                <th>address</th>
                                <th>Subject</th>
                                <th>Campus</th>
                                <!-- <th>Join Date</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- model -->

    <div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="header-text" class="fs-4 card-title fw-bold mb-4 text-center"></h1>
                    <div id="alert">

                    </div>
                </div>
                <div class="modal-body">
                    <div id="response">

                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-danger button-hide-show ms-auto" onclick="deleteNow()" style="margin:20px 90px;">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
    <!-- DataTables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

    <!-- Sweet Alert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script type="text/javascript">
        $(".button-hide-show").hide();
        $(".listhidden").hide();

        function fetch() {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/Teacher/Student/fetch",
                type: "post",
                dataType: "json",
                success: function(data) {
                    if (data.responce == "success") {

                        var i = "1";
                        $('#records').DataTable({
                            "data": data.posts,
                            "responsive": true,
                            dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                                "<'row'<'col-sm-12'tr>>" +
                                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                            buttons: [
                                'copy', 'excel', 'pdf'
                            ],
                            "columns": [{
                                    "render": function() {
                                        return a = i++;
                                    }
                                },
                                {
                                    "data": "stdid"
                                },
                                {
                                    "data": "name"
                                },
                                {
                                    "data": "email"
                                },
                                {
                                    "data": "phone"
                                },
                                {
                                    "data": "dob"
                                },
                                {
                                    "data": "address"
                                },
                                {
                                    "data": "subject"
                                },
                                {
                                    "data": "campus"
                                },
                                // {
                                //     "data": "join_date"
                                // },
                                {
                                    "render": function(data, type, row, meta) {
                                        var a = `
                                    <a href="javascript:void(0);" onClick="confirm_delete(${row.id})"  class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                    <a href="javascript:void(0);" onclick="editForm(${row.id})" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                            `;
                                        return a;
                                    }
                                }
                            ]
                        });
                    } else {
                        toastr["error"](data.message);
                    }

                }
            });

        }

        fetch();


        function logout() {

            $.ajax({
                url: '<?php echo base_url() . 'index.php/Teacher/User/logout' ?>',
                type: 'POST',
                data: {},
                dataType: 'json',
                success: function(response) {
                    window.location.href = "<?php echo site_url('Welcome'); ?>";
                }
            })
        }

        function showModal() {
            $("#addStudent").modal("show");
            $("#alert").html("");
            $(".button-hide-show").hide();
            $("#header-text").html('Add Student');

            $.ajax({
                url: '<?php echo base_url() . 'index.php/Teacher/Student/ShowAddForm' ?>',
                type: 'POST',
                data: {},
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    $("#response").html(response["html"])
                }
            })
        }

        $("body").on("submit", "#studentRegester", function(e) {
            $(".button-hide-show").hide();
            e.preventDefault();
            $("#alert").html("");
            // alert(); 

            $.ajax({
                url: '<?php echo base_url() . 'index.php/Teacher/Student/saveModel' ?>',
                type: 'POST',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                    if (response["status"] == 0) {
                        if (response["stdid"] != "") {
                            $(".stdidError").html(response["stdid"]).addClass("invalid-feedback d-block");
                            $("#stdid").addClass("is-invalid");
                        } else {
                            $(".stdidError").html("").removeClass("invalid-feedback d-block");
                            $("#stdid").removeClass("is-invalid");
                        }

                        if (response["name"] != "") {
                            $(".nameError").html(response["name"]).addClass("invalid-feedback d-block");
                            $("#name").addClass("is-invalid");
                        } else {
                            $(".nameError").html("").removeClass("invalid-feedback d-block");
                            $("#name").removeClass("is-invalid");
                        }

                        if (response["email"] != "") {
                            $(".emailError").html(response["email"]).addClass("invalid-feedback d-block");
                            $("#email").addClass("is-invalid");
                        } else {
                            $(".emailError").html("").removeClass("invalid-feedback d-block");
                            $("#email").removeClass("is-invalid");
                        }

                        if (response["phone"] != "") {
                            $(".phoneError").html(response["phone"]).addClass("invalid-feedback d-block");
                            $("#phone").addClass("is-invalid");
                        } else {
                            $(".phoneError").html("").removeClass("invalid-feedback d-block");
                            $("#phone").removeClass("is-invalid");
                        }

                        if (response["birthday"] != "") {
                            $(".birthdayError").html(response["birthday"]).addClass("invalid-feedback d-block");
                            $("#birthday").addClass("is-invalid");
                        } else {
                            $(".birthdayError").html("").removeClass("invalid-feedback d-block");
                            $("#birthday").removeClass("is-invalid");
                        }

                        if (response["address"] != "") {
                            $(".addressError").html(response["address"]).addClass("invalid-feedback d-block");
                            $("#address").addClass("is-invalid");
                        } else {
                            $(".addressError").html("").removeClass("invalid-feedback d-block");
                            $("#address").removeClass("is-invalid");
                        }

                        if (response["subject"] != "") {
                            $(".subjectError").html(response["subject"]).addClass("invalid-feedback d-block");
                            $("#subject").addClass("is-invalid");
                        } else {
                            $(".subjectError").html("").removeClass("invalid-feedback d-block");
                            $("#subject").removeClass("is-invalid");
                        }

                        if (response["campus"] != "") {
                            $(".campusError").html(response["campus"]).addClass("invalid-feedback d-block");
                            $("#campus").addClass("is-invalid");
                        } else {
                            $(".campusError").html("").removeClass("invalid-feedback d-block");
                            $("#campus").removeClass("is-invalid");
                        }
                    } else {
                        // $("#alert").html(response["message"]);
                        toastr["success"](response["message"]);


                        $(".nameError").html("").removeClass("invalid-feedback d-block");
                        $("#name").removeClass("is-invalid");

                        $(".emailError").html("").removeClass("invalid-feedback d-block");
                        $("#email").removeClass("is-invalid");

                        $(".phoneError").html("").removeClass("invalid-feedback d-block");
                        $("#phone").removeClass("is-invalid");

                        $(".birthdayError").html("").removeClass("invalid-feedback d-block");
                        $("#birthday").removeClass("is-invalid");

                        $(".addressError").html("").removeClass("invalid-feedback d-block");
                        $("#address").removeClass("is-invalid");

                        $(".subjectError").html("").removeClass("invalid-feedback d-block");
                        $("#subject").removeClass("is-invalid");

                        $(".campusError").html("").removeClass("invalid-feedback d-block");
                        $("#campus").removeClass("is-invalid");

                        $(".stdidError").html("").removeClass("invalid-feedback d-block");
                        $("#stdid").removeClass("is-invalid");
                        $("#addStudent").modal("hide");
                        $('#records').DataTable().destroy();
                        fetch();
                        $("#carModelList").append(response["row"])
                    }
                }
            })
        });

        function confirm_delete(id) {
            $("#addStudent").modal("show");
            $("#alert").html("");
            $("#response").html("Are you sure you want to delete ID #" + id + "?");
            $("#response").data('id', id);
            $(".button-hide-show").show();
            $("#header-text").html('Delete Student');
        }

        function deleteNow() {
            var id = $("#response").data('id');
            $("#alert").html("");
            $.ajax({
                url: '<?php echo base_url() . 'index.php/Teacher/Student/DeleteModel/' ?>' + id,
                type: 'POST',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response['status'] == 1) {
                        // $("#response").html(response['msg']);
                        toastr["success"](response["msg"]);
                        $("#addStudent").modal("hide");

                        $("#addStudent").modal("hide");
                        $('#records').DataTable().destroy();
                        fetch();

                    } else {
                        $("#response").html(response['msg']);
                        $("#addStudent").modal("hide");
                    }
                }
            })
        }

        function editForm(id) {
            $("#header-text").html('Edit Student');
            $("#alert").html("");
            $(".button-hide-show").hide();
            $.ajax({
                url: '<?php echo base_url() . 'index.php/Teacher/Student/ShowEditForm/' ?>' + id,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    $("#response").html(response["html"]);

                    // toastr["success"](response["message"]);
                    $("#addStudent").modal("show");
                }
            })
        }

        $("body").on("submit", "#studentEdit", function(e) {
            e.preventDefault();
            $("#alert").html("");
            // alert(); 

            $.ajax({
                url: '<?php echo base_url() . 'index.php/Teacher/Student/updateModel' ?>',
                type: 'POST',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    // $("#response").html(response["html"])
                    if (response["status"] == 0) {
                        if (response["stdid"] != "") {
                            $(".stdidError").html(response["stdid"]).addClass("invalid-feedback d-block");
                            $("#stdid").addClass("is-invalid");
                        } else {
                            $(".stdidError").html("").removeClass("invalid-feedback d-block");
                            $("#stdid").removeClass("is-invalid");
                        }

                        if (response["name"] != "") {
                            $(".nameError").html(response["name"]).addClass("invalid-feedback d-block");
                            $("#name").addClass("is-invalid");
                        } else {
                            $(".nameError").html("").removeClass("invalid-feedback d-block");
                            $("#name").removeClass("is-invalid");
                        }

                        if (response["email"] != "") {
                            $(".emailError").html(response["email"]).addClass("invalid-feedback d-block");
                            $("#email").addClass("is-invalid");
                        } else {
                            $(".emailError").html("").removeClass("invalid-feedback d-block");
                            $("#email").removeClass("is-invalid");
                        }

                        if (response["phone"] != "") {
                            $(".phoneError").html(response["phone"]).addClass("invalid-feedback d-block");
                            $("#phone").addClass("is-invalid");
                        } else {
                            $(".phoneError").html("").removeClass("invalid-feedback d-block");
                            $("#phone").removeClass("is-invalid");
                        }

                        if (response["birthday"] != "") {
                            $(".birthdayError").html(response["birthday"]).addClass("invalid-feedback d-block");
                            $("#birthday").addClass("is-invalid");
                        } else {
                            $(".birthdayError").html("").removeClass("invalid-feedback d-block");
                            $("#birthday").removeClass("is-invalid");
                        }

                        if (response["address"] != "") {
                            $(".addressError").html(response["address"]).addClass("invalid-feedback d-block");
                            $("#address").addClass("is-invalid");
                        } else {
                            $(".addressError").html("").removeClass("invalid-feedback d-block");
                            $("#address").removeClass("is-invalid");
                        }

                        if (response["subject"] != "") {
                            $(".subjectError").html(response["subject"]).addClass("invalid-feedback d-block");
                            $("#subject").addClass("is-invalid");
                        } else {
                            $(".subjectError").html("").removeClass("invalid-feedback d-block");
                            $("#subject").removeClass("is-invalid");
                        }

                        if (response["campus"] != "") {
                            $(".campusError").html(response["campus"]).addClass("invalid-feedback d-block");
                            $("#campus").addClass("is-invalid");
                        } else {
                            $(".campusError").html("").removeClass("invalid-feedback d-block");
                            $("#campus").removeClass("is-invalid");
                        }
                    } else {
                        $("#createCar").modal("hide");
                        $("#AjaxResponseModal .modal-body").html(response["message"]);
                        $("#AjaxResponseModal").modal("show");
                        // $("#alert").html(response["message"]);

                        toastr["success"](response["message"]);

                        $(".nameError").html("").removeClass("invalid-feedback d-block");
                        $("#name").removeClass("is-invalid");

                        $(".emailError").html("").removeClass("invalid-feedback d-block");
                        $("#email").removeClass("is-invalid");

                        $(".phoneError").html("").removeClass("invalid-feedback d-block");
                        $("#phone").removeClass("is-invalid");

                        $(".birthdayError").html("").removeClass("invalid-feedback d-block");
                        $("#birthday").removeClass("is-invalid");

                        $(".addressError").html("").removeClass("invalid-feedback d-block");
                        $("#address").removeClass("is-invalid");


                        $(".subjectError").html("").removeClass("invalid-feedback d-block");
                        $("#subject").removeClass("is-invalid");

                        $(".campusError").html("").removeClass("invalid-feedback d-block");
                        $("#campus").removeClass("is-invalid");

                        $(".stdidError").html("").removeClass("invalid-feedback d-block");
                        $("#stdid").removeClass("is-invalid");

                        var id = response["row"]["id"];
                        $("#row-" + id + " .modeStdid").html(response["row"]["stdid"]);
                        $("#row-" + id + " .modelName").html(response["row"]["name"]);
                        $("#row-" + id + " .modelEmail").html(response["row"]["email"]);
                        $("#row-" + id + " .phoneEmail").html(response["row"]["phone"]);
                        $("#row-" + id + " .dobEmail").html(response["row"]["dob"]);
                        $("#row-" + id + " .addressEmail").html(response["row"]["address"]);
                        $("#row-" + id + " .modelSubject").html(response["row"]["subject"]);
                        $("#row-" + id + " .modelCampus").html(response["row"]["campus"]);

                        $("#addStudent").modal("hide");
                        $('#records').DataTable().destroy();
                        fetch();
                        // window.location.reload();
                    }
                }
            })
        });
    </script>

</body>

</html>