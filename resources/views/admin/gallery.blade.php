<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        body {
            background-color: #0b1220;
            font-family: 'Segoe UI', sans-serif;
        }

        .gallery-container {
            padding: 30px;
        }

        .gallery-title {
            font-size: 32px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 30px;
            text-align: center;
        }

        /* Grid layout */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        /* Card */
        .gallery-item {
            background: #111827;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.3s;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }

        .gallery-item:hover {
            transform: translateY(-6px);
        }

        /* Image */
        .gallery-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        /* Card footer */
        .gallery-footer {
            padding: 10px;
            text-align: center;
        }

        .btn-danger {
            width: 100%;
            border-radius: 6px;
            font-size: 13px;
        }

        /* Upload section */
        .upload-section {
            margin-top: 40px;
            background: #111827;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }

        .upload-section label {
            color: #fff;
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        .upload-section input[type="file"] {
            margin-bottom: 10px;
            color: white;
        }

        .btn-primary {
            width: 100%;
            border-radius: 6px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .gallery-title {
                font-size: 24px;
            }

            .gallery-item img {
                height: 150px;
            }

            .upload-section {
                width: 100%;
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
            <div class="container-fluid gallery-container">

                <h1 class="gallery-title">Gallery</h1>

                <div class="gallery-grid">
                    @foreach ($gallery as $gallery)
                        <div class="gallery-item">

                            <img src="/gallery/{{ $gallery->image }}" alt="Gallery Image">

                            <div class="gallery-footer">
                                <a class="btn btn-danger" href="{{ url('delete_gallery', $gallery->id) }}"
                                    onclick="return confirm('Delete this image?')">
                                    Delete
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- Upload -->
                <form action="{{ url('upload_gallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="upload-section">
                        <label>Upload Image</label>
                        <input type="file" name="image" required>
                        <button class="btn btn-primary">Add Image</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('admin.footer')

</body>

</html>