<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')

    <style type="text/css">
        .form-container {
            width: 600px;
            margin: auto;
            background: #1b1b1b;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
        }

        .form-title {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        label {
            width: 180px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .desc_box {
            height: 200px;
        }

        input,
        textarea,
        select {
            flex: 1;
            padding: 8px;
            border-radius: 5px;
            border: none;
        }

        textarea {
            height: 80px;
        }

        .submit-btn {
            text-align: center;
            margin-top: 20px;
        }

        .submit-btn input {
            padding: 10px 30px;
            font-size: 16px;
        }
    </style>

</head>

<body>

    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="form-container">

                    <div class="form-title">
                        Update Room
                    </div>

                    <form action="{{ url('edit_room', $data->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Room Title</label>
                            <input type="text" name="title" value="{{ $data->room_title }}" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="desc_box" name="description" required>{{ $data->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" value="{{ $data->price }}" required>
                        </div>

                        <div class="form-group">
                            <label>Room Type</label>
                            <select name="type">
                                <option value="regular" {{ $data->room_type == 'regular' ? 'selected' : '' }}>Regular
                                </option>
                                <option value="premium" {{ $data->room_type == 'premium' ? 'selected' : '' }}>Premium
                                </option>
                                <option value="deluxe" {{ $data->room_type == 'deluxe' ? 'selected' : '' }}>Deluxe
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Free Wifi</label>
                            <select name="wifi">
                                <option value="yes" {{ $data->wifi == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ $data->wifi == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Current Image</label>
                            <img width="100" src="/room/{{ $data->image }}">
                        </div>

                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="submit-btn">
                            <input type="submit" value="Update Room" class="btn btn-primary">
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

    @include('admin.footer')

</body>

</html>