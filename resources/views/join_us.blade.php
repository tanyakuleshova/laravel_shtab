@extends('layouts.layout')

@section('title', 'Laracode')

@section('content')
    <section class="help">
        <h1 class="title title--help">ЯК ДОПОМОГТИ АНТИКОРУПЦІЙНОМУ ШТАБУ?</h1>

        <div class="tabs tabs--help">

            <ul class="tabs__container" id="helpTab">
                <li class="tabs__link" data-tab="tab-1">ПІДТРИМАТИ</li>
                <li class="tabs__link" data-tab="tab-2">ПРИЄДНАТИСЬ</li>
                <li class="tabs__link" data-tab="tab-3">ЗДАТИ<br>КОРУПЦІОНЕРА</li>
                <li class="tabs__link" data-tab="tab-4">ПІДПИСАТИСЬ<br>НА РОЗСИЛКУ</li>
            </ul>


            <div id="tab-1" class="tabs__item">
                <div class="tab tab--first">
                    <h3 class="title title--tab title--tab-donate">ПІДТРИМАТИ АНТИКОРУПЦІЙНИЙ ШТАБ</h3>

                    <p class="tab__description">Ми закликаємо всіх, хто втомився від корупції і брехні підтримати Антикорупційний штаб. Кожна копійка на підтримку боротьби з корупцією — це інвестиція в майбутнє, яка дозволить заощадити мільйони.</p>

                    <form class="tab__form tab__form--first tab__form--one-col" action="#" method="POST">
                        @csrf
                        <label class="label"><input type="text" id="shtabSum" name="benefactor_sum" class="input input--tab" placeholder="Сума в гривнях"></label>
                        <label class="label"><input type="text" id="shtabName" name="benefactor_name" class="input input--tab" placeholder="Ваше ім'я"></label>
                        <label class="label"><input type="email" id="shtabEmail" name="benefactor_email" class="input input--tab" placeholder="Ваш email"></label>

                        <!--			<input type="submit" name="shtab_submit" value="ПІДТРИМАТИ" class="btn btn--tab">-->
                        <button type="submit" id="make_donation" class="btn btn--tab">ПІДТРИМАТИ</button>
                    </form>
                </div>
            </div>

            <div id="tab-2" class="tabs__item">
                <div class="tab">
                    <h3 class="title title--tab title--tab-join">ПРИЄДНАТИСЬ ДО АНТИКОРУПЦІЙНОГО ШТАБУ</h3>

                    <p class="tab__description">Дякуємо, що бажаєте долучитися до діяльності Антикорупційного штабу!<br> Будь ласка, заповніть форму:</p>

                    @include('layouts.error')
                    @if (session('message_joined'))
                    <div class="info-box">{{ session('message_joined') }}</div>
                    @endif

                    <form id="shtabJoinForm" class="tab__form tab__form--second tab__form--two-col" action="/join" method="POST">
                        @csrf


                        <label class="label label--required"><input type="text" id="shtabName" name="joinForm_name" class="joinForm input input--tab" required placeholder="Ваше повне ім'я" value={{old('joinForm_name')}}></label>
                        <label class="label label--required"><input type="text" id="shtabRegion" name="joinForm_region" class="joinForm input input--tab" required placeholder="Населений пункт, область" value={{old('joinForm_region')}}></label>
                        <label class="label label--required"><input type="text" id="shtabPhone" name="joinForm_phone" class="joinForm input input--tab" required placeholder="Ваш телефон" value={{old('joinForm_phone')}}></label>

                        <fieldset class="radio radio--help">
                            <legend class="radio__title">Як бажаєте долучитись до діяльності Штабу?</legend>
                            <ul class="radio__items">
                                <li>
                                    <input type="radio" id="shtabRbHelpType1" name="joinForm__HelpType[]" class="radio__input" value="Стати волонтером" >
                                    <label for="shtabRbHelpType1" class="label radio__label">Стати волонтером</label>
                                </li>
                                <li>
                                    <input type="radio" id="shtabRbHelpType2" name="joinForm__HelpType[]" class="radio__input" value="Допомогти фінансово" >
                                    <label for="shtabRbHelpType2" class="label radio__label">Допомогти фінансово</label>
                                </li>
                                <li>
                                    <input type="radio" id="shtabRbHelpType3" name="joinForm__HelpType[]" class="radio__input" required value="Створити осередок в своєму населеному пункті">
                                    <label for="shtabRbHelpType3" class="label radio__label">Створити осередок в своєму населеному пункті</label>
                                </li>
                            </ul>
                        </fieldset>

                        <label class="label label--required label--email-tab-2">
                            <input type="email" id="shtabEmail" name="joinForm_email" class="joinForm input input--tab" placeholder="Ваш email" required value={{ old('joinForm_email')}}>
                        </label>

                        <label class="label label--social-tab-2">
                            <input type="text" id="shtabSocial" name="joinForm_social_link" class="input input--tab" placeholder="Посилання на ваш профіль в соц. мережах"  required value={{old('joinForm_social_link')}}>
                        </label>

                        <label class="label label--add-tab-2">
                            <input type="text" id="shtabMisc" name="joinForm_additional_msg" class="input input--tab" placeholder="Бажаєте щось додати?" required value={{ old('joinForm_additional_msg') }}>
                        </label>

                        <p class="checkbox checkbox--help">
                            <input id="shtabChkAgree" name="joinForm_Agree" type="checkbox" class="checkbox__input" required>
                            <label for="shtabChkAgree" class="checkbox__label">Згоден з обробкою персональних даних</label>
                        </p>
                        <span class="tab__required">Обов’язкові поля для заповнення</span>
                        <button type="submit" class="btn btn--tab">ПОДАТИ ЗАЯВКУ</button>
                    </form>

                    <div class="response_msg_joinForm"></div>
                </div>
            </div>


            <div id="tab-3" class="tabs__item">
                <div class="tab">
                    <h3 class="title title--tab title--tab-corruption">ЗДАТИ КОРУПЦІОНЕРА</h3>

                    <p class="tab__description">Якщо ви стали свідком або випадковим учасником корупційних подій, будь ласка, надішліть інформацію нам. Ми гарантуємо вашу анонімність, проте для можливості отримати додаткові деталі ми просимо вас залишити свої контакти.</p>

                    <p class="tab__description">За можливістю, будь ласка, надайте докази корупції (наприклад: фотокопії документів, відео, фотографії, аудіозаписи тощо). Це пришвидшить розслідування і збільшить шанси на покарання корупціонера.</p>

                    @include('layouts.error')
                    @if (session('message_curroption'))
                        <div class="info-box">{{ session('message_curroption') }}</div>
                    @endif

                    <form action="/news" method="POST" enctype="multipart/form-data" id="shtabCorruptForm" class="tab__form tab__form--third tab__form--two-col" >
                        @csrf
                        <label class="label label--required">
                            <input type="text" id="shtabName" name="corruptionForm_name" class="corruptForm input input--tab" placeholder="Ваше повне ім'я" required value={{ old('corruptionForm_name')}}>
                        </label>

                        <label class="label label--required">
                            <input type="text" id="shtabRegion" name="corruptionForm_region" class="corruptForm input input--tab" placeholder="Населений пункт, область" required value={{ old('corruptionForm_region')}}>
                        </label>

                        <label class="label label--required">
                            <input type="text" id="shtabPhone" name="corruptionForm_phone" class="corruptForm input input--tab" placeholder="Ваш телефон" required value={{ old('corruptionForm_phone')}}>
                        </label>

                        <label class="label label--required">
                            <input type="text" id="shtabSituation" name="corruptionForm_situation" class="corruptForm input input--tab" placeholder="Детальний опис корупційної ситуації" required value={{ old('corruptionForm_situation')}}>
                        </label>

                        <label class="label label--required">
                            <input type="email" id="shtabEmail" name="corruptionForm_email" class="corruptForm input input--tab" placeholder="Ваш email" required value={{ old('corruptionForm_email')}}>
                        </label>

                        <label class="label label--required">
                            <input type="text" id="shtabArguments" name="corruptionForm_arguments" class="corruptForm input input--tab" placeholder="Опис наявних у вас доказів" required value={{ old('corruptionForm_arguments')}}>
                        </label>

                        <label class="label label--required">
                            <input type="text" id="shtabCorruptName" name="corruptionForm_corruptName" class="corruptForm input input--tab" placeholder="Прізвище, ім'я, по-батькові, посада корупціонера" required value={{ old('corruptionForm_corruptName')}}>
                        </label>

                        <input type="text" class="input input--tab" placeholder="Прикріпити докази" disabled="">
                        <label for="sortpicture" class="upload_label">
                            Прикріпити докази
                        <input id="sortpicture" class="inputfile" placeholder="Прикріпити докази" type="file" name="corruptionForm_files" />

                        </label>

                        <p class="checkbox checkbox--help">
                            <input id="chkGuarantee" required name="shtab_guarantee" type="checkbox" class="checkbox__input">
                            <label for="chkGuarantee" class="checkbox__label">Я гарантую правдивість наданої інформації</label>
                        </p>

                        <span class="tab__required">Обов’язкові поля для заповнення</span>
                        <button type="submit" class="btn btn--tab btn--tab-3">ПОДАТИ ЗАЯВКУ</button>
                    </form>
                    <div class="response_msg_corruptionForm"></div>
                </div>
            </div>


            <div id="tab-4" class="tabs__item">
                <div class="tab">
                    <h3 class="title title--tab title--tab-email">ПІДПИСАТИСЬ НА РОЗСИЛКУ</h3>

                    <p class="tab__description">Отримувати інформацію про розслідування, оновлення та останні новини Антикорупційного штабу</p>
                    @include('layouts.error')
                    @if (session('message_subscribe'))
                        <div class="info-box">{{ session('message_subscribe') }}</div>
                    @endif
                    <form method ="POST" id="contact-form" class="tab__form tab__form--fourth tab__form--one-col" action="/about">
                        @csrf
                        <label class="label"><input type="email" name="subscribe_email" class="input input--tab" placeholder="Ваш email"></label>
                        <label class="label"><input type="text" name="subscribe_name" class="input input--tab" placeholder="Ваше повне ім'я"></label>
                        <input id="submit_form" name="submit" type="submit" value="ПІДПИСАТИСЬ" class="btn btn--tab btn--tab-last">
                    </form>
                    <div class="response_msg_subscribeForm"></div>
                </div>
            </div>

        </div>

    </section>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>

    <script>
        $(document).on('click', '#make_donation', function (e) {
            e.preventDefault();
            var tforma = $(this.form);
            $.ajax({
                type: "POST",
                url: tforma.attr('action'),
                dataType: 'json',
                data: tforma.serialize(),
                success: function (msg) {
                    console.log('msg => ',msg);
                    if (msg.error !== undefined) {
                        swal('',msg.error, "error");
                    }
                    if (msg.forms !== undefined) {
                        $('body').append(msg.forms);
                        setTimeout(function(){
                            $('#form_for_pay').click();
                        },30);

                    }
                }
            });
        });
    </script>

@endsection