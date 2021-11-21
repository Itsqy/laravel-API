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

    <div class="container pd">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone </th>
                    <th scope="col">address </th>
                    <th scope="col">created at</th>
                    <th scope="col">updated at</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td scope="row">{{ $response['result']['id'] }}</td>
                    <td>{{ $response['result']['name'] }}</td>
                    <td>{{ $response['result']['email'] }}</td>
                    <td>{{ $response['result']['telp'] }}</td>
                    <td> {{ $response['result']['address'] }}</td>
                    {{-- <td>{{ $response['result']['img'] }}</td> --}}
                    <td>{{ $response['result']['created_at'] }}</td>
                    <td>{{ $response['result']['updated_at'] }}</td>
                    <td><a href="{{ route('edit', $response['result']['id']) }}">edit </a></td>
                    {{-- <td> Rp .{{ $d[number_format('harga')] }}</td> --}}
                </tr>

            </tbody>
        </table>
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
