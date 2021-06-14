@extends('layouts.app')

@section('title', 'Нүүр')

@section('content')

<section class="uk-container">
  <div class="uk-padding uk-padding-remove-horizontal">
    <div class="uk-padding uk-padding-small uk-background-default">
      <h1 class="uk-article-title">Ерөнхий мэдээллүүд</h1>
      <form class="uk-form-horizontal" method="POST">
        @csrf
        <div class="uk-margin">
          <label class="uk-form-label" for="title">Төслийн нэр</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="title">
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="description">Төслийн талаар тайлбар</label>
          <div class="uk-form-controls">
            <textarea class="uk-textarea" id="description"></textarea>
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="creator">Төслийг санаачлагч</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="creator">
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="executor">Төслийн гүйцэтгэгчийн нэр</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="executor">
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="manager">Хариуцах ажилтны нэр</label>
          <div class="uk-form-controls">
            <input class="uk-input" id="manager">
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="start_date">Төслийн эхлэх хугацаа</label>
          <div class="uk-form-controls">
            <input class="uk-input" type="date" id="start_date">
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="end_date">Төслийн эхлэх хугацаа</label>
          <div class="uk-form-controls">
            <input class="uk-input" type='date' id="end_date">
          </div>
        </div>

      </form>
    </div>
  </div>
</section>

<hr class="uk-divider-icon">

