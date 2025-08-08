
@props(['color', 'bgColor' => 'white'])
<div {{$attributes->merge(['lang'=>'ta'])->class("card card-text-$color card-bg-$bgColor")}} >
    <div {{$title->attributes->class("card-header")}}>
        {{$title}}
    </div>
    @if($slot->isEmpty())
        <p>Provide some content</p>
    @else
        {{$slot}}
    @endif
    {{$slot}}
    <div class="card-footer">{{$footer}}</div>
</div>