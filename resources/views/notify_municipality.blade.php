<!DOCTYPE html>
<html>
<head>
    <title>Garbage Notification</title>
</head>
<body>
<h3>New Garbage Notification</h3>
<p>Location coordinates:</p>
<ul>
    <li>Latitude: {{ $latitude }}</li>
    <li>Longitude: {{ $longitude }}</li>
</ul>
<img src="{{$image}}" height="300px" width="200px">
<h3>User Details</h3>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Remarks</th>
    </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{ $user['name'] ?? '----'}}</td>
            <td>{{ $user['phone'] ?? '----' }}</td>
            <td>{{ $user['address'] ?? '----'}}</td>
            <td>{{ $user['remarks'] ?? '----' }}</td>
        </tr>


    </tbody>
</table>
<p>Please address the reported garbage issue.</p>
</body>
</html>
