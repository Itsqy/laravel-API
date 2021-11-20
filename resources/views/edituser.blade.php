<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .pading {
            padding-top: 100px;
        }

        .pd {
            padding-top: 30px;
            padding-bottom: 100px;
        }

    </style>
    <title>data user</title>
</head>



<body>

    <div class="container text-center pading">
        <h1>data user</h1>
        <a href="{{ route('post') }}">Post Data</a>
        <br>

        <br>

    </div>

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ $title }}</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $title }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{ $title }} </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('editpost') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="row">
                                    <div class="col-md-1"></div>

                                    <div class="col-md-6">

                                        <div class="form">

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>Nama :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <input type="text" name="name" class="form-control input-fixed"
                                                        id="exampleInputPassword1">
                                                </div>
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>email :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <input type="text" name="email" class="form-control input-fixed"
                                                        id="exampleInputPassword1">
                                                </div>
                                            </div>



                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>phone :</label>
                                                    <input type="text" name="telp" class="form-control input-fixed"
                                                        id="exampleInputPassword1">
                                                </div>

                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>address :</label>
                                                </div>
                                                <input type="text" name="address" class="form-control input-fixed"
                                                    id="exampleInputPassword1">
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>photo :</label>
                                                </div>
                                                <input type="text" name="photo" class="form-control input-fixed"
                                                    id="exampleInputPassword1">
                                            </div>



                                        </div>




                                    </div>



                                    <div class="card-footer">
                                        <div class="form">
                                            <div class="form-group from-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-12">

                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <button id="displayNotif" type="submit"
                                                        class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</body>

</html>
