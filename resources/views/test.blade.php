<!-- resources/views/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Java Code Runner</title>
</head>
<body>
<h1>Java Code Runner</h1>

<form action="{{ route('run-code') }}" method="post">
    @csrf
    <label for="javaCode">Enter Java Code:</label><br>
    <textarea name="javaCode" rows="10" cols="100">class Main
{
    public static void main(String []args)
    {
        System.out.println("My First Java Program.");
    }
};
    </textarea>
    <br>
    <button type="submit">Run Code</button>
</form>

@if(\Session::has('result'))
    <h2>Result:</h2>
    <pre>{{ \Session::get('result') }}</pre>
@endif
</body>
</html>
