<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#">Hidden brand</a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Your Product</h1>
                    @if (session('deleting'))
                        <div class="alert alert-danger">
                            <p>Product Deleting Successfully!</p>
                        </div>
                    @endif
                    <table class="table table-striped-columns">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Serial No</th>
                                <th scope="col">What to do</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($all_products as $product)
                                {{--      <p>{{ $product }}</p> --}}
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <a href="{{ url('product/delete') }}/{{ $product->id }}"
                                            class="btn btn-info">Done</a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>

                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="{{ url('product/alldelete') }}" class="btn btn-danger">Delete All</a>
                        <a href="{{ url('product/restore') }}" class="btn btn-warning">Make All Restore</a>
                        <a href="{{ url('product/permanent/delete') }}" class="btn btn-warning">Permanent Delete</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <h3>Insert Product</h3>
                    <div class="proudct-error">
                        @if (session('success'))
                            <div class="alert alert-success">Product addede Successfully</div>
                        @endif
                    </div>
                    <form class="row g-3" method="POST" action="product/insert">
                        @csrf
                        <div class="col-md-8">
                            <label for="inputEmail4" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="name">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-success mt-4">Add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
