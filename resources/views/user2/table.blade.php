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


        <style>
         .mynav{
             margin-bottom:30px;
         }
         .mynav a{
             float:left;
             padding: 14px 16px;
             border-bottom: 3px solid transparent;
         }
         .mynav a:hover{
             border-bottom: 3px solid red;
         }

        </style>



    </head>
    <body>
        <div class="container">

            <!-- header section -->
            <h1>Assignment</h1>

            <nav class="navbar navbar-light bg-light mynav">
                <a href="{{url('user/create')}}" class="navbar-brand">Create new user</a>
                <a href="{{url('user2')}}" class="navbar-brand">New Home Page</a>
            </nav>
            <!-- end header section -->

            <table id="example" class="display">

            </table>



        </div>

        <script>

         dataSet = [
             @foreach ($users as $user)
             {
                 "id": "{{ $user->id }}",
                 "firstname": "{{ $user->firstname }}",
                 "lastname": "{{ $user->lastname }}",
                 "email": "{{ $user->email }}",
             },
             @endforeach
         ];

         /* dataSet = [
          *     {"id": "1", "firstname": "whatever", "lastname": "haha", "email": "someshit@yahoo.com"},
          *     {"id": "3", "firstname": "whatever", "lastname": "haha", "email": "someshit@yahoo.com"},
          *     {"id": "4", "firstname": "whatever", "lastname": "haha", "email": "someshit@yahoo.com"},
          *     {"id": "11", "firstname": "whatever", "lastname": "haha", "email": "someshit@yahoo.com"},
          * ] */


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
