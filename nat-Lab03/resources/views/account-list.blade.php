<body>
    <h1>Account-List</h1>
    <hr/>
    <table border="1px" cellspacing="0" cellpadding="5">
    <thead>
    <tr>
    <th>#</th>
    <th>UserName</th>
    <th>Password</th>
    <th>FullName</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $item)
    <tr>
    <td>{{$item['id']}}</td>
    <td>{{$item['UserName']}}</td>
    <td>{{$item['Password']}}</td>
    <td>{{$item['FullName']}}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </body>