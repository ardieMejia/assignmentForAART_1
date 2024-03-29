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


            <h1>Fill in user details below</h1>

            <form action="{{route('user/update',$user->id)}}" method="post">
                {{csrf_field()}}

                <input type="hidden" name="_method" value="PUT" />

                First Name:<br/>
                <input type="text" name="firstname" value="{{$user->firstname}}"/>
                <br/>

                Last Name:<br/>
                <input type="text" name="lastname" value="{{$user->lastname}}"/>
                <br/>

                Email:<br/>
                <input type="email" name="email" value="{{$user->email}}"/>
                <br/>

                Password:<br/>
                <input type="password" name="password" required/>
                <br/>

                Status:<br/>
                <input type="radio" name="status" value="active" @php  if(!empty($user->status)) echo "checked"@endphp/> active <br/>

                <input type="radio" name="status" value="inactive" @php  if(empty($user->status)) echo "checked"@endphp/> inactive
                <br/>



                <br/>
                <br/>
                <br/>
                <input type="submit" value="Save" />

            </form>

        </div>




    </body>
</html>
