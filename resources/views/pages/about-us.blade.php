@extends('master-home')
@section('title', 'About Us')
@section('content')

    <!-- Header-->
    <header class="py-5 bg-white">
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xxl-11">
                    <div class="my-5 text-center">
                        <h1 class="fw-bolder mb-3 text-center">Tentang Kami.</h1>
                        <p class="lead fw-normal text-muted mb-4">Selamat datang di halaman pengajuan Memorandum of Understanding (MoU) dan Memorandum of Agreement (MoA) antara Politeknik Negeri Bali dan berbagai mitra strategis kami, termasuk pemerintah dan Dunia Usaha Dunia Industri (DUDI). Kami di Politeknik Negeri Bali berkomitmen untuk membangun kemitraan yang kuat dan saling menguntungkan dengan berbagai pihak guna meningkatkan kualitas pendidikan, penelitian, dan pelayanan kepada masyarakat. Dengan MoU dan MoA, kami berharap dapat menciptakan kerangka kerja yang jelas dan saling menguntungkan bagi semua pihak yang terlibat, serta menjembatani kolaborasi yang efektif dalam berbagai bidang. Kami percaya bahwa kerjasama ini akan membawa manfaat besar bagi perkembangan dan kemajuan pendidikan tinggi di wilayah Bali dan sekitarnya. Terima kasih atas minat dan dukungan Anda dalam membangun masa depan yang lebih cerah bersama kami..</p>
                        <a class="btn btn-primary btn-lg" href="#scroll-target">Read our story</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About section one-->
    <section class="py-5 bg-light" id="scroll-target">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                <div class="col-lg-6">
                    <h2 class="fw-bolder">Our founding</h2>
                    <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About section two-->
    <section class="py-5 bg-white">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                <div class="col-lg-6">
                    <h2 class="fw-bolder">Growth &amp; beyond</h2>
                    <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Team members section-->
    <section class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="fw-bolder">Our team</h2>
                <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
            </div>
            <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                <div class="col mb-5 mb-5 mb-xl-0">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                        <h5 class="fw-bolder">Ibbie Eckart</h5>
                        <div class="fst-italic text-muted">Founder &amp; CEO</div>
                    </div>
                </div>
                <div class="col mb-5 mb-5 mb-xl-0">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                        <h5 class="fw-bolder">Arden Vasek</h5>
                        <div class="fst-italic text-muted">CFO</div>
                    </div>
                </div>
                <div class="col mb-5 mb-5 mb-sm-0">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                        <h5 class="fw-bolder">Toribio Nerthus</h5>
                        <div class="fst-italic text-muted">Operations Manager</div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                        <h5 class="fw-bolder">Malvina Cilla</h5>
                        <div class="fst-italic text-muted">CTO</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
