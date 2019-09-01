<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>




    </head>
    <body>
        <div class="container">
            <table id="example" class="display">

            </table>


            <ul>
                <li>
                    <a href="{{url('user/create')}}">Create new user</a>
                </li>
            </ul>


        </div>

        <script>

         dataSet = [
             @foreach ($users as $user)
             [
                 "{{ $user->id }}",
                 "{{ $user->firstname }}",
                 "{{ $user->lastname }}",
                 "{{ $user->email }}",
             ],
             @endforeach
         ];


         $(document).ready(function() {
             $('#example').DataTable( {
                 data: dataSet,
                 columns: [
                     { title: "ID" },
                     { title: "First Name" },
                     { title: "Last Name" },
                     { title: "Email" },
                 ]
             } );
         } );
        </script>

    </body>
</html>