<section class="uk-container">
  <div class="uk-padding uk-padding-remove-horizontal">
    <div class="uk-padding uk-padding-small uk-background-default">
      <ul class="uk-flex-center" uk-tab>
        <li class="uk-active">
          <a href="#">COCOMO / LOC /</a>
        </li>
        <li>
          <a href="#">Use case points</a>
        </li>
        <li>
          <a href="#">Function points</a>
        </li>
      </ul>

      <ul class="uk-switcher uk-padding uk-padding-small uk-padding-remove-vertical">
        <li>
          <form class="uk-form-horizontal" method="POST">
            @csrf
            <div class="uk-margin uk-text-bold">
              Энэхүү аргаар бодохдоо нийт кодны мөрийн хэмжээнээс хамааран доорх 3 төлөвт харгалзах утгыг ашиглан тооцоолдог.
            </div>
            <table class="uk-table uk-table-divider">
              <thead>
                <tr>
                  <th>Төлөв</th>
                  <th>a</th>
                  <th>b</th>
                  <th>c</th>
                  <th>d</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Organic (2-50 LOC)</td>
                  <td>2.4</td>
                  <td>1.05</td>
                  <td>2.5</td>
                  <td>0.38</td>
                </tr>
                <tr>
                  <td>Semi Detached (50-300 LOC)</td>
                  <td>3.0</td>
                  <td>1.12</td>
                  <td>2.5</td>
                  <td>0.35</td>
                </tr>
                <tr>
                  <td>Embedded (+300 LOC)</td>
                  <td>3.6</td>
                  <td>1.2</td>
                  <td>2.5</td>
                  <td>0.32</td>
                </tr>
              </tbody>
            </table>

            <div class="uk-margin uk-text-bold">
              Хүн-сар = a(LOC)<sup>b</sup><br>
              Хугацаа = c(хүн-сар) <sup>d</sup><br>
              Хүн хүч = Хүн-сар / Хугацаа
            </div>
            <hr class="uk-divider-icon">
            <div class="uk-margin">
              <label class="uk-form-label" for="loc">LOC хэмжээ</label>
              <div class="uk-form-controls">
                <input class="uk-input" type='number' id="loc">
              </div>
            </div>

            <button onclick="calculateLoc({{  auth()->user()->id}})" class="uk-button uk-button-default uk-margin-small-right uk-text-right" type="button" uk-toggle="target: #modal-example">Тооцоолох</button>

            <div id="modal-example" uk-modal>
              <div class="uk-modal-dialog uk-modal-body">
                <h2 class="uk-modal-title">Үр дүн</h2>
                <div id='locResults'>
                </div>
                <p class="uk-text-right">
                  <button class="uk-button uk-button-primary uk-modal-close" type="button">Хаах</button>
                </p>
              </div>
            </div>
          </form>
        </li>
        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
        <li>
          <form class="uk-form-horizontal" method="POST">
            @csrf
            <div class="uk-margin uk-text-bold">
              Эхлээд UUCW олох ба ингэхдээ: (Энгийн use-case тоо х 5) + (Дундаж use-case тоо х 10) + (Төвөгтэй use-case тоо х 15)
            </div>
            <div class="uk-margin">
              <label class="uk-form-label" for="simpleUseCase">Энгийн Use Case-ийн тоо</label>
              <div class="uk-form-controls">
                <input class="uk-input" type='number' id="simpleUseCase">
              </div>
            </div>
            <div class="uk-margin">
              <label class="uk-form-label" for="averageUseCase">Дундаж Use Case-ийн тоо</label>
              <div class="uk-form-controls">
                <input class="uk-input" type='number' id="averageUseCase">
              </div>
            </div>
            <div class="uk-margin">
              <label class="uk-form-label" for="complexUseCase">Төвөгтэй Use Case-ийн тоо</label>
              <div class="uk-form-controls">
                <input class="uk-input" type='number' id="complexUseCase">
              </div>
            </div>

            <div class="uk-margin uk-text-bold">
              Дараа нь UAW олох ба ингэхдээ: (Энгийн actor тоо х 1) + (Дундаж actor тоо х 2) + (Төвөгтэй actor тоо х 15)
            </div>

            <div class="uk-margin">
              <label class="uk-form-label" for="simpleActors">Энгийн actor-ийн тоо</label>
              <div class="uk-form-controls">
                <input class="uk-input" type='number' id="simpleActors">
              </div>
            </div>
            <div class="uk-margin">
              <label class="uk-form-label" for="averageActors">Дундаж actor-ийн тоо</label>
              <div class="uk-form-controls">
                <input class="uk-input" type='number' id="averageActors">
              </div>
            </div>
            <div class="uk-margin">
              <label class="uk-form-label" for="complexActors">Төвөгтэй actor-ийн тоо</label>
              <div class="uk-form-controls">
                <input class="uk-input" type='number' id="complexActors">
              </div>
            </div>

            <hr class="uk-divider-icon">
            @php ($questionT = [
            'Тархсан систем',
            'Хариу өгөх хугацаа',
            'Эцсийн хэрэглэгчийн үр нөлөө',
            'Дотоод боловсруулалтын төвөгтэй байдал',
            'Код дахин ашиглалт',
            'Суулгахад хялбар',
            'Хэрэглэхэд хялбар',
            'Бусад платформруу зөөх',
            'Систем засвар',
            'Зэрэгцээ боловсруулалт',
            'Хамгаалалтын боломжуд',
            'Гуравдагч этгээд нэвтрэх',
            'Эцсийн хэрэглэгчийн сургалт'
            ])

            @php ($questionE = [
            'Хөгжүүлэлтийн технологийг мэдэх байдал',
            'Хэрэглээний туршлага',
            'Багийн обект хандлагат туршлага',
            'Тэргүүлэх аналистийн хэмжээ',
            'Багийн идэвх',
            'Шаардлагын тогтвортой байдал',
            'Хагас-цагийн ажилчид',
            'Программчлалын хэлний төвөгтэй байдал'
            ])

            <div class="uk-margin uk-text-bold">
              Дараа нь TCF олох ба ингэхдээ доорх шаардлагуудыг системд хэр их нөлөөтэйг 0-5
              хүртэл үнэлэх ба үнэлгээний нийлбэр нь TF болох бөгөөд TCF=0.6 + (TF / 100)
            </div>

            @for ($i = 0; $i < 13; $i++) <div class="uk-margin">
              <label class="uk-form-label " style="width: 500px !important;" for="t{{ $i+1 }}">{{$questionT[$i]}}</label>
              <div class="uk-form-controls ">
                <select class="uk-select uk-form-width-small" id="t{{ $i+1 }}">
                  <option>0</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
    </div>
    @endfor

    <hr class="uk-divider-icon">
    <div class="uk-margin uk-text-bold">
      Дараа нь ECF олох ба ингэхдээ мөн доорх шаардлагуудыг системд хэр их нөлөөтэйг 0-5
      хүртэл үнэлэх ба үнэлгээний нийлбэр нь EF болох бөгөөд ECF=1.4 + (-0.03 x EF) <br><br>
      Эцэст нь UCP нь UCP = (UUCW + UAW) x TCF x ECF болно.
    </div>

    @for ($i = 0; $i < 8; $i++) <div class="uk-margin">
      <label class="uk-form-label " style="width: 500px !important;" for="e{{ $i+1 }}">{{$questionE[$i]}}</label>
      <div class="uk-form-controls ">
        <select class="uk-select uk-form-width-small" id="e{{ $i+1 }}">
          <option>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
  </div>
  @endfor



  <button onclick="calculateUseCase({{  auth()->user()->id}})" uk-toggle="target: #use-case-modal" class="uk-button uk-button-default uk-margin-small-right uk-text-right" type="button">Тооцоолох</button>

  <div id="use-case-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
      <h2 class="uk-modal-title">Үр дүн</h2>
      <div id='useCaseResult'>
      </div>
      <p class="uk-text-right">
        <button class="uk-button uk-button-primary uk-modal-close" type="button">Хаах</button>
      </p>
    </div>
  </div>
  </form>
  </li>
  <!-- ------------------------------------------------------------------------------------------------------------------------- -->
  <li>
    <form class="uk-form-horizontal" method="POST">
      @csrf
      <div class="uk-margin uk-text-bold">
        <div class="uk-margin uk-text-bold">
          Энэхүү аргаар бодохдоо эхлээд эхний хүснэгтийн утгуудаар, дараагийн хүснэгтэнд оруулсан утгыг үржүүлэн тус бүрийг нэмэн<br>
          нийт UFP олдог.
        </div>
        <table class="uk-table uk-table-divider">
          <thead>
            <tr>
              <th>Функцийн нэгжүүд</th>
              <th>Энгийн</th>
              <th>Дундаж</th>
              <th>Төвөгтэй</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Гадаад оролтууд (EI)</td>
              <td>3</td>
              <td>4</td>
              <td>6</td>
            </tr>
            <tr>
              <td>Гадаад гаралтууд (EO)</td>
              <td>4</td>
              <td>5</td>
              <td>7</td>
            </tr>
            <tr>
              <td>Гадаад лавлагаанууд (EQ)</td>
              <td>3</td>
              <td>4</td>
              <td>6</td>
            </tr>
            <tr>
              <td>Дотоод логик файлууд (ILF)</td>
              <td>7</td>
              <td>10</td>
              <td>15</td>
            </tr>
            <tr>
              <td>Гадаад интерфэйс файлууд (EIF)</td>
              <td>5</td>
              <td>7</td>
              <td>10</td>
            </tr>
          </tbody>
        </table>
      </div>
      <table class="uk-table">
        <thead>
          <tr>
            <th>Хэмжигдэхүүнүүд</th>
            <th>Энгийн</th>
            <th>Дундаж</th>
            <th>Төвөгтэй</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Гадаад оролтууд (EI)</td>
            <td><input class="uk-input" type='number' id="eiSimple"></td>
            <td><input class="uk-input" type='number' id="eiAverage"></td>
            <td><input class="uk-input" type='number' id="eiComplex"></td>
          </tr>

          <tr>
            <td>Гадаад гаралтууд (EO)</td>
            <td><input class="uk-input" type='number' id="eoSimple"></td>
            <td><input class="uk-input" type='number' id="eoAverage"></td>
            <td><input class="uk-input" type='number' id="eoComplex"></td>
          </tr>

          <tr>
            <td>Гадаад лавлагаанууд (EQ)</td>
            <td><input class="uk-input" type='number' id="eqSimple"></td>
            <td><input class="uk-input" type='number' id="eqAverage"></td>
            <td><input class="uk-input" type='number' id="eqComplex"></td>
          </tr>

          <tr>
            <td>Дотоод логик файлууд (ILF)</td>
            <td><input class="uk-input" type='number' id="ilfSimple"></td>
            <td><input class="uk-input" type='number' id="ilfAverage"></td>
            <td><input class="uk-input" type='number' id="ilfComplex"></td>
          </tr>

          <tr>
            <td>Гадаад интерфэйс файлууд (EIF)</td>
            <td><input class="uk-input" type='number' id="eifSimple"></td>
            <td><input class="uk-input" type='number' id="eifAverage"></td>
            <td><input class="uk-input" type='number' id="eifComplex"></td>
          </tr>
        </tbody>
      </table>

      @php ($questionFP = [
      'Системд найдвартай нөөцлөлт болон сэргээлт шаардлагатай',
      'Мэргэшсэн мэдээллийн харилцаа холбоо шаардлагатай',
      'Тархсан боловсруулалтын функцууд байдаг.',
      'Гүйцэтгэл чухал',
      'Систем оршин буй, өндөр ашиглалттай орчинд ажилладаг',
      'Систем нь өгөгдлийг онлайнаар оруулахыг шаарддаг.',
      'Онлайн өгөгдөл оруулахын тулд олон дэлгэцээр гүйлгээ хийх шаардлагатай.',
      'ILF-ийг онлайнаар шинэчилдэг.',
      'Оролт, гаралт, файл эсвэл лавлагаа нь төвөгтэй байдаг.',
      'Дотоод боловсруулалт нь нарийн төвөгтэй байдаг.',
      'Кодыг дахин ашиглах боломжтой байхаар загварчилсан.',
      'Хөрвүүлэлт / суурилуулалтыг загварт оруулсан.',
      'Систем нь янз бүрийн байгууллагуудад олон удаа суурилуулах зориулалттай.',
      'Энэхүү систем нь өөрчлөлт, ашиглалтыг хөнгөвчлөх зорилгоор бүтээгдсэн болно.'
      ])

      <hr class="uk-divider-icon">
      <div class="uk-margin uk-text-bold">
        Дараа нь доорх хүчин зүйлсийн хүснэгтээс харгалзах үзүүлэлтүүд нь 0-5 оноо өгөн тэдгээрийгээ нийлүүлэн F-ээ олно. <br>
        Ингээд CAF олохдоо CAF= 0.65 + (0.01 x F) <br><br>
        Эцэст нь FP олохдоо UFP x CAF гэж бодно.
      </div>
      @for ($i = 0; $i < 14; $i++) <div class="uk-margin">
        <label class="uk-form-label " style="width: 700px !important;" for="fp{{ $i+1 }}">{{$questionFP[$i]}}</label>
        <div class="uk-form-controls ">
          <select class="uk-select uk-form-width-small" id="fp{{ $i+1 }}">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        </div>
        @endfor

        <button onclick="calculateFunctionPoint({{  auth()->user()->id}})" uk-toggle="target: #function-modal" class="uk-button uk-button-default uk-margin-small-right uk-text-right" type="button">Тооцоолох</button>

        <div id="function-modal" uk-modal>
          <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Үр дүн</h2>
            <div id='functionResults'>
            </div>
            <p class="uk-text-right">
              <button class="uk-button uk-button-primary uk-modal-close" type="button">Хаах</button>
            </p>
          </div>
        </div>
    </form>
  </li>
  </ul>
  </div>
  </div>
</section>
@endsection