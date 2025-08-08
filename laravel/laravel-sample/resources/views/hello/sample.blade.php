Conditional Directives
@if(true) <!-- this will display the string if the condition is true-->
    this will be display if its true 
@endif
@if (count($cars) > 0) <!--if the car is more than 0 string will show string is there is a car -->
    <p>There is a car</p>
@else <!-- if car is lower than 0 string will show there is no car-->
    <p>There is no Cars</p>
@endif
@if (count($cars)===1) <!-- this will show the string if car is equals to 1 -->
    <p>car is one</p>
@else
    <p>car is not one</p>
@endif
@unless (false) <!--opposite of @if-->
    <p>unless</p>
@endunless  
@isset($cars)<!--check if variable exist-->
    <p>isset</p>
@endisset
@empty($cars)<!--check if the variable have value-->
@endempty
@auth<!--check if a variable(user) is authenticated-->
@endauth
@sectionMissing('navigation') <!--check if there is no naviation section-->
    <div class="pull-right"> <!--show if the section is missing -->
        @include('default-navigation')
    </div>
@endif

<input type="checkbox" @checked(BOOLEAN_EXPRESSION)/>
<!--if the boolean is false-->
<input type="checkbox" />
<!--if the boolean is true-->
<input type="checkbox" checked />

<input type="checkbox" @disabled(BOOLEAN_EXPRESSION)/>
<!--if the boolean is false-->
<input type="checkbox" />
<!--if the boolean is true-->
<input type="checkbox" disabled />

<input type="text" @readonly(BOOLEAN_EXPRESSION)/>
<!--if the boolean is false-->
<input type="text" />
<!--if the boolean is true-->
<input type="text" readonly/>

<input type="text" @required(BOOLEAN_EXPRESSION)/>
<!--if the boolean is false-->
<input type="text" />
<!--if the boolean is true-->
<input type="text" required/>

<select>
    @foreach ($years as $year)
        <option value="{{$year}}"
            @selected($year==date('Y'))>
            <{{$year}}
        </option>
    @endforeach
</select>

Switch Directives
@switch()
    @case('ge')
        <p>Geriogia</p>
        @break

    @default
        <p>unkniown</p>
@endswitch


Loop Directives
@for($i = 0; $ < 5; $i++)
    <p>{{$i + 1}}</ p>
@endfor
@foreach ($cars as $car)
    <p>Model: {{$car->model}}
@endforeach
@forelse ($cars as $car)
    <p>Model: {{$car->model}}
@empty
    <p>there is no car</p>
@endforelse


Continue and Break in Loop
@foreach ([1, 2 , 3, 4, 5] as $n)
    @if ($n == 2)
        @continue
    @endif
    <p>{{$n}}</p>
@endforeach
is same here
@foreach ([1, 2 , 3, 4, 5] as $n)
    @continue($n == 2)
    <p>{{$n}}</p>
@endforeach

@foreach ([1, 2, 3, 4, 5] as $n)
    <p>{{$n}}</p>
    @if($n == 4 )
        @break
    @endif
@endforeach

Component and Component Slot
<x-sample.sample/>
<x-sample>
    <x-slot name="title">Card title 1</x-slot>
    Card Content 1
    <x-slot name="footer">Card footer 1</x-slot>
</x-sample>
is same here
<x-sample>
    <x-slot:title>Card title 1</x-slot>
    Card Content 1
    <x-slot:footer>Card footer 1</x-slot>
</x-sample>



$loop->index -The index of the current loop iteration (starts at 0).
$loop->iteration - The current loop iteration (starts at 1).
$loop-> remaining - The iterations remaining in the loop.
$loop->count - The total number of items in the array being iterated.
$loop->first - Whether this is the first iteration through the loop.
$loop->last - Whether this is the last iteration through the loop.
$loop->even - Whether this is an even iteration through the loop.
$loop->odd - Whether this is an odd iteration through the loop.
$loop->depth - The nesting level of the current loop.
$loop->parent - When in a nested loop, the parent's loop variable.

@foreach ($hobbies as $h)
    {{$loop->iteration}}
    {{dd($loop)}}
    {{$h}}
@endforeach

<?php
    is same
?>
@php
    here
@endphp
<?php
    is same
    use Illuminate\Support\Str;
?>
here
@use('Illuminate\Support\Str')

@include('shared.button', ['color' => 'yellow', 'text' => 'button'])

@php
    $cars = [];
@endphp

@foreach ($cars as $car )
    @include('hello.view', ['car' => $car])
@endforeach
is similar to this
@each('hello.view', $cars , 'car', 'hello.empty')

{{-- this is blade comment tag --}}

<!--
<script>
    const hobbies = {{Illuminate\Support\Js::from($hobbies)}}
</script>

{{Illuminate\Support\Js::from($hobbies)}} this will show variables in a JSON format


@{{ name}} this will tell laravel to not include curly brace as function
@@for and @@foreach this will tell laravel to not include @ as a function

@verbatim this will tell laravel to not include all function inside it
    <div>
        Name: {{name}}
        Age: {{age}}
        Job: {{job}}
        @if
    </div>
@endverbatim

<P>
    {{date('Y')}}
</P>
<p>
    {{strtoupper($firstName .  ' ' . $lastName)}} this will show the firtname and last name variable
</p>

<p>
    {!! $job !!} this render the tag in the value of variable <b></b>
</p>

<p>
    {{Str::after("Hello World", "Hello ")}} this will only show string after the "Hello " String
</p>
<p>
    {{Illuminate\Foundation\Application::VERSION}} this will show the version of Laravel
</p>
<p>
    {{PHP_VERSION}} this will show the version of PHP
</p>
<p>
    Hello {{$firstName}} {{$lastName}} a {{$age}} old man.
</p>
<p>
    Year: {{$year}}
</p>
-->

