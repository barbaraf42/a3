@extends('layouts.master')


@section('title')
    Bill Splitter
@endsection


@push('head')
    <link rel="stylesheet" href="/css/styles.css" />
    <script src="/js/document.js"></script>
@endpush


@section('content')

    <section class="intro">
        <img src="/images/cafe-table.jpg" alt="" />
        <h1>Split the Bill</h1>
    </section>

    <div class="calculator">

        <div class="alert alert-success" role="alert">
            Everybody's paying ${{ $result }}!
        </div>

        <form method='GET' action='/'>
            <div class="form-item submit-button">
                <button type="submit" class="btn btn-primary">Have Another Bill?</button>
            </div>
        </form>

    </div>

@endsection
