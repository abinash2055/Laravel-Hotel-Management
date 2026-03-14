<!DOCTYPE html>
<html>

<head>
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
                        Add Room
                    </div>

                    <form action="{{ url('add_room') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label>Room Title</label>
                            <input type="text" name="title" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" required>
                        </div>

                        <div class="form-group">
                            <label>Room Type</label>
                            <select name="type">
                                <option value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="deluxe">Deluxe</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Free Wifi</label>
                            <select name="wifi">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="submit-btn">
                            <input type="submit" value="Add Room" class="btn btn-primary">
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

    @include('admin.footer')

</body>

</html>