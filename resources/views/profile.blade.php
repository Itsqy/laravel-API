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
    <title>profile</title>
</head>



<body>

    <div class="container text-center pading">
        <h1>My profile</h1>
        <a href="{{ route('doa') }}">way back home, eaaa</a>
        <br>

        <br>

    </div>
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center"> <button
                    class="btn btn-secondary"> <img src="https://i.imgur.com/wvxPV9S.png" height="100"
                        width="100" /></button> <span class="name mt-3">{{ $response['result']['name'] }}</span>
                <span class="idd">{{ $response['result']['email'] }}</span>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span
                        class="idd1">my id:</span>{{ $response['result']['id'] }} <span><i
                            class="fa fa-copy"></i></span> </div>
                <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span
                        class="number">{{ $response['result']['telp'] }} </span> </div>
                <div class=" d-flex mt-2"> <button class="btn1 btn-dark"><a
                            href="{{ route('edit', $response['result']['id']) }}">Edit cu</a></button> </div>
                <div class="text mt-3">my photo :<span>{{ $response['result']['photo'] }}</span> </div>
                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i
                            class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i
                            class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div>
                <div class=" px-2 rounded mt-4 date ">created at <span
                        class="join">{{ $response['result']['created_at'] }}</span> </div>
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
