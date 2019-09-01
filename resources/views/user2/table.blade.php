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

dataSet = [
    {"id": "1", "firstname": "whatever", "lastname": "haha", "email": "someshit@yahoo.com"},
    {"id": "3", "firstname": "whatever", "lastname": "haha", "email": "someshit@yahoo.com"},
    {"id": "4", "firstname": "whatever", "lastname": "haha", "email": "someshit@yahoo.com"},
    {"id": "11", "firstname": "whatever", "lastname": "haha", "email": "someshit@yahoo.com"},
]


         $(document).ready(function() {
             $('#example').DataTable( {
                 data: dataSet,
                 columns: [
                     { data: "id" },
                     { data: "firstname" },
                     { data: "lastname" },
                     { data: "email" },
                     { data: null },
                     { data: null },
                 ],
                 "columnDefs": [
                     {
                     "targets": -1,
                         "render": function (data, type, row){
                             // failed to use route here, instead use this
                             editHTMLstring = '<a href="/user/'+row.id+'/edit">some link</a>';
                             return editHTMLstring;
                         }
                     },
                     {
                         "targets": -2,
                         "render": function (data, type, row){
                             // failed to use route here, instead use this

                             // Javascript template literals

                             var deleteHTMLstring = `
                                 <form method="post" action="/user/${row.id}">
                                 {{csrf_field()}}
                                 <input type="hidden" />
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="submit" value="delete"/>
                                 </form>              
                             `;
                             return deleteHTMLstring;
                         }
                     }
                 ]

             } );
         } );
        </script>

    </body>
</html>
