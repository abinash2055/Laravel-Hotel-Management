<!DOCTYPE html>
<html>

<!-- head  -->

<head>
    @include('admin.css')
    <style type="text/css">
        .table-container {
            width: 90%;
            margin: auto;
            margin-top: 40px;
        }

        .table_deg {
            width: 100%;
            border-collapse: collapse;
            background-color: #1f1f1f;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.4);
        }

        .table_deg th {
            background: #29043f;
            color: white;
            font-size: 16px;
            padding: 15px;
            text-transform: uppercase;
        }

        .table_deg td {
            padding: 12px;
            border-bottom: 1px solid #444;
        }

        .table_deg tr {
            transition: 0.3s;
        }

        .table_deg tr:hover {
            background-color: #2d2d2d;
        }

        .room_img {
            border-radius: 6px;
            border: 2px solid #ddd;
        }

        .title_text {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<!-- head  -->

<body>
    <!-- Header  -->
    @include('admin.header')
    <!-- Header  -->

    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->

    <!-- body section  -->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="table-container">

                    <div class="title_text">
                        All Rooms
                    </div>

                    <table class="table_deg">

                        <tr>
                            <th>Room Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Wifi</th>
                            <th>Room Type</th>
                            <th>Image</th>
                            <th>Delete</th>
                        </tr>

                        @foreach($data as $data)

                            <tr>
                                <td>{{ $data->room_title }}</td>
                                <td> {{ Str::limit($data->description, 150) }}</td>
                                <td> ${{ $data->price }}</td>
                                <td> {{ $data->wifi }}</td>
                                <td>{{ $data->room_type }} </td>
                                <td>
                                    <img class="room_img" width="120" src="room/{{ $data->image }}">
                                </td>
                                <td>
                                    <form action="{{ route('room_delete', $data->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this room?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </table> </div>
                </div>
            </div>
        </div>
        <!-- body section  -->

        <!-- Footer  -->
        @include('admin.footer')
        <!-- Footer  -->
</body>

</html>