<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1>Hello world, a post has been created</h1>
    <p>title: {{ $post->title }}</p>
    <p>content: {{ $post->content }}</p>
</body>
</html>

<style>
    body {
        background-color: #f5f5f5;
        font-family: sans-serif;
        padding: 40px;
        display: flex;
        justify-content: center;
        align-content: center;
    }

    h1 {
        text-align: center;
        color: #333;
        text-transform: uppercase;
        font-size: 2em;
    }
</style>
