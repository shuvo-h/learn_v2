<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cars</title>
</head>
<body>
    <div>
        <h2>My car page</h2>
        <div>
            <h4>User Info</h4>
            <p>First Name: {{$user_name}} </p>
            <p>Sure Name:  {{$surname}}</p>
        </div>

        <p>conditionsl text</p>
    
        @if(count($hobbies) > 3)
            <p>He has more hobbies<p>
            @elseif(count($hobbies) === 0)
            <p>He has no hobbies<p>
            @else
            <p>He has only one two or less hobbies<p>
        @endif
        
        <hr>
        @include("shared.button",['color'=>'skyblue','text'=>'click me'])

    </div>

    <script>
        const hobbies = {{\Illuminate\Support\Js::from($hobbies)}}
        console.log(hobbies);
        
    </script>

</body>
</html>