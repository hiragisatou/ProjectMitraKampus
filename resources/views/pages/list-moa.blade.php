@extends('master-dashboard')
@section('title', 'Daftar Pengajuan MoA')
@section('content')
    <div class="card">
        <div class="card-body p-3">
            <table class="table align-items-center mb-0" id="list-moa">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Nama Mitra</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Kategori</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Prodi</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2" style="max-width: 50px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $x)
                        <tr>
                            <td class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</td>
                            <td class="text-sm font-weight-bold mb-0 text-wrap" style="max-width: 10rem">{{ $x['mitra']['nama'] }}</td>
                            <td class="text-sm font-weight-bold mb-0 text-wrap" style="max-width: 25rem">
                                @php
                                    foreach ($x['kategori'] as $k) {
                                        $kategori[] = $k['nama'];
                                    }
                                    echo implode(', ', $kategori);
                                    $kategori = null;
                                @endphp
                            </td>
                            <td class="text-sm font-weight-bold mb-0 text-wrap" style="max-width: 25rem">
                                @php
                                    foreach ($x['prodi'] as $p) {
                                        $prodi[] = $p['nama'];
                                    }
                                    echo implode(', ', $prodi);
                                    $prodi = null;
                                @endphp
                            </td>
                            <td class="text-sm font-weight-bold mb-0">
                                {{ $x['tgl_mulai'] }}
                                {{ $x['tgl_akhir'] == null ? '' : ' s/d ' . $x['tgl_akhir'] }}
                            </td>
                            <td class="text-sm font-weight-bold mb-0">
                                @if ($x['verifymoa'] != null)
                                    @if ($x['verifymoa']['status'] == 'verify' && date_create($x['tgl_akhir'])->modify('+1 day') <= now())
                                        <span class="badge badge-sm bg-gradient-info">Berakhir</span>
                                    @elseif ($x['verifymoa']['status'] == null)
                                        <span class="badge badge-sm bg-gradient-warning">Diproses admin {{ $x->verifymoa->admin_type }}</span>
                                    @else
                                        <span class="badge badge-sm {{ $x['verifymoa']['status'] == 'verify' ? 'bg-gradient-success' : 'bg-gradient-danger' }}">{{ $x['verifymoa']['status'] }}</span>
                                    @endif
                                @else
                                    <span class="badge badge-sm text-bg-secondary">Diproses admin pusat</span>
                                @endif
                            </td>
                            <td class="text-sm font-weight-bold mb-0 align-items-center">
                                <a href="{{ route('detail_moa', ['moa' => $x['id']]) }}" class="btn btn-outline-dark btn-sm py-1 px-2 m-0">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                @if ($x->verifymoa == null)
                                    @canany(['admin', 'mitra'])
                                        <button type="button" class="btn btn-outline-danger btn-sm py-1 px-2 m-0" data-bs-toggle="modal" data-bs-target="#modal-notification" data-bs-url="{{ route('delete_moa_handler', ['moa' => $x['id']]) }}" data-bs-name="{{ $x->judul }}"><i class="fa-regular fa-trash-can"></i></button>
                                    @endcanany
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <span class="" style="font-size: 6rem"><i class="fa-regular fa-bell"></i></span>
                        <h4 class="text-gradient text-danger mt-4">Peringatan!</h4>
                        <p>Apakah anda yakin menghapus data ?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="" method="post" class="m-0 p-0">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn bg-gradient-danger">Ya, Saya yakin</button>
                    </form>
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{ Js::From(route('dashboard')) }} + '">Dashboard</a></li>');
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Daftar MoA</li>');

        var myTable = $('#list-moa').DataTable({
            initComplete: function() {
                this.api().columns().every(function() {
                    let column = this;

                    // Create select element
                    let select = document.createElement('select');
                    select.add(new Option(''));
                    column.footer().replaceChildren(select);

                    // Apply listener for user change in value
                    select.addEventListener('change', function() {
                        var val = DataTable.util.escapeRegex(select.value);

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                    // Add list of options
                    column.data().unique().sort().each(function(d, j) {
                        select.add(new Option(d));
                    });
                });
            },
        });

        $(document).ready(function() {
            $('td > select').addClass('form-select form-select-sm');
            $('tfoot > tr > td:first-child').empty();
            $('tfoot > tr > td:last-child').empty();
            var status = [];
            var x = $('tbody > tr > td:nth-last-child(2)').each(function(index) {
                status[index] = $(this).children(0).text();
            });
            $('tfoot > tr > td:nth-last-child(2) > select').empty();
            $('tfoot > tr > td:nth-last-child(2) > select').append(new Option("", ""));
            [...new Set(status)].forEach(e => {
                $('tfoot > tr > td:nth-last-child(2) > select').append(new Option(e, e));
            });

            $('#list-moa_paginate > ul').addClass('m-0');
            $('#list-moa_paginate').addClass('d-flex justify-content-end')
            $('#list-moa_info').parent().addClass('d-flex align-items-center');
            $('#list-moa_info').addClass('text-sm');
            $('#list-moa_length > label').addClass('d-flex-middle');;
            $('select[name="list-moa_length"]').addClass('w-50');

            $('#modal-notification').on('show.bs.modal', event => {
                const button = event.relatedTarget
                var url = button.getAttribute('data-bs-url');
                var name = button.getAttribute('data-bs-name');
                $('#modal-notification').find('form').attr('action', url);
                $('#modal-notification').find('p:first').text("Apakah anda yakin menghapus MoA " + name + " ?")
            });
        });
        const targetNode = document.getElementsByClassName("pagination")[0];

        // Options for the observer (which mutations to observe)
        const config = {
            attributes: true,
            childList: true,
        };

        // Callback function to execute when mutations are observed
        const callback = (mutationList, observer) => {
            $('#list-moa_previous > a').empty()
            $('#list-moa_previous > a').append('<i class="fa fa-angle-left"></i>');
            $('#list-moa_next > a').empty()
            $('#list-moa_next > a').append('<i class="fa fa-angle-right"></i>');
            $('.paginate_button.page-item.active > a').addClass('text-white');
        };

        // Create an observer instance linked to the callback function
        const observer = new MutationObserver(callback);

        // Start observing the target node for configured mutations
        observer.observe(targetNode, config);
    </script>
@endsection
