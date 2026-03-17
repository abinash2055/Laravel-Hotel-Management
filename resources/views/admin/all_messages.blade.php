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

        .table_deg {
            border: 2px solid white;
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 40px;
        }

        .th_deg {
            background-color: skyblue;
            padding: 15px;
        }

        tr {
            border: 3px solid white;
        }

        td {
            padding: 10px;
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
                <table class="table_deg">

                    <tr>
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Message</th>
                        <th class="th_deg">Send Email</th>
                    </tr>

                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->message }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ url('send_mail', $data->id) }}">Send Email</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- body section  -->

    <!-- Footer  -->
    @include('admin.footer')
    <!-- Footer  -->
</body>

</html>