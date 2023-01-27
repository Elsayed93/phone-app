<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phones</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <table class="table" id="phones_table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Country</th>
                        <th scope="col">State</th>
                        <th scope="col">Code</th>
                        <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#phones_table').DataTable({
                language: {
                    searchPlaceholder: "Search Phone Number"
                },
                processing: true,
                serverSide: true,
                "dom": "flrtip",
                ajax: "{{ route('phones.data') }}",
                "columns": [{
                        "searchable": false,
                        "sortable": false,
                        "data": "DT_RowIndex"
                    },
                    {
                        "searchable": false,
                        "sortable": false,
                        "data": "country",
                        render: function(country) {
                            return country.country_name;
                        }
                    },
                    {
                        "searchable": false,
                        "sortable": false,
                        "data": "state",
                    },
                    {
                        "searchable": false,
                        "sortable": false,
                        "data": "country",
                        render: function(country) {
                            return country.country_code;
                        }
                    },
                    {
                        "data": "number",
                    },
                ]
            });
        });
    </script>
</body>

</html>