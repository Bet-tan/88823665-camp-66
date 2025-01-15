<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Controller</title>
</head>
<body>
    <h1>My Controller</h1>
    <h1>myinput: {{ $myinput }}</h1>
    <h1>myvalue: {{ $myvalue }}</h1>
    <form method="post" action="{{ url('/mycontroller') }}">
        @csrf
        <input type="text" name="myinput" placeholder="Enter value">
        <button type="submit">Submit</button>
    </form>
</body>
</html>