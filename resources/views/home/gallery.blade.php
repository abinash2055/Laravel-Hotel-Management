<style>
/* ===== GALLERY SECTION (LIGHT) ===== */
.gallery {
    background: #f8fafc;
    padding: 60px 0;
}

/* Title */
.titlepage h2 {
    text-align: center;
    color: #1e293b;
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 40px;
    letter-spacing: 1px;
}

/* Card */
.gallery_img {
    border-radius: 12px;
    overflow: hidden;
    position: relative;
    margin-bottom: 25px;
    background: #ffffff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: 0.3s ease;
}

/* Image */
.gallery_img img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: 0.4s ease;
}

/* Hover zoom */
.gallery_img:hover img {
    transform: scale(1.05);
}

/* Soft overlay */
.gallery_img::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.2);
    opacity: 0;
    transition: 0.3s ease;
}

.gallery_img:hover::before {
    opacity: 1;
}

/* Lift effect */
.gallery_img:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Responsive */
@media (max-width: 768px) {
    .gallery_img img {
        height: 180px;
    }
}
</style>

<div class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Gallary</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($gallery as $gallery)
                <div class="col-md-3 col-sm-6">
                    <div class="gallery_img">
                        <figure>
                            <img src="/gallery/{{ $gallery->image }}" alt="#" />
                        </figure>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
