
@extends('master')

@section('title')
Yeni Müşteri Ekle-Toplu mail yönetimi
@endsection

@section('css')

@endsection

@section('main')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Müşteri Düzenle</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{route('index')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Yeni Müşteri</li>
							</ol>
						</nav>
					</div>
                    </div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col">
					@if($errors->any())
					@foreach($errors->all() as $hatalar)
					<div class ="alert alert-danger">{{$hatalar}}</div>
					@endforeach
					@endif
					@if(session('success'))
					<div class ="alert alert-success">{{session('success')}}</div>
					@endif

                        <form action="{{route('musteri-duzenle-post', $musteriBilgisi->id)}}" method="post">
							@csrf
						<div class="card">
							<div class="card-body">
								<h6 class="mb-0 text-uppercase">Müşteri Güncelle</h6>
					            	<hr/>
								    <input class="form-control form-control-lg mb-3" type="text" name="adsoyad" placeholder="Müşteri Adı/Firma Adı" value="{{$musteriBilgisi->adsoyad}}" aria-label=".form-control-lg example">
                                    <input class="form-control form-control-lg mb-3" type="email" name="mail" placeholder="Müşteri e-posta" value="{{$musteriBilgisi->mail}}" aria-label=".form-control-lg example">
                                    <input class="form-control form-control-lg mb-3" type="text" name="telefon" placeholder="Müşteri telefonu" value="{{$musteriBilgisi->telefon}}"aria-label=".form-control-lg example">
                                    <input class="btn btn-success mb-3" type="submit" name="ilet" value="YENİ MÜŞTERİ EKLE" aria-label=".form-control-lg example">
                                </div>
						</div>
                        </form>
                        </div>
						</div>
				<!--end row-->
			</div>
		</div>

@endsection
@section('js')

@endsection