@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
      <a href="{{route('admin.report')}}">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            
              <h3>{{$cadastros->count()}}</h3>

              <p>Inscritos</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <span class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </div>
      </a>
        <!-- ./col -->
      <a href="{{route('admin.checkin')}}">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$checkins->count()}}</h3>

              <p>Checkins</p>
            </div>
            <div class="icon">
              <i class="fa fa-plane"></i>
            </div>
            <span class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </div>
      </a>
        <!-- ./col -->
      <a href="{{route('admin.pagamento')}}">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>R$ {{$pagamentos->sum('valortotal')}}</h3>

              <p>Financeiro</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <span class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </div>
      </a>
        
        <!-- ./col -->
      <a href="{{route('admin.acompanhante')}}">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$acompanhantes->count()}}</h3>
              <p>Acompanhantes</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <span class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </div>
        </a>
        <!-- ./col -->
      </div>
@stop