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

        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                Please check what you entered!
                @foreach ($errors->all() as $error)
                    <br />
                    {{ $error }}
                @endforeach
            </div>
        @else
            @if ($result)
                <div class="alert alert-success" role="alert">
                    Everybody's paying ${{ $result }}!
                </div>
            @endif
        @endif

        <form method='GET' action='/'>

            <div class="form-item">
                <label for="billAmount" class="label-required">How much is the bill?<br /><span class="required not-bold">(required)</span></label>
                $
                <input type="text" name="billAmount" id="billAmount" class="bill-amount" value='{{ $billAmount or '' }}'  />
            </div>

            <div class="form-item">
                <label for="numberOfPeople">How many people are paying?</label>
                <select name="numberOfPeople" id="numberOfPeople">
                    @for ($i=1; $i<=50; $i++)
                        <option value="{{ $i }}" {{ ($i == $numberOfPeople) ? 'selected' : '' }} >
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="form-item">
                <label for="includeTip">
                    Include tip?
                </label>
                <input type="checkbox" name="includeTip" id="includeTip" class="js-includeTip" {{ ($includeTip) ? 'CHECKED' : '' }} />
            </div>

            <div class="form-item js-tipPercent {{ ($includeTip) ? '' : 'hidden' }} ">
                <label for="tipPercent">
                    OK, how much tip?
                </label>
                <select name="tipPercent" id="tipPercent">
                    <option value="15" {{ ($tipPercent == '15') ? 'selected' : '' }} >15</option>
                    <option value="18" {{ ($tipPercent == '18') ? 'selected' : '' }} >18</option>
                    <option value="20" {{ ($tipPercent == '20') ? 'selected' : '' }} >20</option>
                </select>
                %
            </div>

            <div class="form-item">
                <label for="roundUp">
                    Round up?
                </label>
                <input type="checkbox" name="roundUp" id="roundUp" {{ ($roundUp) ? 'CHECKED' : '' }} />
            </div>

            <div class="form-item submit-button">
                <button type="submit" class="btn btn-primary">Split the Bill!</button>
            </div>

        </form>

    </div>

@endsection
