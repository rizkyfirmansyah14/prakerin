@extends('base')

@section('content')

    @extends('header')

    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="header my-4 d-flex justify-content-between">
                <div class="title">
                    <h4>Daftar Laporan Siswa</h4>
                </div>  
            </div>
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Laporan</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    @foreach($lapor as $l)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$l->user_id}}</td>
                            <td>{{$l->jurusan}}</td>
                           <td><a href='/uploads/{{$l->file}}'>{{$l->file}}</a></td>
                           <td><a href="" class="main-btn">Setujui</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
