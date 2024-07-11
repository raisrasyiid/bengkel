<!-- Carousel Start -->
<div class="header-carousel">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/home/img/carousel-2.jpg'); ?>" class="img-fluid w-100" alt="First slide" />
                <div class="carousel-caption">
                    <div class="container py-4">
                        <div class="row g-5">
                            <?php $colClass = $this->session->userdata('status') == 'login' ? 'col-lg-6' : 'col-lg-12'; ?>
                            <div class="<?= $colClass ?> d-none d-lg-flex fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                <div class="text-start">
                                    <h1 class="display-5 text-white">Layanan bengkel termurah di Godean!</h1>
                                    <p class="text-white mt-3">Nikmati pelayanan berkualitas dengan harga terjangkau. Kunjungi kami sekarang!</p>
                                    <?php if ($this->session->userdata('status') != 'login') : ?>
                                        <a href="<?= site_url('main/viewLogin'); ?>" class="btn btn-secondary">Coba sekarang!</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-fluid overflow-hidden about py-5" id="about">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item">
                    <div class="pb-5">
                        <h1 class="display-5 text-capitalize">Tentang <span class="text-primary">Kami</span></h1>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate! Adipisci facilis modi quisquam quia distinctio,
                        </p>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="about-item-inner border p-4">
                                <div class="about-icon mb-4">
                                    <img src="<?= base_url('assets/home/img/about-icon-1.png'); ?>" class="img-fluid w-50 h-50" alt="Icon">
                                </div>
                                <h5 class="mb-3">Our Vision</h5>
                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-item-inner border p-4">
                                <div class="about-icon mb-4">
                                    <img src="<?= base_url('assets/home/img/about-icon-2.png'); ?>" class="img-fluid h-50 w-50" alt="Icon">
                                </div>
                                <h5 class="mb-3">Our Mision</h5>
                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-item my-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae, aliquam ipsum. Sed suscipit dolorem libero sequi aut natus debitis reprehenderit facilis quaerat similique, est at in eum. Quo, obcaecati in!
                    </p>
                    <div class="row g-4 align-items-center">
                        <!-- First column: Experience information -->
                        <div class="col-lg-6">
                            <div class="text-center rounded bg-secondary p-4">
                                <h1 class="display-6 text-white">17</h1>
                                <h5 class="text-light mb-0">Years Of Experience</h5>
                            </div>
                        </div>
                        <!-- Second column: Image and founder information -->
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <!-- Founder Image -->
                                <img src="<?= base_url('assets/home/img/attachment-img.jpg'); ?>" class="img-fluid rounded-circle border border-4 border-secondary" style="width: 100px; height: 100px;" alt="Image">
                                <!-- Founder details -->
                                <div class="ms-4">
                                    <h4>William Burgess</h4>
                                    <p class="mb-0">Carveo Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-img">
                    <div class="img-1">
                        <img src="<?= base_url('assets/home/img/about-img.jpg'); ?>" class="img-fluid rounded h-100 w-100" alt="">
                    </div>
                    <div class="img-2">
                        <img src="<?= base_url('assets/home/img/about-img-1.jpg'); ?>" class="img-fluid rounded w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Services Start -->
<div class="container-fluid overflow-hidden service py-5" id="service">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-5 text-capitalize mb-3">Layanan <span class="text-primary">Bengkel</span></h1>
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate! Adipisci facilis modi quisquam quia distinctio,
            </p>
        </div>
        <?php if (isset($layanan) && !empty($layanan)) : ?>
            <div class="row">
                <?php foreach ($layanan as $val) : ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/foto_layanan/' . $val->foto_layanan); ?>" class="card-img-top" alt="Service Image">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $val->nama_layanan ?></h5>
                                <p class="card-text text-center"><?= $val->deskripsi_layanan ?></p>
                                <h5 class="card-text text-center"><strong>Harga: </strong>Rp. <?= $val->harga_layanan ?>,-</h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>No services available.</p>
        <?php endif; ?>
    </div>
</div>
<!-- Services End -->


