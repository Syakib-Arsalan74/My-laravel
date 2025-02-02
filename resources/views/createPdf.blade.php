<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Blog Pdf</title>
</head>
<body>
  <h1>{{ $title }}</h1>
  <p>author : {{ $author }}</p>
  <p>date : {{ $date }}</p>
  
  <table border="1" cellspacing="0">
    <tr>
      <td>#</td>
      <td>title</td>
      <td>category</td>
      <td>created date</td>
    </tr>
    @foreach ($blogs as $blog)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $blog->title }}</td>
      <td>{{ $blog->category->name }}</td>
      <td>{{ $blog->created_at }}</td>
    </tr>
    @endforeach
  </table>
</body>
</html> 