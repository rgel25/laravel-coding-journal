<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Coding Journal in Laravel</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="container p-5">
            <div class="row">
            @if(session()->get('success'))
            <div class="alert alert-success text-center">
                {{session()->get('success')}}
            </div>
        @endif
                <div class="col-md-6 offset-md-3">
                    <div class="card" style="width: 100%">
                        <img
                            src="https://images.pexels.com/photos/606541/pexels-photo-606541.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            class="card-img-top"
                            style="height: 200px; object-fit: cover"
                            alt="..."
                        />

                        <div class="card-body">
                            <h5 class="card-title text-center">
                                My Coding Journal
                            </h5>
                            <form class="needs-validation" novalidate method="POST" action="{{ route('entries.store') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="task"
                                        >Add a new entry or task</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="task"
                                        placeholder="Enter entry or task here"
                                        autofocus
                                        name="task"
                                        required
                                    />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="taskDate"
                                        >Enter date of task or entry</label
                                    >
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="taskDate"
                                        placeholder="date"
                                        required
                                        name="taskDate"
                                    />
                                    <input
                                        type="hidden"
                                        name="isDone"
                                        value="0"
                                    />
                                </div>
                                <div class="d-grid">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Entries</h5>
                            <ul class="list-group list-group-flush">
                                @if(count($entries)>1) @foreach($entries as
                                $entry) 
                                @if($entry->isDone === 1)
                                <li class="list-group-item text-decoration-line-through">
                                 @else
                                <li class="list-group-item">
                                @endif
                                    {{$entry->task}}
                                    {{$entry->taskDate}}
                                    {{$entry->isDone}}
                                    
                                    <a href="/entries/{{$entry->id}}/edit" class="btn btn-success btn-sm ms-3"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('entries.destroy', $entry->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="type" value="thought">
                                <button type="submit" class="btn btn-danger btn-sm ms-3"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <p class="card-text">No Entries Yet...</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"
        ></script>
        <script>
            (() => {
                "use strict";

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                const forms = document.querySelectorAll(".needs-validation");

                // Loop over them and prevent submission
                Array.from(forms).forEach((form) => {
                    form.addEventListener(
                        "submit",
                        (event) => {
                            if (!form.checkValidity()) {
                                event.preventDefault();
                                event.stopPropagation();
                            }

                            form.classList.add("was-validated");
                        },
                        false
                    );
                });
            })();
        </script>
    </body>
</html>
