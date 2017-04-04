@extends('layouts.master')


@section('title')
    Bill Splitter
@endsection


@push('head')
    <script src="/js/document.js"></script>
@endpush


@section('content')

    <section class="intro">
        <h1>Split the Bill</h1>
        <p>
            Congratulations, you're splitting the bill!
        </p>
    </section>

    <div class="calculator">

        {{--

        @if ($errors)

            <div class="alert alert-danger" role="alert">
                Please check what you entered!

                @foreach($errors as $error)
					<br />
                    {{ $error }}
				@endforeach

            </div>

        @endif

        @if (($form->isSubmitted()) and (!$form->hasErrors))

            <div class="alert alert-success" role="alert">
                Everybody's paying ${{ $result }}!
            </div>

        @endif

        --}}

        <form method='GET' action='/'>

            {{--

<input type='text' name='searchTerm' id='searchTerm' value='{{ $searchTerm or '' }}' />
<input type='checkbox' name='caseSensitive' {{ ($caseSensitive) ? 'CHECKED' : '' }} />





            <div class="form-item">
                <label for="billAmount" class="label-required">How much is the bill?<br /><span class="required not-bold">(required)</span></label>
                $
                <input type="text" name="billAmount" id="billAmount" class="bill-amount" required value="<?=$form->prefill('billAmount')?>"/>
                <input type="hidden" name="billAmountErrorLabel" value="bill amount" />
            </div>

            <div class="form-item">
                <label for="numberOfPeople">How many people are paying?</label>
                <select name="numberOfPeople" id="numberOfPeople">
                    @for ($i=1; $i<=50; $i++)
                        <option value="{{ $i }}" <?php if($form->get('numberOfPeople')==$i) echo "selected" ?>>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="form-item">
                <label for="includeTip">
                    Include tip?
                </label>
                <input type="checkbox" name="includeTip" id="includeTip" class="js-includeTip" <?php if($form->isChosen('includeTip')) echo 'CHECKED' ?> />
            </div>

            <div class="form-item js-tipPercent <?php if(!($form->isChosen('includeTip'))) echo 'hidden' ?>">
                <label for="tipPercent">
                    OK, how much tip?
                </label>
                <select name="tipPercent" id="tipPercent">
                    <option value="15" <?php if($form->get('tipPercent')=="15") echo "selected" ?>>15</option>
                    <option value="18" <?php if($form->get('tipPercent')=="18") echo "selected" ?>>18</option>
                    <option value="20" <?php if($form->get('tipPercent')=="20") echo "selected" ?>>20</option>
                </select>
                %
            </div>

            <div class="form-item">
                <label for="roundUp">
                    Round up?
                </label>
                <input type="checkbox" name="roundUp" id="roundUp" <?php if($form->isChosen('roundUp')) echo 'CHECKED' ?> />
            </div>

            <div class="form-item submit-button">
                <button type="submit" class="btn btn-primary">Split the Bill!</button>
            </div>

            --}}

        </form>

    </div>

    {{-- @if($searchTerm != null)
        <h2>Results for query: <em>{{ $searchTerm }}</em></h2>

        @if(count($searchResults) == 0)
            No matches found.
        @else
            <div class='book'>
                @foreach($searchResults as $title => $book)

                    <h3>{{ $title }}</h3>
                    <h4>by {{ $book['author'] }}</h4>
                    <img src='{{$book['cover']}}'>

                @endforeach
            </div>
        @endif
    @endif --}}

@endsection


@push('body')
    {{-- <script src="/js/books/show.js"></script> --}}
@endpush
