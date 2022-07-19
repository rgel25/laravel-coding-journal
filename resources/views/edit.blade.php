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
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
    </head>
    <body>
        <div class="container p-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card" style="width: 100%">
                        <img
                            src="https://images.pexels.com/photos/606541/pexels-photo-606541.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            class="card-img-top"
                            style="height: 200px; object-fit: cover"
                            alt="..."
                        />

                        <div class="card-body">
                            <h5 class="card-title text-center">Edit task</h5>
                            <form
                                class="needs-validation"
                                novalidate
                                method="POST"
                                action="{{Route('entries.update', $entry->id)}}"
                            >
                                @csrf   @method('PATCH')
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
                                        value="{{$entry->task}}"
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
                                        value="{{$entry->taskDate}}"
                                    />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Status</label>
                                    <select
                                        class="form-select"
                                        aria-label="Default select example"
                                        name="isDone"
                                    >
                                        @if($entry->isDone === 1)
                                        <option value="1" selected>Done</option>
                                        <option value="0">Not Done</option>
                                        @else
                                        <option value="0" selected>Not Done</option>
                                        <option value="1">Done</option>
                                        @endif
                                    </select>
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
