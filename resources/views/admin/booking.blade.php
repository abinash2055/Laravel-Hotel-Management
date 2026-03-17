<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        body {
            background: linear-gradient(135deg, #0f172a, #020617);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Scroll on mobile */
        .container-fluid {
            overflow-x: auto;
            padding-bottom: 20px;
        }

        /* Table */
        .table_deg {
            width: 100%;
            min-width: 1000px;
            border-collapse: collapse;
            background: rgba(17, 24, 39, 0.95);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            text-align: center;
        }

        /* Header */
        .table_deg th,
        .th_deg {
            background: linear-gradient(135deg, #6366f1, #9333ea);
            color: #fff;
            font-size: 13px;
            padding: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Cells */
        .table_deg td {
            padding: 12px;
            color: #e5e7eb;
            font-size: 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Row hover */
        .table_deg tr {
            transition: all 0.3s ease;
        }

        .table_deg tr:hover {
            background: rgba(99, 102, 241, 0.08);
            transform: scale(1.01);
        }

        /* Image */
        .room_img {
            width: 200px;
            height: 120px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            transition: 0.4s;
        }

        .room_img:hover {
            transform: scale(1.1) rotate(1deg);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
        }

        /* Buttons */
        .btn {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #b91c1c);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #22c55e, #15803d);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #facc15, #ca8a04);
            color: black;
        }

        .btn:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }

        /* Badges */
        .badge {
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .badge-success {
            background: linear-gradient(135deg, #22c55e, #15803d);
            color: white;
        }

        .badge-danger {
            background: linear-gradient(135deg, #ef4444, #991b1b);
            color: white;
        }

        .badge-warning {
            background: linear-gradient(135deg, #facc15, #ca8a04);
            color: black;
        }

        /* Title */
        .title_text {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #e5e7eb;
            letter-spacing: 1px;
        }

        /* Responsive */
        @media (max-width: 768px) {

            .table_deg {
                min-width: 900px;
            }

            .table_deg th,
            .table_deg td {
                font-size: 11px;
                padding: 6px;
            }

            .room_img {
                width: 120px;
                height: 80px;
            }

            .btn {
                font-size: 10px;
                padding: 4px 8px;
            }

            .badge {
                font-size: 10px;
                padding: 3px 6px;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    @include('admin.header')

    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Body -->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <table class="table_deg">
                    <tr>
                        <th class="th_deg">Room id</th>
                        <th class="th_deg">Customer Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Arrival Date</th>
                        <th class="th_deg">Leaving Date</th>
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Status</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Status Update</th>
                    </tr>
                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->room_id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->start_date }}</td>
                            <td>{{ $data->end_date }}</td>
                            <td>{{ $data->room?->room_title }}</td>
                            <td>
                                @if ($data->status == 'Approved')
                                    <span class="badge badge-success">{{ $data->status }}</span>
                                @elseif ($data->status == 'Rejected')
                                    <span class="badge badge-danger">{{ $data->status }}</span>
                                @else
                                    <span class="badge badge-warning">{{ $data->status }}</span>
                                @endif
                            </td>
                            <td>{{ $data->room?->price }}</td>
                            <td>
                                <img src="/room/{{ $data->room?->image }}" class="room_img">
                            </td>
                            <td>
                                <form action="{{ url('delete_booking', $data->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this booking?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            <td>
                                <span>
                                    <form action="{{ url('approve_book', $data->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit" class="btn btn-success">
                                            Approve
                                        </button>
                                    </form>
                                </span>
                                <a class="btn btn-warning" href="{{ url('reject_book', $data->id) }}">
                                    Rejected
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('admin.footer')

</body>

</html>