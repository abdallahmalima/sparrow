<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>List Of Services</h1>

<table id="customers">
  <tr>
    <th>id</th>
    <th>title</th>
    <th>description</th>
  </tr>
  @foreach ($services as $service)
  <tr>
    <td>{{ $service->id }}</td>
    <td>{{  Str::limit($service->title,39)  }}</td>
    <td>{{ Str::limit($service->description,39) }}</td>
  </tr> 
  @endforeach
  
</table>

</body>
</html>


