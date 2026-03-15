<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #eef2f7, #ffffff);
        }

        /* Main Section Title */
        .section-title {
            font-size: 42px;
            font-weight: 700;
            color: #1f3c88;
            letter-spacing: 1px;
        }

        .section-subtitle {
            font-size: 18px;
            color: #6c757d;
        }

        .title-divider {
            width: 90px;
            height: 4px;
            background: #0d6efd;
            margin: 15px auto;
            border-radius: 10px;
        }

        /* Room Card */
        .room-box {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .room-image img {
            width: 100%;
            height: 380px;
            object-fit: cover;
        }

        .room-details {
            padding: 30px;
        }

        .room-title {
            font-size: 30px;
            font-weight: 700;
            color: #2c3e50;
        }

        .room-description {
            font-size: 16px;
            color: #6c757d;
        }

        /* Price */
        .room-price {
            font-size: 28px;
            font-weight: 700;
            color: #0d6efd;
        }

        /* Booking Card */
        .booking-box {
            background: linear-gradient(145deg, #ffffff, #f1f5ff);
            border-radius: 15px;
            padding: 35px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        }

        .booking-title {
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 25px;
        }

        .booking-box label {
            font-weight: 600;
        }

        .booking-box input {
            border-radius: 8px;
        }

        .book-btn {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border-radius: 8px;
        }

        /* badges */
        .room-badge {
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 14px;
            margin-right: 8px;
        }

        /* hover */
        .room-box:hover {
            transform: translateY(-6px);
            transition: 0.3s;
        }
    </style>
</head>


<body class="main-layout">
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif"></div>
    </div>

    <header>
        @include('home.header')
    </header>

    <div class="our_room py-5">
        <div class="container">
            <div class="row mb-5 text-center">
                <h2 class="section-title">Room Details</h2>
                <p class="section-subtitle">
                    Below is Hotel room Description
                </p>
                <div class="title-divider"></div>
            </div>

            <div class="row">
                <!-- ROOM SECTION -->
                <div class="col-md-8">
                    <div class="room-box">
                        <div class="room-image">
                            <img src="/room/{{$room->image}}">
                        </div>
                        <div class="room-details">
                            <h2 class="room-title">{{$room->room_title}}</h2>
                            <p class="room-description mt-3">
                                {{$room->description}}
                            </p>
                            <div class="mt-3">
                                <span class="badge bg-success room-badge">
                                    WiFi : {{$room->wifi}}
                                </span>
                                <span class="badge bg-dark room-badge">
                                    Room Type : {{$room->room_type}}
                                </span>
                            </div>
                            <div class="mt-4 room-price">
                                Price : ${{$room->price}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BOOKING FORM -->
                <div class="col-md-4">
                    <div class="booking-box">
                        <h2 class="booking-title">Book Room</h2>
                        <div>
                            @if(session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session()->get('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session()->get('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                        </div>

                        @if($errors)
                            @foreach($errors->all() as $errors)
                                <li style="color:red">
                                    {{ $errors }}
                                </li>
                            @endforeach
                        @endif

                        <form action="{{ url('add_booking', $room->id) }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" @if(Auth::id()) value={{ Auth::user()->name }} @endif>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" @if(Auth::id()) value={{ Auth::user()->email }} @endif>
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input class="form-control" type="number" name="phone" @if(Auth::id()) value={{ Auth::user()->phone }} @endif>
                            </div>
                            <div class="mb-3">
                                <label>Start Date</label>
                                <input class="form-control" type="date" name="startDate" id="startDate">
                            </div>

                            <div class="mb-3">
                                <label>End Date</label>
                                <input class="form-control" type="date" name="endDate" id="endDate">
                            </div>
                            <div class="mt-4">
                                <input type="submit" class="btn btn-primary book-btn" value="Book Room">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('home.footer')


    <script>
        $(function () {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (day < 10)
                day = '0' + day;

            if (month < 10)
                month = '0' + month;

            var maxDate = year + '-' + month + '-' + day;

            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>

</html>