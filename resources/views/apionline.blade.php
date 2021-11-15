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
    <title>Doa harian</title>
</head>

<body>

    <div class="container text-center pading">
        <h1>Doa Harian</h1>
        <a href="{{ route('post') }}">Post Data</a>
    </div>

    <div class="container pd">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">kategori id</th>
                    <th scope="col">image</th>
                    <th scope="col">nama wisata</th>
                    <th scope="col">slug</th>
                    <th scope="col">harga</th>
                    <th scope="col">deskripsi</th>
                    <th scope="col">kota</th>
                    <th scope="col">provinsi</th>
                    <th scope="col">alamat</th>
                    <th scope="col">waktu buka</th>
                    <th scope="col">latitude</th>
                    <th scope="col">longitude</th>

                    <th scope="col">created at</th>
                    <th scope="col">updated at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td scope="row">{{ $d['id'] }}</td>
                        <td>{{ $d['kategori_id'] }}</td>
                        <td>
                            <img src="<?php echo $d['image']; ?>" alt=""
                                style="max-width: 100px !important; border-radius:5px;">
                        </td>
                        <td>{{ $d['nama_wisata'] }}</td>
                        <td>{{ $d['slug'] }}</td>
                        <td> Rp. {{ $d['harga'] }}</td>
                        <td>{{ $d['deskripsi'] }}</td>
                        <td>{{ $d['kota'] }}</td>
                        <td>{{ $d['provinsi'] }}</td>
                        <td>{{ $d['alamat'] }}</td>
                        <td>{{ $d['waktu_buka'] }}</td>
                        <td>{{ $d['latitude'] }}</td>
                        <td>{{ $d['longitude'] }}</td>

                        <td>{{ $d['created_at'] }}</td>
                        <td>{{ $d['updated_at'] }}</td>
                        {{-- <td> Rp .{{ $d[number_format('harga')] }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