<!-- Car categories Start -->
<div class="container-fluid overflow-hidden categories py-5" id="vehicle">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-5 text-capitalize mb-3">Gallery <span class="text-primary">Bengkel</span></h1>
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate! Adipisci facilis modi quisquam quia distinctio,
            </p>
        </div>
        <?php if (isset($gallery) && !empty($gallery)) : ?>
            <div class="row">
                <?php foreach ($gallery as $val) : ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-center mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/foto_gallery/' . $val->foto_gallery); ?>" class="card-img-top" alt="Service Image">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $val->nama_gallery ?></h5>
                                <p class="card-text text-center"><?= $val->deskripsi_gallery ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>No services available.</p>
        <?php endif; ?>
    </div>
</div>
<!-- Car categories End -->

<?php if ($this->session->userdata('status') == 'login') : ?>
    <!-- Booking -->
    <div class="container-fluid  categories pb-5" id="booking">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Layanan <span class="text-primary">Reservasi</span></h1>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate! Adipisci facilis modi quisquam quia distinctio,
                </p>
            </div>
            <div class="col-xl-12 wow fadeInUp">
                <div class="bg-secondary p-5 rounded">
                    <h4 class="text-primary mb-4 text-center">Reservasi Sekarang</h4>
                    <form action="<?= site_url('booking/reservasi'); ?>" method="POST">
                        <div class="row g-4 justify-content-center">
                            <?php if (isset($user) && !empty($user)) : ?>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="username" placeholder="Your Name" value="<?= $user->username; ?>" disabled>
                                        <label for="name">Username</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="nama_user" placeholder="Your Name" value="<?= $user->nama_user; ?>" disabled>
                                        <label for="name">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="phone" class="form-control" id="phone" name="no_hp_user" placeholder="Phone" value="<?= $user->no_hp_user; ?>" disabled>
                                        <label for="phone">No Hp</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="project" name="tgl_book" placeholder="Project">
                                        <label for="project">Tanggal Booking</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="time" class="form-control" id="subject" name="waktu_book" placeholder="Subject">
                                        <label for="subject">Waktu Booking</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="keluhan" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                        <label for="message">Keluhan</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3">Reservasi Sekarang!</button>
                                </div>
                            <?php else : ?>
                                <p>User tidak ditemukan</p>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- booking -->
<?php endif; ?>


<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5" id="kataMereka">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-5 text-capitalize mb-3">Kata<span class="text-primary"> Mereka</span></h1>
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate! Adipisci facilis modi quisquam quia distinctio,
            </p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item">
                <div class="testimonial-inner p-4">
                    <img src="<?= base_url('assets/home/img/testimonial-1.jpg'); ?>" class="img-fluid" alt="">
                    <div class="ms-4">
                        <h4>Person Name</h4>
                        <p>Profession</p>
                        <div class="d-flex text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star text-body"></i>
                        </div>
                    </div>
                </div>
                <div class="border-top rounded-bottom p-4">
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam soluta neque ab repudiandae reprehenderit ipsum eos cumque esse repellendus impedit.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Contact us -->
<div class="container-fluid contact py-5" id="kontakKami">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-5 text-capitalize text-primary mb-3">Feedback</h1>
            <p class="mb-0">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a class="text-primary fw-bold" href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
        </div>
        <div class="row g-5">
            <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-secondary p-5 rounded">
                    <h4 class="text-primary text-center mb-4">Kirimkan Feedback anda disini</h4>
                    <form action="<?= site_url('feedback/save')?>" method="POST">
                        <div class="row g-4">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="nama" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="text" style="height: 160px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-light w-100 py-3">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="rounded">
                    <iframe class="rounded w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.06824052430855!2d110.31074264734302!3d-7.780085702206443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af7ea4f944e35%3A0x97944a8e386b9655!2s6896%2BW9J%2C%20Seboran%2C%20Sidoarum%2C%20Kec.%20Godean%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta%2055264!5e0!3m2!1sid!2sid!4v1720496878427!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->