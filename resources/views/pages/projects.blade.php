@extends('layouts.app')

@section('title','Миний төслүүд')

@section('content')

<section class="uk-section uk-section-default">
    <div class="uk-container">
        <h1 class="uk-article-title">LOC үнэлгээнүүд</h1>

        <ul uk-accordion class="uk-margin-large">
            @if($locs)
            @foreach($locs as $loc)
            <li class="uk-open">
                <a class="uk-accordion-title" href="#">{{$loc->title}}</a>
                <div class="uk-accordion-content">
                    <div class="uk-child-width-expand@s" uk-grid>
                        <div class="uk-width-1-1">
                            <div class="uk-text-bold">Төслийн тайлбар: </div>
                        </div>
                        <div class="uk-width-1-1">
                            {{$loc->description}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Төслийг санаачлагч: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$loc->creator}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Төслийн гүйцэтгэгч: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$loc->executor}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Хариуцах ажилтны нэр: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$loc->manager}}
                        </div>

                        <div class="uk-width-1-4">
                            <div class="uk-text-bold">Төслийн эхлэх хугацаа: </div>
                        </div>
                        <div class="uk-width-1-4">
                            {{$loc->start_date}}
                        </div>
                        <div class="uk-width-1-4">
                            <div class="uk-text-bold">Төслийн дуусах хугацаа: </div>
                        </div>
                        <div class="uk-width-1-4">
                            {{$loc->end_date}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Энэ төслийн төлөв: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$loc->mode}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Шаардагдах хүн-сар: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$loc->effort}} хүн-сар
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Шаардагдах хугацаа: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$loc->time}} сар 
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Дундаж шаардагдах хүн хүч: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$loc->staffs}} хүн
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
            @else
            <h1>Хоосон байна</h1>
            @endif
        </ul>
    </div>
</section>

<section class="uk-section uk-section-default">
    <div class="uk-container">
        <h1 class="uk-article-title">Use-case-points үнэлгээнүүд</h1>

        <ul uk-accordion class="uk-margin-large">
            @if($usecases)
            @foreach($usecases as $usecase)
            <li class="uk-open">
                <a class="uk-accordion-title" href="#">{{$usecase->title}}</a>
                <div class="uk-accordion-content">
                    <div class="uk-child-width-expand@s" uk-grid>
                        <div class="uk-width-1-1">
                            <div class="uk-text-bold">Төслийн тайлбар: </div>
                        </div>
                        <div class="uk-width-1-1">
                            {{$usecase->description}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Төслийг санаачлагч: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$usecase->creator}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Төслийн гүйцэтгэгч: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$usecase->executor}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Хариуцах ажилтны нэр: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$usecase->manager}}
                        </div>

                        <div class="uk-width-1-4">
                            <div class="uk-text-bold">Төслийн эхлэх хугацаа: </div>
                        </div>
                        <div class="uk-width-1-4">
                            {{$usecase->start_date}}
                        </div>
                        <div class="uk-width-1-4">
                            <div class="uk-text-bold">Төслийн дуусах хугацаа: </div>
                        </div>
                        <div class="uk-width-1-4">
                            {{$usecase->end_date}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Энэ төслийн UCP: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$usecase->ucp}}
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
            @else
            <h1>Хоосон байна</h1>
            @endif
        </ul>
    </div>
</section>

<section class="uk-section uk-section-default">
    <div class="uk-container">
        <h1 class="uk-article-title">Function points үнэлгээнүүд</h1>

        <ul uk-accordion class="uk-margin-large">
            @if($functions)
            @foreach($functions as $function)
            <li class="uk-open">
                <a class="uk-accordion-title" href="#">{{$function->title}}</a>
                <div class="uk-accordion-content">
                    <div class="uk-child-width-expand@s" uk-grid>
                        <div class="uk-width-1-1">
                            <div class="uk-text-bold">Төслийн тайлбар: </div>
                        </div>
                        <div class="uk-width-1-1">
                            {{$function->description}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Төслийг санаачлагч: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$function->creator}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Төслийн гүйцэтгэгч: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$function->executor}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Хариуцах ажилтны нэр: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$function->manager}}
                        </div>

                        <div class="uk-width-1-4">
                            <div class="uk-text-bold">Төслийн эхлэх хугацаа: </div>
                        </div>
                        <div class="uk-width-1-4">
                            {{$function->start_date}}
                        </div>
                        <div class="uk-width-1-4">
                            <div class="uk-text-bold">Төслийн дуусах хугацаа: </div>
                        </div>
                        <div class="uk-width-1-4">
                            {{$function->end_date}}
                        </div>

                        <div class="uk-width-1-2">
                            <div class="uk-text-bold">Энэ төслийн FP: </div>
                        </div>
                        <div class="uk-width-1-2">
                            {{$function->fp}}
                        </div>

                    </div>
                </div>
            </li>
            @endforeach
            @else
            <h1>Хоосон байна</h1>
            @endif
        </ul>
    </div>
</section>
@endsection