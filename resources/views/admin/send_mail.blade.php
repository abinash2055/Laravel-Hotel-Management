<!DOCTYPE html>
<html>

<!-- head  -->

<head>
    <base href="/public">
    @include('admin.css')
    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #020617);
            font-family: 'Segoe UI', sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #111827;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
        }

        .form-title {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            color: #e5e7eb;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #374151;
            background-color: #020617;
            color: white;
            outline: none;
            transition: 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 5px #3b82f6;
        }

        .form-group textarea {
            height: 100px;
            resize: none;
        }

        .submit-btn {
            text-align: center;
            margin-top: 20px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
                padding: 20px;
            }

            .form-title {
                font-size: 20px;
            }
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
                <div class="form-container">
                    <h1 style="font-size: 30px; font-weight: bold;">Send Mail to {{ $data->name }}</h1>

                    <form action="{{ url('mail', $data->id) }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label>Greeting</label>
                            <input type="text" name="greeting" required>
                        </div>

                        <div class="form-group">
                            <label>Mail Body</label>
                            <textarea class=".desc_box" name="body" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Action Text</label>
                            <input type="text" name="action_text" required>
                        </div>

                        <div class="form-group">
                            <label>Action Url</label>
                            <input type="text" name="action_url" required>
                        </div>

                        <div class="form-group">
                            <label>End Line</label>
                            <input type="text" name="endline" required>
                        </div>

                        <div class="submit-btn">
                            <input type="submit" value="Send Mail" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- body section  -->

    <!-- Footer  -->
    @include('admin.footer')
    <!-- Footer  -->
</body>

</html>