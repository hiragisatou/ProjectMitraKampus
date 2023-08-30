@extends('master-dashboard')
@section('title', 'Daftar Pengajuan MoU')
@section('content')
    <div class="card">
        <div class="card-body p-3">
            <table class="table align-items-center mb-0" id="list-mou">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Nama Mitra</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Judul</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Jenis Kemitraan
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2" style="max-width: 50px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $x)
                        <tr>
                            <td class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</td>
                            <td class="text-sm font-weight-bold mb-0">{{ $x['mitra']['nama'] }}</td>
                            <td class="text-sm font-weight-bold mb-0">{{ $x['judul'] }}</td>
                            <td class="text-sm font-weight-bold mb-0">{{ $x['jenis_kemitraan'] }}</td>
                            <td class="text-sm font-weight-bold mb-0">
                                {{ date_format(date_create($x['tgl_mulai']), 'd-m-Y') }}
                                {{ $x['tgl_berakhir'] == null ? '' : ' s/d ' . date_format(date_create($x['tgl_berakhir']), 'd-m-Y') }}
                            </td>
                            <td class="text-sm font-weight-bold mb-0">
                                @if ($x['verifymou'] != null)
                                    @if ($x['verifymou']['status'] == 'verify' && date_create($x['tgl_berakhir'])->modify('+1 day') < now())
                                        <span class="badge badge-sm bg-gradient-info">Berakhir</span>
                                    @else
                                        <span class="badge badge-sm {{ $x['verifymou']['status'] == 'verify' ? 'bg-gradient-success' : 'bg-gradient-danger' }}">{{ $x['verifymou']['status'] }}</span>
                                    @endif
                                @else
                                    <span class="badge badge-sm text-bg-secondary">Diproses</span>
                                @endif
                            </td>
                            <td class="text-sm font-weight-bold mb-0 align-items-center">
                                <a href="{{ route('detail_mou', ['mou' => $x['id']]) }}" class="btn btn-outline-dark btn-sm py-1 px-2 m-0">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <form action="{{ route('delete_mou_handler', ['mou' => $x['id']]) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm py-1 px-2 m-0">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
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
    <script>
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{ Js::from(route('dashboard')) }} + '">Dashboard</a></li>');
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Daftar MoU</li>');

        var myTable = $('#list-mou').DataTable({
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
            $('tfoot > tr > td:nth-child(7) > select').empty();
            $('tfoot > tr > td:nth-child(7) > select').append(new Option("", ""));
            $('tfoot > tr > td:nth-child(7) > select').append(new Option("Verify", "Verify"));
            $('tfoot > tr > td:nth-child(7) > select').append(new Option("Tolak", "Tolak"));
            $('tfoot > tr > td:nth-child(7) > select').append(new Option("Diproses", "Diproses"));

            $('#list-mou_paginate > ul').addClass('m-0');
            $('#list-mou_paginate').addClass('d-flex justify-content-end')
            $('#list-mou_info').parent().addClass('d-flex align-items-center');
            $('#list-mou_info').addClass('text-sm');
            $('#list-mou_length > label').addClass('d-flex-middle');;
            $('select[name="list-mou_length"]').addClass('w-50');
        });
        const targetNode = document.getElementsByClassName("pagination")[0];

        // Options for the observer (which mutations to observe)
        const config = {
            attributes: true,
            childList: true,
        };

        // Callback function to execute when mutations are observed
        const callback = (mutationList, observer) => {
            $('#list-mou_previous > a').empty()
            $('#list-mou_previous > a').append('<i class="fa fa-angle-left"></i>');
            $('#list-mou_next > a').empty()
            $('#list-mou_next > a').append('<i class="fa fa-angle-right"></i>');
            $('.paginate_button.page-item.active > a').addClass('text-white');
        };

        // Create an observer instance linked to the callback function
        const observer = new MutationObserver(callback);

        // Start observing the target node for configured mutations
        observer.observe(targetNode, config);
    </script>
@endsection
