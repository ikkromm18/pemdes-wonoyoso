@extends('layouts.master')
@section('title', 'Beranda')
@section('content')

    <x-beranda.hero />

    <x-beranda.services />

    <x-beranda.daftar-layanan :jenissurats="$jenissurats" />

    <x-beranda.sambutan />



@endsection
